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
		$this->load->view('landingpage/header');
		$this->load->view('landingpage/index');
		$this->load->view('landingpage/footer');
	}


	public function auth()
	{
		$this->load->view('landingpage/header');
		$this->load->view('landingpage/auth');
		$this->load->view('landingpage/footer');
	}

	public function profil()
	{
		if ($this->session->userdata('status') != "login"){
			redirect(base_url('auth'));
		} else {
			$this->load->view('landingpage/header');
			$this->load->view('landingpage/profil');
			$this->load->view('landingpage/footer');
		}
	}


	public function cara_pesan()
	{
		$cara = $this->m_data->select_where(array('id_setting' => 2),'setting_web')->row();
		$data = array(
			'cara' => $cara,
			'asd' => 'asd',
		);
		$this->load->view('landingpage/header',$data);
		$this->load->view('landingpage/cara_pesan',$data);
		$this->load->view('landingpage/footer',$data);
	}

}
?>
