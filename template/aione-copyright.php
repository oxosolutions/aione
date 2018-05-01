<?php 
global $theme_options;
$count=0; 
if ( is_active_sidebar( 'aione-copyright-left' ) ) : 
	$count++;
endif; 
if ( is_active_sidebar( 'aione-copyright-right' ) ) : 
	$count++;
endif;
if($count > 0):
	$aione_copyright_left_class = 'aione-copyright-left';
	$aione_copyright_right_class = 'aione-copyright-right';
	if($count == 1){
		$aione_copyright_left_class = $aione_copyright_right_class = 'aione-copyright-center';
	}
	if($theme_options['footer_copyright'] == 1):
	?>
	<div id="aione_copyright" class="aione-copyright">
		<div class="wrapper">
			<?php 
			if ( is_active_sidebar( 'aione-copyright-left' ) ){
				echo '<div class="'.$aione_copyright_left_class.'">';
					dynamic_sidebar( 'aione-copyright-left' );
				echo '</div>';
			}
			if ( is_active_sidebar( 'aione-copyright-right' ) ){
				echo '<div class="'.$aione_copyright_right_class.'">';
					dynamic_sidebar( 'aione-copyright-right' );
				echo '</div>';
			}
			?>
			<div class="aione-clear"></div><!-- .aione-clear -->
		</div><!-- .wrapper -->
	</div><!-- .aione-copyright -->
<?php
	endif;
endif;