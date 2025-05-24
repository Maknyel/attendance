   
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2021 <a href="https://callmaxsolutions.com/">Callmax Solution Inc.</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery UI 1.11.4 -->
<script src="<?=base_url()?>assets/admin_template/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?=base_url()?>assets/admin_template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<?php if($page == 'Dashboard'){ ?>
  <script src="<?=base_url()?>assets/admin_template/Chart.js"></script>
<?php } ?>
<?php if(isset($is_table)){ ?>
    <script src="<?=base_url()?>assets/admin_template/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?=base_url()?>assets/admin_template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?=base_url()?>assets/admin_template/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?=base_url()?>assets/admin_template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?=base_url()?>assets/admin_template/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?=base_url()?>assets/admin_template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?=base_url()?>assets/admin_template/plugins/jszip/jszip.min.js"></script>
    <script src="<?=base_url()?>assets/admin_template/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="<?=base_url()?>assets/admin_template/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="<?=base_url()?>assets/admin_template/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?=base_url()?>assets/admin_template/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?=base_url()?>assets/admin_template/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>




<script type="text/javascript">
  $(document).ready( function () {
    $('#table_id').DataTable({
      dom: 'Bfrtip',
          lengthMenu: [
                [ 10, 25, 50, 100, 500, 1000 ],
                [ '10 rows', '25 rows', '50 rows', '100 rows', '500 rows', '1000 rows' ]
            ],
          buttons: [
            {
              extend: 'pageLength'
            },
            // {
            //   extend: 'pdf',
            //   title: 'Report',
            //   exportOptions: {
            //       modifier: {
            //           page: 'current',
            //       },
            //       // columns: [0, 1]
            //   }
            // },
            {
              extend: 'excelHtml5',
              title: 'Report',
              exportOptions: {
                // columns: [0, 1]
              }
            },
            {
              extend: 'copyHtml5',
              exportOptions: {
                // columns: [0, 1]
              }
            },
          ],
    });
} );
</script>
<?php } ?>
<!-- Summernote -->
<script src="<?=base_url()?>assets/admin_template/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?=base_url()?>assets/admin_template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>assets/admin_template/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url()?>assets/admin_template/dist/js/demo.js"></script>
</body>
</html>


<script>
   function alertfunction(title,content,smile_emo){
      setTimeout(function () {
          Swal.fire({
          allowOutsideClick: false,
            title: title,
            text: content,
            icon: smile_emo,
            confirmButtonText: 'OK',
          })
      }, 100);
  };

  function alert_redirection(title,content,redirect,smile_emo){
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
  };  
 </script>