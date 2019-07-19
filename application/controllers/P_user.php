<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$rand 		= rand(100000000,999999999);
$date 		= date("Y-m-d H:i:s");

class P_user extends CI_Controller {
  function __construct()
	{
		parent::__construct();
		$this->load->model('m_data');
  }
  
  function search(){
    $db = get_instance()->db->conn_id;

    // mysqli_real_escape_string anti injeksi
    $kategori = mysqli_real_escape_string($db, $this->input->post('kategori'));
    $keyword = mysqli_real_escape_string($db, $this->input->post('keyword'));

    redirect(base_url("search/$kategori/$keyword"));
  }


  function login(){
    $db = get_instance()->db->conn_id;

    // mysqli_real_escape_string anti injeksi
    $username = mysqli_real_escape_string($db, $this->input->post('username'));
    $password = mysqli_real_escape_string($db, $this->input->post('password'));



    // cek username apakah tersedia di dalam database atau tidak.
    $cek = $this->m_data->get_user2($username)->num_rows();


    if ($cek == 0) {
      // jika username tidak di temukan

        $this->session->set_flashdata('message', '
          <div class="alert alert-danger">Username / Password Salah!
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
          </div>
        ');

        // jika username tidak tersedia dalam database,
        // maka akan di arahkan ke halaman login
        redirect(base_url('auth'));


    } else {

      // jika username ditemukan dalam database

      // baca data akun dari database
      $u = $this->m_data->get_user2($username)->row();

      // ganti isi variabel $password_user sesuai tabel
      $password_user = $u->password;

      // koreksi password
      $pass = hash('sha512', $password);
      if (password_verify($pass,$password_user)) {

          $data_session = array(
              'id_user'         => $u->id_user,
              'username_user'   => $u->username,
              'email_user'      => $u->email,
              'status'          => "login"
          );

          // membuat session berdasarkan $data_session
          $this->session->set_userdata($data_session);

          // masuk ke halaman dashboard
          redirect(base_url('profil'));
      } else {
          $this->session->set_flashdata('message', '
            <div class="alert alert-danger">Username / Password Salah!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div>
          ');
          // jika password salah,
          // maka akan di arahkan ke halaman login
          redirect(base_url('auth'));
      }
    }
  }


  function edit_profil()
  {
    if ($this->session->userdata('status') != "login"){
      redirect(base_url('user'));
    } else {
      global $date,$rand;
      $db = get_instance()->db->conn_id;

      $id_user = $this->session->userdata('id');
      $username_asli = $this->session->userdata('username');

      // mysqli_real_escape_string anti injeksi
      $username = mysqli_real_escape_string($db, $this->input->post('username'));
      $email = mysqli_real_escape_string($db, $this->input->post('email'));
      $nama = mysqli_real_escape_string($db, $this->input->post('nama'));
      $nohp = mysqli_real_escape_string($db, $this->input->post('nohp'));
      $alamat = mysqli_real_escape_string($db, $this->input->post('alamat'));

      $where = array(
        'id_user' => $this->session->userdata('id_user')
      );

      $data = array(
        'username'    => $username,
        'email'       => $email,
        'nama'        => $nama,
        'nohp'        => $nohp,
        'alamat'      => $alamat,
      );

      // update modified (jika di perlukan dalam tabel)
      $query = $this->m_data->update_data($where,$data,'user');

      $this->session->set_flashdata('message', '
      <div class="alert alert-success"> Perubahan berhasil!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
      </div>
      ');

      redirect(base_url('profil'));
    }
  }



  function edit_password (){
    $db = get_instance()->db->conn_id;

    // mysqli_real_escape_string anti injeksi
    $password_lama = mysqli_real_escape_string($db, $this->input->post('password_lama'));
    $password_baru = mysqli_real_escape_string($db, $this->input->post('password_baru'));
    $konf_password = mysqli_real_escape_string($db, $this->input->post('konfirmasi_password'));

    $id_user = $this->session->userdata('id');
    $u = $this->m_data->select_where(array('id_user' => $id_user),'user')->row();

    // ganti isi variabel $password_user sesuai tabel
    $password_user = $u->password;

    // koreksi password
    $pass = hash('sha512', $password_lama);
    if (password_verify($pass,$password_user)) {
      //logic ganti password
      if ($password_baru != $konf_password) {
        $this->session->set_flashdata('message', '
          <div class="alert alert-danger"> Password baru dan Konfirmasi password tidak cocok!
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
          </div>
        ');
        // jika password salah,
        // maka akan di arahkan ke halaman login
        redirect(base_url('user/profil'));
      } else {
        $where = array(
          'id_user' => $id_user
        );

        $pass_baru = hash('sha512', $password_baru);
        $hash = password_hash($pass_baru, PASSWORD_DEFAULT);

        $data = array(
          'password'      => $hash,
        );

        // update modified (jika di perlukan dalam tabel)
        $query = $this->m_data->update_data($where,$data,'user');

        redirect(base_url('p_user/logout'));
      }
    } else {
      $this->session->set_flashdata('message', '
        <div class="alert alert-danger"> Password lama salah!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
        </div>
      ');
      // jika password salah,
      // maka akan di arahkan ke halaman login
      redirect(base_url('user/profil'));
    }

  }


  function daftar(){
    global $date;
    $db = get_instance()->db->conn_id;

    // mysqli_real_escape_string anti injeksi
    $username = mysqli_real_escape_string($db, $this->input->post('username'));
    $email = mysqli_real_escape_string($db, $this->input->post('email'));
    $password = mysqli_real_escape_string($db, $this->input->post('password'));
    $password2 = mysqli_real_escape_string($db, $this->input->post('password2'));

    if($password != $password2){
      $this->session->set_flashdata('message', '
        <div class="alert alert-danger"> Konfirmasi Password Salah!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
        </div>
      ');
      // jika password salah,
      // maka akan di arahkan ke halaman login
      redirect(base_url('auth'));
    } else {
      $hitung_username = $this->m_data->select_where(array('username' => $username,'level' => 'user' ),'user')->num_rows();
      $hitung_email = $this->m_data->select_where(array('email' => $email,'level' => 'user' ),'user')->num_rows();
      if($hitung_username > 0){
        $this->session->set_flashdata('message', '
          <div class="alert alert-danger"> Username sudah tersedia, gunakan username lain!
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
          </div>
        ');
        redirect(base_url('auth'));
      } else if($hitung_email > 0) {
        $this->session->set_flashdata('message', '
          <div class="alert alert-danger"> E-mail sudah tersedia, gunakan e-mail lain!
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
          </div>
        ');
        redirect(base_url('auth'));
      } else {
        $pass = hash('sha512', $password);
        $hash = password_hash($pass, PASSWORD_DEFAULT);
        $data = array(
            'username' => $username,
            'email' => $email,
            'password' => $hash,
            'tanggaljam' => $date,
        );
    
        // ===== input data ke tabel =====
        $this->m_data->input_data($data,'user');

        $this->session->set_flashdata('message', '
          <div class="alert alert-success"> Pendaftaran berhasil
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
          </div>
        ');
        // maka akan di arahkan ke halaman login
        redirect(base_url('auth'));
      }
    }
  }


  function pesan()
  {
    global $date;
    if ($this->session->userdata('status') != "login"){
			redirect(base_url('auth'));
		} else {
      $db = get_instance()->db->conn_id;

      // mysqli_real_escape_string anti injeksi
      $id = mysqli_real_escape_string($db, $this->input->post('id'));
      $qty = mysqli_real_escape_string($db, $this->input->post('qty'));
      $tipe = mysqli_real_escape_string($db, $this->input->post('tipe'));

      $cari_transaksi = $this->m_data->tampil_data('transaksi')->num_rows();
      if($cari_transaksi == 0){
        $kode = '0001'; 
      } else {
        $cari_transaksi2 = $this->db->query("SELECT * FROM transaksi ORDER BY id_transaksi DESC LIMIT 1")->row();
        $exp = explode('-',$cari_transaksi2->kode_transaksi);
        $bilangan = $exp[1] + 1;
        $kode = sprintf("%04d", $bilangan);
      }
      $id_user = $this->session->userdata('id_user');

      $data = array(
        'kode_transaksi' => "TR-".$kode,
        'id_produk' => $id,
        'kuantiti' => $qty,
        'id_user' => $id_user,
        'tipe' => $tipe,
        'tanggaljam' => $date,
      );

      // ===== input data ke tabel =====
      $this->m_data->input_data($data,'transaksi');
      redirect(base_url('pesan/TR-'.$kode));
    }
  }

  public function konfirmasi_pesan()
  {
    global $date;
    $db = get_instance()->db->conn_id;

    // mysqli_real_escape_string anti injeksi
    
    $kode   = mysqli_real_escape_string($db, $this->input->post('kode'));
    $id_transaksi   = mysqli_real_escape_string($db, $this->input->post('id_transaksi'));
    $nm1      = mysqli_real_escape_string($db, $this->input->post('nm1'));
    $nm_pang1         = mysqli_real_escape_string($db, $this->input->post('nm_pang1'));
    $nm_ayah1        = mysqli_real_escape_string($db, $this->input->post('nm_ayah1'));
    $nm_ibu1     = mysqli_real_escape_string($db, $this->input->post('nm_ibu1'));
    $anak1     = mysqli_real_escape_string($db, $this->input->post('anak1'));
    $nm2      = mysqli_real_escape_string($db, $this->input->post('nm2'));
    $nm_pang2         = mysqli_real_escape_string($db, $this->input->post('nm_pang2'));
    $nm_ayah2        = mysqli_real_escape_string($db, $this->input->post('nm_ayah2'));
    $nm_ibu2     = mysqli_real_escape_string($db, $this->input->post('nm_ibu2'));
    $anak2     = mysqli_real_escape_string($db, $this->input->post('anak2'));  
    $tgl1     = mysqli_real_escape_string($db, $this->input->post('tgl1'));  
    $jam1     = mysqli_real_escape_string($db, $this->input->post('jam1'));  
    $tempat1     = mysqli_real_escape_string($db, $this->input->post('tempat1'));  
    $tgl2    = mysqli_real_escape_string($db, $this->input->post('tgl2'));  
    $jam2     = mysqli_real_escape_string($db, $this->input->post('jam2'));  
    $tempat2     = mysqli_real_escape_string($db, $this->input->post('tempat2'));
    $hiburan     = mysqli_real_escape_string($db, $this->input->post('hiburan'));
    $mengundang     = mysqli_real_escape_string($db, $this->input->post('mengundang'));
    $ket_lain     = mysqli_real_escape_string($db, $this->input->post('ket_lain'));
    $alamat     = mysqli_real_escape_string($db, $this->input->post('alamat'));
    $ket_lain = str_ireplace(array("\r","\n",'\r','\n'),'', $ket_lain);
    $nama_gambar = $_FILES["file"]["name"];

    if ($nama_gambar == "") {
        $data = array(                
            'id_transaksi' => $id_transaksi,
            'nm1' => $nm1,
            'nm_pang1' => $nm_pang1,
            'nm_ayah1' => $nm_ayah1,
            'nm_ibu1' => $nm_ibu1,
            'anak1' => $anak1,
            'nm2' => $nm2,
            'nm_pang2' => $nm_pang2,
            'nm_ayah2' => $nm_ayah2,
            'nm_ibu2' => $nm_ibu2,
            'anak2' => $anak2,
            'tgl1' => $tgl1,
            'jam1' => $jam1,
            'tempat1' => $tempat1,
            'tgl2' => $tgl2,
            'jam2' => $jam2,
            'tempat2' => $tempat2,
            'hiburan' => $hiburan,
            'mengundang' => $mengundang,
            'ket_lain' => $ket_lain,
        );

        // ===== input data ke tabel =====             
        $this->m_data->input_data($data,'detail_pemesanan');


        $where = array(
          'id_transaksi' => $id_transaksi,
        );
  
        $data2 = array(
          'alamat'      => $alamat,
        );
  
        // update modified (jika di perlukan dalam tabel)
        $query = $this->m_data->update_data($where,$data2,'transaksi');


        $this->session->set_flashdata('message', '
          <div class="alert alert-success"> Berhasil!
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
          </div>
        ');  
        
        // setelah berhasil di redirect ke controller welcome (kalo cuma manggil controllernya brti default functionnya index)
        redirect(base_url('invoice/'.$kode));
    } else {
        # code...
        #code 3
        $ext = pathinfo($nama_gambar, PATHINFO_EXTENSION);
        $img_name = MD5($nama_gambar).".".$ext;

        $config['upload_path']          = './produk_img/';
        $config['allowed_types']        = 'jpg|jpeg|png';
        $config['max_size']             = 2048;
        $config['file_name']            = $img_name;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('file')){
            $error = array('error' => $this->upload->display_errors());
            // $this->load->view('v_upload', $error);
            $this->session->set_flashdata('message', '
            <div class="alert alert-success"> format file tidak diijinkan (.jpg / .png) . Atau ukuran file terlalu besar (2Mb)
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div>
          ');
          redirect(base_url('pesan/'.$kode));
        }else{              

            $data = array(                   
              'id_transaksi' => $id_transaksi,
              'nm1' => $nm1,
              'nm_pang1' => $nm_pang1,
              'nm_ayah1' => $nm_ayah1,
              'nm_ibu1' => $nm_ibu1,
              'anak1' => $anak1,
              'nm2' => $nm2,
              'nm_pang2' => $nm_pang2,
              'nm_ayah2' => $nm_ayah2,
              'nm_ibu2' => $nm_ibu2,
              'anak2' => $anak2,
              'tgl1' => $tgl1,
              'jam1' => $jam1,
              'tempat1' => $tempat1,
              'tgl2' => $tgl2,
              'jam2' => $jam2,
              'tempat2' => $tempat2,
              'hiburan' => $hiburan,
              'mengundang' => $mengundang,
              'ket_lain' => $ket_lain,
              'gambar'  => $img_name,
            );

            // ===== input data ke tabel =====             
            $this->m_data->input_data($data,'detail_pemesanan');

            $where = array(
              'id_transaksi' => $id_transaksi,
            );
      
            $data2 = array(
              'alamat'      => $alamat,
            );
      
            // update modified (jika di perlukan dalam tabel)
            $query = $this->m_data->update_data($where,$data2,'transaksi');


            $this->session->set_flashdata('message', '
            <div class="alert alert-success"> Berhasil!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div>
          ');  
            // setelah berhasil di redirect ke controller welcome (kalo cuma manggil controllernya brti default functionnya index)
            redirect(base_url('invoice/'.$kode));
        }
    }
  }




  public function konfirmasi_pembayaran()
  {
    global $date;
    $db = get_instance()->db->conn_id;

    // mysqli_real_escape_string anti injeksi
    
    $kode           = mysqli_real_escape_string($db, $this->input->post('kode'));
    $banktujuan     = mysqli_real_escape_string($db, $this->input->post('banktujuan'));
    $bankpengirim   = mysqli_real_escape_string($db, $this->input->post('bankpengirim'));
    $norek          = mysqli_real_escape_string($db, $this->input->post('norek'));
    $nama           = mysqli_real_escape_string($db, $this->input->post('nama'));
    $tanggal        = mysqli_real_escape_string($db, $this->input->post('tanggal'));
    $jumlah         = mysqli_real_escape_string($db, $this->input->post('jumlah'));
    $catatan        = mysqli_real_escape_string($db, $this->input->post('catatan'));
    $nama_gambar    = $_FILES["file"]["name"];

    if ($nama_gambar == "") {
        $data = array(                
            'kode_invoice'      => $kode,
            'bank_tujuan'       => $banktujuan,
            'bank_pengirim'     => $bankpengirim,
            'no_rekening'       => $norek,
            'nama_pengirim'     => $nama,
            'tanggal_transfer'  => $tanggal,
            'jumlah_transfer'   => $jumlah,
            'catatan'           => $catatan,
        );

        // ===== input data ke tabel =====             
        $this->m_data->input_data($data,'konfirmasi_pembayaran');

        $where = array(
          'kode_transaksi' => $kode,
        );
  
        $data2 = array(
          'status'      => 1,
        );
  
        // update modified (jika di perlukan dalam tabel)
        $query = $this->m_data->update_data($where,$data2,'transaksi');


        $this->session->set_flashdata('message', '
          <div class="alert alert-success"> Berhasil!
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
          </div>
        ');  
        
        // setelah berhasil di redirect ke controller welcome (kalo cuma manggil controllernya brti default functionnya index)
        redirect(base_url('keranjang/'));
    } else {
        # code...
        #code 3
        $ext = pathinfo($nama_gambar, PATHINFO_EXTENSION);
        $img_name = MD5($nama_gambar).".".$ext;

        $config['upload_path']          = './konf_pembayaran/';
        $config['allowed_types']        = 'jpg|jpeg|png';
        $config['max_size']             = 2048;
        $config['file_name']            = $img_name;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('file')){
            $error = array('error' => $this->upload->display_errors());
            // $this->load->view('v_upload', $error);
            $this->session->set_flashdata('message', '
            <div class="alert alert-success"> format file tidak diijinkan (.jpg / .png) . Atau ukuran file terlalu besar (2Mb)
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div>
          ');
          redirect(base_url('invoice/'.$kode));
        }else{              

            $data = array(                
                'kode_invoice'      => $kode,
                'bank_tujuan'       => $banktujuan,
                'bank_pengirim'     => $bankpengirim,
                'no_rekening'       => $norek,
                'nama_pengirim'     => $nama,
                'tanggal_transfer'  => $tanggal,
                'jumlah_transfer'   => $jumlah,
                'gambar'            => $img_name,
                'catatan'           => $catatan,
            );

            // ===== input data ke tabel =====             
            $this->m_data->input_data($data,'konfirmasi_pembayaran');

            $where = array(
              'kode_transaksi' => $kode,
            );
      
            $data2 = array(
              'status'      => 1,
            );
      
            // update modified (jika di perlukan dalam tabel)
            $query = $this->m_data->update_data($where,$data2,'transaksi');

            $this->session->set_flashdata('message', '
            <div class="alert alert-success"> Berhasil!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div>
          ');  
            // setelah berhasil di redirect ke controller welcome (kalo cuma manggil controllernya brti default functionnya index)
            redirect(base_url('keranjang'));
        }
    }
  }



  function logout()
  {
    $this->session->sess_destroy();
    redirect(base_url(''));
  }



}


?>
