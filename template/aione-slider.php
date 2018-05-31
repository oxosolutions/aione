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
			<?php if(!empty($slides)):
				
				echo '<div id="aione_slider_'.$slider_id.'" class="slider owl-carousel owl-theme gallery aione-theme">';
				//echo '<div id="aione_slider_'.$slider_id.'" class="aione-carousel owl-carousel owl-theme gallery aione-theme">';
				foreach ($slides as $key => $slide) {
					echo '<div class="aione-item">';
						echo '<div class="aione-image">';
							echo '<img src="'.$slide['url'].'" alt="'.$slide['alt'].'" />';

						echo '</div>';
						echo '<div class="aione-description">';
							if(!empty($slide['title'])){
							echo '<h2 class="title">'.$slide['title'].'</h2>';
							}
							if(!empty($slide['caption'])){

							echo '<h4 class="description">'.$slide['caption'].'</h4>';
							}
						echo '</div>';
					echo '</div>';
				}
				echo '</div>';

			endif; ?>
			<div class="aione-clear"></div><!-- .aione-clear -->
		</div><!-- .wrapper -->
	</div><!-- .aione-slider -->
	

<?php
endif;