<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<?php
global $theme_options;
global $post;



$post_content_excerpt = strip_shortcodes(strip_tags(wp_kses_no_null(wp_trim_words($post->post_content, 30, ''))));

	//Meta description 
//$pyre_meta_description = get_aione_page_option($post->ID, 'pyre_meta_description');
$pyre_meta_description = get_aione_page_settings($post->ID, 'aione_per_page_setting','pyre_meta_description');

	//Show content/title if empty meta description 
if (empty($pyre_meta_description)) {
	$pyre_meta_description = $post_content_excerpt;
}
if (empty($pyre_meta_description)) {
	$pyre_meta_description = get_the_title($post->ID);
}

	//Meta keywords
//$pyre_meta_keywords = get_aione_page_option($post->ID, 'pyre_meta_keywords');
$pyre_meta_keywords = get_aione_page_settings($post->ID, 'aione_per_page_setting','pyre_meta_keywords');

	//Open Graph title
//$pyre_og_title = get_aione_page_option($post->ID, 'pyre_og_title');
$pyre_og_title = get_aione_page_settings($post->ID, 'aione_per_page_setting','pyre_og_title');
if (empty($pyre_og_title)) {
	$pyre_og_title = get_the_title($post->ID);
}

	//Open Graph description
//$pyre_og_description = get_aione_page_option($post->ID, 'pyre_og_description');
$pyre_og_description = get_aione_page_settings($post->ID, 'aione_per_page_setting','pyre_og_description');

	//Show content/title if empty meta description 
if (empty($pyre_og_description)) {
	$pyre_og_description = $pyre_meta_description;
}
	
	//Open Graph URL
//$pyre_og_url = get_aione_page_option($post->ID, 'pyre_og_url');
$pyre_og_url = get_aione_page_settings($post->ID, 'aione_per_page_setting','pyre_og_url');
if (empty($pyre_og_url)) {
	$pyre_og_url = get_the_permalink();
}

	//Open Graph image
//$pyre_og_image = get_aione_page_option($post->ID, 'pyre_og_image');
$pyre_og_image = get_aione_page_settings($post->ID, 'aione_per_page_setting','pyre_og_image');

	//Show featured image if image is empty 
if (empty($pyre_og_image)) {
	$pyre_og_image = get_the_post_thumbnail_url($post->ID, 'medium');
}
	//Show logo if image is empty 
if (empty($pyre_og_image)) {
	$pyre_og_image = $theme_options['header_logo']['url'];
}

?>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="<?php echo esc_textarea($pyre_meta_description); ?>" />
	<meta name="keywords" content="<?php echo esc_textarea($pyre_meta_keywords); ?>" />

	<meta property="og:title" content="<?php echo esc_html($pyre_og_title); ?>" />
	<meta property="og:description" content="<?php echo esc_textarea($pyre_og_description); ?>" />
	<meta property="og:url" content="<?php echo esc_url($pyre_og_url); ?>" />
	<meta property="og:site_name" content="<?php echo esc_html(get_bloginfo()); ?>" />
	<meta property="og:image" content="<?php echo esc_url($pyre_og_image); ?>" />

	<meta name="twitter:title" content="<?php echo esc_html($pyre_og_title); ?>" />
	<meta name="twitter:description" content="<?php echo esc_textarea($pyre_og_description); ?>" />
	<meta name="twitter:url" content="<?php echo esc_url($pyre_og_url); ?>" />
	<meta name="twitter:site" content="<?php echo esc_html(get_bloginfo()); ?>" />
	<meta name="twitter:image" content="<?php echo esc_url($pyre_og_image); ?>" />

	<meta name="theme-color" content="#168dc5" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />

	<?php
	if( $theme_options['advanced_use_cdn'] ) {
	?>

	<link rel="dns-prefetch" href="https://cdn.darlic.com" />
	<?php
	// <link rel="preload" href="https://cdn.darlic.com">
	// <link rel="preconnect" href="https://cdn.darlic.com">

	
	$defer = $async = '';
	if( $theme_options['advanced_deffer_js'] ) { $defer = 'defer';}
	if( $theme_options['advanced_async_js'] ) { $async = 'async';}

	if( $theme_options['advanced_load_css_bottom'] ) {
		echo '<link href="https://cdn.darlic.com/wp-content/themes/aione/assets/css/core.min.css" rel="stylesheet" media="all">';
	} else{
		echo '<link href="https://cdn.darlic.com/wp-content/themes/aione/assets/css/aionefull.min.css" rel="stylesheet" media="all">';
	}

	if( !$theme_options['advanced_load_js_bottom'] ) {
		echo '<script '.$defer.' '. $async.' src="https://cdn.darlic.com/wp-content/themes/aione/assets/js/aione.min.js"></script>';
	}
	?>
	
	
	<?php
	}
	?>

	<!-- Headstart -->
	<?php wp_head(); ?>
	<!-- Headend -->
	<?php

	$google_analytics = $theme_options['google_analytics_id'];
	if( !empty( $google_analytics ) ) {
		?>
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $google_analytics; ?>"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', '<?php echo $google_analytics; ?>');
		</script>

		<?php
	}

