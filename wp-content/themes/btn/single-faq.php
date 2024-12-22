
<?php get_header();?>
<section id="tanya-jawab">  
 <div class="container">

    <div class="kategori-pertanyaan">

       <div class="row">

       	<?php $cats = get_the_terms($post->ID, "faq-group"); ?>
       	  <div class="col-md-3 faq-sidebar">
       	  	
       	  	<h4>Tanya Jawab</h4>
       	  	<ul>
       	  <?php if($chidrens = btn_get_faq_all_cat()): ?> 
       	  	<?php foreach($chidrens as $children): ?>       	  		              
       	  		<li><a href="<?php echo get_term_link( $children, 'faq-group' ); ?> "><?php echo $children->name ?></a></li>
       	  	<?php endforeach ?>
       	  <?php endif ?>
       	  </ul>
       	  </div>
          <div class="col-md-9 faq-content">

          		
             <h1><?php echo $cats[0]->name ?></h1>
             <br />
             <?php echo do_shortcode('[faqs style="toggle" filter="'.$cats[0]->slug.'"]') ?>
          </div>
        
          
       </div>
    </div>
 </div>
</section>
<?php add_action('wp_footer', 'JsforFaq'); ?>
<script>
  jQuery(document).ready(function(){
    jQuery('#data-<?php echo $post->post_name ?>').trigger('click');
  })
</script>
<?php get_footer();?>