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
                    <span class="caption-subject font-red-sunglo bold uppercase">Data Master Settlement Of Advance</span>
                </div>
                <div class="actions">
					<a href="javascript:;" class="btn btn-default btn-sm" onclick="cetak();">
					<i class="fa fa-print"></i> Cetak </a>
					<a href="javascript:;" class="btn btn-default btn-sm" onclick="cetakcpa();">
                        <i class="fa fa-print"></i> Cetak CPA</a>
					<a class="btn btn-icon-only btn-default btn-sm fullscreen" href="javascript:;" data-original-title="" title="">
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
                                <input id="id_kywId" required="required" class="form-control hidden"
                                                   type="text" name="kywId" readonly/>
                                    <label>Nama karyawan (Requester) </label>
                                    <div class="input-group">
                                        <div class="input-icon">
                                            <input id="id_namaKyw" required="required" class="form-control input-sm"
                                                   type="text" name="namaKyw" readonly/>
                                        </div>
                                    <span class="input-group-btn">
                                        <a href="#" class="btn btn-success btn-sm" data-target="#idDivTabelKyw"
                                           id="id_btnModalKyw1" data-toggle="modal">
                                            <i class="fa fa-search fa-fw"/></i>    
                                        </a>
                                    </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Departemen/Bagian</label>
									<input id="id_deptKyw" required="required" class="form-control input-sm"
                                                   type="text" name="deptKyw" readonly/>
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
                                                   type="text" name="paid"/>
                                </div>
                                <div class="form-group">
                                    <label>Lebih(Kurang) Pembayaran</label>
                                            <input id="id_uangPaidou" required="required" class="form-control input-sm"
                                                   type="text" name="uangPaidou" readonly/>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Jatuh Tempo</label>
                                            <input id="id_tglJT" required="required" class="form-control date-picker input-sm" 
                                                   type="text" name="tglJT" placeholder="dd-mm-yyyy"/>
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
                                    <textarea rows="2" cols="" name="keterangan"  id="id_keterangan" class="form-control input-sm">
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
                    <div class="row">
						<div class="col-md-12">
						<!-- BEGIN Portlet PORTLET child 1-->
							<div class="portlet gren">
								<div class="portlet-title">
									<div class="caption">
										Approval Dept. Keuangan
									</div>
									<div class="tools">
										<a href="javascript:;" class="collapse"></a>
									</div>
								</div>
								<div class="portlet-body">
									<div class="scroller">
										<div class="row">
					                        <div class="form-body">
					                        	<div class="col-md-3">
					                        		<div class="form-group">
					                                    <label>Approval</label>
					                                            <input id="id_appKeuanganId" class="form-control input-sm"
					                                                   type="text" name="appKeuanganId" readonly/>
					                                </div>
					                        	</div>
					                        	<div class="col-md-2">
					                        		<div class="form-group">
					                                    <label>Status</label>
					                                            <input id="id_appKeuanganStatus" class="form-control input-sm"
					                                                   type="text" name="appKeuanganStatus" readonly/>
					                                </div>
					                        	</div>
					                        	<div class="col-md-2">
					                        		<div class="form-group">
					                                    <label>Tanggal</label>
					                                            <input id="id_appKeuanganTgl" class="form-control input-sm"
					                                                   type="text" name="appKeuanganTgl" readonly/>
					                                </div>
					                        	</div>
					                        	<div class="col-md-5">
					                        		<div class="form-group">
					                                    <label>Keterangan</label>
					                                    <textarea rows="2" cols="" name="appKeuanganKet" id="id_appKeuanganKet" class="form-control input-sm" readonly>
                                    					</textarea>        
					                                </div>
					                        	</div>
					                        </div>
					                    </div> 
									</div>
								</div>
							</div>
							<!-- END Portlet PORTLET child 1-->
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
						<!-- BEGIN Portlet PORTLET child 2-->
							<div class="portlet gren">
								<div class="portlet-title">
									<div class="caption">
										Approval Head Dept.
									</div>
									<div class="tools">
										<a href="javascript:;" class="collapse"></a>
									</div>
								</div>
								<div class="portlet-body">
									<div class="scroller">
										<div class="row">
					                        <div class="form-body">
					                        	<div class="col-md-3">
					                        		<div class="form-group">
					                                    <label>Approval</label>
					                                            <input id="id_appHDId" class="form-control input-sm"
					                                                   type="text" name="appHDId" readonly/>
					                                </div>
					                        	</div>
					                        	<div class="col-md-2">
					                        		<div class="form-group">
					                                    <label>Status</label>
					                                            <input id="id_appHDStatus" class="form-control input-sm"
					                                                   type="text" name="appHDStatus" readonly/>
					                                </div>
					                        	</div>
					                        	<div class="col-md-2">
					                        		<div class="form-group">
					                                    <label>Tanggal</label>
					                                            <input id="id_appHDTgl" class="form-control input-sm"
					                                                   type="text" name="appHDTgl" readonly/>
					                                </div>
					                        	</div>
					                        	<div class="col-md-5">
					                        		<div class="form-group">
					                                    <label>Keterangan</label>
					                                    <textarea rows="2" cols="" name="appHDKet" id="id_appHDKet" class="form-control input-sm" readonly>
                                    					</textarea>        
					                                </div>
					                        	</div>
					                        </div>
					                    </div> 
									</div>
								</div>
							</div>
							<!-- END Portlet PORTLET child 2-->
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
						<!-- BEGIN Portlet PORTLET child 2-->
							<div class="portlet gren">
								<div class="portlet-title">
									<div class="caption">
										Approval General Manager
									</div>
									<div class="tools">
										<a href="javascript:;" class="collapse"></a>
									</div>
								</div>
								<div class="portlet-body">
									<div class="scroller">
										<div class="row">
					                        <div class="form-body">
					                        	<div class="col-md-3">
					                        		<div class="form-group">
					                                    <label>Approval</label>
					                                            <input id="id_appGMId" class="form-control input-sm"
					                                                   type="text" name="appGMId" readonly/>
					                                </div>
					                        	</div>
					                        	<div class="col-md-2">
					                        		<div class="form-group">
					                                    <label>Status</label>
					                                            <input id="id_appGMStatus" class="form-control input-sm"
					                                                   type="text" name="appGMStatus" readonly/>
					                                </div>
					                        	</div>
					                        	<div class="col-md-2">
					                        		<div class="form-group">
					                                    <label>Tanggal</label>
					                                            <input id="id_appGMTgl" class="form-control input-sm"
					                                                   type="text" name="appGMTgl" readonly/>
					                                </div>
					                        	</div>
					                        	<div class="col-md-5">
					                        		<div class="form-group">
					                                    <label>Keterangan</label>
					                                    <textarea rows="2" cols="" name="appGMKet" id="id_appGMKet" class="form-control input-sm" readonly>
                                    					</textarea>        
					                                </div>
					                        	</div>
					                        </div>
					                    </div> 
									</div>
								</div>
							</div>
							<!-- END Portlet PORTLET child 2-->
						</div>
					</div>	                   	
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-actions">
                                <button name="btnSimpan" class="btn blue" id="id_btnSimpan">
                                    Simpan
                                </button>
                                <button name="btnUbah" onclick="" class="btn yellow" id="id_btnUbah">
                                    Ubah
                                </button>
								<button name="btnSign" class="btn purple" id="id_btnSign">
                                    Sign
                                </button>
                                <button name="btnHapus" class="btn red" id="id_btnHapus">
                                    Hapus
                                </button>
                                <button id="id_btnBatal" type="reset" class="btn default">Batal</button>
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
                                    <table class="table table-striped table-bordered table-hover text_kanan" id="idTabelKyw">
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
                                    <table class="table table-striped table-bordered table-hover text_kanan" id="idTabelSettleAdv">
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
				<button type="button" class="btn default" data-dismiss="modal" id="btnCloseModalDataSettleAdv">Close</button>
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
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="<?php echo base_url('metronic/global/plugins/respond.min.js'); ?>"></script>
<script src="<?php echo base_url('metronic/global/plugins/excanvas.min.js'); ?>"></script>
<![endif]-->
<?php echo  $this->session->userdata('jqueryJS'); ?>
<?php echo  $this->session->userdata('jquery-migrateJS'); ?>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<?php echo  $this->session->userdata('jquery-uiJS'); ?>
<?php echo  $this->session->userdata('bootstrapJS'); ?>
<?php echo  $this->session->userdata('bootstrap-hover-dropdownJS'); ?>
<?php echo  $this->session->userdata('jquery-slimscrollJS'); ?>
<?php echo  $this->session->userdata('jquery-blockuiJS'); ?>
<?php echo  $this->session->userdata('jquery-cokieJS'); ?>
<?php echo  $this->session->userdata('jquery-uniformJS'); ?>
<?php echo  $this->session->userdata('bootstrap-switchJS'); ?>
<!-- BEGIN PAGE LEVEL PLUGINS -->
<?php echo  $this->session->userdata('select2JS'); ?>
<?php echo  $this->session->userdata('jquery-dataTablesJS'); ?>
<?php echo  $this->session->userdata('dataTables-bootstrapJS'); ?>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- END CORE PLUGINS -->
<?php echo  $this->session->userdata('metronicJS'); ?>
<?php echo  $this->session->userdata('layoutJS'); ?>
<?php echo  $this->session->userdata('demoJS'); ?>
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
                    { "data": "idKyw" },
                    { "data": "namaKyw" },
                    { "data": "deptKyw" }
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
                    [5, 10,15, 20, -1],
                    [5, 10,15, 20, "All"] // change per page values here
                ],
                // set the initial value
                "pageLength": 5,
                "pagingType": "bootstrap_full_number",
                "language": {
                    "search": "Cari: ",
                    "lengthMenu": "  _MENU_ records",
                    "paginate": {
                        "previous":"Prev",
                        "next": "Next",
                        "last": "Last",
                        "first": "First"
                    }
                },
                "aaSorting": [[0,'asc']/*, [5,'desc']*/],
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
                if(tmpBtnKyw=='1'){
                    $('#id_kywId').val(idKyw);
                    $('#id_namaKyw').val(namaKyw);
                    $('#id_deptKyw').val(deptKyw);
                }else{
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
                    { "data": "idSettle" },
                    { "data": "namaReq" },
                    { "data": "jmlUang" }
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
                    [5, 10,15, 20, -1],
                    [5, 10,15, 20, "All"] // change per page values here
                ],
                // set the initial value
                "pageLength": 5,
                "pagingType": "bootstrap_full_number",
                "language": {
                    "search": "Cari: ",
                    "lengthMenu": "  _MENU_ records",
                    "paginate": {
                        "previous":"Prev",
                        "next": "Next",
                        "last": "Last",
                        "first": "First"
                    }
                },
                "aaSorting": [[0,'asc']/*, [5,'desc']*/],
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
                $('#id_btnSimpan').attr('disabled',true);
                $('#id_btnUbah').attr("disabled",false);
                $('#id_btnHapus').attr("disabled",false);

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
            }
        };
    }();
    //Ready Doc
    btnStart();
	$("#id_namaKyw").focus();
	$('#id_btnSign').attr("disabled",true);
     $("#id_btnModalKyw1").click(function () {
        $('#idTmpBtnKyw').val('1');
    });
    $("#id_btnModalKyw2").click(function () {
        $('#idTmpBtnKyw').val('2');
	});		
	$( "#id_btnSimpan" ).click(function() {
		$('#idTmpAksiBtn').val('1');
	});
	    
	$('#id_btnUbah').click(function(){
		$('#idTmpAksiBtn').val('2');
	});
	$('#id_btnHapus').click(function(){
		$('#idTmpAksiBtn').val('3');
	});
	$("#id_btnSign").click(function () {
        $('#idTmpAksiBtn').val('4');
    });
	$('#id_btnBatal').click(function(){
		btnStart();
	});
	$( "#id_idSettle" ).focusout(function() {
		var idSettle	= $(this).val();
		getDescSettle(idSettle);
	});
	$('#id_uang').keyup(function(){
		var val = $(this).val();
		if(isNaN(val)){
			val = val.replace(/[^0-9\.]/g,'');
			if(val.split('.').length>2) 
				val =val.replace(/\.+$/,"");
		  	}
		  	$(this).val(val); 
		  	//var words = toWords(val);
		  	//$('#terbilang').text(words);
	});
	$('#id_uang').focusout(function(){
		var angka=$('#id_uang').val();
		if ($(this).val() == '') { 
			$(this).val('0.00');
		}else{
			$('#id_uang').val(number_format(angka,2));
		}
	});
	$("#id_uang").focus(function(){
		if( $(this).val()=='0' || $(this).val()=='0.00' ){
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
		
	    
	function getDescSettle(idSettle){
		ajaxModal();
		if (idSettle != '') {
			$.post("<?php echo site_url('/master_settle_adv/getDescSettle'); ?>",
			{
				'idSettle': idSettle
			},function (data) {
				if (data.baris == 1){
					$('#id_kywId').val(data.id_kyw);
					$('#id_namaKyw').val(data.nama_kyw);
					$('#id_deptKyw').val(data.nama_dept);
					$('#id_idAdvance').val(data.idAdvance);
					$('#id_advAmount').val(number_format(data.advAmount,2));
					$('#id_paid').val(number_format(data.paid,2));
					$('#id_uangPaidou').val(number_format(data.paidou,2));
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
					
					if(data.app_user_id == '0'){
                            $('#id_btnSign').attr("disabled",false);
                        }else{
                            $('#id_btnSign').attr("disabled",true);
                            $('#id_btnUbah').attr("disabled",true);
                        }
                        if(data.inout_budget == '0'){
                            $("#uniform-id_wBudget span").addClass("checked");
                            $('#id_wBudget_in').val('1');
                        }else{
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
				}else{
					alert('Data tidak ditemukan!');
					$('#id_btnBatal').trigger('click');
				}
			}, "json");
		}//if kd<>''
	}
	function ajaxSignSettle(){
        ajaxModal();
        var idSettle	= $('#id_idSettle').val();
        idSettle		= idSettle.trim();
        var flag		= '1';

        $.ajax({
            type:"POST",
            dataType: "json",
            url:"<?php echo base_url(); ?>master_settle_adv/sign",
            data:{idSettle : idSettle, flag : flag},
            success:function (data) {
                UIToastr.init(data.tipePesan,data.pesan);
                $('#id_btnSign').attr("disabled",true);
            }

        });
        event.preventDefault();
    }
	function ajaxSubmitSettle(){
		ajaxModal();
		$.ajax({
			type:"POST",
			dataType: "json",
			url:"<?php echo base_url(); ?>master_settle_adv/simpan",
			data:dataString,
	
			success:function (data) {
				$('#id_ReloadSettle').trigger('click');
				$('#id_btnBatal').trigger('click');
				$( "#event_result" ).append( data.notif );
				$('input:checkbox').removeAttr('checked');
			}
	
		});
		event.preventDefault();
	}
	function ajaxUbahSettle(){
		ajaxModal();
		$.ajax({
			type:"POST",
			dataType: "json",
			url:"<?php echo base_url(); ?>master_settle_adv/ubah",
			data:dataString,
	
			success:function (data) {
				$('#id_ReloadSettle').trigger('click');
				$('#id_btnBatal').trigger('click');
				$( "#event_result" ).append( data.notif );				
			}
	
		});
		event.preventDefault();
	}
	function ajaxHapusSettle(){
		ajaxModal();
		var idSettle	= $('#id_idSettle').val();
		idSettle		= idSettle.trim();
		$.ajax({
			type:"POST",
			dataType: "json",
			url:"<?php echo base_url(); ?>master_settle_adv/hapus",
			data:{idSettle : idSettle},
			success:function (data) {
				$('#id_ReloadReqpay').trigger('click');
				$('#id_btnBatal').trigger('click');
				$( "#event_result" ).append( data.notif );				
			}
	
		});
		event.preventDefault();
	}
    $('#id_formSettle').submit(function (event) {
		dataString 	= $("#id_formSettle").serialize();
        var aksiBtn = $('#idTmpAksiBtn').val();
        if(aksiBtn == '1'){
        	var r = confirm('Anda yakin menyimpan data ini?');
			 if (r== true){
				ajaxSubmitSettle();
			 }else{//if(r)
				return false;
			}
        }else if(aksiBtn == '2'){ 
        	var r = confirm('Anda yakin merubah data ini?');
			 if (r== true){
				 ajaxUbahSettle();
			 }else{//if(r)
				return false;
			}
        }else if(aksiBtn == '3'){
        	var r = confirm('Anda yakin menghapus data ini?');
			 if (r== true){
				 ajaxHapusSettle();
			 }else{//if(r)
				return false;
			}
        }else if(aksiBtn == '4'){
            var r = confirm('Anda yakin sign data ini?');
            if (r== true){
                ajaxSignSettle();
            }else{//if(r)
                return false;
            }
        }
    }); 
    function cetak(){
		var idSettle = $('#id_idSettle').val();
		if(idSettle == ''){
			alert('Silahkan pilih ID Advance');
		}else{
			window.open("<?php echo base_url('master_settle_adv/cetak/'); ?>/"+idSettle, '_blank');	
		}
	}
    $(".nomor2").focusout(function(){
	    if ($(this).val() == '') {
	        $(this).val('0.00');
	    }else{
	        var angka = $(this).val();
			var str = $('#id_advAmount').val();
			var bayarAwal = str.replace('.00', '');
			var bayar = bayarAwal.replace(',','');
			console.log(bayar);
			$(this).val(number_format(angka,2));
			var hasil = bayar - angka;
			if(hasil <= 0){
				var h = hasil.toString();
				var hsl = h.replace('-','')
				$('#id_uangPaidou').val('('+number_format(hsl,2)+')');	
			}else{
				$('#id_uangPaidou').val(number_format(hasil,2));	
			}
	    }
	});
    $(".nomor2").keyup(function(){
        var val = $(this).val();
        if(isNaN(val)){
            val = val.replace(/[^0-9\.]/g,'');
            if(val.split('.').length>2)
                val =val.replace(/\.+$/,"");
            }
        $(this).val(val);
	    
	});
</script>


<!-- END JAVASCRIPTS -->