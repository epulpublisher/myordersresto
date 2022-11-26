<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Member extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->api = "http://localhost/myadminresto/api/member/";
		$this->load->library('Curl.php');
		$this->load->helper('url');
		$this->load->helper('form');
	}

	function index()
	{
		$data['judul'] = 'Masuk Member';
		$this->load->view('member/header-login-register', $data);
		$this->load->view('member/login');
		$this->load->view('layout/footer');
	}

	function login()
	{
		$curl = curl_init();

		$email = $this->input->post('email');
		$password = $this->input->post('password');
		curl_setopt_array($curl, array(
			CURLOPT_URL => $this->api . 'login',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS => "email=$email&password=$password",
			CURLOPT_HTTPHEADER => array(
				'Content-Type: application/x-www-form-urlencoded'
			),
		));

		$response = curl_exec($curl);
		curl_close($curl);
		$data = json_decode($response, true);
		if ($response) {
			$this->session->set_userdata($data);
			$this->session->set_flashdata('pesan', 5);
			redirect(base_url() . 'home');
		} else {
			$this->session->set_flashdata('pesan', 4);
			$this->index();
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('id');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Anda telah logout!!</div>');
		redirect('beranda');
	}

	function register()
	{
		$data['judul'] = 'Registrasi Member';
		$this->load->view('member/header-login-register', $data);
		$this->load->view('member/register');
		$this->load->view('layout/footer');
	}

	function create()
	{
		$this->form_validation->set_rules('email', 'Alamat Email', 'required|trim|valid_email', [
			'valid_email' => 'Email tidak benar!',
		]);
		$this->form_validation->set_rules('tlp', 'Telepon', 'required|trim|numeric', [
			'numeric' => 'Nomor telepon tidak benar!',
		]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]', [
			'min_length' => 'Minimal kata sandi 8 digit!'
		]);
		$this->form_validation->set_rules('password2', 'Repeat Password', 'required|trim|matches[password2]', [
			'matches' => 'Password tidak sama!',
		]);
		if ($this->form_validation->run() == false) {
			$data['judul'] = 'Registrasi Member';
			$this->load->view('member/header-login-register', $data);
			$this->load->view('member/register');
			$this->load->view('layout/footer');
		} else {
			$curl = curl_init();
			$nama = $this->input->post('nama');
			$tlp = $this->input->post('tlp');
			$email = $this->input->post('email');
			$alamat = $this->input->post('alamat');
			$password = $this->input->post('password1');
			curl_setopt_array($curl, array(
				CURLOPT_URL => $this->api . 'create',
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => '',
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS => "nama=$nama&tlp=$tlp&email=$email&alamat=$alamat&password=$password",
				CURLOPT_HTTPHEADER => array(
					'Content-Type: application/x-www-form-urlencoded'
				),
			));
			$response = curl_exec($curl);
			curl_close($curl);
			$this->session->set_flashdata('pesan', 6);
			redirect(base_url() . 'member');
		}
	}
}
