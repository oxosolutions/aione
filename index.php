<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Gutenbergtheme
 */
get_header(); ?>
	<main id="aione_main" class="aione-main fullwidth">
		<div class="wrapper">
			<div class="aione-sidebar-left">
				<div class="wrapper">
					this is side bar left
				</div>
			</div>
			<div class="aione-content">
				<div class="wrapper">
					<div class="aione-content-top">
						<div class="wrapper">
							
						</div>
					</div>
					<div class="aione-page-content">
						<div class="wrapper">
							<?php 
							if ( have_posts() ) :
								if ( is_home() && ! is_front_page() ) : ?>
									<header>
										<h1 class="page-title screen-reader-text aione-align-center m-0"><?php single_post_title(); ?></h1>
									</header>
								<?php
								endif;
								?>
								<div class="ar">
								<?php
									/* Start the Loop */
									while ( have_posts() ) : the_post();
										/*
											* Include the Post-Format-specific template for the content.
											* If you want to override this in a child theme, then include a file
											* called content-___.php (where ___ is the Post Format name) and that will be used instead.
											*/	
										//get_template_part( 'template-parts/content', get_post_format() );
										?>
										<div class="ac">
											<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
										</div>
										<?php

									endwhile;
								?>
								</div>
								<?php
								the_posts_navigation();
							else :
								get_template_part( 'template-parts/content', 'none' );
							endif; ?>
						</div>
					</div>
					<div class="aione-content-bottom">
						<div class="wrapper">
							
						</div>
					</div>		
				</div>
			</div>
			<div class="aione-sidebar-right">
				<div class="wrapper">
					this is side bar right
				</div>
			</div>
		</div><!-- .aione-post-content -->
	</main><!-- #primary -->
	
<?php
get_footer();
