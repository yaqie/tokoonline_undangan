<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$rand 		= rand(100000000,999999999);
$date 		= date("Y-m-d H:i:s");

class Admin extends CI_Controller {

  function __construct()
	{
		parent::__construct();
		$this->load->model('m_data');
	}

	public function index()
	{

    if ($this->session->userdata('status') != "loginadmin"){
      $this->load->view('admin2/login');
    } else if ($this->session->userdata('status') == "loginadmin"){
      $id_user = $this->session->userdata('id');
      $admin = $this->m_data->select_where(array('id_user' => $id_user,'level' => 'super_admin' ),'user')->row();
      $hitung_user = $this->m_data->select_where(array('level' => 'user' ),'user')->num_rows();
      $hitung_masuk = $this->m_data->select_where(array('status' => '1' ),'transaksi')->num_rows();
      $hitung_konfirmasi = $this->m_data->select_where(array('status' => '2' ),'transaksi')->num_rows();
      $hitung_produk = $this->m_data->tampil_data('produk')->num_rows();
      $data = array(
        'hitung_user' => $hitung_user,
        'hitung_masuk' => $hitung_masuk,
        'hitung_konfirmasi' => $hitung_konfirmasi,
        'hitung_produk' => $hitung_produk,
        'admin' => $admin,
        'breadcrumb' => 'Beranda',
      );
      $this->load->view('admin2/header',$data);
      $this->load->view('admin2/dashboard',$data);
      $this->load->view('admin2/footer',$data);
    }

	}

  public function profil()
  {
    if ($this->session->userdata('status') != "loginadmin"){
      redirect(base_url('admin'));
    } else {
      $id_user = $this->session->userdata('id');
      $admin = $this->m_data->select_where(array('id_user' => $id_user,'level' => 'super_admin' ),'user')->row();
      $setting = $this->m_data->select_where(array('id_setting' => '1'),'setting_web')->row();
      $data = array(
        'setting' => $setting,
        'admin' => $admin,
        'breadcrumb' => 'Profil',
      );
      $this->load->view('admin2/header',$data);
      $this->load->view('admin2/profil',$data);
      $this->load->view('admin2/footer',$data);
    }
  }

  public function cara_pesan()
  {
    if ($this->session->userdata('status') != "loginadmin"){
      redirect(base_url('admin'));
    } else {
      $id_user = $this->session->userdata('id');
      $admin = $this->m_data->select_where(array('id_user' => $id_user,'level' => 'super_admin' ),'user')->row();
      $setting = $this->m_data->select_where(array('id_setting' => '2'),'setting_web')->row();
      $data = array(
        'setting' => $setting,
        'admin' => $admin,
        'breadcrumb' => 'Cara Pesan',
      );
      $this->load->view('admin2/header',$data);
      $this->load->view('admin2/cara_pesan',$data);
      $this->load->view('admin2/footer',$data);
    }
  }

  public function tentang_kami()
  {
    if ($this->session->userdata('status') != "loginadmin"){
      redirect(base_url('admin'));
    } else {
      $id_user = $this->session->userdata('id');
      $admin = $this->m_data->select_where(array('id_user' => $id_user,'level' => 'super_admin' ),'user')->row();
      $setting = $this->m_data->select_where(array('id_setting' => '3'),'setting_web')->row();
      $data = array(
        'setting' => $setting,
        'admin' => $admin,
        'breadcrumb' => 'Tentang Kami',
      );
      $this->load->view('admin2/header',$data);
      $this->load->view('admin2/tentang_kami',$data);
      $this->load->view('admin2/footer',$data);
    }
  }

