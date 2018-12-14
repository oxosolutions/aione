<?php get_header(); 
global $theme_options;
global $post;

$main_classes = array();

if ( is_home() ){
	$main_classes[] = 'blog-'.$theme_options['blog_archive_layout'];
}

if ( is_enabled( $post->ID, 'page_padding_enable' ) ){ 
	$main_classes[] = 'page-padding';
}

if ( is_enabled( $post->ID, 'page_content_padding_enable' ) ){ 
	$main_classes[] = 'page-content-padding';
}

$main_classes[] = is_fullwidth( $post->ID, 'page' );

$main_classes = implode(" ", $main_classes);
?>
<main id="aione_main" class="aione-main <?php echo @$main_classes;?>">
	<div class="wrapper">

		<?php get_template_part( 'template/aione-sidebar-left'); ?>

		<div id="aione_content" class="aione-page-content">
			<div class="wrapper">
				<?php get_template_part( 'template/aione-content-top'); ?>

				<?php get_template_part( 'template/aione-content'); ?>

				<?php get_template_part( 'template/aione-content-bottom'); ?>

				<?php 
				if( is_post_type_archive() || is_archive()){

					//posts_nav_link();
					/*
					$args = array(
						'base'               => '%_%',
						'format'             => '?paged=%#%',
						'total'              => 1,
						'current'            => 0,
						'show_all'           => false,
						'end_size'           => 1,
						'mid_size'           => 2,
						'prev_next'          => true,
						'prev_text'          => __('« Previous'),
						'next_text'          => __('Next »'),
						'type'               => 'plain',
						'add_args'           => false,
						'add_fragment'       => '',
						'before_page_number' => '',
						'after_page_number'  => ''
					);

					echo paginate_links( $args );

					*/
					/*global $wp_query;

					$big = 999999999; // need an unlikely integer

					echo paginate_links( array(
						'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
						'format' => '?paged=%#%',
						'current' => max( 1, get_query_var('paged') ),
						'total' => $wp_query->max_num_pages,
						'prev_next'          => true,
						'prev_text'          => __('« Previous'),
						'next_text'          => __('Next »'),
						'type'               => 'plain',
					) );*/

					/******************************************************/
					$range = 5 ;
					// $paged - number of the current page
					global $paged, $wp_query;
					// How much pages do we have?
					if ( !$max_page ){
						$max_page = $wp_query->max_num_pages;
					}
					// We need the pagination only if there is more than 1 page
					if ( $max_page > 1 ){
						if ( !$paged ) $paged = 1;
					
				
						echo "\n".'<ul class="pagination">'."\n";
						// On the first page, don't put the First page link
						if ( $paged != 1 ){
							echo '<li class="page-num page-num-first"><a href='.get_pagenum_link(1).'>'.__('First', PAGE_LANG).' </a></li>';
						}
					
						// To the previous page
						echo '<li class="page-num page-num-prev">';
							previous_posts_link(' &laquo; '); // «
						echo '</li>';
					
						// We need the sliding effect only if there are more pages than is the sliding range
						if ( $max_page > $range ) :
							// When closer to the beginning
							if ( $paged < $range ) :
								for ( $i = 1; $i <= ($range + 1); $i++ ) {
									$class = $i == $paged ? 'active' : '';
									echo '<li class="page-num '.$class.'"><a class="paged-num-link '.$class.'" href="'.get_pagenum_link($i).'"> '.$i.' </a></li>';
								}
							// When closer to the end
							elseif ( $paged >= ( $max_page - ceil($range/2)) ) :
								for ( $i = $max_page - $range; $i <= $max_page; $i++ ){
									$class = $i == $paged ? 'active' : '';
									echo '<li class="page-num '.$class.'"><a class="paged-num-link '.$class.'" href="'.get_pagenum_link($i).'"> '.$i.' </a></li>';
								}
							endif;
						// Somewhere in the middle
						elseif ( $paged >= $range && $paged < ( $max_page - ceil($range/2)) ) :
							for ( $i = ($paged - ceil($range/2)); $i <= ($paged + ceil($range/2)); $i++ ) {
									$class = $i == $paged ? 'active' : '';
								echo '<li class="page-num '.$class.'"><a class="paged-num-link '.$class.'" href="'.get_pagenum_link($i).'"> '.$i.' </a></li>';
							}
						// Less pages than the range, no sliding effect needed
						else :
							for ( $i = 1; $i <= $max_page; $i++ ) {
								$class = $i == $paged ? 'active' : '';
								echo '<li class="page-num '.$class.'"><a class="paged-num-link '.$class.'" href="'.get_pagenum_link($i).'"> '.$i.' </a></li>';
							}
						endif;
					
						// Next page
						echo '<li class="page-num page-num-next">';
							next_posts_link(' &raquo; '); // »
						echo '</li>';
					
						// On the last page, don't put the Last page link
						if ( $paged != $max_page ){
							echo '<li class="page-num page-num-last"><a href='.get_pagenum_link($max_page).'> '.__('Last', PAGE_LANG).'</a></li>';
						}
				
						echo "\n".'</ul>'."\n";
					}
					/******************************************************/

				}
				?>
			</div> <!-- .wrapper -->
		</div> <!-- .aione-page-content -->
		
		<?php get_template_part( 'template/aione-sidebar-right'); ?>

		<div class="aione-clear"></div> <!-- .aione-clear -->
	</div> <!-- .wrapper -->
</main> <!-- .aione-main -->
<?php
get_footer();