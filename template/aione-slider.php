<?php 
global $theme_options;

$slider_id = $theme_options['select_slider'];
$slides = get_field('images', $slider_id);


if($theme_options['slider_enable'] == 1):?>
	<div id="aione_slider" class="aione-slider">
		<div class="wrapper">
			<?php if(!empty($slides)):
				
				echo '<div id="aione_slider_'.$slider_id.'" class="slider owl-carousel owl-theme gallery aione-theme">';
				//echo '<div id="aione_slider_'.$slider_id.'" class="aione-carousel owl-carousel owl-theme gallery aione-theme">';
				foreach ($slides as $key => $slide) {
					echo '<div class="aione-item">';
						echo '<div class="aione-image">';
							echo '<img src="'.$slide['url'].'" alt="'.$slide['alt'].'" />';

						echo '</div>';
						echo '<div class="aione-description">';
							echo '<h2 class="title">'.$slide['title'].'</h2>';
							echo '<h4 class="description">'.$slide['caption'].'</h4>';
						echo '</div>';
					echo '</div>';
				}
				echo '</div>';

			endif; ?>
			<div class="aione-clear"></div><!-- .aione-clear -->
		</div><!-- .wrapper -->
	</div><!-- .aione-slider -->
	<style type="text/css">
		.aione-slider{
			background-color: #f2f2f2;
		}
		.aione-description{ 
			display:none;
		}

	</style>

<?php
endif;