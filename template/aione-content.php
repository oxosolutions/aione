<?php
global $theme_options;
global $post;

//echo "<br>ID = ".$post->ID;
/*$posts_page_id = get_option( 'page_for_posts' );
echo "*****************".$posts_page_id;*/
$post_type = @get_post_type($post->ID);
$aione_components = @get_option('aione-components');
$aione_component = @$aione_components[$post_type];
$single_template_slug = @$aione_component['single_template'];
$archive_template_slug = @$aione_component['archive_template'];

$aione_templates = @get_option('aione-templates');
$aione_template_single = @$aione_templates[$single_template_slug]['content'];
$aione_template_archive = @$aione_templates[$archive_template_slug]['content'];

/*
echo "<pre>";
echo "<br>posID ==".$post->ID;
echo "<br>aione_components ==";
print_r($aione_components);
echo "<br>aione_component ==";
print_r($aione_component);
echo "<br>single_template_slug ==".$single_template_slug;
echo "<br>archive_template_slug ==".$archive_template_slug;

echo "<br>get_post_type ==".get_post_type();
echo "<br>get_post_type ==".get_post_format();
echo "<br>is_search ==".is_search();
echo "<br>is_archive ==".is_archive();
echo "<br>is_single ==".is_single();
echo "<br>single_template_slug ==".single_template_slug();
echo "<br>archive_template_slug ==".archive_template_slug();

*/
if ( have_posts() ) :

	while ( have_posts() ) : the_post();
		if( is_search() ){ 
			get_template_part( 'template-parts/content', 'search' );
		} else if ( is_home() ) {  
			get_template_part( 'template-parts/blog', get_post_format() );
		} else if ( is_archive() ) { 
			if(isset($archive_template_slug) && $archive_template_slug != 'archive'){ 
				echo do_shortcode($aione_template_archive);
			} else { 
				get_template_part( 'template-parts/content', get_post_format() );
			}			
		} else if( is_single() ) { 
			if(isset($single_template_slug) && $single_template_slug != 'single'){ 
				echo do_shortcode($aione_template_single);
			} else { 
				get_template_part( 'template-parts/content', get_post_format() );
			}
		}else {
			get_template_part( 'template-parts/content', get_post_type() );
		}

		if( is_single() ){
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
	wp_reset_postdata();
else :
	get_template_part( 'template-parts/content', 'none' );
endif;