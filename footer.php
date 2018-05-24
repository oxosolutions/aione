		<?php get_template_part('template/aione-pagebottom');  ?>
		<?php get_template_part('template/aione-footer');  ?>
		<?php get_template_part('template/aione-copyright');  ?>
		
		</div><!-- .wrapper -->
	</div><!-- .aione-wrapper -->

	<?php wp_footer(); ?>
	<?php
	global $post;
	$pyre_custom_js = get_aione_page_option($post->ID,'pyre_custom_js');
	echo "---------------------------------------------------------------------".$pyre_custom_js;
	if($pyre_custom_js != "") {
		echo "<script>".$pyre_custom_js."</script>";
	}
	?>

	</body>
</html>
