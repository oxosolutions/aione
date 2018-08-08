<?php 
global $post;

if( is_enabled( $post->ID, 'page_top_area_enable') ): ?>
	<section id="aione_pagetop" class="aione-pagetop <?php echo is_fullwidth( $post->ID, 'page_top_area'); ?>">
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