/*
$upload = wp_upload_dir();
$upload_url = $upload['baseurl'];
$upload_path = $upload['basedir'];


if (is_ssl()) {
	$upload_url = str_replace('http://', 'https://', $upload_url);
} else {
	$upload_url = str_replace('https://', 'http://', $upload_url);
}

$manifest_url = $upload_url . '/pwa/manifest.json';
$manifest_path = $upload_path . '/pwa/manifest.json';

if (file_exists($manifest_path)) {
	echo '<link rel="manifest" href="' . esc_url($manifest_url) . '">';
}
*/

if( !empty( $theme_options['seo_contact_name'] ) ) { 
	$seo_contact_name = $theme_options['seo_contact_name'];
}
if( !empty( $theme_options['seo_contact_number'] ) ) { 
	$seo_contact_number = $theme_options['seo_contact_number'];
}


?>


	<!-- Common Structured Data -->
	<script type="application/ld+json">
        {
			"@context": "http://schema.org",
			"@type": "Organization",
			"name": "<?php echo esc_html(get_bloginfo()); ?>",
			"url": "<?php echo esc_url(home_url()); ?>",
			"logo": "<?php echo esc_url($logo); ?>",
			<?php 
			if( !empty( $theme_options['seo_contact_name'] ) && !empty( $theme_options['seo_contact_number'] ) ) { 
			?>
			"contactPoint": [
         		{ 
         			"@type": "ContactPoint",
         			"telephone": "<?php echo $seo_contact_number; ?>",
         			"contactType": "<?php echo $seo_contact_name; ?>"
         		}
         	],
			<?php
			}
			?>
         	"potentialAction": {
         		"@type": "SearchAction",
         		"target": "<?php echo esc_url(home_url('/')); ?>?q={search}",
         		"query-input": "required name=search"
         	}
        }         
      </script>
	<!-- Common Structured Data End -->
<?php
$pyre_structured_data = get_aione_page_settings( $post->ID, 'aione_per_page_setting','pyre_structured_data' );
$pyre_structured_data = do_shortcode($pyre_structured_data);
$pyre_structured_data = strip_tags($pyre_structured_data);

if( !empty( $pyre_structured_data ) ) {
	echo '<script type="application/ld+json">';
	echo $pyre_structured_data;
	echo "</script>";
}


$post_type = get_post_type();
$aione_components = get_option('aione-components');
$aione_component = $aione_components[$post_type];


if( is_single() ){
	$template_single_slug = $aione_component['single_template'];

	$aione_templates = get_option('aione-templates');
	$aione_single_structured_data = $aione_templates[$template_single_slug]['structured_data'];

	if ($template_single_slug != 'single') {
		echo '<!-- Structured data single -->';
		echo '<script type="application/ld+json">';
		$aione_single_structured_data_string = do_shortcode($aione_single_structured_data);
		$aione_single_structured_data_text = strip_tags($aione_single_structured_data_string);

		echo $aione_single_structured_data_text;
		echo "</script>";
	}
}

