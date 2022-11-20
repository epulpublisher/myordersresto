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
		$this->load->view('layout/header-afterlogin', $data);
		$this->load->view('content/shop-grid', $data);
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

	public function shopingcart()
	{
		$this->load->view('layout/header-afterlogin');
		$this->load->view('shoping-cart');
		$this->load->view('layout/footer');
	}
}
