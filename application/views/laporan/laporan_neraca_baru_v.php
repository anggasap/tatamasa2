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
                    <span class="caption-subject font-red-sunglo bold uppercase">Neraca</span>
                </div>
                <div class="actions">
					<a class="btn btn-icon-only btn-default btn-sm fullscreen" href="javascript:;" data-original-title="" title="">
					</a>
				</div>                
            </div>
            <div class="portlet-body">
                <div>
                	<span id="event_result">
                    </span>
                </div>
                <form role="form" method="post" id="id_laporanNeraca">
                    <div class="row">
                        <div class="form-body">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Tanggal</label>
									<input id="id_tanggal" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" class="form-control date-picker input-sm" type="text" name="tanggalAwal" />                                                   
                                </div>
                            </div>
							<div class="col-md-3">
								<div class="form-group">
                                    <label>Bentuk Neraca</label>
                                    <select id="id_bentuk" class="form-control input-sm select2me" name="bentuk">
                                        <option value=""></option>
                                        <option value="T">Bentuk T</option>
                                        <option value="G">Garis Lurus</option>
                                    </select>
								</div>
							</div>   
                            <!--end <div class="col-md-6"> 1 -->
                            <div class="col-md-3">
								<div class="form-group">
                                    <label>&nbsp;</label>
										<div class="checkbox-list">
												<label>
												<input type="checkbox" value="1" name="nol" id="id_nol">Tampilkan Hasil Nol</label>
										</div>
								</div>		
                            </div>
                            <div class="col-md-3">
								<div class="form-group">
                                    <label>&nbsp;</label>
										<div class="checkbox-list">
												<label>
												<input type="checkbox" value="1" name="tipe" id="id_tipe">Hanya akun General</label>
										</div>
								</div>		
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-actions">
                                <a href="javascript:;" class="btn blue btn-medium" onclick="cetak();">
								<i class="fa fa-print"></i> Cetak </a>
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
<script>
    jQuery(document).ready(function () {
        Metronic.init(); // init metronic core components
        Layout.init(); // init current layout
        Demo.init(); // init demo features
        //UITree.init();
        //TableManaged.init();
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
    //Ready Doc
    btnStart();
 	$( "#id_btnSimpan" ).click(function() {
		$('#idTmpAksiBtn').val('1');
	});
	    
	$('#id_btnBatal').click(function(){
		btnStart();
		resetForm();
	});
		
	function cetak(){
		var tglAwal = $('#id_tanggal').val();
		var bentuk = $('#id_bentuk').val();
		var nol = $("#id_nol").attr("checked") ? 1 : 0;
		var tipe = $("#id_tipe").attr("checked") ? 1 : 0;
		if(tglAwal == ''){
			alert('Silahkan pilih tanggal');
			return false;
		}
		if(bentuk == ''){
			alert('Silahkan pilih bentuk neraca');
			return false;
		}
		if(bentuk == 'T'){
			window.open("<?php echo base_url('laporan_neraca_c_baru/print_neraca_t/'); ?>/"+tglAwal+"/"+nol+"/"+tipe, '_blank');
		}else{
			window.open("<?php echo base_url('laporan_neraca_c_baru/print_neraca/'); ?>/"+tglAwal+"/"+nol+"/"+tipe, '_blank');	
		}
	}
    
	/*function save(){
		var tglAwal = $('#id_tanggalAwal').val();
		var tglAkhir = $('#id_tanggalAkhir').val();
		if(tglAwal == ''){
			alert('Silahkan pilih tanggal awal');
			return false;
		}
		if(tglAkhir == ''){
			alert('Silahkan pilih tanggal akhir');
			return false;
		}else{
			window.open("<?php echo base_url('laporan_rekap_adv/cetak_excel/'); ?>/"+tglAwal+"/"+tglAkhir, '');	
		}
	}*/	
    
</script>


<!-- END JAVASCRIPTS -->