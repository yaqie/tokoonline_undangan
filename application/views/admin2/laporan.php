  

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
              <h3 class="box-title">Pilih Tanggal</h3>
            </div>
            <div class="box-body">
                <form class="form-horizontal" id="form_setting" action="<?= base_url('p_admin/tampil_laporan'); ?>" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="fname" class="col-sm-2 text-right control-label col-form-label">Tanggal 1</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" name="tgl1">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="fname" class="col-sm-2 text-right control-label col-form-label">Tanggal 2</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" name="tgl2">
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="box-footer">
                            <button type="submit" id="btnSubmit2" class="btn btn-info waves-effect waves-light">Tampil</button>
                        </div>
                    </div>
                </form>
            </div>

          </div>
          <!-- /.box -->


          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Laporan</h3>
            </div>
            <div class="box-body">
              <?php
              if($this->uri->segment('3') != '' && $this->uri->segment('4') != ''){
              $tgl1 = $this->uri->segment('3');
              $tgl2 = $this->uri->segment('4');
              ?>
              <a class="btn btn-danger waves-effect waves-light" href="<?= base_url('admin/export_pdf/'.$tgl1."/".$tgl2."/".$this->session->userdata('id')); ?>" target="_blank">Unduh Laporan <i class="fa fa-download"></i></a>
              <?php } ?>
              <br>
              <br>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nomor</th>
                  <th>Tanggal</th>
                  <th>Nomor Transaksi</th>
                  <th>Nama</th>
                  <th>Nama Undangan</th>
                  <th>Jumlah</th>
                  <th>Total Pembayaran</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $no=0;
                $total=0;
                foreach ($transaksi as $k): 
                  $no++;
                  $konfirmasi_pembayaran = $this->db->query("SELECT * FROM konfirmasi_pembayaran WHERE kode_invoice = '$k->kode_transaksi'")->row();             
                  $user = $this->db->query("SELECT * FROM user WHERE id_user = '$k->id_user'")->row();             
                  $produk = $this->db->query("SELECT * FROM produk WHERE id_produk = '$k->id_produk'")->row();             
                  $kategori = $this->db->query("SELECT * FROM kategori WHERE id_kategori = '$k->tipe'")->row();
                  $total += $k->total;             
                ?>
                <tr>
                  <td><?= $no ?></td>
                  <td><?= $k->tanggaljam ?></td>
                  <td><?= $k->kode_transaksi ?></td>
                  <td><?= $user->nama ?></td>
                  <td><?= $produk->nama_produk ?></td>
                  <td><?= $k->kuantiti ?></td>
                  <td>Rp <?= nominal($k->total) ?>,-</td>   
                </tr>
                <?php endforeach ?>
                </tbody>
                
                <tbody>
                <tr>
                  <th colspan="6">Total Omset</th>
                  <th><?= "Rp " . nominal($total) ?></th>
                </tr>
                </tbody>
              </table>
              
            </div>

          </div>
          <!-- /.box -->
          

        </div>
        <!--/.col (left) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



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