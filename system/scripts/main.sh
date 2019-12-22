#!/bin/bash
source /var/www/system/config.sh

#sudo apt-get install git -y && sudo mkdir -p /var/www && sudo mkdir -p /var/www/server-b && sudo git clone -b dev-z1 https://bbharathkumarreddy:bvsschool2019@github.com/bbharathkumarreddy/server-b.git /var/www/server-b/ && sudo bash /var/www/server-b/bash/start_install.sh

#/etc/ssh/sshd_config
#/etc/php/7.2/fpm/php.ini
#/etc/nginx/sites-enabled/default
#/etc/nginx/sites-enabled/conf

install

install(){
    echo --------------------------------------------------
    echo +++++  Server B Installation Started  ++++++
    echo --------------------------------------------------
    echo $ssh_port

    sudo mkdir $site_path

    sudo mkdir $site_path'php'
    sudo mkdir $site_path'node'
    sudo mkdir $site_path'static'
    sudo mkdir $site_path'cert'

    server_b_file_per

    load_ip
    load_os
    update_upgrade
    install_nano
    install_nginx
    install_php
    install_mysql mysql123 alt_root mysql123 3305 0.0.0.0
    install_shell_in_a_box 8887
    install_node_npm
    sudo cp /etc/ssh/sshd_config $backup_path`sshd_config_bck`
    generate_auth_key
    new_user ubt ubt
    ssh_port_set 24

    server_b_file_per

    crontab -l | { cat; echo "@reboot $scripts_path'main.sh' load_ip > /dev/null 2>&1"; } | crontab -
}

getallKey(){
   cat ../config.sh
}

getKey(){
    value="${!1}"
    echo $value
}

setKey(){
    key=$1
    value=value="${!1}"
    if [ -z "$value" ]
    then
        echo $key"='"$2"'" >> ../config.sh
    else
        echo $2
        value="${2//\//\\/}"
        sed -i "s/^$1=.*/$1='$value'/" ../config.sh
        echo $value
    fi
    
    return 1
}

load_ip(){
    public_ip=$(curl ifconfig.co)
    private_ip=$(hostname -I)
    setKey 'public_ip' $public_ip
    setKey 'private_ip' $private_ip
}

