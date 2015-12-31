<!-- BEGIN PAGE BREADCRUMB -->
<style type="text/css">
    table#idTabelAdv td:nth-child(4) {
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
                    <span class="caption-subject font-red-sunglo bold uppercase">Pembayaran</span>
                </div>
                <div class="actions">
                    <a href="javascript:;" class="btn btn-default btn-sm" onclick="cetak();">
                        <i class="fa fa-print"></i> Cetak </a>
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
                <form role="form" method="post"
                      action="<?php echo base_url('kasir/home'); ?>" id="id_formKasir">
                    <div class="row">
                        <div class="form-body">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input id="id_kywId" required="required" class="form-control hidden"
                                           type="text" name="kywId" readonly/>
                                    <label>No Pembayaran </label>
                                    <input id="id_idPemb" required="required" class="form-control input-sm"
                                           type="text" name="idPemb" readonly/>
                                </div>
                                <div class="form-group">
                                    <label>Pembayaran</label>
                                    <select id="id_jnsReq" class="form-control input-sm select2me" name="jnsReq">
                                        <option value=""></option>
                                        <option value="AV">Advance</option>
                                        <option value="RP">Request for payment</option>
                                        <option value="RM">Reimbursement</option>
                                        <option value="ST">Settlement</option>
                                    </select>
                                </div>

                                <div class="form-group request_in" id="div_idAdvance">
                                    <label>Id Advance </label>
                                    <div class="input-group">
                                        <input id="id_idAdvance" required="required" class="form-control input-sm"
                                               type="text" name="idAdvance" readonly/>
                                        <span class="input-group-btn">
                                        <a href="#" class="btn btn-success btn-sm" data-target="#idDivTabelAdv"
                                           id="id_btnModal" data-toggle="modal">
                                            <i class="fa fa-search fa-fw"/></i>
                                        </a>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group request_in"  id="div_idReqpay">
                                    <label>Id Request for Payment </label>
                                    <div class="input-group">
                                        <input id="id_idReqpay" required="required" class="form-control  input-sm"
                                               type="text" name="idReqpay" readonly/>
                                    <span class="input-group-btn">
                                        <a href="#" class="btn btn-success btn-sm" data-target="#idDivTabelReqpay"
                                           id="id_btnModal" data-toggle="modal">
                                            <i class="fa fa-search fa-fw"/></i>

                                        </a>
                                    </span>
                                    </div>
                                </div>
                                <div class="form-group request_in"  id="div_idReimpay">
                                    <label>Id Reimbursement </label>
                                    <div class="input-group">
                                        <input id="id_idReimpay" required="required" class="form-control  input-sm"
                                               type="text" name="idReimpay" readonly/>
                                    <span class="input-group-btn">
                                        <a href="#" class="btn btn-success btn-sm" data-target="#idDivTabelReimpay"
                                           id="id_btnModal" data-toggle="modal">
                                            <i class="fa fa-search fa-fw"/></i>

                                        </a>
                                    </span>
                                    </div>
                                </div>
                                <div class="form-group request_in"  id="div_idSettle">
                                    <label>Id Settlement </label>
                                    <div class="input-group">
                                        <input id="id_idSettle" required="required" class="form-control  input-sm"
                                               type="text" name="idSettle" readonly/>
                                    <span class="input-group-btn">
                                        <a href="#" class="btn btn-success btn-sm" data-target="#idDivTabelSettle"
                                           id="id_btnModal" data-toggle="modal">
                                            <i class="fa fa-search fa-fw"/></i>

                                        </a>
                                    </span>
                                    </div>
                                </div>
                            </div>
                            <!--end <div class="col-md-6"> 1 -->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input id="id_kywId" required="required" class="form-control hidden"
                                           type="text" name="kywId" readonly/>
                                    <label>Nama karyawan (Requester) </label>
                                    <input id="id_namaKyw" required="required" class="form-control input-sm"
                                           type="text" name="namaKyw" readonly/>
                                    <input id="id_dept" required="required" class="form-control input-sm hidden"
                                           type="text" name="dept" readonly/>
                                </div>
                                <div class="form-group">
                                    <label>Proyek</label>
                                    <?php
                                    $data = array();
                                    $data[''] = '';
                                    foreach ($proyek as $row):
                                        $data[$row['id_proyek']] = $row['nama_proyek'];
                                    endforeach;
                                    echo form_dropdown('proyek', $data, '',
                                        'id="id_proyek" class="form-control input-sm" disabled');
                                    ?>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nomor Invoice</label>
                                            <input id="id_noInvoice" class="form-control  input-sm"
                                                   type="text" name="noInvoice" readonly/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nomor PO</label>
                                            <input id="id_noPO"  class="form-control  input-sm"
                                                   type="text" name="noPO" readonly/>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Tgl Pengajuan</label>
                                            <input id="id_tglReq" required="required"
                                                   class="form-control input-sm "
                                                   type="text" name="tglReq" readonly/>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Tgl JT</label>
                                            <input id="id_tglJT" required="required" data-date-format="dd-mm-yyyy"
                                                   class="form-control  date-picker input-sm"
                                                   type="text" name="tglJT" placeholder="dd-mm-yyyy" readonly/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input id="id_uangPaidou" required="required" class="form-control input-sm nomor hidden"
                                           type="text" name="uangPaidou" readonly/>
                                    <label>Jumlah uang</label>
                                    <input id="id_uang" required="required" class="form-control input-sm nomor"
                                           type="text" name="uang" readonly/>
                                </div>
                                <div class="form-group">
                                    <label>Keterangan</label>
                                <textarea id="id_keterangan" class="form-control input-sm"
                                          type="text" name="keterangan" cols="2" readonly/></textarea>

                                </div>
                            </div>
                            <div class="col-md-3">

                            </div>
                        </div>
                        <!-- HIDDEN INPUT -->
                        <input type="text" id="idTmpAksiBtn" class="hidden">

                        <!-- END HIDDEN INPUT -->
                    </div
                    <hr>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                        <label>Tgl Pembayaran</label>
                                        <input id="id_tgltrans" required="required"
                                               class="form-control input-sm "
                                               type="text" name="tgltrans" placeholder="dd-mm-yyyy" readonly/>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Kode Pembayaran</label>
                                <?php
                                $data = array();
                                $data[''] = '';
                                foreach ($kodebayar as $row):
                                    $data[$row['kode_bayar']] = $row['nama_kdbayar'];
                                endforeach;
                                echo form_dropdown('kodebayar', $data, '',
                                    'id="id_kodebayar" class="form-control input-sm select2me " required');
                                ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Kode Perk</label>
                                <input id="id_kodePerkBayar" class="form-control input-sm"
                                       type="text" name="kodePerkBayar" readonly/>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Nama Perk</label>
                                <input id="id_namaPerkBayar" class="form-control input-sm"
                                       type="text" name="namaPerkBayar" readonly/>

                            </div>
                        </div>
                    </div>
                    <hr>
                    <!-- END ROW-->

                    <div class="row">
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">

                                </div>

                            </div>
                        </div>
                    </div>
                    <!--END ROW 1 -->
                    <div class="row">
                        <div class="form-body">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <!--<label>Kode perk</label>-->
                                            <div class="input-group">
                                                <input id="id_kodePerk" readonly
                                                       class="form-control input-sm kosongCPA"
                                                       type="text" name="kodePerk"
                                                       placeholder="Kode Perk"/>
                                                    <span class="input-group-btn">
                                        	           <a href="#" class="btn btn-success btn-sm"
                                                          data-target="#idDivTabelPerk"
                                                          id="id_btnModalPerk" data-toggle="modal">
                                                           <i class="fa fa-search fa-fw"/></i>
                                                       </a>
                                    	           </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label>&nbsp;</label>
                                            <!--<input id="id_kodeAlt" readonly class="form-control input-sm kosongCPA"
                                               type="text" name="kodeAlt" placeholder="Kode Perk Alternatif"/>-->
                                            <span id="id_kodeAlt" class="tkosongCPA"></span>
                                            <span id="id_namaPerk" class="tkosongCPA"></span>
                                        </div>
                                    </div>

                                </div>
                                <!--<div class="form-group">
                                    <input id="id_namaPerk" readonly class="form-control input-sm kosongCPA"
                                    type="text" name="namaPerk" placeholder="Nama Perk"/>
                                </div>-->

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <!--<label>Kode Cash Flow</label>-->
                                            <div class="input-group">
                                                <input id="id_kodeCflow" readonly
                                                       class="form-control input-sm kosongCPA"
                                                       type="text" name="kodeCflow"
                                                       placeholder="Kode Cash Flow"/>
                                                    <span class="input-group-btn">
                                        	           <a href="#" class="btn btn-success btn-sm"
                                                          data-target="#idDivTabelCflow"
                                                          id="id_btnModalCflow" data-toggle="modal">
                                                           <i class="fa fa-search fa-fw"/></i>
                                                       </a>
                                    	           </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label>&nbsp;</label>
                                            <!--<input id="id_kodeAltCflow" readonly class="form-control input-sm kosongCPA"
                                               type="text" name="kodeAltCflow" placeholder="Kode Cash Flow Alternatif"/>-->
                                            <label><span id="id_kodeAltCflow"
                                                         class="tkosongCPA"></span></label>
                                            <label><span id="id_namaCflow"
                                                         class="tkosongCPA"></span></label>
                                        </div>
                                    </div>
                                </div>
                                <!--<div class="form-group">
                                    <input id="id_namaCflow" readonly class="form-control input-sm kosongCPA"
                                    type="text" name="namaCflow" placeholder="Nama Cash flow"/>
                                </div>-->
                            </div>
                        </div>
                    </div>
                    <!-- END ROW-->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Debet</label>
                                        <input id="id_jumlahDb" class="form-control input-sm nomor "
                                               type="text" name="jumlahDb"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Kredit</label>
                                        <input id="id_jumlahKr" class="form-control input-sm nomor "
                                               type="text" name="jumlahKr"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                        <textarea rows="2" cols="" name="keteranganCPA" id="id_keteranganCPA"
                                                  class="form-control input-sm kosongCPA"></textarea>

                            </div>
                            <div class="form-group">
                                <input type="text" id="idTxtTempLoop" name="txtTempLoop"
                                       class="form-control nomor1 hidden">
                                <input type="text" id="idTxtTempKodeBayar" name="TxtTempKodeBayar"
                                       class="form-control nomor1 hidden">
                                <input type="text" id="idTempUbahCPA" name="txtTempUbahCPA"
                                       class="form-control nomor1 hidden">
                                <input type="text" id="idTempJumlahDb" name="txtTempJumlahDb"
                                       class="form-control nomor hidden">
                                <input type="text" id="idTempJumlahKr" name="txtTempJumlahKr"
                                       class="form-control nomor hidden">
                                <a href="javascript:;" class="btn blue btn-sm" id="id_btnAddCpa">
                                    <i class="fa fa-plus"></i>
                                </a>
                                <a href="javascript:;" class="btn red btn-sm" id="id_btnRemoveCpa">
                                    <i class="fa fa-minus"></i>
                                </a>
                                <a href="javascript:;" class="btn yellow btn-sm"
                                   id="id_btnUpdateCpa">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="javascript:;" class="btn default btn-sm"
                                   id="id_btnBatalCpa">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-body">
                                <table class="table table-striped table-hover table-bordered"
                                       id="id_tabelPerkCflow">
                                    <thead>
                                    <tr>
                                        <th width="15%">
                                            Akun GL
                                        </th>
                                        <th width="40%">
                                            Keterangan
                                        </th>
                                        <th width="15%">
                                            Cflow
                                        </th>
                                        <th width="15%">
                                            Debet
                                        </th>
                                        <th width="15%">
                                            Kredit
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody id="id_body_data">

                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td colspan="3" width="70%">
                                            <strong>Total</strong>
                                        </td>
                                        <td width="15%">
                                            <input type="text" name="totalDb"
                                                   class="form-control nomor input-sm" id="id_totalDb"
                                                   readonly>
                                        </td>
                                        <td width="15%">
                                            <input type="text" name="totalKr"
                                                   class="form-control nomor input-sm" id="id_totalKr"
                                                   readonly>
                                        </td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
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
<!--<div class="row">
    <div class="col-md-6">

    </div>
