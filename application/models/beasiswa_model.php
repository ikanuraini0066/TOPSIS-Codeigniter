<?php

class beasiswa_model extends CI_model
{

  public function get_data($table)
  {
    return $this->db->get($table);
  }
  public function get_datanilai()
  {
    // return $this->db->get($table);
    return $this->db->query("select a.*,b.*,c.* from nilai a
                      left join mahasiswa b on a.id_mahasiswa = b.id_mahasiswa
                      left join kriteria c on a.id_kriteria = c.id_kriteria order by a.id_mahasiswa")->result();
  }

  public function get_dataaturan()
  {
    // return $this->db->get($table);
    return $this->db->query("select a.id_aturan, a.id_kriteria, b.nama_kriteria, a.ket from aturan a
                      left join kriteria b on a.id_kriteria = b.id_kriteria")->result();
  }

  public function insert_data($data, $table)
  {
    $this->db->insert($table, $data);
  }

  public function update_data($table, $data, $where)
  {
    $this->db->update($table, $data, $where);
  }

  public function delete_data($where, $table)
  {
    $this->db->where($where);
    $this->db->delete($table);
  }

  public function ambil_id_mahasiswa($id)
  {
    $hasil = $this->db->where('id_mahasiswa', $id)->get('mahasiswa');
    if ($hasil->num_rows() > 0) {
      return $hasil->result();
    } else {
      return false;
    }
  }

  public function get_mahasiswa()
  {
    $query = $this->db->get('mahasiswa')->result();
  }

  public function ambil_id_kriteria($id)
  {
    $hasil = $this->db->where('id_kriteria', $id)->get('kriteria');
    if ($hasil->num_rows() > 0) {
      return $hasil->result();
    } else {
      return false;
    }
  }

  public function get_kriteria()
  {
    $query = $this->db->get('kriteria')->result();
  }

  public function cek_login()
  {
    $username = set_value('username');
    $password = set_value('password');

    $result = $this->db
      ->where('username', $username)
      ->where('password', $password)
      ->limit(1)
      ->get('admin');
    if ($result->num_rows() > 0) {
      return $result->row();
    } else {
      return FALSE;
    }
  }
  // Pangkat

  // public function Pangkat()
  // {
  //   $pangkat =" SELECT id_kriteria, id_mahasiswa, POW(nilai,2) AS nilai FROM nilai";

  //   $query = $this->db->query($pangkat);
  //   if ($query->num_rows() > 0) {
  //     $result = $query->result_array();
  //     $query->free_result();
  //     return $result;
  //   } else {
  //     return array();
  //   }
  // }

  // end pangkat



  public function Pembagi($tahun)
  {
    // $data = "SELECT b.`id_kriteria`, SQRT(jumlah) AS pembagi
    // FROM(
     
    //    SELECT a.`id_mahasiswa`, a.`id_kriteria`, SUM(kuadrat) AS jumlah
     
    //      FROM(
     
    //       SELECT id_mahasiswa, id_kriteria, id_nilai, nilai, (POW(nilai,2)) AS kuadrat FROM nilai a
    //       )a
    //     GROUP BY id_kriteria
    //     )b
    //     ";
    $data = "SELECT b.`id_kriteria`, SQRT(jumlah) AS pembagi, b.tahun
    FROM(
     
       SELECT a.`id_mahasiswa`, a.`id_kriteria`, a.tahun, SUM(kuadrat) AS jumlah
     
         FROM(
     
          SELECT id_mahasiswa, id_kriteria, id_nilai, nilai, tahun, (POW(nilai,2)) AS kuadrat FROM nilai a
          )a
          WHERE a.tahun = '$tahun'
        GROUP BY id_kriteria
        )b
        ";
    $query = $this->db->query($data);
    if ($query->num_rows() > 0) {
      $result = $query->result_array();
      $query->free_result();
      return $result;
    } else {
      return array();
    }
  }

  public function Matrik_ternormalisasi($tahun)
  {

  //   $ternormalisasi = "SELECT id_mahasiswa, id_kriteria, (nilai/pembagi) AS ternormalisasi
  // FROM(
  // SELECT a.id_mahasiswa, a.id_kriteria, a.nilai, b.`pembagi` FROM nilai a
  // INNER JOIN tmp_pembagi b ON a.`id_kriteria`= b.`id_kriteria`  
  // )c
  // GROUP BY id_kriteria, id_mahasiswa";

    $ternormalisasi = "SELECT id_mahasiswa, id_kriteria, (nilai/pembagi) AS ternormalisasi,c.tahun
    FROM(
    SELECT a.id_mahasiswa, a.id_kriteria, a.nilai, b.`pembagi`,b.`tahun` FROM nilai a
    INNER JOIN tmp_pembagi b ON a.`id_kriteria`= b.`id_kriteria`  
    WHERE a.tahun = '$tahun'
    )c
    GROUP BY id_kriteria, id_mahasiswa";
    // return $this->db->query($ternormalisasi)->result();
    $query = $this->db->query($ternormalisasi);

    if ($query->num_rows() > 0) {
      $result = $query->result_array();
      $query->free_result();
      return $result;
    } else {
      return array();
    }
  }

  public function Ternormalisasi_terbobot()
  {
    // $terbobot = "SELECT id_mahasiswa, id_kriteria, (ternormalisasi*bobot_kriteria) AS terbobot
    // FROM
    // (
    // SELECT a.id_kriteria, a.id_mahasiswa, a.ternormalisasi, b.`bobot_kriteria` FROM tmp_ternormalisasi a
    // INNER JOIN kriteria b ON a.id_kriteria = b.id_kriteria
    // ) c
    // GROUP BY id_kriteria, id_mahasiswa";

    $terbobot = "SELECT id_mahasiswa, id_kriteria, (ternormalisasi*bobot_kriteria) AS terbobot, c.tahun
    FROM
    (
    SELECT a.id_kriteria, a.id_mahasiswa, a.ternormalisasi, b.`bobot_kriteria`,a.`tahun` FROM tmp_ternormalisasi a
    INNER JOIN kriteria b ON a.id_kriteria = b.id_kriteria
    ) c
    GROUP BY id_kriteria, id_mahasiswa";

    $query = $this->db->query($terbobot);

    if ($query->num_rows() > 0) {
      $result = $query->result_array();
      $query->free_result();
      return $result;
    } else {
      return array();
    }
  }


  public function Nilai_Max_b()
  {
  //   $nilai_max_b = "SELECT	id_kriteria, MAX(terbobot) AS nilai_max
  // FROM(
  // SELECT a.id_kriteria, a.keterangan, b.`terbobot` FROM kriteria a
  // INNER JOIN  tmp_ternormalisasi_terbobot b ON a.`id_kriteria` = b.`id_kriteria` 
  // ) c
  // WHERE keterangan ='benefit' 
  // GROUP BY id_kriteria";
    $nilai_max_b = "SELECT	id_kriteria, MAX(terbobot) AS nilai_max, c.tahun
  FROM(
  SELECT a.id_kriteria, a.keterangan, b.`terbobot`,b.tahun FROM kriteria a
  INNER JOIN  tmp_ternormalisasi_terbobot b ON a.`id_kriteria` = b.`id_kriteria` 
  ) c
  WHERE keterangan ='benefit' 
  GROUP BY id_kriteria";

    $query = $this->db->query($nilai_max_b);
    if ($query->num_rows() > 0) {
      $result = $query->result_array();
      $query->free_result();
      return $result;
    } else {
      return array();
    }
  }

  public function Nilai_Max_c()
  {
    $nilai_max_b = "SELECT	id_kriteria, MIN(terbobot) AS nilai_max, c.tahun
  FROM(
  SELECT a.id_kriteria, a.keterangan, b.`terbobot`,b.tahun FROM kriteria a
  INNER JOIN  tmp_ternormalisasi_terbobot b ON a.`id_kriteria` = b.`id_kriteria` 
  ) c
  WHERE keterangan ='cost' 
  GROUP BY id_kriteria";
    $query = $this->db->query($nilai_max_b);
    if ($query->num_rows() > 0) {
      $result = $query->result_array();
      $query->free_result();
      return $result;
    } else {
      return array();
    }
  }



  public function Nilai_Min_b()
  {
    $nilai_min_b = "SELECT	id_kriteria, MIN(terbobot) AS nilai_min, c.tahun
  FROM(
  SELECT a.id_kriteria, a.keterangan, b.`terbobot`,b.tahun FROM kriteria a
  INNER JOIN  tmp_ternormalisasi_terbobot b ON a.`id_kriteria` = b.`id_kriteria` 
  ) c
  WHERE keterangan ='benefit' 
  GROUP BY id_kriteria";
    $query = $this->db->query($nilai_min_b);
    if ($query->num_rows() > 0) {
      $result = $query->result_array();
      $query->free_result();
      return $result;
    } else {
      return array();
    }
  }

  public function Nilai_Min_c()
  {
    $nilai_min_b = "SELECT	id_kriteria, MAX(terbobot) AS nilai_min, c.tahun
  FROM(
  SELECT a.id_kriteria, a.keterangan, b.`terbobot`, b.tahun FROM kriteria a
  INNER JOIN  tmp_ternormalisasi_terbobot b ON a.`id_kriteria` = b.`id_kriteria` 
  ) c
  WHERE keterangan ='cost' 
  GROUP BY id_kriteria";
    $query = $this->db->query($nilai_min_b);
    if ($query->num_rows() > 0) {
      $result = $query->result_array();
      $query->free_result();
      return $result;
    } else {
      return array();
    }
  }

  public function  Nilai_Dplus()
  {
    $nilai_dplus = "SELECT id_mahasiswa, SQRT(nilai) as nilaidplus, e.tahun
  FROM(
  SELECT id_mahasiswa, SUM(nilai) AS nilai, d.tahun
  FROM(
  SELECT id_kriteria, id_mahasiswa, (POW((nilai_max-terbobot),2)) AS nilai, c.tahun
  FROM(
  SELECT a.id_kriteria, a.nilai_max, b.`id_mahasiswa`, b.`terbobot`, b.tahun FROM tmp_max a
  LEFT JOIN tmp_ternormalisasi_terbobot b ON a.id_kriteria = b.`id_kriteria`
  )c
  )d
  GROUP BY id_mahasiswa
  )e";

    $query = $this->db->query($nilai_dplus);
    if ($query->num_rows() > 0) {
      $result = $query->result_array();
      $query->free_result();
      return $result;
    } else {
      return array();
    }
  }

  public function Nilai_Dmin()
  {
    $nilai_dmin = "SELECT id_mahasiswa, SQRT(nilai) AS nilaidmin, e.tahun
    FROM(
    SELECT id_mahasiswa, SUM(nilai) AS nilai, d.tahun
    FROM(
    SELECT id_kriteria, id_mahasiswa, (POW((terbobot-nilai_min),2)) AS nilai, c.tahun
    FROM(
    SELECT a.id_kriteria, a.nilai_min, b.`id_mahasiswa`, b.`terbobot`, b.tahun FROM tmp_min a
    LEFT JOIN tmp_ternormalisasi_terbobot b ON a.id_kriteria = b.`id_kriteria`
    )c
    )d
    GROUP BY id_mahasiswa
    )e";
    $query = $this->db->query($nilai_dmin);
    if ($query->num_rows() > 0) {
      $result = $query->result_array();
      $query->free_result();
      return $result;
    } else {
      return array();
    }
  }

  public function Nilai_Preferensi()
  {
    $nilai_preferensi = "SELECT f.nama_mahasiswa, c.id_mahasiswa, (nilaidmin/(nilaidplus+nilaidmin)) AS nilaipreferensi, c.tahun
    FROM(
    SELECT a.id_mahasiswa, a.nilaidplus, b.`nilaidmin`,b.tahun FROM tmp_ideal_positif a
    LEFT JOIN tmp_ideal_negatif b ON a.`id_mahasiswa` = b.`id_mahasiswa`
    )c
    LEFT JOIN nilai e ON c.id_mahasiswa = e.`id_mahasiswa`
    LEFT JOIN mahasiswa f ON e.id_mahasiswa=f.id_mahasiswa
    GROUP BY id_mahasiswa
    ORDER BY nilaipreferensi DESC";
    $query = $this->db->query($nilai_preferensi);
    if ($query->num_rows() > 0) {
      $result = $query->result_array();
      $query->free_result();
      return $result;
    } else {
      return array();
    }
  }

}
