<?php
/**
 * Template Name: Halaman Chat
 */

?>
<?php get_header();?>
<section id="chat-cs">
         <div class="container chat-history clearfix">
            <div class="col-md-7">
               <h2>
                  <span>Linda Karim</span> siap membantu Anda
               </h2>
               <p>Ketik pertanyaan anda dan klik tombol 'Kirim' untuk mengirim pesan</p>
            </div>
            <div class="col-md-5">
               <div class="close-chatt">
                  <a href="" class="pull-right"> <span>X</span> Tutup Chat</a>
               </div>
            </div>
            <div class="clear"></div>
            <div class="col-md-8">
               <ul>
                  <li>
                     <div class="post">
                        <form class="clearfix">
                           <div class="col-md-3">
                              <div class="ava-box">
                                 <img src="<?php echo get_template_directory_uri() ?>/images/default-img.png">
                              </div>
                              <span>Indah Kalalo<br/>No.Rek. 09879023</span>
                              <button type="submit" class="btn btn-yellow clearfix">
                              Kirim
                              </button>
                           </div>
                           <div class="col-md-9">
                              <div class="popup">
                                 <textarea placeholder="Ketik pertanyaan anda disini ..."></textarea>
                              </div>
                           </div>
                        </form>
                     </div>
                  </li>
                  <li>
                     <div class="cs-box">
                        <form class="clearfix">
                           <div class="col-md-9">
                              <div class="popup">
                                 Selamat datang di layanan bank virtual BTN. Ada yang bisa kami bantu?
                              </div>
                           </div>
                           <div class="col-md-3">
                              <div class="ava-standing">
                                 <img src="<?php echo get_template_directory_uri() ?>/images/ava-2.png">
                              </div>
                              <span>Linda Karim <br/>Customer Service</span>
                           </div>
                        </form>
                     </div>
                  </li>
               </ul>
            </div>
            <div class="col-md-4">
               <div class="listchatt clearfix">
                  <h3><span>Riwayat</span> Percakapan</h3>
                  <ul>
                     <li class="cs">
                        <h4><div class="ava-standing pull-left">
                                 <img src="<?php echo get_template_directory_uri() ?>/images/ava-2.png">
                              </div><span>Linda Karim</span> 11 May 2015 07.30 AM</h4>
                        <p>
                           Selamat datang di layanan bank virtual BTN. Ada yang bisa kami bantu?
                        </p>
                     </li>
                     <li>
                        <h4><div class="ava-box">
                                 <img src="<?php echo get_template_directory_uri() ?>/images/default-img.png">
                              </div><span>Saya</span> 11 May 2015 07.30 AM</h4>
                        <p>
                           Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </p>
                     </li>
                     <li class="cs">
                        <h4><div class="ava-standing pull-left">
                                 <img src="<?php echo get_template_directory_uri() ?>/images/ava-2.png">
                              </div><span>Linda Karim</span> 11 May 2015 07.30 AM</h4>
                        <p>
                           Selamat datang di layanan bank virtual BTN. Ada yang bisa kami bantu?
                        </p>
                     </li>
                     <li>
                        <h4><div class="ava-box">
                                 <img src="<?php echo get_template_directory_uri() ?>/images/default-img.png">
                              </div><span>Saya</span> 11 May 2015 07.30 AM</h4>
                        <p>
                           Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </p>
                     </li>
                     <li class="cs">
                        <h4><div class="ava-standing pull-left">
                                 <img src="<?php echo get_template_directory_uri() ?>/images/ava-2.png">
                              </div><span>Linda Karim</span> 11 May 2015 07.30 AM</h4>
                        <p>
                           Selamat datang di layanan bank virtual BTN. Ada yang bisa kami bantu?
                        </p>
                     </li>
                     <li >
                        <h4><div class="ava-box">
                                 <img src="<?php echo get_template_directory_uri() ?>/images/default-img.png">
                              </div><span>Saya</span> 11 May 2015 07.30 AM</h4>
                        <p>
                           Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </p>
                     </li>
                     <li class="cs">
                        <h4><div class="ava-standing pull-left">
                                 <img src="<?php echo get_template_directory_uri() ?>/images/ava-2.png">
                              </div><span>Linda Karim</span> 11 May 2015 07.30 AM</h4>
                        <p>
                           Selamat datang di layanan bank virtual BTN. Ada yang bisa kami bantu?
                        </p>
                     </li>
                     <li class="cs">
                        <h4><div class="ava-box">
                                 <img src="<?php echo get_template_directory_uri() ?>/images/default-img.png">
                              </div><span>Saya</span> 11 May 2015 07.30 AM</h4>
                        <p>
                           Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </p>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </section>
<?php add_action('wp_footer', 'JsforChat'); ?>
<?php get_footer();?>