  public function bank()
  {
    if ($this->session->userdata('status') != "loginadmin"){
      redirect(base_url('admin'));
    } else {
      $id_user = $this->session->userdata('id');
      $admin = $this->m_data->select_where(array('id_user' => $id_user,'level' => 'super_admin' ),'user')->row();
      $setting = $this->m_data->select_where(array('id_setting' => '3'),'setting_web')->row();
      $bank = $this->m_data->tampil_data('bank')->result();
      $data = array(
        'bank' => $bank,
        'setting' => $setting,
        'admin' => $admin,
        'breadcrumb' => 'bank',
      );
      $this->load->view('admin2/header',$data);
      $this->load->view('admin2/bank',$data);
      $this->load->view('admin2/footer',$data);
    }
  }

  public function kategori()
  {
    if ($this->session->userdata('status') != "loginadmin"){
      redirect(base_url('admin'));
    } else {
      $id_user = $this->session->userdata('id');
      $admin = $this->m_data->select_where(array('id_user' => $id_user,'level' => 'super_admin' ),'user')->row();
      $setting = $this->m_data->select_where(array('id_setting' => '3'),'setting_web')->row();
      $this->db->from('kategori');
      $this->db->where(array('id_parent' => NULL ));
      $this->db->order_by("id_kategori", "desc");
      $kategori_master = $this->db->get()->result();

      $data = array(
        'kategori_master' => $kategori_master,
        'setting' => $setting,
        'admin' => $admin,
        'breadcrumb' => 'Kategori',
      );
      $this->load->view('admin2/header',$data);
      $this->load->view('admin2/kategori',$data);
      $this->load->view('admin2/footer',$data);
    }
  }
  
  public function slider()
  {
    if ($this->session->userdata('status') != "loginadmin"){
      redirect(base_url('admin'));
    } else {
      $id_user = $this->session->userdata('id');
      $admin = $this->m_data->select_where(array('id_user' => $id_user,'level' => 'super_admin' ),'user')->row();
      $setting4 = $this->m_data->select_where(array('id_setting' => '4'),'setting_web')->row();
      $setting5 = $this->m_data->select_where(array('id_setting' => '5'),'setting_web')->row();
      $setting6 = $this->m_data->select_where(array('id_setting' => '6'),'setting_web')->row();
      $this->db->from('kategori');
      $this->db->where(array('id_parent' => NULL ));
      $this->db->order_by("id_kategori", "desc");
      $kategori_master = $this->db->get()->result();

      $data = array(
        'kategori_master' => $kategori_master,
        'setting4' => $setting4,
        'setting5' => $setting5,
        'setting6' => $setting6,
        'admin' => $admin,
        'breadcrumb' => 'Slider',
      );
      $this->load->view('admin2/header',$data);
      $this->load->view('admin2/slider',$data);
      $this->load->view('admin2/footer',$data);
    }
  }

  public function konfirmasi_pembayaran()
  {
    if ($this->session->userdata('status') != "loginadmin"){
      redirect(base_url('admin'));
    } else {
      $id_user = $this->session->userdata('id');
      $admin = $this->m_data->select_where(array('id_user' => $id_user,'level' => 'super_admin' ),'user')->row();
      $setting = $this->m_data->select_where(array('id_setting' => '3'),'setting_web')->row();
      $konfirmasi_pembayaran = $this->m_data->tampil_data('konfirmasi_pembayaran')->result();
      $transaksi = $this->m_data->tampil_data('transaksi')->result();
      $data = array(
        'konfirmasi_pembayaran' => $konfirmasi_pembayaran,
        'transaksi' => $transaksi,
        'setting' => $setting,
        'admin' => $admin,
        'breadcrumb' => 'konfirmasi pembayaran',
      );
      $this->load->view('admin2/header',$data);
      $this->load->view('admin2/konfirmasi_pembayaran',$data);
      $this->load->view('admin2/footer',$data);
    }
  }

