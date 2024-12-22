<?php
define('WP_ENV','staging');
include_once dirname(__FILE__) . "/../../../../../wp-load.php";

// global $wpdb;
require_once(get_template_directory()."/plugins/html2pdf/html2pdf.class.php");
require(get_template_directory()."/inc/defined.php");
$token1 = $_GET['token'];
$token2 = md5(date("d-m-Y").$_GET['print_id']);
// echo $secure;
if ($token1 == $token2) {
	$reg_sql = "SELECT * FROM btn_cif_relation where id = ".$_GET['print_id'];
	$items = $wpdb->get_results($reg_sql,ARRAY_A);

	foreach($items as $item){
			ob_start();
			
			?>
			<style type="text/css">
			*{font-family:arial;font-size:12px}
			table{
				width:100%;
			}
			table,
			table tr td,
			table tr th {
				border:1px solid #000 !important;
			}
			table tr td{padding:5px}
			h2{font-size:18px}
			h3{font-size:14px;background:none!important;}
			</style>		
			<?php
			
			if(!empty($item['id_data_pribadi'])){
				$data_pribadi_sql = "SELECT * FROM btn_data_pribadi where id = ".$item['id_data_pribadi'];
				$data_pribadi = $wpdb->get_row($data_pribadi_sql);
				$nama = $data_pribadi->nama_sesuai_identitas
				// print_r($data_pribadi);die();
				?>			
				<page backtop="1mm" backbottom="1mm" backleft="1mm" backright="1mm">
				<h2 style="text-align:center">FORMULIR DATA NASABAH PERORANGAN</h2>
				<div class="reg_id">Reg_id : <?php echo $item['reg_id']; ?></div>
				<table style="width:100%;" cellpadding="0" cellspacing="0">			
					<col style="width: 30%">
		    		<col style="width: 20%">
		    		<col style="width: 30%">
		    		<col style="width: 20%">
					<?php
					$pribadi_clone = $pribadi;
					foreach($pribadi_clone as $pribadi_k => $pribadi_v){
						if(is_array($pribadi_v)){
							?>
							<tr><td colspan="4" style="font-weight:bold"><h3 style="margin:0;padding:0;line-height:20px;text-transform:uppercase"><?php echo alias($pribadi_k) ?></h3></td></tr>					
							<?php					
							foreach($pribadi_v as $pribadi_k2 => $pribadi_v2){
								
								if(is_array($pribadi_v2)){							
									foreach($pribadi_v2 as $pribadi_k3 => $pribadi_v2):
									?>
									<tr>
										<td style="font-weight:bold" ></td>
										<td style="font-weight:bold;" ><?php echo ucwords(str_replace('_', ' ', alias($pribadi_k3))) ?></td>
										<td style=""><?php echo alias($data_pribadi->$pribadi_k3) ?></td>
									</tr>			
									<?php
									endforeach;
								}else{
									?>
									<tr>
										<td style="font-weight:bold" ><?php echo ucwords(str_replace('_', ' ', alias($pribadi_k2))) ?></td>
									<?php if (ucwords(str_replace('_', ' ', alias($pribadi_k2))) == "Photo"){?>
										<td style="" colspan="2">
										<?php if(alias($data_pribadi->$pribadi_k2) != "") { ?>
											<img src="<?php echo 'http://'.$_SERVER['SERVER_NAME'] . alias($data_pribadi->$pribadi_k2)?>" style="width:100px;height:100px;">
										<?php } else { ?>
											photo
										<?php } ?>
										</td>
									<?php }else if (ucwords(str_replace('_', ' ', alias($pribadi_k2))) == "Tanda Tangan"){ ?>
										<td style="" colspan="2">
										<?php if(alias($data_pribadi->$pribadi_k2) != "") { ?>
											<img src="<?php echo 'http://'.$_SERVER['SERVER_NAME'] . alias($data_pribadi->$pribadi_k2)?>" style="width:100px;height:100px;">
										<?php } else { ?>
											tanda tangan
										<?php } ?>
										</td>
									<?php }else{?>
										<td style="" colspan="2"><?php echo alias($data_pribadi->$pribadi_k2) ?></td>
									<?php }?>
									</tr>			
									<?php
								}
							}
						}
					}				
					?>
					<tr><td colspan="4" style="width:30%;font-weight:bold"><h3 style="margin:0;padding:0;line-height:20px;text-transform:uppercase">LEMBAR TANDA TANGAN</h3></td></tr>					
							<tr>
								<td colspan="4"><span style="margin-left:480px">TANGGAL : <?php echo Date("d/m/Y"); ?></span><br><span style="margin-left:480px">TANDA TANGAN NASABAH</span><br><br><br><br><br><br><span style="margin-left:480px"><?php echo $nama; ?></span></td>
							</tr>
				</table>
				<!-- <table style="width:100%;" cellpadding="0" cellspacing="0">			
				<tr>
					<th>Photo</th>
					<th>Tanda Tangan</th>
				</tr>
				<tr>
					<td>
						<img src="<?php //echo  $data_pribadi->photo;?>" style="width:100px;height:100px;">
					</td>
					<td>
						<img src="<?php //echo  $data_pribadi->tanda_tangan;?>" style="width:100px;height:100px;">
					</td>
				</tr>
				</table> -->
				</page>
				<?php 
			}
			
			if(!empty($item['id_data_lembaga'])){
				$data_lembaga_sql = "SELECT * FROM btn_data_lembaga where id = ".$item['id_data_lembaga'];
				$data_lembaga = $wpdb->get_row($data_lembaga_sql);
				?>
				<page backtop="1mm" backbottom="1mm" backleft="1mm" backright="1mm">
				<h2 style="text-align:center">FORMULIR DATA NASABAH LEMBAGA</h2>
				<div class="reg_id">Reg_id : <?php echo $item['reg_id']; ?></div>
				<table style="width:100%;" cellpadding="0" cellspacing="0">			
				<col style="width: 30%">
	    		<col style="width: 20%">
	    		<col style="width: 30%">
	    		<col style="width: 20%">			
				<?php
				$lembaga_clone = $lembaga;
				foreach($lembaga_clone as $lembaga_k => $lembaga_v){
					if(is_array($buka_atm_v)){
						?>
						<tr><td colspan="4" style="width:30%;font-weight:bold"><h3 style="margin:0;padding:0;line-height:20px;text-transform:uppercase"><?php echo alias($lembaga_k) ?></h3></td></tr>					
						<?php

						foreach($lembaga_v as $lembaga_k2 => $lembaga_v2){
							
							if(is_array($lembaga_v2)){		

								foreach($lembaga_v2 as $lembaga_k3 => $lembaga_v2):
								?>
								<tr>
									<td style="width:30%;font-weight:bold" ></td>
									<td style="font-weight:bold;width:30%;" ><?php echo ucwords(str_replace('_', ' ', alias($lembaga_k3))) ?></td>
									<td style=""><?php echo alias($data_lembaga->$lembaga_k3) ?></td>
								</tr>			
								<?php
								endforeach;
							}else{
								if($lembaga_k2 == 'relation'){
									$data_lembaga_relation_sql = "SELECT * FROM ".$lembaga_v2." where id_data_lembaga = ".$data_lembaga->id;
									$data_lembaga_relation = $wpdb->get_results($data_lembaga_relation_sql);

									?>
									<tr>
										<td colspan="4">
											<table width="100%" cellpadding="0" cellspacing="0">
												<tr>
													<th>No</th>
													<?php foreach(array_keys(get_object_vars($data_lembaga_relation[0])) as $dlr_k): ?>

														<?php if(!in_array($dlr_k,$exclude)): ?>
														<th><?php echo ucwords(str_replace('_', ' ',alias($dlr_k))) ?></th>
														<?php endif ?>
													<?php endforeach ?>
												</tr>

												<?php $no_v2 = 1; foreach($data_lembaga_relation as $dlr_k2 => $dlr_v2): ?>
														<tr>													
														<td><?php echo $no_v2; $no_v2++ ?></td>	
														<?php foreach($dlr_v2 as $dlr_k3 =>  $dlr_v3): ?>
														<?php if(!in_array($dlr_k3,$exclude)): ?>													
														<td><?php echo alias($dlr_v3) ?></td>
														<?php endif ?>
														<?php endforeach ?>
														</tr>
												<?php endforeach ?>
											</table>
										</td>									
									</tr>			
									<?php
								}else{
									?>
									<tr>
										<td style="width:30%;font-weight:bold" ><?php echo ucwords(str_replace('_', ' ', alias($lembaga_k2))) ?></td>
										<td style="" colspan="2"><?php echo alias($data_lembaga->$lembaga_k2) ?></td>
									</tr>			
									<?php
								}
							}
						}
					}else{

						?>
						<tr>
							<td style="width:30%;font-weight:bold" ><?php echo ucwords(str_replace('_', ' ', alias($lembaga_k))) ?></td>
							<td style="" colspan="2"><?php echo alias($data_lembaga->$lembaga_k) ?></td>
						</tr>			
						<?php
					}
				}				
				?>
				</table>
				</page>
				<?php 
			}
			if(!empty($item['id_form_simpanan'])){
				$buka_rekening_clone = $buka_rekening;
				$data_form_simpanan_sql = "SELECT * FROM btn_form_simpanan where id = ".$item['id_form_simpanan'];
				$data_form_simpanan = $wpdb->get_row($data_form_simpanan_sql);
				$namaLengkap = $data_form_simpanan->nama_lengkap;
				?>		
				<page backtop="1mm" backbottom="1mm" backleft="1mm" backright="1mm">
				<h2 style="text-align:center">FORMULIR PERMOHONAN PEMBUKAAN REKENING SIMPANAN</h2>
				<div class="reg_id">Reg_id : <?php echo $item['reg_id']; ?></div>
				<table style="width:100%;" cellpadding="0" cellspacing="0">			
				<col style="width: 30%">
	    		<col style="width: 70%">
	    		

				<?php

				if(!empty($data_form_simpanan->id_produk)){
					$data_produk_sql = "SELECT * FROM btn_product where ID_PRODUCT = ".$data_form_simpanan->id_produk;				
					$data_produk = $wpdb->get_row($data_produk_sql);
					?>
					<tr>
						<td style="width:30%;font-weight:bold" >Nama Produk</td>
						<td colspan="2"><?php echo alias($data_produk->NAME) ?></td>
					</tr>							
					<?php
					if($data_produk->SLUG != 'tabungan_haji_nawaitu'){
						unset($buka_rekening_clone['Khusus Pembukaan Rekening Haji Nawaitu']);
					}
					if($data_produk->CATEGORY != 'deposito' &&  $data_produk->CATEGORY != 'sertifikat'){
						unset($buka_rekening_clone['Khusus Deposito']);
					}
					if($data_produk->SLUG != 'penggantian_kartu'){
						unset($buka_rekening_clone['Khusus Penggantian Kartu BTN']);
					}
					if($data_produk->ATM_SMS != '1'){
						unset($buka_rekening_clone['Fitur/Fasilitas Yang Di inginkan']);
					}
					
				}			
				
				foreach($buka_rekening_clone as $buka_rekening_k => $buka_rekening_v){
					if(is_array($buka_rekening_v)){
						?>
						<tr><td colspan="2" style="width:30%;font-weight:bold"><h3 style="margin:0;padding:0;line-height:20px;text-transform:uppercase"><?php echo alias($buka_rekening_k) ?></h3></td></tr>					
						<?php
						foreach($buka_rekening_v as $buka_rekening_k2 => $buka_rekening_v2){
							
							if(is_array($buka_rekening_v2)){							
								foreach($buka_rekening_v2 as $buka_rekening_k3 => $buka_rekening_v2):
								?>
								<tr>
									<td style="width:30%;font-weight:bold" ></td>
									<td style="font-weight:bold;" >
										<?php echo ucwords(str_replace('_', ' ', alias($buka_rekening_k3))) ?>
										<label style="font-weight:normal;margin-left:100px;">: <?php echo alias($data_form_simpanan->$buka_rekening_k3) ?></label>
									</td>
								</tr>			
								<?php
								endforeach;
							}else{
								?>
								<tr>
									<td style="width:30%;font-weight:bold" ><?php echo ucwords(str_replace('_', ' ', alias($buka_rekening_k2))) ?></td>
									<td style="" ><?php echo alias($data_form_simpanan->$buka_rekening_k2) ?></td>
								</tr>			
								<?php
							}
						}
					}else{
						?>
						<tr>
							<td style="width:30%;font-weight:bold" ><?php echo ucwords(str_replace('_', ' ', alias($buka_rekening_k))) ?></td>
							<td style="" ><?php echo alias($data_form_simpanan->$buka_rekening_k) ?></td>
						</tr>			
						<?php
					}
				}				
				?>
						
					<tr><td colspan="4" style="width:30%;font-weight:bold"><h3 style="margin:0;padding:0;line-height:20px;text-transform:uppercase">LEMBAR TANDA TANGAN</h3></td></tr>
						<tr>
								<td colspan="4"><span style="margin-left:480px">TANGGAL : <?php echo Date("d/m/Y"); ?></span><br><span style="margin-left:480px">TANDA TANGAN NASABAH</span><br><br><br><br><br><br><br><span style="margin-left:480px"><?php echo $namaLengkap; ?></span></td>
							</tr>
				</table>
				</page>
				<?php 
			}
			if(!empty($item['id_form_atm_sms'])){
				$data_form_atm_sms_sql = "SELECT * FROM btn_form_atm_sms where id = ".$item['id_form_atm_sms'];
				$data_form_atm_sms = $wpdb->get_row($data_form_atm_sms_sql);	
				$namaAtmSms = $data_form_atm_sms->nama_lengkap;	
				?>
				<page backtop="1mm" backbottom="1mm" backleft="1mm" backright="1mm">
				<h2 style="text-align:center">FORMULIR APLIKASI KARTU BTN DAN SMS BANKING</h2>
				<div class="reg_id">Reg_id : <?php echo $item['reg_id']; ?></div>
				<table style="width:100%;" cellpadding="0" cellspacing="0">			
				<col style="width: 30%">
	    		<col style="width: 70%">
	    		
				<?php
				$buka_atm_clone = $buka_atm;
				foreach($buka_atm_clone as $buka_atm_k => $buka_atm_v){
					if(is_array($buka_atm_v)){
						?>
						<tr><td  colspan="2" style="width:30%;font-weight:bold"><h3 style="margin:0;padding:0;line-height:20px;text-transform:uppercase"><?php echo alias($buka_atm_k) ?></h3></td></tr>					
						<?php
						foreach($buka_atm_v as $buka_atm_k2 => $buka_atm_v2){
							
							if(is_array($buka_atm_v2)){							
								foreach($buka_atm_v2 as $buka_atm_k3 => $buka_atm_v2):
								?>
								<tr>
									<td style="width:30%;font-weight:bold" ></td>
									<td style="font-weight:bold;width:30%;" ><?php echo ucwords(str_replace('_', ' ', alias($buka_atm_k3))) ?></td>
									<td style=""><?php echo alias($data_form_atm_sms->$buka_atm_k3) ?></td>
								</tr>			
								<?php
								endforeach;
							}else{
								?>
								<tr>
									<td style="width:30%;font-weight:bold" ><?php echo ucwords(str_replace('_', ' ', alias($buka_atm_k2))) ?></td>
									<td style="" ><?php echo alias($data_form_atm_sms->$buka_atm_k2) ?></td>
								</tr>			
								<?php
							}
						}
					}else{
						?>
						<tr>
							<td style="width:30%;font-weight:bold" ><?php echo ucwords(str_replace('_', ' ', alias($buka_atm_k))) ?></td>
							<?php 
							if(ucwords(str_replace('_', ' ', alias($buka_atm_k)))=="Kota"){
							 ?>
								<td style="" colspan="2"><?php echo btn_get_city_by_id(alias($data_form_atm_sms->$buka_atm_k)) ?></td>
							<?php 
								}else if(ucwords(str_replace('_', ' ', alias($buka_atm_k)))=="Cabang"){
							?>
								<td style="" colspan="2"><?php echo btn_get_substation_by_id(alias($data_form_atm_sms->$buka_atm_k)) ?></td>
							<?php }else{ ?>
							<td style="" colspan="2"><?php echo alias($data_form_atm_sms->$buka_atm_k) ?></td>
							<?php } ?>
						</tr>			
						<?php
					}
				}				
				?>
					<tr><td colspan="4" style="width:30%;font-weight:bold"><h3 style="margin:0;padding:0;line-height:20px;text-transform:uppercase">LEMBAR TANDA TANGAN</h3></td></tr>					
							<tr>
								<td colspan="4"><span style="margin-left:480px">TANGGAL : <?php echo Date("d/m/Y"); ?></span><br><span style="margin-left:480px">TANDA TANGAN NASABAH</span><br><br><br><br><br><br><span style="margin-left:480px"><?php echo $namaAtmSms; ?></span></td>
							</tr>
				</table>
				</page>
				<?php 
			}		
			
			?>
			
			<?php
		

			$upload_dir = wp_upload_dir(); 
			$path =  $upload_dir['path']; 
			// Create the full path
			$filename = $item['reg_id'];
			$full_path = $path .'/'. $filename;
// ob_clean();
				$content = ob_get_clean();
				$html2pdf = new HTML2PDF('P','A4','en');
				$html2pdf->pdf->SetDisplayMode('fullpage');
				$html2pdf->WriteHTML($content);
				$html2pdf->Output($filename.'.pdf','D');
				die();

	}
}else{
	echo "forbiden";
}