<?php
date_default_timezone_set('Asia/Jakarta');
$this->fpdfspr->FPDF("P","cm","A4");
$this->fpdfspr->SetMargins(1,0.5,3);
$this->fpdfspr->AliasNbPages();
$this->fpdfspr->AddPage();
$xMultiCell = 19;

/* ————– Header Halaman selesai ————————————————*/
$this->fpdfspr->Cell($xMultiCell,1,'SURAT PEMESANAN UNIT RUMAH',0,0,'C');
$this->fpdfspr->Ln();
$this->fpdfspr->Cell($xMultiCell,0.5,'Nomor : '.$penj[0]->no_spr,0,0,'C');
$this->fpdfspr->Ln();
$this->fpdfspr->Ln(0.5);
$this->fpdfspr->SetFont('Times','',9);
$this->fpdfspr->MultiCell($xMultiCell , 0.5, 'Saya yang bertanda tangan di bawah ini : ', 0, 'L', false);
$this->fpdfspr->Ln(0.5);
$this->fpdfspr->Cell(4 , 0.5, 'Nama lengkap' , 0, 'LR', 'L');
$this->fpdfspr->Cell(0.5 , 0.5, ':', 0, 'LR', 'L');
$this->fpdfspr->Cell(10 , 0.5,$penj[0]->nama_cust , 0, 'LR', 'L');
$this->fpdfspr->Ln();
$this->fpdfspr->Cell(4 , 0.5, 'Alamat Koresponden,' , 0, 'LR', 'L');
$this->fpdfspr->Cell(0.5 , 0.5, ':', 0, 'LR', 'L');
$this->fpdfspr->Cell(10 , 0.5,$penj[0]->alamat, 0, 'LR', 'L');
$this->fpdfspr->Ln();
$this->fpdfspr->Cell(4 , 0.5, 'No. HP,' , 0, 'LR', 'L');
$this->fpdfspr->Cell(0.5 , 0.5, ':', 0, 'LR', 'L');
$this->fpdfspr->Cell(10 , 0.5,$penj[0]->no_hp, 0, 'LR', 'L');
$this->fpdfspr->Ln();
$this->fpdfspr->Cell(4 , 0.5, 'Email' , 0, 'LR', 'L');
$this->fpdfspr->Cell(0.5 , 0.5, ':', 0, 'LR', 'L');
$this->fpdfspr->Cell(10 , 0.5,$penj[0]->email, 0, 'LR', 'L');
$this->fpdfspr->Ln();
$this->fpdfspr->Ln(0.5);

$this->fpdfspr->MultiCell($xMultiCell , 0.5, 'Dengan ini memesan rumah di " Cempaka  Residence" dengan data sebagai berikut : ', 0, 'L', false);
$this->fpdfspr->Ln(0.5);
$this->fpdfspr->Cell(4 , 0.5, 'No. Kavling' , 0, 'LR', 'L');
$this->fpdfspr->Cell(0.5 , 0.5, ':', 0, 'LR', 'L');
$this->fpdfspr->Cell(10 , 0.5,$penj[0]->nama_rumah , 0, 'LR', 'L');
$this->fpdfspr->Ln();
$this->fpdfspr->Cell(4 , 0.5, 'Tipe (LB/LT)' , 0, 'LR', 'L');
$this->fpdfspr->Cell(0.5 , 0.5, ':', 0, 'LR', 'L');
$this->fpdfspr->Cell(10 , 0.5,$penj[0]->tipe.' / '.$penj[0]->luas, 0, 'LR', 'L');
$this->fpdfspr->Ln();
$this->fpdfspr->Cell(4 , 0.5, 'Harga Unit Rumah' , 0, 'LR', 'L');
$this->fpdfspr->Cell(0.5 , 0.5, ':', 0, 'LR', 'L');
$this->fpdfspr->Cell(10 , 0.5,number_format(($penj[0]->harga_jadi - $penj[0]->diskon),2), 0, 'LR', 'L');
$this->fpdfspr->Ln();

$this->fpdfspr->Ln();

