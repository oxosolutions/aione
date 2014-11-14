<?php
/**
ReduxFramework Sample Config File
For full documentation, please visit: https://docs.reduxframework.com
 * */


// ACTUAL DECLARATION OF SECTIONS



/*********************************************************************************************
 *
 *  pages settings
 *
 *********************************************************************************************/



$this->sections[] = array(
    'icon'      => 'el-icon-shopping-cart',
    'title'     => __('Woocommerce ', 'redux-framework-demo'),
    'fields'    => array(

        array (
            'desc' => 'Insert the number of posts to display per page.',
            'id' => 'woo_items',
            'type' => 'text',
            'title' => 'Number of Products per Page',
            'default' => '12',
        ),
        array (
            'desc' => 'Select the sidebar that will be added to the archive/category pages.',
            'id' => 'woocommerce_archive_sidebar',
            'type' => 'select',
            'options' => array (
                0 => 'None',
                1 => 'Blog Sidebar',
                2 => 'Footer Widget 1',
                3 => 'Footer Widget 2',
                4 => 'Footer Widget 3',
                5 => 'Footer Widget 4',
                6 => 'SlidingBar Widget 1',
                7 => 'SlidingBar Widget 2',
                8 => 'SlidingBar Widget 3',
                9 => 'SlidingBar Widget 4',
            ),
            'title' => 'Woocommerce Archive/Category Sidebar',
            'default' => 'None',
        ),
        array (
            'desc' => 'Check the box to disable the ordering boxes displayed on the shop page.',
            'id' => 'woocommerce_aione_ordering',
            'type' => 'checkbox',
            'title' => 'Disable Woocommerce Shop Page Ordering Boxes',
        ),
        array (
            'desc' => 'Check the box to use aione\'s one page checkout template.',
            'id' => 'woocommerce_one_page_checkout',
            'type' => 'checkbox',
            'title' => 'Use Woocommerce One Page Checkout',
        ),
        array (
            'desc' => 'Check the box to show the order notes on the checkout page..',
            'id' => 'woocommerce_enable_order_notes',
            'type' => 'checkbox',
            'title' => 'Show Woocommerce Order Notes on Checkout',
            'default' => 1,
        ),
        array (
            'desc' => 'Check the box to show My Account link, uncheck to disable. Please note this will not show with Ubermenu.',
            'id' => 'woocommerce_acc_link_top_nav',
            'type' => 'checkbox',
            'title' => 'Show Woocommerce My Account Link in Secondary Menu',
            'default' => 1,
        ),
        array (
            'desc' => 'Check the box to show the Cart icon, uncheck to disable. Please note this will not show with Ubermenu.',
            'id' => 'woocommerce_cart_link_top_nav',
            'type' => 'checkbox',
            'title' => 'Show Woocommerce Cart Icon in Secondary Menu',
            'default' => 1,
        ),
        array (
            'desc' => 'Check the box to show My Account link, uncheck to disable. Please note these will not show with Ubermenu.',
            'id' => 'woocommerce_acc_link_main_nav',
            'type' => 'checkbox',
            'title' => 'Show Woocommerce My Account Link in Main Menu',
        ),
        array (
            'desc' => 'Check the box to show the Cart icon, uncheck to disable. Please note these will not show with Ubermenu.',
            'id' => 'woocommerce_cart_link_main_nav',
            'type' => 'checkbox',
            'title' => 'Show Woocommerce Cart Link in Main Menu',
            'default' => 1,
        ),
        array (
            'desc' => 'Check the box to show the social icons on product pages, uncheck to disable.',
            'id' => 'woocommerce_social_links',
            'type' => 'checkbox',
            'title' => 'Show Woocommerce Social Icons',
            'default' => 1,
        ),
        array (
            'desc' => 'Insert your text and it will appear in the first message box on the acount page.',
            'id' => 'woo_acc_msg_1',
            'type' => 'textarea',
            'title' => 'Account Area Message 1',
            'default' => 'Need Assistance? Call customer service at 888-555-5555.',
        ),
        array (
            'desc' => 'Insert your text and it will appear in the second message box on the acount page.',
            'id' => 'woo_acc_msg_2',
            'type' => 'textarea',
            'title' => 'Account Area Message 2',
            'default' => 'E-mail them at info@yourshop.com',
        )

    )
);

/*
            *
             *
             *
             * New Tab
             *
             *
             * */

//////////////////////////////////////////////////////////////////////