load_os(){
    os=$(. /etc/os-release; echo ${PRETTY_NAME/*, /})
    setKey 'os' $os
}

update_upgrade(){
    echo -------------------------------------------------
    echo +++++++  Update and Upgrade Started      ++++++++
    echo -------------------------------------------------
    sudo apt update -y
    sudo apt upgrade -y
    echo -------------------------------------------------
    echo xxxxxx   Update and Upgrade Completed    xxxxxxxx
    echo -------------------------------------------------
}

install_nano(){
    echo -------------------------------------------------
    echo ++++++  Nano Editor Install Started      ++++++++
    echo -------------------------------------------------
    sudo apt install nano -y
    echo -------------------------------------------------
    echo xxxxxx   Nano Editor Install Completed    xxxxxxx
    echo -------------------------------------------------
}

install_nginx(){
    echo -------------------------------------------------
    echo +++++++++  NGINX INSTALL STARTED  +++++++++++++++
    echo -------------------------------------------------
    sudo apt install nginx -y
    nginx -v
    sleep 3
    sudo timedatectl set-timezone $time_zone
    
    echo "Nginx Timezone setting complete"
    timedatectl status | grep "Time zone"

    sudo cp /etc/nginx/sites-enabled/default $backup_path'nginx-sites-enabled-default_bck'
    sudo cp /etc/nginx/nginx.conf $backup_path'nginx_conf_bck'
    sudo cp $files_path'nginx.conf' /etc/nginx/sites-enabled/default

    sudo service nginx reload reload
    echo -------------------------------------------------
    echo xxxxxxxx  NGINX INSTALL COMPLETED     xxxxxxxxxxx
    echo -------------------------------------------------
}

install_node_npm(){
    echo -------------------------------------------------
    echo +++++++++  NODE NPM INSTALL STARTED  ++++++++++++
    echo -------------------------------------------------
    sudo apt install nodejs -y
    sudo apt install npm -y
    echo "Node version"
    nodejs -v
    echo "NPM version"
    npm -v
    sleep 5

    sudo npm install -g express
    sudo npm install -g pm2
    sudo npm install -g mysql2

    echo -------------------------------------------------
    echo ++++ NODE AND NPM MODULES INSTALL COMPLETED  ++++             
    echo -------------------------------------------------
}

install_php(){
    echo -------------------------------------------------
    echo +++++++++++  PHP INSTALL STARTED  +++++++++++++++
    echo -------------------------------------------------
    sleep 3
    sudo apt install php-fpm php-mysql -y
    echo "PHP Version"
    php -r 'echo PHP_VERSION;'
    sudo cp $files_path`php_info.php` $site_path`php/php_info.php`
    sudo cp /etc/php/7.2/fpm/php.ini $backup_path`php.ini.bck`
    sleep 3
    sed -i 's,^date.timezone =.*$,date.timezone = "'$time_zone'",' /etc/php/7.2/fpm/php.ini
    
    sudo service php7.2-fpm reload

    new_php_timezone_string=$(sudo grep  "\bdate.timezone\b" /etc/php/7.2/fpm/php.ini | tail -1 | grep -o '"[^"]\+"');
    echo "PHP New Current Timezone = ${new_php_timezone_string}"
    echo -------------------------------------------------
    echo xxxxxxxxxx  PHP INSTALL COMPLETED     xxxxxxxxxxx
    echo -------------------------------------------------
}

install_mysql(){
    echo -------------------------------------------------
    echo +++++++++  MYSQL INSTALL STARTED    +++++++++++++
    echo -------------------------------------------------

    sudo apt update -y
    sudo apt install mysql-server -y
    sleep 3

    $root_password=$1
    $alt_user=$2
    $alt_pwd=$3
    $mysql_port=$4
    $mysql_bind_address=$5

    mysql  -e "ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY '"$root_password"'";
    mysql -uroot -p$root_password -e "CREATE USER '$alt_user'@'localhost' IDENTIFIED BY '"$alt_pwd"'";
    mysql -uroot -p$root_password -e "CREATE USER '$alt_user'@'%' IDENTIFIED BY '"$alt_pwd"'";
    mysql -uroot -p$root_password -e "flush privileges";
    mysql -uroot -p$root_password -e "SELECT user,authentication_string,plugin,host FROM mysql.user;";
    
    setKey 'mysql_root_password' $root_password
    setKey 'mysql_alt_user' $alt_user
    setKey 'mysql_alt_password' $alt_pwd


    sudo cp /etc/mysql/mysql.conf.d/mysqld.cnf $backup_path`mysqld.cnf.bck`

    service mysql stop
    sleep 2
    service mysql start
    sleep 1

    config_mysql $mysql_port $mysql_bind_address

    echo -------------------------------------------------
    echo ++++++++++   MYSQL INSTALL COMPLETE   +++++++++++             
    echo -------------------------------------------------
}

config_mysql(){
    echo -------------------------------------------------
    echo ++++++++++++  MYSQL PORT CONFIG   +++++++++++++++
    echo -------------------------------------------------

    $mysql_port=$1
    $mysql_bind_address=$2
    
    cur_mysqlport_string=$(sudo grep "\bport\b" /etc/mysql/mysql.conf.d/mysqld.cnf)
    sed -i "s/${cur_mysqlport_string}/port            = ${mysql_port}/g" /etc/mysql/mysql.conf.d/mysqld.cnf
    setKey 'mysql_port' $mysql_port

    cur_mysqlbind_addr_string=$(sudo grep "\bbind-address\b" /etc/mysql/mysql.conf.d/mysqld.cnf)
    sed -i "s/${cur_mysqlbind_addr_string}/bind-address            = ${mysql_bind_address}/g" /etc/mysql/mysql.conf.d/mysqld.cnf
    setKey 'mysql_bind_address' $mysql_bind_address
    
    echo 'Note: MySQL service restarts in new configuration => Port:'$mysql_port' AND bind to address:'$mysql_bind_address

    service mysql stop
    sleep 2
    service mysql start
    sleep 1

    echo -------------------------------------------------
    echo ++++++++++   MYSQL CONFIG COMPLETE   +++++++++++             
    echo -------------------------------------------------

}


install_shell_in_a_box(){
    echo -------------------------------------------------
    echo ++++++++++++  SHELL IN A BOX    +++++++++++++++++
    echo -------------------------------------------------
    sudo apt-cache search shellinabox
    sudo apt-get install openssl shellinabox -y
    sleep 2
    sed -i "s/$shell_in_box_port/$1/g" /etc/default/shellinabox
    sed -i "s/--no-beep/--no-beep   --disable-ssl/g" /etc/default/shellinabox
    $shell_in_box_port=$1
    setKey 'shell_in_box_port' $shell_in_box_port
    sleep 1
    sudo service shellinabox stop
    sleep 1
    sudo service shellinabox start
}

ssh_port_set(){
    echo -------------------------------------------------
    echo ++++++++++++  SSH PORT SETINGS  +++++++++++++++++
    echo -------------------------------------------------
    
    ssh_port_string=$(sudo grep "\bPort\b" /etc/ssh/sshd_config)
    ssh_port=$(cat /etc/ssh/sshd_config | grep 'Port ' | grep -oE [0-9] | tr -d '\n')
    new_ssh_port=$1
    sed -i "s/${ssh_port_string}/Port ${1}/g" /etc/ssh/sshd_config
    setKey 'ssh_port' $new_ssh_port
    echo 'Note: Restart Server After all installation or process is completed to start the ssh in new port'
    echo -------------------------------------------------
    echo xxxxxx   SSH PORT CONFIG COMPLETE        xxxxxxxx
    echo -------------------------------------------------
}

generate_auth_key(){
    echo -------------------------------------------------
    echo +++++++++  GENERATE AUTH STARTED  +++++++++++++++
    echo -------------------------------------------------
    auth_key=$(head /dev/urandom | tr -dc A-Za-z0-9 | head -c 50 ; echo '');
    echo "Note: This is the auth key, cannot be viewed again but can generate a new key. Please copy and store securely. Used for GIT Integrations & APIs."
    echo $auth_key
    setKey 'server_b_auth_key' $auth_key
    echo -------------------------------------------------
    echo xxxxxxxx   GENERATE AUTH COMPLETE     xxxxxxxxxxx
    echo -------------------------------------------------
}

new_user(){
    echo -------------------------------------------------
    echo ++++  CREATING NEW USER WITH ALL PRIVILEGES +++++
    echo -------------------------------------------------
    new_user=$1
    new_pwd=$2
    echo "${new_user}    ALL=(ALL:ALL) ALL" >> /etc/sudoers
    sudo useradd -p $(openssl passwd -1 $new_user) $new_pwd
    setKey 'alt_user' $new_user
    setKey 'alt_pwd' $new_pwd
}

del_user(){
    echo -------------------------------------------------
    echo ++++++++++++++  DELETING USER ++++++++++++++++++
    echo -------------------------------------------------
    userdel -f -r $1
    echo 'User Deleted :'$1
}

claer_ram(){
    sync; echo 1 > /proc/sys/vm/drop_caches
    sync; echo 2 > /proc/sys/vm/drop_caches
    sync; echo 3 > /proc/sys/vm/drop_caches
    echo "RAM CLEARED"
}

reboot(){
    reboot
}

shutdown(){
    shutdown
}

server_b_file_per(){
    sudo chmod -R 777 $server_b_path
    sudo chmod -R 777 $site_path
}

