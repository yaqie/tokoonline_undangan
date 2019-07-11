<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$rand 		= rand(100000000,999999999);
$date 		= date("Y-m-d H:i:s");

class User extends CI_Controller {

  function __construct()
	{
		parent::__construct();
		$this->load->model('m_data');
	}

	public function index()
	{

    if ($this->session->userdata('status') != "login"){
      $this->load->view('user/login');
    } else if ($this->session->userdata('status') == "login"){
      $id_user = $this->session->userdata('id');
      $user = $this->m_data->select_where(array('id_user' => $id_user,'level' => 'user' ),'user')->row();
      $data = array(
        'user' => $user,
        'breadcrumb' => 'Beranda',
      );
      $this->load->view('user/header',$data);
      $this->load->view('user/dashboard',$data);
      $this->load->view('user/footer',$data);
    }

  }
  
  public function profil()
	{

    if ($this->session->userdata('status') != "login"){
      $this->load->view('user/login');
    } else if ($this->session->userdata('status') == "login"){
      $id_user = $this->session->userdata('id');
      $user = $this->m_data->select_where(array('id_user' => $id_user,'level' => 'user' ),'user')->row();
      $data = array(
        'user' => $user,
        'breadcrumb' => 'Profil',
      );
      $this->load->view('user/header',$data);
      $this->load->view('user/profil',$data);
      $this->load->view('user/footer',$data);
    }

  }
  
  public function daftar()
	{
    $this->load->view('user/daftar');
  }

}
?>
