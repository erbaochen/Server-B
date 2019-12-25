<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Server B</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        .btn-status-success {
            animation: fadeIn 0.5s infinite alternate;
            background-color: #1cc88a;
            transform: scale(0.9);
            animation-delay: 0.5s;
        }
        
        .btn-status-danger {
            animation: fadeIn 0.5s infinite alternate;
            background-color: #e74a3b;
            transform: scale(0.9);
            display: none;
        }
        
        @keyframes fadeIn {
            from {
                opacity: 0.3;
            }
        }
    </style>
    <script>
    let phpTimeZone="<?php $date = new DateTime(); $timeZone = $date->getTimezone(); echo $timeZone->getName(); ?>";
    let phpTime=parseInt("<?php echo time().'000'; ?>");
    function startTime() {
        var serverNow = new Date(phpTime).toLocaleString("en-US", {timeZone: phpTimeZone});
        var e = new Date(serverNow)
        phpTime=parseInt(phpTime)+1000;
        document.getElementById('time').innerHTML =  phpTimeZone + " "+ e.toLocaleDateString() + " " + e.getHours() + ":" + checkTime(e.getMinutes()) + ":" + checkTime(e.getSeconds());
        var t = setTimeout(startTime, 500);    
    }
    function checkTime(i) {
        if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
        return i;
    }
    </script>
</head>

<body id="page-top" onload="startTime()">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="far fa-hdd"></i>
                </div>
                <div class="sidebar-brand-text mx-2">Server B</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <div class="col-12">
                    <div class="card bg-success text-white shadow">
                        <div class="card-body">

                            <small>Server</small><br> &nbsp;
                            <b>GCP Server 01</b> &nbsp;
                            <b></b>
                            <br>
                            <small>Public IP</small><br> &nbsp;
                            <b>192.168.1.100</b>
                            <br>
                            <small>Private IP</small><br> &nbsp;
                            <b>-</b>
                        </div>
                    </div>
                </div>
            </li>
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fa fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fa fa-desktop"></i>
                    <span>Website</span>
                </a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fa fa-chess-board"></i>
                    <span>Services</span>
                </a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fa fa-file-code"></i>
                    <span>File Manger</span>
                </a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fa fa-file"></i>
                    <span>Log Point</span>
                </a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fa fa-greater-than"></i>
                    <span>SSH</span>
                </a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fa fa-tasks"></i>
                    <span>Cron</span>
                </a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fa fa-code-branch"></i>
                    <span>GIT Setup</span>
                </a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fa fa-cog"></i>
                    <span>Config</span>
                </a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fa fa-box-open"></i>
                    <span>Setup</span>
                </a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fa fa-box-open"></i>
                    <span>Logout</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <ul class="navbar-nav">
                        <li class="nav-item btn-status" title="Server Running">
                            <a href="#" class="btn btn-circle btn-sm btn-status-success">

                            </a>
                        </li>
                        &nbsp;&nbsp;
                        <li class="nav-item btn-status" title="Server Stopped">
                            <a href="#" class="btn btn-circle btn-sm btn-status-danger">

                            </a>
                        </li>
                        <li>
                            <b><p id="time" style="padding-top: 3px;cursor:pointer;" title="Server Time(PHP)">Server Time</p></b>
                        </li>
                    </ul>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter"></span>
                            </a>                            
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">User</span>
                                <i class="fas fa-bell fa-user-shield"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->