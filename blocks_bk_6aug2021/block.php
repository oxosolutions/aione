<?php
/**
 * Socialize your content with Social Share Block.
 *
 * @package SocialShareBlock
 */


/**
 * Renders from server side.
 *
 * @param array $attributes The block attributes.
 */
function aione_render_block( $attributes ) {

	$facebook    = get_facebook_icon( $attributes );
	$twitter     = get_twitter_icon( $attributes );
	$linkedin    = get_linkedin_icon( $attributes );
	$pinterest   = get_pinterest_icon( $attributes );
	$reddit      = get_reddit_icon( $attributes );
	//$google_plus = get_googleplus_icon( $attributes);
	$tumblr      = get_tumblr_icon( $attributes );

	/*return '<div id="ub-social-share-block-editor" class="wp-block-ub-social-share">
		<div class="social-share-icons align-icons-' . $attributes['align'] . '">
			' . $facebook . '
			' . $twitter . '
			' . $linkedin . '
			' . $pinterest . '
			' . $reddit . '
			' . $google_plus . '
			' . $tumblr . '
		</div>
	</div>';*/
	$classes = '';
    if ( $attributes['socialIconLabels'] === true ) {
        $classes = 'labels';
    }
	return '<div class="wp-block-aione-blocks-aione-social-share">
		<div class="aione-social-share-container">
		<ul class="aione-social-icons '.$attributes['socialIconSize'].' ' .$attributes['socialIconStyle'].' '.$attributes['socialIconDirection']. ' '.$attributes['socialIconTheme']. ' '.$classes.'">
			' . $facebook . '
			' . $twitter . '
			' . $linkedin . '
			' . $pinterest . '
			' . $reddit . '
			' . $tumblr . '
		</ul>	
		</div>
	</div>';
}

/**
 * Generate Facebook Icons.
 *
 * @param  array   $attributes Options of the block.
 * @return string
 */
function get_facebook_icon( $attributes ) {
	if ( ! $attributes['facebook'] ) {
		return '';
	}

	// Generate the Facebook URL.
	$facebook_url = '
		https://www.facebook.com/sharer/sharer.php?
		u=' . rawurlencode( get_the_permalink() ) . '
		&title=' . get_the_title();

	return '<li class="facebook">
		<a href="' . $facebook_url . '" target="_blank">
			<span class="icon"></span><span class="label">Facebook</span>
		</a></li>';
}

/**
 * Generate Twitter Icon.
 *
 * @param  array   $attributes Options of the block.
 * @return string
 */
function get_twitter_icon( $attributes ) {
	if ( ! $attributes['twitter'] ) {
		return '';
	}

	// Generate the Twitter URL.
	$twitter_url = '
		http://twitter.com/share?
		text=' . get_the_title() . '
		&url=' . rawurlencode( get_the_permalink() );

	return ' <li class=twitter>
		<a href="'.$twitter_url.'"  target="_blank">
			<span class="icon"></span><span class="label">Twitter</span>
		</a></li>';

}


/**
 * Generate Linked In Icon.
 *
 * @param  array   $attributes Options of the block.
 * @return string
 */
function get_linkedin_icon( $attributes ) {
	if ( ! $attributes['linkedin'] ) {
		return '';
	}

	// Generate the Linked In URL.
	$linkedin_url = '
		https://www.linkedin.com/shareArticle?mini=true
		&url=' . rawurlencode( get_the_permalink() ) . '
		&title=' . get_the_title();

	return '<li class=linkedin>
		<a href="'.$linkedin_url.'"  target="_blank">
			<span class="icon"></span><span class="label">LinkedIn</span>
		</a></li>';
}


/**
 * Generate Pinterest Icon.
 *
 * @param  array   $attributes Options of the block.
 * @return string
 */
