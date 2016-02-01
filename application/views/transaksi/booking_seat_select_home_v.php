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
                    <span class="caption-subject font-red-sunglo bold uppercase">Daftar Rumah Proyek</span>
                </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse">
                    </a>
                    <a href="javascript:;" class="reload" id="id_tools_reload">
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
                <form role="form" method="post" class="cls_from_sec_proyek"
                      action="<?php echo base_url('booking_seat/home'); ?>" id="id_formProyek">
                    <div class="row">
                        <div class="form-body">
                            <div class="col-md-12">


                                <div class="tiles">
                                    <!--<div class="tile image selected">
                                        <div class="tile-body">
                                            <img src="../../assets/admin/pages/media/gallery/image2.jpg" alt="">
                                        </div>
                                        <div class="tile-object">
                                            <div class="name">
                                                Media
                                            </div>
                                        </div>
                                    </div>-->
                                <?php
                                $i=1;
                                foreach ($rumah as $row):
                                ?>
                                    <?php if($row->status_jual =='0') { ?>
                                    <div class="tile bg-grey-cascade client-item" title="This is my tooltip">
                                        <input value="<?php echo $row->status_jual; ?>" class="hidden">
                                        <div class="tile-body">
                                            <img href="<?php echo base_url('booking/booked/') . '/' . $row->id_rumah; ?>"
                                                 src="<?php echo base_url('metronic/img/home_av.png'); ?>"
                                                 alt="index.html" class="pull-right">
                                            <h5><?php echo $row->id_rumah; ?></h5>
                                        </div>
                                        <div class="tile-object">
                                            <div class="name">
                                                <h7><?php echo $row->nama_rumah; ?></h7>
                                            </div>
                                        </div>
                                    </div>


                                    <?php
                                        }else{
                                    ?>
                                    <div class="tile bg-grey-cascade client-item" title="This is my tooltip">
                                        <input value="<?php echo $row->status_jual; ?>"  class="hidden">
                                        <div class="tile-body">
                                            <img href="<?php echo base_url('booking/booked/') . '/' . $row->id_rumah; ?>"
                                                 src="<?php echo base_url('metronic/img/home_nav.png'); ?>"
                                                 alt="index.html" class="pull-right">
                                            <h5><?php echo $row->id_rumah; ?></h5>
                                        </div>
                                        <div class="tile-object">
                                            <div class="name">
                                                <h7><?php echo $row->nama_rumah; ?></h7>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                $i++;
                                endforeach;
                                ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--END ROW 1 -->

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
<script>
    jQuery(document).ready(function () {
        Metronic.init(); // init metronic core components
        Layout.init(); // init current layout
        Demo.init(); // init demo features
        //UITree.init();
    });
    //$(function () {
    var judul_menu = $('#id_a_menu_<?php echo $menu_id; ?>').text();
    $('#id_judul_menu').text(judul_menu);
    // MENU OPEN
    $(".menu_root").removeClass('start active open');
    $("#menu_root_<?php echo $menu_parent; ?>").addClass('start active open');
    // END MENU OPEN

    btnStart();
    readyToStart()

    function OpenInNewTab(url )
    {
        var win=window.open(url, '_blank');
        win.focus();
    }

    $(".client-item").click(function(){
        var url = $(this).find("img").attr("href");
        var status_jual = $(this).find("input").val();
        if(status_jual == '0'){
            OpenInNewTab(url);
        }else{
            alert("Rumah ini sudah dibooking atau terjual.");
        }
        return false;
    });

    $('#id_btnBatal').click(function () {
        btnStart();
    });
    $('#id_tools_reload').click(function () {
        btnStart();
    });

    function ajaxSubmit() {
        ajaxModal();
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "<?php echo base_url(); ?>master_proyek/simpan",
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
            url: "<?php echo base_url(); ?>master_proyek/ubah",
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
        var idProyek = $('#id_proyekId').val();
        idProyek = idProyek.trim();
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "<?php echo base_url(); ?>master_proyek/hapus",
            data: {idProyek: idProyek},
            success: function (data) {
                $('#id_Reload').trigger('click');
                $('#id_btnBatal').trigger('click');
                UIToastr.init(data.tipePesan, data.pesan);
            }

        });
        event.preventDefault();
    }
    $('#id_formProyek').submit(function (event) {
        dataString = $("#id_formProyek").serialize();
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