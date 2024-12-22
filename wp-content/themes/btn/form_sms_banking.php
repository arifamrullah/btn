<?php
/**
 * Template Name: Halaman Form Sms Banking
 */

/* Check Type Rekening */
if ( !$_POST['jenis_fitur'] or trim( $_POST['jenis_fitur'] ) == "" ) {
	wp_redirect('/');
	exit();
}
?>

<?php get_header();?>
<?php include_once( 'forms/form-formulir-atm-sms.php' ); ?>
<?php add_action( 'wp_footer', 'JsforForm' ); ?>
<?php get_footer();?>