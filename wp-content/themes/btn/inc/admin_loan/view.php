<div class="clearfix">
<br /><br />
</div>

<?php
global $wpdb;

// $reg_sql = "SELECT * FROM btn_pinjaman where id = ".$_GET['edit'];
// $items = $wpdb->get_results($reg_sql,ARRAY_A);
// print_r($items);die();

// $upload_dir = wp_upload_dir();
// echo $upload_dir['baseurl'];
// $url = home_url();
// echo "string";
// echo $upload_dir['url'];
// echo $url; die();

echo '<style>
*{font-family:arial;font-size:12px}
table,
table tr td,
table tr th {
	border:1px solid #000 !important;
}
table tr td{padding:5px}
h2{font-size:18px}
h3{font-size:14px;background:none!important;}
</style>';

			$data_pijaman_sql = "SELECT * FROM btn_pinjaman where id = ".$_GET['edit'];
			$data_pinjaman = $wpdb->get_row($data_pijaman_sql);
			?>			
			<h2 style="text-align:center">Data Permohonan Pengajuan Pinjaman & Kredit</h2>
			<div class="reg_id">Reg_id : <?php echo @$data_pinjaman->id_reg; ?></div>
			<table style="width:100%;" cellpadding="0" cellspacing="0">			
					<tr><td colspan="4" style="width:30%;font-weight:bold"><h3 style="margin:0;padding:0;line-height:20px;text-transform:uppercase">Data Diri</h3></td></tr>					
							<tr>
								<td style="width:30%;font-weight:bold" >Nama Lengkap</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->nama_lengkap?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >No KTP/SIM</td>
								<td style=""><?php echo @$data_pinjaman->no_tanda_pengenal?></td>
								<td style="width:20%;font-weight:bold" >Berlaku s.d</td>
								<td style=""><?php echo @$data_pinjaman->tanggal_berlaku_pengenal?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Alamat Rumah (Sesuai KTP)</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->alamat?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" ></td>
								<td style="width:30%;font-weight:bold" >Blok</td>
								<td style="" colspan="2" ><?php echo @$data_pinjaman->blok_alamat?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" ></td>
								<td style="width:30%;font-weight:bold" >No</td>
								<td style="" colspan="2" ><?php echo @$data_pinjaman->no_alamat?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" ></td>
								<td style="width:30%;font-weight:bold" >RT</td>
								<td style="" colspan="2" ><?php echo @$data_pinjaman->rt?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" ></td>
								<td style="width:30%;font-weight:bold" >RW</td>
								<td style="" colspan="2" ><?php echo @$data_pinjaman->rw?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" ></td>
								<td style="width:30%;font-weight:bold" >Kelurahan</td>
								<td style="" colspan="2" ><?php echo @$data_pinjaman->kelurahan?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" ></td>
								<td style="width:30%;font-weight:bold" >Kecamatan</td>
								<td style="" colspan="2" ><?php echo @$data_pinjaman->kecamatan?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" ></td>
								<td style="width:30%;font-weight:bold" >Dati II</td>
								<td style="" colspan="2" ><?php echo @$data_pinjaman->dati?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" ></td>
								<td style="width:30%;font-weight:bold" >Provinsi</td>
								<td style="" colspan="2" ><?php echo @$data_pinjaman->propinsi?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" ></td>
								<td style="width:30%;font-weight:bold" >Kode Pos</td>
								<td style="" colspan="2" ><?php echo @$data_pinjaman->kode_pos?></td>
							</tr>

							<tr>
								<td style="width:30%;font-weight:bold" >Alamat Rumah (Diisi apabila tidak sesuai KTP)</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->alamat_dif_ktp?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" ></td>
								<td style="width:30%;font-weight:bold" >Blok</td>
								<td style="" colspan="2" ><?php echo @$data_pinjaman->blok_dif_ktp?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" ></td>
								<td style="width:30%;font-weight:bold" >No</td>
								<td style="" colspan="2" ><?php echo @$data_pinjaman->no_dif_ktp?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" ></td>
								<td style="width:30%;font-weight:bold" >RT</td>
								<td style="" colspan="2" ><?php echo @$data_pinjaman->rt_dif_ktp?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" ></td>
								<td style="width:30%;font-weight:bold" >RW</td>
								<td style="" colspan="2" ><?php echo @$data_pinjaman->rw_dif_ktp?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" ></td>
								<td style="width:30%;font-weight:bold" >Kelurahan</td>
								<td style="" colspan="2" ><?php echo @$data_pinjaman->kelurahan_dif_ktp?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" ></td>
								<td style="width:30%;font-weight:bold" >Kecamatan</td>
								<td style="" colspan="2" ><?php echo @$data_pinjaman->kecamatan_dif_ktp?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" ></td>
								<td style="width:30%;font-weight:bold" >Dati II</td>
								<td style="" colspan="2" ><?php echo @$data_pinjaman->dati_dif_ktp?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" ></td>
								<td style="width:30%;font-weight:bold" >Provinsi</td>
								<td style="" colspan="2" ><?php echo @$data_pinjaman->propinsi_dif_ktp?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" ></td>
								<td style="width:30%;font-weight:bold" >Kode Pos</td>
								<td style="" colspan="2" ><?php echo @$data_pinjaman->kode_pos_dif_ktp?></td>
							</tr>

							<tr>
								<td style="width:30%;font-weight:bold" >No Telepon Rumah</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->tlp_rumah?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >No Faximili</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->faximili?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >No Handphone</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->no_hp?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Email</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->email?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Status Rumah</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->status_rumah?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" ></td>
								<td style="width:30%;font-weight:bold" >Sedang Dijaminkan Ke</td>
								<td style="" colspan="2" ><?php echo @$data_pinjaman->dijaminkan_rumah?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Lama Ditempati</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->lama_di_tempati?></td>
							</tr>

							<tr>
								<td colspan="4" style="width:30%;font-weight:bold" >Alamat Penagihan</td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" ></td>
								<td style="width:30%;font-weight:bold" >Alamat Rumah (Sesuai KTP)</td>
								<td style="" colspan="2" ><?php echo @$data_pinjaman->alamat_penagihan_ktp?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" ></td>
								<td style="width:30%;font-weight:bold" >Alamat Rumah (Diisi apabila tidak sesuai KTP)</td>
								<td style="" colspan="2" ><?php echo @$data_pinjaman->alamat_penagihan_dif_ktp?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" ></td>
								<td style="width:30%;font-weight:bold" >Alamat Kantor</td>
								<td style="" colspan="2" ><?php echo @$data_pinjaman->alamat_penagihan_kantor?></td>
							</tr>

							<tr>
								<td style="width:30%;font-weight:bold" >NPWP</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->npwp?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Agama</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->agama?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Agama Lainnya</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->agama_lainnya?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Tempat Lahir</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->tempat_lahir?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Tanggal Lahir</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->tanggal_lahir?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Pendidikan</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->pendidikan?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Status Nikah</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->status_nikah?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Nama Gadis Ibu Kandung</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->nama_gadis_ibu_kandung?></td>
							</tr>

							<!-- Keluarg terdekat -->
							<tr><td colspan="4" style="width:30%;font-weight:bold"><h3 style="margin:0;padding:0;line-height:20px;text-transform:uppercase">KELUARGA TERDEKAT (Yang Tidak Tinggal Serumah)</h3></td></tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Nama Lengkap</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->nama_keluarga_dekat?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Hubungan Dengan Pemohon</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->hubungan_pemohon?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Hubungan Dengan Pemohon Lainnya</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->hubungan_pemohon_lainnya?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Alamat Rumah Tinggal</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->alamat_keluarga_dekat?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" ></td>
								<td style="width:30%;font-weight:bold" >Blok</td>
								<td style="" colspan="2" ><?php echo @$data_pinjaman->blok_keluarga_dekat?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" ></td>
								<td style="width:30%;font-weight:bold" >No</td>
								<td style="" colspan="2" ><?php echo @$data_pinjaman->no_alamat_keluarga_dekat?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" ></td>
								<td style="width:30%;font-weight:bold" >RT</td>
								<td style="" colspan="2" ><?php echo @$data_pinjaman->rt_keluarga_dekat?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" ></td>
								<td style="width:30%;font-weight:bold" >RW</td>
								<td style="" colspan="2" ><?php echo @$data_pinjaman->rw_keluarga_dekat?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" ></td>
								<td style="width:30%;font-weight:bold" >Kelurahan</td>
								<td style="" colspan="2" ><?php echo @$data_pinjaman->kelurahan_keluarga_dekat?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" ></td>
								<td style="width:30%;font-weight:bold" >Kecamatan</td>
								<td style="" colspan="2" ><?php echo @$data_pinjaman->kecamatan_keluarga_dekat?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" ></td>
								<td style="width:30%;font-weight:bold" >Dati II</td>
								<td style="" colspan="2" ><?php echo @$data_pinjaman->dati_keluarga_dekat?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" ></td>
								<td style="width:30%;font-weight:bold" >Provinsi</td>
								<td style="" colspan="2" ><?php echo @$data_pinjaman->propinsi_keluarga_dekat?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" ></td>
								<td style="width:30%;font-weight:bold" >Kode Pos</td>
								<td style="" colspan="2" ><?php echo @$data_pinjaman->kode_pos_keluarga_dekat?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Telepon Rumah</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->tlp_rumah_keluarga_dekat?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >No HP 1</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->no_hp_keluarga_dekat_1?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >No HP 2</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->no_hp_keluarga_dekat_2?></td>
							</tr>

							<!-- Data Pasangan -->
							<?php if (@$data_pinjaman->status_nikah == 'Menikah') {?>
							<tr><td colspan="4" style="width:30%;font-weight:bold"><h3 style="margin:0;padding:0;line-height:20px;text-transform:uppercase">DATA PRIBADI PASANGAN</h3></td></tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Nama Lengkap</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->nama_pasangan?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >No KTP/SIM</td>
								<td style=""><?php echo @$data_pinjaman->no_ktp_pasangan?></td>
								<td style="width:20%;font-weight:bold" >Berlaku s.d</td>
								<td style=""><?php echo @$data_pinjaman->tanggal_berlaku_ktp_pasangan?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Alamat Tinggal</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->alamat_pasangan?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" ></td>
								<td style="width:30%;font-weight:bold" >Blok</td>
								<td style="" colspan="2" ><?php echo @$data_pinjaman->blok_pasangan?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" ></td>
								<td style="width:30%;font-weight:bold" >No</td>
								<td style="" colspan="2" ><?php echo @$data_pinjaman->no_alamat_pasangan?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" ></td>
								<td style="width:30%;font-weight:bold" >RT</td>
								<td style="" colspan="2" ><?php echo @$data_pinjaman->rt_pasangan?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" ></td>
								<td style="width:30%;font-weight:bold" >RW</td>
								<td style="" colspan="2" ><?php echo @$data_pinjaman->rw_pasangan?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" ></td>
								<td style="width:30%;font-weight:bold" >Kelurahan</td>
								<td style="" colspan="2" ><?php echo @$data_pinjaman->kelurahan_pasangan?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" ></td>
								<td style="width:30%;font-weight:bold" >Kecamatan</td>
								<td style="" colspan="2" ><?php echo @$data_pinjaman->kecamatan_pasangan?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" ></td>
								<td style="width:30%;font-weight:bold" >Dati II</td>
								<td style="" colspan="2" ><?php echo @$data_pinjaman->dati_pasangan?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" ></td>
								<td style="width:30%;font-weight:bold" >Provinsi</td>
								<td style="" colspan="2" ><?php echo @$data_pinjaman->propinsi_pasangan?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" ></td>
								<td style="width:30%;font-weight:bold" >Kode Pos</td>
								<td style="" colspan="2" ><?php echo @$data_pinjaman->kode_pos_pasangan?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Tempat Lahir</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->tempat_lahir_pasangan?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Tanggal Lahir</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->tanggal_lahir_pasangan?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Telepon Rumah</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->no_tlp_rumah_pasangan?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >No HP 1</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->no_hp_1_pasangan?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >No HP 2</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->no_hp_2_pasangan?></td>
							</tr>
							<?php } ?>
							<!-- Data Pekerjaan Pemohon -->
							<tr><td colspan="4" style="width:30%;font-weight:bold"><h3 style="margin:0;padding:0;line-height:20px;text-transform:uppercase">DATA PEKERJAAN PEMOHON</h3></td></tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Nama Perusahaan/Instansi</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->nama_perusahaan_pemohon?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Bentuk Badan Usaha Saat Ini</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->badan_usaha?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Bentuk Badan Usaha Lainnya</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->badan_usaha_lainnya?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Alamat Perusahaan/Instansi</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->alamat_perusahaan_pemohon?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" ></td>
								<td style="width:30%;font-weight:bold" >Blok</td>
								<td style="" colspan="2" ><?php echo @$data_pinjaman->blok_perusahaan_pemohon?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" ></td>
								<td style="width:30%;font-weight:bold" >No</td>
								<td style="" colspan="2" ><?php echo @$data_pinjaman->no_perusahaan_pemohon?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" ></td>
								<td style="width:30%;font-weight:bold" >RT</td>
								<td style="" colspan="2" ><?php echo @$data_pinjaman->rt_perusahaan_pemohon?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" ></td>
								<td style="width:30%;font-weight:bold" >RW</td>
								<td style="" colspan="2" ><?php echo @$data_pinjaman->rw_perusahaan_pemohon?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" ></td>
								<td style="width:30%;font-weight:bold" >Kelurahan</td>
								<td style="" colspan="2" ><?php echo @$data_pinjaman->kelurahan_perusahaan_pemohon?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" ></td>
								<td style="width:30%;font-weight:bold" >Kecamatan</td>
								<td style="" colspan="2" ><?php echo @$data_pinjaman->kecamatan_perusahaan_pemohon?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" ></td>
								<td style="width:30%;font-weight:bold" >Dati II</td>
								<td style="" colspan="2" ><?php echo @$data_pinjaman->dati_perusahaan_pemohon?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" ></td>
								<td style="width:30%;font-weight:bold" >Provinsi</td>
								<td style="" colspan="2" ><?php echo @$data_pinjaman->propinsi_perusahaan_pemohon?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" ></td>
								<td style="width:30%;font-weight:bold" >Kode Pos</td>
								<td style="" colspan="2" ><?php echo @$data_pinjaman->kode_pos_perusahaan_pemohon?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >No Telepon</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->no_tlp_perusahaan_pemohon?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Ext</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->no_ext_perusahaan_pemohon?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Jenis Pekerjaan</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->jenis_pekerjaan_pemohon?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Jenis Pekerjaan Lainnya </td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->jenis_pekerjaan_lain?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Bidang Usaha</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->bidang_usaha_pemohon?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Jabatan</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->jabatan_pemohon?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Lama Menjabat</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->lama_menjabat?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Masa Kerja Total</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->total_masa_kerja?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >NIP/NRP</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->nip_pemohon?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Nama Atasan</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->nama_atasan?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >No Telepon Atasan</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->no_tlp_atasan?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Nama Handphone Atasan</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->no_hp_atasan?></td>
							</tr>

							<!-- Data Pekerjaan Pasangan -->
							<?php if (@$data_pinjaman->status_nikah == 'Menikah') {?>
							<tr><td colspan="4" style="width:30%;font-weight:bold"><h3 style="margin:0;padding:0;line-height:20px;text-transform:uppercase">DATA PEKERJAAN PASANGAN</h3></td></tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Nama Perusahaan/Instansi</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->nama_perusahaan_pasangan?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Bentuk Badan Usaha Saat Ini</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->badan_usaha_perusahaan_pasangan?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Bentuk Badan Usaha Lainnya</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->badan_usaha_perusahaan_pasangan_lainnya?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Alamat Perusahaan/Instansi</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->alamat_perusahaan_pasangan?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" ></td>
								<td style="width:30%;font-weight:bold" >Blok</td>
								<td style="" colspan="2" ><?php echo @$data_pinjaman->blok_perusahaan_pasangan?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" ></td>
								<td style="width:30%;font-weight:bold" >No</td>
								<td style="" colspan="2" ><?php echo @$data_pinjaman->no_perusahaan_pasangan?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" ></td>
								<td style="width:30%;font-weight:bold" >RT</td>
								<td style="" colspan="2" ><?php echo @$data_pinjaman->rt_perusahaan_pasangan?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" ></td>
								<td style="width:30%;font-weight:bold" >RW</td>
								<td style="" colspan="2" ><?php echo @$data_pinjaman->rw_perusahaan_pasangan?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" ></td>
								<td style="width:30%;font-weight:bold" >Kelurahan</td>
								<td style="" colspan="2" ><?php echo @$data_pinjaman->kelurahan_perusahaan_pasangan?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" ></td>
								<td style="width:30%;font-weight:bold" >Kecamatan</td>
								<td style="" colspan="2" ><?php echo @$data_pinjaman->kecamatan_perusahaan_pasangan?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" ></td>
								<td style="width:30%;font-weight:bold" >Dati II</td>
								<td style="" colspan="2" ><?php echo @$data_pinjaman->dati_perusahaan_pasangan?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" ></td>
								<td style="width:30%;font-weight:bold" >Provinsi</td>
								<td style="" colspan="2" ><?php echo @$data_pinjaman->propinsi_perusahaan_pasangan?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" ></td>
								<td style="width:30%;font-weight:bold" >Kode Pos</td>
								<td style="" colspan="2" ><?php echo @$data_pinjaman->kode_pos_perusahaan_pasangan?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >No Telepon</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->no_tlp_perusahaan_pasangan?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Ext</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->no_ext_perusahaan_pasangan?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >No Faximili</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->fax_perusahaan_pasangan?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Jenis Pekerjaan</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->jenis_pekerjaan_pasangan?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Jenis Pekerjaan Lainnya </td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->jenis_pekerjaan_pasangan_lain?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Bidang Usaha</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->bidang_usaha_pasangan?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Jabatan</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->jabatan_pasangan?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Lama Menjabat</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->lama_menjabat_pasangan?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Masa Kerja Total</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->total_masa_kerja_pasangan?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >NIP/NRP</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->nip_pasangan?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Nama Atasan</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->nama_atasan_pasangan?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >No Telepon Atasan</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->no_tlp_atasan_pasangan?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Nama Handphone Atasan</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->no_hp_pasangan?></td>
							</tr>
							<?php } ?>

							<!-- Data Penghasilan dan pengeluaran -->
							<tr><td colspan="4" style="width:30%;font-weight:bold"><h3 style="margin:0;padding:0;line-height:20px;text-transform:uppercase">DATA PENGHASILAN DAN PENGELUARAN PER BULAN</h3></td></tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Penghasilan Utama Pemohon</td>
								<td style="" colspan="3">Rp.<?php echo @$data_pinjaman->penghasilan_pemohon?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Penghasilan Tambahan Pemohon</td>
								<td style="" colspan="3">Rp.<?php echo @$data_pinjaman->penghasilan_tambahan_pemohon?></td>
							</tr>
							<?php if (@$data_pinjaman->status_nikah == 'Menikah') {?>
							<tr>
								<td style="width:30%;font-weight:bold" >Penghasilan Utama Pasangan</td>
								<td style="" colspan="3">Rp.<?php echo @$data_pinjaman->penghasilan_utama_pasangan?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Penghasilan Tambahan Pasangan</td>
								<td style="" colspan="3">Rp.<?php echo @$data_pinjaman->penghasilan_tambahan_pasangan?></td>
							</tr>
							<?php }?>
							<tr>
								<td style="width:30%;font-weight:bold" >Total Penghasilan</td>
								<td style="" colspan="3">Rp.<?php echo @$data_pinjaman->total_penghasilan?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Biaya Rumah Tangga</td>
								<td style="" colspan="3">Rp.<?php echo @$data_pinjaman->biaya_rumah_tangga?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Angsuran Lainnya</td>
								<td style="" colspan="3">Rp.<?php echo @$data_pinjaman->angsuran_lainnya?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Sisa Penghasilan</td>
								<td style="" colspan="3">Rp.<?php echo @$data_pinjaman->sisa_penghasilan?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Kemampuan Mengangsur</td>
								<td style="" colspan="3">Rp.<?php echo @$data_pinjaman->kemampuan_angsuran?></td>
							</tr>

							<!-- Data Kredit/Pembiayaan yang di mohon -->
							<tr><td colspan="4" style="width:30%;font-weight:bold"><h3 style="margin:0;padding:0;line-height:20px;text-transform:uppercase">DATA KREDIT/PEMBIAYAAN YANG DIMOHON</h3></td></tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Tipe Produk</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->tipe_produk?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Tipe Produk Lainnya</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->tipe_produk_lainnya?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Harga Jual/Nilai Taksasi/RAB Rumah</td>
								<td style="" colspan="3">Rp. <?php echo @$data_pinjaman->harga_jual?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Uang Muka/Dana Sendiri</td>
								<td style="" colspan="">Rp. <?php echo @$data_pinjaman->uang_muka?></td>
								<td style="width:30%;font-weight:bold" >Atau dalam prosentasi</td>
								<td style="" colspan=""><?php echo @$data_pinjaman->uang_muka_persentasi?> %</td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Nilai Kredit/Pembiayaan Yang Diajukan</td>
								<td style="" colspan="3">Rp. <?php echo @$data_pinjaman->nilai_kredit_yang_diajukan?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Sistem Pembayaran</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->sistem_pembayaran?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Jangka Waktu Pengajuan Kredit</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->jangka_waktu_kredit?> Bulan</td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Penggunaan</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->penggunaan?> Bulan</td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Pengunaan Lainnya</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->penggunaan_lainnya?> Bulan</td>
							</tr>

							<!-- Data Angunan -->
							<tr><td colspan="4" style="width:30%;font-weight:bold"><h3 style="margin:0;padding:0;line-height:20px;text-transform:uppercase">DATA ANGUNAN</h3></td></tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Alamat Perusahaan/Instansi</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->alamat_perusahaan_angunan?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" ></td>
								<td style="width:30%;font-weight:bold" >Blok</td>
								<td style="" colspan="2" ><?php echo @$data_pinjaman->blok_perusahaan_angunan?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" ></td>
								<td style="width:30%;font-weight:bold" >No</td>
								<td style="" colspan="2" ><?php echo @$data_pinjaman->no_perusahaan_angunan?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" ></td>
								<td style="width:30%;font-weight:bold" >RT</td>
								<td style="" colspan="2" ><?php echo @$data_pinjaman->rt_perusahaan_angunan?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" ></td>
								<td style="width:30%;font-weight:bold" >RW</td>
								<td style="" colspan="2" ><?php echo @$data_pinjaman->rw_perusahaan_angunan?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" ></td>
								<td style="width:30%;font-weight:bold" >Kelurahan</td>
								<td style="" colspan="2" ><?php echo @$data_pinjaman->kelurahan_perusahaan_angunan?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" ></td>
								<td style="width:30%;font-weight:bold" >Kecamatan</td>
								<td style="" colspan="2" ><?php echo @$data_pinjaman->kecamatan_perusahaan_angunan?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" ></td>
								<td style="width:30%;font-weight:bold" >Dati II</td>
								<td style="" colspan="2" ><?php echo @$data_pinjaman->dati_perusahaan_angunan?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" ></td>
								<td style="width:30%;font-weight:bold" >Provinsi</td>
								<td style="" colspan="2" ><?php echo @$data_pinjaman->propinsi_perusahaan_angunan?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" ></td>
								<td style="width:30%;font-weight:bold" >Kode Pos</td>
								<td style="" colspan="2" ><?php echo @$data_pinjaman->kode_pos_perusahaan_angunan?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Status Kepemilikan</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->status_kepemilikan_angunan?></td>
							</tr>

							<!-- Data Angunan Berupa bangunan tanah -->
							<tr><td colspan="4" style="width:30%;font-weight:bold"><h3 style="margin:0;padding:0;line-height:20px;text-transform:uppercase">ANGUNAN-JAMINAN BERUPA BANGUNAN/TANAH</h3></td></tr>
							<tr>
								<td style="width:30%;font-weight:bold" >No Sertifikat</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->no_sertifikat_bangunan_tanah?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Tanggal Terbit</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->tanggal_terbit_sertifikat?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Luas Tanah</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->luas_tanah?> M<sup>2</sup></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Luas Bangunan</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->luas_bangunan?> M<sup>2</sup></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Atas Nama</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->bangunan_atas_nama?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >No IMB</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->no_imb?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Tanggal Terbit</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->tanggal_terbit_imb?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Nama Pengembang</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->nama_pengembang?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Nama Proyek Perumahan</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->nama_proyek_perumahan?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Nama Penjual</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->nama_penjual?></td>
							</tr>

							<!-- Data Angunan berupa kendaraan -->
							<tr><td colspan="4" style="width:30%;font-weight:bold"><h3 style="margin:0;padding:0;line-height:20px;text-transform:uppercase">ANGUNAN-JAMINAN BERUPA KENDARAAN</h3></td></tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Jenis Kendaraan</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->jenis_kendaraan?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Merk Kendaraan</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->merk_kendaraan?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Model</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->model_kendaraan?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Tipe</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->type_kendaraan?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >No Mesin</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->no_mesin?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >No Rangka</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->no_rangka?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >No BPKB</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->no_bpkb?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Tanggal Terbit</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->tanggal_terbit_kendaraan?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >No Polisi</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->no_polisi?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Dealer</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->dealer?></td>
							</tr>

							<!-- Data Angunan berupa Deposito -->
							<tr><td colspan="4" style="width:30%;font-weight:bold"><h3 style="margin:0;padding:0;line-height:20px;text-transform:uppercase">ANGUNAN-JAMINAN BERUPA DEPOSITO</h3></td></tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Pemilik Angunan</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->pemilik_angunan_deposito?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Nama Bank/Other Deposit</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->nama_bank_deposito?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Nomor Simpanan</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->no_simpanan_deposito?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Nilai</td>
								<td style="" colspan="3">Rp. <?php echo @$data_pinjaman->nilai_deposito?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Bunga Simpanan</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->bunga_simpanan_deposito?> %</td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Tanggal Terbit</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->tanggal_terbit_deposito?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Jatuh Tempo Kredit</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->jatuh_tempo_kredit_deposito?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Jangka Waktu Kredit</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->jangka_waktu_kredit_deposito?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Model</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->model_deposito?></td>
							</tr>

							<!-- Data Angunan berupa No SK -->
							<tr><td colspan="4" style="width:30%;font-weight:bold"><h3 style="margin:0;padding:0;line-height:20px;text-transform:uppercase">ANGUNAN-JAMINAN BERUPA NO SK</h3></td></tr>
							<tr>
								<td style="width:30%;font-weight:bold" >No SK</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->no_sk?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Tanggal Terbit</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->tanggal_terbit_sk?></td>
							</tr>

							<!-- Data Pinjaman Lain -->
							<tr><td colspan="4" style="width:30%;font-weight:bold"><h3 style="margin:0;padding:0;line-height:20px;text-transform:uppercase">DATA PINJAMAN LAIN</h3></td></tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Nama Bank</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->nama_bank_pinjaman_lain?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Jenis Produk</td>
								<td style="" colspan="3"><?php echo @$data_pinjaman->jenis_produk_pinjaman_lain?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Plafond</td>
								<td style="" colspan="3">Rp. <?php echo @$data_pinjaman->plafond?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Tunggakan</td>
								<td style="" colspan="3">Rp. <?php echo @$data_pinjaman->tunggakan?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Outstanding</td>
								<td style="" colspan="3">Rp. <?php echo @$data_pinjaman->outstanding?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" >Angsuran</td>
								<td style="" colspan="3">Rp. <?php echo @$data_pinjaman->angsuran_pinjaman_lain?></td>
							</tr>

							<!-- Data Kekayaan pemohon dan pasangan -->
							<tr><td colspan="4" style="width:30%;font-weight:bold"><h3 style="margin:0;padding:0;line-height:20px;text-transform:uppercase">DATA KEKAYAAN PEMOHON DAN PASANGAN</h3></td></tr>
							<tr>

								<td style="" colspan="2" align="right">BANK</td>
								<td style="" colspan="">RATA-RATA SALDO</td>
								<td style="" >Atas Nama</td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" colspan="">Tabungan</td>
								<td style="" colspan=""><?php echo @$data_pinjaman->tabungan_kekayaan?></td>
								<td style="" colspan=""><?php echo @$data_pinjaman->rata_rata_saldo_tabungan?></td>
								<td style="" colspan=""><?php echo @$data_pinjaman->atas_nama_tabungan?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" colspan="">Giro</td>
								<td style="" colspan=""><?php echo @$data_pinjaman->giro_kekayaan?></td>
								<td style="" colspan=""><?php echo @$data_pinjaman->rata_rata_saldo_giro?></td>
								<td style="" colspan=""><?php echo @$data_pinjaman->atas_nama_giro?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" colspan="">Deposito</td>
								<td style="" colspan=""><?php echo @$data_pinjaman->deposito_kekayaan?></td>
								<td style="" colspan=""><?php echo @$data_pinjaman->rata_rata_saldo_deposito?></td>
								<td style="" colspan=""><?php echo @$data_pinjaman->atas_nama_deposito?></td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" colspan="">Rumah</td>
								<td style="" colspan="">
									Atas Nama :
									<p><?php echo @$data_pinjaman->atas_nama_rumah?></p>
								</td>
								<td style="" colspan="2">
									Nilai Rumah :
									<p>Rp. <?php echo @$data_pinjaman->nilai_rumah?></p>
								</td>
							</tr>
							<tr>
								<td style="width:30%;font-weight:bold" colspan="">Kendaraan</td>
								<td style="" colspan="">
									Atas Nama :
									<p><?php echo @$data_pinjaman->atas_nama_kendaraan?></p>
								</td>
								<td style="" colspan="2">
									Nilai Kendaraan :
									<p>Rp. <?php echo @$data_pinjaman->nilai_kendaraan?></p>
								</td>
							</tr>

			</table>
			
			<?php
			

		echo '<div style="page-break-before: always;"></div>';		
		
