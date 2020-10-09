<?php
if( is_active_sidebar( 'aione-header-banner' )  ) : ?>
	<div id="aione_header_banner" class="aione-header-banner">
		<div class="wrapper">
			<?php dynamic_sidebar( 'aione-header-banner' ); ?>
			<div class="clear">	
			</div><!-- .clear -->
		</div><!-- .wrapper -->
	</div><!-- .aione-header-banner -->
<?php endif;