<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
{
	public $api_url = 'http://localhost/myadminresto/api/';

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$data['judul'] = 'Masuk Member';
		$this->load->view('header');
		$this->load->view('member/login');
		$this->load->view('footer');
	}

	function login()
	{
		$curl = curl_init();

		$email = $this->input->post('email');
		$password = $this->input->post('password');

		curl_setopt_array($curl, array(
			CURLOPT_URL => $this->api_url . 'users/login',
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
		$data = json_decode($response);
		if ($response) {
			$the_session = array(
				'id' => $data->id,
				'name' => $data->name,
				'email' => $data->email,
				'nama_warung' => $data->nama_warung,
				'asset' => $data->asset,
			);
			$this->session->set_userdata($the_session);
			redirect(base_url() . 'welcome');
		} else {
			$this->session->set_flashdata('message_login', 'Email atau Password anda salah');
			$this->index();
		}
	}

	function register()
	{
		$data['judul'] = 'Registrasi Member';
		$this->load->view('header', $data);
		$this->load->view('member/register');
		$this->load->view('footer');
	}

	function register_user()
	{

		$this->form_validation->set_rules('email', 'Alamat Email', 'required|trim|valid_email', [
			'valid_email' => 'Email Tidak Benar!!',
		]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
			'matches' => 'Password Tidak Sama!!',
			'min_length' => 'Password Terlalu Pendek'
		]);
		$this->form_validation->set_rules('password2', 'Repeat Password', 'required|trim|matches[password1]');
		if ($this->form_validation->run() == false) {
			$data['judul'] = 'Registrasi Member';
			$this->load->view('header', $data);
			$this->load->view('member/register');
			$this->load->view('footer');
		} else {
			$curl = curl_init();

			$nama = $this->input->post('nama');
			$tlp = $this->input->post('tlp');
			$email = $this->input->post('email');
			$alamat = $this->input->post('alamat');
			$password = $this->input->post('password1');

			curl_setopt_array($curl, array(
				CURLOPT_URL => $this->api_url . 'member/create',
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

			redirect(base_url() . 'member/register');
		}
	}

	function logout()
	{
		session_destroy();
		redirect(base_url() . 'user');
	}
}
