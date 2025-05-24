<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?=global_title()?></title>

    <!-- Custom fonts for this template-->
    <link href="<?=base_url()?>assets/sb-admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?=base_url()?>assets/sb-admin/css/sb-admin-2.min.css" rel="stylesheet">
    <script src="<?=base_url()?>assets/sb-admin/vendor/jquery/jquery.min.js"></script>

    <!-- sweetalert -->
      <link href="<?php echo base_url(); ?>assets/admin_login/plugin/sweetalert/sweetalert2.css" rel="stylesheet">
      <script src="<?php echo base_url(); ?>assets/admin_login/plugin/sweetalert/sweetalert2.all.min.js" rel="stylesheet"></script>
    <script type="text/javascript">
        var base_url = `<?=base_url()?>`;
        var id = `<?=user_session_val()?>`;
        var app = {
            alert: function(title,content,smile_emo){
                setTimeout(function () {
                                Swal.fire({
                                allowOutsideClick: false,
                                  title: title,
                                  text: content,
                                  icon: smile_emo,
                                  confirmButtonText: 'OK',
                                })
                            }, 100);
            },

            alert_redirection: function(title,content,redirect,smile_emo){
                setTimeout(function () {
                                Swal.fire({
                                allowOutsideClick: false,
                                  title: title,
                                  text: content,
                                  icon: smile_emo,
                                  confirmButtonText: 'OK',
                                }).then(function() {
                                    window.location = redirect;
                                })
                            }, 100);
            },
        }
    </script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=base_url()?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fa fa-clock"></i>
                </div>
                <div class="sidebar-brand-text mx-3"><?=global_title()?></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?=($page == 'Dashboard')?'active':''?>">
                <a class="nav-link" href="<?=base_url()?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Records
            </div>



            <!-- Nav Item - Tables -->
            <li class="nav-item <?=($page == 'Leave')?'active':''?>">
                <a class="nav-link" href="<?=base_url()?>leave">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Leave</span></a>
            </li>

            <li class="nav-item <?=($page == 'Leave History')?'active':''?>">
                <a class="nav-link" href="<?=base_url()?>leave_history">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Leave History</span></a>
            </li>

            <li class="nav-item <?=($page == 'Attendance Logs')?'active':''?>">
                <a class="nav-link" href="<?=base_url()?>logs">
                    <i class="fas fa-fw fa-calendar"></i>
                    <span>Logs</span></a>
            </li>

            <li class="nav-item <?=($page == 'Payslips')?'active':''?>">
                <a class="nav-link" href="<?=base_url()?>payslips">
                    <i class="fas fa-fw fa-calendar"></i>
                    <span>Payslips</span></a>
            </li>

            <li class="nav-item <?=($page == 'About Us')?'active':''?>">
                <a class="nav-link" href="<?=base_url()?>aboutus">
                    <i class="fas fa-fw fa-info"></i>
                    <span>About us</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

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



                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">




                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small" id="fullname"><?=get_myuser_info_employee('firstname')?> <?=get_myuser_info_employee('lastname')?></span>
                                <?php if(get_myuser_info_employee('photo') == ''){ ?>
                                    <img class="img-profile rounded-circle" src="<?=base_url()?>assets/sb-admin/img/undraw_profile.svg">
                                <?php }else{ ?>
                                    <img class="img-profile rounded-circle" src="<?=base_url()?>userside/<?=user_session_val()?>/<?=get_myuser_info_employee('photo')?>">
                                <?php } ?>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?=base_url()?>profile">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->