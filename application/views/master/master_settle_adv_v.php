<!-- BEGIN PAGE BREADCRUMB -->
<!--

-->
<!-- END PAGE BREADCRUMB -->
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<!-- KONTEN DI SINI YA -->
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs  font-red-sunglo"></i>
                    <span
                        class="caption-subject font-red-sunglo bold uppercase">Data Master Settlement Of Advance</span>
                </div>
                <div class="actions">
                    <a href="javascript:;" class="btn btn-default btn-sm" onclick="cetak();">
                        <i class="fa fa-print"></i> Cetak </a>
                    <a href="javascript:;" class="btn btn-default btn-sm" onclick="cetakcpa();">
                        <i class="fa fa-print"></i> Cetak CPA</a>
                    <a class="btn btn-icon-only btn-default btn-sm fullscreen" href="javascript:;"
                       data-original-title="" title="">
                    </a>
                </div>
            </div>
            <div class="portlet-body">
                <div>
                	<span id="event_result">
                    
                    </span>
                </div>
                <form role="form" method="post"
                      action="<?php echo base_url('master_settle_adv/home'); ?>" id="id_formSettle">
                    <div class="row">
                        <div class="form-body">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Id Settlement Of Payment </label>

                                    <div class="input-group">
                                        <div class="input-icon">
                                            <input id="id_idSettle" required="required" class="form-control input-sm"
                                                   type="text" name="idSettle" readonly/>
                                        </div>
										<span class="input-group-btn">
											<a href="#" class="btn btn-success btn-sm" data-target="#idDivTabelSettle"
                                               id="id_btnModal" data-toggle="modal">
                                                <i class="fa fa-search fa-fw"/></i>
                                            </a>
										</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Id Advance </label>

                                    <div class="input-group">
                                        <input id="id_idAdvance" required="required" class="form-control input-sm"
                                               type="text" name="idAdvance" readonly/>
                                        <span class="input-group-btn">
                                        <a href="#" class="btn btn-success btn-sm" data-target="#idDivTabelAdv"
                                           id="id_btnModal" data-toggle="modal">
                                            <i class="fa fa-search fa-fw"/></i>
                                        </a>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
											<input id="id_idKyw" required="required" class="form-control hidden input-sm"
                                                   type="text" name="idKyw" readonly/>
                                            <label>Nama karyawan </label>
                                            <input id="id_namaKyw" required="required" class="form-control input-sm"
                                                   type="text" name="namaKyw" readonly/>

                                        </div>
                                        <div class="col-md-6">
                                            <label>Departemen/Bagian</label>
                                            <input id="id_deptKyw" required="required" class="form-control input-sm"
                                                   type="text" name="deptKyw" readonly/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <label>Proyek</label>
                                            <?php
                                            $data = array();
                                            $data[''] = '';
                                            foreach ($proyek as $row):
                                                $data[$row['id_proyek']] = $row['nama_proyek'];
                                            endforeach;
                                            echo form_dropdown('proyek', $data, '',
                                                'id="id_proyek" class="form-control input-sm" disabled');
                                            ?>

                                        </div>
                                        <div class="col-md-4">
                                            <label>Tgl Advance</label>
                                            <input id="id_tglAdv" required="required"
                                                   class="form-control input-sm hitunghari"
                                                   type="text" name="tgladv" readonly/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end <div class="col-md-6"> 1 -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Keterangan Adv</label>
                                    <textarea rows="2" cols="" name="keteranganAdv" id="id_keteranganAdv"
                                              class="form-control input-sm" readonly>
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Tanggal Pengajuan</label>
                                            <input id="id_tgltrans" required="required"
                                                   class="form-control input-sm hitunghari"
                                                   type="text" name="tglTrans" readonly/>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Tanggal Jatuh Tempo</label>
                                            <input id="id_tglJT" required="required" data-date-format="dd-mm-yyyy"
                                                   class="form-control hitunghari date-picker input-sm"
                                                   type="text" name="tglJT" placeholder="dd-mm-yyyy"/>
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Jumlah Permintaan</label>
                                            <input id="id_advAmount" required="required" class="form-control input-sm nomor"
                                                   type="text" name="advAmount" readonly/>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Jumlah Pembayaran</label>
                                            <input id="id_paid" required="required" class="form-control input-sm kanan nomor2"
                                                   type="text" name="paid"/>
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Lebih(Kurang) Pembayaran</label>
                                    <input id="id_uangPaidou" required="required" class="form-control input-sm nomor"
                                           type="text" name="uangPaidou" readonly/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input id="id_idPayTo" required="required" class="form-control input-sm hidden"
                                           type="text" name="payTo" readonly/>
                                    <label>Dibayarkan ke</label>

                                    <div class="input-group">
                                        <input id="id_namaPayTo" required="required" class="form-control input-sm"
                                               type="text" name="namapayTo" readonly/>
                                    <span class="input-group-btn">
                                        <a href="#" class="btn btn-success btn-sm" data-target="#idDivTabelKyw"
                                           id="id_btnModalKyw2" data-toggle="modal">
                                            <i class="fa fa-search fa-fw"/></i>
                                        </a>
                                    </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Nama pemilik akun bank</label>
                                    <input id="id_namaPemilikAkunBank" required="required" class="form-control input-sm"
                                           type="text" name="namaPemilikAkunBank"/>
                                </div>
                                <div class="form-group">
                                    <label>No akun bank</label>
                                    <input id="id_noAkunBank" required="required" class="form-control input-sm"
                                           type="text" name="noAkunBank"/>
                                </div>
                                <div class="form-group">
                                    <label>Nama bank</label>
                                    <input id="id_namaBank" required="required" class="form-control input-sm"
                                           type="text" name="namaBank"/>
                                </div>
                            </div>
                        </div>
                        <!-- HIDDEN INPUT -->
                        <input type="text" id="idTmpAksiBtn" class="hidden">
                        <input type="text" id="idTmpBtnKyw" class="hidden">
                        <!-- END HIDDEN INPUT -->
                    </div>
                    <!--END ROW 1 -->
                    <!-- ROW 2 -->
                    <div class="row">
                        <div class="form-body">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <textarea rows="2" cols="" name="keterangan" id="id_keterangan"
                                              class="form-control input-sm">
                                    </textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Catatan penggunaan anggaran</label>

                                    <div class="checkbox-list">
                                        <label>
                                            <input type="checkbox" value="1" name="wBudget" id="id_wBudget" disabled/>
                                            Within Budget </label>
                                        <input type="text" name="wBudget_in" id="id_wBudget_in" class="nomor1 hidden ">
                                        <label>
                                            <input type="checkbox" value="1" name="oBudget" id="id_oBudget" disabled/>
                                            Out of Budget </label>
                                        <input type="text" name="oBudget_in" id="id_oBudget_in" class="nomor1 hidden ">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--END ROW 2 -->
                    <!-- ROW 3 -->
                    <div class="row">
                        <div class="form-body">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Dokumen Verifikasi</label>

                                    <div class="checkbox-list">
                                        <label>
                                            <input type="checkbox" value="1" name="dokFPe" id="id_dokFPe"> Faktur
                                            Penjualan (Asli) </label>
                                        <input type="text" name="dokFPe_in" id="id_dokFPe_in" class="nomor1 hidden">
                                        <label>
                                            <input type="checkbox" value="1" name="dokKuitansi" id="id_dokKuitansi">
                                            Kuitansi (Asli) </label>
                                        <input type="text" name="dokKuitansi_in" id="id_dokKuitansi_in"
                                               class="nomor1 hidden">
                                        <label>
                                            <input type="checkbox" value="1" name="dokPa" id="id_dokPa"> Faktur Pajak
                                            (Asli) </label>
                                        <input type="text" name="dokPa_in" id="id_dokPa_in" class="nomor1 hidden">
                                        <label>
                                            <input type="checkbox" value="1" name="dokPO" id="id_dokPO"> Purchase Order
                                            (PO) </label>
                                        <input type="text" name="dokPO_in" id="id_dokPO_in" class="nomor1 hidden">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>&nbsp;</label>

                                    <div class="checkbox-list">
                                        <label>
                                            <input type="checkbox" value="1" name="dokSuratJalan" id="id_dokSuratJalan">
                                            Surat Jalan </label>
                                        <input type="text" name="dokSuratJalan_in" id="id_dokSuratJalan_in"
                                               class="nomor1 hidden">
                                        <label>
                                            <input type="checkbox" value="1" name="dokPenBrg" id="id_dokPenBrg"> Laporan
                                            Penerimaan Barang </label>
                                        <input type="text" name="dokPenBrg_in" id="id_dokPenBrg_in"
                                               class="nomor1 hidden">
                                        <label>
                                            <input type="checkbox" value="1" name="dokBAST" id="id_dokBAST"> Berita
                                            Acara Serah Terima </label>
                                        <input type="text" name="dokBAST_in" id="id_dokBAST_in" class="nomor1 hidden">
                                        <label>
                                            <input type="checkbox" value="1" name="dokBAP" id="id_dokBAP"> Berita Acara
                                            Pemeriksaan </label>
                                        <input type="text" name="dokBAP_in" id="id_dokBAP_in" class="nomor1 hidden">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>&nbsp;</label>

                                    <div class="checkbox-list">
                                        <label>
                                            <input type="checkbox" value="1" name="dokSSP" id="id_dokSSP"> Sesuai Surat
                                            Perjanjian / Kontrak </label>
                                        <input type="text" name="dokSSP_in" id="id_dokSSP_in" class="nomor1 hidden">
                                        <label>
                                            <input type="checkbox" value="1" name="dokSSPK" id="id_dokSSPK"> Sesuai
                                            Surat Perintah Kerja (SPK) </label>
                                        <input type="text" name="dokSSPK_in" id="id_dokSSPK_in" class="nomor1 hidden">
                                        <label>
                                            <input type="checkbox" value="1" name="dokSSPK" id="id_dokSSPK"> LPJ Uang
                                            Muka </label>
                                        <input type="text" name="dokLPJUM_in" id="id_LPJUM_in" class="nomor1 hidden">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--END ROW 3 -->
                    <!--MODAL CPA-->
                    <div class="modal fade draggable-modal" id="idDivCPA" tabindex="-1" role="basic" aria-hidden="true">
                        <div class="modal-dialog  modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"
                                            aria-hidden="true"></button>
                                    <h4 class="modal-title">Data CPA</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="scroller" style="height:400px; ">
                                        <div class="row">
                                            <div class="form-body">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <!--<label>Kode perk</label>-->
                                                                <div class="input-group">
                                                                    <input id="id_kodePerk" readonly
                                                                           class="form-control input-sm kosongCPA"
                                                                           type="text" name="kodePerk"
                                                                           placeholder="Kode Perk"/>
                                                    <span class="input-group-btn">
                                        	           <a href="#" class="btn btn-success btn-sm"
                                                          data-target="#idDivTabelPerk"
                                                          id="id_btnModal2" data-toggle="modal">
                                                           <i class="fa fa-search fa-fw"/></i>
                                                       </a>
                                    	           </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label>&nbsp;</label>
                                                                <!--<input id="id_kodeAlt" readonly class="form-control input-sm kosongCPA"
                                                                   type="text" name="kodeAlt" placeholder="Kode Perk Alternatif"/>-->
                                                                <span id="id_kodeAlt" class="tkosongCPA"></span>
                                                                <span id="id_namaPerk" class="tkosongCPA"></span>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <!--<div class="form-group">
                                                        <input id="id_namaPerk" readonly class="form-control input-sm kosongCPA"
                                                        type="text" name="namaPerk" placeholder="Nama Perk"/>
                                                    </div>-->

                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <!--<label>Kode Cash Flow</label>-->
                                                                <div class="input-group">
                                                                    <input id="id_kodeCflow" readonly
                                                                           class="form-control input-sm kosongCPA"
                                                                           type="text" name="kodeCflow"
                                                                           placeholder="Kode Cash Flow"/>
                                                    <span class="input-group-btn">
                                        	           <a href="#" class="btn btn-success btn-sm"
                                                          data-target="#idDivTabelCflow"
                                                          id="id_btnModal2" data-toggle="modal">
                                                           <i class="fa fa-search fa-fw"/></i>
                                                       </a>
                                    	           </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label>&nbsp;</label>
                                                                <!--<input id="id_kodeAltCflow" readonly class="form-control input-sm kosongCPA"
                                                                   type="text" name="kodeAltCflow" placeholder="Kode Cash Flow Alternatif"/>-->
                                                                <label><span id="id_kodeAltCflow"
                                                                             class="tkosongCPA"></span></label>
                                                                <label><span id="id_namaCflow"
                                                                             class="tkosongCPA"></span></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--<div class="form-group">
                                                        <input id="id_namaCflow" readonly class="form-control input-sm kosongCPA"
                                                        type="text" name="namaCflow" placeholder="Nama Cash flow"/>
                                                    </div>-->
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END ROW-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Jumlah</label>
                                                    <input id="id_jumlahCPA" class="form-control input-sm nomor "
                                                           type="text" name="jumlahCPA"/>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                        <textarea rows="2" cols="" name="keteranganCPA" id="id_keteranganCPA"
                                                  class="form-control input-sm kosongCPA">
                                        </textarea>

                                                </div>
                                                <div class="form-group">
                                                    <input type="text" id="idTxtTempLoop" name="txtTempLoop"
                                                           class="form-control nomor1 hidden">
                                                    <input type="text" id="idTxtTempJnsKode" name="txtTempJnsKode"
                                                           class="form-control nomor1 hidden">
                                                    <input type="text" id="idTempUbahCPA" name="txtTempUbahCPA"
                                                           class="form-control nomor1 hidden">
                                                    <input type="text" id="idTempJumlahCPA" name="txtTempJumlahCPA"
                                                           class="form-control nomor hidden">
                                                    <a href="javascript:;" class="btn blue btn-sm" id="id_btnAddCpa">
                                                        <i class="fa fa-plus"></i>
                                                    </a>
                                                    <a href="javascript:;" class="btn red btn-sm" id="id_btnRemoveCpa">
                                                        <i class="fa fa-minus"></i>
                                                    </a>
                                                    <a href="javascript:;" class="btn yellow btn-sm"
                                                       id="id_btnUpdateCpa">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="javascript:;" class="btn default btn-sm"
                                                       id="id_btnBatalCpa">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-body">
                                                    <table class="table table-striped table-hover table-bordered"
                                                           id="id_tabelPerkCflow">
                                                        <thead>
                                                        <tr>
                                                            <th width="20%">
                                                                Kode
                                                            </th>
                                                            <th width="10%">
                                                                Jns kode
                                                            </th>
                                                            <th width="50%">
                                                                Keterangan
                                                            </th>
                                                            <th width="20%">
                                                                Jumlah
                                                            </th>
                                                        </tr>
                                                        </thead>
                                                        <tbody id="id_body_data">

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>Total :</label>
                                                        <input type="text" name="totalCPA"
                                                               class="form-control nomor input-sm" id="idTotalCPA"
                                                               readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END SCROLLER-->
                                </div>
                                <!-- END MODAL BODY-->
                                <div class="modal-footer">
                                    <button type="button" class="btn default" data-dismiss="modal"
                                            id="btnCloseModalDataCPA">Close
                                    </button>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!--END MODAL CPA-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-actions">
                                <button name="btnSimpan" class="btn blue" id="id_btnSimpan">
                                    <!--<i class="fa fa-check"></i>--> Simpan
                                </button>
                                <button name="btnUbah" onclick="" class="btn yellow" id="id_btnUbah">
                                    <!--<i class="fa fa-edit"></i>--> Ubah
                                </button>
                                <button name="btnHapus" class="btn red" id="id_btnHapus">
                                    <!--<i class="fa fa-trash"></i>-->
                                    Hapus
                                </button>
                                <button name="btnSign" class="btn purple" id="id_btnSign">
                                    Sign
                                </button>
                                <button id="id_btnBatal" type="button" class="btn default">Batal</button>
                                <button id="id_btnCPA" type="button" class="btn green" data-target="#idDivCPA"
                                        data-toggle="modal">Detail
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>&nbsp;</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label><strong>Approval Dept Keuangan</strong></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-body">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input id="id_appKeuanganId" class="form-control input-sm"
                                           type="text" name="appKeuanganId" placeholder="Approval" readonly/>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <input id="id_appKeuanganStatus" class="form-control input-sm"
                                           type="text" name="appKeuanganStatus" placeholder="Status" readonly/>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <input id="id_appKeuanganTgl" class="form-control input-sm"
                                           type="text" name="appKeuanganTgl" placeholder="Tanggal" readonly/>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <textarea rows="2" cols="" name="appKeuanganKet" id="id_appKeuanganKet"
                                              class="form-control input-sm" placeholder="Keterangan"
                                              readonly></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label><strong>Approval Head Dept.</strong></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-body">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input id="id_appHDId" class="form-control input-sm"
                                           type="text" name="appHDId" placeholder="Approval" readonly/>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <input id="id_appHDStatus" class="form-control input-sm"
                                           type="text" name="appHDStatus" placeholder="Status" readonly/>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <input id="id_appHDTgl" class="form-control input-sm"
                                           type="text" name="appHDTgl" placeholder="Tanggal" readonly/>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
					                <textarea rows="2" cols="" name="appHDKet" id="id_appHDKet"
                                              class="form-control input-sm" placeholder="Keterangan"
                                              readonly></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label><strong>Approval General Manager</strong></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-body">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input id="id_appGMId" class="form-control input-sm"
                                           type="text" name="appGMId" placeholder="Approval" readonly/>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <input id="id_appGMStatus" class="form-control input-sm"
                                           type="text" name="appGMStatus" placeholder="Status" readonly/>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <input id="id_appGMTgl" class="form-control input-sm"
                                           type="text" name="appGMTgl" placeholder="Tanggal" readonly/>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
					                <textarea rows="2" cols="" name="appGMKet" id="id_appGMKet"
                                              class="form-control input-sm" placeholder="Keterangan"
                                              readonly></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- end <div class="portlet green-meadow box"> -->
    </div>
    <!-- end <div class="col-md-6"> -->
    <!--
    <div class="col-md-6">
    </div>
    -->
    <!-- end <div class="col-md-6"> -->
