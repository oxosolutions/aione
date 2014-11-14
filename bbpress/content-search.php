<?php

/**
 * Search Content Part
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<div id="bbpress-forums">
	<div class="search-page-search-form">
		<h2><?php echo __('Need a new search?', 'Aione'); ?></h2>
		<p><?php echo __('If you didn\'t find what you were looking for, try a new search!', 'Aione'); ?></p>
		<form role="search" method="get" class="bbp-search-form seach-form" id="searchform" action="<?php bbp_search_url(); ?>">
			<div class="search-table">
				<label class="screen-reader-text hidden" for="bbp_search"><?php _e( 'Search for:', 'bbpress' ); ?></label>
				<input type="hidden" name="action" value="bbp-search-request" />
				<div class="search-field">
					<input tabindex="<?php bbp_tab_index(); ?>" type="text" value="<?php echo esc_attr( bbp_get_search_terms() ); ?>" placeholder="<?php _e( 'Search the Forum...', 'Aione' ); ?>" name="bbp_search" id="bbp_search" />
				</div>
				<div class="search-button">
					<input tabindex="<?php bbp_tab_index(); ?>" class="class="aione-button button submit" type="submit" id="bbp_search_submit" value="&#xf002;" />
				</div>
			</div>
		</form>
	</div>	
	
		<?php bbp_set_query_name( 'bbp_search' ); ?>

		<?php do_action( 'bbp_template_before_search' ); ?>

		<?php if ( bbp_has_search_results() ) : ?>

			 <?php bbp_get_template_part( 'pagination', 'search' ); ?>

			 <?php bbp_get_template_part( 'loop',	   'search' ); ?>

			 <?php bbp_get_template_part( 'pagination', 'search' ); ?>

		<?php elseif ( bbp_get_search_terms() ) : ?>

			 <?php bbp_get_template_part( 'feedback',   'no-search' ); ?>

		<?php else : ?>

			<?php bbp_get_template_part( 'feedback',   'no-search' ); ?>

		<?php endif; ?>

		<?php do_action( 'bbp_template_after_search_results' ); ?>
</div>

