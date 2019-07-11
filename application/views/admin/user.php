
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
                                <h4 class="card-title">Semua data user</h4>
                                <h6 class="card-subtitle">Semua (<?= $semua ?>) | User Valid (<?= $valid ?>)</h6>
                            </div>
                            <!-- <hr> -->

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#user" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Semua</span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#valid" role="tab"><span class="hidden-sm-up"><i class="ti-check"></i></span> <span class="hidden-xs-down">User Valid</span></a> </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content tabcontent-border">
                                <div class="tab-pane active" id="user" role="tabpanel">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="zero_config" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Username</th>
                                                        <th>Nama</th>
                                                        <th>E-mail</th>
                                                        <th>Nomor WhatsApp / Telepon</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($users as $u): ?>

                                                    <tr>
                                                        <td>@<?= $u->username ?></td>
                                                        <td><?php if($u->nama == ''){ echo '-'; } else { echo $u->nama; } ?></td>
                                                        <td><?= $u->email ?></td>
                                                        <td><?= $u->nowa ?> / <?php if($u->nohp == ''){ echo '-'; } else { echo $u->nohp; } ?></td>
                                                    </tr>

                                                    <?php endforeach; ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>Username</th>
                                                        <th>Nama</th>
                                                        <th>E-mail</th>
                                                        <th>Nomor WhatsApp / Telepon</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane  p-20" id="valid" role="tabpanel">2</div>
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