$this->fpdfspr->MultiCell($xMultiCell , 0.5, 'Luas tanah dalam sertifikat akan mengikuti luas pengukuran akhir dari BPN, jika terdapat perbedaan luas lebih dari 1 m2      ( Satu Meter Persegi ) maka harga jual akan disesuaikan dengan harga patokan tanah yang telah disepakati.', 0, 'L', false);
$this->fpdfspr->Ln();
$this->fpdfspr->MultiCell($xMultiCell , 0.5, 'Kelebihan Tanah kapling   : Rp 2.300.000,- ( Dua Juta Empat Ratus Ribu Rupiah ) / Meter2', 0, 'C', false);
$this->fpdfspr->Ln();
$this->fpdfspr->MultiCell($xMultiCell , 0.5, 'Harga unit rumah  tersebut  termasuk biaya AJB , Pecah Sertifikat dan Balik Nama, dan  Belum Termasuk Biaya  BPHTB, dan   biaya pengurusan  KPR ( Bila menggunakan fasilitas KPR )', 0, 'L', false);
$this->fpdfspr->Ln();
$this->fpdfspr->MultiCell($xMultiCell , 0.5, 'Tanda Jadi sebesar	: 	Rp. '.number_format($penj[0]->booking,2).' '.Terbilang($penj[0]->booking).' Rupiah (Booking Fee)', 0, 'C', false);
$this->fpdfspr->Ln();
$this->fpdfspr->MultiCell($xMultiCell , 0.5, 'Pola  pembayaran :', 0, 'L', false);

$this->fpdfspr->Ln();
//$this->fpdfspr->writeHTML('This is my disclaimer. <b>THESE WORDS NEED TO BE BOLD.</b> These words do not need to be bold.');
if($penj[0]->tipe_bayar == 1){

}else if($penj[0]->tipe_bayar == 2){

}else if($penj[0]->tipe_bayar == 3){
	$this->fpdfspr->Cell(3.5 , 0.5, 'Cash Keras' , 1, 'LR', 'C');
	$this->fpdfspr->Cell(3.5 , 0.5, 'Cash Bertahap', 1, 'LR', 'C');
	$this->fpdfspr->Cell(12 , 0.5, 'KPR', 1, 'LR', 'C');
	$this->fpdfspr->Ln();
	$this->fpdfspr->SetFont('Times','',6);
	$this->fpdfspr->Cell(3.5 , 0.5, '' , 1, 'LR', 'C');
	$this->fpdfspr->Cell(3.5 , 0.5, '', 1, 'LR', 'C');
	$this->fpdfspr->Cell(4 , 0.5, 'DP '.$penj[0]->dp.' % : Rp. '.number_format($penj[0]->hargamj,2), 1, 'LR', 'L');
	$this->fpdfspr->Cell(4 , 0.5, 'Plafon KPR : '.number_format($penj[0]->sisa_dp,2), 1, 'LR', 'L');
	$this->fpdfspr->Cell(4 , 0.5, 'Angsuran : '.$penj[0]->jkw_kpr.' Th', 1, 'LR', 'L');
	$this->fpdfspr->Ln();
}
$this->fpdfspr->SetFont('Times','',9);

