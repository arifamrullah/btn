<?php
/**
 * Bootstrap Basic theme
 *
 * @package bootstrap-basic
 */


/**
 * Required WordPress variable.
 */
if (!isset($content_width)) {
	$content_width = 1170;
}

if (!function_exists('bootstrapBasicSetup')) {
	/**
	 * Setup theme and register support wp features.
	 */
	function bootstrapBasicSetup() {
		/**
		 * Make theme available for translation
		 * Translations can be filed in the /languages/ directory
		 *
		 * copy from underscores theme
		 */
		load_theme_textdomain('bootstrap-basic', get_template_directory() . '/languages');

		// add theme support post and comment automatic feed links
		add_theme_support('automatic-feed-links');

		// enable support for post thumbnail or feature image on posts and pages
		add_theme_support('post-thumbnails');

		// add support menu
		register_nav_menus(array(
			'primary' => __('Primary Menu', 'bootstrap-basic'),
		));

		// add post formats support
		add_theme_support('post-formats', array('aside', 'image', 'video', 'quote', 'link'));

		// add support custom background
		add_theme_support(
			'custom-background',
			apply_filters(
				'bootstrap_basic_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => ''
				)
			)
		);

    set_user_setting( 'dfw_width', 1000 );
    add_editor_style( array( get_template_directory_uri() . '/css/bootstrap.min.css', get_template_directory_uri() . '/css/custom.css' ) );

	}// bootstrapBasicSetup
}
add_action('after_setup_theme', 'bootstrapBasicSetup');

if (!function_exists('bootstrapBasicWidgetsInit')) {
	/**
	 * Register widget areas
	 */
	function bootstrapBasicWidgetsInit() {
		register_sidebar(array(
			'name'          => __('Header right', 'bootstrap-basic'),
			'id'            => 'header-right',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h1 class="widget-title">',
			'after_title'   => '</h1>',
		));

		register_sidebar(array(
			'name'          => __('Navigation bar right', 'bootstrap-basic'),
			'id'            => 'navbar-right',
			'before_widget' => '<ul class="navbar-right"><li>',
			'after_widget'  => '</li></ul>',
			'before_title'  => '',
			'after_title'   => '',
		));

		register_sidebar(array(
			'name'          => __('Sidebar left', 'bootstrap-basic'),
			'id'            => 'sidebar-left',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h1 class="widget-title">',
			'after_title'   => '</h1>',
		));

		register_sidebar(array(
			'name'          => __('Sidebar right', 'bootstrap-basic'),
			'id'            => 'sidebar-right',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h1 class="widget-title">',
			'after_title'   => '</h1>',
		));

	}// bootstrapBasicWidgetsInit
}
add_action('widgets_init', 'bootstrapBasicWidgetsInit');


