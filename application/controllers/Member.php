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
			echo  $this->session->userdata('nama');
			redirect(base_url() . 'home');
		} else {
			echo "gagal";
			exit;
			$this->session->set_flashdata('message_login', 'Email atau Password anda salah');
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
			redirect(base_url() . 'member');
		}
	}
	public function ubahProfil()
	{
		$data['judul'] = 'Ubah Profil';
		// $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
		$data['user'] = $this->session->userdata();

		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim', [
			'required' => 'Nama tidak Boleh Kosong'
		]);


		if ($this->form_validation->run() == false) {
			$this->load->view('layout/header-afterlogin', $data);
			$this->load->view('member/ubah-anggota');
			$this->load->view('layout/footer');
		} else {

			$nama = $this->input->post('nama', true);
			$email = $this->input->post('email', true);

			//jika ada gambar yang akan diupload
			$upload_image = $_FILES['image']['name'];

			if ($upload_image) {
				$config['upload_path'] = './assets/img/profile/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']     = '3000';
				$config['max_width'] = '1024';
				$config['max_height'] = '1000';
				$config['file_name'] = 'pro' . time();

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('image')) {
					$gambar_lama = $data['user']['image'];
					if ($gambar_lama != 'default.jpg') {
						unlink(FCPATH . 'assets/img/profile/' . $gambar_lama);
					}

					$gambar_baru = $this->upload->data('file_name');
					$this->db->set('image', $gambar_baru);
				} else {
				}
			}
			$this->db->set('nama', $nama);
			$this->db->where('email', $email);
			$this->db->update('member');

			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Profil Berhasil diubah </div>');
			redirect('/home/ubahprofil');
		}
	}
}
