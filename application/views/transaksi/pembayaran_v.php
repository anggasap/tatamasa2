<!-- BEGIN PAGE BREADCRUMB -->
<style type="text/css">
    table#idTabelRumah td:nth-child(4) {
        text-align: right;
    }

    table#idTabelRumah td:nth-child(5) {
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
                <ul class="nav nav-pills">
                    <li class="active">
                        <a href="#tab_2_1" data-toggle="tab" id="navitab_2_1">
                            Info Rumah & Customer </a>
                    </li>
                    <li>
                        <a href="#tab_2_2" data-toggle="tab" id="navitab_2_1">
                            Pembayaran </a>
                    </li>
                    <li>
                        <a href="#tab_2_3" data-toggle="tab" id="navitab_2_3">
                            Jurnal </a>
                    </li>
                </ul>
                <form role="form" method="post" class="cls_from_pembayaran"  id="id_formPembayaran">
                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="tab_2_1">
                            <div class="row">
                                <div class="form-body">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Id rumah </label>
                                                    <div class="input-group">
                                                        <input id="id_rumahId" required="required"
                                                               class="form-control input-sm"
                                                               type="text" name="rumahId" readonly/>
														<input id="id_kodetr" class="form-control hidden input-sm"
                                                               type="text" name="kodetr" >	   
                                                <span class="input-group-btn">
                                                    <a href="#" class="btn btn-success btn-sm"
                                                       data-target="#idDivTabelRumah"
                                                       id="id_btnModalRmh" data-toggle="modal">
                                                        <i class="fa fa-search fa-fw"/></i>
                                                    </a>
                                                </span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <!--<label>Status jual</label>
                                                    <select id="id_statusJual" class="form-control  input-sm"
                                                            name="statusJual" disabled>
                                                        <option value="0">Available</option>
                                                        <option value="1">Booked</option>
                                                        <option value="2">Terjual</option>
                                                    </select>-->
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
													<input id="id_transJual"
                                                           class="form-control hidden input-sm"
                                                           type="text" name="transJual"/>	   
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Nama proyek</label>
                                                    <input id="id_proyek" required="required" class="form-control  input-sm hidden"
                                                           type="text" name="proyek" placeholder="" readonly/>
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
                                                           class="form-control input-sm kanan"
                                                           type="text" name="luasRumah" placeholder="" readonly/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <label>Harga</label>
                                                    <input id="id_hargaRumah" required="required"
                                                           class="form-control input-sm kanan"
                                                           type="text" name="hargaRumah" placeholder="" readonly/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
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
                                    <!--end <div class="col-md-6"> 1 -->
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab_2_2">
                            <div class="row">
                                <div class="form-body">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <label>Id Penj</label>
                                                    <input id="id_idPenj"
                                                           class="form-control input-sm"
                                                           type="text" name="idPenj" readonly/>
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Tgl penj</label>
                                                    <input id="id_tglPenj" required="required"
                                                           class="form-control input-sm"
                                                           type="text" name="tglPenj" readonly/>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Total Harga Jual </label>
                                                    <input id="id_hargaJual" required="required"
                                                           class="form-control nomor input-sm"
                                                           type="text" name="hargaJual" placeholder="" readonly/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end <div class="col-md-6"> 1 -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <label>Total dibayar</label>
                                                    <input id="id_sdhDibayar"
                                                           class="form-control input-sm nomor"
                                                           type="text" name="sdhDibayar" readonly/>
                                                </div>
                                                <div class="col-md-5">
                                                    <label>Sisa/Baki debet</label>
                                                    <input id="id_bakiDebet" required="required"
                                                           class="form-control input-sm nomor"
                                                           type="text" name="bakiDebet" readonly/>
                                                </div>
                                                <div class="col-md-2">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="form-body">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <div class="row">
                                                <!--<div class="col-md-3">
                                                    <div class="form-group" id="id_divDPPersen">
                                                        <label>Tgl trans</label>
                                                        <input id="id_tgltrans" required="required"
                                                               class="form-control input-sm date-picker"
                                                               type="text" name="tglTrans"
                                                               data-date-format="dd-mm-yyyy"/>
                                                    </div>
                                                </div>-->
                                                <div class="col-md-9">
                                                    <label>No bukti </label>
                                                    <input id="id_noBukti" class="form-control  input-sm"
                                                           type="text" name="noBukti" required/>
                                                </div>
                                                <!--<div class="col-md-3">
                                                    <label>Kode trans</label>
                                                    <select id="id_kodeTrans" class="form-control  input-sm"
                                                            name="kodeTrans" required>
                                                        <option value="1">Tunai</option>
                                                    </select>
                                                </div>-->
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Cicilan ke- </label>
                                                        <input id="id_cicilanKe" class="form-control nomor1 input-sm"
                                                               type="text" name="cicilanKe" placeholder=""/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Jumlah Bayar</label>
                                                        <input id="id_jmlBayar" class="form-control nomor input-sm"
                                                               type="text" name="jmlBayar" placeholder=""/>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <label>Keterangan </label>
                                                    <textarea rows="2" cols="" name="keterangan" id="id_keterangan"
                                                      class="form-control input-sm" placeholder=""></textarea>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!--end <div class="col-md-6"> 1 -->
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Tgl Pembayaran</label>
                                        <input id="id_tgltrans" required="required"
                                               class="form-control input-sm "
                                               type="text" name="tglTrans" placeholder="dd-mm-yyyy" readonly/>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Cara Pembayaran</label>
                                        <?php
                                        $data = array();
                                        $data[''] = '';
                                        foreach ($carabayar as $row):
                                            $data[$row['id_carabayar']] = $row['nama_carabayar'];
                                        endforeach;
                                        echo form_dropdown('carabayar', $data, '',
                                            'id="id_carabayar" class="form-control input-sm select2me " required');
                                        ?>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group divkodebayar" id="id_divkodebayartunai">
                                        <label>Kode Pembayaran</label>
                                        <?php
                                        $data = array();
                                        $data[''] = '';
                                        foreach ($kodebayartunai as $row):
                                            $data[$row['kode_bayar']] = $row['nama_kdbayar'];
                                        endforeach;
                                        echo form_dropdown('kodebayartunai', $data, '',
                                            'id="id_kodebayartunai" class="form-control input-sm select2me " ');
                                        ?>
                                    </div>
                                    <div class="form-group divkodebayar" id="id_divkodebayarnontunai">
                                        <label>Kode Pembayaran</label>
                                        <?php
                                        $data = array();
                                        $data[''] = '';
                                        foreach ($kodebayarnontunai as $row):
                                            $data[$row['kode_bayar']] = $row['nama_kdbayar'];
                                        endforeach;
                                        echo form_dropdown('kodebayarnontunai', $data, '',
                                            'id="id_kodebayarnontunai" class="form-control input-sm select2me " ');
                                        ?>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>No. Cek/Giro</label>
                                        <input id="id_noCekGiro" required="required"
                                               class="form-control input-sm "
                                               type="text" name="noCekGiro" placeholder=""/>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Tgl. Cek/Giro</label>
                                        <input id="id_tglCekGiro" required="required" data-date-format="dd-mm-yyyy"
                                               class="form-control date-picker input-sm "
                                               type="text" name="tglCekGiro" placeholder="dd-mm-yyyy"/>
                                    </div>
                                </div>
                                <div class="col-md-2 hidden">
                                    <div class="form-group ">
                                        <label>Kode Perk</label>
                                        <input id="id_kodePerkBayar" class="form-control input-sm"
                                               type="text" name="kodePerkBayar" readonly/>

                                    </div>
                                </div>
                                <div class="col-md-4 hidden">
                                    <div class="form-group ">
                                        <label>Nama Perk</label>
                                        <input id="id_namaPerkBayar" class="form-control input-sm"
                                               type="text" name="namaPerkBayar" readonly/>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="tab_2_3">
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
                                        <button name="btnSimpan" class="btn blue" id="id_btnSimpan">Simpan</button>
                                        <button id="id_btnBatal" type="button" class="btn default">Batal</button>
										<button id="id_btnCetak" type="button" class="btn green">Kwitansi</button>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    <!-- disini tombol actionnya diawali class row-->
                </form>
            </div>
        </div>
        <!-- end <div class="portlet green-meadow box"> -->
    </div>
    <!-- end <div class="col-md-6"> -->
