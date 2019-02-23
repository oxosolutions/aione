<?php 
global $post;
global $theme_options;

if( is_enabled( $post->ID, 'slider_enable' ) ) :

	//$pyre_select_slider = get_aione_page_option( $post->ID,'pyre_select_slider' );
	$pyre_select_slider = get_aione_page_settings( $post->ID,'aione_per_page_setting','pyre_select_slider' );
	$slider_id = $pyre_select_slider == 'default' ? $theme_options['select_slider'] 
			: $pyre_select_slider;

	?>
	<div id="aione_slider" class="aione-slider <?php echo esc_html( is_fullwidth( $post->ID, 'slider' ) );?>">
		<div class="wrapper">
			<?php 
				if( !empty( $slider_id ) ) { 
					echo do_shortcode( '[aione-slider id="'.$slider_id.'"]' );
				}
			?>
		</div><!-- .wrapper -->
	</div><!-- .aione-slider -->
<?php endif;