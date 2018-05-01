<?php 
//TBD: Check ENABLED Check Global and pagewise Settings
global $theme_options;


// echo "<pre>";
// print_r($theme_options);
// echo "</pre>";


echo "Slider =".$theme_options['select_slider'];
if($theme_options['slider_enable'] == 1):
	?>
	<div id="aione_slider" class="aione-slider">
		<div class="wrapper">
			
			<div class="aione-clear"></div><!-- .aione-clear -->
		</div><!-- .wrapper -->
	</div><!-- .aione-slider -->
<?php
endif;