  public function laporan($tgl1 = '',$tgl2 = '')
  {
    if ($this->session->userdata('status') != "loginadmin"){
      redirect(base_url('admin'));
    } else {
      if($tgl1 != '' && $tgl2 != ''){
        $tgl2 = date('Y-m-d', strtotime('+6 days', strtotime($tgl2))); //operasi penjumlahan tanggal sebanyak 6 hari
        $transaksi = $this->m_data->select_where(array("status" => "2","tanggaljam >=" => "$tgl1" , "tanggaljam <= " => "$tgl2+1"),'transaksi')->result(); 
      } else {
        $transaksi = $this->m_data->select_where(array('status' => '2'),'transaksi')->result();
      }
      $id_user = $this->session->userdata('id');
      $admin = $this->m_data->select_where(array('id_user' => $id_user,'level' => 'super_admin' ),'user')->row();
      $setting = $this->m_data->select_where(array('id_setting' => '3'),'setting_web')->row();
      $konfirmasi_pembayaran = $this->m_data->tampil_data('konfirmasi_pembayaran')->result();
      $data = array(
        'konfirmasi_pembayaran' => $konfirmasi_pembayaran,
        'transaksi' => $transaksi,
        'setting' => $setting,
        'admin' => $admin,
        'breadcrumb' => 'laporan',
      );
      $this->load->view('admin2/header',$data);
      $this->load->view('admin2/laporan',$data);
      $this->load->view('admin2/footer',$data);
      
    }
  }

  function export_pdf($tgl1 = '',$tgl2 = '',$id_user = ''){
    $this->load->view('pdf/fpdf');
    // require('assets/pdf/fpdf.php');

    $pdf = new FPDF("L","cm","A4");
    // $admin = $this->m_data->select_where(array('id_user' => $id_user,'level' => 'super_admin' ),'user')->row();
    $admin = $this->db->query("SELECT * FROM user WHERE id_user = '$id_user'")->row();
    $setting = $this->m_data->select_where(array('id_setting' => '1'),'setting_web')->row();
    // echo $admin->nohp;
    $pdf->SetMargins(2,1,1);
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Times','B',11);
    $pdf->Image(base_url().'img_web/804387664.png',1,1,10,2);
    $pdf->SetX(11);            
    $pdf->MultiCell(19.5,0.5,$setting->judul,0,'L');
    $pdf->SetX(11);
    $pdf->MultiCell(19.5,0.5,'Telpon : '.$admin->nohp,0,'L');    
    $pdf->SetFont('Arial','B',10);
    $pdf->SetX(11);
    $pdf->MultiCell(19.5,0.5,$setting->alamat,0,'L');
    $pdf->SetX(11);
    $pdf->MultiCell(19.5,0.5,'website : '.base_url().' | email : '.$admin->email,0,'L');
    $pdf->Line(1,3.1,28.5,3.1);
    $pdf->SetLineWidth(0.1);      
    $pdf->Line(1,3.2,28.5,3.2);   
    $pdf->SetLineWidth(0);
    $pdf->ln(1);
    $pdf->SetFont('Arial','B',14);
    $pdf->Cell(0,0.7,'Laporan Data Penjualan Barang',0,0,'C');
    $pdf->ln(1);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(5,0.7,"Di cetak pada : ".date("D-d/m/Y"),0,0,'C');
    $pdf->ln(1);
    $pdf->Cell(9.5,0.7,"Laporan Penjualan pada : ".$tgl1." sampai ".$tgl2,0,0,'C');
    $pdf->ln(1);
    $pdf->Cell(1, 0.8, 'NO', 1, 0, 'C');
    $pdf->Cell(5, 0.8, 'Tanggal', 1, 0, 'C');
    $pdf->Cell(4, 0.8, 'Nomor Transaksi', 1, 0, 'C');
    $pdf->Cell(5, 0.8, 'Nama Pemesan', 1, 0, 'C');
    $pdf->Cell(4, 0.8, 'Nama Undangan', 1, 0, 'C');
    $pdf->Cell(2.5, 0.8, 'Jumlah', 1, 0, 'C');
    $pdf->Cell(4, 0.8, 'Total Pembayaran', 1, 1, 'C');








    $no=1;
    $total=0;
    $tgl2 = date('Y-m-d', strtotime('+1 days', strtotime($tgl2)));
    $barang = $this->m_data->select_where(array("status" => "2","tanggaljam >=" => "$tgl1" , "tanggaljam <= " => "$tgl2+1"),'transaksi')->result();
    // while($lihat=mysqli_fetch_array($query)){
    foreach($barang as $lihat){
      $konfirmasi_pembayaran = $this->db->query("SELECT * FROM konfirmasi_pembayaran WHERE kode_invoice = '$lihat->kode_transaksi'")->row();             
      $user = $this->db->query("SELECT * FROM user WHERE id_user = '$lihat->id_user'")->row();             
      $produk = $this->db->query("SELECT * FROM produk WHERE id_produk = '$lihat->id_produk'")->row();             
      $kategori = $this->db->query("SELECT * FROM kategori WHERE id_kategori = '$lihat->tipe'")->row();
      $total += $lihat->total;
      $pdf->Cell(1, 0.8, $no , 1, 0, 'C');
      $pdf->Cell(5, 0.8, $lihat->tanggaljam,1, 0, 'C');
      $pdf->Cell(4, 0.8, $lihat->kode_transaksi,1, 0, 'C');
      $pdf->Cell(5, 0.8, $user->nama, 1, 0,'C');
      $pdf->Cell(4, 0.8, $produk->nama_produk, 1, 0,'C');
      $pdf->Cell(2.5, 0.8, $lihat->kuantiti ,1, 0, 'C');
      $pdf->Cell(4, 0.8, "Rp. ".number_format($lihat->total)." ,-", 1, 1,'C');	
      
      $no++;
    }
    // $q=mysqli_query($conn,"select sum(total_harga) as total from barang_laku where tanggal=".$tanggal);
    // // select sum(total_harga) as total from barang_laku where tanggal='$tanggal'
    // while($total=mysqli_fetch_array($q)){
      $pdf->Cell(21.5, 0.8, "Total Omset", 1, 0,'C');		
      $pdf->Cell(4, 0.8, "Rp. ".number_format($total)." ,-", 1, 0,'C');	
    // }
    // $qu=mysqli_query($conn,"select sum(laba) as total_laba from barang_laku where tanggal=".$tanggal);
    // // select sum(total_harga) as total from barang_laku where tanggal='$tanggal'
    // while($tl=mysqli_fetch_array($qu)){
    //   $pdf->Cell(4, 0.8, "Rp. ".number_format($tl['total_laba'])." ,-", 1, 1,'C');	
    // }
    $pdf->Output("laporan_transaksi.pdf","I");
  }