$this->sections[] = array(
    'icon'      => 'el-icon-path',
    'title'     => __('Portfolio ', 'redux-framework-demo'),
    'fields'    => array(

        array (
            'id' => 'blog_single_post',
            'icon' => true,
            'type' => 'info',
            'raw' => '<h3 style=\'margin: 0;\'>General Portfolio Options</h3>',
        ),
        array (
            'desc' => 'Insert the number of posts to display per page.',
            'id' => 'portfolio_items',
            'type' => 'text',
            'title' => 'Number of Portfolio Items Per Page',
            'default' => '10',
        ),
        array (
            'desc' => 'Select the layout for only the archive/category pages.',
            'id' => 'portfolio_archive_layout',
            'type' => 'select',
            'options' => array (
                'Portfolio One Column' => 'Portfolio One Column',
                'Portfolio Two Column' => 'Portfolio Two Column',
                'Portfolio Three Column' => 'Portfolio Three Column',
                'Portfolio Four Column' => 'Portfolio Four Column',
                'Portfolio One Column Text' => 'Portfolio One Column Text',
                'Portfolio Two Column Text' => 'Portfolio Two Column Text',
                'Portfolio Three Column Text' => 'Portfolio Three Column Text',
                'Portfolio Four Column Text' => 'Portfolio Four Column Text',
                'Portfolio Grid' => 'Portfolio Grid',
            ),
            'title' => 'Portfolio Archive/Category Layout',
            'default' => 'Portfolio One Column',
        ),
        array (
            'desc' => 'Select the sidebar that will be added to the archive/category pages.',
            'id' => 'portfolio_archive_sidebar',
            'type' => 'select',
            'options' => array (
                0 => 'None',
                1 => 'Blog Sidebar',
                2 => 'Footer Widget 1',
                3 => 'Footer Widget 2',
                4 => 'Footer Widget 3',
                5 => 'Footer Widget 4',
                6 => 'SlidingBar Widget 1',
                7 => 'SlidingBar Widget 2',
                8 => 'SlidingBar Widget 3',
                9 => 'SlidingBar Widget 4',
            ),
            'title' => 'Portfolio Archive/Category Sidebar',
            'default' => 'None',
        ),
        array (
            'desc' => 'Choose to display an excerpt or full portfolio content on archive / portfolio pages. Note: The "Full Content" option will override the page excerpt settings.',
            'id' => 'portfolio_content_length',
            'type' => 'select',
            'options' => array (
                'Excerpt' => 'Excerpt',
                'Full Content' => 'Full Content',
            ),
            'title' => 'Excerpt or Full Portfolio Content',
            'default' => 'Excerpt',
        ),
        array (
            'desc' => 'Insert the number of words you want to show in the post excerpts.',
            'id' => 'excerpt_length_portfolio',
            'type' => 'text',
            'title' => 'Excerpt Length',
            'default' => '55',
        ),
        array (
            'desc' => 'Select the pagination type for Portfolio Grid layouts.',
            'id' => 'grid_pagination_type',
            'type' => 'select',
            'options' => array (
                'Pagination' => 'Pagination',
                'Infinite Scroll' => 'Infinite Scroll',
            ),
            'title' => 'Grid Pagination Type',
            'default' => 'pagination',
        ),
        array (
            'desc' => 'Change/Rewrite the permalink when you use the permalink type as %postname%. <strong>Make sure to regenerate permalinks.</strong>',
            'id' => 'portfolio_slug',
            'type' => 'text',
            'title' => 'Portfolio Slug',
            'default' => 'portfolio-items',
        ),
        array (
            'id' => 'blog_single_post',
            'icon' => true,
            'type' => 'info',
            'raw' => '<h3 style=\'margin: 0;\'>Portfolio Single Post Page Options</h3>',
        ),
        array (
            'desc' => 'Check the box to display featured images and videos on single post pages.',
            'id' => 'portfolio_featured_images',
            'type' => 'checkbox',
            'title' => 'Featured Image / Video on Single Post Page',
            'default' => 1,
        ),
        array (
            'desc' => 'Check the box to disable previous/next pagination.',
            'id' => 'portfolio_pn_nav',
            'type' => 'checkbox',
            'title' => 'Disable Previous/Next Pagination',
        ),
        array (
            'desc' => 'Check the box to enable comments on portfolio items.',
            'id' => 'portfolio_comments',
            'type' => 'checkbox',
            'title' => 'Show Comments',
        ),
        array (
            'desc' => 'Check the box to enable Author on portfolio items.',
            'id' => 'portfolio_author',
            'type' => 'checkbox',
            'title' => 'Show Author',
        ),
        array (
            'desc' => 'Check the box to display the social sharing box.',
            'id' => 'portfolio_social_sharing_box',
            'type' => 'checkbox',
            'title' => 'Social Sharing Box',
            'default' => 1,
        ),
        array (
            'desc' => 'Check the box to display related posts.',
            'id' => 'portfolio_related_posts',
            'type' => 'checkbox',
            'title' => 'Related Posts',
            'default' => 1,
        )
    )
);
/*
             *
              *
              *
              * New Tab SOCIAL SHARE BOX
              *
              *
              * */

//////////////////////////////////////////////////////////////////////



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



/*
             *
              *
              *
              * New Tab Page Title Bar
              *
              *
              * */

