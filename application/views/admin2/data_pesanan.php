<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <title>AdminLTE 2 | Starter</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?= base_url('assets/admin2/bower_components/') ?>bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/admin2/bower_components/') ?>font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url('assets/admin2/bower_components/') ?>Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/admin2/bower_components/') ?>datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/admin2/dist/') ?>css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="<?= base_url('assets/admin2/dist/') ?>css/skins/skin-blue.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <!-- <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" /> -->
        <!-- <link href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" /> -->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="<?= base_url('assets/admin2/dist/') ?>img/user2-160x160.jpg" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?= $admin->username ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="<?= base_url('assets/admin2/dist/') ?>img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                <?= $admin->username ?>                 
                </p>
              </li>
              <!-- Menu Body -->
             
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?= base_url('admin/profil'); ?>" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?= base_url('p_admin/logout'); ?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>




  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= base_url('assets/admin2/dist/') ?>img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?= $admin->username ?></p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        
        <!-- Optionally, you can add icons to the links -->
        <li><a href="<?= base_url('admin') ?>"><i class="fa fa-home"></i> <span>Beranda</span></a></li>
        <li class="treeview">
          <a href="#"><i class="fa fa-shopping-cart"></i> <span>Produk</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url('admin/tambah_produk'); ?>">Tambah Produk</a></li>
            <li><a href="<?= base_url('admin/semua_produk'); ?>">Semua Produk</a></li>            
            <li><a href="<?= base_url('admin/kategori'); ?>">Kategori</a></li>            
          </ul>
        </li>
        <li><a href="<?= base_url('admin/konfirmasi_pembayaran') ?>"><i class="fa fa-money"></i> <span>Konfirmasi Pembayaran</span></a></li>
        <li><a href="<?= base_url('admin/data_pesanan') ?>"><i class="fa fa-map-o"></i> <span>Data Pesanan Terkonfirmasi</span></a></li>
        <li><a href="<?= base_url('admin/laporan') ?>"><i class="fa fa-book"></i> <span>Laporan</span></a></li>
        <li><a href="<?= base_url('admin/user_pembeli') ?>"><i class="fa fa-users"></i> <span>User Pembeli</span></a></li>
        <li class="treeview">
          <a href="#"><i class="fa fa-gear"></i> <span>Pengaturan</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url('admin/bank'); ?>">Bank</a></li>
            <li><a href="<?= base_url('admin/cara_pesan'); ?>">Cara Pesan</a></li>
            <li><a href="<?= base_url('admin/tentang_kami'); ?>">Tentang Kami</a></li>
          </ul>
        </li>
        
        <li><a href="<?= base_url('admin/profil'); ?>"><i class="fa fa-user"></i> <span>Profil Saya</span></a></li>
        <li><a href="<?= base_url('p_admin/logout'); ?>"><i class="fa fa-sign-out"></i> <span>Keluar</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
  

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
              <h3 class="box-title">Data Pesanan Undangan yang harus Dibuat</h3>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Kode Invoice</th>
                  <th>Pembeli</th>
                  <th>Kategori</th>
                  <th>Tipe</th>
                  <th>Produk</th>
                  <th>Kuantiti</th>
                  <th>#</th>             
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($transaksi as $k): 
                  $konfirmasi_pembayaran = $this->db->query("SELECT * FROM konfirmasi_pembayaran WHERE kode_invoice = '$k->kode_transaksi'")->row();             
                  $admin = $this->db->query("SELECT * FROM user WHERE id_user = '$k->id_user'")->row();             
                  $produk = $this->db->query("SELECT * FROM produk WHERE id_produk = '$k->id_produk'")->row();             
                  $kategori = $this->db->query("SELECT * FROM kategori WHERE id_kategori = '$k->tipe'")->row();         
                  $detail_pemesanan = $this->db->query("SELECT * FROM detail_pemesanan WHERE id_transaksi = '$k->id_transaksi'")->row();             
                ?>
                <tr>
                  <td><?= $konfirmasi_pembayaran->kode_invoice ?></td>
                  <td><?= $admin->nama ?></td>
                  <td><?= $kategori->nama_kategori ?></td>
                  <td>
                  <?php
                    if ($k->tipe == 1){
                  ?> 
                  Undangan Pernikahan
                  <?php } else { ?>
                  Undangan Khitanan
                  <?php } ?>
                  </td>
                  <td><?= $produk->nama_produk ?></td>
                  <td><?= $k->kuantiti ?></td>
                  <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default<?= $k->id_transaksi ?>">
                        Data Undangan
                    </button></td>   
                </tr>
                <?php endforeach ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Kode Invoice</th>
                  <th>Pembeli</th>
                  <th>Kategori</th>
                  <th>Tipe</th>
                  <th>Produk</th>
                  <th>Kuantiti</th>
                  <th>#</th>                
                </tr>
                </tfoot>
              </table>
            </div>

          </div>
          <!-- /.box -->
          <?php foreach ($transaksi as $k): 
             $konfirmasi_pembayaran = $this->db->query("SELECT * FROM konfirmasi_pembayaran WHERE kode_invoice = '$k->kode_transaksi'")->row();             
             $admin = $this->db->query("SELECT * FROM user WHERE id_user = '$k->id_user'")->row();             
             $produk = $this->db->query("SELECT * FROM produk WHERE id_produk = '$k->id_produk'")->row();             
             $kategori = $this->db->query("SELECT * FROM kategori WHERE id_kategori = '$k->tipe'")->row();         
             $detail_pemesanan = $this->db->query("SELECT * FROM detail_pemesanan WHERE id_transaksi = '$k->id_transaksi'")->row();   
          ?>    
            <div class="modal fade" id="modal-default<?= $k->id_transaksi ?>">                        
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title">Data Undangan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>                    
                </div>
                <div class="modal-body">
                <div class="modal-body">
                            <table class="table table-bordered">
                              <tbody>
                                <?php
                                    if ($k->tipe == 1){
                                ?>
                                <tr>
                                  <th width="50%">
                                    <b>Nama Pengantin Pria / Nama Panggilan / Anak Ke</b>
                                  </th>
                                  <td><p><?= $detail_pemesanan->nm1 ?> / <?= $detail_pemesanan->nm_pang1 ?> / <?= $detail_pemesanan->anak1 ?></p></td>  
                                </tr>
                                <?php } else if ($k->tipe == 2) { ?>
                                    <tr>
                                  <th width="50%">
                                    <b>Nama Pengantin Khitan / Nama Panggilan / Anak Ke</b>
                                  </th>
                                  <td><p><?= $detail_pemesanan->nm1 ?> / <?= $detail_pemesanan->nm_pang1 ?> / <?= $detail_pemesanan->anak1 ?></p></td>  
                                </tr>
                                <?php } ?>
                              </tbody>  
                                <tr>
                                  <th width="50%">
                                  <?php
                                    if ($k->tipe == 1){
                                  ?>
                                    <b>Nama Ayah Pengantin Pria</b>
                                  <?php } else if ($k->tipe == 2) { ?>
                                    <b>Nama Ayah</b>
                                  <?php } ?>
                                  </th>
                                  <td><p><?= $detail_pemesanan->nm_ayah1 ?></p></td>  
                                </tr>
                              </tbody> 
                                <tr>
                                  <th width="50%">
                                  <?php
                                    if ($k->tipe == 1){
                                  ?>
                                    <b>Nama Ibu Pengantin Pria</b>
                                  <?php } else if ($k->tipe == 2) { ?>
                                    <b>Nama Ibu</b>
                                  <?php } ?>
                                  </th>
                                  <td><p><?= $detail_pemesanan->nm_ibu1 ?></p></td>  
                                </tr>
                              </tbody> 
                              <?php
                                    if ($k->tipe == 1){
                              ?>
                                <tr>
                                  <th width="50%">
                                    <b>Nama Pengantin Wanita / Nama Panggilan / Anak Ke</b>
                                  </th>
                                  <td><p><?= $detail_pemesanan->nm2 ?> / <?= $detail_pemesanan->nm_pang2 ?> / <?= $detail_pemesanan->anak2 ?></p></td>  
                                </tr>
                              </tbody>
                              <?php } ?>  
                              <?php
                                    if ($k->tipe == 1){
                              ?>
                                <tr>
                                  <th width="50%">
                                    <b>Nama Ayah Pengantin Wanita</b>
                                  </th>
                                  <td><p><?= $detail_pemesanan->nm_ayah2 ?></p></td>  
                                </tr>
                              </tbody>
                              <?php } ?> 
                              <?php
                                    if ($k->tipe == 1){
                              ?>
                                <tr>
                                  <th width="50%">
                                    <b>Nama Ibu Pengantin Wanita</b>
                                  </th>
                                  <td><p><?= $detail_pemesanan->nm_ibu2 ?></p></td>  
                                </tr>
                              </tbody>
                              <?php } ?>  
                                <tr>
                                  <th width="50%">
                                  <?php
                                    if ($k->tipe == 1){
                                  ?>
                                    <b>Tgl & Jam Akad Nikah</b>
                                  <?php } else if ($k->tipe == 2) { ?>
                                    <b>Tgl & Jam Acara</b>
                                  <?php } ?>  
                                  </th>
                                  <td><?= $detail_pemesanan->tgl1 ?>, <?= $detail_pemesanan->jam1 ?> </td>  
                                </tr>
                              </tbody> 
                                <tr>
                                  <th width="50%">
                                  <?php
                                    if ($k->tipe == 1){
                                  ?>
                                    <b>Tempat Akad</b>
                                  <?php } else if ($k->tipe == 2) { ?>
                                    <b>Tempat Acara</b>
                                  <?php } ?>  
                                  </th>
                                  <td><?= $detail_pemesanan->tempat1 ?></td>  
                                </tr>
                              </tbody> 
                              <?php
                                    if ($k->tipe == 1){
                              ?>
                                <tr>
                                  <th width="50%">
                                    <b>Tgl & Jam Resepsi</b>
                                  </th>
                                  <td><?= $detail_pemesanan->tgl2 ?>, <?= $detail_pemesanan->jam2 ?></td>  
                                </tr>
                              </tbody>
                              <?php } ?>
                              <?php
                                    if ($k->tipe == 1){
                              ?>   
                                <tr>
                                  <th width="50%">
                                    <b>Tempat Resepsi</b>
                                  </th>
                                  <td><?= $detail_pemesanan->tempat2 ?></td>  
                                </tr>
                              </tbody>
                              <?php } ?> 
                                <tr>
                                  <th width="50%">
                                    <b>Hiburan</b>
                                  </th>
                                  <td><?= $detail_pemesanan->hiburan ?></td>  
                                </tr>
                              </tbody> 
                                <tr>
                                  <th width="50%">
                                    <b>Turut Mengundang</b>
                                  </th>
                                  <td><?= $detail_pemesanan->mengundang ?></td>  
                                </tr>
                              </tbody> 
                                <tr>
                                  <th width="50%">
                                    <b>Keterangan Lain</b>
                                  </th>
                                  <td><?= $detail_pemesanan->ket_lain ?></td>  
                                </tr>
                              </tbody>
                                <tr>
                                  <th width="50%">
                                    <b>Gambar</b>
                                  </th>
                                  <td><a href="<?= base_url('produk_img/') ?><?= $detail_pemesanan->gambar ?>" download><?= $detail_pemesanan->gambar ?></a></td>  
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
<script src="<?= base_url('assets/admin2/bower_components/') ?>jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url('assets/admin2/bower_components/') ?>bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/admin2/dist/') ?>js/adminlte.min.js"></script>
<script src="<?= base_url('assets/admin2/bower_components/') ?>ckeditor/ckeditor.js"></script>
<!-- <script src="<?= base_url('assets/admin2/bower_components/') ?>datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/admin2/bower_components/') ?>datatables.net-bs/js/dataTables.bootstrap.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>

<script>
$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'print'
        ]
    } );
} );
</script>


<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>


  