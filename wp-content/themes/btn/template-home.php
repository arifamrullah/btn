<?php
/**
 * Template Name: Halaman Home
 */

?>
<?php get_header();?>
	<section id="top">
         <div class="container">
            <div class="col-md-6">
               <h1>
                  Selamat datang di
                  <span><img src="<?php echo get_template_directory_uri() ?>/images/logo-btn-small-baru.png"> Virtual Branch</span>
               </h1>
               <!-- Buka rekening -->
               <a href="#" id="buka-tabungan" class="btn btn-yellow"><i class="fa fa-file-text-o"></i> Buka Rekening <i class="fa fa-chevron-right"></i></a>
               <div id="pilihTabungan" >
                  <div class="pilih-tabungan clearfix">
                     <form method="post" action="<?php echo home_url( '/form-registrasi' ) ?>" id="prosestabungan">
                     <?php
                        $btntitan = TitanFramework::getInstance( 'btn' );
                        $jenis_tabungan =  explode( "\r\n", $btntitan->getOption( 'jenis_tabungan' ) );
                     ?>
                     
                     <div class="message"></div>
                     <select name="jenis_tabungan" id="select_produk" class="selectpicker">
                        <option value="" selected disabled>- Silakan Pilih Product -</option>
                        <?php echo btn_get_product(); ?>
                     </select>

                     <div class="hidden" id="div_cif">
                        <div class="message2"></div>
                        <select name="jenis_cif" id="jenis_cif" class="selectpicker">
                           <option value="" selected disabled>- Pilih Jenis CIF -</option>
                           <option value="perorangan" >Perorangan</option>
                           <option value="lembaga" >Lembaga</option>                        
                        </select>
                     </div>

                     <button type="submit" class="btn btn-yellow">Proses</button>
                     </form>
                  </div>
               </div>
               <!-- End Buka Rekening -->

               <!-- Buat ATM SMS -->
               <a href="#" id="buka-atm-sms" class="btn btn-yellow"><i class="fa fa-file-text-o"></i> Buat ATM & SMS Banking <i class="fa fa-chevron-right"></i></a>
               <div id="pilihAtmSms" >
                  <div class="pilih-tabungan clearfix">
                     <form method="post" action="<?php echo home_url( '/atm-sms-banking' ) ?>" id="prosesAtmSms">
                     
                     <div class="message"></div>
                     <select name="jenis_fitur" id="select_fitur" class="selectpicker">
                           <option value="" selected disabled>- Pilih Jenis Fitur -</option>
                           <option value="atm" >Buat Kartu ATM</option>
                           <option value="sms" >Buat SMS Banking</option>
                           <option value="atm-sms" >Kartu ATM & SMS Banking</option>                  
                     </select>

                     <button type="submit" class="btn btn-yellow" >Proses</button>
                     </form>
                  </div>
               </div>
               <!-- End Buat atm sms -->
               <a href="<?php echo home_url( '/pengajuan-kredit' ) ?>" class="btn btn-yellow" style="display:none;"><i class="fa fa-file-text-o"></i> Pengajuan Pinjaman<i class="fa fa-chevron-right"></i></a>
               <a href="<?php echo home_url( '/live-chat' ) ?>" class="btn btn-blue" style="display:none;"><i class="fa fa-comments-o"></i> Live Chat dengan CS <i class="fa fa-chevron-right"></i></a>
            </div>
         </div>
      </section>
      <?php if ( have_posts() ) {
			while ( have_posts() ) {
			the_post();  ?>
			<?php the_content() ?>
	  <?php } } ?>
      <!-- <section id="fitur">
         <div class="container">
            <div class="row">
               <h2>Kelebihan BTN Virtual Branch</h2>
               <div class="col-md-4">
                  <img src="<?php echo get_template_directory_uri() ?>/images/fitur-1.png" />
                  <h3>Chat Langsung dengan CS</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
               </div>
               <div class="col-md-4">
                  <img src="<?php echo get_template_directory_uri() ?>/images/fitur-2.png" />
                  <h3>Hemat Waktu & Biaya</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
               </div>
               <div class="col-md-4">
                  <img src="<?php echo get_template_directory_uri() ?>/images/fitur-3.png" />
                  <h3>Aman & Terpercaya</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
               </div>
            </div>
         </div>
      </section>
      <section id="about">
         <div class="row-fluid clearfix">
            <div class="col-md-6">
               <img src="<?php echo get_template_directory_uri() ?>/images/bg-middle.png" />
            </div>
            <div class="col-md-6">
               <div class="box-about">
                  <h3>BTN Virtual Branch</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
               </div>
            </div>
         </div>
      </section> -->
      <section id="call-action">
         <div class="row-fluid">
            <h2>Nikmatilah setiap kemudahan
               yang kami tawarkan
            </h2>
            <a href="" id="openReg" class="btn btn-yellow"><i class="fa fa-file-text-o"></i> Buka Rekening </a>
            <a href="<?php echo home_url( '/live-chat' ) ?>" class="btn btn-blue" style="display:none;"><i class="fa fa-comments-o"></i> Live Chat dengan CS </a>
         </div>
    </section>
<?php add_action('wp_footer', 'JsforHome'); ?>
<?php get_footer();?>
