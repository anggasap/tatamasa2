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
                    <span class="caption-subject font-red-sunglo bold uppercase">Accrue Jadwal</span>
                </div>
                <div class="actions">
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
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#tab_2_1" data-toggle="tab" id="navitab_2_1">
                            List accrue </a>
                    </li>
                    <li>
                        <a href="#tab_2_2" data-toggle="tab" id="navitab_2_1">
                            Jurnal </a>
                    </li>

                </ul>
                <form role="form" method="post" id="id_formAccrue"
                      action="<?php echo base_url('accrue_jadwal/home'); ?>">
                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="tab_2_1">
                            <input type="text" id="idTxtTempLoopAccr" name="txtTempLoopAccr"
                                   class="form-control nomor1 ">

                            <div class="row">
                                <div class="form-body">
                                    <div class="col-md-12">
                                        <table class="table table-striped table-bordered table-hover text_kanan"
                                               id="idTabelJadwalJT">
                                            <thead>
                                            <tr>
                                                <th width='15%' align='left'>Id Penj</th>
                                                <th width='10%' align='left'>Id proyek</th>
                                                <th width='20%' align='left'>Nama Rumah</th>
                                                <th width='25%' align='left'>Nama Customer</th>
                                                <th width='10%' align='center'>Jumlah trans</th>
                                            </tr>
                                            </thead>
                                            <tbody id="id_body_data_accr">

                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <td colspan="4">
                                                    <strong>Total</strong>
                                                </td>
                                                <td width="15%">
                                                    <input type="text" name="totalAccr"
                                                           class="form-control nomor input-sm" id="id_totalAccr"
                                                           readonly>
                                                </td>
                                            </tr>

                                            </tfoot>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab_2_2">
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
                                                          id="id_btnModalPerk" data-toggle="modal">
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
                                                          id="id_btnModalCflow" data-toggle="modal">
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
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Debet</label>
                                                <input id="id_jumlahDb" class="form-control input-sm nomor "
                                                       type="text" name="jumlahDb"/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Kredit</label>
                                                <input id="id_jumlahKr" class="form-control input-sm nomor "
                                                       type="text" name="jumlahKr"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <textarea rows="2" cols="" name="keteranganCPA" id="id_keteranganCPA"
                                                  class="form-control input-sm kosongCPA"></textarea>

                                    </div>
                                    <div class="form-group">
                                        <input type="text" id="idTxtTempLoop" name="txtTempLoop"
                                               class="form-control nomor1 hidden">
                                        <input type="text" id="idTxtTempKodeBayar" name="TxtTempKodeBayar"
                                               class="form-control nomor1 hidden">
                                        <input type="text" id="idTempUbahCPA" name="txtTempUbahCPA"
                                               class="form-control nomor1 hidden">
                                        <input type="text" id="idTempJumlahDb" name="txtTempJumlahDb"
                                               class="form-control nomor hidden">
                                        <input type="text" id="idTempJumlahKr" name="txtTempJumlahKr"
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
                                                <th width="15%">
                                                    Akun GL
                                                </th>
                                                <th width="40%">
                                                    Keterangan
                                                </th>
                                                <th width="15%">
                                                    Cflow
                                                </th>
                                                <th width="15%">
                                                    Debet
                                                </th>
                                                <th width="15%">
                                                    Kredit
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody id="id_body_data">

                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <td colspan="3" width="70%">
                                                    <strong>Total</strong>
                                                </td>
                                                <td width="15%">
                                                    <input type="text" name="totalDb"
                                                           class="form-control nomor input-sm" id="id_totalDb"
                                                           readonly>
                                                </td>
                                                <td width="15%">
                                                    <input type="text" name="totalKr"
                                                           class="form-control nomor input-sm" id="id_totalKr"
                                                           readonly>
                                                </td>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-actions">

                                        <button name="btnSimpan" class="btn blue" id="id_btnSimpan">
                                            <!--<i class="fa fa-check"></i>--> Simpan
                                        </button>
                                        <button id="id_btnBatal" type="button" class="btn default">Batal</button>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- end <div class="portlet green-meadow box"> -->
    </div>
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

