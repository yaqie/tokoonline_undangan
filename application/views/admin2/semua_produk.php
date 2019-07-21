
  

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
          
          <!-- /.box -->


          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Data Semua Produk</h3>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID Produk</th>
                  <th>Nama Produk</th>
                  <th>Kategori</th>
                  <th>Harga</th>
                  <th>Berat</th>
                  <th>Gambar</th>
                  <th>#</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($produk as $p):              
                ?>
                <tr>
                  <td><?= $p->id_produk ?></td>
                  <td><?= $p->nama_produk ?></td>
                  <td><?= $p->nama_kategori ?></td>
                  <td><?= $p->harga ?></td>
                  <td><?= $p->berat ?> gram</td>
                  <td><img src="<?= base_url('produk_img/') ?><?= $p->gambar ?>" style="width:60px; height:60px;"></td>
                  <td><a href="<?= base_url('p_admin/hapus_produk/'.$p->id_produk) ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ?')">Hapus</a> 
                  <a href="<?= base_url('admin/edit_produk/'.$p->id_produk) ?>" class="btn btn-success">Edit</a>
                  </td>
                </tr>
                <?php endforeach ?>
                </tbody>
                <tfoot>
                <tr>
                <th>ID Produk</th>
                  <th>Nama Produk</th>
                  <th>Kategori</th>
                  <th>Harga</th>
                  <th>Berat</th>
                  <th>Gambar</th>
                  <th>#</th>
                </tr>
                </tfoot>
              </table>
            </div>

          </div>
          <!-- /.box -->
          <?php foreach ($produk as $p): ?>    
            <div class="modal fade" id="modal-default<?= $p->id_produk ?>">                        
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title">Edit Produk</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>                    
                </div>
                <div class="modal-body">
                <form action="<?= base_url('p_admin/edit_produk'); ?>" method="post" class="" enctype="multipart/form-data">
                        <input type="hidden" name="id" class="form-control" value="<?= $p->id_produk ?>">                     
                        <label for="side-overlay-profile-email">Nama Produk</label>
                        <input type="text" name="nama_produk" class="form-control" value="<?= $p->nama_produk ?>"> 
                        <label for="side-overlay-profile-email">Kategori</label>
                        <select class="form-control" name="kategori" required="true">
                          <option value="none" selected="" disabled="">Pilih Salah Satu</option>
                          <option value="1">Undangan Pernikahan</option>
                          <option value="2">Undangan Khitanan</option>
                        </select>
                        <label for="side-overlay-profile-email">Harga</label>
                        <input type="number" name="harga" class="form-control" value="<?= $p->harga ?>">
                        <label for="side-overlay-profile-email">Berat</label>
                        <input type="number" name="berat" class="form-control" value="<?= $p->berat ?>">
                        <label for="side-overlay-profile-email">Deskripsi</label>
                        <textarea id="editor" name="deskripsi" rows="10" cols="80"><?= $p->deskripsi ?></textarea>
                        <label for="side-overlay-profile-email">Gambar</label>
                        <input type="file" class="form-control" id="file" name="file">
                           Ukuran Gambar : 166x33
                        <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                </form>
                </div>
                
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
            </div>
            <?php endforeach ?>

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

  