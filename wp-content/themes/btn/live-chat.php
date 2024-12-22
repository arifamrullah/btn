
<?php
/**
 * Template Name: Halaman Live Chat
 */
if(!empty($_GET['tutup'])){
  unset($_SESSION['oc_data']);
  header('location:/');
}
?>


<?php get_header();?>
          <div class="modal fade" id="pilih-status" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog" style="max-width:450px">
            <div class="modal-content">
               <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel">Pilih Status</h4>
               </div>
               <div class="modal-body">
                  <div id="forminitloading" style="display:none;text-align:center"><img src="<?php echo get_template_directory_uri() ?>/images/loading1.gif" /></div>
                  <div id="formchatinit">
                    <div class="yellow-check">
                       <div class="radio radio-primary">
                          <input id="yellow_radio" type="radio" name="radio1" value=
                             "1">
                          <label for="yellow_radio">
                          <span>Nasabah</span>
                          </label>
                       </div>
                    </div>                  
                    <div class="yellow-check">
                       <div class="radio radio-primary">
                          <input id="yellow_radio_false" type="radio" name="radio1" value=
                             "2">
                          <label for="yellow_radio_false">
                          <span> Non Nasabah</span>
                          </label>
                       </div>
                    </div>
                    <div id="nasabah-box" style="display:none">
                       <form class="form-horizontal">
                          <div id="err-message"></div>                        
                          <div id="oc-user-form-fields"></div>                        
                          <div class="form-group">
                             <div class="col-sm-offset-2 col-sm-10">
                                <button id="oc-user-session-start" class="btn btn-yellow pull-right">Proses</button>
                             </div>
                          </div>
                       </form>
                    </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
          <section id="pilih-cs">
               <div class="row">
                <div class="col-md-12" >
                  <br /><br />
                   <div class="close-chatt text-center">
                      <a href="?tutup=true" > <span>X</span> Keluar Dari Live chat</a>
                   </div>
                  </div>                
               </div>
               <h2>
                 Pilih Customer Service
               </h2>
               <p>Berikut adalah pertanyaan yang sering diajukan. Jika anda tidak dapat menemukan jawabannya, silahkan kontak kami:</p>
               <p class="no-agent" style="display:none">Maaf Saat ini tidak ada agent yang online</p>
               <?php $ops = get_users(array('role' => 'chamameOperator')); ?>
                <!-- ===== FLOW ===== -->
          <div id="contentFlow" class="ContentFlow">
              <!-- should be place before flow so that contained images will be loaded first -->
              <div class="loadIndicator"><div class="indicator"></div></div>
              <div id="oc-user-list-wrapper">
              <ul id="oc-user-list">
                
              </ul>
            </div>
            
              <div class="flow" id="op_ol">
                  <?php  foreach($ops as $op): ?>                    
                    
                  <div class="item" id="on-oc-user-<?php echo $op->ID ?>" href="javascript:;">
                      <img class="content" src="<?php echo get_cupp_meta($op->ID, array('284','367')) ?>" data-thumb="<?php echo get_cupp_meta($op->ID, array('140','140')) ?>"/>
                      <div class="status">                        
                          <span class="offline"></span> Unavailable                        
                      </div>

                      <div class="caption"><?php echo $op->display_name ?>
                      
                        <a class="btn btn-yellow"><i class="fa fa-comments-o"></i> Not Available</a>
                      
                      </div>
                  </div>
                  <?php endforeach  ?>
                  
              </div>
              <div class="globalCaption"></div>
              <div class="scrollbar">
                <div class="preButton"><i class="fa fa-chevron-left"></i></div>
                <div class="nextButton"><i class="fa fa-chevron-right"></i></div>
                  <div class="slider"><span>Geser untuk melihat daftar agen</span><div class="position"></div></div>
              </div>

          </div>
     </section>
     <section id="chat-cs">
        <div id="oc-chat-input-wrapper">
                                  <div id="oc-offline-user-notice"><?php _e('User is offline and cannot receive messages','online-chat');?></div>
                                  <div id="oc-message-send"><?php _e('Send','online-chat');?></div>
                                </div>
         <div class="container chat-history clearfix">
            <div class="col-md-7">
               <h2>
                  <span class="custname"></span> siap membantu Anda
               </h2>
               <p>Ketik pertanyaan anda dan klik tombol 'Kirim' untuk mengirim pesan</p>
            </div>
            <div class="col-md-5">
               <div class="close-chatt">
                  <a href="?tutup=true" id="tutup-chat" class="pull-right"> <span>X</span> Tutup Chat</a>
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
                              <span class="clname"></span>
                              <button type="submit" id="sendnow" class="btn btn-yellow clearfix">
                              Kirim
                              </button>
                           </div>
                           <div class="col-md-9">
                              <div class="popup">
                                 <textarea id="chattext" placeholder="Ketik pertanyaan anda disini ..."></textarea>
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
                                 Selamat datang di layanan BTN Virtual Branch. Ada yang bisa kami bantu?
                              </div>
                           </div>
                           <div class="col-md-3">
                              <div class="ava-standing">
                                 <img src="<?php echo get_template_directory_uri() ?>/images/default-img.png">
                              </div>
                              <span class="custname"><br/><span class="titlecust">Customer Service</span></span>
                           </div>
                        </form>
                     </div>
                  </li>
               </ul>
            </div>
            <div class="col-md-4">
               <div class="listchatt clearfix">
                  <h3><span>Riwayat</span> Percakapan</h3>
                  <div id="oc-chat-message-list-wrapper">
                  <ul id="oc-message-list">
                  </ul>
                  </div>                  
               </div>
            </div>
         </div>
      </section>
<?php add_action('wp_footer', 'JsforLiveChat'); ?>
<?php get_footer();?>