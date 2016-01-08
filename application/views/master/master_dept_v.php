<!-- BEGIN PAGE BREADCRUMB -->

<!-- END PAGE BREADCRUMB -->
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<!-- KONTEN DI SINI YA -->
<div class="row">
    <div class="col-md-6">
		<div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs  font-red-sunglo"></i>
                    <span class="caption-subject font-red-sunglo bold uppercase">Master Departemen</span>
                </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse">
                    </a>
                    <a href="#portlet-config" data-toggle="modal" class="config">
                    </a>
                    <a href="javascript:;" class="reload">
                    </a>
                    <a href="javascript:;" class="remove">
                    </a>
                </div>
            </div>
            <div class="portlet-body">
            	<div>
                	<span id="event_result">

                    </span>
                </div>
                <div>
                	<form role="form"  method="post" id="id_from_master_dept"  action="<?php echo base_url('master_dept/home'); ?>">
                        <div class="form-body">
                           
                            <div class="form-group">
                                <label>Nama departemen</label>
                                <div class="input-group">

                                        <input id="id_id_dept" class="form-control" type="hidden" name="idDept" placeholder=""/>
                                        <input id="id_desc_dept" required="required" class="form-control input-sm" type="text" name="descDept" placeholder=""/>
                                    <span class="input-group-btn">
                                    <a href="#" class="btn btn-success btn-sm" data-target="#id_modal_group_user" data-toggle="modal">
                                                                    <i class="fa fa-search fa-fw"/></i></a>
                                    </span>
                                    <input type="text" id="idTmpAksiBtn" class="hidden">
<!--
                                    <span class="input-group-addon">
                                    <i class="fa fa-list"></i>
                                    </span>
                                    <input type="text" name="menu_allow" class="form-control" placeholder="" id="id_menu_allow">-->
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button name="btnSimpan" class="btn blue" id="id_btnSimpan"><!--<i class="fa fa-check"></i>--> Simpan</button>
                            <button name="btnUbah" onclick="" class="btn yellow" id="id_btnUbah"><!--<i class="fa fa-edit"></i>--> Ubah</button>
                            <button name="btnHapus" class="btn red" id="id_btnHapus"><!--<i class="fa fa-trash"></i>--> Hapus</button>
                            <button id="id_btnBatal" type="reset" class="btn default">Batal</button>
                        </div>
                    </form>

                </div>
                
            </div>
        </div><!-- end <div class="portlet green-meadow box"> -->
    </div><!-- end <div class="col-md-6"> -->
    
    <div class="col-md-6">
		
    </div><!-- end <div class="col-md-6"> -->
</div>
<div class="row">
    <div class="col-md-6">
    	
    </div>
</div>

<!-- END PAGE CONTENT-->
<!-- /.modal -->
<div id="id_modal_group_user" class="modal fade" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button id="id_button_close_modal" type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Master Departemen</h4>
            </div>
            <form id="id_form_trans_pb" role="form" method="post">
            <div class="modal-body">
                <div class="scroller" style="height:350px" data-always-visible="1" data-rail-visible1="1">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-body">
                            	<table class="table table-striped table-bordered table-hover" id="tabel_user_group">
                                  <thead>
                                  <tr>                                     
                                      <th>
                                           Kode dept
                                      </th>
                                      <th>
                                           Nama departemen
                                      </th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                  
                                  <?php
								  
                                  foreach($data_dept->result() as $row){
				      			  ?>
				      				<tr>
                      					<td><?php echo $row->id_dept; ?></td>
				         				<td><?php echo $row->nama_dept;?></td>
                                    </tr>
                                    <?php
								  }
								  
									?>
                                  </tbody>
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
            	
                <button type="button" data-dismiss="modal" class="btn default">Batal</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!--  END MODAL-->

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
<!-- END PAGE LEVEL PLUGINS -->

<!-- END CORE PLUGINS -->
<script src="<?php echo base_url('metronic/global/scripts/metronic.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('metronic/admin/layout4/scripts/layout.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('metronic/admin/layout4/scripts/demo.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('metronic/additional/start.js');?>" type="text/javascript"></script>
<script>

