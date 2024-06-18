<footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.5
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
<script src="<?php echo $this->Url->webroot("/plugins/jquery-ui/jquery-ui.min.js");?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo $this->Url->webroot("/plugins/bootstrap/js/bootstrap.bundle.min.js");?>"></script>
<!-- ChartJS -->
<script src="<?php echo $this->Url->webroot("/plugins/chart.js/Chart.min.js");?>"></script>
<!-- Sparkline -->
<script src="<?php echo $this->Url->webroot("/plugins/sparklines/sparkline.js");?>"></script>
<!-- JQVMap -->
<script src="<?php echo $this->Url->webroot("/plugins/jqvmap/jquery.vmap.min.js");?>"></script>
<script src="<?php echo $this->Url->webroot("/plugins/jqvmap/maps/jquery.vmap.usa.js");?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo $this->Url->webroot("/plugins/jquery-knob/jquery.knob.min.js");?>"></script>
<!-- daterangepicker -->
<script src="<?php echo $this->Url->webroot("/plugins/moment/moment.min.js");?>"></script>
<script src="<?php echo $this->Url->webroot("/plugins/daterangepicker/daterangepicker.js");?>"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo $this->Url->webroot("/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js");?>"></script>
<!-- Summernote -->
<script src="<?php echo $this->Url->webroot("/plugins/summernote/summernote-bs4.min.js");?>"></script>
<!-- overlayScrollbars -->
<script src="<?php echo $this->Url->webroot("/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js");?>"></script>
 <script src="<?php echo $this->Url->webroot("/plugins/summernote/summernote-bs4.min.js")?>"></script>

<!-- AdminLTE App -->
<?php echo $this->Html->script('adminlte.js') ?>



<!-- AdminLTE for demo purposes -->
<?php echo $this->Html->script('demo.js') ?>

<script>

$('#reservationdate').datetimepicker({
        format: 'L'
    });

</script>
</body>
</html>

