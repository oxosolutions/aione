<?php 
global $theme_options;
global $post;
$draw = false;


$pyre_select_slider = get_aione_page_option($post->ID,'pyre_select_slider');
$slider_id = $pyre_select_slider == 'default' ? $theme_options['select_slider'] 
		: $pyre_select_slider;

$pyre_slider_enable = get_aione_page_option($post->ID,'pyre_slider_enable');
$draw = $pyre_slider_enable == 'yes' ? true 
		: ( $pyre_slider_enable == 'no' ? false 
				: (($theme_options['slider_enable'] == 1)
					? true
					: false
				)
		);

/*

$pyre_slider_100_width = get_aione_page_option($post->ID,'pyre_slider_100_width');
if($pyre_slider_100_width == 'yes'){
	$slider_wrapper_class = "fullwidth";
} else {

}
$slider_wrapper_class = $pyre_slider_100_width == 'yes' ? true 
		: ( $pyre_slider_enable == 'no' ? false 
				: (($theme_options['slider_enable'] == 1)
					? true
					: false
				)
		);

slider_100_width
echo "<br>Global Slider ID === ".$theme_options['select_slider'];
echo "<br>Page Slider ID === ".$pyre_select_slider;

echo "<br>Global Slider Status === ".$theme_options['slider_enable'];
echo "<br>Page Slider Status === ".$pyre_slider_enable;
echo "<br>Slider Global 100 === ".$theme_options['slider_100_width'];
echo "<br>Slider page 100 === ".$pyre_slider_100_width;
echo "<br>Slider Class === ".$slider_wrapper_class;
*/

//echo "<br>Slider Class == ".is_fullwidth('slider');

if($draw == true):?>
	<div id="aione_slider" class="aione-slider <?php echo is_fullwidth('slider');?>">
		<div class="wrapper">
			<?php 
				if(!empty($slider_id)){
					echo do_shortcode( '[aione-slider id="'.$slider_id.'"]');
				}
			?>
		</div><!-- .wrapper -->
	</div><!-- .aione-slider -->
<?php
endif;