</div>
<div class="row">
    <div class="col-md-6">

    </div>
</div>

<!-- END PAGE CONTENT-->
<!--  MODAL Data Karyawan -->
<div class="modal fade draggable-modal" id="idDivTabelKyw" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Data User</h4>
            </div>
            <div class="modal-body">
                <div class="scroller" style="height:400px; ">
                    <div class="row">
                        <div class="col-md-12">
                            <button id="id_Reload" style="display: none;"></button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-body">
                                <table class="table table-striped table-bordered table-hover text_kanan"
                                       id="idTabelKyw">
                                    <thead>
                                    <tr>
                                        <th>
                                            Id Karyawan
                                        </th>
                                        <th>
                                            Nama Karyawan
                                        </th>
                                        <th>
                                            Departemen
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>


                                    </tbody>
                                    <tfoot>


                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <!-- end col-12 -->
                    </div>
                    <!-- END ROW-->
                </div>
                <!-- END SCROLLER-->
            </div>
            <!-- END MODAL BODY-->
            <div class="modal-footer">
                <button type="button" class="btn default" data-dismiss="modal" id="btnCloseModalDataKyw">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--  END  MODAL Data Karyawan -->
<!--  MODAL Data Advance -->
<div class="modal fade draggable-modal" id="idDivTabelSettle" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Data Settlement Of Advance</h4>
            </div>
            <div class="modal-body">
                <div class="scroller" style="height:400px; ">
                    <div class="row">
                        <div class="col-md-12">
                            <button id="id_ReloadSettle" style="display: none;"></button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-body">
                                <table class="table table-striped table-bordered table-hover text_kanan"
                                       id="idTabelSettleAdv">
                                    <thead>
                                    <tr>
                                        <th>
                                            Id Settlement
                                        </th>
                                        <th>
                                            Nama Karyawan
                                        </th>
                                        <th>
                                            Jumlah Bayar
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <!-- end col-12 -->
                    </div>
                    <!-- END ROW-->
                </div>
                <!-- END SCROLLER-->
            </div>
            <!-- END MODAL BODY-->
            <div class="modal-footer">
                <button type="button" class="btn default" data-dismiss="modal" id="btnCloseModalDataSettleAdv">Close
                </button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--  END  MODAL Data Karyawan -->
