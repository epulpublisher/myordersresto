<?php

class Beranda extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->api = "http://localhost/myadminresto/api/menu";
		$this->load->library('Curl.php');
		$this->load->helper('url');
		$this->load->helper('form');
	}
	#before login
	public function index()
	{
		$data['judul'] = "Beranda";
		$data['menu'] = json_decode($this->curl->simple_get($this->api), true);
		$data['promo'] = json_decode($this->curl->simple_get($this->api . '/promo'), true);
		$this->load->view('layout/header-beforelogin', $data);
		$this->load->view('content/beranda', $data);
		$this->load->view('layout/footer');
	}

	public function kontak()
	{
		$this->load->view('layout/header-beforelogin');
		$this->load->view('kontak');
		$this->load->view('layout/footer');
	}
}
