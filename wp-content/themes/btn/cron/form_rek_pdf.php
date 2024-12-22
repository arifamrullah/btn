<?php
define( 'WP_ENV', 'production' );
include_once dirname(__FILE__) . "/../../../../wp-load.php";
global $wpdb;
$reg_sql = "SELECT btn_relation.*
             FROM btn_cif_relation as btn_relation
             WHERE btn_relation.status=0
             LIMIT 5
             ";
// $reg_sql = "SELECT btn_relation.*,data_pribadi.*,btn_simpanan.*,btn_sertifikat.*,btn_atmSms.*,btn_rekPemb.*,btn_rekSms.*,btn_giro.*,btn_tabungan.*
//             FROM btn_cif_relation as btn_relation
//             left JOIN btn_data_pribadi as data_pribadi
//             ON btn_relation.id_data_pribadi = data_pribadi.id 
             
//             left JOIN btn_form_simpanan as btn_simpanan
//             ON btn_relation.id_form_simpanan = btn_simpanan.id
//             left JOIN btn_sertifikat_deposito as btn_sertifikat
//             ON btn_simpanan.id = btn_sertifikat.id_form_simpanan
             
//             left JOIN btn_form_atm_sms as btn_atmSms
//             ON btn_relation.id_form_atm_sms = btn_atmSms.id
//             left JOIN btn_daftar_rek_pembayaran as btn_rekPemb
//             ON btn_atmSms.id = btn_rekPemb.id_form_atm_sms
//             left JOIN btn_daftar_rek_sms_banking as btn_rekSms
//             ON btn_atmSms.id = btn_rekSms.id_form_atm_sms
//             left JOIN btn_update_data_giro as btn_giro
//             ON btn_atmSms.id = btn_giro.id_form_atm_sms
//             left JOIN btn_update_data_tabungan as btn_tabungan
//             ON btn_atmSms.id = btn_tabungan.id_form_atm_sms

//             WHERE btn_relation.status=0
//             LIMIT 1
//             ";

