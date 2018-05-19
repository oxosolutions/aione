<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Gutenbergtheme
 */

get_header(); ?>

<main id="primary aione_main" class="site-main aione-main">
	<div class="wrapper">

<?php
global $theme_options;
if($theme_options['sidebar_left_enable'] == 1):
?>
<section id="aione_sidebar_left" class="aione-sidebar-left">
	<div id="" class="aione-sidebar">
		<div class="wrapper">
			<?php
			if ( is_active_sidebar( 'aione-sidebar-left' ) ):
				dynamic_sidebar( 'aione-sidebar-left' );
			endif;
			?>
		</div>
	</div>
</section>
<?php
endif;
?>

<div id="aione_content" class="aione-content">
<?php
if($theme_options['content_top_area_enable'] == 1):
?>
<section id="aione_contenttop" class="aione-contenttop">
	<div id="" class="aione-content-top">
		<div class="wrapper">
			<?php
			if ( is_active_sidebar( 'aione-contenttop-content' ) ):
				dynamic_sidebar( 'aione-contenttop-content' );
			endif;
			?>
		</div>
	</div>
</section>
<?php
endif;
?>

<section class="error-404 not-found">
			<header class="page-header">
				<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'gutenbergtheme' ); ?></h1>
			</header><!-- .page-header -->

			<div class="page-content">
				<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'gutenbergtheme' ); ?></p>

				<?php
					get_search_form();

					the_widget( 'WP_Widget_Recent_Posts' );
				?>

				<div class="widget widget_categories">
					<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'gutenbergtheme' ); ?></h2>
					<ul>
					<?php
						wp_list_categories( array(
							'orderby'    => 'count',
							'order'      => 'DESC',
							'show_count' => 1,
							'title_li'   => '',
							'number'     => 10,
						) );
					?>
					</ul>
				</div><!-- .widget -->

				<?php

					/* translators: %1$s: smiley */
					$archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'gutenbergtheme' ), convert_smilies( ':)' ) ) . '</p>';
					the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );

					the_widget( 'WP_Widget_Tag_Cloud' );
				?>

			</div><!-- .page-content -->
		</section><!-- .error-404 -->
<?php
if($theme_options['content_bottom_area_enable'] == 1):
?>
<section id="aione_contentbottom" class="aione-contentbottom">
	<div id="" class="aione-content-bottom">
		<div class="wrapper">
			<?php
			if ( is_active_sidebar( 'aione-contentbottom-content' ) ):
				dynamic_sidebar( 'aione-contentbottom-content' );
			endif;
			?>
		</div>
	</div>
</section>
<?php
endif;
?>
</div> <!-- #aione_content -->
<?php
if($theme_options['sidebar_right_enable'] == 1):
?>
<section id="aione_sidebar_right" class="aione-sidebar-right">
	<div id="" class="aione-sidebar">
		<div class="wrapper">
			<?php
			if ( is_active_sidebar( 'aione-sidebar-right' ) ):
				dynamic_sidebar( 'aione-sidebar-right' );
			endif;
			?>
		</div>
	</div>
</section>
<?php
endif;
?>
<div class="aione-clear"></div><!-- .aione-clear -->

</div><!-- .wrapper -->
	</main><!-- #primary -->

<?php
get_footer();




