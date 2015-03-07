<?php
/*********************************************************************************************
 *
 *  Social Sharing
 *
 *********************************************************************************************/
$this->sections[] = array(
    'icon'      => 'el-icon-group',
    'title'     => __('Social Share Box ', 'redux-framework-demo'),
    'fields'    => array(
        array (
            'id' => 'social_share_box_icon_options_title',
            'icon' => true,
            'type' => 'info',
            'raw' => '<h3 style=\'margin: 0;\'>Social Share Box Icon Options</h3>',
        ),
        array (
            'id' => 'social_bg_color',
            'type' => 'color',
            'title' => __('Social Share Box Background Color','redux-framework-demo'),
            'subtitle'  => __('Social Share Box Background Color.', 'redux-framework-demo'),
            'desc' =>  __('Controls the background color of the social share box.','redux-framework-demo'),
            'default' => '#f6f6f6',
            'hint' => array(
                'title'   => __('Social Share Box Background Color','redux-framework-demo'),
                'content' => __('Social Share Box Background Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'sharing_social_links_icon_color',
            'type' => 'color',
            'title' => __('Social Sharing Box Custom Icons Color','redux-framework-demo'),
            'subtitle'  => __('Social Sharing Box Custom Icons Color.', 'redux-framework-demo'),
            'desc' =>  __('Select a custom social icon color.','redux-framework-demo'),
            'default' => '#bebdbd',
            'hint' => array(
                'title'   => __('Social Sharing Box Custom Icons Color','redux-framework-demo'),
                'content' => __('Social Sharing Box Custom Icons Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'sharing_social_links_boxed',
            'type' => 'switch',
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => false,
            'title' => __('Social Sharing Box Icons Boxed','redux-framework-demo'),
            'subtitle'  => __('Social Sharing Box Icons Boxed.', 'redux-framework-demo'),
            'desc' =>  __('Controls the color of the social icons in the sharing box.','redux-framework-demo'),
            'default' => 'No',
            'hint' => array(
                'title'   => __('Social Sharing Box Icons Boxed','redux-framework-demo'),
                'content' => __('Social Sharing Box Icons Boxed','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'sharing_social_links_box_color',
            'type' => 'color',
            'title' => __('Social Sharing Box Icons Custom Box Color','redux-framework-demo'),
            'subtitle'  => __('Social Sharing Box Icons Custom Box Color.', 'redux-framework-demo'),
            'desc' =>  __('Select a custom social icon box color.','redux-framework-demo'),
            'default' => '#e8e8e8',
            'hint' => array(
                'title'   => __('Social Sharing Box Icons Custom Box Color','redux-framework-demo'),
                'content' => __('Social Sharing Box Icons Custom Box Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'sharing_social_links_boxed_radius',
            'type' => 'text',
            'title' => __('Social Sharing Box Icons Boxed Radius','redux-framework-demo'),
            'subtitle'  => __('Social Sharing Box Icons Boxed Radius.', 'redux-framework-demo'),
            'desc' =>  __('Boxradius for the social icons. In pixels, ex: 4px.','redux-framework-demo'),
            'default' => '4px',
            'hint' => array(
                'title'   => __('Social Sharing Box Icons Boxed Radius','redux-framework-demo'),
                'content' => __('Social Sharing Box Icons Boxed Radius','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'sharing_social_links_tooltip_placement',
            'type' => 'select',
            'options' => array (
                'Top' => 'Top',
                'Right' => 'Right',
                'Bottom' => 'Bottom',
                'Left' => 'Left',
                'None' => 'None',
            ),
            'title' => __('Social Sharing Box Icons Tooltip Position','redux-framework-demo'),
            'subtitle'  => __('Social Sharing Box Icons Tooltip Position.', 'redux-framework-demo'),
            'desc' =>  __('Controls the tooltip position of the social icons in the sharing box.','redux-framework-demo'),
            'default' => 'Top',
            'hint' => array(
                'title'   => __('Social Sharing Box Icons Tooltip Position','redux-framework-demo'),
                'content' => __('Social Sharing Box Icons Tooltip Position','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'social_share_box_links_title',
            'icon' => true,
            'type' => 'info',
            'raw' => '<h3 style=\'margin: 0;\'>Social Share Box Links</h3>',
        ),
        array (
            'id' => 'sharing_facebook',
            'type' => 'switch',
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => true,
            'title' => __('Facebook','redux-framework-demo'),
            'subtitle'  => __('Facebook.', 'redux-framework-demo'),
            'desc' =>  __('YES to show the facebook sharing icon in blog posts.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Facebook','redux-framework-demo'),
                'content' => __('Facebook','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'sharing_twitter',
            'type' => 'switch',
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => true,
            'title' => __('Twitter','redux-framework-demo'),
            'subtitle'  => __('Twitter.', 'redux-framework-demo'),
            'desc' =>  __('YES to show the twitter sharing icon in blog posts.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Twitter','redux-framework-demo'),
                'content' => __('Twitter','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'sharing_reddit',
            'type' => 'switch',
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => true,
            'title' => __('Reddit','redux-framework-demo'),
            'subtitle'  => __('Reddit.', 'redux-framework-demo'),
            'desc' =>  __('YES to show the reddit sharing icon in blog posts.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Reddit','redux-framework-demo'),
                'content' => __('Reddit','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'sharing_linkedin',
            'type' => 'switch',
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => true,
            'title' => __('LinkedIn','redux-framework-demo'),
            'subtitle'  => __('LinkedIn.', 'redux-framework-demo'),
            'desc' =>  __('YES to show the linkedin sharing icon in blog posts.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('LinkedIn','redux-framework-demo'),
                'content' => __('LinkedIn','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'sharing_google',
            'type' => 'switch',
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => true,
            'title' => __('Google Plus','redux-framework-demo'),
            'subtitle'  => __('Google Plus.', 'redux-framework-demo'),
            'desc' =>  __('YES to show the g+ sharing icon in blog posts.','redux-framework-demo'),
             'hint' => array(
                'title'   => __('Google Plus','redux-framework-demo'),
                'content' => __('Google Plus','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'sharing_tumblr',
            'type' => 'switch',
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => true,
            'title' => __('Tumblr','redux-framework-demo'),
            'subtitle'  => __('Tumblr.', 'redux-framework-demo'),
            'desc' =>  __('YES to show the tumblr sharing icon in blog posts.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Tumblr','redux-framework-demo'),
                'content' => __('Tumblr','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'sharing_pinterest',
            'type' => 'switch',
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => true,
            'title' => __('Pinterest','redux-framework-demo'),
            'subtitle'  => __('Pinterest.', 'redux-framework-demo'),
            'desc' =>  __('YES to show the pinterest sharing icon in blog posts.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Pinterest','redux-framework-demo'),
                'content' => __('Pinterest','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'sharing_email',
            'type' => 'switch',
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => true,
            'title' => __('Email','redux-framework-demo'),
            'subtitle'  => __('Email.', 'redux-framework-demo'),
            'desc' =>  __('YES to show the email sharing icon in blog posts.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Email','redux-framework-demo'),
                'content' => __('Email','redux-framework-demo'),
            )
        ),

        array (
            'id' => 'facebook_link',
            'type' => 'text',
            'title' => __('Facebook URL','redux-framework-demo'),
            'subtitle'  => __('Facebook URL.', 'redux-framework-demo'),
            'desc' =>  __('URL to facebook','redux-framework-demo'),
            'default' => '',
            'hint' => array(
                'title'   => __('Facebook URL','redux-framework-demo'),
                'content' => __('Facebook URL','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'twitter_link',
            'type' => 'text',
            'title' => __('Twitter URL','redux-framework-demo'),
            'subtitle'  => __('Twitter URL.', 'redux-framework-demo'),
            'desc' =>  __('URL to Twitter','redux-framework-demo'),
            'default' => '',
            'hint' => array(
                'title'   => __('Twitter URL','redux-framework-demo'),
                'content' => __('Twitter URL','redux-framework-demo'),
            )
        ),

        array (
            'id' => 'linkedin_link',
            'type' => 'text',
            'title' => __('Linkedin URL','redux-framework-demo'),
            'subtitle'  => __('Linkedin URL.', 'redux-framework-demo'),
            'desc' =>  __('URL to Linkedin','redux-framework-demo'),
            'default' => '',
            'hint' => array(
                'title'   => __('Linkedin URL','redux-framework-demo'),
                'content' => __('Linkedin URL','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'dribbble_link',
            'type' => 'text',
            'title' => __('Dribbble URL','redux-framework-demo'),
            'subtitle'  => __('Dribbble URL.', 'redux-framework-demo'),
            'desc' =>  __('URL to Dribbble','redux-framework-demo'),
            'default' => '',
            'hint' => array(
                'title'   => __('Dribbble URL','redux-framework-demo'),
                'content' => __('Dribbble URL','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'rss_link',
            'type' => 'text',
            'title' => __('RSS URL','redux-framework-demo'),
            'subtitle'  => __('RSS URL.', 'redux-framework-demo'),
            'desc' =>  __('URL to RSS','redux-framework-demo'),
            'default' => '',
            'hint' => array(
                'title'   => __('RSS URL','redux-framework-demo'),
                'content' => __('RSS URL','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'youtube_link',
            'type' => 'text',
            'title' => __('Youtube URL','redux-framework-demo'),
            'subtitle'  => __('Youtube URL.', 'redux-framework-demo'),
            'desc' =>  __('URL to Youtube','redux-framework-demo'),
            'default' => '',
            'hint' => array(
                'title'   => __('Youtube URL','redux-framework-demo'),
                'content' => __('Youtube URL','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'instagram_link',
            'type' => 'text',
            'title' => __('Instagram URL','redux-framework-demo'),
            'subtitle'  => __('Instagram URL.', 'redux-framework-demo'),
            'desc' =>  __('URL to Instagram','redux-framework-demo'),
            'default' => '',
            'hint' => array(
                'title'   => __('Instagram URL','redux-framework-demo'),
                'content' => __('Instagram URL','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'pinterest_link',
            'type' => 'text',
            'title' => __('Pinterest URL','redux-framework-demo'),
            'subtitle'  => __('Pinterest URL.', 'redux-framework-demo'),
            'desc' =>  __('URL to Pinterest','redux-framework-demo'),
            'default' => '',
            'hint' => array(
                'title'   => __('Pinterest URL','redux-framework-demo'),
                'content' => __('Pinterest URL','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'flickr_link',
            'type' => 'text',
            'title' => __('Flickr URL','redux-framework-demo'),
            'subtitle'  => __('Flickr URL.', 'redux-framework-demo'),
            'desc' =>  __('URL to Flickr','redux-framework-demo'),
            'default' => '',
            'hint' => array(
                'title'   => __('Flickr URL','redux-framework-demo'),
                'content' => __('Flickr URL','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'vimeo_link',
            'type' => 'text',
            'title' => __('Vimeo URL','redux-framework-demo'),
            'subtitle'  => __('Vimeo URL.', 'redux-framework-demo'),
            'desc' =>  __('URL to Vimeo','redux-framework-demo'),
            'default' => '',
            'hint' => array(
                'title'   => __('Vimeo URL','redux-framework-demo'),
                'content' => __('Vimeo URL','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'tumblr_link',
            'type' => 'text',
            'title' => __('Tumblr URL','redux-framework-demo'),
            'subtitle'  => __('Tumblr URL.', 'redux-framework-demo'),
            'desc' =>  __('URL to Tumblr','redux-framework-demo'),
            'default' => '',
            'hint' => array(
                'title'   => __('Tumblr URL','redux-framework-demo'),
                'content' => __('Tumblr URL','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'google_link',
            'type' => 'text',
            'title' => __('Google Plus URL','redux-framework-demo'),
            'subtitle'  => __('Google Plus URL.', 'redux-framework-demo'),
            'desc' =>  __('URL to Google Plus','redux-framework-demo'),
            'default' => '',
            'hint' => array(
                'title'   => __('Google Plus URL','redux-framework-demo'),
                'content' => __('Google Plus URL','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'digg_link',
            'type' => 'text',
            'title' => __('Digg URL','redux-framework-demo'),
            'subtitle'  => __('Digg URL.', 'redux-framework-demo'),
            'desc' =>  __('URL to Digg','redux-framework-demo'),
            'default' => '',
            'hint' => array(
                'title'   => __('Digg URL','redux-framework-demo'),
                'content' => __('Digg URL','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'blogger_link',
            'type' => 'text',
            'title' => __('blogger URL','redux-framework-demo'),
            'subtitle'  => __('blogger URL.', 'redux-framework-demo'),
            'desc' =>  __('URL to blogger','redux-framework-demo'),
            'default' => '',
            'hint' => array(
                'title'   => __('blogger URL','redux-framework-demo'),
                'content' => __('blogger URL','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'skype_link',
            'type' => 'text',
            'title' => __('skype URL','redux-framework-demo'),
            'subtitle'  => __('skype URL.', 'redux-framework-demo'),
            'desc' =>  __('URL to skype','redux-framework-demo'),
            'default' => '',
            'hint' => array(
                'title'   => __('skype URL','redux-framework-demo'),
                'content' => __('skype URL','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'myspace_link',
            'type' => 'text',
            'title' => __('Myspace URL','redux-framework-demo'),
            'subtitle'  => __('Myspace URL.', 'redux-framework-demo'),
            'desc' =>  __('URL to Myspace','redux-framework-demo'),
            'default' => '',
            'hint' => array(
                'title'   => __('Myspace URL','redux-framework-demo'),
                'content' => __('Myspace URL','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'deviantart_link',
            'type' => 'text',
            'title' => __('deviantart URL','redux-framework-demo'),
            'subtitle'  => __('deviantart URL.', 'redux-framework-demo'),
            'desc' =>  __('URL to deviantart','redux-framework-demo'),
            'default' => '',
            'hint' => array(
                'title'   => __('deviantart URL','redux-framework-demo'),
                'content' => __('deviantart URL','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'yahoo_link',
            'type' => 'text',
            'title' => __('yahoo URL','redux-framework-demo'),
            'subtitle'  => __('yahoo URL.', 'redux-framework-demo'),
            'desc' =>  __('URL to yahoo','redux-framework-demo'),
            'default' => '',
            'hint' => array(
                'title'   => __('yahoo URL','redux-framework-demo'),
                'content' => __('yahoo URL','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'reddit_link',
            'type' => 'text',
            'title' => __('reddit URL','redux-framework-demo'),
            'subtitle'  => __('reddit URL.', 'redux-framework-demo'),
            'desc' =>  __('URL to reddit','redux-framework-demo'),
            'default' => '',
            'hint' => array(
                'title'   => __('reddit URL','redux-framework-demo'),
                'content' => __('reddit URL','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'forrst_link',
            'type' => 'text',
            'title' => __('forrst URL','redux-framework-demo'),
            'subtitle'  => __('forrst URL.', 'redux-framework-demo'),
            'desc' =>  __('URL to forrst','redux-framework-demo'),
            'default' => '',
            'hint' => array(
                'title'   => __('forrst URL','redux-framework-demo'),
                'content' => __('forrst URL','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'paypal_link',
            'type' => 'text',
            'title' => __('paypal URL','redux-framework-demo'),
            'subtitle'  => __('paypal URL.', 'redux-framework-demo'),
            'desc' =>  __('URL to paypal','redux-framework-demo'),
            'default' => '',
            'hint' => array(
                'title'   => __('paypal URL','redux-framework-demo'),
                'content' => __('paypal URL','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'dropbox_link',
            'type' => 'text',
            'title' => __('dropbox URL','redux-framework-demo'),
            'subtitle'  => __('dropbox URL.', 'redux-framework-demo'),
            'desc' =>  __('URL to dropbox','redux-framework-demo'),
            'default' => '',
            'hint' => array(
                'title'   => __('dropbox URL','redux-framework-demo'),
                'content' => __('dropbox URL','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'soundcloud_link',
            'type' => 'text',
            'title' => __('soundcloud URL','redux-framework-demo'),
            'subtitle'  => __('soundcloud URL.', 'redux-framework-demo'),
            'desc' =>  __('URL to soundcloud','redux-framework-demo'),
            'default' => '',
            'hint' => array(
                'title'   => __('soundcloud URL','redux-framework-demo'),
                'content' => __('soundcloud URL','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'vk_link',
            'type' => 'text',
            'title' => __('vk URL','redux-framework-demo'),
            'subtitle'  => __('vk URL.', 'redux-framework-demo'),
            'desc' =>  __('URL to vk','redux-framework-demo'),
            'default' => '',
            'hint' => array(
                'title'   => __('vk URL','redux-framework-demo'),
                'content' => __('vk URL','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'email_link',
            'type' => 'text',
            'title' => __('email URL','redux-framework-demo'),
            'subtitle'  => __('email URL.', 'redux-framework-demo'),
            'desc' =>  __('URL to email','redux-framework-demo'),
            'default' => '',
            'hint' => array(
                'title'   => __('email URL','redux-framework-demo'),
                'content' => __('email URL','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'custom_icon_name',
            'type' => 'text',
            'title' => __('custom icon Name','redux-framework-demo'),
            'subtitle'  => __('custom icon Name.', 'redux-framework-demo'),
            'desc' =>  __('URL to custom icon Name','redux-framework-demo'),
            'default' => '',
            'hint' => array(
                'title'   => __('custom icon Name','redux-framework-demo'),
                'content' => __('custom icon Name','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'custom_icon_link',
            'type' => 'text',
            'title' => __('custom icon URL','redux-framework-demo'),
            'subtitle'  => __('custom icon URL.', 'redux-framework-demo'),
            'desc' =>  __('URL to custom icon url','redux-framework-demo'),
            'default' => '',
            'hint' => array(
                'title'   => __('custom icon URL','redux-framework-demo'),
                'content' => __('custom icon URL','redux-framework-demo'),
            )
        ),
        /*
         array (
            'desc' => 'URL to custom icon url',
            'id' => 'custom_icon_image',
            'type' => 'text',
            'title' => 'custom icon URL',
            'default' => '',
        ),
        */


    )
);






$this->sections[] = array (
    'title' => __('Social Media','redux-framework-demo'),
    'subsection' => true,
    'fields' => array (

         /*array (
            'id' => 'social_sorter',
            'type' => 'info',
            'fields' => array (
                array (
                    'name' => 'Facebook',
                    'desc' => 'Insert your custom link to show the Facebook icon. Leave blank to hide icon.',
                    'id' => 'facebook_link',
                    'std' => '',
                    'type' => 'text',
                ),
                array (
                    'name' => 'Flickr',
                    'desc' => 'Insert your custom link to show the Flickr icon. Leave blank to hide icon.',
                    'id' => 'flickr_link',
                    'std' => '',
                    'type' => 'text',
                ),
                array (
                    'name' => 'RSS',
                    'desc' => 'Insert your custom link to show the RSS icon. Leave blank to hide icon.',
                    'id' => 'rss_link',
                    'std' => '',
                    'type' => 'text',
                ),
                array (
                    'name' => 'Twitter',
                    'desc' => 'Insert your custom link to show the Twitter icon. Leave blank to hide icon.',
                    'id' => 'twitter_link',
                    'std' => '',
                    'type' => 'text',
                ),
                array (
                    'name' => 'Vimeo',
                    'desc' => 'Insert your custom link to show the Vimeo icon. Leave blank to hide icon.',
                    'id' => 'vimeo_link',
                    'std' => '',
                    'type' => 'text',
                ),
                array (
                    'name' => 'Youtube',
                    'desc' => 'Insert your custom link to show the Youtube icon. Leave blank to hide icon.',
                    'id' => 'youtube_link',
                    'std' => '',
                    'type' => 'text',
                ),
                array (
                    'name' => 'Instagram',
                    'desc' => 'Insert your custom link to show the Instagram icon. Leave blank to hide icon.',
                    'id' => 'instagram_link',
                    'std' => '',
                    'type' => 'text',
                ),
                array (
                    'name' => 'Pinterest',
                    'desc' => 'Insert your custom link to show the Pinterest icon. Leave blank to hide icon.',
                    'id' => 'pinterest_link',
                    'std' => '',
                    'type' => 'text',
                ),
                array (
                    'name' => 'Tumblr',
                    'desc' => 'Insert your custom link to show the Tumblr icon. Leave blank to hide icon.',
                    'id' => 'tumblr_link',
                    'std' => '',
                    'type' => 'text',
                ),
                array (
                    'name' => 'Google+',
                    'desc' => 'Insert your custom link to show the Google+ icon. Leave blank to hide icon.',
                    'id' => 'google_link',
                    'std' => '',
                    'type' => 'text',
                ),
                array (
                    'name' => 'Dribbble',
                    'desc' => 'Insert your custom link to show the Dribbble icon. Leave blank to hide icon.',
                    'id' => 'dribbble_link',
                    'std' => '',
                    'type' => 'text',
                ),
                array (
                    'name' => 'Digg',
                    'desc' => 'Insert your custom link to show the Digg icon. Leave blank to hide icon.',
                    'id' => 'digg_link',
                    'std' => '',
                    'type' => 'text',
                ),
                array (
                    'name' => 'LinkedIn',
                    'desc' => 'Insert your custom link to show the LinkedIn icon. Leave blank to hide icon.',
                    'id' => 'linkedin_link',
                    'std' => '',
                    'type' => 'text',
                ),
                array (
                    'name' => 'Blogger',
                    'desc' => 'Insert your custom link to show the Blogger icon. Leave blank to hide icon.',
                    'id' => 'blogger_link',
                    'std' => '',
                    'type' => 'text',
                ),
                array (
                    'name' => 'Skype',
                    'desc' => 'Insert your custom link to show the Skype icon. Leave blank to hide icon.',
                    'id' => 'skype_link',
                    'std' => '',
                    'type' => 'text',
                ),
                array (
                    'name' => 'Forrst',
                    'desc' => 'Insert your custom link to show the Forrst icon. Leave blank to hide icon.',
                    'id' => 'forrst_link',
                    'std' => '',
                    'type' => 'text',
                ),
                array (
                    'name' => 'Myspace',
                    'desc' => 'Insert your custom link to show the Myspace icon. Leave blank to hide icon.',
                    'id' => 'myspace_link',
                    'std' => '',
                    'type' => 'text',
                ),
                array (
                    'name' => 'Deviantart',
                    'desc' => 'Insert your custom link to show the Deviantart icon. Leave blank to hide icon.',
                    'id' => 'deviantart_link',
                    'std' => '',
                    'type' => 'text',
                ),
                array (
                    'name' => 'Yahoo',
                    'desc' => 'Insert your custom link to show the Yahoo icon. Leave blank to hide icon.',
                    'id' => 'yahoo_link',
                    'std' => '',
                    'type' => 'text',
                ),
                array (
                    'name' => 'Reddit',
                    'desc' => 'Insert your custom link to show the Redditt icon. Leave blank to hide icon.',
                    'id' => 'reddit_link',
                    'std' => '',
                    'type' => 'text',
                ),
                array (
                    'name' => 'Paypal',
                    'desc' => 'Insert your custom link to show the Paypal icon. Leave blank to hide icon.',
                    'id' => 'paypal_link',
                    'std' => '',
                    'type' => 'text',
                ),
                array (
                    'name' => 'Dropbox',
                    'desc' => 'Insert your custom link to show the Dropbox icon. Leave blank to hide icon.',
                    'id' => 'dropbox_link',
                    'std' => '',
                    'type' => 'text',
                ),
                array (
                    'name' => 'Soundclound',
                    'desc' => 'Insert your custom link to show the Soundcloud icon. Leave blank to hide icon.',
                    'id' => 'soundcloud_link',
                    'std' => '',
                    'type' => 'text',
                ),
                array (
                    'name' => 'VK',
                    'desc' => 'Insert your custom link to show the VK icon. Leave blank to hide icon.',
                    'id' => 'vk_link',
                    'std' => '',
                    'type' => 'text',
                ),
                array (
                    'name' => 'Email Address',
                    'desc' => 'Insert your custom link to show the mail icon. Leave blank to hide icon.',
                    'id' => 'email_link',
                    'std' => '',
                    'type' => 'text',
                ),
            ),


        ),
         */
        array (
            'id' => 'custom_color_scheme_element',
            'icon' => true,
            'type' => 'info',
            'raw' => '<h3 style=\'margin: 0;\'>Custom Social Icon</h3>',
        ),
        array (
            'id' => 'custom_icon_name',
            'type' => 'text',
            'title' => __('Custom Icon Name','redux-framework-demo'),
            'subtitle'  => __('Custom Icon Name.', 'redux-framework-demo'),
            'desc' =>  __('This is the icon name that shows in the hover tooltip.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Custom Icon Name','redux-framework-demo'),
                'content' => __('Custom Icon Name','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'custom_icon_image',
            'type' => 'media',
            'title' => __('Custom Icon Image','redux-framework-demo'),
            'subtitle'  => __('Custom Icon Image.', 'redux-framework-demo'),
            'desc' =>  __('Select an image file for your custom icon.','redux-framework-demo'),
            'url' => true,
            'hint' => array(
                'title'   => __('Custom Icon Image','redux-framework-demo'),
                'content' => __('Custom Icon Image','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'custom_icon_image_retina',
            'type' => 'media',
            'title' => __('Custom Icon Image Retina','redux-framework-demo'),
            'subtitle'  => __('Custom Icon Image Retina.', 'redux-framework-demo'),
            'desc' =>  __('Select an image file for the retina version of the icon. It should be 2x the size of main icon.','redux-framework-demo'),
            'url' => true,
            'hint' => array(
                'title'   => __('Custom Icon Image Retina','redux-framework-demo'),
                'content' => __('Custom Icon Image Retina','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'retina_icon_width',
            'type' => 'text',
            'title' => __('Standard Icon Width for Retina Icon','redux-framework-demo'),
            'subtitle'  => __('Standard Icon Width for Retina Icon.', 'redux-framework-demo'),
            'desc' =>  __('If retina icon is added, enter the standard icon (1x) version width, do not enter the retina icon width.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Standard Icon Width for Retina Icon','redux-framework-demo'),
                'content' => __('Standard Icon Width for Retina Icon','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'retina_icon_height',
            'type' => 'text',
            'title' => __('Standard Icon Height for Retina Icon','redux-framework-demo'),
            'subtitle'  => __('Standard Icon Height for Retina Icon.', 'redux-framework-demo'),
            'desc' =>  __('If retina icon is added, enter the standard icon (1x) version height, do not enter the retina icon height.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Standard Icon Height for Retina Icon','redux-framework-demo'),
                'content' => __('Standard Icon Height for Retina Icon','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'custom_icon_link',
            'type' => 'text',
            'title' => __('Custom Icon Link','redux-framework-demo'),
            'subtitle'  => __('Custom Icon Link.', 'redux-framework-demo'),
            'desc' =>  __('Insert a link for your custom icon.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Custom Icon Link','redux-framework-demo'),
                'content' => __('Custom Icon Link','redux-framework-demo'),
            )
        ),
    ),
    'icon' => 'el-icon-cog',
);
?>