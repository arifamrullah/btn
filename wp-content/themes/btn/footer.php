<?php
/**
 * The theme footer
 * 
 * @package bootstrap-basic
 */
?>

			
		    <a href="#0" class="cd-top"><i class="fa fa-chevron-up"></i></a>
			<footer>
				<div class="copyright">
				<?php $btntitan = TitanFramework::getInstance( 'btn' );echo $btntitan->getOption( 'footer' ); ?>
				</div>
			</footer>
		</div><!--.site-content-->			
		<?php wp_footer(); ?> 
	</body>
</html>