if (!function_exists('bootstrapBasicEnqueueScripts')) {
	/**
	 * Enqueue scripts & styles
	 */
	function bootstrapBasicEnqueueScripts() {
		wp_enqueue_style('bootstrap-style', get_template_directory_uri() . '/css/bootstrap.min.css');
		wp_enqueue_style('bootstrap-select', get_template_directory_uri() . '/css/bootstrap-select.css');
		wp_enqueue_style('bootstrap-date', get_template_directory_uri() . '/css/bootstrap-datetimepicker.min.css');
		wp_enqueue_style('bootstrap-checkbox', get_template_directory_uri() . '/css/awesome-bootstrap-checkbox.css');

		wp_enqueue_style('custom', get_template_directory_uri() . '/css/custom.css');

		wp_enqueue_script('jquery');
		wp_enqueue_script('bootstrap-script', get_template_directory_uri() . '/js/vendor/bootstrap.min.js');
		wp_enqueue_script('select-script', get_template_directory_uri() . '/js/bootstrap-select.js');
		wp_enqueue_script('validate-script', get_template_directory_uri() . '/js/jquery.validate.min.js');
    wp_enqueue_script('validate-tooltip-script', get_template_directory_uri() . '/js/jqvaltool.js');

    wp_enqueue_script('inputmask-script', get_template_directory_uri() . '/js/jquery-inputmask/dist/jquery.inputmask.bundle.js');
    // wp_enqueue_script('jquery-upload', get_template_directory_uri() . '/js/jquery-upload/js/jquery.fileupload.js');
    // wp_enqueue_script('jquery-widget', get_template_directory_uri() . '/js/jquery-upload/js/vendor/jquery.ui.widget.js');
    wp_enqueue_script('jquery-iframe', get_template_directory_uri() . '/js/jquery.iframe-transport.js');
    wp_enqueue_script('autonumeric-script', get_template_directory_uri() . '/js/autoNumeric.js');

		wp_enqueue_script('main-script', get_template_directory_uri() . '/js/main.js', array(), '1.0.0');
		$email_nonce = null;
		wp_localize_script( 'main-script', 'ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ), 'we_value' => $email_nonce ) );

		wp_enqueue_style('bootstrap-basic-style', get_stylesheet_uri());
	}// bootstrapBasicEnqueueScripts
}
add_action('wp_enqueue_scripts', 'bootstrapBasicEnqueueScripts');


if (!function_exists('adminEnqueueScripts')) {
	/**
	 * Enqueue scripts & styles Admin
	 */
	function adminEnqueueScripts() {
    wp_enqueue_style('custom', get_template_directory_uri() . '/css/custom_admin.css');
    wp_enqueue_style('bootstrap-style', get_template_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_style('vb-data_table', get_template_directory_uri() . '/css/data_table.css' );
		wp_enqueue_style('vb-select', get_template_directory_uri() . '/css/bootstrap-select.css');
		wp_enqueue_style('bootstrap-date', get_template_directory_uri() . '/css/bootstrap-datetimepicker.min.css');
		wp_enqueue_style('bootstrap-checkbox', get_template_directory_uri() . '/css/awesome-bootstrap-checkbox.css');
    wp_enqueue_style( 'font-awesome', plugin_dir_theme_url(__FILE__) . '/css/font-awesome.min.css' );
    wp_enqueue_style('bootstrap-basic-style', get_stylesheet_uri());

		wp_enqueue_script('vb-script', get_template_directory_uri() . '/js/vendor/bootstrap.min.js');
		wp_enqueue_script('vb-datetimepicker', get_template_directory_uri() . '/js/bootstrap-datetimepicker.min.js');
		wp_enqueue_script('vb-select-js', get_template_directory_uri() . '/js/bootstrap-select.js');
		wp_enqueue_script('validate-script', get_template_directory_uri() . '/js/jquery.validate.min.js');

		wp_enqueue_script( 'vb-datatables_init', get_template_directory_uri() . '/js/datatables/datatables_init.js');
		wp_enqueue_script( 'vb-dataTables', get_template_directory_uri() . '/js/datatables/jquery.dataTables.js');
		wp_enqueue_script( 'vb-config', get_template_directory_uri() . '/js/datatables/config.js');
		$email_nonce = null;
		wp_localize_script( 'vb-config', 'ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ), 'we_value' => $email_nonce ) );
    wp_enqueue_script('main-script', get_template_directory_uri() . '/js/main.js');
     wp_enqueue_script('validate-tooltip-script', get_template_directory_uri() . '/js/jqvaltool.js');
    wp_enqueue_script('inputmask-script', get_template_directory_uri() . '/js/jquery-inputmask/dist/jquery.inputmask.bundle.js');
    wp_enqueue_script('autonumeric-script', get_template_directory_uri() . '/js/autoNumeric.js');
    wp_enqueue_script('jquery-iframe', get_template_directory_uri() . '/js/jquery.iframe-transport.js');
    // wp_enqueue_script('jquery-upload', get_template_directory_uri() . '/js/jquery-upload/js/main.js');
	}
}
add_action('admin_enqueue_scripts', 'adminEnqueueScripts');

function JsforHome() { ?>
	<script>
      jQuery('#buka-tabungan').click(function(){
         jQuery('#pilihTabungan').toggleClass('open')
      })

      jQuery('#buka-atm-sms').click(function(){
         jQuery('#pilihAtmSms').toggleClass('open')
      })

      jQuery(document).ready(function(jQuery){
   // browser window scroll (in pixels) after which the "back to top" link is shown
   var offset = 300,
      //browser window scroll (in pixels) after which the "back to top" link opacity is reduced
      offset_opacity = 1200,
      //duration of the top scrolling animation (in ms)
      scroll_top_duration = 700,
      //grab the "back to top" link
      $back_to_top = jQuery('.cd-top');

   //hide or show the "back to top" link
   jQuery(window).scroll(function(){
      ( jQuery(this).scrollTop() > offset ) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
      if( jQuery(this).scrollTop() > offset_opacity ) {
         $back_to_top.addClass('cd-fade-out');
      }
   });

   //smooth scroll to top
   $back_to_top.on('click', function(event){
      event.preventDefault();
      jQuery('body,html').animate({
         scrollTop: 0 ,
         }, scroll_top_duration
      );
   });

   jQuery('#prosestabungan').submit(function(){

   	var error = 0;
   	if(jQuery('select[name=jenis_tabungan]').val() == null){
   		var tthis = jQuery(this);
   		jQuery(this).find('.message').html('Silakan Pilih Tipe Tabungan').addClass('error');
   		setTimeout(function(){
   			tthis.find('.message').html('').removeClass('error');
   		},1500)
   		error = 1;
   	}

   	if(jQuery('select[name=jenis_cif]').val() == null){
   		var tthis = jQuery(this);
   		jQuery(this).find('.message2').html('Silakan Pilih Tipe CIF').addClass('error');
   		setTimeout(function(){
   			tthis.find('.message2').html('').removeClass('error');
   		},1500)
   		error = 1;
   	}
	if(error == 1){
   		return false;
   	}	else{
   		return true;
   	}

   })

   //validate atm sms home
   jQuery('#prosesAtmSms').submit(function(){
    var error = 0;
    if(jQuery('select[name=jenis_fitur]').val() == null){
      var tthis = jQuery(this);
      jQuery(this).find('.message').html('Silakan Pilih fitur').addClass('error');
      setTimeout(function(){
        tthis.find('.message').html('').removeClass('error');
      },1500)
      error = 1;
    }

  if(error == 1){
      return false;
    } else{
      return true;
    }

   })

	//Scroll to Pilih tabungan
	jQuery('#openReg').click(function(){
		jQuery('html, body').animate({
	        scrollTop: jQuery("#top").offset().top
	    }, 1000);
    setTimeout(
      function(){
				jQuery('#pilihTabungan').toggleClass('open')
      }, 1000);
    return false;
  });

  //Scroll to Pilih fiture atm sms
  jQuery('#openRegAtmSms').click(function(){
    jQuery('html, body').animate({
          scrollTop: jQuery("#top").offset().top
      }, 1000);
    setTimeout(
      function(){
        jQuery('#pilihAtmSms').toggleClass('open')
      }, 1000);
    return false;
  });

  //js check produk
  jQuery('#select_produk').on('change', function(){
  var selected = jQuery(this).val();
  var cif = true;
    if(selected){
        var data = {
         type: "POST",
         action: 'btn_ajax_get_product_by_id',
         data : {id:selected}
        };

        jQuery.post(ajax_object.ajax_url, data, function(response,data){
        var result = jQuery.parseJSON(response);
          document.getElementById("jenis_cif").value = "";
          cif = false;
          if (result.TYPE == 1) {
            jQuery("#div_cif").addClass("hidden");
            document.getElementById("jenis_cif").value = "perorangan";
          }else if (result.TYPE == 0) {
            jQuery('#div_cif').removeClass("hidden");
          }else if(result.TYPE == 2){
            cif = false;
            document.getElementById("jenis_cif").value = "perorangan";
            jQuery("#div_cif").addClass("hidden");
          }
        });
    }
  });

});

    var hashTagActive = "";
    jQuery(".scroll").click(function (event) {
        if(hashTagActive != this.hash) { //this will prevent if the user click several times the same link to freeze the scroll.
            event.preventDefault();
            //calculate destination place
            var dest = 0;
            if (jQuery(this.hash).offset().top > jQuery(document).height() - jQuery(window).height()) {
                dest = jQuery(document).height() - jQuery(window).height();
            } else {
                dest = jQuery(this.hash).offset().top-95;;
            }
            //go to destination
            jQuery('html,body').animate({
                scrollTop: dest
            }, 500, 'swing');
            hashTagActive = this.hash;
        }
    });
   </script>
	<?php
}
function JsforLiveChat() { ?>
    <script src="<?php echo get_template_directory_uri()?>/js/contentflow_src.js"></script>
    <script type="text/javascript">
      var cf = new ContentFlow('contentFlow', {scrollWheelSpeed:0,circularFlow :true,reflectionColor: "#000000",visibleItems :2,reflectionHeight :0,scaleFactor :1.5,relativeItemPosition :'center',endOpacity :1});
      jQuery(window).load(function(){
      	<?php if(!empty($_SESSION['oc_data']) && !empty($_SESSION['oc_data']['options']['active']) && $_SESSION['oc_data']['options']['active'] > 0): ?>

      		jQuery('#pilih-cs').hide();
	      	jQuery('#chat-cs').show();
	      	jQuery('.cs-box .ava-standing img').attr('src',jQuery('#on-oc-user-<?php echo $_SESSION['oc_data']['options']['active'] ?>').children('.content').data('thumb'));
      	<?php endif ?>
      	jQuery('body').on('click','.btn-online',function(e){
	      	e.preventDefault();
	      	jQuery('#oc-user-'+jQuery(this).data('id')).trigger('click');
	      	jQuery('#pilih-cs').hide();
	      	jQuery('#chat-cs').show();
	      	jQuery('.cs-box .ava-standing img').attr('src',jQuery('#on-oc-user-'+jQuery(this).data('id')).children('.content').data('thumb'));
	      });

      	jQuery('body').on('click','#tutup-chat',function(e){
      		e.preventDefault();
      		jQuery('#oc-chat-container').onlineChat('endChat');
      	})

      	//jQuery('.ContentFlow .flow .item.active img').unbind('click');
      	// jQuery('body').on('click','.ContentFlow .flow .item.active img',function(e){
      	// 	e.preventDefault();
      	// 	$(this).find('.btn-online').trigger('click');
      	// 	alert('tst');
      	// })
      	jQuery('body').on('keyup','#chattext',function(){
      		jQuery('#oc-chat-input').val(jQuery(this).val());
      	});

      	jQuery('body').on('click','#sendnow',function(e){
      		e.preventDefault();
      		jQuery('#oc-message-send').trigger('click');
      		jQuery('#chattext').val('');
      	});

      <?php if(empty($_SESSION['oc_data']['options']['is_visitor'])): ?>

        jQuery('#pilih-status').modal({show: true,keyboard:false,backdrop: 'static'});

      });
       jQuery("input[name=radio1]").click(function () {
      jQuery('.yellow-check').removeClass('active')
        jQuery(this).parent().parent().addClass('active')
      if (jQuery("input[name=radio1]:checked").val() > 0) {
      	jQuery('#oc-user-field-nasabah').val(jQuery("input[name=radio1]:checked").val());
        jQuery("#nasabah-box").slideDown();
      } else {
        jQuery("#nasabah-box").slideUp();
      }

      <?php endif ?>
      });

   </script>
	<?php
}

function JsforChat() { ?>
	<script src="<?php echo get_template_directory_uri()?>/js/contentflow.js"></script>
   <script src="<?php echo get_template_directory_uri()?>/js/enscroll-0.6.0.min.js"></script>
   <script type="text/javascript">
      var cf = new ContentFlow('contentFlow', {circularFlow :true,reflectionColor: "#000000",visibleItems :2,reflectionHeight :0,scaleFactor :1.5,relativeItemPosition :'center',endOpacity :1});

      jQuery('.listchatt ul').enscroll({
        showOnHover: false,
        verticalTrackClass: 'track3',
        verticalHandleClass: 'handle3'
      });
   </script>
<?php
}

function JsforForm() { ?>
		<script type="text/javascript" src="<?php echo get_template_directory_uri()?>/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri()?>/js/bootstrap-select.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri()?>/js/jquery.masked-input.min.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri()?>/js/jquery.cycle.all.js"></script>
    <script type="text/javascript" src="http://thrilleratplay.github.io/jquery-validation-bootstrap-tooltip/js/jquery-validate.bootstrap-tooltip.js"></script>

    <script>

    var base_url = "<?php echo get_template_directory_uri()?>";
    var base_temp = "<?php echo get_template_directory()?>";

    jQuery("body").on("click", "#refreshimg", function(){
			var data = {
					type: "POST",
					action: 'btn_ajax_uncaptcha'
				};
				jQuery.post(ajax_object.ajax_url, data, function(response){
					var div = document.getElementById('refreshimg');
					div.innerHTML="";
					div.innerHTML = div.innerHTML + response;
					jQuery(this).append(response);
				});
      return false;
    });

    jQuery('#buka-tabungan').click(function(){
        	 $('#pilihTabungan').toggleClass('open')
        })

		jQuery('a.btn-cif').click(function() {
    	var target = jQuery(this).attr('target');
    	jQuery(target).removeClass('hidden');
    	return false;
    })

    jQuery("#site").cycle({
      fx : "scrollHorz",
      // next : "a.next",
      // prev : "a.prev",
      // cssBefore:null,
      startingSlide : 0,
      after:      function() {
        jQuery("body").scrollTop(0);
      },
      timeout : 0
    });

//================= JS Pengajuan Kredit
    jQuery(document).ready(function(){
      jQuery('#status_rumah').change(function(){
        if (jQuery(this).val() == "Dijaminkan"){
          jQuery("#dijaminkan_rumah").show();
        }else{
          jQuery("#dijaminkan_rumah").hide();
        }
      });
      jQuery("#dijaminkan_rumah").hide();
    });

    jQuery(document).ready(function(){
      jQuery('#badan_usaha').change(function(){
        if (jQuery(this).val() == "lainnya"){
          jQuery("#badan_usaha_lainnya").show();
        }else{
          jQuery("#badan_usaha_lainnya").hide();
        }
      });
      jQuery("#badan_usaha_lainnya").hide();
    });

    jQuery(document).ready(function(){
      jQuery('#hubungan_pemohon').change(function(){
        if (jQuery(this).val() == "lainnya"){
          jQuery("#hubungan_pemohon_lainnya").show();
        }else{
          jQuery("#hubungan_pemohon_lainnya").hide();
        }
      });
      jQuery("#hubungan_pemohon_lainnya").hide();
    });

    jQuery('input[name="nama_pasangan"]').blur(function(){
      var value = jQuery(this).val();
      var firstChar = String(value).charAt(0);
        var AllowRegexFirst  = /^[a-zA-Z]$/;
          // if (value.length == 0 && (e.keyCode == 188 || e.keyCode == 8 || e.keyCode == 46 || e.keyCode == 32))
          if (value.length !=0 && !AllowRegexFirst.test(firstChar)) {
            alert('Maaf digit pertama hanya boleh diisi huruf');
            jQuery('input[name="nama_pasangan"]').val('');
            jQuery('input[name="nama_pasangan"]').focus();
            return false;
          }

          // cannot have double space
          if (value[value.length - 1] == ' ' && e.keyCode == 32) {
            return false;
          }

          // chars must alphabet
          var AllowRegex  = /^[a-zA-Z\]$/; // or /^[A-Za-z\s]+$/ // /^[a-zA-Z]+$/;
          if (value.length != 0 && !AllowRegex.test(value)) {
            var valRes = value.replace(String(value).charAt(value.length-1),'');
            jQuery('input[name="nama_pasangan"]').val(valRes);
            jQuery('input[name="nama_pasangan"]').focus();
            alert('Maaf nama hanya boleh diisi huruf');
            return false;
          }

          return true;
    });
    //text only
    function namePasangan(e, value){

        var code;
        if (!e) var e = window.event;
        if (e.keyCode) code = e.keyCode;
        else if (e.which) code = e.which;
        var firstChar = String(value).charAt(0);
        var AllowRegexFirst  = /^[a-zA-Z]$/;
          // if (value.length == 0 && (e.keyCode == 188 || e.keyCode == 8 || e.keyCode == 46 || e.keyCode == 32))
          if (value.length !=0 && !AllowRegexFirst.test(firstChar)) {
            alert('Maaf digit pertama hanya boleh diisi huruf');
            jQuery('input[name="nama_pasangan"]').val('');
            return false;
          }

          // cannot have double space
          if (value[value.length - 1] == ' ' && e.keyCode == 32) {
            return false;
          }

          // chars must alphabet
          var AllowRegex  = /^[a-zA-Z\]$/; // or /^[A-Za-z\s]+$/ // /^[a-zA-Z]+$/;
          if (value.length != 0 && !AllowRegex.test(value)) {
            alert('Maaf nama hanya boleh diisi huruf');
            var valRes = value.replace(String(value).charAt(value.length-1),'');
            jQuery('input[name="nama_pasangan"]').val(valRes);
            return false;
          }

          return true;
    }

//================== JS Pengajuan Buka Rekening
    jQuery(document).ready(function(){
      var h = jQuery('#site').height()+30;
      jQuery('#site').css('height', h + 'px');
	  });
     //alamat sesuai ktp
    jQuery(document).ready(function($) {
      jQuery('#alamat_sesuai_dengan_identitas').change(function() {
        if (jQuery('#alamat_sesuai_dengan_identitas').is(":checked")) {
          if ((jQuery('input[name="alamat_pribadi"]').length > 0) || (jQuery('input[name="alamat"]').length > 0)) {
            jQuery('input[name="alamat_saat_ini"]').val(jQuery('input[name="alamat_pribadi"]').val());
            jQuery('input[name="alamat_saat_ini"]').val(jQuery('input[name="alamat"]').val());
          }
          if ((jQuery('input[name="rt_pribadi"]').length > 0) || (jQuery('input[name="rt"]').length > 0)) {
            jQuery('input[name="rt_saat_ini"]').val(jQuery('input[name="rt_pribadi"]').val());
            jQuery('input[name="rt_saat_ini"]').val(jQuery('input[name="rt"]').val());
          }
          if ((jQuery('input[name="rw_pribadi"]').length > 0) || (jQuery('input[name="rw"]').length > 0)) {
            jQuery('input[name="rw_saat_ini"]').val(jQuery('input[name="rw_pribadi"]').val());
            jQuery('input[name="rw_saat_ini"]').val(jQuery('input[name="rw"]').val());
          }
          if ((jQuery('input[name="kelurahan_pribadi"]').length > 0) || (jQuery('input[name="kelurahan"]').length > 0)) {
            jQuery('input[name="kelurahan_saat_ini"]').val(jQuery('input[name="kelurahan_pribadi"]').val());
            jQuery('input[name="kelurahan_saat_ini"]').val(jQuery('input[name="kelurahan"]').val());
          }
          if ((jQuery('input[name="kecamatan_pribadi"]').length > 0) || (jQuery('input[name="kecamatan"]').length > 0)) {
            jQuery('input[name="kecamatan_saat_ini"]').val(jQuery('input[name="kecamatan_pribadi"]').val());
            jQuery('input[name="kecamatan_saat_ini"]').val(jQuery('input[name="kecamatan"]').val());
          }
          if ((jQuery('input[name="kota_pribadi"]').length > 0) || (jQuery('input[name="kota"]').length > 0)) {
            jQuery('input[name="kota_saat_ini"]').val(jQuery('input[name="kota_pribadi"]').val());
            jQuery('input[name="kota_saat_ini"]').val(jQuery('input[name="kota"]').val());
          }
          if ((jQuery('input[name="kodepos_pribadi"]').length > 0) || (jQuery('input[name="kode_pos"]').length > 0)) {
            jQuery('input[name="kodepos_saat_ini"]').val(jQuery('input[name="kodepos_pribadi"]').val());
            jQuery('input[name="kodepos_saat_ini"]').val(jQuery('input[name="kode_pos"]').val());
          }
          if ((jQuery('input[name="propinsi_pribadi"]').length > 0) || (jQuery('input[name="propinsi"]').length > 0)) {
            jQuery('input[name="propinsi_saat_ini"]').val(jQuery('input[name="propinsi_pribadi"]').val());
            jQuery('input[name="propinsi_saat_ini"]').val(jQuery('input[name="propinsi"]').val());
          }
          if (jQuery('#status_alamat').length > 0) {
            jQuery('#status_alamat_saat_ini').val(jQuery('#status_alamat').val());
          }
        } else {
          jQuery('input[name="alamat_saat_ini"]').val('');
          jQuery('input[name="rt_saat_ini"]').val('');
          jQuery('input[name="rw_saat_ini"]').val('');
          jQuery('input[name="kelurahan_saat_ini"]').val('');
          jQuery('input[name="kecamatan_saat_ini"]').val('');
          jQuery('input[name="kota_saat_ini"]').val('');
          jQuery('input[name="kodepos_saat_ini"]').val('');
          jQuery('input[name="propinsi_saat_ini"]').val('');
          jQuery('#status_alamat_saat_ini').val('');
        }
      });
    });

    //alamat sesuai ktp form pengajuan kredit
    jQuery(document).ready(function($){
      jQuery("#alamat_sesuai_dengan_ktp").change(function(){
        if (jQuery("#alamat_sesuai_dengan_ktp").is(':checked')){
          jQuery("#alamat_dif_ktp").val(jQuery("#alamat").val());
          jQuery("#blok_dif_ktp").val(jQuery("#blok_alamat").val());
          jQuery("#no_dif_ktp").val(jQuery("#no_alamat").val());
          jQuery("#rt_dif_ktp").val(jQuery("#rt").val());
          jQuery("#rw_dif_ktp").val(jQuery("#rw").val());
          jQuery("#kelurahan_dif_ktp").val(jQuery("#kelurahan").val());
          jQuery("#kecamatan_dif_ktp").val(jQuery("#kecamatan").val());
          jQuery("#dati_dif_ktp").val(jQuery("#dati").val());
          jQuery("#propinsi_dif_ktp").val(jQuery("#propinsi").val());
          jQuery("#kode_pos_dif_ktp").val(jQuery("#kode_pos").val());
        }else{
          jQuery("#alamat_dif_ktp").val('');
          jQuery("#blok_dif_ktp").val('');
          jQuery("#no_dif_ktp").val('');
          jQuery("#rt_dif_ktp").val('');
          jQuery("#rw_dif_ktp").val('');
          jQuery("#_dif_ktp").val('');
          jQuery("#kelurahan_dif_ktp").val('');
          jQuery("#kecamatan_dif_ktp").val('');
          jQuery("#dati_dif_ktp").val('');
          jQuery("#propinsi_dif_ktp").val('');
          jQuery("#kode_pos_dif_ktp").val('');
        }
      });
    });

    //alamat pasangan sesuai pemohon form pengajuan kredit
    jQuery(document).ready(function($){
      jQuery("#alamat_sesuai_dengan_pemohon").change(function(){
        if (jQuery("#alamat_sesuai_dengan_pemohon").is(':checked')){
          jQuery("#alamat_pasangan").val(jQuery("#alamat").val());
          jQuery("#blok_pasangan").val(jQuery("#blok_alamat").val());
          jQuery("#no_alamat_pasangan").val(jQuery("#no_alamat").val());
          jQuery("#rt_pasangan").val(jQuery("#rt").val());
          jQuery("#rw_pasangan").val(jQuery("#rw").val());
          jQuery("#kelurahan_pasangan").val(jQuery("#kelurahan").val());
          jQuery("#kecamatan_pasangan").val(jQuery("#kecamatan").val());
          jQuery("#dati_pasangan").val(jQuery("#dati").val());
          jQuery("#propinsi_pasangan").val(jQuery("#propinsi").val());
          jQuery("#kode_pos_pasangan").val(jQuery("#kode_pos").val());
        }else{
          jQuery("#alamat_pasangan").val('');
          jQuery("#blok_pasangan").val('');
          jQuery("#no_alamat_pasangan").val('');
          jQuery("#rt_pasangan").val('');
          jQuery("#rw_pasangan").val('');
          jQuery("#kelurahan_pasangan").val('');
          jQuery("#kecamatan_pasangan").val('');
          jQuery("#dati_pasangan").val('');
          jQuery("#propinsi_pasangan").val('');
          jQuery("#kode_pos_pasangan").val('');
        }
      });
    });
    
     //JS for show hide input field kewarganegaraan
    jQuery(document).ready(function(){
    	jQuery('#select_warganegera').change(function(){
    		if (jQuery(this).val() == "wna"){
    			jQuery("#negara_asal").show();
    		}else{
    			jQuery("#negara_asal").hide();
    		}
    	});
    	jQuery("#negara_asal").hide();
    });

    //validate for captcha start here
      jQuery("#registrasiAtmSms").validate({
      onkeyup : function(element){this.element(element);},
      rules: {
        captcha: {
          remote :
              {
                url: ajax_object.ajax_url,
                type: "post",
                data : {
                   code : function(response) {
                        return response;
                    },
                    action : 'btn_ajax_captcha'
                }
              }
        }
      }

    });

    jQuery("#formLoanRegistration").validate({
        onkeyup : function(element){this.element(element);},
      rules: {
        captcha: {
          remote :
              {
                url: ajax_object.ajax_url,
                type: "post",
                data : {
                   code : function(response) {
                        return response;
                    },
                    action : 'btn_ajax_captcha'
                }
              }
        }
      }

    });     
    
    jQuery("#formRegistrasiSimpanan").validate({
        onkeyup : function(element){this.element(element);},
      rules: {
        captcha: {
          remote :
              {
                url: ajax_object.ajax_url,
                type: "post",
                data : {
                   code : function(response) {
                        return response;
                    },
                    action : 'btn_ajax_captcha'
                }
              }
        }
      }

    });
    //end here

    //validate captcha when refresh image start here
    // jQuery('#refreshimg').click(function(){
    //   jQuery("#registrasiAtmSms").validate({
    //   rules: {
    //     captcha: {
    //       remote :
    //           {
    //             url: ajax_object.ajax_url,
    //             type: "post",
    //             data : {
    //                code : function(response) {
    //                     return response;
    //                 },
    //                 action : 'btn_ajax_captcha'
    //             }
    //           }
    //     }
    //   }

    // }).form();
    // });

    // jQuery("#refreshimg").click(function(){
    //   jQuery("#formRegistrasiSimpanan").validate({
    //   rules: {
    //     captcha: {
    //       remote :
    //           {
    //             url: ajax_object.ajax_url,
    //             type: "post",
    //             data : {
    //                code : function(response) {
    //                     return response;
    //                 },
    //                 action : 'btn_ajax_captcha'
    //             }
    //           }
    //     }
    //   }

    // }).form();
    // });

    // jQuery("#refreshimg").click(function(){
    //   jQuery("#formLoanRegistration").validate({
    //   rules: {
    //     captcha: {
    //       remote :
    //           {
    //             url: ajax_object.ajax_url,
    //             type: "post",
    //             data : {
    //                code : function(response) {
    //                     return response;
    //                 },
    //                 action : 'btn_ajax_captcha'
    //             }
    //           }
    //     }
    //   }

    // }).form();
    // });
    // end here

    //JS for show hide form data pernikahan
    jQuery(document).ready(function($){
      jQuery("#status_nikah").change(function(){
        if (jQuery("#status_nikah").val() == "Menikah"){
          jQuery(".data_pasangan").show()
          document.getElementById("badan_usaha_perusahaan_pasangan").classList.add("required");
          document.getElementById("jenis_pekerjaan_pasangan").classList.add("required");
        }else{
          jQuery(".data_pasangan").hide()
          document.getElementById("badan_usaha_perusahaan_pasangan").classList.remove("required")
          document.getElementById("jenis_pekerjaan_pasangan").classList.remove("required")
        }
      });
      jQuery(".data_pasangan").hide()
      jQuery("#badan_usaha_perusahaan_pasangan").removeClass('required');
      jQuery("#jenis_pekerjaan_pasangan").removeClass('required');
      // document.getElementById("badan_usaha_perusahaan_pasangan").classList.remove("required")
      //   document.getElementById("jenis_pekerjaan_pasangan").classList.remove("required")
    });

    //mask npwp
    jQuery(document).ready(function(){
      jQuery('.npwp').inputmask({"mask": "99.999.999.9-999.999"});
    });

    //mask phone
    jQuery(document).ready(function(){
      jQuery('.phone').inputmask("mask", {"mask": "(999) 999-9999"});
    });

    jQuery(document).ready(function(){
      jQuery('.input_tanggal').inputmask("mask", {"mask": "99/99/9999"});
    });

    //JS for show hide input field agama
    jQuery(document).ready(function(){
    	jQuery('#select_agama').change(function(){
    		if (jQuery(this).val() == "lainnya"){
    			jQuery("#agama_lainnya").show();
    		}else{
    			jQuery("#agama_lainnya").hide();
    		}
    	});
    	jQuery("#agama_lainnya").hide();
    });

    //JS for show hide input field pekerjaan
    jQuery(document).ready(function(){
    	jQuery('#jenis_pekerjaan').change(function(){
    		if (jQuery(this).val() == "lainnya"){
    			jQuery("#jenis_pekerjaan_lainnya").show();
    		}else{
    			jQuery("#jenis_pekerjaan_lainnya").hide();
    		}
    	});
    	jQuery("#jenis_pekerjaan_lainnya").show();
    });

    //JS for show hide input field bidang usaha lainnya
    jQuery(document).ready(function(){
      jQuery('#bidang_usaha').change(function(){
        if (jQuery(this).val() == "lainnya"){
          jQuery("#bidang_usaha_lainnya").show();
        }else{
          jQuery("#bidang_usaha_lainnya").hide();
        }
      });
      jQuery("#bidang_usaha_lainnya").hide();
    });

     //JS for show hide input field penghasilan laiinya
     jQuery(document).ready(function(){
    	jQuery('#select_penghasilan').change(function(){
    		if (jQuery(this).val() == "lainnya"){
    			jQuery("#penghasilan_lainnya").show();
    		}else{
    			jQuery("#penghasilan_lainnya").hide();
    		}
    	});
    	jQuery("#penghasilan_lainnya").show();
    });

     //JS for show hide input field hasil tambahan lainnya
     jQuery(document).ready(function(){
    	jQuery('#select_hasil_tambahan').change(function(){
    		if (jQuery(this).val() == "lainnya"){
    			jQuery("#hasil_tambahan_lainnya").show();
    		}else{
    			jQuery("#hasil_tambahan_lainnya").hide();
    		}
    	});
    	jQuery("#hasil_tambahan_lainnya").hide();
    });

    //JS for show hide input field sumber dana
    jQuery(document).ready(function() {
    	jQuery('#sumber_dana').change(function(){
    		if (jQuery(this).val() == "lainnya") {
    			jQuery("#sumber_dana_lainnya").show();
    		} else {
    			jQuery("#sumber_dana_lainnya").hide();
    		}
    	});
    	jQuery("#sumber_dana_lainnya").hide();
    });

    //JS for show hide input field sumber dana tambahan
    jQuery(document).ready(function(){
    	jQuery('#sumber_dana_tambahan').change(function(){
    		if (jQuery(this).val() == "lainnya"){
    			jQuery("#sumber_dana_tambahan_lainnya").show();
    		}else{
    			jQuery("#sumber_dana_tambahan_lainnya").hide();
    		}
    	});
    	jQuery("#sumber_dana_tambahan_lainnya").hide();
    });

     //JS for show hide input field jenis setoran
    jQuery(document).ready(function(){
    	jQuery('#jenis_setoran').change(function(){
    		if (jQuery(this).val() == "lainnya"){
    			jQuery("#jenis_setoran_lainnya").show();
    		}else{
    			jQuery("#jenis_setoran_lainnya").hide();
    		}
    	});
    	jQuery("#jenis_setoran_lainnya").hide();
    });

     //JS for show hide input field tujuan buka rekening
    jQuery(document).ready(function(){
    	jQuery('#tujuan_buka_rek').change(function(){
    		if (jQuery(this).val() == "lainnya"){
    			jQuery("#tujuan_buka_rek_lainnya").show();
    		}else{
    			jQuery("#tujuan_buka_rek_lainnya").hide();
    		}
    	});
    	jQuery("#tujuan_buka_rek_lainnya").hide();
    });

    //JS for show hide input field cara bayar
    jQuery(document).ready(function(){
    	jQuery('#cara_bayar').change(function(){
    		if (jQuery(this).val() == "pemindahbukuan"){
    			jQuery("#rek_pindah").show();
    		}else{
    			jQuery("#rek_pindah").hide();
    		}
    	});
    	jQuery("#rek_pindah").hide();
    });

    //JS for show hide input field cara bayar
    jQuery(document).ready(function(){
    	jQuery('#select_penggantian_kartu').change(function(){
    		if (jQuery(this).val() == "lainnya"){
    			jQuery("#penggantian_kartu_lainnya").show();
    		}else{
    			jQuery("#penggantian_kartu_lainnya").hide();
    		}
    	});
    	jQuery("#penggantian_kartu_lainnya").hide();
    });

    //tanda pengenal tambahan add class npwp
    jQuery(document).ready(function(e) {
      jQuery('#tanda_pengenal_tambahan').change(function() {
        if (jQuery(this).val() == "NPWP") {
          jQuery('#no_tanda_pengenal_tambahan').addClass('npwp');
          jQuery('.npwp').inputmask({"mask": "99.999.999.9-999.999"});
        } else {
          jQuery('#no_tanda_pengenal_tambahan').removeClass('npwp');
          jQuery('#no_tanda_pengenal_tambahan').inputmask('remove');
        }
      });
      jQuery('#no_tanda_pengenal_tambahan').addClass('npwp');
      jQuery('.npwp').inputmask({"mask": "99.999.999.9-999.999"});
    });

    //tanda pengenal tambahan npwp input name
    jQuery(document).ready(function(e) {
      jQuery('#id_pengenal_tambahan').change(function() {
        if (jQuery(this).val() == "NPWP") {
          jQuery('#nomor_npwp, #diterbitkan_npwp').show();
          jQuery('#no_pengenal_tambahan, #diterbitkan_pengenal_tambahan').hide();
          jQuery('#nomor_npwp').inputmask({"mask": "99.999.999.9-999.999"});
        } else {
          jQuery('#nomor_npwp, #diterbitkan_npwp').hide();
          jQuery('#no_pengenal_tambahan, #diterbitkan_pengenal_tambahan').show();
        }
      });
      jQuery('#nomor_npwp, #diterbitkan_npwp').show();
      jQuery('#no_pengenal_tambahan, #diterbitkan_pengenal_tambahan').hide();
      jQuery('#nomor_npwp').inputmask({"mask": "99.999.999.9-999.999"});
    });

     //JS for show hide input field alasan membuka rekening
    jQuery(document).ready(function(){
    	jQuery('#alasan_membuka_rekening_btn').change(function(){
    		if (jQuery(this).val() == "lainnya"){
    			jQuery("#alasan_membuka_rekening_lainnya").show();
    		}else{
    			jQuery("#alasan_membuka_rekening_lainnya").hide();
    		}
    	});
    	jQuery("#alasan_membuka_rekening_lainnya").hide();
    });

     //JS for show hide input field jangka waktu
    jQuery(document).ready(function(){
    	jQuery('#jangka_waktu').change(function(){
    		if (jQuery(this).val() == "hari"){
    			jQuery("#jangka_waktu_hari").show();
    		}else{
    			jQuery("#jangka_waktu_hari").hide();
    		}
    	});
    	jQuery("#jangka_waktu_hari").hide();
    });

    //addd more and remove field row sertififkat deposito
    jQuery(document).ready(function() {
      var max_fields      = 5; //maximum input boxes allowed
      var wrapper         = jQuery(".input_fields_wrap"); //Fields wrapper
      var add_button      = jQuery(".add_field_button"); //Add button ID

      var x = 1; //initlal text box count
      jQuery(add_button).click(function(e){ //on add input button click
          e.preventDefault();
          if(x < max_fields){ //max input box allowed
              x++; //text box increment
              jQuery(wrapper).append('<tr><td><input type="text" maxlength="255" name="denominal[]"  value="" class="form-control required"></td><td><input type="text" maxlength="255" name="lembar[]" value="" class="form-control required"></td><td><a href="#" class="remove_field btn btn-warning">Remove</a></td></tr>'); //add input box
          }
      });

      jQuery(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault();
         jQuery(this).closest("tr").remove();
         x--;
      })
    });

    //add remove row pengurus lembaga
    jQuery(document).ready(function() {
      var max_fields      = 5; //maximum input boxes allowed
      var wrapper         = jQuery(".add_row_pengurus"); //Fields wrapper
      var add_button      = jQuery(".add_button_pengurus"); //Add button ID

      var x = 1; //initlal text box count
      jQuery(add_button).click(function(e){ //on add input button click
          e.preventDefault();
          if(x < max_fields){ //max input box allowed
              var h= jQuery('#site').height()+240;
              jQuery('#site').css('height', h + 'px');
              x++; //text box increment
              var html = '<tr>'
                          +'<td>'
                            +'<div class="row">'
                              +'<label  class="col-md-3">'
                                +'Nama'
                              +'</label>'
                              +'<div class="col-md-6">'
                                +'<input type="text" name="nama_pengurus_1[]" size="15" maxlength="255"  value="" class="formField required">'
                              +'</div>'
                            +'</div></br>'
                            +'<div class="row">'
                              +'<label  class="col-md-3">'
                                +'Alamat'
                              +'</label>'
                              +'<div class="col-md-9">'
                                +'<input type="text" size="15" name="alamat_pengurus_1[]" maxlength="255"  value="" class="formField required">'
                              +'</div>'
                            +'</div>'
                          +'</td>'
                          +'<td><input type="text" size="15" maxlength="255" name="jabatan_pengurus_1[]" value="" class="formField required"></td>'
                          +'<td>'
                            +'<div class="row">'
                              +'<label  class="col-md-4">'
                                +'No NPWP Pribadi'
                              +'</label>'
                              +'<div class="col-md-8">'
                                +'<input type="text" maxlength="255" size="15" name="npwp_pribadi_1[]" value="" class="formField required number_only npwp">'
                              +'</div>'
                            +'</div>'
                            +'<div class="row">'
                              +'<label  class="col-md-4">'
                                +'No KTP'
                              +'</label>'
                              +'<div class="col-md-8">'
                                +'<input type="text" maxlength="255" size="15" name="ktp_pribadi_1[]" value="" class="formField required number_only">'
                              +'</div>'
                            +'</div></br>'
                            +'<div class="row">'
                              +'<label  class="col-md-4">'
                                +'Dikeluarkan Di kota'
                              +'</label>'
                              +'<div class="col-md-8">'
                                +'<input type="text" maxlength="255" name="dikeluarkan_ktp_1[]" size="15" value="" class="formField required">'
                              +'</div>'
                            +'</div>'
                            +'<div class="row">'
                              +'<label  class="col-md-4">'
                                +'Tanggal Kadaluwarsa'
                              +'</label>'
                              +'<div class="col-md-8">'
                                +'<div id="datetimepicker" class="input-append date datetimepicker">'
                                  +'<input name="ktp_kadaluwarsa_1[]" size="10" data-format="dd/MM/yyyy" type="text" class="required"></input>'
                                  +'<span class="add-on"><i class="fa fa-calendar"></i></span>'
                                +'</div>'
                              +'</div>'
                            +'</div>'
                          +'</td>'
                          +'<td>'
                              +'<div class="row">'
                                +'<label  class="col-md-3">'
                                  +'Rumah'
                                +'</label>'
                                +'<div class="col-md-9">'
                                  +'<input type="text" maxlength="255" name="tlp_rumah_1[]" size="15" value="" class="formField required number_only">'
                                +'</div>'
                              +'</div><br/>'
                              +'<div class="row">'
                                +'<label  class="col-md-3">'
                                  +'HP'
                                +'</label>'
                                +'<div class="col-md-9">'
                                  +'<input type="text" maxlength="255" name="no_hp_1[]" size="15" value="" class="formField required number_only">'
                                +'</div>'
                              +'</div>'
                          +'</td>'
                          +'<td><a href="#" class="remove_field_pengurus btn btn-warning">Remove</a></td>'
                        +'</tr>';
              jQuery(wrapper).append(html);
          }
          jQuery('.npwp').inputmask({"mask": "99.999.999.9-999.999"});
      });

      jQuery(wrapper).on("click",".remove_field_pengurus", function(e){ //user click on remove text
        e.preventDefault();
         jQuery(this).closest("tr").remove();
         x--;
          var h= jQuery('#site').height()-240;
          jQuery('#site').css('height', h + 'px');
      })
    });

    //addd more and remove field row group usaha
    jQuery(document).ready(function() {
      var max_fields      = 5; //maximum input boxes allowed
      var wrapper         = jQuery(".add_row_group"); //Fields wrapper
      var add_button      = jQuery(".add_button_group"); //Add button ID

      var x = 1; //initlal text box count
      jQuery(add_button).click(function(e){ //on add input button click
          e.preventDefault();
          if(x < max_fields){ //max input box allowed
            var h= jQuery('#site').height()+35;
            jQuery('#site').css('height', h + 'px');
              x++; //text box increment
              if(jQuery('#chkGrpUsaha').is(':checked')) {
              jQuery(wrapper).append('<tr>'
                    +'<td>'
                      +'<div class="row">'
                        +'<div class="col-md-9">'
                          +'<input type="text" size="15" name="nama_lembaga_group1[]" maxlength="255"  value="" class="formField reqGrpUsaha required">'
                        +'</div>'
                      +'</div>'
                    +'</td>'
                    +'<td>'
                      +'<div class="row">'
                        +'<div class="col-md-9">'
                          +'<input type="text" size="20" name="alamat_lembaga_group1[]" maxlength="255"  value="" class="formField reqGrpUsaha required">'
                        +'</div>'
                      +'</div>'
                    +'</td>'
                    +'<td>'
                      +'<div class="row">'
                        +'<div class="col-md-9">'
                          +'<input type="text" size="15" name="bidang_usaha_group1[]" maxlength="255"  value="" class="formField reqGrpUsaha required">'
                        +'</div>'
                      +'</div>'
                    +'</td>'
                    +'<td>'
                      +'<div class="row">'
                        +'<div class="col-md-9">'
                          +'<input type="text" size="15" maxlength="255" name="no_telepon_group1[]" value="" class="formField reqGrpUsaha required number_only">'
                        +'</div>'
                      +'</div>'
                    +'</td>'
                    +'<td>'
                      +'<div class="row">'
                        +'<div class="col-md-9">'
                          +'<input type="text" size="15" name="no_npwp_group1[]" maxlength="255"  value="" class="formField reqGrpUsaha required number_only npwp">'
                        +'</div>'
                      +'</div>'
                    +'</td>'
                    +'<td><small><a href="#" class="remove_field_group btn btn-warning">Remove</a></small></td>'
                +'</tr>'
              ); //add input box
            } else {
              jQuery(wrapper).append('<tr>'
                    +'<td>'
                      +'<div class="row">'
                        +'<div class="col-md-9">'
                          +'<input type="text" size="15" name="nama_lembaga_group1[]" maxlength="255"  value="" class="formField reqGrpUsaha">'
                        +'</div>'
                      +'</div>'
                    +'</td>'
                    +'<td>'
                      +'<div class="row">'
                        +'<div class="col-md-9">'
                          +'<input type="text" size="20" name="alamat_lembaga_group1[]" maxlength="255"  value="" class="formField reqGrpUsaha">'
                        +'</div>'
                      +'</div>'
                    +'</td>'
                    +'<td>'
                      +'<div class="row">'
                        +'<div class="col-md-9">'
                          +'<input type="text" size="15" name="bidang_usaha_group1[]" maxlength="255"  value="" class="formField reqGrpUsaha">'
                        +'</div>'
                      +'</div>'
                    +'</td>'
                    +'<td>'
                      +'<div class="row">'
                        +'<div class="col-md-9">'
                          +'<input type="text" size="15" maxlength="255" name="no_telepon_group1[]" value="" class="formField reqGrpUsaha number_only">'
                        +'</div>'
                      +'</div>'
                    +'</td>'
                    +'<td>'
                      +'<div class="row">'
                        +'<div class="col-md-9">'
                          +'<input type="text" size="15" name="no_npwp_group1[]" maxlength="255"  value="" class="formField reqGrpUsaha number_only npwp">'
                        +'</div>'
                      +'</div>'
                    +'</td>'
                    +'<td><small><a href="#" class="remove_field_group btn btn-warning">Remove</a></small></td>'
                +'</tr>'
              ); //add input box
            }
          }
          jQuery('.npwp').inputmask({"mask": "99.999.999.9-999.999"});
      });

      jQuery(wrapper).on("click",".remove_field_group", function(e){ //user click on remove text
        e.preventDefault();
         jQuery(this).closest("tr").remove();
         x--;
         var h= jQuery('#site').height()-30;
         jQuery('#site').css('height', h + 'px');
      })
    });

    //addd more and remove field row update data rekening
    jQuery(document).ready(function() {
      var max_fields      = 5; //maximum input boxes allowed
      var wrapper         = jQuery(".add_row_update_rek"); //Fields wrapper
      var add_button      = jQuery(".add_button_update_rek"); //Add button ID

      var x = 1; //initlal text box count
      jQuery(add_button).click(function(e){ //on add input button click
          e.preventDefault();
          if(x < max_fields){ //max input box allowed
              x++; //text box increment
              jQuery(wrapper).append('<tr>'
                  +'<td>'
                    +'<div class="select-style">'
                      +'<select name="status_tabungan[]">'
                        +'<option value="">--Pilih--</option>'
                        +'<option value="hapus">Hapus</option>'
                        +'<option value="tambah">Tambah</option>'
                      +'</select>'
                    +'</div>'
                  +'</td>'
                  +'<td>'
                    +'<input type="text" maxlength="255" name="no_rek_tabungan[]"  value="" class="formField number_only" > </br>'
                  +'</td>'
                  +'<td>'
                    +'<div class="select-style">'
                      +'<select name="status_giro[]">'
                        +'<option value="">--Pilih--</option>'
                        +'<option value="hapus">Hapus</option>'
                        +'<option value="tambah">Tambah</option>'
                      +'</select>'
                    +'</div>'
                  +'</td>'
                  +'<td>'
                    +'<input type="text" maxlength="255" name="no_rek_giro[]"  value="" class="formField number_only" > </br>'
                  +'</td>'
                   +'<td><small><a href="#" class="remove_field_udpate_rek btn btn-warning">Remove</a></small></td>'
                +'</tr>'
              ); //add input box
          }
          jQuery('.selectpicker').selectpicker();
      });

      jQuery(wrapper).on("click",".remove_field_udpate_rek", function(e){ //user click on remove text
        e.preventDefault();
         jQuery(this).closest("tr").remove();
         x--;
      })
    });


    //addd more and remove field row rek tujuan transfer
    jQuery(document).ready(function() {
      var max_fields      = 5; //maximum input boxes allowed
      var wrapper         = jQuery(".add_row_rek_tujuan"); //Fields wrapper
      var add_button      = jQuery(".add_button_rek_tujuan"); //Add button ID

      var x = 1; //initlal text box count
      jQuery(add_button).click(function(e){ //on add input button click
          e.preventDefault();
          if(x < max_fields){ //max input box allowed
              x++; //text box increment
              jQuery(wrapper).append('<tr>'
                  +'<td>'
                    +'<input type="text" maxlength="255" name="no_rek_tujuan[]" value="" class="form-control number_only" >'
                  +'</td>'
                  +'<td>'
                    +'<input type="text" maxlength="255" name="nama_pemilik_rek[]" value="" class="form-control upper space" onkeypress="return textonly(event)" >'
                  +'</td>'
                   +'<td><small><a href="#" class="remove_field_rek_tujuan btn btn-warning">Remove</a></small></td>'
                +'</tr>'
              ); //add input box
          }
      });

      jQuery(wrapper).on("click",".remove_field_rek_tujuan", function(e){ //user click on remove text
        e.preventDefault();
         jQuery(this).closest("tr").remove();
         x--;
      })
    });

    //addd more and remove field row rek pembayaran
    jQuery(document).ready(function() {
      var max_fields      = 5; //maximum input boxes allowed
      var wrapper         = jQuery(".add_row_rek_pemb"); //Fields wrapper
      var add_button      = jQuery(".add_button_rek_pemb"); //Add button ID

      var x = 1; //initlal text box count
      jQuery(add_button).click(function(e){ //on add input button click
          e.preventDefault();
          if(x < max_fields){ //max input box allowed
              x++; //text box increment
              jQuery(wrapper).append('<tr>'
                  +'<td><input type="text" maxlength="255" name="nama_rekening[]"  value="" class="form-control" ></td>'
                  +'<td><input type="text" maxlength="255" name="no_pelanggan[]" value="" class="form-control number_only" ></td>'
                  +'<td><small><a href="#" class="remove_field_rek_pemb btn btn-warning">Remove</a></small></td>'
                +'</tr>'
              ); //add input box
          }
      });

      jQuery(wrapper).on("click",".remove_field_rek_pemb", function(e){ //user click on remove text
        e.preventDefault();
         jQuery(this).closest("tr").remove();
         x--;
      })
    });

				jQuery(document).ready(function($) {
          $('.norekk').hide();
          $('.norekkLembaga').hide();
          jQuery("#rekeningBTN").on('change', function() {
            if (jQuery("#rekeningBTN").val() == 'Sudah') {
              $('.norekk').show();
              $('.norekk').addClass('required');
            } else {
              $('.norekk').hide();
              $('.norekk').removeClass('required');
              $('#norekk').val('');
            }
          });
          jQuery("#rekeningBTNlembaga").on('change', function() {
            if (jQuery("#rekeningBTNlembaga").val() == 'Sudah') {
              $('.norekkLembaga').show();
              $('.norekkLembaga').addClass('required');
            } else {
              $('.norekkLembaga').hide();
              $('.norekkLembaga').removeClass('required');
              $('#norekkLebaga').val('');
            }
          });
          jQuery("#norekk").change(function() {
            jQuery("#NoRekNasabah").val($(this).val());
          });
          jQuery("#norekkLembaga").change(function() {
            jQuery("#NoRekNasabah").val($(this).val());
          });

          jQuery('input[name="tanggal_akta_pendirian"]').change(function() {
            if (jQuery('input[name="tanggal_lahir_aplikasi"]').length > 0) {
              jQuery('input[name="tanggal_lahir_aplikasi"]').val($(this).val());
            }
          });

          jQuery('input[name="akta_diterbitkan"]').change(function() {
            if (jQuery('input[name="tempat_lahir_aplikasi"]').length > 0) {
              jQuery('input[name="tempat_lahir_aplikasi"]').val($(this).val());
            }
          });

          jQuery('input[name="nama_lembaga"]').change(function() {
            jQuery('input[name="nama_lengkap_nasabah"]').val($(this).val());
            // jQuery('input[name="nama_pada_kartu"]').val($(this).val());
            jQuery('input[name="nama_lengkap_aplikasi"]').val($(this).val());
          });
          jQuery('input[name="alamat_lembaga"]').change(function() {
            // if (jQuery('input[name="alamat_lengkap_aplikasi"]').length > 0) {
              jQuery('input[name="alamat_lengkap_aplikasi"]').val($(this).val());
            // }
          });
          jQuery('input[name="nama_sesuai_identitas"]').blur(function() {
            if (jQuery('input[name="nama_lengkap_nasabah"]').length > 0) {
              jQuery('input[name="nama_lengkap_nasabah"]').val($(this).val());
              jQuery('input[name="nama_pada_kartu"]').val($(this).val());
            }
            if (jQuery('input[name="nama_lengkap_aplikasi"]').length > 0) {
              jQuery('input[name="nama_lengkap_aplikasi"]').val($(this).val());
            }
          });
          jQuery('input[name="tempat_lahir"]').blur(function() {
            if (jQuery('input[name="tempat_lahir_aplikasi"]').length > 0) {
              jQuery('input[name="tempat_lahir_aplikasi"]').val($(this).val());
            }
          });

          jQuery('#datetimepickerTgl').datetimepicker({
            pickTime: false,
            autoclose: true,
          }).on('changeDate', function(ev) {
            var dob = new Date(ev.date);
            jQuery('#datetimepickerTglLahirApp').datetimepicker('setValue', dob);
          });

          jQuery('#datetimepicker2').datetimepicker({
            pickTime: false,
            autoclose: true,
          }).on('changeDate', function(ev) {
              var dob = new Date(ev.date);
              jQuery('#datetimepickerTglLahirApp').datetimepicker('setValue', dob);
          });

          jQuery('input[name="tanggal_lahir"]').blur(function() {
            if (jQuery('input[name="tanggal_lahir_aplikasi"]').length > 0) {
              jQuery('input[name="tanggal_lahir_aplikasi"]').val($(this).val());
            }
          });

          jQuery('input[name="nama_gadis_ibu_kandung"]').blur(function() {
            if (jQuery('input[name="nama_gadis_ibu_kandung_aplikasi"]').length > 0) {
              jQuery('input[name="nama_gadis_ibu_kandung_aplikasi"]').val($(this).val());
            }
          });

          jQuery('input[name="alamat_pribadi"]').blur(function() {
            if (jQuery('input[name="alamat_lengkap_aplikasi"]').length > 0) {
              jQuery('input[name="alamat_lengkap_aplikasi"]').val($(this).val());
            }
          });

          jQuery('input[name="no_telepon1"]').blur(function() {
            if (jQuery('input[name="no_tlp_rumah_aplikasi"]').length > 0) {
              jQuery('input[name="no_tlp_rumah_aplikasi"]').val($(this).val());
            }
          });

          jQuery('input[name="no_telepon_perusahaan"]').blur(function() {
            if (jQuery('input[name="no_tlp_kantor_aplikasi"]').length > 0) {
              jQuery('input[name="no_tlp_kantor_aplikasi"]').val($(this).val());
            }
          });

          jQuery('input[name="ponsel"]').blur(function() {
            if (jQuery('input[name="no_hp_aplikasi"]').length > 0) {
              jQuery('input[name="no_hp_aplikasi"]').val($(this).val());
            }
          });

          jQuery('#fitur_fasilitas input[name="fitur[]"]').click(function() {
            if (jQuery('#fitur_fasilitas input[value="SMS BATARA"]').prop('checked') && (jQuery('#fitur_fasilitas input[value="Kartu ATM_PIN"]').prop('checked') || jQuery('#fitur_fasilitas input[value="Kartu BTN INSTAN_PIN"]').prop('checked'))){
              jQuery('#kartu_btn').show();
              jQuery('#sms_banking').show();
            } else if (jQuery('#fitur_fasilitas input[value="SMS BATARA"]').prop('checked')){
              jQuery('#kartu_btn').hide();
              jQuery('#sms_banking').show();
            } else if (jQuery('#fitur_fasilitas input[value="Kartu ATM_PIN"]').prop('checked') || jQuery('#fitur_fasilitas input[value="Kartu BTN INSTAN_PIN"]').prop('checked')){
              jQuery('#sms_banking').hide();
              jQuery('#kartu_btn').show();
            };
          });

	        // browser window scroll (in pixels) after which the "back to top" link is shown
	        var offset = 300,
	        //browser window scroll (in pixels) after which the "back to top" link opacity is reduced
	        offset_opacity = 1200,
	        //duration of the top scrolling animation (in ms)
	        scroll_top_duration = 700,
	        //grab the "back to top" link
	        $back_to_top = $('.cd-top');

	        //hide or show the "back to top" link
	        jQuery(window).scroll(function(){
	        ( $(this).scrollTop() > offset ) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
	        if( $(this).scrollTop() > offset_opacity ) {
	        	 $back_to_top.addClass('cd-fade-out');
	        }
	        });

	        //smooth scroll to top
	        $back_to_top.on('click', function(event){
	        event.preventDefault();
	        jQuery('body,html').animate({
	        	 scrollTop: 0 ,
	        	 }, scroll_top_duration
	        );
	        });
        });

        jQuery(function() {
	        jQuery('#datetimepicker1,#datetimepicker2,#datetimepicker3,#datetimepicker4,#datetimepicker5,#datetimepickerTglLahirApp').datetimepicker({
	        	pickTime: false,
						autoclose: true
        	});
        });

        jQuery(function() {
          jQuery('.datetimepicker').datetimepicker({
            pickTime: false,
            autoclose: true
          });
        });

        jQuery('tr').on('click', '.datetimepicker', function(){
          jQuery(this).datetimepicker('show');
        });

       jQuery(function() {
	        jQuery('#datetimepicker6').datetimepicker({
		        pickDate: false
	        });
	        jQuery('select[name=KEWARGANEGARAAN]').change(function(){
	        	if(jQuery(this).val() == 'WNI'){
	        		jQuery('select[name=NEGARA] option').prop('disabled',true);
	        		jQuery('select[name=NEGARA] option[value=Indonesia]').prop('disabled',false);
	        		jQuery('select[name=NEGARA]').val('Indonesia');
              jQuery('select[name=NEGARA].selectpicker').selectpicker('refresh');
	        	}else{
	        		jQuery('select[name=NEGARA] option').prop('disabled',false);
	        		jQuery('select[name=NEGARA]').val('');
	        		jQuery('select[name=NEGARA].selectpicker').selectpicker('refresh');
	        	}
	        })
      	});

				jQuery(".number_only").die('keydown').live('keydown',function(event) {
				  // Allow: backspace, delete, tab, escape, and enter
				  if ( event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 || event.keyCode == 13 ||
				      // Allow: Ctrl+A
				    (event.keyCode == 65 && event.ctrlKey === true) ||
				      // Allow: home, end, left, right
				    (event.keyCode >= 35 && event.keyCode <= 39)) {
				      // let it happen, don't do anything
				      return;
				  }
				  else {
				    // Ensure that it is a number and stop the keypress
				    if (event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105  )) {
				      event.preventDefault();
				    }
				  }
				});

				jQuery(".number_npwp").die('keydown').live('keydown',function(event) {
				  // Allow: backspace, delete, tab, escape, and enter
				  if ( event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 || event.keyCode == 13 || event.keyCode == 189  || event.keyCode == 190 ||
				      // Allow: Ctrl+A
				    (event.keyCode == 65 && event.ctrlKey === true) ||
				      // Allow: home, end, left, right
				    (event.keyCode >= 35 && event.keyCode <= 39)) {
				      // let it happen, don't do anything
				      return;
				  }
				  else {
				    // Ensure that it is a number and stop the keypress
				    if (event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105  )) {
				      event.preventDefault();
				    }
				  }
				});

      jQuery("#nama_lembaga").on('keyup',function(e){
        var value=jQuery(this).val();

        AllowRegex=/[a-zA-Z. ]$/
        if(value.length>0 && !AllowRegex.test(String(value))){
          var temp=String(value).replace(String(value).charAt(value.length-1),'')
          jQuery('input[name=nama_lembaga]').val(temp);
          return false;
        }
        return true;
      });

      //text only & number
      jQuery(".only_text_num").live('keyup',function(e){
        var value=jQuery(this).val();

        AllowRegex=/[a-zA-Z0-9. ]$/
        if(value.length>0 && !AllowRegex.test(String(value))){
          var temp=String(value).replace(String(value).charAt(value.length-1),'')
          jQuery(this).val(temp);
          return false;
        }
        return true;
      });

      //text only
      jQuery(".only_text").on('keyup',function(e){
        var value=jQuery(this).val();

        AllowRegex=/[a-zA-Z ]$/
        if(value.length>0 && !AllowRegex.test(String(value))){
          
          jQuery(this).val(String(value).replace(String(value).charAt(value.length-1),''));
          return false;
        }
        return true;
      });

      function textonly(e, value){
        var code;
        if (!e) var e = window.event;
        if (e.keyCode) code = e.keyCode;
        else if (e.which) code = e.which;
        var character = String.fromCharCode(code);
            var AllowRegex  = /^[\ba-zA-Z\s-]$/;
            if (AllowRegex.test(character)) return true;
            return false;
      }

      //allow titik koma
      function textonly2(e, value){
        var code;
        if (!e) var e = window.event;
        if (e.keyCode) code = e.keyCode;
        else if (e.which) code = e.which;
        var character = String.fromCharCode(code);
            var AllowRegex  = /^[\ba-zA-Z\.,\s-]$/;
            if (AllowRegex.test(character)) return true;
            return false;
      }


      jQuery("#nama_lengkap").on('keydown',function(e){

        var value = jQuery(this).val();
        var firstChar = String(value).charAt(0);
        var sChar = String(value).charAt(1);
            if (sChar === ' ' || firstChar === ' ') {
              var $theInput = jQuery(this);
              $theInput.val($theInput.val().replace(/\s+/g, ''));
               // value.substr(0,value.length-1);
              return false;
            }

          var AllowRegexFirst  = /^[a-zA-Z]$/;
            // if (value.length == 0 && (e.keyCode == 188 || e.keyCode == 8 || e.keyCode == 46 || e.keyCode == 32))
            if (value.length !=0 && !AllowRegexFirst.test(firstChar)) {
              jQuery('input[name="nama_sesuai_identitas"]').val('');
              jQuery('input[name="nama_sesuai_identitas"]').focus();
              return false;
            }

            // if (value[1] != ' ')
            // {
            //   var up=String(value).charAt(0).toUpperCase() + String(value).substring(1);
            //   jQuery(this).val(up);
            // }

            // cannot have double space
            if (value[value.length - 1] == ' ' && e.keyCode == 32) {
              return false;
            }

            // cannot single character
            if (value[value.length - 2] == ' ' && e.keyCode == 32) {
              return false;
            }

            // chars must alphabet
            var AllowRegex  = /[a-zA-Z ]$/; // or /^[A-Za-z\s]+$/ // /^[a-zA-Z]+$/;
            if (value.length != 0 && !AllowRegex.test(String(value))) {
              var valRes = String(value).replace(String(value).charAt(value.length - 1),'');
              jQuery('input[name="nama_sesuai_identitas"]').val(valRes);
              jQuery('input[name="nama_sesuai_identitas"]').focus();
              return false;
            }

            return true;
      });

      jQuery("#nama_notaris_akta_pendirian").on('keydown',function(e){
        var value = jQuery(this).val();
        var firstChar = String(value).charAt(0);
        var sChar = String(value).charAt(1);

        if (sChar === ' ' || firstChar === ' ') {
          var $theInput = jQuery(this);
          $theInput.val($theInput.val().replace(/\s+/g, ''));
          return false;
        }
        
        var AllowRegexFirst  = /^[a-zA-Z]$/;
        if (value.length !=0 && !AllowRegexFirst.test(firstChar)) {
          alert('Maaf digit pertama hanya boleh diisi huruf');
          jQuery('input[name="nama_notaris_akta_pendirian"]').val('');
          jQuery('input[name="nama_notaris_akta_pendirian"]').focus();
          return false;
        }

        // cannot have double space
        if (value[value.length - 1] == ' ' && e.keyCode == 32) {
          return false;
        }

        // cannot single character
        if (value[value.length - 2] == ' ' && e.keyCode == 32) {
          return false;
        }

        return true;
      });

      jQuery("#nama_notaris_akta_perubahan").on('keydown',function(e){
        var value = jQuery(this).val();
        var firstChar = String(value).charAt(0);
        var sChar = String(value).charAt(1);

        if (sChar === ' ' || firstChar === ' ') {
          var $theInput = jQuery(this);
          $theInput.val($theInput.val().replace(/\s+/g, ''));
          return false;
        }

        var AllowRegexFirst  = /^[a-zA-Z]$/;
        if (value.length !=0 && !AllowRegexFirst.test(firstChar)) {
          alert('Maaf digit pertama hanya boleh diisi huruf');
          jQuery('input[name="nama_notaris_akta_perubahan"]').val('');
          jQuery('input[name="nama_notaris_akta_perubahan"]').focus();
          return false;
        }

        // cannot have double space
        if (value[value.length - 1] == ' ' && e.keyCode == 32) {
          return false;
        }

        // cannot single character
        if (value[value.length - 2] == ' ' && e.keyCode == 32) {
          return false;
        }

        return true;
      });

      /*function nameValidationIdentitas(e, value){
         var sChar = String(value).charAt(1);

          var code;
          if (!e) var e = window.event;
          if (e.keyCode) code = e.keyCode;
          else if (e.which) code = e.which;
          var firstChar = String(value).charAt(0);

          var AllowRegexFirst  = /^[a-zA-Z{2,}]$/;
            // if (value.length == 0 && (e.keyCode == 188 || e.keyCode == 8 || e.keyCode == 46 || e.keyCode == 32))
            if (value.length !=0 && !AllowRegexFirst.test(firstChar)) {
              alert('Maaf digit pertama hanya boleh diisi huruf');
              jQuery('input[name="nama_lengkap"]').val('');
              return false;
            }

            // cannot have double space
            // if (value[value.length - 1] == ' ' && e.keyCode == 32) {
            //   return false;
            // }

            // // only two or more character
            // if (value[value.length - 2] == ' ' && e.keyCode == 32) {
            //   return false;
            // }

            if (sChar == ' ') {
              return false;
            }

            // chars must alphabet
            var AllowRegex  = /^[a-zA-Z{2,}\.,\]$/; // or /^[A-Za-z\s]+$/ // /^[a-zA-Z]+$/;
            if (value.length != 0 && !AllowRegex.test(value)) {
              var valRes = value.replace(String(value).charAt(value.length-1),'');
              jQuery('input[name="nama_lengkap"]').val(valRes);
              alert('Maaf nama hanya boleh diisi huruf, titik dan koma');
              return false;
            }

            return true;

      }*/

      // blur text only
      jQuery("#nama_lengkap_tanpa_gelar").on('keypress',function(e){
        var value = jQuery(this).val();
        var firstChar = String(value).charAt(0);
        var TChar = String(value).charAt(1);
        var AllowRegexFirst  = /^[a-zA-Z]$/;
        // if (value.length == 0 && (e.keyCode == 188 || e.keyCode == 8 || e.keyCode == 46 || e.keyCode == 32))
        if (value.length !=0 && !AllowRegexFirst.test(firstChar)) {
          alert('Maaf digit pertama hanya boleh diisi huruf');
          jQuery('input[name="nama_lengkap_tanpa_gelar"]').val('');
          jQuery('input[name="nama_lengkap_tanpa_gelar"]').focus();
          return false;
        }

        // cannot have double space
        if (value[value.length - 1] == ' ' && e.keyCode == 32) {
          return false;
        }

        // cannot have single character
        if (value[value.length - 2] == ' ' && e.keyCode == 32) {
          return false;
        }

        if (value[1] === " " || TChar === " ") {
          var valRes = String(value).replace(String(value).charAt(value.length-1),'');
          jQuery('input[name="nama_lengkap_tanpa_gelar"]').val(valRes);
          return false;
        }

        // chars must alphabet
        var AllowRegex  = /[a-zA-Z ]$/; // or /^[A-Za-z\s]+$/ // /^[a-zA-Z]+$/;
        if (value.length != 0 && !AllowRegex.test(String(value))) {
          var valRes = String(value).replace(String(value).charAt(value.length-1),'');
          jQuery('input[name="nama_lengkap_tanpa_gelar"]').val(valRes);
          jQuery('input[name="nama_lengkap_tanpa_gelar"]').focus();
          return false;
        }

        return true;
      });

      //text only
      // function nameValidation(e, value){

      //     var code;
      //     if (!e) var e = window.event;
      //     if (e.keyCode) code = e.keyCode;
      //     else if (e.which) code = e.which;
      //     var firstChar = String(value).charAt(0);
      //     var TChar = String(value).charAt(1);
      //     var AllowRegexFirst  = /^[a-zA-Z]$/;
      //       // if (value.length == 0 && (e.keyCode == 188 || e.keyCode == 8 || e.keyCode == 46 || e.keyCode == 32))
      //       if (value.length !=0 &&  !AllowRegexFirst.test(firstChar)) {
      //         alert('Maaf digit pertama hanya boleh diisi huruf');
      //         jQuery('input[name="nama_lengkap_tanpa_gelar"]').val('');
      //         return false;
      //       }

      //       // cannot have double space
      //       if (value[value.length - 1] == ' ' && e.keyCode == 32) {
      //         return false;
      //       }

      //       if (value[value.length - 2] == ' ' && e.keyCode == 32) {
      //         return false;
      //       }

      //       if (value[1] === " " || TChar === " ") {
      //         var valRes = value.replace(String(value).charAt(value.length-1),'');
      //         jQuery('input[name="nama_lengkap_tanpa_gelar"]').val(valRes);
      //         return false;
      //       }

      //       // chars must alphabet
      //       var AllowRegex  = /^[a-zA-Z\]$/; // or /^[A-Za-z\s]+$/ // /^[a-zA-Z]+$/;
      //       if (value.length != 0 && !AllowRegex.test(String(value))) {
      //         alert('Maaf nama hanya boleh diisi huruf');
      //         var valRes = String(value).replace(String(value).charAt(value.length),'');
      //         jQuery('input[name="nama_lengkap_tanpa_gelar"]').val(valRes);
      //         jQuery('input[name="nama_lengkap_tanpa_gelar"]').focus();
      //         return false;
      //       }

      //       return true;

      // }

      //blur text only ibu gadis
      jQuery('input[name="nama_gadis_ibu_kandung"]').blur(function(){
        var value = jQuery(this).val();
        var firstChar = String(value).charAt(0);
        var AllowRegexFirst  = /^[a-zA-Z]$/;
            // if (value.length == 0 && (e.keyCode == 188 || e.keyCode == 8 || e.keyCode == 46 || e.keyCode == 32))
            if (value.length !=0 && !AllowRegexFirst.test(firstChar)) {
              alert('Maaf digit pertama hanya boleh diisi huruf');
              jQuery('input[name="nama_gadis_ibu_kandung"]').val('');
              jQuery('input[name="nama_gadis_ibu_kandung"]').focus();
              return false;
            }

            // cannot have double space
            if (value[value.length - 1] == ' ' && e.keyCode == 32) {
              return false;
            }

            // chars must alphabet
            var AllowRegex  = /[a-zA-Z ]$/; // or /^[A-Za-z\s]+$/ // /^[a-zA-Z]+$/;
            if (value.length != 0 && !AllowRegex.test(value)) {
              var valRes = value.replace(String(value).charAt(value.length-1),'');
              jQuery('input[name="nama_gadis_ibu_kandung"]').val(valRes);
              jQuery('input[name="nama_gadis_ibu_kandung"]').focus();
              alert('Maaf nama hanya boleh diisi huruf');
              return false;
            }

            return true;
      });
      //text only
      function nameGadisIbu(e, value){

          var code;
          if (!e) var e = window.event;
          if (e.keyCode) code = e.keyCode;
          else if (e.which) code = e.which;
          var firstChar = String(value).charAt(0);
          var AllowRegexFirst  = /^[a-zA-Z]$/;
            // if (value.length == 0 && (e.keyCode == 188 || e.keyCode == 8 || e.keyCode == 46 || e.keyCode == 32))
            if (value.length !=0 && !AllowRegexFirst.test(firstChar)) {
              alert('Maaf digit pertama hanya boleh diisi huruf');
              jQuery('input[name="nama_gadis_ibu_kandung"]').val('');
              return false;
            }

            // cannot have double space
            if (value[value.length - 1] == ' ' && e.keyCode == 32) {
              return false;
            }

            // chars must alphabet
            var AllowRegex  = /[a-zA-Z ]$/; // or /^[A-Za-z\s]+$/ // /^[a-zA-Z]+$/;
            if (value.length != 0 && !AllowRegex.test(value)) {
              alert('Maaf nama hanya boleh diisi huruf');
              var valRes = value.replace(String(value).charAt(value.length-1),'');
              jQuery('input[name="nama_gadis_ibu_kandung"]').val(valRes);
              return false;
            }

            return true;

      }

      //input validate relasi
      jQuery('input[name="nama_lengkap_relasi"]').blur(function(){
        var value = jQuery(this).val();
        var firstChar = String(value).charAt(0);
        var AllowRegexFirst  = /^[a-zA-Z]$/;
            // if (value.length == 0 && (e.keyCode == 188 || e.keyCode == 8 || e.keyCode == 46 || e.keyCode == 32))
            if (value.length !=0 && !AllowRegexFirst.test(firstChar)) {
              alert('Maaf digit pertama hanya boleh diisi huruf');
              jQuery('input[name="nama_lengkap_relasi"]').val('');
              jQuery('input[name="nama_lengkap_relasi"]').focus();
              return false;
            }

            // cannot have double space
            if (value[value.length - 1] == ' ' && e.keyCode == 32) {
              return false;
            }

            // chars must alphabet
            var AllowRegex  = /[a-zA-Z ]$/; // or /^[A-Za-z\s]+$/ // /^[a-zA-Z]+$/;
            if (value.length != 0 && !AllowRegex.test(value)) {
              var valRes = value.replace(String(value).charAt(value.length-1),'');
              jQuery('input[name="nama_lengkap_relasi"]').val(valRes);
              jQuery('input[name="nama_lengkap_relasi"]').focus();
              alert('Maaf nama hanya boleh diisi huruf');
              return false;
            }

            return true;
      });
      //text only
      function namaRelasi(e, value){

          var code;
          if (!e) var e = window.event;
          if (e.keyCode) code = e.keyCode;
          else if (e.which) code = e.which;
          var firstChar = String(value).charAt(0);
          var AllowRegexFirst  = /^[a-zA-Z]$/;
            // if (value.length == 0 && (e.keyCode == 188 || e.keyCode == 8 || e.keyCode == 46 || e.keyCode == 32))
            if (value.length !=0 && !AllowRegexFirst.test(firstChar)) {
              alert('Maaf digit pertama hanya boleh diisi huruf');
              jQuery('input[name="nama_lengkap_relasi"]').val('');
              return false;
            }

            // cannot have double space
            if (value[value.length - 1] == ' ' && e.keyCode == 32) {
              return false;
            }

            // chars must alphabet
            var AllowRegex  = /[a-zA-Z ]$/; // or /^[A-Za-z\s]+$/ // /^[a-zA-Z]+$/;
            if (value.length != 0 && !AllowRegex.test(value)) {
              alert('Maaf nama hanya boleh diisi huruf');
              var valRes = value.replace(String(value).charAt(value.length-1),'');
              jQuery('input[name="nama_lengkap_relasi"]').val(valRes);
              return false;
            }

            return true;

      }

      //validate nama lengkap nasabah
      jQuery('input[name="nama_lengkap_nasabah"]').blur(function(){
        var value = jQuery(this).val();
        var firstChar = String(value).charAt(0);
        var AllowRegexFirst  = /^[a-zA-Z]$/;
            // if (value.length == 0 && (e.keyCode == 188 || e.keyCode == 8 || e.keyCode == 46 || e.keyCode == 32))
            if (value.length !=0 && !AllowRegexFirst.test(firstChar)) {
              alert('Maaf digit pertama hanya boleh diisi huruf');
              jQuery('input[name="nama_lengkap_nasabah"]').val('');
              jQuery('input[name="nama_lengkap_nasabah"]').focus();
              return false;
            }

            // cannot have double space
            if (value[value.length - 1] == ' ' && e.keyCode == 32) {
              return false;
            }

            // chars must alphabet
            var AllowRegex  = /[a-zA-Z ]$/; // or /^[A-Za-z\s]+$/ // /^[a-zA-Z]+$/;
            if (value.length != 0 && !AllowRegex.test(value)) {
              var valRes = value.replace(String(value).charAt(value.length-1),'');
              jQuery('input[name="nama_lengkap_nasabah"]').val(valRes);
              jQuery('input[name="nama_lengkap_nasabah"]').focus();
              alert('Maaf nama hanya boleh diisi huruf');
              return false;
            }

            return true;
      });

      function nameAppValidate(e, value){
        var code;
        if (!e) var e = window.event;
        if (e.keyCode) code = e.keyCode;
        else if (e.which) code = e.which;
        var firstChar = String(value).charAt(0);
        var AllowRegexFirst  = /^[a-zA-Z]$/;
        // if (value.length == 0 && (e.keyCode == 188 || e.keyCode == 8 || e.keyCode == 46 || e.keyCode == 32))
        if (value.length !=0 && !AllowRegexFirst.test(firstChar)) {
          alert('Maaf digit pertama hanya boleh diisi huruf');
          jQuery('input[name="nama_lengkap_nasabah"]').val('');
          return false;
        }

        // cannot have double space
        if (value[value.length - 1] == ' ' && e.keyCode == 32) {
          return false;
        }

        // chars must alphabet
        var AllowRegex  = /[a-zA-Z ]$/; // or /^[A-Za-z\s]+$/ // /^[a-zA-Z]+$/;
        if (value.length != 0 && !AllowRegex.test(value)) {
          alert('Maaf nama hanya boleh diisi huruf');
          var valRes = value.replace(String(value).charAt(value.length-1),'');
          jQuery('input[name="nama_lengkap_nasabah"]').val(valRes);
          return false;
        }

        return true;
      }

      //name kartu validate
      jQuery('input[name="nama_pada_kartu"]').blur(function(){
        var value = jQuery(this).val();
        var firstChar = String(value).charAt(0);
        var AllowRegexFirst  = /^[a-zA-Z]$/;
            // if (value.length == 0 && (e.keyCode == 188 || e.keyCode == 8 || e.keyCode == 46 || e.keyCode == 32))
            if (value.length !=0 && !AllowRegexFirst.test(firstChar)) {
              alert('Maaf digit pertama hanya boleh diisi huruf');
              jQuery('input[name="nama_pada_kartu"]').val('');
              jQuery('input[name="nama_pada_kartu"]').focus();
              return false;
            }

            // cannot have double space
            if (value[value.length - 1] == ' ' && e.keyCode == 32) {
              return false;
            }

            // chars must alphabet
            var AllowRegex  = /[a-zA-Z ]$/; // or /^[A-Za-z\s]+$/ // /^[a-zA-Z]+$/;
            if (value.length != 0 && !AllowRegex.test(value)) {
              var valRes = value.replace(String(value).charAt(value.length-1),'');
              jQuery('input[name="nama_pada_kartu"]').val(valRes);
              jQuery('input[name="nama_pada_kartu"]').focus();
              alert('Maaf nama hanya boleh diisi huruf');
              return false;
            }

            return true;
      });

      function nameKartuVlidate(e, value){
          var code;
          if (!e) var e = window.event;
          if (e.keyCode) code = e.keyCode;
          else if (e.which) code = e.which;
          var firstChar = String(value).charAt(0);
          var AllowRegexFirst  = /^[a-zA-Z]$/;
            // if (value.length == 0 && (e.keyCode == 188 || e.keyCode == 8 || e.keyCode == 46 || e.keyCode == 32))
          if (value.length !=0 && !AllowRegexFirst.test(firstChar)) {
            alert('Maaf digit pertama hanya boleh diisi huruf');
            jQuery('input[name="nama_pada_kartu"]').val('');
            return false;
          }

          // cannot have double space
          if (value[value.length - 1] == ' ' && e.keyCode == 32) {
            return false;
          }

          // chars must alphabet
          var AllowRegex  = /[a-zA-Z ]$/; // or /^[A-Za-z\s]+$/ // /^[a-zA-Z]+$/;
          if (value.length != 0 && !AllowRegex.test(value)) {
            alert('Maaf nama hanya boleh diisi huruf');
            var valRes = value.replace(String(value).charAt(value.length-1),'');
            jQuery('input[name="nama_pada_kartu"]').val(valRes);
            return false;
          }

          return true;
      }

      //validate nama lengkap aplikasi
      jQuery('input[name="nama_lengkap_aplikasi"]').blur(function(){
        var value = jQuery(this).val();
        var firstChar = String(value).charAt(0);
        var AllowRegexFirst  = /^[a-zA-Z]$/;
            // if (value.length == 0 && (e.keyCode == 188 || e.keyCode == 8 || e.keyCode == 46 || e.keyCode == 32))
            if (value.length !=0 && !AllowRegexFirst.test(firstChar)) {
              alert('Maaf digit pertama hanya boleh diisi huruf');
              jQuery('input[name="nama_lengkap_aplikasi"]').val('');
              jQuery('input[name="nama_lengkap_aplikasi"]').focus();
              return false;
            }

            // cannot have double space
            if (value[value.length - 1] == ' ' && e.keyCode == 32) {
              return false;
            }

            // chars must alphabet
            var AllowRegex  = /[a-zA-Z ]$/; // or /^[A-Za-z\s]+$/ // /^[a-zA-Z]+$/;
            if (value.length != 0 && !AllowRegex.test(value)) {
              var valRes = value.replace(String(value).charAt(value.length-1),'');
              jQuery('input[name="nama_lengkap_aplikasi"]').val(valRes);
              jQuery('input[name="nama_lengkap_aplikasi"]').focus();
              alert('Maaf nama hanya boleh diisi huruf');
              return false;
            }

            return true;
      });

      function nameValidateAtm(e, value){

          var code;
          if (!e) var e = window.event;
          if (e.keyCode) code = e.keyCode;
          else if (e.which) code = e.which;
          var firstChar = String(value).charAt(0);
          var AllowRegexFirst  = /^[a-zA-Z]$/;
            // if (value.length == 0 && (e.keyCode == 188 || e.keyCode == 8 || e.keyCode == 46 || e.keyCode == 32))
            if (value.length !=0 && value.length <= 2 && !AllowRegexFirst.test(firstChar)) {
              alert('Maaf digit pertama hanya boleh diisi huruf');
              jQuery('input[name="nama_lengkap_aplikasi"]').val('');
              return false;
            }

            // cannot have double space
            if (value[value.length - 1] == ' ' && e.keyCode == 32) {
              return false;
            }

            // chars must alphabet
            var AllowRegex  = /[a-zA-Z ]$/; // or /^[A-Za-z\s]+$/ // /^[a-zA-Z]+$/;
            if (value.length != 0 && !AllowRegex.test(value)) {
              alert('Maaf nama hanya boleh diisi huruf');
              var valRes = value.replace(String(value).charAt(value.length-1),'');
              jQuery('input[name="nama_lengkap_aplikasi"]').val(valRes);
              return false;
            }

            return true;

      }

      //validate name ibu on kartu atm
      jQuery('input[name="nama_gadis_ibu_kandung_aplikasi"]').blur(function(){
        var value = jQuery(this).val();
        var firstChar = String(value).charAt(0);
        var AllowRegexFirst  = /^[a-zA-Z]$/;
            // if (value.length == 0 && (e.keyCode == 188 || e.keyCode == 8 || e.keyCode == 46 || e.keyCode == 32))
            if (value.length !=0 && !AllowRegexFirst.test(firstChar)) {
              alert('Maaf digit pertama hanya boleh diisi huruf');
              jQuery('input[name="nama_gadis_ibu_kandung_aplikasi"]').val('');
              jQuery('input[name="nama_gadis_ibu_kandung_aplikasi"]').focus();
              return false;
            }

            // cannot have double space
            if (value[value.length - 1] == ' ' && e.keyCode == 32) {
              return false;
            }

            // chars must alphabet
            var AllowRegex  = /[a-zA-Z ]$/; // or /^[A-Za-z\s]+$/ // /^[a-zA-Z]+$/;
            if (value.length != 0 && !AllowRegex.test(value)) {
              var valRes = value.replace(String(value).charAt(value.length-1),'');
              jQuery('input[name="nama_gadis_ibu_kandung_aplikasi"]').val(valRes);
              jQuery('input[name="nama_gadis_ibu_kandung_aplikasi"]').focus();
              alert('Maaf nama hanya boleh diisi huruf');
              return false;
            }

            return true;
      });

      function nameValidateIbuAtm(e, value){

          var code;
          if (!e) var e = window.event;
          if (e.keyCode) code = e.keyCode;
          else if (e.which) code = e.which;
          var firstChar = String(value).charAt(0);
          var AllowRegexFirst  = /^[a-zA-Z]$/;
            // if (value.length == 0 && (e.keyCode == 188 || e.keyCode == 8 || e.keyCode == 46 || e.keyCode == 32))
            if (value.length !=0 && !AllowRegexFirst.test(firstChar)) {
              alert('Maaf digit pertama hanya boleh diisi huruf');
              jQuery('input[name="nama_gadis_ibu_kandung_aplikasi"]').val('');
              return false;
            }

            // cannot have double space
            if (value[value.length - 1] == ' ' && e.keyCode == 32) {
              return false;
            }

            // chars must alphabet
            var AllowRegex  = /[a-zA-Z ]$/; // or /^[A-Za-z\s]+$/ // /^[a-zA-Z]+$/;
            if (value.length != 0 && !AllowRegex.test(value)) {
              alert('Maaf nama hanya boleh diisi huruf');
              var valRes = value.replace(String(value).charAt(value.length-1),'');
              jQuery('input[name="nama_gadis_ibu_kandung_aplikasi"]').val(valRes);
              return false;
            }

            return true;

      }

      //calculate age tanggal lahir
      jQuery('#datetimepickerTgl').datetimepicker({
        pickTime: false,
        autoclose: true,
      }).on('changeDate', function(ev){
          var dob = new Date(ev.date);
          var today = new Date();
          var id_produk = jQuery('#id_produk').val();
          var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));

          var data = {
             type: "POST",
             action: 'btn_ajax_get_product_by_id',
             data : {id:id_produk}
          };
          jQuery.post(ajax_object.ajax_url, data, function(response,data){
          var result = jQuery.parseJSON(response);
            var usia_minimal = result.USIA_MINIMAL;
            var usia_maximal = result.USIA_MAXIMAL;
            if (usia_minimal != 0 && usia_maximal == 0) {
              if (age < usia_minimal) {
                alert('Maaf umur anda dibawah minimal '+usia_minimal+' tahun');
                jQuery('#tanggal_lahir').val('');
                jQuery('#datetimepickerTgl').datetimepicker('setValue', null);
              };
            }else if (usia_minimal == 0 && usia_maximal != 0) {
              if (age > usia_maximal) {
                alert('Maaf umur anda diatas maximal '+usia_maximal+' tahun');
                jQuery('#tanggal_lahir').val('');
                jQuery('#datetimepickerTgl').datetimepicker('setValue', null);
              };
            }else if(usia_minimal != 0 && usia_maximal != 0){
              if (age > usia_maximal && age < usia_minimal) {
                alert('Maaf umur anda tidak masuk range '+usia_minimal+'-'+usia_maximal+'tahun');
                jQuery('#tanggal_lahir').val('');
                jQuery('#datetimepickerTgl').datetimepicker('setValue', null);
              };
            };
          });
      });


      jQuery("#nama_lengkap").on('keyup',function(e){
        var value = jQuery(this).val();
        jQuery("#nama_lengkap_tanpa_gelar").val(value);
      });


      jQuery( "#jumlah_nominal_deposito" ).change(function(){
        var nilai = jQuery(this).val();
        value = nilai.split(",");

          var val1 = value[0].replace(/\./g,'');
          var res_nilai1 = terbilang(val1);
          var res_terbilang = res_nilai1+' Rupiah';

        //if decimal true
        if (value.length == 2) {
          var val2 = value[1];
          var res_dec = terbilang(val2);
          var res_terbilang = res_nilai1+'koma'+res_dec+'Rupiah';
        }

        if (res_nilai1 == 'notvalid') {
          alert('Maaf nominal yang dimasukan diluar batas');
          jQuery('textarea[name="terbilang"]').val('');
          jQuery('input[name="jumlah_nominal_deposito"]').val('');
          jQuery(this).focus();
        } else {
          jQuery('textarea[name="terbilang"]').val(res_terbilang);
        }
      });

      //fugnsi terbilang
      function terbilang(bilangan) {

      bilangan    = String(bilangan);
      var angka   = new Array('0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');
      var kata    = new Array('','Satu','Dua','Tiga','Empat','Lima','Enam','Tujuh','Delapan','Sembilan');
      var tingkat = new Array('','Ribu','Juta','Milyar','Triliun');

      var panjang_bilangan = bilangan.length;

      /* pengujian panjang bilangan */
      if (panjang_bilangan > 15) {
        kaLimat = "notvalid";
        return kaLimat;
      }

      /* mengambil angka-angka yang ada dalam bilangan, dimasukkan ke dalam array */
      for (i = 1; i <= panjang_bilangan; i++) {
        angka[i] = bilangan.substr(-(i),1);
      }

      i = 1;
      j = 0;
      kaLimat = "";


      /* mulai proses iterasi terhadap array angka */
      while (i <= panjang_bilangan) {

        subkaLimat = "";
        kata1 = "";
        kata2 = "";
        kata3 = "";

        /* untuk Ratusan */
        if (angka[i+2] != "0") {
          if (angka[i+2] == "1") {
            kata1 = "Seratus";
          } else {
            kata1 = kata[angka[i+2]] + " Ratus";
          }
        }

        /* untuk Puluhan atau Belasan */
        if (angka[i+1] != "0") {
          if (angka[i+1] == "1") {
            if (angka[i] == "0") {
              kata2 = "Sepuluh";
            } else if (angka[i] == "1") {
              kata2 = "Sebelas";
            } else {
              kata2 = kata[angka[i]] + " Belas";
            }
          } else {
            kata2 = kata[angka[i+1]] + " Puluh";
          }
        }

        /* untuk Satuan */
        if (angka[i] != "0") {
          if (angka[i+1] != "1") {
            kata3 = kata[angka[i]];
          }
        }

        /* pengujian angka apakah tidak nol semua, lalu ditambahkan tingkat */
        if ((angka[i] != "0") || (angka[i+1] != "0") || (angka[i+2] != "0")) {
          subkaLimat = kata1+" "+kata2+" "+kata3+" "+tingkat[j]+" ";
        }

        /* gabungkan variabe sub kaLimat (untuk Satu blok 3 angka) ke variabel kaLimat */
        kaLimat = subkaLimat + kaLimat;
        i = i + 3;
        j = j + 1;

      }

      /* mengganti Satu Ribu jadi Seribu jika diperlukan */
      if ((angka[5] == "0") && (angka[6] == "0")) {
        kaLimat = kaLimat.replace("Satu Ribu","Seribu");
      }

      return kaLimat;
    }

    </script>
