<?php
date_default_timezone_set('Asia/Jakarta');
$this->fpdf->FPDF("P","cm","A4");
$this->fpdf->SetMargins(0.5,0.5,0.5);
$this->fpdf->AliasNbPages();
$this->fpdf->AddPage();
$this->fpdf->SetFont('Times','B',14);
$this->fpdf->Cell(20,0.3,$nama,0,0,'C');
$this->fpdf->SetFont('Times','',12);
$this->fpdf->Ln();
$this->fpdf->Cell(20,0.8,$tower,0,0,'C');
$this->fpdf->Ln();
$this->fpdf->Cell(20,0.4,$alamat,0,0,'C');
$this->fpdf->Ln();
$this->fpdf->SetFont('Times','',12);
$this->fpdf->Cell(20,1.3,$laporan,0,0,'C');
$this->fpdf->Ln();
/* Fungsi Line untuk membuat garis */
$this->fpdf->Line(0.5,3.15,20.5,3.15);
$this->fpdf->Line(0.5,3.20,20.5,3.20);
/* ————– Header Halaman selesai ————————————————*/
$this->fpdf->Ln(0.5);
$this->fpdf->SetFont('Times','',9);
$this->fpdf->MultiCell(20 , 0.5, 'Pada hari ini '.tgl_indo($tglTrans).', telah dilakukan pemeriksaan fisik bersama antara "Pihak Penjual" dengan "Pihak pembeli" sebagai berikut :', 0, 'L', false);

$this->fpdf->Ln(0.5);

$this->fpdf->Cell(4 , 0.5, 'Nama,' , 0, 'LR', 'L');
$this->fpdf->Cell(0.5 , 0.5, ':', 0, 'LR', 'L');
$this->fpdf->Cell(10 , 0.5,$penj[0]->nama_cust , 0, 'LR', 'L');
$this->fpdf->Ln();
$this->fpdf->Cell(4 , 0.5, 'No. KTP,' , 0, 'LR', 'L');
$this->fpdf->Cell(0.5 , 0.5, ':', 0, 'LR', 'L');
$this->fpdf->Cell(10 , 0.5,$penj[0]->no_id, 0, 'LR', 'L');
$this->fpdf->Ln();
$this->fpdf->Cell(4 , 0.5, 'Alamat KTP,' , 0, 'LR', 'L');
$this->fpdf->Cell(0.5 , 0.5, ':', 0, 'LR', 'L');
$this->fpdf->Cell(10 , 0.5,$penj[0]->alamat, 0, 'LR', 'L');
$this->fpdf->Ln();
$this->fpdf->Cell(4 , 0.5, 'No. HP,' , 0, 'LR', 'L');
$this->fpdf->Cell(0.5 , 0.5, ':', 0, 'LR', 'L');
$this->fpdf->Cell(10 , 0.5,$penj[0]->no_hp, 0, 'LR', 'L');
$this->fpdf->Ln();
$this->fpdf->Ln();