<!--  MODAL Data Advance -->
<div class="modal fade draggable-modal" id="idDivTabelAdv" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Data Advance</h4>
            </div>
            <div class="modal-body">
                <div class="scroller" style="height:400px; ">
                    <div class="row">
                        <div class="col-md-12">
                            <button id="id_ReloadAdv" style="display: none;"></button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-body">
                                <table class="table table-striped table-bordered table-hover text_kanan"
                                       id="idTabelAdv">
                                    <thead>
                                    <tr>
                                        <th>
                                            Id Advance
                                        </th>
                                        <th>
                                            Nama Karyawan
                                        </th>
                                        <th>
                                            Jumlah uang
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>


                                    </tbody>
                                    <tfoot>


                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <!-- end col-12 -->
                    </div>
                    <!-- END ROW-->
                </div>
                <!-- END SCROLLER-->
            </div>
            <!-- END MODAL BODY-->
            <div class="modal-footer">
                <button type="button" class="btn default" data-dismiss="modal" id="btnCloseModalDataAdv">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!--  MODAL Data Perkiraan -->
<div class="modal fade draggable-modal" id="idDivTabelPerk" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Data Perkiraan</h4>
            </div>
            <div class="modal-body">
                <div class="scroller" style="height:400px; ">
                    <div class="row">
                        <div class="col-md-12">
                            <button id="id_ReloadPerk" style="display: none;"></button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-body">
                                <table class="table table-striped table-bordered table-hover text_kanan"
                                       id="idTabelPerk">
                                    <thead>
                                    <tr>
                                        <th width='10%' align='left'>Kd Perk</th>
                                        <th width='10%' align='left'>Kd Alt</th>
                                        <th width='50%' align='left'>Nama Perk</th>
                                        <th width='10%' align='center'>Level</th>
                                        <th width='10%' align='center'>Type</th>
                                        <th width='10%' align='center'>DK</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                    <tfoot>

                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <!-- end col-12 -->
                    </div>
                    <!-- END ROW-->
                </div>
                <!-- END SCROLLER-->
            </div>
            <!-- END MODAL BODY-->
            <div class="modal-footer">
                <button type="button" class="btn default" data-dismiss="modal" id="btnCloseModalPerk">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--  END  MODAL Data Perkiraan -->
<!--  MODAL Data Cash FLow -->
<div class="modal fade draggable-modal" id="idDivTabelCflow" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Data Cash Flow</h4>
            </div>
            <div class="modal-body">
                <div class="scroller" style="height:400px; ">
                    <div class="row">
                        <div class="col-md-12">
                            <button id="id_ReloadCflow" style="display: none;"></button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-body">
                                <table class="table table-striped table-bordered table-hover text_kanan"
                                       id="idTabelCflow">
                                    <thead>
                                    <tr>
                                        <th width='15%' align='left'>Kd Cflow</th>
                                        <th width='15%' align='left'>Kd Alt</th>
                                        <th width='50%' align='left'>Nama Perk</th>
                                        <th width='10%' align='center'>Level</th>
                                        <th width='10%' align='center'>Type</th>

                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                    <tfoot>

                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <!-- end col-12 -->
                    </div>
                    <!-- END ROW-->
                </div>
                <!-- END SCROLLER-->
            </div>
            <!-- END MODAL BODY-->
            <div class="modal-footer">
                <button type="button" class="btn default" data-dismiss="modal" id="btnCloseModalCflow">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--  END  MODAL Cash Flow -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="<?php echo base_url('metronic/global/plugins/respond.min.js'); ?>"></script>
<script src="<?php echo base_url('metronic/global/plugins/excanvas.min.js'); ?>"></script>
<![endif]-->
<?php echo $this->session->userdata('jqueryJS'); ?>
<?php echo $this->session->userdata('jquery-migrateJS'); ?>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<?php echo $this->session->userdata('jquery-uiJS'); ?>
<?php echo $this->session->userdata('bootstrapJS'); ?>
<?php echo $this->session->userdata('bootstrap-hover-dropdownJS'); ?>
<?php echo $this->session->userdata('jquery-slimscrollJS'); ?>
<?php echo $this->session->userdata('jquery-blockuiJS'); ?>
<?php echo $this->session->userdata('jquery-cokieJS'); ?>
<?php echo $this->session->userdata('jquery-uniformJS'); ?>
<?php echo $this->session->userdata('bootstrap-switchJS'); ?>
<!-- BEGIN PAGE LEVEL PLUGINS -->
<?php echo $this->session->userdata('toastrJS'); ?>
<?php echo $this->session->userdata('select2JS'); ?>
<?php echo $this->session->userdata('jquery-dataTablesJS'); ?>
<?php echo $this->session->userdata('dataTables-bootstrapJS'); ?>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- END CORE PLUGINS -->
<?php echo $this->session->userdata('metronicJS'); ?>
<?php echo $this->session->userdata('layoutJS'); ?>
<?php echo $this->session->userdata('demoJS'); ?>
<script src="<?php echo base_url('metronic/additional/start.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('metronic/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js'); ?>"
        type="text/javascript"></script>
<script src="<?php echo base_url('metronic/admin/pages/scripts/components-pickers.js'); ?>"
        type="text/javascript"></script>
