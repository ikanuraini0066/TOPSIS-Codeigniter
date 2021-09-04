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

  
//   public function pembagi(){
//     $query ="SELECT b.`id_kriteria`, SQRT(jumlah) AS pembagi
//     FROM(
    
//       SELECT a.`id_mahasiswa`, a.`id_kriteria`, SUM(kuadrat) AS jumlah
    
//         FROM(
    
//         SELECT id_mahasiswa, id_kriteria, id_nilai, nilai, (POW(nilai,2)) AS kuadrat FROM nilai a
//         )a
//       GROUP BY id_kriteria
//       )b";

      
//   $result = $this->db->query($query);
//   return $result->result();
// }


public function Pembagi(){
    $data ="SELECT b.`id_kriteria`, SQRT(jumlah) AS pembagi
       FROM(
        
          SELECT a.`id_mahasiswa`, a.`id_kriteria`, SUM(kuadrat) AS jumlah
        
            FROM(
        
             SELECT id_mahasiswa, id_kriteria, id_nilai, nilai, (POW(nilai,2)) AS kuadrat FROM nilai a
             )a
           GROUP BY id_kriteria
           )b";


        $query = $this->db->query($data);
        if ($query->num_rows() > 0) {
        $result = $query->result_array();
        $query->free_result();
        return $result;
        }else{
        return array();
    }
	}
  
public function Matrik_ternormalisasi() {

  $ternormalisasi="SELECT id_mahasiswa, id_kriteria, (nilai/pembagi) AS ternormalisasi
  FROM(
  SELECT a.id_mahasiswa, a.id_kriteria, a.nilai, b.`pembagi` FROM nilai a
  INNER JOIN tmp_pembagi b ON a.`id_kriteria`= b.`id_kriteria`  
  )c";


       // return $this->db->query($ternormalisasi)->result();
        $query = $this->db->query($ternormalisasi);
              
        echo "<pre>"; echo $this->db->last_query();
        die;
        
        if ($query->num_rows() > 0) {
        $result = $query->result_array();
        $query->free_result();
        return $result;
        }else{
        return array();
    }
  }
}
?>