function get_pinterest_icon( $attributes ) {
	global $post;

	if ( ! $attributes['pinterest'] ) {
		return '';
	}

	// Get the featured image.
	if ( has_post_thumbnail() ) {
		$thumbnail_id = get_post_thumbnail_id( $post->ID );
		$thumbnail    = $thumbnail_id ? current( wp_get_attachment_image_src( $thumbnail_id, 'large', true ) ) : '';
	} else {
		$thumbnail = null;
	}

	// Generate the Pinterest URL.
	$pinterest_url = '
		https://pinterest.com/pin/create/button/?
		&url=' . rawurlencode( get_the_permalink() ) . '
		&description=' . get_the_title() . '
		&media=' . esc_url( $thumbnail );

	return '<li class=pinterest>
		<a href="'.$pinterest_url.'"  target="_blank">
			<span class="icon"></span><span class="label">Pinterest</span>
		</a></li>';
}


/**
 * Generate Reddit Icon.
 *
 * @param  array   $attributes Options of the block.
 * @return string
 */
function get_reddit_icon( $attributes ) {
	if ( ! $attributes['reddit'] ) {
		return '';
	}

	// Generate the Reddit URL.
	$reddit_url = '
		http://www.reddit.com/submit?
		url=' . rawurlencode( get_the_permalink() ) . '
		&title=' . get_the_title();

	return '<li class=reddit>
		<a href="'.$reddit_url.'"  target="_blank">
			<span class="icon"></span><span class="label">Reddit</span>
		</a></li>';
}


/**
 * Generate Google Plus Icon.
 *
 * @param  array   $attributes Options of the block.
 * @return string
 */
/*function get_googleplus_icon( $attributes ) {
	if ( ! $attributes['googleplus'] ) {
		return '';
	}

	// Generate the Google Plus URL.
	$googleplus_url = '
		https://plus.google.com/share?
		url=' . rawurlencode( get_the_permalink() );

	return '<li class=googleplus>
		<a href="'.$googleplus_url.'"  target="_blank">
			<span class="icon"></span><span class="label">GooglePlus</span>
		</a></li>';
}*/


/**
 * Generate Tumblr Icon.
 *
 * @param  array   $attributes Options of the block.
 * @return string
 */
function get_tumblr_icon( $attributes ) {
	if ( ! $attributes['tumblr'] ) {
		return '';
	}

	// Generate the tumblr URL.
	$tumblr_url = '
		https://www.tumblr.com/widgets/share/tool?
		canonicalUrl=' . rawurlencode( get_the_permalink() ) . '
		&title=' . get_the_title();

	return '<li class=tumblr>
		<a href="'.$tumblr_url.'"  target="_blank">
			<span class="icon"></span><span class="label">Tumblr</span>
		</a></li>';
}

/**
 * Register Block
 *
 * @return void
 */
function aione_register_block() {
	if( function_exists( 'register_block_type' ) ) {
		register_block_type( 'aione-blocks/aione-social-share', array(
			'attributes'      => array(
				'socialIconSize'     => array(
					'type'    => 'string',
					'default' => 'small',
				),
				'socialIconStyle'   => array(
					'type'    => 'string',
					'default' => 'square',
				),
				'socialIconDirection' => array(
					'type'    => 'string',
					'default' => 'horizontal',
				),
				'socialIconTheme' => array(
					'type'    => 'string',
					'default' => 'colored',
				),
				'socialIconLabels' => array(
					'type'    => 'boolean',
					'default' => false,
				),
				'facebook' => array(
					'type'    => 'boolean',
					'default' => true,
				),
				'twitter' => array(
					'type'    => 'boolean',
					'default' => true,
				),
				'youtube' => array(
					'type'    => 'boolean',
					'default' => true,
				),
				'instagram' => array(
					'type'    => 'boolean',
					'default' => true,
				),
				'linkedin' => array(
					'type'    => 'boolean',
					'default' => true,
				),
				'pinterest' => array(
					'type'    => 'boolean',
					'default' => false,
				),
				/*'googleplus' => array(
					'type'    => 'boolean',
					'default' => false,
				),*/
				'tumblr' => array(
					'type'    => 'boolean',
					'default' => false,
				),
				'reddit' => array(
					'type'    => 'boolean',
					'default' => false,
				),
				
			),
			'render_callback' => 'aione_render_block',
		) );
	}
}


add_action( 'init', 'aione_register_block' );
