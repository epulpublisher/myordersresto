<?php

class Beranda extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->api = "http://localhost/myadminresto/api/menu";
		$this->load->library('Curl.php');
		url_myadminresto();
	}

	public function index()
	{
		if ($this->session->userdata('id')) {
			redirect('home');
		}
		$data['judul'] = "Beranda";
		$data['minuman'] =	json_decode($this->curl->simple_get($this->api . '/minuman'), true);
		$data['makanan'] =	json_decode($this->curl->simple_get($this->api . '/makanan'), true);
		$data['buah'] =	json_decode($this->curl->simple_get($this->api . '/buah'), true);
		$data['promo'] = json_decode($this->curl->simple_get($this->api . '/promo'), true);
		$this->load->view('layout/header-beforelogin', $data);
		$this->load->view('content/beranda', $data);
		$this->load->view('layout/footer');
	}

	public function kontak()
	{
		$this->load->view('layout/header-beforelogin');
		$this->load->view('content/kontak');
		$this->load->view('layout/footer');
	}
}
