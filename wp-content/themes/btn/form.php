<?php
/**
 * Template Name: Halaman Form
 */

 /* Check Type Rekening */
if ( !$_POST['jenis_tabungan'] or trim( $_POST['jenis_tabungan'] ) == "" ) {
	wp_redirect('/');
  exit();
} else {
  if ( !$_POST['jenis_cif'] or trim( $_POST['jenis_cif'] ) == "" ) {
    wp_redirect('/');
    exit();
  }
}
?>
<!-- for Check key Jenis Tabungan -->
<?php
  $jenis_produk = btn_get_product_by_id( $_POST['jenis_tabungan'] );
  // print_r($jenis_produk);die();
  // $data_produk = $jenis_produk;
  $jenis_tabungan = explode( ' ', strtolower( $jenis_produk->NAME ) );
?>

<?php get_header();?>
<div class="container">
  <div id="site">
    <?php
    if ( $jenis_produk->CIF == 1 ) {
      echo '<div id="page1">';
        if( !empty( $_POST['jenis_cif'] ) ) {
          switch( $_POST['jenis_cif'] ) {
            case 'perorangan':
              include_once( 'forms/cif-perorangan.php' );
            break;
            case 'lembaga':
              include_once( 'forms/cif-lembaga.php' );
            break;
          } 
        }
      echo '</div>';
    }    
    echo '<div id="page2">';
     include_once( 'forms/cif-formulir-pembukaan-rekening.php' );
    echo '</div>';

    if ( $jenis_produk->ATM_SMS == 1 ) {
      echo '<div id="page3">';
        include_once( 'forms/cif-formulir-aplikasi.php' );
      echo '</div>';
    } ?>
  </div>
</div>
<?php add_action('wp_footer', 'JsforForm'); ?>
<?php get_footer();?>
