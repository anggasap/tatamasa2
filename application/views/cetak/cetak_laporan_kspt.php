<?php
date_default_timezone_set('Asia/Jakarta');
$this->fpdfspr->FPDF("P","cm","A4");
$this->fpdfspr->SetMargins(1,0.5,3);
$this->fpdfspr->AliasNbPages();
$this->fpdfspr->AddPage();
$xMultiCell = 19;

$this->fpdfspr->MultiCell($xMultiCell , 0.5, '				Lampiran Kesepakatan Pemesanan Nomor : '.$penj[0]->no_spr, 0, 'L', false);
$this->fpdfspr->MultiCell($xMultiCell , 0.5, '				A.	 Harga Unit Rumah 		: Rp. '.number_format($penj[0]->harga,2).'   ,-', 0, 'L', false);
$this->fpdfspr->MultiCell($xMultiCell , 0.5, '				B.	Tanda Jadi / Booking fee	: Rp. '.number_format($penj[0]->harga,2).',- ', 0, 'L', false);
$this->fpdfspr->Ln();
$no = 1;
foreach($rows3 as $r2)
{
	$this->fpdfspr->SetFont('Times','',8);
	$this->fpdfspr->Cell(1 , 0.5, $no , 1, 'LR', 'C');
	$this->fpdfspr->Cell(6 , 0.5, tgl_indo($r2->tgl_trans), 1, 'LR', 'L');
	$this->fpdfspr->Cell(10 , 0.5, number_format($r2->jml_trans,2,'.',','), 1, 'LR', 'C');
	$this->fpdfspr->Ln();
	$no++;
}

$this->fpdfspr->Ln();

$this->fpdfspr->MultiCell(17 , 0.5, 'Cibinong, '.tgl_indo($tglTrans), 0, 'R', false);
$this->fpdfspr->Ln();
$this->fpdfspr->Cell(6 , 0.5, 'Mengetahui / Menyetujui' , 0, 'LR', 'C');
$this->fpdfspr->Cell(6 , 0.5, 'Pihak Penjual	', 0, 'LR', 'C');
$this->fpdfspr->Cell(6 , 0.5, 'KONSUMEN ', 0, 'LR', 'C');
$this->fpdfspr->Ln();
$this->fpdfspr->Cell(6 , 3, '' , 0, 'LR', 'C');
$this->fpdfspr->Cell(6 , 3.5, '', 0, 'LR', 'C');
$this->fpdfspr->Cell(6 , 3, '', 0, 'LR', 'C');
$this->fpdfspr->Ln();
$this->fpdfspr->Cell(6 , 0.5, '(..................)' , 0, 'LR', 'C');
$this->fpdfspr->Cell(6 , 0.5, '(..................)', 0, 'LR', 'C');
$this->fpdfspr->Cell(6 , 0.5, '(..................)', 0, 'LR', 'C');
$this->fpdfspr->Ln();
$this->fpdfspr->Cell(6 , 0.5, 'Marketing Manager' , 0, 'LR', 'C');
$this->fpdfspr->Cell(6 , 0.5, 'Sales    Executive', 0, 'LR', 'C');
$this->fpdfspr->Cell(6 , 0.5, 'Pembeli', 0, 'LR', 'C');
$this->fpdfspr->Ln();
$this->fpdfspr->Ln();
$this->fpdfspr->Ln();

$this->fpdfspr->Cell(10 , 0.5, 'Keterangan Lembar :' , 0, 'LR', 'L');
$this->fpdfspr->Ln();
$this->fpdfspr->Cell(10 , 0.5, 'Lembar 1 - Untuk Developer', 0, 'LR', 'L');
$this->fpdfspr->Ln();
$this->fpdfspr->Cell(10, 0.5, 'Lembar 2 - Untuk Bank Penyedia KPR', 0, 'LR', 'L');
$this->fpdfspr->Ln();
$this->fpdfspr->Cell(10, 0.5, 'Lembar 3 - Untuk Pembeli', 0, 'LR', 'L');
$this->fpdfspr->Ln();
$this->fpdfspr->Cell(10, 0.5, 'Lembar 4 - Untuk Keuangan / Arsip', 0, 'LR', 'L');
$this->fpdfspr->Ln();

/* setting posisi footer 3 cm dari bawah */
/* generate pdf jika semua konstruktor, data yang akan ditampilkan, dll sudah selesai */
$this->fpdfspr->Output($laporan."_".date('d-m-Y h:i:sa').".pdf","I");
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
