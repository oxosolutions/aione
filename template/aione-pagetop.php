<?php 
global $post;

if( is_enabled( $post->ID, 'page_top_area_enable' ) ) : ?>
	<section id="aione_pagetop" class="aione-pagetop <?php echo esc_html(is_fullwidth( $post->ID, 'page_top_area' ) ); ?>">
		<div class="wrapper">
			<?php
			if ( is_active_sidebar( 'aione-pagetop-content' ) ) {
				dynamic_sidebar( 'aione-pagetop-content' );
			} else {
				echo '<h3>'.wp_kses_post( empty_sidebar_message() ).'</h3>';
			}
			?>
		</div><!-- .wrapper -->
	</section><!-- .aione-pagetop -->
<?php endif;