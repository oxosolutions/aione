<?php
global $theme_options;
global $post;
// global $wp_query;
// _to_be_deleted


//echo "<br>ID = ".$post->ID;

/*$posts_page_id = get_option( 'page_for_posts' );
*/


if( $theme_options['advanced_ajax_content'] ){ 
	if ( $args['post_id'] ) {
	  	$ID =  $args['post_id'];
	} else {
		$ID =  $post->ID;
	}

	if ( $args['wp_query'] ) {
	  $wp_query =  $args['wp_query'];
	} else {
		global $wp_query;
	}

	if ( $args['is_front_page'] ) {
	  $is_front_page = $args['is_front_page'];
	} else {
		$is_front_page = false;
	}


	/*$post = get_post( $ID, OBJECT );
	setup_postdata( $post );*/
	
}
if($args['filters'] != null) {
	if ( $args['post_id'] ) {
	  	$ID =  $args['post_id'];
	}
	else {
		$ID = $post->ID;
	}

	if ( $args['filters'] ) {
	  	$filters = $args['filters'];
	}
	if ( $args['wp_query'] ) {
	  	$wp_query =  $args['wp_query'];
	}
	else {
		global $wp_query;
	}
}
/*echo "===<pre>";
print_r($filters);
print_r($wp_query);
echo "</pre>====";*/


/*if( is_search() ) { echo "<br>search:YES"; }else{ echo "<br>search:NO";}
if( is_archive() ) { echo "<br>archive:YES"; }else{ echo "<br>archive:NO";}
if( is_single() ) { echo "<br>single:YES"; }else{ echo "<br>single:NO";}
if( is_attachment() ) { echo "<br>attachment:YES"; }else{ echo "<br>attachment:NO";}
if( is_home() ) { echo "<br>home:YES"; }else{ echo "<br>home:NO";}*/


/*
echo "*****************".$posts_page_id;
*/




$post_type 				= get_post_type( $ID );
$aione_components 		= get_option( 'aione-components' );
$aione_component 		= $aione_components[$post_type];
$single_template_slug 	= $aione_component['single_template'];
$archive_template_slug 	= $aione_component['archive_template'];

$aione_templates 		= get_option( 'aione-templates' );
$aione_template_single 	= $aione_templates[$single_template_slug]['content'];
$aione_template_archive = $aione_templates[$archive_template_slug]['content'];


if( isset( $archive_template_slug ) && $archive_template_slug != "archive" ) {

	//global $wp_query;

	$ppp 		= $aione_templates[$archive_template_slug]['template_posts_per_page'];
	$order_by 	= $aione_templates[$archive_template_slug]['template_posts_order_by'];
	$order 		= $aione_templates[$archive_template_slug]['template_posts_order'];
	$template_posts_status_array = $aione_templates[$archive_template_slug]['template_posts_status'];
	$template_filter_enable = $aione_templates[$archive_template_slug]['template_filter_enable'];

	/*echo "<pre>";
	print_r($aione_templates);
	echo "</pre>";*/

	$post_status = array( 'publish' );
	
	if( !empty( $template_posts_status_array ) ) {
		$post_status = array_keys( $template_posts_status_array );
	}


    $current_page = get_query_var('paged');

    if( $current_page > 0 ){
    	$offset = $ppp * ( $current_page - 1);
    } else{
    	$offset = 0;
    }

	
	$args = array( 
			'posts_per_page'	=> $ppp, 
			'orderby'			=> $order_by, 
			'offset'			=> $offset, 
			'order'				=> $order,
			'post_status'		=> $post_status
		);

	if ( $filters != null ) {
	  	$args['meta_query'] = array('relation' => 'AND');
	  	foreach($filters as $key => $value) {
	  		if($value != null) {
	  			$args['meta_query'][] = array(
			        'key'       => $key,
			        'value'     => $value,
			        'compare'   => 'LIKE',
			    );
	  		}
	  	}
	}
	$args = array_merge($wp_query->query, $args);


	
	/*echo "==================================================<pre>";
	print_r($args);
	echo "</pre>=====";*/
	
	/*if($template_filter_enable == "yes"){
		if( isset( $_POST["aione_filters_searchsubmit"]) && isset($_POST["search"]) && $_POST["search"] == "aione_filters_search"){

			$args['tax_query']  = array(
		        array(
		            'taxonomy' => 'category',
		            'field'    => 'term_id',
		            'terms'    => array( $_POST["filter_cat"] ),
		            'operator' => 'IN',
		        ),
		    ); 
			
		}
	}*/
	query_posts( $args );
}