$this->fpdfspr->Ln();
$this->fpdfspr->MultiCell($xMultiCell , 0.5, 'Surat pemesanan ini mengikat dan dapat   ditingkatkan menjadi Kesepakatan Pemesanan / Perjanjian Pengikatan Jual Beli (PPJB) dan  saya tidak akan merubah pola pembayaran yang telah saya setujui di atas dan sesuai dengan  formulir kesepakatan harga yang telah dibuat. Dan apabila akan merubah pola pembayaran dan pelunasan saya bersedia untuk membuat surat pemesanan baru, setelah mendapat  persetujuan management pengembang secara tertulis.isi perjanjian atau  pasal tambahan yang tidak terlepas dari SPR yang sudah ada.', 0, 'L', false);
$this->fpdfspr->Ln();
$this->fpdfspr->MultiCell($xMultiCell , 0.5, 'Apabila dalam waktu maksimal 14 (empat belas) hari dan atau  awal bulan kalender  berikutnya,  sejak pembayaran uang Tanda Jadi (Booking Fee), saya tidak melakukan pembayaran uang muka / DP / Cicilan / Pelunasan pembayaran ,dan bagi pembelian  dengan menggunakan fasilitas KPR maka Diwajibkan untuk menyerahkan data aplikasi KPR sesuai persyaratan Bank,  maka transaksi dianggap batal dan uang Tanda Jadi (Booking Fee) tersebut hangus secara otomatis, dan pihak developer berhak untuk menjual unit yang saya pesan kepada pihak lain,  dan saya tidak  menuntut ganti rugi dalam bentuk apa pun.', 0, 'L', false);
$this->fpdfspr->Ln();
$this->fpdfspr->MultiCell($xMultiCell , 0.5, 'Cara Pembayaran :', 0, 'L', false);
$this->fpdfspr->Ln();
$this->fpdfspr->MultiCell($xMultiCell , 0.5, '1.	Setiap pembayaran harus dilakukan dengan cara transfer ke :', 0, 'L', false);
$this->fpdfspr->Ln();
$this->fpdfspr->Cell(4 , 0.5, 'No rekening' , 0, 'LR', 'L');
$this->fpdfspr->Cell(0.5 , 0.5, ':', 0, 'LR', 'L');
$this->fpdfspr->Cell(10 , 0.5,$penj[0]->nama_cust , 0, 'LR', 'L');
$this->fpdfspr->Ln();
$this->fpdfspr->Cell(4 , 0.5, 'Atas nama' , 0, 'LR', 'L');
$this->fpdfspr->Cell(0.5 , 0.5, ':', 0, 'LR', 'L');
$this->fpdfspr->Cell(10 , 0.5,'PT Berkah Graha Mandiri', 0, 'LR', 'L');
$this->fpdfspr->Ln();
$this->fpdfspr->Cell(4 , 0.5, 'Bank' , 0, 'LR', 'L');
$this->fpdfspr->Cell(0.5 , 0.5, ':', 0, 'LR', 'L');
$this->fpdfspr->Cell(10 , 0.5,'Mandiri Cab Kemang Jakarta Selatan.', 0, 'LR', 'L');
$this->fpdfspr->Ln();
$this->fpdfspr->Ln();
$this->fpdfspr->MultiCell($xMultiCell , 0.5, '2.	Setiap pembayaran akan di anggap sah bila sudah di terima syah dalam  rekening pihak pengembang seperti tersebut diatas / approval pihak keuangan.', 0, 'L', false);
$this->fpdfspr->Ln();
$this->fpdfspr->MultiCell($xMultiCell , 0.5, '3.	Setiap pembayaran yang telah dilakukan akan mendapatkan bukti kwitansi dari pihak pengembang yang dapat di ambil di kantor pemasaran, dengan menyerahkan bukti setor/bukti transfer.', 0, 'L', false);
$this->fpdfspr->Ln();
$this->fpdfspr->MultiCell($xMultiCell , 0.5, 'Demikian surat pemesanan dan cara pembayaran ini saya buat dengan sebenarnya dan dapat dipertanggungjawabkan secara hukum atas kesepakatan yang telah di buat.', 0, 'L', false);
$this->fpdfspr->Ln();

$this->fpdfspr->Cell(4 , 0.5, 'Pihak Pembeli' , 1, 'LR', 'C');
$this->fpdfspr->Cell(4 , 0.5, 'Pihak Penjual / Sales.', 1, 'LR', 'C');
$this->fpdfspr->Cell(4 , 0.5, 'Menyetujui ', 1, 'LR', 'C');
$this->fpdfspr->Ln();
$this->fpdfspr->Cell(4 , 3, '' , 1, 'LR', 'C');
$this->fpdfspr->Cell(4 , 3.5, '', 1, 'LR', 'C');
$this->fpdfspr->Cell(4 , 3, '', 1, 'LR', 'C');
$this->fpdfspr->Ln();
$this->fpdfspr->Cell(4 , 0.5, '(..................)' , 1, 'LR', 'C');
$this->fpdfspr->Cell(4 , 0.5, '(..................)', 1, 'LR', 'C');
$this->fpdfspr->Cell(4 , 0.5, '(..................)', 1, 'LR', 'C');
$this->fpdfspr->Ln();
$this->fpdfspr->Cell(4 , 0.5, '' , 1, 'LR', 'C');
$this->fpdfspr->Cell(4 , 0.5, 'Sales    Executive', 1, 'LR', 'C');
$this->fpdfspr->Cell(4 , 0.5, 'Marketing Manager', 1, 'LR', 'C');
$this->fpdfspr->Ln();

