<?php
$btntitan = TitanFramework::getInstance( 'btn' );
$countries =  explode("\r\n",$btntitan->getOption( 'negara' ));
$gelars =  explode("\r\n",$btntitan->getOption( 'titleper' ));
$jenis_identitas =  explode("\r\n",$btntitan->getOption( 'jenis_identitas' ));
$pendidikan_terkhir =  explode("\r\n",$btntitan->getOption( 'pendidikan_terkhir' ));
$jenis_pekerjaan =  explode("\r\n",$btntitan->getOption( 'jenis_pekerjaan' ));
$pendapatan_perbulan =  explode("\r\n",$btntitan->getOption( 'pendapatan_perbulan' ));
$sumber_pendapatan =  explode("\r\n",$btntitan->getOption( 'sumber_pendapatan' ));
?>
<div class="modal fade" id="konfirmasi-form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog" style="max-width:450px">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Verifikasi Form</h4>
         </div>
         <div class="modal-body">
         <p>
           Silakan verifikasi akun anda dengan mendatangi cabang terdekat
         </p>
          <form id="verificationRegistration" class="form-horizontal">
                  <div class="form-group">
                     <label for="" class="col-sm-5 control-label">Pilih Kota</label>
                     <div class="col-sm-7">
                         <select name="KOTA_ID" class="selectpicker select_v_kota required">
                              <option value="">--Pilih Kota--</option>
                              <?php echo btn_get_city() ?>
                          </select>
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="" class="col-sm-5 control-label">Pilih Cabang</label>
                     <div class="col-sm-7">
                         <select name="CABANG_ID" class="selectpicker selectpicker_v_cabang required">
                            <option value="">--Pilih Cabang--</option>
                        </select>
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="" class="col-sm-5 control-label">Pilih Tanggal</label>
                     <div class="col-sm-7">
                          <div id="datetimepicker5" class="input-append date">
                              <input name="V_TANGGAL" data-format="dd/MM/yyyy" type="text" class="required" readonly></input>
                              <span class="add-on">
                                <i class="fa fa-calendar"></i>
                              </span>
                          </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="" class="col-sm-5 control-label">Pilih Waktu</label>
                     <div class="col-sm-7">
                         <div id="datetimepicker6" class="input-append date">
                            <input name="V_WAKTU" data-format="hh:mm:ss" type="text" class="required" readonly></input>
                            <span class="add-on">
                              <i class="fa fa-clock-o"></i>
                            </span>
                          </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="col-sm-offset-2 col-sm-10">
                        <button id="processRegistration" type="submit" class="btn btn-yellow pull-right">Proses</button>
                     </div>
                  </div>
               </form>
               <div class="progress" style="display:none;">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                    Please Wait ...
                  </div>
                </div>
         </div>
      </div>
   </div>
