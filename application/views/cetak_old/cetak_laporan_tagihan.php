<?php
date_default_timezone_set('Asia/Jakarta');
$this->fpdf->FPDF("L","cm","A4");
$this->fpdf->SetMargins(0.5,0.5,0.5);
$this->fpdf->AliasNbPages();
$this->fpdf->AddPage();
$this->fpdf->SetFont('Times','B',14);
$this->fpdf->Cell(29.5,0.3,$nama,0,0,'C');
$this->fpdf->SetFont('Times','',12);
$this->fpdf->Ln();
$this->fpdf->Cell(29.5,0.8,$tower,0,0,'C');
$this->fpdf->Ln();
$this->fpdf->Cell(29.5,0.4,$alamat,0,0,'C');
$this->fpdf->Ln();
$this->fpdf->SetFont('Times','',12);
$this->fpdf->Cell(29.5,1.3,$laporan,0,0,'C');
$this->fpdf->Ln();
/* Fungsi Line untuk membuat garis */
//$this->fpdf->Line(0.5,3.15,29.5,3.15);
//$this->fpdf->Line(0.5,3.20,29.5,3.20);
/* ————– Header Halaman selesai ————————————————*/
//$this->fpdf->SetFont('Times','B',12);
//$this->fpdf->Cell(19,1,'Header',0,0,'C');
/* setting header table */
$this->fpdf->SetFont('Times','B',10);
$this->fpdf->Cell(1 , 0.5, 'No' , 1, 'LR', 'C');
$this->fpdf->Cell(4 , 0.5, 'ID Transaksi' , 1, 'LR', 'C');
$this->fpdf->Cell(4 , 0.5, 'Nama Customer' , 1, 'LR', 'C');
$this->fpdf->Cell(4 , 0.5, 'No HP' , 1, 'LR', 'C');
$this->fpdf->Cell(4 , 0.5, 'Nama Rumah' , 1, 'LR', 'C');
$this->fpdf->Cell(4 , 0.5, 'Harga' , 1, 'LR', 'C');
$this->fpdf->Cell(4 , 0.5, 'Jumlah Tagihan' , 1, 'LR', 'C');
$this->fpdf->Cell(4 , 0.5, 'Baki Debet' , 1, 'LR', 'C');
/* generate hasil query disini */
$no = 1;
foreach($list as $l)
{
	$this->fpdf->Ln();
	$this->fpdf->SetFont('Times','',8);
	$this->fpdf->Cell(1 , 0.5, $no , 1, 'LR', 'C');
	$this->fpdf->Cell(4 , 0.5, $l->master_id, 1, 'LR', 'C');
	$this->fpdf->Cell(4 , 0.5, $l->nama_cust, 1, 'LR', 'C');
	$this->fpdf->Cell(4 , 0.5, $l->no_hp, 1, 'LR', 'C');
	$this->fpdf->Cell(4 , 0.5, $l->nama_rumah, 1, 'LR', 'C');
	$this->fpdf->Cell(4 , 0.5, number_format($l->harga,2,'.',','), 1, 'LR', 'R');
	$this->fpdf->Cell(4 , 0.5, number_format($l->tagihan,2,'.',','), 1, 'LR', 'R');
	$this->fpdf->Cell(4 , 0.5, number_format($l->baki_debet,2,'.',','), 1, 'LR', 'R');
	$no++;
}
/* setting posisi footer 3 cm dari bawah */
/* generate pdf jika semua konstruktor, data yang akan ditampilkan, dll sudah selesai */
$this->fpdf->Output($laporan."_".date('d-m-Y h:i:sa').".pdf","I");

function tgl_indo($tgl){
		$tanggal = substr($tgl,8,2);
		$bulan = getBulan(substr($tgl,5,2));
		$tahun = substr($tgl,0,4);
		return $tanggal.' '.$bulan.' '.$tahun;
	}
 
	function getBulan($bln){
		switch ($bln){
			case 1: return "Januari"; break;
			case 2: return "Februari"; break;
			case 3: return "Maret"; break;
			case 4: return "April"; break;
			case 5: return "Mei"; break;
			case 6: return "Juni"; break;
			case 7: return "Juli"; break;
			case 8: return "Agustus"; break;
			case 9: return "September"; break;
			case 10: return "Oktober"; break;
			case 11: return "November"; break;
			case 12: return "Desember"; break;
		}
	}
?>
