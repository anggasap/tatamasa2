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
                    <span class="caption-subject font-red-sunglo bold uppercase">Approval Advance</span>
                </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse">
                    </a>
                    <a href="javascript:;" class="fullscreen">
                    </a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="col-md-12">
                        <input type="hidden" id="idUserGroup"
                               value="<?php echo $this->session->userdata('usergroup'); ?>">
                        <button id="id_Reload" style="display: none;"></button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-body">
                            <table class="table table-striped table-bordered table-hover text_kanan" id="idTabelProyek">
                                <thead>
                                <tr>
                                    <th>
                                        Id Proyek
                                    </th>
                                    <th>
                                        Nama Proyek
                                    </th>
                                    <th>
                                        Jml Rumah
                                    </th>
                                    <th>
                                        Approval
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
<div class="modal fade draggable-modal" id="idDivAppAdv" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog  modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"
                        id="btnCloseModalAppAdv"></button>
                <h4 class="modal-title">Proyek Approval</h4>
            </div>
            <div class="modal-body">
                <div class="scroller" style="height:400px; ">
                    <form class="" id="FormApprovalAdv" role="form" method="post" action="">
                        <div class="row">
                            <div class="form-body">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Id proyek </label>
                                                <input id="id_proyekId" required="required"
                                                       class="form-control input-sm"
                                                       type="text" name="proyekId" readonly/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama proyek</label>
                                        <input id="id_namaProyek" required="required" class="form-control input-sm"
                                               type="text" name="namaProyek" readonly/>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Jumlah rumah</label>
                                                <input id="id_jmlRumah" required="required"
                                                       class="form-control input-sm nomor1"
                                                       type="text" name="jmlRumah" readonly/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Approval</label>
                                                <select id="id_approval" class="form-control  input-sm dis approvalselect"
                                                        name="approval" >
                                                    <option value="1">Approve</option>
                                                    <option value="2">Reject</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <label>Keterangan</label>
                                                <textarea rows="2" cols="" name="appKet" id="id_appKet" class="form-control input-sm dis" placeholder="Keterangan"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- HIDDEN INPUT -->
                            <input type="text" id="idTmpAksiBtn" class="hidden">
                            <!-- END HIDDEN INPUT -->

                        </div>
                    </form>

                </div>
                <!-- END SCROLLER-->
            </div>
            <!-- END MODAL BODY-->
            <div class="modal-footer">
                <button type="submit" id="btnSimpan" form="FormApprovalAdv" class="btn blue dis"><i
                        class="fa fa-save"></i>
                    Simpan
                </button>
                <button type="button" class="btn default" data-dismiss="modal" id="btnCloseModalDataUser">
                    Batal
                </button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--  MODAL Data Karyawan -->


<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="<?php echo base_url('metronic/global/plugins/respond.min.js'); ?>"></script>
<script src="<?php echo base_url('metronic/global/plugins/excanvas.min.js'); ?>"></script>
<![endif]-->
<?php echo $this->session->userdata('jqueryJS'); ?>
<?php echo $this->session->userdata('jquery-migrateJS'); ?>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<?php echo $this->session->userdata('jquery-uiJS'); ?>
<?php echo $this->session->userdata('bootstrapJS'); ?>
<?php echo $this->session->userdata('bootstrap-hover-dropdownJS'); ?>
<?php echo $this->session->userdata('jquery-slimscrollJS'); ?>
<?php echo $this->session->userdata('jquery-blockuiJS'); ?>
<?php echo $this->session->userdata('jquery-cokieJS'); ?>
<?php echo $this->session->userdata('jquery-uniformJS'); ?>
<?php echo $this->session->userdata('bootstrap-switchJS'); ?>
<!-- BEGIN PAGE LEVEL PLUGINS -->
<?php echo $this->session->userdata('toastrJS'); ?>
<?php echo $this->session->userdata('select2JS'); ?>
<?php echo $this->session->userdata('jquery-dataTablesJS'); ?>
<?php echo $this->session->userdata('dataTables-bootstrapJS'); ?>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- END CORE PLUGINS -->
<?php echo $this->session->userdata('metronicJS'); ?>
<?php echo $this->session->userdata('layoutJS'); ?>
<?php echo $this->session->userdata('demoJS'); ?>
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

            var table = $('#idTabelProyek');

            // begin first table
            table.dataTable({
                "ajax": "<?php  echo base_url("/approval_proyek/getProyekAll"); ?>",
                "columns": [
                    {"data": "idProyek"},
                    {"data": "namaProyek"},
                    {"data": "qtyRumah"},
                    {"data": "approval"}
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
                var id = $(this).find("td").eq(0).html();
                $('#id_approval').val('1');
                $('#id_appKet').val('');

                $("#idDivAppAdv").modal("show");

                var idProyek = $(this).find("td").eq(0).html();
                var namaProyek = $(this).find("td").eq(1).html();
                var qtyRumah = $(this).find("td").eq(2).html();
                var approval = $(this).find("td").eq(3).html();
                var appv = approval.trim();

                $('#id_proyekId').val(idProyek);
                $('#id_namaProyek').val(namaProyek);
                $('#id_jmlRumah').val(qtyRumah);
                if(appv != ''){
                    $('.dis').attr('disabled',true);
                }else{
                    $('.dis').attr('disabled',false);
                }
                //$('#').val();
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

    function ajax_submit_tambah() {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>approval_proyek/approval",
            data: dataString,
            dataType: "json",
            success: function (data) {
                UIToastr.init(data.tipePesan, data.pesan);
                $('#btnCloseModalDataUser').trigger('click');
                $('#id_Reload').trigger('click');
            }

        });
        event.preventDefault();
    }
    $(".approvalselect").change(function () {
        var app = $(".approvalselect").val();
        if(app == '2'){
            $('#id_appKet').attr("required",true);
        }else{
            $('#id_appKet').attr("required",false);
        }

    });

    $('#FormApprovalAdv').submit(function (event) {
        dataString = $("#FormApprovalAdv").serialize();
        var r = confirm('Anda yakin menyimpan data ini?');
        if (r) {
            ajax_submit_tambah();
        } else {//if(r)
            return false;
        }
        //alert(app);

    });


</script>


<!-- END JAVASCRIPTS -->