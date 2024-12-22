<?php
define( 'WP_ENV', 'production' );
include_once dirname(__FILE__) . "/../../../../wp-load.php";
global $wpdb;
require(get_template_directory()."/plugins/html2pdf/html2pdf.class.php");
require(get_template_directory()."/plugins/phpmailer/class.phpmailer.php");
require(get_template_directory()."/plugins/phpmailer/class.smtp.php");
require(get_template_directory()."/inc/defined.php");

$reg_sql = "SELECT * FROM btn_cif_relation where status = 0";
$items = $wpdb->get_results( $reg_sql, ARRAY_A );

if ( !empty( $items ) ) {
	foreach ( $items as $item ) {
		ob_start(); ?>
		<style type="text/css">
			* {
				font-family: arial;
				font-size: 12px;
			}
			table {width: 100%;}
			table,
			table tr td,
			table tr th {
				border: 1px solid #000 !important;
			}
			table tr td {padding: 5px}
			h2 {font-size: 18px}
			h3 {
				font-size: 14px;
				background: none !important;
			}
		</style>		
		<?php
			if(!empty($item['id_data_pribadi'])){
				$data_pribadi_sql = "SELECT * FROM btn_data_pribadi where id = ".$item['id_data_pribadi'];
				$data_pribadi = $wpdb->get_row($data_pribadi_sql); ?>			
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
									<td style="" colspan="2"><?php echo alias($data_pribadi->$pribadi_k2) ?></td>
								</tr>			
								<?php
							}
						}
					}
				}				
				?>
				</table>
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
								foreach($lembaga_v2 as $lembaga_k3 => $lembaga_v2): ?>
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
									$data_lembaga_relation = $wpdb->get_results($data_lembaga_relation_sql); ?>
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
					}else{ ?>
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
				$data_form_simpanan = $wpdb->get_row($data_form_simpanan_sql); ?>		
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
									<td style="font-weight:bold;width:30%;" ><?php echo ucwords(str_replace('_', ' ', alias($buka_rekening_k3))) ?></td>
									<td style="" ><?php echo alias($data_form_simpanan->$buka_rekening_k3) ?></td>
								</tr>			
								<?php
								endforeach;
							}else{ ?>
								<tr>
									<td style="width:30%;font-weight:bold" ><?php echo ucwords(str_replace('_', ' ', alias($buka_rekening_k2))) ?></td>
									<td style="" ><?php echo alias($data_form_simpanan->$buka_rekening_k2) ?></td>
								</tr>			
								<?php
							}
						}
					}else{ ?>
						<tr>
							<td style="width:30%;font-weight:bold" ><?php echo ucwords(str_replace('_', ' ', alias($buka_rekening_k))) ?></td>
							<td style="" ><?php echo alias($data_form_simpanan->$buka_rekening_k) ?></td>
						</tr>			
						<?php
					}
				}				
				?>
				</table>
				</page>
				<?php 
			}
			if(!empty($item['id_form_atm_sms'])){
				$data_form_atm_sms_sql = "SELECT * FROM btn_form_atm_sms where id = ".$item['id_form_atm_sms'];
				$data_form_atm_sms = $wpdb->get_row($data_form_atm_sms_sql);		
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
								foreach($buka_atm_v2 as $buka_atm_k3 => $buka_atm_v2): ?>
								<tr>
									<td style="width:30%;font-weight:bold" ></td>
									<td style="font-weight:bold;width:30%;" ><?php echo ucwords(str_replace('_', ' ', alias($buka_atm_k3))) ?></td>
									<td style=""><?php echo alias($data_form_atm_sms->$buka_atm_k3) ?></td>
								</tr>			
								<?php
								endforeach;
							}else{ ?>
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
				</table>
				</page>
				<?php 
			}		
		?>
		<?php
	$content = ob_get_clean();
	$html2pdf = new HTML2PDF('P','A4','en');
	$html2pdf->pdf->SetDisplayMode('fullpage');
	$html2pdf->WriteHTML( $content );

     // $html2pdf->Output();die();
    add_filter( 'wp_mail_content_type', create_function( '', 'return "text/html";') );

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
      $mail->From       = 'noreply@btn.co.id';
      $mail->FromName   = 'BTN Virtual Branch';
      // $mail->addCC('hariani.sinulingga@indonesiancloud.com');
      // $mail->addCC('yanti.kesumawaty@indonesiancloud.com');
      $mail->AddCC('yusuf.h@smooets.com');
      $mail->AddCC('teguh.raharjo@wgs.co.id');
      $mail->Subject    = "[BTN Registration] Verification Email";
      $mail->Body       = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
                                              
                                              if ( !empty( $item['id_data_pribadi'] ) ):
                                              	$mail->addAddress( $data_pribadi->email );                                              	
                                              	$mail->Body .= 'Proses pembukaan tabungan atas nama '.$data_pribadi->nama_sesuai_identitas.' hampir selesai!';
                                          	  endif;
                                          	  if( !empty( $item['id_data_lembaga'] ) ):
                                          	  	$mail->addAddress( $data_lembaga->email );                                          	  	
                                              	$mail->Body .= 'Proses pembukaan tabungan atas nama lembaga '.$data_lembaga->nama_lembaga.' hampir selesai!';
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
      $mail->AddStringAttachment( $doc, str_replace( '-', '_', $item['reg_id'] ) . '.pdf', 'base64', 'application/pdf' );
      $envio = $mail->send(); //kirim email
      if ( $envio ) {
        //Register update status
        $table_name = 'btn_cif_relation';
        $status = $wpdb->update(
            $table_name,
                array(
                  'status' => 1
                ),
                array( 'id' => $item['id'] )
            );
      } else {
        echo 'email not sent';
      }
    }
}