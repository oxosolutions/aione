<?php
$is_enabled   = is_enabled_sidebar( 'left' );
$sidebar_left = aione_get_sidebar( 'left' );

if( $is_enabled ) : ?>
	<aside id="aione_sidebar_left" class="aione-sidebar aione-sidebar-left">
		<div class="wrapper">
			<?php
			if ( is_active_sidebar( $sidebar_left ) ) {
				dynamic_sidebar( $sidebar_left );
			} else {
				echo '<h3>'.wp_kses_post( empty_sidebar_message() ).'</h3>';
			}
			?>
		</div> <!-- .wrapper -->
	</aside> <!-- .aione-sidebar-left -->
<?php endif;