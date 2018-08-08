<?php 
global $post;

if( is_enabled( $post->ID,'sidebar_right_enable') ): ?>
	<aside id="aione_sidebar_right" class="aione-sidebar aione-sidebar-right">
		<div class="wrapper">
			<?php
			if ( is_active_sidebar( 'aione-sidebar-right' ) ){
				dynamic_sidebar( 'aione-sidebar-right' );
			} else {
				echo empty_sidebar_message();
			}
			?>
		</div> <!-- .wrapper -->
	</aside> <!-- .aione-sidebar-right -->
<?php endif;