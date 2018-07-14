<?php if( is_enabled('page_bottom_area_enable') ): ?>	
	<div id="aione_pagebottom" class="aione-pagebottom">
		<div class="wrapper">
			<?php
			if ( is_active_sidebar( 'aione-pagebottom-content' ) ){
				dynamic_sidebar( 'aione-pagebottom-content' );
			} else {
				echo empty_sidebar_message();
			}
			?>
		</div><!-- .wrapper -->
	</div><!-- .aione-pagebottom -->
<?php endif;