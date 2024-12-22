<?php get_header();?>
<section id="tanya-jawab">  
 <div class="container">
    <div class="kategori-pertanyaan">
       <div class="row">

       	<?php $cats = get_term_by('slug',$wp_query->query['faq-group'], "faq-group"); ?>

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

          		
             <h1><?php echo $cats->name ?></h1>
             <br />
             <?php echo do_shortcode('[faqs style="toggle" filter="'.$cats->slug.'"]') ?>
          </div>
        
          
       </div>
    </div>
 </div>
</section>
<?php add_action('wp_footer', 'JsforFaq'); ?>
<?php get_footer();?>