<?php
}

function jsForFaq(){
	?>
		<script>
      jQuery('#buka-tabungan').click(function(){
         jQuery('#pilihTabungan').toggleClass('open')
      })
        jQuery(document).ready(function(jQuery){
   // browser window scroll (in pixels) after which the "back to top" link is shown
   var offset = 300,
      //browser window scroll (in pixels) after which the "back to top" link opacity is reduced
      offset_opacity = 1200,
      //duration of the top scrolling animation (in ms)
      scroll_top_duration = 700,
      //grab the "back to top" link
      $back_to_top = jQuery('.cd-top');

   //hide or show the "back to top" link
   jQuery(window).scroll(function(){
      ( jQuery(this).scrollTop() > offset ) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
      if( jQuery(this).scrollTop() > offset_opacity ) {
         $back_to_top.addClass('cd-fade-out');
      }
   });

   //smooth scroll to top
   $back_to_top.on('click', function(event){
      event.preventDefault();
      jQuery('body,html').animate({
         scrollTop: 0 ,
         }, scroll_top_duration
      );
   });

});
   </script>
	<?php
}

/* Add Menus Admin */
add_action( 'admin_menu', 'account_register_menu_page' );
function account_register_menu_page(){
    add_menu_page( 'Data Permohonan Pembukaan Rekening', 'Data Pembukaan Rekening',  'manage_options', 'registerdata', 'registerdata_menu_page', 'dashicons-clipboard' , 10 );
    add_menu_page( 'Data Permohonan Pembukaan Kartu Atm SMS', 'Data Pembukaan Kartu ATM & SMS',  'manage_options', 'atmSms', 'atmSms_menu_page', 'dashicons-clipboard' , 11 );
    add_menu_page( 'Data Pengajuan Kredit', 'Data Pengajuan Kredit',  'manage_options', 'pinjaman', 'pinjaman_page', 'dashicons-clipboard' , 12 );
    // add_menu_page( 'Data Pengajuan Kredit', 'Data Pengajuan Kredit',  'manage_options', 'loandata', 'loandata_menu_page', 'dashicons-clipboard' , 70 );
    add_menu_page( 'Data Product', 'Data Product',  'manage_options', 'product', 'product_menu_page', 'dashicons-clipboard' , 13 );
}