$items = $wpdb->get_results( $reg_sql, ARRAY_A );
if ( !empty( $items ) ) {
  foreach ( $items as $value ) {
    // print_r($value['jenis_cif'] == 'lembaga');die();
    // cron_action($value);
    if ( $value['jenis_cif'] == 'lembaga' ) {
      if ( $value['id_data_lembaga'] != 0 ) {
        // $data_cif = "SELECT data_lembaga.*,data_pengurus.*,group_usaha.*
        //             FROM btn_data_lembaga as data_lembaga
        //             left JOIN btn_data_pengurus_lembaga as data_pengurus
        //             ON data_lembaga.id = data_pengurus.id_data_lembaga
        //             left JOIN btn_group_usaha_lembaga as group_usaha
        //             ON data_lembaga.id = group_usaha.id_data_lembaga
        //             WHERE data_lembaga.id=".$value['id_data_lembaga'];
        // $data_lembaga = $wpdb->get_results($data_cif,ARRAY_A);
        $data_cif = "SELECT data_lembaga.*
                    FROM btn_data_lembaga as data_lembaga
                    WHERE data_lembaga.id=".$value['id_data_lembaga'];
        $data_lembaga = $wpdb->get_results( $data_cif, ARRAY_A );
        // print_r($data_lembaga);die();
        foreach ( $data_lembaga as $res_lembaga ) {
          $select_pengurus = "SELECT data_pengurus.*
                              FROM btn_data_pengurus_lembaga as data_pengurus
                              WHERE data_pengurus.id_data_lembaga=".$res_lembaga['id'];
          $data_pengurus = $wpdb->get_results( $select_pengurus, ARRAY_A );

          $select_group = "SELECT data_group.*
                              FROM btn_group_usaha_lembaga as data_group
                              WHERE data_group.id_data_lembaga=".$res_lembaga['id'];
          $data_groups = $wpdb->get_results( $select_group, ARRAY_A );
        }

        foreach ( $data_pengurus as $res_pengurus ){}
        foreach ( $data_groups as $res_group ){}
      }
    } else if ( $value['jenis_cif'] == 'perorangan' ) {
      if ( $value['id_data_pribadi'] != 0 ) {
        $data_cif = "SELECT data_pribadi.*
                    FROM btn_data_pribadi as data_pribadi
                    WHERE data_pribadi.id=".$value['id_data_pribadi'];
        $data_pribadi = $wpdb->get_results( $data_cif, ARRAY_A );
        foreach ( $data_pribadi as $res_pribadi ){}
      }
    }

    if ($value['id_form_simpanan'] != 0) {
      $data_form_simpanan = "SELECT btn_simpanan.*,btn_sertifikat.*,btn_product.*
                            FROM btn_form_simpanan as btn_simpanan
                            left JOIN btn_sertifikat_deposito as btn_sertifikat
                            ON btn_simpanan.id = btn_sertifikat.id_form_simpanan
                            left JOIN btn_product as btn_product
                            ON btn_simpanan.id_produk = btn_product.ID_PRODUCT
                            WHERE btn_simpanan.id = ".$value['id_form_simpanan'];
      $data_simpanan = $wpdb->get_results( $data_form_simpanan, ARRAY_A );
      foreach ( $data_simpanan as $res_simpanan ){}
    }

    if ( $value['id_form_atm_sms'] != 0 ) {
      $data_form_atmSms = "SELECT btn_atmSms.*,btn_rekPemb.*,btn_rekSms.*,btn_giro.*,btn_tabungan.*
                            FROM btn_form_atm_sms as btn_atmSms
                            left JOIN btn_daftar_rek_pembayaran as btn_rekPemb
                            ON btn_atmSms.id = btn_rekPemb.id_form_atm_sms
                            left JOIN btn_daftar_rek_sms_banking as btn_rekSms
                            ON btn_atmSms.id = btn_rekSms.id_form_atm_sms
                            left JOIN btn_update_data_giro as btn_giro
                            ON btn_atmSms.id = btn_giro.id_form_atm_sms
                            left JOIN btn_update_data_tabungan as btn_tabungan
                            ON btn_atmSms.id = btn_tabungan.id_form_atm_sms
                            WHERE btn_atmSms.id =".$value['id_form_atm_sms'];
      $data_atmSms = $wpdb->get_results( $data_form_atmSms, ARRAY_A );
      foreach ( $data_atmSms as $res_atmSms ){}
    }

    require( get_template_directory()."/plugins/fpdf/table_btn.php" );
    require( get_template_directory()."/plugins/phpmailer/class.phpmailer.php" );
    require( get_template_directory()."/plugins/phpmailer/class.smtp.php" );

    cron_action_pribadi( $res_pribadi, $res_lembaga, $res_simpanan, $res_atmSms, $value['id'] );
  }
}

