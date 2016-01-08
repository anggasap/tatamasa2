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
                    <span class="caption-subject font-red-sunglo bold uppercase">Approval Reimbursment</span>
                </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse">
                    </a>
                    <a href="javascript:;" class="fullscreen">
                    </a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="col-md-12">
                        <input type="hidden" id="idUserGroup"
                               value="<?php echo $this->session->userdata('usergroup'); ?>">
                        <button id="id_Reload" style="display: none;"></button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-body">
                            <table class="table table-striped table-bordered table-hover text_kanan" id="idTabelAppAdv">
                                <thead>
                                <tr>
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        Nama Karyawan
                                    </th>
                                    <th>
                                        Departemen
                                    </th>
                                    <th>
                                        Jumlah
                                    </th>
                                    <th>
                                        Dibayarkan Ke
                                    </th>
                                    <th>
                                        App Keuangan
                                    </th>
                                    <th>
                                        App HD
                                    </th>
                                    <th>
                                        App GM
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
<div class="modal fade draggable-modal" id="idDivAppAdv" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog  modal-full">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"
                        id="btnCloseModalAppAdv"></button>
                <h4 class="modal-title">Reimbursement Approval</h4>
            </div>
            <div class="modal-body">
                <div class="scroller" style="height:400px;">
                    <form class="" id="FormApprovalAdv" role="form" method="post" action="">
                        <div class="row">
                        <div class="form-body">
                            <div class="col-md-4">
								<div class="form-group">
                                    <label>Id Settlement Of Payment </label>
                                            <input id="id_idSettle" required="required" class="form-control input-sm"
                                                   type="text" name="idSettle" readonly/>
								</div>
                                <div class="form-group">
									<label>Nama karyawan (Requester) </label>
                                        <input id="id_namaKyw" required="required" class="form-control input-sm"
                                                   type="text" name="namaKyw" readonly/>
                                </div>
                                <div class="form-group">
                                    <label>Departemen/Bagian</label>
									<input id="id_deptKyw" required="required" class="form-control input-sm"
                                                   type="text" name="deptKyw" readonly/>
                                </div>
                                <div class="form-group">
                                    <label>Id Advance </label>
                                    <input id="id_idAdvance" required="required" class="form-control input-sm"
                                               type="text" name="idAdvance" readonly/>        
                                </div>
                            </div>
                            <!--end <div class="col-md-6"> 1 -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Jumlah Permintaan</label>
                                            <input id="id_advAmount" required="required" class="form-control input-sm"
                                                   type="text" name="advAmount" readonly/>
                                </div>
                                <div class="form-group">
                                    <label>Jumlah Pembayaran</label>
                                            <input id="id_paid" required="required" class="form-control input-sm nomor2"
                                                   type="text" name="paid" readonly/>
                                </div>
                                <div class="form-group">
                                    <label>Lebih(Kurang) Pembayaran</label>
                                            <input id="id_uangPaidou" required="required" class="form-control input-sm"
                                                   type="text" name="uangPaidou" readonly/>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Jatuh Tempo</label>
                                            <input id="id_tglJT" required="required" class="form-control date-picker input-sm" 
                                                   type="text" name="tglJT" placeholder="dd-mm-yyyy" readonly/>
                                </div>
                            </div>
                            <div class="col-md-4">
                            	<div class="form-group">
                                    <label>Dibayarkan ke</label>
                                        <input id="id_namaPayTo" required="required" class="form-control input-sm"
                                               type="text" name="namapayTo" readonly/>
                                </div>
								<div class="form-group">
                                    <label>Nama pemilik akun bank</label>
                                            <input id="id_namaPemilikAkunBank" required="required" class="form-control input-sm"
                                                   type="text" name="namaPemilikAkunBank" readonly/>
                                </div>
                                <div class="form-group">
                                    <label>No akun bank</label>
                                            <input id="id_noAkunBank" required="required" class="form-control input-sm"
                                                   type="text" name="noAkunBank" readonly/>
                                </div>
                                <div class="form-group">
                                    <label>Nama bank</label>
                                            <input id="id_namaBank" required="required" class="form-control input-sm"
                                                   type="text" name="namaBank" readonly/>
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
                                    <textarea rows="2" cols="" name="keterangan"  id="id_keterangan" class="form-control input-sm" readonly="true">
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
										<input type="checkbox"  value="1"  name="dokFPe" id="id_dokFPe"> Faktur Penjualan (Asli)  </label>
										<input type="text" name="dokFPe_in" id="id_dokFPe_in" class="nomor1 hidden">
										<label>
										<input type="checkbox"  value="1"  name="dokKuitansi" id="id_dokKuitansi"> Kuitansi (Asli)  </label>
										<input type="text" name="dokKuitansi_in" id="id_dokKuitansi_in" class="nomor1 hidden">
										<label>
										<input type="checkbox"  value="1"  name="dokPa" id="id_dokPa"> Faktur Pajak (Asli)  </label>
										<input type="text" name="dokPa_in" id="id_dokPa_in" class="nomor1 hidden">
										<label>
										<input type="checkbox"  value="1"  name="dokPO" id="id_dokPO"> Purchase Order (PO)  </label>
										<input type="text" name="dokPO_in" id="id_dokPO_in" class="nomor1 hidden">
									</div>
								</div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
									<label>&nbsp;</label>
									<div class="checkbox-list">
										<label>
										<input type="checkbox"  value="1" name="dokSuratJalan" id="id_dokSuratJalan">  Surat Jalan </label>
										<input type="text" name="dokSuratJalan_in" id="id_dokSuratJalan_in" class="nomor1 hidden">
										<label>
										<input type="checkbox"  value="1" name="dokPenBrg" id="id_dokPenBrg">  Laporan Penerimaan Barang </label>
										<input type="text" name="dokPenBrg_in" id="id_dokPenBrg_in" class="nomor1 hidden">
										<label>
										<input type="checkbox"  value="1" name="dokBAST" id="id_dokBAST">  Berita Acara Serah Terima </label>
										<input type="text" name="dokBAST_in" id="id_dokBAST_in" class="nomor1 hidden">
										<label>
										<input type="checkbox"  value="1" name="dokBAP" id="id_dokBAP">  Berita Acara Pemeriksaan  </label>
										<input type="text" name="dokBAP_in" id="id_dokBAP_in" class="nomor1 hidden">
									</div>
								</div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
									<label>&nbsp;</label>
									<div class="checkbox-list">
										<label>
										<input type="checkbox"  value="1" name="dokSSP" id="id_dokSSP"> Sesuai Surat Perjanjian / Kontrak </label>
										<input type="text" name="dokSSP_in" id="id_dokSSP_in" class="nomor1 hidden">
										<label>
										<input type="checkbox"  value="1" name="dokSSPK" id="id_dokSSPK"> Sesuai Surat Perintah Kerja (SPK) </label>
										<input type="text" name="dokSSPK_in" id="id_dokSSPK_in" class="nomor1 hidden">
										<label>
										<input type="checkbox"  value="1" name="dokSSPK" id="id_dokSSPK"> LPJ Uang Muka </label>
										<input type="text" name="dokLPJUM_in" id="id_LPJUM_in" class="nomor1 hidden">
									</div>
								</div>
                            </div>	
                        </div>
                    </div>
                        <!--END ROW 3 -->
                        <?php if ($this->session->userdata('usergroup') == '5') { ?>
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
                                                   type="text" name="appKeuanganId" readonly/>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <select id="id_appKeuanganStatus" class="form-control input-sm approvalselect"
                                                    name="appKeuanganStatus">
                                                <option value="1">Approve</option>
                                                <option value="2">Reject</option>
                                                <option value="3">Paid</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <input id="id_appKeuanganTgl" class="form-control input-sm"
                                                   type="text" name="appKeuanganTgl" readonly/>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                    <textarea rows="2" cols="" name="appKeuanganKet" id="id_appKeuanganKet"
                              class="form-control input-sm keterangan" placeholder="Keterangan">
                    </textarea>
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
                                            <input id="id_appHDId" class="form-control  input-sm"
                                                   type="text" name="appHDId" readonly/>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <select id="id_appHDStatus" class="form-control input-sm" name="appHDStatus"
                                                    disabled>
                                                <option value="1">Approve</option>
                                                <option value="2">Reject</option>
                                                <option value="3">Paid</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <input id="id_appHDTgl" class="form-control input-sm"
                                                   type="text" name="appHDTgl" readonly/>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                    <textarea rows="2" cols="" readonly placeholder="Keterangan" name="appHDKet" id="id_appHDKet"
                              class="form-control input-sm" >
                    </textarea>
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
                                                   type="text" name="appGMId" readonly/>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <select id="id_appGMStatus" class="form-control  input-sm"
                                                    name="appGMStatus" disabled>
                                                <option value="1">Approve</option>
                                                <option value="2">Reject</option>
                                                <option value="3">Paid</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <input id="id_appGMTgl" class="form-control input-sm"
                                                   type="text" name="appGMTgl" readonly/>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
											<textarea rows="2" cols="" readonly placeholder="Keterangan" name="appGMKet" id="id_appGMKet"
												class="form-control input-sm" >
											</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <?php if ($this->session->userdata('usergroup') == '3') { ?>
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
                                                   type="text" name="appKeuanganId" readonly/>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <select id="id_appKeuanganStatus" disabled class="form-control input-sm"
                                                    name="appKeuanganStatus">
                                                <option value="1">Approve</option>
                                                <option value="2">Reject</option>
                                                <option value="3">Paid</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <input id="id_appKeuanganTgl" class="form-control input-sm"
                                                   type="text" name="appKeuanganTgl" readonly/>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
											<textarea rows="2" cols="" readonly name="appKeuanganKet" id="id_appKeuanganKet"
											  class="form-control input-sm" placeholder="Keterangan" >
											</textarea>
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
                                            <input id="id_appHDId" class="form-control  input-sm"
                                                   type="text" name="appHDId" readonly/>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <select id="id_appHDStatus" class="form-control input-sm approvalselect"
                                                    name="appHDStatus">
                                                <option value="1">Approve</option>
                                                <option value="2">Reject</option>
                                                <option value="3">Paid</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <input id="id_appHDTgl" class="form-control input-sm"
                                                   type="text" name="appHDTgl" readonly/>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
										<textarea rows="2" cols="" placeholder="Keterangan" name="appHDKet" id="id_appHDKet"
											class="form-control input-sm keterangan" >
										</textarea>
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
                                                   type="text" name="appGMId" readonly/>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <select id="id_appGMStatus" class="form-control  input-sm"
                                                    name="appGMStatus" disabled>
                                                <option value="1">Approve</option>
                                                <option value="2">Reject</option>
                                                <option value="3">Paid</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <input id="id_appGMTgl" class="form-control input-sm"
                                                   type="text" name="appGMTgl" readonly/>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
										<textarea rows="2" cols="" readonly placeholder="Keterangan" name="appGMKet" id="id_appGMKet"
												  class="form-control input-sm" >
										</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        if ($this->session->userdata('usergroup') == '4') {
                            ?>
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
                                                   type="text" name="appKeuanganId" readonly/>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <select id="id_appKeuanganStatus" disabled class="form-control input-sm"
                                                    name="appKeuanganStatus">
                                                <option value="1">Approve</option>
                                                <option value="2">Reject</option>
                                                <option value="3">Paid</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <input id="id_appKeuanganTgl" class="form-control input-sm"
                                                   type="text" name="appKeuanganTgl" readonly/>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                    <textarea rows="2" cols="" readonly name="appKeuanganKet" id="id_appKeuanganKet"
                              class="form-control input-sm" placeholder="Keterangan" >
                    </textarea>
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
                                            <input id="id_appHDId" class="form-control  input-sm"
                                                   type="text" name="appHDId" readonly/>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <select id="id_appHDStatus" disabled class="form-control input-sm"
                                                    name="appHDStatus">
                                                <option value="1">Approve</option>
                                                <option value="2">Reject</option>
                                                <option value="3">Paid</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <input id="id_appHDTgl" class="form-control input-sm"
                                                   type="text" name="appHDTgl" readonly/>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                    <textarea rows="2" cols="" readonly placeholder="Keterangan" name="appHDKet" id="id_appHDKet"
                              class="form-control input-sm" >
                    </textarea>
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
                                                   type="text" name="appGMId" readonly/>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <select id="id_appGMStatus" class="form-control  input-sm approvalselect"
                                                    name="appGMStatus">
                                                <option value="1">Approve</option>
                                                <option value="2">Reject</option>
                                                <option value="3">Paid</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <input id="id_appGMTgl" class="form-control input-sm keterangan"
                                                   type="text" name="appGMTgl" readonly/>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                    <textarea rows="2" cols="" placeholder="Keterangan" name="appGMKet" id="id_appGMKet"
                              class="form-control input-sm" >
                    </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        if ($this->session->userdata('usergroup') == '1') {
                            ?>
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
                                                   type="text" name="appKeuanganId" readonly/>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <select id="id_appKeuanganStatus"  class="form-control input-sm"
                                                    name="appKeuanganStatus">
                                                <option value="1">Approve</option>
                                                <option value="2">Reject</option>
                                                <option value="3">Paid</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <input id="id_appKeuanganTgl" class="form-control input-sm"
                                                   type="text" name="appKeuanganTgl" readonly/>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                    <textarea rows="2" cols="" name="appKeuanganKet" id="id_appKeuanganKet"
                              class="form-control input-sm" placeholder="Keterangan" >
                    </textarea>
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
                                            <input id="id_appHDId" class="form-control  input-sm"
                                                   type="text" name="appHDId" readonly/>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <select id="id_appHDStatus"  class="form-control input-sm"
                                                    name="appHDStatus">
                                                <option value="1">Approve</option>
                                                <option value="2">Reject</option>
                                                <option value="3">Paid</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <input id="id_appHDTgl" class="form-control input-sm"
                                                   type="text" name="appHDTgl" readonly/>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                    <textarea rows="2" cols="" placeholder="Keterangan" name="appHDKet" id="id_appHDKet"
                              class="form-control input-sm" >
                    </textarea>
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
                                                   type="text" name="appGMId" readonly/>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <select id="id_appGMStatus" class="form-control  input-sm approvalselect"
                                                    name="appGMStatus">
                                                <option value="1">Approve</option>
                                                <option value="2">Reject</option>
                                                <option value="3">Paid</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <input id="id_appGMTgl" class="form-control input-sm keterangan"
                                                   type="text" name="appGMTgl" readonly/>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                    <textarea rows="2" cols="" placeholder="Keterangan" name="appGMKet" id="id_appGMKet"
                              class="form-control input-sm" >
                    </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="row">
                        </div>
                        <!-- END SCROLLER-->
                </div>
                </form>
                <!-- END MODAL BODY-->
                <div class="modal-footer">

					<span id="event_result">    
					</span>
                        <?php if ($this->session->userdata('usergroup_desc') == 'User') {
                        } else {
                            ?>
                            <button type="submit" id="btnSimpan" form="FormApprovalAdv" class="btn btn-info"><i
                                    class="fa fa-save"></i>
                                Approve
                            </button>
                        <?php } ?>
                        <button type="button" class="btn default" data-dismiss="modal" id="btnCloseModalDataUser">
                            Cancel
                        </button>

                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!--  END  MODAL Data Karyawan -->

    <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
    <!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="<?php echo base_url('metronic/global/plugins/respond.min.js'); ?>"></script>
<script src="<?php echo base_url('metronic/global/plugins/excanvas.min.js'); ?>"></script>
<![endif]-->
<script src="<?php echo base_url('metronic/global/plugins/jquery.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('metronic/global/plugins/jquery-migrate.min.js'); ?>" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="<?php echo base_url('metronic/global/plugins/jquery-ui/jquery-ui.min.js'); ?>" type="text/javascript"></script>
<!-- BEGIN PAGE LEVEL PLUGINS -->

<script src="<?php echo base_url('metronic/global/plugins/bootstrap/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('metronic/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('metronic/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('metronic/global/plugins/jquery.blockui.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('metronic/global/plugins/jquery.cokie.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('metronic/global/plugins/uniform/jquery.uniform.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('metronic/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js'); ?>" type="text/javascript"></script>
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="<?php echo base_url('metronic/global/plugins/bootstrap-toastr/toastr.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('metronic/global/plugins/select2/select2.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('metronic/global/plugins/datatables/media/js/jquery.dataTables.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('metronic/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js'); ?>"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- END CORE PLUGINS -->
<script type="text/javascript" src="<?php echo base_url('metronic/global/scripts/metronic.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('metronic/admin/layout4/scripts/layout.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('metronic/admin/layout4/scripts/demo.js'); ?>"></script>
<script src="<?php echo base_url('metronic/additional/start.js'); ?>" type="text/javascript"></script>
    <script>
        jQuery(document).ready(function () {
            Metronic.init(); // init metronic core components
            Layout.init(); // init current layout
            Demo.init(); // init demo features
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
                var table = $('#idTabelAppAdv');
                // begin first table
                table.dataTable({
                    "ajax": "<?php  echo base_url("/approval_settlement/getAllSettle"); ?>",
                    "columns": [
                        {"data": "idSettle"},
                        {"data": "namaKyw"},
                        {"data": "deptKyw"},
                        {"data": "jumlah"},
                        {"data": "nama_user"},
                        {"data": "appKeuangan"},
                        {"data": "appHD"},
                        {"data": "appGM"}
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
                    var id = $(this).find("td").eq(0).html();
                    getDescRb(id);
                    $('#id_idSettle').val(id);
                    $("#idDivAppAdv").modal("show");
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
                }
            };
        }();

        function ajax_submit_tambah() {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>approval_settlement/approval",
                data: dataString,
                dataType: "json",
                success: function (data) {
                    UIToastr.init(data.tipePesan, data.pesan);
                    $('#btnCloseModalDataUser').trigger('click');
                    $('#id_Reload').trigger('click');
                }

            });
            event.preventDefault();
        }
        $('form input:checkbox').attr("disabled",true);
        $(".approvalselect").change(function () {
            var app = $(".approvalselect").val();
            if(app == '2'){
                $('.keterangan').attr("required",true);
            }else{
                $('.keterangan').attr("required",false);
            }

        });
        $('#FormApprovalAdv').submit(function (event) {
            dataString = $("#FormApprovalAdv").serialize();
            var budget = $('#id_inoutBudget_in').val();
            var app = $(".approvalselect").val();
            //alert(app);

            if(budget == '1' && app == '2'){
                var r = confirm('Request over budget.\nAnda yakin menyimpan data ini?');
            }else{
                var r = confirm('Anda yakin menyimpan data ini?');
            }

            if (r) {
                ajax_submit_tambah();
            } else {//if(r)
                return false;
            }
        });

        function getDescRb(id) {
            var idUserGroup = $('#idUserGroup').val();

            var idRb = id;
            if (idRb != '') {
                $.post("<?php echo site_url('/approval_settlement/getDescSettle'); ?>",
                    {
                        'idRb': idRb
                    }, function (data) {
                        //console.log(data);
                        if (data.baris == 1) {
                            $('#id_kywId').val(data.id_kyw);
							$('#id_namaKyw').val(data.nama_kyw);
							$('#id_deptKyw').val(data.nama_dept);
							$('#id_idAdvance').val(data.idAdvance);
							$('#id_advAmount').val(data.jml_uang);
							$('#id_paid').val(data.jml_uang_paid);
							$('#id_uangPaidou').val(data.jml_uang_oupaid);
							$('#id_tglJT').val(data.tgl_jt);
							$('#id_idPayTo').val(data.id_pay_to);
							$('#id_namaPayTo').val(data.pay_to);
							$('#id_namaPemilikAkunBank').val(data.nama_akun_bank);
							$('#id_noAkunBank').val(data.no_akun_bank);
							$('#id_namaBank').val(data.nama_bank);
							$('#id_keterangan').val(data.keterangan);
						
							if(data.dok_fpe == '1'){
								$("#uniform-id_dokFPe span").addClass("checked");
								$('#id_dokFPe_in').val('1');
							}else{
								$("#uniform-id_dokFPe span").removeClass("checked");
								$('#id_dokFPe_in').val('0');
							}
							if(data.dok_kuitansi == '1'){
								$("#uniform-id_dokKuitansi span").addClass("checked");
								$('#id_dokKuitansi_in').val('1');
							}else{
								$("#uniform-id_dokKuitansi span").removeClass("checked");
								$('#id_dokKuitansi_in').val('0');
							}
							if(data.dok_fpa == '1'){
								$("#uniform-id_dokPa span").addClass("checked");
								$('#id_dokPa_in').val('1');
							}else{
								$("#uniform-id_dokPa span").removeClass("checked");
								$('#id_dokPa_in').val('0');
							}
							if(data.dok_po == '1'){
								$("#uniform-id_dokPO span").addClass("checked");
								$('#id_dokPO_in').val('1');
							}else{
								$("#uniform-id_dokPO span").removeClass("checked");
								$('#id_dokPO_in').val('0');
							}
							if(data.dok_suratjalan == '1'){
								$("#uniform-id_dokSuratJalan span").addClass("checked");
								$('#id_dokSuratJalan_in').val('1');
							}else{
								$("#uniform-id_dokSuratJalan span").removeClass("checked");
								$('#id_dokSuratJalan_in').val('0');
							}
							if(data.dok_lappenerimaanbrg == '1'){
								$("#uniform-id_dokPenBrg span").addClass("checked");
								$('#id_dokPenBrg_in').val('1');
							}else{
								$("#uniform-id_dokPenBrg span").removeClass("checked");
								$('#id_dokPenBrg_in').val('0');
							}
							if(data.dok_bast == '1'){
								$("#uniform-id_dokBAST span").addClass("checked");
								$('#id_dokBAST_in').val('1');
							}else{
								$("#uniform-id_dokBAST span").removeClass("checked");
								$('#id_dokBAST_in').val('0');
							}
							if(data.dok_bap == '1'){
								$("#uniform-id_dokBAP span").addClass("checked");
								$('#id_dokBAP_in').val('1');
							}else{
								$("#uniform-id_dokBAP span").removeClass("checked");
								$('#id_dokBAP_in').val('0');
							}
							if(data.dok_lpjum == '1'){
								$("#uniform-id_dokLPJUM span").addClass("checked");
								$('#id_dokLPJUM_in').val('1');
							}else{
								$("#uniform-id_dokCOP span").removeClass("checked");
								$('#id_dokLPJUM_in').val('0');
							}
							if(data.dok_ssp == '1'){
								$("#uniform-id_dokSSP span").addClass("checked");
								$('#id_dokSSP_in').val('1');
							}else{
								$("#uniform-id_dokSSP span").removeClass("checked");
								$('#id_dokSSP_in').val('0');
							}
							if(data.dok_sspk == '1'){
								$("#uniform-id_dokSSPK span").addClass("checked");
								$('#id_dokSSPK_in').val('1');
							}else{
								$("#uniform-id_dokSSPK span").removeClass("checked");
								$('#id_dokSSPK_in').val('0');
							}                            
                            //Untuk divisi keuangan
                            if (idUserGroup == '5') {
                                if (data.app_keuangan_id == '') {
                                    var idSessNamaKyw = $('#idSessNamaKyw').text();
                                    $('#id_appKeuanganId').val(idSessNamaKyw.trim());
                                } else {
                                    $('#id_appKeuanganId').val(data.app_keuangan_id);
                                }

                                $('#id_appKeuanganStatus').val(data.app_keuangan_status);

                                if (data.app_keuangan_tgl == '') {
                                    var idSessTgltrans = $('#id_sessTgltrans').text();
                                    $('#id_appKeuanganTgl').val(idSessTgltrans.trim());
                                } else {
                                    $('#id_appKeuanganTgl').val(data.app_keuangan_tgl);
                                }
                                $('#id_appKeuanganKet').val(data.app_keuangan_ket);

                                $('#id_appHDId').val(data.app_hd_id);
                                $('#id_appHDStatus').val(data.app_hd_status);
                                $('#id_appHDTgl').val(data.app_hd_tgl);
                                $('#id_appHDKet').val(data.app_hd_ket);

                                $('#id_appGMId').val(data.app_gm_id);
                                $('#id_appGMStatus').val(data.app_gm_status);
                                $('#id_appGMTgl').val(data.app_gm_tgl);
                                $('#id_appGMKet').val(data.app_gm_ket);
                            } else if (idUserGroup == '3') {
                                if (data.app_hd_id == '') {
                                    var idSessNamaKyw = $('#idSessNamaKyw').text();
                                    $('#id_appHDId').val(idSessNamaKyw.trim());
                                } else {
                                    $('#id_appHDId').val(data.app_hd_id);
                                }
                                $('#id_appHDStatus').val(data.app_hd_status);
                                if (data.app_hd_tgl == '') {
                                    var idSessTgltrans = $('#id_sessTgltrans').text();
                                    $('#id_appHDTgl').val(idSessTgltrans.trim());
                                } else {
                                    $('#id_appHDTgl').val(data.app_hd_tgl);
                                }
                                $('#id_appHDKet').val(data.app_hd_ket);

                                $('#id_appKeuanganId').val(data.app_keuangan_id);
                                $('#id_appKeuanganStatus').val(data.app_keuangan_status);
                                $('#id_appKeuanganTgl').val(data.app_keuangan_tgl);
                                $('#id_appKeuanganKet').val(data.app_keuangan_ket);

                                $('#id_appGMId').val(data.app_gm_id);
                                $('#id_appGMStatus').val(data.app_gm_status);
                                $('#id_appGMTgl').val(data.app_gm_tgl);
                                $('#id_appGMKet').val(data.app_gm_ket);
                            } else if (idUserGroup == '4') {
                                if (data.app_gm_id == '') {
                                    var idSessNamaKyw = $('#idSessNamaKyw').text();
                                    $('#id_appGMId').val(idSessNamaKyw.trim());
                                } else {
                                    $('#id_appGMId').val(data.app_gm_id);
                                }
                                $('#id_appGMStatus').val(data.app_gm_status);
                                //$('#id_appGMTgl').val(data.app_gm_tgl);
                                if (data.app_gm_tgl == '') {
                                    var idSessTgltrans = $('#id_sessTgltrans').text();
                                    $('#id_appGMTgl').val(idSessTgltrans.trim());
                                } else {
                                    $('#id_appGMTgl').val(data.app_gm_tgl);
                                }
                                $('#id_appGMKet').val(data.app_gm_ket);

                                $('#id_appKeuanganId').val(data.app_keuangan_id);
                                $('#id_appKeuanganStatus').val(data.app_keuangan_status);
                                $('#id_appKeuanganTgl').val(data.app_keuangan_tgl);
                                $('#id_appKeuanganKet').val(data.app_keuangan_ket);

                                $('#id_appHDId').val(data.app_hd_id);
                                $('#id_appHDStatus').val(data.app_hd_status);
                                $('#id_appHDTgl').val(data.app_hd_tgl);
                                $('#id_appHDKet').val(data.app_hd_ket);
                            }else if(idUserGroup == '1'){
                                if (data.app_gm_id == '') {
                                    var idSessNamaKyw = $('#idSessNamaKyw').text();
                                    $('#id_appGMId').val(idSessNamaKyw.trim());
                                } else {
                                    $('#id_appGMId').val(data.app_gm_id);
                                }
                                $('#id_appGMStatus').val(data.app_gm_status);
                                //$('#id_appGMTgl').val(data.app_gm_tgl);
                                if (data.app_gm_tgl == '') {
                                    var idSessTgltrans = $('#id_sessTgltrans').text();
                                    $('#id_appGMTgl').val(idSessTgltrans.trim());
                                } else {
                                    $('#id_appGMTgl').val(data.app_gm_tgl);
                                }
                                $('#id_appGMKet').val(data.app_gm_ket);

                                if (data.app_keuangan_id == '') {
                                    var idSessNamaKyw = $('#idSessNamaKyw').text();
                                    $('#id_appKeuanganId').val(idSessNamaKyw.trim());
                                } else {
                                    $('#id_appKeuanganId').val(data.app_keuangan_id);
                                }

                                $('#id_appKeuanganStatus').val(data.app_keuangan_status);

                                if (data.app_keuangan_tgl == '') {
                                    var idSessTgltrans = $('#id_sessTgltrans').text();
                                    $('#id_appKeuanganTgl').val(idSessTgltrans.trim());
                                } else {
                                    $('#id_appKeuanganTgl').val(data.app_keuangan_tgl);
                                }
                                $('#id_appKeuanganKet').val(data.app_keuangan_ket);

                                if (data.app_hd_id == '') {
                                    var idSessNamaKyw = $('#idSessNamaKyw').text();
                                    $('#id_appHDId').val(idSessNamaKyw.trim());
                                } else {
                                    $('#id_appHDId').val(data.app_hd_id);
                                }
                                $('#id_appHDStatus').val(data.app_hd_status);
                                if (data.app_hd_tgl == '') {
                                    var idSessTgltrans = $('#id_sessTgltrans').text();
                                    $('#id_appHDTgl').val(idSessTgltrans.trim());
                                } else {
                                    $('#id_appHDTgl').val(data.app_hd_tgl);
                                }
                                $('#id_appHDKet').val(data.app_hd_ket);
                            }



                            /*
                             $('#').val(data.); */
                        } else {
                            alert('Data tidak ditemukan!');
                            $('#id_btnBatal').trigger('click');
                        }
                    }, "json");
            }//if kd<>''
        }
    </script>


    <!-- END JAVASCRIPTS -->