<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$rand 		= rand(100000000,999999999);
$date 		= date("Y-m-d H:i:s");

class P_admin extends CI_Controller {
  function __construct()
	{
		parent::__construct();
		$this->load->model('m_data');
	}


  function login (){
    $db = get_instance()->db->conn_id;

    // mysqli_real_escape_string anti injeksi
    $username = mysqli_real_escape_string($db, $this->input->post('username'));
    $password = mysqli_real_escape_string($db, $this->input->post('password'));



    // cek username apakah tersedia di dalam database atau tidak.
    $cek = $this->m_data->get_user($username)->num_rows();


    if ($cek == 0) {
      // jika username tidak di temukan

        $this->session->set_flashdata('message', '
          <div class="alert alert-danger"> Kombinasi Username dan Password Salah!
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
          </div>
        ');

        // jika username tidak tersedia dalam database,
        // maka akan di arahkan ke halaman login
        redirect(base_url('admin'));


    } else {

      // jika username ditemukan dalam database

      // baca data akun dari database
      $u = $this->m_data->get_user($username)->row();

      // ganti isi variabel $password_user sesuai tabel
      $password_user = $u->password;

      // koreksi password
      $pass = hash('sha512', $password);
      if (password_verify($pass,$password_user)) {

          $data_session = array(
              'id'        => $u->id_user,
              'username'  => $u->username,
              'email'     => $u->email,
              'status'    => "loginadmin"
          );

          // membuat session berdasarkan $data_session
          $this->session->set_userdata($data_session);

          // masuk ke halaman dashboard
          redirect(base_url('admin'));
      } else {
          $this->session->set_flashdata('message', '
            <div class="alert alert-danger"> Kombinasi Username dan Password Salah!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div>
          ');
          // jika password salah,
          // maka akan di arahkan ke halaman login
          redirect(base_url('admin'));
      }
    }
  }

  function edit_cara_pesan()
  {
    if ($this->session->userdata('status') != "loginadmin"){
      redirect(base_url('admin'));
    } else {
      global $date,$rand;
      $db = get_instance()->db->conn_id;
      
      $deskripsi = mysqli_real_escape_string($db, $this->input->post('deskripsi'));  
      $deskripsi = str_ireplace(array("\r","\n",'\r','\n'),'', $deskripsi);
      $c = $this->m_data->select_where(array('id_setting' => 2 ),'setting_web')->row();          

      
        $where = array(
          'id_setting' => 2
        );

        $data = array(
          'deskripsi' => $deskripsi,
        );

        // update modified (jika di perlukan dalam tabel)
        $query = $this->m_data->update_data($where,$data,'setting_web');

        $this->session->set_flashdata('message', '
        <div class="alert alert-success"> Perubahan berhasil!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
        </div>
        ');

        redirect(base_url('admin/cara_pesan'));
      }
    }

    function edit_tentang_kami()
  {
    if ($this->session->userdata('status') != "loginadmin"){
      redirect(base_url('admin'));
    } else {
      global $date,$rand;
      $db = get_instance()->db->conn_id;
      
      $deskripsi = mysqli_real_escape_string($db, $this->input->post('deskripsi'));  
      $deskripsi = str_ireplace(array("\r","\n",'\r','\n'),'', $deskripsi);
      $c = $this->m_data->select_where(array('id_setting' => 3 ),'setting_web')->row();          

      
        $where = array(
          'id_setting' => 3
        );

        $data = array(
          'deskripsi' => $deskripsi,
        );

        // update modified (jika di perlukan dalam tabel)
        $query = $this->m_data->update_data($where,$data,'setting_web');

        $this->session->set_flashdata('message', '
        <div class="alert alert-success"> Perubahan berhasil!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
        </div>
        ');

        redirect(base_url('admin/tentang_kami'));
      }
    }

    function tambah_bank(){
      $db = get_instance()->db->conn_id;
  
      // mysqli_real_escape_string anti injeksi
      $rekening = mysqli_real_escape_string($db, $this->input->post('rekening'));
      $nama_bank = mysqli_real_escape_string($db, $this->input->post('nama_bank'));
      $atas_nama = mysqli_real_escape_string($db, $this->input->post('atas_nama'));
  
      $data = array(
          'rekening' => $rekening,
          'nama_bank' => $nama_bank,
          'atas_nama' => $atas_nama,
      );
  
      // ===== input data ke tabel =====
      $this->m_data->input_data($data,'bank');
  
  
      // ===== buat set_flashdata =====
      $this->session->set_flashdata('message', '
        <div class="alert alert-success"> Bank berhasil ditambah!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
        </div>
      ');
  
      // jika berhasil input akan di arahkan ke halaman login
      redirect(base_url('admin/bank'));
    }

    public function hapus_bank($kode)
    {
        $where = array('id_bank' => $kode);

        $this->m_data->hapus_data($where,'bank');

        $this->session->set_flashdata('message', '
        <div class="alert alert-success"> Bank berhasil dihapus!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
        </div>
      ');
        
        // setelah berhasil di redirect ke controller welcome (kalo cuma manggil controllernya brti default functionnya index)
        redirect(base_url('admin/bank'));
    }
    
    public function hapus_kategori($kode)
    {
        $where = array('id_kategori' => $kode);

        $this->m_data->hapus_data($where,'kategori');

        $this->session->set_flashdata('message', '
        <div class="alert alert-success"> Kategori berhasil dihapus!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
        </div>
      ');
        
        // setelah berhasil di redirect ke controller welcome (kalo cuma manggil controllernya brti default functionnya index)
        redirect(base_url('admin/kategori'));
    }
  
    function edit_bank()
    {
      if ($this->session->userdata('status') != "loginadmin"){
        redirect(base_url('admin'));
      } else {
        global $date,$rand;
        $db = get_instance()->db->conn_id;
      
        $id         = mysqli_real_escape_string($db, $this->input->post('id'));
        $rekening = mysqli_real_escape_string($db, $this->input->post('rekening'));          
        $nama_bank = mysqli_real_escape_string($db, $this->input->post('nama_bank'));          
        $atas_nama = mysqli_real_escape_string($db, $this->input->post('atas_nama'));       
                        
        $where = array('id_bank' => $id );
  
          $data = array(
            'rekening' => $rekening,
            'nama_bank' => $nama_bank,
            'atas_nama' => $atas_nama,
          );
  
          // update modified (jika di perlukan dalam tabel)
          $query = $this->m_data->update_data($where,$data,'bank');
  
          $this->session->set_flashdata('message', '
          <div class="alert alert-success"> Perubahan berhasil!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
          </div>
          ');
  
          redirect(base_url('admin/bank'));
        }
      }
    
    
    function edit_kategori()
    {
      if ($this->session->userdata('status') != "loginadmin"){
        redirect(base_url('admin'));
      } else {
        global $date,$rand;
        $db = get_instance()->db->conn_id;
      
        $id     = mysqli_real_escape_string($db, $this->input->post('id'));
        $nama   = mysqli_real_escape_string($db, $this->input->post('nama'));
                        
        $where = array('id_kategori' => $id );
  
        $data = array(
          'nama_kategori' => $nama,
          'slug' => slug($nama),
        );

        // update modified (jika di perlukan dalam tabel)
        $query = $this->m_data->update_data($where,$data,'kategori');

        $this->session->set_flashdata('message', '
        <div class="alert alert-success"> Perubahan berhasil!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
        </div>
        ');

        redirect(base_url('admin/kategori'));
        }
      }

      public function tambah_produk()
      {
          global $date;
          $db = get_instance()->db->conn_id;
  
          // mysqli_real_escape_string anti injeksi
          
          $nama_produk   = mysqli_real_escape_string($db, $this->input->post('nama_produk'));
          $kategori      = mysqli_real_escape_string($db, $this->input->post('kategori'));
          $harga         = mysqli_real_escape_string($db, $this->input->post('harga'));
          $berat         = mysqli_real_escape_string($db, $this->input->post('berat'));
          $deskripsi     = mysqli_real_escape_string($db, $this->input->post('deskripsi'));
          $deskripsi = str_ireplace(array("\r","\n",'\r','\n'),'', $deskripsi);
          $nama_gambar = $_FILES["file"]["name"];
  
          if ($nama_gambar == "") {
              $data = array(                   
                  
                  'nama_produk'       => $nama_produk,
                  'kategori'          => $kategori,
                  'harga'             => $harga,
                  'berat'             => $berat,
                  'deskripsi'         => $deskripsi,
                  'tgljam'            => $date,
              );
  
              // ===== input data ke tabel =====             
              $this->m_data->input_data($data,'produk');
              $this->session->set_flashdata('message', '
                <div class="alert alert-success"> Produk berhasil ditambah!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                </div>
              ');  
              
              // setelah berhasil di redirect ke controller welcome (kalo cuma manggil controllernya brti default functionnya index)
              redirect(base_url('admin/tambah_produk'));
          } else {
              # code...
              #code 3
              $ext = pathinfo($nama_gambar, PATHINFO_EXTENSION);
              $img_name = MD5($nama_gambar).rand().".".$ext;
  
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
                redirect(base_url('admin/tambah_produk'));
              }else{
                  $id_user = $this->session->userdata('id');
                  $cekgbr1 = $this->m_data->select_where(array('id_user' => $id_user,'gambarke' => '1' ),'gambar_sementara')->num_rows();
                  $gbr1 = $this->m_data->select_where(array('id_user' => $id_user,'gambarke' => '1' ),'gambar_sementara')->row();
                  $cekgbr2 = $this->m_data->select_where(array('id_user' => $id_user,'gambarke' => '2' ),'gambar_sementara')->num_rows();
                  $gbr2 = $this->m_data->select_where(array('id_user' => $id_user,'gambarke' => '2' ),'gambar_sementara')->row();
                  $cekgbr3 = $this->m_data->select_where(array('id_user' => $id_user,'gambarke' => '3' ),'gambar_sementara')->num_rows();
                  $gbr3 = $this->m_data->select_where(array('id_user' => $id_user,'gambarke' => '3' ),'gambar_sementara')->row();
                  if($cekgbr1 == 0){
                    $gambar1 = '';
                  } else {
                    $gambar1 = $gbr1->gambar;
                  }
                  if($cekgbr2 == 0){
                    $gambar2 = '';
                  } else {
                    $gambar2 = $gbr2->gambar;
                  }
                  if($cekgbr3 == 0){
                    $gambar3 = '';
                  } else {
                    $gambar3 = $gbr3->gambar;
                  }

                  $data = array(                   
                      
                    'nama_produk'       => $nama_produk,
                    'kategori'          => $kategori,
                    'harga'             => $harga,
                    'berat'             => $berat,
                    'deskripsi'         => $deskripsi,
                    'tgljam'            => $date,
                    'gambar'            => $img_name,
                    'gambar2'            => $gambar1,
                    'gambar3'            => $gambar2,
                    'gambar4'            => $gambar3,
                  );
  
                  // ===== input data ke tabel =====             
                  $this->m_data->input_data($data,'produk');
                  $this->session->set_flashdata('message', '
                  <div class="alert alert-success"> Produk berhasil ditambah!
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                  </div>
                ');  
                  // setelah berhasil di redirect ke controller welcome (kalo cuma manggil controllernya brti default functionnya index)
                  redirect(base_url('admin/tambah_produk'));
              }
          }
          }

    public function proses_edit_produk()
    {
        
        global $date;
        $db = get_instance()->db->conn_id;

        // mysqli_real_escape_string anti injeksi
        $id          = mysqli_real_escape_string($db, $this->input->post('id'));
        $nama_produk = mysqli_real_escape_string($db, $this->input->post('nama_produk'));
        $kategori    = mysqli_real_escape_string($db, $this->input->post('kategori'));
        $harga       = mysqli_real_escape_string($db, $this->input->post('harga'));
        $berat       = mysqli_real_escape_string($db, $this->input->post('berat'));
        $deskripsi   = mysqli_real_escape_string($db, $this->input->post('deskripsi'));
        $deskripsi   = str_ireplace(array("\r","\n",'\r','\n'),'', $deskripsi);
        $nama_gambar = $_FILES["file"]["name"];

        $where = array('id_produk' => $id );

        if ($nama_gambar == "") {
            $data = array(                   
                
                'nama_produk'       => $nama_produk,
                'kategori'          => $kategori,
                'harga'             => $harga,
                'berat'             => $berat,
                'deskripsi'         => $deskripsi,
            );

// ===== input data ke tabel =====   
$this->m_data->update_data($where,$data,'produk');
$this->session->set_flashdata('message', '
  <div class="alert alert-success"> Produk berhasil diubah!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
  </div>
');  

// setelah berhasil di redirect ke controller welcome (kalo cuma manggil controllernya brti default functionnya index)
redirect(base_url('admin/semua_produk'));
        } else {
            # code...
        
            $data=$this->db->query("SELECT * FROM produk WHERE id_produk=$id ")->row();
            unlink('./produk_img/'.$data->gambar);

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
                    echo json_encode(['code'=>200, 'msg'=>'format file tidak diijinkan (.jpg / .png) . Atau ukuran file terlalu besar (2Mb)']);
                }else{
                   

                    $data = array(                   
                        
                      'nama_produk'       => $nama_produk,
                      'kategori'          => $kategori,
                      'harga'             => $harga,
                      'berat'             => $berat,
                      'deskripsi'         => $deskripsi,
                      'gambar'            => $img_name,
                    );

        // ===== input data ke tabel =====             
        $this->m_data->update_data($where,$data,'produk');
        $this->session->set_flashdata('message', '
        <div class="alert alert-success"> Produk berhasil diubah!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
        </div>
      ');

        // setelah berhasil di redirect ke controller welcome (kalo cuma manggil controllernya brti default functionnya index)
        redirect(base_url('admin/semua_produk'));
    }
}
}

  public function hapus_produk($kode)
    {
        $where = array('id_produk' => $kode);

        $this->m_data->hapus_data($where,'produk');

        $this->session->set_flashdata('message', '
        <div class="alert alert-success"> Produk berhasil dihapus!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
        </div>
      ');
        
        // setelah berhasil di redirect ke controller welcome (kalo cuma manggil controllernya brti default functionnya index)
        redirect(base_url('admin/semua_produk'));
    }

    public function hapus_user_pembeli($kode)
    {
        $where = array('id_user' => $kode);

        $this->m_data->hapus_data($where,'user');

        $this->session->set_flashdata('message', '
        <div class="alert alert-success"> User berhasil dihapus!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
        </div>
      ');
        
        // setelah berhasil di redirect ke controller welcome (kalo cuma manggil controllernya brti default functionnya index)
        redirect(base_url('admin/user_pembeli'));
    }

  function edit_setting()
  {
   
      global $date,$rand;
      $db = get_instance()->db->conn_id;

      $judul = mysqli_real_escape_string($db, $this->input->post('judul'));
      $deskripsi = mysqli_real_escape_string($db, $this->input->post('deskripsi'));
      $alamat = mysqli_real_escape_string($db, $this->input->post('alamat'));

      $nama_gambar = $_FILES["file"]["name"];
      
       
        if ($nama_gambar == ""){
          
          $where = array(
            'id_setting' => 1
          );

          $data = array(                   
                
            'judul'     => $judul,
            'deskripsi' => $deskripsi,
            'alamat'    => $alamat,
        );

        $query = $this->m_data->update_data($where,$data,'setting_web');
            $this->session->set_flashdata('message', '
            <div class="alert alert-success"> Perubahan Berhasil!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div>
            ');

            redirect(base_url('admin/profil'));
        }else{

          $ext = pathinfo($nama_gambar, PATHINFO_EXTENSION);
          $img_name = $rand.".". $ext;
  
          $config['upload_path']          = './img_web/';
          $config['allowed_types']        = 'jpg|jpeg|png';
          $config['max_size']             = 2048;
          $config['file_name']            = $img_name;
  
          $this->load->library('upload', $config);
  
          if ( ! $this->upload->do_upload('file')){
            $error = array('error' => $this->upload->display_errors());
            // $this->load->view('v_upload', $error);
            echo json_encode(['code'=>200, 'msg'=>'format file tidak diijinkan (.jpg / .png) . Atau ukuran file terlalu besar (2Mb)']);
        }else{

            $c = $this->m_data->select_where(array('id_setting' => 1 ),'setting_web')->row();

            
              unlink("./img_web/$c->logo");
            
            //Compress Image
            $config['image_library']='gd2';
            $config['source_image']='./img_web/'.$img_name;
            $config['create_thumb']= FALSE;
            $config['maintain_ratio']= FALSE;
            $config['quality']= '80%';
            $config['width']= 400;
            $config['height']= 70;
            $config['new_image']= './img_web/'.$img_name;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();

            $gbr = $this->upload->data();


            $where = array(
              'id_setting' => 1
            );

            $data = array(
              'judul'     => $judul,
              'deskripsi' => $deskripsi,
              'alamat'    => $alamat,
              'logo'      => $img_name,
            );

        // update modified (jika di perlukan dalam tabel)
        $query = $this->m_data->update_data($where,$data,'setting_web');

        $this->session->set_flashdata('message', '
        <div class="alert alert-success"> Perubahan berhasil!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
        </div>
        ');

        redirect(base_url('admin/profil'));
      }
    }
  }

  public function konfirmasi($kode)
  {
    global $date;
    $db = get_instance()->db->conn_id;

    // mysqli_real_escape_string anti injeksi

        $where = array(
          'id_transaksi' => $kode,
        );
  
        $data2 = array(
          'status'      => 2,
        );
  
        // update modified (jika di perlukan dalam tabel)
        $query = $this->m_data->update_data($where,$data2,'transaksi');
        
        // setelah berhasil di redirect ke controller welcome (kalo cuma manggil controllernya brti default functionnya index)
        redirect(base_url('admin/konfirmasi_pembayaran'));

      }
      
      public function konfirmasi1($kode)
  {
    global $date;
    $db = get_instance()->db->conn_id;

    // mysqli_real_escape_string anti injeksi

        $where = array(
          'id_transaksi' => $kode,
        );
  
        $data2 = array(
          'status'      => 3,
        );
  
        // update modified (jika di perlukan dalam tabel)
        $query = $this->m_data->update_data($where,$data2,'transaksi');
        
        // setelah berhasil di redirect ke controller welcome (kalo cuma manggil controllernya brti default functionnya index)
        redirect(base_url('admin/konfirmasi_pembayaran'));

      }

  public function tolak($kode)
  {
    global $date;
    $db = get_instance()->db->conn_id;

    // mysqli_real_escape_string anti injeksi

        $where = array(
          'id_transaksi' => $kode,
        );
  
        $data2 = array(
          'status'      => -1,
        );
  
        // update modified (jika di perlukan dalam tabel)
        $query = $this->m_data->update_data($where,$data2,'transaksi');
        
        // setelah berhasil di redirect ke controller welcome (kalo cuma manggil controllernya brti default functionnya index)
        redirect(base_url('admin/konfirmasi_pembayaran'));

      }

      function tambah_admin(){
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
          redirect(base_url('admin/tambah_admin'));
        } else {
          $hitung_username = $this->m_data->select_where(array('username' => $username,'level' => 'super_admin' ),'user')->num_rows();
          $hitung_email = $this->m_data->select_where(array('email' => $email,'level' => 'super_admin' ),'user')->num_rows();
          if($hitung_username > 0){
            $this->session->set_flashdata('message', '
              <div class="alert alert-danger"> Username sudah tersedia, gunakan username lain!
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
              </div>
            ');
            redirect(base_url('admin/tambah_admin'));
          } else if($hitung_email > 0) {
            $this->session->set_flashdata('message', '
              <div class="alert alert-danger"> E-mail sudah tersedia, gunakan e-mail lain!
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
              </div>
            ');
            redirect(base_url('admin/tambah_admin'));
          } else {
            $pass = hash('sha512', $password);
            $hash = password_hash($pass, PASSWORD_DEFAULT);
            $data = array(
                'username' => $username,
                'email' => $email,
                'password' => $hash,
                'level' => super_admin,
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
            redirect(base_url('admin/tambah_admin'));
          }
        }
      }


  function edit_profil()
  {
    if ($this->session->userdata('status') != "loginadmin"){
      redirect(base_url('admin'));
    } else {
      global $date;
      $db = get_instance()->db->conn_id;

      $id_user = $this->session->userdata('id');
      $username_asli = $this->session->userdata('username');

      // mysqli_real_escape_string anti injeksi
      $username = mysqli_real_escape_string($db, $this->input->post('username'));
      $email = mysqli_real_escape_string($db, $this->input->post('email'));
      $nomor1 = mysqli_real_escape_string($db, $this->input->post('nomor1'));
      $nomor2 = mysqli_real_escape_string($db, $this->input->post('nomor2'));
      $alamat = mysqli_real_escape_string($db, $this->input->post('alamat'));

      $admin = $this->m_data->select_where(array('id_user' => $id_user,'level' => 'super_admin' ),'user')->row();

      if ($username == $admin->username && $email == $admin->email) {
        $where = array(
          'id_user' => $id_user
        );

        $data = array(
          'username' => $username,
          'email' => $email,
          'nohp' => $nomor1,
          'alamat' => $alamat,
        );

        // update modified (jika di perlukan dalam tabel)
        $query = $this->m_data->update_data($where,$data,'user');

        $this->session->set_flashdata('message', '
        <div class="alert alert-success"> Perubahan berhasil!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
        </div>
        ');

        redirect(base_url('admin/profil'));
      } else {

        if ($username != $admin->username && $email == $admin->email){
          echo $hitung_username = $this->m_data->select_where(array('username' => $username,'level' => 'super_admin' ),'user')->num_rows();
          echo "username beda";
          if ($hitung_username > 0) {
            $this->session->set_flashdata('message', '
            <div class="alert alert-danger"> Perubahan gagal disimpan! Username sudah digunakan.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div>
            ');

            redirect(base_url('admin/profil'));
          } else {
            $where = array(
              'id_user' => $id_user
            );

            $data = array(
              'username' => $username,
              'email' => $email,
              'nohp' => $nomor1,
              'alamat' => $alamat,
            );

            // update modified (jika di perlukan dalam tabel)
            $query = $this->m_data->update_data($where,$data,'user');

            $this->session->set_flashdata('message', '
            <div class="alert alert-success"> Perubahan berhasil!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div>
            ');

            redirect(base_url('admin/profil'));
          }
        } else if ($email != $admin->email && $username == $admin->username){
          echo $hitung_email = $this->m_data->select_where(array('email' => $email,'level' => 'super_admin' ),'user')->num_rows();
          echo "email beda";
          if ($hitung_email > 0) {
            $this->session->set_flashdata('message', '
            <div class="alert alert-danger"> Perubahan gagal disimpan! E-mail sudah digunakan.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div>
            ');

            redirect(base_url('admin/profil'));
          } else {
            $where = array(
              'id_user' => $id_user
            );

            $data = array(
              'username' => $username,
              'email' => $email,
              'nohp' => $nomor1,
              'alamat' => $alamat,
            );

            // update modified (jika di perlukan dalam tabel)
            $query = $this->m_data->update_data($where,$data,'user');

            $this->session->set_flashdata('message', '
            <div class="alert alert-success"> Perubahan berhasil!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div>
            ');

            redirect(base_url('admin/profil'));
          }

        } else if ($username != $admin->username && $email != $admin->email){
          $hitung_username = $this->m_data->select_where(array('username' => $username,'level' => 'super_admin' ),'user')->num_rows();
          $hitung_email = $this->m_data->select_where(array('email' => $email,'level' => 'super_admin' ),'user')->num_rows();

          if ($hitung_username > 0) {
            $this->session->set_flashdata('message', '
            <div class="alert alert-danger"> Perubahan gagal disimpan! Username sudah digunakan.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div>
            ');

            redirect(base_url('admin/profil'));
          } else if ($hitung_email > 0) {
            $this->session->set_flashdata('message', '
            <div class="alert alert-danger"> Perubahan gagal disimpan! E-mail sudah digunakan.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div>
            ');

            redirect(base_url('admin/profil'));
          } else {
            $where = array(
              'id_user' => $id_user
            );

            $data = array(
              'username' => $username,
              'email' => $email,
              'nohp' => $nomor1,
              'alamat' => $alamat,
            );

            // update modified (jika di perlukan dalam tabel)
            $query = $this->m_data->update_data($where,$data,'user');

            $this->session->set_flashdata('message', '
            <div class="alert alert-success"> Perubahan berhasil!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div>
            ');

            redirect(base_url('admin/profil'));
          }

        }

        // redirect(base_url('admin/profil'));
      }


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
        redirect(base_url('admin/profil'));
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

        redirect(base_url('p_admin/logout'));
      }
    } else {
      $this->session->set_flashdata('message', '
        <div class="alert alert-danger"> Password lama salah!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
        </div>
      ');
      // jika password salah,
      // maka akan di arahkan ke halaman login
      redirect(base_url('admin/profil'));
    }

  }


  function kategori_master(){
    $db = get_instance()->db->conn_id;

    // mysqli_real_escape_string anti injeksi
    $nama = mysqli_real_escape_string($db, $this->input->post('nama'));
    $slug = slug($nama);

    $data = array(
        'nama_kategori' => $nama,
        'slug' => $slug,
    );

    // ===== input data ke tabel =====
    $this->m_data->input_data($data,'kategori');


    // ===== buat set_flashdata =====
    $this->session->set_flashdata('message', '
      <div class="alert alert-success"> Kategori master berhasil ditambah!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
      </div>
    ');

    // jika berhasil input akan di arahkan ke halaman login
    redirect(base_url('admin/kategori'));
  }

  function kategori(){
    $db = get_instance()->db->conn_id;

    // mysqli_real_escape_string anti injeksi
    $nama = mysqli_real_escape_string($db, $this->input->post('nama'));
    $kategori_master = mysqli_real_escape_string($db, $this->input->post('kategori_master'));
    $slug = slug($nama);

    $data = array(
        'id_parent' => $kategori_master,
        'nama_kategori' => $nama,
        'slug' => $slug,
    );

    // ===== input data ke tabel =====
    $this->m_data->input_data($data,'kategori');


    // ===== buat set_flashdata =====
    $this->session->set_flashdata('message', '
      <div class="alert alert-success"> Kategori berhasil ditambah!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
      </div>
    ');

    // jika berhasil input akan di arahkan ke halaman login
    redirect(base_url('admin/kategori'));
  }


  function subkategori(){
    $db = get_instance()->db->conn_id;

    // mysqli_real_escape_string anti injeksi
    $nama = mysqli_real_escape_string($db, $this->input->post('nama'));
    $kategori = mysqli_real_escape_string($db, $this->input->post('kategori'));
    $slug = slug($nama);

    $explode = explode('-',$kategori);

    $data = array(
        'id_parent' => $explode[1],
        'id_parent2' => $explode[0],
        'nama_kategori' => $nama,
        'slug' => $slug,
    );

    // ===== input data ke tabel =====
    $this->m_data->input_data($data,'kategori');


    // ===== buat set_flashdata =====
    $this->session->set_flashdata('message', '
      <div class="alert alert-success"> Subkategori berhasil ditambah!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
      </div>
    ');

    // jika berhasil input akan di arahkan ke halaman login
    redirect(base_url('admin/subkategori'));
  }


  function izin_usaha(){
    $db = get_instance()->db->conn_id;

    // mysqli_real_escape_string anti injeksi
    $nama = mysqli_real_escape_string($db, $this->input->post('nama'));

    $explode = explode('-',$kategori);

    $data = array(
        'nama_izin' => $nama,
    );

    // ===== input data ke tabel =====
    $this->m_data->input_data($data,'izin_usaha');


    // ===== buat set_flashdata =====
    $this->session->set_flashdata('message', '
      <div class="alert alert-success"> Izin usaha berhasil ditambah!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
      </div>
    ');

    // jika berhasil input akan di arahkan ke halaman login
    redirect(base_url('admin/izin_usaha'));
  }



  function validasi_akun($id){
    $where = array(
      'id_user' => $id
    );

    $data = array(
      'validasi_akun'      => 1,
    );

    // update modified (jika di perlukan dalam tabel)
    $query = $this->m_data->update_data($where,$data,'user');

    $c = $this->m_data->select_where(array('id_user' => $id ),'user')->row();

    $this->session->set_flashdata('message', '
    <div class="alert alert-success"> Validasi akun <b>'.$c->nama.'</b> berhasil!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
    </div>
    ');

    redirect(base_url('admin/permintaan_verif'));
  }
  
  function tampil_laporan()
  {
    $db = get_instance()->db->conn_id;
    $tgl1 = mysqli_real_escape_string($db, $this->input->post('tgl1'));
    $tgl2 = mysqli_real_escape_string($db, $this->input->post('tgl2'));
    redirect(base_url('admin/laporan/'.$tgl1.'/'.$tgl2));
  }

  function slider1()
  {
    $db = get_instance()->db->conn_id;
    $desk = mysqli_real_escape_string($db, $this->input->post('desk'));
    $slider = $_FILES["slider"]["name"];

    if($slider == ''){
      $data = array(                   
          'deskripsi' => $desk,
      );
      $where = array(                   
          'id_setting' => 4,
      );

      // ===== input data ke tabel =====             
      $this->m_data->update_data($where,$data,'setting_web');

      $this->session->set_flashdata('message', '
        <div class="alert alert-success"> Slider berhasil diubah!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
        </div>
      ');  
      
      // setelah berhasil di redirect ke controller welcome (kalo cuma manggil controllernya brti default functionnya index)
      redirect(base_url('admin/slider'));
    } else {
      $ext = pathinfo($slider, PATHINFO_EXTENSION);
      $img_name = MD5($slider).".".$ext;

      $config['upload_path']          = './slider/';
      $config['allowed_types']        = 'jpg|jpeg|png';
      $config['max_size']             = 2048;
      $config['file_name']            = $img_name;

      $this->load->library('upload', $config);

      if ( ! $this->upload->do_upload('slider')){
          $error = array('error' => $this->upload->display_errors());
          // $this->load->view('v_upload', $error);
          $this->session->set_flashdata('message', '
          <div class="alert alert-success"> format file tidak diijinkan (.jpg / .png) . Atau ukuran file terlalu besar (2Mb)
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
          </div>
        ');
        redirect(base_url('admin/slider'));
      }else{                        

          $data = array(                   
              
            'deskripsi' => $desk,
            'logo'      => $img_name,
          );
          $where = array(                   
            'id_setting' => 4,
          );

          // ===== input data ke tabel =====             
          $this->m_data->update_data($where,$data,'setting_web');
          $this->session->set_flashdata('message', '
          <div class="alert alert-success"> Slider berhasil diubah!
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
          </div>
        ');  
          // setelah berhasil di redirect ke controller welcome (kalo cuma manggil controllernya brti default functionnya index)
          redirect(base_url('admin/slider'));
      }
    }

    
  }

  function slider2()
  {
    $db = get_instance()->db->conn_id;
    $desk = mysqli_real_escape_string($db, $this->input->post('desk'));
    $slider = $_FILES["slider"]["name"];

    if($slider == ''){
      $data = array(                   
          'deskripsi' => $desk,
      );
      $where = array(                   
          'id_setting' => 5,
      );

      // ===== input data ke tabel =====             
      $this->m_data->update_data($where,$data,'setting_web');

      $this->session->set_flashdata('message', '
        <div class="alert alert-success"> Slider berhasil diubah!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
        </div>
      ');  
      
      // setelah berhasil di redirect ke controller welcome (kalo cuma manggil controllernya brti default functionnya index)
      redirect(base_url('admin/slider'));
    } else {
      $ext = pathinfo($slider, PATHINFO_EXTENSION);
      $img_name = MD5($slider).".".$ext;

      $config['upload_path']          = './slider/';
      $config['allowed_types']        = 'jpg|jpeg|png';
      $config['max_size']             = 2048;
      $config['file_name']            = $img_name;

      $this->load->library('upload', $config);

      if ( ! $this->upload->do_upload('slider')){
          $error = array('error' => $this->upload->display_errors());
          // $this->load->view('v_upload', $error);
          $this->session->set_flashdata('message', '
          <div class="alert alert-success"> format file tidak diijinkan (.jpg / .png) . Atau ukuran file terlalu besar (2Mb)
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
          </div>
        ');
        redirect(base_url('admin/slider'));
      }else{                        

          $data = array(                   
              
            'deskripsi' => $desk,
            'logo'      => $img_name,
          );
          $where = array(                   
            'id_setting' => 5,
          );

          // ===== input data ke tabel =====             
          $this->m_data->update_data($where,$data,'setting_web');
          $this->session->set_flashdata('message', '
          <div class="alert alert-success"> Slider berhasil diubah!
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
          </div>
        ');  
          // setelah berhasil di redirect ke controller welcome (kalo cuma manggil controllernya brti default functionnya index)
          redirect(base_url('admin/slider'));
      }
    }

    
  }



  function slider3()
  {
    $db = get_instance()->db->conn_id;
    $desk = mysqli_real_escape_string($db, $this->input->post('desk'));
    $slider = $_FILES["slider"]["name"];

    if($slider == ''){
      $data = array(                   
          'deskripsi' => $desk,
      );
      $where = array(                   
          'id_setting' => 6,
      );

      // ===== input data ke tabel =====             
      $this->m_data->update_data($where,$data,'setting_web');

      $this->session->set_flashdata('message', '
        <div class="alert alert-success"> Slider berhasil diubah!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
        </div>
      ');  
      
      // setelah berhasil di redirect ke controller welcome (kalo cuma manggil controllernya brti default functionnya index)
      redirect(base_url('admin/slider'));
    } else {
      $ext = pathinfo($slider, PATHINFO_EXTENSION);
      $img_name = MD5($slider).".".$ext;

      $config['upload_path']          = './slider/';
      $config['allowed_types']        = 'jpg|jpeg|png';
      $config['max_size']             = 2048;
      $config['file_name']            = $img_name;

      $this->load->library('upload', $config);

      if ( ! $this->upload->do_upload('slider')){
          $error = array('error' => $this->upload->display_errors());
          // $this->load->view('v_upload', $error);
          $this->session->set_flashdata('message', '
          <div class="alert alert-success"> format file tidak diijinkan (.jpg / .png) . Atau ukuran file terlalu besar (2Mb)
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
          </div>
        ');
        redirect(base_url('admin/slider'));
      }else{                        

          $data = array(                   
              
            'deskripsi' => $desk,
            'logo'      => $img_name,
          );
          $where = array(                   
            'id_setting' => 6,
          );

          // ===== input data ke tabel =====             
          $this->m_data->update_data($where,$data,'setting_web');
          $this->session->set_flashdata('message', '
          <div class="alert alert-success"> Slider berhasil diubah!
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
          </div>
        ');  
          // setelah berhasil di redirect ke controller welcome (kalo cuma manggil controllernya brti default functionnya index)
          redirect(base_url('admin/slider'));
      }
    }

    
  }



  function gambar_tambahan(){
    global $date;
    $db = get_instance()->db->conn_id;

    // mysqli_real_escape_string anti injeksi
    
    $id_user   = mysqli_real_escape_string($db, $this->input->post('id_user'));
    $nama_gambar = $_FILES["file"]["name"];

    if ($nama_gambar == "") {
      echo json_encode(['code' => 200, 'msg' => 'gambar wajib diisi']);
    } else {
        # code...
        #code 3
        $ext = pathinfo($nama_gambar, PATHINFO_EXTENSION);
        $img_name = MD5($nama_gambar).rand().".".$ext;

        $config['upload_path']          = './produk_img/';
        $config['allowed_types']        = 'jpg|jpeg|png';
        $config['max_size']             = 2048;
        $config['file_name']            = $img_name;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('file')){
            $error = array('error' => $this->upload->display_errors());
            // $this->load->view('v_upload', $error);
            echo json_encode(['code' => 200, 'msg' => 'format file tidak diijinkan (.jpg / .png) . Atau ukuran file terlalu besar (2Mb)']);
        }else{

            $c = $this->m_data->select_where(array('id_user' => $id_user ),'gambar_sementara')->num_rows();
            if ($c == 0) {
              $gambarke = 1;
            } else {
              $cek = $this->db->query("SELECT * FROM gambar_sementara WHERE id_user = '$id_user' ORDER BY id_gambar DESC LIMIT 1 ")->row();
              $gambarke = $cek->gambarke + 1;
            }
            
            $data = array(                   
                
              'id_user'   => $id_user,
              'gambarke'  => $gambarke,
              'gambar'    => $img_name,
            );

            // ===== input data ke tabel =====             
            $this->m_data->input_data($data,'gambar_sementara');
            echo json_encode(['code' => 1, 'msg' => 'data berhasil dikirim','foto'=>$img_name]);
        }
    }
  }





  function edit_gambar_sementara1(){
    global $date;
    $db = get_instance()->db->conn_id;

    // mysqli_real_escape_string anti injeksi
    
    $id_produk   = mysqli_real_escape_string($db, $this->input->post('id_produk'));
    $nama_gambar = $_FILES["file"]["name"];

    if ($nama_gambar == "") {
      echo json_encode(['code' => 200, 'msg' => 'gambar wajib diisi']);
    } else {
        # code...
        #code 3
        $ext = pathinfo($nama_gambar, PATHINFO_EXTENSION);
        $img_name = MD5($nama_gambar).rand().".".$ext;

        $config['upload_path']          = './produk_img/';
        $config['allowed_types']        = 'jpg|jpeg|png';
        $config['max_size']             = 2048;
        $config['file_name']            = $img_name;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('file')){
            $error = array('error' => $this->upload->display_errors());
            // $this->load->view('v_upload', $error);
            echo json_encode(['code' => 200, 'msg' => 'format file tidak diijinkan (.jpg / .png) . Atau ukuran file terlalu besar (2Mb)']);
        }else{

            $where = array(
              'id_produk' => $id_produk
            );
    
            $data = array(
              'gambar2' => $img_name,
            );
    
            // update modified (jika di perlukan dalam tabel)
            $query = $this->m_data->update_data($where,$data,'produk');

            echo json_encode(['code' => 1, 'msg' => 'data berhasil dikirim','foto'=>$img_name]);
        }
    }
  }
  function edit_gambar_sementara2(){
    global $date;
    $db = get_instance()->db->conn_id;

    // mysqli_real_escape_string anti injeksi
    
    $id_produk   = mysqli_real_escape_string($db, $this->input->post('id_produk'));
    $nama_gambar = $_FILES["file"]["name"];

    if ($nama_gambar == "") {
      echo json_encode(['code' => 200, 'msg' => 'gambar wajib diisi']);
    } else {
        # code...
        #code 3
        $ext = pathinfo($nama_gambar, PATHINFO_EXTENSION);
        $img_name = MD5($nama_gambar).rand().".".$ext;

        $config['upload_path']          = './produk_img/';
        $config['allowed_types']        = 'jpg|jpeg|png';
        $config['max_size']             = 2048;
        $config['file_name']            = $img_name;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('file')){
            $error = array('error' => $this->upload->display_errors());
            // $this->load->view('v_upload', $error);
            echo json_encode(['code' => 200, 'msg' => 'format file tidak diijinkan (.jpg / .png) . Atau ukuran file terlalu besar (2Mb)']);
        }else{

            $where = array(
              'id_produk' => $id_produk
            );
    
            $data = array(
              'gambar3' => $img_name,
            );
    
            // update modified (jika di perlukan dalam tabel)
            $query = $this->m_data->update_data($where,$data,'produk');

            echo json_encode(['code' => 1, 'msg' => 'data berhasil dikirim','foto'=>$img_name]);
        }
    }
  }
  function edit_gambar_sementara3(){
    global $date;
    $db = get_instance()->db->conn_id;

    // mysqli_real_escape_string anti injeksi
    
    $id_produk   = mysqli_real_escape_string($db, $this->input->post('id_produk'));
    $nama_gambar = $_FILES["file"]["name"];

    if ($nama_gambar == "") {
      echo json_encode(['code' => 200, 'msg' => 'gambar wajib diisi']);
    } else {
        # code...
        #code 3
        $ext = pathinfo($nama_gambar, PATHINFO_EXTENSION);
        $img_name = MD5($nama_gambar).rand().".".$ext;

        $config['upload_path']          = './produk_img/';
        $config['allowed_types']        = 'jpg|jpeg|png';
        $config['max_size']             = 2048;
        $config['file_name']            = $img_name;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('file')){
            $error = array('error' => $this->upload->display_errors());
            // $this->load->view('v_upload', $error);
            echo json_encode(['code' => 200, 'msg' => 'format file tidak diijinkan (.jpg / .png) . Atau ukuran file terlalu besar (2Mb)']);
        }else{

            $where = array(
              'id_produk' => $id_produk
            );
    
            $data = array(
              'gambar4' => $img_name,
            );
    
            // update modified (jika di perlukan dalam tabel)
            $query = $this->m_data->update_data($where,$data,'produk');

            echo json_encode(['code' => 1, 'msg' => 'data berhasil dikirim','foto'=>$img_name]);
        }
    }
  }






  function hapus1(){
    global $date;
    $db = get_instance()->db->conn_id;

    // mysqli_real_escape_string anti injeksi
    
    $id_produk   = mysqli_real_escape_string($db, $this->input->post('id_produk'));


    $where = array(
      'id_produk' => $id_produk
    );

    $data = array(
      'gambar2' => '',
    );

    // update modified (jika di perlukan dalam tabel)
    $query = $this->m_data->update_data($where,$data,'produk');

    echo json_encode(['code' => 1, 'msg' => 'data berhasil dikirim']);
  }
  function hapus2(){
    global $date;
    $db = get_instance()->db->conn_id;

    // mysqli_real_escape_string anti injeksi
    
    $id_produk   = mysqli_real_escape_string($db, $this->input->post('id_produk'));


    $where = array(
      'id_produk' => $id_produk
    );

    $data = array(
      'gambar3' => '',
    );

    // update modified (jika di perlukan dalam tabel)
    $query = $this->m_data->update_data($where,$data,'produk');

    echo json_encode(['code' => 1, 'msg' => 'data berhasil dikirim']);
  }
  function hapus3(){
    global $date;
    $db = get_instance()->db->conn_id;

    // mysqli_real_escape_string anti injeksi
    
    $id_produk   = mysqli_real_escape_string($db, $this->input->post('id_produk'));


    $where = array(
      'id_produk' => $id_produk
    );

    $data = array(
      'gambar4' => '',
    );

    // update modified (jika di perlukan dalam tabel)
    $query = $this->m_data->update_data($where,$data,'produk');

    echo json_encode(['code' => 1, 'msg' => 'data berhasil dikirim']);
  }




  function logout()
  {
    $this->session->sess_destroy();
    redirect(base_url('admin'));
  }



}


?>
