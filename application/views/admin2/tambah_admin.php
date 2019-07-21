
  

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
                    <h4 class="box-title">Form Tambah Admin</h4>
                </div>
                
                <form class="form-horizontal" id="form_setting" action="<?= base_url('p_admin/tambah_admin'); ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="fname" class="col-sm-2 text-right control-label col-form-label">Username</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="username" name="username" maxlength="150" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-2 text-right control-label col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="email" name="email" maxlength="150" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-2 text-right control-label col-form-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="password" name="password" maxlength="150" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-2 text-right control-label col-form-label">Ulangi Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="password" name="password2" maxlength="150" value="">
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="box-footer">
                            <button type="submit" id="btnSubmit2" class="btn btn-info waves-effect waves-light">Tambah</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="box box-info">
                <div class="box-header">
                    <h4 class="card-title">Data Admin</h4>
                </div>
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id User</th>
                  <th>Username</th>
                  <th>E-mail</th>
                  <th>No Hp</th>    
                  <th>#</th>               
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($user as $u):           
                ?>
                <tr>
                  <td><?= $u->id_user ?></td>
                  <td><?= $u->username ?></td>
                  <td><?= $u->email ?></td>
                  <td><?= $u->nohp ?></td>    
                  <td><a href="<?= base_url('p_admin/hapus_user_pembeli/'.$u->id_user) ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ?')"><i class="fa fa-trash"></i></a> 
                  </td>
                </tr>
                <?php endforeach ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Id User</th>
                  <th>Username</th>
                  <th>E-mail</th>
                  <th>No Hp</th>    
                  <th>#</th>                
                </tr>
                </tfoot>
              </table>
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

  