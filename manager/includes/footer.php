 <!-- Main Footer -->
      <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
 <a href="http://www.melvinmultitech.com"><h5 style="color:#9966CC"><strong>Designed by Melvin Multi-Tech Ltd</strong></h5></a>     </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2018 <a href="dashboard"> Hotel la Blaze</a>.</strong> All rights reserved.
      </footer>

   
      </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->
         
    <!-- REQUIRED JS SCRIPTS -->    <!-- jQuery 2.1.4 -->
    <script src="<?php echo ADMIN_PATH; ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo ADMIN_PATH; ?>bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo ADMIN_PATH; ?>plugins/iCheck/icheck.min.js"></script>
	    <!-- DataTables -->
    <script src="<?php echo ADMIN_PATH; ?>plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo ADMIN_PATH; ?>plugins/datatables/dataTables.bootstrap.min.js"></script>

    <!-- SlimScroll -->
    <script src="<?php echo ADMIN_PATH; ?>plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo ADMIN_PATH; ?>plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo ADMIN_PATH; ?>dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo ADMIN_PATH; ?>dist/js/demo.js"></script>
	 <!-- InputMask -->
    <script src="<?php echo ADMIN_PATH; ?>plugins/input-mask/jquery.inputmask.js"></script>
    <script src="<?php echo ADMIN_PATH; ?>plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="<?php echo ADMIN_PATH; ?>plugins/input-mask/jquery.inputmask.extensions.js"></script>
	 <script src="<?php echo ADMIN_PATH; ?>plugins/select2/select2.full.min.js"></script>
	     <script src="<?php echo ADMIN_PATH; ?>plugins/ckeditor/ckeditor.js"></script>
    <script src="<?php echo ADMIN_PATH; ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>


	 <!-- page script -->
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
	 <script>
      $(function () {
        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5();
      });
    </script>
	
	 <script>
      $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1');
        //bootstrap WYSIHTML5 - text editor
      });
    </script>
	
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
	
	<script>
      $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();

        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
              ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
              },
              startDate: moment().subtract(29, 'days'),
              endDate: moment()
            },
        function (start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
        );

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });

        //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();

        //Timepicker
        $(".timepicker").timepicker({
          showInputs: false
        });
      });
    </script>
	

  </body>
</html>
