<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mahasiswa extends CI_Controller
{
    function __construct(){
        parent::__construct();
        $this->api="http://localhost/restfulapi/api/mahasiswa/";
        $this->load->library('Curl.php');
        $this->load->helper('url');
        $this->load->helper('form');
    }
    function index(){
        $data['mahasiswa']=json_decode($this->curl->simple_get($this->api),true);
       $this->load->view('listmahasiswa',$data);
    }    
    function create(){
      if(isset($_POST['submit'])){
          $data=array(
              'nim' =>$this->input->post('nim'),
              'nama' =>$this->input->post('nama'),
              'tlp' =>$this->input->post('tlp'),
              'alamat' =>$this->input->post('alamat')
          );
          $insert=$this->curl->simple_post($this->api.'/add',$data,array(CURLOPT_BUFFERSIZE=>10));
          redirect('mahasiswa');

      }
      else{
          $this->load->view('createmahasiswa');

      }
    }     
    function edit(){
        if(isset($_POST['submit'])){
            $nim=$this->input->post('nim');
            $data=array(
                'nama' =>$this->input->post('nama'),
                'tlp' =>$this->input->post('tlp'),
                'alamat' =>$this->input->post('alamat')
            );
            $update=$this->curl->simple_put($this->api.'/update/'.$nim,$data,array(CURLOPT_BUFFERSIZE=>10));
            redirect('mahasiswa');
  
        }
        else{
           $nim=$this->uri->segment(3);
           $data['mahasiswa']=json_decode($this->curl->simple_get($this->api.'/nim/'.$nim),true);
           $this->load->view('editmahasiswa',$data);
        }
      }  
      function delete($nim){
        if(empty($nim)){
            redirect('mahasiswa');
        }
        else{
            $nim=$this->uri->segment(3);
            $data['mahasiswa']=json_decode($this->curl->simple_delete($this->api.'/delete/'.$nim),true);
            redirect('mahasiswa');
        }
      }   
   
}

?>