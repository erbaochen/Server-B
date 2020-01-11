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
                    <h6 class="m-0 font-weight-bold text-primary">Installed Apps</h6>
                </div>
                <div class="card-body row">
                    <div class="card py-2 pointer" style="width: 150px;height:85px;">
                        <div class="card-body p-5">
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <img style="width:55px;" src="<?php echo $app_link . '/img/nginx.png'; ?>">
                                </div>
                                <div class="col mr-2 tr">
                                    <div class="text- font-weight-bold text-dark text-uppercase mb-1 tc">Nginx</div>
                                    <i class="fas fa-play fa-1x text-success" title="Install Nginx"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <i class="fas fa-trash-alt fa-1x text-danger" title="Unistall Nginx"></i>
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