</div>-->
<!-- END PAGE CONTENT-->
<!--  MODAL Data Advance -->
<div class="modal fade draggable-modal" id="idDivTabelAdv" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Data Advance</h4>
            </div>
            <div class="modal-body">
                <div class="scroller" style="height:400px; ">
                    <div class="row">
                        <div class="col-md-12">
                            <button id="id_ReloadAdv" class="id_ReloadMaster" style="display: none;"></button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-body">
                                <table class="table table-striped table-bordered table-hover text_kanan"
                                       id="idTabelAdv">
                                    <thead>
                                    <tr>
                                        <th>
                                            Id Advance
                                        </th>
                                        <th>
                                            Id PP
                                        </th>
                                        <th>
                                            Nama Karyawan
                                        </th>
                                        <th>
                                            Jumlah uang
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
                <button type="button" class="btn default" data-dismiss="modal" id="btnCloseModalDataAdv">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--  END  MODAL Data Advance -->
<!--  MODAL Data Advance -->
<div class="modal fade draggable-modal" id="idDivTabelReqpay" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Data Request For Payment</h4>
            </div>
            <div class="modal-body">
                <div class="scroller" style="height:400px; ">
                    <div class="row">
                        <div class="col-md-12">
                            <button id="id_ReloadReqpay" class="id_ReloadMaster" style="display: none;"></button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-body">
                                <table class="table table-striped table-bordered table-hover text_kanan" id="idTabelReqpay">
                                    <thead>
                                    <tr>
                                        <th>
                                            Id Reqpay
                                        </th>
                                        <th>
                                            Nama Karyawan
                                        </th>
                                        <th>
                                            Jumlah uang
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
                <button type="button" class="btn default" data-dismiss="modal" id="btnCloseModalDataReqpay">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--  END  MODAL Data Reqpay -->
