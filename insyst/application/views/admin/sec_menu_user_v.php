<!-- BEGIN PAGE BREADCRUMB -->
<!--

-->
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
                    <span class="caption-subject font-red-sunglo bold uppercase">Menu User (Root)</span>
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
                    <?php                 
                     if($this->session->flashdata('successRoot') != ''){
						echo '<div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert">×</button>'.$this->session->flashdata('successRoot').'
						  </div>';
					  }
					  if($this->session->flashdata('errorRoot') != ''){
						echo '<div class="span12 alert alert-danger">
						<button type="button" class="close" data-dismiss="alert">×</button>'.$this->session->flashdata('errorRoot').'
						</div>';
					} 
					?>
                    </span>
                </div>
                <div>
                	<form role="form"  method="post" class="cls_from_sec_menu_user"  action="<?php echo base_url('sec_menu_user/home'); ?>">
                        <div class="form-body">
                            <div class="form-group">
                                <label>Nama menu</label>
                                <div class="input-group">
                                	<div class="input-icon">
                                        <i class="fa fa-list fa-fw"></i>
                                        <input id="id_idRootMenu" class="form-control" type="hidden" name="idRootMenu" placeholder=""/>
                                        <input id="id_descRootMenu" required="required" class="form-control" type="text" name="descRootMenu"/>
                                    </div>
                                    <span class="input-group-btn">
                                        <a href="#" class="btn btn-success" data-target="#id_modalTreeRootMenu" 
                                        id="id_btnModalTreeRootMenu" data-toggle="modal">
                                            <i class="fa fa-search fa-fw"/></i>
                                            Lihat data
                                        </a>
                                    </span>
                                </div>
                            </div>
                            
                        </div>
                        <div class="form-actions">
                            <button name="btnSimpanRoot" class="btn blue" id="id_btnSimpanRoot">
                            <!--<i class="fa fa-check"></i>--> Simpan</button>
                            <button name="btnUbahRoot" onclick="" class="btn yellow" id="id_btnUbahRoot">
                            <!--<i class="fa fa-edit"></i>--> Ubah</button>
                            <button name="btnHapusRoot" class="btn red" id="id_btnHapusRoot">
                            <!--<i class="fa fa-trash"></i>--> Hapus</button>
                            <button id="id_btnBatalRoot" type="reset" class="btn default">Batal</button>
                        </div>
                    </form>

                </div>
                
            </div>
        </div><!-- end <div class="portlet green-meadow box"> -->
    </div><!-- end <div class="col-md-6"> -->
    
    <div class="col-md-6">
    	<div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs  font-red-sunglo"></i>
                    <span class="caption-subject font-red-sunglo bold uppercase">Menu User</span>
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
                    <?php                 
                     if($this->session->flashdata('success') != ''){
						echo '<div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert">×</button>'.$this->session->flashdata('success').'
						  </div>';
					  }
					  if($this->session->flashdata('error') != ''){
						echo '<div class="span12 alert alert-danger">
						<button type="button" class="close" data-dismiss="alert">×</button>'.$this->session->flashdata('error').'
						</div>';
					} 
					?>
                    </span>
                </div>
                <div>
                	<form role="form"  method="post" class="cls_from_sec_menu_user"  action="<?php echo base_url('sec_menu_user/home'); ?>">
                    	<input id="id_tempTreeFlag" class="form-control" type="hidden" name="tempTreeFlag" placeholder=""/>
                        <div class="form-body">
                            <div class="form-group">
                                <label>Nama menu</label>
                                <div class="input-group">
                                	<div class="input-icon">
                                        <i class="fa fa-list fa-fw"></i>
                                        <input id="id_idParent" class="form-control" type="hidden" name="idParent" placeholder=""/>
                                        <input id="id_descParent" required="required" readonly="readonly" class="form-control" 
                                        type="text" name="descParent"/>
                                    </div>
                                    <span class="input-group-btn">
                                        <a href="#" class="btn btn-success" data-target="#id_modalTreeMenu" 
                                        id="id_btnModalTreeParent" data-toggle="modal">
                                            <i class="fa fa-search fa-fw"/></i>
                                            Lihat data
                                        </a>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nama menu</label>
                                <div class="input-group">
                                	<div class="input-icon">
                                        <i class="fa fa-list fa-fw"></i>
                                        <input id="id_idMenu" class="form-control" type="hidden" name="idMenu" placeholder=""/>
                                        <input id="id_descMenu" required="required" class="form-control" type="text" name="descMenu"/>
                                    </div>
                                    <span class="input-group-btn">
                                        <a href="#" class="btn btn-success" data-target="#id_modalTreeMenu" 
                                        id="id_btnModalTreeMenu" data-toggle="modal">
                                            <i class="fa fa-search fa-fw"/></i>
                                            Lihat data
                                        </a>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Uri menu</label>
                                <div class="input-icon">
                                    <i class="fa fa-list"></i>
                                    <input type="text" class="form-control" placeholder="" name="uriMenu" id="id_UriMenu">
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
</div>
<div class="row">
    <div class="col-md-6">
    	
    </div>
