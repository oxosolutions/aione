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
            'desc' => 'Controls the background color of the social share box.',
            'id' => 'social_bg_color',
            'type' => 'color',
            'title' => 'Social Share Box Background Color',
            'default' => '#f6f6f6',
        ),
        array (
            'desc' => 'Select a custom social icon color.',
            'id' => 'sharing_social_links_icon_color',
            'type' => 'color',
            'title' => 'Social Sharing Box Custom Icons Color',
            'default' => '#bebdbd',
        ),
        array (
            'desc' => 'Controls the color of the social icons in the sharing box.',
            'id' => 'sharing_social_links_boxed',
            'type' => 'select',
            'options' => array (
                'No' => 'No',
                'Yes' => 'Yes',
            ),
            'title' => 'Social Sharing Box Icons Boxed',
            'default' => 'No',
        ),
        array (
            'desc' => 'Select a custom social icon box color.',
            'id' => 'sharing_social_links_box_color',
            'type' => 'color',
            'title' => 'Social Sharing Box Icons Custom Box Color',
            'default' => '#e8e8e8',
        ),
        array (
            'desc' => 'Boxradius for the social icons. In pixels, ex: 4px.',
            'id' => 'sharing_social_links_boxed_radius',
            'type' => 'text',
            'title' => 'Social Sharing Box Icons Boxed Radius',
            'default' => '4px',
        ),
        array (
            'desc' => 'Controls the tooltip position of the social icons in the sharing box.',
            'id' => 'sharing_social_links_tooltip_placement',
            'type' => 'select',
            'options' => array (
                'Top' => 'Top',
                'Right' => 'Right',
                'Bottom' => 'Bottom',
                'Left' => 'Left',
                'None' => 'None',
            ),
            'title' => 'Social Sharing Box Icons Tooltip Position',
            'default' => 'Top',
        ),
        array (
            'id' => 'social_share_box_links_title',
            'icon' => true,
            'type' => 'info',
            'raw' => '<h3 style=\'margin: 0;\'>Social Share Box Links</h3>',
        ),
        array (
            'desc' => 'Check the box to show the facebook sharing icon in blog posts.',
            'id' => 'sharing_facebook',
            'type' => 'checkbox',
            'title' => 'Facebook',
            'default' => 1,
        ),
        array (
            'desc' => 'Check the box to show the twitter sharing icon in blog posts.',
            'id' => 'sharing_twitter',
            'type' => 'checkbox',
            'title' => 'Twitter',
            'default' => 1,
        ),
        array (
            'desc' => 'Check the box to show the reddit sharing icon in blog posts.',
            'id' => 'sharing_reddit',
            'type' => 'checkbox',
            'title' => 'Reddit',
            'default' => 1,
        ),
        array (
            'desc' => 'Check the box to show the linkedin sharing icon in blog posts.',
            'id' => 'sharing_linkedin',
            'type' => 'checkbox',
            'title' => 'LinkedIn',
            'default' => 1,
        ),
        array (
            'desc' => 'Check the box to show the g+ sharing icon in blog posts.',
            'id' => 'sharing_google',
            'type' => 'checkbox',
            'title' => 'Google Plus',
            'default' => 1,
        ),
        array (
            'desc' => 'Check the box to show the tumblr sharing icon in blog posts.',
            'id' => 'sharing_tumblr',
            'type' => 'checkbox',
            'title' => 'Tumblr',
            'default' => 1,
        ),
        array (
            'desc' => 'Check the box to show the pinterest sharing icon in blog posts.',
            'id' => 'sharing_pinterest',
            'type' => 'checkbox',
            'title' => 'Pinterest',
            'default' => 1,
        ),
        array (
            'desc' => 'Check the box to show the email sharing icon in blog posts.',
            'id' => 'sharing_email',
            'type' => 'checkbox',
            'title' => 'Email',
            'default' => 1,
        ),
    )


);







