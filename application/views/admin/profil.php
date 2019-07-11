
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
                                <h4 class="card-title">Pengaturan Website</h4>
                                <h6 class="card-subtitle">Lengkapi data di bawah ini untuk menambahkan informasi ke website Anda.</h6>
                            </div>
                            <hr>
                            <form class="form-horizontal" id="form_setting" action="<?= base_url('p_admin/edit_setting'); ?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Judul Situs</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="judul" name="judul" maxlength="150" value="<?= $setting->judul ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Deskripsi Situs</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="deskripsi" name="deskripsi" maxlength="150" value="<?= $setting->deskripsi ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email1" class="col-sm-3 text-right control-label col-form-label">Logo Depan</label>
                                        <div class="col-sm-9">
                                            <input type="file" class="form-control" id="file" name="file">
                                            Ukuran logo : 166x33
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="card-body">
                                    <div class="form-group m-b-0 text-right">
                                        <button type="submit" id="btnSubmit2" class="btn btn-info waves-effect waves-light">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Pengaturan Profil</h4>
                                <h6 class="card-subtitle">Lengkapi data di bawah ini untuk menambahkan informasi ke website Anda.</h6>
                            </div>
                            <hr>
                            <form class="form-horizontal" id="form_profil" action="<?= base_url('p_admin/edit_profil'); ?>" method="post">
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Username</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="username" name="username" value="<?= $admin->username ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">E-mail</label>
                                        <div class="col-sm-9">
                                            <input type="email" class="form-control" id="email" name="email" value="<?= $admin->email ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email1" class="col-sm-3 text-right control-label col-form-label">Nomor Telepon</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="nomor1" name="nomor1" value="<?= $admin->nohp ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email1" class="col-sm-3 text-right control-label col-form-label">Nomor Whatsapp</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="nomor2" name="nomor2" value="<?= $admin->nowa ?>">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="card-body">
                                    <div class="form-group m-b-0 text-right">
                                        <button type="submit" id="btnSubmit" class="btn btn-info waves-effect waves-light">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Ubah Password</h4>
                                <h6 class="card-subtitle">Simpan dan jaga password anda.</h6>
                            </div>
                            <hr>
                            <form class="form-horizontal" id="form_password" action="<?= base_url('p_admin/edit_password'); ?>" method="post">
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Password Lama</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" name="password_lama">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Password Baru</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" name="password_baru">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email1" class="col-sm-3 text-right control-label col-form-label">Konfirmasi Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" name="konfirmasi_password">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="card-body">
                                    <div class="form-group m-b-0 text-right">
                                        <button type="submit" id="btnSubmit3" class="btn btn-info waves-effect waves-light">Simpan</button>
                                    </div>
                                </div>
                            </form>

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
