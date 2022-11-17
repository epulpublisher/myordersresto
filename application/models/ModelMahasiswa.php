<?php
class ModelMahasiswa extends CI_Model
{
    public function get_mahasiswa(){
        $query=$this->db->get('mahasiswa');
        return $query->result();
    }
    public function get_mahasiswa_byid($nim){
        $this->db->where('nim',$nim);
        $query=$this->db->get('mahasiswa');
        return $query->row();
    }
    public function post_mahasiswa($data){
       return $this->db->insert('mahasiswa',$data);
     
    }
    public function put_mahasiswa($nim,$data){
        $this->db->where('nim',$nim);
        return $this->db->update('mahasiswa',$data);
      
     }
     public function del_mahasiswa($nim){
        return $this->db->delete('mahasiswa',['nim' =>$nim]);
      
     }
}

?>