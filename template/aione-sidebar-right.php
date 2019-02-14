<?php 

$is_enabled    = is_enabled_sidebar( 'right' );
$sidebar_right = aione_get_sidebar( 'right' );

if( $is_enabled ) : ?>
	<aside id="aione_sidebar_right" class="aione-sidebar aione-sidebar-right">
		<div class="wrapper">
			<?php
			if ( is_active_sidebar( $sidebar_right ) ) {
				dynamic_sidebar( $sidebar_right );
			} else {
				echo '<h3>'.wp_kses_post( empty_sidebar_message() ).'</h3>';
			}
			?>
		</div> <!-- .wrapper -->
	</aside> <!-- .aione-sidebar-right -->
<?php endif;