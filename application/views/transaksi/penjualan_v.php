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
                    <span class="caption-subject font-red-sunglo bold uppercase">Penjualan</span>
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
                            Pembayaran </a>
                    </li>
                    <li>
                        <a href="#tab_2_3" data-toggle="tab" id="navitab_2_3">
                            Jadwal </a>
                    </li>
                    <li>
                        <a href="#tab_2_4" data-toggle="tab" id="navitab_2_4">
                            Form Kesepakatan </a>
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

                                                    <label>Id rumah </label>

                                                    <div class="input-group">
                                                        <input id="id_rumahId" required="required"
                                                               class="form-control input-sm"
                                                               type="text" name="rumahId" readonly/>
                                                <span class="input-group-btn">
                                                    <a href="#" class="btn btn-success btn-sm"
                                                       data-target="#idDivTabelRumah"
                                                       id="id_btnModalRmh" data-toggle="modal">
                                                        <i class="fa fa-search fa-fw"/></i>
                                                    </a>
                                                </span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Status jual</label>
                                                    <select id="id_statusJual" class="form-control  input-sm"
                                                            name="statusJual" disabled>
                                                        <option value="0">Available</option>
                                                        <option value="1">Booked</option>
                                                        <option value="2">Terjual</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Nama Rumah </label>
                                                    <input id="id_namaRumah" required="required"
                                                           class="form-control  input-sm"
                                                           type="text" name="namaRumah" placeholder="" readonly/>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Nama proyek</label>
                                                    <input id="id_namaProyek" required="required"
                                                           class="form-control  input-sm"
                                                           type="text" name="namaProyek" placeholder="" readonly/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>Tipe rumah</label>
                                                    <input id="id_typeRumah" required="required"
                                                           class="form-control input-sm"
                                                           type="text" name="typeRumah" placeholder="" readonly/>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Blok</label>
                                                    <input id="id_blokRumah" required="required"
                                                           class="form-control input-sm"
                                                           type="text" name="blokRumah" placeholder="" readonly/>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Luas</label>
                                                    <input id="id_luasRumah" required="required"
                                                           class="form-control input-sm kanan"
                                                           type="text" name="luasRumah" placeholder="" readonly/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <label>Harga</label>
                                                    <input id="id_hargaRumah" required="required"
                                                           class="form-control input-sm kanan"
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

                                                    <div class="input-group">
                                                        <input id="id_customerId" required="required"
                                                               class="form-control input-sm"
                                                               type="text" name="customerId" readonly/>
                                                <span class="input-group-btn">
                                                    <a href="#" class="btn btn-success btn-sm"
                                                       data-target="#idDivTabelCustomer"
                                                       id="id_btnModalCust" data-toggle="modal">
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
                                                    <label>Nama customer </label>
                                                    <input id="id_namaCustomer" required="required"
                                                           class="form-control  input-sm"
                                                           type="text" name="namaCustomer" placeholder="" readonly/>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>No Id customer </label>
                                                    <input id="id_noId" required="required"
                                                           class="form-control input-sm"
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
                                                    <input id="id_noHp" required="required"
                                                           class="form-control input-sm"
                                                           type="text" name="noHp" placeholder="" readonly/>
                                                    <label>No Telp </label>
                                                    <input id="id_noTelp" required="required"
                                                           class="form-control input-sm"
                                                           type="text" name="noTelp" placeholder="" readonly/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end <div class="col-md-6"> 1 -->
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab_2_2">
                            <div class="row">
                                <div class="form-body">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <label>Id Booking/Penj</label>
                                                    <input id="id_idPenj"
                                                           class="form-control input-sm"
                                                           type="text" name="idPenj" readonly/>
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Tgl booking</label>
                                                    <input id="id_tglBooking" required="required"
                                                           class="form-control input-sm"
                                                           type="text" name="tglBooking" readonly/>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Nominal booking </label>
                                                    <input id="id_hargaBooking" required="required"
                                                           class="form-control nomor input-sm"
                                                           type="text" name="hargaBooking" placeholder="" readonly/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end <div class="col-md-6"> 1 -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <label>Harga setelah booking</label>
                                                    <input id="id_hargaStlBooking" class="form-control nomor input-sm"
                                                           type="text" name="hargaStlBooking" placeholder="" readonly/>
                                                </div>
                                                <div class="col-md-7">
                                                    <label>Keterangan </label>
                                            <textarea rows="2" cols="" name="keterangan" id="id_keterangan"
                                                      class="form-control input-sm" placeholder="" readonly></textarea>
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
                                                    <div class="form-group" id="id_divDPPersen">
                                                        <label>Tgl Realisasi</label>
                                                        <input id="id_tgltrans" required="required"
                                                               class="form-control input-sm date-picker"
                                                               type="text" name="tglTrans"
                                                               data-date-format="dd-mm-yyyy"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Tipe pembayaran</label>
                                                    <select id="id_tipePembayaran" class="form-control  input-sm"
                                                            name="tipePembayaran">
                                                        <option value="1">Cash keras</option>
                                                        <option value="2">Cash bertahap</option>
                                                        <option value="3">DP/KPR</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group" id="id_divJmlBayarKali">
                                                        <label>Jml Angs </label>
                                                        <input id="id_jmlBayarKali" class="form-control nomor1 input-sm"
                                                               type="text" name="jmlBayarKali" placeholder=""/>
                                                        <label>% DP </label>
                                                        <input id="id_DPPersen" required="required"
                                                               class="form-control nomor1 input-sm"
                                                               type="text" name="DPPersen" placeholder=""/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Harga (DP)</label>
                                                        <input id="id_hargaJualDP" class="form-control nomor input-sm"
                                                               type="text" name="hargaJualDP" placeholder="" readonly/>

                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Sisa (DP)</label>
                                                        <input id="id_sisaDP" class="form-control nomor input-sm"
                                                               type="text" name="sisaDP" placeholder="" readonly/>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">

                                                    </div>
                                                </div>
                                                <div class="col-md-6">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end <div class="col-md-6"> 1 -->
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab_2_3">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-body">
                                        <table class="table table-striped table-hover table-bordered"
                                               id="id_tabelJadwalBayar">
                                            <thead>
                                            <tr>
                                                <th width="10%">
                                                    No
                                                </th>
                                                <th width="30%">
                                                    Tanggal
                                                </th>
                                                <th width="60%">
                                                    Nominal Trans
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
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="hidden">Jadwal Focus :</label>
                                            <input type="text" name="tempJadwalFocus"
                                                   class="form-control nomor input-sm hidden" id="id_tempJadwalFocus"
                                                   readonly>
                                            <input type="text" name="tempRefreshJadwal"
                                                   class="form-control nomor input-sm hidden" id="id_tempRefreshJadwal">
                                            <button id="id_refreshJadwal" type="button" class="btn yellow">Refresh Jadwal</button>
                                        </div>
                                        <div class="col-md-4 ">
                                            <label>Selisih :</label>
                                            <input type="text" name="selisihJadwal"
                                                   class="form-control nomor input-sm " id="idSelisihJadwal"
                                                   readonly>
                                        </div>
                                        <div class="col-md-4 ">
                                            <label>Total :</label>
                                            <input type="text" name="totalJadwal"
                                                   class="form-control nomor input-sm " id="idTotalJadwal"
                                                   readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" id="idTmpAksiBtn" class="hidden">

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab_2_4">
                            <div class="row">
                                <div class="form-body">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Kesepakatan : </label>
                                            <textarea rows="6" cols="" name="kesepakatan" id="id_kesepakatan"
                                                      class="form-control input-sm" placeholder="" maxlength="255"></textarea>
                                        </div>
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
                                        <button id="id_btnCetak" type="button" class="btn green">Cetak</button>
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
<div class="modal fade draggable-modal" id="idDivTabelCustomer" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Data Customer</h4>
            </div>
            <div class="modal-body">
                <div class="scroller" style="height:400px; ">
                    <div class="row">
                        <div class="col-md-12">
                            <button id="id_ReloadCustomer" style="display: none;"></button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-body">
                                <table class="table table-striped table-bordered table-hover text_kanan"
                                       id="idTabelCustomer">
                                    <thead>
                                    <tr>
                                        <th>
                                            Id Customer
                                        </th>
                                        <th>
                                            Nama
                                        </th>
                                        <th>
                                            Alamat
                                        </th>
                                        <th>
                                            No Id
                                        </th>
                                        <th>
                                            No HP
                                        </th>
                                        <th>
                                            No Telp
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
                <button type="button" class="btn default" data-dismiss="modal" id="btnCloseModalDataCustomer">Close
                </button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--  END  MODAL Data Karyawan -->