</div>
<div class="row">
    <div class="col-md-6">

    </div>
</div>

<!-- END PAGE CONTENT-->

<!--  MODAL Data Karyawan -->
<div class="modal fade draggable-modal" id="idDivTabelRumah" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Data Rumah Terjual</h4>
            </div>
            <div class="modal-body">
                <div class="scroller" style="height:400px; ">
                    <div class="row">
                        <div class="col-md-12">
                            <button id="id_ReloadRumah" style="display: none;"></button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-body">
                                <table class="table table-striped table-bordered table-hover text_kanan"
                                       id="idTabelRumah">
                                    <thead>
                                    <tr>
                                        <th>
                                            Id Penjualan
                                        </th>
                                        <th>
                                            Id Rumah
                                        </th>
                                        <th>
                                            Nama Proyek
                                        </th>
                                        <th>
                                            Nama Rumah
                                        </th>
                                        <th>
                                            Luas
                                        </th>
                                        <th>
                                            Harga
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
                <button type="button" class="btn default" data-dismiss="modal" id="btnCloseModalDataRumah">Close
                </button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--  END  MODAL Data Karyawan -->
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

            var table = $('#idTabelRumah');

            // begin first table
            table.dataTable({
                "ajax": "<?php  echo base_url("/pembayaran/getRumahAll"); ?>",
                "columns": [
                    {"data": "master_id"},
                    {"data": "id_rumah"},
                    {"data": "nama_proyek"},
                    {"data": "nama_rumah"},
                    {"data": "luas"},
                    {"data": "harga"}
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
            $('#id_ReloadRumah').click(function () {
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
                $('#id_btnBatal').trigger('click');
                var idPenj          = $(this).find("td").eq(0).html();
                var idRumah         = $(this).find("td").eq(1).html();
                var namaProyek      = $(this).find("td").eq(2).html();
                var tglTrans        = $('#id_tgltrans').val();
                $('#id_rumahId').val(idRumah);
                $('#id_namaProyek').val(namaProyek);
                getDescRumahSelled(idRumah);

                //$('#').val();
                $('#btnCloseModalDataRumah').trigger('click');
                $('#id_rumahId').focus();
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
                if(typePerk == 'D'){
                    var kodePerk = $(this).find("td").eq(0).html();
                    $('#id_kodePerk').val(kodePerk);
                    var kodeAlt = $(this).find("td").eq(1).html();
                    $('#id_kodeAlt').text(kodeAlt);
                    var namaPerk = $(this).find("td").eq(2).html();
                    $('#id_namaPerk').text(namaPerk);

                    $("#btnCloseModalPerk").trigger("click");
                }else{
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
                initTable1();
                initTablePerk();
                initTableCf();
            }
        };
    }();
    btnStart();
    readyToStart();
    tglTransStart();
    //$("#id_namaProyek").focus();

    $('#id_btnBatal').click(function () {
        btnStart();
        resetForm();
        readyToStart();
        tglTransStart();
        $('#id_body_data').empty();
        $("#id_kodebayartunai").select2("val", "");
        $("#id_kodebayarnontunai").select2("val", "");
        $("#id_carabayar").select2("val", "");
        kosongCPA();
    });
	
    function getDescRumahSelled(idRumah) {
        ajaxModal();
        if (idRumah != '') {
            $.post("<?php echo site_url('/pembayaran/getDescRumahSelled'); ?>",
                {
                    'idRumah': idRumah
                }, function (data) {
                    if (data.baris == 1) {
                        $('#id_proyek').val(data.id_proyek);
                        $('#id_namaRumah').val(data.nama_rumah);
                        $('#id_typeRumah').val(data.type);
                        $('#id_blokRumah').val(data.blok);
                        $('#id_luasRumah').val(data.luas);
                        $('#id_hargaRumah').val(data.harga);
                        $('#id_idPenj').val(data.id_penj);
                        $('#id_hargaJual').val(data.harga);
                        $('#id_tglPenj').val(data.tgl_trans);

                        $('#id_customerId').val(data.id_cust);
                        $('#id_namaCustomer').val(data.nama_cust);
                        $('#id_alamat').val(data.alamat);
                        $('#id_noId').val(data.no_id);
                        $('#id_noHp').val(data.no_hp);
                        $('#id_noTelp').val(data.no_telp);
                        $('#id_GL').val(data.kode_perk);
                        $('#id_namaGL').val(data.nama_perk);
                        $('#id_btnModalCust').attr('disabled', true);

                        getAngsInfo1(data.id_penj);
                        var tglTrans        = $('#id_tgltrans').val();
                        getAngsInfo2(data.id_penj,tglTrans);
                        //hitungHargaJual();
                    } else {
                        alert('Data tidak ditemukan!');
                        $('#id_btnBatal').trigger('click');
                    }
                }, "json");
        }//if kd<>''
    }
    function getAngsInfo1(idPenj) {
        ajaxModal();
        if (idPenj != '') {
            $.post("<?php echo site_url('/pembayaran/getAngsInfo1'); ?>",
                {
                    'idPenj': idPenj
                }, function (data) {
                    if (data.baris == 1) {
                        $('#id_cicilanKe').val(data.angsKe);
                    } else {
                        alert('Data tidak ditemukan!');
                        $('#id_btnBatal').trigger('click');
                    }
                }, "json");
        }//if kd<>''
    }
    function getAngsInfo2(idPenj,tglTrans) {
        ajaxModal();
        if (idPenj != '') {
            $.post("<?php echo site_url('/pembayaran/getAngsInfo2'); ?>",
                {
                    'idPenj': idPenj,
                    'tglTrans' :tglTrans
                }, function (data) {
                    if (data.baris == 1) {
                        $('#id_sdhDibayar').val(number_format(data.sdhdibayar,2));
                        $('#id_bakiDebet').val(number_format(data.sisaAngs,2));
                        $('#id_jmlBayar').val(number_format(data.tagihan,2));

                        var kodePerk = $('#id_GL').val();
                        var namaPerk = $('#id_namaGL').val();
                        var Kr = $('#id_jmlBayar').val();
                        var Db = 0;
                        addRowKr(kodePerk, namaPerk, Db, Kr);

                    } else {
                        alert('Data tidak ditemukan!');
                        $('#id_btnBatal').trigger('click');
                    }
                }, "json");
        }//if kd<>''
    }
    $('.divkodebayar').hide();
    $("#id_carabayar").change(function () {
        var caraBayar = $(this).val();
        $('.divkodebayar').slideUp();
        if (caraBayar == '5') {
            $('#id_divkodebayartunai').slideDown();
            $("#id_kodebayarnontunai").select2("val", "");
        } else {
            $('#id_divkodebayarnontunai').slideDown();
            $("#id_kodebayartunai").select2("val", "");
        }
    });
    $('#id_kodebayartunai').change(function () {
        var kdBayar = $(this).val();
        if (kdBayar == '') {
            $('#id_kodebayar').val('');
            $('#id_kodePerkBayar').val('');
            $('#id_namaPerkBayar').val('');
        } else {
            getDescKodeBayar(kdBayar);
        }
    });
    $('#id_kodebayarnontunai').change(function () {
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
                        //if(i != '0'){
                        var x =  parseInt(i) + 1;
                        var noRow = $('#idTxtTempKodeBayar').val();
                        $('#tr'+noRow).remove();
                        $('#idTxtTempKodeBayar').val(x);
                        //}
                        var booking = $('#id_jmlBayar').val();
                        booking     = parseFloat(CleanNumber(booking));
                        var kr = 0;
                        var db = booking;
                        addRowDbKdBayar(data.kodePerk,data.namaPerk,db,kr);
                        $('#id_totalDb').val(number_format(db,2));
                    } else {
                        alert('Data tidak ditemukan!');
                        $('#id_btnBatal').trigger('click');
                    }
                }, "json");
        }//if kd<>''
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
    function addRowKr(kodePerk, namaPerk, Db, Kr) {
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

        jumlahKr        = parseFloat(CleanNumber(Kr));
        var totalKr     = parseFloat(CleanNumber($('#id_totalKr').val()));
        var totalKr     = totalKr + jumlahKr;

        $('#id_totalKr').val(number_format(totalKr,2));
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
    $('#id_btnRemoveCpa').click(function(){
        var noRow = $('#idTempUbahCPA').val();
        $('#tr'+noRow).remove();
        var i   = $('#idTxtTempLoop').val();
        i       = parseInt(i);
        i       = i-1;
        $('#idTxtTempLoop').val(i);

        var totalDb         = parseFloat(CleanNumber($('#id_totalDb').val()));
        var jumlahDbOld     = parseFloat(CleanNumber($('#idTempJumlahDb').val()));
        totalDb             = totalDb - jumlahDbOld ;
        $('#id_totalDb').val(number_format(totalDb,2));

        var totalKr         = parseFloat(CleanNumber($('#id_totalKr').val()));
        var jumlahKrOld     = parseFloat(CleanNumber($('#idTempJumlahKr').val()));
        totalKr             = totalKr - jumlahKrOld ;
        $('#id_totalKr').val(number_format(totalKr,2));

        kosongCPA();
        btnCpaStart();
    });
    $('#id_btnBatalCpa').click(function () {
        kosongCPA();
        btnCpaStart();
    });
    function ajaxSubmit(){
        ajaxModal();
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "<?php echo base_url(); ?>pembayaran/simpan",
            data: dataString,

            success: function (data) {
                //$('#id_btnBatal').trigger('click');
                $('#id_ReloadRumah').trigger('click');
				$('#id_kodetr').val(data.kode);
                UIToastr.init(data.tipePesan, data.pesan);
            }

        });
        event.preventDefault();
    }
    $('#id_formPembayaran').submit(function (event) {
        dataString = $("#id_formPembayaran").serialize();
        //var aksiTab = $('#idTmpAksiTab').val();
        var r = confirm('Anda yakin menyimpan data ini?');
        if (r == true) {
            ajaxSubmit();
        } else {//if(r)
            return false;
        }
    });
	$('#id_btnCetak').click(function(){
        var idPenj = $('#id_idPenj').val();
		var kodetr = $('#id_kodetr').val();
		var idrumah = $('#id_rumahId').val();        
		if (idPenj == ''){
            alert('Tidak ada kode penjualan');
        }else{
            window.open("<?php echo base_url('pembayaran/cetak/'); ?>/" + idPenj +"/"+kodetr+"/"+idrumah, '_blank');
        }
    });

</script>


<!-- END JAVASCRIPTS -->