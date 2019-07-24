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
		$kategori = $this->m_data->tampil_data('kategori')->result();
		
		$this->db->limit(1);
		$this->db->from('kategori');
		$this->db->order_by("id_kategori", "asc");
		$kategori2 = $this->db->get()->row();
		
		$kategori3 = $this->db->query("SELECT * FROM kategori WHERE id_kategori != '$kategori2->id_kategori' ORDER BY id_kategori ASC LIMIT 1")->row();
		
		$this->db->limit(10);
		$this->db->from('produk');
		$this->db->where('kategori', $kategori2->id_kategori);
		$this->db->order_by("id_produk", "desc");
		$produk = $this->db->get()->result();
		
		
		$this->db->limit(10);
		$this->db->from('produk');
		$this->db->where('kategori', $kategori3->id_kategori);
		$this->db->order_by("id_produk", "desc");
		$produk2 = $this->db->get()->result();


		$setting4 = $this->m_data->select_where(array('id_setting' => '4'),'setting_web')->row();
		$setting5 = $this->m_data->select_where(array('id_setting' => '5'),'setting_web')->row();
		$setting6 = $this->m_data->select_where(array('id_setting' => '6'),'setting_web')->row();
		
		$data = array(
			'setting4' 	=> $setting4,
			'setting5' 	=> $setting5,
			'setting6' 	=> $setting6,
			'kategori3' 	=> $kategori3,
			'kategori2' 	=> $kategori2,
			'kategori' 	=> $kategori,
			'produk' 	=> $produk,
			'produk2' 	=> $produk2,
			'web' 		=> $web,
			'admin' 	=> $admin,
		);
		$this->load->view('landingpage/header',$data);
		$this->load->view('landingpage/index',$data);
		$this->load->view('landingpage/footer',$data);
	}

	public function detail($id)
	{
		$web = $this->m_data->select_where(array('id_setting' => 1),'setting_web')->row();
		$admin = $this->m_data->select_where(array('level' => 'super_admin' ),'user')->row();
		
		$produk = $this->m_data->select_where(array('id_produk' => $id),'produk')->row();
		$kategori = $this->m_data->tampil_data('kategori')->result();
		// SELECT  * FROM tbl ORDER BY RAND()
		$produk_lain = $this->db->query("SELECT  * FROM produk ORDER BY RAND() LIMIT 4")->result();

		$data = array(
			'id' 	=> $id,
			'produk_lain' 	=> $produk_lain,
			'produk' 	=> $produk,
			'kategori' => $kategori,
			'web' => $web,
			'admin' => $admin,
		);
		$this->load->view('landingpage/header',$data);
		$this->load->view('landingpage/detail',$data);
		$this->load->view('landingpage/footer',$data);
	}

	
	


	public function auth()
	{
		$web = $this->m_data->select_where(array('id_setting' => 1),'setting_web')->row();
		$admin = $this->m_data->select_where(array('level' => 'super_admin' ),'user')->row();
		$kategori = $this->m_data->tampil_data('kategori')->result();
		$data = array(
			'web' => $web,
			'kategori' 	=> $kategori,
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
			$kategori = $this->m_data->tampil_data('kategori')->result();
			$profil = $this->m_data->select_where(array('id_user' => $this->session->userdata('id_user') ),'user')->row();
			$data = array(
				'web' => $web,
				'kategori' 	=> $kategori,
				'admin' => $admin,
				'profil' => $profil,
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
		$kategori = $this->m_data->tampil_data('kategori')->result();
		$data = array(
			'web' => $web,
			'kategori' 	=> $kategori,
			'admin' => $admin,
			'cara' => $cara,
		);
		$this->load->view('landingpage/header',$data);
		$this->load->view('landingpage/cara_pesan',$data);
		$this->load->view('landingpage/footer',$data);
	}
	
	public function produk($kode = '')
	{
		$web = $this->m_data->select_where(array('id_setting' => 1),'setting_web')->row();
		$admin = $this->m_data->select_where(array('level' => 'super_admin' ),'user')->row();
		$cara = $this->m_data->select_where(array('id_setting' => 2),'setting_web')->row();
		$kategori = $this->m_data->tampil_data('kategori')->result();

		if($kode == 'terbaru'){
			$this->db->limit(6);
			$this->db->order_by("id_produk", "desc");
			$this->db->select('*');
			$this->db->from('produk');
			$this->db->join('kategori','produk.kategori=kategori.id_kategori','Left');
			$query=$this->db->get();
			$produk= $query->result();
		} else if($kode == 'terlama') {
			$this->db->limit(6);
			$this->db->order_by("id_produk", "asc");
			$this->db->select('*');
			$this->db->from('produk');
			$this->db->join('kategori','produk.kategori=kategori.id_kategori','Left');
			$query=$this->db->get();
			$produk= $query->result();
		} else if($kode == 'termurah') {
			$this->db->limit(6);
			$this->db->order_by("cast(harga as unsigned)", "asc");
			$this->db->select('*');
			$this->db->from('produk');
			$this->db->join('kategori','produk.kategori=kategori.id_kategori','Left');
			$query=$this->db->get();
			$produk= $query->result();
		} else if($kode == 'termahal') {
			$this->db->limit(6);
			$this->db->order_by("cast(harga as unsigned)", "desc");
			$this->db->select('*');
			$this->db->from('produk');
			$this->db->join('kategori','produk.kategori=kategori.id_kategori','Left');
			$query=$this->db->get();
			$produk= $query->result();
		}


		


		$data = array(
			'kode' => $kode,
			'produk' => $produk,
			'web' => $web,
			'kategori' 	=> $kategori,
			'admin' => $admin,
			'cara' => $cara,
		);
		$this->load->view('landingpage/header',$data);
		$this->load->view('landingpage/produk',$data);
		$this->load->view('landingpage/footer',$data);
	}

	public function search($kode,$kata)
	{
		$web = $this->m_data->select_where(array('id_setting' => 1),'setting_web')->row();
		$admin = $this->m_data->select_where(array('level' => 'super_admin' ),'user')->row();
		$cara = $this->m_data->select_where(array('id_setting' => 2),'setting_web')->row();
		$kategori = $this->m_data->tampil_data('kategori')->result();

		$urldecode = urldecode ($kata);

		if($kode == "semua_kategori"){
		} else if($kode != "semua_kategori"){
			$this->db->where(array('slug' => $kode));
		}

		$this->db->limit(6);
		$this->db->order_by("id_produk", "desc");
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->like('nama_produk',$urldecode);
		$this->db->join('kategori','produk.kategori=kategori.id_kategori','Left');
		$query=$this->db->get();
		$produk= $query->result();


		$data = array(
			'produk' => $produk,
			'web' => $web,
			'kategori' 	=> $kategori,
			'admin' => $admin,
			'cara' => $cara,
		);
		$this->load->view('landingpage/header',$data);
		$this->load->view('landingpage/search',$data);
		$this->load->view('landingpage/footer',$data);
	}
	public function kategori($kode)
	{
		$web = $this->m_data->select_where(array('id_setting' => 1),'setting_web')->row();
		$admin = $this->m_data->select_where(array('level' => 'super_admin' ),'user')->row();
		$cara = $this->m_data->select_where(array('id_setting' => 2),'setting_web')->row();
		$kategori = $this->m_data->tampil_data('kategori')->result();

		if($kode == "semua_kategori"){
		} else if($kode != "semua_kategori"){
			$this->db->where(array('slug' => $kode));
		}

		$this->db->limit(6);
		$this->db->order_by("id_produk", "desc");
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->join('kategori','produk.kategori=kategori.id_kategori','Left');
		$query=$this->db->get();
		$produk= $query->result();


		$data = array(
			'produk' => $produk,
			'web' => $web,
			'kategori' 	=> $kategori,
			'admin' => $admin,
			'cara' => $cara,
		);
		$this->load->view('landingpage/header',$data);
		$this->load->view('landingpage/kategori',$data);
		$this->load->view('landingpage/footer',$data);
	}


	public function filter()
    {
		$limit = $this->input->post('limit');
		$start = $this->input->post('start');
		$valfilter = $this->input->post('valfilter');



		if($valfilter == 0){
			$output = '';

			$this->db->limit($limit, $start);
			$this->db->order_by("id_produk", "desc");
			$this->db->select('*');
			$this->db->from('produk');
			$this->db->join('kategori','produk.kategori=kategori.id_kategori','Left');
			$data=$this->db->get();
			// $data= $query->result();

			
			if($data->num_rows() > 0)
			{
				foreach($data->result() as $p)
				{

					$output .= '
					<div class="post-id" id="'.$p->id_produk.'">
						<div class="col-md-4 col-sm-6 col-xs-6">
							<div class="product product-single">
								<div class="product-thumb">
									<div class="product-label">
										<span>'.$p->nama_kategori.'</span>
									</div>
									<img src="'.base_url('produk_img/'.$p->gambar) .'" style="height:300px;" alt="">
								</div>
								<div class="product-body">
									<h3 class="product-price">Rp '.nominal($p->harga).'</h3>
									<h2 class="product-name"><a href="#">'.$p->nama_produk.'</a></h2>
									<div class="product-btns">
										<a class="primary-btn add-to-cart" href="'.base_url('detail/'.$p->id_produk) .'"> Lihat Detail</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					';
				}
			}
			echo $output;
		} else if($valfilter == 1){
			$output = '';

			$this->db->limit($limit, $start);
			$this->db->order_by("id_produk", "asc");
			$this->db->select('*');
			$this->db->from('produk');
			$this->db->join('kategori','produk.kategori=kategori.id_kategori','Left');
			$data=$this->db->get();
			// $data= $query->result();

			
			if($data->num_rows() > 0)
			{
				foreach($data->result() as $p)
				{

					$output .= '
					<div class="post-id" id="'.$p->id_produk.'">
						<div class="col-md-4 col-sm-6 col-xs-6">
							<div class="product product-single">
								<div class="product-thumb">
									<div class="product-label">
										<span>'.$p->nama_kategori.'</span>
									</div>
									<img src="'.base_url('produk_img/'.$p->gambar) .'" style="height:300px;" alt="">
								</div>
								<div class="product-body">
									<h3 class="product-price">Rp '.nominal($p->harga).'</h3>
									<h2 class="product-name"><a href="#">'.$p->nama_produk.'</a></h2>
									<div class="product-btns">
										<a class="primary-btn add-to-cart" href="'.base_url('detail/'.$p->id_produk) .'"> Lihat Detail</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					';
				}
			}
			echo $output;
		} else if($valfilter == 2){
			$output = '';

			$this->db->limit($limit, $start);
			$this->db->order_by("cast(harga as unsigned)", "asc");
			$this->db->select('*');
			$this->db->from('produk');
			$this->db->join('kategori','produk.kategori=kategori.id_kategori','Left');
			$data=$this->db->get();
			// $data= $query->result();

			
			if($data->num_rows() > 0)
			{
				foreach($data->result() as $p)
				{

					$output .= '
					<div class="post-id" id="'.$p->id_produk.'">
						<div class="col-md-4 col-sm-6 col-xs-6">
							<div class="product product-single">
								<div class="product-thumb">
									<div class="product-label">
										<span>'.$p->nama_kategori.'</span>
									</div>
									<img src="'.base_url('produk_img/'.$p->gambar) .'" style="height:300px;" alt="">
								</div>
								<div class="product-body">
									<h3 class="product-price">Rp '.nominal($p->harga).'</h3>
									<h2 class="product-name"><a href="#">'.$p->nama_produk.'</a></h2>
									<div class="product-btns">
										<a class="primary-btn add-to-cart" href="'.base_url('detail/'.$p->id_produk) .'"> Lihat Detail</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					';
				}
			}
			echo $output;
		} else if($valfilter == 3){
			$output = '';

			$this->db->limit($limit, $start);
			$this->db->order_by("cast(harga as unsigned)", "desc");
			$this->db->select('*');
			$this->db->from('produk');
			$this->db->join('kategori','produk.kategori=kategori.id_kategori','Left');
			$data=$this->db->get();
			// $data= $query->result();

			
			if($data->num_rows() > 0)
			{
				foreach($data->result() as $p)
				{

					$output .= '
					<div class="post-id" id="'.$p->id_produk.'">
						<div class="col-md-4 col-sm-6 col-xs-6">
							<div class="product product-single">
								<div class="product-thumb">
									<div class="product-label">
										<span>'.$p->nama_kategori.'</span>
									</div>
									<img src="'.base_url('produk_img/'.$p->gambar) .'" style="height:300px;" alt="">
								</div>
								<div class="product-body">
									<h3 class="product-price">Rp '.nominal($p->harga).'</h3>
									<h2 class="product-name"><a href="#">'.$p->nama_produk.'</a></h2>
									<div class="product-btns">
										<a class="primary-btn add-to-cart" href="'.base_url('detail/'.$p->id_produk) .'"> Lihat Detail</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					';
				}
			}
			echo $output;
		}
	}


	public function loadmore()
    {
		$limit = $this->input->post('limit');
		$start = $this->input->post('start');
		$valfilter = $this->input->post('valfilter');

		


		if($valfilter == 'terbaru'){
			$this->db->limit($limit, $start);
			$this->db->order_by("id_produk", "desc");
			$this->db->select('*');
			$this->db->from('produk');
			$this->db->join('kategori','produk.kategori=kategori.id_kategori','Left');
			$data=$this->db->get();
			$output = '';
			if($data->num_rows() > 0)
			{
				foreach($data->result() as $p)
				{

					$output .= '
					<div class="post-id" id="'.$p->id_produk.'">
						<div class="col-md-4 col-sm-6 col-xs-6">
							<div class="product product-single">
								<div class="product-thumb">
									<div class="product-label">
										<span>'.$p->nama_kategori.'</span>
									</div>
									<img src="'.base_url('produk_img/'.$p->gambar) .'" style="height:300px;" alt="">
								</div>
								<div class="product-body">
									<h3 class="product-price">Rp '.nominal($p->harga).'</h3>
									<h2 class="product-name"><a href="#">'.$p->nama_produk.'</a></h2>
									<div class="product-btns">
										<a class="primary-btn add-to-cart" href="'.base_url('detail/'.$p->id_produk) .'"> Lihat Detail</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					';
				}
			}
			echo $output;
		} else if ($valfilter == 'terlama'){
			$this->db->limit($limit, $start);
			$this->db->order_by("id_produk", "asc");
			$this->db->select('*');
			$this->db->from('produk');
			$this->db->join('kategori','produk.kategori=kategori.id_kategori','Left');
			$data=$this->db->get();
			$output = '';
			if($data->num_rows() > 0)
			{
				foreach($data->result() as $p)
				{

					$output .= '
					<div class="post-id" id="'.$p->id_produk.'">
						<div class="col-md-4 col-sm-6 col-xs-6">
							<div class="product product-single">
								<div class="product-thumb">
									<div class="product-label">
										<span>'.$p->nama_kategori.'</span>
									</div>
									<img src="'.base_url('produk_img/'.$p->gambar) .'" style="height:300px;" alt="">
								</div>
								<div class="product-body">
									<h3 class="product-price">Rp '.nominal($p->harga).'</h3>
									<h2 class="product-name"><a href="#">'.$p->nama_produk.'</a></h2>
									<div class="product-btns">
										<a class="primary-btn add-to-cart" href="'.base_url('detail/'.$p->id_produk) .'"> Lihat Detail</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					';
				}
			}
			echo $output;
		} else if ($valfilter == 'termurah'){
			$this->db->limit($limit, $start);
			$this->db->order_by("cast(harga as unsigned)", "asc");
			$this->db->select('*');
			$this->db->from('produk');
			$this->db->join('kategori','produk.kategori=kategori.id_kategori','Left');
			$data=$this->db->get();
			$output = '';
			if($data->num_rows() > 0)
			{
				foreach($data->result() as $p)
				{

					$output .= '
					<div class="post-id" id="'.$p->id_produk.'">
						<div class="col-md-4 col-sm-6 col-xs-6">
							<div class="product product-single">
								<div class="product-thumb">
									<div class="product-label">
										<span>'.$p->nama_kategori.'</span>
									</div>
									<img src="'.base_url('produk_img/'.$p->gambar) .'" style="height:300px;" alt="">
								</div>
								<div class="product-body">
									<h3 class="product-price">Rp '.nominal($p->harga).'</h3>
									<h2 class="product-name"><a href="#">'.$p->nama_produk.'</a></h2>
									<div class="product-btns">
										<a class="primary-btn add-to-cart" href="'.base_url('detail/'.$p->id_produk) .'"> Lihat Detail</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					';
				}
			}
			echo $output;
		} else if ($valfilter == 'termahal'){
			$this->db->limit($limit, $start);
			$this->db->order_by("cast(harga as unsigned)", "desc");
			$this->db->select('*');
			$this->db->from('produk');
			$this->db->join('kategori','produk.kategori=kategori.id_kategori','Left');
			$data=$this->db->get();
			$output = '';
			if($data->num_rows() > 0)
			{
				foreach($data->result() as $p)
				{

					$output .= '
					<div class="post-id" id="'.$p->id_produk.'">
						<div class="col-md-4 col-sm-6 col-xs-6">
							<div class="product product-single">
								<div class="product-thumb">
									<div class="product-label">
										<span>'.$p->nama_kategori.'</span>
									</div>
									<img src="'.base_url('produk_img/'.$p->gambar) .'" style="height:300px;" alt="">
								</div>
								<div class="product-body">
									<h3 class="product-price">Rp '.nominal($p->harga).'</h3>
									<h2 class="product-name"><a href="#">'.$p->nama_produk.'</a></h2>
									<div class="product-btns">
										<a class="primary-btn add-to-cart" href="'.base_url('detail/'.$p->id_produk) .'"> Lihat Detail</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					';
				}
			}
			echo $output;
		}

		// $data= $query->result();

		
        
    }
	
	
	public function loadmoredata($id){
		
		$this->db->limit(6);
		$this->db->order_by("id_produk", "desc");
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->where('id_produk < ',$id);
		$this->db->join('kategori','produk.kategori=kategori.id_kategori','Left');
		$query=$this->db->get();
		$produk= $query->result();

		$data = array(
			'produk' => $produk,
		);


		$json = $this->load->view('landingpage/data',$data);


		echo json_encode($json);
	}
	public function keranjang()
	{
		$web = $this->m_data->select_where(array('id_setting' => 1),'setting_web')->row();
		$admin = $this->m_data->select_where(array('level' => 'super_admin' ),'user')->row();
		$cara = $this->m_data->select_where(array('id_setting' => 2),'setting_web')->row();
		$kategori = $this->m_data->tampil_data('kategori')->result();
		$id = $this->session->userdata('id_user');
		$transaksi = $this->db->query("SELECT * FROM transaksi WHERE id_user = '$id' ORDER BY id_transaksi DESC")->result();
		$data = array(
			'transaksi' => $transaksi,
			'web' => $web,
			'kategori' 	=> $kategori,
			'admin' => $admin,
			'cara' => $cara,
		);
		$this->load->view('landingpage/header',$data);
		$this->load->view('landingpage/keranjang',$data);
		$this->load->view('landingpage/footer',$data);
	}

	public function tentang_kami()
	{
		$web = $this->m_data->select_where(array('id_setting' => 1),'setting_web')->row();
		$admin = $this->m_data->select_where(array('level' => 'super_admin' ),'user')->row();
		$tentang = $this->m_data->select_where(array('id_setting' => 3),'setting_web')->row();
		$kategori = $this->m_data->tampil_data('kategori')->result();
		$data = array(
			'web' => $web,
			'kategori' 	=> $kategori,
			'admin' => $admin,
			'tentang' => $tentang,
		);
		$this->load->view('landingpage/header',$data);
		$this->load->view('landingpage/tentang_kami',$data);
		$this->load->view('landingpage/footer',$data);
	}


	public function pesan($kode)
	{
		if ($this->session->userdata('status') != "login"){
			redirect(base_url('auth'));
		} else {
			$web = $this->m_data->select_where(array('id_setting' => 1),'setting_web')->row();
			$admin = $this->m_data->select_where(array('level' => 'super_admin' ),'user')->row();
			$kategori = $this->m_data->tampil_data('kategori')->result();
			$profil = $this->m_data->select_where(array('id_user' => $this->session->userdata('id_user') ),'user')->row();
			$transaksi = $this->m_data->select_where(array('kode_transaksi' => $kode),'transaksi')->row();
			$produk = $this->m_data->select_where(array('id_produk' => $transaksi->id_produk ),'produk')->row();
			$data = array(
				'transaksi' => $transaksi,
				'web' => $web,
				'kategori' 	=> $kategori,
				'admin' => $admin,
				'profil' => $profil,
				'produk' => $produk,
			);
			$this->load->view('landingpage/header',$data);
			$this->load->view('landingpage/pesan',$data);
			$this->load->view('landingpage/footer',$data);
		}
	}

	public function invoice($kode)
	{
		if ($this->session->userdata('status') != "login"){
			redirect(base_url('auth'));
		} else {
			$web = $this->m_data->select_where(array('id_setting' => 1),'setting_web')->row();
			$admin = $this->m_data->select_where(array('level' => 'super_admin' ),'user')->row();
			$kategori = $this->m_data->tampil_data('kategori')->result();
			$bank = $this->m_data->tampil_data('bank')->result();
			$profil = $this->m_data->select_where(array('id_user' => $this->session->userdata('id_user') ),'user')->row();
			$transaksi = $this->m_data->select_where(array('kode_transaksi' => $kode),'transaksi')->row();
			$produk = $this->m_data->select_where(array('id_produk' => $transaksi->id_produk ),'produk')->row();
			$data = array(
				'kode' => $kode,
				'bank' => $bank,
				'transaksi' => $transaksi,
				'web' => $web,
				'kategori' 	=> $kategori,
				'admin' => $admin,
				'profil' => $profil,
				'produk' => $produk,
			);
			$this->load->view('landingpage/header',$data);
			$this->load->view('landingpage/invoice',$data);
			$this->load->view('landingpage/footer',$data);
		}
	}


	function cek_kabupaten(){
		$provinsi_id = $_GET['prov_id'];

		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL => "http://api.rajaongkir.com/starter/city?province=$provinsi_id",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "GET",
		CURLOPT_HTTPHEADER => array(
			"key: c9cabd216f6e1c41af6e72b952a3c070"
		),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		echo "cURL Error #:" . $err;
		} else {
		//echo $response;
		}

		$data = json_decode($response, true);
		for ($i=0; $i < count($data['rajaongkir']['results']); $i++) { 
			echo "<option value='".$data['rajaongkir']['results'][$i]['city_id']."'>".$data['rajaongkir']['results'][$i]['city_name']."</option>";
		}
	}


	function cek_ongkir(){
		$asal = $_POST['asal'];
		$id_kabupaten = $_POST['kab_id'];
		$kurir = $_POST['kurir'];
		$berat = $_POST['berat'];

		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => "origin=".$asal."&destination=".$id_kabupaten."&weight=".$berat."&courier=".$kurir."",
		CURLOPT_HTTPHEADER => array(
			"content-type: application/x-www-form-urlencoded",
			"key: c9cabd216f6e1c41af6e72b952a3c070"
		),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		echo "cURL Error #:" . $err;
		} else {
			$harga = 20000;
		$data = json_decode($response, true);
		echo $data['rajaongkir']['results'][0]['costs'][0]['cost'][0]['value'] + $harga;
		}
	}

}
?>