</div>

<!-- END PAGE CONTENT-->
<!-- /.modal -->
<div id="id_modalTreeMenu" class="modal fade" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button id="id_button_close_modal" type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Menu</h4>
            </div>
            <form id="id_form_trans_pb" role="form" method="post">
            <div class="modal-body">
                <div class="scroller" style="height:350px" data-always-visible="1" data-rail-visible1="1">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-body">
                            	<div id="jstree1" class="clsjstree">
                                    <ul>
                                    <?php
                                      foreach($menu_all as $data){
                                      echo '<li id = "'.$data['id'].'">';
                                      echo '<a href="#" id = "a'.$data['id'].'" class = "'.$data['link'].'">';
                                      echo $data['nama'] ;
                                      echo '</a>';
                                      echo '<ul>';
                                      echo print_recursive_secMenuUser($data['child']);
                                      echo '</ul>';
                                      echo '</li>';
                                      }
                                  ?>
                                  </ul>
                                </div>
                            	
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
<!-- /.modal -->
<div id="id_modalTreeRootMenu" class="modal fade" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button id="id_button_close_modalRoot" type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Menu (Root)</h4>
            </div>
            <form id="" role="form" method="post">
            <div class="modal-body">
                <div class="scroller" style="height:350px" data-always-visible="1" data-rail-visible1="1">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-body">
                            	<div id="jstree2" class="clsjstree">
                                    <ul>
                                    <?php
                                      foreach($menu_all as $data){
                                      echo '<li id = "b'.$data['id'].'">';
                                      echo '<a href="#" id = "b'.$data['id'].'" class = "b'.$data['link'].'">';
                                      echo $data['nama'] ;
                                      echo '</a>';
                                      echo '<ul>';
                                      
                                      echo '</ul>';
                                      echo '</li>';
                                      }
                                  ?>
                                  </ul>
                                </div>
                            	
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
<script type="text/javascript" src="<?php echo base_url('metronic/global/plugins/select2/select2.min.js'); ?>"></script>
</script>
<script src="<?php echo base_url('metronic/global/plugins/jstree/dist/jstree.min.js'); ?>"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- END CORE PLUGINS -->
<script src="<?php echo base_url('metronic/global/scripts/metronic.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('metronic/admin/layout4/scripts/layout.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('metronic/admin/layout4/scripts/demo.js'); ?>" type="text/javascript"></script>
<script>

