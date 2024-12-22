<?php
global $wpdb;
$data_form_atmSms = "SELECT btn_atmSms.*
                        FROM btn_form_atm_sms as btn_atmSms
                        WHERE id =".$_GET['edit'];
$data_atmSms = $wpdb->get_results($data_form_atmSms,OBJECT);
foreach ($data_atmSms as $data)
?>


<section id="form-cif-formulir-aplikasi" style="padding:0">
    <div class="container" style="width: inherit;">
        <div class="headline">
            <div class="icon-form">
                <i class="fa fa-file-text-o"></i>
            </div>
            <h2>FORMULIR APLIKASI KARTU BTN DAN SMS BANKING</h2>
            
        </div>
        <div class="row">
            <div class="form-child" id="cifFormulirRekening" style="max-width: 95%;margin: 0 auto;padding: 0;">
              <form id="formUpdateAtmSms" class="form-horizontal">
               <input type="hidden" name="id" value="<?php echo $data->id; ?>">
                <div class="data-diri">
                    <table class="table">
                      <tbody>
                        <tr>
                          <td width="40%" class="tdganjil"><strong>Cabang</strong></td>
                          <td width="60%" class="tdgenap"><input type="text" name="cabang_aplikasi" maxlength="255"  value="<?php echo @$data->cabang; ?>" class="form-control required"></td>
                        </tr>
                        <tr>
                          <td width="40%" class="tdganjil"><strong>Tanggal</strong></td>
                          <td width="60%" class="tdgenap">
                            <div class="col-sm-6">
                              <div id="datetimepicker2" class="input-append date">
                                <input name="tanggal_aplikasi" data-format="dd/MM/yyyy" type="text" class="required" value="<?php echo @$data->tanggal; ?>"></input>
                                <span class="add-on"><i class="fa fa-calendar"></i></span>
                              </div>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <table class="table">
                        <tbody>                            
                            <tr>
                              <td width="40%" class="tdganjil"><strong>Nama Lengkap</strong></td>
                              <td width="60%" class="tdgenap"><input type="text" maxlength="255" name="nama_lengkap_aplikasi" value="<?php echo @$data->nama_lengkap; ?>" class="form-control required upper" onkeypress="return nameValidateAtm(event,this.value)"></td>
                            </tr>
                            <tr>
                              <td width="40%" class="tdganjil"><strong>Tempat & Tanggal Lahir</strong></td>
                              <td width="60%" class="tdgenap">
                                <div class="row">
                                  <div class="col-sm-6">
                                    <input type="text" name="tempat_lahir_aplikasi" maxlength="255"  value="<?php echo @$data->tempat_lahir; ?>" class="form-control">
                                  </div>
                                  <div class="col-sm-6">
                                    <div id="datetimepicker2" class="input-append date">
                                      <input name="tanggal_lahir_aplikasi" data-format="dd/MM/yyyy" type="text" class="required" value="<?php echo @$data->tanggal_lahir; ?>"></input>
                                      <span class="add-on"><i class="fa fa-calendar"></i></span>
                                    </div>
                                  </div>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td width="40%" class="tdganjil"><strong>Nama Gadis Ibu Kandung</strong></td>
                              <td width="60%" class="tdgenap"><input type="text" maxlength="255" name="nama_gadis_ibu_kandung_aplikasi"  value="<?php echo @$data->nama_gadis_ibu_kandung; ?>" class="form-control required upper" onkeypress="return nameValidateIbuAtm(event,this.value)"></td>
                            </tr>
                            <tr>
                              <td width="40%" class="tdganjil"><strong>Alamat Lengkap</strong></td>
                              <td width="60%" class="tdgenap"><input type="text" maxlength="255" name="alamat_lengkap_aplikasi" value="<?php echo @$data->alamat_lengkap; ?>" class="form-control required"></td>
                            </tr>
                            <tr>
                              <td width="40%" class="tdganjil"><strong>No Telepon</strong></td>
                              <td width="60%" class="tdgenap">
                                <div class="row">
                                  <div class="col-sm-6"><label>Rumah: </label><input type="text" name="no_tlp_rumah_aplikasi" maxlength="255"  value="<?php echo @$data->no_tlp_rumah; ?>" class="formField required number_only phone"></div>
                                  <div class="col-sm-6"><label>Kantor: </label><input type="text" name="no_tlp_kantor_aplikasi" maxlength="255"  value="<?php echo @$data->no_tlp_kantor; ?>" class="formField required number_only phone"></div>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td width="40%" class="tdganjil"><strong>No Handphone</strong></td>
                              <td width="60%" class="tdgenap"><input type="text" maxlength="255" name="no_hp_aplikasi" value="<?php echo @$data->no_hp; ?>" class="form-control required number_only"></td>
                            </tr>
                            <tr>
                              <td width="40%" class="tdganjil"><strong>Nomor Kartu BTN</strong></td>
                              <td width="60%" class="tdgenap"><input type="text" maxlength="255" name="no_kartu_aplikasi" value="<?php echo @$data->no_kartu_btn; ?>" class="form-control required"></td>
                            </tr>
                            <tr>
                              <td width="40%" class="tdganjil"><strong>No CIF</strong></td>
                              <td width="60%" class="tdgenap"><input type="text" maxlength="255" name="no_cif_aplikasi" value="<?php echo @$data->no_cif; ?>" class="form-control required"></td>
                            </tr>
                            
                        </tbody>
                    </table>

                    <h3><input type="checkbox" name="kartu_btn" value="1" <?php echo (@$data->kartu_btn == '1')?'checked':''; ?>> Kartu BTN</h3>
                    <table class="table">
                        <tbody>                            
                            <tr>
                                <td width="40%" class="tdganjil"><strong><input type="checkbox" name="kartu_baru" value="1" <?php echo (@$data->kartu_baru == '1')?'checked':''; ?>>Kartu Baru</strong></td>
                                <td width="60%" class="tdgenap"><label>Nama Pada Kartu</label><input type="text" maxlength="255" name="nama_pada_kartu"  value="<?php echo @$data->nama_pada_kartu; ?>" class="form-control required upper" onkeypress="return nameKartuVlidate(event,this.value)"></td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong><input type="checkbox" name="penggantian_kartu" value="1" <?php echo (@$data->penggantian_kartu == '1')?'checked':'' ?>>Penggantian Kartu Karena</strong></td>
                                <td width="60%" class="tdgenap">
                                  <div class="row">
                                    <div class="col-sm-12">
                                      <div class="select-style">
                                        <select name="alasan_penggantian_kartu" id="select_penggantian_kartu">
                                          <option value="">--Pilih--</option>
                                          <option value="hilang" <?php echo (@$data->alasan_penggantian_kartu=='hilang')?'selected':''; ?>>Hilang</option>
                                          <option value="rusak" <?php echo (@$data->alasan_penggantian_kartu=='rusak')?'selected':''; ?>>Rusak</option>
                                          <option value="lainnya" <?php echo (@$data->alasan_penggantian_kartu=='lainnya')?'selected':''; ?>>Lain-Lain</option>
                                        </select>
                                      </div>
                                      <input type="text" maxlength="255" id="penggantian_kartu_lainnya" name="alasan_penggantian_kartu_lainnya" value="<?php echo @$data->alasan_penggantian_kartu_lain; ?>" class="formField">
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
                                          <option value="atm_debit" <?php echo (@$data->jenis_kartu=='atm_debit')?'selected':''; ?>>ATM DEBIT</option>
                                          <option value="atm" <?php echo (@$data->jenis_kartu=='atm')?'selected':''; ?>>ATM</option>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="col-sm-6">
                                      <div class="select-style">
                                        <select name="status_kartu_instan">
                                          <option value="">--Pilih--</option>
                                          <option value="kartu_instan" <?php echo (@$data->status_kartu_instan=='kartu_instan')?'selected':''; ?>>Kartu Instan</option>
                                          <option value="tidak" <?php echo (@$data->status_kartu_instan=='tidak')?'selected':''; ?>>Tidak</option>
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
                                    <strong><input type="checkbox" name="update_data" value="1" <?php echo (@$data->update_data=='1')?'checked':''; ?>> Pengkinian Data (Updating Data)</strong>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-sm-12">
                                    <strong>Nomor Rekening Yang Didaftarkan</strong>
                                  </div>
                                </div>
                                <table class="table tdganjil">
                                  <tr>
                                    <td>Tabungan</td>
                                    <td>Nomor Rekening</td>
                                  </tr>
                                  <?php  
                                    global $wpdb;
                                    $reg_sql2 = "SELECT * FROM btn_update_data_tabungan WHERE id_form_atm_sms=".@$data->id;
                                    $tabungan = $wpdb->get_results($reg_sql2);
                                    foreach ($tabungan as $res_tabungan) {
                                  ?>
                                  <tr>
                                    <input type="hidden" size="15" name="id_tabungan[]" value="<?php echo @$res_tabungan->id; ?>">
                                    <td>
                                      <div class="select-style">
                                        <select name="status_tabungan[]">
                                          <option value="">--Pilih--</option>
                                          <option value="hapus" <?php echo(@$res_tabungan->status_tabungan =='hapus')?'selected':'' ?>>Hapus</option>
                                          <option value="tambah" <?php echo(@$res_tabungan->status_tabungan =='tambah')?'selected':'' ?>>Tambah</option>
                                        </select>
                                      </div>
                                    </td>
                                    <td>
                                      <input type="text" maxlength="255" name="no_rek_tabungan[]"  value="<?php echo @$res_tabungan->no_rekening ?>" class="formField number_only" > </br>
                                      <small>Rekening pada urutan pertama merupakan rekening utama</small>
                                    </td>
                                  </tr>
                                  <?php } ?>
                                </table>

                                <table class="table tdganjil">
                                  <tr>
                                    <td>Giro</td>
                                    <td>Nomor Rekening</td>
                                  </tr>
                                    <?php  
                                      global $wpdb;
                                      $reg_sql3 = "SELECT * FROM btn_update_data_giro WHERE id_form_atm_sms=".@$data->id;
                                      $giro = $wpdb->get_results($reg_sql3);
                                      foreach ($giro as $res_giro) {
                                    ?>
                                  <tr>
                                    <input type="hidden" size="15" name="id_giro[]" value="<?php echo @$res_giro->id; ?>">
                                    <td>
                                      <div class="select-style">
                                        <select name="status_giro[]">
                                          <option value="">--Pilih--</option>
                                          <option value="hapus" <?php echo(@$res_giro->status_giro =='hapus')?'selected':'' ?>>Hapus</option>
                                          <option value="tambah" <?php echo(@$res_giro->status_giro =='tambah')?'selected':'' ?>>Tambah</option>
                                        </select>
                                      </div>
                                    </td>
                                    <td>
                                      <input type="text" maxlength="255" name="no_rek_giro[]"  value="<?php echo @$res_giro->nomor_rekening ?>" class="formField number_only" > </br>
                                      <small>Rekening pada urutan pertama merupakan rekening utama</small>
                                    </td>
                                  </tr>
                                   <?php } ?>
                                </table>
                              </td>
                            </tr>
                        </tbody>
                    </table>
                   
                    <h3><input type="checkbox" name="sms_banking" value="1" <?php echo (@$data->sms_banking =='1')?'checked':'' ?>> SMS BANKING</label></h3>
                    <table class="table">
                      <tbody>
                        <tr>
                          <td>
                            <input type="checkbox" name="daftar_rek_tujuan_transfer" value="1" <?php echo (@$data->daftar_rek_tujuan_transfer =='1')?'checked':'' ?>>Daftar Nomor Rekening Tujuan Transfer
                          </td>
                          <td>
                            Nama Pemilik Rekening Tujuan
                          </td>
                        </tr>
                        <?php  
                          global $wpdb;
                          $reg_sql4 = "SELECT * FROM btn_daftar_rek_sms_banking WHERE id_form_atm_sms=".@$data->id;
                          $daftar_rek_sms = $wpdb->get_results($reg_sql4);
                          foreach ($daftar_rek_sms as $res_daftar_rek_sms) {
                        ?>
                        <tr>
                          <td>
                            <input type="hidden" size="15" name="id_daftar_sms[]" value="<?php echo @$res_daftar_rek_sms->id; ?>">
                            <input type="text" maxlength="255" name="no_rek_tujuan[]" value="<?php echo @$res_daftar_rek_sms->no_rek_tujuan ?>" class="formField number_only" >  
                          </td>
                          <td>
                            <input type="text" maxlength="255" name="nama_pemilik_rek[]" value="<?php echo @$res_daftar_rek_sms->nama_pemilik_rek ?>" class="formField" >  
                          </td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>

                    <table class="table">
                      <tbody>
                        <tr>
                          <td>
                            <label><input type="checkbox" name="daftar_no_rek_pembayaran" value="1" <?php echo (@$data->daftar_rek_pembayaran=='1')?'checked':'' ?>> Daftar Nomor Rekening Pembayaran/Pembelian</label><br/>
                          </td>
                          <td></td>
                        </tr>
                        <tr>
                          <td>
                            <label><input type="checkbox"> Nama Rekening (KPR/TELKOM/PLN/TELKOMSEL/DSB)</label>
                          </td>
                          <td>
                            <label>Nomor Pelanggan Kontrak</label>
                          </td>
                        </tr>
                        <?php  
                          global $wpdb;
                          $reg_sql5 = "SELECT * FROM btn_daftar_rek_pembayaran WHERE id_form_atm_sms=".@$data->id;
                          $daftar_rek_pemb = $wpdb->get_results($reg_sql5);
                          foreach ($daftar_rek_pemb as $res_daftar_rek_pemb) {
                        ?>
                        <tr>
                          <input type="hidden" size="15" name="id_daftar_rek_pemb[]" value="<?php echo @$res_daftar_rek_pemb->id; ?>">
                          <td><input type="text" maxlength="255" name="nama_rekening[]"  value="<?php echo @$res_daftar_rek_pemb->nama_rekening ?>" class="formField" ></td>
                          <td><input type="text" maxlength="255" name="no_pelanggan[]" value="<?php echo @$res_daftar_rek_pemb->no_pelanggan ?>" class="formField" ></td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>

                    <table class="table">
                      <tbody>
                        <tr>
                          <td>
                            <label><input type="checkbox" name="sms_alert" value="1" <?php echo (@$data->sms_alert=='1')?'checked':''; ?>> Pemberitahuan Bank Melalui SMS (SMS Alert) Bila</label>        
                          </td>
                          <td></td>
                          <td></td>
                        </tr>
                        <tr>
                          <td>
                            <label><input type="checkbox"  value="1"> Pendebetan Lebih Dari</label>
                          </td>
                          <td>
                            Rp. <input type="text" maxlength="255" name="pendebetan_lebih"  value="<?php echo @$data->pendebetan_lebih_dari; ?>" class="formField">
                          </td>
                          <td>
                            Nomor Rekening <input type="text" maxlength="255" name="no_rek_pendebitan"  value="<?php echo @$data->no_rek_pendebitan; ?>" class="formField number_only">
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <label><input type="checkbox"> Pengkreditan Lebih Dari</label>
                          </td>
                          <td>
                            Rp. <input type="text" maxlength="255" name="pengkreditan_lebih_dari"  value="<?php echo @$data->pengkreditan_lebih_dari; ?>" class="formField">
                          </td>
                          <td>
                            Nomor Rekening <input type="text" maxlength="255" name="no_rek_pengkreditan"  value="<?php echo @$data->no_rek_pengkreditan; ?>" class="formField number_only">
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <label><input type="checkbox"> Saldo Kurang Dari</label>
                          </td>
                          <td>
                            Rp. <input type="text" maxlength="255" name="saldo_kurang_dari" value="<?php echo @$data->saldo_kurang_dari; ?>" class="formField">
                          </td>
                          <td>
                            Nomor Rekening <input type="text" maxlength="255" name="no_rek_saldo"  value="<?php echo @$data->no_rek_saldo; ?>" class="formField number_only">
                          </td>
                        </tr>
                      </tbody>
                    </table>
                </div>
                  <div class="box-btn">
                    <a href="" class="btn btn-yellow">Batal</a>
                    <a href="javascript:void(0)" id="UpdateAtmSms2" class="btn btn-primary">Save</a>
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
