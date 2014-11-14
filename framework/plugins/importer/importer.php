<?php
defined( 'ABSPATH' ) or die( 'You cannot access this script directly' );

// Don't resize images
function aione_filter_image_sizes( $sizes ) {
	return array();
}
// Hook importer into admin init
add_action( 'wp_ajax_aione_import_demo_data', 'aione_importer' );
function aione_importer() {
	global $wpdb;

	if ( current_user_can( 'manage_options' ) ) {
		if ( !defined('WP_LOAD_IMPORTERS') ) define('WP_LOAD_IMPORTERS', true); // we are loading importers

		if ( ! class_exists( 'WP_Importer' ) ) { // if main importer class doesn't exist
			$wp_importer = ABSPATH . 'wp-admin/includes/class-wp-importer.php';
			include $wp_importer;
		}

		if ( ! class_exists('WP_Import') ) { // if WP importer doesn't exist
			$wp_import = get_template_directory() . '/framework/plugins/importer/wordpress-importer.php';
			include $wp_import;
		}

		if ( class_exists( 'WP_Importer' ) && class_exists( 'WP_Import' ) ) { // check for main import class and wp import class

			add_filter('intermediate_image_sizes_advanced', 'aione_filter_image_sizes');

			/* Import Woocommerce if WooCommerce Exists */
			if( class_exists('Woocommerce') ) {
				$importer = new WP_Import();
				$theme_xml = get_template_directory() . '/framework/plugins/importer/data/aionewithwoo.xml.gz';
				$importer->fetch_attachments = true;
				ob_start();
				$importer->import($theme_xml);
				ob_end_clean();

				// Set pages
				$woopages = array(
					'woocommerce_shop_page_id' => 'Shop',
					'woocommerce_cart_page_id' => 'Cart',
					'woocommerce_checkout_page_id' => 'Checkout',
					'woocommerce_pay_page_id' => 'Checkout &#8594; Pay',
					'woocommerce_thanks_page_id' => 'Order Received',
					'woocommerce_myaccount_page_id' => 'My Account',
					'woocommerce_edit_address_page_id' => 'Edit My Address',
					'woocommerce_view_order_page_id' => 'View Order',
					'woocommerce_change_password_page_id' => 'Change Password',
					'woocommerce_logout_page_id' => 'Logout',
					'woocommerce_lost_password_page_id' => 'Lost Password'
				);
				foreach($woopages as $woo_page_name => $woo_page_title) {
					$woopage = get_page_by_title( $woo_page_title );
					if(isset( $woopage ) && $woopage->ID) {
						update_option($woo_page_name, $woopage->ID); // Front Page
					}
				}

				// We no longer need to install pages
				delete_option( '_wc_needs_pages' );
				delete_transient( '_wc_activation_redirect' );

				// Flush rules after install
				flush_rewrite_rules();
			} else {
				$importer = new WP_Import();
				/* Import Posts, Pages, Portfolio Content, FAQ, Images, Menus */
				$theme_xml = get_template_directory() . '/framework/plugins/importer/data/aionewithoutwoo.xml.gz';
				$importer->fetch_attachments = true;
				ob_start();
				$importer->import($theme_xml);
				ob_end_clean();
			}

			// Set imported menus to registered theme locations
			$locations = get_theme_mod( 'nav_menu_locations' ); // registered menu locations in theme
			$menus = wp_get_nav_menus(); // registered menus

			if($menus) {
				$opmenu = get_page_by_title( 'One Page' );
				foreach($menus as $menu) { // assign menus to theme locations
					if( $menu->name == 'Main' ) {
						$locations['main_navigation'] = $menu->term_id;
					} else if( $menu->name == '404' ) {
						$locations['404_pages'] = $menu->term_id;
					} else if( $menu->name == 'Top' ) {
						$locations['top_navigation'] = $menu->term_id;
					}

					// Assign One Page Menu
					if(isset( $opmenu ) && $opmenu->ID && $menu->name == 'One Page') {
						update_post_meta($opmenu->ID, 'pyre_displayed_menu', $menu->term_id);
					}
				}
			}

			set_theme_mod( 'nav_menu_locations', $locations ); // set menus to locations

			// Import Theme Options
			$theme_options_txt = get_template_directory_uri() . '/framework/plugins/importer/data/theme_options.txt'; // theme options data file
			$theme_options_txt = wp_remote_get( $theme_options_txt );
			$theme_options = unserialize( base64_decode( $theme_options_txt['body'])  );
			update_option( OPTIONS, $theme_options ); // update theme options

			// Add sidebar widget areas
			$sidebars = array(
				'ContactSidebar' => 'Contact Sidebar',
				'FAQ' => 'FAQ',
				'HomepageSidebar' => 'Home Page Sidebar',
				'Portfolio' => 'Portfolio',
				'Megamenu1' => 'Megamenu1',
				'Megamenu2' => 'Megamenu2'
			);
			update_option( 'sbg_sidebars', $sidebars );

			foreach( $sidebars as $sidebar ) {
				$sidebar_class = aione_name_to_class( $sidebar );
				register_sidebar(array(
					'name'=>$sidebar,
					'id' => 'aione-custom-sidebar-' . strtolower( $sidebar_class ),
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget' => '</div>',
					'before_title' => '<div class="heading"><h3>',
					'after_title' => '</h3></div>',
				));
			}

			// Add data to widgets
			$widgets_json = get_template_directory_uri() . '/framework/plugins/importer/data/widget_data.json'; // widgets data file
			$widgets_json = wp_remote_get( $widgets_json );
			$widget_data = $widgets_json['body'];
			$import_widgets = aione_import_widget_data( $widget_data );

			// Import Layerslider
			if( function_exists( 'layerslider_import_sample_slider' ) ) { // if layerslider is activated
				// Get importUtil
				include WP_PLUGIN_DIR . '/LayerSlider/classes/class.ls.importutil.php';
				$layer_directory = get_template_directory() . '/framework/plugins/importer/data/layersliders/'; // layerslider data dir

				foreach( glob( $layer_directory . '*.zip' ) as $filename ) { // get all files from revsliders data dir
					$filename = basename($filename);
					$layer_files[] = get_template_directory() . '/framework/plugins/importer/data/layersliders/' . $filename ;
				}

				foreach( $layer_files as $layer_file ) { // finally import layer slider
					$import = new LS_ImportUtil($layer_file);
				}

				// Get all sliders
				// Table name
				$table_name = $wpdb->prefix . "layerslider";

				// Get sliders
				$sliders = $wpdb->get_results( "SELECT * FROM $table_name
													WHERE flag_hidden = '0' AND flag_deleted = '0'
													ORDER BY date_c ASC" );

				if(!empty($sliders)):
				foreach($sliders as $key => $item):
					$slides[$item->id] = $item->name;
				endforeach;
				endif;

				if($slides){
					foreach($slides as $key => $val){
						$slides_array[$val] = $key;
					}
				}

				// Assign LayerSlider
				$lspage = get_page_by_title( 'Layer Slider' );
				if(isset( $lspage ) && $lspage->ID && $slides_array['Aione Full Width']) {
					update_post_meta($lspage->ID, 'pyre_slider', $slides_array['Aione Full Width']);
				}
			}

			// Import Revslider
			if( class_exists('UniteFunctionsRev') ) { // if revslider is activated
				$rev_directory = get_template_directory() . '/framework/plugins/importer/data/revsliders/'; // layerslider data dir

				foreach( glob( $rev_directory . '*.zip' ) as $filename ) { // get all files from revsliders data dir
					$filename = basename($filename);
					$rev_files[] = get_template_directory() . '/framework/plugins/importer/data/revsliders/' . $filename ;
				}

				foreach( $rev_files as $rev_file ) { // finally import rev slider data files
					/*$get_file = wp_remote_get( $rev_file );
					$arrSlider = unserialize( $get_file['body'] );

					$sliderParams = $arrSlider["params"];

					if(isset($sliderParams["background_image"])) {
						$sliderParams["background_image"] = UniteFunctionsWPRev::getImageUrlFromPath($sliderParams["background_image"]);
					}

					$json_params = json_encode($sliderParams);

					$arrInsert = array();
					$arrInsert["params"] = $json_params;
					$arrInsert["title"] = UniteFunctionsRev::getVal($sliderParams, "title","Slider1");
					$arrInsert["alias"] = UniteFunctionsRev::getVal($sliderParams, "alias","slider1");

					$wpdb->insert(GlobalsRevSlider::$table_sliders, $arrInsert);
					$sliderID = mysql_insert_id();

					//create all slides
					$arrSlides = $arrSlider["slides"];
					foreach($arrSlides as $slide){

						$params = $slide["params"];
						$layers = $slide["layers"];

						//convert params images:
						if(isset($params["image"])) {
							$params["image"] = UniteFunctionsWPRev::getImageUrlFromPath($params["image"]);
						}

						//convert layers images:
						foreach($layers as $key=>$layer){
							if(isset($layer["image_url"])){
								$layer["image_url"] = UniteFunctionsWPRev::getImageUrlFromPath($layer["image_url"]);
								$layers[$key] = $layer;
							}
						}

						//create new slide
						$arrCreate = array();
						$arrCreate["slider_id"] = $sliderID;
						$arrCreate["slide_order"] = $slide["slide_order"];
						$arrCreate["layers"] = json_encode($layers);
						$arrCreate["params"] = json_encode($params);

						$wpdb->insert(GlobalsRevSlider::$table_slides,$arrCreate);*/

						$filepath = $rev_file;

						//if(file_exists($filepath) == false)
							//UniteFunctionsRev::throwError("Import file not found!!!");

						//check if zip file or fallback to old, if zip, check if all files exist
						$zip = new ZipArchive;
						$importZip = $zip->open($filepath, ZIPARCHIVE::CREATE);

						if($importZip === true){ //true or integer. If integer, its not a correct zip file

							//check if files all exist in zip
							$slider_export = $zip->getStream('slider_export.txt');
							$custom_animations = $zip->getStream('custom_animations.txt');
							$dynamic_captions = $zip->getStream('dynamic-captions.css');
							$static_captions = $zip->getStream('static-captions.css');

							//if(!$slider_export)  UniteFunctionsRev::throwError("slider_export.txt does not exist!");
							//if(!$custom_animations)  UniteFunctionsRev::throwError("custom_animations.txt does not exist!");
							//if(!$dynamic_captions) UniteFunctionsRev::throwError("dynamic-captions.css does not exist!");
							//if(!$static_captions)  UniteFunctionsRev::throwError("static-captions.css does not exist!");

							$content = '';
							$animations = '';
							$dynamic = '';
							$static = '';

							while (!feof($slider_export)) $content .= fread($slider_export, 1024);
							if($custom_animations){ while (!feof($custom_animations)) $animations .= fread($custom_animations, 1024); }
							if($dynamic_captions){ while (!feof($dynamic_captions)) $dynamic .= fread($dynamic_captions, 1024); }
							if($static_captions){ while (!feof($static_captions)) $static .= fread($static_captions, 1024); }

							fclose($slider_export);
							if($custom_animations){ fclose($custom_animations); }
							if($dynamic_captions){ fclose($dynamic_captions); }
							if($static_captions){ fclose($static_captions); }

							//check for images!

						}else{ //check if fallback
							//get content array
							$content = @file_get_contents($filepath);
						}

						if($importZip === true){ //we have a zip
							$db = new UniteDBRev();

							//update/insert custom animations
							$animations = @unserialize($animations);
							if(!empty($animations)){
								foreach($animations as $key => $animation){ //$animation['id'], $animation['handle'], $animation['params']
									$exist = $db->fetch(GlobalsRevSlider::$table_layer_anims, "handle = '".$animation['handle']."'");
									if(!empty($exist)){ //update the animation, get the ID
										if($updateAnim == "true"){ //overwrite animation if exists
											$arrUpdate = array();
											$arrUpdate['params'] = stripslashes(json_encode(str_replace("'", '"', $animation['params'])));
											$db->update(GlobalsRevSlider::$table_layer_anims, $arrUpdate, array('handle' => $animation['handle']));

											$id = $exist['0']['id'];
										}else{ //insert with new handle
											$arrInsert = array();
											$arrInsert["handle"] = 'copy_'.$animation['handle'];
											$arrInsert["params"] = stripslashes(json_encode(str_replace("'", '"', $animation['params'])));

											$id = $db->insert(GlobalsRevSlider::$table_layer_anims, $arrInsert);
										}
									}else{ //insert the animation, get the ID
										$arrInsert = array();
										$arrInsert["handle"] = $animation['handle'];
										$arrInsert["params"] = stripslashes(json_encode(str_replace("'", '"', $animation['params'])));

										$id = $db->insert(GlobalsRevSlider::$table_layer_anims, $arrInsert);
									}

									//and set the current customin-oldID and customout-oldID in slider params to new ID from $id
									$content = str_replace(array('customin-'.$animation['id'], 'customout-'.$animation['id']), array('customin-'.$id, 'customout-'.$id), $content);
								}
								//dmp(__("animations imported!",REVSLIDER_TEXTDOMAIN));
							}else{
								//dmp(__("no custom animations found, if slider uses custom animations, the provided export may be broken...",REVSLIDER_TEXTDOMAIN));
							}

							//overwrite/append static-captions.css
							if(!empty($static)){
								if(isset( $updateStatic ) && $updateStatic == "true"){ //overwrite file
									RevOperations::updateStaticCss($static);
								}else{ //append
									$static_cur = RevOperations::getStaticCss();
									$static = $static_cur."\n".$static;
									RevOperations::updateStaticCss($static);
								}
							}
							//overwrite/create dynamic-captions.css
							//parse css to classes
							$dynamicCss = UniteCssParserRev::parseCssToArray($dynamic);

							if(is_array($dynamicCss) && $dynamicCss !== false && count($dynamicCss) > 0){
								foreach($dynamicCss as $class => $styles){
									//check if static style or dynamic style
									$class = trim($class);

									if((strpos($class, ':hover') === false && strpos($class, ':') !== false) || //before, after
										strpos($class," ") !== false || // .tp-caption.imageclass img or .tp-caption .imageclass or .tp-caption.imageclass .img
										strpos($class,".tp-caption") === false || // everything that is not tp-caption
										(strpos($class,".") === false || strpos($class,"#") !== false) || // no class -> #ID or img
										strpos($class,">") !== false){ //.tp-caption>.imageclass or .tp-caption.imageclass>img or .tp-caption.imageclass .img
										continue;
									}

									//is a dynamic style
									if(strpos($class, ':hover') !== false){
										$class = trim(str_replace(':hover', '', $class));
										$arrInsert = array();
										$arrInsert["hover"] = json_encode($styles);
										$arrInsert["settings"] = json_encode(array('hover' => 'true'));
									}else{
										$arrInsert = array();
										$arrInsert["params"] = json_encode($styles);
									}
									//check if class exists
									$result = $db->fetch(GlobalsRevSlider::$table_css, "handle = '".$class."'");

									if(!empty($result)){ //update
										$db->update(GlobalsRevSlider::$table_css, $arrInsert, array('handle' => $class));
									}else{ //insert
										$arrInsert["handle"] = $class;
										$db->insert(GlobalsRevSlider::$table_css, $arrInsert);
									}
								}
								//dmp(__("dynamic styles imported!",REVSLIDER_TEXTDOMAIN));
							}else{
								//dmp(__("no dynamic styles found, if slider uses dynamic styles, the provided export may be broken...",REVSLIDER_TEXTDOMAIN));
							}
						}

						$content = preg_replace('!s:(\d+):"(.*?)";!e', "'s:'.strlen('$2').':\"$2\";'", $content); //clear errors in string

						$arrSlider = @unserialize($content);
						$sliderParams = $arrSlider["params"];

						if(isset($sliderParams["background_image"]))
							$sliderParams["background_image"] = UniteFunctionsWPRev::getImageUrlFromPath($sliderParams["background_image"]);

						$json_params = json_encode($sliderParams);

						//new slider
						$arrInsert = array();
						$arrInsert["params"] = $json_params;
						$arrInsert["title"] = UniteFunctionsRev::getVal($sliderParams, "title","Slider1");
						$arrInsert["alias"] = UniteFunctionsRev::getVal($sliderParams, "alias","slider1");
						$sliderID = $wpdb->insert(GlobalsRevSlider::$table_sliders,$arrInsert);
						$sliderID = $wpdb->insert_id;

						//-------- Slides Handle -----------

						//create all slides
						$arrSlides = $arrSlider["slides"];

						$alreadyImported = array();

						foreach($arrSlides as $slide){

							$params = $slide["params"];
							$layers = $slide["layers"];

							//convert params images:
							if(isset($params["image"])){
								//import if exists in zip folder
								if(trim($params["image"]) !== ''){
									if($importZip === true){ //we have a zip, check if exists
										$image = $zip->getStream('images/'.$params["image"]);
										if(!$image){
											echo $params["image"].' not found!<br>';
										}else{
											if(!isset($alreadyImported['zip://'.$filepath."#".'images/'.$params["image"]])){
												$importImage = UniteFunctionsWPRev::import_media('zip://'.$filepath."#".'images/'.$params["image"], $sliderParams["alias"].'/');

												if($importImage !== false){
													$alreadyImported['zip://'.$filepath."#".'images/'.$params["image"]] = $importImage['path'];

													$params["image"] = $importImage['path'];
												}
											}else{
												$params["image"] = $alreadyImported['zip://'.$filepath."#".'images/'.$params["image"]];
											}
										}
									}
								}
								$params["image"] = UniteFunctionsWPRev::getImageUrlFromPath($params["image"]);
							}

							//convert layers images:
							foreach($layers as $key=>$layer){
								if(isset($layer["image_url"])){
									//import if exists in zip folder
									if(trim($layer["image_url"]) !== ''){
										if($importZip === true){ //we have a zip, check if exists
											$image_url = $zip->getStream('images/'.$layer["image_url"]);
											if(!$image_url){
												echo $layer["image_url"].' not found!<br>';
											}else{
												if(!isset($alreadyImported['zip://'.$filepath."#".'images/'.$layer["image_url"]])){
													$importImage = UniteFunctionsWPRev::import_media('zip://'.$filepath."#".'images/'.$layer["image_url"], $sliderParams["alias"].'/');

													if($importImage !== false){
														$alreadyImported['zip://'.$filepath."#".'images/'.$layer["image_url"]] = $importImage['path'];

														$layer["image_url"] = $importImage['path'];
													}
												}else{
													$layer["image_url"] = $alreadyImported['zip://'.$filepath."#".'images/'.$layer["image_url"]];
												}
											}
										}
									}
									$layer["image_url"] = UniteFunctionsWPRev::getImageUrlFromPath($layer["image_url"]);
									$layers[$key] = $layer;
								}
							}

							//create new slide
							$arrCreate = array();
							$arrCreate["slider_id"] = $sliderID;
							$arrCreate["slide_order"] = $slide["slide_order"];
							$arrCreate["layers"] = json_encode($layers);
							$arrCreate["params"] = json_encode($params);

							$wpdb->insert(GlobalsRevSlider::$table_slides,$arrCreate);
						//}
					}
				}
			}

			// Set reading options
			$homepage = get_page_by_title( 'Home Version 18' );
			$posts_page = get_page_by_title( 'Blog Large' );
			if(isset( $homepage ) && $homepage->ID && isset( $posts_page ) && $posts_page->ID) {
				update_option('show_on_front', 'page');
				update_option('page_on_front', $homepage->ID); // Front Page
				update_option('page_for_posts', $posts_page->ID); // Blog Page
			}

			// AIONE Sliders Import
			$fs_url = get_template_directory() . '/framework/plugins/importer/data/aione_slider.zip';
			@aione_import_fsliders( $fs_url );

			echo 'imported';

			exit;
		}
	}
}

// Parsing Widgets Function
// Thanks to http://wordpress.org/plugins/widget-settings-importexport/
function aione_import_widget_data( $widget_data ) {
	$json_data = $widget_data;
	$json_data = json_decode( $json_data, true );

	$sidebar_data = $json_data[0];
	$widget_data = $json_data[1];

	foreach ( $widget_data as $widget_data_title => $widget_data_value ) {
		$widgets[ $widget_data_title ] = '';
		foreach( $widget_data_value as $widget_data_key => $widget_data_array ) {
			if( is_int( $widget_data_key ) ) {
				$widgets[$widget_data_title][$widget_data_key] = 'on';
			}
		}
	}
	unset($widgets[""]);

	foreach ( $sidebar_data as $title => $sidebar ) {
		$count = count( $sidebar );
		for ( $i = 0; $i < $count; $i++ ) {
			$widget = array( );
			$widget['type'] = trim( substr( $sidebar[$i], 0, strrpos( $sidebar[$i], '-' ) ) );
			$widget['type-index'] = trim( substr( $sidebar[$i], strrpos( $sidebar[$i], '-' ) + 1 ) );
			if ( !isset( $widgets[$widget['type']][$widget['type-index']] ) ) {
				unset( $sidebar_data[$title][$i] );
			}
		}
		$sidebar_data[$title] = array_values( $sidebar_data[$title] );
	}

	foreach ( $widgets as $widget_title => $widget_value ) {
		foreach ( $widget_value as $widget_key => $widget_value ) {
			$widgets[$widget_title][$widget_key] = $widget_data[$widget_title][$widget_key];
		}
	}

	$sidebar_data = array( array_filter( $sidebar_data ), $widgets );

	aione_parse_import_data( $sidebar_data );
}

function aione_parse_import_data( $import_array ) {
	global $wp_registered_sidebars;
	$sidebars_data = $import_array[0];
	$widget_data = $import_array[1];
	$current_sidebars = get_option( 'sidebars_widgets' );
	$new_widgets = array( );

	foreach ( $sidebars_data as $import_sidebar => $import_widgets ) :

		foreach ( $import_widgets as $import_widget ) :
			//if the sidebar exists
			if ( isset( $wp_registered_sidebars[$import_sidebar] ) ) :
				$title = trim( substr( $import_widget, 0, strrpos( $import_widget, '-' ) ) );
				$index = trim( substr( $import_widget, strrpos( $import_widget, '-' ) + 1 ) );
				$current_widget_data = get_option( 'widget_' . $title );
				$new_widget_name = aione_get_new_widget_name( $title, $index );
				$new_index = trim( substr( $new_widget_name, strrpos( $new_widget_name, '-' ) + 1 ) );

				if ( !empty( $new_widgets[ $title ] ) && is_array( $new_widgets[$title] ) ) {
					while ( array_key_exists( $new_index, $new_widgets[$title] ) ) {
						$new_index++;
					}
				}
				$current_sidebars[$import_sidebar][] = $title . '-' . $new_index;
				if ( array_key_exists( $title, $new_widgets ) ) {
					$new_widgets[$title][$new_index] = $widget_data[$title][$index];
					$multiwidget = $new_widgets[$title]['_multiwidget'];
					unset( $new_widgets[$title]['_multiwidget'] );
					$new_widgets[$title]['_multiwidget'] = $multiwidget;
				} else {
					$current_widget_data[$new_index] = $widget_data[$title][$index];
					$current_multiwidget = isset($current_widget_data['_multiwidget']) ? $current_widget_data['_multiwidget'] : false;
					$new_multiwidget = isset($widget_data[$title]['_multiwidget']) ? $widget_data[$title]['_multiwidget'] : false;
					$multiwidget = ($current_multiwidget != $new_multiwidget) ? $current_multiwidget : 1;
					unset( $current_widget_data['_multiwidget'] );
					$current_widget_data['_multiwidget'] = $multiwidget;
					$new_widgets[$title] = $current_widget_data;
				}

			endif;
		endforeach;
	endforeach;

	if ( isset( $new_widgets ) && isset( $current_sidebars ) ) {
		update_option( 'sidebars_widgets', $current_sidebars );

		foreach ( $new_widgets as $title => $content )
			update_option( 'widget_' . $title, $content );

		return true;
	}

	return false;
}

function aione_get_new_widget_name( $widget_name, $widget_index ) {
	$current_sidebars = get_option( 'sidebars_widgets' );
	$all_widget_array = array( );
	foreach ( $current_sidebars as $sidebar => $widgets ) {
		if ( !empty( $widgets ) && is_array( $widgets ) && $sidebar != 'wp_inactive_widgets' ) {
			foreach ( $widgets as $widget ) {
				$all_widget_array[] = $widget;
			}
		}
	}
	while ( in_array( $widget_name . '-' . $widget_index, $all_widget_array ) ) {
		$widget_index++;
	}
	$new_widget_name = $widget_name . '-' . $widget_index;
	return $new_widget_name;
}

if( function_exists( 'layerslider_import_sample_slider' ) ) {
	function aione_import_sample_slider( $layerslider_data ) {
		// Base64 encoded, serialized slider export code
		$sample_slider = $layerslider_data;

		// Iterate over the sliders
		foreach($sample_slider as $sliderkey => $slider) {

			// Iterate over the layers
			foreach($sample_slider[$sliderkey]['layers'] as $layerkey => $layer) {

				// Change background images if any
				if(!empty($sample_slider[$sliderkey]['layers'][$layerkey]['properties']['background'])) {
					$sample_slider[$sliderkey]['layers'][$layerkey]['properties']['background'] = LS_ROOT_URL.'sampleslider/'.basename($layer['properties']['background']);
				}

				// Change thumbnail images if any
				if(!empty($sample_slider[$sliderkey]['layers'][$layerkey]['properties']['thumbnail'])) {
					$sample_slider[$sliderkey]['layers'][$layerkey]['properties']['thumbnail'] = LS_ROOT_URL.'sampleslider/'.basename($layer['properties']['thumbnail']);
				}

				// Iterate over the sublayers
				if(isset($layer['sublayers']) && !empty($layer['sublayers'])) {
					foreach($layer['sublayers'] as $sublayerkey => $sublayer) {

						// Only IMG sublayers
						if($sublayer['type'] == 'img') {
							$sample_slider[$sliderkey]['layers'][$layerkey]['sublayers'][$sublayerkey]['image'] = LS_ROOT_URL.'sampleslider/'.basename($sublayer['image']);
						}
					}
				}
			}
		}

		// Get WPDB Object
		global $wpdb;

		// Table name
		$table_name = $wpdb->prefix . "layerslider";

		// Append duplicate
		foreach($sample_slider as $key => $val) {

			// Insert the duplicate
			$wpdb->query(
				$wpdb->prepare("INSERT INTO $table_name
									(name, data, date_c, date_m)
								VALUES (%s, %s, %d, %d)",
								$val['properties']['title'],
								json_encode($val),
								time(),
								time()
				)
			);
		}
	}
}

// Rename sidebar
function aione_name_to_class($name){
	$class = str_replace(array(' ',',','.','"',"'",'/',"\\",'+','=',')','(','*','&','^','%','$','#','@','!','~','`','<','>','?','[',']','{','}','|',':',),'',$name);
	return $class;
}

/**
 * Import AIONE Sliders
 */
function aione_import_fsliders( $zip_file ) {
	$upload_dir = wp_upload_dir();
	$base_dir = trailingslashit( $upload_dir['basedir'] );
	$fs_dir = $base_dir . 'aione_slider_exports/';

	@unlink ( $fs_dir . 'sliders.xml' );
	@unlink ( $fs_dir . 'settings.json' );

	$zip = new ZipArchive();
	$zip->open( $zip_file );
	$zip->extractTo( $fs_dir );
	$zip->close();

	if ( !defined('WP_LOAD_IMPORTERS') ) {
		define('WP_LOAD_IMPORTERS', true);
	}

	if ( ! class_exists( 'WP_Importer' ) ) { // if main importer class doesn't exist
		$wp_importer = ABSPATH . 'wp-admin/includes/class-wp-importer.php';
		include $wp_importer;
	}

	if ( ! class_exists('WP_Import') ) { // if WP importer doesn't exist
		$wp_import = plugin_dir_path( __FILE__ ) . 'libs/wordpress-importer.php';
		include $wp_import;
	}

	if ( class_exists( 'WP_Importer' ) && class_exists( 'WP_Import' ) ) {
		$importer = new WP_Import();
		$xml = $fs_dir . 'sliders.xml';
		$importer->fetch_attachments = true;
		ob_start();
		$importer->import($xml);
		ob_end_clean();

		$loop = new WP_Query( array( 'post_type' => 'slide', 'posts_per_page' => -1, 'meta_key' => '_thumbnail_id' ) );

		while( $loop->have_posts() ) { $loop->the_post();
			$thumbnail_ids[get_post_meta( get_the_ID(), '_thumbnail_id', true )] = get_the_ID();
		}

		foreach( new DirectoryIterator( $fs_dir ) as $file ) {
			if( $file->isDot() || $file->getFilename() == '.DS_Store' ) {
				continue;
			}

			$image_path = pathinfo( $fs_dir . $file->getFilename() );
			if( $image_path['extension'] != 'xml' && $image_path['extension'] != 'json' ) {
				$filename = $image_path['filename'];
				$new_image_path = $upload_dir['path'] . '/' . $image_path['basename'];
				$new_image_url = $upload_dir['url'] . '/' . $image_path['basename'];
				@copy( $fs_dir . $file->getFilename(), $new_image_path );

				// Check the type of tile. We'll use this as the 'post_mime_type'.
				$filetype = wp_check_filetype( basename( $new_image_path ), null );

				// Prepare an array of post data for the attachment.
				$attachment = array(
					'guid'		   => $new_image_url, 
					'post_mime_type' => $filetype['type'],
					'post_title'	 => preg_replace( '/\.[^.]+$/', '', basename( $new_image_path ) ),
					'post_content'   => '',
					'post_status'	=> 'inherit'
				);

				// Insert the attachment.
				$attach_id = wp_insert_attachment( $attachment, $new_image_path, $thumbnail_ids[$filename] );

				// Make sure that this file is included, as wp_generate_attachment_metadata() depends on it.
				require_once( ABSPATH . 'wp-admin/includes/image.php' );

				// Generate the metadata for the attachment, and update the database record.
				$attach_data = wp_generate_attachment_metadata( $attach_id, $new_image_path );
				wp_update_attachment_metadata( $attach_id, $attach_data );

				set_post_thumbnail( $thumbnail_ids[$filename], $attach_id );
			}
		}

		$url = wp_nonce_url( 'edit.php?post_type=slide&page=fs_export_import' );
		if (false === ($creds = request_filesystem_credentials($url, '', false, false, null) ) ) {
			return; // stop processing here
		}

		if( WP_Filesystem( $creds ) ) {
			global $wp_filesystem;

			$settings = $wp_filesystem->get_contents( $fs_dir . 'settings.json' );
			
			$decode = json_decode( $settings, TRUE );

			foreach( $decode as $slug => $settings ) {
				$get_term = get_term_by( 'slug', $slug, 'slide-page' );

				if( $get_term ) {
					update_option( 'taxonomy_' . $get_term->term_id, $settings );
				}
			}
		}
	}
}