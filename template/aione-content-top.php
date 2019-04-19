<?php 

global $post;

$post_id = $post->ID;

$sidebar_contenttop = 'aione-contenttop-content';
$sidebar_custom = get_aione_page_settings( $post_id, 'aione_per_page_setting','pyre_sidebar_contenttop' );

if ( ! empty( $sidebar_custom ) && $sidebar_custom != 'default' ) {
	$sidebar_contenttop = $sidebar_custom;
}

if( is_enabled( $post_id, 'content_top_area_enable') ): ?>
	<section id="aione_contenttop" class="aione-contenttop">
		<div class="wrapper">
			<?php
			if ( is_active_sidebar( $sidebar_contenttop ) ) {
				dynamic_sidebar( $sidebar_contenttop );
			} else {
				echo '<h3>'.wp_kses_post( empty_sidebar_message() ).'</h3>';
			}
			?>
		</div> <!-- .wrapper -->
	</section> <!-- .aione-contenttop -->
<?php endif;