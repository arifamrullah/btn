<?php
define( 'WP_ENV', 'production' );
include_once dirname(__FILE__) . "/../../../../wp-load.php";
global $wpdb;
$reg_sql = "SELECT loan.*, loan_d.*
            FROM btn_loanapplication as loan
            left JOIN btn_loanapplication_detail as loan_d
            ON loan.ID = loan_d.Loan_ID
            WHERE loan.STATUS=0
            LIMIT 5";
$items = $wpdb->get_results($reg_sql,ARRAY_A);
require(get_template_directory()."/plugins/fpdf/table_btn.php");
require(get_template_directory()."/plugins/phpmailer/class.phpmailer.php");
require(get_template_directory()."/plugins/phpmailer/class.smtp.php");

if ( !empty( $items ) ) {
  foreach ( $items as $value ) {
    cron_action( $value );
  }
}

function cron_action( $data ) {
  global $wpdb;

  if ( $data['EMAIL'] ) {
    $timestamp = strtotime( $data['TANGGAL'] );
    $tanggal = date( "Y-m-d", $timestamp );

    $jenis_pinjaman = array('KPR' =>'KPR - Kredit Pemilikan Rumah' ,'KKB'=>'KKB - Kredit Kendaraan Bermotor','KTA'=>'KTA - Kredit Tanpa Agunan' );

    add_filter('wp_mail_content_type',create_function('', 'return "text/html"; '));
    $mail = new PHPMailer();
    $mail->IsHTML(true);
    $mail->isSendmail();
    // $mail->Host       = "pro.turbo-smtp.com"; // SMTP server

    // $mail->IsSMTP(); // telling the class to use SMTP
    // $mail->SMTPAuth   = true;                  // enable SMTP authentication
    // $mail->Host       = "pro.turbo-smtp.com"; // SMTP server
    // $mail->Port       = 25;                    // set the SMTP port for the GMAIL server
    // $mail->Username   = "yusup.handian@kiranatama.com"; // SMTP account username18.
    // $mail->Password   = "olsVswL2";        // SMTP account password

    $mail->From       = "noreply@btn.co.id";
    $mail->FromName   = 'BTN Virtual Branch';
    $mail->AddAddress( $data['EMAIL'] );
    // $mail->addCC('hariani.sinulingga@indonesiancloud.com');
    // $mail->addCC('yanti.kesumawaty@indonesiancloud.com');
    $mail->addCC('yusuf.h@smooets.com');
    $mail->addCC('teguh.raharjo@wgs.co.id');
    $mail->Subject    = "[BTN Loan Application] Verification Email";
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
                                              Proses pengajuan pinjaman atas nama '.$data["NAME"].' hampir selesai! Berikut data diri anda :
                                            </div>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td colspan="2" width="100%" align="left" valign="top" style="background:#fff;padding:20px 0">
                                            <div style="font-family: Arial; color:#333; font-size:13px; line-height:24px;text-align:center;padding:20px;">
                                              <table width="100%">
                                                <tr>
                                                  <td colspan="2" align="left">
                                                  <strong>Data Diri</strong><br/><hr>
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td width="40%" align="left">Nama </td>
                                                  <td width="60%" align="left">'.$data["NAME"].'</td>
                                                </tr>
                                                <tr>
                                                  <td width="40%" align="left">Tanggal lahir </td>
                                                  <td width="60%" align="left">'.$data["KOTA_LAHIR"].'-'.$data["TANGGAL_LAHIR"].'</td>
                                                </tr>
                                                <tr>
                                                  <td width="40%" align="left">Alamat </td>
                                                  <td width="60%" align="left">'.$data["ADDRESS"].'</td>
                                                </tr>
                                                <tr>
                                                  <td width="40%" align="left">Nomor telepon </td>
                                                  <td width="60%" align="left">'.$data["PHONE"].'</td>
                                                </tr>
                                                <tr>
                                                  <td width="40%" align="left">Email </td>
                                                  <td width="60%" align="left">'.$data["EMAIL"].'</td>
                                                </tr>
                                                <tr>
                                                  <td width="40%" align="left">No. KTP </td>
                                                  <td width="60%" align="left">'.$data["KTP_NUMBER"].'</td>
                                                </tr>
                                                <tr>
                                                  <td width="40%" align="left">Status perkawinan </td>
                                                  <td width="60%" align="left">'.($data["STATUS_KAWIN"]=="M"?"Menikah": "Lajang").'</td>
                                                </tr>
                                                <tr>
                                                  <td width="40%" align="left">Jenis kelamin </td>
                                                  <td width="60%" align="left">'.($data["JENIS_KELAMIN"]=="L"?"Laki-laki":"Perempuan").'</td>
                                                </tr>
                                                <tr>
                                                  <td width="40%" align="left">Pendapatan perbulan </td>
                                                  <td width="60%" align="left">'.$data["MONTHLY_INCOME"].'</td>
                                                </tr>
                                                <tr>
                                                  <td width="40%" align="left">Pengeluaran perbulan </td>
                                                  <td width="60%" align="left">'.$data["MONTHLY_FIXED_EXPENSES"].'</td>
                                                </tr>
                                                <tr>
                                                  <td width="40%" align="left">Jenis pinjaman</td>
                                                  <td width="60%" align="left">'.$jenis_pinjaman[$data["LOAN_TYPE"]].'</td>
                                                </tr>
                                                <tr>
                                                  <td width="40%" align="left">Jumlah pinjaman</td>
                                                  <td width="60%" align="left">'.$data["LOAN_AMOUNT"].'</td>
                                                </tr>
                                                <tr>
                                                  <td width="40%" align="left">Uang muka </td>
                                                  <td width="60%" align="left">'.$data["DEPOSIT"].'</td>
                                                </tr>
                                                <tr>
                                                  <td width="40%" align="left">Lama waktu pinjaman </td>
                                                  <td width="60%" align="left">'.$data["LOAN_TENURE"].'</td>
                                                </tr>
                                                <tr>
                                                  <td width="40%" align="left">Bunga pinjaman </td>
                                                  <td width="60%" align="left">'.$data["INTEREST"].'</td>
                                                </tr>
                                                <tr>
                                                  <td width="40%" align="left">Angsuran </td>
                                                  <td width="60%" align="left">'.$data["INSTALLMENT"].'</td>
                                                </tr>
                                                <tr>
                                                  <td colspan="2" align="left">
                                                  <strong>Data Verifikasi</strong><br/><hr>
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td width="40%" align="left">Kota </td>
                                                  <td width="60%" align="left">'.btn_get_city_by_id($data["KOTA_ID"]).'</td>
                                                </tr>
                                                <tr>
                                                  <td width="40%" align="left">Cabang </td>
                                                  <td width="60%" align="left">'.btn_get_substation_by_id($data["CABANG_ID"]).'</td>
                                                </tr>
                                                <tr>
                                                  <td width="40%" align="left">Tanggal </td>
                                                  <td width="60%" align="left">'.$tanggal.'</td>
                                                </tr>
                                                <tr>
                                                  <td width="40%" align="left">Waktu </td>
                                                  <td width="60%" align="left">'.$data['WAKTU'].'</td>
                                                </tr>
                                              </table>
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
      $envio = $mail->Send();
      if ( $envio ) {
        //Register update status
        $table_name = 'btn_loanapplication';
        $status = $wpdb->update(
            $table_name,
                array(
                  'STATUS' => 1
                ),
                array( 'ID' => $data['ID'] )
            );
      } else {
        echo 'email not sent';
      }
  } //End Mail

}
?>
