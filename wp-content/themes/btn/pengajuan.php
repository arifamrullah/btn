
<?php
/**
 * Template Name: Halaman Form Pengajuan
 */

?>
<?php get_header();?>
<script type="text/javascript" src="<?php echo get_template_directory_uri()?>/js/autoNumeric.js"></script>
<section id="form-pendaftaran">
    <div class="container">
        <div class="headline">
            <div class="icon-form">
                <i class="fa fa-file-text-o"></i>
            </div>
            <h2>Permohonan Pengajuan Pinjaman</h2>
            <p>Isilah form berikut dengan Data Anda selengkapnya.</p>
        </div>
        <div class="row">
	        <form id="formLoanRegistration">
				<h3>Data Diri</h3>            	
		 		<table cellspacing="0" width="100%" class="table table-bordered">               	
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Nama Lengkap</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p><input type="text" name="nama_lengkap" id="nama_lengkap" maxlength="255"  value="" class="form-control required upper"></p>
			            </td>
			            
			        </tr>

			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>No. KTP/SIM</p>
			            </td>

			            <td width="60%" class="tdgenap">
			                <p><input type="text" name="no_tanda_pengenal" id="no_tanda_pengenal" maxlength="50" size="20" value="" class="form-control required number_only"></p>
			                <p>
			                	<div id="datetimepicker5" class="input-append date">
		                        Tanggal Berlaku s.d : <input name="tanggal_berlaku_pengenal" id="tanggal_berlaku_pengenal" data-format="dd/MM/yyyy" type="text" class="required input_tanggal number_only"></input>
		                        <span class="add-on">
		                          <i class="fa fa-calendar"></i>
		                        </span>
		                        &nbsp<small>dd/mm/yyyy</small>
		                    </div>
			                </p>
			            </td>
						  </tr>

			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Alamat Rumah (sesuai KTP)</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p><input type="text" name="alamat" id="alamat" maxlength="50" value="" class="form-control required"></p>
			                <table width="100%">
			                	<tr>
			                		<td>Blok</td>
			                		<td><p><input type="text" name="blok_alamat" id="blok_alamat" maxlength="50" size="50" value="" class="formField required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>No</td>
			                		<td><p><input type="text" name="no_alamat" id="no_alamat" maxlength="50" size="50" value="" class="formField required number_only"></p></td>
			                	</tr>
			                	<tr>
			                		<td>RT</td>
			                		<td><p><input type="text" name="rt" id="rt" maxlength="50" size="50" value="" class="formField required number_only"></p></td>
			                	</tr>
			                	<tr>
			                		<td>RW</td>
			                		<td><p><input type="text" name="rw" id="rw" maxlength="50" size="50" value="" class="formField required number_only"></p></td>
			                	</tr>
			                	<tr>
			                		<td>Kelurahan</td>
			                		<td><p><input type="text" name="kelurahan" id="kelurahan" maxlength="50" size="50" value="" class="formField required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>Kecamatan</td>
			                		<td><p><input type="text" name="kecamatan" id="kecamatan" maxlength="50" size="50" value="" class="formField required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>DATI II</td>
			                		<td><p><input type="text" name="dati" id="dati" maxlength="50" size="50" value="" class="formField required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>Provinsi</td>
			                		<td><p><input type="text" name="propinsi" id="propinsi" maxlength="50" size="50" value="" class="formField required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>Kode Pos</td>
			                		<td><p><input type="text" name="kode_pos" id="kode_pos" maxlength="50" size="50" value="" class="formField required number_only"></p></td>
			                	</tr>
			                </table>
			            </td>            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Alamat Rumah (diisi apabila tidak sesuai KTP)</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			            	<input type="checkbox" name="alamat_sesuai_dengan_identitas" id="alamat_sesuai_dengan_ktp" value="sama_dengan_identitas"> Alamat Sesuai Dengan KTP</br>
			                <p><input type="text" name="alamat_dif_ktp" id="alamat_dif_ktp" maxlength="50" size="50" value="" class="form-control required"></p>
			                <table width="100%">
			                	<tr>
			                		<td>Blok</td>
			                		<td><p><input type="text" name="blok_dif_ktp" id="blok_dif_ktp" maxlength="50" size="50" value="" class="formField required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>No</td>
			                		<td><p><input type="text" name="no_dif_ktp" id="no_dif_ktp" maxlength="50" size="50" value="" class="formField required number_only"></p></td>
			                	</tr>
			                	<tr>
			                		<td>RT</td>
			                		<td><p><input type="text" name="rt_dif_ktp" id="rt_dif_ktp" maxlength="50" size="50" value="" class="formField required number_only"></p></td>
			                	</tr>
			                	<tr>
			                		<td>RW</td>
			                		<td><p><input type="text" name="rw_dif_ktp" id="rw_dif_ktp" maxlength="50" size="50" value="" class="formField required number_only"></p></td>
			                	</tr>
			                	<tr>
			                		<td>Kelurahan</td>
			                		<td><p><input type="text" name="kelurahan_dif_ktp" id="kelurahan_dif_ktp" maxlength="50" size="50" value="" class="formField required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>Kecamatan</td>
			                		<td><p><input type="text" name="kecamatan_dif_ktp" id="kecamatan_dif_ktp" maxlength="50" size="50" value="" class="formField required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>DATI II</td>
			                		<td><p><input type="text" name="dati_dif_ktp" id="dati_dif_ktp" maxlength="50" size="50" value="" class="formField required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>Provinsi</td>
			                		<td><p><input type="text" name="propinsi_dif_ktp" id="propinsi_dif_ktp" maxlength="50" size="50" value="" class="formField required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>Kode Pos</td>
			                		<td><p><input type="text" name="kode_pos_dif_ktp" id="kode_pos_dif_ktp" maxlength="50" size="50" value="" class="formField required number_only"></p></td>
			                	</tr>
			                </table>
			            </td>            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>No Telepon Rumah</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p><input type="text" name="tlp_rumah" maxlength="50" size="50" value="" class="form-control required phone"></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>No Faksimili</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p><input type="text" name="faximili" maxlength="50" size="50" value="" class="form-control required phone"></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>No Handphone</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p><input type="text" name="no_hp" maxlength="50" size="50" value="" class="form-control required number_only"></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>E-mail</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p><input type="email" name="email" maxlength="50" size="50" value="" class="form-control required email"></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Status rumah</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p>
			                	<div class="select-style">
				                	<select name="status_rumah" id="status_rumah" class="required">
				                		<option value="">--Pilih--</option>
				                		<option value="Milik Sendiri">Milik Sendiri</option>
				                		<option value="Sewa">Sewa/Kontrak</option>
				                		<option value="Keluarga">Keluarga</option>
				                		<option value="Dinas">Dinas</option>
				                		<option value="Dijaminkan">Sedang dijaminkan kepada</option>
				                	</select>                	
			                	</div>
			                </p>
			                <p id="dijaminkan_rumah"><input type="text" name="dijaminkan_rumah" maxlength="50" size="50" value="" class="form-control required"></p>
			            </td>            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Lama Ditempati</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p><input type="text" name="lama_di_tempati" maxlength="50" size="50" value="" class="formField required number_only"> Bulan</p>
			            </td>            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Alamat Penagihan</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <table>
			                	<tr>
			                		<td>Alamat Rumah </br><small>(sesuai KTP)</small></td>
			                		<td>
			                			<p><input type="text" name="alamat_penagihan_ktp" maxlength="50" size="50" value="" class="formField required"></p>
			                		</td>
			                	</tr>
			                	<tr>
			                		<td>Alamat Rumah </br><small>(diisi apabila tidak sesuai KTP)</small></td>
			                		<td>
			                			<p><input type="text" name="alamat_penagihan_dif_ktp" maxlength="50" size="50" value="" class="formField required"></p>
			                		</td>
			                	</tr>
			                	<tr>
			                		<td>Alamat Kantor</td>
			                		<td>
			                			<p><input type="text" name="alamat_penagihan_kantor" maxlength="50" size="50" value="" class="formField required"></p>
			                		</td>
			                	</tr>
			                	
			                </table>
			            </td>            
			        </tr>        
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>NPWP</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p><input type="text" name="npwp" maxlength="50" size="50" value="" class="form-control required npwp"></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Agama</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p>
			                	<div class="select-style">
				                	<select name="agama" class="required" id="select_agama">
	                          <option value="">--Pilih--</option>
	                          <option value="Islam">Islam</option>
	                          <option value="Kristen">Kristen</option>
	                          <option value="Katolik">Katolik</option>
	                          <option value="Hindu">Hindu</option>
	                          <option value="Budha">Budha</option>
	                          <option value="Konghucu">Konghucu</option>
	                          <option value="lainnya">Lainnya</option>
	                        </select>
			                	</div>
                      </p>
                      <input type="text" id="agama_lainnya" name="agama_lainnya" maxlength="255"  value="" class="form-control required" placeholder="Lainnya">  	
			                
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Tempat & TGL Lahir</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			            	<div class="row">
                      <div class="col-sm-5">
                        <input type="text" name="tempat_lahir" maxlength="255"  value="" class="form-control required">
                      </div>
                      <div class="col-sm-7">
                        <div id="datetimepicker2" class="input-append date">
                          <input name="tanggal_lahir" id="tanggal_lahir" data-format="dd/MM/yyyy" type="text" class="required input_tanggal number_only"></input>
                          <span class="add-on"><i class="fa fa-calendar"></i></span>
                          &nbsp<small>dd/mm/yyyy</small>
                        </div>
                      </div>
                    </div>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Pendidikan Terakhir</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p>
			                	<div class="select-style">
				                	<select name="pendidikan" class="required" id="pendidikan">
				                		<option value="">--Pilih--</option>
				                		<option value="SD">SD</option>
				                		<option value="SMP">SMP</option>
				                		<option value="SMA/SMU">SMA/SMU</option>
				                		<option value="Diploma">Diploma</option>
				                		<option value="S1">S1</option>
				                		<option value="S2/S3">S2/S3</option>
				                	</select>                	
			                	</div>
			                </p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Status Pernikahan</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p>
			                	<div class="select-style">
				                	<select name="status_nikah" class="required" id="status_nikah">
				                		<option value="">--Pilih--</option>
				                		<option value="Menikah">Menikah</option>
				                		<option value="Belum Menikah">Belum Menikah</option>                		
				                	</select>                	
			                	</div>
			                </p>
			            </td>
			            
			        </tr>
			        
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Nama Gadis Ibu Kandung</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p><input type="text" name="nama_gadis_ibu_kandung" maxlength="255"  value="" class="form-control required upper" onkeypress="return nameGadisIbu(event,this.value)"></p>
			            </td>
			            
			        </tr>
		    	</table>
			    <h3>KELUARGA TERDEKAT (yang tidak tinggal serumah)</h3>  
			    <table width="100%" class="table table-bordered">
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Nama Lengkap</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p><input type="text" name="nama_keluarga_dekat" id="nama_keluarga_dekat" maxlength="50" size="50" value="" class="form-control required"></p>
			            </td>
			            
			        </tr>

			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Hubungan Dengan Pemohon</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p>
			                	<div class="select-style">
				                	<select name="hubungan_pemohon" class="required" id="hubungan_pemohon">
				                		<option value="">--Pilih--</option>
				                		<option value="Orang Tua">Orang Tua</option>
				                		<option value="Saudara Kandung">Saudara Kandung</option>                		
				                		<option value="Anak">Anak</option>                		
				                		<option value="Saudara Kandung Orang Tua">Saudara Kandung Orang Tua</option>                		
				                		<option value="lainnya">Lainnya</option>                		
				                	</select>                	
			                	</div>
			                </p>
			                <p><input type="text" name="hubungan_pemohon_lainnya" id="hubungan_pemohon_lainnya" maxlength="50" size="50" value="" class="form-control required"></p>
			            </td>
			            
			        </tr>

			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Alamat Tempat Tinggal</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p><input type="text" name="alamat_keluarga_dekat" maxlength="50" size="50" value="" class="form-control required"></p>
			                <table width="100%">
			                	<tr>
			                		<td>Blok</td>
			                		<td><p><input type="text" name="blok_keluarga_dekat" maxlength="50" size="50" value="" class="formField required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>No</td>
			                		<td><p><input type="text" name="no_alamat_keluarga_dekat" maxlength="50" size="50" value="" class="formField required number_only"></p></td>
			                	</tr>
			                	<tr>
			                		<td>RT</td>
			                		<td><p><input type="text" name="rt_keluarga_dekat" maxlength="50" size="50" value="" class="formField number_only required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>RW</td>
			                		<td><p><input type="text" name="rw_keluarga_dekat" maxlength="50" size="50" value="" class="formField number_only required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>Kelurahan</td>
			                		<td><p><input type="text" name="kelurahan_keluarga_dekat" maxlength="50" size="50" value="" class="formField required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>Kecamatan</td>
			                		<td><p><input type="text" name="kecamatan_keluarga_dekat" maxlength="50" size="50" value="" class="formField required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>DATI II</td>
			                		<td><p><input type="text" name="dati_keluarga_dekat" maxlength="50" size="50" value="" class="formField required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>Provinsi</td>
			                		<td><p><input type="text" name="propinsi_keluarga_dekat" maxlength="50" size="50" value="" class="formField required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>Kode Pos</td>
			                		<td><p><input type="text" name="kode_pos_keluarga_dekat" maxlength="50" size="50" value="" class="formField required number_only"></p></td>
			                	</tr>
			                </table>
			            </td>            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>No Telepon Rumah</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p><input type="text" name="tlp_rumah_keluarga_dekat" id="tlp_rumah_keluarga_dekat" maxlength="50" size="50" value="" class="form-control required phone"></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>No HP1</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p><input type="text" name="no_hp_keluarga_dekat_1" maxlength="50" size="50" value="" class="form-control required number_only"></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>No HP2</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p><input type="text" name="no_hp_keluarga_dekat_2" maxlength="50" size="50" value="" class="form-control required number_only"></p>
			            </td>
			            
			        </tr>
			    </table>

			    <div class="data_pasangan">
			    <h3>DATA PRIBADI PASANGAN</h3>  
			    <table width="100%" class="table table-bordered">
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Nama Lengkap</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p><input type="text" name="nama_pasangan" maxlength="50" size="50" value="" class="form-control required upper" onkeypress="return namePasangan(event,this.value)"></p>
			            </td>
			            
			        </tr>

			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>No. KTP/SIM</p>
			            </td>

			            <td width="60%" class="tdgenap">
			                <p><input type="text" name="no_ktp_pasangan" id="no_ktp_pasangan" maxlength="50" size="20" value="" class="form-control required number_only"></p>
			                <p>
			                	<div id="datetimepicker5" class="input-append date">
		                        Tanggal Berlaku s.d : <input name="tanggal_berlaku_ktp_pasangan" id="tanggal_berlaku_ktp_pasangan" data-format="dd/MM/yyyy" type="text" class="required input_tanggal number_only"></input>
		                        <span class="add-on">
		                          <i class="fa fa-calendar"></i>
		                        </span>
		                    </div>
			                </p>
			            </td>
						  </tr>

			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Alamat Tempat Tinggal</br><small>(diisi apabila tidak sama dengan data alamat pemohon)</small></p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			            	<input type="checkbox" name="alamat_sesuai_dengan_pemohon" id="alamat_sesuai_dengan_pemohon" value="sama_dengan_identitas"> Alamat Sesuai Dengan Pemohon</br>
			                <p><input type="text" name="alamat_pasangan" id="alamat_pasangan" maxlength="50" size="50" value="" class="form-control required"></p>
			                <table width="100%">
			                	<tr>
			                		<td>Blok</td>
			                		<td><p><input type="text" name="blok_pasangan" id="blok_pasangan" maxlength="50" size="50" value="" class="formField required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>No</td>
			                		<td><p><input type="text" name="no_alamat_pasangan" id="no_alamat_pasangan" maxlength="50" size="50" value="" class="formField number_only required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>RT</td>
			                		<td><p><input type="text" name="rt_pasangan" id="rt_pasangan" maxlength="50" size="50" value="" class="formField required number_only"></p></td>
			                	</tr>
			                	<tr>
			                		<td>RW</td>
			                		<td><p><input type="text" name="rw_pasangan" id="rw_pasangan" maxlength="50" size="50" value="" class="formField required number_only"></p></td>
			                	</tr>
			                	<tr>
			                		<td>Kelurahan</td>
			                		<td><p><input type="text" name="kelurahan_pasangan" id="kelurahan_pasangan" maxlength="50" size="50" value="" class="formField required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>Kecamatan</td>
			                		<td><p><input type="text" name="kecamatan_pasangan" id="kecamatan_pasangan" maxlength="50" size="50" value="" class="formField required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>DATI II</td>
			                		<td><p><input type="text" name="dati_pasangan" id="dati_pasangan" maxlength="50" size="50" value="" class="formField required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>Provinsi</td>
			                		<td><p><input type="text" name="propinsi_pasangan" id="propinsi_pasangan" maxlength="50" size="50" value="" class="formField required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>Kode Pos</td>
			                		<td><p><input type="text" name="kode_pos_pasangan" id="kode_pos_pasangan" maxlength="50" size="50" value="" class="formField required number_only"></p></td>
			                	</tr>
			                </table>
			            </td>            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Tempat & TGL Lahir</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			            	<div class="row">
                      <div class="col-sm-6">
                        <input type="text" name="tempat_lahir_pasangan" maxlength="255"  value="" class="form-control required">
                      </div>
                      <div class="col-sm-6">
                        <div id="datetimepicker2" class="input-append date">
                          <input name="tanggal_lahir_pasangan" id="tanggal_lahir" data-format="dd/MM/yyyy" type="text" class="required input_tanggal number_only"></input>
                          <span class="add-on"><i class="fa fa-calendar"></i></span>
                        </div>
                      </div>
                    </div>
			            </td>
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>No Telepon Rumah</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p><input type="text" name="no_tlp_rumah_pasangan" maxlength="50" size="50" value="" class="form-control required phone"></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>No HP1</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p><input type="text" name="no_hp_1_pasangan" maxlength="50" size="50" value="" class="formField required number_only"></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>No HP2</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3">
			                <p><input type="text" name="no_hp_2_pasangan" maxlength="50" size="50" value="" class="formField required number_only"></p>
			            </td>
			            
			        </tr>
			    </table>
			    </div>

			    <h3>DATA PEKERJAAN PEMOHON</h3>  
			    <table width="100%" class="table table-bordered">
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Nama Perusahaan / Instansi</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p><input type="text" name="nama_perusahaan_pemohon" maxlength="50" size="50" value="" class="form-control required"></p>
			            </td>
			            
			        </tr>

			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Bentuk Badan Usaha Saat Ini</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p>
			                	<div class="select-style">
				                	<select name="badan_usaha" id="badan_usaha" class="required">
	                          <option value="">--Pilih--</option>
				                		<option value="PT">PT</option>
				                		<option value="CV">CV</option>                		
				                		<option value="UD">UD</option>                		
				                		<option value="Koperasi">Koperasi</option>                		
				                		<option value="Yayasan">Yayasan</option>                		
				                		<option value="Instansi Pemerintah">Instansi Pemerintah</option>                		
				                		<option value="lainnya">Lainnya</option>                		
				                	</select>                	
			                	</div>
			                </p>
			                <p id="badan_usaha_lainnya"><input type="text" name="badan_usaha_lainnya" maxlength="50" size="50" value="" class="form-control required"></p>
			            </td>
			            
			        </tr>
			        
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Alamat Perusahaan / Instansi</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p><input type="text" name="alamat_perusahaan_pemohon" maxlength="50" size="50" value="" class="form-control required"></p>
			                <table width="100%">
			                	<tr>
			                		<td>Blok</td>
			                		<td><p><input type="text" name="blok_perusahaan_pemohon" maxlength="50" size="50" value="" class="formField required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>No</td>
			                		<td><p><input type="text" name="no_perusahaan_pemohon" maxlength="50" size="50" value="" class="formField required number_only"></p></td>
			                	</tr>
			                	<tr>
			                		<td>RT</td>
			                		<td><p><input type="text" name="rt_perusahaan_pemohon" maxlength="50" size="50" value="" class="formField required number_only"></p></td>
			                	</tr>
			                	<tr>
			                		<td>RW</td>
			                		<td><p><input type="text" name="rw_perusahaan_pemohon" maxlength="50" size="50" value="" class="formField required number_only"></p></td>
			                	</tr>
			                	<tr>
			                		<td>Kelurahan</td>
			                		<td><p><input type="text" name="kelurahan_perusahaan_pemohon" maxlength="50" size="50" value="" class="formField required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>Kecamatan</td>
			                		<td><p><input type="text" name="kecamatan_perusahaan_pemohon" maxlength="50" size="50" value="" class="formField required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>DATI II</td>
			                		<td><p><input type="text" name="dati_perusahaan_pemohon" maxlength="50" size="50" value="" class="formField required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>Provinsi</td>
			                		<td><p><input type="text" name="propinsi_perusahaan_pemohon" maxlength="50" size="50" value="" class="formField required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>Kode Pos</td>
			                		<td><p><input type="text" name="kode_pos_perusahaan_pemohon" maxlength="50" size="50" value="" class="formField required number_only"></p></td>
			                	</tr>
			                </table>
			            </td>            
			        </tr>
			        
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>No Telepon</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			            	<div class="row">
			            		<div class="col-md-5">
			                		<input type="text" name="no_tlp_perusahaan_pemohon" maxlength="50"value="" class="formField required phone">
			                	</div>
			                	<div class="col-md-7">
			                		EXT <input type="text" name="no_ext_perusahaan_pemohon" maxlength="50"  value="" class="formField required number_only">
			                	</div>
			                </div>
			            </td>			            
			          </tr>
			          <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Jenis Pekerjaan</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p>
			                	<div class="select-style">
				                	<select name="jenis_pekerjaan_pemohon" id="jenis_pekerjaan_pemohon" class="required">
	                          <option value="">--Pilih--</option>
				                		<option value="BUMN/D">BUMN/D</option>
				                		<option value="PNS/Instansi/Departemen/Pemda">PNS/Instansi/Departemen/Pemda</option>                		
				                		<option value="Swasta Asing/PM4">Swasta Asing/PM4</option>                		
				                		<option value="TNI/Polri">TNI/Polri</option>                		
				                		<option value="Swasta Besar/Menengah">Swasta Besar/Menengah</option>                		
				                		<option value="PMDN">PMDN</option>                		
				                		<option value="Profesional">Profesional</option>
				                	</select>                	
			                	</div>
			                </p>
			                <p><input type="text" name="jenis_pekerjaan_lain" maxlength="50" size="50" value="" class="form-control required"></p>
			            </td>
			            
			          </tr>
			          <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Bidang Usaha</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p><input type="text" name="bidang_usaha_pemohon" maxlength="50" size="50" value="" class="form-control required"></p>
			            </td>
			            
			         </tr>
			         <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Jabatan</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p><input type="text" name="jabatan_pemohon" maxlength="50" size="50" value="" class="form-control required"></p>
			            </td>
			            
			         </tr>
			         <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Lama Menjabat</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p><input type="text" name="lama_menjabat" maxlength="50" value="" class="formField required number_only"> Tahun</p>
			            </td>
			            
			         </tr>
			         <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Masa Kerja Total:</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p><input type="text" name="total_masa_kerja" maxlength="50" value="" class="formField required number_only"> Tahun</p>
			            </td>
			            
			         </tr>
			         <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>NIP/NRP</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p><input type="text" name="nip_pemohon" maxlength="50" value="" class="form-control required number_only"></p>
			            </td>
			            
			         </tr>
			         <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Nama Atasan</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p><input type="text" name="nama_atasan" maxlength="50" value="" class="form-control required"></p>
			            </td>
			            
			         </tr>
			          <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>No Telepon Atasan</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			            	<div class="row">
			                	<div class="col-md-5">
			                		<input type="text" name="no_tlp_atasan" maxlength="50" value="" class="formField required phone">
			                	</div>
			                	<div class="col-md-7">
			                		No HP <input type="text" name="no_hp_atasan" maxlength="50"  value="" class="formField required number_only">
			                	</div>
			                </div>
			            </td>
			            
			        </tr>
			    </table>

			    <div class="data_pasangan">
			    <h3>DATA PEKERJAAN PASANGAN</h3>  
			    <table width="100%" class="table table-bordered">
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Nama Perusahaan / Instansi</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p><input type="text" name="nama_perusahaan_pasangan" maxlength="50" size="50" value="" class="form-control required"></p>
			            </td>
			            
			        </tr>

			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Bentuk Badan Usaha Saat Ini</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p>
			                	<div class="select-style">
				                	<select name="badan_usaha_perusahaan_pasangan" id="badan_usaha_perusahaan_pasangan" class="required">
	                          <option value="">--Pilih--</option>
				                		<option value="PT">PT</option>
				                		<option value="CV">CV</option>                		
				                		<option value="UD">UD</option>                		
				                		<option value="Koperasi">Koperasi</option>                		
				                		<option value="Yayasan">Yayasan</option>                		
				                		<option value="Instansi Pemerintah">Instansi Pemerintah</option>                		
				                		<option value="Lainnya">Lainnya</option>                		
				                	</select>                	
			                	</div>
			                </p>
			                <p><input type="text" name="badan_usaha_perusahaan_pasangan_lainnya" id="badan_usaha_perusahaan_pasangan_lainnya" maxlength="50" size="50" value="" class="form-control required"></p>
			            </td>
			            
			        </tr>
			        
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Alamat Perusahaan / Instansi</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p><input type="text" name="alamat_perusahaan_pasangan" maxlength="50" size="50" value="" class="form-control required"></p>
			                <table width="100%">
			                	<tr>
			                		<td>Blok</td>
			                		<td><p><input type="text" name="blok_perusahaan_pasangan" id="blok_perusahaan_pasangan" maxlength="50" size="50" value="" class="formField required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>No</td>
			                		<td><p><input type="text" name="no_perusahaan_pasangan" maxlength="50" size="50" value="" class="formField required number_only"></p></td>
			                	</tr>
			                	<tr>
			                		<td>RT</td>
			                		<td><p><input type="text" name="rt_perusahaan_pasangan" maxlength="50" size="50" value="" class="formField required number_only"></p></td>
			                	</tr>
			                	<tr>
			                		<td>RW</td>
			                		<td><p><input type="text" name="rw_perusahaan_pasangan" maxlength="50" size="50" value="" class="formField required number_only"></p></td>
			                	</tr>
			                	<tr>
			                		<td>Kelurahan</td>
			                		<td><p><input type="text" name="kelurahan_perusahaan_pasangan" maxlength="50" size="50" value="" class="formField required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>Kecamatan</td>
			                		<td><p><input type="text" name="kecamatan_perusahaan_pasangan" maxlength="50" size="50" value="" class="formField required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>DATI II</td>
			                		<td><p><input type="text" name="dati_perusahaan_pasangan" maxlength="50" size="50" value="" class="formField required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>Provinsi</td>
			                		<td><p><input type="text" name="propinsi_perusahaan_pasangan" maxlength="50" size="50" value="" class="formField required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>Kode Pos</td>
			                		<td><p><input type="text" name="kode_pos_perusahaan_pasangan" maxlength="50" size="50" value="" class="formField required number_only"></p></td>
			                	</tr>
			                </table>
			            </td>            
			        </tr>
			        
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>No Telepon</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			            	<div class="row">
			                	<div class="col-md-5">
			                		<input type="text" name="tlp_perusahaan_pasangan" maxlength="50"value="" class="formField required phone">
			                	</div>
			                	<div class="col-md-7">
			                		EXT <input type="text" name="ext_perusahaan_pasangan" maxlength="50"  value="" class="formField required number_only">
			                	</div>
			                </div>
			            </td>			            
			          </tr>
			          <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>No Faks</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p><input type="text" name="fax_perusahaan_pasangan" maxlength="50" size="50" value="" class="form-control required phone"></p>
			            </td>
			            
			         </tr>
			          <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Jenis Pekerjaan</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p>
			                	<div class="select-style">
				                	<select name="jenis_pekerjaan_pasangan" id="jenis_pekerjaan_pasangan" class="required">
	                          <option value="">--Pilih--</option>
				                		<option value="BUMN/D">BUMN/D</option>
				                		<option value="PNS/Instansi/Departemen/Pemda">PNS/Instansi/Departemen/Pemda</option>                		
				                		<option value="Swasta Asing/PM4">Swasta Asing/PM4</option>                		
				                		<option value="TNI/Polri">TNI/Polri</option>                		
				                		<option value="Swasta Besar/Menengah">Swasta Besar/Menengah</option>                		
				                		<option value="PMDN">PMDN</option>                		
				                		<option value="Profesional">Profesional</option>                		
				                	</select>                	
			                	</div>
			                </p>
			                <p><input type="text" name="jenis_pekerjaan_pasangan_lain" maxlength="50" size="50" value="" class="form-control required"></p>
			            </td>
			            
			          </tr>
			          <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Bidang Usaha</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p><input type="text" name="bidang_usaha_pasangan" maxlength="50" size="50" value="" class="form-control required"></p>
			            </td>
			            
			         </tr>
			         <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Jabatan</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p><input type="text" name="jabatan_pasangan" maxlength="50" size="50" value="" class="form-control required"></p>
			            </td>
			            
			         </tr>
			         <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Lama Menjabat</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p><input type="text" name="lama_menjabat_pasangan" maxlength="50" value="" class="formField required number_only"> Tahun</p>
			            </td>
			            
			         </tr>
			         <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Masa Kerja Total:</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p><input type="text" name="total_masa_kerja_pasangan" maxlength="50" value="" class="formField required number_only"> Tahun</p>
			            </td>
			            
			         </tr>
			         <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>NIP/NRP</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p><input type="text" name="nip_pasangan" maxlength="50" value="" class="formField required number_only"></p>
			            </td>
			            
			         </tr>
			         <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Nama Atasan</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p><input type="text" name="nama_atasan_pasangan" maxlength="50" value="" class="form-control required"></p>
			            </td>
			            
			         </tr>
			          <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>No Telepon</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			            	<div class="row">
			            		<div class="col-md-5">
			                		<input type="text" name="no_tlp_atasan_pasangan" maxlength="50"value="" class="formField required phone">
			                	</div>
			                	<div class="col-md-7">
			                		No HP <input type="text" name="no_hp_pasangan" maxlength="50"  value="" class="formField required number_only">
			                	</div>
			                </div>
			            </td>
			            
			        </tr>
			    </table>
			    </div>

	    		<h3>DATA PENGHASILAN DAN PENGELUARAN PER BULAN</h3>  
			    <table width="100%" class="table table-bordered">
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Penghasilan Utama Pemohon</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p>Rp. <input type="text" name="penghasilan_pemohon" maxlength="50" size="50" value="" class="formField required number_only"></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Penghasilan Tambahan Pemohon</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p>Rp. <input type="text" name="penghasilan_tambahan_pemohon" maxlength="50" size="50" value="" class="formField required number_only"></p>
			            </td>
			            
			        </tr>
			        <tr valign="top" class="data_pasangan">
			            <td width="40%" class="tdganjil">
			                <p>Penghasilan Utama Pasangan</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p>Rp. <input type="text" name="penghasilan_utama_pasangan" maxlength="50" size="50" value="" class="formField required number_only"></p>
			            </td>
			            
			        </tr>
			        <tr valign="top" class="data_pasangan">
			            <td width="40%" class="tdganjil">
			                <p>Penghasilan Tambahan Pasangan</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p>Rp. <input type="text" name="penghasilan_tambahan_pasangan" maxlength="50" size="50" value="" class="formField required number_only"></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Total Penghasilan</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p>Rp. <input type="text" name="total_penghasilan" maxlength="50" size="50" value="" class="formField required number_only"></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Biaya Rumah Tangga</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p>Rp. <input type="text" name="biaya_rumah_tangga" maxlength="50" size="50" value="" class="formField required number_only"></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Angsuran Lainnya</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p>Rp. <input type="text" name="angsuran_lainnya" maxlength="50" size="50" value="" class="formField required number_only"></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Sisa Penghasilan</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p>Rp. <input type="text" name="sisa_penghasilan" maxlength="50" size="50" value="" class="formField required number_only"></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Kemampuan mengangsur</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p>Rp. <input type="text" name="kemampuan_angsuran" maxlength="50" size="50" value="" class="formField required number_only"></p>
			            </td>
			            
			        </tr>
				</table>

				<h3>DATA KREDIT/PEMBIAYAAN YANG DIMOHON</h3>  
			    <table width="100%" class="table table-bordered">
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Tipe Produk</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p>
			                	<div class="select-style">
				                	<select name="tipe_produk" id="tipe_produk" class="required">
	                          <option value="">--Pilih--</option>
				                		<option value="KGU">KGU</option>
				                		<option value="Ruko">Ruko</option>                		
				                		<option value="KGM">KGM</option>                		
				                		<option value="Swagriya">Swagriya</option>                		
				                		<option value="RSH">RSH</option>                		
				                		<option value="KPA/KP Rusun">KPA/KP Rusun</option>                		
				                		<option value="Kendaraan">Kendaraan</option>                		
				                		<option value="Griya Sembada">Griya Sembada</option>  
				                		<option value="Kartu Kredit">Kartu Kredit</option>               		
				                		<option value="Kring Batara">Kring Batara</option>               		
				                		<option value="Swadana">Swadana</option>  
				                		<option value="lainnya">Lainnya</option>             		
				                	</select>                	
			                	</div>
			                </p>
			                <p><input type="text" name="tipe_produk_lainnya" id="tipe_produk_lainnya" maxlength="50" size="50" value="" class="form-control required"></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Harga Jual/Nilai Taksasi/RAB Rumah</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p>Rp. <input type="text" name="harga_jual" maxlength="50" size="50" value="" class="formfield required number_only"></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Uang Muka/Dana Sendiri</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3">
			            	<div class="row">
			            		<div class="col-md-6">
			            			Rp. <input type="text" name="uang_muka" maxlength="50" size="27" value="" class="formField required number_only">
			            		</div>
			            		<div class="col-md-6">
			                		<small>atau dalam prosentasi </small><input type="text" name="uang_muka_persentasi" maxlength="50" size="10" value="" class="formField required number_only">%
			                	</div>
			                </div>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Nilai Kredit/Pembiayaan yang di ajukan</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p>Rp. <input type="text" name="nilai_kredit_yang_diajukan" maxlength="50" size="50" value="" class="formfield required number_only"></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Sistem Pembayaran</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p>
			                	<div class="select-style">
				                	<select name="sistem_pembayaran" id="sistem_pembayaran" class="required">
	                          <option value="">--Pilih--</option>
				                		<option value="Auto Debet">Auto Debet</option>
				                		<option value="Payroll">Payroll</option>                		
				                		<option value="Kolektif">Kolektif</option>                					                		
				                	</select>                	
			                	</div>
			                </p>			                
			            </td>
			            
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Jangka Waktu Pengajuan Kredit</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p><input type="text" name="jangka_waktu_kredit" maxlength="50" value="" class="formField required number_only"> Bulan</p>	                
			            </td>
			            
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Penggunaan</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p>
			                	<div class="select-style">
				                	<select name="penggunaan" id="penggunaan" class="required">
	                          <option value="">--Pilih--</option>
				                		<option value="Pembelian Rumah">Pembelian Rumah</option>
				                		<option value="Konsumtif">Konsumtif</option>                		
				                		<option value="Pembelian Mobil">Pembelian Mobil</option>                		
				                		<option value="Pembangunan Rumah">Pembangunan Rumah</option>                		
				                		<option value="Kartu Kredit">Kartu Kredit</option>                		
				                		<option value="Pembelian Apartement">Pembelian Apartement</option>                		
				                		<option value="Pembelian Ruko">Pembelian Ruko</option>                		
				                		<option value="Griya Sembada">Griya Sembada</option>  
				                		<option value="Kartu Kredit">Kartu Kredit</option>               		
				                		<option value="Kring Batara">Kring Batara</option>               		
				                		<option value="Swadana">Swadana</option>  
				                		<option value="lainnya">Lainnya</option>             		
				                	</select>                	
			                	</div>
			                </p>
			                <p><input type="text" name="penggunaan_lainnya" maxlength="50" size="50" value="" class="form-control required"></p>
			        	</td>
			        </tr>
				</table>

				<h3>DATA ANGUNAN</h3>  
			    <table width="100%" class="table table-bordered">
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Alamat Perusahaan / Instansi</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p><input type="text" name="alamat_perusahaan_angunan" maxlength="50" size="50" value="" class="form-control required"></p>
			                <table width="100%">
			                	<tr>
			                		<td>Blok</td>
			                		<td><p><input type="text" name="blok_perusahaan_angunan" maxlength="50" size="50" value="" class="formField required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>No</td>
			                		<td><p><input type="text" name="no_perusahaan_angunan" maxlength="50" size="50" value="" class="formField required number_only"></p></td>
			                	</tr>
			                	<tr>
			                		<td>RT</td>
			                		<td><p><input type="text" name="rt_perusahaan_angunan" maxlength="50" size="50" value="" class="formField required number_only"></p></td>
			                	</tr>
			                	<tr>
			                		<td>RW</td>
			                		<td><p><input type="text" name="rw_perusahaan_angunan" maxlength="50" size="50" value="" class="formField required number_only"></p></td>
			                	</tr>
			                	<tr>
			                		<td>Kelurahan</td>
			                		<td><p><input type="text" name="kelurahan_perusahaan_angunan" maxlength="50" size="50" value="" class="formField required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>Kecamatan</td>
			                		<td><p><input type="text" name="kecamatan_perusahaan_angunan" maxlength="50" size="50" value="" class="formField required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>DATI II</td>
			                		<td><p><input type="text" name="dati_perusahaan_angunan" maxlength="50" size="50" value="" class="formField required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>Provinsi</td>
			                		<td><p><input type="text" name="propinsi_perusahaan_angunan" maxlength="50" size="50" value="" class="formField required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>Kode Pos</td>
			                		<td><p><input type="text" name="kode_pos_perusahaan_angunan" maxlength="50" size="50" value="" class="formField required number_only"></p></td>
			                	</tr>
			                </table>
			            </td>            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Status Kepemilikan</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p>
			                	<div class="select-style">
				                	<select name="status_kepemilikan_angunan" id="status_kepemilikan_angunan" class="required">
	                          <option value="">--Pilih--</option>
				                		<option value="SHM">SHM</option>
				                		<option value="SHGB">SHGB</option>                		
				                		<option value="Strata Title">Strata Title</option>                		
				                		<option value="BPKB">BPKB</option>                		
				                		<option value="Deposito">Deposito</option>                		
				                		<option value="SK Pegawai">SK Pegawai</option>                					                		
				                	</select>                	
			                	</div>
			                </p>			                
			            </td>
			            
			        </tr>
			    </table>

			    <h3>ANGUNAN - Jaminan Berupa Bangunan/Tanah</h3>
			    <!-- Jaminan Berupa Bangunan/Tanah -->
			    <table width="100%" class="table table-bordered">
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>No Sertifikat</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p> <input type="text" name="no_sertifikat_bangunan_tanah" maxlength="50"  size="50" value="" class="form-control required"></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Tanggal Terbit</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <div id="datetimepicker2" class="input-append date">
                        <input name="tanggal_terbit_sertifikat" id="tanggal_terbit_sertifikat" data-format="dd/MM/yyyy" type="text" class="required input_tanggal number_only"></input>
                        <span class="add-on"><i class="fa fa-calendar"></i></span>&nbsp<small>dd/mm/yyyy</small>
                      </div>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Luas Tanah</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p> <input type="text" name="luas_tanah" maxlength="50"  value="" class="formField required number_only"> M<sup>2</sup></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Luas Bangunan</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p> <input type="text" name="luas_bangunan" maxlength="50"  value="" class="formField required number_only"> M<sup>2</sup></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Atas Nama</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p><input type="text" name="bangunan_atas_nama" maxlength="50" size="50" value="" class="form-control required"></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>No IMB</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p><input type="text" name="no_imb" maxlength="50" value="" class="formField required"></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Tanggal Terbit</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <div id="datetimepicker2" class="input-append date">
                        <input name="tanggal_tebit_imb" id="tanggal_tebit_imb" data-format="dd/MM/yyyy" type="text" class="required input_tanggal number_only"></input>
                        <span class="add-on"><i class="fa fa-calendar"></i></span>&nbsp<small>dd/mm/yyyy</small>
                      </div>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Nama Pengembang</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p><input type="text" name="nama_pengembang" maxlength="50" value="" class="form-control required"></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Nama Proyek Perumahaan</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p><input type="text" name="nama_proyek_perumahan" maxlength="50" size="50" value="" class="form-control required"></p>
			            </td>
			            
			        </tr>	
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Nama Penjual</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p><input type="text" name="nama_penjual" maxlength="50" size="50" value="" class="form-control required"></p>
			            </td>
			            
			        </tr>		        			        
				</table>

				<h3>ANGUNAN - Jaminan Berupa Kendaraan</h3>
				<!-- Jaminan Berupa Kendaraan -->
				<table width="100%" class="table table-bordered">
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Jenis Kendaraan</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p>
			                	<div class="select-style">
				                	<select name="jenis_kendaraan" id="jenis_kendaraan" class="required">
	                          <option value="">--Pilih--</option>
				                		<option value="APV">APV</option>
				                		<option value="Deliveri Van">Deliveri Van</option>                		
				                		<option value="Honda">Honda</option>                		
				                		<option value="Jeep">Jeep</option>                		
				                		<option value="Minibus">Minibus</option>                		
				                		<option value="Microbus">Microbus</option>                					                		
				                		<option value="Sepeda Motor">Sepeda Motor</option>
				                		<option value="MVP">MVP</option>               					                		
				                		<option value="Pick up">Pick up</option>
				                		<option value="Sedan">Sedan</option>  
				                		<option value="Station Wagon">Station Wagon</option>      
				                		<option value="SUV">SUV</option>        					                		
				                	</select>                	
			                	</div>
			                </p>			                
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Merk Kendaraan</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p> <input type="text" name="merk_kendaraan" maxlength="50"  size="50" value="" class="form-control required"></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Model</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p> <input type="text" name="model_kendaraan" maxlength="50"  value="" class="formField required"></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Tipe</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p> <input type="text" name="type_kendaraan" maxlength="50"  value="" class="formField required"></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>No Mesin</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p> <input type="text" name="no_mesin" maxlength="50"  value="" class="formField required"></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>No Rangka</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p> <input type="text" name="no_rangka" maxlength="50"  value="" class="formField required"></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>No BPKB</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p> <input type="text" name="no_bpkb" maxlength="50"  value="" class="formField required"></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Tanggal Terbit</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			            	<div id="datetimepicker2" class="input-append date">
                      <input name="tanggal_terbit_kendaraan" id="tanggal_terbit_kendaraan" data-format="dd/MM/yyyy" type="text" class="required input_tanggal number_only"></input>
                      <span class="add-on"><i class="fa fa-calendar"></i></span>&nbsp<small>dd/mm/yyyy</small>
                    </div>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>No Polisi</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p> <input type="text" name="no_polisi" maxlength="50"  value="" class="formField required"></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Dealer</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p> <input type="text" name="dealer" maxlength="50"  size="50" value="" class="form-control required"></p>
			            </td>
			            
			        </tr>
				</table>

				<h3>ANGUNAN - Jaminan Berupa deposito</h3>
				<!-- Jaminan Berupa deposito -->
				<table width="100%" class="table table-bordered">
			        
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Pemilik Angunan</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p> <input type="text" name="pemilik_angunan_depsito" maxlength="50"  size="50" value="" class="form-control required"></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Nama Bank/Other Deposit</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p> <input type="text" name="nama_bank_deposito" maxlength="50"  size="50" value="" class="form-control required"></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Nomor simpanan</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p> <input type="text" name="no_simpanan_deposito" maxlength="50"  size="50" value="" class="form-control required"></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Nilai</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p>Rp.<input type="text" name="nilai_deposito" maxlength="50"  size="50" value="" class="formField required number_only"></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Bunga Simpanan</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p> <input type="text" name="bunga_simpanan_deposito" maxlength="50" value="" class="formField required number_only"> %</p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Tanggal Terbit</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <div id="datetimepicker2" class="input-append date">
	                      <input name="tanggal_terbit_deposito" id="tanggal_terbit_deposito" data-format="dd/MM/yyyy" type="text" class="required input_tanggal number_only"></input>
	                      <span class="add-on"><i class="fa fa-calendar"></i></span>&nbsp<small>dd/mm/yyyy</small>
	                    </div>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Jatuh Tempo Kredit</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p> <input type="text" name="jatuh_tempo_kredit_deposito" maxlength="50" value="" class="formField required"></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Jangka Waktu Kredit</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p> <input type="text" name="jangka_waktu_kredit_deposito" maxlength="50" value="" class="formField required number_only"> Bulan</p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Model</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p> <input type="text" name="model_deposito" maxlength="50"  value="" class="formField required"></p>
			            </td>
			            
			        </tr>
				</table>

				<h3>ANGUNAN - Jaminan Berupa No SK</h3>
				<!-- Jaminan Berupa No SK -->
				<table width="100%" class="table table-bordered">
			        
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>No SK</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p> <input type="text" name="no_sk" maxlength="50"  size="50" value="" class="form-control required"></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Tanggal Terbit</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			            	<div id="datetimepicker2" class="input-append date">
                      <input name="tanggal_terbit_sk" id="tanggal_terbit_sk" data-format="dd/MM/yyyy" type="text" class="required input_tanggal number_only"></input>
                      <span class="add-on"><i class="fa fa-calendar"></i></span>&nbsp<small>dd/mm/yyyy</small>
                    </div>
			            </td>
			            
			        </tr>
				</table>

				<h3>DATA PINJAMAN LAIN</h3>  
			    <table width="100%" class="table table-bordered"> 
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Nama Bank</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p><input type="text" name="nama_bank_pinjaman_lain" maxlength="50" size="50" value="" class="formField required"></p>
			            </td>			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Jenis Produk</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p>
			                	<div class="select-style">
				                	<select name="jenis_produk_pinjaman_lain" id="jenis_produk_pinjaman_lain" class="required">
	                          <option value="">--Pilih--</option>
				                		<option value="JPA">JPA</option>                		
				                		<option value="Kredit Mobil">Kredit Mobil</option>                		
				                		<option value="Kartu Kredit">Kartu Kredit</option>                		
				                		<option value="Modal Kerja">Modal Kerja</option>                		
				                		<option value="Konsumtif">Konsumtif</option>                					                		
				                		<option value="Pegawai">Pegawai</option>
				                	</select>                	
			                	</div>
			                </p>			                
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Plafond</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p>Rp.<input type="text" name="plafond" maxlength="50" size="50" value="" class="formField required number_only"></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Tunggakan</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p>Rp.<input type="text" name="tunggakan" maxlength="50" size="50" value="" class="formField required number_only"></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Outstanding</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p>Rp.<input type="text" name="outstanding" maxlength="50" size="50" value="" class="formField required number_only"></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Angsuran</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p>Rp.<input type="text" name="angsuran_pinjaman_lain" maxlength="50" size="50" value="" class="formField required number_only"></p>
			            </td>
			            
			        </tr>
			    </table>

			    <h3>DATA KEKAYAAN PEMOHON DAN PASANGAN</h3>  
			    <table width="100%" class="table table-bordered">
			        <tr valign="top">
			            <td class="tdganjil" colspan="2">
			            	<b>Bank</b>
			            </td>

			            <td class="tdganjil" >
			            	<b>Rata Rata Saldo</b>
			            </td>	
			            <td class="tdganjil" colspan="2">
			            	
			            </td>			            
			        </tr>
			        <tr valign="top">
			            <td class="tdganjil">
			                <p>Tabungan :</p>
			            </td>

			            <td class="tdgenap"   >
			                <p><input type="text" name= "tabungan_kekayaan" maxlength="50" size="30" value="" class="formField required"></p>
			            </td>
			            <td class="tdgenap"   >
			                <p>Rp <input type="text" name= "rata_rata_saldo_tabungan" maxlength="50" size="30" value="" class="formField required number_only"></p>
			            </td>
			            <td class="tdgenap"   >
			                <p>
			                	Atas Nama 
			                	<div class="select-style">
				                	<select name="atas_nama_tabungan" id="atas_nama_tabungan" class="required">
	                          <option value="">--Pilih--</option>
				                		<option value="Pemohon">Pemohon</option>
				                		<option value="Pasangan">Pasangan</option>                					                		
				                	</select>           
			                	</div>
			                </p>
			            </td>
			                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
			        </tr>
			        <tr valign="top">
			            <td class="tdganjil">
			                <p>Giro :</p>
			            </td>

			            <td class="tdgenap"   >
			                <p><input type="text" name= "giro_kekayaan" maxlength="50" size="30" value="" class="formField required"></p>
			            </td>
			            <td class="tdgenap"   >
			                <p>Rp <input type="text" name= "rata_rata_saldo_giro" maxlength="50" size="30" value="" class="formField required number_only"></p>
			            </td>
			            <td class="tdgenap"   >
			                <p>
			                	Atas Nama 
			                	<div class="select-style">
				                	<select name="atas_nama_giro" id="atas_nama_giro" class="required">
	                          <option value="">--Pilih--</option>
				                		<option value="Pemohon">Pemohon</option>
				                		<option value="Pasangan">Pasangan</option>                					                		
				                	</select>           
			                	</div>
			                </p>
			            </td>
			                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
			        </tr>
			        <tr valign="top">
			            <td class="tdganjil">
			                <p>Deposito :</p>
			            </td>

			            <td class="tdgenap"   >
			                <p><input type="text" name= "deposito_kekayaan" maxlength="50" size="30" value="" class="formField required"></p>
			            </td>
			            <td class="tdgenap"   >
			                <p>Rp <input type="text" name= "rata_rata_saldo_deposito" maxlength="50" size="30" value="" class="formField required number_only"></p>
			            </td>
			            <td class="tdgenap"   >
			                <p>
			                	Atas Nama 
			                	<div class="select-style">
				                	<select name="atas_nama_deposito" id="atas_nama_deposito" class="required">
	                          <option value="">--Pilih--</option>
				                		<option value="Pemohon">Pemohon</option>
				                		<option value="Pasangan">Pasangan</option>                					                		
				                	</select>           
			                	</div>
			                </p>
			            </td>
			                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
			        </tr>
			        <tr valign="top">
			            <td class="tdganjil">
			                <p>Rumah</p>
			            </td>

			            <td class="tdgenap"   >
			                <p>Atas Nama<br /><input type="text" name= "atas_nama_rumah" maxlength="50" size="30" value="" class="formField required"></p>
			            </td>
			            <td class="tdgenap" colspan="2">
			                <p>Nilai Rumah <br />Rp <input type="text" name= "nilai_rumah" maxlength="50" size="30" value="" class="formField required number_only"></p>
			            </td>
			            
			                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
			        </tr>
			        <tr valign="top">
			            <td class="tdganjil">
			                <p>Kendaraan</p>
			            </td>

			            <td class="tdgenap"   >
			                <p>Atas Nama <br /><input type="text" name= "atas_nama_kendaraan" maxlength="50" size="30" value="" class="formField required"></p>
			            </td>
			            <td class="tdgenap"   colspan="2">
			                <p>Nilai Kendaraan <br />Rp <input type="text" name= "nilai_kendaraan" maxlength="50" size="30" value="" class="formField required number_only"></p>
			            </td>
			            
			                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
			        </tr>
			    </table>
			    <div class="box-btn">
			    	<div id="captchaimage"><a href="javascript:void(0)" id="refreshimg" title="Click to refresh image"><img src="<?php echo get_template_directory_uri();?>/inc/captcha/image.php?token=<?php echo btn_ajax_create_captcha() ?>" width="132" height="46" alt="Captcha image"></a></div>
                    <label for="captcha">Enter the characters as seen on the image above (case insensitive):</label>
                    <input type="text" maxlength="6" name="captcha" id="captcha" class="captcha">
                    </br></br>
              		<a href="" class="btn btn-blue">Batal</a>
              		<a href="javascript:void(0)" id="submitProsessKredit" class="btn btn-yellow">Kirim</a>
          		</div>
          <div class="progress" style="display:none;">
            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
              Please Wait ...
            </div>
          </div>    
		    </form>
		</div>
	</div>
</section>
<?php add_action('wp_footer', 'JsforForm'); ?>
<?php get_footer();?>