<?php 
//TBD: Check ENABLED Check Global and pagewise Settings
if( is_active_sidebar( 'aione-header-banner' )  ):

	?>
	<div id="" class="aione-header-banner">
		<div class="wrapper">
			<?php dynamic_sidebar( 'aione-header-banner' ); ?>
			<div class="aione-clear">	
			</div><!-- .aione-clear -->
		</div><!-- .wrapper -->
	</div><!-- .aione-header-banner -->
<?php
endif;