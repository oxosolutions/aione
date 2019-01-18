<?php 
if( is_enabled( get_page_id(), 'content_top_area_enable') ): ?>
	<section id="aione_contenttop" class="aione-contenttop">
		<div class="wrapper">
			<?php
			if ( is_active_sidebar( 'aione-contenttop-content' ) ) {
				dynamic_sidebar( 'aione-contenttop-content' );
			} else {
				echo '<h3>'.esc_html( empty_sidebar_message() ).'</h3>';
			}
			?>
		</div> <!-- .wrapper -->
	</section> <!-- .aione-contenttop -->
<?php endif;