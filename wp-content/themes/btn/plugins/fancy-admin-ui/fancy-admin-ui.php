<?php
/*
  Plugin Name:  Fancy Admin UI
  Plugin URI:   http://boborchard.com/plugins/fancy-admin-ui/
  Description:  Super clean, blue admin panel theme
  Version:      1.1
  Author:       Bob Orchard
  Author URI:   http://boborchard.com
  */

include_once('inc/fau_settings.php');

// Include Admin Styles
function fau_admin_theme_style() {
  wp_enqueue_style( 'fau-admin-theme', plugin_dir_theme( 'css/fau-styles-admin.php', __FILE__ ) );
  wp_enqueue_style( 'fau-adminbar', plugin_dir_theme( 'css/fau-styles-adminbar.php', __FILE__ ) );
}
add_action( 'admin_enqueue_scripts', 'fau_admin_theme_style' );

function fau_adminbar_style() {
  wp_enqueue_style( 'fau-admin-theme', plugin_dir_theme( 'css/fau-styles-adminbar.php', __FILE__ ) );
}
add_action( 'wp_enqueue_scripts', 'fau_adminbar_style' );

// Login Page Styling
function fau_login_theme_style() {
  wp_enqueue_style( 'fau-login-theme', plugin_dir_theme( 'css/fau-styles-login.php', __FILE__ ) );
  //wp_enqueue_script( 'fau-login-theme', plugin_dir_theme( 'css/fau-styles-login.php', __FILE__ ) );
}
add_action( 'login_enqueue_scripts', 'fau_login_theme_style' );

// Update Admin Footer
function fau_swap_footer_admin() {
  echo 'BTN Admin UI';
}
add_filter( 'admin_footer_text', 'fau_swap_footer_admin' );

// Remove default HTML height on the admin bar callback
function fui_admin_bar_style() {
  if ( is_admin_bar_showing() ) {
?>
  <style type="text/css" media="screen">
    html { margin-top: 46px !important; }
    * html body { margin-top: 46px !important; }
  </style>
<?php } }
add_theme_support( 'admin-bar', array( 'callback' => 'fui_admin_bar_style' ) );
