<?php
global $theme_options; 
?>
		<?php get_template_part('template/aione-pagebottom');  ?>
		<?php get_template_part('template/aione-footer');  ?>
		<?php get_template_part('template/aione-copyright');  ?>
		<?php get_template_part('template/aione-powered-by');  ?>
		<?php if(@$theme_options['header_position'] != 'top'){ 
			echo '</div>';
		} ?>
		<a href="#aione_wrapper" class="scrolltop" title="Scroll to top of the page"></a>
		
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
    $upload = wp_upload_dir();
    $upload_url = $upload['baseurl'];
	$upload_path = $upload['basedir'];
	/*
    if( is_ssl() ){
      	$upload_url = str_replace( 'http://', 'https://', $upload_url );
    } else {
      	$upload_url = str_replace( 'https://', 'http://', $upload_url );
    }*/
    $serviceworker_url = $upload_url.'/pwa/serviceworker.js';
    $serviceworker_path = $upload_path.'/pwa/serviceworker.js';

	?>
	<script >
		if ('serviceWorker' in navigator) {
			//navigator.serviceWorker.register('/serviceworker.js', { scope: '/' }).then(function(reg) {
			var serviceworkerPath = '<?php echo $serviceworker_url; ?>';
			navigator.serviceWorker.register(serviceworkerPath).then(function(reg) {

			if(reg.installing) {
				console.log('Service worker installing');
			} else if(reg.waiting) {
				console.log('Service worker installed');
			} else if(reg.active) {
				console.log('Service worker active');
			}
			 console.log('ServiceWorker registration successful with scope: ', reg.scope);

			}).catch(function(error) {
				console.log('Registration failed with ' + error);
			});
		}
    </script>
	</body>
</html>
