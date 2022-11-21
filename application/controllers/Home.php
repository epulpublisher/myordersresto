<?php

class Home extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->api = "http://localhost/myadminresto/api/";
		$this->load->library('Curl.php');
		$this->load->helper('url');
		$this->load->helper('form');
		cek_login();
	}

	#after login
	public function index()
	{
		$data['judul'] = 'Pesan';
		$data['user'] = $this->session->userdata();
		$data['menu'] =	json_decode($this->curl->simple_get($this->api . 'menu'), true);
		$data['promo'] = json_decode($this->curl->simple_get($this->api . 'menu/promo'), true);
		$id_member = $this->session->userdata('id');
		$data['jml_keranjang'] = json_decode($this->curl->simple_get($this->api . '/keranjang/jmlbymember/' . $id_member), true);
		$data['rp_keranjang'] = json_decode($this->curl->simple_get($this->api . '/keranjang/rpbymember/' . $id_member), true);
		$this->load->view('layout/header-afterlogin', $data);
		$this->load->view('content/pesan-semua', $data);
		$this->load->view('layout/footer');
	}

	public function makanan()
	{
		$data['judul'] = 'Pesan';
		$data['user'] = $this->session->userdata();
		$data['menu'] =	json_decode($this->curl->simple_get($this->api . 'menu/makanan'), true);
		$data['promo'] = json_decode($this->curl->simple_get($this->api . 'menu/promo'), true);
		$id_member = $this->session->userdata('id');
		$data['jml_keranjang'] = json_decode($this->curl->simple_get($this->api . '/keranjang/jmlbymember/' . $id_member), true);
		$this->load->view('layout/header-afterlogin', $data);
		$this->load->view('content/pesan-makanan', $data);
		$this->load->view('layout/footer');
	}

	public function minuman()
	{
		$data['judul'] = 'Pesan';
		$data['user'] = $this->session->userdata();
		$data['menu'] =	json_decode($this->curl->simple_get($this->api . 'menu/minuman'), true);
		$data['promo'] = json_decode($this->curl->simple_get($this->api . 'menu/promo'), true);
		$id_member = $this->session->userdata('id');
		$data['jml_keranjang'] = json_decode($this->curl->simple_get($this->api . '/keranjang/jmlbymember/' . $id_member), true);
		$this->load->view('layout/header-afterlogin', $data);
		$this->load->view('content/pesan-minuman', $data);
		$this->load->view('layout/footer');
	}

	public function buah()
	{
		$data['judul'] = 'Pesan';
		$data['user'] = $this->session->userdata();
		$data['menu'] =	json_decode($this->curl->simple_get($this->api . 'menu/buah'), true);
		$data['promo'] = json_decode($this->curl->simple_get($this->api . 'menu/promo'), true);
		$id_member = $this->session->userdata('id');
		$data['jml_keranjang'] = json_decode($this->curl->simple_get($this->api . '/keranjang/jmlbymember/' . $id_member), true);
		$this->load->view('layout/header-afterlogin', $data);
		$this->load->view('content/pesan-buah', $data);
		$this->load->view('layout/footer');
	}

	public function Keranjang()
	{
		$id_member = $this->uri->segment(3);
		$id_menu = $this->uri->segment(4);
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => $this->api . 'keranjang/create',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS => "id_member=$id_member&id_menu=$id_menu",
			CURLOPT_HTTPHEADER => array(
				'Content-Type: application/x-www-form-urlencoded'
			),
		));
		$response = curl_exec($curl);
		curl_close($curl);
		$data['jml_keranjang'] = json_decode($response, true);
		if ($response) {
			redirect('home');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Anda telah memilih item tersebut</div>');
			redirect('home');
		}
	}

	public function shopingcart()
	{
		$data['judul'] = 'Pesan';
		$data['user'] = $this->session->userdata();
		$data['menu'] =	json_decode($this->curl->simple_get($this->api . 'menu'), true);
		$data['promo'] = json_decode($this->curl->simple_get($this->api . 'menu/promo'), true);
		$id_member = $this->session->userdata('id');
		$data['jml_keranjang'] = json_decode($this->curl->simple_get($this->api . '/keranjang/jmlbymember/' . $id_member), true);
		$data['rp_keranjang'] = json_decode($this->curl->simple_get($this->api . '/keranjang/rpbymember/' . $id_member), true);
		$this->load->view('layout/header-afterlogin', $data);
		$this->load->view('content/shoping-cart', $data);
		$this->load->view('layout/footer');
	}





	public function myprofile()
	{
		$data['judul'] = 'Pesan';
		$data['user'] = $this->session->userdata();
		$this->load->view('layout/header-afterlogin', $data);
		$this->load->view('member/index', $data);
		$this->load->view('layout/footer');
	}

	public function ubahprofil()
	{
		$data['judul'] = 'Profil Saya';
		$data['user'] = $this->session->userdata();
		$this->load->view('layout/header-afterlogin', $data);
		$this->load->view('member/ubah-anggota');
		$this->load->view('layout/footer');
	}







	public function kontak()
	{
		$data['judul'] = 'Profil Saya';
		$data['user'] = $this->session->userdata();
		$this->load->view('layout/header-afterlogin', $data);
		$this->load->view('kontak');
		$this->load->view('layout/footer');
	}
}