$(document).ready(function(e){
	var judul_menu = $('#id_a_menu_<?php echo $menu_id; ?>').text();
	$('#id_judul_menu').text(judul_menu);
	$('#id_desc_usergroup').focus();
	// MENU
	$("#id_btnUbah").attr("disabled", "disabled");
	$("#id_btnHapus").attr("disabled", "disabled");
	//ROOT MENU
	$("#id_btnUbahRoot").attr("disabled", "disabled");
	$("#id_btnHapusRoot").attr("disabled", "disabled");
	
	$(".cls_from_sec_menu_user").submit(function(e){
		if (!confirm("Anda yakin melakukan proses ini ?")){
			e.preventDefault();
			return;
		} 
	});
	$('#id_btnBatal').click(function() {
		$("#id_btnSimpan").removeAttr("disabled");
		$("#id_btnUbah").attr("disabled", "disabled");
		$("#id_btnHapus").attr("disabled", "disabled");
		$("#id_descParent").focus();
	});
	$('#id_btnBatalRoot').click(function() {
		$("#id_btnSimpanRoot").removeAttr("disabled");
		$("#id_btnUbahRoot").attr("disabled", "disabled");
		$("#id_btnHapusRoot").attr("disabled", "disabled");
		$("#id_descRootMenu").focus();
	});
	/*Jika lihaat data parent menu*/
	$('#id_btnModalTreeParent').click(function() {
		 $("#id_tempTreeFlag").val(0);
	 });
	 /*Jika lihat data menu biasa*/
	 $('#id_btnModalTreeMenu').click(function() {
		 $("#id_tempTreeFlag").val(1);
	 });
	//
	$("#jstree1").on("select_node.jstree",
     function(evt, data){
		 /*NOTE AJA
		 	GET PARENT ID
			data.node.parent
			GET ALL PARENT ID
			data.node.parents
		 */
		 var tempTreeFlag	= $("#id_tempTreeFlag").val();
		 var menuText		= data.node.text; 
		 var menuId			= data.node.id
		 var menuIdParent	= data.node.parent;
		/*
		 var menuIdArray 	= new Array();
		 menuIdArray		= menuId.split("_");*/
		 if(tempTreeFlag == 0){//jika Parent menu
			 $("#id_idParent").val((menuId.trim()));
			 $("#id_descParent").val(menuText);
			 $('#id_button_close_modal').trigger('click');
		 }else{//jika menu biasa
		 	if(menuIdParent == '#'){
				alert("Root menu tidak dapat dikonfigurasi di form ini !");
			}else{
			  /*Kosongkan parent id dan desc jika menu yang diselect tidak punya parent*/
			   $("#id_idParent").val("");
			   $("#id_descParent").val("");
			   /*End Kosongkan parent id dan desc jika menu yang diselect tidak punya parent*/
			   $("#id_idParent").val((menuIdParent.trim()));//ID Parent
			   
			   var idMenuTextParent	=	$("#id_idParent").val(); 	
			   var menuTextParent		=	$('#a'+idMenuTextParent).text();
			   
			   
			   $("#id_descParent").val(menuTextParent);//Text Parent
			   $("#id_idMenu").val((menuId.trim()));//ID Menu
			   var menuUri			=	$("#a"+menuId).attr('attrMenuUri');// get nama class dari id node child_parent 
			   $("#id_UriMenu").val(menuUri);//menuUri
			   
			   $("#id_descMenu").val(menuText);//Deskripsi Menu
			   
			   $("#id_btnUbah").removeAttr("disabled");
			   $("#id_btnHapus").removeAttr("disabled");
			   $('#id_button_close_modal').trigger('click');
			   $("#id_btnSimpan").attr("disabled", "disabled");
			}
		 }
		 
     });//end jstree1
	 $("#jstree2").on("select_node.jstree",
     function(evt, data){
		 var menuRootText		= data.node.text; 
		 var menuRootId			= data.node.id
		 var menuRootId			= menuRootId.substr(1);
		 $("#id_idRootMenu").val("");
		 $("#id_descRootMenu").val("");
		 $("#id_idRootMenu").val(menuRootId);
		 $("#id_descRootMenu").val(menuRootText);
		 
		 $('#id_button_close_modalRoot').trigger('click');
		 $("#id_btnSimpanRoot").attr("disabled","disabled");
		 $("#id_btnUbahRoot").removeAttr("disabled");
		 $("#id_btnHapusRoot").removeAttr("disabled");
	 });
});

jQuery(document).ready(function() {    
   Metronic.init(); // init metronic core components
Layout.init(); // init current layout
Demo.init(); // init demo features
UITree.init();
TableManaged.init();
});
//$(function () {

// MENU OPEN
$(".menu_root").removeClass('start active open');
$("#menu_root_<?php echo $menu_parent; ?>").addClass('start active open');
// END MENU OPEN
var UITree = function () {

	var handleSample4 = function () {
        $('.clsjstree').jstree({
            "plugins": ["wholerow", "types"],
            "core": {
                "themes" : {
                    "responsive": false
                },    
                
            },
            "types" : {
                "default" : {
                    "icon" : "fa fa-folder icon-state-warning icon-lg"
                },
                "file" : {
                    "icon" : "fa fa-file icon-state-warning icon-lg"
                }
            }
        });
		//.bind("select_node.jstree", function (e, data) { alert(data.rslt.obj.data("id")); })
    }

    return {
        //main function to initiate the module
        init: function () {
			handleSample4();
        }

    };

}();

$(document).ajaxStart(function() {
	$('.modal_json').fadeIn('fast');
		}).ajaxStop(function() {
	$('.modal_json').fadeOut('fast');
});

</script>


<!-- END JAVASCRIPTS -->