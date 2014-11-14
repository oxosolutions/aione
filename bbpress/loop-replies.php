<?php

/**
 * Replies Loop
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<?php do_action( 'bbp_template_before_replies_loop' ); ?>


<div class="bbp-header">

	<div class="bbp-reply-favs">

		<?php if ( !bbp_show_lead_topic() ) : ?>

			<?php bbp_user_favorites_link(); ?>

			<?php bbp_user_subscribe_link(); ?>


		<?php else : ?>

			<?php _e( 'Replies', 'bbpress' ); ?>

		<?php endif; ?>

	</div><!-- .bbp-reply-content -->

</div><!-- .bbp-header -->
<div class="clearfix"></div>

<ul id="topic-<?php bbp_topic_id(); ?>-replies" class="forums bbp-replies">

	<li class="bbp-body">

		<?php if ( bbp_thread_replies() ) : ?>

			<?php bbp_list_replies(); ?>

		<?php else : ?>

			<?php while ( bbp_replies() ) : bbp_the_reply(); ?>

				<?php bbp_get_template_part( 'loop', 'single-reply' ); ?>

			<?php endwhile; ?>

		<?php endif; ?>

	</li><!-- .bbp-body -->

</ul><!-- #topic-<?php bbp_topic_id(); ?>-replies -->

<?php do_action( 'bbp_template_after_replies_loop' ); ?>
