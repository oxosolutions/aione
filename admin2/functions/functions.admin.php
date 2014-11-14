<?php
/**
 * SMOF Admin
 *
 * @package	 WordPress
 * @subpackage  SMOF
 * @since	   1.4.0
 * @author	  Syamil MJ
 */
 

/**
 * Head Hook
 *
 * @since 1.0.0
 */
function of_head() { do_action( 'of_head' ); }

/**
 * Add default options upon activation else DB does not exist
 *
 * @since 1.0.0
 */
function of_option_setup()	
{
	global $of_options, $options_machine;
	$options_machine = new Options_Machine($of_options);
		
	if (!of_get_options())
	{
		of_save_options($options_machine->Defaults);
	}
}

/**
 * Change activation message
 *
 * @since 1.0.0
 */
function optionsframework_admin_message() { 
	
	//Tweaked the message on theme activate
	?>
	<script type="text/javascript">
	jQuery(function(){
		
		var message = <?php echo json_encode('<p>'.sprintf(__('This theme comes with an %s to configure settings. This theme also supports widgets, please visit the %s widgets settings page to configure them.', 'Aione'), '<a href="'.admin_url('admin.php?page=optionsframework').'">'.__('options panel', 'Aione').'</a>', '<a href="'.admin_url('widgets.php').'"></a>').'</p>'); ?>;
		jQuery('.themes-php #message2').html(message);
	
	});
	</script>
	<?php
	
}

/**
 * Get header classes
 *
 * @since 1.0.0
 */
function of_get_header_classes_array() 
{
	global $of_options;
	
	foreach ($of_options as $value) 
	{
		if ($value['type'] == 'heading')
			$hooks[] = str_replace(' ','',strtolower($value['name']));	
	}
	
	return $hooks;
}

/**
 * Get options from the database and process them with the load filter hook.
 *
 * @author Jonah Dahlquist
 * @since 1.4.0
 * @return array
 */
function of_get_options($key = null, $data = null) {
	if ($key != null) { // Get one specific value
		//$data = get_theme_mod($key, $data);
	} else { // Get all values
		$data = get_option(OPTIONS);
	}

	return $data;
}

/**
 * Save options to the database after processing them
 *
 * @param $data Options array to save
 * @author Jonah Dahlquist
 * @since 1.4.0
 * @uses update_option()
 * @return void
 */

function of_save_options($data, $key = null) {
	global $smof_data, $theme_name;
	if (empty($data)) {
		return;
	}

	$data_from_db = $data;

	if(defined('ICL_LANGUAGE_CODE') && isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
		if( defined('ICL_SITEPRESS_VERSION') ) {
			global $sitepress;
			$languages = icl_get_languages('skip_missing=1');
		} elseif( function_exists( 'pll_languages_list' ) ) {
			$languages = pll_languages_list();
		}

		if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
			$url = $_SERVER['HTTP_REFERER'];
		} else {
			$url = $_SERVER['REQUEST_URI'];
		}

		if($url) {
			$parse_referer = parse_url($url);
			wp_parse_str($parse_referer['query'], $parse_query);
			if( isset( $parse_query['lang'] ) && $parse_query['lang'] == 'all' ) {
				foreach($data as $posted_key => $posted_data) {
					if($data_from_db[$posted_key] != $posted_data) {
						$data[$posted_key] = $posted_data;
					}
				}
				foreach($languages as $language) {
					$language_name = '';
					if($language['language_code'] != 'all') {
						$language_name = '_'.$language['language_code'];
					}
					if( $language['language_code'] == 'en' ) {
						$language_name = '';
					}

					$options_name = $theme_name.'_options'.$language_name;
					update_option($options_name, $data);
				}
			} elseif( isset( $parse_query['lang'] ) && $parse_query['lang'] && $parse_query['lang'] != 'all' && $parse_query['lang'] != 'en' ) {
				$language_name = '_' . $parse_query['lang'];
				$options_name = $theme_name.'_options'.$language_name;
				update_option($options_name, $data);
			} elseif( isset( $_POST['wpml'] ) && $_POST['wpml'] != 'all' && $_POST['wpml'] != 'en' ) {
				$language_name = '_' . $_POST['wpml'];
				$options_name = $theme_name.'_options'.$language_name;
				update_option($options_name, $data);
			} else {
				update_option(OPTIONS, $data);
			}
		} else {
			update_option(OPTIONS, $data);
		}
	} else {
		update_option(OPTIONS, $data);
	}

}


/**
 * For use in themes
 *
 * @since forever
 */
$data = of_get_options();
$smof_data = of_get_options();
$data = $smof_data;