</div>
<section id="form-pendaftaran">
    <div class="container">
        <div class="headline">
            <div class="icon-form">
                <i class="fa fa-file-text-o"></i>
            </div>
            <h2>Permohonan Pembukaan Rekening</h2>
            <p>
                Isilah form berikut dengan Data Anda selengkapnya.
            </p>
        </div>
        <div class="row">
            <form id="accountRegistration">
                <input type="hidden" name="TYPE_ID" value="<?php echo $_POST['jenis_tabungan'] ?>">
                <div class="data-diri">
                    <h3>Data Diri</h3>
                    <table>
                        <tbody>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Jenis kartu identitas</strong></td>
                                <td width="60%" class="tdgenap">
                                    <select name="JENIS_IDENTITAS" class="selectpicker required">
                                        <option value="">--Pilih--</option>
                                        <?php if(!empty($jenis_identitas)):  ?>
                                           <?php foreach($jenis_identitas as $jenis_identitas): ?>
                                            <option value="<?php echo $jenis_identitas ?>"><?php echo $jenis_identitas ?></option>
                                           <?php endforeach ?>
                                        <?php endif ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Nomor kartu identitas</strong></td>
                                <td width="60%" class="tdgenap"><input type="text" name="NOMOR_IDENTITAS" maxlength="20" size="20" value="" class="formField required number_only"></td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil">Gelar sebelum nama</td>
                                <td width="60%" class="tdgenap">
                                <select name="GELAR_SEBELUM_NAMA" class="selectpicker">
                                    <option value="">--Pilih--</option>
                                    <?php if(!empty($gelars)):  ?>
                                           <?php foreach($gelars as $gelar): ?>
                                            <option value="<?php echo $gelar ?>"><?php echo $gelar ?></option>
                                           <?php endforeach ?>
                                    <?php endif ?>
                                </select>
                                </td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Nama sesuai kartu identitas</strong></td>
                                <td width="60%" class="tdgenap"><input type="text" name="NAMA_IDENTITAS" maxlength="40" size="30" value="" class="required">
                                </td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Apakah Nama lengkap tanpa singkatan sama dengan Nama sesuai Kartu Identitas?</strong></td>
                                <td width="60%" class="tdgenap">
                                    <div class="radio radio-primary">
                                        <input id="radio-1" type="radio" name="NAMA_SINGKATAN_PADA_IDENTITAS" value="1" class="required">
                                        <label for="radio-1">
                                        <span>Yes</span>
                                        </label>
                                    </div>
                                    <div class="radio radio-primary">
                                        <input id="radio-2" type="radio" name="NAMA_SINGKATAN_PADA_IDENTITAS" value="0">
                                        <label for="radio-2">
                                        <span>No</span>
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr id="fullName1" style="display: none;">
                                <td width="40%" class="tdganjil"><strong>Nama lengkap tanpa singkatan</strong></td>
                                <td width="60%" class="tdgenap"><input type="text" name="NAMA_TANPA_SINGKATAN" maxlength="40" size="30" value="" class="required">
                                </td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil">Gelar setelah nama</td>
                                <td width="60%" class="tdgenap"><input type="text" name="GELAR_SETELAH_NAMA" maxlength="10" size="12" value="" class="">
                                </td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Kota lahir</strong></td>
                                <td width="60%" class="tdgenap"><input type="text" name="KOTA_LAHIR" maxlength="50" size="30" value="" class="required">
                                </td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Tanggal Lahir</strong></td>
                                <td width="60%" class="tdgenap">
                                    <input type="text" name="TANGGAL_LAHIR" data-masked-input="99/99/9999" maxlength="10" class="required">
                                    <br>
                                    <small>contoh: 22/04/1970</small>
                                </td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Jenis Kelamin</strong></td>
                                <td width="60%" class="tdgenap">
                                    <select name="JENIS_KELAMIN" class="selectpicker required">
                                        <option value="">--Pilih--</option>
                                        <option value="10">LAKI - LAKI</option>
                                        <option value="20">PEREMPUAN</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Status perkawinan</strong></td>
                                <td width="60%" class="tdgenap">
                                    <select name="STATUS_KAWIN" class="selectpicker required">
                                        <option value="">--Pilih--</option>
                                        <option value="M">Menikah</option>
                                        <option value="S">Belum Menikah</option>
                                        <option value="W">Janda/Duda</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Kewarganegaraan</strong></td>
                                <td width="60%" class="tdgenap">
                                    <select name="KEWARGANEGARAAN" class="selectpicker required">
                                        <option value="">--Pilih--</option>
                                        <option value="WNI">WNI</option>
                                        <option value="WNA">WNA</option>
                                        </option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Tanggal berakhir kartu identitas</strong></td>
                                <td width="60%" class="tdgenap">
                                    <div id="datetimepicker2" class="input-append date">
                                        <input name="TANGGAL_BERAKHIR_IDENTITAS" data-format="dd/MM/yyyy" type="text" class="required" readonly></input>
                                        <span class="add-on">
                                        <i class="fa fa-calendar">
                                        </i>
                                        </span>
                                    </div>
                                </td>
                            </tr>
                            <tr id="spIdType1" style="display: none;">
                                <td width="40%" class="tdganjil"><strong>ID Pendukung</strong></td>
                                <td width="60%" class="tdgenap">
                                    <select name="ID_PENDUKUNG" class="selectpicker required">
                                        <option value="">--Pilih--</option>
                                        <option value="KA">KITAP</option>
                                        <option value="KI">KITAS</option>
                                        <option value="KM">KIMS</option>
                                        <option value="SR">Surat Referensi</option>
                                    </select>
                                </td>
                            </tr>
                            <tr id="spIdNo1" style="display: none;">
                                <td width="40%" class="tdganjil"><strong>Nomor ID Pendukung</strong></td>
                                <td width="60%" class="tdgenap"><input type="text" name="NOMOR_ID_PENDUKUNG" maxlength="20" size="20" value="" class="required"></td>
                            </tr>
                            <tr id="spIdStart1" style="display: none;">
                                <td width="40%" class="tdganjil"><strong>Masa Mulai ID Pendukung</strong></td>
                                <td width="60%" class="tdgenap">
                                    <div id="datetimepicker3" class="input-append date">
                                        <input name="MASA_MULAI_ID_PENDUKUNG" data-format="dd/MM/yyyy" type="text" class="required"></input>
                                        <span class="add-on">
                                        <i class="fa fa-calendar">
                                        </i>
                                        </span>
                                    </div>
                                </td>
                            </tr>
                            <tr id="spIdEnd1" style="display: none;">
                                <td width="40%" class="tdganjil"><strong>Masa Berakhir ID Pendukung</strong></td>
                                <td width="60%" class="tdgenap">
                                    <div name="MASA_BERAKHIR_ID_PENDUKUNG" id="datetimepicker4" class="input-append date required">
                                        <input data-format="dd/MM/yyyy" type="text"></input>
                                        <span class="add-on">
                                        <i class="fa fa-calendar">
                                        </i>
                                        </span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Pendidikan terakhir</strong></td>
                                <td width="60%" class="tdgenap">
                                    <select name="PENDIDIKAN_TERAKHIR" class="selectpicker required">
                                        <option value="">--Pilih--</option>
                                        <?php if(!empty($pendidikan_terkhir)):  ?>
                                           <?php foreach($pendidikan_terkhir as $pendidikan_terkhir): ?>
                                            <option value="<?php echo $pendidikan_terkhir ?>"><?php echo $pendidikan_terkhir ?></option>
                                           <?php endforeach ?>
                                        <?php endif ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Nama gadis ibu kandung</strong></td>
                                <td width="60%" class="tdgenap"><input type="text" name="NAMA_GADIS_IBU_KANDUNG" maxlength="25" size="30" value="" class="required"></td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil">No NPWP</td>
                                <td width="60%" class="tdgenap"><input type="text" name="NO_NPWP" maxlength="15" size="20" value="" class="number_only"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="data-alamat">
                    <h3>Data Alamat Sesuai Kartu Identitas</h3>
                    <table width="100%" border="0" class="tablegrid" align="center" cellspacing="1px">
                        <tbody>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Nama gedung / nama jalan</strong></td>
                                <td width="60%" class="tdgenap">
                                    <input type="text" name="NAMA_GEDUNG" maxlength="40" size="30" value="" class="required">
                                    <input type="text" name="NAMA_JALAN" maxlength="40" size="30" value="" class="required">
                                </td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil">RT / RW</td>
                                <td width="60%" class="tdgenap"><input type="text" name="RTRW" maxlength="7" size="10" value="">
                                </td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Kelurahan</strong></td>
                                <td width="60%" class="tdgenap"><input type="text" name="KELURAHAN" maxlength="14" size="20" value="" class="required"></td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Kecamatan</strong></td>
                                <td width="60%" class="tdgenap"><input type="text" name="KECAMATAN" maxlength="14" size="20" value="" class="required"></td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Kota/Kabupaten</strong></td>
                                <td width="60%" class="tdgenap"><input type="text" size="30" name="KOTA_KABUPATEN" value=""  class="required"><input type="hidden" size="30" value="">
                                </td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Kode pos</strong></td>
                                <td width="60%" class="tdgenap"><input type="text" name="KODEPOS" maxlength="5" size="7" value="" class="required number_only">
                                </td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Negara</strong></td>
                                <td width="60%" class="tdgenap">
                                    <select name="NEGARA" class="selectpicker required">
                                        <option value="">--Pilih--</option>
                                        <?php if(!empty($countries)):  ?>
                                           <?php foreach($countries as $country): ?>
                                            <option value="<?php echo $country ?>"><?php echo $country ?></option>
                                           <?php endforeach ?>
                                        <?php endif ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Apakah alamat tinggal Anda sesuai dengan alamat pada kartu identitas?</strong></td>
                                <td width="60%" class="tdgenap">
                                    <div class="radio radio-primary">
                                        <input id="radio-3" type="radio" class="required" name="ALAMAT_PADA_IDENTITAS" value="1">
                                        <label for="radio-3">
                                        <span>Yes</span>
                                        </label>
                                    </div>
                                    <div class="radio radio-primary">
                                        <input id="radio-4" type="radio" name="ALAMAT_PADA_IDENTITAS" value="0">
                                        <label for="radio-4">
                                        <span>No</span>
                                        </label>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table width="100%" border="0" class="tablegrid" align="center" cellspacing="1px">
                        <tbody>
                            <tr>
                                <td width="40%" class="tdganjil">Nomor telepon tempat tinggal</td>
                                <td width="60%" class="tdgenap">
                                    (1) <input type="text" name="NO_TELP1" maxlength="5" size="5" value="" class="number_only"> - <input type="text" name="NO_TELP11" maxlength="10" size="12" value="" class="number_only"><br>
                                    (2) <input type="text" name="NO_TELP2" maxlength="5" size="5" value="" class="number_only"> - <input type="text" name="NO_TELP22" maxlength="10" size="12" value="" class="number_only">
                                </td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil">Nomor ponsel</td>
                                <td width="60%" class="tdgenap">
                                    (1) <input type="text" name="NO_PONSEL1" maxlength="15" size="20" value="" class="number_only"><br>
                                    (2) <input type="text" name="NO_PONSEL2" maxlength="15" size="20" value="" class="number_only"><br>
                                    <small>contoh: 081xxxxxxxxx atau 021xxxxxxxx</small>
                                </td>
                            </tr>
                            <tr>
                                <td class="tdganjil">Nomor Ponsel luar negeri</td>
                                <td class="tdgenap"><input type="text" name="NO_PONSEL_LUAR" maxlength="15" size="20" value="" class="number_only">
                                    <br><small>contoh: 6021xxxxxx</small>
                                </td>
                            </tr>
                            <tr>
                                <td class="tdganjil"><strong>Alamat E-mail</strong></td>
                                <td class="tdgenap"><input type="text" name="EMAIL" maxlength="40" size="30" value="" class="required email"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="data-pekerjaan">
                    <h3>Data Pekerjaan</h3>
                    <table width="100%" border="0" class="tablegrid" align="center" cellspacing="1px">
                        <tbody>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Jenis pekerjaan</strong></td>
                                <td width="60%" class="tdgenap">
                                    <select name="JENIS_PEKERJAAN" class="selectpicker required">
                                        <option value="">--Pilih--</option>
                                        <?php if(!empty($jenis_pekerjaan)):  ?>
                                           <?php foreach($jenis_pekerjaan as $jenis_pekerjaan): ?>
                                            <option value="<?php echo $jenis_pekerjaan ?>"><?php echo $jenis_pekerjaan ?></option>
                                           <?php endforeach ?>
                                        <?php endif ?>
                                    </select>
                                </td>
                            </tr>
                            <tr id="position1">
                                <td width="40%" class="tdganjil">Jabatan</td>
                                <td width="60%" class="tdgenap"><input type="text" name="JABATAN"  maxlength="20" size="20" value="">
                                </td>
                            </tr>
                            <tr id="department1">
                                <td width="40%" class="tdganjil">Departemen</td>
                                <td width="60%" class="tdgenap"><input type="text" name="DEPARTEMEN" maxlength="20" size="20" value=""></td>
                            </tr>
                            <tr id="economySectorOther1">
                                <td width="40%" class="tdganjil">Bidang Usaha</td>
                                <td width="60%" class="tdgenap"><input type="text" name="BIDANG_USAHA" maxlength="30" size="30" value="" id="eco1">
                                </td>
                            </tr>
                            <tr id="corpName1">
                                <td width="40%" class="tdganjil">Nama tempat bekerja / perusahaan</td>
                                <td width="60%" class="tdgenap"><input type="text" name="KANTOR" maxlength="40" size="30" value="">
                                </td>
                            </tr>
                            <tr id="addressLine1">
                                <td width="40%" class="tdganjil">Nama gedung / nama jalan</td>
                                <td width="60%" class="tdgenap">
                                    <input type="text" name="NAMA_GEDUNG_KANTOR" maxlength="40" size="30" value="">
                                    <br>
                                    <input type="text" name="NAMA_JALAN_KANTOR" maxlength="40" size="30" value="">
                                </td>
                            </tr>
                            <tr id="city1">
                                <td width="40%" class="tdganjil">Kota/Kabupaten</td>
                                <td width="60%" class="tdgenap">
                                    <input type="text" name="KOTA_KABUPATEN_KANTOR" size="30" value="">
                                </td>
                            </tr>
                            <tr id="postCode1">
                                <td width="40%" class="tdganjil">Kode pos</td>
                                <td width="60%" class="tdgenap"><input type="text" name="KODEPOS_KANTOR" maxlength="5" size="7" value="" class="number_only">
                                </td>
                            </tr>
                            <tr id="country1">
                                <td width="40%" class="tdganjil"><strong>Negara</strong></td>
                                <td width="60%" class="tdgenap">
                                    <select name="NEGARA_KANTOR" class="selectpicker required">
                                        <option value="">--Pilih--</option>
                                        <?php if(!empty($countries)):  ?>
                                           <?php foreach($countries as $country): ?>
                                            <option value="<?php echo $country ?>"><?php echo $country ?></option>
                                           <?php endforeach ?>
                                        <?php endif ?>
                                    </select>
                                </td>
                            </tr>
                            <tr id="phoneAreaCd1">
                                <td width="40%" class="tdganjil">Nomor telepon kantor</td>
                                <td width="60%" class="tdgenap">
                                    <input type="text"name="NO_TLP_KANTOR" maxlength="5" size="5" value="" class="number_only"> - <input type="text" name="NO_TLP_KANTOR1" maxlength="10" size="12" value="" class="number_only">
                                </td>
                            </tr>
                            <tr id="extPhoneNo1">
                                <td width="40%" class="tdganjil">Nomor ext. kantor</td>
                                <td width="60%" class="tdgenap"><input type="text" name="NO_EXT" maxlength="5" size="5" value="" class="number_only"></td>
                            </tr>
                            <tr id="monthlyIncome1">
                                <td width="40%" class="tdganjil"><strong>Pendapatan per bulan</strong></td>
                                <td width="60%" class="tdgenap">
                                    <select name="PENDAPATAN_PERBULAN" class="selectpicker required">
                                        <option value="">--Pilih--</option>
                                        <?php if(!empty($pendapatan_perbulan)):  ?>
                                           <?php foreach($pendapatan_perbulan as $pendapatan_perbulan): ?>
                                            <option value="<?php echo $pendapatan_perbulan ?>"><?php echo $pendapatan_perbulan ?></option>
                                           <?php endforeach ?>
                                        <?php endif ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><span id="sourceOfFund1">Sumber pendapatan (Bila tidak bekerja)</span></td>
                                <td width="60%" class="tdgenap">
                                    <select name="SUMBER_PENDAPATAN" class="selectpicker">
                                        <option value="">--Pilih--</option>
                                        <?php if(!empty($sumber_pendapatan)):  ?>
                                           <?php foreach($sumber_pendapatan as $sumber_pendapatan): ?>
                                            <option value="<?php echo $sumber_pendapatan ?>"><?php echo $sumber_pendapatan ?></option>
                                           <?php endforeach ?>
                                        <?php endif ?>
                                    </select>
                                    <input type="text" name="SUMBER_PENDAPATAN_LAIN" maxlength="40" size="30" value="" id="fund1" class="required" style="display: none;">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="box-btn">
                    <label>
                      <div class="checkbox checkbox-primary">
                          <input  type="checkbox" id="check-agree" name="agree" value="1" class="required">
                      <label for="check-agree">
                        <span>
                        Saya telah membaca, memahami dan menyetujui hal-hal yang tercantum pada <a href="">syarat dan ketentuan</a> pembukaan rekening melalui situs BTN
                        </span>
                      </label>
                      </div>
                    </label>
                    <a href="" class="btn btn-blue">Batal</a>
                    <a href="" id="submitRegistration" class="btn btn-yellow">Kirim</a>
                </div>
            </form>
        </div>
    </div>
</section>
<section id="call-action" class="small">
    <div class="row-fluid">
        <h2>Jika Anda butuh bantuan, silahkan hubungi Customer Services Kami
        </h2>
        <a href="<?php echo home_url( '/live-chat' ) ?>" class="btn btn-blue"><i class="fa fa-comments-o"></i> Live Chat dengan CS </a>
    </div>
</section>