<!-- BEGIN PAGE BREADCRUMB -->
<style type="text/css">
    table#idTabelAdv td:nth-child(3) {
        text-align: right;
    }
</style>
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
                    <span class="caption-subject font-red-sunglo bold uppercase">Akuntansi</span>
                </div>
                <div class="actions">
                    <a href="javascript:;" class="btn btn-default btn-sm" onclick="cetak();">
                        <i class="fa fa-print"></i> Cetak </a>
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
                      action="<?php echo base_url('master_advance/home'); ?>" id="id_formAdvance">
                    <div class="row">
                        <div class="form-body">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input id="id_kywId" required="required" class="form-control hidden"
                                           type="text" name="kywId" readonly/>
                                    <label>Id Jurnal </label>
                                    <input id="id_idJurnal" required="required" class="form-control input-sm"
                                           type="text" name="idJurnal" readonly/>
                                </div>
                                <div class="form-group">
                                    <label>Kode Jurnal</label>
                                    <select id="id_kodeJurnal" class="form-control input-sm select2me" name="kodeJurnal">
                                        <option value="1">Advance</option>
                                        <option value="2">Request for payment</option>
                                        <option value="3">Reimbursement</option>
                                        <option value="4">Settlement</option>
                                        <option value="5">Jurnal Umum</option>
                                    </select>
                                </div>
                                <div class="form-group request_in" id="div_idAdvance">
                                    <label>Id Request </label>
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
                                <div class="form-group request_in"  id="div_idReqpay">
                                    <label>Id Request for Payment </label>
                                    <div class="input-group">

                                        <input id="id_idReqpay" required="required" class="form-control  input-sm"
                                               type="text" name="idReqpay" readonly/>

                                    <span class="input-group-btn">
                                        <a href="#" class="btn btn-success btn-sm" data-target="#idDivTabelReqpay"
                                           id="id_btnModal" data-toggle="modal">
                                            <i class="fa fa-search fa-fw"/></i>

                                        </a>
                                    </span>
                                    </div>
                                </div>
                            </div>
                            <!--end <div class="col-md-6"> 1 -->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input id="id_kywId" required="required" class="form-control hidden"
                                           type="text" name="kywId" readonly/>
                                    <label>Nama karyawan (Requester) </label>
                                    <input id="id_namaKyw" required="required" class="form-control input-sm"
                                           type="text" name="namaKyw" readonly/>
                                </div>
                                <div class="form-group">
                                    <label>Proyek</label>
                                    <input id="id_proyek" required="required" class="form-control  input-sm"
                                           type="text" name="proyek" readonly/>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nomor Invoice</label>
                                            <input id="id_noInvoice" class="form-control  input-sm"
                                                   type="text" name="noInvoice" readonly/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nomor PO</label>
                                            <input id="id_noPO"  class="form-control  input-sm"
                                                   type="text" name="noPO" readonly/>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Kurs</label>
                                            <input id="id_kurs" class="form-control  input-sm"
                                                   type="text" name="kurs" readonly/>

                                        </div>
                                        <div class="col-md-6">
                                            <label>Nilai Kurs</label>
                                            <input id="id_nilaiKurs"
                                                   class="form-control input-sm nomor"
                                                   type="text" name="nilaiKurs" readonly/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Jumlah uang</label>
                                    <input id="id_uang" required="required" class="form-control input-sm nomor"
                                           type="text" name="uang" readonly/>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Tgl Pengajuan</label>
                                            <input id="id_tglReq" required="required"
                                                   class="form-control input-sm "
                                                   type="text" name="tglReq" readonly/>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Tgl JT</label>
                                            <input id="id_tglJT" required="required" data-date-format="dd-mm-yyyy"
                                                   class="form-control  date-picker input-sm"
                                                   type="text" name="tglJT" placeholder="dd-mm-yyyy" readonly/>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Dibayarkan ke</label>
                                    <input id="id_namaPayTo" required="required" class="form-control input-sm"
                                           type="text" name="namapayTo" readonly/>
                                </div>
                            </div>
                        </div>
                        <!-- HIDDEN INPUT -->
                        <input type="text" id="idTmpAksiBtn" class="hidden">
                        <input type="text" id="idTmpBtnKyw" class="hidden">
                        <!-- END HIDDEN INPUT -->
                    </div>
                    <hr>
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
                                            Kode Perk
                                        </th>
                                        <th width="20%">
                                            Kode CF
                                        </th>
                                        <th width="40%">
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
                    <!--END ROW 1 -->

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

                                <button id="id_btnBatal" type="button" class="btn default">Batal</button>

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
<!--  END  MODAL Data Advance -->
<!--  MODAL Data Advance -->
<div class="modal fade draggable-modal" id="idDivTabelReqpay" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Data Request For Payment</h4>
            </div>
            <div class="modal-body">
                <div class="scroller" style="height:400px; ">
                    <div class="row">
                        <div class="col-md-12">
                            <button id="id_ReloadReqpay" style="display: none;"></button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-body">
                                <table class="table table-striped table-bordered table-hover text_kanan" id="idTabelReqpay">
                                    <thead>
                                    <tr>
                                        <th>
                                            Id Reqpay
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
                <button type="button" class="btn default" data-dismiss="modal" id="btnCloseModalDataReqpay">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--  END  MODAL Data Reqpay -->
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
<?php //echo  $this->session->userdata('compPickersJS'); ?>
<script src="<?php echo base_url('metronic/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js'); ?>"
        type="text/javascript"></script>
