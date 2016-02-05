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
                    <span class="caption-subject font-red-sunglo bold uppercase">Data Customer</span>
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
                <form role="form" method="post" class="cls_from_rumah"
                      action="<?php echo base_url('master_customer/home'); ?>" id="id_formCustomer">
                    <div class="row">

                        <div class="form-body">
                            <div class="col-md-6">
								<div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Id customer </label>
                                            <div class="input-group">
                                                    <input id="id_customerId" required="required" class="form-control input-sm"
                                                   type="text" name="customerId" readonly/>
                                                <span class="input-group-btn">
                                                    <a href="#" class="btn btn-success btn-sm" data-target="#idDivTabelCustomer"
                                                    id="id_btnModalRmh" data-toggle="modal">
                                                    <i class="fa fa-search fa-fw"/></i> 
                                                    </a>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>No Id</label>
                                            <input id="id_noId" required="required" class="form-control input-sm"
                                                   type="text" name="noId"/>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Nama customer</label>
                                            <input id="id_namaCustomer" required="required" class="form-control  input-sm"
                                                   type="text" name="namaCustomer" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <label>Alamat</label>
                                            <textarea rows="2" cols="" name="alamat" id="id_alamat"
                                              class="form-control input-sm"></textarea>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Email</label>
                                            <input id="id_email" required="required" class="form-control  input-sm"
                                                   type="email" name="email" />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>No HP</label>
                                                    <input id="id_noHp" required="required" class="form-control input-sm"
                                                   type="text" name="noHp"/>
                                        </div>
                                        <div class="col-md-6">
                                            <label>No telp</label>
                                                <input id="id_noTelp" required="required" class="form-control input-sm"
                                                   type="text" name="noTelp"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>No NPWP</label>
                                            <input id="id_noNpwp" required="required" class="form-control input-sm"
                                                   type="text" name="noNpwp"/>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Nama (NPWP)</label>
                                            <input id="id_namaNpwp" required="required" class="form-control  input-sm"
                                                   type="text" name="namaNpwp" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <label>Alamat (NPWP)</label>
                                            <textarea rows="2" cols="" name="alamatNpwp" id="id_alamatNpwp"
                                                      class="form-control input-sm"></textarea>
                                        </div>
                                        <div class="col-md-4">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end <div class="col-md-6"> 1 -->

                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>No rek GL</label>
                                            <div class="input-group">
                                                <input id="id_GL" required="required" class="form-control input-sm"
                                                       type="text" name="GL" readonly/>
                                                <span class="input-group-btn">
                                                    <a href="#" class="btn btn-success btn-sm" data-target="#idDivTabelPerk"
                                                       id="id_btnModal" data-toggle="modal">
                                                        <i class="fa fa-search fa-fw"/></i>

                                                    </a>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Nama rek GL</label>
                                    <input id="id_namaGL" readonly class="form-control input-sm"
                                           type="text" name="namaGL"/>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>No Akun Bank</label>
                                            <input id="id_noRek" required="required" class="form-control  input-sm"
                                                   type="text" name="noRek" />
                                        </div>
                                        <div class="col-md-6">
                                            <label>Bank</label>
                                            <input id="id_bankRek" required="required" class="form-control  input-sm"
                                                   type="text" name="bankRek" />

                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <label>No Virtual Account Pembayaran</label>
                                            <input id="id_noVA" required="required" class="form-control  input-sm"
                                                   type="text" name="noVA" />
                                        </div>
                                        <div class="col-md-4">

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <label>Atas Nama</label>
                                            <input id="id_namaVA" required="required" class="form-control  input-sm"
                                                   type="text" name="namaVA" value="PT Berkah Graha Mandiri" />
                                        </div>
                                        <div class="col-md-4">

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <label>Bank</label>
                                            <input id="id_bankVA" required="required" class="form-control  input-sm"
                                                   type="text" name="bankVA" value="Mandiri Cab Kemang Jakarta" />
                                        </div>
                                        <div class="col-md-4">

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
						<!-- HIDDEN INPUT -->
						<input type="text" id="idTmpAksiBtn" class="hidden">
						<!-- END HIDDEN INPUT -->

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
                                    <table class="table table-striped table-bordered table-hover text_kanan" id="idTabelCustomer">
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
				<button type="button" class="btn default" data-dismiss="modal" id="btnCloseModalDataCustomer">Close</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!--  END  MODAL Data Karyawan -->
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

            var table = $('#idTabelCustomer');

            // begin first table
            table.dataTable({
                "ajax": "<?php  echo base_url("/master_customer/getCustomerAll"); ?>",
                "columns": [
                    { "data": "id_cust" },
                    { "data": "nama_cust" },
                    { "data": "alamat" },
                    { "data": "no_id" },
                    { "data": "no_hp" },
                    { "data": "no_telp" }
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
                /*var nama = $(this).find("td").eq(1).html();
                var alamat = $(this).find("td").eq(2).html();
                var noId = $(this).find("td").eq(3).html();
                var noHp = $(this).find("td").eq(4).html();
                var noTelp = $(this).find("td").eq(5).html();*/

                $('#id_customerId').val(idCustomer);
                $('#id_customerId').focus();
                /*$('#id_namaCustomer').val(nama);
                $('#id_alamat').val(alamat);
                $('#id_noId').val(noId);
                $('#id_noHp').val(noHp);
                $('#id_noTelp').val(noTelp);*/
                getDescCust(idCustomer);

                $('#btnCloseModalDataCustomer').trigger('click');
                $('#id_btnSimpan').attr('disabled',true);
                $('#id_btnUbah').attr("disabled",false);
                $('#id_btnHapus').attr("disabled",false);
                $('#id_customerId').focus();
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
                //$('#idTxtTempJnsKode').val('1');
                if(typePerk == 'D'){
                    var kodePerk = $(this).find("td").eq(0).html();
                    $('#id_GL').val(kodePerk);
                    var namaPerk = $(this).find("td").eq(2).html();
                    $('#id_namaGL').val(namaPerk);

                    $("#btnCloseModalPerk").trigger("click");
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
                initTable3();
            }
        };
    }();
    btnStart();
    readyToStart();
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
        $('#id_namaVA').val('PT Berkah Graha Mandiri');
        $('#id_bankVA').val('Mandiri Cab Kemang Jakarta');
        $('#id_btnModalProyek').attr('disabled',false);
	});
    function getDescCust(idCust) {
        ajaxModal();
        if (idCust != '') {
            $.post("<?php echo site_url('/master_customer/getDescCust'); ?>",
                {
                    'idCust': idCust
                }, function (data) {
                    if (data.baris == 1) {
                        $('#id_customerId').val(data.id_cust);
                        $('#id_noId').val(data.no_id);
                        $('#id_namaCustomer').val(data.nama_cust);
                        $('#id_alamat').val(data.alamat);
                        $('#id_email').val(data.email);
                        $('#id_noHp').val(data.no_hp);
                        $('#id_noTelp').val(data.no_telp);
                        $('#id_noNpwp').val(data.no_npwp);
                        $('#id_namaNpwp').val(data.nama_npwp);
                        $('#id_alamatNpwp').val(data.alamat_npwp);
                        $('#id_noRek').val(data.no_akun_bank);
                        $('#id_bankRek').val(data.bank_akun_bank);
                        $('#id_GL').val(data.kode_perk);
                        $('#id_namaGL').val(data.nama_perk);
                        $('#id_noVA').val(data.no_va);
                        $('#id_namaVA').val(data.nama_va);
                        $('#id_bankVA').val(data.bank_va);
                        /*
                         $('#').val(data.); */
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
			url:"<?php echo base_url(); ?>master_customer/simpan",
			data:dataString,
	
			success:function (data) {
				$('#id_ReloadCustomer').trigger('click');
				$('#id_btnBatal').trigger('click');
				UIToastr.init(data.tipePesan,data.pesan);
			}
	
		});
		event.preventDefault();
	}
	function ajaxUbah(){
		ajaxModal();
		$.ajax({
			type:"POST",
			dataType: "json",
			url:"<?php echo base_url(); ?>master_customer/ubah",
			data:dataString,
	
			success:function (data) {
				$('#id_ReloadCustomer').trigger('click');
				$('#id_btnBatal').trigger('click');
				UIToastr.init(data.tipePesan,data.pesan);		
			}
	
		});
		event.preventDefault();
	}
	function ajaxHapus(){
		ajaxModal();
		var idCustomer	= $('#id_customerId').val();
		idCustomer		= idCustomer.trim();
		$.ajax({
			type:"POST",
			dataType: "json",
			url:"<?php echo base_url(); ?>master_customer/hapus",
			data:{idCustomer : idCustomer},
			success:function (data) {
				$('#id_ReloadCustomer').trigger('click');
				$('#id_btnBatal').trigger('click');
				UIToastr.init(data.tipePesan,data.pesan);			
			}
	
		});
		event.preventDefault();
	}
    $('#id_formCustomer').submit(function (event) {
		dataString = $("#id_formCustomer").serialize();
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