<script>
    jQuery(document).ready(function () {
        Metronic.init(); // init metronic core components
        Layout.init(); // init current layout
        Demo.init(); // init demo features
        ComponentsPickers.init();
        //UITree.init();
        TableManaged.init();
    });
    //$(function () {
    var judul_menu = $('#id_a_menu_<?php echo $menu_id; ?>').text();
    $('#id_judul_menu').text(judul_menu);
    // MENU OPEN
    $(".menu_root").removeClass('start active open');
    $("#menu_root_<?php echo $menu_parent; ?>").addClass('start active open');
    // END MENU OPEN
    var TableManaged = function () {

        var initTable1 = function () {
            var table = $('#idTabelKyw');
            // begin first table
            table.dataTable({
                "ajax": "<?php  echo base_url("/master_advance/getKywAll"); ?>",
                "columns": [
                    {"data": "idKyw"},
                    {"data": "namaKyw"},
                    {"data": "deptKyw"}
                ],
                // Internationalisation. For more info refer to http://datatables.net/manual/i18n
                "language": {
                    "aria": {
                        "sortAscending": ": activate to sort column ascending",
                        "sortDescending": ": activate to sort column descending"
                    },
                    "emptyTable": "No data available in table",
                    "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                    "infoEmpty": "No entries found",
                    "infoFiltered": "(filtered1 from _MAX_ total entries)",
                    "lengthMenu": "Show _MENU_ entries",
                    "search": "Search:",
                    "zeroRecords": "No matching records found"
                },

                "bStateSave": true, // save datatable state(pagination, sort, etc) in cookie.
                "lengthMenu": [
                    [5, 10, 15, 20, -1],
                    [5, 10, 15, 20, "All"] // change per page values here
                ],
                // set the initial value
                "pageLength": 5,
                "pagingType": "bootstrap_full_number",
                "language": {
                    "search": "Cari: ",
                    "lengthMenu": "  _MENU_ records",
                    "paginate": {
                        "previous": "Prev",
                        "next": "Next",
                        "last": "Last",
                        "first": "First"
                    }
                },
                "aaSorting": [[0, 'asc']/*, [5,'desc']*/],
                "columnDefs": [{  // set default column settings
                    'orderable': true,
                    "searchable": true,
                    'targets': [0]
                }],
                "order": [
                    [0, "asc"]
                ] // set first column as a default sort by asc
            });
            $('#id_Reload').click(function () {
                table.api().ajax.reload();
            });

            var tableWrapper = jQuery('#example_wrapper');

            table.find('.group-checkable').change(function () {
                var set = jQuery(this).attr("data-set");
                var checked = jQuery(this).is(":checked");
                jQuery(set).each(function () {
                    if (checked) {
                        $(this).attr("checked", true);
                        $(this).parents('tr').addClass("active");
                    } else {
                        $(this).attr("checked", false);
                        $(this).parents('tr').removeClass("active");
                    }
                });
                jQuery.uniform.update(set);
            });

            table.on('change', 'tbody tr .checkboxes', function () {
                $(this).parents('tr').toggleClass("active");
            });
            table.on('click', 'tbody tr', function () {
                var idKyw = $(this).find("td").eq(0).html();
                var namaKyw = $(this).find("td").eq(1).html();
                var deptKyw = $(this).find("td").eq(2).html();
                var tmpBtnKyw = $('#idTmpBtnKyw').val();
                if (tmpBtnKyw == '1') {
                    $('#id_kywId').val(idKyw);
                    $('#id_namaKyw').val(namaKyw);
                    $('#id_deptKyw').val(deptKyw);
                } else {
                    $('#id_idPayTo').val(idKyw);
                    $('#id_namaPayTo').val(namaKyw);
                }
                $('#btnCloseModalDataKyw').trigger('click');
            });

            tableWrapper.find('.dataTables_length select').addClass("form-control input-xsmall input-inline"); // modify table per page dropdown
        }
        var initTable2 = function () {
            var table = $('#idTabelSettleAdv');
            // begin first table
            table.dataTable({
                "ajax": "<?php  echo base_url("/master_settle_adv/getSettlement"); ?>",
                "columns": [
                    {"data": "idSettle"},
                    {"data": "namaReq"},
                    {"data": "jmlUang"}
                ],
                // Internationalisation. For more info refer to http://datatables.net/manual/i18n
                "language": {
                    "aria": {
                        "sortAscending": ": activate to sort column ascending",
                        "sortDescending": ": activate to sort column descending"
                    },
                    "emptyTable": "No data available in table",
                    "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                    "infoEmpty": "No entries found",
                    "infoFiltered": "(filtered1 from _MAX_ total entries)",
                    "lengthMenu": "Show _MENU_ entries",
                    "search": "Search:",
                    "zeroRecords": "No matching records found"
                },

                "bStateSave": true, // save datatable state(pagination, sort, etc) in cookie.
                "lengthMenu": [
                    [5, 10, 15, 20, -1],
                    [5, 10, 15, 20, "All"] // change per page values here
                ],
                // set the initial value
                "pageLength": 5,
                "pagingType": "bootstrap_full_number",
                "language": {
                    "search": "Cari: ",
                    "lengthMenu": "  _MENU_ records",
                    "paginate": {
                        "previous": "Prev",
                        "next": "Next",
                        "last": "Last",
                        "first": "First"
                    }
                },
                "aaSorting": [[0, 'asc']/*, [5,'desc']*/],
                "columnDefs": [{  // set default column settings
                    'orderable': true,
                    "searchable": true,
                    'targets': [0]
                }],
                "order": [
                    [0, "asc"]
                ] // set first column as a default sort by asc
            });
            $('#id_ReloadReqpay').click(function () {
                table.api().ajax.reload();
            });

            var tableWrapper = jQuery('#example_wrapper');

            table.find('.group-checkable').change(function () {
                var set = jQuery(this).attr("data-set");
                var checked = jQuery(this).is(":checked");
                jQuery(set).each(function () {
                    if (checked) {
                        $(this).attr("checked", true);
                        $(this).parents('tr').addClass("active");
                    } else {
                        $(this).attr("checked", false);
                        $(this).parents('tr').removeClass("active");
                    }
                });
                jQuery.uniform.update(set);
            });

            table.on('change', 'tbody tr .checkboxes', function () {
                $(this).parents('tr').toggleClass("active");
            });
            table.on('click', 'tbody tr', function () {
                $('#id_btnBatal').trigger('click');
                var idSettle = $(this).find("td").eq(0).html();
                $('#id_idSettle').val(idSettle);
                $('#id_idSettle').focus();
                $('#btnCloseModalDataSettleAdv').trigger('click');
                $('#id_btnSimpan').attr('disabled', true);
                $('#id_btnUbah').attr("disabled", false);
                $('#id_btnHapus').attr("disabled", false);
				getDescCpa(idSettle);
            });
            tableWrapper.find('.dataTables_length select').addClass("form-control input-xsmall input-inline"); // modify table per page dropdown
        }

        var initTable3 = function () {
            var table = $('#idTabelAdv');
            // begin first table
            table.dataTable({
                "ajax": "<?php echo base_url("/master_advance/getAdvAll"); ?>",
                "columns": [
                    {"data": "idAdv"},
                    {"data": "namaReq"},
                    {"data": "jmlUang"}
                ],
                // Internationalisation. For more info refer to http://datatables.net/manual/i18n
                "language": {
                    "aria": {
                        "sortAscending": ": activate to sort column ascending",
                        "sortDescending": ": activate to sort column descending"
                    },
                    "emptyTable": "No data available in table",
                    "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                    "infoEmpty": "No entries found",
                    "infoFiltered": "(filtered1 from _MAX_ total entries)",
                    "lengthMenu": "Show _MENU_ entries",
                    "search": "Search:",
                    "zeroRecords": "No matching records found"
                },

                "bStateSave": true, // save datatable state(pagination, sort, etc) in cookie.
                "lengthMenu": [
                    [5, 10, 15, 20, -1],
                    [5, 10, 15, 20, "All"] // change per page values here
                ],
                // set the initial value
                "pageLength": 5,
                "pagingType": "bootstrap_full_number",
                "language": {
                    "search": "Cari: ",
                    "lengthMenu": "  _MENU_ records",
                    "paginate": {
                        "previous": "Prev",
                        "next": "Next",
                        "last": "Last",
                        "first": "First"
                    }
                },
                "aaSorting": [[0, 'asc']/*, [5,'desc']*/],
                "columnDefs": [{  // set default column settings
                    'orderable': true,
                    "searchable": true,
                    'targets': [0]
                }],
                "order": [
                    [0, "asc"]
                ] // set first column as a default sort by asc
            });
            $('#id_Reload').click(function () {
                table.api().ajax.reload();
            });

            var tableWrapper = jQuery('#example_wrapper');

            table.find('.group-checkable').change(function () {
                var set = jQuery(this).attr("data-set");
                var checked = jQuery(this).is(":checked");
                jQuery(set).each(function () {
                    if (checked) {
                        $(this).attr("checked", true);
                        $(this).parents('tr').addClass("active");
                    } else {
                        $(this).attr("checked", false);
                        $(this).parents('tr').removeClass("active");
                    }
                });
                jQuery.uniform.update(set);
            });

            table.on('change', 'tbody tr .checkboxes', function () {
                $(this).parents('tr').toggleClass("active");
            });
            table.on('click', 'tbody tr', function () {
                var idAdv = $(this).find("td").eq(0).html();
                var jmlUang = $(this).find("td").eq(2).html();
                $('#id_idAdvance').val(idAdv);
                $('#btnCloseModalDataAdv').trigger('click');
                $('#id_advAmount').val(jmlUang);
                $('#id_idAdvance').focus();
                getDescAdv(idAdv);
            });

            tableWrapper.find('.dataTables_length select').addClass("form-control input-xsmall input-inline"); // modify table per page dropdown
        }
        var initTable4 = function () {
            //var table = $('#id_TabelPerk');
            // begin first table
            var table = $('#idTabelPerk').dataTable({
                "ajax": "<?php  echo base_url("/master_perkiraan/getAllPerkiraan"); ?>",
                "columns": [
                    {"data": "kode_perk"},
                    {"data": "kode_alt"},
                    {"data": "nama_perk"},
                    {"data": "level"},
                    {"data": "type"},
                    {"data": "dk"}
                ],
                // Internationalisation. For more info refer to http://datatables.net/manual/i18n
                "language": {
                    "aria": {
                        "sortAscending": ": activate to sort column ascending",
                        "sortDescending": ": activate to sort column descending"
                    },
                    "emptyTable": "No data available in table",
                    "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                    "infoEmpty": "No entries found",
                    "infoFiltered": "(filtered1 from _MAX_ total entries)",
                    "lengthMenu": "Show _MENU_ entries",
                    "search": "Search:",
                    "zeroRecords": "No matching records found"
                },
                "bStateSave": true, // save datatable state(pagination, sort, etc) in cookie.
                "lengthMenu": [
                    [5, 10, 15, 20, -1],
                    [5, 10, 15, 20, "All"] // change per page values here
                ],
                // set the initial value
                "pageLength": 5,
                "pagingType": "bootstrap_full_number",
                "language": {
                    "search": "Cari: ",
                    "lengthMenu": "  _MENU_ records",
                    "paginate": {
                        "previous": "Prev",
                        "next": "Next",
                        "last": "Last",
                        "first": "First"
                    }
                },
                // "aaSorting": [[4,'desc'], [5,'desc']],
                "columnDefs": [{  // set default column settings
                    'orderable': true,
                    'type': 'string',
                    'targets': [0]
                }, {
                    "searchable": true,
                    "targets": [0]
                }],
                "order": [
                    [0, "asc"]
                ] // set first column as a default sort by asc
            });

            var tableWrapper = jQuery('#id_TabelPerk_wrapper');

            table.find('.group-checkable').change(function () {
                var set = jQuery(this).attr("data-set");
                var checked = jQuery(this).is(":checked");
                jQuery(set).each(function () {
                    if (checked) {
                        $(this).attr("checked", true);
                        $(this).parents('tr').addClass("active");
                    } else {
                        $(this).attr("checked", false);
                        $(this).parents('tr').removeClass("active");
                    }
                });
                jQuery.uniform.update(set);
            });
            $('#id_Reload').click(function () {
                table.api().ajax.reload();
            });
            table.on('click', 'tbody tr', function () {
                var typePerk = $(this).find("td").eq(4).html();
                $('#idTxtTempJnsKode').val('1');
                if (typePerk == 'D') {
                    var kodePerk = $(this).find("td").eq(0).html();
                    $('#id_kodePerk').val(kodePerk);
                    var kodeAlt = $(this).find("td").eq(1).html();
                    $('#id_kodeAlt').text(kodeAlt);
                    var namaPerk = $(this).find("td").eq(2).html();
                    $('#id_namaPerk').text(namaPerk);

                    $("#btnCloseModalPerk").trigger("click");
                } else {
                    alert("Tidak diijinkan pilih kode induk.");
                }
            });

            tableWrapper.find('.dataTables_length select').addClass("form-control input-xsmall input-inline"); // modify table per page dropdown
        }
        var initTable5 = function () {
            //var table = $('#id_TabelPerk');
            // begin first table
            var table = $('#idTabelCflow').dataTable({
                "ajax": "<?php  echo base_url("/master_cflow/getAllCflow"); ?>",
                "columns": [
                    {"data": "kode_cflow"},
                    {"data": "kode_alt"},
                    {"data": "nama_cflow"},
                    {"data": "level"},
                    {"data": "type"}
                ],
                // Internationalisation. For more info refer to http://datatables.net/manual/i18n
                "language": {
                    "aria": {
                        "sortAscending": ": activate to sort column ascending",
                        "sortDescending": ": activate to sort column descending"
                    },
                    "emptyTable": "No data available in table",
                    "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                    "infoEmpty": "No entries found",
                    "infoFiltered": "(filtered1 from _MAX_ total entries)",
                    "lengthMenu": "Show _MENU_ entries",
                    "search": "Search:",
                    "zeroRecords": "No matching records found"
                },
                "bStateSave": true, // save datatable state(pagination, sort, etc) in cookie.
                "lengthMenu": [
                    [5, 10, 15, 20, -1],
                    [5, 10, 15, 20, "All"] // change per page values here
                ],
                // set the initial value
                "pageLength": 5,
                "pagingType": "bootstrap_full_number",
                "language": {
                    "search": "Cari: ",
                    "lengthMenu": "  _MENU_ records",
                    "paginate": {
                        "previous": "Prev",
                        "next": "Next",
                        "last": "Last",
                        "first": "First"
                    }
                },
                // "aaSorting": [[4,'desc'], [5,'desc']],
                "columnDefs": [{  // set default column settings
                    'orderable': true,
                    'type': 'string',
                    'targets': [0]
                }, {
                    "searchable": true,
                    "targets": [0]
                }],
                "order": [
                    [0, "asc"]
                ] // set first column as a default sort by asc
            });

            var tableWrapper = jQuery('#id_TabelPerk_wrapper');

            table.find('.group-checkable').change(function () {
                var set = jQuery(this).attr("data-set");
                var checked = jQuery(this).is(":checked");
                jQuery(set).each(function () {
                    if (checked) {
                        $(this).attr("checked", true);
                        $(this).parents('tr').addClass("active");
                    } else {
                        $(this).attr("checked", false);
                        $(this).parents('tr').removeClass("active");
                    }
                });
                jQuery.uniform.update(set);
            });
            $('#id_Reload').click(function () {
                table.api().ajax.reload();
            });
            table.on('click', 'tbody tr', function () {
                var typeCF = $(this).find("td").eq(4).html();
                $('#idTxtTempJnsKode').val('2');
                if (typeCF == 'D') {
                    var kodeCflow = $(this).find("td").eq(0).html();
                    $('#id_kodeCflow').val(kodeCflow);
                    var kodeAlt = $(this).find("td").eq(1).html();
                    $('#id_kodeAltCflow').text(kodeAlt);
                    var namaCflow = $(this).find("td").eq(2).html();
                    $('#id_namaCflow').text(namaCflow);

                    $("#btnCloseModalCflow").trigger("click");
                } else {
                    alert("Tidak diijinkan pilih kode induk.");
                }


            });

            tableWrapper.find('.dataTables_length select').addClass("form-control input-xsmall input-inline"); // modify table per page dropdown
        }
        return {
            //main function to initiate the module
            init: function () {
                if (!jQuery().dataTable) {
                    return;
                }
                initTable1();
                initTable2();
                initTable3();
                initTable4();
                initTable5();
            }
        };
    }();
    //Ready Doc
    btnStart();
    readyToStart();
    tglTransStart();
    btnCpaStart();
    $("#id_namaKyw").focus();
    $('#id_btnSign').attr("disabled", true);
    $("#id_btnModalKyw1").click(function () {
        $('#idTmpBtnKyw').val('1');
    });
    $("#id_btnModalKyw2").click(function () {
        $('#idTmpBtnKyw').val('2');
    });
    $("#id_btnSimpan").click(function () {
        $('#idTmpAksiBtn').val('1');
    });

    $('#id_btnUbah').click(function () {
        $('#idTmpAksiBtn').val('2');
    });
    $('#id_btnHapus').click(function () {
        $('#idTmpAksiBtn').val('3');
    });
    $("#id_btnSign").click(function () {
        $('#idTmpAksiBtn').val('4');
    });
    $('#id_btnBatal').click(function () {
        btnStart();
        startCheckBox();
        resetForm();
        readyToStart();
        tglTransStart();
        btnCpaStart();
        $('#id_body_data').empty();
    });
    $("#id_idSettle").focusout(function () {
        var idSettle = $(this).val();
        getDescSettle(idSettle);
    });
    $('#id_uang').keyup(function () {
        var val = $(this).val();
        if (isNaN(val)) {
            val = val.replace(/[^0-9\.]/g, '');
            if (val.split('.').length > 2)
                val = val.replace(/\.+$/, "");
        }
        $(this).val(val);
        //var words = toWords(val);
        //$('#terbilang').text(words);
    });
    $('#id_uang').focusout(function () {
        var angka = $('#id_uang').val();
        if ($(this).val() == '') {
            $(this).val('0.00');
        } else {
            $('#id_uang').val(number_format(angka, 2));
        }
    });
    $("#id_uang").focus(function () {
        if ($(this).val() == '0' || $(this).val() == '0.00') {
            $(this).val('');
        }
    });
    $('#id_dokFPe').change(function () {
        $('#id_dokFPe').each(function () {
            var checked = $(this).is(":checked");
            if (checked) {
                $('#id_dokFPe_in').val('1');
            } else {
                $('#id_dokFPe_in').val('0');
            }
        });
    });
    $('#id_dokKuitansi').change(function () {
        $('#id_dokKuitansi').each(function () {
            var checked = $(this).is(":checked");
            if (checked) {
                $('#id_dokKuitansi_in').val('1');
            } else {
                $('#id_dokKuitansi_in').val('0');
            }
        });
    });
    $('#id_dokPa').change(function () {
        $('#id_dokPa').each(function () {
            var checked = $(this).is(":checked");
            if (checked) {
                $('#id_dokPa_in').val('1');
            } else {
                $('#id_dokPa_in').val('0');
            }
        });
    });
    $('#id_dokPO').change(function () {
        $('#id_dokPO').each(function () {
            var checked = $(this).is(":checked");
            if (checked) {
                $('#id_dokPO_in').val('1');
            } else {
                $('#id_dokPO_in').val('0');
            }
        });
    });
    $('#id_dokSuratJalan').change(function () {
        $('#id_dokSuratJalan').each(function () {
            var checked = $(this).is(":checked");
            if (checked) {
                $('#id_dokSuratJalan_in').val('1');
            } else {
                $('#id_dokSuratJalan_in').val('0');
            }
        });
    });
    $('#id_dokPenBrg').change(function () {
        $('#id_dokPenBrg').each(function () {
            var checked = $(this).is(":checked");
            if (checked) {
                $('#id_dokPenBrg_in').val('1');
            } else {
                $('#id_dokPenBrg_in').val('0');
            }
        });
    });
    $('#id_dokBAST').change(function () {
        $('#id_dokBAST').each(function () {
            var checked = $(this).is(":checked");
            if (checked) {
                $('#id_dokBAST_in').val('1');
            } else {
                $('#id_dokBAST_in').val('0');
            }
        });
    });
    $('#id_dokBAP').change(function () {
        $('#id_dokBAP').each(function () {
            var checked = $(this).is(":checked");
            if (checked) {
                $('#id_dokBAP_in').val('1');
            } else {
                $('#id_dokBAP_in').val('0');
            }
        });
    });
    $('#id_dokLPJUM').change(function () {
        $('#id_dokLPJUM').each(function () {
            var checked = $(this).is(":checked");
            if (checked) {
                $('#id_dokLPJUM_in').val('1');
            } else {
                $('#id_dokLPJUM_in').val('0');
            }
        });
    });
    $('#id_dokSSP').change(function () {
        $('#id_dokSSP').each(function () {
            var checked = $(this).is(":checked");
            if (checked) {
                $('#id_dokSSP_in').val('1');
            } else {
                $('#id_dokSSP_in').val('0');
            }
        });
    });
    $('#id_dokSSPK').change(function () {
        $('#id_dokSSPK').each(function () {
            var checked = $(this).is(":checked");
            if (checked) {
                $('#id_dokSSPK_in').val('1');
            } else {
                $('#id_dokSSPK_in').val('0');
            }
        });
    });
    /* $('#').change(function () {
     $('#').each(function () {
     var checked = $(this).is(":checked");
     if (checked) {
     $('#_in').val('1');
     } else {
     $('#_in').val('0');
     }
     });
     }); */

    function btnCpaStart() {
        $('#id_btnAddCpa').attr("disabled", false);
        $('#id_btnUpdateCpa').attr("disabled", true);
        $('#id_btnRemoveCpa').attr("disabled", true);
        $('#id_btnSign').attr("disabled", true);
    }
    $('#id_btnAddCpa').click(function () {
        var i = $('#idTxtTempLoop').val();
        //Jika Kode cflow saja
        if ($('#id_kodePerk').val() == '' && $('#id_kodeCflow').val() != '') {
            var i = parseInt($('#idTxtTempLoop').val());

            i = i + 1;
            var jnsKode = $('#idTxtTempJnsKode').val();
            var kodeCflow = $('#id_kodeCflow').val();
            var ket = $('#id_keteranganCPA').val().trim();
            var jumlah = $('#id_jumlahCPA').val();

            tr = '<tr class="listdata" id="tr' + i + '">';
            tr += '<td><input type="text" class="form-control input-sm" id="id_tempKode' + i + '" name="tempKode' + i + '" readonly="true" value="' + kodeCflow + '" ></td>';
            tr += '<td><input type="text" class="form-control input-sm" id="id_tempJenisKode' + i + '" name="tempJenisKode' + i + '" readonly="true" value="' + jnsKode + '"></td>';
            tr += '<td><input type="text" class="form-control input-sm" id="id_tempKet' + i + '" name="tempKet' + i + '" readonly="true" value="' + ket + '"></td>';
            tr += '<td><input type="text" class="form-control nomor input-sm" id="id_tempJumlah' + i + '" name="tempJumlah' + i + '" readonly="true" value="' + jumlah + '"></td>';
            tr += '</tr>';
            jumlahP = parseFloat(CleanNumber(jumlah));
            var totalP = parseFloat(CleanNumber($('#idTotalCPA').val()));
            var total = totalP + jumlahP;
            $('#idTotalCPA').val(number_format(total, 2));
            $('#id_body_data').append(tr);
            $('#idTxtTempLoop').val(i);
            kosongCPA();
            //Jika kode perk aja
        } else if ($('#id_kodePerk').val() != '' && $('#id_kodeCflow').val() == '') {
            var i = parseInt($('#idTxtTempLoop').val());
            i = i + 1;
            var jnsKode = $('#idTxtTempJnsKode').val();
            var kodePerk = $('#id_kodePerk').val();
            var ket = $('#id_keteranganCPA').val().trim();
            var jumlah = $('#id_jumlahCPA').val();

            tr = '<tr class="listdata" id="tr' + i + '">';
            tr += '<td><input type="text" class="form-control input-sm" id="id_tempKode' + i + '" name="tempKode' + i + '" readonly="true" value="' + kodePerk + '"></td>';
            tr += '<td><input type="text" class="form-control input-sm" id="id_tempJenisKode' + i + '" name="tempJenisKode' + i + '" readonly="true" value="' + jnsKode + '"></td>';
            tr += '<td><input type="text" class="form-control input-sm" id="id_tempKet' + i + '" name="tempKet' + i + '" readonly="true" value="' + ket + '"></td>';
            tr += '<td><input type="text" class="form-control nomor input-sm" id="id_tempJumlah' + i + '" name="tempJumlah' + i + '" readonly="true" value="' + jumlah + '"></td>';
            tr += '</tr>';
            /*jumlahP = parseFloat(CleanNumber(jumlah));
             var totalP = parseFloat(CleanNumber($('#idTotalCPA').val()));
             var total = totalP + jumlahP;
             $('#idTotalCPA').val(number_format(total, 2));*/
            $('#id_body_data').append(tr);
            $('#idTxtTempLoop').val(i);
            kosongCPA();
        } else {
            alert("Hanya boleh isi salah satu kode.");
        }
    });

    $("#id_tabelPerkCflow").on('click', 'tbody tr', function () {
        var kode = $(this).find("td input").eq(0).val();
        var jnsKode = $(this).find("td input").eq(1).val();
        var ket = $(this).find("td input").eq(2).val();
        var jumlah = $(this).find("td input").eq(3).val();
        //Jika jns kode == kode perk
        if (jnsKode == '1') {
            $('#id_kodePerk').val(kode);
            $('#idTxtTempJnsKode').val(jnsKode);
            $('#id_keteranganCPA').val(ket);
            $('#id_jumlahCPA').val(jumlah);
        } else {
            $('#id_kodeCflow').val(kode);
            $('#idTxtTempJnsKode').val(jnsKode);
            $('#id_keteranganCPA').val(ket);
            $('#id_jumlahCPA').val(jumlah);
        }


        var idTr = $(this).attr('id');
        var noRow = idTr.replace('tr', '');
        $('#idTempUbahCPA').val(noRow);

        $('#idTempJumlahCPA').val(jumlah);

        $('#id_btnAddCpa').attr("disabled", true);
        $('#id_btnUpdateCpa').attr("disabled", false);
        $('#id_btnRemoveCpa').attr("disabled", false);

    });
    function kosongCPA() {
        $('.kosongCPA').val('');
        $('.tkosongCPA').text('');
        $('#id_jumlahCPA').val('0.00');
    }
    $('#id_btnUpdateCpa').click(function () {
        var noRow = $('#idTempUbahCPA').val();
        var jnsKode = $('#idTxtTempJnsKode').val();
        var ket = $('#id_keteranganCPA').val();
        var jumlah = $('#id_jumlahCPA').val();

        if (jnsKode == '1') {
            var kode = $('#id_kodePerk').val();
        } else {
            var kode = $('#id_kodeCflow').val();
            var totalP = parseFloat(CleanNumber($('#idTotalCPA').val()));
            var jumlahOld = parseFloat(CleanNumber($('#idTempJumlahCPA').val()));
            var jumlahNew = parseFloat(CleanNumber(jumlah));
            totalP = totalP - jumlahOld + jumlahNew;
            $('#idTotalCPA').val(number_format(totalP, 2));
        }

        $('#id_tempKode' + noRow).val(kode);
        $('#id_tempJenisKode' + noRow).val(jnsKode);
        $('#id_tempKet' + noRow).val(ket);
        $('#id_tempJumlah' + noRow).val(jumlah);

        kosongCPA();
        btnCpaStart();
    });
    $('#id_btnRemoveCpa').click(function () {
        var noRow = $('#idTempUbahCPA').val();
        var jnsKode = $('#idTxtTempJnsKode').val();
        $('#tr' + noRow).remove();
        var i = $('#idTxtTempLoop').val();
        i = parseInt(i);
        i = i - 1;
        $('#idTxtTempLoop').val(i);
        if (jnsKode == '2') {
            var totalP = parseFloat(CleanNumber($('#idTotalCPA').val()));
            var jumlahOld = parseFloat(CleanNumber($('#idTempJumlahCPA').val()));
            totalP = totalP - jumlahOld;
            $('#idTotalCPA').val(number_format(totalP, 2));
        }

        kosongCPA();
        btnCpaStart();
    });
    $('#id_btnBatalCpa').click(function () {
        kosongCPA();
        btnCpaStart();
    });
    function getDescSettle(idSettle) {
        ajaxModal();
        if (idSettle != '') {
            $.post("<?php echo site_url('/master_settle_adv/getDescSettle'); ?>",
                {
                    'idSettle': idSettle
                }, function (data) {
                    if (data.baris == 1) {
						$('#id_idKyw').val(data.id_kyw);
                        $('#id_namaKyw').val(data.nama_kyw);
                        $('#id_deptKyw').val(data.nama_dept);
                        $('#id_idAdvance').val(data.idAdvance);
                        $('#id_advAmount').val(number_format(data.advAmount, 2));
                        $('#id_paid').val(number_format(data.paid, 2));
                        $('#id_uangPaidou').val(number_format(data.paidou, 2));
                        $('#id_tglJT').val(data.tgl_jt);
						$('#id_proyek').val(data.id_proyek);
                        $('#id_idPayTo').val(data.id_pay_to);
                        $('#id_namaPayTo').val(data.pay_to);
						$('#id_tglAdv').val(data.tgl_trans);
                        $('#id_namaPemilikAkunBank').val(data.nama_akun_bank);
                        $('#id_noAkunBank').val(data.no_akun_bank);
                        $('#id_namaBank').val(data.nama_bank);
                        $('#id_keteranganAdv').val(data.ketadv);
						$('#id_keterangan').val(data.keterangan);

                        if (data.dok_fpe == '1') {
                            $("#uniform-id_dokFPe span").addClass("checked");
                            $('#id_dokFPe_in').val('1');
                        } else {
                            $("#uniform-id_dokFPe span").removeClass("checked");
                            $('#id_dokFPe_in').val('0');
                        }
                        if (data.dok_kuitansi == '1') {
                            $("#uniform-id_dokKuitansi span").addClass("checked");
                            $('#id_dokKuitansi_in').val('1');
                        } else {
                            $("#uniform-id_dokKuitansi span").removeClass("checked");
                            $('#id_dokKuitansi_in').val('0');
                        }
                        if (data.dok_fpa == '1') {
                            $("#uniform-id_dokPa span").addClass("checked");
                            $('#id_dokPa_in').val('1');
                        } else {
                            $("#uniform-id_dokPa span").removeClass("checked");
                            $('#id_dokPa_in').val('0');
                        }
                        if (data.dok_po == '1') {
                            $("#uniform-id_dokPO span").addClass("checked");
                            $('#id_dokPO_in').val('1');
                        } else {
                            $("#uniform-id_dokPO span").removeClass("checked");
                            $('#id_dokPO_in').val('0');
                        }
                        if (data.dok_suratjalan == '1') {
                            $("#uniform-id_dokSuratJalan span").addClass("checked");
                            $('#id_dokSuratJalan_in').val('1');
                        } else {
                            $("#uniform-id_dokSuratJalan span").removeClass("checked");
                            $('#id_dokSuratJalan_in').val('0');
                        }
                        if (data.dok_lappenerimaanbrg == '1') {
                            $("#uniform-id_dokPenBrg span").addClass("checked");
                            $('#id_dokPenBrg_in').val('1');
                        } else {
                            $("#uniform-id_dokPenBrg span").removeClass("checked");
                            $('#id_dokPenBrg_in').val('0');
                        }
                        if (data.dok_bast == '1') {
                            $("#uniform-id_dokBAST span").addClass("checked");
                            $('#id_dokBAST_in').val('1');
                        } else {
                            $("#uniform-id_dokBAST span").removeClass("checked");
                            $('#id_dokBAST_in').val('0');
                        }
                        if (data.dok_bap == '1') {
                            $("#uniform-id_dokBAP span").addClass("checked");
                            $('#id_dokBAP_in').val('1');
                        } else {
                            $("#uniform-id_dokBAP span").removeClass("checked");
                            $('#id_dokBAP_in').val('0');
                        }
                        if (data.dok_lpjum == '1') {
                            $("#uniform-id_dokLPJUM span").addClass("checked");
                            $('#id_dokLPJUM_in').val('1');
                        } else {
                            $("#uniform-id_dokCOP span").removeClass("checked");
                            $('#id_dokLPJUM_in').val('0');
                        }
                        if (data.dok_ssp == '1') {
                            $("#uniform-id_dokSSP span").addClass("checked");
                            $('#id_dokSSP_in').val('1');
                        } else {
                            $("#uniform-id_dokSSP span").removeClass("checked");
                            $('#id_dokSSP_in').val('0');
                        }
                        if (data.dok_sspk == '1') {
                            $("#uniform-id_dokSSPK span").addClass("checked");
                            $('#id_dokSSPK_in').val('1');
                        } else {
                            $("#uniform-id_dokSSPK span").removeClass("checked");
                            $('#id_dokSSPK_in').val('0');
                        }

                        if (data.app_user_id == '0') {
                            $('#id_btnSign').attr("disabled", false);
                        } else {
                            $('#id_btnSign').attr("disabled", true);
                            $('#id_btnUbah').attr("disabled", true);
                        }
                        if (data.inout_budget == '0') {
                            $("#uniform-id_wBudget span").addClass("checked");
                            $('#id_wBudget_in').val('1');
                        } else {
                            $("#uniform-id_oBudget span").addClass("checked");
                            $('#id_oBudget_in').val('1');
                        }
                        $('#id_appKeuanganId').val(data.app_keuangan_id);
                        $('#id_appKeuanganStatus').val(data.app_keuangan_status);
                        $('#id_appKeuanganTgl').val(data.app_keuangan_tgl);
                        $('#id_appKeuanganKet').val(data.app_keuangan_ket);

                        $('#id_appHDId').val(data.app_hd_id);
                        $('#id_appHDStatus').val(data.app_hd_status);
                        $('#id_appHDTgl').val(data.app_hd_tgl);
                        $('#id_appHDKet').val(data.app_hd_ket);

                        $('#id_appGMId').val(data.app_gm_id);
                        $('#id_appGMStatus').val(data.app_gm_status);
                        $('#id_appGMTgl').val(data.app_gm_tgl);
                        $('#id_appGMKet').val(data.app_gm_ket);

                        /*
                         $('#').val(data.); */
                    } else {
                        alert('Data tidak ditemukan!');
                        $('#id_btnBatal').trigger('click');
                    }
                }, "json");
        }//if kd<>''
    }
	function getDescCpa(idSettle) {
        ajaxModal();
        if (idSettle != '') {
            $.post("<?php echo site_url('/master_settle_adv/getDescCpa'); ?>",
                {
                    'idSettle': idSettle
                }, function (data) {
                    if (data.data_cpa.length > 0) {
                        $('#idTxtTempLoop').val(data.data_cpa.length);
                        for (i = 0; i < data.data_cpa.length; i++) {
                            var x = i + 1;
                            //var idCpa           = data.data_cpa[i].id_cpa;
                            var kode = data.data_cpa[i].kode;
                            var jnsKode = data.data_cpa[i].jns_kode;
                            var ket = data.data_cpa[i].keterangan;
                            var jumlah = data.data_cpa[i].jumlah;

                            tr = '<tr class="listdata" id="tr' + x + '">';
                            tr += '<td><input type="text" class="form-control input-sm" id="id_tempKode' + x + '" name="tempKode' + x + '" readonly="true" value="' + kode + '"></td>';
                            tr += '<td><input type="text" class="form-control input-sm" id="id_tempJenisKode' + x + '" name="tempJenisKode' + x + '" readonly="true" value="' + jnsKode + '" ></td>';
                            tr += '<td><input type="text" class="form-control input-sm" id="id_tempKet' + x + '" name="tempKet' + x + '" readonly="true" value="' + ket + '"></td>';
                            tr += '<td><input type="text" class="form-control nomor input-sm" id="id_tempJumlah' + x + '" name="tempJumlah' + x + '" readonly="true" value="' + number_format(jumlah, 2) + '"></td>';
                            tr += '</tr>';
                            if(jnsKode =='2'){
                                jumlahP = parseFloat(CleanNumber(jumlah));
                                var totalP = parseFloat(CleanNumber($('#idTotalCPA').val()));
                                var total = totalP + jumlahP;
                                $('#idTotalCPA').val(number_format(total, 2));
                            }

                            $('#id_body_data').append(tr);
                        }
                        /*
                         $('#').val(data.); */
                    } else {
                        //alert('Data tidak ditemukan!');
                        //$('#id_btnBatal').trigger('click');
                    }
                }, "json");
        }//if kd<>''
    }
    function getDescAdv(idAdv) {
        ajaxModal();
        if (idAdv != '') {
            $.post("<?php echo site_url('/master_advance/getDescAdv'); ?>",
                {
                    'idAdv': idAdv
                }, function (data) {
                    if (data.baris == 1) {
						//console.og(data);
                        $('#id_namaKyw').val(data.nama_kyw);
                        $('#id_deptKyw').val(data.nama_dept);
                        $('#id_proyek').val(data.id_proyek);
                        $('#id_tglAdv').val(data.tgl_trans);
                        $('#id_keteranganAdv').val(data.keterangan);
                        /*
                         $('#').val(data.); */
                    } else {
                        alert('Data tidak ditemukan!');
                        $('#id_btnBatal').trigger('click');
                    }
                }, "json");
        }//if kd<>''
    }
    function ajaxSignSettle() {
        ajaxModal();
        var idSettle = $('#id_idSettle').val();
        idSettle = idSettle.trim();
        var flag = '1';

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "<?php echo base_url(); ?>master_settle_adv/sign",
            data: {idSettle: idSettle, flag: flag},
            success: function (data) {
                UIToastr.init(data.tipePesan, data.pesan);
                $('#id_btnSign').attr("disabled", true);
            }

        });
        event.preventDefault();
    }
    function ajaxSubmitSettle() {
        ajaxModal();
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "<?php echo base_url(); ?>master_settle_adv/simpan",
            data: dataString,

            success: function (data) {
                $('#id_ReloadSettle').trigger('click');
                $('#id_btnBatal').trigger('click');
                UIToastr.init(data.tipePesan, data.pesan);
                $('input:checkbox').removeAttr('checked');
            }

        });
        event.preventDefault();
    }
    function ajaxUbahSettle() {
        ajaxModal();
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "<?php echo base_url(); ?>master_settle_adv/ubah",
            data: dataString,

            success: function (data) {
                $('#id_ReloadSettle').trigger('click');
                $('#id_btnBatal').trigger('click');
				UIToastr.init(data.tipePesan, data.pesan);
            }

        });
        event.preventDefault();
    }
    function ajaxHapusSettle() {
        ajaxModal();
        var idSettle = $('#id_idSettle').val();
        idSettle = idSettle.trim();
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "<?php echo base_url(); ?>master_settle_adv/hapus",
            data: {idSettle: idSettle},
            success: function (data) {
                $('#id_ReloadReqpay').trigger('click');
                $('#id_btnBatal').trigger('click');
                UIToastr.init(data.tipePesan, data.pesan);
            }

        });
        event.preventDefault();
    }
    $('#id_formSettle').submit(function (event) {
        $('#id_proyek').attr("disabled", false);
        dataString = $("#id_formSettle").serialize();
        var aksiBtn = $('#idTmpAksiBtn').val();
        if (aksiBtn == '1') {
            var r = confirm('Anda yakin menyimpan data ini?');
            if (r == true) {
                ajaxSubmitSettle();
            } else {//if(r)
                return false;
            }
        } else if (aksiBtn == '2') {
            var r = confirm('Anda yakin merubah data ini?');
            if (r == true) {
                ajaxUbahSettle();
            } else {//if(r)
                return false;
            }
        } else if (aksiBtn == '3') {
            var r = confirm('Anda yakin menghapus data ini?');
            if (r == true) {
                ajaxHapusSettle();
            } else {//if(r)
                return false;
            }
        } else if (aksiBtn == '4') {
            var r = confirm('Anda yakin sign data ini?');
            if (r == true) {
                ajaxSignSettle();
            } else {//if(r)
                return false;
            }
        }
    });
    function cetak() {
        var idSettle = $('#id_idSettle').val();
        if (idSettle == '') {
            alert('Silahkan pilih ID Advance');
        } else {
            window.open("<?php echo base_url('master_settle_adv/cetak/'); ?>/" + idSettle, '_blank');
        }
    }
	function cetakcpa() {
        var idSettle = $('#id_idSettle').val();
        if (idSettle == '') {
            alert('Silahkan pilih ID Advance');
        } else {
            window.open("<?php echo base_url('master_settle_adv/cetak_cpa/'); ?>/" + idSettle, '_blank');
        }
    }
    $(".nomor2").focusout(function () {
        if ($(this).val() == '') {
            $(this).val('0.00');
        } else {
            var angka = $('#id_paid').val();
            var str = $('#id_advAmount').val();
            /*var bayarAwal = str.replace('.00', '');
            var bayar = bayarAwal.replace(',', '');
			var bayara = bayar.replace(',', '');*/

            var bayara = parseFloat(CleanNumber(str));
            angka = parseFloat(CleanNumber(angka));
            var hasil = bayara - angka;
            if (hasil <= 0) {
                //alert("min");
                var h = hasil.toString();
                var hsl = h.replace('-', '')
                $('#id_uangPaidou').val('(' + number_format(hsl, 2) + ')');
            } else {
                $('#id_uangPaidou').val(number_format(hasil, 2));
            }

			$('#id_paid').val(number_format(angka, 2));
        }
    });
    $(".nomor2").keyup(function () {
        var val = $(this).val();
        if (isNaN(val)) {
            val = val.replace(/[^0-9\.]/g, '');
            if (val.split('.').length > 2)
                val = val.replace(/\.+$/, "");
        }
        $(this).val(val);

    });
</script>


<!-- END JAVASCRIPTS -->