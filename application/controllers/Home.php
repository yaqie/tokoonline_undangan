<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$rand 		= rand(100000000,999999999);
$date 		= date("Y-m-d H:i:s");

class Home extends CI_Controller {

  function __construct()
	{
		parent::__construct();
		$this->load->model('m_data');
	}

	public function index()
	{
		$web = $this->m_data->select_where(array('id_setting' => 1),'setting_web')->row();
		$admin = $this->m_data->select_where(array('level' => 'super_admin' ),'user')->row();
		$kategori = $this->m_data->tampil_data('kategori')->result();
		
		$this->db->limit(1);
		$this->db->from('kategori');
		$this->db->order_by("id_kategori", "asc");
		$kategori2 = $this->db->get()->row();
		
		$kategori3 = $this->db->query("SELECT * FROM kategori WHERE id_kategori != '$kategori2->id_kategori' ORDER BY id_kategori ASC LIMIT 1")->row();
		
		$this->db->limit(10);
		$this->db->from('produk');
		$this->db->where('kategori', $kategori2->id_kategori);
		$this->db->order_by("id_produk", "desc");
		$produk = $this->db->get()->result();
		
		
		$this->db->limit(10);
		$this->db->from('produk');
		$this->db->where('kategori', $kategori3->id_kategori);
		$this->db->order_by("id_produk", "desc");
		$produk2 = $this->db->get()->result();
		
		$data = array(
			'kategori3' 	=> $kategori3,
			'kategori2' 	=> $kategori2,
			'kategori' 	=> $kategori,
			'produk' 	=> $produk,
			'produk2' 	=> $produk2,
			'web' 		=> $web,
			'admin' 	=> $admin,
		);
		$this->load->view('landingpage/header',$data);
		$this->load->view('landingpage/index',$data);
		$this->load->view('landingpage/footer',$data);
	}

	public function detail($id)
	{
		$web = $this->m_data->select_where(array('id_setting' => 1),'setting_web')->row();
		$admin = $this->m_data->select_where(array('level' => 'super_admin' ),'user')->row();
		
		$produk = $this->m_data->select_where(array('id_produk' => $id),'produk')->row();
		$kategori = $this->m_data->tampil_data('kategori')->result();
		// SELECT  * FROM tbl ORDER BY RAND()
		$produk_lain = $this->db->query("SELECT  * FROM produk ORDER BY RAND() LIMIT 4")->result();

		$data = array(
			'id' 	=> $id,
			'produk_lain' 	=> $produk_lain,
			'produk' 	=> $produk,
			'kategori' => $kategori,
			'web' => $web,
			'admin' => $admin,
		);
		$this->load->view('landingpage/header',$data);
		$this->load->view('landingpage/detail',$data);
		$this->load->view('landingpage/footer',$data);
	}

	
	


	public function auth()
	{
		$web = $this->m_data->select_where(array('id_setting' => 1),'setting_web')->row();
		$admin = $this->m_data->select_where(array('level' => 'super_admin' ),'user')->row();
		$kategori = $this->m_data->tampil_data('kategori')->result();
		$data = array(
			'web' => $web,
			'kategori' 	=> $kategori,
			'admin' => $admin,
		);
		$this->load->view('landingpage/header',$data);
		$this->load->view('landingpage/auth',$data);
		$this->load->view('landingpage/footer',$data);
	}

	public function profil()
	{
		if ($this->session->userdata('status') != "login"){
			redirect(base_url('auth'));
		} else {
			$web = $this->m_data->select_where(array('id_setting' => 1),'setting_web')->row();
			$admin = $this->m_data->select_where(array('level' => 'super_admin' ),'user')->row();
			$kategori = $this->m_data->tampil_data('kategori')->result();
			$profil = $this->m_data->select_where(array('id_user' => $this->session->userdata('id_user') ),'user')->row();
			$data = array(
				'web' => $web,
				'kategori' 	=> $kategori,
				'admin' => $admin,
				'profil' => $profil,
			);
			$this->load->view('landingpage/header',$data);
			$this->load->view('landingpage/profil',$data);
			$this->load->view('landingpage/footer',$data);
		}
	}