$this->fpdfspr->AddPage();
//$this->fpdfspr->MultiCell($xMultiCell , 0.5, '				2.	', 0, 'L', false);
$this->fpdfspr->MultiCell($xMultiCell , 0.5, 'SYARAT-SYARAT DAN KETENTUAN', 0, 'C', false);
$this->fpdfspr->Ln();
$this->fpdfspr->MultiCell($xMultiCell , 0.5, '				1.	Harga Unit Rumah  adalah harga tanah berikut bangunan termasuk listrik PLN, Sumur Pantek,  Taman Rumput Halaman depan rumah, IMB Standart bangunan , dan Biaya Balik Nama, tetapi belum Termasuk , BPHTB,  Biaya KPR secara keseluruhan  (jika menggunakan pembiayaan  KPR) dan Pajak pemerintah lainnya bila ada.', 0, 'L', false);
$this->fpdfspr->Ln();
$this->fpdfspr->MultiCell($xMultiCell , 0.5, '				2.	Data identitas pembeli mengenai alamat koresponden /surat menyurat , nomer telephone dan email adalah benar dan sesuai dengan yang diberikan dalam surat pemesanan rumah ( SPR ), dan apabila ada perumahan alamat maka pembeli wajib menginformasikan kepada pihak pengembang, segala akibat mengenai tidak sampainya informasi dan berita maka merupakan tanggung  jawab pembeli. ', 0, 'L', false);
$this->fpdfspr->Ln();
$this->fpdfspr->MultiCell($xMultiCell , 0.5, '				3.	Harga tersebut di atas berlaku sah secara perjanjian jual beli apabila lembar Surat Pemesanan Rumah telah ditandatangani secara benar oleh pembeli , Sales dan Manager Pemasaran, Serta    apabila pembayaran dilakukan sesuai dengan jadwal pembayaran yang telah disetujui dan disepakati oleh  kedua belah pihak dengan membuat  lembaran kesepakatan harga.	', 0, 'L', false);
$this->fpdfspr->Ln();
$this->fpdfspr->MultiCell($xMultiCell , 0.5, '				4.	Untuk pembelian dengan  Kredit Pemilikan Rumah  dengan  pihak bank , maka pembeli diwajibkan untuk melakukan akad kredit dengan Bank BTN atau 1 ( Satu ) lembaga Bank lain sebagai alternafif nya .Dan pembeli  wajib menyerahkan data persyaratan KPR yang Ditetapkan dan diterima oleh pihak Bank Maksimal 14 Hari setelah pembayaran Booking Fee,  apabila pembeli dapat menyerahkan persyaratan KPR secara lengkap dan dapat diproses oleh pihak Bank  dalam waktu tersebut maka secara otomatis akan mendapatkan tambahan discount  sebesar RP 2.000.000,-( Dua Juta Rupiah ) pada pembayaran Down Payment.	', 0, 'L', false);
$this->fpdfspr->Ln();
$this->fpdfspr->MultiCell($xMultiCell , 0.5, '				5.	Untuk pembelian dengan Kredit Pemilikan Rumah / KPR diberikan waktu untuk  penyerahan data persyaratan KPR secara lengkap dan dapat diproses oleh pihak Bank  adalah 60 ( Enam Puluh )  hari,  dan apabila melewati waktu tersebut maka   secara otomatis  pembelian  unit  rumah  dianggap  batal, dengan kondisi booking Fee  dan Down Payment  30% hangus.	', 0, 'L', false);
$this->fpdfspr->Ln();
$this->fpdfspr->MultiCell($xMultiCell , 0.5, '				6.	Jika permohonan besaran pembiayaan KPR yang diajukan tidak disetujui sepenuhnya maka Pembeli wajib menambah Uang Muka sebesar selisih dari plafon kredit yang disetujui oleh Bank,  selambat-lambatnya 1 (satu) minggu sejak Offering Letter (OL) / Surat Penegasan Persetujuan Permberian Kridit ( SP3K ) Bank diterbitkan, dan apabila penabahan uang muka tidak dapat dipenuhi maka akan dikenakan sangsi keterlambatan pembayaran ( sesuai pasal 11 syarat  syarat dan ketentuan )	', 0, 'L', false);
$this->fpdfspr->Ln();
$this->fpdfspr->MultiCell($xMultiCell , 0.5, '				7.	Dan apabila proses pengajuan KPR tidak disetujui oleh Bank maka,  Pembeli dapat merubah sistem pembayarannya menjadi Cash Keras atau Cash Bertahap, dan pembayaran menggunakan system cash bertahap maka akan diberlaku penambahan harga unit rumah disesuaikan  dengan acuan pembiayaan cash bertahap, dan  Jika pembeli memilih untuk mundur maka Booking Fee akan hangus, sedangkan Uang Muka yang telah dibayarkan kepada Pengembang akan dipotong administrasi sebesar Rp. 1.500.000,- (satu jutalia ratus  rupiah).	', 0, 'L', false);
$this->fpdfspr->Ln();
$this->fpdfspr->MultiCell($xMultiCell , 0.5, '				8.	Pengembang tidak menjamin untuk  mengatur proses persetujuan KPR,dalam penentuan  plafon KPR dan biaya KPR karena hal tersebut  sepenuhnya merupakan kuasa Pihak Bank. Pihak pengembang hanya membantu mengirimkan data pembeli.	', 0, 'L', false);
$this->fpdfspr->Ln();
$this->fpdfspr->MultiCell($xMultiCell , 0.5, '				9.	Prosedur pembayaran 	', 0, 'L', false);
$this->fpdfspr->Ln();
$this->fpdfspr->MultiCell($xMultiCell , 0.5, '										*)	dianggap sah setelah dikeluarkan kwitansi resmi dicap dan ditanda tangani oleh Pengembang. Pembayaran dengan menggunakan cheque / bilyet giro dianggap efektif bila warkat tersebut sudah dicairkan/ diuangkan.	', 0, 'L', false);
$this->fpdfspr->Ln();
$this->fpdfspr->MultiCell($xMultiCell , 0.5, '										*)	Segala bentuk pelunasan dan pembayaran dilakukan pada awal bulan kalender berjalan (antara Tanggal 1 – 7 setiap bulannya)	', 0, 'L', false);
$this->fpdfspr->Ln();
$this->fpdfspr->MultiCell($xMultiCell , 0.5, '				10.	Apabila dilakukan pembatalan pemesanan rumah  dari Pihak Pembeli maka Booking Fee hangus dan akan dikenakan denda sebesar 30% (tiga puluh persen) dari total pembayaran yang telah diberikan/ disetorkan, keputusan dan persetujuan serta prosedur pengembalian uang pembatalan merupakan hak penuh pengembang .	', 0, 'L', false);
$this->fpdfspr->Ln();
$this->fpdfspr->MultiCell($xMultiCell , 0.5, '				11.	Apabila terjadi keterlambatan pembayaran, 	', 0, 'L', false);
$this->fpdfspr->Ln();
$this->fpdfspr->MultiCell($xMultiCell , 0.5, '										*)	maka akan dikenakan denda 1/1000 (satu per seribu) per hari dari tagihan yang tertunggak sampai dengan  tanggal pelunalasan pembayaran, setiap sangsi denda akan diakumulasikan pada tagihan pembayaran selanjutnya,   disertai sangsi mengenai hilangnya hak hak penerimaan hadiah yang dijanjikan jika ada.	', 0, 'L', false);
$this->fpdfspr->Ln();
$this->fpdfspr->MultiCell($xMultiCell , 0.5, '										*)	dan jika pembeli belum melunasi pembayaran  melampaui jangka waktu maksimal 60 (enam puluh) hari dari jatuh tempo pembayaran maka  segala perjanjian pemesanan rumah secara otomatis dianggap batal, Dan  prosedur pembatalan pembelian unit rumah  mengacu kepada pasal 10 syarat syarat dan ketentuan	', 0, 'L', false);
$this->fpdfspr->Ln();
$this->fpdfspr->MultiCell($xMultiCell , 0.5, '				12.	Pengalihan Kepemilikan rumah kepada pihak lain dan perpindahan nomor rumah dikenakan biaya administrasi sebesar 2% (Dua persen) dari total harga jual rumah.	', 0, 'L', false);
$this->fpdfspr->Ln();
$this->fpdfspr->MultiCell($xMultiCell , 0.5, '				13.	Apabila terjadi perubahan kebijakan atau peraturan pemerintah terkait pajak kepada pembeli maka seluruhnya biayanya  ditanggung dan dibayarkan oleh Pembeli pada saat pembayaran angsuran,  sebelum serah terima rumah dilakukan.	', 0, 'L', false);
$this->fpdfspr->Ln();
$this->fpdfspr->MultiCell($xMultiCell , 0.5, '				14.	Luas tanah dalam sertifikat akan mengikuti luas pengukuran akhir dari Badan Pertanahan Nasional (BPN). Jika ada perubahan luas baik lebih/ kurang maka akan disesuaikan dengan harga jual.	', 0, 'L', false);
$this->fpdfspr->Ln();
$this->fpdfspr->MultiCell($xMultiCell , 0.5, '				15.	Pembeli menyadari dan menyatakan setuju untuk membebaskan Pengembang dari segala tuntutan apapun bila ada kebijakan dan atau peraturan pemerintah yang menyebabkan keterlambatan dan atau dibatalkannya pembangunan proyek.	', 0, 'L', false);
$this->fpdfspr->Ln();
$this->fpdfspr->MultiCell($xMultiCell , 0.5, '				16.	Untuk menjaga kelestarian dan keserasian  lingkungan perumahan maka Pembeli wajib mengikuti aturan berikut ini :	', 0, 'L', false);
$this->fpdfspr->Ln();
$this->fpdfspr->MultiCell($xMultiCell , 0.5, '										a.	Pembeli tidak diperkenankan untuk melakukan perubahan maupun renovasi tanpa seizin Pengembang sampai dengan masa pemeliharaan berakhir. Jika hal ini  dilakukan maka retensi dianggap batal.	', 0, 'L', false);
$this->fpdfspr->Ln();
$this->fpdfspr->MultiCell($xMultiCell , 0.5, '										b.	Tidak diperkenankan untuk merubah tampak (fasad), warna luar bangunan dan membuat pagar depan paling tidak sejak 2 (dua) tahun dari serah terima rumah.	', 0, 'L', false);
$this->fpdfspr->Ln();
$this->fpdfspr->MultiCell($xMultiCell , 0.5, '										c.	Pembeli tidak diperkenankan menjebol/ merusak pagar lingkungan atau dinding pembatas tanpa alasan apa pun, dan dilarang untuk  menaikan ketinggian  dinding pagar.	', 0, 'L', false);
$this->fpdfspr->Ln();
$this->fpdfspr->MultiCell($xMultiCell , 0.5, '										d.	Serah terima fisik rumah dilakukan selambat-lambatnya 18 ( Delapan  Belas ) bulan sejak pembayaran DP 1 dengan catatan  tidak ada keterlambatan pembayaran dari Pembeli dan kejadian force major yang ditetapkan oleh pemerintah setempat atau kejadian luar biasa yang mengganggu proses pembangunan.	', 0, 'L', false);
$this->fpdfspr->Ln();
$this->fpdfspr->MultiCell($xMultiCell , 0.5, '										e.	Serah Terima Fisik Bangunan / Berita Acara Serah Terima      ( BAST ), akan diatur oleh management pengembang sesuai schedule yang direncanakan dan pembeli wajib menerima serah terima unit runah  secara otomatis ,  apabila telah  diterbitkan 3 ( tiga ) kali dikirimkan  surat  undangan  BAST dan tidak datang sesuai dengan surat undangan.	', 0, 'L', false);
$this->fpdfspr->Ln();
$this->fpdfspr->MultiCell($xMultiCell , 0.5, '										f.	Pembeli wajib membayar Iuran Pemeliharaan Lingkungan (IPL) sejak serah terima rumah yang besarnya akan ditentukan kemudian.	', 0, 'L', false);
$this->fpdfspr->Ln();
$this->fpdfspr->MultiCell($xMultiCell , 0.5, '										g.	Jika Pembeli melanggar butir a s/d e di atas maka Pengembang berhak untuk mengenakan denda atas pelanggaran tersebut, 	', 0, 'L', false);
$this->fpdfspr->Ln();
$this->fpdfspr->MultiCell($xMultiCell , 0.5, '				17.	Masa pemeliharaan ( retensi ) adalah 2 (dua) bulan / 60 hari  sejak serah terima rumah.	', 0, 'L', false);
$this->fpdfspr->Ln();
$this->fpdfspr->MultiCell($xMultiCell , 0.5, '				18.	Serah terima rumah dapat dilakukan setelah fisik rumah 100% (seratus persen) dan Pembeli sudah memenuhi semua kewajiban pembayaran kepada Pengembang baik pembayaran rumah,, pajak-pajak, biaya administrasi dan denda-denda ( bila ada ).	', 0, 'L', false);
$this->fpdfspr->Ln();
$this->fpdfspr->MultiCell($xMultiCell , 0.5, '				19.	Pembeli tidak keberatan terhadap rencana pelaksanaan pengembangan kawasan yang dilakukan oleh Pengembang di masa yang  akan  datang. Dan tidak akan menggangu proses pekerjaan  pengembangan lingkungan perumahan di masa yang akan datang.	', 0, 'L', false);
$this->fpdfspr->Ln();
$this->fpdfspr->MultiCell($xMultiCell , 0.5, '				20.	Pembeli memaklumi jika terdapat perbedaan bentuk dan type rumah dengan IMB.	', 0, 'L', false);
$this->fpdfspr->Ln();
$this->fpdfspr->MultiCell($xMultiCell , 0.5, '				21.	Setiap pembayaran harus dilakukan via rekening  sebagai berikut : 	', 0, 'L', false);
$this->fpdfspr->Ln();

