<?php
  // global $wpdb;
  // $id = $_GET['edit'];
  // $reg_sql = "SELECT btn_dl.nama_lembaga as nama_lembaga_utama, btn_dl.bidang_usaha as bidang_usaha_utama, btn_dl.*, btn_dpl.*, btn_gu.* 
  //             FROM btn_data_lembaga as btn_dl 
  //             inner join btn_data_pengurus_lembaga as btn_dpl on btn_dl.id =btn_dpl.id_data_lembaga 
  //             inner join btn_group_usaha_lembaga as btn_gu on btn_dl.id = btn_gu.id_data_lembaga
  //             WHERE btn_dl.id=".$id;
  // $items = $wpdb->get_results( $reg_sql );
  // print_r(json_encode($items));die();
  global $wpdb;
  $id = $_GET['edit'];
  $reg_sql = "SELECT * FROM btn_data_lembaga WHERE id=".$id;
  $items = $wpdb->get_results( $reg_sql );
  foreach ($items as $item)
  
?>

<section id="form-cif-lembaga" style="padding:0">
    <div class="container" style="width: inherit;">
        <div class="headline">
            <div class="icon-form">
                <i class="fa fa-file-text-o"></i>
            </div>
            <h2>FORMULIR DATA NASABAH LEMBAGA</h2>
        </div>
        <div class="row">
            <div class="form-child" id="cifLembaga" style="max-width: 95%;margin: 0 auto;padding: 0;">
              <form id="formRegCifLembaga" class="form-horizontal">
              <input type="hidden" name="jenis_cif" value="lembaga">
                <div class="data-diri">
                    <h3>Data Lembaga</h3>
                    <table class="table">
                        <tbody>
                        
                        <input type="hidden" name="id" value="<?php echo @$item->id; ?>">
               
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Nama Lembaga</strong></td>
                                <td width="60%" class="tdgenap"><input type="text" maxlength="255" name="nama_lembaga" value="<?php echo @$item->nama_lembaga; ?>" class="form-control required" data-trigger="focus"></td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Bidang Usaha</strong></td>
                                <td width="60%" class="tdgenap">
                                  <div class="row">
                                    <div class="col-sm-12">
                                      <div class="select-style">
                                        <select name="bidang_usaha" class="required" id="bidang_usaha">
                                          <option value="">--Pilih--</option>
                                          <option value="Pertanian, Perburuan dan Pertanian" <?php echo($item->bidang_usaha=="Pertanian, Perburuan dan Pertanian") ? 'selected' : '' ?> > Pertanian, Perburuan dan Pertanian</option>
                                          <option value="Pertambangan" <?php echo($item->bidang_usaha=="Pertambangan") ? 'selected' : '' ?> > Pertambangan</option>
                                          <option value="Perindustrian" <?php echo($item->bidang_usaha=="Perindustrian") ? 'selected' : '' ?> > Perindustrian</option>
                                          <option value="Listrik, Gas & Air" <?php echo($item->bidang_usaha=="Listrik, Gas & Air") ? 'selected' : '' ?> > Listrik, Gas & Air</option>
                                          <option value="Konstruksi" <?php echo($item->bidang_usaha=="Konstruksi") ? 'selected' : '' ?> > Konstruksi</option>
                                          <option value="Perdagangan, Restoran dan Hotel" <?php echo($item->bidang_usaha=="Perdagangan, Restoran dan Hotel") ? 'selected' : '' ?> > Perdagangan, Restoran dan Hotel</option>
                                          <option value="Pengangkutan, Pergudangan & Komunikasi" <?php echo($item->bidang_usaha=="Pengangkutan, Pergudangan & Komunikasi") ? 'selected' : '' ?> > Pengangkutan, Pergudangan &amp; Komunikasi</option>
                                          <option value="Jasa-jasa Dunia Usaha" <?php echo($item->bidang_usaha=="Jasa-jasa Dunia Usaha") ? 'selected' : '' ?> > Jasa-jasa Dunia Usaha</option>
                                          <option value="Jasa-jasa Sosial Masyarakat" <?php echo($item->bidang_usaha=="Jasa-jasa Sosial Masyarakat") ? 'selected' : '' ?> > Jasa-jasa Sosial Masyarakat</option>
                                          <option value="Jasa-Jasa Keuangan & Perbankan" <?php echo($item->bidang_usaha=="Jasa-Jasa Keuangan & Perbankan") ? 'selected' : '' ?> > Jasa-jasa Keuangan & Perbankan</option>
                                          <option value="lainnya" <?php echo($item->bidang_usaha=="lainnya") ? 'selected' : '' ?>> Lain-Lain</option>
                                        </select>
                                      </div>
                                      <input type="text" maxlength="255" name="bidang_usaha_lainnya" id="bidang_usaha_lainnya" value="<?php echo @$item->bidang_usaha; ?>" class="formField required" placeholder="Lain-Lain">
                                    </div>
                                  </div>
                                 </td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Alamat Lembaga</strong></td>
                                <td width="60%" class="tdgenap">
                                <input type="text" name="alamat_lembaga" maxlength="255"  value="<?php echo @$item->alamat; ?>" class="form-control required"> <br/>
                                <div class="row">
                                  <label  class="col-md-3">
                                    RT/RW
                                  </label>
                                  <div class="col-md-9">
                                    <input type="text" maxlength="3" name="rt_lembaga" size="5"  value="<?php echo @$item->rt; ?>" class="formField required number_only">/<input type="text" size="5" maxlength="3" name="rw_lembaga" value="<?php echo @$item->rw; ?>" class="formField required number_only">
                                  </div>
                                </div>
                                <div class="row">
                                  <label  class="col-md-3">
                                    Kelurahan
                                  </label>
                                  <div class="col-md-9">
                                    <input type="text" maxlength="255" name="kelurahan_lembaga"  value="<?php echo @$item->kelurahan; ?>" class="form-control required">
                                  </div>
                                </div>
                                <div class="row">
                                  <label  class="col-md-3">
                                    Kecamatan
                                  </label>
                                  <div class="col-md-9">
                                    <input type="text" maxlength="255" name="kecamatan_lembaga"  value="<?php echo @$item->kecamatan; ?>" class="form-control required">
                                  </div>
                                </div>
                                <div class="row">
                                  <label  class="col-md-3">
                                    Kota/DaTi
                                  </label>
                                  <div class="col-md-9">
                                    <input type="text" maxlength="255" name="kota_lembaga"  value="<?php echo @$item->kota; ?>" class="form-control required">
                                  </div>
                                </div>
                                <div class="row">
                                  <label  class="col-md-3">
                                    Kodepos
                                  </label>
                                  <div class="col-md-9">
                                    <input type="text" maxlength="255" name="kodepos_lembaga" value="<?php echo @$item->kode_pos; ?>" class="form-control number_only required">
                                  </div>
                                </div>
                                <div class="row">
                                  <label  class="col-md-3">
                                    Provinsi
                                  </label>
                                  <div class="col-md-9">
                                    <input type="text" maxlength="255" name="propinsi"  value="<?php echo @$item->provinsi; ?>" class="form-control required">
                                  </div>
                                </div>
                                </td>
                            </tr>

                            <tr>
                                <td width="40%" class="tdganjil"><strong>No Telepon (termasuk kode area)</strong></td>
                                <td width="60%" class="tdgenap"><input type="text" maxlength="255" name="no_tlp_lembaga" value="<?php echo @$item->no_tlp; ?>" class="form-control number_only required phone"></td>
                            </tr>

                            <tr>
                                <td width="40%" class="tdganjil"><strong>No Facsimile (termasuk kode area)</strong></td>
                                <td width="60%" class="tdgenap"><input type="text" maxlength="255" name="no_fax_lembaga" value="<?php echo @$item->no_fax; ?>" class="form-control number_only required phone"></td>
                            </tr>

                            <tr>
                                <td width="40%" class="tdganjil"><strong>E-Mail</strong></td>
                                <td width="60%" class="tdgenap"><input type="text" maxlength="255" name="email_lembaga" value="<?php echo @$item->email; ?>" class="form-control email required"></td>
                            </tr>

                            <tr>
                                <td width="40%" class="tdganjil"><strong>Website</strong></td>
                                <td width="60%" class="tdgenap"><input type="text" maxlength="255" name="website_lembaga" value="<?php echo @$item->website; ?>" class="form-control"></td>
                            </tr>


                        </tbody>
                    </table>

                    <h3>Legalitas Lembaga</h3>
                    <table class="table">
                        <tbody>                            
                            <tr>
                                <td width="40%" class="tdganjil"><strong>No NPWP</strong></td>
                                <td width="60%" class="tdgenap"><input type="text" name="no_npwp" maxlength="255"  value="<?php echo @$item->no_npwp; ?>" class="form-control required npwp"></td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Anggaran Dasar No</strong></td>
                                <td width="60%" class="tdgenap"><input type="text" maxlength="255" name="no_anggaran_dasar" value="<?php echo @$item->no_anggaran_dasar; ?>" class="form-control required"></td>

                            </tr>                            
                            <tr>
                                <td width="100%" colspan="2">
                                  <table class="table">
                                    <tr>
                                      <td>Nomor</td>
                                      <td>Tanggal</td>
                                      <td>Diterbitkan Di</td>
                                      <td>Nama Notaris</td>
                                    </tr>
                                    <tr>
                                      <td>
                                        <label  class="col-md-3">
                                          Akta Pendirian
                                        </label>
                                        <div class="col-md-9">
                                          <input type="text" name="no_akta_pendirian"  maxlength="255"  value="<?php echo @$item->no_akta_pendirian; ?>" class="formField required">
                                        </div>
                                      </td>
                                      <td>
                                        <div id="datetimepicker2" class="input-append date">
                                          <input name="tanggal_akta_pendirian" size="10" data-format="dd/MM/yyyy" type="text" value="<?php echo @$item->tanggal_akta_pendirian; ?>" class="required"></input>
                                          <span class="add-on"><i class="fa fa-calendar"></i></span>
                                        </div>
                                      </td>
                                      <td><input type="text" name="akta_diterbitkan" maxlength="255"  value="<?php echo @$item->diterbitkan_akta_pendirian; ?>" class="formField required"></td>
                                      <td><input type="text" name="nama_notaris_akta_pendirian" maxlength="255"  value="<?php echo @$item->notaris_akta_pendirian; ?>" class="formField required"></td>
                                    </tr>
                                    <tr>
                                      <td>
                                        <label  class="col-md-3">
                                          Akta Perubahan
                                        </label>
                                        <div class="col-md-9">
                                          <input type="text" name="no_akta_perubahan" maxlength="255"  value="<?php echo @$item->no_akta_perubahan; ?>" class="formField required">
                                        </div>
                                      </td>
                                      <td>
                                        <div id="datetimepicker2" class="input-append date">
                                          <input name="tanggal_akta_perubahan" size="10" data-format="dd/MM/yyyy" type="text" value="<?php echo @$item->tanggal_akta_perubahan; ?>" class="required"></input>
                                          <span class="add-on"><i class="fa fa-calendar"></i></span>
                                        </div>
                                      </td>
                                      <td><input type="text" name="akta_perubahan_diterbitkan" maxlength="255"  value="<?php echo @$item->diterbitkan_akta_perubahan; ?>" class="formField required"></td>
                                      <td><input type="text" name="nama_notaris_akta_perubahan" maxlength="255"  value="<?php echo @$item->notaris_akta_perubahan; ?>" class="formField required"></td>
                                    </tr>
                                    <tr>
                                      <td>
                                        <label  class="col-md-3">
                                          SIUP
                                        </label>
                                        <div class="col-md-9">
                                          <input type="text" name="no_siup" maxlength="255"  value="<?php echo @$item->no_siup; ?>" class="formField required">
                                        </div>
                                      </td>
                                      <td>
                                        <div id="datetimepicker2" class="input-append date">
                                          <input name="tanggal_siup" size="10" data-format="dd/MM/yyyy" type="text" value="<?php echo @$item->tanggal_siup; ?>" class="required"></input>
                                          <span class="add-on"><i class="fa fa-calendar"></i></span>
                                        </div>
                                      </td>
                                      <td><input type="text" name="siup_diterbitkan" maxlength="255"  value="<?php echo @$item->diterbitkan_siup; ?>" class="formField required"></td>
                                      <td>
                                        <div class="col-md-12">
                                          <div id="datetimepicker2" class="input-append date">
                                            <input name="siup_berlaku" size="10" data-format="dd/MM/yyyy" type="text" value="<?php echo @$item->siup_masa_berlaku; ?>" class="required"></input>
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
                                          <input type="text" name="no_tdp" maxlength="255"  value="<?php echo @$item->no_tdp; ?>" class="formField required">
                                        </div>
                                      </td>
                                      <td>
                                        <div id="datetimepicker2" class="input-append date">
                                          <input name="tanggal_tdp" size="10" data-format="dd/MM/yyyy" type="text" value="<?php echo @$item->tanggal_tdp; ?>" class="required"></input>
                                          <span class="add-on"><i class="fa fa-calendar"></i></span>
                                        </div>
                                      </td>
                                      <td><input type="text" name="tdp_diterbitkan" maxlength="255"  value="<?php echo @$item->diterbitkan_tdp; ?>" class="formField required"></td>
                                      <td>
                                        <div class="col-md-12">
                                          <div id="datetimepicker2" class="input-append date">
                                            <input name="tdp_berlaku" size="10" data-format="dd/MM/yyyy" type="text" value="<?php echo @$item->tdp_masa_berlaku; ?>" class="required"></input>
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
                                          <input type="text" name="no_situ" maxlength="255"  value="<?php echo @$item->no_situ; ?>" class="formField required">
                                        </div>
                                      </td>
                                      <td>
                                        <div id="datetimepicker2" class="input-append date">
                                          <input name="tanggal_situ" size="10" data-format="dd/MM/yyyy" type="text" value="<?php echo @$item->tanggal_situ; ?>" class="required">
                                          <span class="add-on"><i class="fa fa-calendar"></i></span>
                                        </div>
                                      </td>
                                      <td><input type="text" name="situ_diterbitkan" maxlength="255"  value="<?php echo @$item->diterbitkan_situ; ?>" class="formField required"></td>
                                      <td>
                                        <div class="col-md-12">
                                          <div id="datetimepicker2" class="input-append date">
                                            <input name="situ_berlaku" size="10" data-format="dd/MM/yyyy" type="text" value="<?php echo @$item->situ_masa_berlaku; ?>" class="required"></input>
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
                                      <td>Nama &amp; Alamat Lengkap (Sesuai KTP)</td>
                                      <td>Jabatan</td>
                                      <td>Identitas Diri</td>
                                      <td>No Telepon</td>
                                      <!-- <td><small><a href="javascript:void(0)" class="add_button_pengurus btn btn-primary">Add More </a></small></td> -->
                                    </tr>
                                    <?php  
                                      global $wpdb;
                                      $reg_sql2 = "SELECT * FROM btn_data_pengurus_lembaga WHERE id_data_lembaga=".$id;
                                      $pengurus = $wpdb->get_results($reg_sql2);
                                      foreach ($pengurus as $res_pengurus) {
                                    ?>
                                    <tr>
                                      <td>
                                        <div class="row">
                                          <label  class="col-md-3">
                                            Nama
                                          </label>
                                          <div class="col-md-6">
                                            <input type="hidden" size="15" name="id_pengurus[]" value="<?php echo @$res_pengurus->id; ?>">
                                            <input type="text" name="nama_pengurus_1[]" size="15" maxlength="255"  value="<?php echo @$res_pengurus->nama; ?>" class="formField required">
                                          </div>
                                        </div>
                                        <div class="row">
                                          <label  class="col-md-3">
                                            Alamat
                                          </label>
                                          <div class="col-md-9">
                                            <input type="text" size="15" name="alamat_pengurus_1[]" maxlength="255"  value="<?php echo @$res_pengurus->alamat; ?>" class="formField required">
                                          </div>
                                        </div>
                                      </td>
                                      <td><input type="text" size="15" maxlength="255" name="jabatan_pengurus_1[]" value="<?php echo @$res_pengurus->jabatan; ?>" class="formField required"></td>
                                      <td>
                                        <div class="row">
                                          <label  class="col-md-4">
                                            No NPWP Pribadi
                                          </label>
                                          <div class="col-md-8">
                                            <input type="text" maxlength="255" size="15" name="npwp_pribadi_1[]" value="<?php echo @$res_pengurus->no_npwp; ?>" class="formField required number_only npwp">
                                          </div>
                                        </div>
                                        <div class="row">
                                          <label  class="col-md-4">
                                            No KTP
                                          </label>
                                          <div class="col-md-8">
                                            <input type="text" maxlength="255" size="15" name="ktp_pribadi_1[]" value="<?php echo @$res_pengurus->no_ktp; ?>" class="formField required number_only">
                                          </div>
                                        </div>
                                        <div class="row">
                                          <label  class="col-md-4">
                                            Dikeluarkan Di kota
                                          </label>
                                          <div class="col-md-8">
                                            <input type="text" maxlength="255" name="dikeluarkan_ktp_1[]" size="15" value="<?php echo @$res_pengurus->dikeluarkan_di; ?>" class="formField required">
                                          </div>
                                        </div>
                                        <div class="row">
                                          <label  class="col-md-4">
                                            Tanggal Kadaluwarsa
                                          </label>
                                          <div class="col-md-8">
                                            <div id="datetimepicker2" class="input-append date">
                                              <input name="ktp_kadaluwarsa_1[]" size="10" data-format="dd/MM/yyyy" type="text" value="<?php echo @$res_pengurus->tgl_kadaluwarsa; ?>" class="required"></input>
                                              <span class="add-on"><i class="fa fa-calendar"></i></span>
                                            </div>
                                          </div>
                                        </div>
                                      </td>
                                      <td>
                                          <div class="row">
                                            <label  class="col-md-3">
                                              Rumah
                                            </label>
                                            <div class="col-md-9">
                                              <input type="text" maxlength="255" name="tlp_rumah_1[]" size="15" value="<?php echo @$res_pengurus->tlp_rumah; ?>" class="formField required number_only phone">
                                            </div>
                                          </div>
                                          <div class="row">
                                            <label  class="col-md-3">
                                              HP
                                            </label>
                                            <div class="col-md-9">
                                              <input type="text" maxlength="255" name="no_hp_1[]" size="15" value="<?php echo @$res_pengurus->no_hp; ?>" class="formField required number_only">
                                            </div>
                                          </div>
                                      </td>
                                    </tr>
                                    <?php } ?>
                                  </table>
                                </td>
                            </tr>                            
                        </tbody>
                    </table>
                    
                    <h3>GROUP USAHA</h3>
                    <table>
                        <tbody class="table add_row_group" id="group_lembaga">
                            <tr>
                                <td>NAMA LEMBAGA</td>
                                <td>ALAMAT</td>
                                <td>BIDANG USAHA</td>
                                <td>TELEPON</td>
                                <td>NOMOR NPWP</td>
                                <!-- <td><small><a href="javascript:void(0)" class="add_button_group btn btn-primary">Add More </a></small></td> -->
                              </tr>
                              <?php  
                                global $wpdb;
                                $reg_sql3 = "SELECT * FROM btn_group_usaha_lembaga WHERE id_data_lembaga=".$id;
                                $group = $wpdb->get_results($reg_sql3);
                                foreach ($group as $res_group) {
                              ?>
                              <tr>
                                <td>
                                  <div class="row">
                                    <div class="col-md-9">
                                      <input type="hidden" size="15" name="id_group[]" value="<?php echo @$res_group->id; ?>">
                                      <input type="text" size="15" name="nama_lembaga_group1[]" maxlength="255"  value="<?php echo @$res_group->nama_lembaga; ?>" class="formField required">
                                    </div>
                                  </div>
                                </td>
                                <td>
                                  <div class="row">
                                    <div class="col-md-9">
                                      <input type="text" size="15" name="alamat_lembaga_group1[]" maxlength="255"  value="<?php echo @$res_group->alamat; ?>" class="formField required">
                                    </div>
                                  </div>
                                </td>
                                <td>
                                  <div class="row">
                                    <div class="col-md-9">
                                      <input type="text" size="15" name="bidang_usaha_group1[]" maxlength="255"  value="<?php echo @$res_group->bidang_usaha; ?>" class="formField required">
                                    </div>
                                  </div>
                                </td>
                                <td>
                                  <div class="row">
                                    <div class="col-md-9">
                                      <input type="text" size="15" maxlength="255" name="no_telepon_group1[]" value="<?php echo @$res_group->no_tlp; ?>" class="formField required number_only phone">
                                    </div>
                                  </div>
                                </td>
                                <td>
                                  <div class="row">
                                    <div class="col-md-9">
                                      <input type="text" size="15" name="no_npwp_group1[]" maxlength="255"  value="<?php echo @$res_group->no_npwp; ?>" class="formField required number_only npwp">
                                    </div>
                                  </div>
                                </td>
                              </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                </div>
                 <div class="box-btn">
                    <a href="" class="btn btn-yellow">Batal</a>
                    <a href="javascript:void(0)" id="UpdateLembaga" class="btn btn-primary">Save</a>
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
