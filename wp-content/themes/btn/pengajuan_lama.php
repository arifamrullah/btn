<?php
/**
 * Template Name: Halaman Form Pengajuan
 */
?>
<?php get_header();?>
<?php
$btntitan = TitanFramework::getInstance( 'btn' );
$countries =  explode("\r\n",$btntitan->getOption( 'negara' ));
$gelars =  explode("\r\n",$btntitan->getOption( 'titleper' ));
$jenis_identitas =  explode("\r\n",$btntitan->getOption( 'jenis_identitas' ));
$pendidikan_terkhir =  explode("\r\n",$btntitan->getOption( 'pendidikan_terkhir' ));
$jenis_pekerjaan =  explode("\r\n",$btntitan->getOption( 'jenis_pekerjaan' ));
$pendapatan_perbulan =  explode("\r\n",$btntitan->getOption( 'pendapatan_perbulan' ));
$sumber_pendapatan =  explode("\r\n",$btntitan->getOption( 'sumber_pendapatan' ));
?>
<script type="text/javascript" src="<?php echo get_template_directory_uri()?>/js/autoNumeric.js"></script>
<div class="modal fade" id="konfirmasi-form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog" style="max-width:450px">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Verifikasi Form</h4>
         </div>
         <div class="modal-body">
         <p>
           Silakan verifikasi akun anda dengan mendatangi cabang terdekat
         </p>
          <form id="verificationRegistration" class="form-horizontal">
                  <div class="form-group">
                     <label for="" class="col-sm-5 control-label">Pilih Kota</label>
                     <div class="col-sm-7">
                         <select name="KOTA_ID" class="selectpicker select_v_kota required">
                              <option value="">--Pilih Kota--</option>
                              <?php echo btn_get_city() ?>
                          </select>
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="" class="col-sm-5 control-label">Pilih Cabang</label>
                     <div class="col-sm-7">
                         <select name="CABANG_ID" class="selectpicker selectpicker_v_cabang required">
                            <option value="">--Pilih Cabang--</option>
                        </select>
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="" class="col-sm-5 control-label">Pilih Tanggal</label>
                     <div class="col-sm-7">
                          <div id="datetimepicker5" class="input-append date">
                              <input name="V_TANGGAL" data-format="dd/MM/yyyy" type="text" class="required" readonly></input>
                              <span class="add-on">
                                <i class="fa fa-calendar"></i>
                              </span>
                          </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="" class="col-sm-5 control-label">Pilih Waktu</label>
                     <div class="col-sm-7">
                         <div id="datetimepicker6" class="input-append date">
                            <input name="V_WAKTU" data-format="hh:mm:ss" type="text" class="required" readonly></input>
                            <span class="add-on">
                              <i class="fa fa-clock-o"></i>
                            </span>
                          </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="col-sm-offset-2 col-sm-10">
                        <button id="processLoanRegistration" type="submit" class="btn btn-yellow pull-right">Proses</button>
                     </div>
                  </div>
               </form>
               <div class="progress" style="display:none;">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                    Please Wait ...
                  </div>
                </div>
         </div>
      </div>
   </div>
