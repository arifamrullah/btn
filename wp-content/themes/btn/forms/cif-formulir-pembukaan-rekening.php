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
// require '../captcha/rand.php';
?>

<section id="form-cif-formulir-simpanan">
    <div class="container">
        <div class="headline">
            <div class="icon-form">
                <i class="fa fa-file-text-o"></i>
            </div>
            <h2>FORMULIR PERMOHONAN PEMBUKAAN REKENING SIMPANAN</h2>
        </div>
        <div class="row">
            <div class="form-child">
              <form id="formRegistrasiSimpanan" class="form-horizontal">                
                <div class="data-diri">
                  <input type="hidden" name="id_produk" value="<?php echo $jenis_produk->ID_PRODUCT; ?>">
                    <!--Check Jenis Tabungan-->
                    <?php if ( implode( '_', $jenis_tabungan ) == "tabungan_haji_nawaitu" ) { ?>
                    <?php // if($jenis_produk->SLUG == "tabungan_haji_nawaitu"){ ?>
                    <h3>Khusus Pembukaan Rekening Haji Nawaitu</h3>
                    <table class="table">
                      <tbody>
                        <tr> 
                          <td width="40%" class="tdganjil"><strong>Apakah Anda Menghendaki Jasa Tabungan</strong><span>*</span></td>
                          <td width="60%" class="tdgenap">
                            <div class="select-style">
                              <select name="jasa_tabungan" class="required">
                                <option value="">--Pilih--</option>
                                <option value="Ya">Ya</option>
                                <option value="Tidak">Tidak</option>
                              </select>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td width="40%" class="tdganjil"><strong>Tahun Keberangkatan</strong><span>*</span></td>
                          <td width="60%" class="tdgenap">
                            <input type="text" name="tahun_keberangkatan" maxlength="4" size="20" value="" class="formField number_only required">
                          </td>
                        </tr>
                        <tr>
                          <td width="40%" class="tdganjil"><strong>Wilayah Keberangkatan</strong><span>*</span></td>
                          <td width="60%" class="tdgenap">
                            <input type="text" name="wilayah_keberangkatan" maxlength="255" size="65" value="" class="formField required upper" placeholder="diisi dengan daerah domisili sesuai KTP">
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <?php } ?>

                    <!--Check Jenis Tabungan-->
                    <?php if ( implode( '_', $jenis_tabungan ) == "penggantian_kartu_btn" ) { ?>
                    <?php // if($jenis_produk->SLUG == "penggantian_kartu"){ ?>
                    <h3>Khusus Penggantian Kartu BTN</h3>
                    <table class="table">
                      <tbody>
                        <tr> 
                          <td width="40%" class="tdganjil"><strong>Alasan Penggantian Kartu</strong><span>*</span></td>
                          <td width="60%" class="tdgenap">
                            <div class="select-style">
                              <select name="alasan_penggantian_kartu" class="required">
                                <option value="">--Pilih--</option>
                                <option value="hilang">Karena Hilang</option>
                                <option value="rusak">Karena Rusak</option>
                                <option value="lainnya">Lainnya</option>
                              </select>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <?php } ?>

                    <h3>DATA NASABAH</h3>
                    <?php if ( implode( '_', $jenis_tabungan ) == "penggantian_kartu_btn" ) { ?> 
                    <table class="table">
                        <tbody>  
                          <tr>
                              <td width="40%" class="tdganjil"><strong>Nama Lengkap</strong><span>*</span></td>
                              <td width="60%" class="tdgenap">
                                <input type="text" name="nama_lengkap_nasabah" maxlength="255" size="65" value="" class="formField required upper" onkeypress="return nameAppValidate(event,this.value)">
                              </td>
                          </tr>
                          <tr>
                              <td width="40%" class="tdganjil"><strong>No. Rekening</strong><span>*</span></td>
                              <td width="60%" class="tdgenap">
                                <input type="text" name="no_rekening_nasabah"  maxlength="255" size="65" value="" class="formField number_only required">
                              </td>
                          </tr>
                        </tbody>
                    </table>
                    <?php } else { ?>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>No. CIF</strong></td>
                                <td width="60%" class="tdgenap"><input type="text" name="no_cif_nasabah" maxlength="255" size="65" readonly="true" value="" class="formField number_only" placeholder="Akan diisi oleh pihak Bank"></td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Nama Lengkap</strong><span>*</span></td>
                                <td width="60%" class="tdgenap">
                                  <input type="text" name="nama_lengkap_nasabah" maxlength="255" size="65" value="" class="formField required upper" onkeypress="return nameAppValidate(event,this.value)">
                                </td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>No. Rekening</strong></td>
                                <td width="60%" class="tdgenap"><input type="text" name="no_rekening_nasabah" id="NoRekNasabah" readonly="true" maxlength="255" size="65" value="" class="formField number_only" placeholder="Akan diisi oleh pihak Bank"></td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Sumber Dana</strong><span>*</span></td>
                                <td width="60%" class="tdgenap">
                                <div class="row">
                                  <div class="col-sm-6">
                                    <div class="select-style">
                                      <select name="SUMBER_DANA" class="required" id="sumber_dana">
                                        <option value="">--Pilih--</option>
                                        <option value="Hasil Usaha">Hasil Usaha</option>
                                        <option value="Penghasilan" selected>Penghasilan</option>
                                        <option value="Jual Beli">Jual Beli</option>
                                        <option value="Warisan">Warisan</option>
                                        <option value="lainnya">Lainnya</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <input type="text" maxlength="50" name="SUMBER_DANA_LAIN" id="sumber_dana_lainnya" value="" class="formField upper">
                                  </div>
                                </div>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Sumber Dana Tambahan, Jika Ada</strong></td>
                                <td width="60%" class="tdgenap">
                                <div class="row">
                                  <div class="col-sm-6">
                                    <div class="select-style">
                                      <select name="SUMBER_DANA_TBHN" id="sumber_dana_tambahan">
                                        <option value="">--Pilih--</option>
                                        <option value="Investasi" selected>Investasi</option>
                                        <option value="Komisi">Komisi</option>
                                        <option value="Warisan">Warisan</option>
                                        <option value="lainnya">Lainnya</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <input type="text" maxlength="50" name="SUMBER_DANA_TBHN_LAIN" id="sumber_dana_tambahan_lainnya" value="" class="formField upper">
                                  </div>
                                </div>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Jenis Setoran</strong><span>*</span></td>
                                <td width="60%" class="tdgenap">
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="select-style">
                                      <select name="JENIS_SETORAN" id="jenis_setoran" class="required">
                                        <option value="">--Pilih--</option>
                                        <option value="Tunai" selected>Tunai</option>
                                        <option value="PemindahBukuan">PemindahBukuan</option>
                                        <option value="Transfer">Transfer</option>
                                        <option value="lainnya">Lainnya</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <input type="text" maxlength="50" id="jenis_setoran_lainnya" name="JENIS_SETORAN_LAIN" value="" class="formField upper" >
                                  </div>
                                </div>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Tujuan Pembukaan</strong><span>*</span></td>
                                <td width="60%" class="tdgenap">
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="select-style">
                                      <select name="TUJUAN_PEMBUKAAN" id="tujuan_buka_rek" class="required">
                                        <option value="">--Pilih--</option>
                                        <option value="Menabung" selected>Menabung</option>
                                        <option value="Investasi/Usaha">Investasi/Usaha</option>
                                        <option value="Persyaratan Kredit">Persyaratan Kredit</option>
                                        <option value="lainnya">Lainnya</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <input type="text" maxlength="50" id="tujuan_pembukaan_lain" name="TUJUAN_PEMBUKAAN_LAIN" value="" class="formField upper">
                                  </div>
                                </div>
                            </tr>
                             <tr>
                                <td width="40%" class="tdganjil"><strong>Alasan Pembukaan</strong><span>*</span></td>
                                <td width="60%" class="tdgenap">
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="select-style">
                                      <select name="ALASAN_PEMBUKAAN" id="alasan_membuka_rekening_btn" class="required">
                                        <option value="">--Pilih--</option>
                                        <option value="Bunga">Bunga</option>
                                        <option value="Hadiah">Hadiah</option>
                                        <option value="Syarat Kredit">Syarat Kredit</option>
                                        <option value="ATM">ATM</option>
                                        <option value="Lokasi">Lokasi</option>
                                        <option value="Layanan" selected>Layanan</option>
                                        <!-- <option value="lainnya">Lainnya</option> -->
                                      </select>
                                    </div>
                                  </div>
                                 <!--  <div class="col-md-6">
                                    <input type="text" maxlength="50" id="alasan_membuka_rekening_lainnya" name="alasan_membuka_rekening_lainnya"  value="" class="formField upper" >
                                  </div> -->
                                </div>
                            </tr>
                        </tbody>
                    </table>
                    <?php } ?>
                    
                    <?php if ( $jenis_produk->ATM_SMS == 1 ) : ?>
                    <h3>FITUR/FASILITAS YANG DIINGINKAN</h3>
                    <table class="table">
                        <tr>
                          <td width="100%" class="tdgenap">
                              <div id="fitur_fasilitas" class="row">
                                <div class="col-sm-6">
                                  <label><input type="checkbox" name="fitur[]" value="Kartu ATM_PIN"> Kartu ATM/PIN</label></br>
                                  <label><input type="checkbox" name="fitur[]" value="Kartu BTN INSTAN_PIN" checked> Kartu BTN INSTAN/PIN</label></br>
                                </div>
                                <div class="col-sm-6">
                                  <label><input type="checkbox" name="fitur[]" value="SMS BATARA"> SMS BATARA</label></br>
                                  <label><input type="checkbox" name="fitur[]" value="INTERNET BANKING"> INTERNET BANKING</label></br>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-sm-12">
                                  <label>Nama Pada Kartu<span>*</span> : </label>&nbsp; <input type="text" name="nama_pada_kartu" size="70" maxlength="255" class="formField upper required" onkeypress="return nameKartuVlidate(event,this.value)">
                                </div>
                              </div>
                          </td>
                        </tr>
                    </table>

                  <?php endif ?>

                    <!--Check Jenis Tabungan-->
                    <?php if ( in_array( 'deposito', $jenis_tabungan ) && !in_array( 'sertifikat', $jenis_tabungan ) ) { ?>
                    <h3>KHUSUS DEPOSITO</h3>
                    <table class="table">
                      <tbody>
                        <tr>
                          <td width="40%" class="tdganjil"><strong>Jumlah Nominal</strong><span>*</span></td>
                          <td width="60%" class="tdgenap">
                            <input type="text" name="jumlah_nominal_deposito" id="jumlah_nominal_deposito" maxlength="255" size="65" value="" class="formField required number_only autonumericDec">
                          </td>
                        </tr>
                        <tr>
                          <td width="40%" class="tdganjil"><strong>Terbilang</strong></td>
                          <td width="60%" class="tdgenap"><textarea name="terbilang" readonly="true" maxlength="255"  value="" class="form-control required upper"></textarea></td>
                        </tr>
                        <tr>
                          <td width="40%" class="tdganjil"><strong>Mata Uang</strong><span>*</span></td>
                          <td width="60%" class="tdgenap">
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="select-style">
                                <select name="mata_uang" class="required">
                                  <option value="">--Pilih--</option>
                                  <option value="Rupiah">Rupiah</option>
                                  <option value="Valuta Asing">Valuta Asing</option>
                                </select>
                              </div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td width="40%" class="tdganjil"><strong>Jangka Waktu</strong><span>*</span></td>
                          <td width="60%" class="tdgenap">
                            <div class="row">
                              <div class="col-md-6">
                                <div class="select-style">
                                  <select name="jangka_waktu" id="jangka_waktu" class="required">
                                    <option value="">--Pilih--</option>
                                    <option value="hari">Hari</option>
                                    <option value="1 Bulan">1 Bulan</option>
                                    <option value="3 Bulan">3 Bulan</option>
                                    <option value="8 Bulan">8 Bulan</option>
                                    <option value="12 Bulan">12 Bulan</option>
                                    <option value="24 Bulan">24 Bulan</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <label id="jangka_waktu_hari"><input type="text" maxlength="255"  name="jangka_waktu_hari"  value="" class="formField number_only" > Hari</label>
                              </div>
                            </div>
                            
                          </td>
                        </tr>
                        <tr>
                          <td width="40%" class="tdganjil"><strong>Suku Bunga</strong></td>
                          <td width="60%" class="tdgenap">
                            <div class="row">
                              <div class="col-sm-12">
                                <input type="text" name="suku_bunga" maxlength="255" readonly="true" placeholder="Akan diisi oleh pihak Bank" value="" class="formField number_only"> <label>%PA</label>
                              </div>
                            </div>
                            <div class="row"></div>
                              <div class="col-sm-12">
                                <div class="col-sm-4">
                                  <label>Perpanjangan:<span>*</span> </label>
                                </div>
                                <div class="col-sm-8">
                                  <div class="select-style">
                                    <select name="perpanjangan" class="required">
                                      <option value="">--Pilih--</option>
                                      <option value="Otomatis">Otomatis</option>
                                      <option value="Tidak Otomatis">Tidak Otomatis</option>
                                    </select>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td width="40%" class="tdganjil"><strong>Cara Pembayaran Bunga</strong><span>*</span></td>
                          <td width="60%" class="tdgenap">
                            <div class="row">
                              <div class="col-sm-12">
                                <div class="select-style">
                                  <select name="cara_pembayaran_bunga" id="cara_bayar" class="required">
                                    <option value="">--Pilih--</option>
                                    <option value="Tunai">Tunai</option>
                                    <option value="Kapitalis Ke Pokok">Kapitalis Ke Pokok</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-sm-12">
                                <label><input type="checkbox" name="pemindahbukuan" value="1">PemindahBukuan</label><br/>
                                <input type="text" maxlength="255"  value="" name="pemindahbukuan_ke_rek" class="formField number_only" placeholder="No Rek PemindahBukuan Tujuan">
                              </div>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <?php } ?>

                    <!--Check Jenis Tabungan-->
                    <?php //if ($jenis_produk->CATEGORY == 'sertifikat') { ?>
                    <?php if ( in_array( 'sertifikat', $jenis_tabungan ) && in_array( 'deposito', $jenis_tabungan ) ) { ?>
                    <h3>KHUSUS SERTIFIKAT DEPOSITO</h3>
                        <table class="table input_fields_wrap" id="sertifikat_deposito">
                          <tbody>
                            <tr>
                              <td>DENOMINAL</td>
                              <td>LEMBAR</td>
                              <td width="10%"><small><a href="javascript:void(0)" class="add_field_button btn btn-primary">Add More </a></small></td>
                            </tr>
                            <tr>
                              <td><input type="text" maxlength="255" name="denominal[]"  value="" class="form-control required number_only"></td>
                              <td><input type="text" maxlength="255" name="lembar[]" value="" class="form-control required number_only"></td>
                              <td></td>
                            </tr>
                          </tbody>
                        </table>
                        <p>Demikian permohonan ini diajukan dan dengan ini kami menyatakan bahwa kami tunduk pada ketentuan-ketentuan yang berlaku di Bank BTN</p>
                    <?php } ?>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p class="pull-right">*) Wajib Diisi</p>
                    </div>
                </div>
                  
                <div class="box-btn">
                  <?php if ( $jenis_produk->ATM_SMS == 1 ) { ?>
                    <a href="" class="btn btn-blue">Batal</a>
                    <a href="javascript:void(0)" id="validateFormSimpanan" class="btn btn-yellow next">Next</a>
                  <?php } else { ?>
                    <div id="captchaimage"><a href="javascript:void(0)" id="refreshimg" title="Click to refresh image"><img src="<?php echo get_template_directory_uri();?>/inc/captcha/image.php?token=<?php echo btn_ajax_create_captcha() ?>" width="132" height="46" alt="Captcha image"></a></div>
                    <label for="captcha">Enter the characters as seen on the image above (case insensitive):</label>
                    <input type="text" maxlength="6" name="captcha" id="captcha" class="captcha required">
                    </br></br>
                    <a href="" class="btn btn-blue">Batal</a>
                    <a href="javascript:void(0)" id="SubmitProsesCifRegistrasiNonAtm" class="btn btn-success">Save</a>
                  <?php } ?>
                </div> 
                <div class="progress" style="display:none;">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                    Please Wait ...
                  </div>
                </div>                  
              </div>
            </form>
        </div>
    </div>
</section>