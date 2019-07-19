
  

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
                  <th>Kode Invoice</th>
                  <th>Bank Pengirim</th>
                  <th>Nama Pengirim</th>
                  <th>Tanggal Kirim</th>
                  <th>Jumlah Transfer</th>                 
                  <th>Status</th>   
                  <th>#</th>               
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($konfirmasi_pembayaran as $k): 
                  $transaksi = $this->db->query("SELECT * FROM transaksi WHERE kode_transaksi = '$k->kode_invoice'")->row();             
                ?>
                <tr>
                  <td><?= $k->kode_invoice ?></td>
                  <td><?= $k->bank_pengirim ?></td>
                  <td><?= $k->nama_pengirim ?></td>
                  <td><?= $k->tanggal_transfer ?></td>
                  <td>Rp <?= nominal($k->jumlah_transfer) ?>,-</td>                  
                  <td>
                  <?php
                    if ($transaksi->status == 1){
                  ?> 
                   <span class="label label-primary"> <b>Belum Dikonfirmasi</b></span>
                  <?php } else if ($transaksi->status == 2) { ?>
                   <span class="label label-success"> <b>Dikonfirmasi</b></span>
                  <?php } else { ?>
                   <span class="label label-danger"> <b>Ditolak</b></span>
                  <?php } ?>
                  </td>
                  <td>
                  <?php
                    if ($transaksi->status == 1){
                  ?> 
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default<?= $k->id_konfirmasi ?>">
                                Lihat Detail
                    </button>
                    <a href="<?= base_url('p_admin/konfirmasi/'.$transaksi->id_transaksi); ?>" class="btn btn-success" onclick="return confirm('Apakah anda yakin ingin mengkonfirmasi ?')">Konfirmasi</a>
                    <a href="<?= base_url('p_admin/tolak/'.$transaksi->id_transaksi); ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menolak ?')">Tolak</a>
                  <?php } else { ?>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default<?= $k->id_konfirmasi ?>">
                                Lihat Detail
                    </button>
                  <?php } ?>
                  </td>
                </tr>
                <?php endforeach ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Kode Invoice</th>
                  <th>Bank Pengirim</th>
                  <th>Nama Pengirim</th>
                  <th>Tanggal Kirim</th>
                  <th>Jumlah Transfer</th>                  
                  <th>Status</th> 
                  <th>#</th>                 
                </tr>
                </tfoot>
              </table>
            </div>

          </div>
          <!-- /.box -->
          <?php foreach ($konfirmasi_pembayaran as $k): ?>    
            <div class="modal fade" id="modal-default<?= $k->id_konfirmasi ?>">                        
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title">Detail Pembayaran</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>                    
                </div>
                <div class="modal-body">
                <div class="modal-body">
                            <table class="table table-bordered">
                              <tbody>
                                <tr>
                                  <th width="30%">
                                    <b>Bank Tujuan</b>
                                  </th>
                                  <td><p><?= $k->bank_tujuan ?></p></td>  
                                </tr>
                              </tbody>  
                              <tr>
                                  <th width="30%">
                                    <b>Bank Pengirim</b>
                                  </th>
                                  <td><p><?= $k->bank_pengirim ?></p></td>  
                                </tr>
                              </tbody> 
                              <tr>
                                  <th width="30%">
                                    <b>Nomor Rekening</b>
                                  </th>
                                  <td><p><?= $k->no_rekening ?></p></td>  
                                </tr>
                              </tbody> 
                              <tr>
                                  <th width="30%">
                                    <b>Nama Pengirim</b>
                                  </th>
                                  <td><p><?= $k->nama_pengirim ?></p></td>  
                                </tr>
                              </tbody> 
                              <tr>
                                  <th width="30%">
                                    <b>Tanggal Transfer</b>
                                  </th>
                                  <td><p><?= $k->tanggal_transfer ?></p></td>  
                                </tr>
                              </tbody> 
                              <tr>
                                  <th width="30%">
                                    <b>Jumlah Transfer</b>
                                  </th>
                                  <td><p><b>Rp <?= nominal($k->jumlah_transfer) ?>,-</b></p></td>  
                                </tr>
                              </tbody> 
                              <tr>
                                  <th width="30%">
                                    <b>Gambar</b>
                                  </th>
                                  <td><a target="blank" href="<?= base_url('produk_img/') ?><?= $k->gambar ?>"><img src="<?= base_url('produk_img/') ?><?= $k->gambar ?>"></a></td>  
                                </tr>
                              </tbody> 
                              <tr>
                                  <th width="30%">
                                    <b>Catatan</b>
                                  </th>
                                  <td><p><?= $k->catatan ?></p></td>  
                                </tr>
                              </tbody> 
                            </table>
                          </div>
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

  