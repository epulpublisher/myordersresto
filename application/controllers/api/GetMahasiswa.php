<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH. "libraries/Format.php";
require APPPATH. "libraries/RestController.php";
use chriskacerguis\RestServer\RestController;

class GetMahasiswa extends RestController
{
   public function __construct(){
       parent::__construct();
       $this->load->model('ModelMahasiswa');
   } 
   public function index_get(){
       $mhs=new ModelMahasiswa;
       $resultmhs= $mhs->get_mahasiswa();
       $this->response($resultmhs,200);
   }
   public function MahasiswaById_get($nim){
    $mhs=new ModelMahasiswa;
    $resultmhs= $mhs->get_mahasiswa_byid($nim);
    $this->response($resultmhs,200);
   }
   public function AddMahasiswa_post(){
    $mhs=new ModelMahasiswa;
    $data=[
        'nim' =>$this->input->post('nim'),
        'nama' =>$this->input->post('nama'),
        'tlp' =>$this->input->post('tlp'),
        'alamat' =>$this->input->post('alamat'),
    ];
    $addmhs= $mhs->post_mahasiswa($data);
     if($addmhs > 0){
        $this->response(
            [
                'status' =>true,
                'pesan' =>'insert berhasil'
            ], RestController::HTTP_OK
        );
     }
     else{
        $this->response(
            [
                'status' =>false,
                'pesan' =>'insert gagal'
            ], RestController::HTTP_BAD_REQUEST
        );

     }
   }
   public function UpdateMahasiswa_put($nim){
    $mhs=new ModelMahasiswa;
    $data=[
        'nama' =>$this->put('nama'),
        'tlp' =>$this->put('tlp'),
        'alamat' =>$this->put('alamat'),
    ];
    $putmhs= $mhs->put_mahasiswa($nim,$data);
     if($putmhs > 0){
        $this->response(
            [
                'status' =>true,
                'pesan' =>'update berhasil'
            ], RestController::HTTP_OK
        );
     }
     else{
        $this->response(
            [
                'status' =>false,
                'pesan' =>'update gagal'
            ], RestController::HTTP_BAD_REQUEST
        );

     }
   }
   public function DeleteMahasiswa_delete($nim){
    $mhs=new ModelMahasiswa;
    $delmhs= $mhs->del_mahasiswa($nim);
     if($delmhs > 0){
        $this->response(
            [
                'status' =>true,
                'pesan' =>'delete berhasil'
            ], RestController::HTTP_OK
        );
     }
     else{
        $this->response(
            [
                'status' =>false,
                'pesan' =>'delete gagal'
            ], RestController::HTTP_BAD_REQUEST
        );

     }
   }
}


?>