//////////////////////////////////////////////////////////////////////
$this->sections[] = array(
    'icon'      => 'el-icon-hourglass',
    'title'     => __('Page Title Bar', 'redux-framework-demo'),
    'desc'      => __('<p class="description">This is the Description. Again HTML is allowed</p>', 'redux-framework-demo'),
    'fields'    => array(
        array (
            'id' => 'header_info',
            'icon' => true,
            'type' => 'info',
            'raw' => '<h3 style=\'margin: 0;\'>Page Title Bar Options</h3>',
        ),
        array (
            'desc' => 'Check the box to show the page title bar. This is a global option for every page or post, and this can be overridden by individual page/post options.',
            'id' => 'page_title_bar',
            'type' => 'checkbox',
            'title' => 'Page Title Bar',
            'default' => 1,
        ),
        array (
            'desc' => 'In pixels, ex: 10px',
            'id' => 'page_title_height',
            'type' => 'text',
            'title' => 'Page Title Bar Height',
            'default' => '87px',
        ),
        array (
            'desc' => 'Select an image or insert an image url to use for the page title bar background.',
            'id' => 'page_title_bg',
            'type' => 'media',
            'title' => 'Page Title Bar Background',
            'default' => array (
                'url' => 'http://localhost/darlic/wp-content/themes/aione/images/page_title_bg.png',
            ),
            'url' => true,
        ),
        array (
            'desc' => 'Select an image or insert an image url to use for the retina page title bar background.',
            'id' => 'page_title_bg_retina',
            'type' => 'media',
            'title' => 'Page Title Bar Background (Retina Version @2x)',
            'url' => true,
        ),
        array (
            'desc' => 'Check this box to have the page title bar background image display at 100% in width and height and scale according to the browser size.',
            'id' => 'page_title_bg_full',
            'type' => 'checkbox',
            'title' => '100% Background Image',
        ),
        array (
            'desc' => 'Check to enable parallax background image when scrolling.',
            'id' => 'page_title_bg_parallax',
            'type' => 'checkbox',
            'title' => 'Parallax Background Image',
        ),
        array (
            'id' => 'header_info',
            'icon' => true,
            'type' => 'info',
            'raw' => '<h3 style=\'margin: 0;\'>Breadcrumb Options</h3>',
        ),
        array (
            'desc' => 'Check to display the breadcrumbs or search bar in general. Uncheck to hide them.',
            'id' => 'breadcrumb',
            'type' => 'checkbox',
            'title' => 'Display Breadcrumbs/Search Bar',
            'default' => 1,
        ),
        array (
            'desc' => 'Choose to display breadcrumbs or search box in the page title bar.',
            'id' => 'page_title_bar_bs',
            'options' => array (
                'Breadcrumbs' => 'Breadcrumbs',
                'Search Box' => 'Search Box',
            ),
            'type' => 'select',
            'title' => 'Breadcrumbs or Search Box?',
            'default' => 'Breadcrumbs',
        ),
        array (
            'desc' => 'Check to display breadcrumbs on mobile devices.',
            'id' => 'breadcrumb_mobile',
            'type' => 'checkbox',
            'title' => 'Breadcrumbs on Mobile Devices',
        ),
        array (
            'desc' => 'The text before the breadcrumb menu.',
            'id' => 'breacrumb_prefix',
            'type' => 'text',
            'title' => 'Breadcrumb Menu Prefix',
        )
    )

);

/*
             *
              *
              *
              * New Tab Slideshows
              *
              *
              * */

//////////////////////////////////////////////////////////////////////
$this->sections[] = array(
    'icon'      => 'el-icon-screenshot',
    'title'     => __('Slideshows', 'redux-framework-demo'),
    'desc'      => __('<p class="description">This is the Description. Again HTML is allowed</p>', 'redux-framework-demo'),
    'fields'    => array(
        array (
            'desc' => 'This option controls the number of featured image boxes for blog/portfolio slideshows.',
            'id' => 'posts_slideshow_number',
            'type' => 'text',
            'title' => 'Posts Slideshow Images',
            'default' => '5',
        ),
        array (
            'desc' => 'Check the box to autoplay the slideshow.',
            'id' => 'slideshow_autoplay',
            'type' => 'checkbox',
            'title' => 'Autoplay',
            'default' => 1,
        ),
        array (
            'desc' => 'Check the box to enable smooth height on slideshows when using images with different heights. Please note, smooth height is disabled on blog grid layout.',
            'id' => 'slideshow_smooth_height',
            'type' => 'checkbox',
            'title' => 'Enable Smooth Height',
        ),
        array (
            'desc' => 'Controls the speed of slideshows for the [slider] shortcode and sliders within posts. ex: 1000 = 1 second.',
            'id' => 'slideshow_speed',
            'type' => 'text',
            'title' => 'Slideshow speed',
            'default' => '7000',
        ),
        array (
            'desc' => 'Check the box if you want to show pagination circles below a video slide for the slider shortcode. Leave it unchecked to hide them on video slides.',
            'id' => 'pagination_video_slide',
            'type' => 'checkbox',
            'title' => 'Pagination circles below video slides',
        ),
        array (
            'desc' => 'Check the box to enable posts slideshow in legacy mode. Only recommended for v.1 users, this option will disable the multiple featured image method.<strong>This option will be removed in next update.</strong>',
            'id' => 'legacy_posts_slideshow',
            'type' => 'checkbox',
            'title' => '<strong>Deprecated</strong>: Legacy Posts Slideshow',
        ),
        array (
            'desc' => 'Check the box to show post slideshows in blog/portfolio pages. <strong>This option will be removed in next update.</strong>',
            'id' => 'posts_slideshow',
            'type' => 'checkbox',
            'title' => 'Deprecated: Posts Slideshow',
            'default' => 1,
        ),


    )

);

