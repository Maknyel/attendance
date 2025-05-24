  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
   
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>

    </ul>


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      
      <!-- Notifications Dropdown Menu -->
      <!-- <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="<?=base_url()?>cms/profile" class="dropdown-item <?=($page=='Profile')?'active':''?>">
            <i class="fas fa-users mr-2"></i> Profile
            
          </a>
          <div class="dropdown-divider"></div>
          <a href="<?=base_url()?>cms/logout" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> Logout
            
          </a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li> -->
      <li class="nav-item dropdown navbar-nav" style="padding: 0px 10px;">
        <a class="nav-link div_image_nav_navlink" data-toggle="dropdown" href="#">
            <img src="<?=base_url()?>user_image_semi/<?=get_myuser_info_cms('id')?>/<?=get_myuser_info_cms('photo')?>" onerror="this.onerror=null;this.src='<?=base_url()?>assets/admin_template/dist/img/user2-160x160.jpg';" class="img-circle elevation-2 imgtorewrite2 imgsrc_nav_navlink" alt="User Image">
              
        </a>
        <ul class="user-menu dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
            <li class="user-header bg-light-blue">
              <img style="width:auto;height:100%;" src="<?=base_url()?>user_image_semi/<?=get_myuser_info_cms('id')?>/<?=get_myuser_info_cms('photo')?>" onerror="this.onerror=null;this.src='<?=base_url()?>assets/admin_template/dist/img/user2-160x160.jpg';" class="img-circle elevation-2" alt="User Image">
              <p><?=get_myuser_info_cms('firstname')?> <?=get_myuser_info_cms('lastname')?></p>
            </li>
          <li class="user-footer">
            <div class="pull-left">
                <a href="<?=base_url()?>cms/profile" class="btn btn-default btn-flat ">
                  <!-- <i class="fas fa-user mr-2"></i> -->
                    Profile
                </a>
            </div>
            <div class="pull-right">
                <a href="<?=base_url()?>logout" class="btn btn-default btn-flat">
                  <!-- <i class="far fa-circle mr-2"></i> -->
                  Logout
                </a>
            </div>
          </li>
        </ul>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?=base_url()?>cms" class="brand-link">
      <img src="<?=global_icon()?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><?=global_title()?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <?php if(get_myuser_info_cms('photo') == ''){ ?>
            <img src="<?=base_url()?>assets/admin_template/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          <?php }else{ ?>
            <img src="<?=base_url()?>user_image_semi/<?=get_myuser_info_cms('id')?>/<?=get_myuser_info_cms('photo')?>" class="img-circle elevation-2" alt="User Image">
          <?php } ?>
        </div>
        <div class="info">
          <a href="#" class="d-block"><?=get_myuser_info_cms('firstname')?> <?=get_myuser_info_cms('lastname')?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          

          <li class="nav-item">
            <a href="<?=base_url()?>cms" class="nav-link <?=($page == 'Dashboard')?'active':''?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-header">MANAGE</li>
          

          <li class="nav-item">
            <a href="<?=base_url()?>cms/position" class="nav-link <?=($page == 'Position')?'active':''?>">
              <i class="nav-icon fa fa-suitcase"></i>
              <p>
                Position
              </p>
            </a>
          </li>

          

          <li class="nav-item">
            <a href="<?=base_url()?>cms/employee_type" class="nav-link <?=($page == 'Employee Type')?'active':''?>">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Employee Type
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?=base_url()?>cms/leave_type" class="nav-link <?=($page == 'Leave Type')?'active':''?>">
              <i class="nav-icon fa fa-list"></i>
              <p>
                Leave Type
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?=base_url()?>cms/schedule" class="nav-link <?=($page == 'Schedule')?'active':''?>">
              <i class="nav-icon fa fa-clock"></i>
              <p>
                Schedule
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?=base_url()?>cms/employee" class="nav-link <?=($page == 'Employee')?'active':''?>">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Employee
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?=base_url()?>cms/a_employee" class="nav-link <?=($page == 'Archive Employee')?'active':''?>">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Archived Employee
              </p>
            </a>
          </li>


          

          <li class="nav-header">ATTENDANCE</li>

          <li class="nav-item">
            <a href="<?=base_url()?>cms/attendance" class="nav-link <?=($page == 'Attendance')?'active':''?>">
              <i class="nav-icon fa fa-calendar"></i>
              <p>
                Attendance
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?=base_url()?>cms/pending_leaves" class="nav-link <?=($page == 'Pending Leaves')?'active':''?>">
              <i class="nav-icon fa fa-list"></i>
              <p>
                Pending Leaves - <?=pending_leaves_count()?>
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?=base_url()?>cms/leave" class="nav-link <?=($page == 'Leave')?'active':''?>">
              <i class="nav-icon fa fa-list"></i>
              <p>
                All Leaves
              </p>
            </a>
          </li>

          <li class="nav-header">PAYROLL</li>
          

          <li class="nav-item">
            <a href="<?=base_url()?>cms/payroll" class="nav-link <?=($page == 'Payroll')?'active':''?>">
              <i class="nav-icon fa fa-suitcase"></i>
              <p>
                Payroll
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?=base_url()?>cms/holiday" class="nav-link <?=($page == 'Holiday')?'active':''?>">
              <i class="nav-icon fa fa-suitcase"></i>
              <p>
                Holiday
              </p>
            </a>
          </li>

          <li class="nav-header">BACKUP</li>
          
          <li class="nav-item">
            <a href="<?=base_url()?>cms/backup" class="nav-link <?=($page == 'Backup')?'active':''?>">
              <i class="nav-icon fa fa-suitcase"></i>
              <p>
                Backup
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?=base_url()?>cms/about_us" class="nav-link <?=($page == 'About Us')?'active':''?>">
              <i class="nav-icon fa fa-users"></i>
              <p>
                About US
              </p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?=$page_orig?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><?=$page_orig?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->