$(document).ready(function(e){
	var judul_menu = $('#id_a_menu_<?php echo $menu_id; ?>').text();
	$('#id_judul_menu').text(judul_menu);
	$('#id_desc_dept').focus();
	$("#id_btnUbah").attr("disabled", "disabled");
	$("#id_btnHapus").attr("disabled", "disabled");
	$("#id_from_master_dept").submit(function(e){
		if (!confirm("Anda yakin melakukan proses ini ?")){
			e.preventDefault();
			return;
		} 
	});
	$('#id_btnBatal').click(function() {
		$("#id_btnSimpan").removeAttr("disabled");
		$("#id_btnUbah").attr("disabled", "disabled");
		$("#id_btnHapus").attr("disabled", "disabled");
	});
	//
	
});

jQuery(document).ready(function() {    
   Metronic.init(); // init metronic core components
Layout.init(); // init current layout
Demo.init(); // init demo features
TableManaged.init();
});
//$(function () {

// MENU OPEN
$(".menu_root").removeClass('start active open');
$("#menu_root_<?php echo $menu_parent; ?>").addClass('start active open');
// END MENU OPEN
var TableManaged = function () {
    var initTable1 = function () {
        var table = $('#tabel_user_group');
        // begin first table
        table.dataTable({
			
            "columns": [{
                "orderable": true
            }, {
                "orderable": false
            }],
            "lengthMenu": [
                [5, 15, 20, -1],
                [5, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 5,            
            "pagingType": "bootstrap_full_number",
            "language": {
                "lengthMenu": "  _MENU_ records",
                "paginate": {
                    "previous":"Prev",
                    "next": "Next",
                    "last": "Last",
                    "first": "First"
                }
            },
            "columnDefs": [{  // set default column settings
                'orderable': true,
                'targets': [0]
            }, {
                "searchable": true,
                "targets": [0]
            }],
            "order": [
                [0, "asc"]
            ] // set first column as a default sort by asc
        });

        var tableWrapper = jQuery('#tabel_user_group');

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
            initTable1();
        }
    };
}();
$("#tabel_user_group tbody tr").click(function(){
	var id_dept = $(this).find("td").eq(0).html();
	var desc_dept = $(this).find("td").eq(1).html();
	$('#id_id_dept').val(id_dept);
	$('#id_desc_dept').val(desc_dept);
	$('#id_button_close_modal').trigger('click');
	
	$("#id_btnSimpan").attr("disabled", "disabled");
	$("#id_btnUbah").removeAttr("disabled");
	$("#id_btnHapus").removeAttr("disabled");
});

$('#id_btnBatal').click(function () {
    btnStart();
    resetForm();
    readyToStart();
    tglTransStart();
});
function ajaxSubmitAdvance() {
    ajaxModal();
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "<?php echo base_url(); ?>master_dept/simpan",
        data: dataString,

        success: function (data) {
            //$('#id_Reload').trigger('click');
            $('#id_btnBatal').trigger('click');


            readyToStart();
            startCheckBox();
            UIToastr.init(data.tipePesan, data.pesan);
        }

    });
    event.preventDefault();
}
function ajaxUbahAdvance() {
    ajaxModal();
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "<?php echo base_url(); ?>master_dept/ubah",
        data: dataString,

        success: function (data) {
            //$('#id_Reload').trigger('click');
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
        url: "<?php echo base_url(); ?>master_dept/hapus",
        data: {idAdvance: idAdvance, tempLoop: tempLoop},
        success: function (data) {
            //$('#id_Reload').trigger('click');
            $('#id_btnBatal').trigger('click');
            UIToastr.init(data.tipePesan, data.pesan);
        }

    });
    event.preventDefault();
}

$('#id_from_master_dept').submit(function (event) {
    dataString = $("#id_from_master_dept").serialize();
        var aksiBtn = $('#idTmpAksiBtn').val();
        if (aksiBtn == '1') {
            var r = confirm('Anda yakin menyimpan data ini?');
            if (r == true) {
                ajaxSubmitAdvance();
            } else {//if(r)
                return false;
            }
        } else if (aksiBtn == '2') {
            var r = confirm('Anda yakin merubah data ini?');
            if (r == true) {
                ajaxUbahAdvance();
            } else {//if(r)
                return false;
            }
        } else if (aksiBtn == '3') {
            var r = confirm('Anda yakin menghapus data ini?');
            if (r == true) {
                ajaxHapusAdvance();
            } else {//if(r)
                return false;
            }
        }


});
$(document).ajaxStart(function() {
	$('.modal_json').fadeIn('fast');
		}).ajaxStop(function() {
	$('.modal_json').fadeOut('fast');
});

</script>


<!-- END JAVASCRIPTS -->