/*
             *
              *
              *
              * New Tab Elastic Slider
              *
              *
              * */

//////////////////////////////////////////////////////////////////////
$this->sections[] = array(
    'icon'      => 'el-icon-star',
    'title'     => __('Elastic Slider', 'redux-framework-demo'),
    'desc'      => __('<p class="description">This is the Description. Again HTML is allowed</p>', 'redux-framework-demo'),
    'fields'    => array(
        array (
            'desc' => 'In pixels or percentage, ex: 100% or 100.',
            'id' => 'tfes_slider_width',
            'type' => 'text',
            'title' => 'Slider Width',
            'default' => '100%',
        ),
        array (
            'desc' => 'In pixels, ex: 100px.',
            'id' => 'tfes_slider_height',
            'type' => 'text',
            'title' => 'Slider Height',
            'default' => '400px',
        ),
        array (
            'desc' => 'Slides animate from sides or center.',
            'id' => 'tfes_animation',
            'options' => array (
                'sides' => 'sides',
                'center' => 'center',
            ),
            'type' => 'select',
            'title' => 'Animation',
            'default' => 'sides',
        ),
        array (
            'desc' => 'Check the box to autoplay the slides.',
            'id' => 'tfes_autoplay',
            'type' => 'checkbox',
            'title' => 'Autoplay',
            'default' => 1,
        ),
        array (
            'desc' => 'Select the slideshow speed, 1000 = 1 second.',
            'id' => 'tfes_interval',
            'type' => 'text',
            'title' => 'Slideshow Interval',
            'default' => '3000',
        ),
        array (
            'desc' => 'Select the animation speed, 1000 = 1 second.',
            'id' => 'tfes_speed',
            'type' => 'text',
            'title' => 'Sliding Speed',
            'default' => '800',
        ),
        array (
            'desc' => 'Enter the width for thumbnail without \'px\' ex: 100.',
            'id' => 'tfes_width',
            'type' => 'text',
            'title' => 'Thumbnail Width',
            'default' => '150',
        ),
        array (
            'desc' => 'Default is 42',
            'id' => 'es_title_font_size',
            'type' => 'select',
            'options' => array (
                10 => '10',
                11 => '11',
                12 => '12',
                13 => '13',
                14 => '14',
                15 => '15',
                16 => '16',
                17 => '17',
                18 => '18',
                19 => '19',
                20 => '20',
                21 => '21',
                22 => '22',
                23 => '23',
                24 => '24',
                25 => '25',
                26 => '26',
                27 => '27',
                28 => '28',
                29 => '29',
                30 => '30',
                31 => '31',
                32 => '32',
                33 => '33',
                34 => '34',
                35 => '35',
                36 => '36',
                37 => '37',
                38 => '38',
                39 => '39',
                40 => '40',
                41 => '41',
                42 => '42',
                43 => '43',
                44 => '44',
                45 => '45',
                46 => '46',
                47 => '47',
                48 => '48',
                49 => '49',
                50 => '50',
            ),
            'title' => 'Title Font Size (px)',
            'default' => '42',
        ),
        array (
            'desc' => 'Default is 20',
            'id' => 'es_caption_font_size',
            'type' => 'select',
            'options' => array (
                10 => '10',
                11 => '11',
                12 => '12',
                13 => '13',
                14 => '14',
                15 => '15',
                16 => '16',
                17 => '17',
                18 => '18',
                19 => '19',
                20 => '20',
                21 => '21',
                22 => '22',
                23 => '23',
                24 => '24',
                25 => '25',
                26 => '26',
                27 => '27',
                28 => '28',
                29 => '29',
                30 => '30',
                31 => '31',
                32 => '32',
                33 => '33',
                34 => '34',
                35 => '35',
                36 => '36',
                37 => '37',
                38 => '38',
                39 => '39',
                40 => '40',
                41 => '41',
                42 => '42',
                43 => '43',
                44 => '44',
                45 => '45',
                46 => '46',
                47 => '47',
                48 => '48',
                49 => '49',
                50 => '50',
            ),
            'title' => 'Caption Font Size (px)',
            'default' => '20',
        ),
        array (
            'desc' => 'Controls the text color of the title font.',
            'id' => 'es_title_color',
            'type' => 'color',
            'title' => 'Title Color',
            'default' => '#333333',
        ),
        array (
            'desc' => 'Controls the text color of the caption font.',
            'id' => 'es_caption_color',
            'type' => 'color',
            'title' => 'Caption Color',
            'default' => '#747474',
        ),

    )

);
/*
             *
              *
              *
              * New Tab Elastic Slider
              *
              *
              * */

