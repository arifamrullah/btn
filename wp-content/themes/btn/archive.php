<?php get_header();?>

<section>
	<div class="container">
		<br /><br /><br /><br />
		
		<div class="row">
		<div class="col-md-3">
			<h4>Archives by Month:</h4>
		<ul>
			<?php wp_get_archives('type=monthly'); ?>
		</ul>
		
		<h4>Archives by Subject:</h4>
		<ul>
			 <?php wp_list_categories(); ?>
		</ul>
		</div>

		<div class="col-md-9">		
		<ul>
		<?php if ( have_posts() ) {			
			while ( have_posts() ) {
			the_post();  ?>
			<li>
				<h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
				<?php the_excerpt() ?>
				<hr /> 
			</li>			
		<?php } ?>
		<?php $big = 999999999; echo paginate_links( array(
		'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format' => '?paged=%#%',
		'current' => max( 1, get_query_var('paged') ),
		'total' => $wp_query->max_num_pages
		) );?>
		<?php } ?>	
		</ul>
		</div>
		</div>
		<br />
	</div>
</section>      

<?php get_footer(); ?> 