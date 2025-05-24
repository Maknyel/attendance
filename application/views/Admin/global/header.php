<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?=$title?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="<?=global_icon()?>" type="image/x-icon">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>assets/admin_template/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?=base_url()?>assets/admin_template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?=base_url()?>assets/admin_template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?=base_url()?>assets/admin_template/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>assets/admin_template/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?=base_url()?>assets/admin_template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?=base_url()?>assets/admin_template/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?=base_url()?>assets/admin_template/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  
  <?php if(isset($is_table)){ ?>
    <link rel="stylesheet" href="<?=base_url()?>assets/admin_template/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/admin_template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/admin_template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <?php } ?>
  <!-- jQuery -->
  <script src="<?=base_url()?>assets/admin_template/plugins/jquery/jquery.min.js"></script>
  <!-- sweetalert -->
  <link href="<?php echo base_url(); ?>assets/admin_login/plugin/sweetalert/sweetalert2.css" rel="stylesheet">
  <script src="<?php echo base_url(); ?>assets/admin_login/plugin/sweetalert/sweetalert2.all.min.js" rel="stylesheet"></script>
  <!-- datepicker -->
  <link href="<?=base_url()?>assets/admin_template/plugins/daterangepicker/daterangepicker.css" rel="stylesheet">
  <script src="<?=base_url()?>assets/admin_template/plugins/moment/moment.min.js"></script>
  <script src="<?=base_url()?>assets/admin_template/plugins/daterangepicker/daterangepicker.js"></script>

  <!-- customized -->
  <link href="<?=base_url()?>assets/admin_template/custom/css/cms.css" rel="stylesheet">
  <script src="<?=base_url()?>assets/admin_template/custom/js/cms.js"></script>
  

<script>
  var base_url = `<?=base_url()?>`;
  
</script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