  public function data_pesanan()
  {
    if ($this->session->userdata('status') != "loginadmin"){
      redirect(base_url('admin'));
    } else {
      $id_user = $this->session->userdata('id');
      $admin = $this->m_data->select_where(array('id_user' => $id_user,'level' => 'super_admin' ),'user')->row();
      $setting = $this->m_data->select_where(array('id_setting' => '3'),'setting_web')->row();
      $konfirmasi_pembayaran = $this->m_data->tampil_data('konfirmasi_pembayaran')->result();
      $transaksi = $this->m_data->select_where(array('status' => '2'),'transaksi')->result();
      $data = array(
        'konfirmasi_pembayaran' => $konfirmasi_pembayaran,
        'transaksi' => $transaksi,
        'setting' => $setting,
        'admin' => $admin,
        'breadcrumb' => 'Data Pesanan Undangan Terkonfirmasi',
      );
      $this->load->view('admin2/data_pesanan',$data);
      
    }
  }

  public function user_pembeli()
  {
    if ($this->session->userdata('status') != "loginadmin"){
      redirect(base_url('admin'));
    } else {
      $id_user = $this->session->userdata('id');
      $admin = $this->m_data->select_where(array('id_user' => $id_user,'level' => 'super_admin' ),'user')->row();
      $setting = $this->m_data->select_where(array('id_setting' => '3'),'setting_web')->row();
      $konfirmasi_pembayaran = $this->m_data->tampil_data('konfirmasi_pembayaran')->result();
      $transaksi = $this->m_data->select_where(array('status' => '2'),'transaksi')->result();
      $user = $this->m_data->select_where(array('level' => 'user'),'user')->result();
      $data = array(
        'user' => $user,
        'setting' => $setting,
        'admin' => $admin,
        'breadcrumb' => 'User Pembeli',
      );
      $this->load->view('admin2/header',$data);
      $this->load->view('admin2/user_pembeli',$data);
      $this->load->view('admin2/footer',$data);
    }
  }

