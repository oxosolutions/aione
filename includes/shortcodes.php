<?php
/**
* Aione Slider Shortcode
*/
add_shortcode( 'aione-slider', 'aione_slider_shortcode' );
function aione_slider_shortcode( $atts ) {
	$atts = shortcode_atts( array(
		'id' => '',
		'class' => '',
	), $atts, 'aione-slider' );

	$output = '';
	$slider_id = $atts['id'];

	if ( get_post_status ( $slider_id ) == 'publish' ) {
		if ( get_post_type( $slider_id ) == 'aione-slider' ) {
			$slides = get_field('aione_slider_images', $slider_id);

			$settings   = get_post_meta($atts['id'], 'aione-slider-settings', true );
			$skip_settings   = array(
				'theme',
				'caption',
				'caption_title',
				'caption_description',
				'caption_link',
				'URLhashListener',
			);
			$slider_classes = array('slider','owl-carousel');
			$slider_data = array();

			if(is_array($settings)){
				foreach($settings as $setting_key => $setting_value){
					if(in_array($setting_key, $skip_settings)){
						continue;
					}
					/*
					if( $setting_key == 'data-animation' ){
						if( $setting_value == 'push-left'){

						}
					}
					*/
					$setting_key = strtolower(preg_replace('/(?<!^)[A-Z]/', '-$0', $setting_key));
					$slider_data[] = 'data-'.$setting_key.'="'.$setting_value.'" ';
				}
			}

			$slider_classes[] = $settings['theme'];
			$slider_classes = implode(" ",$slider_classes);
			$slider_data = implode(" ",$slider_data);

			/*

			echo '<div style="display:none">';
			echo "<br>caption === ".$settings['caption'];
			echo "<br>caption_title === ".$settings['caption_title'];
			echo "<br>caption_description === ".$settings['caption_description'];
			echo "<br>caption_link === ".$settings['caption_link'];
			echo '</div>';

			echo "<pre>";
			print_r($slider_classes);
			echo "</pre>";
			*/

			if(!empty($slides)):
				$output .=  '<div id="aione_slider_'.$atts['id'].'" class="'.$slider_classes.'" '.$slider_data.'>';
				foreach ($slides as $key => $slide) {
					$output .= '<div class="slider-item">';
					$output .= '<div class="slider-image">';
					$output .= '<img src="'.$slide['url'].'" alt="'.$slide['alt'].'" />';
					$output .= '</div>';
					if($settings['caption']){
						$output .= '<div class="slider-caption">';
						if($settings['caption_title']){
							$output .= '<h3 class="caption-title">'.$slide['title'].'</h3>';
						}
						if($settings['caption_description']){
							$output .= '<p class="caption-description">'.$slide['caption'].'</p>';
						}
						$output .= '</div>';
					}
					$output .= '</div>';
				}
				$output .= '</div>';
			endif;
			$output .='<div class="clear"></div>';
		} else {
			$output .= '<div class="aione-message warning">Invalid Slider</div>';
		}
	} else {
		$output .= '<div class="aione-message warning">Invalid Slider</div>';
	}
	return $output;
}