$this->fpdfspr->Cell(4 , 0.5, 'No rekening' , 0, 'LR', 'L');
$this->fpdfspr->Cell(0.5 , 0.5, ':', 0, 'LR', 'L');
$this->fpdfspr->Cell(10 , 0.5,$penj[0]->nama_cust , 0, 'LR', 'L');
$this->fpdfspr->Ln();
$this->fpdfspr->Cell(4 , 0.5, 'Atas nama' , 0, 'LR', 'L');
$this->fpdfspr->Cell(0.5 , 0.5, ':', 0, 'LR', 'L');
$this->fpdfspr->Cell(10 , 0.5,'PT Berkah Graha Mandiri', 0, 'LR', 'L');
$this->fpdfspr->Ln();
$this->fpdfspr->Cell(4 , 0.5, 'Bank' , 0, 'LR', 'L');
$this->fpdfspr->Cell(0.5 , 0.5, ':', 0, 'LR', 'L');
$this->fpdfspr->Cell(10 , 0.5,'Mandiri Cab Kemang Jakarta Selatan.', 0, 'LR', 'L');
$this->fpdfspr->Ln();

$this->fpdfspr->MultiCell($xMultiCell , 0.5, 'Cibinong, '.tgl_indo($tglTrans), 0, 'R', false);
$this->fpdfspr->Ln();
$this->fpdfspr->MultiCell($xMultiCell , 0.5, 'Menyetujui dan memahami Syarat syarat dan Ketentuan.', 0, 'R', false);
$this->fpdfspr->Ln();
$this->fpdfspr->MultiCell($xMultiCell , 0.5, 'Pembeli', 0, 'R', false);
$this->fpdfspr->Ln();
$this->fpdfspr->MultiCell($xMultiCell , 1, '(..................)', 0, 'R', false);
$this->fpdfspr->Ln();

