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


  function login (){
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
        redirect(base_url('user'));


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
              'id'        => $u->id_user,
              'username'  => $u->username,
              'email'     => $u->email,
              'status'    => "login"
          );

          // membuat session berdasarkan $data_session
          $this->session->set_userdata($data_session);

          // masuk ke halaman dashboard
          redirect(base_url('user'));
      } else {
          $this->session->set_flashdata('message', '
            <div class="alert alert-danger">Username / Password Salah!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div>
          ');
          // jika password salah,
          // maka akan di arahkan ke halaman login
          redirect(base_url('user'));
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
      $nama = mysqli_real_escape_string($db, $this->input->post('nama'));
      $email = mysqli_real_escape_string($db, $this->input->post('email'));
      $nomor1 = mysqli_real_escape_string($db, $this->input->post('nomor1'));
      $nomor2 = mysqli_real_escape_string($db, $this->input->post('nomor2'));
      $nama_gambar = $_FILES["file"]["name"];

      if (isset($nama_gambar)) {
        $path = $_FILES['file']['name'];
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $img_name = $rand . "." . $ext;

        $config['upload_path']          = './ktp/';
        $config['allowed_types']        = 'jpg|jpeg|png';
        $config['max_size']             = 2048;
        $config['file_name']            = $img_name;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file')) {
            $error = array('error' => $this->upload->display_errors());
            // $this->load->view('v_upload', $error);
            $this->session->set_flashdata('message', '
            <div class="alert alert-success"> format file tidak diijinkan (.jpg / .png) . Atau ukuran file terlalu besar (2Mb)
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div>
            ');

            redirect(base_url('user/profil'));
        } else {
            $c = $this->m_data->select_where(array('id_user'=>$id_user),'user')->row();

            if ($c->gambar_ktp != "") {
                unlink("./ktp/$c->gambar_ktp");
            }

            //Compress Image
            $config['image_library'] = 'gd2';
            $config['source_image'] = './ktp/' . $img_name;
            $config['create_thumb'] = FALSE;
            $config['maintain_ratio'] = FALSE;
            $config['quality'] = '80%';
            $config['width'] = 400;
            $config['height'] = 200;
            $config['new_image'] = './ktp/' . $img_name;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();

            $gbr = $this->upload->data();


            $user = $this->m_data->select_where(array('id_user' => $id_user,'level' => 'user' ),'user')->row();

            if ($username == $user->username && $email == $user->email) {
              $where = array(
                'id_user' => $id_user
              );

              $data = array(
                'username' => $username,
                'nama' => $nama,
                'email' => $email,
                'nohp' => $nomor1,
                'nowa' => $nomor2,
                'gambar_ktp' => $img_name,
              );

              // update modified (jika di perlukan dalam tabel)
              $query = $this->m_data->update_data($where,$data,'user');

              $this->session->set_flashdata('message', '
              <div class="alert alert-success"> Perubahan berhasil!
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
              </div>
              ');

              redirect(base_url('user/profil'));
            } else {

              if ($username != $user->username && $email == $user->email){
                echo $hitung_username = $this->m_data->select_where(array('username' => $username,'level' => 'user' ),'user')->num_rows();
                echo "username beda";
                if ($hitung_username > 0) {
                  $this->session->set_flashdata('message', '
                  <div class="alert alert-danger"> Perubahan gagal disimpan! Username sudah digunakan.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                  </div>
                  ');

                  redirect(base_url('user/profil'));
                } else {
                  $where = array(
                    'id_user' => $id_user
                  );

                  $data = array(
                    'username' => $username,
                    'nama' => $nama,
                    'email' => $email,
                    'nohp' => $nomor1,
                    'nowa' => $nomor2,
                    'gambar_ktp' => $img_name,
                  );

                  // update modified (jika di perlukan dalam tabel)
                  $query = $this->m_data->update_data($where,$data,'user');

                  $this->session->set_flashdata('message', '
                  <div class="alert alert-success"> Perubahan berhasil!
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                  </div>
                  ');

                  redirect(base_url('user/profil'));
                }
              } else if ($email != $user->email && $username == $user->username){
                echo $hitung_email = $this->m_data->select_where(array('email' => $email ),'user')->num_rows();
                echo "email beda";
                if ($hitung_email > 0) {
                  $this->session->set_flashdata('message', '
                  <div class="alert alert-danger"> Perubahan gagal disimpan! E-mail sudah digunakan.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                  </div>
                  ');

                  redirect(base_url('user/profil'));
                } else {
                  $where = array(
                    'id_user' => $id_user
                  );

                  $data = array(
                    'username' => $username,
                    'nama' => $nama,
                    'email' => $email,
                    'nohp' => $nomor1,
                    'nowa' => $nomor2,
                    'gambar_ktp' => $img_name,
                  );

                  // update modified (jika di perlukan dalam tabel)
                  $query = $this->m_data->update_data($where,$data,'user');

                  $this->session->set_flashdata('message', '
                  <div class="alert alert-success"> Perubahan berhasil!
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                  </div>
                  ');

                  redirect(base_url('user/profil'));
                }

              } else if ($username != $user->username && $email != $user->email){
                $hitung_username = $this->m_data->select_where(array('username' => $username,'level' => 'user' ),'user')->num_rows();
                $hitung_email = $this->m_data->select_where(array('email' => $email,'level' => 'user' ),'user')->num_rows();

                if ($hitung_username > 0) {
                  $this->session->set_flashdata('message', '
                  <div class="alert alert-danger"> Perubahan gagal disimpan! Username sudah digunakan.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                  </div>
                  ');

                  redirect(base_url('user/profil'));
                } else if ($hitung_email > 0) {
                  $this->session->set_flashdata('message', '
                  <div class="alert alert-danger"> Perubahan gagal disimpan! E-mail sudah digunakan.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                  </div>
                  ');

                  redirect(base_url('user/profil'));
                } else {
                  $where = array(
                    'id_user' => $id_user
                  );

                  $data = array(
                    'username' => $username,
                    'nama' => $nama,
                    'email' => $email,
                    'nohp' => $nomor1,
                    'nowa' => $nomor2,
                    'gambar_ktp' => $img_name,
                  );

                  // update modified (jika di perlukan dalam tabel)
                  $query = $this->m_data->update_data($where,$data,'user');

                  $this->session->set_flashdata('message', '
                  <div class="alert alert-success"> Perubahan berhasil!
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                  </div>
                  ');

                  redirect(base_url('user/profil'));
                }

              }

            }
        }
      } else {
        $user = $this->m_data->select_where(array('id_user' => $id_user,'level' => 'user' ),'user')->row();

        if ($username == $user->username && $email == $user->email) {
          $where = array(
            'id_user' => $id_user
          );

          $data = array(
            'username' => $username,
            'nama' => $nama,
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

          redirect(base_url('user/profil'));
        } else {

          if ($username != $user->username && $email == $user->email){
            echo $hitung_username = $this->m_data->select_where(array('username' => $username,'level' => 'user' ),'user')->num_rows();
            echo "username beda";
            if ($hitung_username > 0) {
              $this->session->set_flashdata('message', '
              <div class="alert alert-danger"> Perubahan gagal disimpan! Username sudah digunakan.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
              </div>
              ');

              redirect(base_url('user/profil'));
            } else {
              $where = array(
                'id_user' => $id_user
              );

              $data = array(
                'username' => $username,
                'nama' => $nama,
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

              redirect(base_url('user/profil'));
            }
          } else if ($email != $user->email && $username == $user->username){
            echo $hitung_email = $this->m_data->select_where(array('email' => $email ),'user')->num_rows();
            echo "email beda";
            if ($hitung_email > 0) {
              $this->session->set_flashdata('message', '
              <div class="alert alert-danger"> Perubahan gagal disimpan! E-mail sudah digunakan.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
              </div>
              ');

              redirect(base_url('user/profil'));
            } else {
              $where = array(
                'id_user' => $id_user
              );

              $data = array(
                'username' => $username,
                'nama' => $nama,
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

              redirect(base_url('user/profil'));
            }

          } else if ($username != $user->username && $email != $user->email){
            $hitung_username = $this->m_data->select_where(array('username' => $username,'level' => 'user' ),'user')->num_rows();
            $hitung_email = $this->m_data->select_where(array('email' => $email,'level' => 'user' ),'user')->num_rows();

            if ($hitung_username > 0) {
              $this->session->set_flashdata('message', '
              <div class="alert alert-danger"> Perubahan gagal disimpan! Username sudah digunakan.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
              </div>
              ');

              redirect(base_url('user/profil'));
            } else if ($hitung_email > 0) {
              $this->session->set_flashdata('message', '
              <div class="alert alert-danger"> Perubahan gagal disimpan! E-mail sudah digunakan.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
              </div>
              ');

              redirect(base_url('user/profil'));
            } else {
              $where = array(
                'id_user' => $id_user
              );

              $data = array(
                'username' => $username,
                'nama' => $nama,
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

              redirect(base_url('user/profil'));
            }

          }

        }
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

  function logout()
  {
    $this->session->sess_destroy();
    redirect(base_url('user'));
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
      redirect(base_url('user/daftar'));
    } else {
      $hitung_username = $this->m_data->select_where(array('username' => $username,'level' => 'user' ),'user')->num_rows();
      $hitung_email = $this->m_data->select_where(array('email' => $email,'level' => 'user' ),'user')->num_rows();
      if($hitung_username > 0){
        $this->session->set_flashdata('message', '
          <div class="alert alert-danger"> Username sudah tersedia, gunakan username lain!
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
          </div>
        ');
        redirect(base_url('user/daftar'));
      } else if($hitung_email > 0) {
        $this->session->set_flashdata('message', '
          <div class="alert alert-danger"> E-mail sudah tersedia, gunakan e-mail lain!
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
          </div>
        ');
        redirect(base_url('user/daftar'));
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
        redirect(base_url('user/'));
      }
    }
  }



}


?>
