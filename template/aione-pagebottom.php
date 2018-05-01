<?php
//TBD: Check ENABLED Check Global and pagewise Settings
global $theme_options;
if($theme_options['page_bottom_area_enable'] == 1):
?>	
	<div id="aione_pagebottom" class="aione-pagebottom">
		<div class="wrapper">
		<?php	
		if( is_active_sidebar( 'aione-pagebottom-content' )  ):?>
			<?php dynamic_sidebar( 'aione-pagebottom-content' ); ?>
			<div class="aione-clear"></div><!-- .aione-clear -->
		<?php endif; ?>	
		</div><!-- .wrapper -->
	</div><!-- .aione-pagebottom -->
	<?php
endif;