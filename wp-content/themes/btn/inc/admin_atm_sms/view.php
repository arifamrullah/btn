<div class="clearfix">
<br /><br />
<?php 
$token = date("d-m-Y").$_GET['edit']; 
?>

<a href="?page=atmSms" class="button">Kembali</a>
<a href="<?php echo get_template_directory_uri() ?>/inc/admin_user/print.php?print_id=<?php echo $_GET['edit'] ?>&token=<?php echo md5($token) ?>" class="button">Print</a>
</div>

<?php
global $wpdb;
$reg_sql = "SELECT * FROM btn_cif_relation where id = ".$_GET['edit'];
$items = $wpdb->get_results($reg_sql,ARRAY_A);


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

foreach($items as $item){
	
		if(!empty($item['id_data_pribadi'])){
			$data_pribadi_sql = "SELECT * FROM btn_data_pribadi where id = ".$item['id_data_pribadi'];
			$data_pribadi = $wpdb->get_row($data_pribadi_sql);
			?>			
			<h2 style="text-align:center">FORMULIR DATA NASABAH PERORANGAN</h2>
			<div class="reg_id">Reg_id : <?php echo $item['reg_id']; ?></div>
			<table style="width:100%;" cellpadding="0" cellspacing="0">			
			<?php
			$pribadi_clone = $pribadi;
			foreach($pribadi_clone as $pribadi_k => $pribadi_v){
				if(is_array($pribadi_v)){
					?>
					<tr><td colspan="4" style="width:30%;font-weight:bold"><h3 style="margin:0;padding:0;line-height:20px;text-transform:uppercase"><?php echo alias($pribadi_k) ?></h3></td></tr>					
					<?php					
					foreach($pribadi_v as $pribadi_k2 => $pribadi_v2){
						
						if(is_array($pribadi_v2)){							
							foreach($pribadi_v2 as $pribadi_k3 => $pribadi_v2):
							?>
							<tr>
								<td style="width:30%;font-weight:bold" ></td>
								<td style="font-weight:bold;width:30%;" ><?php echo ucwords(str_replace('_', ' ', alias($pribadi_k3))) ?></td>
								<td style=""><?php echo alias($data_pribadi->$pribadi_k3) ?></td>
							</tr>			
							<?php
							endforeach;
						}else{
							?>
							<tr>
								<td style="width:30%;font-weight:bold" ><?php echo ucwords(str_replace('_', ' ', alias($pribadi_k2))) ?></td>
								<td style="" colspan="2"><?php echo alias($data_pribadi->$pribadi_k2) ?></td>
							</tr>			
							<?php
						}
					}
				}
			}				
			?>
			</table>
			<?php 
		}
		if(!empty($item['id_data_lembaga'])){
			$data_lembaga_sql = "SELECT * FROM btn_data_lembaga where id = ".$item['id_data_lembaga'];
			$data_lembaga = $wpdb->get_row($data_lembaga_sql);
			?>
			<div style="page-break-before: always;"></div>
			<h2 style="text-align:center">FORMULIR DATA NASABAH LEMBAGA</h2>
			<div class="reg_id">Reg_id : <?php echo $item['reg_id']; ?></div>
			<table style="width:100%;" cellpadding="0" cellspacing="0">			
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
									<td colspan="3">
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
			<?php 
		}
		if(!empty($item['id_form_simpanan'])){
			$buka_rekening_clone = $buka_rekening;
			$data_form_simpanan_sql = "SELECT * FROM btn_form_simpanan where id = ".$item['id_form_simpanan'];
			$data_form_simpanan = $wpdb->get_row($data_form_simpanan_sql);
			?>		
			<div style="page-break-before: always;"></div>	
			<h2 style="text-align:center">FORMULIR PERMOHONAN PEMBUKAAN REKENING SIMPANAN</h2>
			<div class="reg_id">Reg_id : <?php echo $item['reg_id']; ?></div>
			<table style="width:100%;" cellpadding="0" cellspacing="0">			
			<?php

			if(!empty($data_form_simpanan->id_produk)){
				$data_produk_sql = "SELECT * FROM btn_product where ID_PRODUCT = ".$data_form_simpanan->id_produk;				
				$data_produk = $wpdb->get_row($data_produk_sql);
				?>
				<tr>
					<td style="width:30%;font-weight:bold" >Nama Produk</td>
					<td style="" colspan="2"><?php echo alias($data_produk->NAME) ?></td>
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
					<tr><td colspan="4" style="width:30%;font-weight:bold"><h3 style="margin:0;padding:0;line-height:20px;text-transform:uppercase"><?php echo alias($buka_rekening_k) ?></h3></td></tr>					
					<?php
					foreach($buka_rekening_v as $buka_rekening_k2 => $buka_rekening_v2){
						
						if(is_array($buka_rekening_v2)){							
							foreach($buka_rekening_v2 as $buka_rekening_k3 => $buka_rekening_v2):
							?>
							<tr>
								<td style="width:30%;font-weight:bold" ></td>
								<td style="font-weight:bold;width:30%;" ><?php echo ucwords(str_replace('_', ' ', alias($buka_rekening_k3))) ?></td>
								<td style=""><?php echo alias($data_form_simpanan->$buka_rekening_k3) ?></td>
							</tr>			
							<?php
							endforeach;
						}else{
							?>
							<tr>
								<td style="width:30%;font-weight:bold" ><?php echo ucwords(str_replace('_', ' ', alias($buka_rekening_k2))) ?></td>
								<td style="" colspan="2"><?php echo alias($data_form_simpanan->$buka_rekening_k2) ?></td>
							</tr>			
							<?php
						}
					}
				}
			}				
			?>
			</table>
			<?php 
		}
		if(!empty($item['id_form_atm_sms'])){
			$data_form_atm_sms_sql = "SELECT * FROM btn_form_atm_sms where id = ".$item['id_form_atm_sms'];
			$data_form_atm_sms = $wpdb->get_row($data_form_atm_sms_sql);		
			?>
			<div style="page-break-before: always;"></div>
			<h2 style="text-align:center">FORMULIR APLIKASI KARTU BTN DAN SMS BANKING</h2>
			<div class="reg_id">Reg_id : <?php echo $item['reg_id']; ?></div>
			<table style="width:100%;" cellpadding="0" cellspacing="0">			
			<?php
			$buka_atm_clone = $buka_atm;
			foreach($buka_atm_clone as $buka_atm_k => $buka_atm_v){
				if(is_array($buka_atm_v)){
					?>
					<tr><td colspan="4" style="width:30%;font-weight:bold"><h3 style="margin:0;padding:0;line-height:20px;text-transform:uppercase"><?php echo alias($buka_atm_k) ?></h3></td></tr>					
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
								<td style="" colspan="2"><?php echo alias($data_form_atm_sms->$buka_atm_k2) ?></td>
							</tr>			
							<?php
						}
					}
				}else{
					?>
					<tr>
						<td style="width:30%;font-weight:bold" ><?php echo ucwords(str_replace('_', ' ', alias($buka_atm_k))) ?></td>
						<td style="" colspan="2"><?php echo alias($data_form_atm_sms->$buka_atm_k) ?></td>
					</tr>			
					<?php
				}
			}				
			?>
			</table>
			<?php 
		}		
		echo '<div style="page-break-before: always;"></div>';		
		
}