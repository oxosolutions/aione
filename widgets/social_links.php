<?php
add_action('widgets_init', 'social_links_load_widgets');

function social_links_load_widgets()
{
	register_widget('Social_Links_Widget');
}

class Social_Links_Widget extends WP_Widget {

	function Social_Links_Widget()
	{
		$widget_ops = array('classname' => 'social_links', 'description' => '');

		$control_ops = array('id_base' => 'social_links-widget');

		$this->WP_Widget('social_links-widget', 'Aione: Social Links', $widget_ops, $control_ops);
	}

	function widget($args, $instance)
	{
		global $theme_options;

		extract($args);
		$title = apply_filters('widget_title', $instance['title']);

		echo $before_widget;

		if($title) {
			echo $before_title.$title.$after_title;
		}

		$style = '';

		if( ! isset( $instance['tooltip_pos'] ) || ! $instance['tooltip_pos'] ) {
			$instance['tooltip_pos'] = $theme_options['social_links_tooltip_placement'];
		}

		if( ! isset( $instance['icon_color'] ) || ! $instance['icon_color'] ) {
			$instance['icon_color'] = $theme_options['social_links_icon_color'];
		}

		if( ! isset( $instance['boxed_icon'] ) || ! $instance['boxed_icon'] ) {
			$instance['boxed_icon'] = $theme_options['social_links_boxed'];
		}

		if( ! isset( $instance['boxed_color'] ) || ! $instance['boxed_color'] ) {
			$instance['boxed_color'] = $theme_options['social_links_box_color'];
		}

		if( ! isset( $instance['boxed_icon_radius'] ) || ! $instance['boxed_icon_radius'] ) {
			$instance['boxed_icon_radius'] = $theme_options['social_links_boxed_radius'];
		}

		if(!isset($instance['linktarget'])) {
			$instance['linktarget'] = '';
		}

		$nofollow = '';
		if($theme_options['nofollow_social_links']) {
			$nofollow = ' rel="nofollow"';
		}

		if( ! isset( $instance['tooltip_pos'] ) ) {
			$instance['tooltip_pos'] = 'top';
		}

		if( isset( $instance['icon_color'] ) && $instance['icon_color'] ) {
			$style .= sprintf( 'color:%s;', $instance['icon_color'] );
		}

		if( isset ( $instance['boxed_icon'] ) && $instance['boxed_icon'] == 'Yes' && isset( $instance['boxed_color'] ) && $instance['boxed_color'] ) {
			$style .= sprintf( 'background-color:%s;border-color:%s;padding:10px;', $instance['boxed_color'], $instance['boxed_color'] );	
		}

		if( isset( $instance['boxed_icon'] )  && isset( $instance['boxed_icon_radius'] ) && $instance['boxed_icon'] == 'Yes' &&
			( $instance['boxed_icon_radius'] || $instance['boxed_icon_radius'] === '0' )
		) {
			if( $instance['boxed_icon_radius'] == 'round' ) {
				$instance['boxed_icon_radius'] = '50%';
			}

			$style .= sprintf( 'border-radius:%s;', $instance['boxed_icon_radius'] );
		}

		foreach( $instance as $name => $value ) {
			if( strpos( $name, '_link' ) ) {
				$social_networks[$name] = str_replace( '_link', '', $name );
			}
		}

		if( isset( $theme_options['social_sorter'] ) && $theme_options['social_sorter'] ) {
			$order = $theme_options['social_sorter'];
			$ordered_array = explode(',', $order);
			
			if( isset( $ordered_array ) && $ordered_array && is_array( $ordered_array ) ) {
				$social_networks_old = $social_networks;
				$social_networks = array();
				foreach( $ordered_array as $key => $field_order ) {
					$field_order_number = str_replace(  'social_sorter_', '', $field_order );
					$find_the_field = $theme_options['social_sorter_' . $field_order_number];
					$field_name = str_replace( '_link', '', $theme_options['social_sorter_' . $field_order_number] );
					
					if( $field_name == 'email' ) {
						$field_name = 'mail';
					} elseif( $field_name == 'facebook' ) {
						$field_name = 'fb';
					}

					$field_name = $field_name . '_link';

					if( ! isset( $social_networks_old[$field_name] ) ) {
						continue;
					}

					$social_networks[$field_name] = $social_networks_old[$field_name];
				}
			}
		}
		?>
		<ul class="aione-social-networks">
			<?php
			foreach( $social_networks as $name => $value ):
				if($instance[$name]):
					if( $value == 'fb' ) {
						$value = 'facebook';
					} elseif( $value == 'rss' ) {
						$value = 'feed';
					} elseif( $value == 'google' ) {
						$value = 'googleplus';
					}
					
					$tooltip = $value;

					if( $tooltip == 'googleplus' ) {
						$tooltip = 'Google+';
					}					
			?>
			<a class="aione-social-network-icon aione-tooltip aione-<?php echo $value; ?> aioneicon-<?php echo $value; ?>" href="<?php echo $instance[$name]; ?>" data-placement="<?php echo strtolower( $instance['tooltip_pos'] ); ?>" data-title="<?php echo ucwords( $tooltip ); ?>" data-toggle="tooltip" data-original-title="" title="" <?php echo $nofollow; ?> target="<?php echo $instance['linktarget']; ?>" style="<?php echo $style; ?>"></a>

			<?php
				endif;
			endforeach;
			?>
			<?php if( isset($instance['show_custom']) && $instance['show_custom'] == 'Yes' && $theme_options['custom_icon_name'] && $theme_options['custom_icon_image'] ): ?>
			<a class="aione-social-network-icon aione-tooltip" target="<?php echo $instance['linktarget']; ?>" href="<?php echo $theme_options['custom_icon_link']; ?>"<?php echo $nofollow; ?> data-placement="<?php echo strtolower( $instance['tooltip_pos'] ); ?>" data-title="<?php echo $theme_options['custom_icon_name']; ?>" data-toggle="tooltip" data-original-title="" title="" style="<?php echo $style; ?>"><img src="<?php echo $theme_options['custom_icon_image']; ?>" alt="<?php echo $theme_options['custom_icon_name']; ?>" /></a>
			<?php endif; ?>
		</ul>
		<?php
		echo $after_widget;
	}

	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = $new_instance['title'];
		$instance['linktarget'] = $new_instance['linktarget'];
		$instance['icon_color'] = $new_instance['icon_color'];
		$instance['boxed_icon'] = $new_instance['boxed_icon'];
		$instance['boxed_color'] = $new_instance['boxed_color'];
		$instance['boxed_icon_radius'] = $new_instance['boxed_icon_radius'];
		$instance['tooltip_pos'] = $new_instance['tooltip_pos'];
		$instance['show_custom'] = $new_instance['show_custom'];
		$instance['fb_link'] = $new_instance['fb_link'];
		$instance['flickr_link'] = $new_instance['flickr_link'];
		$instance['rss_link'] = $new_instance['rss_link'];
		$instance['twitter_link'] = $new_instance['twitter_link'];
		$instance['vimeo_link'] = $new_instance['vimeo_link'];
		$instance['youtube_link'] = $new_instance['youtube_link'];
		$instance['instagram_link'] = $new_instance['instagram_link'];
		$instance['pinterest_link'] = $new_instance['pinterest_link'];
		$instance['tumblr_link'] = $new_instance['tumblr_link'];		
		$instance['google_link'] = $new_instance['google_link'];
		$instance['dribbble_link'] = $new_instance['dribbble_link'];
		$instance['digg_link'] = $new_instance['digg_link'];
		$instance['linkedin_link'] = $new_instance['linkedin_link'];		
		$instance['blogger_link'] = $new_instance['blogger_link'];
		$instance['skype_link'] = $new_instance['skype_link'];
		$instance['forrst_link'] = $new_instance['forrst_link'];
		$instance['myspace_link'] = $new_instance['myspace_link'];
		$instance['deviantart_link'] = $new_instance['deviantart_link'];	
		$instance['yahoo_link'] = $new_instance['yahoo_link'];
		$instance['reddit_link'] = $new_instance['reddit_link'];	
		$instance['paypal_link'] = $new_instance['paypal_link'];
		$instance['dropbox_link'] = $new_instance['dropbox_link'];
		$instance['soundcloud_link'] = $new_instance['soundcloud_link'];		
		$instance['vk_link'] = $new_instance['vk_link'];

