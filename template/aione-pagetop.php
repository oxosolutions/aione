<?php 
global $post;

$post_id = $post->ID;

$sidebar_pagetop = 'aione-pagetop-content';
$sidebar_custom = get_aione_page_settings( $post_id, 'aione_per_page_setting','pyre_sidebar_pagetop' );

if ( ! empty( $sidebar_custom ) && $sidebar_custom != 'default' ) {
	$sidebar_pagetop = $sidebar_custom;
}


if( is_enabled( $post_id, 'page_top_area_enable' ) ) : ?>
	<section id="aione_pagetop" class="aione-pagetop <?php echo esc_html(is_fullwidth( $post_id, 'page_top_area' ) ); ?>">
		<div class="wrapper">
			<?php
			if ( is_active_sidebar( $sidebar_pagetop ) ) {
				dynamic_sidebar( $sidebar_pagetop );
			} else {
				echo '<h3>'.wp_kses_post( empty_sidebar_message() ).'</h3>';
			}
			?>
		</div><!-- .wrapper -->
	</section><!-- .aione-pagetop -->
<?php endif;