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

<section id="form-cif-perorangan">
    <div class="container">
        <div class="headline">
            <div class="icon-form">
                <i class="fa fa-file-text-o"></i>
            </div>
            <h2>FORMULIR DATA NASABAH PERORANGAN</h2>
        </div>
        <div class="row">
            <div class="form-child">
              <form id="cifRegistration" class="form-horizontal">
              <input type="hidden" name="app_code" value="DGB" />
              <input type="hidden" name="jenis_cif" value="perorangan">
              <input type="hidden" name="id_produk" id="id_produk" value="<?php echo $jenis_produk->ID_PRODUCT; ?>">
                <div class="data-diri">
                    <h3>Data Pribadi</h3>
                    <table class="table">
                        <tbody>
                            <tr>
                              <td width="40%" class="tdganjil"><strong>Tanda Pengenal</strong><span>*</span></td>
                              <td width="60%" class="tdgenap">
                                <div class="row">
                                  <div class="col-sm-12">
                                    <div class="select-style">
                                      <select name="id_pengenal" class="required">
                                        <option value="KT" selected>KTP</option>
                                        <option value="SM">SIM</option>
                                        <option value="PP">Passport</option>
                                        <option value="KI">KIMS/KITAS</option>
                                        <option value="KP">Kartu Pelajar</option>
                                      </select>
                                    </div>
                                  </div>
                                </div></br>
                                <div class="row">
                                  <div class="col-sm-4">
                                    <label>No</label>
                                  </div>
                                  <div class="col-sm-8">
                                    <input type="text" name="no_pengenal" maxlength="25" size="30" value="" class="formField number_only required">
                                  </div>
                                </div></br>
                                <div class="row">
                                  <div class="col-sm-4">
                                    <label>Diterbitkan Di</label>
                                  </div>
                                  <div class="col-sm-8">
                                    <input type="text" name="diterbitkan_pengenal" maxlength="100" size="30" value="" class="formField required upper">
                                  </div>
                                </div></br>
                                <div class="row">
                                  <div class="col-sm-4">
                                    <label>Berlaku Hingga</label>
                                  </div>
                                  <div class="col-sm-8">
                                    <div id="datetimepicker2" class="input-append date">
                                      <input name="masa_berlaku_pengenal" data-format="dd/MM/yyyy" type="text" class="required input_tanggal number_only"></input>
                                      <span class="add-on"><i class="fa fa-calendar"></i></span>&nbsp<small>dd/mm/yyyy</small>
                                    </div>
                                    Atau
                                    <label> <input type="checkbox" name="no_pengenal_seumur_hidup" value="seumur_hidup"> Seumur Hidup</label>
                                  </div>
                                </div>
                              </td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Sudah Memiliki Rekening Di Bank BTN ? </strong><span>*</span></td>
                                <td>
                                  <div class="select-style">
                                    <select name="rekeningBTN" class="required" id="rekeningBTN">
                                      <option value="Sudah">Sudah</option>
                                      <option value="Belum" selected>Belum</option>
                                    </select>
                                  </div>
                                  <label class="norekk" style="margin-left:20px;">No. Rekening</label><input size="27" name="norekk" class="form_field norekk number_only" id="norekk" type="text" style="margin-left:10px;">
                                </td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Nama Lengkap</strong><span>*</span></br><small>(Sesuai kartu identitas)</small></td>
                                <td width="60%" class="tdgenap">
                                  <input type="text" name="nama_sesuai_identitas" id="nama_lengkap" maxlength="40" size="68" value="" class="formField upper required">
                                </td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Nama Lengkap</strong><span>*</span></br><small>(Tanpa singkatan dan gelar)</small></td>
                                <td width="60%" class="tdgenap">
                                  <input type="text" name="nama_tanpa_gelar" id="nama_lengkap_tanpa_gelar" maxlength="40" size="68" value="" class="formField required upper">
                                </td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Gelar Sebelum Nama</strong></td>
                                <td width="60%" class="tdgenap"><input type="text" name="gelar_sebelum_nama" maxlength="15" size="68" value="" class="formField"></td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Gelar Setelah Nama</strong></td>
                                <td width="60%" class="tdgenap"><input type="text" name="gelar_setelah_nama" maxlength="15" size="68" value="" class="formField"></td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Nama Alias</strong></td>
                                <td width="60%" class="tdgenap">
                                  <input type="text" name="nama_alias" maxlength="40" size="68" value="" class="formField upper">
                                </td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Nama Wali</strong></br><small>(Khusus untuk nasabah dengan perwalian)</small></td>
                                <td width="60%" class="tdgenap"><input type="text" name="nama_wali" maxlength="40" size="68" value="" class="formField upper"></td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Alamat</strong><span>*</span></br><small>(Sesuai kartu identitas)</small></td>
                                <td width="60%" class="tdgenap">
                                  <input type="text" name="alamat" maxlength="40"  value="" size="68" class="formField required upper"></br></br>
                                  <div class="row">
                                  <label class="col-md-3">
                                    RT/RW
                                  </label>
                                  <div class="col-md-9">
                                    <input type="text" name="rt" maxlength="5" size="5"  value="" class="formField number_only">/<input type="text" name="rw" maxlength="5"  value="" size="5" class="formField number_only">
                                  </div>
                                  </div></br>
                                  <div class="row">
                                    <label class="col-md-3">
                                      Kelurahan
                                    </label>
                                    <div class="col-md-9">
                                      <input type="text" name="kelurahan" maxlength="40" size="48" value="" class="formField required upper">
                                    </div>
                                  </div></br>
                                  <div class="row">
                                    <label  class="col-md-3">
                                      Kecamatan
                                    </label>
                                    <div class="col-md-9">
                                      <input type="text" name="kecamatan" maxlength="40" size="48" value="" class="formField required upper">
                                    </div>
                                  </div></br>
                                  <div class="row">
                                    <label  class="col-md-3">
                                      Kota/DaTi
                                    </label>
                                    <div class="col-md-9">
                                      <input type="text" name="kota" maxlength="40" size="48" value="" class="formField required upper">
                                    </div>
                                  </div></br>
                                  <div class="row">
                                    <label  class="col-md-3">
                                      Kodepos
                                    </label>
                                    <div class="col-md-9">
                                      <input type="text" name="kode_pos" maxlength="9" size="48" value="" class="formField number_only required upper">
                                    </div>
                                  </div><br>
                                  <div class="row">
                                    <label  class="col-md-3">
                                      Propinsi
                                    </label>
                                    <div class="col-md-9">
                                      <input type="text" name="propinsi" maxlength="40" size="48"  value="" class="formField required upper">
                                    </div>
                                  </div>
                                </td>
                            </tr>
                            <tr>
                              <td width="40%" class="tdganjil"><strong>Status Alamat</strong><span>*</span></td>
                              <td width="60%" class="tdgenap">
                                <div class="select-style">
                                  <select name="status_alamat" id="status_alamat" class="required">
                                    <option value="" selected>--Pilih--</option>
                                    <option value="milik_sendiri">Milik Sendiri</option>
                                    <option value="kontrak">Kontrak</option>
                                    <option value="kos">Kos</option>
                                    <option value="milik_orang_tua">Milik Orang Tua/Keluarga</option>
                                    <option value="milik_perusahaan">Milik Perusahaan/Instanasi/Dinas</option>
                                  </select>
                                </div>
                              </td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil">
                                  <strong>Alamat Tinggal Saat Ini</strong><span>*</span>
                                </td>
                                <td width="60%" class="tdgenap">
                                  <div class="row">
                                    <div class="col-md-12">
                                      <input type="checkbox" name="alamat_sesuai_dengan_identitas" id="alamat_sesuai_dengan_identitas" value="sama_dengan_identitas"> Alamat Sesuai Dengan Kartu Identitas</br>
                                    </div>
                                  </div>
                                  <div class="row">
                                  <label class="col-md-3">
                                    Alamat
                                  </label>
                                  <div class="col-md-9">
                                    <input type="text" name="alamat_saat_ini" maxlength="40" size="48" value="" class="formField required upper">
                                  </div>
                                  </div></br>
                                  <div class="row">
                                  <label  class="col-md-3">
                                    RT/RW
                                  </label>
                                  <div class="col-md-9">
                                    <input type="text" maxlength="5" name="rt_saat_ini" size="5"  value="" class="formField number_only upper">/<input type="text" size="5" maxlength="5" name="rw_saat_ini"  value="" class="formField number_only upper">
                                  </div>
                                  </div></br>
                                  <div class="row">
                                    <label  class="col-md-3">
                                      Kelurahan
                                    </label>
                                    <div class="col-md-9">
                                      <input type="text" name="kelurahan_saat_ini" maxlength="40" size="48" value="" class="formField required upper">
                                    </div>
                                  </div></br>
                                  <div class="row">
                                    <label  class="col-md-3">
                                      Kecamatan
                                    </label>
                                    <div class="col-md-9">
                                      <input type="text" name="kecamatan_saat_ini" maxlength="40" size="48" value="" class="formField required upper">
                                    </div>
                                  </div></br>
                                  <div class="row">
                                    <label  class="col-md-3">
                                      Kota/DaTi
                                    </label>
                                    <div class="col-md-9">
                                      <input type="text" name="kota_saat_ini" maxlength="40" size="48" value="" class="formField required upper">
                                    </div>
                                  </div></br>
                                  <div class="row">
                                    <label  class="col-md-3">
                                      Kodepos
                                    </label>
                                    <div class="col-md-9">
                                      <input type="text" name="kodepos_saat_ini" maxlength="9" size="48" value="" class="formField number_only required upper">
                                    </div>
                                  </div><br>
                                  <div class="row">
                                    <label class="col-md-3">
                                      Propinsi
                                    </label>
                                    <div class="col-md-9">
                                      <input type="text" name="propinsi_saat_ini" maxlength="40" size="48" value="" class="formField required upper">
                                    </div>
                                  </div>
                                </td>
                            </tr>
                            <tr>
                              <td width="40%" class="tdganjil"><strong>Status Alamat</strong><span>*</span></td>
                              <td width="60%" class="tdgenap">
                                <div class="select-style">
                                  <select name="status_alamat_saat_ini" id="status_alamat_saat_ini" class="required">
                                    <option value="" selected>--Pilih--</option>
                                    <option value="milik_sendiri">Milik Sendiri</option>
                                    <option value="kontrak">Kontrak</option>
                                    <option value="kos">Kos</option>
                                    <option value="milik_orang_tua">Milik Orang Tua/Keluarga</option>
                                    <option value="milik_perusahaan">Milik Perusahaan/Instanasi/Dinas</option>
                                  </select>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td width="40%" class="tdganjil"><strong>Lama Ditempati</strong></td>
                              <td width="60%" class="tdgenap">
                                <div class="row" >
                                  <div class="col-md-6">
                                    Tahun</br> <input type="text" name="tahun_lama_tinggal" maxlength="10"  value="" class="formField number_only">
                                  </div>
                                  <div class="col-md-6">
                                    Bulan</br> <input type="text" name="bulan_lama_tinggal" maxlength="10"  value="" class="formField number_only">
                                  </div>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td width="40%" class="tdganjil"><strong>HP/No Telp</strong><span>*</span></td>
                              <td width="60%" class="tdgenap">
                                <input type="text" name="hp_no" maxlength="20" value="" class="formfield number_only required">/<input type="text" name="telp_number" maxlength="20" value="" class="formfield phone required">
                              </td>
                            </tr>
                            <tr>
                              <td width="40%" class="tdganjil"><strong>No Ponsel</strong></td>
                              <td width="60%" class="tdgenap">
                                <input type="text" name="ponsel" maxlength="20" size="68" value="" class="formField number_only">
                              </td>
                            </tr>
                            <tr>
                              <td width="40%" class="tdganjil"><strong>Alamat E-mail</strong><span>*</span></td>
                              <td width="60%" class="tdgenap">
                                <input type="text" name="email" maxlength="30" size="68" value="" class="formField email required">
                              </td>
                            </tr>
                            <tr>
                              <td width="40%" class="tdganjil"><strong>Tempat/Tanggal Lahir</strong><span>*</span></td>
                              <td width="60%" class="tdgenap">
                                <div class="row">
                                  <div class="col-sm-5">
                                    <input type="text" name="tempat_lahir" maxlength="100" size="27" value="" class="formfield required upper">
                                  </div>
                                  <div class="col-sm-7">
                                    <div id="datetimepickerTgl" class="input-append date">
                                      <input name="tgl_lahir" id="tanggal_lahir" data-format="dd/MM/yyyy" type="text" class="required input_tanggal number_only"></input>
                                      <span class="add-on"><i class="fa fa-calendar"></i></span>&nbsp<small>dd/mm/yyyy</small>
                                    </div>
                                  </div>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td width="40%" class="tdganjil"><strong>Kewarganegaraan</strong><span>*</span></td>
                              <td width="60%" class="tdgenap">
                                <div class="row">
                                  <div class="col-md-5">
                                    <div class="select-style">
                                      <select name="warganegara" id="select_warganegera" class="required">
                                        <option value="wni" selected>WNI</option>
                                        <option value="wna">WNA</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="col-md-7">
                                      <label id="negara_asal">Negara Asal <input type="text" maxlength="100" name="negara_asal" value="" class="formField  upper"></label>
                                  </div>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td width="40%" class="tdganjil"><strong>Jenis Kelamin</strong><span>*</span></td>
                              <td width="60%" class="tdgenap">
                                <div class="select-style">
                                  <select name="jenis_kelamin" class="required">
                                    <option value="M" selected>Laki-Laki</option>
                                    <option value="F">Perempuan</option>
                                  </select>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td width="40%" class="tdganjil"><strong>Status Penduduk</strong><span>*</span></td>
                              <td width="60%" class="tdgenap">
                                <div class="select-style">
                                  <select name="status_penduduk" class="required">
                                    <option value="penduduk" selected>Penduduk</option>
                                    <option value="nonpenduduk">Non Penduduk</option>
                                  </select>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td width="40%" class="tdganjil"><strong>Tanda Pengenal Tambahan</strong></td>
                              <td width="60%" class="tdgenap">
                                <div class="row">
                                  <div class="col-sm-12">
                                    <div class="select-style">
                                      <select name="id_pengenal_tambahan" id="id_pengenal_tambahan">
                                        <!-- <option value="">--Pilih--</option> -->
                                        <option value="NP" selected>NPWP</option>
                                        <option value="SD">Surat Keterangan Domisili</option>
                                        <option value="LL">Surat Keterangan Kerja</option>
                                      </select>
                                    </div>
                                  </div>
                                </div></br>
                                 <div class="row">
                                  <div class="col-sm-4">
                                    <label>No</label>
                                  </div>
                                  <div class="col-sm-8">
                                    <input type="text" name="nomor_npwp" size="30" id="nomor_npwp" maxlength="25" value="" class="formField">
                                    <input type="text" name="no_pengenal_tambahan" size="30" id="no_pengenal_tambahan" maxlength="25" value="" class="formField">
                                  </div>
                                </div></br>
                                <div class="row">
                                  <div class="col-sm-4">
                                    <label>Diterbitkan Di</label>
                                  </div>
                                  <div class="col-sm-8">
                                    <input type="text" name="diterbitkan_npwp" size="30" id="diterbitkan_npwp" maxlength="100" value="" class="formField upper">
                                    <input type="text" name="diterbitkan_pengenal_tambahan" size="30" id="diterbitkan_pengenal_tambahan" maxlength="100" value="" class="formField upper">
                                  </div>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td width="40%" class="tdganjil"><strong>Agama</strong><span>*</span></td>
                              <td width="60%" class="tdgenap">
                                <div class="row">
                                  <div class="col-sm-5">
                                    <div class="select-style">
                                      <select name="agama" class="required" id="select_agama">
                                        <option value="">--Pilih--</option>
                                        <option value="Islam" selected>Islam</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Katolik">Katolik</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Budha">Budha</option>
                                        <option value="Konghucu">Konghucu</option>
                                        <option value="lainnya">Lainnya</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="col-sm-7">
                                    <input type="text" id="agama_lainnya" name="agama_lainnya" maxlength="20" value="" size="23" class="formfield required upper" placeholder="Lainnya">
                                  </div>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td width="40%" class="tdganjil"><strong>Status Perkawinan</strong><span>*</span></td>
                              <td width="60%" class="tdgenap">
                                <div class="row">
                                  <div class="col-sm-12">
                                    <div class="select-style">
                                      <select name="status_kawin" class="required">
                                        <option value="">--Pilih--</option>
                                        <option value="Kawin" selected>Kawin</option>
                                        <option value="Belum Kawin">Belum Kawin</option>
                                        <option value="Janda">Janda</option>
                                        <option value="Duda">Duda</option>
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
                                    <label><input type="checkbox"> Anak</label>
                                  </div>
                                  <div class="col-sm-8">
                                    <input type="text" maxlength="11" name="jumlah_anak" value="" class="formField number_only"> Orang
                                  </div>
                                </div></br>
                                <div class="row">
                                  <div class="col-sm-4">
                                    <label><input type="checkbox"> Tanggungan</label>
                                  </div>
                                  <div class="col-sm-8">
                                    <input type="text" maxlength="11" name="jumlah_tanggungan" value="" class="formField number_only"> Orang
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
                                        <option value="SD">SD</option>
                                        <option value="SLTP">SLTP</option>
                                        <option value="SLTA">SLTA</option>
                                        <option value="DI">DI</option>
                                        <option value="DII">DII</option>
                                        <option value="DIII">DIII</option>
                                        <option value="S1" selected>S1</option>
                                        <option value="S2">S2</option>
                                        <option value="S3">S3</option>
                                      </select>
                                    </div>
                                  </div>
                                </div><br />
                                <div class="row">
                                  <div class="col-sm-4">
                                    <label>Bidang Akademik</label>
                                  </div>
                                  <div class="col-sm-8">
                                    <input type="text" name="bid_akademik" maxlength="20" size="30" value="" class="formField">
                                  </div>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td width="40%" class="tdganjil"><strong>Nama Gadis Ibu Kandung</strong><span>*</span></td>
                              <td width="60%" class="tdgenap">
                                <input type="text" name="nama_gadis_ibu_kandung" maxlength="25" size="68" value="" class="formField required upper" onkeypress="return nameGadisIbu(event,this.value)">
                              </td>
                            </tr>
                            <tr>
                              <td width="40%" class="tdganjil"><strong>Dalam Keadaan Darurat Pihak Yang Dapat Dihubungi</strong></td>
                            </tr>
                            <tr>
                              <td width="40%" class="tdganjil"><strong>Nama Lengkap</strong><span>*</span></td>
                              <td width="60%" class="tdgenap">
                                <input type="text" name="nama_lengkap_relasi" maxlength="40" size="68" value="" class="formField required upper" onkeypress="return namaRelasi(event,this.value)">
                              </td>
                            </tr>
                            <tr>
                              <td width="40%" class="tdganjil"><strong>Alamat</strong><span>*</span></td>
                              <td width="60%" class="tdgenap">
                                <input type="text" maxlength="100" name="alamat_relasi" size="68" value="" class="formField required upper">
                              </td>
                            </tr>
                            <tr>
                              <td width="40%" class="tdganjil"><strong>No Telp/HP</strong><span>*</span></td>
                              <td width="60%" class="tdgenap">
                                <input type="text" name="no_tlp_relasi" maxlength="20"  value="" class="formField required phone">/<input type="text" maxlength="20" name="no_hp_relasi" value="" class="formField required number_only">
                              </td>
                            </tr>
                            <tr>
                              <td width="40%" class="tdganjil"><strong>Hubungan Dengan Nasabah</strong><span>*</span></td>
                              <td width="60%" class="tdgenap">
                                <input type="text" name="hubungan_nasabah" maxlength="40" size="68" value="" class="formField required upper">
                              </td>
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
                                        <select name="bidang_usaha" id="bidang_usaha">
                                          <!-- <option value="">--Pilih--</option> -->
                                          <option value="2"> Pertanian, Perburuan dan Pertanian</option>
                                          <option value="Y"> Pertambangan</option>
                                          <option value="S"> Perindustrian</option>
                                          <option value="4"> Listrik, Gas & Air</option>
                                          <option value="T"> Konstruksi</option>
                                          <option value="Z"> Perdagangan, Restoran dan Hotel</option>
                                          <option value="8"> Pengangkutan, Pergudangan & Komunikasi</option>
                                          <option value="8"> Jasa-jasa Dunia Usaha</option>
                                          <option value="8"> Jasa-jasa Sosial Masyarakat</option>
                                          <option value="8"> Jasa-Jasa Keuangan & Perbankan</option>
                                          <option value="8" selected> Lain-Lain</option>
                                        </select>
                                      </div>
                                      <input type="text" maxlength="40" name="bidang_usaha_lainnya" id="bidang_usaha_lainnya" value="" class="formField upper" placeholder="Lain-Lain">
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
                                        <select name="jenis_pekerjaan" id="jenis_pekerjaan">
                                          <!-- <option value="">--Pilih--</option> -->
                                          <option value="8"> Akunting/Keuangan</option>
                                          <option value="8"> Customer Service</option>
                                          <option value="8"> Engineering</option>
                                          <option value="8"> Eksekutif</option>
                                          <option value="8"> Administrasi Umum</option>
                                          <option value="8"> Komputer</option>
                                          <option value="H"> Konsultan</option>
                                          <option value="8"> Marketing</option>
                                          <option value="W"> Pendidikan</option>
                                          <option value="8"> Pemerintahan</option>
                                          <option value="K"> Militer</option>
                                          <option value="E"> Pensiunan</option>
                                          <option value="A"> Pelajar</option>
                                          <option value="B"> Mahasiswa</option>
                                          <option value="D"> Wiraswasta</option>
                                          <option value="8"> Profesional</option>
                                          <option value="C"> Dokter</option>
                                          <option value="F"> Pengacara</option>
                                          <option value="G"> Akuntan</option>
                                          <option value="8" selected> Lain-Lain</option>
                                        </select>
                                      </div>
                                      <input type="text" maxlength="40" name="jenis_pekerjaan_lainnya" id="jenis_pekerjaan_lainnya" value="" class="formField upper" placeholder="Lain-Lain">
                                    </div>
                                  </div>
                                </td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Pangkat/Jabatan</strong></td>
                                <td width="60%" class="tdgenap">
                                  <input type="text" name="jabatan" maxlength="40" size="68" value="" class="formField upper">
                                </td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Nama Perusahaan/Instansi</strong><span>*</span></td>
                                <td width="60%" class="tdgenap">
                                  <input type="text" name="nama_perusahaan" maxlength="40" size="68" value="" class="formField required upper">
                                </td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Alamat Perusahaan/Instansi</strong><span>*</span></td>
                                <td width="60%" class="tdgenap">
                                  <input type="text" name="alamat_perusahaan" maxlength="40" size="68" value="" class="formField required upper">
                                  </br></br>
                                  <div class="row">
                                  <label  class="col-md-3">
                                    RT/RW
                                  </label>
                                  <div class="col-md-9">
                                    <input type="text" maxlength="5" size="5" name="rt_perusahaan" value="" class="formField number_only">/<input type="text" size="5" maxlength="5" value="" name="rw_perusahaan" class="formField number_only">
                                  </div>
                                  </div></br>
                                  <div class="row">
                                    <label  class="col-md-3">
                                      Kelurahan
                                    </label>
                                    <div class="col-md-9">
                                      <input type="text" name="kelurahan_perusahaan" maxlength="40" size="48" value="" class="formField upper">
                                    </div>
                                  </div></br>
                                  <div class="row">
                                    <label  class="col-md-3">
                                      Kecamatan
                                    </label>
                                    <div class="col-md-9">
                                      <input type="text" name="kecamatan_perusahaan" maxlength="40" size="48" value="" class="formField upper">
                                    </div>
                                  </div></br>
                                  <div class="row">
                                    <label  class="col-md-3">
                                      Kota/DaTi
                                    </label>
                                    <div class="col-md-9">
                                      <input type="text" name="kota_perusahaan" maxlength="40" size="48" value="" class="formField required upper">
                                    </div>
                                  </div></br>
                                  <div class="row">
                                    <label  class="col-md-3">
                                      Kodepos
                                    </label>
                                    <div class="col-md-9">
                                      <input type="text" name="kodepos_perusahaan" maxlength="9" size="48" value="" class="formField number_only">
                                    </div>
                                  </div></br>
                                  <div class="row">
                                    <label  class="col-md-3">
                                      Propinsi
                                    </label>
                                    <div class="col-md-9">
                                      <input type="text" name="provinsi_perusahaan" maxlength="40" size="48" value="" class="formField required upper">
                                    </div>
                                  </div>
                                </td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>No Telepon</strong><span>*</span><br/><small>(termasuk kode area)</small></td>
                                <td width="60%" class="tdgenap">
                                  <input type="text" name="tlp_perusahaan" maxlength="20" value="" class="formField required phone">
                                </td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>No Facsimile</strong><br/><small>(termasuk kode area)</small></td>
                                <td width="60%" class="tdgenap"><input type="text" name="fax_perusahaan" maxlength="20"  value="" class="formField phone"></td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Email</strong><span>*</span></td>
                                <td width="60%" class="tdgenap">
                                  <input type="text" name="email_perusahaan" maxlength="100"  value="" class="formField email required">
                                </td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Website</strong></td>
                                <td width="60%" class="tdgenap"><input type="text" maxlength="100" name="website_perusahaan" value="" class="formField"></td>
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
                                      <select name="penghasilan_pemohon" id="select_penghasilan" class="">
                                        <option value="">--Pilih--</option>
                                        <option value="< 1 Juta"> < 1 Juta</option>
                                        <option value="> 1 Juta s/d 5 Juta"> > 1 Juta s/d 5 Juta</option>
                                        <option value="> 5 Juta s/d 10 Juta"> > 5 Juta s/d 10 Juta </option>
                                        <option value="> 10 Juta s/d 25 Juta"> > 10 Juta s/d 25 Juta </option>
                                        <option value="> 25 Juta"> > 25 Juta </option>
                                        <option value="lainnya" selected> Lainnya</option>
                                      </select>
                                    </div>
                                    <input type="text" id="penghasilan_pemohon_lainnya" name="penghasilan_lainnya" maxlength="100" value="" class="formField upper">
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
                                    <select name="penghasilan_tambahan" id="select_hasil_tambahan">
                                      <option value="">--Pilih--</option>
                                      <option value="< 1 Juta"> < 1 Juta</option>
                                      <option value="> 1 Juta s/d 6 Juta"> > 1 Juta s/d 6 Juta</option>
                                      <option value="> 6 Juta s/d 10 Juta"> > 6 Juta s/d 10 Juta </option>
                                      <option value="> 10 Juta s/d 25 Juta"> > 10 Juta s/d 25 Juta </option>
                                      <option value="> 25 Juta"> > 25 Juta </option>
                                      <option value="lainnya">Lainnya</option>
                                    </select>
                                  </div>
                                  <input type="text" maxlength="100" name="penghasilan_tambahan_lainnya" value="" id="hasil_tambahan_lainnya" class="formField upper">
                                </div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td width="40%" class="tdganjil"><strong>Nama Penghasilan Tambahan</strong></td>
                            <td width="60%" class="tdgenap">
                              <input type="text" maxlength="100" name="nama_penghasilan_tambahan" value="" class="formField">
                            </td>
                          </tr>
                        </tbody>
                    </table>
                    <!-- <h3>Photo &amp; Tanda Tangan</h3>
                    <table class="table">
                      <tr>
                        <td width="40%" class="tdganjil"><strong>Photo</strong></br><small>jpg,jpeg,png Max 1Mb</small></td>
                        <td width="60%" class="tdgenap"><input type="file" accept=".jpg,.png,.jpeg" maxlength="255" id="fileupload" name="photo" value="" class="formField fileupload" multiple></td>
                      </tr>
                      <tr>
                        <td width="40%" class="tdganjil"><strong>Tanda Tangan</strong></br><small>jpg,jpeg,png Max 1Mb</small></td>
                        <td width="60%" class="tdgenap"><input type="file" accept=".jpg,.png,.jpeg" maxlength="255" id="filettd" name="tanda_tangan" value="" class="formField fileupload" multiple></td>
                      </tr>
                    </table> -->
                </div>
                <div class="row">
                  <div class="col-md-12">
                     <p class="pull-right">*) Wajib Diisi</p>
                  </div>
                  <div class="box-btn">
                    <a href="" class="btn btn-blue">Batal</a>
                    <a href="javascript:void(0)" id="validateCifPerorangan" class="btn btn-yellow next">Next</a>
                    <!-- <a href="javascript:void(0)" id="SubmitProsesCifRegistrasiNonAtm" class="btn btn-success">Save</a> -->
                  </div>  
                  <!-- <div class="progress" style="display:none;">
                    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                      Please Wait ...
                    </div>
                  </div>  -->            
                </div>
            </form>
        </div>
    </div>
</section>
