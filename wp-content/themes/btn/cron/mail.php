<?php
define( 'WP_ENV', 'production' );
include_once dirname(__FILE__) . "/../../../../wp-load.php";
global $wpdb;
$reg_sql = "SELECT btn.*, btn_d.*
            FROM btn_registrasirekening as btn
            left JOIN btn_registrasirekening_detail as btn_d
            ON btn.REK_ID = btn_d.REK_ID
            WHERE btn.STATUS=0
            LIMIT 5
            ";
$items = $wpdb->get_results($reg_sql,ARRAY_A);
require(get_template_directory()."/plugins/fpdf/table_btn.php");
require(get_template_directory()."/plugins/phpmailer/class.phpmailer.php");
require(get_template_directory()."/plugins/phpmailer/class.smtp.php");

if ( !empty( $items ) ) {
  foreach ( $items as $value ) {
    cron_action( $value );
  }
}

function cron_action( $data_head ) {
  global $wpdb;

  if ( $data_head['EMAIL'] ) {
      //PDF
      $timestamp= strtotime($data_head['TANGGAL']);
      $tanggal= date("Y-m-d", $timestamp);
      $databasic = array();
      //number
      $no = 1;
      for($no=1;$no<=50;$no++){ $databasic[$no][0] = $no; }

      $databasic[1][1]='JENIS_IDENTITAS';
      $databasic[2][1]='NOMOR_IDENTITAS';
      $databasic[3][1]='GELAR_SEBELUM_NAMA';
      $databasic[4][1]='NAMA_IDENTITAS';
      $databasic[5][1]='NAMA_SINGKATAN_PADA_IDENTITAS';
      $databasic[6][1]='NAMA_TANPA_SINGKATAN';
      $databasic[7][1]='GELAR_SETELAH_NAMA';
      $databasic[8][1]='KOTA_LAHIR';
      $databasic[9][1]='TANGGAL_LAHIR';
      $databasic[10][1]='JENIS_KELAMIN';
      $databasic[11][1]='STATUS_KAWIN';
      $databasic[12][1]='KEWARGANEGARAAN';
      $databasic[13][1]='TANGGAL_BERAKHIR_IDENTITAS';
      $databasic[14][1]='ID_PENDUKUNG';
      $databasic[15][1]='NOMOR_ID_PENDUKUNG';
      $databasic[16][1]='MASA_MULAI_ID_PENDUKUNG';
      $databasic[17][1]='MASA_BERAKHIR_ID_PENDUKUNG';
      $databasic[18][1]='PENDIDIKAN_TERAKHIR';
      $databasic[19][1]='NAMA_GADIS_IBU_KANDUNG';
      $databasic[20][1]='NO_NPWP';
      $databasic[21][1]='NAMA_GEDUNG';
      $databasic[22][1]='NAMA_JALAN';
      $databasic[23][1]='RTRW';
      $databasic[24][1]='KELURAHAN';
      $databasic[25][1]='KECAMATAN';
      $databasic[26][1]='KOTA_KABUPATEN';
      $databasic[27][1]='KODEPOS';
      $databasic[28][1]='NEGARA';
      $databasic[29][1]='ALAMAT_PADA_IDENTITAS';
      $databasic[30][1]='NO_TELP1';
      $databasic[31][1]='NO_TELP2';
      $databasic[32][1]='NO_PONSEL1';
      $databasic[33][1]='NO_PONSEL2';
      $databasic[34][1]='NO_PONSEL_LUAR';
      $databasic[35][1]='EMAIL';
      $databasic[36][1]='JENIS_PEKERJAAN';
      $databasic[37][1]='JABATAN';
      $databasic[38][1]='DEPARTEMEN';
      $databasic[39][1]='BIDANG_USAHA';
      $databasic[40][1]='KANTOR';
      $databasic[41][1]='NAMA_GEDUNG_KANTOR';
      $databasic[42][1]='NAMA_JALAN_KANTOR';
      $databasic[43][1]='KOTA_KABUPATEN_KANTOR';
      $databasic[44][1]='KODEPOS_KANTOR';
      $databasic[45][1]='NEGARA_KANTOR';
      $databasic[46][1]='NO_TLP_KANTOR';
      $databasic[47][1]='NO_EXT';
      $databasic[48][1]='PENDAPATAN_PERBULAN';
      $databasic[49][1]='SUMBER_PENDAPATAN';
      $databasic[50][1]='SUMBER_PENDAPATAN_LAIN';

      $databasic[1][2]=$data_head['JENIS_IDENTITAS'];
      $databasic[2][2]=$data_head['NOMOR_IDENTITAS'];
      $databasic[3][2]=$data_head['GELAR_SEBELUM_NAMA'];
      $databasic[4][2]=$data_head['NAMA_IDENTITAS'];
      $databasic[5][2]=$data_head['NAMA_SINGKATAN_PADA_IDENTITAS'];
      $databasic[6][2]=$data_head['NAMA_TANPA_SINGKATAN'];
      $databasic[7][2]=$data_head['GELAR_SETELAH_NAMA'];
      $databasic[8][2]=$data_head['KOTA_LAHIR'];
      $databasic[9][2]=$data_head['TANGGAL_LAHIR'];
      $databasic[10][2]=$data_head['JENIS_KELAMIN'];
      $databasic[11][2]=$data_head['STATUS_KAWIN'];
      $databasic[12][2]=$data_head['KEWARGANEGARAAN'];
      $databasic[13][2]=$data_head['TANGGAL_BERAKHIR_IDENTITAS'];
      $databasic[14][2]=$data_head['ID_PENDUKUNG'];
      $databasic[15][2]=$data_head['NOMOR_ID_PENDUKUNG'];
      $databasic[16][2]=$data_head['MASA_MULAI_ID_PENDUKUNG'];
      $databasic[17][2]=$data_head['MASA_BERAKHIR_ID_PENDUKUNG'];
      $databasic[18][2]=$data_head['PENDIDIKAN_TERAKHIR'];
      $databasic[19][2]=$data_head['NAMA_GADIS_IBU_KANDUNG'];
      $databasic[20][2]=$data_head['NO_NPWP'];
      $databasic[21][2]=$data_head['NAMA_GEDUNG'];
      $databasic[22][2]=$data_head['NAMA_JALAN'];
      $databasic[23][2]=$data_head['RTRW'];
      $databasic[24][2]=$data_head['KELURAHAN'];
      $databasic[25][2]=$data_head['KECAMATAN'];
      $databasic[26][2]=$data_head['KOTA_KABUPATEN'];
      $databasic[27][2]=$data_head['KODEPOS'];
      $databasic[28][2]=$data_head['NEGARA'];
      $databasic[29][2]=$data_head['ALAMAT_PADA_IDENTITAS'];
      $databasic[30][2]=$data_head['NO_TELP1'];
      $databasic[31][2]=$data_head['NO_TELP2'];
      $databasic[32][2]=$data_head['NO_PONSEL1'];
      $databasic[33][2]=$data_head['NO_PONSEL2'];
      $databasic[34][2]=$data_head['NO_PONSEL_LUAR'];
      $databasic[35][2]=$data_head['EMAIL'];
      $databasic[36][2]=$data_head['JENIS_PEKERJAAN'];
      $databasic[37][2]=$data_head['JABATAN'];
      $databasic[38][2]=$data_head['DEPARTEMEN'];
      $databasic[39][2]=$data_head['BIDANG_USAHA'];
      $databasic[40][2]=$data_head['KANTOR'];
      $databasic[41][2]=$data_head['NAMA_GEDUNG_KANTOR'];
      $databasic[42][2]=$data_head['NAMA_JALAN_KANTOR'];
      $databasic[43][2]=$data_head['KOTA_KABUPATEN_KANTOR'];
      $databasic[44][2]=$data_head['KODEPOS_KANTOR'];
      $databasic[45][2]=$data_head['NEGARA_KANTOR'];
      $databasic[46][2]=$data_head['NO_TLP_KANTOR'];
      $databasic[47][2]=$data_head['NO_EXT'];
      $databasic[48][2]=$data_head['PENDAPATAN_PERBULAN'];
      $databasic[49][2]=$data_head['SUMBER_PENDAPATAN'];
      $databasic[50][2]=$data_head['SUMBER_PENDAPATAN_LAIN'];

      $pdf=new PDF();

      $pdf->Ln();
      $pdf->AddPage('P','Legal');

      $pdf->BasicTable($databasic,'Permohonan Pembukaan Rekening','Berikut Detail Identitas Anda :');

      $pdf->ln(10,0);
      $pdf->SetFont('Arial','B',13);
      $pdf->Cell(0,2,"Verification",0,0,'L');
      $pdf->SetFont('Arial','',9);
      $pdf->ln(10,0);
      $pdf->Cell(0,2,"Kota : ".btn_get_city_by_id($data_head["KOTA_ID"]),0,0,'L');
      $pdf->ln(5,0);
      $pdf->Cell(0,2,"Cabang : ".btn_get_substation_by_id($data_head["CABANG_ID"]) ,0,0,'L');
      $pdf->ln(5,0);
      $pdf->Cell(0,2,"Tanggal : ".$tanggal ,0,0,'L');
      $pdf->ln(5,0);
      $pdf->Cell(0,2,"Waktu : ".$data_head['WAKTU'] ,0,0,'L');
      $pdf->ln(10,0);
      // $pdf->Output(); die();



      add_filter('wp_mail_content_type',create_function('', 'return "text/html"; '));

      $mail = new PHPMailer();
      $mail->IsHTML(true);
      $mail->Host       = "pro.turbo-smtp.com"; // SMTP server
      $mail->IsSMTP(); // telling the class to use SMTP
      $mail->SMTPAuth   = true;                  // enable SMTP authentication
      $mail->Host       = "pro.turbo-smtp.com"; // SMTP server
      $mail->Port       = 25;                    // set the SMTP port for the GMAIL server
      $mail->Username   = "yusup.handian@kiranatama.com"; // SMTP account username18.
      $mail->Password   = "olsVswL2";        // SMTP account password
      $mail->From     = "noreply@btn.co.id";
      $mail->AddAddress("arif.a@smooets.com"); //( $data_head['EMAIL'] );
      $mail->Subject  = "[BTN Registration] Verification Email";
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
                                              <div style="font-family: Arial; color:#333; font-size:14px; line-height:26px;text-align:center;padding:20px;">
                                              Proses pembukaan tabungan atas nama '.$data_head["NAMA_IDENTITAS"].' hampir selesai!
                                              </div>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td colspan="2" width="100%" align="left" valign="top" style="background:#fff;padding:20px 0">
                                              <div style="font-family: Arial; color:#333; font-size:13px; line-height:24px;text-align:center;padding:20px;">
                                                Silakan kunjungi cabang '.btn_get_substation_by_id($data_head["CABANG_ID"]).' Kota '.btn_get_city_by_id($data_head["KOTA_ID"]).' pada tanggal '.$tanggal.'-'.$data_head['WAKTU'].' untuk melakukan verifikasi data. <br/>
                                                Terima kasih
                                                </div>
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
      $doc = $pdf->Output( '', 'S' );
      $mail->AddStringAttachment( $doc, $data_head['NAMA_IDENTITAS'] . '.pdf', 'base64', 'application/pdf' );
      $envio = $mail->Send(); //kirim email
      if ( $envio ) {
        //Register update status
        $table_name = 'btn_registrasirekening';
        $status =   $wpdb->update(
            $table_name,
                array(
                  'STATUS' => 1
                ),
                array( 'REK_ID' => $data_head['REK_ID'] )
            );
      } else {
        echo 'email not sent';
      }
  } //End Mail
}
?>
