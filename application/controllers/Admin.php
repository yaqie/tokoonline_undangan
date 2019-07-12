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
      $data = array(
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

  public function tambah_produk()
  {
    if ($this->session->userdata('status') != "loginadmin"){
      redirect(base_url('admin'));
    } else {
      $id_user = $this->session->userdata('id');
      $admin = $this->m_data->select_where(array('id_user' => $id_user,'level' => 'super_admin' ),'user')->row();
      $setting = $this->m_data->select_where(array('id_setting' => '3'),'setting_web')->row();
      $produk = $this->m_data->tampil_data('produk')->result();
      $data = array(
        'produk' => $produk,
        'setting' => $setting,
        'admin' => $admin,
        'breadcrumb' => 'tambah produk',
      );
      $this->load->view('admin2/header',$data);
      $this->load->view('admin2/tambah_produk',$data);
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


  public function kategori()
  {

    if ($this->session->userdata('status') != "loginadmin"){
      $this->load->view('admin/login');
    } else if ($this->session->userdata('status') == "loginadmin"){
      $id_user = $this->session->userdata('id');
      $admin = $this->m_data->select_where(array('id_user' => $id_user,'level' => 'super_admin' ),'user')->row();
      $this->db->from('kategori');
      $this->db->where(array('id_parent != ' => NULL, 'id_parent2' => NULL ));
      $this->db->order_by("id_kategori", "desc");
      $kategori = $this->db->get()->result();

      $this->db->from('kategori');
      $this->db->where(array('id_parent' => NULL ));
      $this->db->order_by("id_kategori", "desc");
      $kategori_master = $this->db->get()->result();

      $data = array(
        'kategori_master'     => $kategori_master,
        'kategori'            => $kategori,
        'admin'               => $admin,
        'breadcrumb'          => 'Kategori',
      );
      $this->load->view('admin/header',$data);
      $this->load->view('admin/kategori',$data);
      $this->load->view('admin/footer',$data);
    }

  }


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
