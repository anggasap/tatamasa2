<style>
    .removebrand a{
        font-size: 0!important;
    }
</style>

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
                    <span class="caption-subject font-red-sunglo bold uppercase"><?php echo $menu_nama; ?></span>
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
                <div id="chart_2" class="chart removebrand">
                </div>
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
<script src="<?php echo base_url('metronic/global/plugins/amcharts/amcharts/amcharts.js'); ?>"
        type="text/javascript"></script>
<script src="<?php echo base_url('metronic/global/plugins/amcharts/amcharts/serial.js'); ?>"
        type="text/javascript"></script>
<script src="<?php echo base_url('metronic/global/plugins/amcharts/amcharts/pie.js'); ?>"
        type="text/javascript"></script>
<script src="<?php echo base_url('metronic/global/plugins/amcharts/amcharts/radar.js'); ?>"
        type="text/javascript"></script>
<script src="<?php echo base_url('metronic/global/plugins/amcharts/amcharts/themes/light.js'); ?>"
        type="text/javascript"></script>
<script src="<?php echo base_url('metronic/global/plugins/amcharts/amcharts/themes/patterns.js'); ?>"
        type="text/javascript"></script>
<script src="<?php echo base_url('metronic/global/plugins/amcharts/amcharts/themes/chalk.js'); ?>"
        type="text/javascript"></script>
<script src="<?php echo base_url('metronic/global/plugins/amcharts/ammap/ammap.js'); ?>"
        type="text/javascript"></script>
<script src="<?php echo base_url('metronic/global/plugins/amcharts/ammap/maps/js/worldLow.js'); ?>"
        type="text/javascript"></script>
<script src="<?php echo base_url('metronic/global/plugins/amcharts/amstockcharts/amstock.js'); ?>"
        type="text/javascript"></script>
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
        ChartsAmcharts.init();
        //UITree.init();
        //TableManaged.init();
        //UIToastr.init();
    });
    var ChartsAmcharts = function () {


        var initChartSample2 = function () {
            var chart = AmCharts.makeChart("chart_2", {
                "type": "serial",
                "theme": "light",

                "fontFamily": 'Open Sans',
                "color": '#888888',
                "numberFormatter": {
                    "precision": -1,
                    "decimalSeparator": ",",
                    "thousandsSeparator": "."
                },
                "legend": {
                    "equalWidths": false,
                    "useGraphSettings": true,
                    "valueAlign": "left",
                    "valueWidth": 120
                },
                "dataProvider": [
                    <?php

                        foreach($graph8 as $row) :
                            echo '{';
                            echo '"tgl":'.'"'.$row['tgl'].'",';
                            echo '"jml_rumah":'.'"'.$row['jml_rumah'].'",';
                            echo '"harga":'.'"'.$row['harga'].'",';
                            echo '},';
                           // echo $row['target'];
                        endforeach;
                    ?>
                ],
                "valueAxes": [{
                    "id": "jml_rumah",
                    "axisAlpha": 0,
                    "gridAlpha": 0,
                    "position": "left",
                    "title": "Jumlah Rumah ( Unit )"
                },{
                    "id": "harga",
                    "axisAlpha": 0,
                    "gridAlpha": 0,
                    "labelsEnabled": true,
                    "position": "right",
                    "title": "Nominal ( Rupiah )"
                }],
                "graphs": [ {
                    "balloonText": "Jumlah rumah : [[value]]",
                    "bullet": "triangleDown",
                    "bulletBorderAlpha": 1,
                    "bulletBorderThickness": 1,
                    "dashLengthField": "dashLength",
                    "legendPeriodValueText": "Total: [[value.sum]]",
                    "legendValueText": "[[value]]",
                    "title": "Jumlah rumah",
                    "fillAlphas": 0,
                    "valueField": "jml_rumah",
                    "valueAxis": "jml_rumah"
                },{
                    "balloonText": "Harga : [[value]] ",
                    "bullet": "bubble",
                    "bulletBorderAlpha": 1,
                    "bulletBorderThickness": 1,
                    "dashLengthField": "dashLength",
                    "legendPeriodValueText": "Total: Rp. [[value.sum]] ",
                    "legendValueText": "Rp. [[value]] %",
                    "title": "Harga rumah",
                    "fillAlphas": 0,
                    "valueField": "harga",
                    "valueAxis": "harga"
                }],
                "chartCursor": {
                    "graphBulletSize": 1.5,
                    "cursorColor": "#000000",//#CC0000
                    "zoomable": true
                },
                // "dataDateFormat": "YYYY-MM-DD",
                "categoryField": "tgl",
                "categoryAxis": {

                    "parseDates": false,
                    "autoGridCount": false,
                    "labelRotation": 90,
                    "axisColor": "#555555",
                    "gridAlpha": 10,
                    "gridColor": "#FFFFFF",
                    "gridCount": 50
                },
                "exportConfig": {
                    "menuBottom": "20px",
                    "menuRight": "22px",
                    "menuItems": [{
                        "icon": Metronic.getGlobalPluginsPath() + "amcharts/amcharts/images/export.png",
                        "format": 'png'
                    }]
                }
            });

            $('#chart_2').closest('.portlet').find('.fullscreen').click(function () {
                chart.invalidateSize();
            });
        }

        return {
            //main function to initiate the module
            init: function () {
                initChartSample2();
            }

        };

    }();
    //$(function () {
    var judul_menu = $('#id_a_menu_<?php echo $menu_id; ?>').text();
    $('#id_judul_menu').text(judul_menu);
    // MENU OPEN
    $(".menu_root").removeClass('start active open');
    $("#menu_root_<?php echo $menu_parent; ?>").addClass('start active open');
    // END MENU OPEN   
    
    //Ready Doc
    btnStart();
 	$( "#id_btnSimpan" ).click(function() {
		$('#idTmpAksiBtn').val('1');
	});
	    
	$('#id_btnBatal').click(function(){
		btnStart();
		resetForm();
	});
	$(".bulan").datepicker( {
        format: "mm-yyyy", // Notice the Extra space at the beginning
        viewMode: "months",
        minViewMode: "months"
    });

    
</script>


<!-- END JAVASCRIPTS -->