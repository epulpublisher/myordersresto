<?php

class Home extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->api = "http://localhost/myadminresto/api/";
		cek_login();
		url_myadminresto();
		format_rupiah();
	}

	public function index()
	{
		$data['judul'] = 'Pesan';
		$id_member = $this->session->userdata('id');
		$data['user'] = json_decode($this->curl->simple_get($this->api . '/member/id/' . $id_member), true);
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
		$id_member = $this->session->userdata('id');
		$data['user'] = json_decode($this->curl->simple_get($this->api . '/member/id/' . $id_member), true);
		$data['menu'] =	json_decode($this->curl->simple_get($this->api . 'menu/makanan'), true);
		$data['promo'] = json_decode($this->curl->simple_get($this->api . 'menu/promo'), true);
		$id_member = $this->session->userdata('id');
		$data['rp_keranjang'] = json_decode($this->curl->simple_get($this->api . '/keranjang/rpbymember/' . $id_member), true);
		$data['jml_keranjang'] = json_decode($this->curl->simple_get($this->api . '/keranjang/jmlbymember/' . $id_member), true);
		$this->load->view('layout/header-afterlogin', $data);
		$this->load->view('content/pesan-makanan', $data);
		$this->load->view('layout/footer');
	}

	public function minuman()
	{
		$data['judul'] = 'Pesan';
		$id_member = $this->session->userdata('id');
		$data['user'] = json_decode($this->curl->simple_get($this->api . '/member/id/' . $id_member), true);
		$data['menu'] =	json_decode($this->curl->simple_get($this->api . 'menu/minuman'), true);
		$data['promo'] = json_decode($this->curl->simple_get($this->api . 'menu/promo'), true);
		$id_member = $this->session->userdata('id');
		$data['rp_keranjang'] = json_decode($this->curl->simple_get($this->api . '/keranjang/rpbymember/' . $id_member), true);
		$data['jml_keranjang'] = json_decode($this->curl->simple_get($this->api . '/keranjang/jmlbymember/' . $id_member), true);
		$this->load->view('layout/header-afterlogin', $data);
		$this->load->view('content/pesan-minuman', $data);
		$this->load->view('layout/footer');
	}

	public function buah()
	{
		$data['judul'] = 'Pesan';
		$id_member = $this->session->userdata('id');
		$data['user'] = json_decode($this->curl->simple_get($this->api . '/member/id/' . $id_member), true);
		$data['menu'] =	json_decode($this->curl->simple_get($this->api . 'menu/buah'), true);
		$data['promo'] = json_decode($this->curl->simple_get($this->api . 'menu/promo'), true);
		$id_member = $this->session->userdata('id');
		$data['rp_keranjang'] = json_decode($this->curl->simple_get($this->api . '/keranjang/rpbymember/' . $id_member), true);
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
		$responok = json_decode($response, true);
		if ($responok == "OK") {
			$this->session->set_flashdata('pesan', 8);
			redirect('home');
		} else {
			$this->session->set_flashdata('pesan', 7);
			redirect('home');
		}
	}

	public function shopingcart()
	{
		$data['judul'] = 'Pesan';
		$id_member = $this->session->userdata('id');
		$data['user'] = json_decode($this->curl->simple_get($this->api . '/member/id/' . $id_member), true);
		$id_member = $this->session->userdata('id');
		$data['bymember_keranjang'] = json_decode($this->curl->simple_get($this->api . '/keranjang/bymember/' . $id_member), true);
		$data['jml_keranjang'] = json_decode($this->curl->simple_get($this->api . '/keranjang/jmlbymember/' . $id_member), true);
		$data['rp_keranjang'] = json_decode($this->curl->simple_get($this->api . '/keranjang/rpbymember/' . $id_member), true);
		$this->load->view('layout/header-afterlogin', $data);
		$this->load->view('content/shoping-cart', $data);
		$this->load->view('layout/footer');
	}

	function delete_cart()
	{
		$id = $this->uri->segment(3);
		if (empty($id)) {
			redirect('home/shopingcart');
		} else {
			$data['delete'] = json_decode($this->curl->simple_delete($this->api . '/keranjang/delete/' . $id), true);
			redirect('home/shopingcart');
		}
	}

	public function update_cart($id)
	{
		$curl = curl_init();
		$qty = $this->input->post('qty');
		$harga = $this->input->post('harga');
		if ($qty < 1) {
			$this->session->set_flashdata('pesan', 9);
			redirect(base_url() . 'home/shopingcart');
		} else {
			curl_setopt_array($curl, array(
				CURLOPT_URL => $this->api . 'keranjang/byid/' . $id,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => '',
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS => "qty=$qty&harga=$harga",
				CURLOPT_HTTPHEADER => array(
					'Content-Type: application/x-www-form-urlencoded'
				),
			));
			$response = curl_exec($curl);
			curl_close($curl);
			$this->session->set_flashdata('pesan', 10);
			redirect(base_url() . 'home/shopingcart');
		}
	}

	public function post_cart($id_member)
	{
		$curl = curl_init();
		$this->form_validation->set_rules('total_harga', 'Total Harga', 'required|trim', [
			'required' => 'Pilih menu atau produk terlebih dahulu',
		]);
		$this->form_validation->set_rules('no_meja', 'Nomor Meja', 'required|trim', [
			'required' => 'Pilih nomor meja terlebih dahulu',
		]);
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('pesan', 11);
			$data['judul'] = 'Pesan';
			$id_member = $this->session->userdata('id');
			$data['user'] = json_decode($this->curl->simple_get($this->api . '/member/id/' . $id_member), true);
			$id_member = $this->session->userdata('id');
			$data['bymember_keranjang'] = json_decode($this->curl->simple_get($this->api . '/keranjang/bymember/' . $id_member), true);
			$data['jml_keranjang'] = json_decode($this->curl->simple_get($this->api . '/keranjang/jmlbymember/' . $id_member), true);
			$data['rp_keranjang'] = json_decode($this->curl->simple_get($this->api . '/keranjang/rpbymember/' . $id_member), true);
			$this->load->view('layout/header-afterlogin', $data);
			$this->load->view('content/shoping-cart', $data);
			$this->load->view('layout/footer');
		} else {
			$total_harga = $this->input->post('total_harga');
			$no_meja = $this->input->post('no_meja');
			$kode_pesanan = "BSR" . strtoupper(random_string('alnum', 5));
			curl_setopt_array($curl, array(
				CURLOPT_URL => $this->api . 'pesanan/create/' . $id_member,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => '',
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS => "total_harga=$total_harga&no_meja=$no_meja&kode_pesanan=$kode_pesanan",
				CURLOPT_HTTPHEADER => array(
					'Content-Type: application/x-www-form-urlencoded'
				),
			));
			$response = curl_exec($curl);
			curl_close($curl);
			$data['judul'] = 'Invoice Pesanan';
			$id_member = $this->session->userdata('id');
			$data['user'] = json_decode($this->curl->simple_get($this->api . '/member/id/' . $id_member), true);
			$data['bykode_pesanan'] = json_decode($this->curl->simple_get($this->api . 'pesanan/bykode/' . $kode_pesanan), true);
			$data['dt_pesanan'] = json_decode($this->curl->simple_get($this->api . 'dtpesanan/bykode/' . $kode_pesanan), true);
			$sroot = $_SERVER['DOCUMENT_ROOT'];
			include $sroot . "/myordersresto/application/third_party/dompdf/autoload.inc.php";
			$dompdf = new Dompdf\Dompdf(['isRemoteEnabled' => true]);
			$this->load->view('content/invoice', $data);
			$paper_size = 'A4'; // ukuran kertas
			$orientation = 'potrait'; //tipe format kertas potrait atau landscape
			$html = $this->output->get_output();
			$dompdf->setPaper($paper_size, $orientation);
			//Convert to PDF
			$dompdf->loadHtml($html);
			$dompdf->render();
			$dompdf->stream("Invoice.pdf", array('Attachment' => 0));
		}
	}

	public function tim()
	{
		$data['judul'] = 'Profil Saya';
		$id_member = $this->session->userdata('id');
		$data['user'] = json_decode($this->curl->simple_get($this->api . '/member/id/' . $id_member), true);
		$data['rp_keranjang'] = json_decode($this->curl->simple_get($this->api . '/keranjang/rpbymember/' . $id_member), true);
		$data['jml_keranjang'] = json_decode($this->curl->simple_get($this->api . '/keranjang/jmlbymember/' . $id_member), true);
		$this->load->view('layout/header-afterlogin', $data);
		$this->load->view('content/tim');
		$this->load->view('layout/footer');
	}

	public function kontak()
	{
		$data['judul'] = 'Profil Saya';
		$id_member = $this->session->userdata('id');
		$data['user'] = json_decode($this->curl->simple_get($this->api . '/member/id/' . $id_member), true);
		$data['rp_keranjang'] = json_decode($this->curl->simple_get($this->api . '/keranjang/rpbymember/' . $id_member), true);
		$data['jml_keranjang'] = json_decode($this->curl->simple_get($this->api . '/keranjang/jmlbymember/' . $id_member), true);
		$this->load->view('layout/header-afterlogin', $data);
		$this->load->view('content/kontak');
		$this->load->view('layout/footer');
	}

	public function myprofile()
	{
		$data['judul'] = 'Profil Saya';
		$id_member = $this->session->userdata('id');
		$data['user'] = json_decode($this->curl->simple_get($this->api . '/member/id/' . $id_member), true);
		$data['rp_keranjang'] = json_decode($this->curl->simple_get($this->api . '/keranjang/rpbymember/' . $id_member), true);
		$data['jml_keranjang'] = json_decode($this->curl->simple_get($this->api . '/keranjang/jmlbymember/' . $id_member), true);
		$this->load->view('layout/header-afterlogin', $data);
		$this->load->view('member/index', $data);
		$this->load->view('layout/footer');
	}

	public function ubahprofil()
	{
		$data['judul'] = 'Ubah Profil';
		$id_member = $this->session->userdata('id');
		$data['user'] = json_decode($this->curl->simple_get($this->api . '/member/id/' . $id_member), true);
		$data['rp_keranjang'] = json_decode($this->curl->simple_get($this->api . '/keranjang/rpbymember/' . $id_member), true);
		$data['jml_keranjang'] = json_decode($this->curl->simple_get($this->api . '/keranjang/jmlbymember/' . $id_member), true);
		$this->load->view('layout/header-afterlogin', $data);
		$this->load->view('member/ubah-anggota', $data);
		$this->load->view('layout/footer');
	}

	public function updateProfil()
	{
		$data['judul'] = 'Profil Saya';
		$id_member = $this->session->userdata('id');
		$data['user'] = json_decode($this->curl->simple_get($this->api . '/member/id/' . $id_member), true);
		$data['rp_keranjang'] = json_decode($this->curl->simple_get($this->api . '/keranjang/rpbymember/' . $id_member), true);
		$data['jml_keranjang'] = json_decode($this->curl->simple_get($this->api . '/keranjang/jmlbymember/' . $id_member), true);
		$this->form_validation->set_rules('tlp', 'Telepon', 'required|trim|numeric', [
			'numeric' => 'Nomor telepon tidak benar!',
		]);
		$this->form_validation->set_rules('email', 'Alamat Email', 'required|trim|valid_email', [
			'valid_email' => 'Email tidak benar!',
		]);
		if ($this->form_validation->run() == false) {
			$this->load->view('layout/header-afterlogin', $data);
			$this->load->view('member/ubah-anggota', $data);
			$this->load->view('layout/footer');
		} else {
			$curl = curl_init();
			$nama = $this->input->post('nama');
			$tlp = $this->input->post('tlp');
			$email = $this->input->post('email');
			$alamat = $this->input->post('alamat');
			curl_setopt_array($curl, array(
				CURLOPT_URL => $this->api . 'member/update/' . $id_member,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => '',
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => 'PUT',
				CURLOPT_POSTFIELDS => "nama=$nama&tlp=$tlp&email=$email&alamat=$alamat",
				CURLOPT_HTTPHEADER => array(
					'Content-Type: application/x-www-form-urlencoded'
				),
			));
			$response = curl_exec($curl);
			curl_close($curl);
			$this->session->set_flashdata('pesan', 10);
			redirect(base_url() . 'home/ubahprofil');
		}
	}

	public function view_ubah_password()
	{
		$data['judul'] = 'Ubah Password';
		$id_member = $this->session->userdata('id');
		$data['user'] = json_decode($this->curl->simple_get($this->api . '/member/id/' . $id_member), true);
		$data['rp_keranjang'] = json_decode($this->curl->simple_get($this->api . '/keranjang/rpbymember/' . $id_member), true);
		$data['jml_keranjang'] = json_decode($this->curl->simple_get($this->api . '/keranjang/jmlbymember/' . $id_member), true);
		$this->load->view('layout/header-afterlogin', $data);
		$this->load->view('member/ubah-password', $data);
		$this->load->view('layout/footer');
	}

	public function ubahPassword()
	{
		$data['judul'] = 'Profil Saya';
		$currentpassword = $this->session->userdata('password');
		$id_member = $this->session->userdata('id');
		$data['user'] = json_decode($this->curl->simple_get($this->api . '/member/id/' . $id_member), true);
		$data['rp_keranjang'] = json_decode($this->curl->simple_get($this->api . '/keranjang/rpbymember/' . $id_member), true);
		$data['jml_keranjang'] = json_decode($this->curl->simple_get($this->api . '/keranjang/jmlbymember/' . $id_member), true);

		$this->form_validation->set_rules('password_baru1', 'Password Baru', 'required|trim|min_length[8]', [
			'required' => 'Password baru harus diisi',
			'min_length' => 'Minamal kata sandi 8  digit',
		]);

		$this->form_validation->set_rules('password_baru2', 'Konfirmasi Password Baru', 'required|trim|min_length[4]|matches[password_baru1]', [
			'required' => 'Konfirmasi password harus diisi',
			'min_length' => 'Minamal kata sandi 4 digit',
			'matches' => 'Komfirmasi sandi baru tidak sama dengan kata sandi baru'
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view('layout/header-afterlogin', $data);
			$this->load->view('member/ubah-password', $data);
			$this->load->view('layout/footer');
		} else {
			$pwd_skrg = $this->input->post('password_sekarang', true);
			$pwd_baru = $this->input->post('password_baru1', true);
			if (!password_verify($pwd_skrg, $currentpassword)) {
				$this->session->set_flashdata('pesan', 1);
				redirect('home/view_ubah_password');
			} else {
				if ($pwd_skrg == $pwd_baru) {
					$this->session->set_flashdata('pesan', 2);
					redirect('home/view_ubah_password');
				} else {
					$curl = curl_init();
					curl_setopt_array($curl, array(
						CURLOPT_URL => $this->api . 'member/update-password/' . $id_member,
						CURLOPT_RETURNTRANSFER => true,
						CURLOPT_ENCODING => '',
						CURLOPT_MAXREDIRS => 10,
						CURLOPT_TIMEOUT => 0,
						CURLOPT_FOLLOWLOCATION => true,
						CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
						CURLOPT_CUSTOMREQUEST => 'PUT',
						CURLOPT_POSTFIELDS => "pwd_baru=$pwd_baru",
						CURLOPT_HTTPHEADER => array(
							'Content-Type: application/x-www-form-urlencoded'
						),
					));
					$response = curl_exec($curl);
					curl_close($curl);
					$this->session->set_flashdata('pesan', 3);
					redirect(base_url() . 'home/view_ubah_password');
				}
			}
		}
	}
}