//////////////////////////////////////////////////////////////////////
$this->sections[] = array(
    'icon'      => 'el-icon-wrench',
    'title'     => __('Lightbox', 'redux-framework-demo'),
    'desc'      => __('<p class="description">This is the Description. Again HTML is allowed</p>', 'redux-framework-demo'),
    'fields'    => array(
        array (
            'desc' => 'Set the speed of the animation.',
            'id' => 'lightbox_animation_speed',
            'type' => 'select',
            'options' => array (
                'Fast' => 'Fast',
                'Slow' => 'Slow',
                'Normal' => 'Normal',
            ),
            'title' => 'Animation Speed',
            'default' => 'fast',
        ),
        array (
            'desc' => 'Check the box to show the gallery.',
            'id' => 'lightbox_gallery',
            'type' => 'checkbox',
            'title' => 'Show gallery',
            'default' => 1,
        ),
        array (
            'desc' => 'Check the box to autoplay the lightbox gallery.',
            'id' => 'lightbox_autoplay',
            'type' => 'checkbox',
            'title' => 'Autoplay the Lightbox Gallery',
        ),
        array (
            'desc' => 'If autoplay is enabled, set the slideshow speed, 1000 = 1 second.',
            'id' => 'lightbox_slideshow_speed',
            'type' => 'text',
            'title' => 'Slideshow Speed',
            'default' => '5000',
        ),
        array (
            'desc' => 'Set the opacity of background, <br />0.1 (lowest) to 1 (highest).',
            'id' => 'lightbox_opacity',
            'type' => 'text',
            'title' => 'Background Opacity',
            'default' => '0.8',
        ),
        array (
            'desc' => 'Check the box to show the image caption.',
            'id' => 'lightbox_title',
            'type' => 'checkbox',
            'title' => 'Show Caption',
            'default' => 1,
        ),
        array (
            'desc' => 'Check the box to show the image description. The Alternative text field is used for the description.',
            'id' => 'lightbox_desc',
            'type' => 'checkbox',
            'title' => 'Show Description',
            'default' => 1,
        ),
        array (
            'desc' => 'Check the box to show social sharing buttons on lightbox.',
            'id' => 'lightbox_social',
            'type' => 'checkbox',
            'title' => 'Social Sharing',
            'default' => 1,
        ),
        array (
            'desc' => 'Check the box to show post images that are inside the post content area in the lightbox.',
            'id' => 'lightbox_post_images',
            'type' => 'checkbox',
            'title' => 'Show Post Images in Lightbox',
        ),

    )

);


/*
             *
              *
              *
              * New Tab Extra
              *
              *
              * */

