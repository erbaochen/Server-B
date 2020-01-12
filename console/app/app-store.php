<?php include('top.php'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-0">
        <h1 class="h3 mb-0 text-gray-800">App Store</h1>
    </div>
    <div class="row mb-4">
        <div class="col-xl-12 col-md-12 mb-12 fr">
            <a href="<?php echo $app_link; ?>file-manager.php" class="btn btn-sm btn-info shadow-sm fr"><i class="fa fa-file-code fa-sm text-white-50"></i> File Manager</a>
            <a href="<?php echo $app_link; ?>dashboard.php" class="btn btn-sm btn-success shadow-sm fr mr-10"><i class="fa fa-tachometer-alt fa-sm text-white-50"></i> Dashboard</a>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-12">
            <div class="card shadow mb-12" id="services">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Apps</h6>
                </div>
                <div class="card-body row ma">
                    <?php
                    $list =  array(
                        "nginx" => array("name" => "nginx", "img" => "nginx.png", "width" => "55", "css" => "app-card-success", "status" => true),
                        "php" => array("name" => "php", "img" => "php.png", "width" => "55", "css" => "app-card-success", "status" => true),
                        "apache" => array("name" => "apache", "img" => "apache.png", "width" => "32", "css" => "app-card-danger", "status" => false),
                        "nodejs" => array("name" => "nodejs", "img" => "nodejs.png", "width" => "42", "css" => "app-card-success", "status" => true),
                        "python" => array("name" => "python", "img" => "python.png", "width" => "50", "css" => "app-card-success", "status" => true),
                        "golang" => array("name" => "golang", "img" => "golang.png", "width" => "48", "css" => "app-card-success", "status" => true),
                        "mysql" => array("name" => "mysql", "img" => "mysql.png", "width" => "55", "css" => "app-card-success", "status" => true),
                        "postgres" => array("name" => "postgres", "img" => "postgres.png", "width" => "31", "css" => "app-card-success", "status" => true),
                        "mongodb" => array("name" => "mongodb", "img" => "mongodb.png", "width" => "44", "css" => "app-card-success", "status" => true),
                        "elasticsearch" => array("name" => "elasticsearch", "img" => "elasticsearch.png", "width" => "55", "css" => "app-card-success", "status" => true),
                        "redis" => array("name" => "redis", "img" => "redis.png", "width" => "55", "css" => "app-card-success", "status" => true),
                        "npm" => array("name" => "npm", "img" => "npm.png", "width" => "54", "css" => "app-card-success", "status" => true),
                        "jupyter" => array("name" => "jupyter", "img" => "jupyter.png", "width" => "44", "css" => "app-card-success", "status" => true),
                        "shellbox" => array("name" => "shellbox", "img" => "shellinabox.png", "width" => "36", "css" => "app-card-success", "status" => true)
                    );
                    $base_list =  array("nginx","php","apache","nodejs","python","golang","mysql","postgres","mongodb","elasticsearch","redis","npm","jupyter","shellbox");

                    foreach($base_list as $each){
                        if($each == "") { echo '<hr style="width: 100%;">'; continue; }
                        
                        $p = shell_exec('dpkg --get-selections | grep '.$list[$each]['name']);
                        $css = 'app-card-danger';
                        if (strpos($p, $list[$each]['name']) !== false) $css = 'app-card-success';

                        echo '<div class="'.$list[$each]['css'].' card">
                        <div class="card-body p-05">
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <img style="width:'.$list[$each]['width'].'px;" src="'. $app_link.'/img/'.$list[$each]['img'].'">
                                </div>
                                <div class="col mr-2 tc">
                                    <div class="font-weight-bold text-dark text-uppercase mb-1 tc">'.$list[$each]['name'].'</div>
                                    <i class="fas fa-download text-success" title="Install '.$list[$each]['name'].'"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <i class="fas fa-trash-alt text-danger" title="Unistall '.$list[$each]['name'].'"></i>
                                </div>
                            </div>
                        </div>
                    </div>';
                    }
                    ?>
                    
                    <hr style="width: 100%;">
                    <div class="app-card-success card">
                        <div class="card-body p-05">
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <img style="width:55px;" src="<?php echo $app_link . '/img/nginx.png'; ?>">
                                </div>
                                <div class="col mr-2 tc">
                                    <div class="font-weight-bold text-dark text-uppercase mb-1 tc">Nginx</div>
                                    <i class="fas fa-download text-success" title="Install Nginx"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <i class="fas fa-trash-alt text-danger" title="Unistall Nginx"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="app-card-success card">
                        <div class="card-body p-05">
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <img style="width:32px;" src="<?php echo $app_link . '/img/apache.png'; ?>">
                                </div>
                                <div class="col mr-2 tc">
                                    <div class="font-weight-bold text-dark text-uppercase mb-1 tc">Apache</div>
                                    <i class="fas fa-download text-success" title="Install Apache"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <i class="fas fa-trash-alt text-danger" title="Unistall Apache"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr style="width: 100%;">
                    <div class="app-card-success card">
                        <div class="card-body p-05">
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <img style="width:55px;" src="<?php echo $app_link . '/img/php.png'; ?>">
                                </div>
                                <div class="col mr-2 tc">
                                    <div class="font-weight-bold text-dark text-uppercase mb-1 tc">PHP</div>
                                    <i class="fas fa-download text-success" title="Install PHP"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <i class="fas fa-trash-alt text-danger" title="Unistall PHP"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="app-card-success card">
                        <div class="card-body p-05">
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <img style="width:42px;" src="<?php echo $app_link . '/img/nodejs.png'; ?>">
                                </div>
                                <div class="col mr-2 tc">
                                    <div class="font-weight-bold text-dark text-uppercase mb-1 tc">Node JS</div>
                                    <i class="fas fa-download text-success" title="Install Node JS"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <i class="fas fa-trash-alt text-danger" title="Unistall Node JS"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="app-card-success card">
                        <div class="card-body p-05">
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <img style="width:50px;" src="<?php echo $app_link . '/img/python.png'; ?>">
                                </div>
                                <div class="col mr-2 tc">
                                    <div class="font-weight-bold text-dark text-uppercase mb-1 tc">Python</div>
                                    <i class="fas fa-download text-success" title="Install Python"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <i class="fas fa-trash-alt text-danger" title="Unistall Python"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="app-card-success card">
                        <div class="card-body p-05">
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <img style="width:48px;" src="<?php echo $app_link . '/img/golang.png'; ?>">
                                </div>
                                <div class="col mr-2 tc">
                                    <div class="font-weight-bold text-dark text-uppercase mb-1 tc">Go lang</div>
                                    <i class="fas fa-download text-success" title="Install Go lang"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <i class="fas fa-trash-alt text-danger" title="Unistall Go lang"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr style="width: 100%;">
                    <div class="app-card-success card">
                        <div class="card-body p-05">
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <img style="width:55px;" src="<?php echo $app_link . '/img/mysql.png'; ?>">
                                </div>
                                <div class="col mr-2 tc">
                                    <div class="font-weight-bold text-dark text-uppercase mb-1 tc">Mysql</div>
                                    <i class="fas fa-download text-success" title="Install Mysql"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <i class="fas fa-trash-alt text-danger" title="Unistall Mysql"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="app-card-success card">
                        <div class="card-body p-05">
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <img style="width:31px;" src="<?php echo $app_link . '/img/postgres.png'; ?>">
                                </div>
                                <div class="col mr-2 tc">
                                    <div class="font-weight-bold text-dark text-uppercase mb-1 tc">Postgres</div>
                                    <i class="fas fa-download text-success" title="Install Postgres"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <i class="fas fa-trash-alt text-danger" title="Unistall Postgres"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="app-card-success card">
                        <div class="card-body p-05">
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <img style="width:44px;" src="<?php echo $app_link . '/img/mongodb.png'; ?>">
                                </div>
                                <div class="col mr-2 tc">
                                    <div class="font-weight-bold text-dark text-uppercase mb-1 tc">MongoDB</div>
                                    <i class="fas fa-download text-success" title="Install MongoDB"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <i class="fas fa-trash-alt text-danger" title="Unistall MongoDB"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="app-card-success card">
                        <div class="card-body p-05">
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <img style="width:29px;" src="<?php echo $app_link . '/img/elasticsearch.png'; ?>">
                                </div>
                                <div class="col mr-2 tc">
                                    <div class="font-weight-bold text-dark text-uppercase mb-1 tc" style="font-size: 12px !important;">Elasticsearch</div>
                                    <i class="fas fa-download text-success" title="Install Elasticsearch"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <i class="fas fa-trash-alt text-danger" title="Unistall Elasticsearch"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="app-card-success card">
                        <div class="card-body p-05">
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <img style="width:55px;" src="<?php echo $app_link . '/img/redis.png'; ?>">
                                </div>
                                <div class="col mr-2 tc">
                                    <div class="font-weight-bold text-dark text-uppercase mb-1 tc">Redis</div>
                                    <i class="fas fa-download text-success" title="Install Redis"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <i class="fas fa-trash-alt text-danger" title="Unistall Redis"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr style="width: 100%;">
                    <div class="app-card-danger card">
                        <div class="card-body p-05">
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <img style="width:52px;" src="<?php echo $app_link . '/img/npm.png'; ?>">
                                </div>
                                <div class="col mr-2 tc">
                                    <div class="font-weight-bold text-dark text-uppercase mb-1 tc">NPM</div>
                                    <i class="fas fa-download text-success" title="Install NPM"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <i class="fas fa-trash-alt text-danger" title="Unistall NPM"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="app-card-success card">
                        <div class="card-body p-05">
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <img style="width:44px;" src="<?php echo $app_link . '/img/jupyter.png'; ?>">
                                </div>
                                <div class="col mr-2 tc">
                                    <div class="font-weight-bold text-dark text-uppercase mb-1 tc">Jupyter</div>
                                    <i class="fas fa-download text-success" title="Install Jupyter"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <i class="fas fa-trash-alt text-danger" title="Unistall Jupyter"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="app-card-success card">
                        <div class="card-body p-05">
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <img style="width:36px;" src="<?php echo $app_link . '/img/shellinabox.png'; ?>">
                                </div>
                                <div class="col mr-2 tc">
                                    <div class="font-weight-bold text-dark text-uppercase mb-1 tc">Shell Box</div>
                                    <i class="fas fa-download text-success" title="Install Shell in a Box"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <i class="fas fa-trash-alt text-danger" title="Unistall Shell in a Box"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
<?php include('bottom.php'); ?>