  public function tambah_produk()
  {
    if ($this->session->userdata('status') != "loginadmin"){
      redirect(base_url('admin'));
    } else {
      $id_user = $this->session->userdata('id');
      $admin = $this->m_data->select_where(array('id_user' => $id_user,'level' => 'super_admin' ),'user')->row();
      $setting = $this->m_data->select_where(array('id_setting' => '3'),'setting_web')->row();
      $produk = $this->m_data->tampil_data('produk')->result();
      $kategori = $this->m_data->tampil_data('kategori')->result();
      $hitung_gambar_sementara = $this->m_data->select_where(array('id_user' => $id_user),'gambar_sementara')->num_rows();
      if($hitung_gambar_sementara != 0){
        $gambar_sementara = $this->m_data->select_where(array('id_user' => $id_user),'gambar_sementara')->result();
        foreach($gambar_sementara as $g){
          
          $cek_produk = $this->db->query("SELECT * FROM produk WHERE gambar2 = '$g->gambar' OR gambar3 = '$g->gambar' OR gambar4 = '$g->gambar' ")->num_rows();

          $where = array('id_gambar' => $g->id_gambar);
          $this->m_data->hapus_data($where,'gambar_sementara');
          if ($cek_produk == 0) {
            unlink('./produk_img/'.$g->gambar);
          }
        }
      }
      $data = array(
        'produk' => $produk,
        'kategori' => $kategori,
        'setting' => $setting,
        'admin' => $admin,
        'breadcrumb' => 'tambah produk',
      );
      $this->load->view('admin2/header',$data);
      $this->load->view('admin2/tambah_produk',$data);
      $this->load->view('admin2/footer',$data);
    }
  }

  public function tambah_admin()
  {
    if ($this->session->userdata('status') != "loginadmin"){
      redirect(base_url('admin'));
    } else {
      $id_user = $this->session->userdata('id');
      $admin = $this->m_data->select_where(array('id_user' => $id_user,'level' => 'super_admin' ),'user')->row();
      $setting = $this->m_data->select_where(array('id_setting' => '3'),'setting_web')->row();
      $user = $this->m_data->select_where(array('id_user != ' => $id_user,'level' => 'super_admin'),'user')->result();
      $data = array(
        'user' => $user,
        'setting' => $setting,
        'admin' => $admin,
        'breadcrumb' => 'tambah admin',
      );
      $this->load->view('admin2/header',$data);
      $this->load->view('admin2/tambah_admin',$data);
      $this->load->view('admin2/footer',$data);
    }
  }

  public function semua_produk()
  {
    if ($this->session->userdata('status') != "loginadmin"){
      redirect(base_url('admin'));
    } else {
      $id_user = $this->session->userdata('id');
      $admin = $this->m_data->select_where(array('id_user' => $id_user,'level' => 'super_admin' ),'user')->row();
      $setting = $this->m_data->select_where(array('id_setting' => '3'),'setting_web')->row();
      
      $this->db->select('*');
      $this->db->from('produk');
      $this->db->join('kategori','produk.kategori=kategori.id_kategori','Left');
      $query=$this->db->get();
      $produk= $query->result();

      $kategori = $this->m_data->tampil_data('kategori')->result();
      $data = array(
        'produk' => $produk,
        'kategori' => $kategori,
        'setting' => $setting,
        'admin' => $admin,
        'breadcrumb' => 'semua produk',
      );
      $this->load->view('admin2/header',$data);
      $this->load->view('admin2/semua_produk',$data);
      $this->load->view('admin2/footer',$data);
    }
  }

