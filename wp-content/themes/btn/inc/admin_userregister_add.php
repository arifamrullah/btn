<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link href='//fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/custom.css" media="screen" title="no title" charset="utf-8">

<style media="screen">
#form-pendaftaran{padding: 0;}
#form-pendaftaran .headline{max-width: 100%;margin: 0;}
#form-pendaftaran form{max-width: 90%;margin: 0;}
.modal-open .modal{z-index: 9999;}
.modal.in .modal-dialog{z-index: 2000;}
.bootstrap-datetimepicker-widget.dropdown-menu{z-index: 11000;}
</style>
<?php
if($_GET){
  $REK_ID= $_GET['reg'];
  $REK = btn_get_all_register_by_id($REK_ID);
}
?>
<?php
                        $btntitan = TitanFramework::getInstance( 'btn' );
                        $countries =  explode("\r\n",$btntitan->getOption( 'negara' ));


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
                      <div class="select-style">
                         <select name="KOTA_ID" class="select_v_kota required">
                              <option value="">--Pilih Kota--</option>
                              <?php echo btn_get_city($REK->KOTA_ID) ?>
                          </select>
                      </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="" class="col-sm-5 control-label">Pilih Cabang</label>
                     <div class="col-sm-7">
                      <div class="select-style">
                         <select name="CABANG_ID" class="selectpicker_v_cabang required">
                            <option value="">--Pilih Cabang--</option>                                                      
                            <?php echo btn_get_substation($REK->KOTA_ID,$REK->CABANG_ID) ?>
                        </select>
                      </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="" class="col-sm-5 control-label">Pilih Tanggal</label>
                     <div class="col-sm-7">
                          <div id="datetimepicker5" class="input-append date">
                              <input name="V_TANGGAL" data-format="dd/MM/yyyy" type="text" class="required" value="<?php echo date('d/m/Y',$REK->TANGGAL); ?>" readonly></input>
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
                            <input name="V_WAKTU" data-format="hh:ss" type="text" class="required" value="<?php echo $REK->WAKTU ?>" readonly></input>
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
            <h2><?php echo ($_GET)? 'Ubah ':'' ?>Permohonan Pembukaan Rekening</h2>
            <p><?php echo ($_GET)? '&nbsp;':'Isilah form berikut dengan Data Anda selengkapnya.' ?></p>
        </div>
        <div class="row">
            <form id="accountRegistration">
                <input type="hidden" name="TYPE_ID" value="<?php echo $REK->TYPE_TABUNGAN ?>">
                <div class="data-diri">
                    <h3>Data Diri</h3>
                    <table>
                        <tbody>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Jenis kartu identitas</strong></td>
                                <td width="60%" class="tdgenap">
                                  <div class="select-style">
                                    <select name="JENIS_IDENTITAS" class="required">
                                        <option value="">--Pilih--</option>
                                        <option value="KT" <?php echo ($REK->JENIS_IDENTITAS=='KT')? 'selected':''?>>KTP</option>
                                        <option value="PA" <?php echo ($REK->JENIS_IDENTITAS=='PA')? 'selected':''?>>Passport</option>
                                        <option value="SI" <?php echo ($REK->JENIS_IDENTITAS=='SI')? 'selected':''?>>SIM</option>
                                    </select>
                                  </div>
                                </td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Nomor kartu identitas</strong></td>
                                <td width="60%" class="tdgenap"><input type="text" name="NOMOR_IDENTITAS" maxlength="20" size="20" value="<?php echo $REK->NOMOR_IDENTITAS; ?>" class="formField required"></td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil">Gelar sebelum nama</td>
                                <td width="60%" class="tdgenap"><input type="text" name="GELAR_SEBELUM_NAMA" maxlength="10" size="12" value="<?php echo $REK->GELAR_SEBELUM_NAMA; ?>" class="">
                                </td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Nama sesuai kartu identitas</strong></td>
                                <td width="60%" class="tdgenap"><input type="text" name="NAMA_IDENTITAS" maxlength="40" size="30" value="<?php echo $REK->NAMA_IDENTITAS; ?>" class="required">
                                </td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Apakah Nama lengkap tanpa singkatan sama dengan Nama sesuai Kartu Identitas?</strong></td>
                                <td width="60%" class="tdgenap">
                                    <div class="radio radio-primary">
                                        <input id="radio-1" type="radio" name="NAMA_SINGKATAN_PADA_IDENTITAS" value="1" class="required" <?php echo ($REK->NAMA_SINGKATAN_PADA_IDENTITAS=='1')? 'checked':''?>>
                                        <label for="radio-1">
                                        <span>Yes</span>
                                        </label>
                                    </div>
                                    <div class="radio radio-primary">
                                        <input id="radio-2" type="radio" name="NAMA_SINGKATAN_PADA_IDENTITAS" value="0" <?php echo ($REK->NAMA_SINGKATAN_PADA_IDENTITAS=='0')? 'checked':''?>>
                                        <label for="radio-2">
                                        <span>No</span>
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr id="fullName1" style="display: none;">
                                <td width="40%" class="tdganjil"><strong>Nama lengkap tanpa singkatan</strong></td>
                                <td width="60%" class="tdgenap"><input type="text" name="NAMA_TANPA_SINGKATAN" maxlength="40" size="30" value="<?php echo $REK->NAMA_TANPA_SINGKATAN; ?>" class="required">
                                </td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil">Gelar setelah nama</td>
                                <td width="60%" class="tdgenap"><input type="text" name="GELAR_SETELAH_NAMA" maxlength="10" size="12" value="<?php echo $REK->GELAR_SETELAH_NAMA; ?>" class="">
                                </td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Kota lahir</strong></td>
                                <td width="60%" class="tdgenap"><input type="text" name="KOTA_LAHIR" maxlength="50" size="30" value="<?php echo $REK->KOTA_LAHIR; ?>" class="required">
                                </td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Tanggal Lahir</strong></td>
                                <td width="60%" class="tdgenap">
                                    <div id="datetimepicker1" class="input-append date">
                                        <input name="TANGGAL_LAHIR" data-format="dd/MM/yyyy" type="text" value="<?php echo date('d/m/Y',$REK->TANGGAL_LAHIR); ?>" class="required" readonly></input>
                                        <span class="add-on">
                                        <i class="fa fa-calendar">
                                        </i>
                                        </span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Jenis Kelamin</strong></td>
                                <td width="60%" class="tdgenap">
                                  <div class="select-style">
                                    <select name="JENIS_KELAMIN" class="required">
                                        <option value="">--Pilih--</option>
                                        <option value="10" <?php echo ($REK->JENIS_KELAMIN=='10')? 'selected':''?>>LAKI - LAKI</option>
                                        <option value="20" <?php echo ($REK->JENIS_KELAMIN=='20')? 'selected':''?>>PEREMPUAN</option>
                                    </select>
                                  </div>
                                </td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Status perkawinan</strong></td>
                                <td width="60%" class="tdgenap">
                                  <div class="select-style">
                                    <select name="STATUS_KAWIN" class="required">
                                        <option value="">--Pilih--</option>
                                        <option value="M" <?php echo ($REK->STATUS_KAWIN=='M')? 'selected':''?>>Menikah</option>
                                        <option value="S" <?php echo ($REK->STATUS_KAWIN=='S')? 'selected':''?>>Belum Menikah</option>
                                        <option value="W" <?php echo ($REK->STATUS_KAWIN=='W')? 'selected':''?>>Janda/Duda</option>
                                    </select>
                                  </div>
                                </td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Kewarganegaraan</strong></td>
                                <td width="60%" class="tdgenap">
                                  <div class="select-style">
                                    <select name="KEWARGANEGARAAN" class="required">
                                        <option value="">--Pilih--</option>
                                        <option value="WNI" <?php echo ($REK->KEWARGANEGARAAN=='WNI')? 'selected':''?>>WNI</option>
                                        <option value="WNA" <?php echo ($REK->KEWARGANEGARAAN=='WNA')? 'selected':''?>>WNA</option>
                                        </option>
                                    </select>
                                  </div>
                                </td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Tanggal berakhir kartu identitas</strong></td>
                                <td width="60%" class="tdgenap">
                                    <div id="datetimepicker2" class="input-append date">
                                        <input name="TANGGAL_BERAKHIR_IDENTITAS" data-format="dd/MM/yyyy" type="text" value="<?php echo date('d/m/Y',$REK->TANGGAL_LAHIR); ?>" class="required" readonly></input>
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
                                  <div class="select-style">
                                    <select name="ID_PENDUKUNG" class="required">
                                        <option value="">--Pilih--</option>
                                        <option value="KA" <?php echo ($REK->ID_PENDUKUNG=='KA')? 'selected':''?>>KITAP</option>
                                        <option value="KI" <?php echo ($REK->ID_PENDUKUNG=='KI')? 'selected':''?>>KITAS</option>
                                        <option value="KM" <?php echo ($REK->ID_PENDUKUNG=='KM')? 'selected':''?>>KIMS</option>
                                        <option value="SR" <?php echo ($REK->ID_PENDUKUNG=='SR')? 'selected':''?>>Surat Referensi</option>
                                    </select>
                                  </div>
                                </td>
                            </tr>
                            <tr id="spIdNo1" style="display: none;">
                                <td width="40%" class="tdganjil"><strong>Nomor ID Pendukung</strong></td>
                                <td width="60%" class="tdgenap"><input type="text" name="NOMOR_ID_PENDUKUNG" maxlength="20" size="20" value="<?php echo $REK->NOMOR_ID_PENDUKUNG; ?>" class="required"></td>
                            </tr>
                            <tr id="spIdStart1" style="display: none;">
                                <td width="40%" class="tdganjil"><strong>Masa Mulai ID Pendukung</strong></td>
                                <td width="60%" class="tdgenap">
                                    <div id="datetimepicker3" class="input-append date">
                                        <input name="MASA_MULAI_ID_PENDUKUNG" data-format="dd/MM/yyyy" type="text" value="<?php echo date('d/m/Y',$REK->MASA_MULAI_ID_PENDUKUNG); ?>" class="required"></input>
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
                                    <div name="MASA_BERAKHIR_ID_PENDUKUNG" id="datetimepicker4" value="<?php echo date('d/m/Y',$REK->MASA_BERAKHIR_ID_PENDUKUNG); ?>" class="input-append date required">
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
                                  <div class="select-style">
                                    <select name="PENDIDIKAN_TERAKHIR" class="required">
                                        <option value="">--Pilih--</option>
                                        <option value="0100" <?php echo ($REK->PENDIDIKAN_TERAKHIR=='0100')? 'selected':''?>>Tanpa Gelar</option>
                                        <option value="0101" <?php echo ($REK->PENDIDIKAN_TERAKHIR=='0101')? 'selected':''?>>Diploma 1</option>
                                        <option value="0102" <?php echo ($REK->PENDIDIKAN_TERAKHIR=='0102')? 'selected':''?>>Diploma 2</option>
                                        <option value="0103" <?php echo ($REK->PENDIDIKAN_TERAKHIR=='0103')? 'selected':''?>>Diploma 3</option>
                                        <option value="0104" <?php echo ($REK->PENDIDIKAN_TERAKHIR=='0104')? 'selected':''?>>S-1</option>
                                        <option value="0105" <?php echo ($REK->PENDIDIKAN_TERAKHIR=='0105')? 'selected':''?>>S-2</option>
                                        <option value="0106" <?php echo ($REK->PENDIDIKAN_TERAKHIR=='0106')? 'selected':''?>>S-3</option>
                                    </select>
                                  </div>
                                </td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Nama gadis ibu kandung</strong></td>
                                <td width="60%" class="tdgenap"><input type="text" name="NAMA_GADIS_IBU_KANDUNG" maxlength="25" size="30" value="<?php echo $REK->NAMA_GADIS_IBU_KANDUNG; ?>"  class="required"></td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil">No NPWP</td>
                                <td width="60%" class="tdgenap"><input type="text" name="NO_NPWP" maxlength="15" size="20" value="<?php echo $REK->NO_NPWP; ?>" ></td>
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
                                    <input type="text" name="NAMA_GEDUNG" maxlength="40" size="30" value="<?php echo $REK->NAMA_GEDUNG; ?>"  class="required">
                                    <input type="text" name="NAMA_JALAN" maxlength="40" size="30" value="<?php echo $REK->NAMA_JALAN; ?>"  class="required">
                                </td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil">RT / RW</td>
                                <td width="60%" class="tdgenap"><input type="text" name="RTRW" maxlength="7" size="10" value="<?php echo $REK->RTRW; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Kelurahan</strong></td>
                                <td width="60%" class="tdgenap"><input type="text" name="KELURAHAN" maxlength="14" size="20" value="<?php echo $REK->KELURAHAN; ?>" class="required"></td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Kecamatan</strong></td>
                                <td width="60%" class="tdgenap"><input type="text" name="KECAMATAN" maxlength="14" size="20" value="<?php echo $REK->KECAMATAN; ?>" class="required"></td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Kota/Kabupaten</strong></td>
                                <td width="60%" class="tdgenap"><input type="text" size="30" name="KOTA_KABUPATEN" value="<?php echo $REK->KOTA_KABUPATEN; ?>"  class="required"><input type="hidden" size="30" value="">
                                </td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Kode pos</strong></td>
                                <td width="60%" class="tdgenap"><input type="text" name="KODEPOS" maxlength="5" size="7" value="<?php echo $REK->KODEPOS; ?>" class="required">
                                </td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Negara</strong></td>
                                <td width="60%" class="tdgenap">
                                  <div class="select-style">
                                    <select name="NEGARA" class="required">
                                        <option value="">--Pilih--</option>
                                        <?php if(!empty($countries)):  ?>
                                           <?php foreach($countries as $country): ?>
                                            <option <?php echo ($REK->NEGARA==$country)? 'selected':''?> value="<?php echo $country ?>"><?php echo $country ?></option>
                                           <?php endforeach ?>
                                        <?php endif ?>                                        
                                    </select>
                                  </div>
                                </td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Apakah alamat tinggal Anda sesuai dengan alamat pada kartu identitas?</strong></td>
                                <td width="60%" class="tdgenap">
                                    <div class="radio radio-primary">
                                        <input id="radio-3" type="radio" class="required" name="ALAMAT_PADA_IDENTITAS" value="1" <?php echo ($REK->ALAMAT_PADA_IDENTITAS=='1')? 'checked':''?>>
                                        <label for="radio-3">
                                        <span>Yes</span>
                                        </label>
                                    </div>
                                    <div class="radio radio-primary">
                                        <input id="radio-4" type="radio" name="ALAMAT_PADA_IDENTITAS" value="0" <?php echo ($REK->ALAMAT_PADA_IDENTITAS=='0')? 'checked':''?>>
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
                                    (1) <input type="text" name="NO_TELP1" maxlength="5" size="5" value="<?php echo $REK->NO_TELP1; ?>"> - <input type="text" name="NO_TELP11" maxlength="10" size="12" value="<?php echo $REK->NO_TELP11; ?>"><br>
                                    (2) <input type="text" name="NO_TELP2" maxlength="5" size="5" value="<?php echo $REK->NO_TELP2; ?>"> - <input type="text" name="NO_TELP22" maxlength="10" size="12" value="<?php echo $REK->NO_TELP22; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil">Nomor ponsel</td>
                                <td width="60%" class="tdgenap">
                                    (1) <input type="text" name="NO_PONSEL1" maxlength="15" size="20" value="<?php echo $REK->NO_PONSEL1; ?>"><br>
                                    (2) <input type="text" name="NO_PONSEL2" maxlength="15" size="20" value="<?php echo $REK->NO_PONSEL2; ?>"><br>
                                    <small>contoh: 081xxxxxxxxx atau 021xxxxxxxx</small>
                                </td>
                            </tr>
                            <tr>
                                <td class="tdganjil">Nomor Ponsel luar negeri</td>
                                <td class="tdgenap"><input type="text" name="NO_PONSEL_LUAR" maxlength="15" size="20" value="<?php echo $REK->NO_PONSEL_LUAR; ?>">
                                    <br><small>contoh: 6021xxxxxx</small>
                                </td>
                            </tr>
                            <tr>
                                <td class="tdganjil"><strong>Alamat E-mail</strong></td>
                                <td class="tdgenap"><input type="text" name="EMAIL" maxlength="40" size="30" value="<?php echo $REK->EMAIL; ?>" class="required"></td>
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
                                  <div class="select-style">
                                    <select name="JENIS_PEKERJAAN" class="required">
                                        <option value="">--Pilih--</option>
                                        <option value="A" <?php echo ($REK->JENIS_PEKERJAAN=='A')? 'selected':''?>>Pegawai Negeri</option>
                                        <option value="B" <?php echo ($REK->JENIS_PEKERJAAN=='B')? 'selected':''?>>Pegawai Swasta</option>
                                        <option value="C" <?php echo ($REK->JENIS_PEKERJAAN=='C')? 'selected':''?>>Pelajar</option>
                                        <option value="D" <?php echo ($REK->JENIS_PEKERJAAN=='D')? 'selected':''?>>Ibu Rumah Tangga</option>
                                        <option value="E" <?php echo ($REK->JENIS_PEKERJAAN=='E')? 'selected':''?>>Lainnya</option>
                                        <option value="F" <?php echo ($REK->JENIS_PEKERJAAN=='F')? 'selected':''?>>Wiraswasta</option>
                                        <option value="G" <?php echo ($REK->JENIS_PEKERJAAN=='G')? 'selected':''?>>TNI/Polisi</option>
                                        <option value="H" <?php echo ($REK->JENIS_PEKERJAAN=='H')? 'selected':''?>>Profesional</option>
                                        <option value="I" <?php echo ($REK->JENIS_PEKERJAAN=='I')? 'selected':''?>>Pensiunan</option>
                                    </select>
                                  </div>
                                </td>
                            </tr>
                            <tr id="position1">
                                <td width="40%" class="tdganjil">Jabatan</td>
                                <td width="60%" class="tdgenap"><input type="text" name="JABATAN"  maxlength="20" size="20" value="<?php echo $REK->JABATAN; ?>">
                                </td>
                            </tr>
                            <tr id="department1">
                                <td width="40%" class="tdganjil">Departemen</td>
                                <td width="60%" class="tdgenap"><input type="text" name="DEPARTEMEN" maxlength="20" size="20" value="<?php echo $REK->DEPARTEMEN; ?>"></td>
                            </tr>
                            <tr id="economySectorOther1">
                                <td width="40%" class="tdganjil">Bidang Usaha</td>
                                <td width="60%" class="tdgenap"><input type="text" name="BIDANG_USAHA" maxlength="30" size="30" value="<?php echo $REK->BIDANG_USAHA; ?>" id="eco1">
                                </td>
                            </tr>
                            <tr id="corpName1">
                                <td width="40%" class="tdganjil">Nama tempat bekerja / perusahaan</td>
                                <td width="60%" class="tdgenap"><input type="text" name="KANTOR" maxlength="40" size="30" value="<?php echo $REK->KANTOR; ?>">
                                </td>
                            </tr>
                            <tr id="addressLine1">
                                <td width="40%" class="tdganjil">Nama gedung / nama jalan</td>
                                <td width="60%" class="tdgenap">
                                    <input type="text" name="NAMA_GEDUNG_KANTOR" maxlength="40" size="30" value="<?php echo $REK->NAMA_GEDUNG_KANTOR; ?>">
                                    <br>
                                    <input type="text" name="NAMA_JALAN_KANTOR" maxlength="40" size="30" value="<?php echo $REK->NAMA_JALAN_KANTOR; ?>">
                                </td>
                            </tr>
                            <tr id="city1">
                                <td width="40%" class="tdganjil">Kota/Kabupaten</td>
                                <td width="60%" class="tdgenap">
                                    <input type="text" name="KOTA_KABUPATEN_KANTOR" size="30" value="<?php echo $REK->KOTA_KABUPATEN_KANTOR; ?>">
                                </td>
                            </tr>
                            <tr id="postCode1">
                                <td width="40%" class="tdganjil">Kode pos</td>
                                <td width="60%" class="tdgenap"><input type="text" name="KODEPOS_KANTOR" maxlength="5" size="7" value="<?php echo $REK->KODEPOS_KANTOR; ?>">
                                </td>
                            </tr>
                            <tr id="country1">
                                <td width="40%" class="tdganjil"><strong>Negara</strong></td>
                                <td width="60%" class="tdgenap">
                                  <div class="select-style">
                                    <select name="NEGARA_KANTOR" class="required">
                                        <option value="">--Pilih--</option>
                                        <?php if(!empty($countries)):  ?>
                                           <?php foreach($countries as $country): ?>
                                            <option <?php echo ($REK->NEGARA_KANTOR==$country)? 'selected':''?> value="<?php echo $country ?>"><?php echo $country ?></option>
                                           <?php endforeach ?>
                                        <?php endif ?>                                                                                
                                    </select>
                                  </div>
                                </td>
                            </tr>
                            <tr id="phoneAreaCd1">
                                <td width="40%" class="tdganjil">Nomor telepon kantor</td>
                                <td width="60%" class="tdgenap">
                                    <input type="text" name="NO_TLP_KANTOR" maxlength="5" size="5" value="<?php echo $REK->NO_TLP_KANTOR; ?>" class=""> - <input type="text" name="NO_TLP_KANTOR1" maxlength="10" size="12" value="<?php echo $REK->NO_TLP_KANTOR1; ?>" class="">
                                </td>
                            </tr>
                            <tr id="extPhoneNo1">
                                <td width="40%" class="tdganjil">Nomor ext. kantor</td>
                                <td width="60%" class="tdgenap"><input type="text" name="NO_EXT" maxlength="5" size="5" value="<?php echo $REK->NO_EXT; ?>" class=""></td>
                            </tr>
                            <tr id="monthlyIncome1">
                                <td width="40%" class="tdganjil"><strong>Pendapatan per bulan</strong></td>
                                <td width="60%" class="tdgenap">
                                  <div class="select-style">
                                    <select name="PENDAPATAN_PERBULAN" class="required">
                                        <option value="">--Pilih--</option>
                                        <option value="1" <?php echo ($REK->PENDAPATAN_PERBULAN=='1')? 'selected':''?>>&lt;= Rp.1 juta</option>
                                        <option value="2" <?php echo ($REK->PENDAPATAN_PERBULAN=='2')? 'selected':''?>>&gt; Rp.1-10 juta</option>
                                        <option value="3" <?php echo ($REK->PENDAPATAN_PERBULAN=='3')? 'selected':''?>>&gt; Rp.10-100 juta</option>
                                        <option value="4" <?php echo ($REK->PENDAPATAN_PERBULAN=='4')? 'selected':''?>>&gt; Rp.100 juta</option>
                                    </select>
                                  </div>
                                </td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><span id="sourceOfFund1">Sumber pendapatan (Bila tidak bekerja)</span></td>
                                <td width="60%" class="tdgenap">
                                  <div class="select-style">
                                    <select name="SUMBER_PENDAPATAN">
                                        <option value="">--Pilih--</option>
                                        <option value="10" <?php echo ($REK->SUMBER_PENDAPATAN=='10')? 'selected':''?>>Suami</option>
                                        <option value="20" <?php echo ($REK->SUMBER_PENDAPATAN=='20')? 'selected':''?>>Orang Tua</option>
                                        <option value="30" <?php echo ($REK->SUMBER_PENDAPATAN=='30')? 'selected':''?>>Dari Anak</option>
                                        <option value="40" <?php echo ($REK->SUMBER_PENDAPATAN=='40')? 'selected':''?>>Hibah</option>
                                        <option value="999" <?php echo ($REK->SUMBER_PENDAPATAN=='999')? 'selected':''?>>Lainnya</option>
                                    </select>
                                  </div>
                                    <input type="text" name="SUMBER_PENDAPATAN_LAIN" maxlength="40" size="30" value="<?php echo $REK->SUMBER_PENDAPATAN_LAIN; ?>" id="fund1" class="required" style="<?php echo ($REK->SUMBER_PENDAPATAN_LAIN)?'':'display: none;'; ?>">
                                </td>
                            </tr>
                            <?php
                              if($_GET){
                                ?>
                                <input type="hidden" name="REK_ID" value="<?php echo $REK->REK_ID; ?>"/>
                                <?php
                              }
                            ?>
                        </tbody>
                    </table>
                </div>

                <div class="box-btn">
                    <a href="" id="submitRegistration" class="btn btn-yellow">Kirim</a>
                </div>
            </form>
        </div>
    </div>
</section>
<script>
  jQuery('select[name=KEWARGANEGARAAN]').change(function(){
            if(jQuery(this).val() == 'WNI'){
              jQuery('select[name=NEGARA] option').prop('disabled',true);
              jQuery('select[name=NEGARA] option')
              jQuery('select[name=NEGARA] option[value=Indonesia]').prop('disabled',false);
              jQuery('select[name=NEGARA]').val('Indonesia');             
          jQuery('select[name=NEGARA].selectpicker').selectpicker('refresh');
            }else{
              jQuery('select[name=NEGARA] option').prop('disabled',false);
              jQuery('select[name=NEGARA]').val('');
              jQuery('select[name=NEGARA].selectpicker').selectpicker('refresh');
            }
          })
</script>