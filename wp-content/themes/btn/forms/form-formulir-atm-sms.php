
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
// require "../captcha/rand.php";
?>
<input type="hidden" name="cif" value="global">
<section id="form-cif-formulir-aplikasi">
    <div class="container">
        <div class="headline">
            <div class="icon-form">
                <i class="fa fa-file-text-o"></i>
            </div>
            <h2>FORMULIR APLIKASI KARTU BTN DAN SMS BANKING</h2>
        </div>
        <div class="row">
            <div class="form-child" id="cifFormulirRekening">
              <form id="registrasiAtmSms" class="form-horizontal">
                <div class="data-diri">
                    <!-- <table class="table" style="display:none;">
                      <tbody>
                        <tr>
                          <td width="40%" class="tdganjil"><strong>Cabang</strong><span>*</span></td>
                          <td width="60%" class="tdgenap"> -->
                            <!-- <input type="text" name="cabang_aplikasi" maxlength="255" size="68" value="" class="formField upper"> -->
                            <!-- <div class="row">
                              <div class="col-md-5">
                                <div class="select-style">
                                  <select name="kota_id" class="select_v_kota required">
                                    <option value="">--Pilih Kota--</option>
                                    <?php// echo btn_get_city() ?>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-7">
                                <div class="select-style">
                                  <select name="cabang_aplikasi" class="selectpicker_v_cabang required">
                                    <option value="">--Pilih Cabang--</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td width="40%" class="tdganjil"><strong>Tanggal</strong><span>*</span></td>
                          <td width="60%" class="tdgenap">
                              <div id="datetimepicker2" class="input-append date">
                                <input name="tanggal_aplikasi" data-format="dd/MM/yyyy" type="text" class="required input_tanggal number_only"></input>
                                <span class="add-on"><i class="fa fa-calendar"></i></span>
                                &nbsp;<small>dd/mm/yyyy</small>
                              </div>
                          </td>
                        </tr>
                      </tbody>
                    </table> -->
                    <table class="table">
                        <tbody>
                            <tr>
                              <td width="40%" class="tdganjil"><strong>Nama Lengkap</strong><span>*</span></td>
                              <td width="60%" class="tdgenap">
                                <input type="text" maxlength="255" name="nama_lengkap_aplikasi" value="" size="68" class="formField required upper" onkeypress="return nameValidateAtm(event,this.value)">
                              </td>
                            </tr>
                            <tr>
                              <td width="40%" class="tdganjil"><strong>Tempat & Tanggal Lahir</strong><span>*</span></td>
                              <td width="60%" class="tdgenap">
                                <div class="row">
                                  <div class="col-sm-5">
                                    <input type="text" name="tempat_lahir_aplikasi" id="textonlyy" maxlength="255" size="27"  value="" class="formfield required upper">
                                  </div>
                                  <div class="col-sm-7">
                                    <div id="datetimepickerTglLahirApp" class="input-append date">
                                      <input name="tanggal_lahir_aplikasi" data-format="dd/MM/yyyy" type="text" class="required input_tanggal number_only"></input>
                                      <span class="add-on"><i class="fa fa-calendar"></i></span>
                                      &nbsp<small>dd/mm/yyyy</small>
                                    </div>
                                  </div>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td width="40%" class="tdganjil"><strong>Nama Gadis Ibu Kandung</strong><span>*</span></td>
                              <td width="60%" class="tdgenap">
                                <input type="text" maxlength="255" name="nama_gadis_ibu_kandung_aplikasi" size="68" value="" class="formField required upper" onkeypress="return nameValidateIbuAtm(event,this.value)">
                              </td>
                            </tr>
                            <tr>
                              <td width="40%" class="tdganjil"><strong>Alamat Lengkap</strong><span>*</span></td>
                              <td width="60%" class="tdgenap">
                                <input type="text" maxlength="255" name="alamat_lengkap_aplikasi" size="68" value="" class="formField required upper">
                              </td>
                            </tr>
                            <tr>
                              <td width="40%" class="tdganjil"><strong>No Telepon</strong><span>*</span></td>
                              <td width="60%" class="tdgenap">
                                <div class="row">
                                  <div class="col-sm-6"><label>Rumah: </label><input type="text" name="no_tlp_rumah_aplikasi" maxlength="255" size="28" value="" class="formfield required number_only phone"></div>
                                  <div class="col-sm-6"><label>Kantor: </label><input type="text" name="no_tlp_kantor_aplikasi" maxlength="255" size="29"  value="" class="formfield required number_only phone"></div>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td width="40%" class="tdganjil"><strong>No Handphone</strong><span>*</span></td>
                              <td width="60%" class="tdgenap">
                                <input type="text" maxlength="255" name="no_hp_aplikasi" size="68" value="" class="formField required number_only">
                              </td>
                            </tr>
                            <tr>
                              <td width="40%" class="tdganjil"><strong>Nomor Kartu BTN</strong><span>*</span></td>
                              <td width="60%" class="tdgenap">
                                <input type="text" maxlength="255" size="68" name="no_kartu_aplikasi" value="" class="formField required number_only">
                              </td>
                            </tr>
                            <tr>
                              <td width="40%" class="tdganjil"><strong>No CIF</strong><span>*</span></td>
                              <td width="60%" class="tdgenap">
                                <input type="text" maxlength="255" name="no_cif_aplikasi" size="68" value="" class="formField required">
                              </td>
                            </tr>
                        </tbody>
                    </table>

                    <?php
                      $display_atm = $display_sms = 'display:none';
                      if ( $_POST['jenis_fitur'] == 'atm' ) {
                        $display_atm = 'display:block';
                        $display_sms = 'display:none';
                      } elseif ( $_POST['jenis_fitur'] == 'sms' ) {
                        $display_atm = 'display:none';
                        $display_sms = 'display:block';
                      } else {
                        $display_atm = $display_sms = 'display:block';
                      }
                    ?>

                  <div style="<?php echo $display_atm; ?>">
                    <h3><input type="checkbox" name="kartu_btn" value="1"> Kartu BTN</h3>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td width="40%" class="tdganjil"><strong><input type="checkbox" name="kartu_baru" value="1">Kartu Baru</strong></td>
                            <td width="60%" class="tdgenap"><label>Nama Pada Kartu</label><span>*</span><input type="text" maxlength="255" name="nama_pada_kartu" size="51" value="" class="formField required upper" onkeypress="return nameKartuVlidate(event,this.value)"></td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong><input type="checkbox" name="penggantian_kartu" value="1">Penggantian Kartu Karena</strong></td>
                                <td width="60%" class="tdgenap">
                                  <div class="row">
                                    <div class="col-sm-12">
                                      <div class="select-style">
                                        <select name="alasan_penggantian_kartu" id="select_penggantian_kartu">
                                          <option value="">--Pilih--</option>
                                          <option value="hilang">Hilang</option>
                                          <option value="rusak">Rusak</option>
                                          <option value="lainnya">Lain-Lain</option>
                                        </select>
                                      </div>
                                      <input type="text" maxlength="255" id="penggantian_kartu_lainnya" name="alasan_penggantian_kartu_lainnya" value="" class="formField upper">
                                    </div>
                                  </div>
                                </td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Jenis Kartu</strong></td>
                                <td width="60%" class="tdgenap">
                                  <div class="row">
                                    <div class="col-sm-6">
                                      <div class="select-style">
                                        <select name="jenis_kartu">
                                          <option value="">--Pilih--</option>
                                          <option value="atm_debit">ATM DEBIT</option>
                                          <option value="atm">ATM</option>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="col-sm-6">
                                      <div class="select-style">
                                        <select name="status_kartu_instan">
                                          <option value="">--Pilih--</option>
                                          <option value="kartu_instan">Kartu Instan</option>
                                          <option value="tidak">Tidak</option>
                                        </select>
                                      </div>
                                    </div>
                                  </div>
                                </td>
                            </tr>
                            <tr>
                              <td width="100%" colspan="2">
                                <div class="row">
                                  <div class="col-sm-12">
                                    <strong><input type="checkbox" name="update_data" value="1">Pengkinian Data (Updating Data)</strong>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-sm-12">
                                    <strong>Nomor Rekening Yang Didaftarkan</strong>
                                  </div>
                                </div>
                                <table class="table add_row_update_rek" id="rek_update">
                                  <tr>
                                    <td>Tabungan</td>
                                    <td>Nomor Rekening</td>
                                    <td>Giro</td>
                                    <td>Nomor Rekening</td>
                                    <td><small><a href="javascript:void(0)" class="add_button_update_rek btn btn-primary">Add More </a></small></td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <div class="select-style">
                                        <select name="status_tabungan[]">
                                          <option value="">--Pilih--</option>
                                          <option value="hapus">Hapus</option>
                                          <option value="tambah">Tambah</option>
                                        </select>
                                      </div>
                                    </td>
                                    <td>
                                      <input type="text" maxlength="255" name="no_rek_tabungan[]"  value="" class="formField number_only" > </br>
                                      <small>Rekening pada urutan pertama merupakan rekening utama</small>
                                    </td>
                                    <td>
                                      <div class="select-style">
                                        <select name="status_giro[]">
                                          <option value="">--Pilih--</option>
                                          <option value="hapus">Hapus</option>
                                          <option value="tambah">Tambah</option>
                                        </select>
                                      </div>
                                    </td>
                                    <td>
                                      <input type="text" maxlength="255" name="no_rek_giro[]"  value="" class="formField number_only" > </br>
                                      <small>Rekening pada urutan pertama merupakan rekening utama</small>
                                    </td>
                                    <td></td>
                                  </tr>
                                </table>
                              </td>
                            </tr>
                        </tbody>
                    </table>
                  </div>

                  <div style="<?php echo $display_sms; ?>">
                    <h3><input type="checkbox" name="sms_banking" value="1"> SMS BANKING</label></h3>
                    <table class="table">
                      <tbody class="add_row_rek_tujuan" id="rek_tujuan">
                        <tr>
                          <td>
                            <input type="checkbox" name="daftar_rek_tujuan_transfer" value="1">Daftar Nomor Rekening Tujuan Transfer
                          </td>
                          <td>
                            Nama Pemilik Rekening Tujuan
                          </td>
                          <td><small><a href="javascript:void(0)" class="add_button_rek_tujuan btn btn-primary">Add More </a></small></td>
                        </tr>
                        <tr>
                          <td>
                            <input type="text" maxlength="255" name="no_rek_tujuan[]" size="50" value="" class="formfield number_only" >
                          </td>
                          <td>
                            <input type="text" maxlength="255" name="nama_pemilik_rek[]" size="50" value="" class="formfield upper space" onkeypress="return textonly(event)" >
                          </td>
                          <td></td>
                        </tr>
                      </tbody>
                    </table>

                    <table class="table add_row_rek_pemb" id="rek_tujuan">
                      <tbody>
                        <tr>
                          <td>
                            <label><input type="checkbox" name="daftar_no_rek_pembayaran" value="1"> Daftar Nomor Rekening Pembayaran/Pembelian</label><br/>
                          </td>
                          <td></td>
                          <td></td>
                        </tr>
                        <tr>
                          <td>
                            <label><input type="checkbox"> Nama Rekening (KPR/TELKOM/PLN/TELKOMSEL/DSB)</label>
                          </td>
                          <td>
                            <label>Nomor Pelanggan Kontrak</label>
                          </td>
                          <td><small><a href="javascript:void(0)" class="add_button_rek_pemb btn btn-primary">Add More </a></small></td>
                        </tr>
                        <tr>
                          <td><input type="text" maxlength="255" name="nama_rekening[]" size="50" value="" class="formfield" ></td>
                          <td><input type="text" maxlength="255" name="no_pelanggan[]" size="50" value="" class="formfield number_only" ></td>
                          <td></td>
                        </tr>
                      </tbody>
                    </table>

                    <table class="table">
                      <tbody>
                        <tr>
                          <td>
                            <label><input type="checkbox" name="sms_alert" value="1"> Pemberitahuan Bank Melalui SMS (SMS Alert) Bila</label>
                          </td>
                          <td></td>
                          <td></td>
                        </tr>
                        <tr>
                          <td>
                            <label><input type="checkbox"  value="1"> Pendebetan Lebih Dari</label>
                          </td>
                          <td>
                            Rp. <input type="text" maxlength="255" name="pendebetan_lebih"  value="" class="formField number_only">
                          </td>
                          <td>
                            Nomor Rekening <input type="text" maxlength="255" name="no_rek_pendebitan"  value="" class="formField number_only">
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <label><input type="checkbox"> Pengkreditan Lebih Dari</label>
                          </td>
                          <td>
                            Rp. <input type="text" maxlength="255" name="pengkreditan_lebih_dari"  value="" class="formField number_only">
                          </td>
                          <td>
                            Nomor Rekening <input type="text" maxlength="255" name="no_rek_pengkreditan"  value="" class="formField number_only">
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <label><input type="checkbox"> Saldo Kurang Dari</label>
                          </td>
                          <td>
                            Rp. <input type="text" maxlength="255" name="saldo_kurang_dari" value="" class="formField number_only">
                          </td>
                          <td>
                            Nomor Rekening <input type="text" maxlength"=255" name="no_rek_saldo"  value="" class="formField number_only">
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p class="pull-right">*) Wajib Diisi</p>
                    </div>
                  </div>
                  <div class="box-btn">
                    <div id="captchaimage"><a href="javascript:void(0)" id="refreshimg" title="Click to refresh image"><img src="<?php echo get_template_directory_uri();?>/inc/captcha/image.php?token=<?php echo btn_ajax_create_captcha() ?>" width="132" height="46" alt="Captcha image"></a></div>
                    <label for="captcha">Enter the characters as seen on the image above (case insensitive):</label>
                    <input type="text" maxlength="6" name="captcha" id="captcha" class="captcha required">
                    </br></br>
                    <a href="" class="btn btn-blue">Batal</a>
                    <a href="javascript:void(0)" id="SubmitProsesAtmSms" class="btn btn-success">Save</a>
                  </div>
            </div>
            </form>
        </div>
    </div>
</section>
