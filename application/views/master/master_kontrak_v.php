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
                    <span class="caption-subject font-red-sunglo bold uppercase">Input Kontrak</span>
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
                <form role="form" method="post" class=""
                      action="<?php echo base_url('master_kontrak/home'); ?>" id="id_formKontrak">
                    <div class="row">
                        <div class="form-body">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Nomor Kontrak</label>
                                            <div class="input-group">
                                                <input id="id_noKontrak" required="required" class="form-control input-sm"
                                                       type="text" name="noKontrak" readonly/>
                                                <span class="input-group-btn">
                                                    <a href="#" class="btn btn-success btn-sm" data-target="#idDivTabelKontrak" id="id_btnModal" data-toggle="modal">
                                                        <i class="fa fa-search fa-fw"/></i>
                                                    </a>
                                                </span>
                                            </div>
                                        </div>
										<div class="col-md-6">
											<label>Tgl Kontrak</label>
                                            <input id="id_tglKontrak" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" 
												class="form-control input-sm date-picker" type="text" name="tglKontrak"/>
										</div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Tgl Mulai</label>
                                            <input id="id_tglMulai" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" required="required" 
												class="form-control date-picker input-sm" type="text" name="tglMulai"/>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Tgl Selesai</label>
                                            <input id="id_tglSelesai" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" required="required" 
												class="form-control date-picker input-sm" type="text" name="tglSelesai"/>
                                        </div>
                                    </div>
                                </div>
								<div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Jumlah Pasal</label>
                                            <input id="id_jmlPasal" required="required" class="form-control input-sm"
                                                   type="text" name="jmlPasal"/>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Nilai Kontrak</label>
                                            <input id="id_nilaiKontrak" required="required" class="form-control input-sm nomor"
                                                   type="text" name="nilaiKontrak"/>
                                        </div>
                                    </div>
                                </div>
								<div class="form-group">
									   <label>Pekerjaan</label>
									   <input id="id_pekerjaan" required="required" class="form-control input-sm" type="text" name="pekerjaan"/>
                                </div>
								<div class="form-group">
									<label>Pihak 1</label>
                                </div>
								<div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
											<label>Nama</label>
											<input id="id_nama" required="required" class="form-control input-sm" type="text" name="nama"/>
										</div>
										<div class="col-md-6">
											<label>Jabatan</label>
											<input id="id_jabatan" class="form-control input-sm" type="text" name="jabatan">	
										</div>
									</div>	
                                </div>  
                            </div>
                            <!--end <div class="col-md-6"> 1 -->
                            <div class="col-md-6">
								<div class="form-group">
									<label>Pihak 2</label>
                                </div>
                                <div class="form-group">
									<label>Perusahaan</label>
									<input id="id_perusahaan" required="required" class="form-control input-sm" type="text" name="perusahaan"/>
                                </div>
                                <div class="form-group">
                                    <label>alamat</label>
                                    <input id="id_alamat" required="required" class="form-control input-sm" type="text" name="alamat"/>
                                </div>
								<div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
											<label>Kota</label>
											<input id="id_kota" required="required" class="form-control input-sm" type="text" name="kota"/>
										</div>
										<div class="col-md-6">
											<label>Kode Pos</label>
											<input id="id_kodepos" class="form-control input-sm" type="text" name="kodepos">	
										</div>
									</div>	
                                </div>
								<div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
											<label>Nama</label>
											<input id="id_nama2" required="required" class="form-control input-sm" type="text" name="nama2"/>
										</div>
										<div class="col-md-6">
											<label>Jabatan</label>
											<input id="id_jabatan2" class="form-control input-sm" type="text" name="jabatan2">	
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
                                    Simpan
                                </button>
                                <button name="btnUbah" onclick="" class="btn yellow" id="id_btnUbah">
                                    Ubah
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
<!--  MODAL Data Supplier -->
<div class="modal fade draggable-modal" id="idDivTabelKontrak" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Data Kontrak</h4>
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
                                <table class="table table-striped table-bordered table-hover text_kanan"
                                       id="idTabelKontrak">
                                    <thead>
                                    <tr>
                                        <th>
                                            No. Kontrak
                                        </th>
                                        <th>
                                            Tanggal Kontrak
                                        </th>
                                        <th>
                                            Nilai
                                        </th>
                                        <th>
                                            Pihak 1
                                        </th>
                                        <th>
                                            Pihak 2
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
                <button type="button" class="btn default" data-dismiss="modal" id="btnCloseModalDataUser">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--  END  MODAL Data Kontrak -->

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
<script src="<?php echo base_url('metronic/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('metronic/admin/pages/scripts/components-pickers.js'); ?>" type="text/javascript"></script>
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
            var table = $('#idTabelKontrak');
            // begin first table
            table.dataTable({
                "ajax": "<?php  echo base_url("/master_kontrak/getKontrakAll"); ?>",
                "columns": [
                    {"data": "noKontrak"},
                    {"data": "tglKontrak"},
                    {"data": "nilai"},
                    {"data": "pihak1"},
                    {"data": "pihak2"}
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
                var idKontrak = $(this).find("td").eq(0).html();

                $('#id_noKontrak').val(idKontrak);
                //getDescSpl(idSpl);
                //$('#').val();
                $('#btnCloseModalDataUser').trigger('click');
                $('#id_btnSimpan').attr('disabled', true);
                $('#id_btnUbah').attr("disabled", false);
                $('#id_btnHapus').attr("disabled", false);
                $('#id_noKontrak').focus();

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
            }
        };
    }();
    btnStart();
    //$("#id_tglKontrak").focus();

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
    });
	$('#id_nilaiKontrak').keyup(function () {
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
	$('#id_nilaiKontrak').focusout(function () {
        var angka = $('#id_nilaiKontrak').val();
        if ($(this).val() == '') {
            $(this).val('0.00');
        } else {
            $('#id_nilaiKontrak').val(number_format(angka, 2));
        }
    });
    $("#id_nilaiKontrak").focus(function () {
        if ($(this).val() == '0' || $(this).val() == '0.00') {
            $(this).val('');
        }
    });
    $("#id_noKontrak").focusout(function () {
        var idKontrak = $(this).val();
        getDescKontrak(idKontrak);
    });
    function getDescKontrak(idKontrak) {
        ajaxModal();
        if (idKontrak != '') {
            $.post("<?php echo site_url('/master_kontrak/getDescKontrak'); ?>",
                {
                    'idKontrak': idKontrak
                }, function (data) {
					console.log(data);
                    if (data.baris == 1) {
                        $('#id_tglKontrak').val(data.tglKontrak);
                        $('#id_tglMulai').val(data.tglAwal);
                        $('#id_tglSelesai').val(data.tglSelesai);
                        $('#id_jmlPasal').val(data.pasal);
                        $('#id_nilaiKontrak').val(data.nilai);
                        $('#id_pekerjaan').val(data.pekerjaan);
                        $('#id_nama').val(data.nama1);
                        $('#id_jabatan').val(data.jabatan1);
                        $('#id_perusahaan').val(data.perusahaan);
                        $('#id_alamat').val(data.alamat);
						$('#id_kota').val(data.kota);
						$('#id_kodepos').val(data.kodepos);
                        $('#id_nama2').val(data.nama2);
						$('#id_jabatan2').val(data.jabatan2);
						/*
                         $('#').val(data.); */
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
            url: "<?php echo base_url(); ?>master_kontrak/simpan",
            data: dataString,
            success: function (data) {
                $('#id_Reload').trigger('click');
                $('#id_btnBatal').trigger('click');
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
            url: "<?php echo base_url(); ?>master_kontrak/ubah",
            data: dataString,

            success: function (data) {
                $('#id_Reload').trigger('click');
                $('#id_btnBatal').trigger('click');
                UIToastr.init(data.tipePesan, data.pesan);
            }

        });
        event.preventDefault();
    }
    function ajaxHapus() {
        ajaxModal();
        var idKontrak = $('#id_noKontrak').val();
        idKontrak = idKontrak.trim();
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "<?php echo base_url(); ?>master_kontrak/hapus",
            data: {idSpl: idSpl},
            success: function (data) {
                $('#id_Reload').trigger('click');
                $('#id_btnBatal').trigger('click');
                UIToastr.init(data.tipePesan, data.pesan);
            }

        });
        event.preventDefault();
    }
    $('#id_formKontrak').submit(function (event) {
        dataString = $("#id_formKontrak").serialize();
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