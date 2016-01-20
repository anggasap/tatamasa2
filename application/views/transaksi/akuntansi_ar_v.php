<!-- BEGIN PAGE BREADCRUMB -->
<style type="text/css">
    table#idTabelAdv td:nth-child(3) {
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
                    <span class="caption-subject font-red-sunglo bold uppercase"><?php echo $menu_nama; ?></span>
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
                <ul class="nav nav-pills">
                    <li class="linav active" id="linav1">
                        <a href="#tab_2_1" data-toggle="tab" id="navitab_2_1" class="anavitab">
                            Info Penjualan </a>
                    </li>
                    <li class="linav" id="linav2">
                        <a href="#tab_2_2" data-toggle="tab" id="navitab_2_2" class="anavitab">
                            Jurnal </a>
                    </li>
                </ul>
                <form role="form" method="post"
                      action="<?php echo base_url('akuntansi/home'); ?>" id="id_formAkuntansi">
                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="tab_2_1">
                            <div class="row">
                                <div class="form-body">
                                    <div class="col-md-3">
                                        <div class="form-group">

                                            <label>Id Jurnal </label>
                                            <input id="id_idJurnal" required="required" class="form-control input-sm"
                                                   type="text" name="idJurnal" readonly/>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Tgl Jurnal</label>
                                                    <input id="id_tgltrans" class="form-control  input-sm"
                                                           type="text" name="tgltrans" readonly/>

                                                </div>
                                                <div class="col-md-6">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Kode Jurnal</label>
                                            <select id="id_kodeJurnal" class="form-control input-sm select2me"
                                                    name="kodeJurnal">
                                                <option value=""></option>
                                                <option value="BK">Booking</option>
                                                <option value="AJB">AJB</option>
                                                <option value="JU">Sisa KPR</option>
                                            </select>
                                        </div>

                                        <div class="form-group request_in" id="div_idBooking">
                                            <label>Id master </label>

                                            <div class="input-group">
                                                <input id="id_masterId" required="required"
                                                       class="form-control  input-sm"
                                                       type="text" name="masterId" readonly/>
                                    <span class="input-group-btn">
                                        <a href="#" class="btn btn-success btn-sm" data-target="#idDivTabelBooking"
                                           id="id_btnModal" data-toggle="modal">
                                            <i class="fa fa-search fa-fw"/></i>

                                        </a>
                                    </span>
                                            </div>
                                        </div>
                                        <div class="form-group request_in" id="div_idAJB">
                                            <label>Id Master</label>

                                            <div class="input-group">
                                                <input id="id_idAJB" required="required"
                                                       class="form-control  input-sm"
                                                       type="text" name="idAJB" readonly/>
                                    <span class="input-group-btn">
                                        <a href="#" class="btn btn-success btn-sm" data-target="#idDivTabelAJB"
                                           id="id_btnModal" data-toggle="modal">
                                            <i class="fa fa-search fa-fw"/></i>

                                        </a>
                                    </span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end <div class="col-md-6"> 1 -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Id rumah </label>
                                                    <input id="id_rumahId" required="required"
                                                           class="form-control input-sm"
                                                           type="text" name="rumahId" readonly/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Nama Rumah </label>
                                                    <input id="id_namaRumah" required="required"
                                                           class="form-control  input-sm"
                                                           type="text" name="namaRumah" placeholder="" readonly/>
                                                </div>
                                                <div class="col-md-6">
                                                    <input id="id_proyek" required="required"
                                                           class="form-control  input-sm "
                                                           type="text" name="proyek" placeholder="" readonly/>
                                                    <label>Nama proyek</label>
                                                    <input id="id_namaProyek" required="required"
                                                           class="form-control  input-sm"
                                                           type="text" name="namaProyek" placeholder="" readonly/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>Tipe rumah</label>
                                                    <input id="id_typeRumah" required="required"
                                                           class="form-control input-sm"
                                                           type="text" name="typeRumah" placeholder="" readonly/>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Blok</label>
                                                    <input id="id_blokRumah" required="required"
                                                           class="form-control input-sm"
                                                           type="text" name="blokRumah" placeholder="" readonly/>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Luas</label>
                                                    <input id="id_luasRumah" required="required"
                                                           class="form-control input-sm"
                                                           type="text" name="luasRumah" placeholder="" readonly/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <label>Harga</label>
                                                    <input id="id_hargaRumah" required="required"
                                                           class="form-control input-sm nomor"
                                                           type="text" name="hargaRumah" placeholder="" readonly/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Nominal</label>
                                            <input id="id_nominal" readonly class="form-control input-sm"
                                                   type="text" name="nominal"/>
                                        </div>
                                    </div>
                                    <div class="col-md-5">

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Id customer </label>
                                                    <input id="id_customerId" required="required"
                                                           class="form-control input-sm"
                                                           type="text" name="customerId" readonly/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Nama customer </label>
                                                    <input id="id_namaCustomer" required="required"
                                                           class="form-control  input-sm"
                                                           type="text" name="namaCustomer" placeholder="" readonly/>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>No Id customer </label>
                                                    <input id="id_noId" required="required"
                                                           class="form-control input-sm"
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
                                                    <input id="id_noHp" required="required"
                                                           class="form-control input-sm"
                                                           type="text" name="noHp" placeholder="" readonly/>
                                                    <label>No Telp </label>
                                                    <input id="id_noTelp" required="required"
                                                           class="form-control input-sm"
                                                           type="text" name="noTelp" placeholder="" readonly/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>No rek GL</label>
                                                    <input id="id_GL" required="required" class="form-control input-sm"
                                                           type="text" name="GL" readonly/>
                                                </div>
                                                <div class="col-md-6">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama rek GL</label>
                                            <input id="id_namaGL" readonly class="form-control input-sm"
                                                   type="text" name="namaGL"/>
                                        </div>
                                    </div>
                                    <!--<div class="col-md-3">
                                        <div class="form-group">
                                            <label>Dibayarkan ke</label>
                                            <input id="id_splId" required="required" class="form-control input-sm "
                                                   type="text" name="splId" readonly/>
                                            <input id="id_namaPayTo" required="required" class="form-control input-sm"
                                                   type="text" name="namapayTo" readonly/>
                                        </div>
                                        <div class="form-group">
                                            <label>GL</label>
                                            <input id="id_kodePerk" class="form-control input-sm"
                                                   type="text" name="kodePerk" readonly/>
                                        </div>
                                        <div class="form-group">
                                            <label>Perkiraan</label>
                                            <input id="id_namaPerk" class="form-control input-sm"
                                                   type="text" name="namaPerk" readonly/>
                                        </div>
                                    </div>-->
                                </div>
                                <!-- HIDDEN INPUT -->
                                <input type="text" id="idTmpAksiBtn" class="hidden">
                                <input type="text" id="idTmpBtnKyw" class="hidden">
                                <!-- END HIDDEN INPUT -->
                            </div>
                            <hr>
                            <div class="row">
                                <div class="form-body">
                                    <div class="col-md-6">

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="tab_2_2">
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
                                                          id="id_btnModal2" data-toggle="modal">
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
                                                          id="id_btnModal2" data-toggle="modal">
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
                                               class="form-control nomor1 ">
                                        <input type="text" id="idTxtTempJnsKode" name="txtTempJnsKode"
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

