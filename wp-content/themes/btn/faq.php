<?php
/**
 * Template Name: Halaman Tanya Jawab
 */

?>
<?php get_header();?>
<section id="tanya-jawab">
 <div class="headline">
    <div class="container">
       <h2>
         <img src="<?php echo get_template_directory_uri() ?>/images/ask-big.png"/> Tanya Jawab
       </h2>
       <p>
          Berikut adalah pertanyaan yang sering diajukan. Jika anda tidak dapat menemukan jawabannya, silahkan kontak kami:
       </p>
       <form class="cari-pertanyaan" method="get">
          <div class="row">
             <div class="col-md-10">
                <input type="text" class="form-control" name="search" value="<?php echo @$_GET['search'] ?>"/>
             </div>
             <div class="col-md-2">
                <button type="submit" class="btn btn-yellow">
               <i class="fa fa-search"></i> Cari
                </button>
             </div>
          </div>
       </form>
    </div>
 </div>
 <?php if(!empty($_GET['search'])): ?>
  <div class="container">
      <div class="kategori-pertanyaan">
         <div class="row">            
            <div class="col-md-12">
               <h4>Search Result</h4>
               <ul>
                  <?php 
                  $args = array(
                    'post_type' => 'faq',
                    's' => $_GET['search'],
                    
                  );
                  $faqs = new WP_Query( $args );                   
                  ?>

                  <?php if ( $faqs->have_posts() ) : while ( $faqs->have_posts() ) : $faqs->the_post(); ?>
                  <li>
                     <a href="<?php the_permalink() ?>"><?php the_title() ?></a> 
                  </li>
                  <?php endwhile; ?>
                  <?php else: ?>
                    <p>
                      Maaf kata kunci yang di cari tidak di temukan
                    </p>
                  <?php endif; wp_reset_postdata(); ?>
               </ul>
            </div>          
            
         </div>
      </div>
   </div>
   
 <?php else: ?>
   <div class="container">
      <div class="top-pertanyaan">
         <h3>Pertanyaan Top</h3>
         <div class="row">
            <?php 
                $args = array(
                  'post_type' => 'faq',
                  'posts_per_page' => 10,
                  'order'     => 'DESC',
                  'meta_key' => 'views',
                  'orderby'   => 'meta_value_num'         
                );
                $faqs = new WP_Query( $args ); ?>

                <?php $t=1; if ( $faqs->have_posts() ) : ?> 
                <div class="col-md-6">
                    <ul>
                <?php while ( $faqs->have_posts() ) : $faqs->the_post(); ?>              
                <li>
                   <a href="<?php the_permalink() ?>"><?php the_title() ?></a> 
                </li>
                <?php if($t == 5): ?>
                    </ul>
                  </div>
                  <div class="col-md-6">
                    <ul>
                <?php $t=1;else: $t++; endif; ?>
                <?php ; endwhile; endif; wp_reset_postdata(); 
            ?>
            
         </div>
      </div>
   </div>
   <div class="container">
      <div class="kategori-pertanyaan">
         <div class="row">
            <?php if($chidrens = btn_get_faq_frontpage_cat()): ?>
              <?php foreach($chidrens as $k => $children): ?>

            <div class="col-md-4">
               <h4><?php echo btn_get_faq_cat_name($children) ?></h4>
               <ul>
                  <?php 
                  $args = array(
                    'post_type' => 'faq',
                    'tax_query' => array(
                      array(
                      'taxonomy' => 'faq-group',                    
                      'terms' => $children
                       )
                    )
                  );
                  $faqs = new WP_Query( $args ); ?>
                  <?php if ( $faqs->have_posts() ) : while ( $faqs->have_posts() ) : $faqs->the_post(); ?>
                  <li>
                     <a href="<?php the_permalink() ?>"><?php the_title() ?></a> 
                  </li>

                  <?php endwhile; endif; wp_reset_postdata(); ?>
               </ul>
            </div>
            <?php if($k == 2) return false; ?>
          <?php endforeach; endif; ?>
            
         </div>
      </div>
   </div>
 <?php endif ?>
</section>
<?php add_action('wp_footer', 'JsforFaq'); ?>
<?php get_footer();?>