	public function cara_pesan()
	{
		$web = $this->m_data->select_where(array('id_setting' => 1),'setting_web')->row();
		$admin = $this->m_data->select_where(array('level' => 'super_admin' ),'user')->row();
		$cara = $this->m_data->select_where(array('id_setting' => 2),'setting_web')->row();
		$kategori = $this->m_data->tampil_data('kategori')->result();
		$data = array(
			'web' => $web,
			'kategori' 	=> $kategori,
			'admin' => $admin,
			'cara' => $cara,
		);
		$this->load->view('landingpage/header',$data);
		$this->load->view('landingpage/cara_pesan',$data);
		$this->load->view('landingpage/footer',$data);
	}
	
	
	public function keranjang()
	{
		$web = $this->m_data->select_where(array('id_setting' => 1),'setting_web')->row();
		$admin = $this->m_data->select_where(array('level' => 'super_admin' ),'user')->row();
		$cara = $this->m_data->select_where(array('id_setting' => 2),'setting_web')->row();
		$kategori = $this->m_data->tampil_data('kategori')->result();
		$id = $this->session->userdata('id_user');
		$transaksi = $this->db->query("SELECT * FROM transaksi WHERE id_user = '$id' ORDER BY id_transaksi DESC")->result();
		$data = array(
			'transaksi' => $transaksi,
			'web' => $web,
			'kategori' 	=> $kategori,
			'admin' => $admin,
			'cara' => $cara,
		);
		$this->load->view('landingpage/header',$data);
		$this->load->view('landingpage/keranjang',$data);
		$this->load->view('landingpage/footer',$data);
	}

	public function tentang_kami()
	{
		$web = $this->m_data->select_where(array('id_setting' => 1),'setting_web')->row();
		$admin = $this->m_data->select_where(array('level' => 'super_admin' ),'user')->row();
		$tentang = $this->m_data->select_where(array('id_setting' => 3),'setting_web')->row();
		$kategori = $this->m_data->tampil_data('kategori')->result();
		$data = array(
			'web' => $web,
			'kategori' 	=> $kategori,
			'admin' => $admin,
			'tentang' => $tentang,
		);
		$this->load->view('landingpage/header',$data);
		$this->load->view('landingpage/tentang_kami',$data);
		$this->load->view('landingpage/footer',$data);
	}


	public function pesan($kode)
	{
		if ($this->session->userdata('status') != "login"){
			redirect(base_url('auth'));
		} else {
			$web = $this->m_data->select_where(array('id_setting' => 1),'setting_web')->row();
			$admin = $this->m_data->select_where(array('level' => 'super_admin' ),'user')->row();
			$kategori = $this->m_data->tampil_data('kategori')->result();
			$profil = $this->m_data->select_where(array('id_user' => $this->session->userdata('id_user') ),'user')->row();
			$transaksi = $this->m_data->select_where(array('kode_transaksi' => $kode),'transaksi')->row();
			$data = array(
				'transaksi' => $transaksi,
				'web' => $web,
				'kategori' 	=> $kategori,
				'admin' => $admin,
				'profil' => $profil,
			);
			$this->load->view('landingpage/header',$data);
			$this->load->view('landingpage/pesan',$data);
			$this->load->view('landingpage/footer',$data);
		}
	}

	public function invoice($kode)
	{
		if ($this->session->userdata('status') != "login"){
			redirect(base_url('auth'));
		} else {
			$web = $this->m_data->select_where(array('id_setting' => 1),'setting_web')->row();
			$admin = $this->m_data->select_where(array('level' => 'super_admin' ),'user')->row();
			$kategori = $this->m_data->tampil_data('kategori')->result();
			$bank = $this->m_data->tampil_data('bank')->result();
			$profil = $this->m_data->select_where(array('id_user' => $this->session->userdata('id_user') ),'user')->row();
			$transaksi = $this->m_data->select_where(array('kode_transaksi' => $kode),'transaksi')->row();
			$produk = $this->m_data->select_where(array('id_produk' => $transaksi->id_produk ),'produk')->row();
			$data = array(
				'kode' => $kode,
				'bank' => $bank,
				'transaksi' => $transaksi,
				'web' => $web,
				'kategori' 	=> $kategori,
				'admin' => $admin,
				'profil' => $profil,
				'produk' => $produk,
			);
			$this->load->view('landingpage/header',$data);
			$this->load->view('landingpage/invoice',$data);
			$this->load->view('landingpage/footer',$data);
		}
	}

}
?>