//////////////////////////////////////////////////////////////////////
$this->sections[] = array(
    'icon'      => 'el-icon-scissors',
    'title'     => __('Extra', 'redux-framework-demo'),
    'desc'      => __('<p class="description">This is the Description. Again HTML is allowed</p>', 'redux-framework-demo'),
    'fields'    => array(
        array (
            'id' => 'misc_options',
            'icon' => true,
            'type' => 'info',
            'raw' => '<h3 style=\'margin: 0;\'>Miscellaneous Options</h3>',
        ),
        array (
            'desc' => 'Select the default position of the sidebar. This will take effect for new pages/posts.',
            'id' => 'default_sidebar_pos',
            'options' => array (
                'Right' => 'Right',
                'Left' => 'Left',
            ),
            'type' => 'select',
            'title' => 'Default Sidebar Position',
            'default' => 'right',
        ),
        array (
            'desc' => 'Controls the side navigation animation for child pages, on click or hover.',
            'id' => 'sidenav_behavior',
            'options' => array (
                'Hover' => 'Hover',
                'Click' => 'Click',
            ),
            'type' => 'select',
            'title' => 'Sidenav Behavior',
            'default' => 'hover',
        ),
        array (
            'desc' => 'This option controls the amount of related projects / posts that show up on each single portfolio and blog post. ex: 5',
            'id' => 'number_related_posts',
            'type' => 'text',
            'title' => 'Number of Related Posts / Projects',
            'default' => '5',
        ),
        array (
            'desc' => 'Choose if the excerpt length should be based on words or characters.',
            'id' => 'excerpt_base',
            'options' => array (
                'Words' => 'Words',
                'Characters' => 'Characters',
            ),
            'type' => 'select',
            'title' => 'Basis for Excerpt Length',
            'default' => 'words',
        ),
        array (
            'desc' => 'Check the box to disable the read more sign [...] on excerpts throughout the site.',
            'id' => 'disable_excerpts',
            'type' => 'checkbox',
            'title' => 'Disable [...] on Excerpts',
        ),
        array (
            'desc' => 'Check the box to have the read more sign [...] on excerpts link to single post page.',
            'id' => 'link_read_more',
            'type' => 'checkbox',
            'title' => 'Make [...] Link to Single Post Page',
        ),
        array (
            'desc' => 'Check the box to allow comments on regular pages.',
            'id' => 'comments_pages',
            'type' => 'checkbox',
            'title' => 'Allow Comments on Pages',
        ),
        array (
            'desc' => 'Check the box to disable featured images on regular pages.',
            'id' => 'featured_images_pages',
            'type' => 'checkbox',
            'title' => 'Featured Images on Pages',
        ),
        array (
            'desc' => 'Check the box to show featured images on FAQ archive page.',
            'id' => 'faq_featured_image',
            'type' => 'checkbox',
            'title' => 'FAQ Featured Images',
        ),
        array (
            'desc' => 'Check the box to add rel="nofollow" attribute to all social links.',
            'id' => 'nofollow_social_links',
            'type' => 'checkbox',
            'title' => 'Add rel="nofollow" to social links',
        ),
        array (
            'desc' => 'Select the checkbox to allow social icons to open in a new window.',
            'id' => 'social_icons_new',
            'type' => 'checkbox',
            'title' => 'Open Social Icons in a New Window',
            'default' => 1,
        ),

        array (
            'id' => 'rollovers',
            'icon' => true,
            'type' => 'info',
            'raw' => '<h3 style=\'margin: 0;\'>Image Rollover Options</h3>',
        ),
        array (
            'desc' => 'Check the box to show the rollover box on images.',
            'id' => 'image_rollover',
            'type' => 'checkbox',
            'title' => 'Image Rollover',
            'default' => 1,
        ),
        array (
            'desc' => 'Check the box to disable the link icon from image rollovers. Note: This option will override the post settings.',
            'id' => 'link_image_rollover',
            'type' => 'checkbox',
            'title' => 'Disable Link Icon From Image Rollover',
        ),
        array (
            'desc' => 'Check the box to disable the image icon from image rollovers. Note: This option will override the post settings.',
            'id' => 'zoom_image_rollover',
            'type' => 'checkbox',
            'title' => 'Disable Image Icon From Image Rollover',
        ),
        array (
            'desc' => 'Check the box to disable the title from image rollovers.',
            'id' => 'title_image_rollover',
            'type' => 'checkbox',
            'title' => 'Disable Title From Image Rollover',
        ),
        array (
            'desc' => 'Check the box to disable the categories from image rollovers.',
            'id' => 'cats_image_rollover',
            'type' => 'checkbox',
            'title' => 'Disable Categories From Image Rollover',
        ),
        array (
            'desc' => 'Select the opacity of the rollover. <br />0.1 (lowest) to 1 (highest).',
            'id' => 'image_rollover_opacity',
            'type' => 'text',
            'title' => 'Image Rollover Opacity',
            'default' => '1',
        ),
        array (
            'id' => 'bbpress_only',
            'icon' => true,
            'type' => 'info',
            'raw' => '<h3 style=\'margin: 0;\'>BBPress Options</h3>',
        ),
        array (
            'desc' => 'Check the box if you want to use one global sidebar on all forum pages.',
            'id' => 'bbpress_global_sidebar',
            'type' => 'checkbox',
            'title' => 'BBPress Use Global Sidebar',
        ),
        array (
            'desc' => 'Select the sidebar that will display on forum pages globally.',
            'id' => 'ppbress_sidebar',
            'type' => 'select',
            'options' => array (
                0 => 'None',
                1 => 'Blog Sidebar',
                2 => 'Footer Widget 1',
                3 => 'Footer Widget 2',
                4 => 'Footer Widget 3',
                5 => 'Footer Widget 4',
                6 => 'SlidingBar Widget 1',
                7 => 'SlidingBar Widget 2',
                8 => 'SlidingBar Widget 3',
                9 => 'SlidingBar Widget 4',
            ),
            'title' => 'BBPress Global Sidebar',
            'default' => 'None',
        ),


    )

);
/*
             *
              *
              *
              * New Tab Advanced
              *
              *
              * */

