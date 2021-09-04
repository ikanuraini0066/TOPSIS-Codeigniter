<?php
if(!function_exists('rumus_1'))
{
 function pembagi(){
    $query ="SELECT b.`id_kriteria`, SQRT(jumlah) AS pembagi
    FROM(
    
      SELECT a.`id_mahasiswa`, a.`id_kriteria`, SUM(kuadrat) AS jumlah
    
        FROM(
    
        SELECT id_mahasiswa, id_kriteria, id_nilai, nilai, (POW(nilai,2)) AS kuadrat FROM nilai a
        )a
      GROUP BY id_kriteria
      )b";

  $querynilai ="SELECT * FROM nilai";
      
  $result = $this->db->query($query);
  return $result->result();
   
}

function nilai(){
  

  $result = $this->db->query($querynilai);
  return $result->result();
}
}
?>