

<!-- REQUIRED JS SCRIPTS -->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!-- jQuery 3 -->
<script src="<?= base_url('assets/admin2/bower_components/') ?>jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url('assets/admin2/bower_components/') ?>bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/admin2/dist/') ?>js/adminlte.min.js"></script>
<script src="<?= base_url('assets/admin2/bower_components/') ?>ckeditor/ckeditor.js"></script>
<script src="<?= base_url('assets/admin2/bower_components/') ?>datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/admin2/bower_components/') ?>datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>


<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>