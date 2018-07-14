<?php if( is_enabled('slider_enable') ): ?>
	<?php 
	global $theme_options;
	global $post;

	$pyre_select_slider = get_aione_page_option($post->ID,'pyre_select_slider');
	$slider_id = $pyre_select_slider == 'default' ? @$theme_options['select_slider'] 
			: $pyre_select_slider;
	?>
	<div id="aione_slider" class="aione-slider <?php echo is_fullwidth('slider');?>">
		<div class="wrapper">
			<?php 
				if(!empty($slider_id)){
					echo do_shortcode( '[aione-slider id="'.$slider_id.'"]');
				}
			?>
		</div><!-- .wrapper -->
	</div><!-- .aione-slider -->
<?php endif;