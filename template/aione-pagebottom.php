<?php 
global $post;

$post_id = $post->ID;

$sidebar_pagebottom = 'aione-pagebottom-content';
$sidebar_custom = get_aione_page_settings( $post_id, 'aione_per_page_setting','pyre_sidebar_pagebottom' );

if ( ! empty( $sidebar_custom ) && $sidebar_custom != 'default' ) {
	$sidebar_pagebottom = $sidebar_custom;
}

if( is_enabled( $post_id, 'page_bottom_area_enable' ) ) : ?>	
	<div id="aione_pagebottom" class="aione-pagebottom <?php echo esc_html(is_fullwidth( $post_id, 'page_bottom_area' ) ); ?>">
		<div class="wrapper">
			<?php
			if ( is_active_sidebar( $sidebar_pagebottom  ) ) {
				dynamic_sidebar( $sidebar_pagebottom  );
			} else {
				echo '<h3>'.wp_kses_post( empty_sidebar_message() ).'</h3>';
			}
			?>
		</div><!-- .wrapper -->
	</div><!-- .aione-pagebottom -->
<?php endif;