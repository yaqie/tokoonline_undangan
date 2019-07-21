
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?= $breadcrumb ?>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
    <?php echo $this->session->flashdata('message');?>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header">
                    <h4 class="box-title">Pengaturan Website</h4>
                    <h6 class="card-subtitle">Lengkapi data di bawah ini untuk menambahkan informasi ke website Anda.</h6>
                </div>
                
                <form class="form-horizontal" id="form_setting" action="<?= base_url('p_admin/edit_setting'); ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="fname" class="col-sm-2 text-right control-label col-form-label">Judul Situs</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="judul" name="judul" maxlength="150" value="<?= $setting->judul ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-2 text-right control-label col-form-label">Deskripsi Situs</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="deskripsi" name="deskripsi" maxlength="150" value="<?= $setting->deskripsi ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email1" class="col-sm-2 text-right control-label col-form-label">Logo Depan</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" id="file" name="file">
                                Ukuran logo : 155x70
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="box-footer">
                            <button type="submit" id="btnSubmit2" class="btn btn-info waves-effect waves-light">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="box box-info">
                <div class="box-header">
                    <h4 class="card-title">Pengaturan Profil</h4>
                    <h6 class="card-subtitle">Lengkapi data di bawah ini untuk menambahkan informasi ke website Anda.</h6>
                </div>
                <hr>
                <form class="form-horizontal" id="form_profil" action="<?= base_url('p_admin/edit_profil'); ?>" method="post">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="fname" class="col-sm-2 text-right control-label col-form-label">Username</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="username" name="username" value="<?= $admin->username ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-2 text-right control-label col-form-label">Alamat</label>
                            <div class="col-sm-9">
                            <textarea class="form-control" name="alamat"  id="" ><?= $admin->alamat ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-2 text-right control-label col-form-label">E-mail</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" id="email" name="email" value="<?= $admin->email ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email1" class="col-sm-2 text-right control-label col-form-label">Nomor Telepon</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nomor1" name="nomor1" value="<?= $admin->nohp ?>">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="card-body">
                        <div class="box-footer">
                            <button type="submit" id="btnSubmit" class="btn btn-info waves-effect waves-light">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="box box-info">
                <div class="box-header">
                    <h4 class="card-title">Ubah Password</h4>
                    <h6 class="card-subtitle">Simpan dan jaga password anda.</h6>
                </div>
                <hr>
                <form class="form-horizontal" id="form_password" action="<?= base_url('p_admin/edit_password'); ?>" method="post">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="fname" class="col-sm-2 text-right control-label col-form-label">Password Lama</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" name="password_lama">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-2 text-right control-label col-form-label">Password Baru</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" name="password_baru">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email1" class="col-sm-2 text-right control-label col-form-label">Konfirmasi Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" name="konfirmasi_password">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="card-body">
                        <div class="box-footer">
                            <button type="submit" id="btnSubmit3" class="btn btn-info waves-effect waves-light">Simpan</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
      <!--------------------------
        | Your Page Content Here |
        -------------------------->

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
                $('#form_profil').submit(function(){
                    $('#btnSubmit').attr('disabled',true);
                    $('#btnSubmit').html('Mengirim ...');
                });

                $('#form_setting').submit(function(){
                    $('#btnSubmit2').attr('disabled',true);
                    $('#btnSubmit2').html('Mengirim ...');
                });

                $('#form_password').submit(function(){
                    $('#btnSubmit3').attr('disabled',true);
                    $('#btnSubmit3').html('Mengirim ...');
                });
              });
            </script>

  