<script src="<?php echo base_url('metronic/admin/pages/scripts/components-pickers.js'); ?>"
        type="text/javascript"></script>

<script src="<?php echo base_url('metronic/additional/start.js'); ?>" type="text/javascript"></script>
<script>
    jQuery(document).ready(function () {
        Metronic.init(); // init metronic core components
        Layout.init(); // init current layout
        Demo.init(); // init demo features
        ComponentsPickers.init();
        //UITree.init();
        TableManaged.init();
        //UIToastr.init();
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
                $('#id_btnBatal').trigger('click');
                var idAdv = $(this).find("td").eq(0).html();
                $('#id_idAdvance').val(idAdv);

                $('#btnCloseModalDataAdv').trigger('click');
                $('#id_idAdvance').val(idAdv);
                $('#id_idAdvance').focus();
                $('#id_btnSimpan').attr('disabled', true);
                $('#id_btnUbah').attr("disabled", false);
                $('#id_btnHapus').attr("disabled", false);
                $('#id_userId').focus();
                getDescCpa(idAdv);

            });

            tableWrapper.find('.dataTables_length select').addClass("form-control input-xsmall input-inline"); // modify table per page dropdown
        }
        var initTable2 = function () {
            var table = $('#idTabelReqpay');
            // begin first table
            table.dataTable({
                "ajax": "<?php  echo base_url("/master_reqpay/getReqpayAll"); ?>",
                "columns": [
                    { "data": "idReqpay" },
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
                var idReqpay = $(this).find("td").eq(0).html();
                $('#id_idReqpay').val(idReqpay);
                $('#id_idReqpay').focus();
                $('#btnCloseModalDataReqpay').trigger('click');
                $('#id_btnSimpan').attr('disabled',true);
                $('#id_btnUbah').attr("disabled",false);
                $('#id_btnHapus').attr("disabled",false);

            });

            tableWrapper.find('.dataTables_length select').addClass("form-control input-xsmall input-inline"); // modify table per page dropdown
        }
        var initTable3 = function () {
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
                if(typePerk == 'D'){
                    var kodePerk = $(this).find("td").eq(0).html();
                    $('#id_kodePerk').val(kodePerk);
                    var kodeAlt = $(this).find("td").eq(1).html();
                    $('#id_kodeAlt').text(kodeAlt);
                    var namaPerk = $(this).find("td").eq(2).html();
                    $('#id_namaPerk').text(namaPerk);

                    $("#btnCloseModalPerk").trigger("click");
                }else{
                    alert("Tidak diijinkan pilih kode induk.");
                }


            });

            tableWrapper.find('.dataTables_length select').addClass("form-control input-xsmall input-inline"); // modify table per page dropdown
        }
        var initTable4 = function () {
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
                if(typeCF == 'D'){
                    var kodeCflow = $(this).find("td").eq(0).html();
                    $('#id_kodeCflow').val(kodeCflow);
                    var kodeAlt = $(this).find("td").eq(1).html();
                    $('#id_kodeAltCflow').text(kodeAlt);
                    var namaCflow = $(this).find("td").eq(2).html();
                    $('#id_namaCflow').text(namaCflow);

                    $("#btnCloseModalCflow").trigger("click");
                }else{
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
            }
        };
    }();

    //Ready Doc
    btnStart();
    readyToStart();
    tglTransStart();
    btnCpaStart();
    $('.request_in').hide();
    $('#div_idAdvance').show();
    $("#id_kodeJurnal").change(function () {
        var kodeJurnal = $(this).val();
        $('.request_in').slideUp();
        if(kodeJurnal == '1'){
            $('#div_idAdvance').slideDown();
        }else if(kodeJurnal == '2'){
            $('#div_idReqpay').slideDown();
        }
    });
    $("#id_kodeJurnal").focus();

    $("#id_btnSimpan").click(function () {
        $('#idTmpAksiBtn').val('1');
    });

    $('#id_btnUbah').click(function () {
        $('#idTmpAksiBtn').val('2');
    });
    $('#id_btnHapus').click(function () {
        $('#idTmpAksiBtn').val('3');
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
    $("#id_idAdvance").focusout(function () {
        var idAdv = $(this).val();
        getDescAdv(idAdv);
    });
    $( "#id_idReqpay" ).focusout(function() {
        var idReqpay	= $(this).val();
        getDescReqpay(idReqpay);
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


    function btnCpaStart() {
        $('#id_btnAddCpa').attr("disabled", false);
        $('#id_btnUpdateCpa').attr("disabled", true);
        $('#id_btnRemoveCpa').attr("disabled", true);
    }
    $('#id_btnAddCpa').click(function () {
        var i = $('#idTxtTempLoop').val();
        if ($('#id_kodePerk').val() == '' && $('#id_kodeCflow').text() == '') {
            alert("Akun GL tidak boleh kosong.");
        } else {
            var i = parseInt($('#idTxtTempLoop').val());

            i = i + 1;
            var kodePerk = $('#id_kodePerk').val();
            var kodeCflow = $('#id_kodeCflow').val();
            var ket = $('#id_keteranganCPA').val().trim();
            var jumlah = $('#id_jumlahCPA').val();

            tr = '<tr class="listdata" id="tr' + i + '">';
            tr += '<td><input type="text" class="form-control input-sm" id="id_tempKodePerk' + i + '" name="tempKodePerk' + i + '" readonly="true" value="' + kodePerk + '"></td>';
            tr += '<td><input type="text" class="form-control input-sm" id="id_tempKodeCflow' + i + '" name="tempKodeCflow' + i + '" readonly="true" value="' + kodeCflow + '" ></td>';
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
        }
    });

    $("#id_tabelPerkCflow").on('click', 'tbody tr', function () {
        var kodePerk = $(this).find("td input").eq(0).val();
        var kodeCflow = $(this).find("td input").eq(1).val();
        var ket = $(this).find("td input").eq(2).val();
        var jumlah = $(this).find("td input").eq(3).val();
        $('#id_kodePerk').val(kodePerk);
        $('#id_kodeCflow').val(kodeCflow);
        $('#id_keteranganCPA').val(ket);
        $('#id_jumlahCPA').val(jumlah);

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
        var kodePerk = $('#id_kodePerk').val();
        var kodeCflow = $('#id_kodeCflow').val();
        var ket = $('#id_keteranganCPA').val();
        var jumlah = $('#id_jumlahCPA').val();

        var totalP = parseFloat(CleanNumber($('#idTotalCPA').val()));
        var jumlahOld = parseFloat(CleanNumber($('#idTempJumlahCPA').val()));
        var jumlahNew = parseFloat(CleanNumber(jumlah));
        totalP = totalP - jumlahOld + jumlahNew;

        $('#id_tempKodePerk' + noRow).val(kodePerk);
        $('#id_tempKodeCflow' + noRow).val(kodeCflow);
        $('#id_tempKet' + noRow).val(ket);
        $('#id_tempJumlah' + noRow).val(jumlah);
        $('#idTotalCPA').val(number_format(totalP, 2));
        kosongCPA();
        btnCpaStart();
    });
    $('#id_btnRemoveCpa').click(function () {
        var noRow = $('#idTempUbahCPA').val();
        $('#tr' + noRow).remove();
        var i = $('#idTxtTempLoop').val();
        i = parseInt(i);
        i = i - 1;
        $('#idTxtTempLoop').val(i);

        var totalP = parseFloat(CleanNumber($('#idTotalCPA').val()));
        var jumlahOld = parseFloat(CleanNumber($('#idTempJumlahCPA').val()));
        totalP = totalP - jumlahOld;
        $('#idTotalCPA').val(number_format(totalP, 2));

        kosongCPA();
        btnCpaStart();
    });
    $('#id_btnBatalCpa').click(function () {
        kosongCPA();
        btnCpaStart();
    });
    function cetak() {
        var idAdvance = $('#id_idAdvance').val();
        window.open("<?php echo base_url('master_advance/cetak/'); ?>/" + idAdvance, '_blank');
    }
    function getDescAdv(idAdv) {
        ajaxModal();
        if (idAdv != '') {
            $.post("<?php echo site_url('/master_advance/getDescAdv'); ?>",
                {
                    'idAdv': idAdv
                }, function (data) {
                    if (data.baris == 1) {
                        $('#id_kywId').val(data.id_kyw);
                        $('#id_namaKyw').val(data.nama_kyw);
                        $('#id_deptKyw').val(data.nama_dept);
                        $('#id_uang').val(data.jml_uang);
                        $('#id_proyek').val(data.id_proyek);
                        $('#id_kurs').val(data.id_kurs);
                        $('#id_nilaiKurs').val(data.nilai_kurs);
                        $('#id_tgltrans').val(data.tgl_trans);
                        $('#id_tglJT').val(data.tgl_jt);
                        $('#id_idPayTo').val(data.pay_to);
                        $('#id_namaPayTo').val(data.nama_pay_to);

                        /*
                         $('#').val(data.); */
                    } else {
                        alert('Data tidak ditemukan!');
                        $('#id_btnBatal').trigger('click');
                    }
                }, "json");
        }//if kd<>''
    }
    function getDescReqpay(idReqpay){
        ajaxModal();
        if (idReqpay != '') {
            $.post("<?php echo site_url('/master_reqpay/getDescReqpay'); ?>",
                {
                    'idReqpay': idReqpay
                },function (data) {
                    if (data.baris == 1) {
                        $('#id_kywId').val(data.id_kyw);
                        $('#id_namaKyw').val(data.nama_kyw);
                        $('#id_deptKyw').val(data.nama_dept);
                        $('#id_noInvoice').val(data.no_invoice);
                        $('#id_noPO').val(data.no_po);
                        $('#id_uang').val(data.jml_uang);
                        $('#id_proyek').val(data.id_proyek);
                        $('#id_kurs').val(data.id_kurs);
                        $('#id_nilaiKurs').val(data.nilai_kurs);
                        $('#id_tglJT').val(data.tgl_jt);
                        $('#id_splId').val(data.pay_to);
                        $('#id_namaPayTo').val(data.nama_spl);

                        /*
                         $('#').val(data.); */
                    }else{
                        alert('Data tidak ditemukan!');
                        $('#id_btnBatal').trigger('click');
                    }
                }, "json");
        }//if kd<>''
    }
    function getDescCpa(idAdv) {
        ajaxModal();
        if (idAdv != '') {
            $.post("<?php echo site_url('/master_advance/getDescCpa'); ?>",
                {
                    'idAdv': idAdv
                }, function (data) {
                    if (data.data_cpa.length > 0) {
                        $('#idTxtTempLoop').val(data.data_cpa.length);
                        for (i = 0; i < data.data_cpa.length; i++) {
                            var x = i + 1;
                            //var idCpa           = data.data_cpa[i].id_cpa;
                            var kodePerk = data.data_cpa[i].kode_perk;
                            var kodeCflow = data.data_cpa[i].kode_cflow;
                            var ket = data.data_cpa[i].keterangan;
                            var jumlah = data.data_cpa[i].jumlah;

                            tr = '<tr class="listdata" id="tr' + x + '">';
                            tr += '<td><input type="text" class="form-control input-sm" id="id_tempKodePerk' + x + '" name="tempKodePerk' + x + '" readonly="true" value="' + kodePerk + '"></td>';
                            tr += '<td><input type="text" class="form-control input-sm" id="id_tempKodeCflow' + x + '" name="tempKodeCflow' + x + '" readonly="true" value="' + kodeCflow + '" ></td>';
                            tr += '<td><input type="text" class="form-control input-sm" id="id_tempKet' + x + '" name="tempKet' + x + '" readonly="true" value="' + ket + '"></td>';
                            tr += '<td><input type="text" class="form-control nomor input-sm" id="id_tempJumlah' + x + '" name="tempJumlah' + x + '" readonly="true" value="' + number_format(jumlah, 2) + '"></td>';
                            tr += '</tr>';
                            jumlahP = parseFloat(CleanNumber(jumlah));
                            var totalP = parseFloat(CleanNumber($('#idTotalCPA').val()));
                            var total = totalP + jumlahP;
                            $('#idTotalCPA').val(number_format(total, 2));
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

    function ajaxSubmit() {
        ajaxModal();
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "<?php echo base_url(); ?>akuntans/simpan",
            data: dataString,

            success: function (data) {
                $('#id_Reload').trigger('click');
                $('#id_btnBatal').trigger('click');
                $('#id_body_data').empty();
                readyToStart();
                UIToastr.init(data.tipePesan, data.pesan);
            }

        });
        event.preventDefault();
    }
    function ajaxUbah() {
        ajaxModal();
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "<?php echo base_url(); ?>master_advance/ubah",
            data: dataString,

            success: function (data) {
                $('#id_Reload').trigger('click');
                $('#id_btnBatal').trigger('click');
                UIToastr.init(data.tipePesan, data.pesan);
            }

        });
        event.preventDefault();
    }
    function ajaxHapusAdvance() {
        ajaxModal();
        var idAdvance = $('#id_idAdvance').val();
        idAdvance = idAdvance.trim();
        var tempLoop = $('#idTxtTempLoop').val();
        tempLoop = tempLoop.trim();
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "<?php echo base_url(); ?>master_advance/hapus",
            data: {idAdvance: idAdvance, tempLoop: tempLoop},
            success: function (data) {
                $('#id_Reload').trigger('click');
                $('#id_btnBatal').trigger('click');
                UIToastr.init(data.tipePesan, data.pesan);
            }

        });
        event.preventDefault();
    }

    $('#id_formAdvance').submit(function (event) {
        dataString = $("#id_formAdvance").serialize();
        var aksiBtn = $('#idTmpAksiBtn').val();
        if (aksiBtn == '1') {
            var r = confirm('Anda yakin menyimpan data ini?');
            if (r == true) {
                ajaxSubmitAdvance();
            } else {//if(r)
                return false;
            }
        } else if (aksiBtn == '2') {
            var r = confirm('Anda yakin merubah data ini?');
            if (r == true) {
                ajaxUbahAdvance();
            } else {//if(r)
                return false;
            }
        } else if (aksiBtn == '3') {
            var r = confirm('Anda yakin menghapus data ini?');
            if (r == true) {
                ajaxHapusAdvance();
            } else {//if(r)
                return false;
            }
        }
    });
    function cetak() {
        var idAdvance = $('#id_idAdvance').val();
        if (idAdvance == '') {
            alert('Silahkan pilih ID Advance');
        } else {
            window.open("<?php echo base_url('master_advance/cetak/'); ?>/" + idAdvance, '_blank');
        }
    }

</script>


<!-- END JAVASCRIPTS -->