function registerdata_menu_page() {
    include dirname(__FILE__) . '/inc/admin_userregister_index.php';
}

function product_menu_page() {
    include dirname(__FILE__) . '/inc/admin_product_index.php';
}

function atmSms_menu_page() {
    include dirname(__FILE__) . '/inc/admin_atm_sms_index.php';
}

function loandata_menu_page() {
    include dirname(__FILE__) . '/inc/admin_loanapplication_index.php';
}

function pinjaman_page() {
    include dirname(__FILE__) . '/inc/admin_peminjaman_index.php';
}

// add_action('admin_menu', 'account_register_menu_add_page');

// function account_register_menu_add_page() {
//     add_submenu_page( 'registerdata', 'Data Permohonan Pembukaan Rekening ', 'Add New', 'manage_options', 'account_register_add', 'account_register_menu_add_page_callback' );
// }

add_action('admin_menu', 'account_register_menu_add_city');

function account_register_menu_add_city() {
    add_submenu_page( 'btn-vb-settings', 'Tambah Kota dan Cabang', 'Tambah Kota dan Cabang', 'manage_options', 'edit-tags.php?taxonomy=city_branch_key&post_type=vb' );
}

function account_register_menu_add_page_callback() {
	include dirname(__FILE__) . '/inc/admin_userregister_add.php';
}

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Custom dropdown menu and navbar in walker class
 */
require get_template_directory() . '/inc/BootstrapBasicMyWalkerNavMenu.php';

/**
 * Template functions
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * --------------------------------------------------------------
 * Theme widget & widget hooks
 * --------------------------------------------------------------
 */
require get_template_directory() . '/inc/widgets/BootstrapBasicSearchWidget.php';
require get_template_directory() . '/inc/template-widgets-hook.php';
require get_template_directory() . '/inc/btn.php';