$this->fpdfspr->AddPage();

$this->fpdfspr->MultiCell($xMultiCell , 0.5, '				Lampiran Kesepakatan Pemesanan Nomor : '.$penj[0]->no_spr, 0, 'L', false);
$this->fpdfspr->MultiCell($xMultiCell , 0.5, '				A.	 Harga Unit Rumah 		: Rp. '.number_format($penj[0]->harga,2).'   ,-', 0, 'L', false);
$this->fpdfspr->MultiCell($xMultiCell , 0.5, '				B.	Tanda Jadi / Booking fee	: Rp. '.number_format($penj[0]->booking,2).',- ', 0, 'L', false);
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

$this->fpdfspr->AddPage();
$this->fpdfspr->SetFont('Times','',12);
$this->fpdfspr->Cell($xMultiCell,1,'Form Kesepakatan Harga',0,0,'C');
$this->fpdfspr->Ln();
$this->fpdfspr->MultiCell($xMultiCell , 13, $penj[0]->kesepakatan, 1, 'L', false);

$this->fpdfspr->SetFont('Times','',8);
$this->fpdfspr->MultiCell(17 , 0.5, 'Cibinong, '.tgl_indo($tglTrans), 0, 'R', false);
$this->fpdfspr->Ln();
$this->fpdfspr->Cell(6 , 0.5, 'Pihak Pembeli' , 1, 'LR', 'C');
$this->fpdfspr->Cell(6 , 0.5, 'Pihak Penjual / Sales.', 1, 'LR', 'C');
$this->fpdfspr->Cell(6 , 0.5, 'Menyetujui ', 1, 'LR', 'C');
$this->fpdfspr->Ln();
$this->fpdfspr->Cell(6 , 3, '' , 1, 'LR', 'C');
$this->fpdfspr->Cell(6 , 3.5, '', 1, 'LR', 'C');
$this->fpdfspr->Cell(6 , 3, '', 1, 'LR', 'C');
$this->fpdfspr->Ln();
$this->fpdfspr->Cell(6 , 0.5, '(..................)' , 1, 'LR', 'C');
$this->fpdfspr->Cell(6 , 0.5, '(..................)', 1, 'LR', 'C');
$this->fpdfspr->Cell(6 , 0.5, '(..................)', 1, 'LR', 'C');
$this->fpdfspr->Ln();
$this->fpdfspr->Cell(6 , 0.5, '' , 1, 'LR', 'C');
$this->fpdfspr->Cell(6 , 0.5, 'Sales    Executive', 1, 'LR', 'C');
$this->fpdfspr->Cell(6 , 0.5, 'Marketing Manager', 1, 'LR', 'C');
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
function Terbilang($x)
{
	$abil = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
	if ($x < 12)
		return " " . $abil[$x];
	elseif ($x < 20)
		return Terbilang($x - 10) . "Belas";
	elseif ($x < 100)
		return Terbilang($x / 10) . " Puluh" . Terbilang($x % 10);
	elseif ($x < 200)
		return " seratus" . Terbilang($x - 100);
	elseif ($x < 1000)
		return Terbilang($x / 100) . " Ratus" . Terbilang($x % 100);
	elseif ($x < 2000)
		return " seribu" . Terbilang($x - 1000);
	elseif ($x < 1000000)
		return Terbilang($x / 1000) . " Ribu" . Terbilang($x % 1000);
	elseif ($x < 1000000000)
		return Terbilang($x / 1000000) . " Juta" . Terbilang($x % 1000000);
}
?>
