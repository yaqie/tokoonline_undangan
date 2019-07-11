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
		$this->load->view('landingpage/index');
	}

}
?>
