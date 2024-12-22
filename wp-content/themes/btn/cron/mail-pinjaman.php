<?php
define( 'WP_ENV', 'production' );
include_once dirname(__FILE__) . "/../../../../wp-load.php";
global $wpdb;
require(get_template_directory()."/plugins/html2pdf/html2pdf.class.php");
require(get_template_directory()."/plugins/phpmailer/class.phpmailer.php");
require(get_template_directory()."/plugins/phpmailer/class.smtp.php");
require(get_template_directory()."/inc/defined.php");

ob_start();
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

		$data_pijaman_sql = "SELECT * FROM btn_pinjaman where status=0 limit 1";
		$data_pinjaman1 = $wpdb->get_results( $data_pijaman_sql );
		// print_r($data_pinjaman);
		// die();
		if ( !empty( $data_pinjaman1 ) ) {
			$count_data_pinjaman = count( $data_pinjaman1 );
			
			if ( $count_data_pinjaman > 0 ) {
				foreach ( $data_pinjaman1 as $data_pinjaman ) {
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

							<?php if (@$data_pinjaman->status_nikah == 'Menikah') {?>
							<!-- Data Pasangan -->
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

							<?php if (@$data_pinjaman->status_nikah == 'Menikah') {?>
							<!-- Data Pekerjaan Pasangan -->
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
							<?php } ?>
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
				}
			}

		echo '<div style="page-break-before: always;"></div>';
		// ob_end_clean();
		// echo $pdf->Output('SE-'.'test.pdf','D');
		$content = ob_get_clean();
		$html2pdf = new HTML2PDF('P','A4','en');
		$html2pdf->pdf->SetDisplayMode('fullpage');
		$html2pdf->WriteHTML($content);
		// $html2pdf->Output() ;
		// die();
		add_filter('wp_mail_content_type',create_function('', 'return "text/html"; '));

	      $mail = new PHPMailer();
	      $mail->IsHTML(true);
	      $mail->isSendmail();
	      // $mail->Host       = "pro.turbo-smtp.com"; // SMTP server

	      // $mail->IsSMTP(); // telling the class to use SMTP
	      // $mail->SMTPAuth   = true;                  // enable SMTP authentication
	      // $mail->Host       = "pro.turbo-smtp.com"; // SMTP server
	      // $mail->Port       = 587;                    // set the SMTP port for the GMAIL server
	      // $mail->Username   = "yusup.handian@kiranatama.com"; // SMTP account username18.
	      // $mail->Password   = "olsVswL2";        // SMTP account password

	      $mail->From       = "noreply@btn.co.id";
	      $mail->FromName   = 'BTN Virtual Branch';
	      // $mail->addCC('hariani.sinulingga@indonesiancloud.com');
	      // $mail->addCC('yanti.kesumawaty@indonesiancloud.com');
	      $mail->addCC('yusuf.h@smooets.com');
	      $mail->addCC('teguh.raharjo@wgs.co.id');
	      
	      $mail->Subject    = "[BTN Registration] Verification Email";
	      $mail->Body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	                <html xmlns="http://www.w3.org/1999/xhtml">
	                  <head>
	                      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	                      <title>Notification email template</title>
	                  </head>
	                  <body bgcolor="#d2d2d2">
	                      <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#d2d2d2" style="font-family:Arial,sans-serif;font-size:12px;color:#333">
	                        <tbody>
	                            <tr>
	                              <td>
	                                  <table width="600" style="border-top: 5px solid #1f417d" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" align="center">
	                                    <tbody>
	                                        <tr>
	                                          <td colspan="2" align="center" style="padding:20px"><a href=""><img src="'.WP_FULL_URL.get_template_directory_uri().'/images/logo-btn-baru.png" width="" height="" style="display:block" border="0" alt=""/></a></td>
	                                        </tr>
	                                        <tr>
	                                          <td colspan="2" width="100%" align="left" valign="top" style="background:#ffd42a">
	                                              <div style="font-family: Arial; color:#333; font-size:14px; line-height:26px;text-align:center;padding:20px;">';
	                                              

	                                              if($count_data_pinjaman>0):
	                                              	$mail->AddAddress( $data_pinjaman->email );                                              	
	                                              	$mail->Body .= 'Proses pembukaan tabungan atas nama '.$data_pinjaman->nama_lengkap.' hampir selesai!';
	                                          	  endif;

	                                              $mail->Body .= '</div>
	                                          </td>
	                                        </tr>
	                                        
	                                        <tr style="background:#e6e9ed">
	                                          <td width="50%" align="left" valign="top" style="font-size:11px;padding:20px;">
	                                              <h3 style="font-size:11px;">
	                                                BTN Virtual Branch
	                                              </h3>
	                                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
	                                          </td>
	                                          <td width="50%" align="left" valign="top" style="font-size:11px;padding:20px;">
	                                              <h3 style="font-size:11px;">BTN CARE
	                                              </h3>
	                                              <p>For more information please visit BTN Virtual Branch site</p>
	                                              <p><a href="" style="color:#003380;font-style:italic">www.btnvirtualbranch.com</a>
	                                              </p>
	                                          </td>
	                                        </tr>
	                                    </tbody>
	                                  </table>
	                              </td>
	                            </tr>
	                        </tbody>
	                      </table>
	                  </body>
	                </html>';
	      
	      $doc = $html2pdf->Output( '', true );	
	      //$doc1=$html2pdf->Output('form1-2-untuk-yang-menikah.html',true);
	      $mail->AddStringAttachment( $doc, str_replace( '-', '_', $data_pinjaman->id_reg ) . '.pdf', 'base64', 'application/pdf' );
	      //$mail->AddStringAttachment($doc1, str_replace('/','_','test.pdf', 'base64', 'application/pdf');
	      ob_end_clean();
	      
	      if ( $data_pinjaman->status_nikah == 'Menikah' ) {
					//attach file 1
					ob_start();
					include_once(get_template_directory(). '/pdf/form1-6-untuk-yang-menikah.html');
					$content_menikah1 = ob_get_clean();
					$html2pdf = new HTML2PDF('P','A4','en');
					$html2pdf->pdf->SetDisplayMode('fullpage');
					$html2pdf->WriteHTML($content_menikah1);
					$doc_menikah_1_6=$html2pdf->Output('',true);
					$mail->AddStringAttachment($doc_menikah_1_6,str_replace('/','_','form 1-6').'.pdf','base64','application/pdf');
					ob_end_clean();

					//attach file 2
					ob_start();
					include_once(get_template_directory(). '/pdf/form1-5-untuk-yang-menikah.html');
					$content_menikah2 = ob_get_clean();
					$html2pdf = new HTML2PDF('P','A4','en');
					$html2pdf->pdf->SetDisplayMode('fullpage');
					$html2pdf->WriteHTML($content_menikah2);
					$doc_menikah_1_5=$html2pdf->Output('',true);
					$mail->AddStringAttachment($doc_menikah_1_5,str_replace('/','_','form 1-5').'.pdf','base64','application/pdf');
					ob_end_clean();

					//attach file 3
					ob_start();
					include_once(get_template_directory(). '/pdf/form1-2-untuk-yang-menikah.html');
					$content_menikah3 = ob_get_clean();
					$html2pdf = new HTML2PDF('P','A4','en');
					$html2pdf->pdf->SetDisplayMode('fullpage');
					$html2pdf->WriteHTML($content_menikah3);
					$doc_menikah_1_2=$html2pdf->Output('',true);
					$mail->AddStringAttachment($doc_menikah_1_2,str_replace('/','_','form 1-2').'.pdf','base64','application/pdf');
					ob_end_clean();
				} else {

					//attach file 1
					ob_start();
					include_once(get_template_directory(). '/pdf/form1-4-yang-belum-menikah.html');
					$content_blm_menikah1 = ob_get_clean();
					$html2pdf = new HTML2PDF('P','A4','en');
					$html2pdf->pdf->SetDisplayMode('fullpage');
					$html2pdf->WriteHTML($content_blm_menikah1);
					$doc_blm_menikah_1_4=$html2pdf->Output('',true);
					$mail->AddStringAttachment($doc_blm_menikah_1_4,str_replace('/','_','form 1-4').'.pdf','base64','application/pdf');
					ob_end_clean();

					//attach file 2
					ob_start();
					include_once(get_template_directory(). '/pdf/form1-3-untuk-yang-belum-menikah.html');
					$content_blm_menikah2=ob_get_clean();
					$html2pdf=new HTML2PDF('P','A4','en');
					$html2pdf->pdf->SetDisplayMode('fullpage');
					$html2pdf->WriteHTML($content_blm_menikah2);
					$doc_blm_menikah_1_3=$html2pdf->Output('',true);
					$mail->AddStringAttachment($doc_blm_menikah_1_3,str_replace('/','_','form 1-3').'.pdf','base64','application/pdf');
					ob_end_clean();
				}
		  
	      $envio = $mail->Send(); //kirim email
	      if ( $envio ) {
	        //Register update status
	        $table_name = 'btn_pinjaman';
	        $status = $wpdb->update(
	            $table_name,
	                array(
	                  'status' => 1
	                ),
	                array( 'id' => $data_pinjaman->id )
	            );
	      } else {
	        echo 'email not sent';
	      }
		}
?>
