
<!DOCTYPE html>
<!--[if lt IE 7]>  <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>     <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>     <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title><?php wp_title('|', true, 'right'); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">		
		<link href='//fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic' rel='stylesheet' type='text/css'>
		<script src='https://www.google.com/recaptcha/api.js'></script>
		<!--wordpress head-->
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>   
		<?php if(is_front_page()): ?>
		<div class="nav-page">
		 <ul>
		    <li>
		       <a href="#top" class="scroll"><span>Mulai</span></a>
		    </li>
		    <li>
		       <a href="#fitur" class="scroll"><span>Fitur</span></a>
		    </li>
		    <li>
		       <a href="#about" class="scroll"><span>Tentang BTN Virtual Branch</span></a>
		    </li>
		 </ul>
		</div>
		<?php endif ?>
		<nav class="navbar navbar-default navbar-fixed-top">
		 <div class="container">
		    <div class="navbar-header">
		       <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
		       <span class="sr-only">Toggle navigation</span>
		       <span class="icon-bar"></span>
		       <span class="icon-bar"></span>
		       <span class="icon-bar"></span>
		       </button>
		       <a class="navbar-brand" href="<?php echo home_url( '/' )  ?>"><img src="<?php echo get_template_directory_uri() ?>/images/logo-btn-baru.png"/></a>
		    </div>
		    <div id="navbar" class="navbar-collapse collapse">
		    	<?php dynamic_sidebar('navbar-right'); ?> 
		    	<?php wp_nav_menu(array('theme_location' => 'primary', 'container' => false, 'menu_class' => 'nav navbar-nav navbar-right', 'walker' => new BootstrapBasicMyWalkerNavMenu())); ?> 
				
		       <?php /* ul class="nav navbar-nav navbar-right">
		       		<div class="collapse navbar-collapse navbar-primary-collapse">
								
							</div><!--.navbar-collapse-->	
		          <li><a href="">Layanan Internet Banking</a></li>
		          <li><a href=""><img src="<?php echo get_template_directory() ?>/images/ask.png"/> Tanya Jawab</a></li>
		          <li>
		             <div class="box-time">
		                <div class="arrow"></div>
		                <span>Kami siap melayani pada waktu berikut</span>
		                <p>Senin - Jumat   Pukul 08.00 - 17.00</p>
		             </div>
		          </li>
		       </ul */?>
		    </div>
		 </div>
		</nav>