  public function edit_produk($id)
  {
    if ($this->session->userdata('status') != "loginadmin"){
      redirect(base_url('admin'));
    } else {
      $id_user = $this->session->userdata('id');
      $admin = $this->m_data->select_where(array('id_user' => $id_user,'level' => 'super_admin' ),'user')->row();
      $setting = $this->m_data->select_where(array('id_setting' => '3'),'setting_web')->row();
      $produk = $this->m_data->select_where(array('id_produk' => $id),'produk')->row();

      $kategori = $this->m_data->tampil_data('kategori')->result();
      $data = array(
        'p' => $produk,
        'kategori' => $kategori,
        'setting' => $setting,
        'admin' => $admin,
        'breadcrumb' => 'Edit produk',
      );
      $this->load->view('admin2/header',$data);
      $this->load->view('admin2/edit_produk',$data);
      $this->load->view('admin2/footer',$data);
    }
  }
  

  public function semua_pengguna()
  {
    if ($this->session->userdata('status') != "loginadmin"){
      redirect(base_url('admin'));
    } else {
      $id_user = $this->session->userdata('id');
      $admin = $this->m_data->select_where(array('id_user' => $id_user,'level' => 'super_admin' ),'user')->row();
      $users = $this->m_data->select_where(array('level != ' => 'user'),'user')->result();
      $semua = $this->m_data->select_where(array('level != ' => 'user'),'user')->num_rows();
      $super_admin = $this->m_data->select_where(array('level' => 'super_admin'),'user')->num_rows();
      $data = array(
        'super_admin' => $super_admin,
        'semua'       => $semua,
        'users'       => $users,
        'admin'       => $admin,
        'breadcrumb'  => 'Semua Pengguna',
      );
      $this->load->view('admin/header',$data);
      $this->load->view('admin/semua_pengguna',$data);
      $this->load->view('admin/footer',$data);
    }
  }


  public function kategori_master()
  {

    if ($this->session->userdata('status') != "loginadmin"){
      redirect(base_url('admin'));
    } else if ($this->session->userdata('status') == "loginadmin"){
      $id_user = $this->session->userdata('id');
      $admin = $this->m_data->select_where(array('id_user' => $id_user,'level' => 'super_admin' ),'user')->row();
      $this->db->from('kategori');
      $this->db->where(array('id_parent' => NULL ));
      $this->db->order_by("id_kategori", "desc");
      $kategori_master = $this->db->get()->result();

      $data = array(
        'kategori_master'     => $kategori_master,
        'admin'               => $admin,
        'breadcrumb'          => 'Kategori Master',
      );
      $this->load->view('admin/header',$data);
      $this->load->view('admin/kategori_master',$data);
      $this->load->view('admin/footer',$data);
    }

  }


  // public function kategori()
  // {

  //   if ($this->session->userdata('status') != "loginadmin"){
  //     $this->load->view('admin/login');
  //   } else if ($this->session->userdata('status') == "loginadmin"){
  //     $id_user = $this->session->userdata('id');
  //     $admin = $this->m_data->select_where(array('id_user' => $id_user,'level' => 'super_admin' ),'user')->row();
  //     $this->db->from('kategori');
  //     $this->db->where(array('id_parent != ' => NULL, 'id_parent2' => NULL ));
  //     $this->db->order_by("id_kategori", "desc");
  //     $kategori = $this->db->get()->result();

  //     $this->db->from('kategori');
  //     $this->db->where(array('id_parent' => NULL ));
  //     $this->db->order_by("id_kategori", "desc");
  //     $kategori_master = $this->db->get()->result();

  //     $data = array(
  //       'kategori_master'     => $kategori_master,
  //       'kategori'            => $kategori,
  //       'admin'               => $admin,
  //       'breadcrumb'          => 'Kategori',
  //     );
  //     $this->load->view('admin/header',$data);
  //     $this->load->view('admin/kategori',$data);
  //     $this->load->view('admin/footer',$data);
  //   }