//////////////////////////////////////////////////////////////////////
$this->sections[] = array(
    'icon'      => 'el-icon-idea',
    'title'     => __('Advanced', 'redux-framework-demo'),
    'desc'      => __('<p class="description">This is the Description. Again HTML is allowed</p>', 'redux-framework-demo'),
    'fields'    => array(
        array (
            'id' => 'enable_disable_heading',
            'icon' => true,
            'type' => 'info',
            'raw' => '<h3 style=\'margin: 0;\'>Enable / Disable Theme Features & Plugin Support</h3>',
        ),
        array (
            'desc' => 'Check to disable the theme\'s mega menu.',
            'id' => 'disable_megamenu',
            'type' => 'checkbox',
            'title' => 'Disable Mega Menu',
        ),
        array (
            'desc' => 'Check the box to disable the aione styles and use the default Revolution Slider styles.',
            'id' => 'aione_rev_styles',
            'type' => 'checkbox',
            'title' => 'Disable aione Styles For Revolution Slider',
        ),
        array (
            'desc' => 'Check the box if you are are using UberMenu, this option adds UberMenu support without editing any code.',
            'id' => 'ubermenu',
            'type' => 'checkbox',
            'title' => 'UberMenu Plugin Support',
        ),
        array (
            'desc' => 'Check the box to disable CSS animations on shortcode items.',
            'id' => 'use_animate_css',
            'type' => 'checkbox',
            'title' => 'Disable CSS Animations',
        ),
        array (
            'desc' => 'Check the box to disable CSS animations on mobiles only.',
            'id' => 'disable_mobile_animate_css',
            'type' => 'checkbox',
            'title' => 'Disable CSS Animations on Mobiles Only',
            'default' => 1,
        ),
        array (
            'desc' => 'Check the box to disable Lightbox.',
            'id' => 'status_lightbox',
            'type' => 'checkbox',
            'title' => 'Disable Lightbox',
        ),
        array (
            'desc' => 'Check the box to disable Lightbox only on single posts and portfolio pages..',
            'id' => 'status_lightbox_single',
            'type' => 'checkbox',
            'title' => 'Disable Lightbox On Single Posts Pages Only',
        ),
        array (
            'desc' => 'Check the box to disable Youtube API scripts.',
            'id' => 'status_yt',
            'type' => 'checkbox',
            'title' => 'Disable Youtube API Scripts',
        ),
        array (
            'desc' => 'Check the box to disable Vimeo API scripts.',
            'id' => 'status_vimeo',
            'type' => 'checkbox',
            'title' => 'Disable Vimeo API Scripts',
        ),
        array (
            'desc' => 'Check the box to disable google map.',
            'id' => 'status_gmap',
            'type' => 'checkbox',
            'title' => 'Disable Google Map Scripts',
        ),
        array (
            'desc' => 'Check the box to disable the ToTop script which adds the scrolling to top functionality.',
            'id' => 'status_totop',
            'type' => 'checkbox',
            'title' => 'Disable ToTop Script',
        ),
        array (
            'desc' => 'Check the box to enable the ToTop script on mobile devices.',
            'id' => 'status_totop_mobile',
            'type' => 'checkbox',
            'title' => 'Enable ToTop Script on mobile',
        ),
        array (
            'desc' => 'Check the box to disable aione slider.',
            'id' => 'status_aione_slider',
            'type' => 'checkbox',
            'title' => 'Disable Aione Slider',
        ),
        array (
            'desc' => 'Check the box to disable elastic slider.',
            'id' => 'status_eslider',
            'type' => 'checkbox',
            'title' => 'Disable Elastic Slider',
        ),
        array (
            'desc' => 'Check the box to disable font awesome.',
            'id' => 'status_fontawesome',
            'type' => 'checkbox',
            'title' => 'Disable FontAwesome',
        ),


    )

);


/*
*
*
*
* New Tab
*
*
* */
//////////////////////////////////////////////////////////////////////////////////////////////////////


