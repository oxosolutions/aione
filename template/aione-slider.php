<?php 
global $theme_options;
global $post;
$draw = false;

$pyre_select_slider = get_aione_page_option($post->ID,'pyre_select_slider');
$slider_id = $pyre_select_slider == 'default' ? $theme_options['select_slider'] 
		: $pyre_select_slider;

$slides = @get_post_meta('images', $slider_id);
$pyre_slider_enable = get_aione_page_option($post->ID,'pyre_slider_enable');
$draw = $pyre_slider_enable == 'yes' ? true 
		: ( $pyre_slider_enable == 'no' ? false 
				: (($theme_options['slider_enable'] == 1)
					? true
					: false
				)
		);
if($draw == true):?>
	<div id="aione_slider" class="aione-slider">
		<div class="wrapper">
			<?php 
				do_shortcode( '[slider id="'.$slider_id.'"]');
			?>
			<div class="aione-clear"></div><!-- .aione-clear -->
		</div><!-- .wrapper -->
	</div><!-- .aione-slider -->
	

<?php
endif;