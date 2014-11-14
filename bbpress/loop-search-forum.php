<?php

/**
 * Search Loop - Single Forum
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<div id="post-<?php bbp_forum_id(); ?>" <?php bbp_forum_class(); ?>>

	<div class="bbp-forum-search">

		<div class="bbp-reply-header">

			<div class="bbp-meta">

				<a href="<?php bbp_forum_permalink(); ?>" class="bbp-reply-permalink">#<?php bbp_forum_id(); ?></a>

				<div class="bbp-forum-title">

					<?php do_action( 'bbp_theme_before_forum_title' ); ?>

					<span class="bbp-forum"><?php _e( 'Forum: ', 'bbpress' ); ?><a href="<?php bbp_forum_permalink(); ?>"><?php bbp_forum_title(); ?></a></span>

					<?php do_action( 'bbp_theme_after_forum_title' ); ?>

					<span class="bbp-forum-post-date"><?php printf( __( 'Last updated %s', 'bbpress' ), bbp_get_forum_last_active_time() ); ?> | </span>

				</div><!-- .bbp-forum-title -->

			</div><!-- .bbp-meta -->

		</div><!-- .bbp-forum-header -->


		<div class="bbp-reply-content">

			<div class="bbp-reply-entry">

				<?php do_action( 'bbp_theme_before_forum_content' ); ?>

				<?php bbp_forum_content(); ?>

				<?php do_action( 'bbp_theme_after_forum_content' ); ?>

			</div>

		</div><!-- .bbp-forum-content -->

	</div>

</div><!-- #post-<?php bbp_forum_id(); ?> -->
