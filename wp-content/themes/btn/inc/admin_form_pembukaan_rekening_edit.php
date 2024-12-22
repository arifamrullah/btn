<?php
 // -- left JOIN btn_sertifikat_deposito as btn_sertifikat
 //                -- ON btn_simpanan.id = btn_sertifikat.id_form_simpanan
global $wpdb;
$reg_sql = "SELECT btn_simpanan.*,btn_product.*
                FROM btn_form_simpanan as btn_simpanan
                left JOIN btn_product as btn_product
                ON btn_simpanan.id_produk = btn_product.ID_PRODUCT
                WHERE btn_simpanan.id =".$_GET['edit'];
$items = $wpdb->get_results($reg_sql,OBJECT);
foreach ($items as $data)
  $jenis_produks = explode(' ', strtolower($data->NAME));
  $jenis_produk = implode('_',$jenis_produks);
?>

<section id="form-cif-formulir-simpanan" style="padding:0">
    <div class="container" style="width: inherit;">
        <div class="headline">
            <div class="icon-form">
                <i class="fa fa-file-text-o"></i>
            </div>
            <h2>FORMULIR PERMOHONAN PEMBUKAAN REKENING SIMPANAN</h2>
        </div>
        <div class="row">
            <div class="form-child" style="max-width: 95%;margin: 0 auto;padding: 0;">
              <form id="formRegistrasiSimpanan" class="form-horizontal">                
                <div class="data-diri">
                  <input type="hidden" name="id" value="<?php echo $data->id; ?>">
                    <!--Check Jenis Tabungan-->
                    <?php //if($jenis_produk == "tabungan_haji_nawaitu"){ ?>
                    <h3>Khusus Pembukaan Rekening Haji Nawaitu</h3>
                    <table class="table">
                      <tbody>
                        <tr> 
                          <td width="40%" class="tdganjil"><strong>Apakah Anda Menghendaki Jasa Tabungan</strong></td>
                          <td width="60%" class="tdgenap">
                            <div class="select-style">
                              <select name="jasa_tabungan" class="required">
                                <option value="">--Pilih--</option>
                                <option value="Ya" <?php echo (@$data->menghendaki_jasa_tabungan=='Ya')?'selected':'' ?>>Ya</option>
                                <option value="Tidak" <?php echo (@$data->menghendaki_jasa_tabungan=='Tidak')?'selected':'' ?>>Tidak</option>
                              </select>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td width="40%" class="tdganjil"><strong>Tahun Keberangkatan</strong></td>
                          <td width="60%" class="tdgenap"><input type="text" name="tahun_keberangkatan" maxlength="4"  value="<?php echo @$data->tahun_berangkat; ?>" class="form-control number_only required"></td>
                        </tr>
                        <tr>
                          <td width="40%" class="tdganjil"><strong>Wilayah Keberangkatan</strong></td>
                          <td width="60%" class="tdgenap"><input type="text" name="wilayah_keberangkatan" maxlength="255"  value="<?php echo @$data->wilayah_berangkat; ?>" class="form-control required" placeholder="diisi dengan daerah domisili sesuai KTP"></td>
                        </tr>
                      </tbody>
                    </table>
                    <?php //} ?>

                    <!--Check Jenis Tabungan-->

                    <?php // if($jenis_produk == "penggantian_kartu"){ ?>
                    <h3>Khusus Penggantian Kartu BTN</h3>
                    <table class="table">
                      <tbody>
                        <tr>
                          <td width="40%" class="tdganjil"><strong>Alasan Penggantian Kartu</strong></td> 
                          <td width="60%" class="tdgenap">
                            <div class="select-style">
                              <select name="alasan_penggantian_kartu" class="required">
                                <option value="">--Pilih--</option>
                                <option value="hilang" <?php echo (@$data->alasan_penggantian_kartu=='hilang')?'selected':'' ?>>Karena Hilang</option>
                                <option value="rusak" <?php echo (@$data->alasan_penggantian_kartu=='rusak')?'selected':'' ?>>Karena Rusak</option>
                                <option value="lainnya" <?php echo (@$data->alasan_penggantian_kartu=='lainnya')?'selected':'' ?>>Lainnya</option>
                              </select>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <?php// } ?>

                    <h3>DATA NASABAH</h3>
                    <table class="table">
                        <tbody>                            
                            <tr>
                                <td width="40%" class="tdganjil"><strong>No. CIF</strong></td>
                                <td width="60%" class="tdgenap"><input type="text" name="no_cif_nasabah" maxlength="255" value="<?php echo @$data->no_cif ?>" class="form-control number_only required" placeholder="Akan diisi oleh pihak Bank"></td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Nama Lengkap</strong></td>
                                <td width="60%" class="tdgenap"><input type="text" name="nama_lengkap_nasabah" maxlength="255"  value="<?php echo @$data->nama_lengkap ?>" class="form-control required upper" onkeypress="return nameAppValidate(event,this.value)"></td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>No. Rekening</strong></td>
                                <td width="60%" class="tdgenap"><input type="text" name="no_rekening_nasabah" maxlength="255"  value="<?php echo @$data->no_rekening ?>" class="form-control number_only" placeholder="Akan diisi oleh pihak Bank"></td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Sumber Dana Untuk Pembukaan Rekening</strong></td>
                                <td width="60%" class="tdgenap">
                                <div class="row">
                                  <div class="col-sm-12">
                                    <div class="select-style">
                                      <select name="sumber_dana" class="required" id="sumber_dana">
                                        <option value="">--Pilih--</option>
                                        <option value="Hasil Usaha" <?php echo (@$data->sumber_dana == 'Hasil Usaha')?'selected':''?>>Hasil Usaha</option>
                                        <option value="Penghasilan" <?php echo (@$data->sumber_dana == 'Penghasilan')?'selected':''?>>Penghasilan</option>
                                        <option value="Jual Beli" <?php echo (@$data->sumber_dana == 'Jual Beli')?'selected':''?>>Jual Beli</option>
                                        <option value="Warisan" <?php echo (@$data->sumber_dana == 'Warisan')?'selected':''?>>Warisan</option>
                                        <option value="lainnya" <?php echo (@$data->sumber_dana == 'lainnya')?'selected':''?>>Lainnya</option>
                                      </select>
                                    </div>
                                    <input type="text" maxlength="255" name="sumber_dana_lainnya" id="sumber_dana_lainnya" value="<?php echo @$data->sumber_dana; ?>" class="formField" >
                                  </div>
                                </div>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Sumber Dana Tambahan, Jika Ada</strong></td>
                                <td width="60%" class="tdgenap">
                                <div class="row">
                                  <div class="col-sm-12">
                                    <div class="select-style">
                                      <select name="sumber_dana_tambahan" id="sumber_dana_tambahan">
                                        <option value="">--Pilih--</option>
                                        <option value="Investasi" <?php echo (@$data->sumber_dana_tambahan == 'Investasi')?'selected':''?>>Investasi</option>
                                        <option value="Komisi" <?php echo (@$data->sumber_dana_tambahan == 'Komisi')?'selected':''?>>Komisi</option>
                                        <option value="Warisan" <?php echo (@$data->sumber_dana_tambahan == 'Warisan')?'selected':''?>>Warisan</option>
                                        <option value="lainnya" <?php echo (@$data->sumber_dana_tambahan == 'lainnya')?'selected':''?>>Lainnya</option>
                                      </select>
                                    </div>
                                    <input type="text" maxlength="255" name="sumber_dana_tambahan_lainnya" id="sumber_dana_tambahan_lainnya" value="<?php echo @$data->sumber_dana_tambahan; ?>" class="formField" >
                                  </div>
                                </div>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Jenis Setoran Untuk Pembukaan Rekening</strong></td>
                                <td width="60%" class="tdgenap">
                                <div class="row">
                                  <div class="col-sm-12">
                                    <div class="select-style">
                                      <select name="jenis_setoran" id="jenis_setoran" class="required">
                                        <option value="">--Pilih--</option>
                                        <option value="Tunai" <?php echo (@$data->jenis_setoran == 'Tunai')?'selected':''?>>Tunai</option>
                                        <option value="PemindahBukuan" <?php echo (@$data->jenis_setoran == 'PemindahBukuan')?'selected':''?>>PemindahBukuan</option>
                                        <option value="Transfer" <?php echo (@$data->jenis_setoran == 'Transfer')?'selected':''?>>Transfer</option>
                                        <option value="lainnya" <?php echo (@$data->jenis_setoran == 'lainnya')?'selected':''?>>Lainnya</option>
                                      </select>
                                    </div>
                                    <input type="text" maxlength="255" id="jenis_setoran_lainnya" name="jenis_setoran_lainnya"  value="<?php echo @$data->jenis_setoran; ?>" class="formField" >
                                  </div>
                                </div>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Tujuan Pembukaan Rekening</strong></td>
                                <td width="60%" class="tdgenap">
                                <div class="row">
                                  <div class="col-sm-12">
                                    <div class="select-style">
                                      <select name="tujuan_pembukaan_rekening" id="tujuan_buka_rek" class="required">
                                        <option value="">--Pilih--</option>
                                        <option value="Menabung" <?php echo (@$data->tujuan_buka_rekening == 'Menabung')?'selected':''?>>Menabung</option>
                                        <option value="Investasi/Usaha" <?php echo (@$data->tujuan_buka_rekening == 'Investasi/Usaha')?'selected':''?>>Investasi/Usaha</option>
                                        <option value="Persyaratan Kredit" <?php echo (@$data->tujuan_buka_rekening == 'Persyaratan Kredit')?'selected':''?>>Persyaratan Kredit</option>
                                        <option value="lainnya" <?php echo (@$data->tujuan_buka_rekening == 'lainnya')?'selected':''?>>Lainnya</option>
                                      </select>
                                    </div>
                                    <input type="text" maxlength="255" id="tujuan_buka_rek_lainnya" name="tujuan_buka_rek_lainnya"  value="<?php echo @$data->tujuan_pembukaan_rekening; ?>" class="formField" >
                                  </div>
                                </div>
                            </tr>
                             <tr>
                                <td width="40%" class="tdganjil"><strong>Alasan Membuka Rekening Di Bank BTN</strong></td>
                                <td width="60%" class="tdgenap">
                                <div class="row">
                                  <div class="col-sm-12">
                                    <div class="select-style">
                                      <select name="alasan_membuka_rekening_btn" id="alasan_membuka_rekening_btn" class="required">
                                        <option value="">--Pilih--</option>
                                        <option value="Bunga" <?php echo (@$data->alasan_buka_rekening == 'Bunga')?'selected':''?>>Bunga</option>
                                        <option value="Hadiah" <?php echo (@$data->alasan_buka_rekening == 'Hadiah')?'selected':''?>>Hadiah</option>
                                        <option value="Syarat Kredit" <?php echo (@$data->alasan_buka_rekening == 'Syarat Kredit')?'selected':''?>>Syarat Kredit</option>
                                        <option value="ATM" <?php echo (@$data->alasan_buka_rekening == 'ATM')?'selected':''?>>ATM</option>
                                        <option value="Lokasi" <?php echo (@$data->alasan_buka_rekening == 'Lokasi')?'selected':''?>>Lokasi</option>
                                        <option value="Layanan" <?php echo (@$data->alasan_buka_rekening == 'Layanan')?'selected':''?>>Layanan</option>
                                        <option value="lainnya" <?php echo (@$data->alasan_buka_rekening == 'lainnya')?'selected':''?>>Lainnya</option>
                                      </select>
                                    </div>
                                    <input type="text" maxlength="255" id="alasan_membuka_rekening_lainnya" name="alasan_membuka_rekening_lainnya"  value="<?php echo @$data->alasan_buka_rekening; ?>" class="formField" >
                                  </div>
                                </div>
                            </tr>
                        </tbody>
                    </table>
                    <?php //} ?>
                    
                    <?php if ($data->ATM_SMS == 1): ?>
                    <h3>FITUR/FASILITAS YANG DIINGINKAN</h3>
                    <table class="table">
                        <tr>
                          <td width="100%" class="tdgenap">
                             <div class="row">
                                <?php
                                  $fiturs = json_decode($data->fitur);
                                ?>
                                <div class="col-sm-6">
                                  <label><input type="checkbox" name="fitur[]" value="Kartu ATM_PIN" <?php echo (in_array('Kartu ATM_PIN', $fiturs))?'checked':''; ?>> Kartu ATM/PIN</label></br>
                                  <label><input type="checkbox" name="fitur[]" value="Kartu BTN INSTAN_PIN" <?php echo (in_array('Kartu BTN INSTAN_PIN', $fiturs))?'checked':''; ?>> Kartu BTN INSTAN/PIN</label></br>  
                                </div>
                                <div class="col-sm-6">
                                  <label><input type="checkbox" name="fitur[]" value="SMS BATARA" <?php echo (in_array('SMS BATARA', $fiturs))?'checked':''; ?>> SMS BATARA</label></br>
                                  <label><input type="checkbox" name="fitur[]" value="INTERNET BANKING" <?php echo (in_array('INTERNET BANKING', $fiturs))?'checked':''; ?>> INTERNET BANKING</label></br>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-sm-12">
                                  <label>Nama Pada Kartu : </label> <input type="text" class="form-control upper" onkeypress="return nameKartuVlidate(event,this.value)" name="nama_pada_kartu" maxlength="255"  value="<?php echo @$data->nama_pada_kartu; ?>">
                                </div>
                              </div>
                          </td>
                        </tr>
                    </table>

                  <?php endif ?>

                    <!--Check Jenis Tabungan-->
                    <?php //if ($jenis_produk->CATEGORY == 'deposito' || $jenis_produk->CATEGORY == 'sertifikat') { ?>
                    <h3>KHUSUS DEPOSITO</h3>
                    <table class="table">
                      <tbody>
                        <tr>
                          <td width="40%" class="tdganjil"><strong>Jumlah Nominal</strong></td>
                          <td width="60%" class="tdgenap"><input type="text" name="jumlah_nominal_deposito" id="jumlah_nominal_deposito" maxlength="255"  value="<?php echo @$data->jumlah_nominal; ?>" class="form-control required number_only autonumericDec"></td>
                        </tr>
                        <tr>
                          <td width="40%" class="tdganjil"><strong>Terbilang</strong></td>
                          <td width="60%" class="tdgenap"><textarea name="terbilang" readonly="true" maxlength="255" class="form-control required"><?php echo @$data->terbilang; ?></textarea></td>
                        </tr>
                        <tr>
                          <td width="40%" class="tdganjil"><strong>Mata Uang</strong></td>
                          <td width="60%" class="tdgenap">
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="select-style">
                                <select name="mata_uang" class="required">
                                  <option value="">--Pilih--</option>
                                  <option value="Rupiah" <?php echo (@$data->mata_uang == 'Rupiah')?'selected':''; ?>>Rupiah</option>
                                  <option value="Valuta Asing" <?php echo (@$data->mata_uang == 'Valuta Asing')?'selected':''; ?>>Valuta Asing</option>
                                </select>
                              </div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td width="40%" class="tdganjil"><strong>Jangka Waktu</strong></td>
                          <td width="60%" class="tdgenap">
                            <div class="row">
                              <div class="col-sm-12">
                                <div class="select-style">
                                  <select name="jangka_waktu" id="jangka_waktu" class="required">
                                    <option value="">--Pilih--</option>
                                    <option value="hari" <?php echo (@$data->jangka_waktu == 'hari')?'selected':''; ?>>Hari</option>
                                    <option value="1 Bulan" <?php echo (@$data->jangka_waktu == '1 Bulan')?'selected':''; ?>>1 Bulan</option>
                                    <option value="3 Bulan" <?php echo (@$data->jangka_waktu == '3 Bulan')?'selected':''; ?>>3 Bulan</option>
                                    <option value="8 Bulan" <?php echo (@$data->jangka_waktu == '8 Bulan')?'selected':''; ?>>8 Bulan</option>
                                    <option value="12 Bulan" <?php echo (@$data->jangka_waktu == '12 Bulan')?'selected':''; ?>>12 Bulan</option>
                                    <option value="24 Bulan" <?php echo (@$data->jangka_waktu == '24 Bulan')?'selected':''; ?>>24 Bulan</option>
                                  </select>
                                </div>
                                <label id="jangka_waktu_hari"><input type="text" maxlength="255"  name="jangka_waktu_hari"  value="<?php echo @$data->jangka_waktu_hari ?>" class="formField" > Hari</label>
                              </div>
                            </div>
                            
                          </td>
                        </tr>
                        <tr>
                          <td width="40%" class="tdganjil"><strong>Suku Bunga</strong></td>
                          <td width="60%" class="tdgenap">
                            <div class="row">
                              <div class="col-sm-12">
                                <input type="text" name="suku_bunga" maxlength="255" placeholder="Akan diisi oleh pihak Bank" value="<?php echo @$data->suku_bunga ?>" class="formField number_only"> <label>%PA</label>
                              </div>
                            </div>
                            <div class="row"></div>
                              <div class="col-sm-12">
                                <div class="col-sm-4">
                                  <label>Perpanjangan: </label>
                                </div>
                                <div class="col-sm-8">
                                  <div class="select-style">
                                    <select name="perpanjangan" class="required">
                                      <option value="">--Pilih--</option>
                                      <option value="Otomatis" <?php echo (@$data->perpanjangan == 'Otomatis')?'selected':''; ?>>Otomatis</option>
                                      <option value="Tidak Otomatis" <?php echo (@$data->perpanjangan == 'Tidak Otomatis')?'selected':''; ?>>Tidak Otomatis</option>
                                    </select>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td width="40%" class="tdganjil"><strong>Cara Pembayaran Bunga</strong></td>
                          <td width="60%" class="tdgenap">
                            <div class="row">
                              <div class="col-sm-12">
                                <div class="select-style">
                                  <select name="cara_pembayaran_bunga" id="cara_bayar">
                                    <option value="">--Pilih--</option>
                                    <option value="Tunai" <?php echo (@$data->cara_pembayaran_bunga == 'Tunai')?'selected':''; ?>>Tunai</option>
                                    <option value="Kapitalis Ke Pokok" <?php echo (@$data->cara_pembayaran_bunga == 'Kapitalis Ke Pokok')?'selected':''; ?>>Kapitalis Ke Pokok</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-sm-12">
                                <label><input type="checkbox" name="pemindahbukuan" value="1" <?php echo (@$data->pemindahbukuan == '1')?'checked':''; ?>>PemindahBukuan</label><br/>
                                <input type="text" maxlength="255"  value="<?php echo @$data->pemindahbukuan_ke_rek ?>" name="pemindahbukuan_ke_rek" class="formField number_only" placeholder="No Rek PemindahBukuan Tujuan">
                              </div>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <?php //} ?>
                    <!--Check Jenis Tabungan-->
                    <?php //if ($jenis_produk->CATEGORY == 'sertifikat') { ?>
                    <h3>KHUSUS SERTIFIKAT DEPOSITO</h3>
                        <table class="table input_fields_wrap" id="sertifikat_deposito">
                          <tbody>
                            <tr>
                              <td>DENOMINAL</td>
                              <td>LEMBAR</td>
                              <!-- <td width="10%"><small><a href="javascript:void(0)" class="add_field_button btn btn-primary">Add More </a></small></td> -->
                            </tr>
                             <?php  
                                global $wpdb;
                                $reg_sql2 = "SELECT * FROM btn_sertifikat_deposito WHERE id_form_simpanan=".@$data->id;
                                $sertifikat = $wpdb->get_results($reg_sql2);
                                foreach ($sertifikat as $res_sertifikat) {
                              ?>
                            <tr>
                              <input type="hidden" size="15" name="id_sertifikat[]" value="<?php echo @$res_sertifikat->id; ?>">
                              <td><input type="text" class="form-control" maxlength="255" name="denominal[]"  value="<?php echo @$res_sertifikat->denominal ?>" class="formField required"></td>
                              <td><input type="text" class="form-control" maxlength="255" name="lembar[]" value="<?php echo @$res_sertifikat->lembar ?>" class="formField required"></td>
                            </tr>
                            <?php } ?> <!-- End Foreach -->
                          </tbody>
                        </table>
                    <?php //} ?>
                </div>
                  <div class="box-btn">
                    <a href="" class="btn btn-yellow">Batal</a>
                    <a href="javascript:void(0)" id="UpdateFormBukaRekening" class="btn btn-primary">Save</a>
                  </div>                 
              </div>
              </form>
        </div>
    </div>
</section>
