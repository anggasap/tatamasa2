<?php
/* setting zona waktu */
date_default_timezone_set('Asia/Jakarta');
$this->fpdf->FPDF("L","cm","A4");
$this->fpdf->SetMargins(0.5,0.5,0.5);
$this->fpdf->AliasNbPages();
$this->fpdf->AddPage();
$this->fpdf->SetFont('Times','B',14);
$this->fpdf->Cell(28.5,0.3,$nama,0,0,'C');
$this->fpdf->Ln();
$this->fpdf->SetFont('Times','',12);
$this->fpdf->Cell(28.5,1.3,$laporan,0,0,'C');
$this->fpdf->Ln();
$this->fpdf->SetFont('Times','',10);
$this->fpdf->Cell(28.5,0.3,$datatanggal,0,0,'C');
$this->fpdf->Ln();
/* Fungsi Line untuk membuat garis */
/* ————– Header Halaman selesai ————————————————*/

//$this->fpdf->SetFont('Times','B',12);
//$this->fpdf->Cell(19,1,'Header',0,0,'C');
/* setting header table */
$this->fpdf->Ln();
$this->fpdf->SetFont('Times','B',10);
$this->fpdf->Cell(1 , 0.5, 'No.' , 1, 'LR', 'C');
$this->fpdf->Cell(3 , 0.5, 'ID Penjualan' , 1, 'LR', 'C');
$this->fpdf->Cell(4 , 0.5, 'Nama Rumah' , 1, 'LR', 'C');
$this->fpdf->Cell(4 , 0.5, 'Nama Customer' , 1, 'LR', 'C');
$this->fpdf->Cell(4 , 0.5, 'Harga Jual' , 1, 'LR', 'C');
$this->fpdf->Cell(3 , 0.5, 'Booking' , 1, 'LR', 'C');
$this->fpdf->Cell(4 , 0.5, 'Total Dibayar' , 1, 'LR', 'C');
$this->fpdf->Cell(3 , 0.5, 'Sisa Angsuran' , 1, 'LR', 'C');
$this->fpdf->Cell(3 , 0.5, 'KPR' , 1, 'LR', 'C');
/* generate hasil query disini */
$no = 1;
foreach($list as $l)
{
$this->fpdf->Ln();
$this->fpdf->SetFont('Times','',8);
$this->fpdf->Cell(1 , 0.5, $no , 1, 'LR', 'C');
$this->fpdf->Cell(3 , 0.5, $l->master_id , 1, 'LR', 'C');
$this->fpdf->Cell(4 , 0.5, $l->nama_rumah , 1, 'LR', 'L');
$this->fpdf->Cell(4 , 0.5, $l->nama_cust , 1, 'LR', 'L');
$this->fpdf->Cell(4 , 0.5, number_format($l->harga,2,".",",") , 1, 'LR', 'R');
$this->fpdf->Cell(3 , 0.5, number_format($l->booking,2,".",",") , 1, 'LR', 'R');
$this->fpdf->Cell(4 , 0.5, number_format($l->sdhdibayar,2,".",",") , 1, 'LR', 'R');
$this->fpdf->Cell(3 , 0.5, number_format($l->sisaAngs,2,".",",") , 1, 'LR', 'R');
$this->fpdf->Cell(3 , 0.5, number_format($l->sisa_dp,2,".",",") , 1, 'LR', 'R');
$no++;
}
/* setting posisi footer 3 cm dari bawah */
/* generate pdf jika semua konstruktor, data yang akan ditampilkan, dll sudah selesai */
$this->fpdf->Output($laporan."_".date('d-m-Y h:i:sa').".pdf","I");
?>
