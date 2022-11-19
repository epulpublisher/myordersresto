<?php

class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // $this->api = "http://localhost/restfulapi/api/mahasiswa/";
        $this->load->library('Curl.php');
        $this->load->helper('url');
        $this->load->helper('form');
    }

    public function index()
    {
        $this->load->view('header');
        $this->load->view('dashboard');
        $this->load->view('footer');
    }

    public function pesan()
    {
        $this->load->view('header');
        $this->load->view('shop-grid');
        $this->load->view('footer');
    }

    public function kontak()
    {
        $this->load->view('header');
        $this->load->view('kontak');
        $this->load->view('footer');
    }
    public function myprofile()
    {
        $this->load->view('header');
        $this->load->view('member/index');
        $this->load->view('footer');
    }

    public function ubahprofil()
    {
        $this->load->view('header');
        $this->load->view('member/ubah-anggota');
        $this->load->view('footer');
    }

    public function shopingcart()
    {
        $this->load->view('header');
        $this->load->view('shoping-cart');
        $this->load->view('footer');

    }
}
