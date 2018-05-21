<?php
//TBD: Check ENABLED Check Global and pagewise Settings
global $theme_options;
global $post;
$draw = false;
$pyre_page_bottom_area_enable = get_aione_page_option($post->ID,'pyre_page_bottom_area_enable');
$draw = $pyre_page_bottom_area_enable == 'yes' ? true 
		: ( $pyre_page_bottom_area_enable == 'no' ? false 
				: (($theme_options['page_bottom_area_enable'] == 1)
					? true
					: false
				)
		);
if($draw == true):
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