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
                    <span class="caption-subject font-red-sunglo bold uppercase">Perintah Pembayaran</span>
                </div>
                <div class="actions">
                    <a href="javascript:;" class="btn btn-default btn-sm" onclick="cetak();">
                        <i class="fa fa-print"></i> Cetak </a>
                    <a class="btn btn-icon-only btn-default btn-sm fullscreen" href="javascript:;"
                       data-original-title="" title="">
                    </a>
                </div>

                <!-- <div class="actions">
                	<a href="javascript:;" class="btn blue btn-sm">
						<i class="fa fa-print"></i> Cetak  </a>
                </div> -->
                <!-- <div class="tools">
                    <a href="javascript:;" class="collapse">
                    </a>
                    <a href="javascript:;" class="fullscreen">
                    </a>
                </div> -->
            </div>
            <div class="portlet-body">
                <div>
                	<span id="event_result">
                    </span>
                </div>
                <form role="form" method="post"
                      action="<?php echo base_url('jurnal_adv/home'); ?>" id="id_formJAdvance">
                    <div class="row">
                        <div class="form-body">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <label>No PP</label>
                                            <div class="input-group">
                                                <input id="id_idJAdvance" required="required" class="form-control input-sm"
                                                       type="text" name="idJAdvance" readonly/>
                                                <input id="id_id" type="hidden" name="id">
                                        <span class="input-group-btn">
                                        <a href="#" class="btn btn-success btn-sm" data-target="#idDivTabelPP"
                                           id="id_btnModal" data-toggle="modal">
                                            <i class="fa fa-search fa-fw"/></i>
                                        </a>
                                        </span>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <label>Tgl PP</label>
                                            <input id="id_tgltrans" required="required" class="form-control input-sm "
                                                   type="text" name="tgltrans" readonly/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <label>No Advance </label>
                                            <div class="input-group">
                                                    <input id="id_idAdvance" required="required"
                                                           class="form-control input-sm"
                                                           type="text" name="idAdvance" readonly/>
                                                <span class="input-group-btn">
                                                    <a href="#" class="btn btn-success btn-sm" data-target="#idDivTabelAdv"
                                                    id="id_btnModal" data-toggle="modal">
                                                        <i class="fa fa-search fa-fw"/></i>
                                                    </a>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                                <label>Tgl Request</label>
                                                <input id="id_tglReq" required="required" class="form-control input-sm"
                                                       type="text" name="tglReq" readonly/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input id="id_kywId" required="required" class="form-control hidden"
                                           type="text" name="kywId" readonly/>
                                    <label>Nama karyawan (Requester) </label>
                                    <input id="id_namaKyw" required="required" class="form-control input-sm"
                                           type="text" name="namaKyw" readonly/>

                                </div>
                                <div class="form-group">
                                    <label>Departemen/Bagian</label>
                                    <input id="id_deptKyw" required="required" class="form-control input-sm"
                                           type="text" name="deptKyw" readonly/>
                                </div>
                            </div>
                            <!--end <div class="col-md-6"> 1 -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Dibayarkan ke</label>
                                    <?php
                                    $data = array();
                                    $data[''] = '';
                                    foreach ($payto as $row):
                                        $data[$row['id_kyw']] = $row['nama_kyw'];
                                    endforeach;
                                    echo form_dropdown('payto', $data, '',
                                        'disabled id="id_payTo" class="form-control input-sm"');
                                    ?>
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
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Proyek</label>
                                    <?php
                                    $data = array();
                                    $data[''] = '';
                                    foreach ($proyek as $row):
                                        $data[$row['id_proyek']] = $row['nama_proyek'];
                                    endforeach;
                                    echo form_dropdown('proyek', $data, '',
                                        'id="id_proyek" class="form-control input-sm" readonly="true"');
                                    ?>
                                </div>
								<div class="form-group">
                                    <div class="row">
										<div class="col-md-7">
												<label>Kode UM</label>
												<div class="input-group">
													<input id="id_idUm" required="required"
															   class="form-control input-sm"
															   type="text" name="idUm" readonly/>
													<span class="input-group-btn">
														<a href="#" class="btn btn-success btn-sm" data-target="#idDivTabelJA"
														id="id_btnModal" data-toggle="modal">
															<i class="fa fa-search fa-fw"/></i>
														</a>
													</span>
												</div>
										</div>
										<div class="col-md-5">
											<label>Nama Akun UM</label>
												<input id="id_namaUm" required="required" class="form-control input-sm"
													   type="text" name="namaUm" readonly/>			   
										</div>	
									</div>
								</div>	
                                <div class="form-group">
                                    <label>Kode Cash Flow</label>
                                    <div class="input-group">
                                        <input id="id_kodeCflow" required="required" class="form-control input-sm"
                                               type="text" name="kodeCflow" readonly/>
                                        <span class="input-group-btn">
														<a href="#" class="btn btn-success btn-sm" data-target="#idDivTabelCflow"
                                                           id="id_btnModal2" data-toggle="modal">
                                                            <i class="fa fa-search fa-fw"/></i></a>
													</span>
                                    </div>
                                </div>
								<div class="form-group">
                                    <div class="row">
										<div class="col-md-6">
												<label>Kode Bayar</label>
												<input id="id_kodeBayar" class="form-control input-sm"
													   type="text" name="kodeBayar" readonly/>
										</div>
										<div class="col-md-6">
											<label>&nbsp;</label>
												<input id="id_namaBayar" class="form-control input-sm"
													   type="text" name="namaBayar" readonly/>			   
										</div>	
									</div>
								</div>
                            </div>
                        </div>
                        <input type="text" id="idTmpAksiBtn" class="hidden">
                    </div>
                    <hr>
                    <div class="row">
                        <div class="form-body">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <textarea rows="2" cols="" name="keterangan" id="id_keterangan"
                                              class="form-control input-sm" readonly/>
                                    </textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Jumlah </label>
                                    <input id="id_jumlah" class="form-control input-sm nomor"
                                           type="text" name="jumlah" placeholder="" readonly/>
                                </div>
                                <div class="form-group">
                                    <label>Terpakai </label>
                                    <input id="id_terpakai"  class="form-control input-sm nomor"
                                           type="text" name="terpakai" placeholder=""/>
                                </div>
                                <div class="form-group">
                                    <label>Sisa/lebih </label>
                                    <input id="id_sisa"  class="form-control input-sm nomor"
                                           type="text" name="sisa" placeholder="" readonly/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>No settlement </label>
                                    <input id="id_noSettlement" class="form-control input-sm"
                                           type="text" name="noSettlement" placeholder=""/>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal </label>
                                    <input id="id_tglSettlement" class="form-control input-sm"
                                           type="text" name="tglSettlement" placeholder=""/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--END ROW 2 -->
                    <!-- ROW 3 -->

                    <!--END ROW 3 -->
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
<div class="modal fade draggable-modal" id="idDivTabelPP" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Data Perintah Pembayaran</h4>
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
                                <table class="table table-striped table-bordered table-hover text_kanan" id="idTabelPp">
                                    <thead>
                                    <tr>
                                        <th>
                                            Id Perintah Pembayaran
                                        </th>
                                        <th>
                                            Id Advance
                                        </th>
                                        <th>
                                            Nama Karyawan
                                        </th>
                                        <th>
                                            Departemen
                                        </th>
                                        <th>
                                            Jumlah Uang
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
                <button type="button" class="btn default" data-dismiss="modal" id="btnCloseModalDataJadv">Close</button>
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
<!--  END  MODAL Data Karyawan -->
<!--  MODAL Data Perkiraan -->
	<div class="modal fade draggable-modal" id="idDivTabelJA" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Data Jenis Advance</h4>
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
                                       id="idTabelJA">
                                    <thead>
                                    <tr>
                                        <th>
                                            Id Jenis Advance
                                        </th>
                                        <th>
                                            Nama Account
                                        </th>
										<th>
                                            No Rekening
                                        </th>
                                        <th>
                                            Kode Perkiraan
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
                <button type="button" class="btn default" data-dismiss="modal" id="btnCloseModalDataJA">Close</button>
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
<script>
    jQuery(document).ready(function () {
        Metronic.init(); // init metronic core components
        Layout.init(); // init current layout
        Demo.init(); // init demo features
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
    $('#id_tgl').datepicker({
        rtl: Metronic.isRTL(),
        orientation: "left",
        autoclose: true
    });
    var TableManaged = function () {
        var initTable1 = function () {
            var table = $('#idTabelPp');
            // begin first table
            table.dataTable({
                "ajax": "<?php  echo base_url("/jurnal_adv/getPpAll"); ?>",
                "columns": [
                    {"data": "idPp"},
                    {"data": "idAdv"},
                    {"data": "namaKyw"},
                    {"data": "dept"},
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
                var idJadv = $(this).find("td").eq(0).html();
                var idAdv = $(this).find("td").eq(1).html();
                $('#id_idAdvance').val(idAdv);
                $('#id_idJAdvance').val(idJadv);
                getDescAdv(idAdv);
                getDescJadv(idJadv);
				getCashFlow(idAdv);
                $('#btnCloseModalDataJadv').trigger('click');
                $('#id_btnSimpan').attr("disabled", true);
                $('#id_btnHapus').attr("disabled", false);
                $('#id_btnUbah').attr("disabled", false);
            });

            tableWrapper.find('.dataTables_length select').addClass("form-control input-xsmall input-inline"); // modify table per page dropdown
        }
        var initTable2 = function () {
            var table = $('#idTabelAdv');
            // begin first table
            table.dataTable({
                "ajax": "<?php  echo base_url("/jurnal_adv/getAdvAll"); ?>",
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
                $('#id_idAdvance').val(idAdv);
                //$a = $('#id_idJAdvance').val();
                $('#btnCloseModalDataAdv').trigger('click');
                getCashFlow(idAdv);
				getDescAdv(idAdv);
            });

            tableWrapper.find('.dataTables_length select').addClass("form-control input-xsmall input-inline"); // modify table per page dropdown
        }
        var initTable3 = function () {
            //var table = $('#id_TabelPerk');
            // begin first table
            var table = $('#idTabelJA').dataTable({
                "ajax": "<?php  echo base_url("/jurnal_adv/getTypeAdv"); ?>",
                "columns": [
                    {"data": "id_account"},
                    {"data": "nama"},
                    {"data": "norek"},
					{"data": "kode_perk"}
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
				var nama = $(this).find("td").eq(0).html();
                var typePerk = $(this).find("td").eq(3).html();
				$("#id_idUm").val(nama);
				$("#id_namaUm").val(typePerk);
				$('#btnCloseModalDataJA').trigger('click');
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
                $('#idTxtTempJnsKode').val('2');
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
    $("#id_idAdvance").focus();

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
        $('.textkosong').text('');
    });
    $("#id_tglJT").focusout(function () {
        if ($(this).val() != '') {
            var tgl = $(this).val();
            //alert(tgl);
            var vbl = "#id_tglJT";
            validatedate(tgl, vbl);
        }

    });
    function getDescAdv(idAdv){
        ajaxModal();
        if (idAdv != '') {
            $.post("<?php echo site_url('/jurnal_adv/getDescAdvCashFlow'); ?>",
                {
                    'idAdv': idAdv
                }, function (data) {
                    if (data.baris == 1) {
                        $('#id_kywId').val(data.id_kyw);
                        $('#id_namaKyw').val(data.nama_kyw);
                        $('#id_deptKyw').val(data.nama_dept);
                        $('#id_uangMuka').val(data.jml_uang);
                        $('#id_tglReq').val(data.tgl_trans);
                        $('#id_payTo').val(data.pay_to);
                        $('#id_namaPemilikAkunBank').val(data.nama_akun_bank);
                        $('#id_noAkunBank').val(data.no_akun_bank);
                        $('#id_namaBank').val(data.nama_bank);
                        $('#id_keterangan').val(data.keterangan);
                        $('#id_proyek').val(data.id_proyek);
                        $('#id_jumlah').val(data.jml_uang);
                    } else {
                        alert('Data tidak ditemukan!');
                        $('#id_btnBatal').trigger('click');
                    }
                }, "json");
        }
    }
	
    function getDescJadv(idJadv) {
        ajaxModal();
        if (idJadv != '') {
            $.post("<?php echo site_url('/jurnal_adv/getDescJadv'); ?>",
                {
                    'idJadv': idJadv
                }, function (data) {
                    if (data.baris == 1) {
						console.log(data);
                        $('#id_idJAdvance').val(data.id_pp);
                        $('#id_idAdvance').val(data.id_advance);
                        $('#id_tgl').val(data.tanggal);
						$('#id_kodeBayar').val(data.kode_bayar);
						$('#id_namaBayar').val(data.nama_kdbayar);
						$('#id_idUm').val(data.id_account);
						$('#id_namaUm').val(data.nama_account);	
                    }else{
                        alert('Data tidak ditemukan!');
                        $('#id_btnBatal').trigger('click');
                    }
                }, "json");
        }
    }
	
	function getCashFlow(idAdv){
        ajaxModal();
        if (idAdv != '') {
            $.post("<?php echo site_url('/jurnal_adv/getCashFlow'); ?>",
                {
                    'idAdv': idAdv
                }, function (data) {
                    if (data.baris == 1) {
                        $('#id_kodeCflow').val(data.id_cf);
                    } else {
                        alert('Data tidak ditemukan!');
                    }
                }, "json");
        }
    }
	
    function ajaxSubmitJAdvance(){
        ajaxModal();
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "<?php echo base_url(); ?>jurnal_adv/simpan",
            data: dataString,
            success: function (data) {
                $('#id_Reload').trigger('click');
                $('#id_idJAdvance').val(data.id);
                $('#id_btnSimpan').attr("disabled",true);
                //readyToStart();
                startCheckBox();
                UIToastr.init(data.tipePesan, data.pesan);
            }
        });
        event.preventDefault();
    }
	
    function ajaxUbahJAdvance() {
        ajaxModal();
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "<?php echo base_url(); ?>jurnal_adv/ubah",
            data: dataString,
            success: function (data) {
                $('#id_Reload').trigger('click');
                $('#id_idJAdvance').val(data.id);
				UIToastr.init(data.tipePesan, data.pesan);
            }
        });
        event.preventDefault();
    }
    function ajaxHapusJAdvance() {
        ajaxModal();
        var idJAdvance = $('#id_idJAdvance').val();
        idJAdvance = idJAdvance.trim();
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "<?php echo base_url(); ?>jurnal_adv/hapus",
            data: {idJAdvance: idJAdvance},
            success: function (data) {
                $('#id_Reload').trigger('click');
                $('#id_btnBatal').trigger('click');
                UIToastr.init(data.tipePesan, data.pesan);
            }
        });
        event.preventDefault();
    }
    $('#id_formJAdvance').submit(function (event) {
        dataString = $("#id_formJAdvance").serialize();
        var aksiBtn = $('#idTmpAksiBtn').val();
        var kodeUM = $('#id_idUm').val();

        if (aksiBtn == '1') {
            if(kodeUM == ''){
                alert("Kode UM tidak boleh kosong.");
                return false;
            }else{
                var r = confirm('Anda yakin menyimpan data ini?');
                if (r == true) {
                    ajaxSubmitJAdvance();
                } else {//if(r)
                    return false;
                }
            }
        } else if (aksiBtn == '2') {
            var r = confirm('Anda yakin merubah data ini?');
            if (r == true) {
                ajaxUbahJAdvance();
            } else {//if(r)
                return false;
            }
        } else if (aksiBtn == '3') {
            var r = confirm('Anda yakin menghapus data ini?');
            if (r == true) {
                ajaxHapusJAdvance();
            } else {//if(r)
                return false;
            }
        }
    });
    function cetak() {
        var idJadv = $('#id_idJAdvance').val();
        if (idJadv == '') {
            alert('Silahkan pilih Id Perintah Pembayaran');
        } else {
            window.open("<?php echo base_url('jurnal_adv/cetak/'); ?>/" + idJadv, '_blank');
        }
    }
</script>


<!-- END JAVASCRIPTS -->