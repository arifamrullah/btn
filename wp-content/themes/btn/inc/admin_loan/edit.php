<?php
global $wpdb;
  $id = $_GET['edit'];
  $reg_sql = "SELECT * FROM btn_pinjaman WHERE id=".$id;
  $items = $wpdb->get_results( $reg_sql );
  foreach ($items as $item)
?>

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
	        <input type="hidden" name="id" value="<?php echo @$item->id ?>">
				<h3>Data Diri</h3>            	
		 		<table cellspacing="0" width="100%" class="table table-bordered">               	
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Nama Lengkap</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p><input type="text" name="nama_lengkap" id="nama_lengkap" maxlength="255"  value="<?php echo @$item->nama_lengkap ?>" class="form-control required upper" onkeypress="return nameValidationIdentitas(event,this.value)"></p>
			            </td>
			            
			        </tr>

			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>No. KTP/SIM</p>
			            </td>

			            <td width="60%" class="tdgenap">
			                <p><input type="text" name="no_tanda_pengenal" id="no_tanda_pengenal" maxlength="100" size="20" value="<?php echo @$item->no_tanda_pengenal ?>" class="form-control required number_only"></p>
			                <p>
			                	<div id="datetimepicker5" class="input-append date">
		                        Tanggal Berlaku s.d : <input name="tanggal_berlaku_pengenal" value="<?php echo @$item->tanggal_berlaku_pengenal ?>" id="tanggal_berlaku_pengenal" data-format="dd/MM/yyyy" type="text" class="required" readonly></input>
		                        <span class="add-on">
		                          <i class="fa fa-calendar"></i>
		                        </span>
		                    </div>
			                </p>
			            </td>
						  </tr>

			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Alamat Rumah (sesuai KTP)</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p><input type="text" name="alamat" id="alamat" maxlength="50" value="<?php echo @$item->alamat ?>" class="form-control required"></p>
			                <table width="100%">
			                	<tr>
			                		<td>Blok</td>
			                		<td><p><input type="text" name="blok_alamat" id="blok_alamat" maxlength="50" size="50" value="<?php echo @$item->blok_alamat ?>" class="formField required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>No</td>
			                		<td><p><input type="text" name="no_alamat" id="no_alamat" maxlength="50" size="50" value="<?php echo @$item->no_alamat ?>" class="formField required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>RT</td>
			                		<td><p><input type="text" name="rt" id="rt" maxlength="50" size="50" value="<?php echo @$item->rt ?>" class="formField required number_only"></p></td>
			                	</tr>
			                	<tr>
			                		<td>RW</td>
			                		<td><p><input type="text" name="rw" id="rw" maxlength="50" size="50" value="<?php echo @$item->rw ?>" class="formField required number_only"></p></td>
			                	</tr>
			                	<tr>
			                		<td>Kelurahan</td>
			                		<td><p><input type="text" name="kelurahan" id="kelurahan" maxlength="50" size="50" value="<?php echo @$item->kelurahan ?>" class="formField required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>Kecamatan</td>
			                		<td><p><input type="text" name="kecamatan" id="kecamatan" maxlength="50" size="50" value="<?php echo @$item->kecamatan ?>" class="formField required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>DATI II</td>
			                		<td><p><input type="text" name="dati" id="dati" maxlength="50" size="50" value="<?php echo @$item->dati ?>" class="formField required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>Provinsi</td>
			                		<td><p><input type="text" name="propinsi" id="propinsi" maxlength="50" size="50" value="<?php echo @$item->propinsi ?>" class="formField required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>Kode Pos</td>
			                		<td><p><input type="text" name="kode_pos" id="kode_pos" maxlength="50" size="50" value="<?php echo @$item->kode_pos ?>" class="formField required number_only"></p></td>
			                	</tr>
			                </table>
			            </td>            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Alamat Rumah (diisi apabila tidak sesuai KTP)</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p><input type="text" name="alamat_dif_ktp" id="alamat_dif_ktp" maxlength="50" size="50" value="<?php echo @$item->alamat_dif_ktp ?>" class="form-control required"></p>
			                <table width="100%">
			                	<tr>
			                		<td>Blok</td>
			                		<td><p><input type="text" name="blok_dif_ktp" id="blok_dif_ktp" maxlength="50" size="50" value="<?php echo @$item->blok_dif_ktp ?>" class="formField required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>No</td>
			                		<td><p><input type="text" name="no_dif_ktp" id="no_dif_ktp" maxlength="50" size="50" value="<?php echo @$item->no_dif_ktp ?>" class="formField required number_only"></p></td>
			                	</tr>
			                	<tr>
			                		<td>RT</td>
			                		<td><p><input type="text" name="rt_dif_ktp" id="rt_dif_ktp" maxlength="50" size="50" value="<?php echo @$item->rt_dif_ktp ?>" class="formField required number_only"></p></td>
			                	</tr>
			                	<tr>
			                		<td>RW</td>
			                		<td><p><input type="text" name="rw_dif_ktp" id="rw_dif_ktp" maxlength="50" size="50" value="<?php echo @$item->rw_dif_ktp ?>" class="formField required number_only"></p></td>
			                	</tr>
			                	<tr>
			                		<td>Kelurahan</td>
			                		<td><p><input type="text" name="kelurahan_dif_ktp" id="kelurahan_dif_ktp" maxlength="50" size="50" value="<?php echo @$item->kelurahan_dif_ktp ?>" class="formField required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>Kecamatan</td>
			                		<td><p><input type="text" name="kecamatan_dif_ktp" id="kecamatan_dif_ktp" maxlength="50" size="50" value="<?php echo @$item->kecamatan_dif_ktp ?>" class="formField required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>DATI II</td>
			                		<td><p><input type="text" name="dati_dif_ktp" id="dati_dif_ktp" maxlength="50" size="50" value="<?php echo @$item->dati_dif_ktp ?>" class="formField required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>Provinsi</td>
			                		<td><p><input type="text" name="propinsi_dif_ktp" id="propinsi_dif_ktp" maxlength="50" size="50" value="<?php echo @$item->propinsi_dif_ktp ?>" class="formField required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>Kode Pos</td>
			                		<td><p><input type="text" name="kode_pos_dif_ktp" id="kode_pos_dif_ktp" maxlength="50" size="50" value="<?php echo @$item->kode_pos_dif_ktp ?>" class="formField required number_only"></p></td>
			                	</tr>
			                </table>
			            </td>            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>No Telepon Rumah</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p><input type="text" name="tlp_rumah" maxlength="50" size="50" value="<?php echo @$item->tlp_rumah ?>" class="form-control required phone"></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>No Faksimili</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p><input type="text" name="faximili" maxlength="50" size="50" value="<?php echo @$item->faximili ?>" class="form-control required phone"></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>No Handphone</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p><input type="text" name="no_hp" maxlength="50" size="50" value="<?php echo @$item->no_hp ?>" class="form-control required number_only"></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>E-mail</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p><input type="email" name="email" maxlength="50" size="50" value="<?php echo @$item->email ?>" class="form-control required email"></p>
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
				                		<option value="Milik Sendiri" <?php echo (@$item->status_rumah == 'Milik Sendiri')?'selected':''; ?>>Milik Sendiri</option>
				                		<option value="Sewa" <?php echo (@$item->status_rumah == 'Sewa')?'selected':''; ?>>Sewa/Kontrak</option>
				                		<option value="Keluarga" <?php echo (@$item->status_rumah == 'Keluarga')?'selected':''; ?>>Keluarga</option>
				                		<option value="Dinas" <?php echo (@$item->status_rumah == 'Dinas')?'selected':''; ?>>Dinas</option>
				                		<option value="Dijaminkan" <?php echo (@$item->status_rumah == 'Dijaminkan')?'selected':''; ?>>Sedang dijaminkan kepada</option>
				                	</select>                	
			                	</div>
			                </p>
			                <p id="dijaminkan_rumah"><input type="text" name="dijaminkan_rumah" maxlength="50" size="50" value="<?php echo @$item->dijaminkan_rumah ?>" class="form-control required"></p>
			            </td>            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Lama Ditempati</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p><input type="text" name="lama_di_tempati" maxlength="50" size="50" value="<?php echo @$item->lama_di_tempati ?>" class="formField required number_only"> Bulan</p>
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
			                			<p><input type="text" name="alamat_penagihan_ktp" maxlength="50" size="50" value="<?php echo @$item->alamat_penagihan_ktp ?>" class="formField required"></p>
			                		</td>
			                	</tr>
			                	<tr>
			                		<td>Alamat Rumah </br><small>(diisi apabila tidak sesuai KTP)</small></td>
			                		<td>
			                			<p><input type="text" name="alamat_penagihan_dif_ktp" maxlength="50" size="50" value="<?php echo @$item->alamat_penagihan_dif_ktp ?>" class="formField required"></p>
			                		</td>
			                	</tr>
			                	<tr>
			                		<td>Alamat Kantor</td>
			                		<td>
			                			<p><input type="text" name="alamat_penagihan_kantor" maxlength="50" size="50" value="<?php echo @$item->alamat_penagihan_kantor ?>" class="formField required"></p>
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
			                <p><input type="text" name="npwp" maxlength="50" size="50" value="<?php echo @$item->npwp ?>" class="form-control required npwp"></p>
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
	                          <option value="Islam" <?php echo (@$item->agama == 'Islam')?'selected':''; ?>>Islam</option>
	                          <option value="Kristen" <?php echo (@$item->agama == 'Kristen')?'selected':''; ?>>Kristen</option>
	                          <option value="Katolik" <?php echo (@$item->agama == 'Katolik')?'selected':''; ?>>Katolik</option>
	                          <option value="Hindu" <?php echo (@$item->agama == 'Hindu')?'selected':''; ?>>Hindu</option>
	                          <option value="Budha" <?php echo (@$item->agama == 'Budha')?'selected':''; ?>>Budha</option>
	                          <option value="Konghucu" <?php echo (@$item->agama == 'Konghucu')?'selected':''; ?>>Konghucu</option>
	                          <option value="lainnya" <?php echo (@$item->agama == 'lainnya')?'selected':''; ?>>Lainnya</option>
	                        </select>
			                	</div>
                      </p>
                      <input type="text" id="agama_lainnya" name="agama_lainnya" maxlength="255"  value="<?php echo @$item->agama_lainnya ?>" class="form-control required" placeholder="Lainnya">  	
			                
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Tempat & TGL Lahir</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			            	<div class="row">
                      <div class="col-sm-6">
                        <input type="text" name="tempat_lahir" maxlength="255"  value="<?php echo @$item->tempat_lahir ?>" class="form-control required">
                      </div>
                      <div class="col-sm-6">
                        <div id="datetimepicker2" class="input-append date">
                          <input name="tanggal_lahir" id="tanggal_lahir" data-format="dd/MM/yyyy" type="text" value="<?php echo @$item->tanggal_lahir ?>" class="required" readonly></input>
                          <span class="add-on"><i class="fa fa-calendar"></i></span>
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
				                		<option value="SD" <?php echo (@$item->pendidikan == 'SD')?'selected':''; ?>>SD</option>
				                		<option value="SMP" <?php echo (@$item->pendidikan == 'SMP')?'selected':''; ?>>SMP</option>
				                		<option value="SMA/SMU" <?php echo (@$item->pendidikan == 'SMA/SMU')?'selected':''; ?>>SMA/SMU</option>
				                		<option value="Diploma" <?php echo (@$item->pendidikan == 'Diploma')?'selected':''; ?>>Diploma</option>
				                		<option value="S1" <?php echo (@$item->pendidikan == 'S1')?'selected':''; ?>>S1</option>
				                		<option value="S2/S3" <?php echo (@$item->pendidikan == 'S2/S3')?'selected':''; ?>>S2/S3</option>
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
				                		<option value="Menikah" <?php echo (@$item->status_nikah == 'Menikah')?'selected':''; ?>>Menikah</option>
				                		<option value="Belum Menikah" <?php echo (@$item->status_nikah == 'Belum Menikah')?'selected':''; ?>>Belum Menikah</option>
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
			                <p><input type="text" name="nama_gadis_ibu_kandung" maxlength="255"  value="<?php echo @$item->nama_gadis_ibu_kandung ?>" class="form-control required upper" onkeypress="return nameGadisIbu(event,this.value)"></p>
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
			                <p><input type="text" name="nama_keluarga_dekat" id="nama_keluarga_dekat" maxlength="50" size="50" value="<?php echo @$item->nama_keluarga_dekat ?>" class="form-control required"></p>
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
				                		<option value="Orang Tua" <?php echo (@$item->hubungan_pemohon == 'Orang Tua')?'selected':''; ?>>Orang Tua</option>
				                		<option value="Saudara Kandung" <?php echo (@$item->hubungan_pemohon == 'Saudara Kandung')?'selected':''; ?>>Saudara Kandung</option>                		
				                		<option value="Anak" <?php echo (@$item->hubungan_pemohon == 'Anak')?'selected':''; ?>>Anak</option>                		
				                		<option value="Saudara Kandung Orang Tua" <?php echo (@$item->hubungan_pemohon == 'Saudara Kandung Orang Tua')?'selected':''; ?>>Saudara Kandung Orang Tua</option>                		
				                		<option value="lainnya" <?php echo (@$item->hubungan_pemohon == 'lainnya')?'selected':''; ?>>Lainnya</option>
				                	</select>                	
			                	</div>
			                </p>
			                <p><input type="text" name="hubungan_pemohon_lainnya" id="hubungan_pemohon_lainnya" maxlength="50" size="50" value="<?php echo @$item->hubungan_pemohon_lainnya ?>" class="form-control required"></p>
			            </td>
			            
			        </tr>

			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Alamat Tempat Tinggal</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p><input type="text" name="alamat_keluarga_dekat" maxlength="50" size="50" value="<?php echo @$item->alamat_keluarga_dekat ?>" class="form-control required"></p>
			                <table width="100%">
			                	<tr>
			                		<td>Blok</td>
			                		<td><p><input type="text" name="blok_keluarga_dekat" maxlength="50" size="50" value="<?php echo @$item->blok_keluarga_dekat ?>" class="formField required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>No</td>
			                		<td><p><input type="text" name="no_alamat_keluarga_dekat" maxlength="50" size="50" value="<?php echo @$item->no_alamat_keluarga_dekat ?>" class="formField required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>RT</td>
			                		<td><p><input type="text" name="rt_keluarga_dekat" maxlength="50" size="50" value="<?php echo @$item->rt_keluarga_dekat ?>" class="formField number_only required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>RW</td>
			                		<td><p><input type="text" name="rw_keluarga_dekat" maxlength="50" size="50" value="<?php echo @$item->rw_keluarga_dekat ?>" class="formField number_only required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>Kelurahan</td>
			                		<td><p><input type="text" name="kelurahan_keluarga_dekat" maxlength="50" size="50" value="<?php echo @$item->kelurahan_keluarga_dekat ?>" class="formField required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>Kecamatan</td>
			                		<td><p><input type="text" name="kecamatan_keluarga_dekat" maxlength="50" size="50" value="<?php echo @$item->kecamatan_keluarga_dekat ?>" class="formField required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>DATI II</td>
			                		<td><p><input type="text" name="dati_keluarga_dekat" maxlength="50" size="50" value="<?php echo @$item->dati_keluarga_dekat ?>" class="formField required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>Provinsi</td>
			                		<td><p><input type="text" name="propinsi_keluarga_dekat" maxlength="50" size="50" value="<?php echo @$item->propinsi_keluarga_dekat ?>" class="formField required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>Kode Pos</td>
			                		<td><p><input type="text" name="kode_pos_keluarga_dekat" maxlength="50" size="50" value="<?php echo @$item->kode_pos_keluarga_dekat ?>" class="formField required number_only"></p></td>
			                	</tr>
			                </table>
			            </td>            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>No Telepon Rumah</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p><input type="text" name="tlp_rumah_keluarga_dekat" id="tlp_rumah_keluarga_dekat" maxlength="50" size="50" value="<?php echo @$item->tlp_rumah_keluarga_dekat ?>" class="form-control required phone"></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>No HP1</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p><input type="text" name="no_hp_keluarga_dekat_1" maxlength="50" size="50" value="<?php echo @$item->no_hp_keluarga_dekat_1 ?>" class="form-control required number_only"></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>No HP2</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p><input type="text" name="no_hp_keluarga_dekat_2" maxlength="50" size="50" value="<?php echo @$item->no_hp_keluarga_dekat_2 ?>" class="form-control required number_only"></p>
			            </td>
			            
			        </tr>
			    </table>

			    <h3>DATA PRIBADI PASANGAN</h3>  
			    <table width="100%" class="table table-bordered">
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Nama Lengkap</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p><input type="text" name="nama_pasangan" maxlength="50" size="50" value="<?php echo @$item->nama_pasangan ?>" class="form-control required upper" onkeypress="return namePasangan(event,this.value)"></p>
			            </td>
			            
			        </tr>

			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>No. KTP/SIM</p>
			            </td>

			            <td width="60%" class="tdgenap">
			                <p><input type="text" name="no_ktp_pasangan" id="no_ktp_pasangan" maxlength="50" size="20" value="<?php echo @$item->no_ktp_pasangan ?>" class="form-control required number_only"></p>
			                <p>
			                	<div id="datetimepicker5" class="input-append date">
		                        Tanggal Berlaku s.d : <input name="tanggal_berlaku_ktp_pasangan" value="<?php echo @$item->tanggal_berlaku_ktp_pasangan ?>" id="tanggal_berlaku_ktp_pasangan" data-format="dd/MM/yyyy" type="text" class="required" readonly></input>
		                        <span class="add-on">
		                          <i class="fa fa-calendar"></i>
		                        </span>
		                    </div>
			                </p>
			            </td>
						  </tr>

			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Alamat Tempat Tinggal (diisi apabila tidak sama dengan data alamat pemohon)</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p><input type="text" name="alamat_pasangan" id="alamat_pasangan" maxlength="50" size="50" value="<?php echo @$item->alamat_pasangan ?>" class="form-control required"></p>
			                <table width="100%">
			                	<tr>
			                		<td>Blok</td>
			                		<td><p><input type="text" name="blok_pasangan" id="blok_pasangan" maxlength="50" size="50" value="<?php echo @$item->blok_pasangan ?>" class="formField required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>No</td>
			                		<td><p><input type="text" name="no_alamat_pasangan" id="no_alamat_pasangan" maxlength="50" size="50" value="<?php echo @$item->no_alamat_pasangan ?>" class="formField number_only required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>RT</td>
			                		<td><p><input type="text" name="rt_pasangan" id="rt_pasangan" maxlength="50" size="50" value="<?php echo @$item->rt_pasangan ?>" class="formField required number_only"></p></td>
			                	</tr>
			                	<tr>
			                		<td>RW</td>
			                		<td><p><input type="text" name="rw_pasangan" id="rw_pasangan" maxlength="50" size="50" value="<?php echo @$item->rw_pasangan ?>" class="formField required number_only"></p></td>
			                	</tr>
			                	<tr>
			                		<td>Kelurahan</td>
			                		<td><p><input type="text" name="kelurahan_pasangan" id="kelurahan_pasangan" maxlength="50" size="50" value="<?php echo @$item->kelurahan_pasangan ?>" class="formField required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>Kecamatan</td>
			                		<td><p><input type="text" name="kecamatan_pasangan" id="kecamatan_pasangan" maxlength="50" size="50" value="<?php echo @$item->kecamatan_pasangan ?>" class="formField required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>DATI II</td>
			                		<td><p><input type="text" name="dati_pasangan" id="dati_pasangan" maxlength="50" size="50" value="<?php echo @$item->dati_pasangan ?>" class="formField required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>Provinsi</td>
			                		<td><p><input type="text" name="propinsi_pasangan" id="propinsi_pasangan" maxlength="50" size="50" value="<?php echo @$item->propinsi_pasangan ?>" class="formField required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>Kode Pos</td>
			                		<td><p><input type="text" name="kode_pos_pasangan" id="kode_pos_pasangan" maxlength="50" size="50" value="<?php echo @$item->kode_pos_pasangan ?>" class="formField required number_only"></p></td>
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
                        <input type="text" name="tempat_lahir_pasangan" maxlength="255"  value="<?php echo @$item->tempat_lahir_pasangan ?>" class="form-control required">
                      </div>
                      <div class="col-sm-6">
                        <div id="datetimepicker2" class="input-append date">
                          <input name="tanggal_lahir_pasangan" id="tanggal_lahir" value="<?php echo @$item->tanggal_lahir_pasangan ?>" data-format="dd/MM/yyyy" type="text" class="required" readonly></input>
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
			                <p><input type="text" name="no_tlp_rumah_pasangan" maxlength="50" size="50" value="<?php echo @$item->no_tlp_rumah_pasangan ?>" class="form-control required phone"></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>No HP1</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p><input type="text" name="no_hp_1_pasangan" maxlength="50" size="50" value="<?php echo @$item->no_hp_1_pasangan ?>" class="formField required number_only"></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>No HP2</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3">
			                <p><input type="text" name="no_hp_2_pasangan" maxlength="50" size="50" value="<?php echo @$item->no_hp_2_pasangan ?>" class="formField required number_only"></p>
			            </td>
			            
			        </tr>
			    </table>

			    <h3>DATA PEKERJAAN PEMOHON</h3>  
			    <table width="100%" class="table table-bordered">
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Nama Perusahaan / Instansi</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p><input type="text" name="nama_perusahaan_pemohon" maxlength="50" size="50" value="<?php echo @$item->nama_perusahaan_pemohon ?>" class="form-control required"></p>
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
				                		<option value="PT" <?php echo (@$item->badan_usaha == 'PT')?'selected':''; ?>>PT</option>
				                		<option value="CV" <?php echo (@$item->badan_usaha == 'CV')?'selected':''; ?>>CV</option>                		
				                		<option value="UD" <?php echo (@$item->badan_usaha == 'UD')?'selected':''; ?>>UD</option>                		
				                		<option value="Koperasi" <?php echo (@$item->badan_usaha == 'Koperasi')?'selected':''; ?>>Koperasi</option>                		
				                		<option value="Yayasan" <?php echo (@$item->badan_usaha == 'Yayasan')?'selected':''; ?>>Yayasan</option>                		
				                		<option value="Instansi Pemerintah" <?php echo (@$item->badan_usaha == 'Instansi Pemerintah')?'selected':''; ?>>Instansi Pemerintah</option>                		
				                		<option value="lainnya" <?php echo (@$item->badan_usaha == 'lainnya')?'selected':''; ?>>Lainnya</option>                		
				                	</select>                	
			                	</div>
			                </p>
			                <p id="badan_usaha_lainnya"><input type="text" name="badan_usaha_lainnya" maxlength="50" size="50" value="<?php echo @$item->badan_usaha_lainnya ?>" class="form-control required"></p>
			            </td>
			            
			        </tr>
			        
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Alamat Perusahaan / Instansi</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p><input type="text" name="alamat_perusahaan_pemohon" maxlength="50" size="50" value="<?php echo @$item->alamat_perusahaan_pemohon ?>" class="form-control required"></p>
			                <table width="100%">
			                	<tr>
			                		<td>Blok</td>
			                		<td><p><input type="text" name="blok_perusahaan_pemohon" maxlength="50" size="50" value="<?php echo @$item->blok_perusahaan_pemohon ?>" class="formField required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>No</td>
			                		<td><p><input type="text" name="no_perusahaan_pemohon" maxlength="50" size="50" value="<?php echo @$item->no_perusahaan_pemohon ?>" class="formField required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>RT</td>
			                		<td><p><input type="text" name="rt_perusahaan_pemohon" maxlength="50" size="50" value="<?php echo @$item->rt_perusahaan_pemohon ?>" class="formField required number_only"></p></td>
			                	</tr>
			                	<tr>
			                		<td>RW</td>
			                		<td><p><input type="text" name="rw_perusahaan_pemohon" maxlength="50" size="50" value="<?php echo @$item->rw_perusahaan_pemohon ?>" class="formField required number_only"></p></td>
			                	</tr>
			                	<tr>
			                		<td>Kelurahan</td>
			                		<td><p><input type="text" name="kelurahan_perusahaan_pemohon" maxlength="50" size="50" value="<?php echo @$item->kelurahan_perusahaan_pemohon ?>" class="formField required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>Kecamatan</td>
			                		<td><p><input type="text" name="kecamatan_perusahaan_pemohon" maxlength="50" size="50" value="<?php echo @$item->kecamatan_perusahaan_pemohon ?>" class="formField required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>DATI II</td>
			                		<td><p><input type="text" name="dati_perusahaan_pemohon" maxlength="50" size="50" value="<?php echo @$item->dati_perusahaan_pemohon ?>" class="formField required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>Provinsi</td>
			                		<td><p><input type="text" name="propinsi_perusahaan_pemohon" maxlength="50" size="50" value="<?php echo @$item->propinsi_perusahaan_pemohon ?>" class="formField required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>Kode Pos</td>
			                		<td><p><input type="text" name="kode_pos_perusahaan_pemohon" maxlength="50" size="50" value="<?php echo @$item->kode_pos_perusahaan_pemohon ?>" class="formField required number_only"></p></td>
			                	</tr>
			                </table>
			            </td>            
			        </tr>
			        
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>No Telepon</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			            	<table>
			            		<tr>
			            		 <td>
			                		<p><input type="text" name="no_tlp_perusahaan_pemohon" maxlength="50" value="<?php echo @$item->no_tlp_perusahaan_pemohon ?>" class="formField required phone"></p>
			                	</td>
			                	<td>
			                		EXT 
			                	</td>
			                	 <td>
			                		<p><input type="text" name="no_ext_perusahaan_pemohon" maxlength="50"  value="<?php echo @$item->no_ext_perusahaan_pemohon ?>" class="formField required number_only"></p>
			                	</td>
			                	</tr>
			                </table>
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
				                		<option value="BUMN/D" <?php echo (@$item->jenis_pekerjaan_pemohon == 'BUMN/D')?'selected':''; ?>>BUMN/D</option>
				                		<option value="PNS/Instansi/Departemen/Pemda" <?php echo (@$item->jenis_pekerjaan_pemohon == 'PNS/Instansi/Departemen/Pemda')?'selected':''; ?>>PNS/Instansi/Departemen/Pemda</option>                		
				                		<option value="Swasta Asing/PM4" <?php echo (@$item->jenis_pekerjaan_pemohon == 'Swasta Asing/PM4')?'selected':''; ?>>Swasta Asing/PM4</option>                		
				                		<option value="TNI/Polri" <?php echo (@$item->jenis_pekerjaan_pemohon == 'TNI/Polri')?'selected':''; ?>>TNI/Polri</option>                		
				                		<option value="Swasta Besar/Menengah" <?php echo (@$item->jenis_pekerjaan_pemohon == 'Swasta Besar/Menengah')?'selected':''; ?>>Swasta Besar/Menengah</option>                		
				                		<option value="PMDN" <?php echo (@$item->jenis_pekerjaan_pemohon == 'PMDN')?'selected':''; ?>>PMDN</option>                		
				                		<option value="Profesional" <?php echo (@$item->jenis_pekerjaan_pemohon == 'Profesional')?'selected':''; ?>>Profesional</option>
				                	</select>                	
			                	</div>
			                </p>
			                <p><input type="text" name="jenis_pekerjaan_lain" maxlength="50" size="50" value="<?php echo @$item->jenis_pekerjaan_lain ?>" class="form-control required"></p>
			            </td>
			            
			          </tr>
			          <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Bidang Usaha</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p><input type="text" name="bidang_usaha_pemohon" maxlength="50" size="50" value="<?php echo @$item->bidang_usaha_pemohon ?>" class="form-control required"></p>
			            </td>
			            
			         </tr>
			         <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Jabatan</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p><input type="text" name="jabatan_pemohon" maxlength="50" size="50" value="<?php echo @$item->jabatan_pemohon ?>" class="form-control required"></p>
			            </td>
			            
			         </tr>
			         <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Lama Menjabat</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p><input type="text" name="lama_menjabat" maxlength="50" value="<?php echo @$item->lama_menjabat ?>" class="formField required number_only"> Tahun</p>
			            </td>
			            
			         </tr>
			         <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Masa Kerja Total:</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p><input type="text" name="total_masa_kerja" maxlength="50" value="<?php echo @$item->total_masa_kerja ?>" class="formField required number_only"> Tahun</p>
			            </td>
			            
			         </tr>
			         <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>NIP/NRP</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p><input type="text" name="nip_pemohon" maxlength="50" value="<?php echo @$item->nip_pemohon ?>" class="form-control required number_only"></p>
			            </td>
			            
			         </tr>
			         <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Nama Atasan</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p><input type="text" name="nama_atasan" maxlength="50" value="<?php echo @$item->nama_atasan ?>" class="form-control required"></p>
			            </td>
			            
			         </tr>
			          <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>No Telepon Atasan</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			            	<table>
			            		<tr>
			            		 <td>
			                		<p><input type="text" name="no_tlp_atasan" maxlength="50"value="<?php echo @$item->no_tlp_atasan ?>" class="formField required phone"></p>
			                	</td>
			                	<td>
			                		No HP 
			                	</td>
			                	 <td>
			                		<p><input type="text" name="no_hp_atasan" maxlength="50"  value="<?php echo @$item->no_hp_atasan ?>" class="formField required number_only"></p>
			                	</td>
			                	</tr>
			                </table>
			            </td>
			            
			        </tr>
			    </table>

			    <h3>DATA PEKERJAAN PASANGAN</h3>  
			    <table width="100%" class="table table-bordered">
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Nama Perusahaan / Instansi</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p><input type="text" name="nama_perusahaan_pasangan" maxlength="50" size="50" value="<?php echo @$item->nama_perusahaan_pasangan ?>" class="form-control required"></p>
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
				                		<option value="PT" <?php echo (@$item->badan_usaha_perusahaan_pasangan == 'PT')?'selected':''; ?>>PT</option>
				                		<option value="CV" <?php echo (@$item->badan_usaha_perusahaan_pasangan == 'CV')?'selected':''; ?>>CV</option>
				                		<option value="UD" <?php echo (@$item->badan_usaha_perusahaan_pasangan == 'UD')?'selected':''; ?>>UD</option>
				                		<option value="Koperasi" <?php echo (@$item->badan_usaha_perusahaan_pasangan == 'Koperasi')?'selected':''; ?>>Koperasi</option>
				                		<option value="Yayasan" <?php echo (@$item->badan_usaha_perusahaan_pasangan == 'Yayasan')?'selected':''; ?>>Yayasan</option>
				                		<option value="Instansi Pemerintah" <?php echo (@$item->badan_usaha_perusahaan_pasangan == 'Instansi Pemerintah')?'selected':''; ?>>Instansi Pemerintah</option>
				                		<option value="lainnya" <?php echo (@$item->badan_usaha_perusahaan_pasangan == 'lainnya')?'selected':''; ?>>Lainnya</option>
				                	</select>                	
			                	</div>
			                </p>
			                <p><input type="text" name="badan_usaha_perusahaan_pasangan_lainnya" id="badan_usaha_perusahaan_pasangan_lainnya" maxlength="50" size="50" value="<?php echo @$item->badan_usaha_perusahaan_pasangan_lainnya ?>" class="form-control required"></p>
			            </td>
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Alamat Perusahaan / Instansi</p>
			            </td>
			            <td width="60%" class="tdgenap" colspan="3">
			                <p><input type="text" name="alamat_perusahaan_pasangan" maxlength="50" size="50" value="<?php echo @$item->alamat_perusahaan_pasangan ?>" class="form-control required"></p>
			                <table width="100%">
			                	<tr>
			                		<td>Blok</td>
			                		<td><p><input type="text" name="blok_perusahaan_pasangan" id="blok_perusahaan_pasangan" maxlength="50" size="50" value="<?php echo @$item->blok_perusahaan_pasangan ?>" class="formField required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>No</td>
			                		<td><p><input type="text" name="no_perusahaan_pasangan" maxlength="50" size="50" value="<?php echo @$item->no_perusahaan_pasangan ?>" class="formField required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>RT</td>
			                		<td><p><input type="text" name="rt_perusahaan_pasangan" maxlength="50" size="50" value="<?php echo @$item->rt_perusahaan_pasangan ?>" class="formField required number_only"></p></td>
			                	</tr>
			                	<tr>
			                		<td>RW</td>
			                		<td><p><input type="text" name="rw_perusahaan_pasangan" maxlength="50" size="50" value="<?php echo @$item->rw_perusahaan_pasangan ?>" class="formField required number_only"></p></td>
			                	</tr>
			                	<tr>
			                		<td>Kelurahan</td>
			                		<td><p><input type="text" name="kelurahan_perusahaan_pasangan" maxlength="50" size="50" value="<?php echo @$item->kelurahan_perusahaan_pasangan ?>" class="formField required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>Kecamatan</td>
			                		<td><p><input type="text" name="kecamatan_perusahaan_pasangan" maxlength="50" size="50" value="<?php echo @$item->kecamatan_perusahaan_pasangan ?>" class="formField required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>DATI II</td>
			                		<td><p><input type="text" name="dati_perusahaan_pasangan" maxlength="50" size="50" value="<?php echo @$item->dati_perusahaan_pasangan ?>" class="formField required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>Provinsi</td>
			                		<td><p><input type="text" name="propinsi_perusahaan_pasangan" maxlength="50" size="50" value="<?php echo @$item->propinsi_perusahaan_pasangan ?>" class="formField required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>Kode Pos</td>
			                		<td><p><input type="text" name="kode_pos_perusahaan_pasangan" maxlength="50" size="50" value="<?php echo @$item->kode_pos_perusahaan_pasangan ?>" class="formField required number_only"></p></td>
			                	</tr>
			                </table>
			            </td>            
			        </tr>
			        
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>No Telepon</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			            	<table>
			            		<tr>
			            		 <td>
			                		<p><input type="text" name="tlp_perusahaan_pasangan" maxlength="50"value="<?php echo @$item->tlp_perusahaan_pasangan ?>" class="formField required phone"></p>
			                	</td>
			                	<td>
			                		EXT 
			                	</td>
			                	 <td>
			                		<p><input type="text" name="ext_perusahaan_pasangan" maxlength="50"  value="<?php echo @$item->ext_perusahaan_pasangan ?>" class="formField required number_only"></p>
			                	</td>
			                	</tr>
			                </table>
			            </td>			            
			          </tr>
			          <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>No Faks</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p><input type="text" name="fax_perusahaan_pasangan" maxlength="50" size="50" value="<?php echo @$item->fax_perusahaan_pasangan ?>" class="form-control required phone"></p>
			            </td>
			            
			         </tr>
			          <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Jenis Pekerjaan</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3">
			                <p>
			                	<div class="select-style">
				                	<select name="jenis_pekerjaan_pasangan" id="jenis_pekerjaan_pasangan" class="required">
	                          <option value="">--Pilih--</option>
				                		<option value="BUMN/D" <?php echo (@$item->jenis_pekerjaan_pasangan == 'BUMN/D')?'selected':''; ?>>BUMN/D</option>
				                		<option value="PNS/Instansi/Departemen/Pemda" <?php echo (@$item->jenis_pekerjaan_pasangan == 'PNS/Instansi/Departemen/Pemda')?'selected':''; ?>>PNS/Instansi/Departemen/Pemda</option>
				                		<option value="Swasta Asing/PM4" <?php echo (@$item->jenis_pekerjaan_pasangan == 'Swasta Asing/PM4')?'selected':''; ?>>Swasta Asing/PM4</option>
				                		<option value="TNI/Polri" <?php echo (@$item->jenis_pekerjaan_pasangan == 'TNI/Polri')?'selected':''; ?>>TNI/Polri</option>	
				                		<option value="Swasta Besar/Menengah" <?php echo (@$item->jenis_pekerjaan_pasangan == 'Swasta Besar/Menengah')?'selected':''; ?>>Swasta Besar/Menengah</option>
				                		<option value="PMDN" <?php echo (@$item->jenis_pekerjaan_pasangan == 'PMDN')?'selected':''; ?>>PMDN</option>
				                		<option value="Profesional" <?php echo (@$item->jenis_pekerjaan_pasangan == 'Profesional')?'selected':''; ?>>Profesional</option>
				                	</select>
			                	</div>
			                </p>
			                <p><input type="text" name="jenis_pekerjaan_pasangan_lain" maxlength="50" size="50" value="<?php echo @$item->jenis_pekerjaan_pasangan_lain ?>" class="form-control required"></p>
			            </td>
			            
			          </tr>
			          <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Bidang Usaha</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p><input type="text" name="bidang_usaha_pasangan" maxlength="50" size="50" value="<?php echo @$item->bidang_usaha_pasangan ?>" class="form-control required"></p>
			            </td>
			            
			         </tr>
			         <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Jabatan</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p><input type="text" name="jabatan_pasangan" maxlength="50" size="50" value="<?php echo @$item->jabatan_pasangan ?>" class="form-control required"></p>
			            </td>
			            
			         </tr>
			         <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Lama Menjabat</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p><input type="text" name="lama_menjabat_pasangan" maxlength="50" value="<?php echo @$item->lama_menjabat_pasangan ?>" class="formField required number_only"> Tahun</p>
			            </td>
			            
			         </tr>
			         <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Masa Kerja Total:</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p><input type="text" name="total_masa_kerja_pasangan" maxlength="50" value="<?php echo @$item->total_masa_kerja_pasangan ?>" class="formField required number_only"> Tahun</p>
			            </td>
			            
			         </tr>
			         <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>NIP/NRP</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p><input type="text" name="nip_pasangan" maxlength="50" value="<?php echo @$item->nip_pasangan ?>" class="formField required"></p>
			            </td>
			            
			         </tr>
			         <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Nama Atasan</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p><input type="text" name="nama_atasan_pasangan" maxlength="50" value="<?php echo @$item->nama_atasan_pasangan ?>" class="form-control required"></p>
			            </td>
			            
			         </tr>
			          <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>No Telepon</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			            	<table>
			            		<tr>
			            		 <td>
			                		<p><input type="text" name="no_tlp_atasan_pasangan" maxlength="50"value="<?php echo @$item->no_tlp_atasan_pasangan ?>" class="formField required phone"></p>
			                	</td>
			                	<td>
			                		No HP 
			                	</td>
			                	 <td>
			                		<p><input type="text" name="no_hp_pasangan" maxlength="50"  value="<?php echo @$item->no_hp_pasangan ?>" class="formField required number_only"></p>
			                	</td>
			                	</tr>
			                </table>
			            </td>
			            
			        </tr>
			    </table>
	    
	    		<h3>DATA PENGHASILAN DAN PENGELUARAN PER BULAN</h3>  
			    <table width="100%" class="table table-bordered">
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Penghasilan Utama Pemohon</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p>Rp. <input type="text" name="penghasilan_pemohon" maxlength="50" size="50" value="<?php echo @$item->penghasilan_pemohon ?>" class="formField required"></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Penghasilan Tambahan Pemohon</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p>Rp. <input type="text" name="penghasilan_tambahan_pemohon" maxlength="50" size="50" value="<?php echo @$item->penghasilan_tambahan_pemohon ?>" class="formField required"></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Penghasilan Utama Pasangan</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p>Rp. <input type="text" name="penghasilan_utama_pasangan" maxlength="50" size="50" value="<?php echo @$item->penghasilan_utama_pasangan ?>" class="formField required"></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Penghasilan Tambahan Pasangan</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p>Rp. <input type="text" name="penghasilan_tambahan_pasangan" maxlength="50" size="50" value="<?php echo @$item->penghasilan_tambahan_pasangan ?>" class="formField required"></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Total Penghasilan</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p>Rp. <input type="text" name="total_penghasilan" maxlength="50" size="50" value="<?php echo @$item->total_penghasilan ?>" class="formField required"></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Biaya Rumah Tangga</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p>Rp. <input type="text" name="biaya_rumah_tangga" maxlength="50" size="50" value="<?php echo @$item->biaya_rumah_tangga ?>" class="formField required"></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Angsuran Lainnya</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p>Rp. <input type="text" name="angsuran_lainnya" maxlength="50" size="50" value="<?php echo @$item->angsuran_lainnya ?>" class="formField required"></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Sisa Penghasilan</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p>Rp. <input type="text" name="sisa_penghasilan" maxlength="50" size="50" value="<?php echo @$item->sisa_penghasilan ?>" class="formField required"></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Kemampuan mengangsur</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p>Rp. <input type="text" name="kemampuan_angsuran" maxlength="50" size="50" value="<?php echo @$item->kemampuan_angsuran ?>" class="formField required"></p>
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
				                		<option value="KGU" <?php echo ($item->tipe_produk == 'KGU')?'selected':'' ?>>KGU</option>
				                		<option value="Ruko" <?php echo ($item->tipe_produk == 'Ruko')?'selected':'' ?>>Ruko</option>
				                		<option value="KGM" <?php echo ($item->tipe_produk == 'KGM')?'selected':'' ?>>KGM</option>
				                		<option value="Swagriya" <?php echo ($item->tipe_produk == 'Swagriya')?'selected':'' ?>>Swagriya</option>
				                		<option value="RSH" <?php echo ($item->tipe_produk == 'RSH')?'selected':'' ?>>RSH</option>
				                		<option value="KPA/KP Rusun" <?php echo ($item->tipe_produk == 'KPA/KP Rusun')?'selected':'' ?>>KPA/KP Rusun</option>
				                		<option value="Kendaraan" <?php echo ($item->tipe_produk == 'Kendaraan')?'selected':'' ?>>Kendaraan</option>
				                		<option value="Griya Sembada" <?php echo ($item->tipe_produk == 'Griya Sembada')?'selected':'' ?>>Griya Sembada</option>
				                		<option value="Kartu Kredit" <?php echo ($item->tipe_produk == 'Kartu Kredit')?'selected':'' ?>>Kartu Kredit</option>
				                		<option value="Kring Batara" <?php echo ($item->tipe_produk == 'Kring Batara')?'selected':'' ?>>Kring Batara</option>
				                		<option value="Swadana" <?php echo ($item->tipe_produk == 'Swadana')?'selected':'' ?>>Swadana</option>
				                		<option value="lainnya" <?php echo ($item->tipe_produk == 'lainnya')?'selected':'' ?>>Lainnya</option>
				                	</select>
			                	</div>
			                </p>
			                <p><input type="text" name="tipe_produk_lainnya" id="tipe_produk_lainnya" maxlength="50" size="50" value="<?php echo @$item->tipe_produk_lainnya ?>" class="form-control required"></p>
			            </td>
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Harga Jual/Nilai Taksasi/RAB Rumah</p>
			            </td>
			            <td width="60%" class="tdgenap" colspan="3">
			                <p>Rp. <input type="text" name="harga_jual" maxlength="50" size="50" value="<?php echo @$item->harga_jual ?>" class="form-control required"></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Uang Muka/Dana Sendiri</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			            	<table>
			            		<tr>
			            			<td>Rp.</td>
			                		<td><p><input type="text" name="uang_muka" maxlength="50" size="25" value="<?php echo @$item->uang_muka ?>" class="formField required"></p></td>
			                		<td><samll>atau dalam prosentasi</small></td>
			                		<td><p><input type="text" name="uang_muka_persentasi" maxlength="50" value="<?php echo @$item->uang_muka_persentasi ?>" class="formField required"></p></td>
			                		<td>%</td>
			                	</tr>
			                </table>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Nilai Kredit/Pembiayaan yang di ajukan</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p>Rp. <input type="text" name="nilai_kredit_yang_diajukan" maxlength="50" size="50" value="<?php echo @$item->nilai_kredit_yang_diajukan ?>" class="form-control required"></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Sistem Pembayaran</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3">
			                <p>
			                	<div class="select-style">
				                	<select name="sistem_pembayaran" id="sistem_pembayaran" class="required">
	                          <option value="">--Pilih--</option>
				                		<option value="Auto Debet" <?php echo ($item->sistem_pembayaran == 'Auto Debet')?'selected':'' ?>>Auto Debet</option>
				                		<option value="Payroll" <?php echo ($item->sistem_pembayaran == 'Payroll')?'selected':'' ?>>Payroll</option>
				                		<option value="Kolektif" <?php echo ($item->sistem_pembayaran == 'Kolektif')?'selected':'' ?>>Kolektif</option>
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
			                <p><input type="text" name="jangka_waktu_kredit" maxlength="50" value="<?php echo @$item->jangka_waktu_kredit ?>" class="formField required"> Bulan</p>	                
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
				                		<option value="Pembelian Rumah" <?php echo ($item->penggunaan == 'Pembelian Rumah')?'selected':'' ?>>Pembelian Rumah</option>
				                		<option value="Konsumtif" <?php echo ($item->penggunaan == 'Konsumtif')?'selected':'' ?>>Konsumtif</option>
				                		<option value="Pembelian Mobil" <?php echo ($item->penggunaan == 'Pembelian Mobil')?'selected':'' ?>>Pembelian Mobil</option>
				                		<option value="Pembangunan Rumah" <?php echo ($item->penggunaan == 'Pembangunan Rumah')?'selected':'' ?>>Pembangunan Rumah</option>
				                		<option value="Kartu Kredit" <?php echo ($item->penggunaan == 'Kartu Kredit')?'selected':'' ?>>Kartu Kredit</option>
				                		<option value="Pembelian Apartement" <?php echo ($item->penggunaan == 'Pembelian Apartement')?'selected':'' ?>>Pembelian Apartement</option>
				                		<option value="Pembelian Ruko" <?php echo ($item->penggunaan == 'Pembelian Ruko')?'selected':'' ?>>Pembelian Ruko</option>	
				                		<option value="Griya Sembada" <?php echo ($item->penggunaan == 'Griya Sembada')?'selected':'' ?>>Griya Sembada</option>
				                		<option value="Kartu Kredit" <?php echo ($item->penggunaan == 'Kartu Kredit')?'selected':'' ?>>Kartu Kredit</option>
				                		<option value="Kring Batara" <?php echo ($item->penggunaan == 'Kring Batara')?'selected':'' ?>>Kring Batara</option>
				                		<option value="Swadana" <?php echo ($item->penggunaan == 'Swadana')?'selected':'' ?>>Swadana</option>
				                		<option value="lainnya" <?php echo ($item->penggunaan == 'lainnya')?'selected':'' ?>>Lainnya</option>
				                	</select>
			                	</div>
			                </p>
			                <p><input type="text" name="penggunaan_lainnya" maxlength="50" size="50" value="<?php echo @$item->penggunaan_lainnya ?>" class="form-control required"></p>
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
			                <p><input type="text" name="alamat_perusahaan_angunan" maxlength="50" size="50" value="<?php echo @$item->alamat_perusahaan_angunan ?>" class="form-control required"></p>
			                <table width="100%">
			                	<tr>
			                		<td>Blok</td>
			                		<td><p><input type="text" name="blok_perusahaan_angunan" maxlength="50" size="50" value="<?php echo @$item->blok_perusahaan_angunan ?>" class="formField required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>No</td>
			                		<td><p><input type="text" name="no_perusahaan_angunan" maxlength="50" size="50" value="<?php echo @$item->no_perusahaan_angunan ?>" class="formField required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>RT</td>
			                		<td><p><input type="text" name="rt_perusahaan_angunan" maxlength="50" size="50" value="<?php echo @$item->rt_perusahaan_angunan ?>" class="formField required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>RW</td>
			                		<td><p><input type="text" name="rw_perusahaan_angunan" maxlength="50" size="50" value="<?php echo @$item->rw_perusahaan_angunan ?>" class="formField required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>Kelurahan</td>
			                		<td><p><input type="text" name="kelurahan_perusahaan_angunan" maxlength="50" size="50" value="<?php echo @$item->kelurahan_perusahaan_angunan ?>" class="formField required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>Kecamatan</td>
			                		<td><p><input type="text" name="kecamatan_perusahaan_angunan" maxlength="50" size="50" value="<?php echo @$item->kecamatan_perusahaan_angunan ?>" class="formField required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>DATI II</td>
			                		<td><p><input type="text" name="dati_perusahaan_angunan" maxlength="50" size="50" value="<?php echo @$item->dati_perusahaan_angunan ?>" class="formField required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>Provinsi</td>
			                		<td><p><input type="text" name="propinsi_perusahaan_angunan" maxlength="50" size="50" value="<?php echo @$item->propinsi_perusahaan_angunan ?>" class="formField required"></p></td>
			                	</tr>
			                	<tr>
			                		<td>Kode Pos</td>
			                		<td><p><input type="text" name="kode_pos_perusahaan_angunan" maxlength="50" size="50" value="<?php echo @$item->kode_pos_perusahaan_angunan ?>" class="formField required"></p></td>
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
				                		<option value="SHM" <?php echo (@$item->status_kepemilikan_angunan=='SHM')?'selected':'' ?>>SHM</option>
				                		<option value="SHGB" <?php echo (@$item->status_kepemilikan_angunan=='SHGB')?'selected':'' ?>>SHGB</option>
				                		<option value="Strata Title" <?php echo (@$item->status_kepemilikan_angunan=='Strata Title')?'selected':'' ?>>Strata Title</option>
				                		<option value="BPKB" <?php echo (@$item->status_kepemilikan_angunan=='BPKB')?'selected':'' ?>>BPKB</option>
				                		<option value="Deposito" <?php echo (@$item->status_kepemilikan_angunan=='Deposito')?'selected':'' ?>>Deposito</option>
				                		<option value="SK Pegawai" <?php echo (@$item->status_kepemilikan_angunan=='SK Pegawai')?'selected':'' ?>>SK Pegawai</option>
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
			                <p> <input type="text" name="no_sertifikat_bangunan_tanah" maxlength="50"  size="50" value="<?php echo @$item->no_sertifikat_bangunan_tanah ?>" class="form-control required"></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Tanggal Terbit</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <div id="datetimepicker2" class="input-append date">
                        <input name="tanggal_terbit_sertifikat" id="tanggal_terbit_sertifikat" value="<?php echo @$item->tanggal_terbit_sertifikat ?>" data-format="dd/MM/yyyy" type="text" class="required" readonly></input>
                        <span class="add-on"><i class="fa fa-calendar"></i></span>
                      </div>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Luas Tanah</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p> <input type="text" name="luas_tanah" maxlength="50"  value="<?php echo @$item->luas_tanah ?>" class="formField required"> M<sup>2</sup></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Luas Bangunan</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p> <input type="text" name="luas_bangunan" maxlength="50"  value="<?php echo @$item->luas_bangunan ?>" class="formField required"> M<sup>2</sup></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Atas Nama</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p><input type="text" name="bangunan_atas_nama" maxlength="50" size="50" value="<?php echo @$item->bangunan_atas_nama ?>" class="form-control required"></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>No IMB</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p><input type="text" name="no_imb" maxlength="50" value="<?php echo @$item->no_imb ?>" class="formField required"></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Tanggal Terbit</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <div id="datetimepicker2" class="input-append date">
                        <input name="tanggal_tebit_imb" id="tanggal_tebit_imb" data-format="dd/MM/yyyy" value="<?php echo @$item->tanggal_tebit_imb ?>" type="text" class="required" readonly></input>
                        <span class="add-on"><i class="fa fa-calendar"></i></span>
                      </div>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Nama Pengembang</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p><input type="text" name="nama_pengembang" maxlength="50" value="<?php echo @$item->nama_pengembang ?>" class="form-control required"></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Nama Proyek Perumahaan</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p><input type="text" name="nama_proyek_perumahan" maxlength="50" size="50" value="<?php echo @$item->nama_proyek_perumahan ?>" class="form-control required"></p>
			            </td>
			            
			        </tr>	
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Nama Penjual</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p><input type="text" name="nama_penjual" maxlength="50" size="50" value="<?php echo @$item->nama_penjual ?>" class="form-control required"></p>
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
				                		<option value="APV" <?php echo (@$item->jenis_kendaraan=='APV')?'selected':'' ?>>APV</option>
				                		<option value="Deliveri Van" <?php echo (@$item->jenis_kendaraan=='Deliveri Van')?'selected':'' ?>>Deliveri Van</option>
				                		<option value="Honda" <?php echo (@$item->jenis_kendaraan=='Honda')?'selected':'' ?>>Honda</option>
				                		<option value="Jeep" <?php echo (@$item->jenis_kendaraan=='Jeep')?'selected':'' ?>>Jeep</option>
				                		<option value="Minibus" <?php echo (@$item->jenis_kendaraan=='Minibus')?'selected':'' ?>>Minibus</option>
				                		<option value="Microbus" <?php echo (@$item->jenis_kendaraan=='Microbus')?'selected':'' ?>>Microbus</option>
				                		<option value="Sepeda Motor" <?php echo (@$item->jenis_kendaraan=='Sepeda Motor')?'selected':'' ?>>Sepeda Motor</option>
				                		<option value="MVP" <?php echo (@$item->jenis_kendaraan=='MVP')?'selected':'' ?>>MVP</option>
				                		<option value="Pick up" <?php echo (@$item->jenis_kendaraan=='Pick up')?'selected':'' ?>>Pick up</option>
				                		<option value="Sedan" <?php echo (@$item->jenis_kendaraan=='Sedan')?'selected':'' ?>>Sedan</option>
				                		<option value="Station Wagon" <?php echo (@$item->jenis_kendaraan=='Station Wagon')?'selected':'' ?>>Station Wagon</option>
				                		<option value="SUV" <?php echo (@$item->jenis_kendaraan=='SUV')?'selected':'' ?>>SUV</option>
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
			                <p> <input type="text" name="merk_kendaraan" maxlength="50"  size="50" value="<?php echo @$item->merk_kendaraan ?>" class="form-control required"></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Model</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p> <input type="text" name="model_kendaraan" maxlength="50"  value="<?php echo @$item->model_kendaraan ?>" class="formField required"></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Tipe</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p> <input type="text" name="type_kendaraan" maxlength="50"  value="<?php echo @$item->type_kendaraan ?>" class="formField required"></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>No Mesin</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p> <input type="text" name="no_mesin" maxlength="50"  value="<?php echo @$item->no_mesin ?>" class="formField required"></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>No Rangka</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p> <input type="text" name="no_rangka" maxlength="50"  value="<?php echo @$item->no_rangka ?>" class="formField required"></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>No BPKB</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p> <input type="text" name="no_bpkb" maxlength="50"  value="<?php echo @$item->no_bpkb ?>" class="formField required"></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Tanggal Terbit</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			            	<div id="datetimepicker2" class="input-append date">
                      <input name="tanggal_terbit_kendaraan" id="tanggal_terbit_kendaraan" value="<?php echo @$item->tanggal_terbit_kendaraan ?>" data-format="dd/MM/yyyy" type="text" class="required" readonly></input>
                      <span class="add-on"><i class="fa fa-calendar"></i></span>
                    </div>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>No Polisi</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p> <input type="text" name="no_polisi" maxlength="50"  value="<?php echo @$item->no_polisi ?>" class="formField required"></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Dealer</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p> <input type="text" name="dealer" maxlength="50"  size="50" value="<?php echo @$item->dealer ?>" class="form-control required"></p>
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
			                <p> <input type="text" name="pemilik_angunan_depsito" maxlength="50"  size="50" value="<?php echo @$item->pemilik_angunan_depsito ?>" class="form-control required"></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Nama Bank/Other Deposit</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p> <input type="text" name="nama_bank_deposito" maxlength="50"  size="50" value="<?php echo @$item->nama_bank_deposito ?>" class="form-control required"></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Nomor simpanan</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p> <input type="text" name="no_simpanan_deposito" maxlength="50"  size="50" value="<?php echo @$item->no_simpanan_deposito ?>" class="form-control required"></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Nilai</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p>Rp.<input type="text" name="nilai_deposito" maxlength="50"  size="50" value="<?php echo @$item->nilai_deposito ?>" class="formField required"></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Bunga Simpanan</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p> <input type="text" name="bunga_simpanan_deposito" maxlength="50" value="<?php echo @$item->bunga_simpanan_deposito ?>" class="formField required"> %</p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Tanggal Terbit</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <div id="datetimepicker2" class="input-append date">
	                      <input name="tanggal_terbit_deposito" id="tanggal_terbit_deposito" value="<?php echo @$item->tanggal_terbit_deposito ?>" data-format="dd/MM/yyyy" type="text" class="required" readonly></input>
	                      <span class="add-on"><i class="fa fa-calendar"></i></span>
	                    </div>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Jatuh Tempo Kredit</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p> <input type="text" name="jatuh_tempo_kredit_deposito" maxlength="50" value="<?php echo @$item->jatuh_tempo_kredit_deposito ?>" class="formField required"></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Jangka Waktu Kredit</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p> <input type="text" name="jangka_waktu_kredit_deposito" maxlength="50" value="<?php echo @$item->jangka_waktu_kredit_deposito ?>" class="formField required"> Bulan</p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Model</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p> <input type="text" name="model_deposito" maxlength="50"  value="<?php echo @$item->model_deposito ?>" class="formField required"></p>
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
			                <p> <input type="text" name="no_sk" maxlength="50"  size="50" value="<?php echo @$item->no_sk ?>" class="form-control required"></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Tanggal Terbit</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			            	<div id="datetimepicker2" class="input-append date">
                      <input name="tanggal_terbit_sk" id="tanggal_terbit_sk" data-format="dd/MM/yyyy" value="<?php echo @$item->tanggal_terbit_sk ?>" type="text" class="required" readonly></input>
                      <span class="add-on"><i class="fa fa-calendar"></i></span>
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
			                <p><input type="text" name="nama_bank_pinjaman_lain" maxlength="50" size="50" value="<?php echo @$item->nama_bank_pinjaman_lain ?>" class="formField required"></p>
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
				                		<option value="JPA" <?php echo (@$item->jenis_produk_pinjaman_lain == 'JPA')?'selected':''; ?>>JPA</option>
				                		<option value="Kredit Mobil" <?php echo (@$item->jenis_produk_pinjaman_lain == 'Kredit Mobil')?'selected':''; ?>>Kredit Mobil</option>
				                		<option value="Kartu Kredit" <?php echo (@$item->jenis_produk_pinjaman_lain == 'Kartu Kredit')?'selected':''; ?>>Kartu Kredit</option>
				                		<option value="Modal Kerja" <?php echo (@$item->jenis_produk_pinjaman_lain == 'Modal Kerja')?'selected':''; ?>>Modal Kerja</option>
				                		<option value="Konsumtif" <?php echo (@$item->jenis_produk_pinjaman_lain == 'Konsumtif')?'selected':''; ?>>Konsumtif</option>
				                		<option value="Pegawai" <?php echo (@$item->jenis_produk_pinjaman_lain == 'Pegawai')?'selected':''; ?>>Pegawai</option>
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
			                <p>Rp.<input type="text" name="plafond" maxlength="50" size="50" value="<?php echo @$item->plafond ?>" class="formField required"></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Tunggakan</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p>Rp.<input type="text" name="tunggakan" maxlength="50" size="50" value="<?php echo @$item->tunggakan ?>" class="formField required"></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Outstanding</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p>Rp.<input type="text" name="outstanding" maxlength="50" size="50" value="<?php echo @$item->outstanding ?>" class="formField required"></p>
			            </td>
			            
			        </tr>
			        <tr valign="top">
			            <td width="40%" class="tdganjil">
			                <p>Angsuran</p>
			            </td>

			            <td width="60%" class="tdgenap" colspan="3	">
			                <p>Rp.<input type="text" name="angsuran_pinjaman_lain" maxlength="50" size="50" value="<?php echo @$item->angsuran_pinjaman_lain ?>" class="formField required"></p>
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
			                <p><input type="text" name= "tabungan_kekayaan" maxlength="50" size="30" value="<?php echo @$item->tabungan_kekayaan ?>" class="formField required"></p>
			            </td>
			            <td class="tdgenap"   >
			                <p>Rp <input type="text" name= "rata_rata_saldo_tabungan" maxlength="50" size="30" value="<?php echo @$item->rata_rata_saldo_tabungan ?>" class="formField required"></p>
			            </td>
			            <td class="tdgenap"   >
			                <p>
			                	Atas Nama 
			                	<div class="select-style">
				                	<select name="atas_nama_tabungan" class="required">
	                          <option value="">--Pilih--</option>
				                		<option value="Pemohon" <?php echo (@$item->atas_nama_tabungan=='Pemohon')?'selected':''; ?>>Pemohon</option>
				                		<option value="Pasangan" <?php echo (@$item->atas_nama_tabungan=='Pasangan')?'selected':''; ?>>Pasangan</option>
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
			                <p><input type="text" name= "giro_kekayaan" maxlength="50" size="30" value="<?php echo @$item->giro_kekayaan ?>" class="formField required"></p>
			            </td>
			            <td class="tdgenap"   >
			                <p>Rp <input type="text" name= "rata_rata_saldo_giro" maxlength="50" size="30" value="<?php echo @$item->rata_rata_saldo_giro ?>" class="formField required"></p>
			            </td>
			            <td class="tdgenap"   >
			                <p>
			                	Atas Nama 
			                	<div class="select-style">
				                	<select name="atas_nama_giro" class="required">
	                          <option value="">--Pilih--</option>
				                		<option value="Pemohon" <?php echo (@$item->atas_nama_giro=='Pemohon')?'selected':''; ?>>Pemohon</option>
				                		<option value="Pasangan" <?php echo (@$item->atas_nama_giro=='Pasangan')?'selected':''; ?>>Pasangan</option>
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
			                <p><input type="text" name= "deposito_kekayaan" maxlength="50" size="30" value="<?php echo @$item->deposito_kekayaan ?>" class="formField required"></p>
			            </td>
			            <td class="tdgenap"   >
			                <p>Rp <input type="text" name= "rata_rata_saldo_deposito" maxlength="50" size="30" value="<?php echo @$item->rata_rata_saldo_deposito ?>" class="formField required"></p>
			            </td>
			            <td class="tdgenap"   >
			                <p>
			                	Atas Nama 
			                	<div class="select-style">
				                	<select name="atas_nama_deposito" class="required">
	                          <option value="">--Pilih--</option>
				                		<option value="Pemohon" <?php echo (@$item->atas_nama_deposito=='Pemohon')?'selected':''; ?>>Pemohon</option>
				                		<option value="Pasangan" <?php echo (@$item->atas_nama_deposito=='Pasangan')?'selected':''; ?>>Pasangan</option>
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
			                <p>Atas Nama<br /><input type="text" name= "atas_nama_rumah" maxlength="50" size="30" value="<?php echo @$item->atas_nama_rumah ?>" class="formField required"></p>
			            </td>
			            <td class="tdgenap" colspan="2">
			                <p>Nilai Rumah <br />Rp <input type="text" name= "nilai_rumah" maxlength="50" size="30" value="<?php echo @$item->nilai_rumah ?>" class="formField required"></p>
			            </td>
			            
			                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
			        </tr>
			        <tr valign="top">
			            <td class="tdganjil">
			                <p>Kendaraan</p>
			            </td>

			            <td class="tdgenap"   >
			                <p>Atas Nama <br /><input type="text" name= "atas_nama_kendaraan" maxlength="50" size="30" value="<?php echo @$item->atas_nama_kendaraan ?>" class="formField required"></p>
			            </td>
			            <td class="tdgenap"   colspan="2">
			                <p>Nilai Kendaraan <br />Rp <input type="text" name= "nilai_kendaraan" maxlength="50" size="30" value="<?php echo @$item->nilai_kendaraan ?>" class="formField required"></p>
			            </td>
			            
			                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
			        </tr>
			    </table>
			    <div class="box-btn">
              <a href="" class="btn btn-blue">Batal</a>
              <a href="javascript:void(0)" id="submitProsessUpdateKredit" class="btn btn-yellow">Update</a>
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
