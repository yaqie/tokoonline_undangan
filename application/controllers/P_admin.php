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

      public function tambah_produk()
      {
          global $date;
          $db = get_instance()->db->conn_id;
  
          // mysqli_real_escape_string anti injeksi
          
          $nama_produk   = mysqli_real_escape_string($db, $this->input->post('nama_produk'));
          $kategori      = mysqli_real_escape_string($db, $this->input->post('kategori'));
          $harga         = mysqli_real_escape_string($db, $this->input->post('harga'));
          $satuan        = mysqli_real_escape_string($db, $this->input->post('satuan'));
          $deskripsi     = mysqli_real_escape_string($db, $this->input->post('deskripsi'));
          $deskripsi = str_ireplace(array("\r","\n",'\r','\n'),'', $deskripsi);
          $nama_gambar = $_FILES["file"]["name"];
  
          if ($nama_gambar == "") {
              $data = array(                   
                  
                  'nama_produk'       => $nama_produk,
                  'kategori'          => $kategori,
                  'harga'             => $harga,
                  'satuan'            => $satuan,
                  'deskripsi'         => $deskripsi,
                  'tgljam'            => $date,
              );
  
              // ===== input data ke tabel =====             
              $this->m_data->input_data($data,'produk');
              
              // setelah berhasil di redirect ke controller welcome (kalo cuma manggil controllernya brti default functionnya index)
              redirect(base_url('admin/tambah_produk'));
          } else {
              # code...
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

                  

                  
                  $gbr = $this->upload->data();
                  //Compress Image
                  $config['image_library']='gd2';
                  $config['source_image']='./produk_img/'.$gbr['file_name'];
                  $config['create_thumb']= FALSE;
                  $config['maintain_ratio']= FALSE;
                  $config['quality']= '80%';
                  $config['width']= 200;
                  $config['height']= 300;
                  $config['new_image']= './produk_img/'.$gbr['file_name'];
                  $this->load->library('image_lib', $config);
                  $this->image_lib->resize();

                  echo json_encode(['code'=>1, 'msg'=>'sukses']);

                  $data = array(                   
                      
                    'nama_produk'       => $nama_produk,
                    'kategori'          => $kategori,
                    'harga'             => $harga,
                    'satuan'            => $satuan,
                    'deskripsi'         => $deskripsi,
                    'tgljam'            => $date,
                    'gambar'            => $img_name,
                  );
  
                  // ===== input data ke tabel =====             
                  $this->m_data->input_data($data,'produk');
          
                  // setelah berhasil di redirect ke controller welcome (kalo cuma manggil controllernya brti default functionnya index)
                  redirect(base_url('admin/tambah_produk'));
              }
  }
  }

  function edit_setting()
  {
    if ($this->session->userdata('status') != "loginadmin"){
      redirect(base_url('admin'));
    } else {
      global $date,$rand;
      $db = get_instance()->db->conn_id;

      $judul = mysqli_real_escape_string($db, $this->input->post('judul'));
      $deskripsi = mysqli_real_escape_string($db, $this->input->post('deskripsi'));

      $nama_gambar = $_FILES["file"]["name"];
      if(isset($nama_gambar))
      {
        $ext = pathinfo($nama_gambar, PATHINFO_EXTENSION);
        $img_name = $rand.".". $ext;

        $config['upload_path']          = './img_web/';
        $config['allowed_types']        = 'jpg|jpeg|png';
        $config['max_size']             = 2048;
        $config['file_name']            = $img_name;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('file')){
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('message', '
            <div class="alert alert-danger"> File tidak diijinkan!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div>
            ');

            redirect(base_url('admin/profil'));
        }else{

            $c = $this->m_data->select_where(array('id_setting' => 1 ),'setting_web')->row();

            if ($c->logo != "" ) {
              unlink("./img_web/$c->logo");
            }
            //Compress Image
            $config['image_library']='gd2';
            $config['source_image']='./img_web/'.$img_name;
            $config['create_thumb']= FALSE;
            $config['maintain_ratio']= FALSE;
            $config['quality']= '80%';
            $config['width']= 166;
            $config['height']= 33;
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


      } else {
        $where = array(
          'id_setting' => 1
        );

        $data = array(
          'judul' => $judul,
          'deskripsi' => $deskripsi,
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

      $admin = $this->m_data->select_where(array('id_user' => $id_user,'level' => 'super_admin' ),'user')->row();

      if ($username == $admin->username && $email == $admin->email) {
        $where = array(
          'id_user' => $id_user
        );

        $data = array(
          'username' => $username,
          'email' => $email,
          'nohp' => $nomor1,
          'nowa' => $nomor2,
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
              'nowa' => $nomor2,
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
              'nowa' => $nomor2,
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
              'nowa' => $nomor2,
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
    redirect(base_url('admin/kategori_master'));
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

  function logout()
  {
    $this->session->sess_destroy();
    redirect(base_url('admin'));
  }



}


?>