<!--  MODAL Data Karyawan -->
<div class="modal fade draggable-modal" id="idDivTabelRumah" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Data Rumah Tersedia</h4>
            </div>
            <div class="modal-body">
                <div class="scroller" style="height:400px; ">
                    <div class="row">
                        <div class="col-md-12">
                            <button id="id_ReloadRumah" style="display: none;"></button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-body">
                                <table class="table table-striped table-bordered table-hover text_kanan"
                                       id="idTabelRumah">
                                    <thead>
                                    <tr>
                                        <th>
                                            Id Rumah
                                        </th>
                                        <th>
                                            Nama Proyek
                                        </th>
                                        <th>
                                            Nama Rumah
                                        </th>
                                        <th>
                                            Luas
                                        </th>
                                        <th>
                                            Harga
                                        </th>
                                        <th>
                                            Status Jual
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
                <button type="button" class="btn default" data-dismiss="modal" id="btnCloseModalDataRumah">Close
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
            var table = $('#idTabelCustomer');
            // begin first table
            table.dataTable({
                "ajax": "<?php  echo base_url("/master_customer/getCustomerAll"); ?>",
                "columns": [
                    {"data": "id_cust"},
                    {"data": "nama_cust"},
                    {"data": "alamat"},
                    {"data": "no_id"},
                    {"data": "no_hp"},
                    {"data": "no_telp"}
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
            $('#id_ReloadCustomer').click(function () {
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
                var idCustomer = $(this).find("td").eq(0).html();
                var nama = $(this).find("td").eq(1).html();
                var alamat = $(this).find("td").eq(2).html();
                var noId = $(this).find("td").eq(3).html();
                var noHp = $(this).find("td").eq(4).html();
                var noTelp = $(this).find("td").eq(5).html();

                $('#id_customerId').val(idCustomer);
                $('#id_namaCustomer').val(nama);
                $('#id_alamat').val(alamat);
                $('#id_noId').val(noId);
                $('#id_noHp').val(noHp);
                $('#id_noTelp').val(noTelp);

                $('#btnCloseModalDataCustomer').trigger('click');

                $('#id_customerId').focus();
            });

            tableWrapper.find('.dataTables_length select').addClass("form-control input-xsmall input-inline"); // modify table per page dropdown
        }
        var initTable2 = function () {

            var table = $('#idTabelRumah');

            // begin first table
            table.dataTable({
                "ajax": "<?php  echo base_url("/penjualan/getRumahAll"); ?>",
                "columns": [
                    {"data": "id_rumah"},
                    {"data": "nama_proyek"},
                    {"data": "nama_rumah"},
                    {"data": "luas"},
                    {"data": "harga"},
                    {"data": "status_jual"}
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
            $('#id_ReloadRumah').click(function () {
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
                var idRumah = $(this).find("td").eq(0).html();
                var statusJual = $(this).find("td").eq(5).html();
                statusJual = statusJual.trim();
                $('#id_rumahId').val(idRumah);
                if (statusJual == 'Booked') {
                    getDescRumahBooked(idRumah);
                } else {
                    getDescRumah(idRumah);
                }
                //$('#').val();
                $('#btnCloseModalDataRumah').trigger('click');
                $('#id_rumahId').focus();
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
    btnStart();
    readyToStart();
    tglTransStart();
    $("#id_rumah").focus();
    $('#id_refreshJadwal').click(function () {
        $('#idSelisihJadwal').val('0.00');
        $('#id_body_data').empty();
        var table = $('#id_tabelJadwalBayar');
        table.on('focus', '.nomor', function (e) {
            if ($(this).val() == '0.00') {
                $(this).val('');
            } else {
                this.select();
                $("#id_tempJadwalFocus").val($(this).val());

            }
        });
        table.on('focusout', '.nomor', function (e) {
            if ($(this).val() == '') {
                $(this).val('0.00');
            } else {
                var angka = $(this).val();
                $(this).val(number_format(angka, 2));
                var nilaiSkrg = parseFloat(CleanNumber(angka));
                var totalJadwal = $('#idTotalJadwal').val();
                totalJadwal = parseFloat(CleanNumber(totalJadwal));
                var nilaiSbl = $("#id_tempJadwalFocus").val();
                nilaiSbl = parseFloat(CleanNumber(nilaiSbl));
                totalJadwal = totalJadwal - nilaiSbl + nilaiSkrg;
                $('#idTotalJadwal').val(number_format(totalJadwal, 2));

                var tipePembayaran = $('#id_tipePembayaran').val();
                if (tipePembayaran == '2'){
                    var realPrice = parseFloat(CleanNumber($('#id_hargaStlBooking').val()));
                    var totalJadwal = parseFloat(CleanNumber($('#idTotalJadwal').val()));
                    var selisih = realPrice - totalJadwal;
                    $('#idSelisihJadwal').val(number_format(selisih, 2));
                }
                //totalJadwal     =

            }
        });
        table.on('keyup', '.nomor', function (e) {
            var val = $(this).val();
            if (isNaN(val)) {
                val = val.replace(/[^0-9\.]/g, '');
                if (val.split('.').length > 2)
                    val = val.replace(/\.+$/, "");
            }
            $(this).val(val);
        });

        var i = 1;
        var tipePembayaran = $('#id_tipePembayaran').val();
        var tglRealisasi = $('#id_tgltrans').val();
        //cash keras
        if (tipePembayaran == '1') {
            var hargaJual = $('#id_hargaStlBooking').val();

            tr = '<tr class="listdata" id="tr' + i + '">';
            tr += '<td><input type="text" class="form-control input-sm" id="id_tempNo' + i + '" name="tempNo' + i + '" readonly="true" value="' + i + '"></td>';
            tr += '<td><input type="text" class="form-control input-sm" id="id_tempTglJadwal' + i + '" name="tempTglJadwal' + i + '" readonly="true" value="' + tglRealisasi + '" ></td>';
            tr += '<td><input type="text" class="form-control nomor input-sm" id="id_tempJumlah' + i + '" name="tempJumlah' + i + '" readonly="true" value="' + hargaJual + '"></td>';
            tr += '</tr>';
            $('#id_body_data').append(tr);
            // cash tempo
        } else if (tipePembayaran == '2') {

            var hargaJual = $('#id_hargaStlBooking').val();
            var total = 0;
            var jmlAngs = $('#id_jmlBayarKali').val();
            hargaJual = parseFloat(CleanNumber(hargaJual));
            jmlAngs = parseFloat(CleanNumber(jmlAngs));
            var angs = hargaJual / jmlAngs;
            angs = Math.round(angs / 1000) * 1000;
            var angsEnd = 0;// angsuran terakhir

            var parts = tglRealisasi.split("-");// tanggal displit
            var tglJadwal = new Date(parts[2], parts[1] - 1, parts[0]);

            tglJadwal.setDate(tglJadwal.getDate() + 14);

            for (var i = 1; i <= jmlAngs; i++) {

                tglJadwal.setMonth(tglJadwal.getMonth() + 1);
                var hari = tglJadwal.getDate();
                var bulan = tglJadwal.getMonth();
                var tahun = tglJadwal.getFullYear();

                if (hari < 10) {
                    hari = '0' + hari
                }
                if (bulan < 10 && bulan >0) {
                    bulan = '0' + bulan
                }else if(bulan == 0){
                    bulan = '12';
                }
                tglJadwalString = hari + '-' + bulan + '-' + tahun;

                if (i == jmlAngs) {
                    angsEnd = hargaJual - total;

                    tr = '<tr class="listdata" id="tr' + i + '">';
                    tr += '<td><input type="text" class="form-control input-sm" id="id_tempNo' + i + '" name="tempNo' + i + '" readonly="true" value="' + i + '"></td>';
                    tr += '<td><input type="text" class="form-control date-picker input-sm" id="id_tempTglJadwal' + i + '" name="tempTglJadwal' + i + '" value="' + tglJadwalString + '" ></td>';
                    tr += '<td><input type="text" class="form-control nomor input-sm" id="id_tempJumlah' + i + '" name="tempJumlah' + i + '" value="' + number_format(angsEnd, 2) + '"></td>';
                    tr += '</tr>';
                    $('#id_body_data').append(tr);
                    var total = total + angsEnd;
                    $('#idTotalJadwal').val(number_format(total, 2));
                } else {
                    tr = '<tr class="listdata" id="tr' + i + '">';
                    tr += '<td><input type="text" class="form-control input-sm" id="id_tempNo' + i + '" name="tempNo' + i + '" readonly="true" value="' + i + '"></td>';
                    tr += '<td><input type="text" class="form-control date-picker input-sm" id="id_tempTglJadwal' + i + '" name="tempTglJadwal' + i + '" value="' + tglJadwalString + '" data-date-format="dd-mm-yyyy"></td>';
                    tr += '<td><input type="text" class="form-control nomor input-sm" id="id_tempJumlah' + i + '" name="tempJumlah' + i + '" value="' + number_format(angs, 2) + '"></td>';
                    tr += '</tr>';
                    $('#id_body_data').append(tr);
                    var total = total + angs;
                    $('#idTotalJadwal').val(number_format(total, 2));
                }
            }

        } else if (tipePembayaran == '3') {
            var hargaJual = $('#id_sisaDP').val();
            var total = 0;
            var jmlAngs = $('#id_jmlBayarKali').val();
            hargaJual = parseFloat(CleanNumber(hargaJual));
            jmlAngs = parseFloat(CleanNumber(jmlAngs));
            var angs = hargaJual / jmlAngs;
            angs = Math.round(angs / 1000) * 1000;
            var angsEnd = 0;// angsuran terakhir

            var parts = tglRealisasi.split("-");// tanggal displit
            var tglJadwal = new Date(parts[2], parts[1] - 1, parts[0]);

            tglJadwal.setDate(tglJadwal.getDate() + 14);

            for (var i = 1; i <= jmlAngs; i++) {

                tglJadwal.setMonth(tglJadwal.getMonth() + 1);
                var hari = tglJadwal.getDate();
                var bulan = tglJadwal.getMonth();
                var tahun = tglJadwal.getFullYear();
                //alert(bulan);
                if (hari < 10) {
                    hari = '0' + hari
                }
                if (bulan < 10 && bulan >0) {
                    bulan = '0' + bulan
                }else if(bulan == 0){
                    bulan = '12';
                }
                tglJadwalString = hari + '-' + bulan + '-' + tahun;

                if (i == jmlAngs) {
                    angsEnd = hargaJual - total;

                    tr = '<tr class="listdata" id="tr' + i + '">';
                    tr += '<td><input type="text" class="form-control input-sm" id="id_tempNo' + i + '" name="tempNo' + i + '" readonly="true" value="' + i + '"></td>';
                    tr += '<td><input type="text" class="form-control date-picker input-sm" id="id_tempTglJadwal' + i + '" name="tempTglJadwal' + i + '" value="' + tglJadwalString + '" ></td>';
                    tr += '<td><input type="text" class="form-control nomor input-sm" id="id_tempJumlah' + i + '" name="tempJumlah' + i + '" value="' + number_format(angsEnd, 2) + '"></td>';
                    tr += '</tr>';
                    $('#id_body_data').append(tr);
                    var total = total + angsEnd;
                    $('#idTotalJadwal').val(number_format(total, 2));
                } else {
                    tr = '<tr class="listdata" id="tr' + i + '">';
                    tr += '<td><input type="text" class="form-control input-sm" id="id_tempNo' + i + '" name="tempNo' + i + '" readonly="true" value="' + i + '"></td>';
                    tr += '<td><input type="text" class="form-control date-picker input-sm" id="id_tempTglJadwal' + i + '" name="tempTglJadwal' + i + '" value="' + tglJadwalString + '" data-date-format="dd-mm-yyyy"></td>';
                    tr += '<td><input type="text" class="form-control nomor input-sm" id="id_tempJumlah' + i + '" name="tempJumlah' + i + '" value="' + number_format(angs, 2) + '"></td>';
                    tr += '</tr>';
                    $('#id_body_data').append(tr);
                    var total = total + angs;
                    $('#idTotalJadwal').val(number_format(total, 2));
                }

            }

        } else {
            $('#id_tipePembayaran').focus();
        }
    });
    $('#navitab_2_3').click(function () {
        var tempJadwalRefresh = $('#id_tempRefreshJadwal').val();
        tempJadwalRefresh = parseInt(tempJadwalRefresh);
        if (tempJadwalRefresh < 1) {
        $('#id_refreshJadwal').trigger('click');
        }
        tempJadwalRefresh = tempJadwalRefresh+1;
        $('#id_tempRefreshJadwal').val(tempJadwalRefresh);

    });
    /*$("#navitab_2_1").click(function () {
        $('#idTmpAksiTab').val('1');
    });

    $('#navitab_2_2').click(function () {
        $('#idTmpAksiTab').val('2');
    });
    $('#navitab_2_3').click(function () {
        $('#idTmpAksiTab').val('3');
    });*/
    $('#id_btnBatal').click(function () {
        btnStart();
        resetForm();
        readyToStart();
        tglTransStart();
        $('#id_body_data').empty();
        $('#id_btnModalCust').attr('disabled', false);
    });
    function getDescRumah(idRumah) {
        ajaxModal();
        if (idRumah != '') {
            $.post("<?php echo site_url('/penjualan/getDescRumah'); ?>",
                {
                    'idRumah': idRumah
                }, function (data) {
                    if (data.baris == 1) {
                        //$('#id_proyekId').val(data.id_proyek);
                        $('#id_namaProyek').val(data.nama_proyek);
                        $('#id_namaRumah').val(data.nama_rumah);
                        $('#id_typeRumah').val(data.type);
                        $('#id_blokRumah').val(data.blok);
                        $('#id_luasRumah').val(data.luas);
                        $('#id_hargaRumah').val(data.harga);
                        $('#id_statusJual').val(data.status_jual);
                        hitungHargaStlBooking();
                    } else {
                        alert('Data tidak ditemukan!');
                        $('#id_btnBatal').trigger('click');
                    }
                }, "json");
        }//if kd<>''
    }
    function getDescRumahBooked(idRumah) {
        ajaxModal();
        if (idRumah != '') {
            $.post("<?php echo site_url('/penjualan/getDescRumahBooked'); ?>",
                {
                    'idRumah': idRumah
                }, function (data) {
                    if (data.baris == 1) {
                        //$('#id_proyekId').val(data.id_proyek);
                        $('#id_namaProyek').val(data.nama_proyek);
                        $('#id_namaRumah').val(data.nama_rumah);
                        $('#id_typeRumah').val(data.type);
                        $('#id_blokRumah').val(data.blok);
                        $('#id_luasRumah').val(data.luas);
                        $('#id_hargaRumah').val(data.harga);
                        $('#id_statusJual').val(data.status_jual);
                        $('#id_idPenj').val(data.id_penj);
                        $('#id_hargaBooking').val(data.booking);
                        $('#id_tglBooking').val(data.tgl_booking);

                        $('#id_customerId').val(data.id_cust);
                        $('#id_namaCustomer').val(data.nama_cust);
                        $('#id_alamat').val(data.alamat);
                        $('#id_noId').val(data.no_id);
                        $('#id_noHp').val(data.no_hp);
                        $('#id_noTelp').val(data.no_telp);
                        $('#id_btnModalCust').attr('disabled', true);
                        hitungHargaStlBooking();
                    } else {
                        alert('Data tidak ditemukan!');
                        $('#id_btnBatal').trigger('click');
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

    function hitungHargaStlBooking() {
        var hargaAwal = $('#id_hargaRumah').val();
        hargaAwal = parseFloat(CleanNumber(hargaAwal));
        var hargaBooking = $('#id_hargaBooking').val();
        hargaBooking = parseFloat(CleanNumber(hargaBooking));
        var hargaStlBooking = hargaAwal - hargaBooking
        $('#id_hargaStlBooking').val(number_format(hargaStlBooking, 2));
    }
    function hitungHargaJualDP() {
        var hargaAwal = $('#id_hargaRumah').val();
        hargaAwal = parseFloat(CleanNumber(hargaAwal));
        var hargaBooking = $('#id_hargaBooking').val();
        hargaBooking = parseFloat(CleanNumber(hargaBooking));
        //var hargaJual = hargaAwal - hargaBooking
        var dp = $('#id_DPPersen').val();
        dp = Math.round(parseFloat(CleanNumber(dp)) / 100 * hargaAwal);
        var sisadp = dp - hargaBooking;
        $('#id_hargaJualDP').val(number_format(dp, 2));
        $('#id_sisaDP').val(number_format(sisadp, 2));
    }

    $("#id_tipePembayaran").change(function () {
        var tipe = $(this).val();
        if (tipe == '1') {
            $('#id_jmlBayarKali').attr('readonly', true);
            $('#id_DPPersen').attr('readonly', true);
            $('#id_jmlBayarKali').val('0');
            $('#id_DPPersen').val('0');
            $('#id_hargaJualDP').val('0.00');
            $('#id_sisaDP').val('0.00');
            hitungHargaStlBooking();
        } else if (tipe == '2') {
            $('#id_jmlBayarKali').attr('readonly', false);
            $('#id_DPPersen').attr('readonly', true);
            $('#id_DPPersen').val('0');
            $('#id_hargaJualDP').val('0.00');
            $('#id_sisaDP').val('0.00');
            hitungHargaStlBooking();
        } else if (tipe == '3') {
            $('#id_jmlBayarKali').attr('readonly', false);
            $('#id_DPPersen').attr('readonly', false);
            hitungHargaJualDP();
        }
    });
    $('#id_DPPersen').focusout(function () {
        hitungHargaJualDP();
    });
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