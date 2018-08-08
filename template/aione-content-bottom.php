<?php 
global $post;

if( is_enabled( $post->ID, 'content_bottom_area_enable') ): ?>
	<section id="aione_contentbottom" class="aione-contentbottom">
		<div class="wrapper">
			<?php
			if ( is_active_sidebar( 'aione-contentbottom-content' ) ){
				dynamic_sidebar( 'aione-contentbottom-content' );
			} else {
				echo empty_sidebar_message();
			}
			?>
		</div>  <!-- .wrapper -->
	</section> <!-- .aione-contenttop -->
<?php endif;