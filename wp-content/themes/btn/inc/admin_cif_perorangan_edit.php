<?php
include_once dirname(__FILE__) . "/../../../../../wp-load.php";
global $wpdb;
$reg_sql = "SELECT * FROM btn_data_pribadi
            WHERE id=".@$_GET['edit'];

$items = $wpdb->get_results($reg_sql,OBJECT);
?>

<section id="form-cif-perorangan" style="padding:0">
    <div class="container" style="width: inherit;">
        <div class="headline">
            <div class="icon-form">
                <i class="fa fa-file-text-o"></i>
            </div>
            <h2>FORMULIR DATA NASABAH PERORANGAN</h2>
        </div>
        <div class="row">
            <div class="form-child" style="max-width: 95%;margin: 0 auto;padding: 0;">
              <form id="FormUpdateCifPerorangan" class="form-horizontal">
              <input type="hidden" name="jenis_cif" value="perorangan">
              <input type="hidden" name="id" value="perorangan">
                <div class="data-diri">
                    
                    <h3>Data Pribadi</h3>
                    <table class="table">
                        <tbody>          
                        <?php foreach ($items as $item) { ?>
                        <input type="hidden" name="id" value="<?php echo $item->id; ?>">                  
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Nama Lengkap</strong></br><small>(Sesuai kartu identitas)</small></td>
                                <td width="60%" class="tdgenap"><input type="text" name="nama_lengkap" maxlength="255"  value= "<?php echo @$item->nama_sesuai_identitas; ?>" class="form-control required upper" onkeypress="return nameValidationIdentitas(event,this.value)" ></td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Nama Lengkap</strong></br><small>(Tanpa singkatan dan gelar)</small></td>
                                <td width="60%" class="tdgenap"><input type="text" name="nama_lengkap_tanpa_gelar" maxlength="255"  value="<?php echo @$item->nama_tanpa_gelar; ?>" class="form-control required upper" onkeypress="return nameValidation(event,this.value)"></td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Gelar Sebelum Nama</strong></td>
                                <td width="60%" class="tdgenap"><input type="text" name="gelar_sebelum_nama" maxlength="255"  value="<?php echo @$item->gelar_sebelum_nama; ?>" class="form-control"></td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Gelar Setelah Nama</strong></td>
                                <td width="60%" class="tdgenap"><input type="text" name="gelar_setelah_nama" maxlength="255"  value="<?php echo @$item->gelar_setelah_nama; ?>" class="form-control"></td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Nama Alias</strong></td>
                                <td width="60%" class="tdgenap"><input type="text" name="nama_alias" maxlength="255"  value="<?php echo @$item->nama_alias; ?>" class="form-control required"></td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Nama Wali</strong></br><small>(Khusus untuk nasabah dengan perwalian)</small></td>
                                <td width="60%" class="tdgenap"><input type="text" name="nama_wali" maxlength="255"  value="<?php echo @$item->nama_wali; ?>" class="form-control"></td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Alamat</strong></br><small>(Sesuai kartu identitas)</small></td>
                                <td width="60%" class="tdgenap">
                                  <input type="text" name="alamat_pribadi" maxlength="255"  value="<?php echo @$item->alamat; ?>" class="form-control required"></br>
                                  <div class="row">
                                  <label  class="col-md-3">
                                    RT/RW
                                  </label>
                                  <div class="col-md-9">
                                    <input type="text" name="rt_pribadi" maxlength="3" size="5"  value="<?php echo @$item->rt; ?>" class="formField required number_only">/<input type="text" name="rw_pribadi" maxlength="3"  value="<?php echo @$item->rw; ?>" size="5" class="formField required number_only">
                                  </div>
                                  </div></br>
                                  <div class="row">
                                    <label  class="col-md-3">
                                      Kelurahan
                                    </label>
                                    <div class="col-md-9">
                                      <input type="text" name="kelurahan_pribadi" maxlength="255"  value="<?php echo @$item->kelurahan; ?>" class="form-control required">
                                    </div>
                                  </div></br>
                                  <div class="row">
                                    <label  class="col-md-3">
                                      Kecamatan
                                    </label>
                                    <div class="col-md-9">
                                      <input type="text" name="kecamatan_pribadi" maxlength="255"  value="<?php echo @$item->kecamatan; ?>" class="form-control required">
                                    </div>
                                  </div></br>
                                  <div class="row">
                                    <label  class="col-md-3">
                                      Kota/DaTi
                                    </label>
                                    <div class="col-md-9">
                                      <input type="text" name="kota_pribadi" maxlength="255"  value="<?php echo @$item->kota; ?>" class="form-control required">
                                    </div>
                                  </div></br>
                                  <div class="row">
                                    <label  class="col-md-3">
                                      Kodepos
                                    </label>
                                    <div class="col-md-9">
                                      <input type="text" name="kodepos_pribadi" maxlength="255"  value="<?php echo @$item->kode_pos; ?>" class="form-control number_only required">
                                    </div>
                                  </div></br>
                                  <div class="row">
                                    <label  class="col-md-3">
                                      Propinsi
                                    </label>
                                    <div class="col-md-9">
                                      <input type="text" name="propinsi_pribadi" maxlength="255"  value="<?php echo @$item->propinsi; ?>" class="form-control required">
                                    </div>
                                  </div>
                                </td>
                            </tr>
                            <tr>
                              <td width="40%" class="tdganjil"><strong>Status Alamat</strong></td>
                              <td width="60%" class="tdgenap">
                                <div class="select-style">
                                  <select name="status_alamat" class="required">
                                    <option value="">--Pilih--</option> 
                                      <option value="milik_sendiri" <?php echo ($item->status_alamat=="milik_sendiri")? 'selected' : '' ?> >Milik Sendiri</option>
                                      <option value="kontrak" <?php echo ($item->status_alamat=="kontrak")? 'selected' : '' ?>>Kontrak</option>
                                      <option value="kos" <?php echo ($item->status_alamat=="kos")? 'selected' : '' ?>>Kos</option>
                                      <option value="milik_orang_tua" <?php echo ($item->status_alamat=="milik_orang_tua")? 'selected' : '' ?>>Milik Orang Tua/Keluarga</option>
                                      <option value="milik_perusahaan" <?php echo ($item->status_alamat=="milik_perusahaan")? 'selected' : '' ?>>Milik Perusahaan/Instanasi/Dinas</option>
                                  </select>
                                </div>
                              </td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Alamat Tinggal Saat Ini</strong></td>
                                <td width="60%" class="tdgenap">
                                  <input type="text" name="alama_saat_ini" maxlength="255"  value="<?php echo @$item->alamat_saat_ini; ?>" class="form-control required"></br>
                                  <div class="row">
                                  <label  class="col-md-3">
                                    RT/RW
                                  </label>
                                  <div class="col-md-9">
                                    <input type="text" maxlength="3" name="rt_saat_ini" size="5"  value="<?php echo @$item->rt_saat_ini; ?>" class="formField required number_only">/<input type="text" size="5" maxlength="3" name="rw_saat_ini"  value="<?php echo @$item->rw_saat_ini; ?>" class="formField required number_only">
                                  </div>
                                  </div></br>
                                  <div class="row">
                                    <label  class="col-md-3">
                                      Kelurahan
                                    </label>
                                    <div class="col-md-9">
                                      <input type="text" name="kelurahan_saat_ini" maxlength="255"  value="<?php echo @$item->kelurahan_saat_ini; ?>" class="form-control required">
                                    </div>
                                  </div></br>
                                  <div class="row">
                                    <label  class="col-md-3">
                                      Kecamatan
                                    </label>
                                    <div class="col-md-9">
                                      <input type="text" name="kecamatan_saat_ini" maxlength="255"  value="<?php echo @$item->kecamatan_saat_ini; ?>" class="form-control required">
                                    </div>
                                  </div></br>
                                  <div class="row">
                                    <label  class="col-md-3">
                                      Kota/DaTi
                                    </label>
                                    <div class="col-md-9">
                                      <input type="text" name="kota_saat_ini" maxlength="255"  value="<?php echo @$item->kota_saat_ini; ?>" class="form-control required">
                                    </div>
                                  </div></br>
                                  <div class="row">
                                    <label  class="col-md-3">
                                      Kodepos
                                    </label>
                                    <div class="col-md-9">
                                      <input type="text" name="kodepos_saat_ini" maxlength="255"  value="<?php echo @$item->kodepos_saat_ini; ?>" class="form-control number_only required">
                                    </div>
                                  </div></br>
                                  <div class="row">
                                    <label  class="col-md-3">
                                      Propinsi
                                    </label>
                                    <div class="col-md-9">
                                      <input type="text" name="propinsi_saat_ini" maxlength="255"  value="<?php echo @$item->propinsi_saat_ini; ?>" class="form-control required">
                                    </div>
                                  </div>
                                </td>
                            </tr>
                            <tr>
                              <td width="40%" class="tdganjil"><strong>Status Alamat</strong></td>
                              <td width="60%" class="tdgenap">
                                <div class="select-style">
                                  <select name="status_alamat_saat_ini" class="required">
                                    <option value="">--Pilih--</option>
                                    <option value="milik_sendiri" <?php echo ($item->status_alamat=="milik_sendiri")? 'selected' : '' ?> >Milik Sendiri</option>
                                    <option value="kontrak" <?php echo ($item->status_alamat=="kontrak")? 'selected' : '' ?>>Kontrak</option>
                                    <option value="kos" <?php echo ($item->status_alamat=="kos")? 'selected' : '' ?>>Kos</option>
                                    <option value="milik_orang_tua" <?php echo ($item->status_alamat=="milik_orang_tua")? 'selected' : '' ?>>Milik Orang Tua/Keluarga</option>
                                    <option value="milik_perusahaan" <?php echo ($item->status_alamat=="milik_perusahaan")? 'selected' : '' ?>>Milik Perusahaan/Instanasi/Dinas</option>
                                  </select>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td width="40%" class="tdganjil"><strong>Lama Ditempati</strong></td>
                              <td width="60%" class="tdgenap">
                                <input type="text" name="tahun_lama_tinggal" maxlength="4"  value="<?php echo @$item->tahun_lama_tinggal; ?>" class="formField required number_only"> Tahun
                                <input type="text" name="bulan_lama_tinggal" maxlength="255"  value="<?php echo @$item->bulan_lama_tinggal; ?>" class="formField required number_only"> Bulan
                              </td>
                            </tr>
                            <tr>
                              <td width="40%" class="tdganjil"><strong>No Telepon</strong></br><small>(Termasuk kode area)</small></td>
                              <td width="60%" class="tdgenap">
                                (1) <input type="text" name="no_telepon1" maxlength="255"  value="<?php echo @$item->no_tlp_1; ?>" class="formField required number_only phone"> </br></br>
                                (2) <input type="text" name="no_telepon2" maxlength="255"  value="<?php echo @$item->no_tlp_2; ?>" class="formField required number_only phone">
                              </td>
                            </tr>
                            <tr>
                              <td width="40%" class="tdganjil"><strong>No Handphone</strong></td>
                              <td width="60%" class="tdgenap">
                                <input type="text" name="ponsel" maxlength="255"  value="<?php echo @$item->ponsel; ?>" class="form-control number_only required">
                              </td>
                            </tr>
                            <tr>
                              <td width="40%" class="tdganjil"><strong>Alamat E-mail</strong></td>
                              <td width="60%" class="tdgenap">
                                <input type="text" name="email" maxlength="255"  value="<?php echo @$item->email; ?>" class="form-control email">
                              </td>
                            </tr>
                            <tr>
                              <td width="40%" class="tdganjil"><strong>Tempat/Tanggal Lahir</strong></td>
                              <td width="60%" class="tdgenap">
                                <div class="row">
                                  <div class="col-sm-6">
                                    <input type="text" name="tempat_lahir" maxlength="255"  value="<?php echo @$item->tempat_lahir; ?>" class="form-control required">
                                  </div>
                                  <div class="col-sm-6">
                                    <div id="datetimepicker2" class="input-append date">
                                      <input name="tanggal_lahir" data-format="dd/MM/yyyy" type="text" value="<?php echo @$item->tgl_lahir; ?>" class="required" readonly></input>
                                      <span class="add-on"><i class="fa fa-calendar"></i></span>
                                    </div>
                                  </div>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td width="40%" class="tdganjil"><strong>Kewarganegraan</strong></td>
                              <td width="60%" class="tdgenap">
                                <div class="select-style">
                                  <select name="kewarganegaraan" id="select_warganegera" class="required">
                                    <option value="">--Pilih--</option>
                                    <option value="wni" <?php echo ($item->warganegara=="wni")?'selected':''?>>WNI</option>
                                    <option value="wna" <?php echo ($item->warganegara=="wna")?'selected':''?>>WNA</option>
                                  </select>
                                </div>
                                <label id="negara_asal">Negara Asal <input type="text" maxlength="255" id="negara_asal" name="negara_asal"  value="<?php echo @$item->negara_asal; ?>" class="formField required"></label>
                              </td>
                            </tr>
                            <tr>
                              <td width="40%" class="tdganjil"><strong>Jenis Kelamin</strong></td>
                              <td width="60%" class="tdgenap">
                                <div class="select-style">
                                  <select name="jenis_kelamin" class="required">
                                    <option value="">--Pilih--</option>
                                    <option value="laki-laki" <?php echo ($item->jenis_kelamin=="laki-laki")?'selected':''?>>Laki-Laki</option>
                                    <option value="perempuan" <?php echo ($item->jenis_kelamin=="perempuan")?'selected':''?>>Perempuan</option>
                                  </select>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td width="40%" class="tdganjil"><strong>Status Penduduk</strong></td>
                              <td width="60%" class="tdgenap">
                                <div class="select-style">
                                  <select name="status_penduduk" class="required">
                                    <option value="">--Pilih--</option>
                                    <option value="penduduk" <?php echo ($item->status_penduduk=="penduduk")?'selected':''?>>Penduduk</option>
                                    <option value="nonpenduduk" <?php echo ($item->status_penduduk=="nonpenduduk")?'selected':''?>>Non Penduduk</option>
                                  </select>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td width="40%" class="tdganjil"><strong>Tanda Pengenal</strong></td>
                              <td width="60%" class="tdgenap">
                                <div class="row">
                                  <div class="col-sm-12">
                                    <div class="select-style">
                                      <select name="tanda_pengenal" class="required">
                                        <option value="">--Pilih--</option>
                                        <option value="KTP" <?php echo ($item->id_pengenal=="KTP")?'selected':''?>>KTP</option>
                                        <option value="SIM" <?php echo ($item->id_pengenal=="SIM")?'selected':''?>>SIM</option>
                                        <option value="Passport" <?php echo ($item->id_pengenal=="Passport")?'selected':''?>>Passport</option>
                                        <option value="KIMS/KITAS" <?php echo ($item->id_pengenal=="KIMS/KITAS")?'selected':''?>>KIMS/KITAS</option>
                                        <option value="Kartu Pelajar" <?php echo ($item->id_pengenal=="Kartu Pelajar")?'selected':''?>>Kartu Pelajar</option>
                                      </select>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-sm-4">
                                    <label>No</label>
                                  </div>
                                  <div class="col-sm-8">
                                    <input type="text" name="no_tanda_pengenal" maxlength="255"  value="<?php echo @$item->no_pengenal; ?>" class="formField required">
                                  </div>
                                </div></br>
                                <div class="row">
                                  <div class="col-sm-4">
                                    <label>Diterbitkan Di</label>
                                  </div>
                                  <div class="col-sm-8">
                                    <input type="text" name="di_terbitkan" maxlength="255"  value="<?php echo @$item->diterbitkan_pengenal; ?>" class="formField required">
                                  </div>
                                </div></br>
                                <div class="row">
                                  <div class="col-sm-4">
                                    <label>Berlaku Hingga</label>
                                  </div>
                                  <div class="col-sm-8">
                                    <div id="datetimepicker2" class="input-append date">
                                      <input name="berlaku_hingga" data-format="dd/MM/yyyy" value="<?php echo @$item->masa_berlaku_pengenal; ?>" type="text" class="required"></input>
                                      <span class="add-on"><i class="fa fa-calendar"></i></span>
                                    </div>
                                    Atau
                                    <label> <input type="checkbox" name="seumur_hidup" value="seumur_hidup" <?php echo (@$item->masa_berlaku_pengenal == 'seumur_hidup')?'checked':'' ?>> Seumur Hidup</label>
                                  </div>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td width="40%" class="tdganjil"><strong>Tanda Pengenal Tambahan</strong></td>
                              <td width="60%" class="tdgenap">
                                <div class="row">
                                  <div class="col-sm-12">
                                    <div class="select-style">
                                      <select name="tanda_pengenal_tambahan" id="tanda_pengenal_tambahan">
                                        <option value="">--Pilih--</option>
                                        <option value="NPWP" <?php echo ($item->id_pengenal_tambahan=="NPWP")?'selected':''?>>NPWP</option>
                                        <option value="Surat Keterangan Domisili" <?php echo ($item->id_pengenal_tambahan=="Surat Keterangan Domisili")?'selected':''?>>Surat Keterangan Domisili</option>
                                        <option value="Surat Keterangan Kerja" <?php echo ($item->id_pengenal_tambahan=="Surat Keterangan Kerja")?'selected':''?>>Surat Keterangan Kerja</option>
                                      </select>
                                    </div>
                                  </div>
                                </div>
                                 <div class="row">
                                  <div class="col-sm-4">
                                    <label>No</label>
                                  </div>
                                  <div class="col-sm-8">
                                    <input type="text" name="no_tanda_pengenal_tambahan" id="no_tanda_pengenal_tambahan" maxlength="255"  value="<?php echo @$item->no_pengenal_tambahan; ?>" class="formField">
                                  </div>
                                </div></br>
                                <div class="row">
                                  <div class="col-sm-4">
                                    <label>Diterbitkan Di</label>
                                  </div>
                                  <div class="col-sm-8">
                                    <input type="text" name="di_terbitkan_tambahan" maxlength="255"  value="<?php echo @$item->diterbitkan_pengenal_tambahan; ?>" class="formField">
                                  </div>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td width="40%" class="tdganjil"><strong>Agama</strong></td>
                              <td width="60%" class="tdgenap">
                                <div class="row">
                                  <div class="col-sm-12"> 
                                    <div class="select-style">
                                      <select name="agama" class="required" id="select_agama">
                                        <option value="">--Pilih--</option>
                                        <option value="Islam" <?php echo ($item->agama=="Islam")?'selected':''?>>Islam</option>
                                        <option value="Kristen" <?php echo ($item->agama=="Kristen")?'selected':''?>>Kristen</option>
                                        <option value="Katolik" <?php echo ($item->agama=="Katolik")?'selected':''?>>Katolik</option>
                                        <option value="Hindu" <?php echo ($item->agama=="Hindu")?'selected':''?>>Hindu</option>
                                        <option value="Budha" <?php echo ($item->agama=="Budha")?'selected':''?>>Budha</option>
                                        <option value="Konghucu" <?php echo ($item->agama=="Konghucu")?'selected':''?>>Konghucu</option>
                                        <option value="lainnya" <?php echo ($item->agama=="lainnya")?'selected':''?>>Lainnya</option>
                                      </select>
                                    </div>
                                    <input type="text" id="agama_lainnya" name="agama_lainnya" maxlength="255"  value="<?php echo @$item->agama_lainnya; ?>" class="formField required" placeholder="Lainnya">
                                  </div>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td width="40%" class="tdganjil"><strong>Status Perkawinan</strong></td>
                              <td width="60%" class="tdgenap">
                                <div class="row">
                                  <div class="col-sm-12">
                                    <div class="select-style">
                                      <select name="status_perkawinan" class="required">
                                        <option value="">--Pilih--</option>
                                        <option value="Kawin" <?php echo ($item->status_kawin=="Kawin")?'selected':''?>>Kawin</option>
                                        <option value="Belum Kawin" <?php echo ($item->status_kawin=="Belum Kawin")?'selected':''?>>Belum Kawin</option>
                                        <option value="Janda" <?php echo ($item->status_kawin=="Janda")?'selected':''?>>Janda</option>
                                        <option value="Duda" <?php echo ($item->status_kawin=="Duda")?'selected':''?>>Duda</option>
                                      </select>
                                    </div>
                                  </div>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td width="40%" class="tdganjil"><strong>Jumlah Anak/Tanggungan</strong></td>
                              <td width="60%" class="tdgenap">
                                <div class="row">
                                  <div class="col-sm-4">
                                    <label><input type="checkbox" <?php echo ($item->jumlah_anak!="")?'checked':''?>> Anak</label>
                                  </div>
                                  <div class="col-sm-8">
                                    <input type="text" maxlength="255" name="jumlah_anak"  value="<?php echo @$item->jumlah_anak; ?>" class="formField number_only">
                                  </div>
                                </div></br>
                                <div class="row">
                                  <div class="col-sm-4">
                                    <label><input type="checkbox" <?php echo ($item->jumlah_tanggungan!="")?'checked':''?>> Tanggungan</label>
                                  </div>
                                  <div class="col-sm-8">
                                    <input type="text" maxlength="255" name="jumlah_tanggungan" value="<?php echo @$item->jumlah_tanggungan; ?>" class="formField number_only"> Orang
                                  </div>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td width="40%" class="tdganjil"><strong>Pendidikan</strong></td>
                              <td width="60%" class="tdgenap">
                                <div class="row">
                                  <div class="col-sm-12">
                                    <div class="select-style">
                                      <select name="pendidikan" class="required">
                                        <option value="">--Pilih--</option>
                                        <option value="SD" <?php echo ($item->pendidikan=="SD")?'selected':''?>>SD</option>
                                        <option value="SLTP" <?php echo ($item->pendidikan=="SLTP")?'selected':''?>>SLTP</option>
                                        <option value="SLTA" <?php echo ($item->pendidikan=="SLTA")?'selected':''?>>SLTA</option>
                                        <option value="DI" <?php echo ($item->pendidikan=="DI")?'selected':''?>>DI</option>
                                        <option value="DII" <?php echo ($item->pendidikan=="DII")?'selected':''?>>DII</option>
                                        <option value="DIII" <?php echo ($item->pendidikan=="DIII")?'selected':''?>>DIII</option>
                                        <option value="S1" <?php echo ($item->pendidikan=="S1")?'selected':''?>>S1</option>
                                        <option value="S2" <?php echo ($item->pendidikan=="S2")?'selected':''?>>S2</option>
                                        <option value="S3" <?php echo ($item->pendidikan=="S3")?'selected':''?>>S3</option>
                                      </select>
                                    </div>
                                  </div>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td width="40%" class="tdganjil"><strong>Nama Gadis Ibu Kandung</strong></td>
                              <td width="60%" class="tdgenap"><input type="text" name="nama_gadis_ibu_kandung" maxlength="255"  value="<?php echo @$item->nama_gadis_ibu_kandung; ?>" class="form-control required"></td>
                            </tr>
                            <tr>
                              <td width="40%" class="tdganjil"><strong>Dalam Keadaan Darurat Pihak Yang Dapat Dihubungi</strong></td>
                            </tr>
                            <tr>
                              <td width="40%" class="tdganjil"><strong>Nama Lengkap</strong></td>
                              <td width="60%" class="tdgenap"><input type="text" name="nama_lengkap_relasi" maxlength="255"  value="<?php echo @$item->nama_lengkap_relasi; ?>" class="form-control required"></td>
                            </tr>
                            <tr>
                              <td width="40%" class="tdganjil"><strong>Alamat</strong></td>
                              <td width="60%" class="tdgenap"><input type="text" maxlength="255" name="alamat_relasi" value="<?php echo @$item->alamat_relasi; ?>" class="form-control required"></td>
                            </tr>
                            <tr>
                              <td width="40%" class="tdganjil"><strong>No Telp/HP</strong></td>
                              <td width="60%" class="tdgenap">
                                <input type="text" name="telepon_relasi" maxlength="255"  value="<?php echo @$item->no_tlp_relasi; ?>" class="formField required number_only phone">/<input type="text" name="hp_relasi" maxlength="255"  value="<?php echo @$item->no_hp_relasi; ?>" class="formField required number_only">
                              </td>
                            </tr>
                            <tr>
                              <td width="40%" class="tdganjil"><strong>Hubungan Dengan Nasabah</strong></td>
                              <td width="60%" class="tdgenap"><input type="text" name="hubungan_nasabah" maxlength="255"  value="<?php echo @$item->hubungan_nasabah; ?>" class="form-control required"></td>
                            </tr>

                        </tbody>
                    </table>

                    <h3>Data Pekerjaan</h3>
                    <table class="table">
                        <tbody>                            
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Bidang Usaha</strong></td>
                                <td width="60%" class="tdgenap">
                                  <div class="row">
                                    <div class="col-sm-12">
                                      <div class="select-style">
                                        <select name="bidang_usaha" class="required" id="bidang_usaha">
                                          <option value="">--Pilih--</option>
                                          <option value="Pertanian, Perburuan dan Pertanian" <?php echo ($item->bidang_usaha=="Pertanian, Perburuan dan Pertanian")?'selected':''?>> Pertanian, Perburuan dan Pertanian</option>
                                          <option value="Pertambangan" <?php echo ($item->bidang_usaha=="Pertambangan")?'selected':''?>> Pertambangan</option>
                                          <option value="Perindustrian" <?php echo ($item->bidang_usaha=="Perindustrian")?'selected':''?>> Perindustrian</option>
                                          <option value="Listrik, Gas & Air" <?php echo ($item->bidang_usaha=="Listrik, Gas & Air")?'selected':''?>> Listrik, Gas & Air</option>
                                          <option value="Konstruksi" <?php echo ($item->bidang_usaha=="Konstruksi")?'selected':''?>> Konstruksi</option>
                                          <option value="Perdagangan, Restoran dan Hotel" <?php echo ($item->bidang_usaha=="Perdagangan, Restoran dan Hotel")?'selected':''?>> Perdagangan, Restoran dan Hotel</option>
                                          <option value="Pengangkutan, Pergudangan & Komunikasi" <?php echo ($item->bidang_usaha=="Pengangkutan, Pergudangan & Komunikasi")?'selected':''?>> Pengangkutan, Pergudangan & Komunikasi</option>
                                          <option value="Jasa-jasa Dunia Usaha" <?php echo ($item->bidang_usaha=="Jasa-jasa Dunia Usaha")?'selected':''?>> Jasa-jasa Dunia Usaha</option>
                                          <option value="Jasa-jasa Sosial Masyarakat" <?php echo ($item->bidang_usaha=="Jasa-jasa Sosial Masyarakat")?'selected':''?>> Jasa-jasa Sosial Masyarakat</option>
                                          <option value="Jasa-Jasa Keuangan & Perbankan" <?php echo ($item->bidang_usaha=="Jasa-Jasa Keuangan & Perbankan")?'selected':''?>> Jasa-Jasa Keuangan & Perbankan</option>
                                          <option value="lainnya" <?php echo ($item->bidang_usaha=="lainnya")?'selected':''?>> Lain-Lain</option>
                                        </select>
                                      </div>
                                      <input type="text" maxlength="255" name="bidang_usaha_lainnya" id="bidang_usaha_lainnya" value="<?php echo @$item->bidang_usaha_lainnya; ?>" class="formField" placeholder="Lain-Lain">
                                    </div>
                                  </div>
                                </td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Jenis Pekerjaan</strong></td>
                                <td width="60%" class="tdgenap">
                                  <div class="row">
                                    <div class="col-sm-12">
                                      <div class="select-style">
                                        <select name="jenis_pekerjaan" class="required" id="jenis_pekerjaan">
                                          <option value="">--Pilih--</option>
                                          <option value="Akunting/Keuangan" <?php echo ($item->jenis_pekerjaan=="Akunting/Keuangan")?'selected':''?>> Akunting/Keuangan</option>
                                          <option value="Customer Service" <?php echo ($item->jenis_pekerjaan=="Customer Service")?'selected':''?>> Customer Service</option>
                                          <option value="Engineering" <?php echo ($item->jenis_pekerjaan=="Engineering")?'selected':''?>> Engineering</option>
                                          <option value="Eksekutif" <?php echo ($item->jenis_pekerjaan=="Eksekutif")?'selected':''?>> Eksekutif</option>
                                          <option value="Administrasi Umum" <?php echo ($item->jenis_pekerjaan=="Administrasi Umum")?'selected':''?>> Administrasi Umum</option>
                                          <option value="Komputer" <?php echo ($item->jenis_pekerjaan=="Komputer")?'selected':''?>> Komputer</option>
                                          <option value="Konsultan" <?php echo ($item->jenis_pekerjaan=="Konsultan")?'selected':''?>> Konsultan</option>
                                          <option value="Marketing" <?php echo ($item->jenis_pekerjaan=="Marketing")?'selected':''?>> Marketing</option>
                                          <option value="Pendidikan" <?php echo ($item->jenis_pekerjaan=="Pendidikan")?'selected':''?>> Pendidikan</option>
                                          <option value="Pemerintahan" <?php echo ($item->jenis_pekerjaan=="Pemerintahan")?'selected':''?>> Pemerintahan</option>
                                          <option value="Militer" <?php echo ($item->jenis_pekerjaan=="Militer")?'selected':''?>> Militer</option>
                                          <option value="Pensiunan" <?php echo ($item->jenis_pekerjaan=="Pensiunan")?'selected':''?>> Pensiunan</option>
                                          <option value="Pelajar/Mahasiswa" <?php echo ($item->jenis_pekerjaan=="Pelajar/Mahasiswa")?'selected':''?>> Pelajar/Mahasiswa</option>
                                          <option value="Wiraswasta" <?php echo ($item->jenis_pekerjaan=="Wiraswasta")?'selected':''?>> Wiraswasta</option>
                                          <option value="Profesional" <?php echo ($item->jenis_pekerjaan=="Profesional")?'selected':''?>> Profesional</option>
                                          <option value="Dokter" <?php echo ($item->jenis_pekerjaan=="Dokter")?'selected':''?>> Dokter</option>
                                          <option value="Pengacara" <?php echo ($item->jenis_pekerjaan=="Pengacara")?'selected':''?>> Pengacara</option>
                                          <option value="Akuntan" <?php echo ($item->jenis_pekerjaan=="Akuntan")?'selected':''?>> Akuntan</option>
                                          <option value="lainnya" <?php echo ($item->jenis_pekerjaan=="lainnya")?'selected':''?>> Lain-Lain</option>
                                        </select>
                                      </div>
                                      <input type="text" maxlength="255" name="jenis_pekerjaan_lainnya" id="jenis_pekerjaan_lainnya" value="<?php echo @$item->jenis_pekerjaan_lainnya; ?>" class="formField" placeholder="Lain-Lain">
                                    </div>
                                  </div>
                                </td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Pangkat/Jabatan</strong></td>
                                <td width="60%" class="tdgenap"><input type="text" name="jabatan" maxlength="255"  value="<?php echo @$item->jabatan; ?>" class="form-control required"></td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Nama Perusahaan/Instansi</strong></td>
                                <td width="60%" class="tdgenap"><input type="text" name="nama_perusahaan" maxlength="255"  value="<?php echo @$item->nama_perusahaan; ?>" class="form-control required"></td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Alamat Perusahaan/Instansi</strong></td>
                                <td width="60%" class="tdgenap">
                                  <input type="text" name="alamat_perusahaan" maxlength="255"  value="<?php echo @$item->alamat_perusahaan; ?>" class="form-control required"></br>
                                  <div class="row">
                                  <label  class="col-md-3">
                                    RT/RW
                                  </label>
                                  <div class="col-md-9">
                                    <input type="text" maxlength="3" size="5" name="rt_perusahaan"  value="<?php echo @$item->rt_perusahaan; ?>" class="formField number_only">/<input type="text" size="5" maxlength="3"  value="<?php echo @$item->rw_perusahaan; ?>" name="rw_perusahaan" class="formField number_only">
                                  </div>
                                  </div></br>
                                  <div class="row">
                                    <label  class="col-md-3">
                                      Kelurahan
                                    </label>
                                    <div class="col-md-9">
                                      <input type="text" name="kelurahan_perusahaan" maxlength="255"  value="<?php echo @$item->kelurahan_perusahaan; ?>" class="form-control">
                                    </div>
                                  </div></br>
                                  <div class="row">
                                    <label  class="col-md-3">
                                      Kecamatan
                                    </label>
                                    <div class="col-md-9">
                                      <input type="text" name="kecamatan_perusahaan" maxlength="255"  value="<?php echo @$item->kecamatan_perusahaan; ?>" class="form-control required">
                                    </div>
                                  </div></br>
                                  <div class="row">
                                    <label  class="col-md-3">
                                      Kota/DaTi
                                    </label>
                                    <div class="col-md-9">
                                      <input type="text" name="kota_perusahaan" maxlength="255"  value="<?php echo @$item->kota_perusahaan; ?>" class="form-control required">
                                    </div>
                                  </div></br>
                                  <div class="row">
                                    <label  class="col-md-3">
                                      Kodepos
                                    </label>
                                    <div class="col-md-9">
                                      <input type="text" name="kodepos_perusahaan" maxlength="255"  value="<?php echo @$item->kodepos_perusahaan; ?>" class="form-control required number_only">
                                    </div>
                                  </div></br>
                                  <div class="row">
                                    <label  class="col-md-3">
                                      Propinsi
                                    </label>
                                    <div class="col-md-9">
                                      <input type="text" name="propinsi_perusahaan" maxlength="255"  value="<?php echo @$item->provinsi_perusahaan; ?>" class="form-control required">
                                    </div>
                                  </div>
                                </td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>No Telepon</strong><br/><small>(termasuk kode area)</small></td>
                                <td width="60%" class="tdgenap"><input type="text" name="no_telepon_perusahaan" maxlength="255"  value="<?php echo @$item->tlp_perusahaan; ?>" class="formField required number_only phone"></td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>No Facsimile</strong><br/><small>(termasuk kode area)</small></td>
                                <td width="60%" class="tdgenap"><input type="text" name="fax_perusahaan" maxlength="255"  value="<?php echo @$item->fax_perusahaan; ?>" class="formField required phone"></td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Email</strong></td>
                                <td width="60%" class="tdgenap"><input type="text" name="email_perusahaan" maxlength="255"  value="<?php echo @$item->email_perusahaan; ?>" class="formField email"></td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Website</strong></td>
                                <td width="60%" class="tdgenap"><input type="text" maxlength="255" name="website_perusahaan" value="<?php echo @$item->website_perusahaan; ?>" class="formField"></td>
                            </tr>
                        </tbody>
                    </table>

                    <h3>Data Penghasilan Kotor Perbulan</h3>
                    <table class="table">
                        <tbody>
                          <tr>
                            <td width="40%" class="tdganjil"><strong>Penghasilan Pemohon</strong></td>
                            <td width="60%" class="tdgenap">
                              <div class="row">
                                  <div class="col-sm-12">
                                    <div class="select-style">
                                      <select name="penghasilan" id="select_penghasilan" class="required">
                                        <option value="">--Pilih--</option>
                                        <option value="< 1 Juta" <?php echo ($item->penghasilan_pemohon=="< 1 Juta")?'selected':''?>> < 1 Juta</option>
                                        <option value="> 1 Juta s/d 5 Juta" <?php echo ($item->penghasilan_pemohon=="> 1 Juta s/d 5 Juta")?'selected':''?>> > 1 Juta s/d 5 Juta</option>
                                        <option value="> 5 Juta s/d 10 Juta" <?php echo ($item->penghasilan_pemohon=="> 5 Juta s/d 10 Juta")?'selected':''?>> > 5 Juta s/d 10 Juta </option>
                                        <option value="> 10 Juta s/d 25 Juta" <?php echo ($item->penghasilan_pemohon=="> 10 Juta s/d 25 Juta")?'selected':''?>> > 10 Juta s/d 25 Juta </option>
                                        <option value="> 25 Juta" <?php echo ($item->penghasilan_pemohon=="> 25 Juta")?'selected':''?>> > 25 Juta </option>
                                        <option value="lainnya" <?php echo ($item->penghasilan_pemohon=="lainnya")?'selected':''?>> Lainnya</option>
                                      </select>
                                    </div>
                                    <input type="text" id="penghasilan_lainnya" name="penghasilan_lainnya" maxlength="255"  value="<?php echo @$item->penghasilan_pemohon_lainnya; ?>" class="formField required">
                                  </div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td width="40%" class="tdganjil">
                              <strong>Penghasilan Tambahan</strong>                              
                            </td>
                            <td width="60%" class="tdgenap">
                              <div class="row">
                                <div class="col-sm-12">
                                  <div class="select-style">
                                    <select name="penghasilan_tambahan" id="select_hasil_tambahan" class="required">
                                      <option value="">--Pilih--</option>
                                      <option value="< 1 Juta" <?php echo ($item->penghasilan_tambahan=="< 1 Juta")?'selected':''?>> < 1 Juta</option>
                                      <option value="> 1 Juta s/d 6 Juta" <?php echo ($item->penghasilan_tambahan=="> 1 Juta s/d 6 Juta")?'selected':''?>> > 1 Juta s/d 6 Juta</option>
                                      <option value="> 6 Juta s/d 10 Juta" <?php echo ($item->penghasilan_tambahan=="> 6 Juta s/d 10 Juta")?'selected':''?>> > 6 Juta s/d 10 Juta </option>
                                      <option value="> 10 Juta s/d 25 Juta" <?php echo ($item->penghasilan_tambahan=="> 10 Juta s/d 25 Juta")?'selected':''?>> > 10 Juta s/d 25 Juta </option>
                                      <option value="> 25 Juta" <?php echo ($item->penghasilan_tambahan=="> 25 Juta")?'selected':''?>> > 25 Juta </option>
                                      <option value="lainnya" <?php echo ($item->penghasilan_tambahan=="lainnya")?'selected':''?>>Lainnya</option>
                                    </select>
                                  </div>
                                  <input type="text" maxlength="255" name="hasil_tambahan_lainnya" value="<?php echo $item->penghasilan_tambahan_lainnya; ?>" id="hasil_tambahan_lainnya" class="formField required">
                                </div>
                              </div>
                            </td>
                          </tr>
                          <?php } ?>
                        </tbody>
                    </table>
                    <h3 style="display:none;">Photo & Tanda Tangan</h3>
                    <table class="table" style="display:none;">
                      <tr>
                        <td width="40%" class="tdganjil"><strong>Photo</strong></br><small>jpg,jpeg,png Max 1Mb</small></td>
                        <td width="60%" class="tdgenap"><input type="file" accept=".jpg,.png,.jpeg" maxlength="255" id="fileupload" name="image_foto" value="<?php echo $item->photo; ?>" class="formField fileupload" multiple></td>
                      </tr>
                      <tr>
                        <td width="40%" class="tdganjil"><strong>Tanda Tangan</strong></br><small>jpg,jpeg,png Max 1Mb</small></td>
                        <td width="60%" class="tdgenap"><input type="file" accept=".jpg,.png,.jpeg" maxlength="255" id="filettd" name="image_ttd" value="<?php echo $item->tanda_tangan; ?>" class="formField fileupload" multiple></td>
                      </tr>
                    </table>
                  </div> 
                  <div class="box-btn">
                    <a href="" class="btn btn-yellow">Batal</a>
                    <a href="javascript:void(0)" id="updateCifPerorangan" class="btn btn-primary" >Update</a>
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