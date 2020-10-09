<?php 
global $post;
if( is_enabled( $post->ID, 'show_top_bar' ) ) :

	if ( is_active_sidebar( 'aione-topbar-left' ) && is_active_sidebar( 'aione-topbar-right' ) ) {
		$aione_topbar_left_class  = 'aione-topbar-left';
		$aione_topbar_right_class = 'aione-topbar-right';
	} else {
		$aione_topbar_left_class = $aione_topbar_right_class = 'aione-topbar-center';
	}
	?>

	<div id="aione_topbar" class="aione-topbar <?php echo esc_html(is_fullwidth( $post->ID, 'top_bar' )); ?>">
		<div class="wrapper">
			<?php 
			if ( is_active_sidebar( 'aione-topbar-left' ) ) :
				echo '<div class="'.esc_html($aione_topbar_left_class).'">';
					dynamic_sidebar( 'aione-topbar-left' );
				echo '</div>';
			endif;
			if ( is_active_sidebar( 'aione-topbar-right' ) ) :
				echo '<div class="'.esc_html($aione_topbar_right_class).'">';
					dynamic_sidebar( 'aione-topbar-right' );
				echo '</div>';
			endif;
			?>
			<div class="clear"></div><!-- .clear -->
		</div><!-- .wrapper -->
	</div><!-- .aione-topbar -->
<?php endif;