<!--  MODAL Data Reimpay -->
<div class="modal fade draggable-modal" id="idDivTabelReimpay" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Data Reimbursement Payment</h4>
            </div>
            <div class="modal-body">
                <div class="scroller" style="height:400px; ">
                    <div class="row">
                        <div class="col-md-12">
                            <button id="id_ReloadReimpay" class="id_ReloadMaster" style="display: none;"></button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-body">
                                <table class="table table-striped table-bordered table-hover text_kanan"
                                       id="idTabelReimpay">
                                    <thead>
                                    <tr>
                                        <th>
                                            Id Reimpay
                                        </th>
                                        <th>
                                            Nama Karyawan
                                        </th>
                                        <th>
                                            Jumlah uang
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
                <button type="button" class="btn default" data-dismiss="modal" id="btnCloseModalDataReimpay">Close
                </button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--  END  MODAL Data Reimpay -->
<!--  MODAL Data Settlement Advance -->
<div class="modal fade draggable-modal" id="idDivTabelSettle" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Data Settlement Of Advance</h4>
            </div>
            <div class="modal-body">
                <div class="scroller" style="height:400px; ">
                    <div class="row">
                        <div class="col-md-12">
                            <button id="id_ReloadSettle" class="id_ReloadMaster" style="display: none;"></button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-body">
                                <table class="table table-striped table-bordered table-hover text_kanan"
                                       id="idTabelSettleAdv">
                                    <thead>
                                    <tr>
                                        <th>
                                            Id Settlement
                                        </th>
                                        <th>
                                            Nama Karyawan
                                        </th>
                                        <th>
                                            Jumlah Advance
                                        </th>
                                        <th>
                                            Jumlah Settlement
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
                <button type="button" class="btn default" data-dismiss="modal" id="btnCloseModalDataSettleAdv">Close
                </button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--  END  MODAL Data Settlement -->
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
<!--  MODAL Data Cash FLow -->
<div class="modal fade draggable-modal" id="idDivTabelCflow" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Data Cash Flow</h4>
            </div>
            <div class="modal-body">
                <div class="scroller" style="height:400px; ">
                    <div class="row">
                        <div class="col-md-12">
                            <button id="id_ReloadCflow" style="display: none;"></button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-body">
                                <table class="table table-striped table-bordered table-hover text_kanan"
                                       id="idTabelCflow">
                                    <thead>
                                    <tr>
                                        <th width='15%' align='left'>Kd Cflow</th>
                                        <th width='15%' align='left'>Kd Alt</th>
                                        <th width='50%' align='left'>Nama Perk</th>
                                        <th width='10%' align='center'>Level</th>
                                        <th width='10%' align='center'>Type</th>

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
                <button type="button" class="btn default" data-dismiss="modal" id="btnCloseModalCflow">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--  END  MODAL Cash Flow -->


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
<?php //echo  $this->session->userdata('compPickersJS'); ?>
<script src="<?php echo base_url('metronic/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js'); ?>"
        type="text/javascript"></script>
<script src="<?php echo base_url('metronic/admin/pages/scripts/components-pickers.js'); ?>"
        type="text/javascript"></script>