$this->sections[] = array(
    'icon'      => 'el-icon-list-alt',
    'title'     => __('Select Fields', 'redux-framework-demo'),
    'desc'      => __('<p class="description">This is the Description. Again HTML is allowed</p>', 'redux-framework-demo'),
    'fields'    => array(
        array(
            'id'        => 'opt-select',
            'type'      => 'select',
            'title'     => __('Select Option', 'redux-framework-demo'),
            'subtitle'  => __('No validation can be done on this field type', 'redux-framework-demo'),
            'desc'      => __('This is the description field, again good for additional info.', 'redux-framework-demo'),

            //Must provide key => value pairs for select options
            'options'   => array(
                '1' => 'Opt 1',
                '2' => 'Opt 2',
                '3' => 'Opt 3'
            ),
            'default'   => '2'
        ),
        array(
            'id'        => 'opt-multi-select',
            'type'      => 'select',
            'multi'     => true,
            'title'     => __('Multi Select Option', 'redux-framework-demo'),
            'subtitle'  => __('No validation can be done on this field type', 'redux-framework-demo'),
            'desc'      => __('This is the description field, again good for additional info.', 'redux-framework-demo'),

            //Must provide key => value pairs for radio options
            'options'   => array(
                '1' => 'Opt 1',
                '2' => 'Opt 2',
                '3' => 'Opt 3'
            ),
            'required'  => array('select', 'equals', array('1', '3')),
            'default'   => array('2', '3')
        ),
        array(
            'id'        => 'opt-select-image',
            'type'      => 'select_image',
            'title'     => __('Select Image', 'redux-framework-demo'),
            'subtitle'  => __('A preview of the selected image will appear underneath the select box.', 'redux-framework-demo'),
            'options'   => $sample_patterns,
            // Alternatively
            //'options'   => Array(
            //                'img_name' => 'img_path'
            //             )
            'default' => 'tree_bark.png',
        ),
        array(
            'id'    => 'opt-info',
            'type'  => 'info',
            'desc'  => __('You can easily add a variety of data from WordPress.', 'redux-framework-demo'),
        ),
        array(
            'id'        => 'opt-select-categories',
            'type'      => 'select',
            'data'      => 'categories',
            'title'     => __('Categories Select Option', 'redux-framework-demo'),
            'subtitle'  => __('No validation can be done on this field type', 'redux-framework-demo'),
            'desc'      => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
        ),
        array(
            'id'        => 'opt-select-categories-multi',
            'type'      => 'select',
            'data'      => 'categories',
            'multi'     => true,
            'title'     => __('Categories Multi Select Option', 'redux-framework-demo'),
            'subtitle'  => __('No validation can be done on this field type', 'redux-framework-demo'),
            'desc'      => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
        ),
        array(
            'id'        => 'opt-select-pages',
            'type'      => 'select',
            'data'      => 'pages',
            'title'     => __('Pages Select Option', 'redux-framework-demo'),
            'subtitle'  => __('No validation can be done on this field type', 'redux-framework-demo'),
            'desc'      => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
        ),
        array(
            'id'        => 'opt-multi-select-pages',
            'type'      => 'select',
            'data'      => 'pages',
            'multi'     => true,
            'title'     => __('Pages Multi Select Option', 'redux-framework-demo'),
            'subtitle'  => __('No validation can be done on this field type', 'redux-framework-demo'),
            'desc'      => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
        ),
        array(
            'id'        => 'opt-select-tags',
            'type'      => 'select',
            'data'      => 'tags',
            'title'     => __('Tags Select Option', 'redux-framework-demo'),
            'subtitle'  => __('No validation can be done on this field type', 'redux-framework-demo'),
            'desc'      => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
        ),
        array(
            'id'        => 'opt-multi-select-tags',
            'type'      => 'select',
            'data'      => 'tags',
            'multi'     => true,
            'title'     => __('Tags Multi Select Option', 'redux-framework-demo'),
            'subtitle'  => __('No validation can be done on this field type', 'redux-framework-demo'),
            'desc'      => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
        ),
        array(
            'id'        => 'opt-select-menus',
            'type'      => 'select',
            'data'      => 'menus',
            'title'     => __('Menus Select Option', 'redux-framework-demo'),
            'subtitle'  => __('No validation can be done on this field type', 'redux-framework-demo'),
            'desc'      => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
        ),
        array(
            'id'        => 'opt-multi-select-menus',
            'type'      => 'select',
            'data'      => 'menu',
            'multi'     => true,
            'title'     => __('Menus Multi Select Option', 'redux-framework-demo'),
            'subtitle'  => __('No validation can be done on this field type', 'redux-framework-demo'),
            'desc'      => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
        ),
        array(
            'id'        => 'opt-select-post-type',
            'type'      => 'select',
            'data'      => 'post_type',
            'title'     => __('Post Type Select Option', 'redux-framework-demo'),
            'subtitle'  => __('No validation can be done on this field type', 'redux-framework-demo'),
            'desc'      => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
        ),
        array(
            'id'        => 'opt-multi-select-post-type',
            'type'      => 'select',
            'data'      => 'post_type',
            'multi'     => true,
            'title'     => __('Post Type Multi Select Option', 'redux-framework-demo'),
            'subtitle'  => __('No validation can be done on this field type', 'redux-framework-demo'),
            'desc'      => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
        ),
        array(
            'id'        => 'opt-multi-select-sortable',
            'type'      => 'select',
            'data'      => 'post_type',
            'multi'     => true,
            'sortable'  => true,
            'title'     => __('Post Type Multi Select Option + Sortable', 'redux-framework-demo'),
            'subtitle'  => __('This field also has sortable enabled!', 'redux-framework-demo'),
            'desc'      => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
        ),
        array(
            'id'        => 'opt-select-posts',
            'type'      => 'select',
            'data'      => 'post',
            'title'     => __('Posts Select Option2', 'redux-framework-demo'),
            'subtitle'  => __('No validation can be done on this field type', 'redux-framework-demo'),
            'desc'      => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
        ),
        array(
            'id'        => 'opt-multi-select-posts',
            'type'      => 'select',
            'data'      => 'post',
            'multi'     => true,
            'title'     => __('Posts Multi Select Option', 'redux-framework-demo'),
            'subtitle'  => __('No validation can be done on this field type', 'redux-framework-demo'),
            'desc'      => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
        ),
        array(
            'id'        => 'opt-select-roles',
            'type'      => 'select',
            'data'      => 'roles',
            'title'     => __('User Role Select Option', 'redux-framework-demo'),
            'subtitle'  => __('No validation can be done on this field type', 'redux-framework-demo'),
            'desc'      => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
        ),
        array(
            'id'        => 'opt-select-capabilities',
            'type'      => 'select',
            'data'      => 'capabilities',
            'multi'     => true,
            'title'     => __('Capabilities Select Option', 'redux-framework-demo'),
            'subtitle'  => __('No validation can be done on this field type', 'redux-framework-demo'),
            'desc'      => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
        ),
        array(
            'id'        => 'opt-select-elusive',
            'type'      => 'select',
            'data'      => 'elusive-icons',
            'title'     => __('Elusive Icons Select Option', 'redux-framework-demo'),
            'subtitle'  => __('No validation can be done on this field type', 'redux-framework-demo'),
            'desc'      => __('Here\'s a list of all the elusive icons by name and icon.', 'redux-framework-demo'),
        ),
    )
);
?>