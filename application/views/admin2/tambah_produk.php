<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?= $breadcrumb ?>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
    <?php echo $this->session->flashdata('message');?>
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tambahkan Produk Baru</h3>
            </div>
            
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" id="form_setting" action="<?= base_url('p_admin/tambah_produk'); ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            <div class="box-body">
                <div class="form-group">
                    <label for="fname" class="col-sm-2 text-right control-label col-form-label">Nama Produk</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nama_produk" name="nama_produk" maxlength="150" value="" placeholder="Masukkan Nama Produk" required="true">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lname" class="col-sm-2 text-right control-label col-form-label">Kategori</label>
                    <div class="col-sm-9">
                    <select class="form-control" name="kategori" required="true">
                        <option value="none" selected="" disabled="">Pilih Salah Satu</option>
                        <?php foreach ($kategori as $k): ?>    
                        <option value="<?= $k->id_kategori ?>"><?= $k->nama_kategori ?></option>
                        <?php endforeach ?>
                    </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lname" class="col-sm-2 text-right control-label col-form-label">Harga</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="harga" name="harga" maxlength="150" value="" placeholder="Masukkan harga (Contoh: 50000)" required="true">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lname" class="col-sm-2 text-right control-label col-form-label">Berat</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="berat" name="berat" maxlength="150" value="" placeholder="Masukkan berat dalam gram (Contoh: 10) " required="true">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lname" class="col-sm-2 text-right control-label col-form-label">Deskripsi</label>
                    <div class="col-sm-9">
                    <textarea id="editor1" name="deskripsi" rows="10" cols="80"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lname" class="col-sm-2 text-right control-label col-form-label">Gambar Utama</label>
                    <div class="col-sm-9">
                    <input type="file" class="form-control" id="file" name="file">
                    Ukuran Gambar : 166x33
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lname" class="col-sm-2 text-right control-label col-form-label">Tambahkan Gambar Lainya</label>
                    <div class="col-sm-9">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                      Tambah
                    </button>
                    </div>
                </div>
            </div>
              <!-- /.box-body -->

              <div class="box-footer">
              <button type="submit" id="btnSubmit2" class="btn btn-info waves-effect waves-light">Tambah</button>
              </div>
            </form>

          </div>
          <!-- /.box -->


          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form id="form1" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <input type="hidden" id="id_user" name="id_user" value="<?= $admin->id_user; ?>">
                      <input type="file" id="file" name="file" accept="image/*" name="image" />
                      
                      <div id="foto1"></div>

                      <div id="loading_kirim1">
                        <!-- <input class="btn btn-success" type="submit" value="Upload" readonly> -->
                        <button type="submit" class="btn btn-primary ladda-button" data-style="slide-left" data-plugin="ladda">
                          <span class="ladda-label">Kirim</span>
                        </button>
                      </div>
                    </div>
                  </form>
                  <form id="form2" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <input type="hidden" id="id_user" name="id_user" value="<?= $admin->id_user; ?>">
                      <input type="file" id="file" name="file" accept="image/*" name="image" />
                      <div id="foto2"></div>

                      <div id="loading_kirim2">
                        <!-- <input class="btn btn-success" type="submit" value="Upload" readonly> -->
                        <button type="submit" class="btn btn-primary ladda-button" data-style="slide-left" data-plugin="ladda">
                          <span class="ladda-label">Kirim</span>
                        </button>
                      </div>
                    </div>
                  </form>
                  <form id="form3" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <input type="hidden" id="id_user" name="id_user" value="<?= $admin->id_user; ?>">
                      <input type="file" id="file" name="file" accept="image/*" name="image" />
                      <div id="foto3"></div>

                      <div id="loading_kirim3">
                        <!-- <input class="btn btn-success" type="submit" value="Upload" readonly> -->
                        <button type="submit" class="btn btn-primary ladda-button" data-style="slide-left" data-plugin="ladda">
                          <span class="ladda-label">Kirim</span>
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          

        </div>
        <!--/.col (left) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="pull-right-container">
                    <span class="label label-danger pull-right">70%</span>
                  </span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<script>
    $(document).ready(function () {


    $("#form1").on('submit',(function(e) {
    e.preventDefault();
      $('#loading_kirim1').html('<button type="submit" class="btn btn-primary ladda-button" data-style="slide-left" data-plugin="ladda"><span class="ladda-label" disabled>Mengirim ...</span></button>');
      $.ajax({
        url: "<?= base_url(); ?>p_admin/gambar_tambahan",
        type: "POST",
        data: new FormData(this),
        dataType: "JSON",
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {
          if (data.code == '200') {
            $('#loading_kirim1').html('<button type="submit" class="btn btn-primary ladda-button" data-style="slide-left" data-plugin="ladda"><span class="ladda-label">Kirim</span></button>');
          } else if (data.code == '1') {
            $('#loading_kirim1').html('');
            $('#foto1').html('<a href="<?= base_url() ?>produk_img/' + data.foto + '" target="_blank"><img src="<?= base_url() ?>produk_img/' + data.foto + '" style="width:100px;height:100px;"></a>');
          }

        },
        error: function() {
          alert('gagal');
        }
      });
    }));

    $("#form2").on('submit',(function(e) {
    e.preventDefault();
      $('#loading_kirim2').html('<button type="submit" class="btn btn-primary ladda-button" data-style="slide-left" data-plugin="ladda"><span class="ladda-label" disabled>Mengirim ...</span></button>');
      $.ajax({
        url: "<?= base_url(); ?>p_admin/gambar_tambahan",
        type: "POST",
        data: new FormData(this),
        dataType: "JSON",
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {
          if (data.code == '200') {
            $('#loading_kirim2').html('<button type="submit" class="btn btn-primary ladda-button" data-style="slide-left" data-plugin="ladda"><span class="ladda-label">Kirim</span></button>');
          } else if (data.code == '1') {
            $('#loading_kirim2').html('');
            $('#foto2').html('<a href="<?= base_url() ?>produk_img/' + data.foto + '" target="_blank"><img src="<?= base_url() ?>produk_img/' + data.foto + '" style="width:100px;height:100px;"></a>');
          }

        },
        error: function() {
          alert('gagal');
        }
      });
    }));
    
    
    $("#form3").on('submit',(function(e) {
    e.preventDefault();
      $('#loading_kirim3').html('<button type="submit" class="btn btn-primary ladda-button" data-style="slide-left" data-plugin="ladda"><span class="ladda-label" disabled>Mengirim ...</span></button>');
      $.ajax({
        url: "<?= base_url(); ?>p_admin/gambar_tambahan",
        type: "POST",
        data: new FormData(this),
        dataType: "JSON",
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {
          if (data.code == '200') {
            $('#loading_kirim3').html('<button type="submit" class="btn btn-primary ladda-button" data-style="slide-left" data-plugin="ladda"><span class="ladda-label">Kirim</span></button>');
          } else if (data.code == '1') {
            $('#loading_kirim3').html('');
            $('#foto3').html('<a href="<?= base_url() ?>produk_img/' + data.foto + '" target="_blank"><img src="<?= base_url() ?>produk_img/' + data.foto + '" style="width:100px;height:100px;"></a>');
          }

        },
        error: function() {
          alert('gagal');
        }
      });
    }));

    $("#form4").on('submit',(function(e) {
    e.preventDefault();
      $('#loading_kirim4').html('<button type="submit" class="btn btn-primary ladda-button" data-style="slide-left" data-plugin="ladda"><span class="ladda-label" disabled>Mengirim ...</span></button>');
      $.ajax({
        url: "<?= base_url(); ?>p_admin/gambar_tambahan",
        type: "POST",
        data: new FormData(this),
        dataType: "JSON",
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {
          if (data.code == '200') {
            $('#loading_kirim4').html('<button type="submit" class="btn btn-primary ladda-button" data-style="slide-left" data-plugin="ladda"><span class="ladda-label">Kirim</span></button>');
          } else if (data.code == '1') {
            $('#loading_kirim4').html('');
            $('#foto4').html('<a href="<?= base_url() ?>produk_img/' + data.foto + '" target="_blank"><img src="<?= base_url() ?>produk_img/' + data.foto + '" style="width:100px;height:100px;"></a>');
          }

        },
        error: function() {
          alert('gagal');
        }
      });
    }));

    $('#form_setting').submit(function(){
        $('#btnSubmit2').attr('disabled',true);
        $('#btnSubmit2').html('Mengirim ...');
    });

    
    });
</script>

<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>



  