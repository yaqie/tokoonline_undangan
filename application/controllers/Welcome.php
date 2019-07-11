<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$rand 		= rand(100000000,999999999);
$date 		= date("Y-m-d H:i:s");
$brand 		= "";
$footer 	= "Copyright &copy; 2018 <a href='".config_item('base_url')."'>Project Name</a>. All Rights Reserved";

class Welcome extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_data');
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}


	public function aksi_daftar()
	{
        global $date;
        $db = get_instance()->db->conn_id;

		// mysqli_real_escape_string anti injeksi
        $username 	= mysqli_real_escape_string($db, $this->input->post('username'));
        $email 		= mysqli_real_escape_string($db, $this->input->post('email'));
		$password 	= mysqli_real_escape_string($db, $this->input->post('pass'));
        $password2 	= mysqli_real_escape_string($db, $this->input->post('pass2'));


        // cek pola username . hanya diperbolehkan menggunakan menggunakan huruf , angka , simbol (-) dan (_)
        if(!preg_match("/^[a-zA-Z0-9\_\-]{6,20}$/",$username)){
			$username_valid = false;
			$this->session->set_flashdata('message', '
            Username minimal 6 huruf dan hanya diperbolehkan menggunakan huruf , angka , simbol (-) dan (_).
            ');

            // jika pola tidak sesuai, maka akan di arahkan ke halaman daftar
            redirect(base_url('ganti_redirect'));
		}


		// hitung apakah username sudah tersedia atau belum
        $hitung_username    = $this->db->get_where('users',array('username' => $username))->num_rows();

		// hitung apakah email sudah tersedia atau belum
        $hitung_email       = $this->db->get_where('users',array('email' => $email))->num_rows();


        // hitung username apakah sudah digunakan atau belum
        if($hitung_username == 0){

        	// jika username belum digunakan maka akan mengecek jumlah email
            if($hitung_email == 0){

            	// jika username dan email belum digunakan, maka setelah itu
            	// cek password dan konfirmasi password sudah sama atau belum
                if ($password == $password2) {

                	// jika sudah benar semua, maka akan membuat user baru


                    // ===== enkripsi password =====
                    // inputan password akan di enkripsi terlebih dahulu menggunakan sha512 ,
                    // setelah itu di enkripsi lagi menggunakan password_hash
                    $hashed = hash('sha512', $password);
                    $pass = password_hash($hashed, PASSWORD_DEFAULT);

                    $data = array(
                        'username' => $username,
                        'email' => $email,
                        'password' => $pass,
                        'created' => $date,
                        'level' => 'mahasiswa',
                    );

                    // ===== input data ke tabel =====
                    $this->m_data->input_data($data,'users');


                    // ===== buat set_flashdata =====
                    $this->session->set_flashdata('message', '
                    Pendaftaran berhasil. Silahkan aktifasi akun anda melalui email yang telah kami kirimkan.
                    ');

                    // jika berhasil input akan di arahkan ke halaman login
		            redirect(base_url('ganti_redirect'));

                } else {
                    $this->session->set_flashdata('message', '
                        Ulangi password salah.
                    ');

                    // jika password dan konfirmasi password tidak sama,
                    // maka akan di arahkan ke halaman daftar
		            redirect(base_url('ganti_redirect'));
                }
            } else {
                $this->session->set_flashdata('message', '
                    Email sudah tersedia, silahkan gunakan email lain.
                ');
                // jika email sudah tersedia,
                // maka akan di arahkan ke halaman daftar
	            redirect(base_url('ganti_redirect'));
            }

        } else {
            $this->session->set_flashdata('message', '
                Username sudah tersedia, silahkan gunakan username lain.
            ');
            // jika username sudah tersedia,
            // maka akan di arahkan ke halaman daftar
            redirect(base_url('ganti_redirect'));
        }
    }


    function aksi_login()
    {
        global $date;
        $db = get_instance()->db->conn_id;

        // mysqli_real_escape_string anti injeksi
        $username = mysqli_real_escape_string($db, $this->input->post('username'));
        $password = mysqli_real_escape_string($db, $this->input->post('password'));



        // cek username apakah tersedia di dalam database atau tidak.
        $cek = $this->m_data->getuser($username)->num_rows();


        if ($cek == 0) {
	        // jika username tidak di temukan

            $this->session->set_flashdata('message', '
                Kombinasi Username dan Password Salah!
            ');

            // jika username tidak tersedia dalam database,
            // maka akan di arahkan ke halaman login
            redirect(base_url('ganti_redirect'));


        } else {

        	// jika username ditemukan dalam database

        	// baca data akun dari database
            $getuser = $this->m_data->getuser($username)->result();

            // tampilkan data akun
            foreach ($getuser as $u) {}

            // ganti isi variabel $password_user sesuai tabel
            $password_user = $u->password;

            // koreksi password
            $pass = hash('sha512', $password);
            if (password_verify($pass,$password_user)) {
                if($u->verif == 0){

                    $this->session->set_flashdata('message', '
                        Akun anda belum aktif. Silahkan aktifasi akun melalui email yang sudah kami kirimkan!
                    ');

                    // jika akun belum verifikasi email,
		            // maka akan di arahkan ke halaman login
		            redirect(base_url('ganti_redirect'));

                } else {
                    $where = array(
                        'id_users' => $u->id_users
                    );

                    $data = array(
                        'modified' => $date
                    );

            		// update modified (jika di perlukan dalam tabel)
                    $this->m_data->update_data($where,$data,'users');

                    $data_session = array(
                        'id'        => $u->id_users,
                        'username'  => $u->username,
                        'email'     => $u->email,
                        'status'    => "login"
                    );

        			// membuat session berdasarkan $data_session
                    $this->session->set_userdata($data_session);

                    // masuk ke halaman dashboard
                    redirect(base_url('ganti_redirect'));
                }
            } else {
                $this->session->set_flashdata('message', '
                    Kombinasi Username dan Password Salah!
                ');
                // jika password salah,
	            // maka akan di arahkan ke halaman login
	            redirect(base_url('ganti_redirect'));
            }
        }
    }



    function logout()
    {
		$this->session->sess_destroy();
		redirect(base_url('mahasiswa'));
	}
}
