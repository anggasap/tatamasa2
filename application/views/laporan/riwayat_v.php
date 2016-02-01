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
                        <a href="#tab_2_2" data-toggle="tab" id="navitab_2_2">
                            Riwayat Transaksi </a>
                    </li>
                </ul>
                <form role="form" method="post" class="cls_from_penjualan"  id="id_formPenjualan">
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
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <table class="table table-striped table-bordered table-hover text_kanan"
                                                   id="idTabelJadwalJT">
                                                <thead>
                                                <tr>
                                                    <th width='10%' align='left'>No</th>
                                                    <th width='20%' align='left'>Tgl Trans</th>
                                                    <th width='50%' align='left'>Deskripsi Trans</th>
                                                    <th width='20%' align='left'>Jml Trans</th>
                                                </tr>
                                                </thead>
                                                <tbody id="id_body_data">

                                                </tbody>
                                                <tfoot>

                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                    <!--end <div class="col-md-6"> 1 -->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-actions">
                                        <button id="id_btnCetak" type="button" class="btn green">Cetak</button>
                                        <button id="id_btnBatal" type="button" class="btn default">Batal</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- disini tombol actionnya diawali class row-->
                </form>
            </div>
        </div>
        <!-- end <div class="portlet green-meadow box"> -->
    </div>
    <!-- end <div class="col-md-6"> -->
</div>
<div class="row">
    <div class="col-md-6">

    </div>
</div>

<!-- END PAGE CONTENT-->
<!--  MODAL Data Karyawan -->
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
                getRiwayatTrans(kodePenj);
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
    $("#id_rumah").focus();

    $('#navitab_2_3').click(function () {
        var tempJadwalRefresh = $('#id_tempRefreshJadwal').val();
        tempJadwalRefresh = parseInt(tempJadwalRefresh);
        if (tempJadwalRefresh < 1) {
        $('#id_refreshJadwal').trigger('click');
        }
        tempJadwalRefresh = tempJadwalRefresh+1;
        $('#id_tempRefreshJadwal').val(tempJadwalRefresh);

    });

    $('#id_btnBatal').click(function () {
        btnStart();
        resetForm();
        readyToStart();
        tglTransStart();
        $('#id_body_data').empty();
        $('#id_btnModalCust').attr('disabled', false);
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
    function getRiwayatTrans(idMaster){
        $('#id_body_data').empty();
        ajaxModal();
        if (idMaster != '') {
            $.post("<?php echo site_url('/riwayat/getRiwayat'); ?>",
                {
                    'idMaster': idMaster
                },function (data) {
                    if (data.data_cpa.length > 0) {
                        $('#idTxtTempLoop').val(data.data_cpa.length);
                        for(i=0;i<data.data_cpa.length;i++){
                            var x = i+1;
                            var desk_Trans    = data.data_cpa[i].id_cpa;
                            if(desk_Trans == '100'){
                                var deskTrans     = 'Booking';
                            }else{
                                var deskTrans     = 'Pembayaran angsuran';
                            }
                            var tglTrans        = data.data_cpa[i].tgl_trans;
                            var parts           = tglTrans.split("-");// tanggal displit
                            //var tgltrans        = parts[2]+'-' + (parseInt(parts[1]) + 1) +'-' + parts[0];
                            var hari = parseInt(parts[2]);
                            var bulan = parseInt(parseInt(parts[1]) + 1);
                            var tahun = parts[0];
                            if (hari < 10) {
                                hari = '0' + hari
                            }
                            if (bulan < 10 && bulan >0) {
                                bulan = '0' + bulan
                            }else if(bulan == 0){
                                bulan = '12';
                            }
                            tgltrans = hari + '-' + bulan + '-' + tahun;
                            var jmlTrans       = data.data_cpa[i].jml_trans;

                            tr ='<tr class="listdata" id="tr'+x+'">';
                            tr+='<td><input type="text" class="form-control input-sm" id="id_tempIdPenj'+x+'" name="tempIdPenj'+x+'" readonly="true" value="'+x+'"></td>';
                            tr+='<td><input type="text" class="form-control input-sm" id="id_tempIdProyek'+x+'" name="tempIdProyek'+x+'" readonly="true" value="'+tgltrans+'"></td>';
                            tr+='<td><input type="text" class="form-control input-sm" id="id_tempNamaRumah'+x+'" name="tempNamaRumah'+x+'" readonly="true" value="'+deskTrans+'"></td>';
                            tr+='<td><input type="text" class="form-control nomor input-sm" id="id_tempJmlTrans'+x+'" name="tempJmlTrans'+x+'" readonly="true" value="'+number_format(jmlTrans,2)+'"></td>';
                            tr+='</tr>';

                            $('#id_body_data').append(tr);
                        }
                    }else{
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
            url: "<?php echo base_url(); ?>penjualan/simpan",
            data: dataString,

            success: function (data) {
                //$('#id_btnBatal').trigger('click');
                $('#id_ReloadRumah').trigger('click');
                $("#navitab_2_1").trigger('click');
                UIToastr.init(data.tipePesan, data.pesan);
            }

        });
        event.preventDefault();
    }


    $('#id_formPenjualan').submit(function (event) {
        dataString = $("#id_formPenjualan").serialize();
        //var aksiTab = $('#idTmpAksiTab').val();
        var selisih = $('#idSelisihJadwal').val();
        if(selisih != '0.00'){
            alert("Total harga tidak sama dengan total jadwal.");
            return false;
        }else{
            var r = confirm('Anda yakin menyimpan data ini?');
            if (r == true) {
                ajaxSubmit();
            } else {//if(r)
                return false;
            }
        }
    });
	$('#id_btnCetak').click(function(){
        var idPenj = $('#id_idPenj').val();
		var idCust = $('#id_customerId').val();
		var idrumah = $('#id_rumahId').val();        
		if (idPenj == ''){
            alert('Tidak ada kode penjualan');
        }else{
            window.open("<?php echo base_url('penjualan/cetak/'); ?>/" + idPenj +"/"+idCust+"/"+idrumah, '_blank');
        }
    });
</script>


<!-- END JAVASCRIPTS -->