<?php

		// Page header
        $pdf= new FPDF ();
        $pdf ->Addpage();
        // $pdf->Image(base_url('vendor/img/logo.jpg'),10,6,30);
        $pdf->SetFont('Times','',15);
        // Move to the right
        $pdf->Cell(80);
        // Title
        $pdf->Cell(30,10,'DANUWO WATERPARK CAFE & RESTO',0,0,'C');
        $pdf->SetFont('Times','',10);
        $pdf->Ln(7);
        $pdf->Cell(0,10,'JL. SURYO KUSUMO KM 0.3',0,0,'C');
        $pdf->Ln(5);
        $pdf->Cell(0,10,'DESA UDANWUH KEC.KALIWUNGU KAB.SEMARANG Kode Pos 50778',0,0,'C');
        $pdf->Ln(5);
        $pdf->Cell(0,10,'HP. 081230131833',0,0,'C');
        $pdf->Ln(5);
        $pdf->SetLineWidth(1);
        $pdf->Line(10,36,200,36);
        $pdf->SetLineWidth(0);
        $pdf->Line(10,37,200,37);
        $q = $this->db->query("select * from tmp_preferensi")->row_array();
        
        $pdf->Ln(10);
		$pdf->SetFont('Times','B',14);
        $pdf->Cell(0,10,'LAPORAN HASIL PERANKINGAN TAHUN '.$q['tahun'],0,0,'C');
        $pdf->Ln(10);
        $date = $this->input->get('date');
        $pdf->Cell(0,10,''.$date,0,0,'C');
		$pdf->Ln(10);
		$no=1;
        $pdf->SetFont('Times','B',12);
        $pdf->Cell(15,7,"",0,0,"C");
		$pdf->Cell(20,7,"No",1,0,"L");
		$pdf->Cell(70,7,"Nama",1,0,"L");
        $pdf->Cell(70,7,"Nilai",1,0,"L");
        $pdf->Ln(7);
        $pdf->SetFont('Times','',12);
        
        $q = $this->db->query("select * from tmp_preferensi")->result_array();
        $no = 0;
        foreach($q as $d){
            $no++;
            $pdf->Cell(15,7,"",0,0,"C");
            $pdf->Cell(20,7,$no,1,0,"L");
            $pdf->Cell(70,7,$d['nama_mahasiswa'],1,0,"L");
            $pdf->Cell(70,7,$d['nilaipreferensi'],1,0,"L");
            $pdf->Ln(7);
        }

        $pdf->output();