<?php
$btntitan = TitanFramework::getInstance( 'btn' );
$bidang_usaha = '';
// $countries =  explode("\r\n",$btntitan->getOption( 'negara' ));
// $gelars =  explode("\r\n",$btntitan->getOption( 'titleper' ));
// $jenis_identitas =  explode("\r\n",$btntitan->getOption( 'jenis_identitas' ));
// $pendidikan_terkhir =  explode("\r\n",$btntitan->getOption( 'pendidikan_terkhir' ));
// $jenis_pekerjaan =  explode("\r\n",$btntitan->getOption( 'jenis_pekerjaan' ));
// $pendapatan_perbulan =  explode("\r\n",$btntitan->getOption( 'pendapatan_perbulan' ));
// $sumber_pendapatan =  explode("\r\n",$btntitan->getOption( 'sumber_pendapatan' ));
?>

<section id="form-cif-lembaga">
    <div class="container">
        <div class="headline">
            <div class="icon-form">
                <i class="fa fa-file-text-o"></i>
            </div>
            <h2>FORMULIR DATA NASABAH LEMBAGA</h2>
        </div>
        <div class="row">
            <div class="form-child" id="cifLembaga">
              <form id="formRegCifLembaga" class="form-horizontal">
              <input type="hidden" name="jenis_cif" value="lembaga">
                <div class="data-diri">
                    <h3>Data Lembaga</h3>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Sudah Memiliki Rekening Di Bank BTN ? </strong><span>*</span></td>
                                <td>
                                  <div class="select-style">
                                    <select name="rekeningBTNlembaga" class="required" id="rekeningBTNlembaga">
                                      <option value="Sudah">Sudah</option>
                                      <option value="Belum" selected>Belum</option>
                                    </select>
                                  </div>
                                  <label class="norekkLembaga" style="margin-left:20px;">No. Rekening</label><input size="27" name="norekkLembaga" class="form_field norekkLembaga number_only" id="norekkLembaga" type="text" style="margin-left:10px;">
                                </td>
                            </tr>                            
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Nama Lembaga</strong><span>*</span></td>
                                <td width="60%" class="tdgenap">
                                  <input type="text" maxlength="255" name="nama_lembaga" id="nama_lembaga" size="68%" value="" class="formfield required">
                                </td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Bidang Usaha</strong></td>
                                <td width="60%" class="tdgenap">
                                  <div class="row">
                                    <div class="col-sm-12">
                                      <div class="select-style">
                                        <select name="bidang_usaha" id="bidang_usaha">
                                          <option value="">--Pilih--</option>
                                          <option value="Pertanian, Perburuan dan Pertanian"> Pertanian, Perburuan dan Pertanian</option>
                                          <option value="Pertambangan"> Pertambangan</option>
                                          <option value="Perindustrian"> Perindustrian</option>
                                          <option value="Listrik, Gas & Air"> Listrik, Gas & Air</option>
                                          <option value="Konstruksi"> Konstruksi</option>
                                          <option value="Perdagangan, Restoran dan Hotel"> Perdagangan, Restoran dan Hotel</option>
                                          <option value="Pengangkutan, Pergudangan & Komunikasi"> Pengangkutan, Pergudangan & Komunikasi</option>
                                          <option value="Jasa-jasa Dunia Usaha"> Jasa-jasa Dunia Usaha</option>
                                          <option value="Jasa-jasa Sosial Masyarakat"> Jasa-jasa Sosial Masyarakat</option>
                                          <option value="Jasa-Jasa Keuangan & Perbankan"> Jasa-Jasa Keuangan & Perbankan</option>
                                          <option value="lainnya"> Lain-Lain</option>                                        
                                        </select>
                                      </div>
                                      <input type="text" maxlength="255" name="bidang_usaha_lainnya" id="bidang_usaha_lainnya" value="" placeholder="Lain-Lain">
                                    </div>
                                  </div>
                                 </td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Alamat Lembaga</strong><span>*</span></td>
                                <td width="60%" class="tdgenap">
                                <div class="row">
                                  <div class="col-md-12">
                                    <input type="text" name="alamat_lembaga" maxlength="255" size="68%" value="" class="formfield required only_text_num">
                                  </div>
                                </div></br>
                                
                                <div class="row">
                                  <label  class="col-md-3">
                                    RT/RW
                                  </label>
                                  <div class="col-md-9">
                                    <input type="text" maxlength="3" name="rt_lembaga" size="5"  value="" class="formField number_only">/<input type="text" size="5" maxlength="3" name="rw_lembaga" value="" class="formField number_only">
                                  </div>
                                  
                                </div></br>
                                <div class="row">
                                  <label  class="col-md-3">
                                    Kelurahan
                                  </label>
                                  <div class="col-md-9">
                                    <input type="text" maxlength="255" name="kelurahan_lembaga" size="48%"  value="" class="formfield required only_text">
                                  </div>
                                </div></br>
                                <div class="row">
                                  <label  class="col-md-3">
                                    Kecamatan
                                  </label>
                                  <div class="col-md-9">
                                    <input type="text" maxlength="255" name="kecamatan_lembaga" size="48%"  value="" class="formfield required">
                                  </div>
                                </div></br>
                                <div class="row">
                                  <label  class="col-md-3">
                                    Kota/DaTi
                                  </label>
                                  <div class="col-md-9">
                                    <input type="text" maxlength="255" name="kota_lembaga" size="48%"  value="" class="formfield required">
                                  </div>
                                </div></br>
                                <div class="row">
                                  <label  class="col-md-3">
                                    Kodepos
                                  </label>
                                  <div class="col-md-9">
                                    <input type="text" maxlength="255" name="kodepos_lembaga" size="48%" value="" class="formfield number_only required">
                                  </div>
                                </div></br>
                                <div class="row">
                                  <label  class="col-md-3">
                                    Propinsi
                                  </label>
                                  <div class="col-md-9">
                                    <input type="text" maxlength="255" name="propinsi" size="48%"  value="" class="formfield required">
                                  </div>
                                </div>
                                </td>
                            </tr>

                            <tr>
                                <td width="40%" class="tdganjil"><strong>No Telepon<span>*</span></br><small>(termasuk kode area)</small></strong></td>
                                <td width="60%" class="tdgenap">
                                  <input type="text" maxlength="255" size="68%" name="no_tlp_lembaga" value="" class="formfield number_only required phone" >
                                </td>
                            </tr>

                            <tr>
                                <td width="40%" class="tdganjil"><strong>No Facsimile</br><small>(termasuk kode area)</small></strong></td>
                                <td width="60%" class="tdgenap"><input type="text" maxlength="255" size="68%" name="no_fax_lembaga" value="" class="formfield number_only phone"></td>
                            </tr>

                            <tr>
                                <td width="40%" class="tdganjil"><strong>E-Mail</strong></td>
                                <td width="60%" class="tdgenap">
                                  <input type="text" maxlength="255" name="email_lembaga" size="68%" value="" class="formfield email">
                                </td>
                            </tr>

                            <tr>
                                <td width="40%" class="tdganjil"><strong>Website</strong></td>
                                <td width="60%" class="tdgenap"><input type="text" maxlength="255" name="website_lembaga" size="68%" value="" class="formfield"></td>
                            </tr>


                        </tbody>
                    </table>

                    <h3>Legalitas Lembaga</h3>
                    <table class="table">
                        <tbody>                            
                            <tr>
                                <td width="40%" class="tdganjil"><strong>No NPWP</strong><span>*</span></td>
                                <td width="60%" class="tdgenap">
                                  <input type="text" name="no_npwp" maxlength="255" size="68%" value="" class="formfield required npwp">
                                </td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Anggaran Dasar No</strong><span>*</span></td>
                                <td width="60%" class="tdgenap"><input type="text" maxlength="255" name="no_anggaran_dasar" size="68%" value="" class="formfield required"></td>
                            </tr>                            
                            <tr>
                                <td width="100%" colspan="2">
                                  <table class="table">
                                    <tr>
                                      <td>Nomor<span>*</span></td>
                                      <td>Tanggal<span>*</span></td>
                                      <td>Diterbitkan Di<span>*</span></td>
                                      <td>Nama Notaris<span>*</span></td>
                                    </tr>
                                    <tr>
                                      <td>
                                        <label class="col-md-3">
                                          Akta Pendirian
                                        </label>
                                        <div class="col-md-9">
                                          <input type="text" name="no_akta_pendirian" maxlength="255"  value="" class="formField required">
                                        </div>
                                      </td>
                                      <td>
                                        <div id="datetimepicker2" class="input-append date">
                                          <input name="tanggal_akta_pendirian" size="10" data-format="dd/MM/yyyy" type="text" class="required input_tanggal number_only"></input>
                                          <span class="add-on"><i class="fa fa-calendar"></i></span>
                                        </div>
                                      </td>
                                      <td><input type="text" name="akta_diterbitkan" maxlength="255"  value="" class="formField required"></td>
                                      <td><input type="text" name="nama_notaris_akta_pendirian" id="nama_notaris_akta_pendirian" maxlength="255" value="" class="formField required"></td>
                                    </tr>
                                    <tr>
                                      <td>
                                        <label  class="col-md-3">
                                          Akta Perubahan
                                        </label>
                                        <div class="col-md-9">
                                          <input type="text" name="no_akta_perubahan" maxlength="255"  value="" class="formField required">
                                        </div>
                                      </td>
                                      <td>
                                        <div id="datetimepicker2" class="input-append date">
                                          <input name="tanggal_akta_perubahan" size="10" data-format="dd/MM/yyyy" type="text" class="required input_tanggal number_only"></input>
                                          <span class="add-on"><i class="fa fa-calendar"></i></span>
                                        </div>
                                      </td>
                                      <td><input type="text" name="akta_perubahan_diterbitkan" maxlength="255"  value="" class="formField required"></td>
                                      <td><input type="text" name="nama_notaris_akta_perubahan" id="nama_notaris_akta_perubahan" maxlength="255" value="" class="formField required"></td>
                                    </tr>
                                    <tr>
                                      <td>
                                        <label  class="col-md-3">
                                          SIUP
                                        </label>
                                        <div class="col-md-9">
                                          <input type="text" name="no_siup" maxlength="255"  value="" class="formField required">
                                        </div>
                                      </td>
                                      <td>
                                        <div id="datetimepicker2" class="input-append date">
                                          <input name="tanggal_siup" size="10" data-format="dd/MM/yyyy" type="text" class="required input_tanggal number_only"></input>
                                          <span class="add-on"><i class="fa fa-calendar"></i></span>
                                        </div>
                                      </td>
                                      <td><input type="text" name="siup_diterbitkan" maxlength="255"  value="" class="formField required"></td>
                                      <td>
                                        <div class="col-md-12">
                                          <div id="datetimepicker2" class="input-append date">
                                            <input name="siup_berlaku" size="10" data-format="dd/MM/yyyy" type="text" class="required input_tanggal number_only"></input>
                                            <span class="add-on"><i class="fa fa-calendar"></i></span>
                                          </div>
                                          <label><small>Berlaku Hingga</small></label>
                                        </div>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>
                                        <label  class="col-md-3">
                                          TDP
                                        </label>
                                        <div class="col-md-9">
                                          <input type="text" name="no_tdp" maxlength="255"  value="" class="formField required">
                                        </div>
                                      </td>
                                      <td>
                                        <div id="datetimepicker2" class="input-append date">
                                          <input name="tanggal_tdp" size="10" data-format="dd/MM/yyyy" type="text" class="required input_tanggal number_only"></input>
                                          <span class="add-on"><i class="fa fa-calendar"></i></span>
                                        </div>
                                      </td>
                                      <td><input type="text" name="tdp_diterbitkan" maxlength="255"  value="" class="formField required"></td>
                                      <td>
                                        <div class="col-md-12">
                                          <div id="datetimepicker2" class="input-append date">
                                            <input name="tdp_berlaku" size="10" data-format="dd/MM/yyyy" type="text" class="required input_tanggal number_only"></input>
                                            <span class="add-on"><i class="fa fa-calendar"></i></span>
                                          </div>
                                          <label><small>Berlaku Hingga</small></label>
                                        </div>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>
                                        <label  class="col-md-3">
                                          SITU
                                        </label>
                                        <div class="col-md-9">
                                          <input type="text" name="no_situ" maxlength="255"  value="" class="formField required">
                                        </div>
                                      </td>
                                      <td>
                                        <div id="datetimepicker2" class="input-append date">
                                          <input name="tanggal_situ" size="10" data-format="dd/MM/yyyy" type="text" class="required input_tanggal number_only">
                                          <span class="add-on"><i class="fa fa-calendar"></i></span>
                                        </div>
                                      </td>
                                      <td><input type="text" name="situ_diterbitkan" maxlength="255"  value="" class="formField required"></td>
                                      <td>
                                        <div class="col-md-12">
                                          <div id="datetimepicker2" class="input-append date">
                                            <input name="situ_berlaku" size="10" data-format="dd/MM/yyyy" type="text" class="required input_tanggal number_only"></input>
                                            <span class="add-on"><i class="fa fa-calendar"></i></span>
                                          </div>
                                          <label><small>Berlaku Hingga</small></label>
                                        </div>
                                      </td>
                                    </tr>
                                  </table>
                                </td>                                
                            </tr>
                        </tbody>
                    </table>

                    <h3>Data Pengurus Lembaga</h3>
                    <table>
                        <tbody>                            
                            <tr>                                
                                <td width="100%" colspan="2">
                                  <table class="table add_row_pengurus" id="pengurus_lembaga">
                                    <tr>
                                      <td width="250">Nama & Alamat Lengkap (Sesuai KTP)<span>*</span></td>
                                      <td width="150">Jabatan<span>*</span></td>
                                      <td width="240">Identitas Diri<span>*</span></td>
                                      <td>No Telepon<span>*</span></td>
                                      <td><small><a href="javascript:void(0)" class="add_button_pengurus btn btn-primary">Add More </a></small></td>
                                    </tr>
                                    <tr>
                                      <td>
                                        <div class="row">
                                          <label  class="col-md-3">
                                            Nama
                                          </label>
                                          <div class="col-md-9">
                                            <input type="text" name="nama_pengurus_1[]" size="19" maxlength="255"  value="" class="formField required only_text">
                                          </div>
                                        </div></br>
                                        <div class="row">
                                          <label  class="col-md-3">
                                            Alamat
                                          </label>
                                          <div class="col-md-9">
                                            <input type="text" size="19" name="alamat_pengurus_1[]" maxlength="255"  value="" class="formField required only_text">
                                          </div>
                                        </div>
                                      </td>
                                      <td><input type="text" size="14" maxlength="255" name="jabatan_pengurus_1[]" value="" class="formField required only_text"></td>
                                      <td>
                                        <div class="row">
                                          <label  class="col-md-4">
                                            No NPWP Pribadi
                                          </label>
                                          <div class="col-md-8">
                                            <input type="text" maxlength="255" size="15" name="npwp_pribadi_1[]" value="" class="formField required number_only npwp">
                                          </div>
                                        </div>
                                        <div class="row">
                                          <label  class="col-md-4">
                                            No KTP
                                          </label>
                                          <div class="col-md-8">
                                            <input type="text" maxlength="255" size="15" name="ktp_pribadi_1[]" value="" class="formField required number_only">
                                          </div>
                                        </div></br>
                                        <div class="row">
                                          <label  class="col-md-4">
                                            Dikeluarkan Di kota
                                          </label>
                                          <div class="col-md-8">
                                            <input type="text" maxlength="255" name="dikeluarkan_ktp_1[]" size="15" value="" class="formField required">
                                          </div>
                                        </div>
                                        <div class="row">
                                          <label  class="col-md-4">
                                            Tanggal Kadaluwarsa
                                          </label>
                                          <div class="col-md-8">
                                            <div id="datetimepicker2" class="input-append date datetimepicker">
                                              <input name="ktp_kadaluwarsa_1[]" size="10" data-format="dd/MM/yyyy" type="text" class="required input_tanggal number_only"></input>
                                              <span class="add-on"><i class="fa fa-calendar"></i></span>
                                            </div>
                                          </div>
                                        </div>
                                      </td>
                                      <td colspan="2">
                                          <div class="row">
                                            <div class="col-md-3">
                                              <label>Rumah</label>
                                            </div>
                                            <div class="col-md-9">
                                              <input type="text" maxlength="15" name="tlp_rumah_1[]" size="15" value="" class="formField required number_only phone">
                                            </div>
                                          </div><br/>
                                          <div class="row">
                                            <label  class="col-md-3">
                                              HP
                                            </label>
                                            <div class="col-md-9">
                                              <input type="text" maxlength="15" name="no_hp_1[]" size="15" value="" class="formField required number_only">
                                            </div>
                                          </div>
                                      </td>
                                    </tr>
                                </table>
                                </td>
                            </tr>                            
                        </tbody>
                    </table>
                    
                    <h3><input type="checkbox" id="chkGrpUsaha"> GROUP USAHA (pilih apabila memiliki group usaha)</h3>
                    <table>
                        <tbody class="table add_row_group" id="group_lembaga">
                            <tr>
                                <td>NAMA LEMBAGA<span class="grpUsaha">*</span></td>
                                <td>ALAMAT<span class="grpUsaha">*</span></td>
                                <td>BIDANG USAHA<span class="grpUsaha">*</span></td>
                                <td>TELEPON<span class="grpUsaha">*</span></td>
                                <td>NOMOR NPWP<span class="grpUsaha">*</span></td>
                                <td><small><a href="javascript:void(0)" class="add_button_group btn btn-primary">Add More </a></small></td>
                              </tr>
                              <tr>
                                <td>
                                      <input type="text" size="14" name="nama_lembaga_group1[]" maxlength="255"  value="" class="formField reqGrpUsaha required">
                                </td>
                                <td>
                                      <input type="text" size="17" name="alamat_lembaga_group1[]" maxlength="255"  value="" class="formField reqGrpUsaha required">
                                </td>
                                <td>
                                      <input type="text" size="15" name="bidang_usaha_group1[]" maxlength="255"  value="" class="formField reqGrpUsaha required">
                                </td>
                                <td>
                                      <input type="text" size="15" maxlength="255" name="no_telepon_group1[]" value="" class="formField reqGrpUsaha number_only phone required">
                                </td>
                                <td>
                                      <input type="text" size="15" name="no_npwp_group1[]" maxlength="255"  value="" class="formField reqGrpUsaha number_only npwp required">
                                </td>
                                <td></td>
                              </tr>
                        </tbody>
                    </table>

                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p class="pull-right">*) Wajib Diisi</p>
                    </div>
                  </div>
                 <div class="box-btn">
                    <a href="" class="btn btn-blue">Batal</a>
                    <a href="javascript:void(0)" id="validateCifLembaga" class="btn btn-yellow next" >Next</a>
                </div>                   
            </div>
            </form>
        </div>
    </div>
</section>