$this->fpdf->MultiCell(20 , 0.5, 'Untuk 1 (satu) unit bangunan seluas '.$penj[0]->luas.' m2 yang terletak diatas tanah seluas  '.$penj[0]->luas.'  m2, setempat dikenal sebagai Cluster  '.$penj[0]->nama_proyek.' Blok '.$penj[0]->blok.' No. '.$penj[0]->nama_rumah.'  Kelurahan Pondok Rajeg, Kecamatan Cibinong Kabupaten Bogor.
Dan kedua belah pihak bersepakat sebagai berikut :
', 0, 'L', false);
$this->fpdf->Ln();
$this->fpdf->MultiCell(20 , 0.5, '				1.	Pembeli menyatakan kepada Penjual bahwa tanah dan bangunan telah diterima dalam keadaan baik dan layak untuk dihuni.  Dan bersamaan dengan 								penandatanganan berita acara ini, Pembeli menyatakan telah menerima 2 (dua) set kunci dari Penjual, sementara 1(satu) set kunci lainnya masih 								dititipkan di pihak Penjual untuk menyelesaikan komplain yang diajukan.', 0, 'L', false);
$this->fpdf->Ln();
$this->fpdf->MultiCell(20 , 0.5, '				2.	Pembeli menyatakan bersedia datang ke kantor pemasaran Pihak Penjual untuk menerima 1 (satu) set kunci terakhir dan menandatangani berita  								acara penyelesaian komplain, setelah ada pemberitahuan secara lisan/tertulis dari Pihak Penjual.', 0, 'L', false);
$this->fpdf->Ln();
$this->fpdf->MultiCell(20 , 0.5, '				3.	Pembeli menyatakan bersedia menerima dengan baik jaminan pemeliharaan selama 60 (enam puluh) hari yang diberikan oleh Penjual, terhitung  								sejak tanggal berita acara ini ditandatangani.', 0, 'L', false);
$this->fpdf->Ln();
$this->fpdf->MultiCell(20 , 0.5, '				4.	Pembeli menyatakan kepada Penjual bahwa Pembeli bersedia mengurus IMB dan membayar retribusi IMB di Pemda setempat untuk setiap
   					penambahan luas bangunan yang akan dilakukan.', 0, 'L', false);
$this->fpdf->Ln();
$this->fpdf->MultiCell(20 , 0.5, '				5.	Pembeli menyatakan bersedia membayar tagihan listrik berikut ini : Rekening listrik No :', 0, 'L', false);
$this->fpdf->Ln();
$this->fpdf->MultiCell(20 , 0.5, '				6.	Pembeli menyatakan bersedia membayar SPPT PBB tahun ……. dan seterusnya.', 0, 'L', false);
$this->fpdf->Ln();
$this->fpdf->MultiCell(20 , 0.5, '				7.	Terhitung sejak tanggal berita acara serah terima ini ditandatangani, segala keuntungan dan kerugian atas tanah dan bangunan menjadi milik
								Pembeli, dan Pembeli membebaskan Penjual dari kewajiban apapun.', 0, 'L', false);
$this->fpdf->Ln();
$this->fpdf->MultiCell(20 , 0.5, 'Demikian berita acara ini dibuat untuk dapat diketahui oleh semua pihak yang berkepentingan dan dipergunakan sebagaimana perlunya.', 0, 'L', false);
//$this->fpdf->MultiCell(20 , 0.5, '				2.	', 0, 'L', false);

$this->fpdf->Ln();

$this->fpdf->Cell(4 , 0.5, 'Yang menyerahkan,' , 1, 'LR', 'C');
$this->fpdf->Cell(4 , 0.5, 'Yang menerima,', 1, 'LR', 'C');
$this->fpdf->Cell(4 , 0.5, 'Verifikasi,', 1, 'LR', 'C');
$this->fpdf->Ln();
$this->fpdf->Cell(4 , 0.5, 'Pihak Penjual' , 1, 'LR', 'C');
$this->fpdf->Cell(4 , 0.5, 'Pihak Pembeli', 1, 'LR', 'C');
$this->fpdf->Cell(4 , 0.5, 'Manager Pemasaran', 1, 'LR', 'C');
$this->fpdf->Ln();
$this->fpdf->Cell(4 , 3, '' , 1, 'LR', 'C');
$this->fpdf->Cell(4 , 3.5, '', 1, 'LR', 'C');
$this->fpdf->Cell(4 , 3, '', 1, 'LR', 'C');
$this->fpdf->Ln();
$this->fpdf->Cell(4 , 0.5, '' , 1, 'LR', 'C');
$this->fpdf->Cell(4 , 0.5, '', 1, 'LR', 'C');
$this->fpdf->Cell(4 , 0.5, 'Singgih Prawoto', 1, 'LR', 'C');
$this->fpdf->Ln();


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
