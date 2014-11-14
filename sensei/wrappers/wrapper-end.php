<?php
/**
 * Content wrappers
 *
 * @author 		WooThemes
 * @package 	Sensei/Templates
 * @version	 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit;

global $theme_options;

$template = get_option('template');

if($theme_options['default_sidebar_pos'] == 'Left') {
	$content_css = 'float:right;';
	$sidebar_css = 'float:left;';
} elseif($theme_options['default_sidebar_pos'] == 'Right') {
	$content_css = 'float:left;';
	$sidebar_css = 'float:right;';
}

switch( $template ) {

	// IF Twenty Eleven
	case 'twentyeleven' :
	?>
			</div>
		</div>
	<?php
		break;

	// IF Twenty Twelve
	case 'twentytwelve' :
	?>
			</div>
		</div>
		<?php get_sidebar(); ?>
	</div>
	<?php
		break;

	// IF Twenty Fourteen
	case 'twentyfourteen' :
	?>
				</div>
			</div>
		</div>
		<?php get_sidebar(); ?>
	<?php
		break;

	// IF Canvas
	case 'canvas' :
	?>
	</div><!-- /#main -->
				<?php woo_main_after(); ?>

				<?php get_sidebar(); ?>

			</div><!-- /#main-sidebar-container -->

			<?php get_sidebar('alt'); ?>

		</div><!-- /#content -->
	<?php
		break;

	// Default
	default :
	?>
		</div>
		<div id="sidebar" style="<?php echo $sidebar_css; ?>">
		<?php generated_dynamic_sidebar(); ?>
		</div>
	</div>
	<?php
		break;
}

?>