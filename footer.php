		<?php get_template_part('template/aione-pagebottom');  ?>
		<?php get_template_part('template/aione-footer');  ?>
		<?php get_template_part('template/aione-copyright');  ?>

		<a href="#aione_wrapper" class="scrolltop"></a>
		
		</div><!-- .wrapper -->
	</div><!-- .aione-wrapper -->

	<?php wp_footer(); ?>
	<?php
	global $post;
	global $theme_options;
	$pyre_custom_js = get_aione_page_option($post->ID,'pyre_custom_js');
	if($theme_options['custom_js'] != "" ){
		echo "<script>".$theme_options['custom_js']."</script>";
	}
	if($pyre_custom_js != "") {
		echo "<script>".$pyre_custom_js."</script>";
	}
	?>

	</body>
</html>
