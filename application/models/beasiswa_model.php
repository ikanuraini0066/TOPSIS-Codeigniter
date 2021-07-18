<?php

class beasiswa_model extends CI_model {

  public function get_data($table){
    return $this->db->get($table);  
  }

  public function insert_data($data,$table){
    $this->db->insert($table,$data);
  }

  public function update_data($table,$data,$where){
    $this->db->update($table,$data,$where);
  }

  public function delete_data($where,$table){
    $this->db->where($where);
    $this->db->delete($table);
  }
  
  public function ambil_id_mahasiswa($id)
  {
    $hasil = $this->db->where('id_mahasiswa',$id)->get('mahasiswa');
    if($hasil->num_rows() > 0){
      return $hasil->result();
    }else{
      return false;
    }
  }

  public function get_mahasiswa(){
    $query = $this->db->get('mahasiswa')->result();
  }

  public function ambil_id_kriteria($id)
  {
    $hasil = $this->db->where('id_kriteria',$id)->get('kriteria');
    if($hasil->num_rows() > 0){
      return $hasil->result();
    }else{
      return false;
    }
  }

  public function get_kriteria(){
    $query = $this->db->get('kriteria')->result();
  }

  
    //Ditambahin sendiri
    //buat menampilkan data nilai sesuai dengan id kriteria


    public function get_Nilai($id_kriteria)
    {
        $query = "SELECT id_nilai, id_kriteria, id_mahasiswa, nilai FROM nilai WHERE id_kriteria = ?";
        return $this->db->query($query, array($id_kriteria))->result_array();
    }

    public function get_Nilai2($id_kriteria, $id_mahasiswa)
    {
        $query = "SELECT id_nilai, id_kriteria, id_mahasiswa, nila FROM nilai WHERE id_kriteria = ? AND id_mahasiswa = ?";
        return $this->db->query($query, array($id_kriteria, $id_mahasiswa))->row_array();
    }

    // public function ambil_id_nilai()
    // {
    //   $hasil = $this->db->where('id_nilai',$id)->get('nilai');
    //   if($hasil->num_rows() > 0){
    //     return $hasil->result();
    //   }else{
    //     return false;
    //   }
    // }
  
    // public function get_nilai(){
    //   $query = $this->db->get('nilai')->result();
    // }
    
    // public  function get_kuadrat()
    // {
    //  // $query="SELECT id_kriteria, (pow(nilai,2)) AS nilai FROM nilai where id_kriteria ='.$id.' GROUP BY id_kriteria";
    //   // $stmt = $this->db->prepare("SELECT nilai FROM nilai_topsis WHERE id_kriteria='$id'");
    //   $query="SELECT id_nilai, (pow(nilai,2)) AS nilai FROM nilai";
    //   $result = $this->db->query($query);
    //   return $result->row()->nilai;
    // }
    
  // public function get_kuadrat(){
  //   $sql="SELECT id_nilai, id_kriteria, id_mahasiswa, nilai, (pow(nilai,2)) AS hasil_kuadrat FROM nilai  ORDER BY id_nilai";
  //   return $this->db->query($sql);
  // }

}
?>

