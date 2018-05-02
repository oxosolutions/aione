<?php 
//TBD: Check ENABLED Check Global and pagewise Settings
global $theme_options;


// echo "<pre>";
// print_r($theme_options);
// echo "</pre>";


echo "Slider =".$theme_options['select_slider'];

//$slider = get_post(7); 

$slider_id = $theme_options['select_slider'];

$meta = get_post_meta($slider_id);


if($theme_options['slider_enable'] == 1):
	?>
	<div id="aione_slider" class="aione-slider">
		<div class="wrapper">

<?php
$image_ids = get_field('images', $slider_id, false);

echo "=====<br>".implode(',', $image_ids);
echo "-------<br>";
echo "<pre>";
print_r($meta);
echo "</pre>";

$shortcode = '[' . 'gallery ids="' . implode(',', $image_ids) . '"]';

echo do_shortcode( $shortcode );

?>
			
			<div class="aione-clear"></div><!-- .aione-clear -->
		</div><!-- .wrapper -->
	</div><!-- .aione-slider -->
	<style type="text/css">
		.aione-slider{
			background-color: #121212;
		}

	</style>Socio-demographic questions

<?php
endif;