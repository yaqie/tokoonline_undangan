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
		$this->db->from('produk');
		$this->db->order_by("id_produk", "desc");
		$produk = $this->db->get()->result();
		
		$data = array(
			'produk' => $produk,
			'web' => $web,
			'admin' => $admin,
		);
		$this->load->view('landingpage/header',$data);
		$this->load->view('landingpage/index',$data);
		$this->load->view('landingpage/footer',$data);
	}


	public function auth()
	{
		$web = $this->m_data->select_where(array('id_setting' => 1),'setting_web')->row();
		$admin = $this->m_data->select_where(array('level' => 'super_admin' ),'user')->row();
		$data = array(
			'web' => $web,
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
			$data = array(
				'web' => $web,
				'admin' => $admin,
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
		$data = array(
			'web' => $web,
			'admin' => $admin,
			'cara' => $cara,
		);
		$this->load->view('landingpage/header',$data);
		$this->load->view('landingpage/cara_pesan',$data);
		$this->load->view('landingpage/footer',$data);
	}

	public function tentang_kami()
	{
		$web = $this->m_data->select_where(array('id_setting' => 1),'setting_web')->row();
		$admin = $this->m_data->select_where(array('level' => 'super_admin' ),'user')->row();
		$tentang = $this->m_data->select_where(array('id_setting' => 3),'setting_web')->row();
		$data = array(
			'web' => $web,
			'admin' => $admin,
			'tentang' => $tentang,
		);
		$this->load->view('landingpage/header',$data);
		$this->load->view('landingpage/tentang_kami',$data);
		$this->load->view('landingpage/footer',$data);
	}

}
?>
