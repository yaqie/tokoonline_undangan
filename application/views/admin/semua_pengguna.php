
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title"><?= $breadcrumb; ?></h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="<?= base_url('admin') ?>">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page"><?= $breadcrumb ?></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
              <?php echo $this->session->flashdata('message');?>
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Semua data pengguna</h4>
                                <h6 class="card-subtitle">Semua (<?= $semua ?>) | Super Admin (<?= $super_admin ?>)</h6>
                            </div>
                            <!-- <hr> -->
                            <div class="card-body">
                              <div class="table-responsive">
                                  <table id="zero_config" class="table table-striped table-bordered">
                                      <thead>
                                          <tr>
                                              <th>Username</th>
                                              <th>Nama</th>
                                              <th>E-mail</th>
                                              <th>Peranan</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                        <?php foreach ($users as $u): ?>

                                          <tr>
                                              <td>@<?= $u->username ?></td>
                                              <td><?= $u->nama ?></td>
                                              <td><?= $u->email ?></td>
                                              <td><?= $u->level ?></td>
                                          </tr>

                                        <?php endforeach; ?>
                                      </tbody>
                                      <tfoot>
                                          <tr>
                                              <th>Username</th>
                                              <th>Nama</th>
                                              <th>E-mail</th>
                                              <th>Peranan</th>
                                          </tr>
                                      </tfoot>
                                  </table>
                              </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- End Row -->

                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>

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


            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <?php $this->load->view('admin/footer_text') ?>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