$this->sections[] = array (
    'title' => 'Social Media',
    'subsection' => true,
    'fields' => array (
        array (
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
            'desc' => '<h3 style=\'color: red;\'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field\'s configuration:</p><pre style=\'overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;\'>array(3) {
        ["id"]=>
        string(13) "social_sorter"
        ["type"]=>
        string(13) "aione_sorter"
        ["fields"]=>array(25) {
            [0]=>array(5) {
                ["name"]=>
                string(8) "Facebook"
                ["desc"]=>
                string(76) "Insert your custom link to show the Facebook icon. Leave blank to hide icon."
                ["id"]=>
                string(13) "facebook_link"
                ["std"]=>
                string(0) ""
                ["type"]=>
                string(4) "text"
            }
            [1]=>array(5) {
                ["name"]=>
                string(6) "Flickr"
                ["desc"]=>
                string(74) "Insert your custom link to show the Flickr icon. Leave blank to hide icon."
                ["id"]=>
                string(11) "flickr_link"
                ["std"]=>
                string(0) ""
                ["type"]=>
                string(4) "text"
            }
            [2]=>array(5) {
                ["name"]=>
                string(3) "RSS"
                ["desc"]=>
                string(71) "Insert your custom link to show the RSS icon. Leave blank to hide icon."
                ["id"]=>
                string(8) "rss_link"
                ["std"]=>
                string(0) ""
                ["type"]=>
                string(4) "text"
            }
            [3]=>array(5) {
                ["name"]=>
                string(7) "Twitter"
                ["desc"]=>
                string(75) "Insert your custom link to show the Twitter icon. Leave blank to hide icon."
                ["id"]=>
                string(12) "twitter_link"
                ["std"]=>
                string(0) ""
                ["type"]=>
                string(4) "text"
            }
            [4]=>array(5) {
                ["name"]=>
                string(5) "Vimeo"
                ["desc"]=>
                string(73) "Insert your custom link to show the Vimeo icon. Leave blank to hide icon."
                ["id"]=>
                string(10) "vimeo_link"
                ["std"]=>
                string(0) ""
                ["type"]=>
                string(4) "text"
            }
            [5]=>array(5) {
                ["name"]=>
                string(7) "Youtube"
                ["desc"]=>
                string(75) "Insert your custom link to show the Youtube icon. Leave blank to hide icon."
                ["id"]=>
                string(12) "youtube_link"
                ["std"]=>
                string(0) ""
                ["type"]=>
                string(4) "text"
            }
            [6]=>array(5) {
                ["name"]=>
                string(9) "Instagram"
                ["desc"]=>
                string(77) "Insert your custom link to show the Instagram icon. Leave blank to hide icon."
                ["id"]=>
                string(14) "instagram_link"
                ["std"]=>
                string(0) ""
                ["type"]=>
                string(4) "text"
            }
            [7]=>array(5) {
                ["name"]=>
                string(9) "Pinterest"
                ["desc"]=>
                string(77) "Insert your custom link to show the Pinterest icon. Leave blank to hide icon."
                ["id"]=>
                string(14) "pinterest_link"
                ["std"]=>
                string(0) ""
                ["type"]=>
                string(4) "text"
            }
            [8]=>array(5) {
                ["name"]=>
                string(6) "Tumblr"
                ["desc"]=>
                string(74) "Insert your custom link to show the Tumblr icon. Leave blank to hide icon."
                ["id"]=>
                string(11) "tumblr_link"
                ["std"]=>
                string(0) ""
                ["type"]=>
                string(4) "text"
            }
            [9]=>array(5) {
                ["name"]=>
                string(7) "Google+"
                ["desc"]=>
                string(75) "Insert your custom link to show the Google+ icon. Leave blank to hide icon."
                ["id"]=>
                string(11) "google_link"
                ["std"]=>
                string(0) ""
                ["type"]=>
                string(4) "text"
            }
            [10]=>array(5) {
                ["name"]=>
                string(8) "Dribbble"
                ["desc"]=>
                string(76) "Insert your custom link to show the Dribbble icon. Leave blank to hide icon."
                ["id"]=>
                string(13) "dribbble_link"
                ["std"]=>
                string(0) ""
                ["type"]=>
                string(4) "text"
            }
            [11]=>array(5) {
                ["name"]=>
                string(4) "Digg"
                ["desc"]=>
                string(72) "Insert your custom link to show the Digg icon. Leave blank to hide icon."
                ["id"]=>
                string(9) "digg_link"
                ["std"]=>
                string(0) ""
                ["type"]=>
                string(4) "text"
            }
            [12]=>array(5) {
                ["name"]=>
                string(8) "LinkedIn"
                ["desc"]=>
                string(76) "Insert your custom link to show the LinkedIn icon. Leave blank to hide icon."
                ["id"]=>
                string(13) "linkedin_link"
                ["std"]=>
                string(0) ""
                ["type"]=>
                string(4) "text"
            }
            [13]=>array(5) {
                ["name"]=>
                string(7) "Blogger"
                ["desc"]=>
                string(75) "Insert your custom link to show the Blogger icon. Leave blank to hide icon."
                ["id"]=>
                string(12) "blogger_link"
                ["std"]=>
                string(0) ""
                ["type"]=>
                string(4) "text"
            }
            [14]=>array(5) {
                ["name"]=>
                string(5) "Skype"
                ["desc"]=>
                string(73) "Insert your custom link to show the Skype icon. Leave blank to hide icon."
                ["id"]=>
                string(10) "skype_link"
                ["std"]=>
                string(0) ""
                ["type"]=>
                string(4) "text"
            }
            [15]=>array(5) {
                ["name"]=>
                string(6) "Forrst"
                ["desc"]=>
                string(74) "Insert your custom link to show the Forrst icon. Leave blank to hide icon."
                ["id"]=>
                string(11) "forrst_link"
                ["std"]=>
                string(0) ""
                ["type"]=>
                string(4) "text"
            }
            [16]=>array(5) {
                ["name"]=>
                string(7) "Myspace"
                ["desc"]=>
                string(75) "Insert your custom link to show the Myspace icon. Leave blank to hide icon."
                ["id"]=>
                string(12) "myspace_link"
                ["std"]=>
                string(0) ""
                ["type"]=>
                string(4) "text"
            }
            [17]=>array(5) {
                ["name"]=>
                string(10) "Deviantart"
                ["desc"]=>
                string(78) "Insert your custom link to show the Deviantart icon. Leave blank to hide icon."
                ["id"]=>
                string(15) "deviantart_link"
                ["std"]=>
                string(0) ""
                ["type"]=>
                string(4) "text"
            }
            [18]=>array(5) {
                ["name"]=>
                string(5) "Yahoo"
                ["desc"]=>
                string(73) "Insert your custom link to show the Yahoo icon. Leave blank to hide icon."
                ["id"]=>
                string(10) "yahoo_link"
                ["std"]=>
                string(0) ""
                ["type"]=>
                string(4) "text"
            }
            [19]=>array(5) {
                ["name"]=>
                string(6) "Reddit"
                ["desc"]=>
                string(75) "Insert your custom link to show the Redditt icon. Leave blank to hide icon."
                ["id"]=>
                string(11) "reddit_link"
                ["std"]=>
                string(0) ""
                ["type"]=>
                string(4) "text"
            }
            [20]=>array(5) {
                ["name"]=>
                string(6) "Paypal"
                ["desc"]=>
                string(74) "Insert your custom link to show the Paypal icon. Leave blank to hide icon."
                ["id"]=>
                string(11) "paypal_link"
                ["std"]=>
                string(0) ""
                ["type"]=>
                string(4) "text"
            }
            [21]=>array(5) {
                ["name"]=>
                string(7) "Dropbox"
                ["desc"]=>
                string(75) "Insert your custom link to show the Dropbox icon. Leave blank to hide icon."
                ["id"]=>
                string(12) "dropbox_link"
                ["std"]=>
                string(0) ""
                ["type"]=>
                string(4) "text"
            }
            [22]=>array(5) {
                ["name"]=>
                string(11) "Soundclound"
                ["desc"]=>
                string(78) "Insert your custom link to show the Soundcloud icon. Leave blank to hide icon."
                ["id"]=>
                string(15) "soundcloud_link"
                ["std"]=>
                string(0) ""
                ["type"]=>
                string(4) "text"
            }
            [23]=>array(5) {
                ["name"]=>
                string(2) "VK"
                ["desc"]=>
                string(70) "Insert your custom link to show the VK icon. Leave blank to hide icon."
                ["id"]=>
                string(7) "vk_link"
                ["std"]=>
                string(0) ""
                ["type"]=>
                string(4) "text"
            }
            [24]=>array(5) {
                ["name"]=>
                string(13) "Email Address"
                ["desc"]=>
                string(72) "Insert your custom link to show the mail icon. Leave blank to hide icon."
                ["id"]=>
                string(10) "email_link"
                ["std"]=>
                string(0) ""
                ["type"]=>
                string(4) "text"
            }
        }
    }
    </pre>',
            'raw_html' => true,
        ),
        array (
            'id' => 'custom_color_scheme_element',
            'icon' => true,
            'type' => 'info',
            'raw' => '<h3 style=\'margin: 0;\'>Custom Social Icon</h3>',
        ),
        array (
            'desc' => 'This is the icon name that shows in the hover tooltip.',
            'id' => 'custom_icon_name',
            'type' => 'text',
            'title' => 'Custom Icon Name',
        ),
        array (
            'desc' => 'Select an image file for your custom icon.',
            'id' => 'custom_icon_image',
            'type' => 'media',
            'title' => 'Custom Icon Image',
            'url' => true,
        ),
        array (
            'desc' => 'Select an image file for the retina version of the icon. It should be 2x the size of main icon.',
            'id' => 'custom_icon_image_retina',
            'type' => 'media',
            'title' => 'Custom Icon Image Retina',
            'url' => true,
        ),
        array (
            'desc' => 'If retina icon is added, enter the standard icon (1x) version width, do not enter the retina icon width.',
            'id' => 'retina_icon_width',
            'type' => 'text',
            'title' => 'Standard Icon Width for Retina Icon',
        ),
        array (
            'desc' => 'If retina icon is added, enter the standard icon (1x) version height, do not enter the retina icon height.',
            'id' => 'retina_icon_height',
            'type' => 'text',
            'title' => 'Standard Icon Height for Retina Icon',
        ),
        array (
            'desc' => 'Insert a link for your custom icon.',
            'id' => 'custom_icon_link',
            'type' => 'text',
            'title' => 'Custom Icon Link',
        ),
    ),
    'icon' => 'el-icon-cog',
);
?>