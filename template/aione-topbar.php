<?php 
global $theme_options;
global $post;
$draw = false;
$count=0; 
if ( is_active_sidebar( 'aione-topbar-left' ) ) : 
	$count++;
endif; 
if ( is_active_sidebar( 'aione-topbar-right' ) ) : 
	$count++;
endif;
if($count > 0):
	$aione_topbar_left_class = 'aione-topbar-left';
	$aione_topbar_right_class = 'aione-topbar-right';
	if($count == 1):
		$aione_topbar_left_class = $aione_topbar_right_class = 'aione-topbar-center';
	endif;

	$pyre_show_top_bar = get_aione_page_option($post->ID,'pyre_show_top_bar');
	$draw = $pyre_show_top_bar == 'yes' ? true 
			: ( $pyre_show_top_bar == 'no' ? false 
					: (($theme_options['show_top_bar'] == 1)
						? true
						: false
					)
			);
	
	if($draw == true):
	?>
		<div id="aione_topbar" class="aione-topbar">
			<div class="wrapper">
				<?php 
				if ( is_active_sidebar( 'aione-topbar-left' ) ):
					echo '<div class="'.$aione_topbar_left_class.'">';
						dynamic_sidebar( 'aione-topbar-left' );
					echo '</div>';
				endif;
				if ( is_active_sidebar( 'aione-topbar-right' ) ):
					echo '<div class="'.$aione_topbar_right_class.'">';
						dynamic_sidebar( 'aione-topbar-right' );
					echo '</div>';
				endif;
				?>
				<div class="aione-clear"></div><!-- .aione-clear -->
			</div><!-- .wrapper -->
		</div><!-- .aione-topbar -->
	<?php
	endif;
endif;