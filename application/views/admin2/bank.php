
  

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
              <h3 class="box-title">Tambahkan Bank Baru</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" id="form_setting" action="<?= base_url('p_admin/tambah_bank'); ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            <div class="box-body">
                <div class="form-group">
                    <label for="fname" class="col-sm-2 text-right control-label col-form-label">Rekening</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="rekening" name="rekening" maxlength="150" value="" placeholder="Masukkan Nomor Rekening">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lname" class="col-sm-2 text-right control-label col-form-label">Nama Bank</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nama_bank" name="nama_bank" maxlength="150" value="" placeholder="Masukkan Nama Bank">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lname" class="col-sm-2 text-right control-label col-form-label">Atas Nama</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="atas_nama" name="atas_nama" maxlength="150" value="" placeholder="Masukkan Atas Nama">
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


          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Data Bank</h3>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID Bank</th>
                  <th>Rekening</th>
                  <th>Nama Bank</th>
                  <th>Atas Nama</th>
                  <th>#</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($bank as $b):              
                ?>
                <tr>
                  <td><?= $b->id_bank ?></td>
                  <td><?= $b->rekening ?></td>
                  <td><?= $b->nama_bank ?></td>
                  <td><?= $b->atas_nama ?></td>
                  <td><a href="<?= base_url('p_admin/hapus_bank/'.$b->id_bank) ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ?')">Hapus</a> 
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default<?= $b->id_bank ?>">
                        Edit
                  </button></td>
                </tr>
                <?php endforeach ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>ID Bank</th>
                  <th>Rekening</th>
                  <th>Nama Bank</th>
                  <th>Atas Nama</th>
                  <th>#</th>
                </tr>
                </tfoot>
              </table>
            </div>

          </div>
          <!-- /.box -->
          <?php foreach ($bank as $b): ?>    
            <div class="modal fade" id="modal-default<?= $b->id_bank ?>">                        
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title">Edit Bank</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>                    
                </div>
                <div class="modal-body">
                <form action="<?= base_url('p_admin/edit_bank'); ?>" method="post" class="" enctype="multipart/form-data">
                        <input type="hidden" name="id" class="form-control" value="<?= $b->id_bank ?>">                     
                        <label for="side-overlay-profile-email">Rekening</label>
                        <input type="text" name="rekening" class="form-control" value="<?= $b->rekening ?>"> 
                        <label for="side-overlay-profile-email">Nama Bank</label>
                        <input type="text" name="nama_bank" class="form-control" value="<?= $b->nama_bank ?>">
                        <label for="side-overlay-profile-email">Atas Nama</label>
                        <input type="text" name="atas_nama" class="form-control" value="<?= $b->atas_nama ?>"><br>
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

  