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
                    <span class="caption-subject font-red-sunglo bold uppercase">Booking</span>
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
                <form role="form" method="post" class="cls_from_booking"
                      action="<?php echo base_url('booking/home'); ?>" id="id_formBooking">
                    <div class="row">
                        <div class="form-body">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Id rumah </label>
                                            <div class="input-group">
                                                <input id="id_rumahId" required="required" class="form-control input-sm"
                                                       type="text" name="rumahId" readonly/>
                                                <span class="input-group-btn">
                                                    <a href="#" class="btn btn-success btn-sm" data-target="#idDivTabelRumah"
                                                       id="id_btnModalRmh" data-toggle="modal">
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
                                            <label>Nama Rumah </label>
                                            <input id="id_namaRumah" required="required" class="form-control  input-sm"
                                                   type="text" name="namaRumah" placeholder="" readonly/>
                                        </div>
                                        <div class="col-md-6">
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
                                            <input id="id_hargaRumah" required="required" class="form-control input-sm"
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
                    <hr>
                    <div class="row">
                        <div class="form-body">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Tanggal booking</label>
                                            <input id="id_tgltrans" required="required"
                                                   class="form-control input-sm"
                                                   type="text" name="tglTrans" readonly/>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Nominal booking </label>
                                            <input id="id_hargaBooking" required="required" class="form-control nomor input-sm"
                                                   type="text" name="hargaBooking" placeholder=""/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end <div class="col-md-6"> 1 -->

                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Keterangan </label>
                                            <textarea rows="2" cols="" name="keterangan" id="id_keterangan"
                                                      class="form-control input-sm" placeholder="" ></textarea>
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
                                <table class="table table-striped table-bordered table-hover text_kanan" id="idTabelRumah">
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
                <button type="button" class="btn default" data-dismiss="modal" id="btnCloseModalDataRumah">Close</button>
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
<?php echo  $this->session->userdata('toastrJS'); ?>
<?php echo  $this->session->userdata('select2JS'); ?>
<?php echo  $this->session->userdata('jquery-dataTablesJS'); ?>
<?php echo  $this->session->userdata('dataTables-bootstrapJS'); ?>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- END CORE PLUGINS -->
<?php echo  $this->session->userdata('metronicJS'); ?>
<?php echo  $this->session->userdata('layoutJS'); ?>
<?php echo  $this->session->userdata('demoJS'); ?>
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
                "ajax": "<?php  echo base_url("/booking/getRumahAll"); ?>",
                "columns": [
                    { "data": "id_rumah" },
                    { "data": "nama_proyek" },
                    { "data": "nama_rumah" },
                    { "data": "luas" },
                    { "data": "harga" },
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
                var idRumah = $(this).find("td").eq(0).html();
                $('#id_rumahId').val(idRumah);
                getDescRumah(idRumah);
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
    function getDescRumah(idRumah){
        ajaxModal();
        if (idRumah != '') {
            $.post("<?php echo site_url('/master_rumah/getDescRumah'); ?>",
                {
                    'idRumah': idRumah
                },function (data) {
                    if (data.baris == 1) {
                        //$('#id_proyekId').val(data.id_proyek);
                        $('#id_namaProyek').val(data.nama_proyek);
                        $('#id_namaRumah').val(data.nama_rumah);
                        $('#id_typeRumah').val(data.type);
                        $('#id_blokRumah').val(data.blok);
                        $('#id_luasRumah').val(data.luas);
                        $('#id_hargaRumah').val(data.harga);
                    }else{
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
			url:"<?php echo base_url(); ?>booking/ubah",
			data:dataString,
	
			success:function (data) {
				$('#id_ReloadRumah').trigger('click');
				$('#id_btnBatal').trigger('click');
				UIToastr.init(data.tipePesan,data.pesan);
			}
	
		});
		event.preventDefault();
	}

    $('#id_formBooking').submit(function (event) {
		dataString = $("#id_formBooking").serialize();
        var aksiBtn       = $('#idTmpAksiBtn').val();
        var hargaBooking  = $('#id_hargaBooking').val();
        if(hargaBooking == '0.00'){
            alert("Nominal booking tidak boleh 0.");
            $('#id_hargaBooking').focus();
            return false;
        }else{
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
        }

    }); 
    
</script>


<!-- END JAVASCRIPTS -->