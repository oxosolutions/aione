<?php
global $post, $theme_options; 

$global_js = $theme_options['custom_js'];
$custom_js = get_aione_page_option( $post->ID, 'pyre_custom_js' );
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

	<?php 
	wp_footer();

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

    $serviceworker = '';

    if( file_exists( $serviceworker_path ) ) {
		$serviceworker = "
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
		";
    }

	if( !empty( $global_js ) || !empty( $custom_js ) || !empty( $serviceworker ) ) {
		echo "<script>";

		if( !empty( $global_js ) ){
			echo $global_js;
		}

		if( !empty( $custom_js ) ) {
			echo $custom_js;
		}

		if( !empty( $serviceworker ) ){
			echo $serviceworker;
		}

		echo "</script>";
	}
	?>
	</body>
</html>