<!--  MODAL Data Advance -->
<div class="modal fade draggable-modal" id="idDivTabelBooking" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Data Transaksi Booking</h4>
            </div>
            <div class="modal-body">
                <div class="scroller" style="height:400px; ">
                    <div class="row">
                        <div class="col-md-12">
                            <button id="id_ReloadBooking" style="display: none;"></button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-body">
                                <table class="table table-striped table-bordered table-hover text_kanan"
                                       id="idTabelBooking">
                                    <thead>
                                    <tr>
                                        <th>
                                            Id Penjualan
                                        </th>
                                        <th>
                                            Id rumah
                                        </th>
                                        <th>
                                            Id Customer
                                        </th>
                                        <th>
                                            Nama Rumah
                                        </th>
                                        <th>
                                            Nama Customer
                                        </th>
                                        <th>
                                            Jml Booking
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
                <button type="button" class="btn default" data-dismiss="modal" id="btnCloseModalDataBooking">Close
                </button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--  END  MODAL Data Booking -->
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
                            <button id="id_ReloadReimpay" style="display: none;"></button>
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
                                        <th>
                                            Kode GL
                                        </th>
                                        <th>
                                            GL
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
<!--  MODAL Data AJBment Advance -->
<div class="modal fade draggable-modal" id="idDivTabelAJB" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Data AJBment Of Advance</h4>
            </div>
            <div class="modal-body">
                <div class="scroller" style="height:400px; ">
                    <div class="row">
                        <div class="col-md-12">
                            <button id="id_ReloadAJB" style="display: none;"></button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-body">
                                <table class="table table-striped table-bordered table-hover text_kanan"
                                       id="idTabelAJB">
                                    <thead>
                                    <tr>
                                        <th>
                                            Id AJBment
                                        </th>
                                        <th>
                                            Id Advance
                                        </th>
                                        <th>
                                            Nama Karyawan
                                        </th>
                                        <th>
                                            Jumlah Advance
                                        </th>
                                        <th>
                                            Jumlah AJBment
                                        </th>
                                        <th>
                                            Kode UM
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
                <button type="button" class="btn default" data-dismiss="modal" id="btnCloseModalDataAJB">Close
                </button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--  END  MODAL Data AJBment -->
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
<script src="<?php echo base_url('metronic/global/plugins/jquery-ui/jquery-ui.min.js'); ?>"
        type="text/javascript"></script>