<!-- END PAGE CONTENT-->
<!--  MODAL Data Karyawan -->
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
<script>
    jQuery(document).ready(function () {
        Metronic.init(); // init metronic core components
        Layout.init(); // init current layout
        Demo.init(); // init demo features
        TableManaged.init();
        //UITree.init();

        //UIToastr.init();
    });
    //$(function () {
    var judul_menu = $('#id_a_menu_<?php echo $menu_id; ?>').text();
    $('#id_judul_menu').text(judul_menu);
    // MENU OPEN
    $(".menu_root").removeClass('start active open');
    $("#menu_root_<?php echo $menu_parent; ?>").addClass('start active open');
    // END MENU OPEN
    $('.date-picker').datepicker({
        rtl: Metronic.isRTL(),
        orientation: "left",
        autoclose: true
    });
    var TableManaged = function () {

        var initTablePerk = function () {
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
        var initTableCf = function () {
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
                initTablePerk();
                initTableCf();
            }
        };
    }();
    //Ready Doc
    btnStart();
    readyToStart();
    tglTransStart();
    getDescCpa();
    $("#id_btnSimpan").click(function () {
        $('#idTmpAksiBtn').val('1');
    });

    $('#id_btnBatal').click(function () {
        btnStart();
        resetForm();
        tglTransStart();
    });
    function getDescCpa(idMaster) {
        ajaxModal();
        if (idMaster != '') {
            $.post("<?php echo site_url('/accrue_jadwal/getJadwalJT'); ?>",
                {
                    'idReqpay': idMaster
                }, function (data) {
                    if (data.data_cpa.length > 0) {
                        var totalAccr = 0;
                        $('#idTxtTempLoopAccr').val(data.data_cpa.length);
                        for (i = 0; i < data.data_cpa.length; i++) {
                            var x = i + 1;
                            //var idCpa           = data.data_cpa[i].id_cpa;
                            var idPenj = data.data_cpa[i].master_id;
                            var idProyek = data.data_cpa[i].id_proyek;
                            var namaRumah = data.data_cpa[i].nama_rumah;
                            var namaCust = data.data_cpa[i].nama_cust;
                            var jmlTrans = data.data_cpa[i].jml_trans;

                            tr = '<tr class="listdata" id="tr' + x + '">';
                            tr += '<td><input type="text" class="form-control input-sm" id="id_tempIdPenj' + x + '" name="tempIdPenj' + x + '" readonly="true" value="' + idPenj + '"></td>';
                            tr += '<td><input type="text" class="form-control input-sm" id="id_tempIdProyek' + x + '" name="tempIdProyek' + x + '" readonly="true" value="' + idProyek.trim() + '"></td>';
                            tr += '<td><input type="text" class="form-control input-sm" id="id_tempNamaRumah' + x + '" name="tempNamaRumah' + x + '" readonly="true" value="' + namaRumah + '"></td>';
                            tr += '<td><input type="text" class="form-control input-sm" id="id_tempNamaCust' + x + '" name="tempNamaCust' + x + '" readonly="true" value="' + namaCust + '" ></td>';
                            tr += '<td><input type="text" class="form-control nomor input-sm" id="id_tempJmlTrans' + x + '" name="tempJmlTrans' + x + '" readonly="true" value="' + number_format(jmlTrans, 2) + '"></td>';
                            tr += '</tr>';
                            totalAccr = totalAccr + parseFloat(CleanNumber(jmlTrans));
                            $('#id_body_data_accr').append(tr);
                        }
                        $('#id_totalAccr').val(number_format(totalAccr, 2));
                    } else {
                        //alert('Data tidak ditemukan!');
                        //$('#id_btnBatal').trigger('click');
                    }
                }, "json");
        }//if kd<>''
    }
    function btnCpaStart() {
        $('#id_btnAddCpa').attr("disabled", false);
        $('#id_btnUpdateCpa').attr("disabled", true);
        $('#id_btnRemoveCpa').attr("disabled", true);
        $('#id_btnSign').attr("disabled",true);
    }
    $('#id_btnAddCpa').click(function(){
        var i = $('#idTxtTempLoop').val();
        if($('#id_kodePerk').val() =='' && $('#id_kodeCflow').text() == ''){
            alert("Akun GL tidak boleh kosong.");
        }else{
            var i = parseInt($('#idTxtTempLoop').val());

            i=i+1;
            var kodePerk        = $('#id_kodePerk').val();
            var kodeCflow       = $('#id_kodeCflow').val();
            var ket             = $('#id_keteranganCPA').val().trim();
            var db              = $('#id_jumlahDb').val();
            var kr              = $('#id_jumlahKr').val();
            db                  = parseFloat(CleanNumber(db));
            kr                  = parseFloat(CleanNumber(kr));

            tr ='<tr class="listdata" id="tr'+i+'">';
            tr+='<td><input type="text" class="form-control input-sm" id="id_tempKodePerk'+i+'" name="tempKodePerk'+i+'" readonly="true" value="'+kodePerk+'"></td>';
            tr+='<td><input type="text" class="form-control input-sm" id="id_tempKet'+i+'" name="tempKet'+i+'" readonly="true" value="'+ket+'"></td>';
            tr+='<td><input type="text" class="form-control input-sm" id="id_tempKodeCflow'+i+'" name="tempKodeCflow'+i+'" readonly="true" value="'+kodeCflow+'" ></td>';
            tr+='<td><input type="text" class="form-control nomor input-sm" id="id_tempDb'+i+'" name="tempDb'+i+'" readonly="true" value="'+number_format(db,2)+'"></td>';
            tr+='<td><input type="text" class="form-control nomor input-sm" id="id_tempKr'+i+'" name="tempKr'+i+'" readonly="true" value="'+number_format(kr,2)+'"></td>';
            tr+= '</tr>';

            var totalDb         = parseFloat(CleanNumber($('#id_totalDb').val()));
            var totalDb           = totalDb+db;
            $('#id_totalDb').val(number_format(totalDb,2));

            var totalKr         = parseFloat(CleanNumber($('#id_totalKr').val()));
            var totalKr           = totalKr+kr;
            $('#id_totalKr').val(number_format(totalKr,2));

            $('#id_body_data').append(tr);
            $('#idTxtTempLoop').val(i);
            kosongCPA();
        }
    });
    $("#id_tabelPerkCflow").on('click', 'tbody tr', function () {
        var kodePerk    = $(this).find("td input").eq(0).val();
        var ket         = $(this).find("td input").eq(1).val();
        var kodeCflow   = $(this).find("td input").eq(2).val();
        var db          = $(this).find("td input").eq(3).val();
        var kr          = $(this).find("td input").eq(4).val();
        db              = parseFloat(CleanNumber(db));
        kr              = parseFloat(CleanNumber(kr));

        $('#id_kodePerk').val(kodePerk);
        $('#id_kodeCflow').val(kodeCflow);
        $('#id_keteranganCPA').val(ket);
        $('#id_jumlahDb').val(number_format(db,2));
        $('#id_jumlahKr').val(number_format(kr,2));

        var idTr = $(this).attr('id');
        var noRow = idTr.replace('tr', '');
        $('#idTempUbahCPA').val(noRow);

        $('#idTempJumlahDb').val(number_format(db,2));
        $('#idTempJumlahKr').val(number_format(kr,2));

        $('#id_btnAddCpa').attr("disabled",true);
        $('#id_btnUpdateCpa').attr("disabled",false);
        $('#id_btnRemoveCpa').attr("disabled",false);

    });
    function kosongCPA() {
        $('.kosongCPA').val('');
        $('.tkosongCPA').text('');
        $('#id_jumlahDb').val('0.00');
        $('#id_jumlahKr').val('0.00');
    }
    $('#id_btnUpdateCpa').click(function(){
        var noRow   = $('#idTempUbahCPA').val();
        var kodePerk    = $('#id_kodePerk').val();
        var kodeCflow   = $('#id_kodeCflow').val();
        var ket         = $('#id_keteranganCPA').val();
        var db          = $('#id_jumlahDb').val();
        var kr          = $('#id_jumlahKr').val();
        db              = parseFloat(CleanNumber(db));
        kr              = parseFloat(CleanNumber(kr));

        var totalDb      = parseFloat(CleanNumber($('#id_totalDb').val()));
        var totalKr      = parseFloat(CleanNumber($('#id_totalKr').val()));

        var jumlahDbOld   = parseFloat(CleanNumber($('#idTempJumlahDb').val()));
        totalDb          = totalDb - jumlahDbOld + db;

        var jumlahKrOld   = parseFloat(CleanNumber($('#idTempJumlahKr').val()));
        totalKr          = totalKr - jumlahKrOld + kr;

        $('#id_tempKodePerk'+noRow).val(kodePerk);
        $('#id_tempKodeCflow'+noRow).val(kodeCflow);
        $('#id_tempKet'+noRow).val(ket);
        $('#id_tempDb'+noRow).val(number_format(db,2));
        $('#id_tempKr'+noRow).val(number_format(kr,2));

        $('#id_totalDb').val(number_format(totalDb,2));
        $('#id_totalKr').val(number_format(totalKr,2));
        kosongCPA();
        btnCpaStart();
    });
    $('#id_btnRemoveCpa').click(function(){
        var noRow = $('#idTempUbahCPA').val();
        $('#tr'+noRow).remove();
        var i   = $('#idTxtTempLoop').val();
        i       = parseInt(i);
        i       = i-1;
        $('#idTxtTempLoop').val(i);

        var totalDb         = parseFloat(CleanNumber($('#id_totalDb').val()));
        var jumlahDbOld     = parseFloat(CleanNumber($('#idTempJumlahDb').val()));
        totalDb             = totalDb - jumlahDbOld ;
        $('#id_totalDb').val(number_format(totalDb,2));

        var totalKr         = parseFloat(CleanNumber($('#id_totalKr').val()));
        var jumlahKrOld     = parseFloat(CleanNumber($('#idTempJumlahKr').val()));
        totalKr             = totalKr - jumlahKrOld ;
        $('#id_totalKr').val(number_format(totalKr,2));

        kosongCPA();
        btnCpaStart();
    });
    $('#id_btnBatalCpa').click(function () {
        kosongCPA();
        btnCpaStart();
    });
    function addRowDbKdBayar(kodePerk,namaPerk,Db,Kr) {
        var i = $('#idTxtTempLoop').val();
        var x =  parseInt(i) + 1;
        var kodeCflow ='';

        tr ='<tr class="listdata" id="tr'+x+'">';
        tr+='<td><input type="text" class="form-control input-sm" id="id_tempKodePerk'+x+'" name="tempKodePerk'+x+'" readonly="true" value="'+kodePerk+'"></td>';
        tr+='<td><input type="text" class="form-control input-sm" id="id_tempKet'+x+'" name="tempKet'+x+'" readonly="true" value="'+namaPerk+'"></td>';
        //tr += '<td><textarea class="form-control input-sm" id="id_tempKet' + x + '" name="tempKet' + x + '" readonly="true" >'+ namaPerkUM +'\n'+ data.keterangan +'</textarea></td>';
        tr+='<td><input type="text" class="form-control input-sm" id="id_tempKodeCflow'+x+'" name="tempKodeCflow'+x+'" readonly="true" value="'+kodeCflow+'" ></td>';
        tr+='<td><input type="text" class="form-control nomor input-sm" id="id_tempDb'+x+'" name="tempDb'+x+'" readonly="true" value="'+number_format(Db,2)+'"></td>';
        tr+='<td><input type="text" class="form-control nomor input-sm" id="id_tempKr'+x+'" name="tempKr'+x+'" readonly="true" value="'+number_format(Kr,2)+'"></td>';
        tr+= '</tr>';

        i++;
        $('#id_body_data').append(tr);
        $('#idTxtTempLoop').val(i);
    }
    function ajaxSubmit() {
        ajaxModal();
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "<?php echo base_url(); ?>accrue_jadwal/proses",
            data: dataString,

            success: function (data) {
                $('#id_btnBatal').trigger('click');

                UIToastr.init(data.tipePesan, data.pesan);
            }

        });
        event.preventDefault();
    }
    $('#id_formAccrue').submit(function (event) {
        dataString = $("#id_formAccrue").serialize();
        //var aksiTab = $('#idTmpAksiTab').val();
        var r = confirm('Anda yakin menyimpan data ini?');
        if (r == true) {
            ajaxSubmit();
        } else {//if(r)
            return false;
        }


    });
</script>

<!-- END JAVASCRIPTS -->