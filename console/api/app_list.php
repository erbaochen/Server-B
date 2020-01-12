<?php
    // all scripts should contain forced flags if geting confirmation y/n from user to run automatically;
    $app_list =  array(
        "nginx" =>  array("name" => "nginx",  "img" => "nginx.png",  "width" => "55", "protect"=>true, "status" => true, "script_1"=>"","script_2"=>"","script_3"=>"","script_4"=>"","script_5"=>"","uninstall_script_1"=>"","uninstall_script_2"=>"","uninstall_script_3"=>""),
        "php" =>    array("name" => "php",    "img" => "php.png",    "width" => "55", "protect"=>true, "status" => true, "script_1"=>"","script_2"=>"","script_3"=>"","script_4"=>"","script_5"=>"","uninstall_script_1"=>"","uninstall_script_2"=>"","uninstall_script_3"=>""),
        "apache" => array("name" => "apache", "img" => "apache.png", "width" => "32", "protect"=>false, "status" => true,"script_1"=>"sudo apt-get install apache2 -y","script_2"=>"","script_3"=>"","script_4"=>"","script_5"=>"","uninstall_script_1"=>"","uninstall_script_2"=>"","uninstall_script_3"=>""),
        "nodejs" => array("name" => "nodejs", "img" => "nodejs.png", "width" => "42", "protect"=>false, "status" => true, "script_1"=>"sudo apt-get install nodejs -y","script_2"=>"","script_3"=>"","script_4"=>"","script_5"=>"","uninstall_script_1"=>"","uninstall_script_2"=>"","uninstall_script_3"=>""),
        "python" => array("name" => "python", "img" => "python.png", "width" => "50", "protect"=>true, "status" => true, "script_1"=>"","script_2"=>"","script_3"=>"","script_4"=>"","script_5"=>"","uninstall_script_1"=>"","uninstall_script_2"=>"","uninstall_script_3"=>""),
        "golang" => array("name" => "golang", "img" => "golang.png", "width" => "48", "protect"=>false, "status" => true, "script_1"=>"","script_2"=>"","script_3"=>"","script_4"=>"","script_5"=>"","uninstall_script_1"=>"","uninstall_script_2"=>"","uninstall_script_3"=>""),
        "mysql" =>  array("name" => "mysql",  "img" => "mysql.png",  "width" => "55", "protect"=>false, "status" => true, "script_1"=>"","script_2"=>"","script_3"=>"","script_4"=>"","script_5"=>"","uninstall_script_1"=>"","uninstall_script_2"=>"","uninstall_script_3"=>""),
        "postgres"=>array("name" => "postgres","img" => "postgres.png", "width" => "31", "protect"=>false, "status" => true,"script_1"=>"sudo apt install postgresql postgresql-contrib -y","script_2"=>"","script_3"=>"","script_4"=>"","script_5"=>"","uninstall_script_1"=>"","uninstall_script_2"=>"","uninstall_script_3"=>""),
        "mongodb" =>       array("name" => "mongodb", "img" => "mongodb.png", "width" => "44", "protect"=>false, "status" => true,"script_1"=>"sudo apt install -y mongodb","script_2"=>"","script_3"=>"","script_4"=>"","script_5"=>"","uninstall_script_1"=>"","uninstall_script_2"=>"","uninstall_script_3"=>""),
        "elasticsearch" => array("name" => "elasticsearch", "display"=>"Els.Search", "img" => "elasticsearch.png", "width" => "29", "protect"=>false, "status" => true,"script_1"=>"sudo apt install elasticsearch -y","script_2"=>"","script_3"=>"","script_4"=>"","script_5"=>"","uninstall_script_1"=>"","uninstall_script_2"=>"","uninstall_script_3"=>""),
        "kibana" => array("name" => "kibana", "display"=>"Kibana", "img" => "kibana.png", "width" => "30", "protect"=>false, "status" => true,"script_1"=>"sudo apt install kibana -y","script_2"=>"","script_3"=>"","script_4"=>"","script_5"=>"","uninstall_script_1"=>"","uninstall_script_2"=>"","uninstall_script_3"=>""),
        "redis" =>         array("name" => "redis", "img" => "redis.png",     "width" => "38", "protect"=>false, "status" => true,"script_1"=>"sudo apt install redis-server -y","script_2"=>"","script_3"=>"","script_4"=>"","script_5"=>"","uninstall_script_1"=>"sudo apt-get purge --auto-remove redis-server -y","uninstall_script_2"=>"","uninstall_script_3"=>""),
        "npm" =>           array("name" => "npm", "img" => "npm.png",          "width" => "54", "protect"=>false, "status" => true,"script_1"=>"sudo apt install npm -y","script_2"=>"","script_3"=>"","script_4"=>"","script_5"=>"","uninstall_script_1"=>"","uninstall_script_2"=>"","uninstall_script_3"=>""),
        "jupyter" =>       array("name" => "jupyter",  "img" => "jupyter.png", "width" => "44", "protect"=>false, "status" => true,"script_1"=>"sudo apt install python3-pip python3-dev -y","script_2"=>"sudo -H pip3 install --upgrade pip -y","script_3"=>"sudo -H pip3 install virtualenv -y","script_4"=>"","script_5"=>"pip install jupyter","uninstall_script_1"=>"","uninstall_script_2"=>"","uninstall_script_3"=>""),
        "shellbox" =>      array("name" => "shellinabox", "display"=>"shellbox", "img" => "shellinabox.png", "width" => "36", "protect"=>true, "status" => true,"script_1"=>"","script_2"=>"","script_3"=>"","script_4"=>"","script_5"=>"","uninstall_script_1"=>"","uninstall_script_2"=>"","uninstall_script_3"=>"")
    );
    $base_list =  array("nginx","php","apache","nodejs","python","golang","mysql","postgres","mongodb","elasticsearch","redis","npm","jupyter","shellbox");