<!-- BEGIN PAGE LEVEL PLUGINS -->

<script src="<?php echo base_url('metronic/global/plugins/bootstrap/js/bootstrap.min.js'); ?>"
        type="text/javascript"></script>
<script
    src="<?php echo base_url('metronic/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js'); ?>"
    type="text/javascript"></script>
<script src="<?php echo base_url('metronic/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js'); ?>"
        type="text/javascript"></script>
<script src="<?php echo base_url('metronic/global/plugins/jquery.blockui.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('metronic/global/plugins/jquery.cokie.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('metronic/global/plugins/uniform/jquery.uniform.min.js'); ?>"
        type="text/javascript"></script>
<script src="<?php echo base_url('metronic/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js'); ?>"
        type="text/javascript"></script>
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript"
        src="<?php echo base_url('metronic/global/plugins/bootstrap-toastr/toastr.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('metronic/global/plugins/select2/select2.min.js'); ?>"></script>
<script type="text/javascript"
        src="<?php echo base_url('metronic/global/plugins/datatables/media/js/jquery.dataTables.min.js'); ?>"></script>
<script type="text/javascript"
        src="<?php echo base_url('metronic/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js'); ?>"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- END CORE PLUGINS -->
<script type="text/javascript" src="<?php echo base_url('metronic/global/scripts/metronic.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('metronic/admin/layout4/scripts/layout.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('metronic/admin/layout4/scripts/demo.js'); ?>"></script>
<script src="<?php echo base_url('metronic/additional/start.js'); ?>" type="text/javascript"></script>
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

        var initTableBk = function () {
            var table = $('#idTabelBooking');
            // begin first table
            table.dataTable({
                "ajax": "<?php  echo base_url("/akuntansi_ar/getBookingAll"); ?>",
                "columns": [
                    {"data": "master_id"},
                    {"data": "id_rumah"},
                    {"data": "id_cust"},
                    {"data": "nama_rumah"},
                    {"data": "nama_cust"},
                    {"data": "jml_trans"}
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
            $('#id_ReloadBooking').click(function () {
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
                var masterId = $(this).find("td").eq(0).html();
                $('#id_masterId').val(masterId);
                var rumahId = $(this).find("td").eq(1).html();
                $('#id_rumahId').val(rumahId);
                var custId = $(this).find("td").eq(2).html();
                $('#id_customerId').val(custId);
                var nominal = $(this).find("td").eq(5).html();
                $('#id_nominal').val(nominal);
                $('#btnCloseModalDataBooking').trigger('click');
                var idJurnalPend = '1';
                getDescRumah(rumahId);
                getDescCust(custId);
                getJurnalPend(idJurnalPend, nominal);
                //var kodePerk = $(this).find("td").eq(4).html();
            });

            tableWrapper.find('.dataTables_length select').addClass("form-control input-xsmall input-inline"); // modify table per page dropdown
        }
        var initTableRm = function () {
            var table = $('#idTabelReimpay');
            // begin first table
            table.dataTable({
                "ajax": "<?php  echo base_url("/akuntansi/getReimpayAll"); ?>",
                "columns": [
                    {"data": "idReimpay"},
                    {"data": "namaReq"},
                    {"data": "jmlUang"},
                    {"data": "kodePerk"},
                    {"data": "namaPerk"}
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
                var namaPerk = $(this).find("td").eq(4).html();
                $('#id_namaPerk').val(namaPerk);
                var kodePerk = $(this).find("td").eq(3).html();
                $('#id_kodePerk').val(kodePerk);
                $('#id_idReimpay').focus();
                $('#btnCloseModalDataReimpay').trigger('click');
                getDescCpa(idReimpay);
            });

            tableWrapper.find('.dataTables_length select').addClass("form-control input-xsmall input-inline"); // modify table per page dropdown
        }
        var initTableAJB = function () {
            var table = $('#idTabelAJB');
            // begin first table
            table.dataTable({
                "ajax": "<?php  echo base_url("/akuntansi/getAJBment"); ?>",
                "columns": [
                    {"data": "idAJB"},
                    {"data": "idAdv"},
                    {"data": "namaReq"},
                    {"data": "jmlUangAdv"},
                    {"data": "jmlUangPaid"},
                    {"data": "typeAdv"}
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
            $('#id_ReloadAJB').click(function () {
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
                var idAJB = $(this).find("td").eq(0).html();
                var idAdv = $(this).find("td").eq(1).html();
                var jmlAdv = $(this).find("td").eq(3).html();
                var jmlAJB = $(this).find("td").eq(4).html();
                var kdBayar = $(this).find("td").eq(5).html();
                idAdv = idAdv.trim();
                $('#id_idAJB').val(idAJB);
                $('#id_idAJB').focus();
                //alert(idAdv);

                njmlAdv = parseFloat(CleanNumber(jmlAdv));
                njmlAJB = parseFloat(CleanNumber(jmlAJB));
                var krglbhAdv = Math.abs(njmlAJB - njmlAdv);
                krglbhAdv = number_format(krglbhAdv, 2);
                if (njmlAdv > njmlAJB) {
                    getDescCpa(idAJB);
                    getCpaAJBLbh(idAdv, jmlAJB);
                    getDescUM(kdBayar, jmlAdv);
                } else {
                    getCpaAJBLbh(idAdv, jmlAJB);
                    getDescUM(kdBayar, jmlAdv);
                    getCpaAJBKrg(idAJB, krglbhAdv);
                }

                $('#btnCloseModalDataAJB').trigger('click');
            });
            tableWrapper.find('.dataTables_length select').addClass("form-control input-xsmall input-inline"); // modify table per page dropdown
        }
        var initTablePerk = function () {
            //var table = $('#id_TabelPerk');
            // begin first table
            var table = $('#idTabelPerk').dataTable({
                "ajax": "<?php  echo base_url("/master_perkiraan/getAllPerkiraan"); ?>",
                "columns": [
                    {"data": "kode_perk"},
                    {"data": "kode_alt"},
                    {"data": "nama_perk"},
                    {"data": "level"},
                    {"data": "type"},
                    {"data": "dk"}
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
                var typePerk = $(this).find("td").eq(4).html();
                if (typePerk == 'D') {
                    var kodePerk = $(this).find("td").eq(0).html();
                    $('#id_kodePerk').val(kodePerk);
                    var kodeAlt = $(this).find("td").eq(1).html();
                    $('#id_kodeAlt').text(kodeAlt);
                    var namaPerk = $(this).find("td").eq(2).html();
                    $('#id_namaPerk').text(namaPerk);

                    $("#btnCloseModalPerk").trigger("click");
                } else {
                    alert("Tidak diijinkan pilih kode induk.");
                }
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
                if (typeCF == 'D') {
                    var kodeCflow = $(this).find("td").eq(0).html();
                    $('#id_kodeCflow').val(kodeCflow);
                    var kodeAlt = $(this).find("td").eq(1).html();
                    $('#id_kodeAltCflow').text(kodeAlt);
                    var namaCflow = $(this).find("td").eq(2).html();
                    $('#id_namaCflow').text(namaCflow);

                    $("#btnCloseModalCflow").trigger("click");
                } else {
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
                initTableBk();
                initTableRm();
                initTableAJB();
                initTablePerk();
                initTableCf();
            }
        };
    }();

    //Ready Doc
    btnStart();
    readyToStart();
    tglTransStart();
    btnCpaStart();
    $('.request_in').hide();
    $("#id_kodeJurnal").change(function () {
        var kodeJurnal = $(this).val();
        $('.request_in').slideUp();
        if (kodeJurnal == 'BK') {
            $('#div_idBooking').slideDown();
        } else if (kodeJurnal == 'RM') {
            $('#div_idReimpay').slideDown();
        } else if (kodeJurnal == 'AJB') {
            $('#div_idAJB').slideDown();
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
        startCheckBox();
        resetForm();
        readyToStart();
        tglTransStart();
        btnCpaStart();
        $('#id_body_data').empty();
        $("#id_kodeJurnal").select2("val", "");
        $('.request_in').slideUp();
    });

    function btnCpaStart() {
        $('#id_btnAddCpa').attr("disabled", false);
        $('#id_btnUpdateCpa').attr("disabled", true);
        $('#id_btnRemoveCpa').attr("disabled", true);
        $('#id_btnSign').attr("disabled", true);
    }
    $('#id_btnAddCpa').click(function () {
        var i = $('#idTxtTempLoop').val();
        if ($('#id_kodePerk').val() == '' && $('#id_kodeCflow').text() == '') {
            alert("Akun GL tidak boleh kosong.");
        } else {
            var i = parseInt($('#idTxtTempLoop').val());

            i = i + 1;
            var kodePerk = $('#id_kodePerk').val();
            var kodeCflow = $('#id_kodeCflow').val();
            var ket = $('#id_keteranganCPA').val().trim();
            var db = $('#id_jumlahDb').val();
            var kr = $('#id_jumlahKr').val();
            db = parseFloat(CleanNumber(db));
            kr = parseFloat(CleanNumber(kr));

            tr = '<tr class="listdata" id="tr' + i + '">';
            tr += '<td><input type="text" class="form-control input-sm" id="id_tempKodePerk' + i + '" name="tempKodePerk' + i + '" readonly="true" value="' + kodePerk + '"></td>';
            tr += '<td><input type="text" class="form-control input-sm" id="id_tempKet' + i + '" name="tempKet' + i + '" readonly="true" value="' + ket + '"></td>';
            tr += '<td><input type="text" class="form-control input-sm" id="id_tempKodeCflow' + i + '" name="tempKodeCflow' + i + '" readonly="true" value="' + kodeCflow + '" ></td>';
            tr += '<td><input type="text" class="form-control nomor input-sm" id="id_tempDb' + i + '" name="tempDb' + i + '" readonly="true" value="' + number_format(db, 2) + '"></td>';
            tr += '<td><input type="text" class="form-control nomor input-sm" id="id_tempKr' + i + '" name="tempKr' + i + '" readonly="true" value="' + number_format(kr, 2) + '"></td>';
            tr += '</tr>';

            var totalDb = parseFloat(CleanNumber($('#id_totalDb').val()));
            var totalDb = totalDb + db;
            $('#id_totalDb').val(number_format(totalDb, 2));

            var totalKr = parseFloat(CleanNumber($('#id_totalKr').val()));
            var totalKr = totalKr + kr;
            $('#id_totalKr').val(number_format(totalKr, 2));

            $('#id_body_data').append(tr);
            $('#idTxtTempLoop').val(i);
            kosongCPA();
        }
    });

    $("#id_tabelPerkCflow").on('click', 'tbody tr', function () {
        var kodePerk = $(this).find("td input").eq(0).val();
        var ket = $(this).find("td input").eq(1).val();
        var kodeCflow = $(this).find("td input").eq(2).val();
        var db = $(this).find("td input").eq(3).val();
        var kr = $(this).find("td input").eq(4).val();
        db = parseFloat(CleanNumber(db));
        kr = parseFloat(CleanNumber(kr));

        $('#id_kodePerk').val(kodePerk);
        $('#id_kodeCflow').val(kodeCflow);
        $('#id_keteranganCPA').val(ket);
        $('#id_jumlahDb').val(number_format(db, 2));
        $('#id_jumlahKr').val(number_format(kr, 2));

        var idTr = $(this).attr('id');
        var noRow = idTr.replace('tr', '');
        $('#idTempUbahCPA').val(noRow);

        $('#idTempJumlahDb').val(number_format(db, 2));
        $('#idTempJumlahKr').val(number_format(kr, 2));

        $('#id_btnAddCpa').attr("disabled", true);
        $('#id_btnUpdateCpa').attr("disabled", false);
        $('#id_btnRemoveCpa').attr("disabled", false);

    });
    function kosongCPA() {
        $('.kosongCPA').val('');
        $('.tkosongCPA').text('');
        $('#id_jumlahDb').val('0.00');
        $('#id_jumlahKr').val('0.00');
    }
    $('#id_btnUpdateCpa').click(function () {
        var noRow = $('#idTempUbahCPA').val();
        var kodePerk = $('#id_kodePerk').val();
        var kodeCflow = $('#id_kodeCflow').val();
        var ket = $('#id_keteranganCPA').val();
        var db = $('#id_jumlahDb').val();
        var kr = $('#id_jumlahKr').val();
        db = parseFloat(CleanNumber(db));
        kr = parseFloat(CleanNumber(kr));

        var totalDb = parseFloat(CleanNumber($('#id_totalDb').val()));
        var totalKr = parseFloat(CleanNumber($('#id_totalKr').val()));

        var jumlahDbOld = parseFloat(CleanNumber($('#idTempJumlahDb').val()));
        totalDb = totalDb - jumlahDbOld + db;

        var jumlahKrOld = parseFloat(CleanNumber($('#idTempJumlahKr').val()));
        totalKr = totalKr - jumlahKrOld + kr;

        $('#id_tempKodePerk' + noRow).val(kodePerk);
        $('#id_tempKodeCflow' + noRow).val(kodeCflow);
        $('#id_tempKet' + noRow).val(ket);
        $('#id_tempDb' + noRow).val(number_format(db, 2));
        $('#id_tempKr' + noRow).val(number_format(kr, 2));

        $('#id_totalDb').val(number_format(totalDb, 2));
        $('#id_totalKr').val(number_format(totalKr, 2));
        kosongCPA();
        btnCpaStart();
    });
    $('#id_btnRemoveCpa').click(function () {
        var noRow = $('#idTempUbahCPA').val();
        $('#tr' + noRow).remove();
        var i = $('#idTxtTempLoop').val();
        i = parseInt(i);
        i = i - 1;
        $('#idTxtTempLoop').val(i);

        var totalDb = parseFloat(CleanNumber($('#id_totalDb').val()));
        var jumlahDbOld = parseFloat(CleanNumber($('#idTempJumlahDb').val()));
        totalDb = totalDb - jumlahDbOld;
        $('#id_totalDb').val(number_format(totalDb, 2));

        var totalKr = parseFloat(CleanNumber($('#id_totalKr').val()));
        var jumlahKrOld = parseFloat(CleanNumber($('#idTempJumlahKr').val()));
        totalKr = totalKr - jumlahKrOld;
        $('#id_totalKr').val(number_format(totalKr, 2));

        kosongCPA();
        btnCpaStart();
    });
    $('#id_btnBatalCpa').click(function () {
        kosongCPA();
        btnCpaStart();
    });
    function getDescRumah(idRumah) {
        ajaxModal();
        if (idRumah != '') {
            $.post("<?php echo site_url('/master_rumah/getDescRumah'); ?>",
                {
                    'idRumah': idRumah
                }, function (data) {
                    if (data.baris == 1) {
                        $('#id_proyek').val(data.id_proyek);
                        $('#id_namaProyek').val(data.nama_proyek);
                        $('#id_namaRumah').val(data.nama_rumah);
                        $('#id_typeRumah').val(data.type);
                        $('#id_blokRumah').val(data.blok);
                        $('#id_luasRumah').val(data.luas);
                        $('#id_hargaRumah').val(data.harga);
                    } else {
                        alert('Data tidak ditemukan!');
                        $('#id_btnBatal').trigger('click');
                    }
                }, "json");
        }//if kd<>''
    }
    function getDescCust(idCust) {
        ajaxModal();
        if (idCust != '') {
            $.post("<?php echo site_url('/master_customer/getDescCust'); ?>",
                {
                    'idCust': idCust
                }, function (data) {
                    if (data.baris == 1) {
                        $('#id_customerId').val(data.id_cust);
                        $('#id_noId').val(data.no_id);
                        $('#id_namaCustomer').val(data.nama_cust);
                        $('#id_alamat').val(data.alamat);
                        $('#id_email').val(data.email);
                        $('#id_noHp').val(data.no_hp);
                        $('#id_noTelp').val(data.no_telp);
                        $('#id_noNpwp').val(data.no_npwp);
                        $('#id_namaNpwp').val(data.nama_npwp);
                        $('#id_alamatNpwp').val(data.alamat_npwp);
                        $('#id_noRek').val(data.no_akun_bank);
                        $('#id_bankRek').val(data.bank_akun_bank);
                        $('#id_GL').val(data.kode_perk);
                        $('#id_namaGL').val(data.nama_perk);
                        $('#id_noVA').val(data.no_va);
                        $('#id_namaVA').val(data.nama_va);
                        $('#id_bankVA').val(data.bank_va);


                        var Db = $('#id_nominal').val();
                        var Kr = 0;
                        addRowDb(data.kode_perk, data.nama_perk, Db, Kr);
                        /*
                         $('#').val(data.); */
                    } else {
                        alert('Data tidak ditemukan!');
                        $('#id_btnBatal').trigger('click');
                    }
                }, "json");
        }//if kd<>''
    }
    function addRowDb(kodePerk, namaPerk, Db, Kr) {
        var i = $('#idTxtTempLoop').val();
        var x = parseInt(i) + 1;
        var kodeCflow = '';

        tr = '<tr class="listdata" id="tr' + x + '">';
        tr += '<td><input type="text" class="form-control input-sm" id="id_tempKodePerk' + x + '" name="tempKodePerk' + x + '" readonly="true" value="' + kodePerk + '"></td>';
        tr += '<td><input type="text" class="form-control input-sm" id="id_tempKet' + x + '" name="tempKet' + x + '" readonly="true" value="' + namaPerk + '"></td>';
        //tr += '<td><textarea class="form-control input-sm" id="id_tempKet' + x + '" name="tempKet' + x + '" readonly="true" >'+ namaPerkUM +'\n'+ data.keterangan +'</textarea></td>';
        tr += '<td><input type="text" class="form-control input-sm" id="id_tempKodeCflow' + x + '" name="tempKodeCflow' + x + '" readonly="true" value="' + kodeCflow + '" ></td>';
        tr += '<td><input type="text" class="form-control nomor input-sm" id="id_tempDb' + x + '" name="tempDb' + x + '" readonly="true" value="' + number_format(Db, 2) + '"></td>';
        tr += '<td><input type="text" class="form-control nomor input-sm" id="id_tempKr' + x + '" name="tempKr' + x + '" readonly="true" value="' + number_format(Kr, 2) + '"></td>';
        tr += '</tr>';

        jumlahDb = parseFloat(CleanNumber(Db));
        var totalDb = parseFloat(CleanNumber($('#id_totalDb').val()));
        var totalDb = totalDb + jumlahDb;

        $('#id_totalDb').val(number_format(totalDb, 2));
        i++;
        $('#id_body_data').append(tr);
        $('#idTxtTempLoop').val(i);
    }

    function getDescCpa(idMaster) {
        ajaxModal();
        if (idMaster != '') {
            $.post("<?php echo site_url('/master_reqpay/getDescCpa'); ?>",
                {
                    'idReqpay': idMaster
                }, function (data) {
                    if (data.data_cpa.length > 0) {
                        $('#idTxtTempLoop').val(data.data_cpa.length);
                        for (i = 0; i < data.data_cpa.length; i++) {
                            var x = i + 1;
                            //var idCpa           = data.data_cpa[i].id_cpa;
                            var kodePerk = data.data_cpa[i].kode_perk;
                            var namaPerk = data.data_cpa[i].nama_perk;//+ namaPerkUM +'\n'+ data.keterangan +
                            var kodeCflow = data.data_cpa[i].kode_cflow;
                            var ket = data.data_cpa[i].keterangan;
                            var db = data.data_cpa[i].jumlah;
                            var kr = 0;
                            tr = '<tr class="listdata" id="tr' + x + '">';
                            tr += '<td><input type="text" class="form-control input-sm" id="id_tempKodePerk' + x + '" name="tempKodePerk' + x + '" readonly="true" value="' + kodePerk + '"></td>';
                            tr += '<td><input type="text" class="form-control input-sm" id="id_tempKet' + x + '" name="tempKet' + x + '" readonly="true" value="' + ket + '"></td>';
                            tr += '<td><input type="text" class="form-control input-sm" id="id_tempKodeCflow' + x + '" name="tempKodeCflow' + x + '" readonly="true" value="' + kodeCflow + '" ></td>';
                            tr += '<td><input type="text" class="form-control nomor input-sm" id="id_tempDb' + x + '" name="tempDb' + x + '" readonly="true" value="' + number_format(db, 2) + '"></td>';
                            tr += '<td><input type="text" class="form-control nomor input-sm" id="id_tempKr' + x + '" name="tempKr' + x + '" readonly="true" value="' + number_format(kr, 2) + '"></td>';
                            tr += '</tr>';

                            jumlahDb = parseFloat(CleanNumber(db));
                            var totalDb = parseFloat(CleanNumber($('#id_totalDb').val()));
                            var totalDb = totalDb + jumlahDb;

                            $('#id_totalDb').val(number_format(totalDb, 2));
                            $('#id_body_data').append(tr);

                            var kodeJurnal = $('#id_kodeJurnal').val();
                            if (kodeJurnal == 'BK') {
                                var kperk = $('#id_kodePerk').val();
                                var nperk = $('#id_namaPerk').val();
                                var debet = 0;
                                var kredit = $('#id_uang').val();
                                addRowKrBooking(kperk, nperk, debet, kredit);
                            } else if (kodeJurnal == 'RM') {
                                var kperk = $('#id_kodePerk').val();
                                var nperk = $('#id_namaPerk').val();
                                var debet = 0;
                                var kredit = $('#id_uang').val();
                                addRowKrBooking(kperk, nperk, debet, kredit);
                            } else if (kodeJurnal == 'ST') {

                            }

                        }
                    } else {
                        //alert('Data tidak ditemukan!');
                        //$('#id_btnBatal').trigger('click');
                    }
                }, "json");
        }//if kd<>''
    }
    function getJurnalPend(idJurnalPend, nominal) {
        ajaxModal();
        if (idJurnalPend != '') {
            $.post("<?php echo site_url('/akuntansi_ar/getJurnalPend'); ?>",
                {
                    'idJurnalPend': idJurnalPend
                }, function (data) {
                    if (data.data_cpa.length > 0) {
                        var i = $('#idTxtTempLoop').val();
                        var x = parseInt(i) + 1;
                        //var idCpa           = data.data_cpa[i].id_cpa;
                        var kodePerk = data.data_cpa[0].kode_perk;
                        var kodeCflow = '';
                        var ket = data.data_cpa[0].nama_perk;
                        var db = 0;
                        var kr = nominal;
                        tr = '<tr class="listdata" id="tr' + x + '">';
                        tr += '<td><input type="text" class="form-control input-sm" id="id_tempKodePerk' + x + '" name="tempKodePerk' + x + '" readonly="true" value="' + kodePerk + '"></td>';
                        tr += '<td><input type="text" class="form-control input-sm" id="id_tempKet' + x + '" name="tempKet' + x + '" readonly="true" value="' + ket + '"></td>';
                        tr += '<td><input type="text" class="form-control input-sm" id="id_tempKodeCflow' + x + '" name="tempKodeCflow' + x + '" readonly="true" value="' + kodeCflow + '" ></td>';
                        tr += '<td><input type="text" class="form-control nomor input-sm" id="id_tempDb' + x + '" name="tempDb' + x + '" readonly="true" value="' + number_format(db, 2) + '"></td>';
                        tr += '<td><input type="text" class="form-control nomor input-sm" id="id_tempKr' + x + '" name="tempKr' + x + '" readonly="true" value="' + number_format(kr, 2) + '"></td>';
                        tr += '</tr>';

                        jumlahKr = parseFloat(CleanNumber(kr));
                        var totalKr = parseFloat(CleanNumber($('#id_totalKr').val()));
                        var totalKr = totalKr + jumlahKr;

                        $('#id_totalKr').val(number_format(totalKr, 2));
                        i++;
                        $('#id_body_data').append(tr);
                        $('#idTxtTempLoop').val(i);

                    } else {
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
            url: "<?php echo base_url(); ?>akuntansi_ar/simpan",
            data: dataString,
            success: function (data) {
                if (data.kodeJurnal == 'AJB') {
                    $('#id_ReloadAJB').trigger('click');
                } else if (data.kodeJurnal == 'BK') {
                    $('#id_ReloadBooking').trigger('click');
                } else if (data.kodeJurnal == 'RM') {
                    $('#id_ReloadReimpay').trigger('click');
                }
                $('#id_idJurnal').val(data.idAR);
                UIToastr.init(data.tipePesan, data.pesan);
                $('#id_btnSimpan').attr('disabled', true);
            }
        });
        event.preventDefault();
    }
    $('#id_formAkuntansi').submit(function (event) {
        dataString = $("#id_formAkuntansi").serialize();
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
        var idJurnal = $('#id_idJurnal').val();
        var kdJurnal = $('#id_kodeJurnal').val();
        if (idJurnal == '') {
            alert('Silahkan pilih ID Jurnal');
        } else {
            window.open("<?php echo base_url('akuntansi/cetak/'); ?>/" + idJurnal + '/' + kdJurnal, '_blank');
        }
    }

</script>


<!-- END JAVASCRIPTS -->