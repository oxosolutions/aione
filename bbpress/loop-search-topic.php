<?php

/**
 * Search Loop - Single Topic
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<div id="post-<?php bbp_topic_id(); ?>" <?php bbp_topic_class(); ?>>

	<div class="bbp-reply-author">

		<?php do_action( 'bbp_theme_before_topic_author_details' ); ?>

		<?php bbp_topic_author_link( array( 'sep' => '', 'show_role' => true ) ); ?>

		<div class="bbp-reply-post-date"><?php bbp_topic_post_date( bbp_get_topic_id() ); ?></div>

		<div class="bbps-post-count"><?php printf( __( 'Post count: %s', 'Aione' ), bbp_get_user_reply_count_raw(bbp_get_reply_author_id()) ); ?></div>

		<?php if ( bbp_is_user_keymaster() ) : ?>

			<?php do_action( 'bbp_theme_before_topic_author_admin_details' ); ?>

			<div class="bbp-reply-ip"><?php bbp_author_ip( bbp_get_topic_id() ); ?></div>

			<?php do_action( 'bbp_theme_after_topic_author_admin_details' ); ?>

		<?php endif; ?>

		<?php do_action( 'bbp_theme_after_topic_author_details' ); ?>

	</div><!-- .bbp-topic-author -->

	<div class="bbp-reply-content">
		<div class="bbp-reply-header">
			<div class="bbp-meta">

				<?php do_action( 'bbp_theme_before_topic_title' ); ?>

				<a href="<?php bbp_topic_permalink(); ?>" class="bbp-reply-permalink">#<?php bbp_topic_id(); ?></a>

				<div class="bbp-topic-title-meta">

					<span class="bbp-search-topic"><?php _e( 'Topic: ', 'bbpress' ); ?>
					<a href="<?php bbp_topic_permalink(); ?>"><?php bbp_topic_title(); ?></a></span>

					<?php if ( function_exists( 'bbp_is_forum_group_forum' ) && bbp_is_forum_group_forum( bbp_get_topic_forum_id() ) ) : ?>

						<?php _e( 'in group forum ', 'bbpress' ); ?>

					<?php else : ?>

						<?php _e( 'in forum ', 'bbpress' ); ?>

					<?php endif; ?>

					<a href="<?php bbp_forum_permalink( bbp_get_topic_forum_id() ); ?>"><?php bbp_forum_title( bbp_get_topic_forum_id() ); ?></a> |

				</div><!-- .bbp-topic-title-meta -->

				<?php do_action( 'bbp_theme_after_topic_title' ); ?>

			</div>
		</div><!-- .bbp-topic-title -->

		<div class="bbp-reply-entry">

			<?php do_action( 'bbp_theme_before_topic_content' ); ?>

			<?php bbp_topic_content(); ?>

			<?php do_action( 'bbp_theme_after_topic_content' ); ?>

			<div class="bbp-arrow"></div>

		</div>

	</div><!-- .bbp-topic-content -->

</div><!-- #post-<?php bbp_topic_id(); ?> -->