		return $instance;
	}

	function form($instance)
	{
		$defaults = array('title' => 'Get Social', 'linktarget' => '', 'icon_color' => '', 'boxed_icon' => 'No', 'boxed_color' => '', 'boxed_icon_radius' => '4px', 'tooltip_pos' => 'top', 'rss_link' => '', 'fb_link' => '', 'twitter_link' => '', 'dribbble_link'=> '', 'google_link' => '', 'linkedin_link' => '', 'blogger_link' => '', 'tumblr_link' => '', 'reddit_link' => '', 'yahoo_link' => '', 'deviantart_link' => '', 'vimeo_link' => '', 'youtube_link' => '', 'pinterest_link' => '', 'digg_link' => '', 'flickr_link' => '', 'forrst_link' => '', 'myspace_link' => '', 'skype_link' => '', 'instagram_link' => '', 'vk_link' => '', 'dropbox_link' => '', 'soundcloud_link' => '', 'paypal_link' => '', 'show_custom' => 'No');
		$instance = wp_parse_args((array) $instance, $defaults); ?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('linktarget'); ?>">Link Target:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('linktarget'); ?>" name="<?php echo $this->get_field_name('linktarget'); ?>" value="<?php echo $instance['linktarget']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('icon_color'); ?>">Icons Color Hex Code:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('icon_color'); ?>" name="<?php echo $this->get_field_name('icon_color'); ?>" value="<?php echo $instance['icon_color']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('boxed_icon'); ?>">Icons Boxed:</label>
			<select id="<?php echo $this->get_field_id('boxed_icon'); ?>" name="<?php echo $this->get_field_name('boxed_icon'); ?>" class="widefat" style="width:100%;">
				<option <?php if ('No' == $instance['boxed_icon']) echo 'selected="selected"'; ?>>No</option>
				<option <?php if ('Yes' == $instance['boxed_icon']) echo 'selected="selected"'; ?>>Yes</option>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('boxed_color'); ?>">Boxed Icons Background Color Hex Code:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('boxed_color'); ?>" name="<?php echo $this->get_field_name('boxed_color'); ?>" value="<?php echo $instance['boxed_color']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('boxed_icon_radius'); ?>">Boxed Icons Radius:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('boxed_icon_radius'); ?>" name="<?php echo $this->get_field_name('boxed_icon_radius'); ?>" value="<?php echo $instance['boxed_icon_radius']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('tooltip_pos'); ?>">Tooltip Position:</label>
			<select id="<?php echo $this->get_field_id('tooltip_pos'); ?>" name="<?php echo $this->get_field_name('tooltip_pos'); ?>" class="widefat" style="width:100%;">
				<option <?php if ('Top' == $instance['tooltip_pos']) echo 'selected="selected"'; ?>>Top</option>
				<option <?php if ('Right' == $instance['tooltip_pos']) echo 'selected="selected"'; ?>>Right</option>
				<option <?php if ('Bottom' == $instance['tooltip_pos']) echo 'selected="selected"'; ?>>Bottom</option>
				<option <?php if ('Left' == $instance['tooltip_pos']) echo 'selected="selected"'; ?>>Left</option>
				<option <?php if ('None' == $instance['tooltip_pos']) echo 'selected="selected"'; ?>>None</option>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('show_custom'); ?>">Show Custom Icon:</label>
			<select id="<?php echo $this->get_field_id('show_custom'); ?>" name="<?php echo $this->get_field_name('show_custom'); ?>" class="widefat" style="width:100%;">
				<option <?php if ('No' == $instance['show_custom']) echo 'selected="selected"'; ?>>No</option>
				<option <?php if ('Yes' == $instance['show_custom']) echo 'selected="selected"'; ?>>Yes</option>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('rss_link'); ?>">RSS Link:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('rss_link'); ?>" name="<?php echo $this->get_field_name('rss_link'); ?>" value="<?php echo $instance['rss_link']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('fb_link'); ?>">Facebook Link:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('fb_link'); ?>" name="<?php echo $this->get_field_name('fb_link'); ?>" value="<?php echo $instance['fb_link']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('twitter_link'); ?>">Twitter Link:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('twitter_link'); ?>" name="<?php echo $this->get_field_name('twitter_link'); ?>" value="<?php echo $instance['twitter_link']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('dribbble_link'); ?>">Dribbble Link:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('dribbble_link'); ?>" name="<?php echo $this->get_field_name('dribbble_link'); ?>" value="<?php echo $instance['dribbble_link']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('google_link'); ?>">Google+ Link:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('google_link'); ?>" name="<?php echo $this->get_field_name('google_link'); ?>" value="<?php echo $instance['google_link']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('linkedin_link'); ?>">LinkedIn Link:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('linkedin_link'); ?>" name="<?php echo $this->get_field_name('linkedin_link'); ?>" value="<?php echo $instance['linkedin_link']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('blogger_link'); ?>">Blogger Link:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('blogger_link'); ?>" name="<?php echo $this->get_field_name('blogger_link'); ?>" value="<?php echo $instance['blogger_link']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('tumblr_link'); ?>">Tumblr Link:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('tumblr_link'); ?>" name="<?php echo $this->get_field_name('tumblr_link'); ?>" value="<?php echo $instance['tumblr_link']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('reddit_link'); ?>">Reddit Link:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('reddit_link'); ?>" name="<?php echo $this->get_field_name('reddit_link'); ?>" value="<?php echo $instance['reddit_link']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('yahoo_link'); ?>">Yahoo Link:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('yahoo_link'); ?>" name="<?php echo $this->get_field_name('yahoo_link'); ?>" value="<?php echo $instance['yahoo_link']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('deviantart_link'); ?>">Deviantart Link:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('deviantart_link'); ?>" name="<?php echo $this->get_field_name('deviantart_link'); ?>" value="<?php echo $instance['deviantart_link']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('vimeo_link'); ?>">Vimeo Link:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('vimeo_link'); ?>" name="<?php echo $this->get_field_name('vimeo_link'); ?>" value="<?php echo $instance['vimeo_link']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('youtube_link'); ?>">Youtube Link:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('youtube_link'); ?>" name="<?php echo $this->get_field_name('youtube_link'); ?>" value="<?php echo $instance['youtube_link']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('pinterest_link'); ?>">Pinterest Link:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('pinterest_link'); ?>" name="<?php echo $this->get_field_name('pinterest_link'); ?>" value="<?php echo $instance['pinterest_link']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('digg_link'); ?>">Digg Link:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('digg_link'); ?>" name="<?php echo $this->get_field_name('digg_link'); ?>" value="<?php echo $instance['digg_link']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('flickr_link'); ?>">Flickr Link:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('flickr_link'); ?>" name="<?php echo $this->get_field_name('flickr_link'); ?>" value="<?php echo $instance['flickr_link']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('forrst_link'); ?>">Forrst Link:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('forrst_link'); ?>" name="<?php echo $this->get_field_name('forrst_link'); ?>" value="<?php echo $instance['forrst_link']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('myspace_link'); ?>">Myspace Link:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('myspace_link'); ?>" name="<?php echo $this->get_field_name('myspace_link'); ?>" value="<?php echo $instance['myspace_link']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('skype_link'); ?>">Skype Link:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('skype_link'); ?>" name="<?php echo $this->get_field_name('skype_link'); ?>" value="<?php echo $instance['skype_link']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('instagram_link'); ?>">Instagram Link:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('instagram_link'); ?>" name="<?php echo $this->get_field_name('instagram_link'); ?>" value="<?php echo $instance['instagram_link']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('vk_link'); ?>">VK Link:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('vk_link'); ?>" name="<?php echo $this->get_field_name('vk_link'); ?>" value="<?php echo $instance['vk_link']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('paypal_link'); ?>">PayPal Link:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('paypal_link'); ?>" name="<?php echo $this->get_field_name('paypal_link'); ?>" value="<?php echo $instance['paypal_link']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('dropbox_link'); ?>">Dropbox Link:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('dropbox_link'); ?>" name="<?php echo $this->get_field_name('dropbox_link'); ?>" value="<?php echo $instance['dropbox_link']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('soundcloud_link'); ?>">Soundcloud Link:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('soundcloud_link'); ?>" name="<?php echo $this->get_field_name('soundcloud_link'); ?>" value="<?php echo $instance['soundcloud_link']; ?>" />
		</p>
	<?php
	}
}
?>