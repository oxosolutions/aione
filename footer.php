<?php
global $post, $theme_options;

$global_js = $theme_options['custom_js'];
$custom_js = get_aione_page_settings( $post->ID,'aione_per_page_setting', 'pyre_custom_js' );

?>
		<?php get_template_part( 'template/aione-pagebottom' );  ?>
		<?php get_template_part( 'template/aione-footer' );  ?>
		<?php get_template_part( 'template/aione-copyright' );  ?>
		<?php get_template_part( 'template/aione-powered-by' );  ?>

		<?php if( $theme_options['header_position'] != 'top' ) { 
			echo '</div>';
		} ?>

		<a href="#aione_wrapper" class="scrolltop" title="Scroll to top of the page"></a>
		
		</div><!-- .wrapper -->
	</div><!-- .aione-wrapper -->

	<?php 
	wp_footer();
	?>

	<?php
	if( $theme_options['advanced_use_cdn'] ) {

		if( $theme_options['advanced_load_css_bottom'] ) {
			echo '<link href="https://cdn.darlic.com/wp-content/themes/aione/assets/css/aione.min.css" rel="stylesheet" media="all">';
		}

		$defer = $async = '';
		if( $theme_options['advanced_deffer_js'] ) { $defer = 'defer';}
		if( $theme_options['advanced_async_js'] ) { $async = 'async';}

		if( $theme_options['advanced_load_js_bottom'] ) {
			echo '<script '.$defer.' '. $async.' src="https://cdn.darlic.com/wp-content/themes/aione/assets/js/aione.min.js"></script>';
		}

	}

	if( $theme_options['advanced_load_css_bottom'] ) {
		get_template_part( 'template/aione-custom-css' );
	} 

	$upload = wp_upload_dir();
    $upload_url = $upload['baseurl'];
	$upload_path = $upload['basedir'];

	/*
	_to_be_deleted

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
				var serviceworkerPath = '".$serviceworker_url."';
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
    ?>
	<script>
		var ajaxurl = "<?php echo esc_url(admin_url( 'admin-ajax.php' )); ?>";
		
	<?php
	if( !empty( $global_js ) || !empty( $custom_js ) || !empty( $serviceworker ) ) {

		if( !empty( $global_js ) ) {
			echo $global_js;
		}

		if( !empty( $custom_js ) ) {
			echo $custom_js;
		}

		/*

		if( !empty( $serviceworker ) ) {
			echo wp_kses_post($serviceworker);
		}
		*/

	}
	?>
	</script>
	<?php 
if( !empty( $theme_options['code_body_end'] ) ) { 
	echo do_shortcode( $theme_options['code_body_end'] );
}
?>
	</body>
</html>
