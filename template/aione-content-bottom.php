<?php 


global $post;

$post_id = $post->ID;

$sidebar_contentbottom = 'aione-contentbottom-content';
$sidebar_custom = get_aione_page_settings( $post_id, 'aione_per_page_setting','pyre_sidebar_contentbottom' );

if ( ! empty( $sidebar_custom ) && $sidebar_custom != 'default' ) {
	$sidebar_contentbottom = $sidebar_custom;
}

if( is_enabled( $post_id , 'content_bottom_area_enable' ) ) : ?>
	<section id="aione_contentbottom" class="aione-contentbottom">
		<div class="wrapper">
			<?php
			if ( is_active_sidebar( $sidebar_contentbottom ) ) {
				dynamic_sidebar( $sidebar_contentbottom );
			} else {
				echo '<h3>'.wp_kses_post( empty_sidebar_message() ).'</h3>';
			}
			?>
		</div>  <!-- .wrapper -->
	</section> <!-- .aione-contenttop -->
<?php endif;