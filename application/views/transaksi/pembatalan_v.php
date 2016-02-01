<!-- BEGIN PAGE BREADCRUMB -->
<style type="text/css">
    table#idTabelRumah td:nth-child(4) {
        text-align: right;
    }
    table#idTabelRumah td:nth-child(5) {
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
                    <span class="caption-subject font-red-sunglo bold uppercase"><?php echo $menu_nama; ?></span>
                </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse">
                    </a>
                    <a href="javascript:;" class="fullscreen">
                    </a>
                </div>
            </div>
            <div class="portlet-body">
                <div>
                	<span id="event_result">

                    </span>
                </div>
                <ul class="nav nav-pills">
                    <li class="active">
                        <a href="#tab_2_1" data-toggle="tab" id="navitab_2_1">
                            Info Rumah & Customer </a>
                    </li>
                    <li>
                        <a href="#tab_2_2" data-toggle="tab" id="navitab_2_1">
                            Info Pembayaran </a>
                    </li>

                </ul>
                <form role="form" method="post" class="cls_from_pembatalan"
                      action="<?php echo base_url('pembatalan/home'); ?>" id="id_formPembatalan">
                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="tab_2_1">
                            <div class="row">
                                <div class="form-body">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Kode penjualan </label>
                                                    <div class="input-group">
                                                        <input id="id_kodePenj" required="required" class="form-control input-sm"
                                                               type="text" name="kodePenj" readonly/>
                                                <span class="input-group-btn">
                                                    <a href="#" class="btn btn-success btn-sm" data-target="#idDivTabelPenj"
                                                       id="id_btnModalPenj" data-toggle="modal">
                                                        <i class="fa fa-search fa-fw"/></i>
                                                    </a>
                                                </span>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Status jual</label>
                                                    <select id="id_statusJual" class="form-control  input-sm"
                                                            name="statusJual" disabled >
                                                        <option value="0">Available</option>
                                                        <option value="1">Booked</option>
                                                        <option value="2">Terjual</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Id rumah </label>
                                                    <input id="id_rumahId" required="required" class="form-control input-sm"
                                                           type="text" name="rumahId" readonly/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Nama Rumah </label>
                                                    <input id="id_namaRumah" required="required" class="form-control  input-sm"
                                                           type="text" name="namaRumah" placeholder="" readonly/>
                                                </div>
                                                <div class="col-md-6">
                                                    <input id="id_proyek" required="required" class="form-control  input-sm hidden"
                                                           type="text" name="proyek" placeholder="" readonly/>
                                                    <label>Nama proyek</label>
                                                    <input id="id_namaProyek" required="required" class="form-control  input-sm"
                                                           type="text" name="namaProyek" placeholder="" readonly/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>Tipe rumah</label>
                                                    <input id="id_typeRumah" required="required" class="form-control input-sm"
                                                           type="text" name="typeRumah" placeholder="" readonly/>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Blok</label>
                                                    <input id="id_blokRumah" required="required" class="form-control input-sm"
                                                           type="text" name="blokRumah" placeholder="" readonly/>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Luas</label>
                                                    <input id="id_luasRumah" required="required" class="form-control input-sm"
                                                           type="text" name="luasRumah" placeholder="" readonly/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <label>Harga</label>
                                                    <input id="id_hargaRumah" required="required" class="form-control input-sm nomor"
                                                           type="text" name="hargaRumah" placeholder="" readonly/>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Id customer </label>
                                                        <input id="id_customerId" required="required" class="form-control input-sm"
                                                               type="text" name="customerId" readonly/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Nama customer </label>
                                                    <input id="id_namaCustomer" required="required" class="form-control  input-sm"
                                                           type="text" name="namaCustomer" placeholder="" readonly />
                                                </div>
                                                <div class="col-md-6">
                                                    <label>No Id customer </label>
                                                    <input id="id_noId" required="required" class="form-control input-sm"
                                                           type="text" name="noId" placeholder="" readonly/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Alamat </label>
                                            <textarea rows="3" cols="" name="alamat" id="id_alamat"
                                                      class="form-control input-sm" placeholder="" readonly></textarea>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>No HP </label>
                                                    <input id="id_noHp" required="required" class="form-control input-sm"
                                                           type="text" name="noHp" placeholder="" readonly/>
                                                    <label>No Telp </label>
                                                    <input id="id_noTelp" required="required" class="form-control input-sm"
                                                           type="text" name="noTelp" placeholder="" readonly/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end <div class="col-md-6"> 1 -->


                                </div>
                                <!-- HIDDEN INPUT -->
                                <!--<input type="text" id="idTmpAksiBtn" class="hidden">-->
                                <!-- END HIDDEN INPUT -->
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab_2_2">
                            <div class="row">
                                <div class="form-body">
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <label>Id Penj</label>
                                                    <input id="id_idPenj"
                                                           class="form-control input-sm"
                                                           type="text" name="idPenj" readonly/>
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Tgl penj/booking</label>
                                                    <input id="id_tglPenj" required="required"
                                                           class="form-control input-sm"
                                                           type="text" name="tglPenj" readonly/>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Total Harga Jual </label>
                                                    <input id="id_hargaJual" required="required"
                                                           class="form-control nomor input-sm"
                                                           type="text" name="hargaJual" placeholder="" readonly/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end <div class="col-md-6"> 1 -->
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <label>Total dibayar</label>
                                                    <input id="id_sdhDibayar"
                                                           class="form-control input-sm nomor"
                                                           type="text" name="sdhDibayar" readonly/>
                                                </div>
                                                <div class="col-md-5">
                                                    <label>Sisa/Baki debet</label>
                                                    <input id="id_bakiDebet" required="required"
                                                           class="form-control input-sm nomor"
                                                           type="text" name="bakiDebet" readonly/>
                                                </div>
                                                <div class="col-md-2">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="form-body">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label>Tgl pembatalan</label>
                                                    <input id="id_tgltrans" required="required"
                                                           class="form-control input-sm"
                                                           type="text" name="tgltrans" readonly/>
                                                </div>
                                                <div class="col-md-9">
                                                    <label>Keterangan </label>
                                                    <textarea rows="2" cols="" name="keterangan" id="id_keterangan"
                                                              class="form-control input-sm" placeholder="" ></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end <div class="col-md-6"> 1 -->
                                    <div class="col-md-6">

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
                                        <!--<button id="id_btnCetak" type="button" class="btn green">Cetak Invoice</button>-->
                                    </div>
                                </div>

                            </div>
                        </div>


                    </div>
                    <!--END ROW 1 -->

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

