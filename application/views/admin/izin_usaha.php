
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
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Subscribe</h4>
                            <hr>
                            <form id="form_kategori" action="<?= base_url('p_admin/izin_usaha') ?>" method="post">
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="nama" id="exampleInputname2" placeholder="Masukkan Nama">
                                    <small><i>Nama ini mencerminkan bagaimana tampil di situs Anda.</i></small>
                                </div>
                                <button type="submit" id="btnSubmit" class="btn btn-info">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-8">
                  <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Data Kategori Master</h4>
                        <hr>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Jenis Usaha</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
                                  $no=0;
                                  foreach ($izin as $i):
                                  $no++;
                                  ?>

                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><?= $i->nama_izin ?></td>
                                    </tr>

                                  <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Jenis Usaha</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                      </div>
                  </div>
                </div>
            </div>



            <script>
              $(document).ready(function () {
                $('#form_kategori').submit(function(){
                    $('#btnSubmit').attr('disabled',true);
                    $('#btnSubmit').html('Mengirim ...');
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
