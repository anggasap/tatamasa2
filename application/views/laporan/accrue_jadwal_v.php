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
                    <span class="caption-subject font-red-sunglo bold uppercase"><?php echo $menu_nama; ?></span>
                </div>
                <div class="actions">
                    <a class="btn btn-icon-only btn-default btn-sm fullscreen" href="javascript:;"
                       data-original-title="" title="">
                    </a>
                </div>

            </div>
            <div class="portlet-body">
                <div>
                	<span id="event_result">
                    
                    </span>
                </div>
                <form role="form" method="post" id="id_formAccrue" action="<?php echo base_url('accrue_jadwal/home'); ?>">
                    <input type="text" id="idTxtTempLoop" name="txtTempLoop"
                           class="form-control nomor1 hidden">
                    <div class="row">
                        <div class="form-body">
                            <div class="col-md-12">
                                <table class="table table-striped table-bordered table-hover text_kanan"
                                       id="idTabelJadwalJT">
                                    <thead>
                                    <tr>
                                        <th width='15%' align='left'>Id Penj</th>
                                        <th width='10%' align='left'>Id proyek</th>
                                        <th width='20%' align='left'>Nama Rumah</th>
                                        <th width='25%' align='left'>Nama Customer</th>
                                        <th width='15%' align='left'>GL</th>
                                        <th width='15%' align='center'>Jml trans</th>
                                    </tr>
                                    </thead>
                                    <tbody id="id_body_data">
                                    <?php
/*                                    foreach( $jadwalJT as $row ) {
                                    */?><!--
                                        <td width='10%' align='left'><?php /* echo $*/?></td>
                                    --><?php
/*                                    }
                                    */?>
                                    </tbody>
                                    <tfoot>

                                    </tfoot>
                                </table>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-actions">
                                <button name="btnSimpan" class="btn blue" id="id_btnSimpan">
                                    <!--<i class="fa fa-check"></i>--> Proses
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
</div>
<div class="row">
    <div class="col-md-6">

    </div>
</div>

<!-- END PAGE CONTENT-->
<!--  MODAL Data Karyawan -->
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
    tglTransStart();
    getDescCpa();
    $("#id_btnSimpan").click(function () {
        $('#idTmpAksiBtn').val('1');
    });

    $('#id_btnBatal').click(function () {
        btnStart();
        resetForm();
        tglTransStart();
    });
    function getDescCpa(idMaster){
        ajaxModal();
        if (idMaster != '') {
            $.post("<?php echo site_url('/accrue_jadwal/getJadwalJT'); ?>",
                {
                    'idReqpay': idMaster
                },function (data) {
                    if (data.data_cpa.length > 0) {
                        $('#idTxtTempLoop').val(data.data_cpa.length);
                        for(i=0;i<data.data_cpa.length;i++){
                            var x = i+1;
                            //var idCpa           = data.data_cpa[i].id_cpa;
                            var idPenj        = data.data_cpa[i].master_id;
                            var idProyek      = data.data_cpa[i].id_proyek;
                            var namaRumah     = data.data_cpa[i].nama_rumah;
                            var namaCust      = data.data_cpa[i].nama_cust;
                            var kodePerk      = data.data_cpa[i].kode_perk;
                            var jmlTrans      = data.data_cpa[i].jml_trans;

                            tr ='<tr class="listdata" id="tr'+x+'">';
                            tr+='<td><input type="text" class="form-control input-sm" id="id_tempIdPenj'+x+'" name="tempIdPenj'+x+'" readonly="true" value="'+idPenj+'"></td>';
                            tr+='<td><input type="text" class="form-control input-sm" id="id_tempIdProyek'+x+'" name="tempIdProyek'+x+'" readonly="true" value="'+idProyek.trim()+'"></td>';
                            tr+='<td><input type="text" class="form-control input-sm" id="id_tempNamaRumah'+x+'" name="tempNamaRumah'+x+'" readonly="true" value="'+namaRumah+'"></td>';
                            tr+='<td><input type="text" class="form-control input-sm" id="id_tempNamaCust'+x+'" name="tempNamaCust'+x+'" readonly="true" value="'+namaCust+'" ></td>';
                            tr+='<td><input type="text" class="form-control input-sm" id="id_tempKodePerk'+x+'" name="tempKodePerk'+x+'" readonly="true" value="'+kodePerk+'" ></td>';
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
            url: "<?php echo base_url(); ?>accrue_jadwal/proses",
            data: dataString,

            success: function (data) {
                $('#id_btnBatal').trigger('click');
                UIToastr.init(data.tipePesan, data.pesan);
            }

        });
        event.preventDefault();
    }
    $('#id_formAccrue').submit(function (event) {
        dataString = $("#id_formAccrue").serialize();
        //var aksiTab = $('#idTmpAksiTab').val();
        var r = confirm('Anda yakin menyimpan data ini?');
        if (r == true) {
            ajaxSubmit();
        } else {//if(r)
            return false;
        }


    });
</script>

<!-- END JAVASCRIPTS -->