<?php
//TBD: Check ENABLED Check Global and pagewise Settings
global $theme_options;
if($theme_options['page_top_area_enable'] == 1):
	?>
	<div id="aione_pagetop" class="aione-pagetop">
		<div class="wrapper">
		<?php	if( is_active_sidebar( 'aione-pagetop-content' )  ):?>
			<?php dynamic_sidebar( 'aione-pagetop-content' ); ?>
			<div class="aione-clear"></div><!-- .aione-clear -->
		<?php endif; ?>	
		</div><!-- .wrapper -->
	</div><!-- .aione-pagetop -->
	<?php	
endif;