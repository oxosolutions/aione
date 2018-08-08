<?php 
global $post;

if( is_enabled( $post->ID, 'sidebar_left_enable') ): ?>
	<aside id="aione_sidebar_left" class="aione-sidebar aione-sidebar-left">
		<div class="wrapper">
			<?php
			if ( is_active_sidebar( 'aione-sidebar-left' ) ){
				dynamic_sidebar( 'aione-sidebar-left' );
			} else {
				echo empty_sidebar_message();
			}
			?>
		</div> <!-- .wrapper -->
	</aside> <!-- .aione-sidebar-left -->
<?php endif;