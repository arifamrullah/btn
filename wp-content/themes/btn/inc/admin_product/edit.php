<?php
$btntitan = TitanFramework::getInstance( 'btn' );
$category =  explode("\r\n",$btntitan->getOption( 'category_product' ));
// $countries =  explode("\r\n",$btntitan->getOption( 'negara' ));
// $gelars =  explode("\r\n",$btntitan->getOption( 'titleper' ));
// $jenis_identitas =  explode("\r\n",$btntitan->getOption( 'jenis_identitas' ));
// $pendidikan_terkhir =  explode("\r\n",$btntitan->getOption( 'pendidikan_terkhir' ));
// $jenis_pekerjaan =  explode("\r\n",$btntitan->getOption( 'jenis_pekerjaan' ));
// $pendapatan_perbulan =  explode("\r\n",$btntitan->getOption( 'pendapatan_perbulan' ));
// $sumber_pendapatan =  explode("\r\n",$btntitan->getOption( 'sumber_pendapatan' ));
global $wpdb;
  $id = $_GET['id'];
  $reg_sql = "SELECT * FROM btn_product WHERE ID_PRODUCT=".$id;
  $items = $wpdb->get_results( $reg_sql );
  foreach ($items as $item)
?>

<section   id="form-cif-perorangan">
    <div class="container">
        <div class="headline">
            <div class="icon-form">
                <i class="fa fa-file-text-o"></i>
            </div>
            <h2>EDIT DATA PRODUCT</h2>
        </div>
        <div class="row">
            <div class="form-child">
              <form id="formUpdateProduct" class="form-horizontal">
              <input type="hidden" name="id" value="<?php echo $item->ID_PRODUCT; ?>">
                <div class="data-diri">
                    <h3>Data Product</h3>
                    <table class="table">
                        <tbody>          
                  
                            <tr>
                               	<td width="40%" class="tdganjil"><strong>Nama Product</strong></td>
                                <td width="60%" class="tdgenap"><input type="text" name="nama" id="nama" maxlength="255"  value="<?php echo @$item->NAME; ?>" class="form-control required" ></td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Dibutuhkan Data CIF</strong></td>
                                <td width="60%" class="tdgenap">
                                  <div class="select-style">
                                    <select name="cif" id="cif">
                                        <option value="">--Pilih--</option>
                                        <option value="1" <?php echo (@$item->CIF==1)?'selected':'' ?>>Yes</option>
                                        <option value="0" <?php echo (@$item->CIF==0)?'selected':'' ?>>No</option>
                                    </select>
                                  </div>
                                </td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Fasilitas ATM & SMS</strong></td>
                                <td width="60%" class="tdgenap">
                                  <div class="select-style">
                                    <select name="atm_sms" id="atm_sms">
                                        <option value="">--Pilih--</option>
                                        <option value="1" <?php echo (@$item->ATM_SMS==1)?'selected':'' ?>>Yes</option>
                                        <option value="0" <?php echo (@$item->ATM_SMS==0)?'selected':'' ?>>No</option>
                                    </select>
                                  </div>
                                </td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Type CIF</strong></td>
                                <td width="60%" class="tdgenap">
                                  <div class="select-style">
                                    <select name="type_cif" id="atm_sms">
                                        <option value="">--Pilih--</option>
                                        <option value="1" <?php echo (@$item->TYPE==1)?'selected':'' ?>>Perorangan</option>
                                        <option value="0" <?php echo (@$item->TYPE==0)?'selected':'' ?>>Perorangan & Lembaga</option>
                                        <option value="2" <?php echo (@$item->TYPE==2)?'selected':'' ?>>Tidak Masuk Type</option>
                                    </select>
                                  </div>
                                </td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Category</strong></td>
                                <td width="60%" class="tdgenap">
                                  <div class="select-style">
                                    <select name="category" id="category">
                                    <?php foreach ($category as $key => $value) {
                                      if(strtolower($value) == strtolower(@$item->CATEGORY))
                                      {
                                        echo '<option value="'.$value.'" selected>'.$value.'</option>';
                                      } else {
                                        echo '<option value="'.$value.'">'.$value.'</option>';
                                      }

                                    } ?>
                                    </select>
                                  </div>
                                </td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Batas Usia Minimal</strong></td>
                                <td width="60%" class="tdgenap"><input type="text" name="usia_minimal" maxlength="255"  value="<?php echo @$item->USIA_MINIMAL ?>" class="form-control number_only"></td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Batas Usia Maximal</strong></td>
                                <td width="60%" class="tdgenap"><input type="text" name="usia_maximal" maxlength="255"  value="<?php echo @$item->USIA_MAXIMAL ?>" class="form-control number_only"></td>
                            </tr>
                            <tr>
                                <td width="40%" class="tdganjil"><strong>Status</strong></td>
                                <td width="60%" class="tdgenap">
                                  <div class="select-style">
                                    <select name="status" id="status">
                                        <option value="1" <?php echo (@$item->STATUS==1)?'selected':'' ?>>Aktif</option>
                                        <option value="0" <?php echo (@$item->STATUS==0)?'selected':'' ?>>Non Aktif</option>
                                    </select>
                                  </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                  </div> 
                  <div class="box-btn">
                    <a href="/wp-admin/admin.php?page=product" class="btn btn-blue">Batal</a>
                    <a href="javascript:void(0)" id="submitUpdateProduct" class="btn btn-yellow next" >Update</a>
                  </div>  
                  <div class="progress" style="display:none;">
                    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                      Please Wait ...
                    </div>
                  </div>             
            </div>
            </form>
        </div>
    </div>
</section>