<!-- END PAGE CONTENT-->
<!--  MODAL Data Booking -->
<div class="modal fade draggable-modal" id="idDivTabelPenj" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Data Penjualan</h4>
            </div>
            <div class="modal-body">
                <div class="scroller" style="height:400px; ">
                    <div class="row">
                        <div class="col-md-12">
                            <button id="id_ReloadPenj" style="display: none;"></button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-body">
                                <table class="table table-striped table-bordered table-hover text_kanan" id="idTabelPenj">
                                    <thead>
                                    <tr>
                                        <th>
                                            Kode Penj
                                        </th>
                                        <th>
                                            Id Rumah
                                        </th>
                                        <th>
                                            Id Customer
                                        </th>
                                        <th>
                                            Nama Rumah
                                        </th>
                                        <th>
                                            Nama Customer
                                        </th>
                                        <th>
                                            Status
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
                <button type="button" class="btn default" data-dismiss="modal" id="btnCloseModalDataPenj">Close</button>
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

        var initTablePenj = function () {
            var table = $('#idTabelPenj');
            // begin first table
            table.dataTable({
                "ajax": "<?php  echo base_url("/pembatalan/getPenjualanAll"); ?>",
                "columns": [
                    { "data": "master_id" },
                    { "data": "id_rumah" },
                    { "data": "id_cust" },
                    { "data": "nama_rumah" },
                    { "data": "nama_cust" },
                    { "data": "status_jual" }
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
            $('#id_ReloadPenj').click(function () {
                table.api().ajax.reload();
            });
            table.on('click', 'tbody tr', function () {
                var kodePenj = $(this).find("td").eq(0).html();
                var idRumah = $(this).find("td").eq(1).html();
                var idCust = $(this).find("td").eq(2).html();
                $('#id_rumahId').val(idRumah);
                $('#id_customerId').val(idCust);
                $('#id_kodePenj').val(kodePenj);
                getDescRumahSelled(idRumah);
                getAngsInfo(kodePenj);
                //getDescRumah(idRumah);
                //getDescCust(idCust);
                //getAngsInfo2(kodePenj,tglTrans);
                $('#btnCloseModalDataPenj').trigger('click');
                $('#kodePenj').focus();
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

            tableWrapper.find('.dataTables_length select').addClass("form-control input-xsmall input-inline"); // modify table per page dropdown
        }
        return {
            //main function to initiate the module
            init: function () {
                if (!jQuery().dataTable) {
                    return;
                }
                initTablePenj();
            }
        };
    }();
    btnStart();
    readyToStart();
    tglTransStart();
    $("#id_namaProyek").focus();

    $( "#id_btnSimpan" ).click(function() {
        $('#idTmpAksiBtn').val('1');
    });

    $('#id_btnUbah').click(function(){
        $('#idTmpAksiBtn').val('2');
    });
    $('#id_btnHapus').click(function(){
        $('#idTmpAksiBtn').val('3');
    });
    $('#id_btnBatal').click(function(){
        btnStart();
        resetForm();
        readyToStart();
        tglTransStart();
    });
    function getDescRumahSelled(idRumah) {
        ajaxModal();
        if (idRumah != '') {
            $.post("<?php echo site_url('/pembayaran/getDescRumahSelled'); ?>",
                {
                    'idRumah': idRumah
                }, function (data) {
                    if (data.baris == 1) {
                        $('#id_statusJual').val(data.status_jual);
                        $('#id_proyek').val(data.id_proyek);
                        $('#id_namaRumah').val(data.nama_rumah);
                        $('#id_typeRumah').val(data.type);
                        $('#id_blokRumah').val(data.blok);
                        $('#id_luasRumah').val(data.luas);
                        $('#id_hargaRumah').val(data.harga);
                        $('#id_idPenj').val(data.id_penj);
                        $('#id_hargaJual').val(data.harga);
                        $('#id_tglPenj').val(data.tgl_trans);

                        $('#id_customerId').val(data.id_cust);
                        $('#id_namaCustomer').val(data.nama_cust);
                        $('#id_alamat').val(data.alamat);
                        $('#id_noId').val(data.no_id);
                        $('#id_noHp').val(data.no_hp);
                        $('#id_noTelp').val(data.no_telp);
                        //hitungHargaJual();
                    } else {
                        alert('Data tidak ditemukan!');
                        $('#id_btnBatal').trigger('click');
                    }
                }, "json");
        }//if kd<>''
    }

    function getAngsInfo(idPenj) {
        ajaxModal();
        if (idPenj != '') {
            $.post("<?php echo site_url('/pembatalan/getAngsInfo'); ?>",
                {
                    'idPenj': idPenj
                }, function (data) {
                    if (data.baris == 1) {
                        $('#id_sdhDibayar').val(number_format(data.sdhdibayar,2));
                        $('#id_bakiDebet').val(number_format(data.sisaAngs,2));
                    } else {
                        alert('Data tidak ditemukan!');
                        $('#id_btnBatal').trigger('click');
                    }
                }, "json");
        }//if kd<>''
    }
    function ajaxSubmit(){
        ajaxModal();
        $.ajax({
            type:"POST",
            dataType: "json",
            url:"<?php echo base_url(); ?>pembatalan/simpan",
            data:dataString,
            success:function (data) {
                $('#id_ReloadRumah').trigger('click');
                $('#id_btnBatal').trigger('click');
                $('#id_kodeTr').val(data.kode_transaksi);
                $('#id_kodeBooking').val(data.kode_penjualan);
                UIToastr.init(data.tipePesan,data.pesan);
            }

        });
        event.preventDefault();
    }
    $('#id_formPembatalan').submit(function (event) {
        dataString = $("#id_formPembatalan").serialize();
        var aksiBtn       = $('#idTmpAksiBtn').val();

            if(aksiBtn == '1'){
                var r = confirm('Anda yakin menyimpan data ini?');
                if (r== true){
                    ajaxSubmit();
                }else{//if(r)
                    return false;
                }
            }else if(aksiBtn == '2'){
                var r = confirm('Anda yakin merubah data ini?');
                if (r== true){
                    ajaxUbah();
                }else{//if(r)
                    return false;
                }
            }else if(aksiBtn == '3'){
                var r = confirm('Anda yakin menghapus data ini?');
                if (r== true){
                    ajaxHapus();
                }else{//if(r)
                    return false;
                }
            }

    });

</script>


<!-- END JAVASCRIPTS -->