if( is_archive() ){

	$template_archive_slug = $aione_component['archive_template'];

	$aione_templates = get_option('aione-templates');
	$aione_archive_structured_data = $aione_templates[$template_archive_slug]['structured_data'];
	$aione_archive_structured_data_header = $aione_templates[$template_archive_slug]['structured_data_header'];
	$aione_archive_structured_data_footer = $aione_templates[$template_archive_slug]['structured_data_footer'];

	if ($template_archive_slug != 'archive') {
		echo '<!-- Structured data archive -->';
		
		echo '<script type="application/ld+json">';

		echo $aione_archive_structured_data_header;

		$posts_per_page = $aione_templates[$template_archive_slug]['template_posts_per_page'];

		$aione_archive_structured_data_array = array();


		global $post;
 
	    $posts = get_posts( array(
	        'post_type' => $post_type,
	        'posts_per_page' => 5,
	    ) );
	 
	    if ( $posts ) {
	        foreach ( $posts as $post ) : 
	            setup_postdata( $post ); 

	            $aione_archive_structured_data_string = do_shortcode($aione_archive_structured_data);
				$aione_archive_structured_data_text = strip_tags($aione_archive_structured_data_string);
				$aione_archive_structured_data_array[] = $aione_archive_structured_data_text;
	            

	        endforeach;
	        wp_reset_postdata();
	    } 

		echo implode(',', $aione_archive_structured_data_array );

		echo $aione_archive_structured_data_footer;

		echo "</script>";

	}
}

$wrapper_classes = array('aione-wrapper');
$wrapper_classes[] = 'layout-header-' . $theme_options['header_position'];
$wrapper_classes[] = 'aione-layout-' . $theme_options['site_layout'];

if (is_enabled_sidebar('left')) {
	$wrapper_classes[] = 'sidebar-left';
}
if (is_enabled_sidebar('right')) {
	$wrapper_classes[] = 'sidebar-right';
}


$wrapper_classes[] = 'color-scheme-' . $theme_options['color_scheme'];
$wrapper_classes = implode(" ", $wrapper_classes);

$body_classes = array();

if (is_user_logged_in()) {

	$user = wp_get_current_user();

	$user_roles = $user->roles;

	if ( is_array( $user_roles ) ) {

		foreach ( $user_roles as $key => $user_role ) {
			$body_classes[] = "user-role-" . $user_role;
		}

	} else{
		$body_classes[] = "user-role-" . $user_roles;
	}

} else {

	$body_classes[] = "not-logged-in";

}

$body_classes = implode(" ", $body_classes);



if( !$theme_options['advanced_load_css_bottom'] ) {
	get_template_part( 'template/aione-custom-css' );
} 
if( !empty( $theme_options['code_head'] ) ) { 
	echo do_shortcode( $theme_options['code_head'] );
}
?>

</head>
<body <?php body_class( $body_classes ); ?>>

<?php 
if( !empty( $theme_options['code_body_start'] ) ) { 
	echo do_shortcode( $theme_options['code_body_start'] );
}
?>



<?php if( $theme_options['show_preloader'] ) { ?>
<div class="aione-preloader">
	<div class="preloader"></div>
	<div class="preloader-text">
		<?php 
		if( !empty( $theme_options['preloader_text'] ) ) { 
			echo $theme_options['preloader_text'];
		}
		?>
	</div>
</div>
<?php } ?>
<?php if( $theme_options['show_scroll_progress'] ) { ?>
<div class="aione-scroll-progress"><div class="progress"></div></div>
<?php } ?>
<div id="aione_wrapper" class="<?php echo esc_html($wrapper_classes); ?>">
	<div class="wrapper">

		<?php get_template_part('template/aione-header'); ?>
		<?php if ($theme_options['header_position'] != 'top') {
		echo '<div class="content-wrapper">';
		} ?>
		<?php get_template_part('template/aione-slider'); ?>
		<?php get_template_part('template/aione-pagetitle'); ?>
		<?php get_template_part('template/aione-pagetop'); ?>

		