if( $is_front_page == 'true' && get_option('show_on_front') == 'page' ){
	$post = get_option('page_on_front');
	$wp_query = new WP_Query(array('page_id' => $post));
	
}
if( $is_front_page == 'true' && get_option('show_on_front') == 'posts' ){
	$post = get_option('page_on_front');
	$wp_query = new WP_Query(array('p' => $post));
	
}

if ( have_posts() ) :
	if(is_home()  || is_archive()){ 
		if( isset($archive_template_slug) && $archive_template_slug != 'archive' ){
			echo "<div class='aione-template type-archive ".$archive_template_slug."'>";
			/*if($template_filter_enable == "yes"){
				echo aione_filters($wp_query);
			}*/
			if( isset( $aione_templates[$archive_template_slug]['archive_header'] ) && !empty( $aione_templates[$archive_template_slug]['archive_header'] ) ) { 				
				echo do_shortcode( $aione_templates[$archive_template_slug]['archive_header'] );
			}
		}

	}

	while ( have_posts() ) : the_post();
		if( is_search() ){ 
			get_template_part( 'template-parts/content', 'search' );
		} else if ( is_home() ) {   
		    //_to_be_deleted 
			//get_template_part( 'template-parts/blog', get_post_format() );
			if( isset($archive_template_slug) && $archive_template_slug != 'archive' ) { 				
				echo do_shortcode($aione_template_archive);				
			} else { 
				get_template_part( 'template-parts/blog', get_post_format() );
			}
		} else if ( is_archive() ) {  
			if( isset($archive_template_slug) && $archive_template_slug != 'archive' ) { 
				echo do_shortcode($aione_template_archive);
			} else { 
				get_template_part( 'template-parts/content', get_post_format() );
			}			
		} else if( is_single() ) {   
			if( isset($single_template_slug) && $single_template_slug != 'single' ) { 
				echo do_shortcode($aione_template_single);
			} else { 
				get_template_part( 'template-parts/content', get_post_format() );
			}
		} elseif ( is_attachment() ){ 
			if( isset($single_template_slug) && $single_template_slug != 'single' ) { 
				echo do_shortcode($aione_template_single);
			} else { 
				get_template_part( 'template-parts/content', get_post_format() );
			}
		} elseif( $is_front_page == 'true' && get_option('show_on_front') == 'posts' ){
			get_template_part( 'template-parts/blog', get_post_format() );
		}
		else { 
			get_template_part( 'template-parts/content', get_post_type() );
		}

		if( is_single() ) {
			the_post_navigation( array(
				'prev_text' => '<i class="ion-ios-arrow-back"></i> Previous',
				'next_text' => 'Next <i class="ion-ios-arrow-forward"></i>',
			) );
		}

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
	endwhile;
	if(is_home()  || is_archive()){
		if( isset($archive_template_slug) && $archive_template_slug != 'archive' ){

			if( isset( $aione_templates[$archive_template_slug]['archive_footer'] ) && !empty( $aione_templates[$archive_template_slug]['archive_footer'] ) ) { 				
				echo do_shortcode( $aione_templates[$archive_template_slug]['archive_footer'] );
			}

			echo "</div>";
		}
	}
	wp_reset_postdata();
else :
	get_template_part( 'template-parts/content', 'none' );
endif;

if( is_post_type_archive() || is_archive() || is_home() || is_search()) {

	echo aione_pagination( $wp_query );
}
if( $theme_options['advanced_ajax_content'] ){
	wp_reset_postdata();
}
wp_reset_postdata();