<?php 
if( is_enabled( get_page_id(), 'content_bottom_area_enable' ) ) : ?>
	<section id="aione_contentbottom" class="aione-contentbottom">
		<div class="wrapper">
			<?php
			if ( is_active_sidebar( 'aione-contentbottom-content' ) ) {
				dynamic_sidebar( 'aione-contentbottom-content' );
			} else {
				echo '<h3>'.esc_html( empty_sidebar_message() ).'</h3>';
			}
			?>
		</div>  <!-- .wrapper -->
	</section> <!-- .aione-contenttop -->
<?php endif;