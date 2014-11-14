<?php

/**
 * User Profile
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

	<?php do_action( 'bbp_template_before_user_profile' ); ?>

	<div id="bbp-user-profile" class="bbp-user-profile">
		<h2 class="entry-title"><?php _e( 'Profile', 'bbpress' ); ?></h2>
		<div class="bbp-user-section">

			<?php if ( bbp_get_displayed_user_field( 'description' ) ) : ?>

				<p class="bbp-user-description"><?php bbp_displayed_user_field( 'description' ); ?></p>

			<?php endif; ?>

			<p class="bbp-user-forum-role"><span class="bold"><?php  printf( __( 'Forum Role:',	  'Aione' )); ?> </span><?php printf(bbp_get_user_display_role() ); ?></p>
			<p class="bbp-user-topic-count"><span class="bold"><?php printf( __( 'Topics Started:',  'Aione' )); ?> </span><?php printf(bbp_get_user_topic_count_raw() ); ?></p>
			<p class="bbp-user-reply-count"><span class="bold"><?php printf( __( 'Replies Created:', 'Aione' )); ?> </span><?php printf(bbp_get_user_reply_count_raw() ); ?></p>
		</div>
	</div><!-- #bbp-author-topics-started -->

	<?php do_action( 'bbp_template_after_user_profile' ); ?>