function cron_action_pribadi( $res_pribadi, $res_lembaga, $res_simpanan, $res_atmSms, $value_id ) {
  global $wpdb;
  // print_r($res_lembaga);die();
  if ( $res_pribadi['email'] ) {
      //PDF
      $databasic = array();
      //number
      $no = 1;
      for ( $no = 1; $no <= 47; $no++ ) {
        $databasic[$no][0] = $no;
      }
      $databasic[1][1]='Nama Lengkap Identitas';
      $databasic[2][1]='Nama Lengkap Tanpa Singkatan & gelar';
      $databasic[3][1]='Gelar Sebelum Nama';
      $databasic[4][1]='Gelar Setelah Nama';
      $databasic[5][1]='Nama Alias';
      $databasic[6][1]='Nama Wali';
      $databasic[7][1]='Alamat';
      $databasic[8][1]='Rt / Rw';
      $databasic[9][1]='Kelurahan';
      $databasic[10][1]='Kecamatan';
      $databasic[11][1]='Kota';
      $databasic[12][1]='Propinsi';
      $databasic[13][1]='kode_pos';
      $databasic[14][1]='status_alamat';
      $databasic[15][1]='alamat_saat_ini';
      $databasic[16][1]='Rt / Rw saat ini';
      $databasic[17][1]='kelurahan_saat_ini';
      $databasic[18][1]='kecamatan_saat_ini';
      $databasic[19][1]='kota_saat_ini';
      $databasic[20][1]='propinsi_saat_ini';
      $databasic[21][1]='kodepos_saat_ini';
      $databasic[22][1]='status_alamat_saat_ini';
      $databasic[23][1]='tahun_lama_tinggal';
      $databasic[24][1]='bulan_lama_tinggal';
      $databasic[25][1]='no_tlp_1';
      $databasic[26][1]='no_tlp_2';
      $databasic[27][1]='No Handphone';
      $databasic[28][1]='email';
      $databasic[29][1]='tempat_lahir';
      $databasic[30][1]='tgl_lahir';
      $databasic[31][1]='warganegara';
      $databasic[32][1]='negara_asal';
      $databasic[33][1]='jenis_kelamin';
      $databasic[34][1]='status_penduduk';
      $databasic[35][1]='id_pengenal';
      $databasic[36][1]='no_pengenal';
      $databasic[37][1]='diterbitkan_pengenal';
      $databasic[38][1]='masa_berlaku_pengenal';
      $databasic[39][1]='id_pengenal_tambahan';
      $databasic[40][1]='no_pengenal_tambahan';
      $databasic[41][1]='diterbitkan_pengenal_tambahan';
      $databasic[42][1]='agama';
      $databasic[43][1]='status_kawin';
      $databasic[44][1]='jumlah_anak';
      $databasic[45][1]='jumlah_tanggungan';
      $databasic[46][1]='pendidikan';
      $databasic[47][1]='nama_gadis_ibu_kandung';
      
      $databasic1 = array();
      $no = 1;
      for ( $no = 1; $no <= 4; $no++ ) {
        $databasic1[$no][0] = $no;
      }
      // $databasic1[][1]='Dalam Keadaan Darurat Pihak Yang Dapat Dihubungi';
      $databasic1[1][1]='nama_lengkap';
      $databasic1[2][1]='alamat';
      $databasic1[3][1]='no_tlp';
      $databasic1[4][1]='hubungan_nasabah';
      
      $databasic2 = array();
      $no = 1;
      for ( $no = 1; $no <= 4; $no++ ) {
        $databasic2[$no][0] = $no;
      }
      $databasic2[1][1]='bidang_usaha';
      $databasic2[2][1]='jenis_pekerjaan';
      $databasic2[3][1]='jabatan';
      $databasic2[4][1]='nama_perusahaan';
      $databasic2[5][1]='alamat_perusahaan';
      $databasic2[6][1]='Rt / Rw Perusahaan';
      $databasic2[7][1]='kelurahan_perusahaan';
      $databasic2[8][1]='kecamatan_perusahaan';
      $databasic2[9][1]='kota_perusahaan';
      $databasic2[10][1]='kodepos_perusahaan';
      $databasic2[11][1]='propinsi_perusahaan';
      $databasic2[12][1]='tlp_perusahaan';
      $databasic2[13][1]='fax_perusahaan';
      $databasic2[14][1]='email_perusahaan';
      $databasic2[15][1]='website_perusahaan';
      
      $databasic3 = array();
      $no = 1;
      for ( $no = 1; $no <= 3; $no++ ) {
        $databasic3[$no][0] = $no;
      }
      $databasic3[1][1]='penghasilan_pemohon';
      $databasic3[2][1]='penghasilan_tambahan';
      $databasic3[3][1]='nama_penghasilan_tambahan';

      $databasic[1][2]=$res_pribadi['nama_sesuai_identitas'];
      $databasic[2][2]=$res_pribadi['nama_tanpa_gelar'];
      $databasic[3][2]=$res_pribadi['gelar_sebelum_nama'];
      $databasic[4][2]=$res_pribadi['gelar_setelah_nama'];
      $databasic[5][2]=$res_pribadi['nama_alias'];
      $databasic[6][2]=$res_pribadi['nama_wali'];
      $databasic[7][2]=$res_pribadi['alamat'];
      $databasic[8][2]=$res_pribadi['rt'].'/'.$res_pribadi['rw'];
      $databasic[9][2]=$res_pribadi['kelurahan'];
      $databasic[10][2]=$res_pribadi['kecamatan'];
      $databasic[11][2]=$res_pribadi['kota'];
      $databasic[12][2]=$res_pribadi['propinsi'];
      $databasic[13][2]=$res_pribadi['kode_pos'];
      $databasic[14][2]=$res_pribadi['status_alamat'];
      $databasic[15][2]=$res_pribadi['alamat_saat_ini'];
      $databasic[16][2]=$res_pribadi['rt_saat_ini'].'/'.$res_pribadi['rw_saat_ini'];
      $databasic[17][2]=$res_pribadi['kelurahan_saat_ini'];
      $databasic[18][2]=$res_pribadi['kecamatan_saat_ini'];
      $databasic[19][2]=$res_pribadi['kota_saat_ini'];
      $databasic[20][2]=$res_pribadi['propinsi_saat_ini'];
      $databasic[21][2]=$res_pribadi['kodepos_saat_ini'];
      $databasic[22][2]=$res_pribadi['status_alamat_saat_ini'];
      $databasic[23][2]=$res_pribadi['tahun_lama_tinggal'];
      $databasic[24][2]=$res_pribadi['bulan_lama_tinggal'];
      $databasic[25][2]=$res_pribadi['no_tlp_1'];
      $databasic[26][2]=$res_pribadi['no_tlp_2'];
      $databasic[27][2]=$res_pribadi['ponsel'];
      $databasic[28][2]=$res_pribadi['email'];
      $databasic[29][2]=$res_pribadi['tempat_lahir'];
      $databasic[30][2]=$res_pribadi['tgl_lahir'];
      $databasic[31][2]=$res_pribadi['warganegara'];
      $databasic[32][2]=$res_pribadi['negara_asal'];
      $databasic[33][2]=$res_pribadi['jenis_kelamin'];
      $databasic[34][2]=$res_pribadi['status_penduduk'];
      $databasic[35][2]=$res_pribadi['id_pengenal'];
      $databasic[36][2]=$res_pribadi['no_pengenal'];
      $databasic[37][2]=$res_pribadi['diterbitkan_pengenal'];
      $databasic[38][2]=$res_pribadi['masa_berlaku_pengenal'];
      $databasic[39][2]=$res_pribadi['id_pengenal_tambahan'];
      $databasic[40][2]=$res_pribadi['no_pengenal_tambahan'];
      $databasic[41][2]=$res_pribadi['diterbitkan_pengenal_tambahan'];
      $databasic[42][2]=$res_pribadi['agama'];
      $databasic[43][2]=$res_pribadi['status_kawin'];
      $databasic[44][2]=$res_pribadi['jumlah_anak'];
      $databasic[45][2]=$res_pribadi['jumlah_tanggungan'];
      $databasic[46][2]=$res_pribadi['pendidikan'];
      $databasic[47][2]=$res_pribadi['nama_gadis_ibu_kandung'];
      
      // $databasic[48][2]='';
      $databasic1[1][2]=$res_pribadi['nama_lengkap_relasi'];
      $databasic1[2][2]=$res_pribadi['alamat_relasi'];
      $databasic1[3][2]=$res_pribadi['no_tlp_relasi'];
      $databasic1[4][2]=$res_pribadi['hubungan_nasabah'];
      
      $databasic2[1][2]=$res_pribadi['bidang_usaha'];
      $databasic2[2][2]=$res_pribadi['jenis_pekerjaan'];
      $databasic2[3][2]=$res_pribadi['jabatan'];
      $databasic2[4][2]=$res_pribadi['nama_perusahaan'];
      $databasic2[5][2]=$res_pribadi['alamat_perusahaan'];
      $databasic2[6][2]=$res_pribadi['rt_perusahaan'].'/'.$res_pribadi['rw_perusahaan'];
      $databasic2[7][2]=$res_pribadi['kelurahan_perusahaan'];
      $databasic2[8][2]=$res_pribadi['kecamatan_perusahaan'];
      $databasic2[9][2]=$res_pribadi['kota_perusahaan'];
      $databasic2[10][2]=$res_pribadi['kodepos_perusahaan'];
      $databasic2[11][2]=$res_pribadi['provinsi_perusahaan'];
      $databasic2[12][2]=$res_pribadi['tlp_perusahaan'];
      $databasic2[13][2]=$res_pribadi['fax_perusahaan'];
      $databasic2[14][2]=$res_pribadi['email_perusahaan'];
      $databasic2[15][2]=$res_pribadi['website_perusahaan'];
      
      $databasic3[1][2]=$res_pribadi['penghasilan_pemohon'];
      $databasic3[2][2]=$res_pribadi['penghasilan_tambahan'];
      $databasic3[3][2]=$res_pribadi['nama_penghasilan_tambahan'];

      $datasimpanan = array();

      $no = 1;
      for ( $no=1; $no<=24; $no++ ) {
        $datasimpanan[$no][0] = $no;
      }
      $datasimpanan[1][1]='nama produk';
      $datasimpanan[2][1]='menghendaki_jasa_tabungan';
      $datasimpanan[3][1]='tahun keberangkatan';
      $datasimpanan[4][1]='wilayah_keberangkatan';
      $datasimpanan[5][1]='alasan_penggantian_kartu';
      $datasimpanan[6][1]='no_cif';
      $datasimpanan[7][1]='nama_lengkap';
      $datasimpanan[8][1]='no_rekening';
      $datasimpanan[9][1]='sumber dana untuk pembukaan rekening';
      $datasimpanan[10][1]='sumber dana tambahan';
      $datasimpanan[11][1]='jenis setoran untuk pembukaan rekekning';
      $datasimpanan[12][1]='tujuan_pembukaan_rekening';
      $datasimpanan[13][1]='alasan_membuka_rekening di Bank BTN';
      $datasimpanan[14][1]='fitur / Fasilitas yang diinginkan';
      $datasimpanan[15][1]='nama_pada_kartu';
      $datasimpanan[16][1]='jumlah_nominal';
      $datasimpanan[17][1]='terbilang';
      $datasimpanan[18][1]='mata_uang';
      $datasimpanan[19][1]='jangka_waktu';
      $datasimpanan[20][1]='suku_bunga';
      $datasimpanan[21][1]='perpanjangan';
      $datasimpanan[22][1]='cara_pembayaran_bunga';
      $datasimpanan[23][1]='pemindahbukuan';
      $datasimpanan[24][1]='pemindahbukuan_ke_rek BTN';

      $datasimpanan[1][2]=$res_simpanan['NAME'];
      $datasimpanan[2][2]=$res_simpanan['menghendaki_jasa_tabungan'];
      $datasimpanan[3][2]=$res_simpanan['tahun_berangkat'];
      $datasimpanan[4][2]=$res_simpanan['wilayah_berangkat'];
      $datasimpanan[5][2]=$res_simpanan['alasan_penggantian_kartu'];
      $datasimpanan[6][2]=$res_simpanan['no_cif'];
      $datasimpanan[7][2]=$res_simpanan['nama_lengkap'];
      $datasimpanan[8][2]=$res_simpanan['no_rekening'];
      $datasimpanan[9][2]=$res_simpanan['sumber_dana'];
      $datasimpanan[10][2]=$res_simpanan['sumber_dana_tambahan'];
      $datasimpanan[11][2]=$res_simpanan['jenis_setoran'];
      $datasimpanan[12][2]=$res_simpanan['tujuan_buka_rekening'];
      $datasimpanan[13][2]=$res_simpanan['alasan_buka_rekening'];
      $datasimpanan[14][2]=implode(',', json_decode($res_simpanan['fitur']));
      $datasimpanan[15][2]=$res_simpanan['nama_pada_kartu'];
      $datasimpanan[16][2]=$res_simpanan['jumlah_nominal'];
      $datasimpanan[17][2]=$res_simpanan['terbilang'];
      $datasimpanan[18][2]=$res_simpanan['mata_uang'];
      $datasimpanan[19][2]=$res_simpanan['jangka_waktu'];
      $datasimpanan[20][2]=$res_simpanan['suku_bunga'];
      $datasimpanan[21][2]=$res_simpanan['perpanjangan'];
      $datasimpanan[22][2]=$res_simpanan['cara_pembayaran_bunga'];
      $datasimpanan[23][2]=$res_simpanan['pemindahbukuan'];
      $datasimpanan[24][2]=$res_simpanan['pemindahbukuan_ke_rek'];

      $dataAtmSms = array();
      $no = 1;
      for ( $no = 1; $no <= 12; $no++ ) {
        $dataAtmSms[$no][0] = $no;
      }
      $dataAtmSms[1][1]='cabang';
      $dataAtmSms[2][1]='tanggal';
      $dataAtmSms[3][1]='nama_lengkap';
      $dataAtmSms[4][1]='tempat_lahir';
      $dataAtmSms[5][1]='tanggal_lahir';
      $dataAtmSms[6][1]='nama_gadis_ibu_kandung';
      $dataAtmSms[7][1]='alamat_lengkap';
      $dataAtmSms[8][1]='no_tlp_rumah';
      $dataAtmSms[9][1]='no_tlp_kantor';
      $dataAtmSms[10][1]='no_handphone';
      $dataAtmSms[11][1]='no_kartu_btn';
      $dataAtmSms[12][1]='no_cif';

      $dataAtmSms[1][2]=$res_atmSms['cabang'];
      $dataAtmSms[2][2]=$res_atmSms['tanggal'];
      $dataAtmSms[3][2]=$res_atmSms['nama_lengkap'];
      $dataAtmSms[4][2]=$res_atmSms['tempat_lahir'];
      $dataAtmSms[5][2]=$res_atmSms['tanggal_lahir'];
      $dataAtmSms[6][2]=$res_atmSms['nama_gadis_ibu_kandung'];
      $dataAtmSms[7][2]=$res_atmSms['alamat_lengkap'];
      $dataAtmSms[8][2]=$res_atmSms['no_tlp_rumah'];
      $dataAtmSms[9][2]=$res_atmSms['no_tlp_kantor'];
      $dataAtmSms[10][2]=$res_atmSms['no_hp'];
      $dataAtmSms[11][2]=$res_atmSms['no_kartu_btn'];
      $dataAtmSms[12][2]=$res_atmSms['no_cif'];

      //Kartu BTN
      $kartuBTN = array();
      $no = 1;
      for ( $no = 1; $no <= 7; $no++ ) {
        $dataAtmSms[$no][0] = $no;
      }
      // $kartuBTN[1][1]='kartu_btn';
      $kartuBTN[1][1]='kartu_baru';
      $kartuBTN[2][1]='nama_pada_kartu';
      $kartuBTN[3][1]='penggantian_kartu';
      $kartuBTN[4][1]='alasan_penggantian_kartu';
      $kartuBTN[5][1]='jenis_kartu';
      $kartuBTN[6][1]='status_kartu_instan';
      $kartuBTN[7][1]='update_data';

      // $kartuBTN[1][2]=$res_atmSms['kartu_btn'];
      $kartuBTN[1][2]=$res_atmSms['kartu_baru'];
      $kartuBTN[2][2]=$res_atmSms['nama_pada_kartu'];
      $kartuBTN[3][2]=$res_atmSms['penggantian_kartu'];
      $kartuBTN[4][2]=$res_atmSms['alasan_penggantian_kartu'];
      $kartuBTN[5][2]=$res_atmSms['jenis_kartu'];
      $kartuBTN[6][2]=$res_atmSms['status_kartu_instan'];
      $kartuBTN[7][2]=$res_atmSms['update_data'];

      $pdf = new PDF();

      if ( !empty( $res_pribadi ) ) {
        //Data Pribadi
        $pdf->Ln();
        $pdf->AddPage('P','Legal');
        $pdf->BasicTable( $databasic, 'Formulir Data Nasabah Perorangan', 'Data Pribadi' );
        $pdf->BasicTable( $databasic1, '', 'Dalam Keadaan Darurat Pihak Yang Dapat Dihubungi' );
        $pdf->BasicTable( $databasic2, '', 'Data Pekerjaan' );
        $pdf->BasicTable( $databasic3, '', 'Data Penghasilan Kotor Perbulan' );
      }

      if ( !empty( $res_simpanan ) ) {
        //Data Form Simpanan
        $pdf->Ln();
        $pdf->AddPage( 'P', 'Legal' );
        $pdf->BasicTable( $datasimpanan, 'Form Permohonan Pembukaan Rekening Simpanan', 'Berikut Detail Identitas Anda :' );
        
        $pdf->Ln();
        $header = array( 'Denominal', 'Lembar' );
        $dataSertifikat = array( [$res_simpanan['denominal'], $res_simpanan['lembar']] );
        $pdf->BasicTableColumd( $header, $dataSertifikat, 'Sertifikat Deposito' );
      }

      if ( !empty( $res_atmSms ) ) {
        
        //Data Form Atm SMS
        $pdf->Ln();
        $pdf->AddPage( 'P', 'Legal' );
        $pdf->BasicTable( $dataAtmSms, 'Form Aplikasi Kartu BTN dan SMS Banking', 'Data Nasabah' );
        
        $pdf->Ln();
        $pdf->BasicTable2( $kartuBTN, 'Kartu BTN' );
        $pdf->Ln();
        $header = array( 'Tabungan', 'Nomor Rekening' );
        $dataTabungan = array( [$res_atmSms['status_tabungan'], $res_atmSms['no_rekening']] );
        $pdf->BasicTableColumd( $header, $dataTabungan, 'Nomor Rekening Yang Didaftarkan' );

        $header = array( 'Giro', 'Nomor Rekening' );
        $dataTabungan = array( [$res_atmSms['status_giro'], $res_atmSms['no_rekening']] );
        $pdf->BasicTableColumd( $header, $dataTabungan );

        //SMS Banking
        $pdf->Ln();
        $header = array( 'Daftar Nomor Rek Tujuan Transfer', 'Nama Pemilik Rekening Tujuan' );
        $dataRek = array( [$res_atmSms['no_rek_tujuan'], $res_atmSms['nama_pemilik_rek']] );
        $pdf->BasicTableColumd( $header, $dataRek, 'SMS Banking' );

        $pdf->Ln();
        $header = array( 'Nama Rekening (KPR/TELKOM/PLN/TELKOMSEL/DSB)', 'No Pelanggan Kontrak' );
        $dataRekPemb = array( [$res_atmSms['nama_rekening'], $res_atmSms['no_pelanggan']] );
        $pdf->BasicTableColumd( $header, $dataRek, 'Daftar Nomor Rekening Pembayaran/Pembelian' );

        $pdf->Ln();
        $header = array( 'Nama Rekening (KPR/TELKOM/PLN/TELKOMSEL/DSB)', 'No Pelanggan Kontrak' );
        $dataRekPemb = array( [$res_atmSms['nama_rekening'], $res_atmSms['no_pelanggan']] );
        $pdf->BasicTableColumd( $header, $dataRek, 'Daftar Nomor Rekening Pembayaran/Pembelian' );

        $pdf->Ln();
        $header = array( 'Pendebetan Lebih Dari (Rp)', 'No Rekening' );
        $dataDeb = array( [$res_atmSms['pendebetan_lebih_dari'], $res_atmSms['no_rek_pendebitan']] );
        $pdf->BasicTableColumd( $header, $dataDeb, 'Pemberitahuan Bank Melalui SMS (SMS Alert) Bila' );

        $header = array( 'Pengkreditan Lebih Dari (Rp)', 'No Rekening' );
        $dataKred = array( [$res_atmSms['pengkreditan_lebih_dari'], $res_atmSms['no_rek_pengkreditan']] );
        $pdf->BasicTableColumd( $header, $dataKred );

        $header = array( 'Saldo Kurang Dari (Rp)', 'No Rekening' );
        $dataSaldo = array( [$res_atmSms['saldo_kurang_dari'], $res_atmSms['no_rek_saldo']] );
        $pdf->BasicTableColumd( $header, $dataSaldo );
      }
      
      $pdf->Output(); die();

      add_filter( 'wp_mail_content_type', create_function( '', 'return "text/html"; ') );

      $mail = new PHPMailer();
      $mail->IsHTML( true );
      $mail->Host       = "pro.turbo-smtp.com"; // SMTP server
      $mail->IsSMTP(); // telling the class to use SMTP
      $mail->SMTPAuth   = true;                  // enable SMTP authentication
      $mail->Host       = "pro.turbo-smtp.com"; // SMTP server
      $mail->Port       = 25;                    // set the SMTP port for the GMAIL server
      $mail->Username   = "yusup.handian@kiranatama.com"; // SMTP account username18.
      $mail->Password   = "olsVswL2";        // SMTP account password
      $mail->From       = "yusup.handian@kiranatama.com";
      $mail->AddAddress( "arif.a@smooets.com" ); //( $data_head['EMAIL'] );
      $mail->AddCC( "arifamrullah17@gmail.com" ); //( $data_head['EMAIL'] );
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
                                              <div style="font-family: Arial; color:#333; font-size:14px; line-height:26px;text-align:center;padding:20px;">
                                              Proses pembukaan tabungan atas nama '.$res_pribadi["nama_sesuai_identitas"].' hampir selesai!
                                              </div>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td colspan="2" width="100%" align="left" valign="top" style="background:#fff;padding:20px 0">
                                              <div style="font-family: Arial; color:#333; font-size:13px; line-height:24px;text-align:center;padding:20px;">
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
      $mail->AddStringAttachment( $doc, $res_pribadi['nama_sesuai_identitas'].'.pdf', 'base64', 'application/pdf' );
      $envio = $mail->Send(); //kirim email
      if ( $envio ) {
        // Register update status
        $table_name = 'btn_cif_relation';
        $status = $wpdb->update(
            $table_name,
                array(
                  'status' => 1
                ),
                array( 'id' => $value_id )
            );
      } else {
        echo 'email not sent';
      }
    } //End Mail
  }
?>