  // }


  public function subkategori()
  {

    if ($this->session->userdata('status') != "loginadmin"){
      $this->load->view('admin/login');
    } else if ($this->session->userdata('status') == "loginadmin"){
      $id_user = $this->session->userdata('id');
      $admin = $this->m_data->select_where(array('id_user' => $id_user,'level' => 'super_admin' ),'user')->row();
      $this->db->from('kategori');
      $this->db->where(array('id_parent != ' => NULL, 'id_parent2 != ' => NULL ));
      $this->db->order_by("id_kategori", "desc");
      $subkategori = $this->db->get()->result();

      $this->db->from('kategori');
      $this->db->where(array('id_parent != ' => NULL, 'id_parent2' => NULL ));
      $this->db->order_by("id_kategori", "desc");
      $kategori = $this->db->get()->result();

      $data = array(
        'kategori'            => $kategori,
        'subkategori'         => $subkategori,
        'admin'               => $admin,
        'breadcrumb'          => 'Subkategori',
      );
      $this->load->view('admin/header',$data);
      $this->load->view('admin/subkategori',$data);
      $this->load->view('admin/footer',$data);
    }

  }


  public function izin_usaha()
  {

    if ($this->session->userdata('status') != "loginadmin"){
      redirect(base_url('admin'));
    } else if ($this->session->userdata('status') == "loginadmin"){
      $id_user = $this->session->userdata('id');
      $admin = $this->m_data->select_where(array('id_user' => $id_user,'level' => 'super_admin' ),'user')->row();
      $this->db->from('izin_usaha');
      $this->db->order_by("id_izin_usaha", "desc");
      $izin = $this->db->get()->result();

      $data = array(
        'izin'        => $izin,
        'admin'       => $admin,
        'breadcrumb'  => 'Izin Usaha',
      );
      $this->load->view('admin/header',$data);
      $this->load->view('admin/izin_usaha',$data);
      $this->load->view('admin/footer',$data);
    }

  }

  public function user()
  {
    if ($this->session->userdata('status') != "loginadmin"){
      redirect(base_url('admin'));
    } else {
      $id_user = $this->session->userdata('id');
      $admin = $this->m_data->select_where(array('id_user' => $id_user,'level' => 'super_admin' ),'user')->row();
      $users = $this->m_data->select_where(array('level' => 'user'),'user')->result();
      $semua = $this->m_data->select_where(array('level' => 'user', 'validasi_akun' => 0),'user')->num_rows();
      $valid = $this->m_data->select_where(array('validasi_akun' => 1),'user')->num_rows();
      $data = array(
        'semua'       => $semua,
        'valid'       => $valid,
        'users'       => $users,
        'admin'       => $admin,
        'breadcrumb'  => 'Semua User',
      );
      $this->load->view('admin/header',$data);
      $this->load->view('admin/user',$data);
      $this->load->view('admin/footer',$data);
    }
  }

  public function permintaan_verif()
  {
    if ($this->session->userdata('status') != "loginadmin"){
      redirect(base_url('admin'));
    } else {
      $id_user = $this->session->userdata('id');
      $admin = $this->m_data->select_where(array('id_user' => $id_user,'level' => 'super_admin' ),'user')->row();
      $users = $this->m_data->select_where(array('level' => 'user', 'gambar_ktp !=' => "",'validasi_akun' => 0),'user')->result();
      $semua = $this->m_data->select_where(array('level' => 'user', 'gambar_ktp !=' => "",'validasi_akun' => 0),'user')->num_rows();
      $data = array(
        'semua'       => $semua,
        'users'       => $users,
        'admin'       => $admin,
        'breadcrumb'  => 'Permintaan Verif',
      );
      $this->load->view('admin/header',$data);
      $this->load->view('admin/permintaan_verif',$data);
      $this->load->view('admin/footer',$data);
    }
  }

}
?>