</div>
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
            <form id="loanRegistration">
              <div class="data-diri">
                  <h3>Data Diri</h3>
                  <table width="100%">
                      <tbody>
                        <tr>
                            <td width="40%" class="tdganjil"><strong>Nama</strong></td>
                            <td width="60%" class="tdgenap"><input type="text" name="NAME" maxlength="50" size="50" value="" class="formField required"></td>
                        </tr>
                         <tr>
                            <td width="40%" class="tdganjil"><strong>Kota lahir</strong></td>
                            <td width="60%" class="tdgenap"><input type="text" name="KOTA_LAHIR" maxlength="50" size="30" value="" class="required">
                            </td>
                        </tr>
                        <tr>
                            <td width="40%" class="tdganjil"><strong>Tanggal Lahir</strong></td>
                            <td width="60%" class="tdgenap">
                                <input type="text" name="TANGGAL_LAHIR" data-masked-input="99/99/9999" maxlength="10" class="required">
                                <br>
                                <small>contoh: 22/04/1970</small>
                            </td>
                        </tr>
                        <tr>
                            <td width="40%" class="tdganjil"><strong>Alamat</strong></td>
                            <td width="60%" class="tdgenap"><textarea name="ADDRESS" cols="50" class="required"></textarea>
                            </td>
                        </tr>
                        <tr>
                             <td width="40%" class="tdganjil"><strong>Nomor telepon</strong></td>
                             <td width="60%" class="tdgenap">
                                 <input type="text" name="PHONE" maxlength="15" size="20" value="" class="required number_only"><br>
                                 <small>contoh: 081xxxxxxxxx atau 021xxxxxxxx</small>
                             </td>
                         </tr>
                         <tr>
                             <td class="tdganjil"><strong>E-mail</strong></td>
                             <td class="tdgenap"><input type="text" name="EMAIL" maxlength="40" size="30" value="" class="required email"></td>
                         </tr>
                         <tr>
                             <td class="tdganjil"><strong>No. KTP</strong></td>
                             <td class="tdgenap"><input type="text" name="KTP_NUMBER" value="" class="required number_only"></td>
                         </tr>
                         <tr>
                             <td width="40%" class="tdganjil"><strong>Status perkawinan</strong></td>
                             <td width="60%" class="tdgenap">
                                 <select name="STATUS_KAWIN" class="selectpicker required">
                                     <option value="">--Pilih--</option>
                                     <option value="M">Menikah</option>
                                     <option value="S">Lajang</option>
                                 </select>
                             </td>
                         </tr>
                         <tr>
                             <td width="40%" class="tdganjil"><strong>Jenis kelamin</strong></td>
                             <td width="60%" class="tdgenap">
                                 <select name="JENIS_KELAMIN" class="selectpicker required">
                                     <option value="">--Pilih--</option>
                                     <option value="L">LAKI - LAKI</option>
                                     <option value="P">PEREMPUAN</option>
                                 </select>
                             </td>
                         </tr>
                         <tr>
                             <td width="40%" class="tdganjil"><strong>Pendapatan perbulan</strong></td>
                             <td width="60%" class="tdgenap"><input type="text" name="MONTHLY_INCOME" maxlength="20" size="20" value="" class="formField required number_only autonumeric"></td>
                         </tr>
                         <tr>
                             <td width="40%" class="tdganjil"><strong>Pengeluaran perbulan</strong></td>
                             <td width="60%" class="tdgenap"><input type="text" name="MONTHLY_FIXED_EXPENSES" maxlength="20" size="20" value="" class="formField required number_only autonumeric"></td>
                         </tr>
                         <tr>
                             <td width="40%" class="tdganjil"><strong>Jenis pinjaman</strong></td>
                             <td width="60%" class="tdgenap">
                                 <select name="LOAN_TYPE" class="selectpicker required">
                                     <option value="">--Pilih--</option>
                                     <option value="KPR">KPR - Kredit Pemilikan Rumah</option>
                                     <option value="KKB">KKB - Kredit Kendaraan Bermotor</option>
                                     <option value="KTA">KTA - Kredit Tanpa Agunan</option>
                                 </select>
                             </td>
                         </tr>
                         <tr>
                             <td width="40%" class="tdganjil"><strong>Jumlah pinjaman</strong></td>
                             <td width="60%" class="tdgenap"><input type="text" name="LOAN_AMOUNT" maxlength="15" size="20" value="" class="required number_only autonumeric"></td>
                         </tr>
                         <tr>
                             <td width="40%" class="tdganjil"><strong>Uang muka</strong></td>
                             <td width="60%" class="tdgenap"><input type="text" name="DEPOSIT" maxlength="15" size="20" value="" class="required number_only autonumeric"></td>
                         </tr>
                         <tr>
                             <td width="40%" class="tdganjil"><strong>Lama waktu pinjaman</strong></td>
                             <td width="60%" class="tdgenap">
                               <input type="text" name="LOAN_TENURE" maxlength="15" size="3" value="" class="required number_only"> Bulan
                             </td>
                          </tr>
                         <tr>
                             <td width="40%" class="tdganjil"><strong>Bunga pinjaman</strong></td>
                             <td width="60%" class="tdgenap"><input type="text" name="INTEREST" maxlength="7" size="5" value="0" class="number_only" readonly> %</td>
                          </tr>
                          <tr>
                              <td width="40%" class="tdganjil"><strong>Angsuran</strong></td>
                              <td width="60%" class="tdgenap"><input type="text" name="INSTALLMENT" maxlength="30" size="20" value="0" class="number_only autonumeric" readonly></td>
                          </tr>
                      </tbody>
                  </table>
              </div>
              <div class="box-btn">
                  <a href="" class="btn btn-blue">Batal</a>
                  <a href="" id="submitLoanRegistration" class="btn btn-yellow">Kirim</a>
              </div>
            </form>
        </div>
    </div>
</section>
<section id="call-action" class="small">
    <div class="row-fluid">
        <h2>Jika Anda butuh bantuan, silahkan hubungi Customer Services Kami
        </h2>
        <a href="<?php echo home_url( '/live-chat' ) ?>" class="btn btn-blue"><i class="fa fa-comments-o"></i> Live Chat dengan CS </a>
    </div>
</section>
<?php add_action('wp_footer', 'JsforForm'); ?>
<?php get_footer();?>
