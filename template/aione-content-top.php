<?php 
global $post;

if( is_enabled( $post->ID, 'content_top_area_enable') ): ?>
	<section id="aione_contenttop" class="aione-contenttop">
		<div class="wrapper">
			<?php
			if ( is_active_sidebar( 'aione-contenttop-content' ) ){
				dynamic_sidebar( 'aione-contenttop-content' );
			} else {
				echo empty_sidebar_message();
			}
			?>
		</div> <!-- .wrapper -->
	</section> <!-- .aione-contenttop -->
<?php endif;