<script>
    jQuery(document).ready(function () {
        Metronic.init(); // init metronic core components
        Layout.init(); // init current layout
        Demo.init(); // init demo features
        ComponentsPickers.init();
        TableManaged.init();
    });
    var judul_menu = $('#id_a_menu_<?php echo $menu_id; ?>').text();
    $('#id_judul_menu').text(judul_menu);
    // MENU OPEN
    $(".menu_root").removeClass('start active open');
    $("#menu_root_<?php echo $menu_parent; ?>").addClass('start active open');
    // END MENU OPEN
    var TableManaged = function () {

        var initTableAdv = function () {
            var table = $('#idTabelAdv');
            // begin first table
            table.dataTable({
                "ajax": "<?php echo base_url("/kasir/getAdvAll"); ?>",
                "columns": [
                    {"data": "idAdv"},
                    {"data": "idPp"},
                    {"data": "namaKyw"},
                    {"data": "jmlUang"}
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
            $('#id_ReloadAdv').click(function () {
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
                var idAdv = $(this).find("td").eq(0).html();
                $('#id_idAdvance').val(idAdv);
                $('#id_idAdvance').focus();
                $('#btnCloseModalDataAdv').trigger('click');

            });

            tableWrapper.find('.dataTables_length select').addClass("form-control input-xsmall input-inline"); // modify table per page dropdown
        }
        var initTableRp = function () {
            var table = $('#idTabelReqpay');
            // begin first table
            table.dataTable({
                "ajax": "<?php  echo base_url("/kasir/getReqpayAll"); ?>",
                "columns": [
                    { "data": "idReqpay" },
                    { "data": "namaReq" },
                    { "data": "jmlUang" }
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
            $('#id_ReloadReqpay').click(function () {
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
                var idReqpay = $(this).find("td").eq(0).html();
                $('#id_idReqpay').val(idReqpay);
                $('#id_idReqpay').focus();
                $('#btnCloseModalDataReqpay').trigger('click');

            });

            tableWrapper.find('.dataTables_length select').addClass("form-control input-xsmall input-inline"); // modify table per page dropdown
        }
        var initTableRm = function () {
            var table = $('#idTabelReimpay');
            // begin first table
            table.dataTable({
                "ajax": "<?php  echo base_url("/kasir/getReimpayAll"); ?>",
                "columns": [
                    {"data": "idReimpay"},
                    {"data": "namaReq"},
                    {"data": "jmlUang"}
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
            $('#id_ReloadReimpay').click(function () {
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
                var idReimpay = $(this).find("td").eq(0).html();
                $('#id_idReimpay').val(idReimpay);
                $('#id_idReimpay').focus();
                $('#btnCloseModalDataReimpay').trigger('click');
            });

            tableWrapper.find('.dataTables_length select').addClass("form-control input-xsmall input-inline"); // modify table per page dropdown
        }
        var initTableSt = function () {
            var table = $('#idTabelSettleAdv');
            // begin first table
            table.dataTable({
                "ajax": "<?php  echo base_url("/kasir/getSettlement"); ?>",
                "columns": [
                    {"data": "idSettle"},
                    {"data": "namaReq"},
                    {"data": "jmlUangAdv"},
                    {"data": "jmlUangPaid"}
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
            $('#id_ReloadSettle').click(function () {
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
                var idSettle = $(this).find("td").eq(0).html();
                $('#id_idSettle').val(idSettle);
                $('#id_idSettle').focus();
                $('#btnCloseModalDataSettleAdv').trigger('click');

            });
            tableWrapper.find('.dataTables_length select').addClass("form-control input-xsmall input-inline"); // modify table per page dropdown
        }
        var initTableCf = function () {
            //var table = $('#id_TabelPerk');
            // begin first table
            var table = $('#idTabelCflow').dataTable({
                "ajax": "<?php  echo base_url("/master_cflow/getAllCflow"); ?>",
                "columns": [
                    {"data": "kode_cflow"},
                    {"data": "kode_alt"},
                    {"data": "nama_cflow"},
                    {"data": "level"},
                    {"data": "type"}
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
                var typeCF = $(this).find("td").eq(4).html();
                if(typeCF == 'D'){
                    var kodeCflow = $(this).find("td").eq(0).html();
                    $('#id_kodeCflow').val(kodeCflow);
                    var kodeAlt = $(this).find("td").eq(1).html();
                    $('#id_kodeAltCflow').text(kodeAlt);
                    var namaCflow = $(this).find("td").eq(2).html();
                    $('#id_namaCflow').text(namaCflow);

                    $("#btnCloseModalCflow").trigger("click");
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
                initTableAdv();
                initTableRp();
                initTableRm();
                initTableSt();
                initTableCf();
            }
        };
    }();

    //Ready Doc
    $('#id_btnModalPerk').attr('disabled',true);
    btnStart();
    readyToStart();
    tglTransStart();

    $('.request_in').hide();
    $("#id_jnsReq").change(function () {
        var jnsReq = $(this).val();
        $('.request_in').slideUp();
        if(jnsReq == 'AV'){
            $('#div_idAdvance').slideDown();
        }else if(jnsReq == 'RP'){
            $('#div_idReqpay').slideDown();
        }else if(jnsReq == 'RM'){
            $('#div_idReimpay').slideDown();
        }else if(jnsReq == 'ST'){
            $('#div_idSettle').slideDown();
        }else if(jnsReq == ''){
            $('.request_in').slideUp();
        }
    });
    $("#id_kodeJurnal").focus();

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
        resetForm();
        readyToStart();
        tglTransStart();

        $('#id_body_data').empty();
        $("#id_kodebayar").select2("val", "");
        $("#id_jnsReq").select2("val", "");
        $('.request_in').slideUp();
        kosongCPA();
    });
    $("#id_idAdvance").focusout(function () {
        var idAdv = $(this).val();
        getDescAdv(idAdv);
    });
    $( "#id_idReqpay" ).focusout(function() {
        var idReqpay	= $(this).val();
        getDescReqpay(idReqpay);
        getJurnalKr(idReqpay);
    });
    $( "#id_idReimpay" ).focusout(function() {
        var idReimpay	= $(this).val();
        getDescReimpay(idReimpay);
        getJurnalKr(idReimpay);
    });
    $("#id_idSettle").focusout(function () {
        var idSettle = $(this).val();
        getDescSettle(idSettle);
        //getJurnalDb(idSettle);
    });
    $('#id_kodebayar').change(function () {
        var kdBayar = $(this).val();
        if (kdBayar == '') {
            $('#id_kodebayar').val('');
            $('#id_kodePerkBayar').val('');
            $('#id_namaPerkBayar').val('');
        } else {
            getDescKodeBayar(kdBayar);
        }
    });
    function getDescKodeBayar(kdBayar) {
        ajaxModal();
        if (kdBayar != '') {
            $.post("<?php echo site_url('/kasir/getDescKodeBayar'); ?>",
                {
                    'kdBayar': kdBayar
                }, function (data) {
                    if (data.baris == 1) {
                        $('#id_kodePerkBayar').val(data.kodePerk);
                        $('#id_namaPerkBayar').val(data.namaPerk);

                        var i = $('#idTxtTempLoop').val();
                        if(i != '0'){
                            var x =  parseInt(i) + 1;
                            var noRow = $('#idTxtTempKodeBayar').val();
                            $('#tr'+noRow).remove();
                            $('#idTxtTempKodeBayar').val(x);
                        }
                            var jnsReq = $("#id_jnsReq").val();
                            if(jnsReq == 'ST'){
                                var uangPaidou = $('#id_uangPaidou').val();
                                uangPaidou     = parseFloat(CleanNumber(uangPaidou));
                                //Jika actual lebih bersar dari rencana (advance) maka selisih - minus
                                if(uangPaidou<0){
                                    var db = 0;
                                    var kr = Math.abs(uangPaidou);
                                    addRowKrKdBayar(data.kodePerk,data.namaPerk,db,kr);
                                    $('#id_totalKr').val(number_format(kr,2));
                                }else{
                                    //Jika actual lebih kecil dari rencana (advance) maka selisih + plus
                                    var kr = 0;
                                    var db = uangPaidou;
                                    addRowDbKdBayar(data.kodePerk,data.namaPerk,db,kr);
                                    $('#id_totalDb').val(number_format(db,2));
                                }

                            }else{
                                var db = 0;
                                var kr = $('#id_uang').val();
                                addRowKrKdBayar(data.kodePerk,data.namaPerk,db,kr);
                                $('#id_totalKr').val(number_format(kr,2));
                            }
                    } else {
                        alert('Data tidak ditemukan!');
                        $('#id_btnBatal').trigger('click');
                    }
                }, "json");
        }//if kd<>''
    }

    function getDescAdv(idAdv) {
        ajaxModal();
        if (idAdv != '') {
            $.post("<?php echo site_url('/kasir/getDescAdv'); ?>",
                {
                    'idAdv': idAdv
                }, function (data) {
                    if (data.baris == 1) {
                        $('#id_namaKyw').val(data.nama_kyw);
                        $('#id_deptKyw').val(data.nama_dept);
                        $('#id_uang').val(data.jml_uang);
                        $('#id_proyek').val(data.id_proyek);
                        $('#id_dept').val(data.id_dept);
                        $('#id_tglReq').val(data.tgl_trans);
                        $('#id_tglJT').val(data.tgl_jt);
                        $('#id_keterangan').val(data.keterangan);
                        var db = data.jml_uang;
                        var kr = 0;
                        addRowKrKdBayar(data.kodePerkUM,data.namaPerkUM,db,kr);
                        $('#id_totalDb').val(number_format(db,2));
                    } else {
                        alert('Data tidak ditemukan!');
                        $('#id_btnBatal').trigger('click');
                    }
                }, "json");
        }//if kd<>''
    }
    function getDescReqpay(idReqpay){
        ajaxModal();
        if (idReqpay != '') {
            $.post("<?php echo site_url('/master_reqpay/getDescReqpay'); ?>",
                {
                    'idReqpay': idReqpay
                },function (data) {
                    if (data.baris == 1) {
                        $('#id_kywId').val(data.id_kyw);
                        $('#id_namaKyw').val(data.nama_kyw);
                        $('#id_dept').val(data.id_dept);
                        $('#id_noInvoice').val(data.no_invoice);
                        $('#id_noPO').val(data.no_po);
                        $('#id_uang').val(data.jml_uang);
                        $('#id_proyek').val(data.id_proyek);
                        $('#id_tglReq').val(data.tgl_trans);
                        $('#id_tglJT').val(data.tgl_jt);
                        $('#id_keterangan').val(data.keterangan);
                        /*
                         $('#').val(data.); */
                    }else{
                        alert('Data tidak ditemukan!');
                        $('#id_btnBatal').trigger('click');
                    }
                }, "json");
        }//if kd<>''
    }
    function getDescReimpay(idReimpay) {
        ajaxModal();
        if (idReimpay != '') {
            $.post("<?php echo site_url('/master_reimpay/getDescReimpay'); ?>",
                {
                    'idReimpay': idReimpay
                }, function (data) {
                    if (data.baris == 1) {
                        $('#id_kywId').val(data.id_kyw);
                        $('#id_namaKyw').val(data.nama_kyw);
                        $('#id_dept').val(data.id_dept);
                        $('#id_deptKyw').val(data.nama_dept);
                        $('#id_noInvoice').val(data.no_invoice);
                        $('#id_uang').val(data.jml_uang);
                        $('#id_proyek').val(data.id_proyek);
                        $('#id_tglReq').val(data.tgl_trans);
                        $('#id_tglJT').val(data.tgl_jt);
                        $('#id_namaPayTo').val(data.nama_pay_to);
                        /*
                         $('#').val(data.); */
                    } else {
                        alert('Data tidak ditemukan!');
                        $('#id_btnBatal').trigger('click');
                    }
                }, "json");
        }//if kd<>''
    }
    function getDescSettle(idSettle) {
        ajaxModal();
        if (idSettle != '') {
            $.post("<?php echo site_url('/master_settle_adv/getDescSettle'); ?>",
                {
                    'idSettle': idSettle
                }, function (data) {
                    if (data.baris == 1) {
                        $('#id_kywId').val(data.id_kyw);
                        $('#id_namaKyw').val(data.nama_kyw);
                        $('#id_deptKyw').val(data.nama_dept);
                        $('#id_dept').val(data.id_dept);
                        //$('#id_idAdvance').val(data.idAdvance);
                        //$('#id_advAmount').val(number_format(data.advAmount, 2));
                        $('#id_uang').val(number_format(data.paid, 2));
                        $('#id_uangPaidou').val(data.paidou);
                        $('#id_tglJT').val(data.tgl_jt);
                        $('#id_proyek').val(data.id_proyek);
                        $('#id_idPayTo').val(data.id_pay_to);
                        $('#id_namaPayTo').val(data.pay_to);
                        $('#id_tglReq').val(data.tglTransSt);

                        $('#id_keteranganAdv').val(data.ketadv);
                        $('#id_keterangan').val(data.keterangan);

                        var idMaster = $('#id_idSettle').val();
                        //Jika actual lebih bersar dari rencana (advance) maka selisih - minus
                        if(parseFloat(CleanNumber(data.paidou))<0){
                            getJurnalKrSt(idMaster,Math.abs(data.paidou));
                        }else{
                            //Jika actual lebih kecil dari rencana (advance) maka selisih + plus
                            getJurnalDb(idMaster,data.paidou);
                        }

                        /*
                         $('#').val(data.); */
                    } else {
                        alert('Data tidak ditemukan!');
                        $('#id_btnBatal').trigger('click');
                    }
                }, "json");
        }//if kd<>''
    }
    function getJurnalKr(idMaster){
        ajaxModal();
        if (idMaster != '') {
            $.post("<?php echo site_url('/kasir/getJurnalKr'); ?>",
                {
                    'idMaster': idMaster
                },function (data) {
                    if (data.data_cpa.length > 0) {
                        $('#idTxtTempLoop').val(data.data_cpa.length);
                        for(i=0;i<data.data_cpa.length;i++){
                            var x = i + 1;
                            //var idCpa           = data.data_cpa[i].id_cpa;
                            var kodePerk        = data.data_cpa[i].kode_perk;
                            var kodeCflow       = data.data_cpa[i].kode_cflow;
                            if(kodeCflow == null){
                                kodeCflow='';
                            }
                            var ket             = data.data_cpa[i].keterangan;
                            var kr              = 0;
                            var db              = data.data_cpa[i].kredit;
                            tr ='<tr class="listdata" id="tr'+x+'">';
                            tr+='<td><input type="text" class="form-control input-sm" id="id_tempKodePerk'+x+'" name="tempKodePerk'+x+'" readonly="true" value="'+kodePerk+'"></td>';
                            tr+='<td><input type="text" class="form-control input-sm" id="id_tempKet'+x+'" name="tempKet'+x+'" readonly="true" value="'+ket+'"></td>';
                            tr+='<td><input type="text" class="form-control input-sm" id="id_tempKodeCflow'+x+'" name="tempKodeCflow'+x+'" readonly="true" value="'+kodeCflow+'" ></td>';
                            tr+='<td><input type="text" class="form-control nomor input-sm" id="id_tempDb'+x+'" name="tempDb'+x+'" readonly="true" value="'+number_format(db,2)+'"></td>';
                            tr+='<td><input type="text" class="form-control nomor input-sm" id="id_tempKr'+x+'" name="tempKr'+x+'" readonly="true" value="'+number_format(kr,2)+'"></td>';
                            tr+= '</tr>';

                            jumlahDb        = parseFloat(CleanNumber(db));
                            var totalDb     = parseFloat(CleanNumber($('#id_totalDb').val()));
                            var totalDb     = totalDb + jumlahDb;

                            $('#id_totalDb').val(number_format(totalDb,2));
                            $('#id_body_data').append(tr);
                        }
                    }else{
                        //alert('Data tidak ditemukan!');
                        //$('#id_btnBatal').trigger('click');
                    }
                }, "json");
        }//if kd<>''
    }
    //Jurnal get khusus settlement
    function getJurnalKrSt(idMaster,jmlPaid){
        ajaxModal();
        if (idMaster != '') {
            $.post("<?php echo site_url('/kasir/getJurnalKrSt'); ?>",
                {
                    'idMaster': idMaster,
                    'jmlPaid': jmlPaid
                },function (data) {
                    if (data.data_cpa.length > 0) {
                        $('#idTxtTempLoop').val(data.data_cpa.length);
                        for(i=0;i<data.data_cpa.length;i++){
                            var x = i + 1;
                            //var idCpa           = data.data_cpa[i].id_cpa;
                            var kodePerk        = data.data_cpa[i].kode_perk;
                            var kodeCflow       = data.data_cpa[i].kode_cflow;
                            if(kodeCflow == null){
                                kodeCflow='';
                            }
                            var ket             = data.data_cpa[i].keterangan;
                            var kr              = 0;
                            var db              = data.data_cpa[i].kredit;
                            tr ='<tr class="listdata" id="tr'+x+'">';
                            tr+='<td><input type="text" class="form-control input-sm" id="id_tempKodePerk'+x+'" name="tempKodePerk'+x+'" readonly="true" value="'+kodePerk+'"></td>';
                            tr+='<td><input type="text" class="form-control input-sm" id="id_tempKet'+x+'" name="tempKet'+x+'" readonly="true" value="'+ket+'"></td>';
                            tr+='<td><input type="text" class="form-control input-sm" id="id_tempKodeCflow'+x+'" name="tempKodeCflow'+x+'" readonly="true" value="'+kodeCflow+'" ></td>';
                            tr+='<td><input type="text" class="form-control nomor input-sm" id="id_tempDb'+x+'" name="tempDb'+x+'" readonly="true" value="'+number_format(db,2)+'"></td>';
                            tr+='<td><input type="text" class="form-control nomor input-sm" id="id_tempKr'+x+'" name="tempKr'+x+'" readonly="true" value="'+number_format(kr,2)+'"></td>';
                            tr+= '</tr>';

                            jumlahDb        = parseFloat(CleanNumber(db));
                            var totalDb     = parseFloat(CleanNumber($('#id_totalDb').val()));
                            var totalDb     = totalDb + jumlahDb;

                            $('#id_totalDb').val(number_format(totalDb,2));
                            $('#id_body_data').append(tr);
                        }
                    }else{
                        //alert('Data tidak ditemukan!');
                        //$('#id_btnBatal').trigger('click');
                    }
                }, "json");
        }//if kd<>''
    }
    function getJurnalDb(idMaster,jmlPaid){
        ajaxModal();
        if (idMaster != '') {
            $.post("<?php echo site_url('/kasir/getJurnalDb'); ?>",
                {
                    'idMaster': idMaster,
                    'jmlPaid': jmlPaid
                },function (data) {
                    if (data.data_cpa.length > 0) {
                        $('#idTxtTempLoop').val(data.data_cpa.length);
                        for(i=0;i<data.data_cpa.length;i++){
                            var x = i + 1;
                            //var idCpa           = data.data_cpa[i].id_cpa;
                            var kodePerk        = data.data_cpa[i].kode_perk;
                            var kodeCflow       = data.data_cpa[i].kode_cflow;
                            if(kodeCflow == null){
                                kodeCflow='';
                            }
                            var ket             = data.data_cpa[i].keterangan;
                            var kr              = data.data_cpa[i].debet;
                            var db              = 0;
                            tr ='<tr class="listdata" id="tr'+x+'">';
                            tr+='<td><input type="text" class="form-control input-sm" id="id_tempKodePerk'+x+'" name="tempKodePerk'+x+'" readonly="true" value="'+kodePerk+'"></td>';
                            tr+='<td><input type="text" class="form-control input-sm" id="id_tempKet'+x+'" name="tempKet'+x+'" readonly="true" value="'+ket+'"></td>';
                            tr+='<td><input type="text" class="form-control input-sm" id="id_tempKodeCflow'+x+'" name="tempKodeCflow'+x+'" readonly="true" value="'+kodeCflow+'" ></td>';
                            tr+='<td><input type="text" class="form-control nomor input-sm" id="id_tempDb'+x+'" name="tempDb'+x+'" readonly="true" value="'+number_format(db,2)+'"></td>';
                            tr+='<td><input type="text" class="form-control nomor input-sm" id="id_tempKr'+x+'" name="tempKr'+x+'" readonly="true" value="'+number_format(kr,2)+'"></td>';
                            tr+= '</tr>';

                            jumlahKr        = parseFloat(CleanNumber(kr));
                            var totalKr     = parseFloat(CleanNumber($('#id_totalKr').val()));
                            var totalKr     = totalKr + jumlahKr;

                            $('#id_totalKr').val(number_format(totalKr,2));
                            $('#id_body_data').append(tr);
                        }
                    }else{
                        //alert('Data tidak ditemukan!');
                        //$('#id_btnBatal').trigger('click');
                    }
                }, "json");
        }//if kd<>''
    }
    function addRowKrKdBayar(kodePerk,namaPerk,Db,Kr) {
        var i = $('#idTxtTempLoop').val();
        var x =  parseInt(i) + 1;
        var kodeCflow ='';

        tr ='<tr class="listdata" id="tr'+x+'">';
        tr+='<td><input type="text" class="form-control input-sm" id="id_tempKodePerk'+x+'" name="tempKodePerk'+x+'" readonly="true" value="'+kodePerk+'"></td>';
        tr+='<td><input type="text" class="form-control input-sm" id="id_tempKet'+x+'" name="tempKet'+x+'" readonly="true" value="'+namaPerk+'"></td>';
        //tr += '<td><textarea class="form-control input-sm" id="id_tempKet' + x + '" name="tempKet' + x + '" readonly="true" >'+ namaPerkUM +'\n'+ data.keterangan +'</textarea></td>';
        tr+='<td><input type="text" class="form-control input-sm" id="id_tempKodeCflow'+x+'" name="tempKodeCflow'+x+'" readonly="true" value="'+kodeCflow+'" ></td>';
        tr+='<td><input type="text" class="form-control nomor input-sm" id="id_tempDb'+x+'" name="tempDb'+x+'" readonly="true" value="'+number_format(Db,2)+'"></td>';
        tr+='<td><input type="text" class="form-control nomor input-sm" id="id_tempKr'+x+'" name="tempKr'+x+'" readonly="true" value="'+number_format(Kr,2)+'"></td>';
        tr+= '</tr>';

        i++;
        $('#id_body_data').append(tr);
        $('#idTxtTempLoop').val(i);
    }
    function addRowDbKdBayar(kodePerk,namaPerk,Db,Kr) {
        var i = $('#idTxtTempLoop').val();
        var x =  parseInt(i) + 1;
        var kodeCflow ='';

        tr ='<tr class="listdata" id="tr'+x+'">';
        tr+='<td><input type="text" class="form-control input-sm" id="id_tempKodePerk'+x+'" name="tempKodePerk'+x+'" readonly="true" value="'+kodePerk+'"></td>';
        tr+='<td><input type="text" class="form-control input-sm" id="id_tempKet'+x+'" name="tempKet'+x+'" readonly="true" value="'+namaPerk+'"></td>';
        //tr += '<td><textarea class="form-control input-sm" id="id_tempKet' + x + '" name="tempKet' + x + '" readonly="true" >'+ namaPerkUM +'\n'+ data.keterangan +'</textarea></td>';
        tr+='<td><input type="text" class="form-control input-sm" id="id_tempKodeCflow'+x+'" name="tempKodeCflow'+x+'" readonly="true" value="'+kodeCflow+'" ></td>';
        tr+='<td><input type="text" class="form-control nomor input-sm" id="id_tempDb'+x+'" name="tempDb'+x+'" readonly="true" value="'+number_format(Db,2)+'"></td>';
        tr+='<td><input type="text" class="form-control nomor input-sm" id="id_tempKr'+x+'" name="tempKr'+x+'" readonly="true" value="'+number_format(Kr,2)+'"></td>';
        tr+= '</tr>';

        i++;
        $('#id_body_data').append(tr);
        $('#idTxtTempLoop').val(i);
    }
    function btnCpaStart() {
        $('#id_btnAddCpa').attr("disabled", false);
        $('#id_btnUpdateCpa').attr("disabled", true);
        $('#id_btnRemoveCpa').attr("disabled", true);
        $('#id_btnSign').attr("disabled",true);
    }
    $('#id_btnAddCpa').click(function(){
        var i = $('#idTxtTempLoop').val();
        if($('#id_kodePerk').val() =='' && $('#id_kodeCflow').text() == ''){
            alert("Akun GL tidak boleh kosong.");
        }else{
            var i = parseInt($('#idTxtTempLoop').val());

            i=i+1;
            var kodePerk        = $('#id_kodePerk').val();
            var kodeCflow       = $('#id_kodeCflow').val();
            var ket             = $('#id_keteranganCPA').val().trim();
            var db              = $('#id_jumlahDb').val();
            var kr              = $('#id_jumlahKr').val();
            db                  = parseFloat(CleanNumber(db));
            kr                  = parseFloat(CleanNumber(kr));

            tr ='<tr class="listdata" id="tr'+i+'">';
            tr+='<td><input type="text" class="form-control input-sm" id="id_tempKodePerk'+i+'" name="tempKodePerk'+i+'" readonly="true" value="'+kodePerk+'"></td>';
            tr+='<td><input type="text" class="form-control input-sm" id="id_tempKet'+i+'" name="tempKet'+i+'" readonly="true" value="'+ket+'"></td>';
            tr+='<td><input type="text" class="form-control input-sm" id="id_tempKodeCflow'+i+'" name="tempKodeCflow'+i+'" readonly="true" value="'+kodeCflow+'" ></td>';
            tr+='<td><input type="text" class="form-control nomor input-sm" id="id_tempDb'+i+'" name="tempDb'+i+'" readonly="true" value="'+number_format(db,2)+'"></td>';
            tr+='<td><input type="text" class="form-control nomor input-sm" id="id_tempKr'+i+'" name="tempKr'+i+'" readonly="true" value="'+number_format(kr,2)+'"></td>';
            tr+= '</tr>';

            var totalDb         = parseFloat(CleanNumber($('#id_totalDb').val()));
            var totalDb           = totalDb+db;
            $('#id_totalDb').val(number_format(totalDb,2));

            var totalKr         = parseFloat(CleanNumber($('#id_totalKr').val()));
            var totalKr           = totalKr+kr;
            $('#id_totalKr').val(number_format(totalKr,2));

            $('#id_body_data').append(tr);
            $('#idTxtTempLoop').val(i);
            kosongCPA();
        }
    });
    $("#id_tabelPerkCflow").on('click', 'tbody tr', function () {
        var kodePerk    = $(this).find("td input").eq(0).val();
        var ket         = $(this).find("td input").eq(1).val();
        var kodeCflow   = $(this).find("td input").eq(2).val();
        var db          = $(this).find("td input").eq(3).val();
        var kr          = $(this).find("td input").eq(4).val();
        db              = parseFloat(CleanNumber(db));
        kr              = parseFloat(CleanNumber(kr));

        $('#id_kodePerk').val(kodePerk);
        $('#id_kodeCflow').val(kodeCflow);
        $('#id_keteranganCPA').val(ket);
        $('#id_jumlahDb').val(number_format(db,2));
        $('#id_jumlahKr').val(number_format(kr,2));

        var idTr = $(this).attr('id');
        var noRow = idTr.replace('tr', '');
        $('#idTempUbahCPA').val(noRow);

        $('#idTempJumlahDb').val(number_format(db,2));
        $('#idTempJumlahKr').val(number_format(kr,2));

        $('#id_btnAddCpa').attr("disabled",true);
        $('#id_btnUpdateCpa').attr("disabled",false);
        $('#id_btnRemoveCpa').attr("disabled",false);

    });
    function kosongCPA() {
        $('.kosongCPA').val('');
        $('.tkosongCPA').text('');
        $('#id_jumlahDb').val('0.00');
        $('#id_jumlahKr').val('0.00');
    }
    $('#id_btnUpdateCpa').click(function(){
        var noRow   = $('#idTempUbahCPA').val();
        var kodePerk    = $('#id_kodePerk').val();
        var kodeCflow   = $('#id_kodeCflow').val();
        var ket         = $('#id_keteranganCPA').val();
        var db          = $('#id_jumlahDb').val();
        var kr          = $('#id_jumlahKr').val();
        db              = parseFloat(CleanNumber(db));
        kr              = parseFloat(CleanNumber(kr));

        var totalDb      = parseFloat(CleanNumber($('#id_totalDb').val()));
        var totalKr      = parseFloat(CleanNumber($('#id_totalKr').val()));

        var jumlahDbOld   = parseFloat(CleanNumber($('#idTempJumlahDb').val()));
        totalDb          = totalDb - jumlahDbOld + db;

        var jumlahKrOld   = parseFloat(CleanNumber($('#idTempJumlahKr').val()));
        totalKr          = totalKr - jumlahKrOld + kr;

        $('#id_tempKodePerk'+noRow).val(kodePerk);
        $('#id_tempKodeCflow'+noRow).val(kodeCflow);
        $('#id_tempKet'+noRow).val(ket);
        $('#id_tempDb'+noRow).val(number_format(db,2));
        $('#id_tempKr'+noRow).val(number_format(kr,2));

        $('#id_totalDb').val(number_format(totalDb,2));
        $('#id_totalKr').val(number_format(totalKr,2));
        kosongCPA();
        btnCpaStart();
    });
    $('#id_btnBatalCpa').click(function () {
        kosongCPA();
        btnCpaStart();
    });
    function ajaxSubmit() {
        ajaxModal();
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "<?php echo base_url(); ?>kasir/simpan",
            data: dataString,
            success: function (data) {
                if(data.jnsReq == 'AV'){
                    $('#id_ReloadAdv').trigger('click');
                }else if(data.jnsReq == 'ST'){
                    $('#id_ReloadSettle').trigger('click');
                }else if(data.jnsReq == 'RP'){
                    $('#id_ReloadReqpay').trigger('click');
                }else if(data.jnsReq == 'RM'){
                    $('#id_ReloadReimpay').trigger('click');
                }

                $('#id_proyek').attr('disabled',true);
                $('#id_idPemb').val(data.idPemb);
                $('#id_btnSimpan').attr('disabled',true);
                UIToastr.init(data.tipePesan, data.pesan);
            }

        });
        event.preventDefault();
    }


    $('#id_formKasir').submit(function (event) {
        $('#id_proyek').attr('disabled',false);
        dataString = $("#id_formKasir").serialize();
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
    function cetak() {
        var idJurnal = $('#id_idPemb').val();
        var kdJurnal = $('#id_jnsReq').val();
        if (idJurnal == '') {
            alert('Silahkan pilih ID Jurnal');
        } else {
            window.open("<?php echo base_url('kasir/cetak/'); ?>/"+idJurnal+'/'+kdJurnal, '_blank');
        }
    }
</script>


<!-- END JAVASCRIPTS -->