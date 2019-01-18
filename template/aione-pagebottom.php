<?php 
global $post;

if( is_enabled( $post->ID, 'page_bottom_area_enable' ) ) : ?>	
	<div id="aione_pagebottom" class="aione-pagebottom">
		<div class="wrapper">
			<?php
			if ( is_active_sidebar( 'aione-pagebottom-content' ) ) {
				dynamic_sidebar( 'aione-pagebottom-content' );
			} else {
				echo '<h3>'.esc_html( empty_sidebar_message() ).'</h3>';
			}
			?>
		</div><!-- .wrapper -->
	</div><!-- .aione-pagebottom -->
<?php endif;