<?php 
global $theme_options;
global $post;

$header_classes = array( 'aione-header' );

if( $theme_options['header_sticky'] ) {
	$header_classes[] = 'sticky';
}

$header_classes[] = 'logo-alignment-'.$theme_options['header_logo_alignment'];
$header_classes[] = is_fullwidth( $post->ID, 'header');
$header_classes = implode(' ', $header_classes);		

if( $theme_options['header_position'] != 'top' ) { 
	echo '<div class="header-wrapper">';
}

get_template_part( 'template/aione-topbar' );

if( is_enabled( $post->ID, 'header_enable' ) ) : ?>
	<header id="aione_header" class="<?php echo esc_html($header_classes); ?>">
		<div class="wrapper">
			<?php 
			if( is_enabled( $post->ID, 'header_show_logo' ) ) {
				get_template_part( 'template/aione-header-logo' );	
			}
			if( is_enabled( $post->ID, 'header_show_site_title' ) ) {
				get_template_part( 'template/aione-header-title' );
			}

			if( $theme_options['main_nav_position'] == 'inside' ) {
				get_template_part( 'template/aione-header-menu' );
			}

			if( is_enabled( $post->ID, 'header_show_banner') ) {
				get_template_part( 'template/aione-header-banner' );
			}
			?>	
			<div class="aione-clear"></div><!-- .aione-clear -->
		</div><!-- .wrapper -->
	</header><!-- .aione-header -->
	<?php
endif;
if( $theme_options['main_nav_position'] == 'outside' ) {
	get_template_part('template/aione-header-menu');
}
if( $theme_options['header_position'] != 'top' ) { 
	echo '</div>';
}