<?php global $post;

if( is_enabled( $post->ID, 'page_title_bar' ) ) :
	
	$page_title = get_the_title();
	//$page_description = get_aione_page_option( $post->ID,'pyre_page_title_bar_description_text' );
	$page_description = get_aione_page_settings( $post->ID,'aione_per_page_setting','pyre_page_title_bar_description_text' );

	if( is_post_type_archive() || is_archive() ) {

		if ( is_category() ) {
			$page_title = single_cat_title( '', false );
			// $page_description = get_the_archive_description();
		} elseif ( is_tag() ) {
			$page_title = '#'.single_tag_title( '', false );
			// $page_description = get_the_archive_description();
		} elseif ( is_author() ) {
			$page_title = get_the_author();
			$page_description = "All posts from ".get_the_author();
		} elseif ( is_post_type_archive() ) {
			$page_title = post_type_archive_title( '', false );
			// $page_description = get_the_archive_description();
		} elseif ( is_tax() ) {
			$page_title = single_term_title( '', false );
			// $page_description = get_the_archive_description();
		} else {
			$page_title = get_the_archive_title();
			$page_description = get_the_archive_description();
		}

	}

	if( is_404() ) {
		$page_title = "Error 404";
		$page_description = "Page Not Found";
	}

	if ( is_home() ) {
		if( is_front_page() ) {
			$page_title = 'Home';
		} else {
			$page_title = single_post_title( '',false );
		}	
	}

	if( is_search() ) {
		$search_query = $_REQUEST['s'];
		$page_title = "Search";
		$page_description = "Search results for <span>".$search_query."</span>";

	}
	?>

	<div id="aione_pagetitle" class="aione-pagetitle <?php echo esc_html(is_fullwidth( $post->ID, 'page_title') );?>">
		<div class="wrapper">
			<?php 
			if( is_enabled( $post->ID, 'page_title_bar_enable_title' )  && !empty( $page_title ) ) : ?>
				<h1 class="title">
					<?php echo esc_html( $page_title ); ?>
				</h1>
			<?php endif;
			if( is_enabled( $post->ID, 'page_title_bar_enable_description' ) && !empty( $page_description ) ) : ?>
				<h2 class="description">
					<?php echo wp_kses_post( $page_description ); ?>		
				</h2>
			<?php endif; ?>
			<div class="clear"></div><!-- .clear -->
		</div><!-- .wrapper -->
	</div><!-- .aione-pagetitle -->
<?php endif;