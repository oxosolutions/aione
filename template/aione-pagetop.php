<?php if( is_enabled('page_top_area_enable') ): ?>
	<section id="aione_pagetop" class="aione-pagetop <?php echo is_fullwidth('page_top_area'); ?>">
		<div class="wrapper">
			<?php
			if ( is_active_sidebar( 'aione-pagetop-content' ) ){
				dynamic_sidebar( 'aione-pagetop-content' );
			} else {
				echo empty_sidebar_message();
			}
			?>
		</div><!-- .wrapper -->
	</section><!-- .aione-pagetop -->
<?php endif;