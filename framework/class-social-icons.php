<?php
/**
 * Social Icons Class
 *
 * WARNING: This file is part of the AIONE Core Framework.
 * Do not edit the core files.
 * Add any modifications necessary under a child theme.
 *
 * @package  AIONE/Framework
 * @author   OXOSolutions
 * @link	 http://oxosolutions.com
 */

// Exit if accessed directly
if( ! defined( 'ABSPATH' ) ) {
	die;
}

// Don't duplicate me!
if( ! class_exists( 'Aione_SocialIcons' ) ) {

	class Aione_SocialIcons {

		public $args = array(
			'icon_order' => '',
			'icon_colors' => '',
			'box_colors' => '',
		);

		/**
		 * Initiate the class
		 */
		public function __construct() {

			add_filter( 'aione_attr_social-icons-class-social-networks', array( $this, 'social_networks_attr' ) );
			add_filter( 'aione_attr_social-icons-class-icon', array( $this, 'icon_attr' ) );

		}

		/**
		 * Renders all soical icons not belonging to shortcodes
		 *
		 * @since 3.5.0
		 * @param  array   $args Holding all necessarry data for social icons
		 * @return string  The HTML mark up for social icons, incl. wrapping container
		 */
		public function render_social_icons( $args ) {
			global $theme_options;
			
			$this->args = $args;

			if( isset( $this->args['sharingbox'] ) && $this->args['sharingbox'] == 'yes' ) {
				$social_networks = $this->get_sharingbox_social_links_array( $this->args );
			} elseif( isset( $this->args['authorpage'] ) && $this->args['authorpage'] == 'yes' ) {
				$social_networks = $this->get_authorpage_social_links_array( $this->args );
			} else {
				$social_networks = $this->get_social_links_array();		
			}
			
			/*if( ! array_key_exists( 'custom', $theme_options['social_icon_ordering'] ) ) {
				$theme_options['social_icon_ordering']['custom'] = array();
			}*/
			
			//$social_networks = $this->order_array_like_array( $social_networks, $theme_options['social_icon_ordering']['custom'] );
			//
			
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

						if( $field_name == 'google' ) {
							$field_name = 'googleplus';
						} elseif($field_name == 'email' ) {
							$field_name = 'mail';
						}

						if( ! isset( $social_networks_old[$field_name] ) ) {
							continue;
						}

						$social_networks[$field_name] = $social_networks_old[$field_name];
					}
				}
			}

			if( isset( $social_networks_old['custom'] ) && $social_networks_old['custom'] ) {
				$social_networks['custom'] = $social_networks_old['custom'];
			}

			$icon_colors = explode( '|', $this->args['icon_colors'] );
			$num_of_icon_colors = count( $icon_colors );

			$box_colors = explode( '|', $this->args['box_colors'] );
			$num_of_box_colors = count( $box_colors );		

			$icons = '';

			for( $i = 0; $i < count( $social_networks ); $i++ ) {
				if( $num_of_icon_colors == 1 ) {
					$icon_colors[$i] = $icon_colors[0];
				}

				if( $num_of_box_colors == 1 ) {
					$box_colors[$i] = $box_colors[0];
				}				
			}

			$i = 0;
			foreach( $social_networks as $network => $link ) {
				$custom = '';
				if( $network == 'custom' ) {
					$custom = sprintf( '<img src="%s" alt="%s" />', $theme_options['custom_icon_image'], $theme_options['custom_icon_name'] );

					$network = 'custom_' . $theme_options['custom_icon_name'];

				}

				$icon_options = array( 
					'social_network' 	=> $network, 
					'social_link' 		=> $link, 
				);

				if( isset( $icon_colors[$i] ) && $icon_colors[$i] ) {
					$icon_options['icon_color'] = $icon_colors[$i];
				} else {
					$icon_options['icon_color'] = '';
				}

				if( isset( $box_colors[$i] ) && $box_colors[$i] ) {
					$icon_options['box_color'] = $box_colors[$i];
				} else {
					$icon_options['box_color'] = '';
				}
				
				$icons .= sprintf( '<a %s>%s</a>', aione_attr( 'social-icons-class-icon', $icon_options ), $custom );
				$i++;
			}			

			if( isset( $this->args['position'] ) && ( $this->args['position'] == 'header' ||
				$this->args['position'] == 'footer' )
			) {
				$html = sprintf( '<div %s>%s</div>', aione_attr( 'social-icons-class-social-networks' ), $icons );
			} else {
				$html = sprintf( '<div %s>%s<div class="aione-clearfix"></div></div>', aione_attr( 'social-icons-class-social-networks' ), $icons );
			}

			return $html;
		}

		function social_networks_attr() {

			$attr['class'] = 'aione-social-networks';

			if( $this->args['icon_boxed'] == 'Yes' ) {
				$attr['class'] .= ' boxed-icons';
			}		

			return $attr;

		} 	

		function icon_attr( $args ) {
			global $theme_options;

			$attr = array();
			$attr['class'] = '';
			$attr['style'] = '';

			if( substr( $args['social_network'], 0, 7 ) === 'custom_' ) {
				$attr['class'] .= 'custom ';
				$tooltip = str_replace( 'custom_', '', $args['social_network'] );
				$args['social_network'] = strtolower( $tooltip );
			} else {
				$tooltip = ucfirst( $args['social_network'] );
			}

			$attr['class'] .= sprintf( 'aione-social-network-icon aione-tooltip aione-%s aioneicon-%s', $args['social_network'], $args['social_network'] );

			$link = $args['social_link'];

			if( $this->args['linktarget'] ) {
				$attr['target'] = '_blank';
			}
			
			if( $args['social_network'] == 'mail' ) {
				$link = 'mailto:' . str_replace( 'mailto:', '', $args['social_link'] );
				$attr['target'] = '_self';
			}

			$attr['href'] = $link;			

			if( $theme_options['nofollow_social_links'] ) {
				$attr['rel'] = 'nofollow';
			}

			if( $args['icon_color'] ) {
				$attr['style'] = sprintf( 'color:%s;', $args['icon_color'] );
			}

			if( strtolower( $this->args['icon_boxed'] ) == 'yes' && 
				$args['box_color']
			) {
					$attr['style'] .= sprintf( 'background-color:%s;border-color:%s;', $args['box_color'], $args['box_color'] );	
			}			

			if( strtolower( $this->args['icon_boxed'] ) == 'yes' &&
				$this->args['icon_boxed_radius'] || $this->args['icon_boxed_radius'] === '0'
			) {
				if( $this->args['icon_boxed_radius'] == 'round' ) {
					$this->args['icon_boxed_radius'] = '50%';
				}

				$attr['style'] .= sprintf( 'border-radius:%s;', $this->args['icon_boxed_radius'] );
			}			

			if( strtolower( $this->args['tooltip_placement'] ) != 'none' ) {
				$attr['data-placement'] = strtolower( $this->args['tooltip_placement'] );
				if( $tooltip == 'Googleplus' ) {
					$tooltip = 'Google+';
				}
				$attr['data-title'] = $tooltip;
				$attr['data-toggle'] = 'tooltip';
			}
			
			$attr['title'] = $tooltip;

			return $attr;

		}	

		/**
		 * Sets up the array for social links that don't belong to sharing box.
		 *
		 * @since 3.5.0
		 * @return array  The social links array containing the social media and links to them.
		 */
		function get_social_links_array() {
			global $theme_options;

			$social_links_array = array();

			if( isset( $theme_options['facebook_link'] ) && $theme_options['facebook_link'] ) {
				$social_links_array['facebook'] = $theme_options['facebook_link'];
			}
			if( isset( $theme_options['twitter_link'] ) && $theme_options['twitter_link'] ) {
				$social_links_array['twitter'] = $theme_options['twitter_link'];
			}
			if( isset( $theme_options['linkedin_link'] ) && $theme_options['linkedin_link'] ) {
				$social_links_array['linkedin'] = $theme_options['linkedin_link'];
			}
			if( isset( $theme_options['dribbble_link'] ) && $theme_options['dribbble_link'] ) {
				$social_links_array['dribbble'] = $theme_options['dribbble_link'];
			}
			if( isset( $theme_options['rss_link'] ) && $theme_options['rss_link'] ) {
				$social_links_array['rss'] = $theme_options['rss_link'];
			}
			if( isset( $theme_options['youtube_link'] ) && $theme_options['youtube_link'] ) {
				$social_links_array['youtube'] = $theme_options['youtube_link'];
			}
			if( isset( $theme_options['instagram_link'] ) && $theme_options['instagram_link'] ) {
				$social_links_array['instagram'] = $theme_options['instagram_link'];
			}			
			if( isset( $theme_options['pinterest_link'] ) && $theme_options['pinterest_link'] ) {
				$social_links_array['pinterest'] = $theme_options['pinterest_link'];
			}
			if( isset( $theme_options['flickr_link'] ) && $theme_options['flickr_link'] ) {
				$social_links_array['flickr'] = $theme_options['flickr_link'];
			}
			if( isset( $theme_options['vimeo_link'] ) && $theme_options['vimeo_link'] ) {
				$social_links_array['vimeo'] = $theme_options['vimeo_link'];
			}
			if( isset( $theme_options['tumblr_link'] ) && $theme_options['tumblr_link'] ) {
				$social_links_array['tumblr'] = $theme_options['tumblr_link'];
			}
			if( isset( $theme_options['google_link'] ) && $theme_options['google_link'] ) {
				$social_links_array['googleplus'] = $theme_options['google_link'];
			}  
			if( isset( $theme_options['digg_link'] ) && $theme_options['digg_link'] ) {
				$social_links_array['digg'] = $theme_options['digg_link'];
			}
			if( isset( $theme_options['blogger_link'] ) && $theme_options['blogger_link'] ) {
				$social_links_array['blogger'] = $theme_options['blogger_link'];
			}
			if( isset( $theme_options['skype_link'] ) && $theme_options['skype_link'] ) {
				$social_links_array['skype'] = $theme_options['skype_link'];
			}
			if( isset( $theme_options['myspace_link'] ) && $theme_options['myspace_link'] ) {
				$social_links_array['myspace'] = $theme_options['myspace_link'];
			}
			if( isset( $theme_options['deviantart_link'] ) && $theme_options['deviantart_link'] ) {
				$social_links_array['deviantart'] = $theme_options['deviantart_link'];
			}
			if( isset( $theme_options['yahoo_link'] ) && $theme_options['yahoo_link'] ) {
				$social_links_array['yahoo'] = $theme_options['yahoo_link'];
			}
			if( isset( $theme_options['reddit_link'] ) && $theme_options['reddit_link'] ) {
				$social_links_array['reddit'] = $theme_options['reddit_link'];
			}
			if( isset( $theme_options['forrst_link'] ) && $theme_options['forrst_link'] ) {
				$social_links_array['forrst'] = $theme_options['forrst_link'];
			}
			if( isset( $theme_options['paypal_link'] ) && $theme_options['paypal_link'] ) {
				$social_links_array['paypal'] = $theme_options['paypal_link'];
			}	
			if( isset( $theme_options['dropbox_link'] ) && $theme_options['dropbox_link'] ) {
				$social_links_array['dropbox'] = $theme_options['dropbox_link'];
			}	
			if( isset( $theme_options['soundcloud_link'] ) && $theme_options['soundcloud_link'] ) {
				$social_links_array['soundcloud'] = $theme_options['soundcloud_link'];
			}				
			if( isset( $theme_options['vk_link'] ) && $theme_options['vk_link'] ) {
				$social_links_array['vk'] = $theme_options['vk_link'];
			}			
			if( isset( $theme_options['email_link'] ) && $theme_options['email_link'] ) {
				$social_links_array['mail'] = $theme_options['email_link'];
			}
			if( $theme_options['custom_icon_name'] && $theme_options['custom_icon_image'] && $theme_options['custom_icon_link'] ) {
				$social_links_array['custom'] = $theme_options['custom_icon_link'];
			}

			return $social_links_array;
		}

		/**
		 * Set up the array for sharing box social networks.
		 *
		 * @since 3.5.0
		 * @param  array  $args Holding all necessarry data for social icons
		 * @return array  The social links array containing the social media and links to them.
		 */
		function get_sharingbox_social_links_array( $args ) {	
			global $theme_options;

			$social_links_array = array();

				if( $theme_options['sharing_facebook'] ) {
					$soical_link = 'http://www.facebook.com/sharer.php?m2w&s=100&p&#91;url&#93;=' . $args['link'] . '&p&#91;images&#93;&#91;0&#93;=http://www.gravatar.com/avatar/2f8ec4a9ad7a39534f764d749e001046.png&p&#91;title&#93;=' . rawurlencode( $args['title'] );
					$social_links_array['facebook'] = $soical_link;
				}

				if( $theme_options['sharing_twitter'] ) {
					$soical_link = 'http://twitter.com/home?status=' . rawurlencode( $args['title'] ) . ' ' . $args['link'];
					$social_links_array['twitter'] = $soical_link;
				}

				if( $theme_options['sharing_linkedin'] ) {
					$soical_link = 'http://linkedin.com/shareArticle?mini=true&amp;url=' . $args['link'] . '&amp;title=' . rawurlencode( $args['title'] );
					$social_links_array['linkedin'] = $soical_link;
				}

				if( $theme_options['sharing_reddit'] ) {
					$soical_link = 'http://reddit.com/submit?url=' . $args['link'] . '&amp;title=' . rawurlencode( $args['title'] );
					$social_links_array['reddit'] = $soical_link;
				}

				if( $theme_options['sharing_tumblr'] ) {
					$soical_link = 'http://www.tumblr.com/share/link?url=' . rawurlencode( $args['link'] ) . '&amp;name=' . rawurlencode( $args['title'] ) .'&amp;description=' . rawurlencode( $args['description'] );
					$social_links_array['tumblr'] = $soical_link;
				}

				if( $theme_options['sharing_google'] ) {
					$soical_link = 'https://plus.google.com/share?url=' . $args['link'] . '" onclick="javascript:window.open(this.href,\'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600\');return false;';
					$social_links_array['googleplus'] = $soical_link;
				}

				if( $theme_options['sharing_pinterest'] ) {
					$soical_link = 'http://pinterest.com/pin/create/button/?url=' . urlencode( $args['link'] ) . '&amp;description=' . rawurlencode( $args['description'] ) . '&amp;media=' . rawurlencode( $args['pinterest_image'] );
					$social_links_array['pinterest'] = $soical_link;
				}

				if( $theme_options['sharing_vk'] ) {
					$soical_link = sprintf( 'http://vkontakte.ru/share.php?url=%s&amp;title=%s&amp;description=%s', rawurlencode( $args['link'] ), rawurlencode( $args['title'] ), rawurlencode( $args['description'] ) );
					$social_links_array['vk'] = $soical_link;
				}

				if( $theme_options['sharing_email'] ) {
					$soical_link = 'mailto:?subject=' . $args['title'] . '&amp;body=' . $args['link'];
					$social_links_array['mail'] = $soical_link;
				}

				return $social_links_array;
		}
		
		/**
		 * Set up the array for author page social networks.
		 *
		 * @since 3.5.0
		 * @param  array  $args Holding all necessarry data for social icons
		 * @return array  The social links array containing the social media and links to them.
		 */
		function get_authorpage_social_links_array( $args ) {	
			global $theme_options;

			$social_links_array = array();

				if( get_the_author_meta( 'author_facebook', $args['author_id'] ) ) {
					$social_links_array['facebook'] = get_the_author_meta( 'author_facebook', $args['author_id'] );
				}

				if( get_the_author_meta( 'author_twitter', $args['author_id'] ) ) {
					$social_links_array['twitter'] = get_the_author_meta( 'author_twitter', $args['author_id'] );
				}

				if( get_the_author_meta( 'author_linkedin', $args['author_id'] ) ) {
					$social_links_array['linkedin'] = get_the_author_meta( 'author_linkedin', $args['author_id'] );
				}
				
				if( get_the_author_meta( 'author_dribble', $args['author_id'] ) ) {
					$social_links_array['dribbble'] = get_the_author_meta( 'author_dribble', $args['author_id'] );
				}				

				if( get_the_author_meta( 'author_gplus', $args['author_id'] ) ) {
					$social_links_array['googleplus'] = get_the_author_meta( 'author_gplus', $args['author_id'] );
				}

				if( get_the_author_meta( 'email', $args['author_id'] ) ) {
					$social_links_array['mail'] = 'mailto:' . get_the_author_meta( 'email', $args['author_id'] );
				}

				return $social_links_array;
		}		

		/**
		 * Reorder a given array by the indices of another given array.
		 *
		 * @since 3.5.0
		 * @param  array  $to_be_ordered The array that will be reordered.
		 * @return array  $order_like The array that gives the ordering structure for $to_be_ordered.
		 */
		function order_array_like_array( Array $to_be_ordered, Array $order_like ) {
			$ordered = array();

			return $ordered;
		}	

	}
}
