<!-- BEGIN PAGE BREADCRUMB -->
<style type="text/css">
    table#idTabelAdv td:nth-child(4) {
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
                    <span class="caption-subject font-red-sunglo bold uppercase">Pembayaran</span>
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
                      action="<?php echo base_url('kasir/home'); ?>" id="id_formKasir">
                    <div class="row">
                        <div class="form-body">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input id="id_kywId" required="required" class="form-control hidden"
                                           type="text" name="kywId" readonly/>
                                    <label>No Pembayaran </label>
                                    <input id="id_idPemb" required="required" class="form-control input-sm"
                                           type="text" name="idPemb" readonly/>
                                </div>
                                <div class="form-group">
                                    <label>Pembayaran</label>
                                    <select id="id_jnsReq" class="form-control input-sm select2me" name="jnsReq">
                                        <option value="1">Advance</option>
                                        <option value="2">Request for payment</option>
                                        <option value="3">Reimbursement</option>
                                        <option value="4">Settlement</option>
                                        <option value="5">Jurnal Umum</option>
                                    </select>
                                </div>

                            </div>
                            <!--end <div class="col-md-6"> 1 -->
                            <div class="col-md-3">
                                <div class="form-group request_in" id="div_idAdvance">
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
                                <div class="form-group request_in"  id="div_idReimpay">
                                    <label>Id Reimbursement </label>
                                    <div class="input-group">
                                        <input id="id_idReimpay" required="required" class="form-control  input-sm"
                                               type="text" name="idReimpay" readonly/>
                                    <span class="input-group-btn">
                                        <a href="#" class="btn btn-success btn-sm" data-target="#idDivTabelReimpay"
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
                                    <input id="id_namaKyw" required="required" class="form-control input-sm"
                                           type="text" name="namaKyw" readonly/>
                                </div>

                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
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
                                <div class="form-group">
                                    <label>Jumlah uang</label>
                                    <input id="id_uang" required="required" class="form-control input-sm nomor"
                                           type="text" name="uang" readonly/>
                                </div>
                            </div>
                        </div>
                        <!-- HIDDEN INPUT -->
                        <input type="text" id="idTmpAksiBtn" class="hidden">
                        <input type="text" id="idTxtTempLoop" name="txtTempLoop"
                               class="form-control nomor1 hidden">
                        <!-- END HIDDEN INPUT -->
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                        <label>Tgl Pembayaran</label>
                                        <input id="id_tgltrans" required="required"
                                               class="form-control input-sm "
                                               type="text" name="tgltrans" placeholder="dd-mm-yyyy" readonly/>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Kode Pembayaran</label>
                                <?php
                                $data = array();
                                $data[''] = '';
                                foreach ($kodebayar as $row):
                                    $data[$row['kode_bayar']] = $row['nama_kdbayar'];
                                endforeach;
                                echo form_dropdown('kodebayar', $data, '',
                                    'id="id_kodebayar" class="form-control input-sm select2me "');
                                ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Kode Perk</label>
                                <input id="id_kodePerk" class="form-control input-sm"
                                       type="text" name="kodePerk" readonly/>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Nama Perk</label>
                                <input id="id_namaPerk" class="form-control input-sm"
                                       type="text" name="namaPerk" readonly/>

                            </div>
                        </div>
                    </div>
                    <hr>

                    <!-- END ROW-->
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
                                        <th width="40%">
                                            Deskripsi dan Nama Perk
                                        </th>
                                        <th width="20%">
                                            Debet
                                        </th>
                                        <th width="20%">
                                            Kredit
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody id="id_body_data">

                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td colspan="2" width="60%">
                                            <strong>Total</strong>
                                        </td>
                                        <td width="20%">
                                            <input type="text" name="totalDb"
                                                   class="form-control nomor input-sm" id="id_totalDb"
                                                   readonly>
                                        </td>
                                        <td width="20%">
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
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">

                                </div>
                                <!--<div class="col-md-6">
                                    <label>Total :</label>
                                    <input type="text" name="totalCPA"
                                           class="form-control nomor input-sm" id="idTotalCPA"
                                           readonly>
                                </div>-->
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
                                            Id PP
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
                "ajax": "<?php echo base_url("/kasir/getAdvAll"); ?>",
                "columns": [
                    {"data": "idAdv"},
                    {"data": "idPp"},
                    {"data": "namaKyw"},
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
                //$('#id_idAdvance').val(idAdv);
                //$('#id_idAdvance').focus();

                //$('#id_userId').focus();
                getDescAdv(idAdv);

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
            }
        };
    }();

    //Ready Doc
    btnStart();
    readyToStart();
    tglTransStart();

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
        resetForm();
        readyToStart();
        tglTransStart();

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
    $('#id_kodebayar').change(function () {
        var kdBayar = $(this).val();
        if (kdBayar == '') {
            $('#id_kodebayar').val('');
            $('#id_kodePerk').val('');
            $('#id_namaPerk').val('');
        } else {
            getDescKodeBayar(kdBayar);
        }
    });
    function getDescKodeBayar(kdBayar) {
        ajaxModal();
        if (kdBayar != '') {
            $.post("<?php echo site_url('/kasir/getDescKodeBayar'); ?>",
                {
                    'kdBayar': kdBayar
                }, function (data) {
                    if (data.baris == 1) {
                        $('#id_kodePerk').val(data.kodePerk);
                        $('#id_namaPerk').val(data.namaPerk);

                        var db = 0;
                        var kr = $('#id_uang').val();
                        addRowDK(data.kodePerk,data.namaPerk,db,kr);
                        id_totalDb
                    } else {
                        alert('Data tidak ditemukan!');
                        $('#id_btnBatal').trigger('click');
                    }
                }, "json");
        }//if kd<>''
    }

    function getDescAdv(idAdv) {
        ajaxModal();
        if (idAdv != '') {
            $.post("<?php echo site_url('/kasir/getDescAdv'); ?>",
                {
                    'idAdv': idAdv
                }, function (data) {
                    if (data.baris == 1) {
                        var namaPerkUM = data.namaPerkUM;
                        $('#id_namaKyw').val(data.nama_kyw);
                        $('#id_deptKyw').val(data.nama_dept);
                        $('#id_uang').val(data.jml_uang);
                        $('#id_proyek').val(data.id_proyek);
                        $('#id_tglReq').val(data.tgl_trans);
                        $('#id_tglJT').val(data.tgl_jt);
                        var db = data.jml_uang;
                        var kr = 0;
                        addRowDK(data.kodePerkUM,data.namaPerkUM,db,kr);
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
    function addRowDK(kodePerk,namaPerk,Db,Kr) {
        var i = $('#idTxtTempLoop').val();
        var x =  i + 1;
        tr = '<tr class="listdata" id="tr' + x + '">';
        tr += '<td><input type="text" class="form-control input-sm" id="id_tempKode' + x + '" name="tempKode' + x + '" readonly="true" value="' + kodePerk + '"></td>';
        //tr += '<td><textarea class="form-control input-sm" id="id_tempKet' + x + '" name="tempKet' + x + '" readonly="true" >'+ namaPerkUM +'\n'+ data.keterangan +'</textarea></td>';
        tr += '<td><textarea class="form-control input-sm" id="id_tempKet' + x + '" name="tempKet' + x + '" readonly="true" >'+ namaPerk +'</textarea></td>';
        tr += '<td><input type="text" class="form-control nomor input-sm" id="id_tempJmlD' + x + '" name="tempJmlD' + x + '" readonly="true" value="' + number_format(Db, 2) + '" ></td>';
        tr += '<td><input type="text" class="form-control nomor input-sm" id="id_tempJmlK' + x + '" name="tempJmlK' + x + '" readonly="true" value="' + number_format(Kr, 2) + '"></td>';
        tr += '</tr>';
        i++;
        $('#id_body_data').append(tr);
        $('#idTxtTempLoop').val(i);
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

    $('#id_formKasir').submit(function (event) {
        dataString = $("#id_formKasir").serialize();
        var aksiBtn = $('#idTmpAksiBtn').val();
        if (aksiBtn == '1') {
            var r = confirm('Anda yakin menyimpan data ini?');
            if (r == true) {
                ajaxSubmit();
            } else {//if(r)
                return false;
            }
        } else if (aksiBtn == '2') {
            var r = confirm('Anda yakin merubah data ini?');
            if (r == true) {
                ajaxUbah();
            } else {//if(r)
                return false;
            }
        } else if (aksiBtn == '3') {
            var r = confirm('Anda yakin menghapus data ini?');
            if (r == true) {
                ajaxHapus();
            } else {//if(r)
                return false;
            }
        }
    });


</script>


<!-- END JAVASCRIPTS -->