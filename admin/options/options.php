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
            'id' => 'woo_items',
            'type' => 'text',
            'title' => __('Number of Products per Page','redux-framework-demo'),
            'subtitle'  => __('Number of Products per Page.', 'redux-framework-demo'),
            'desc' => __('Insert the number of posts to display per page.','redux-framework-demo'),
            'default' => '12',
            'hint' => array(
                'title'   => __('Number of Products per Page','redux-framework-demo'),
                'content' => __('Number of Products per Page','redux-framework-demo'),
            )
        ),
        array (
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
            'title' => __('Woocommerce Archive/Category Sidebar','redux-framework-demo'),
            'subtitle'  => __('Woocommerce Archive/Category Sidebar.', 'redux-framework-demo'),
            'desc' => __('Select the sidebar that will be added to the archive/category pages.','redux-framework-demo'),
            'default' => 'None',
            'hint' => array(
                'title'   => __('Woocommerce Archive/Category Sidebar','redux-framework-demo'),
                'content' => __('Woocommerce Archive/Category Sidebar','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'woocommerce_aione_ordering',
            'type' => 'switch',
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => false,
            'title' => __('Disable Woocommerce Shop Page Ordering Boxes','redux-framework-demo'),
            'subtitle'  => __('Disable Woocommerce Shop Page Ordering Boxes.', 'redux-framework-demo'),
            'desc' => __('YES to disable the ordering boxes displayed on the shop page.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Disable Woocommerce Shop Page Ordering Boxes','redux-framework-demo'),
                'content' => __('Disable Woocommerce Shop Page Ordering Boxes','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'woocommerce_one_page_checkout',
            'type' => 'switch',
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => false,
            'title' => __('Use Woocommerce One Page Checkout','redux-framework-demo'),
            'subtitle'  => __('Use Woocommerce One Page Checkout.', 'redux-framework-demo'),
            'desc' => __('YES to use aione\'s one page checkout template.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Use Woocommerce One Page Checkout','redux-framework-demo'),
                'content' => __('Use Woocommerce One Page Checkout','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'woocommerce_enable_order_notes',
            'type' => 'switch',
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => true,
            'title' => __('Show Woocommerce Order Notes on Checkout','redux-framework-demo'),
            'subtitle'  => __('Show Woocommerce Order Notes on Checkout.', 'redux-framework-demo'),
            'desc' => __('YES to show the order notes on the checkout page..','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Show Woocommerce Order Notes on Checkout','redux-framework-demo'),
                'content' => __('Show Woocommerce Order Notes on Checkout','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'woocommerce_acc_link_top_nav',
            'type' => 'switch',
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => true,
            'title' => __('Show Woocommerce My Account Link in Secondary Menu','redux-framework-demo'),
            'subtitle'  => __('Show Woocommerce My Account Link in Secondary Menu.', 'redux-framework-demo'),
            'desc' => __('YES to show My Account link, NO to disable. Please note this will not show with Ubermenu.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Show Woocommerce My Account Link in Secondary Menu','redux-framework-demo'),
                'content' => __('Show Woocommerce My Account Link in Secondary Menu','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'woocommerce_cart_link_top_nav',
            'type' => 'switch',
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => true,
            'title' => __('Show Woocommerce Cart Icon in Secondary Menu','redux-framework-demo'),
            'subtitle'  => __('Show Woocommerce Cart Icon in Secondary Menu.', 'redux-framework-demo'),
            'desc' => __('YES to show the Cart icon, uncheck to disable. Please note this will not show with Ubermenu.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Show Woocommerce Cart Icon in Secondary Menu','redux-framework-demo'),
                'content' => __('Show Woocommerce Cart Icon in Secondary Menu','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'woocommerce_acc_link_main_nav',
            'type' => 'switch',
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => false,
            'title' => __('Show Woocommerce My Account Link in Main Menu','redux-framework-demo'),
            'subtitle'  => __('Show Woocommerce My Account Link in Main Menu.', 'redux-framework-demo'),
            'desc' => __('YES to show My Account link, NO to disable. Please note these will not show with Ubermenu.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Show Woocommerce My Account Link in Main Menu','redux-framework-demo'),
                'content' => __('Show Woocommerce My Account Link in Main Menu','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'woocommerce_cart_link_main_nav',
            'type' => 'switch',
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => true,
            'title' => __('Show Woocommerce Cart Link in Main Menu','redux-framework-demo'),
            'subtitle'  => __('Show Woocommerce Cart Link in Main Menu.', 'redux-framework-demo'),
            'desc' => __('YES to show the Cart icon, NO to disable. Please note these will not show with Ubermenu.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Show Woocommerce Cart Link in Main Menu','redux-framework-demo'),
                'content' => __('Show Woocommerce Cart Link in Main Menu','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'woocommerce_social_links',
            'type' => 'switch',
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => true,
            'title' => __('Show Woocommerce Social Icons','redux-framework-demo'),
            'subtitle'  => __('Show Woocommerce Social Icons.', 'redux-framework-demo'),
            'desc' => __('YES to show the social icons on product pages, NO to disable.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Show Woocommerce Social Icons','redux-framework-demo'),
                'content' => __('Show Woocommerce Social Icons','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'woo_acc_msg_1',
            'type' => 'textarea',
            'title' => __('Account Area Message 1','redux-framework-demo'),
            'subtitle'  => __('Account Area Message 1.', 'redux-framework-demo'),
            'desc' => __('Insert your text and it will appear in the first message box on the acount page.','redux-framework-demo'),
            'default' => 'Need Assistance? Call customer service at 888-555-5555.',
            'hint' => array(
                'title'   => __('Account Area Message 1','redux-framework-demo'),
                'content' => __('Account Area Message 1','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'woo_acc_msg_2',
            'type' => 'textarea',
            'title' => __('Account Area Message 2','redux-framework-demo'),
            'subtitle'  => __('Account Area Message 2.', 'redux-framework-demo'),
            'desc' => __('Insert your text and it will appear in the second message box on the acount page.','redux-framework-demo'),
            'default' => 'E-mail them at info@yourshop.com',
            'hint' => array(
                'title'   => __('Account Area Message 2','redux-framework-demo'),
                'content' => __('Account Area Message 2','redux-framework-demo'),
            )
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
            'id' => 'portfolio_items',
            'type' => 'text',
            'title' => __('Number of Portfolio Items Per Page','redux-framework-demo'),
            'subtitle'  => __('Number of Portfolio Items Per Page.', 'redux-framework-demo'),
            'desc' => __('Insert the number of posts to display per page.','redux-framework-demo'),
            'default' => '10',
            'hint' => array(
                'title'   => __('Number of Portfolio Items Per Page','redux-framework-demo'),
                'content' => __('Number of Portfolio Items Per Page','redux-framework-demo'),
            )
        ),
        array (
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
            'title' => __('Portfolio Archive/Category Layout','redux-framework-demo'),
            'subtitle'  => __('Portfolio Archive/Category Layout.', 'redux-framework-demo'),
            'desc' => __('Select the layout for only the archive/category pages.','redux-framework-demo'),
            'default' => 'Portfolio One Column',
            'hint' => array(
                'title'   => __('Portfolio Archive/Category Layout','redux-framework-demo'),
                'content' => __('Portfolio Archive/Category Layout','redux-framework-demo'),
            )
        ),
        array (
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
            'title' => __('Portfolio Archive/Category Sidebar','redux-framework-demo'),
            'subtitle'  => __('Portfolio Archive/Category Sidebar.', 'redux-framework-demo'),
            'desc' => __('Select the sidebar that will be added to the archive/category pages.','redux-framework-demo'),
            'default' => 'None',
            'hint' => array(
                'title'   => __('Portfolio Archive/Category Sidebar','redux-framework-demo'),
                'content' => __('Portfolio Archive/Category Sidebar','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'portfolio_content_length',
            'type' => 'select',
            'options' => array (
                'Excerpt' => 'Excerpt',
                'Full Content' => 'Full Content',
            ),
            'title' => __('Excerpt or Full Portfolio Content','redux-framework-demo'),
            'subtitle'  => __('Excerpt or Full Portfolio Content.', 'redux-framework-demo'),
            'desc' => __('Choose to display an excerpt or full portfolio content on archive / portfolio pages. Note: The "Full Content" option will override the page excerpt settings.','redux-framework-demo'),
            'default' => 'Excerpt',
            'hint' => array(
                'title'   => __('Excerpt or Full Portfolio Content','redux-framework-demo'),
                'content' => __('Excerpt or Full Portfolio Content','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'excerpt_length_portfolio',
            'type' => 'text',
            'title' => __('Excerpt Length','redux-framework-demo'),
            'subtitle'  => __('Excerpt Length.', 'redux-framework-demo'),
            'desc' => __('Insert the number of words you want to show in the post excerpts.','redux-framework-demo'),
            'default' => '55',
            'hint' => array(
                'title'   => __('Excerpt Length','redux-framework-demo'),
                'content' => __('Excerpt Length','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'grid_pagination_type',
            'type' => 'select',
            'options' => array (
                'Pagination' => 'Pagination',
                'Infinite Scroll' => 'Infinite Scroll',
            ),
            'title' => __('Grid Pagination Type','redux-framework-demo'),
            'subtitle'  => __('Grid Pagination Type.', 'redux-framework-demo'),
            'desc' => __('Select the pagination type for Portfolio Grid layouts.','redux-framework-demo'),
            'default' => 'pagination',
            'hint' => array(
                'title'   => __('Grid Pagination Type','redux-framework-demo'),
                'content' => __('Grid Pagination Type','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'portfolio_slug',
            'type' => 'text',
            'title' => __('Portfolio Slug','redux-framework-demo'),
            'subtitle'  => __('Portfolio Slug.', 'redux-framework-demo'),
            'desc' => __('Change/Rewrite the permalink when you use the permalink type as %postname%. <strong>Make sure to regenerate permalinks.</strong>','redux-framework-demo'),
            'default' => 'portfolio-items',
            'hint' => array(
                'title'   => __('Portfolio Slug','redux-framework-demo'),
                'content' => __('Portfolio Slug','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'blog_single_post',
            'icon' => true,
            'type' => 'info',
            'raw' => '<h3 style=\'margin: 0;\'>Portfolio Single Post Page Options</h3>',
        ),
        array (
            'id' => 'portfolio_featured_images',
            'type' => 'switch',
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => true,
            'title' => __('Featured Image / Video on Single Post Page','redux-framework-demo'),
            'subtitle'  => __('Featured Image / Video on Single Post Page.', 'redux-framework-demo'),
            'desc' => __('YES to display featured images and videos on single post pages.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Featured Image / Video on Single Post Page','redux-framework-demo'),
                'content' => __('Featured Image / Video on Single Post Page','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'portfolio_pn_nav',
            'type' => 'switch',
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => FALSE,
            'title' => __('Disable Previous/Next Pagination','redux-framework-demo'),
            'subtitle'  => __('Disable Previous/Next Pagination.', 'redux-framework-demo'),
            'desc' => __('YES to disable previous/next pagination.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Disable Previous/Next Pagination','redux-framework-demo'),
                'content' => __('Disable Previous/Next Pagination','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'portfolio_comments',
            'type' => 'switch',
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => FALSE,
            'title' => __('Show Comments','redux-framework-demo'),
            'subtitle'  => __('Show Comments.', 'redux-framework-demo'),
            'desc' => __('YES to enable comments on portfolio items.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Show Comments','redux-framework-demo'),
                'content' => __('Show Comments','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'portfolio_author',
            'type' => 'switch',
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => FALSE,
            'title' => __('Show Author','redux-framework-demo'),
            'subtitle'  => __('Show Author.', 'redux-framework-demo'),
            'desc' => __('YES to enable Author on portfolio items.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Show Author','redux-framework-demo'),
                'content' => __('Show Author','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'portfolio_social_sharing_box',
            'type' => 'switch',
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => true,
            'title' => __('Social Sharing Box','redux-framework-demo'),
            'subtitle'  => __('Social Sharing Box.', 'redux-framework-demo'),
            'desc' => __('YES to display the social sharing box.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Social Sharing Box','redux-framework-demo'),
                'content' => __('Social Sharing Box','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'portfolio_related_posts',
            'type' => 'switch',
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => true,
            'title' => __('Related Posts','redux-framework-demo'),
            'subtitle'  => __('Related Posts.', 'redux-framework-demo'),
            'desc' => __('YES to display related posts.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Related Posts','redux-framework-demo'),
                'content' => __('Related Posts','redux-framework-demo'),
            )
        )
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
            'id' => 'page_title_bar',
            'type' => 'switch',
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => true,
            'title' => __('Page Title Bar','redux-framework-demo'),
            'subtitle'  => __('Page Title Bar.', 'redux-framework-demo'),
            'desc' => __('YES to show the page title bar. This is a global option for every page or post, and this can be overridden by individual page/post options.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Page Title Bar','redux-framework-demo'),
                'content' => __('Page Title Bar','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'page_title_height',
            'type' => 'text',
            'title' => __('Page Title Bar Height','redux-framework-demo'),
            'subtitle'  => __('Page Title Bar Height.', 'redux-framework-demo'),
            'desc' => __('In pixels, ex: 10px','redux-framework-demo'),
            'default' => '87px',
            'hint' => array(
                'title'   => __('Page Title Bar Height','redux-framework-demo'),
                'content' => __('Page Title Bar Height','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'page_title_bg',
            'type' => 'media',
            'title' => __('Page Title Bar Background','redux-framework-demo'),
            'subtitle'  => __('Page Title Bar Background.', 'redux-framework-demo'),
            'desc' => __('Select an image or insert an image url to use for the page title bar background.','redux-framework-demo'),
            'default' => array (
                'url' => get_template_directory_uri(). '/images/page_title_bg.png',
            ),
            'url' => true,
            'hint' => array(
                'title'   => __('Page Title Bar Background','redux-framework-demo'),
                'content' => __('Page Title Bar Background','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'page_title_bg_retina',
            'type' => 'media',
            'title' => __('Page Title Bar Background (Retina Version @2x)','redux-framework-demo'),
            'subtitle'  => __('Page Title Bar Background (Retina Version @2x).', 'redux-framework-demo'),
            'desc' => __('Select an image or insert an image url to use for the retina page title bar background.','redux-framework-demo'),
            'url' => true,
            'hint' => array(
                'title'   => __('Page Title Bar Background (Retina Version @2x)','redux-framework-demo'),
                'content' => __('Page Title Bar Background (Retina Version @2x)','redux-framework-demo'),
            )
        ),
        array (

            'id' => 'page_title_bg_full',
            'type' => 'switch',
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => false,
            'title' => __('100% Background Image','redux-framework-demo'),
            'subtitle'  => __('100% Background Image.', 'redux-framework-demo'),
            'desc' => __('YES this box to have the page title bar background image display at 100% in width and height and scale according to the browser size.','redux-framework-demo'),
        'hint' => array(
            'title'   => __('100% Background Image','redux-framework-demo'),
            'content' => __('100% Background Image','redux-framework-demo'),
        )
        ),
        array (
            'id' => 'page_title_bg_parallax',
            'type' => 'switch',
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => false,
            'title' => __('Parallax Background Image','redux-framework-demo'),
            'subtitle'  => __('Parallax Background Image.', 'redux-framework-demo'),
            'desc' => __('YES to enable parallax background image when scrolling.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Parallax Background Image','redux-framework-demo'),
                'content' => __('Parallax Background Image','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'header_info',
            'icon' => true,
            'type' => 'info',
            'raw' => '<h3 style=\'margin: 0;\'>Breadcrumb Options</h3>',
        ),
        array (
            'id' => 'breadcrumb',
            'type' => 'switch',
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => true,
            'title' => __('Display Breadcrumbs/Search Bar','redux-framework-demo'),
            'subtitle'  => __('Display Breadcrumbs/Search Bar.', 'redux-framework-demo'),
            'desc' => __('YES to display the breadcrumbs or search bar in general. NO to hide them.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Display Breadcrumbs/Search Bar','redux-framework-demo'),
                'content' => __('Display Breadcrumbs/Search Bar','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'page_title_bar_bs',
            'options' => array (
                'Breadcrumbs' => 'Breadcrumbs',
                'Search Box' => 'Search Box',
            ),
            'type' => 'select',
            'title' => __('Breadcrumbs or Search Box?','redux-framework-demo'),
            'subtitle'  => __('Breadcrumbs or Search Box?.', 'redux-framework-demo'),
            'desc' => __('Choose to display breadcrumbs or search box in the page title bar.','redux-framework-demo'),
            'default' => 'Breadcrumbs',
            'hint' => array(
                'title'   => __('Breadcrumbs or Search Box?','redux-framework-demo'),
                'content' => __('Breadcrumbs or Search Box?','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'breadcrumb_mobile',
            'type' => 'switch',
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => true,
            'title' => __('Breadcrumbs on Mobile Devices','redux-framework-demo'),
            'subtitle'  => __('Breadcrumbs on Mobile Devices.', 'redux-framework-demo'),
            'desc' => __('YES to display breadcrumbs on mobile devices.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Breadcrumbs on Mobile Devices','redux-framework-demo'),
                'content' => __('Breadcrumbs on Mobile Devices','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'breacrumb_prefix',
            'type' => 'text',
            'title' => __('Breadcrumb Menu Prefix','redux-framework-demo'),
            'subtitle'  => __('Breadcrumb Menu Prefix.', 'redux-framework-demo'),
            'desc' => __('The text before the breadcrumb menu.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Breadcrumb Menu Prefix','redux-framework-demo'),
                'content' => __('Breadcrumb Menu Prefix','redux-framework-demo'),
            )
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

            'id' => 'posts_slideshow_number',
            'type' => 'text',
            'title' => __('Posts Slideshow Images','redux-framework-demo'),
            'subtitle'  => __('Posts Slideshow Images.', 'redux-framework-demo'),
            'desc' => __('This option controls the number of featured image boxes for blog/portfolio slideshows.','redux-framework-demo'),
            'default' => '5',
            'hint' => array(
                'title'   => __('Posts Slideshow Images','redux-framework-demo'),
                'content' => __('Posts Slideshow Images','redux-framework-demo'),
            )
        ),
        array (

            'id' => 'slideshow_autoplay',
            'type' => 'switch',
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => true,
            'title' => __('Autoplay','redux-framework-demo'),
            'subtitle'  => __('Autoplay.', 'redux-framework-demo'),
            'desc' => __('YES to autoplay the slideshow.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Autoplay','redux-framework-demo'),
                'content' => __('Autoplay','redux-framework-demo'),
            )
        ),
        array (

            'id' => 'slideshow_smooth_height',
            'type' => 'switch',
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => false,
            'title' => __('Enable Smooth Height','redux-framework-demo'),
            'subtitle'  => __('Enable Smooth Height.', 'redux-framework-demo'),
            'desc' => __('YES to enable smooth height on slideshows when using images with different heights. Please note, smooth height is disabled on blog grid layout.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Enable Smooth Height','redux-framework-demo'),
                'content' => __('Enable Smooth Height','redux-framework-demo'),
            )
        ),
        array (

            'id' => 'slideshow_speed',
            'type' => 'text',
            'title' => __('Slideshow speed','redux-framework-demo'),
            'subtitle'  => __('Slideshow speed.', 'redux-framework-demo'),
            'desc' => __('Controls the speed of slideshows for the [slider] shortcode and sliders within posts. ex: 1000 = 1 second.','redux-framework-demo'),
            'default' => '7000',
            'hint' => array(
                'title'   => __('Slideshow speed','redux-framework-demo'),
                'content' => __('Slideshow speed','redux-framework-demo'),
            )
        ),
        array (

            'id' => 'pagination_video_slide',
            'type' => 'switch',
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => false,
            'title' => __('Pagination circles below video slides','redux-framework-demo'),
            'subtitle'  => __('Pagination circles below video slides.', 'redux-framework-demo'),
            'desc' => __('YES if you want to show pagination circles below a video slide for the slider shortcode. Leave it unchecked to hide them on video slides.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Pagination circles below video slides','redux-framework-demo'),
                'content' => __('Pagination circles below video slides','redux-framework-demo'),
            )
        ),
        array (

            'id' => 'legacy_posts_slideshow',
            'type' => 'switch',
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => false,
            'title' => __('<strong>Deprecated</strong>: Legacy Posts Slideshow','redux-framework-demo'),
            'subtitle'  => __('Deprecated: Legacy Posts Slideshow.', 'redux-framework-demo'),
            'desc' => __('YES to enable posts slideshow in legacy mode. Only recommended for v.1 users, this option will disable the multiple featured image method.<strong>This option will be removed in next update.</strong>','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Deprecated: Legacy Posts Slideshow','redux-framework-demo'),
                'content' => __('Deprecated: Legacy Posts Slideshow','redux-framework-demo'),
            )
        ),
        array (

            'id' => 'posts_slideshow',
            'type' => 'switch',
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => true,
            'title' => __('Deprecated: Posts Slideshow','redux-framework-demo'),
            'subtitle'  => __('Deprecated: Posts Slideshow.', 'redux-framework-demo'),
            'desc' => __('YES to show post slideshows in blog/portfolio pages. <strong>This option will be removed in next update.</strong>','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Deprecated: Posts Slideshow','redux-framework-demo'),
                'content' => __('Deprecated: Posts Slideshow','redux-framework-demo'),
            )
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
            'id' => 'tfes_slider_width',
            'type' => 'text',
            'title' => __('Slider Width','redux-framework-demo'),
            'subtitle'  => __('Slider Width.', 'redux-framework-demo'),
            'desc' => __('In pixels or percentage, ex: 100% or 100.','redux-framework-demo'),
            'default' => '100%',
            'hint' => array(
                'title'   => __('Slider Width','redux-framework-demo'),
                'content' => __('Slider Width','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'tfes_slider_height',
            'type' => 'text',
            'title' => __('Slider Height','redux-framework-demo'),
            'subtitle'  => __('Slider Height.', 'redux-framework-demo'),
            'desc' => __('In pixels, ex: 100px.','redux-framework-demo'),
            'default' => '400px',
            'hint' => array(
                'title'   => __('Slider Height','redux-framework-demo'),
                'content' => __('Slider Height','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'tfes_animation',
            'options' => array (
                'sides' => 'sides',
                'center' => 'center',
            ),
            'type' => 'select',
            'title' => __('Animation','redux-framework-demo'),
            'subtitle'  => __('Animation.', 'redux-framework-demo'),
            'desc' => __('Slides animate from sides or center.','redux-framework-demo'),
            'default' => 'sides',
            'hint' => array(
                'title'   => __('Animation','redux-framework-demo'),
                'content' => __('Animation','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'tfes_autoplay',
            'type' => 'switch',
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => true,
            'title' => __('Autoplay','redux-framework-demo'),
            'subtitle'  => __('Autoplay.', 'redux-framework-demo'),
            'desc' => __('YES to autoplay the slides.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Autoplay','redux-framework-demo'),
                'content' => __('Autoplay','redux-framework-demo'),
            )

        ),
        array (
            'id' => 'tfes_interval',
            'type' => 'text',
            'title' => __('Slideshow Interval','redux-framework-demo'),
            'subtitle'  => __('Slideshow Interval.', 'redux-framework-demo'),
            'desc' => __('Select the slideshow speed, 1000 = 1 second.','redux-framework-demo'),
            'default' => '3000',
            'hint' => array(
                'title'   => __('Slideshow Interval','redux-framework-demo'),
                'content' => __('Slideshow Interval','redux-framework-demo'),
            )
        ),
        array (

            'id' => 'tfes_speed',
            'type' => 'text',
            'title' => __('Sliding Speed','redux-framework-demo'),
            'subtitle'  => __('Sliding Speed.', 'redux-framework-demo'),
            'desc' => __('Select the animation speed, 1000 = 1 second.','redux-framework-demo'),
            'default' => '800',
            'hint' => array(
                'title'   => __('Sliding Speed','redux-framework-demo'),
                'content' => __('Sliding Speed','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'tfes_width',
            'type' => 'text',
            'title' => __('Thumbnail Width','redux-framework-demo'),
            'subtitle'  => __('Thumbnail Width.', 'redux-framework-demo'),
            'desc' => __('Enter the width for thumbnail without \'px\' ex: 100.','redux-framework-demo'),
            'default' => '150',
            'hint' => array(
                'title'   => __('Thumbnail Width','redux-framework-demo'),
                'content' => __('Thumbnail Width','redux-framework-demo'),
            )
        ),
        array (
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
            'title' => __('Title Font Size (px)','redux-framework-demo'),
            'subtitle'  => __('Title Font Size (px).', 'redux-framework-demo'),
            'desc' => __('Default is 42','redux-framework-demo'),
            'default' => '42',
            'hint' => array(
                'title'   => __('Title Font Size (px)','redux-framework-demo'),
                'content' => __('Title Font Size (px)','redux-framework-demo'),
            )
        ),
        array (
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
            'title' => __('Caption Font Size (px)','redux-framework-demo'),
            'subtitle'  => __('Caption Font Size (px).', 'redux-framework-demo'),
            'desc' => __('Default is 20','redux-framework-demo'),
            'default' => '20',
            'hint' => array(
                'title'   => __('Caption Font Size (px)','redux-framework-demo'),
                'content' => __('Caption Font Size (px)','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'es_title_color',
            'type' => 'color',
            'title' => __('Title Color','redux-framework-demo'),
            'subtitle'  => __('Title Color.', 'redux-framework-demo'),
            'desc' => __('Controls the text color of the title font.','redux-framework-demo'),
            'default' => '#333333',
            'hint' => array(
                'title'   => __('Title Color','redux-framework-demo'),
                'content' => __('Title Color','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'es_caption_color',
            'type' => 'color',
            'title' => __('Caption Color','redux-framework-demo'),
            'subtitle'  => __('Caption Color.', 'redux-framework-demo'),
            'desc' => __('Controls the text color of the caption font.','redux-framework-demo'),
            'default' => '#747474',
            'hint' => array(
                'title'   => __('Caption Color','redux-framework-demo'),
                'content' => __('Caption Color','redux-framework-demo'),
            )
        ),

    )

);
/*
             *
              *
              *
              * New Tab LIGHTBOX
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
            'id' => 'lightbox_animation_speed',
            'type' => 'select',
            'options' => array (
                'Fast' => 'Fast',
                'Slow' => 'Slow',
                'Normal' => 'Normal',
            ),
            'title' => __('Animation Speed','redux-framework-demo'),
            'subtitle'  => __('Animation Speed.', 'redux-framework-demo'),
            'desc' => __('Set the speed of the animation.','redux-framework-demo'),
            'default' => 'fast',
            'hint' => array(
            'title'   => __('Animation Speed','redux-framework-demo'),
            'content' => __('Animation Speed','redux-framework-demo'),
             )

        ),
        array (
            'id' => 'lightbox_gallery',
            'type' => 'switch',
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => true,
            'title' => __('Show gallery','redux-framework-demo'),
            'subtitle'  => __('Show gallery.', 'redux-framework-demo'),
            'desc' => __('YES to show the gallery.','redux-framework-demo'),
           'hint' => array(
             'title'   => __('Show gallery','redux-framework-demo'),
             'content' => __('Show gallery','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'lightbox_autoplay',
            'type' => 'switch',
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => false,
            'title' => __('Autoplay the Lightbox Gallery','redux-framework-demo'),
            'subtitle'  => __('Autoplay the Lightbox Gallery.', 'redux-framework-demo'),
            'desc' => __('YES to autoplay the lightbox gallery.','redux-framework-demo'),
             'hint' => array(
             'title'   => __('Autoplay the Lightbox Gallery','redux-framework-demo'),
             'content' => __('Autoplay the Lightbox Gallery','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'lightbox_slideshow_speed',
            'type' => 'text',
            'title' => __('Slideshow Speed','redux-framework-demo'),
            'subtitle'  => __('Slideshow Speed.', 'redux-framework-demo'),
            'desc' => __('If autoplay is enabled, set the slideshow speed, 1000 = 1 second.','redux-framework-demo'),
            'default' => '5000',
              'hint' => array(
              'title'   => __('Slideshow Speed','redux-framework-demo'),
              'content' => __('Slideshow Speed','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'lightbox_opacity',
            'type' => 'text',
            'title' => __('Background Opacity','redux-framework-demo'),
            'subtitle'  => __('Background Opacity.', 'redux-framework-demo'),
            'desc' => __('Set the opacity of background, <br />0.1 (lowest) to 1 (highest).','redux-framework-demo'),
            'default' => '0.8',
           'hint' => array(
           'title'   => __('Background Opacity','redux-framework-demo'),
           'content' => __('Background Opacity','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'lightbox_title',
            'type' => 'switch',
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => true,
            'title' => __('Show Caption','redux-framework-demo'),
            'subtitle'  => __('Show Caption.', 'redux-framework-demo'),
            'desc' => __('YES to show the image caption.','redux-framework-demo'),
            'hint' => array(
            'title'   => __('Show Caption','redux-framework-demo'),
             'content' => __('Show Caption','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'lightbox_desc',
            'type' => 'switch',
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => true,
            'title' => __('Show Description','redux-framework-demo'),
            'subtitle'  => __('Show Description.', 'redux-framework-demo'),
            'desc' => __('YES to show the image description. The Alternative text field is used for the description.','redux-framework-demo'),
            'hint' => array(
           'title'   => __('Show Description','redux-framework-demo'),
           'content' => __('Show Description','redux-framework-demo'),
        )
        ),
        array (
            'id' => 'lightbox_social',
            'type' => 'switch',
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => true,
            'title' => __('Social Sharing','redux-framework-demo'),
            'subtitle'  => __('Social Sharing.', 'redux-framework-demo'),
            'desc' => __('YES to show social sharing buttons on lightbox.','redux-framework-demo'),
            'hint' => array(
            'title'   => __('Social Sharing','redux-framework-demo'),
            'content' => __('Social Sharing','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'lightbox_post_images',
            'type' => 'switch',
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => false,
            'title' => __('Show Post Images in Lightbox','redux-framework-demo'),
            'subtitle'  => __('Show Post Images in Lightbox.', 'redux-framework-demo'),
            'desc' => __('YES to show post images that are inside the post content area in the lightbox.','redux-framework-demo'),
           'hint' => array(
           'title'   => __('Show Post Images in Lightbox','redux-framework-demo'),
          'content' => __('Show Post Images in Lightbox','redux-framework-demo'),
            )
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
            'id' => 'default_sidebar_pos',
            'options' => array (
                'Right' => 'Right',
                'Left' => 'Left',
            ),
            'type' => 'select',
            'title' => __('Default Sidebar Position','redux-framework-demo'),
            'subtitle'  => __('Default Sidebar Position.', 'redux-framework-demo'),
            'desc' => __('Select the default position of the sidebar. This will take effect for new pages/posts.','redux-framework-demo'),
            'default' => 'right',
            'hint' => array(
                'title'   => __('Default Sidebar Position','redux-framework-demo'),
                'content' => __('Default Sidebar Position','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'sidenav_behavior',
            'options' => array (
                'Hover' => 'Hover',
                'Click' => 'Click',
            ),
            'type' => 'select',
            'title' => __('Sidenav Behavior','redux-framework-demo'),
            'subtitle'  => __('Sidenav Behavior.', 'redux-framework-demo'),
            'desc' => __('Controls the side navigation animation for child pages, on click or hover.','redux-framework-demo'),
            'default' => 'hover',
            'hint' => array(
                'title'   => __('Sidenav Behavior','redux-framework-demo'),
                'content' => __('Sidenav Behavior','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'number_related_posts',
            'type' => 'text',
            'title' => __('Number of Related Posts / Projects','redux-framework-demo'),
            'subtitle'  => __('Number of Related Posts / Projects.', 'redux-framework-demo'),
            'desc' => __('This option controls the amount of related projects / posts that show up on each single portfolio and blog post. ex: 5','redux-framework-demo'),
            'default' => '5',
            'hint' => array(
                'title'   => __('Number of Related Posts / Projects','redux-framework-demo'),
                'content' => __('Number of Related Posts / Projects','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'excerpt_base',
            'options' => array (
                'Words' => 'Words',
                'Characters' => 'Characters',
            ),
            'type' => 'select',
            'title' => __('Basis for Excerpt Length','redux-framework-demo'),
            'subtitle'  => __('Basis for Excerpt Length.', 'redux-framework-demo'),
            'desc' => __('Choose if the excerpt length should be based on words or characters.','redux-framework-demo'),
            'default' => 'words',
            'hint' => array(
                'title'   => __('Basis for Excerpt Length','redux-framework-demo'),
                'content' => __('Basis for Excerpt Length','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'disable_excerpts',
            'type' => 'switch',
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => false,
            'title' => __('Disable [...] on Excerpts','redux-framework-demo'),
            'subtitle'  => __('Disable [...] on Excerpts.', 'redux-framework-demo'),
            'desc' => __('YES to disable the read more sign [...] on excerpts throughout the site.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Disable [...] on Excerpts','redux-framework-demo'),
                'content' => __('Disable [...] on Excerpts','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'link_read_more',
            'type' => 'switch',
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => false,
            'title' => __('Make [...] Link to Single Post Page','redux-framework-demo'),
            'subtitle'  => __('Make [...] Link to Single Post Page.', 'redux-framework-demo'),
            'desc' => __('YES to have the read more sign [...] on excerpts link to single post page.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Make [...] Link to Single Post Page','redux-framework-demo'),
                'content' => __('Make [...] Link to Single Post Page','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'comments_pages',
            'type' => 'switch',
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => false,
            'title' => __('Allow Comments on Pages','redux-framework-demo'),
            'subtitle'  => __('Allow Comments on Pages.', 'redux-framework-demo'),
            'desc' => __('YES to allow comments on regular pages.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Allow Comments on Pages','redux-framework-demo'),
                'content' => __('Allow Comments on Pages','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'featured_images_pages',
            'type' => 'switch',
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => false,
            'title' => __('Featured Images on Pages','redux-framework-demo'),
            'subtitle'  => __('Featured Images on Pages.', 'redux-framework-demo'),
            'desc' => __('YES to disable featured images on regular pages.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Featured Images on Pages','redux-framework-demo'),
                'content' => __('Featured Images on Pages','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'faq_featured_image',
            'type' => 'switch',
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => false,
            'title' => __('FAQ Featured Images','redux-framework-demo'),
            'subtitle'  => __('FAQ Featured Images.', 'redux-framework-demo'),
            'desc' => __('YES to show featured images on FAQ archive page.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('FAQ Featured Images','redux-framework-demo'),
                'content' => __('FAQ Featured Images','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'nofollow_social_links',
            'type' => 'switch',
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => false,
            'title' => __('Add rel="nofollow" to social links','redux-framework-demo'),
            'subtitle'  => __('Add rel="nofollow" to social links.', 'redux-framework-demo'),
            'desc' => __('YES to add rel="nofollow" attribute to all social links.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Add rel="nofollow" to social links','redux-framework-demo'),
                'content' => __('Add rel="nofollow" to social links','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'social_icons_new',
            'type' => 'switch',
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => true,
            'title' => __('Open Social Icons in a New Window','redux-framework-demo'),
            'subtitle'  => __('Open Social Icons in a New Window.', 'redux-framework-demo'),
            'desc' => __('YES to allow social icons to open in a new window.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Open Social Icons in a New Window','redux-framework-demo'),
                'content' => __('Open Social Icons in a New Window','redux-framework-demo'),
            )

        ),

        array (
            'id' => 'rollovers',
            'icon' => true,
            'type' => 'info',
            'raw' => '<h3 style=\'margin: 0;\'>Image Rollover Options</h3>',
        ),
        array (
            'id' => 'image_rollover',
            'type' => 'switch',
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => true,
            'title' => __('Image Rollover','redux-framework-demo'),
            'subtitle'  => __('Image Rollover.', 'redux-framework-demo'),
            'desc' => __('YES to show the rollover box on images.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Image Rollover','redux-framework-demo'),
                'content' => __('Image Rollover','redux-framework-demo'),
            )

        ),
        array (
            'id' => 'link_image_rollover',
            'type' => 'switch',
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => false,
            'title' => __('Disable Link Icon From Image Rollover','redux-framework-demo'),
            'subtitle'  => __('Disable Link Icon From Image Rollover.', 'redux-framework-demo'),
            'desc' => __('YES to disable the link icon from image rollovers. Note: This option will override the post settings.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Disable Link Icon From Image Rollover','redux-framework-demo'),
                'content' => __('Disable Link Icon From Image Rollover','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'zoom_image_rollover',
            'type' => 'switch',
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => false,
            'title' => __('Disable Image Icon From Image Rollover','redux-framework-demo'),
            'subtitle'  => __('Disable Image Icon From Image Rollover.', 'redux-framework-demo'),
            'desc' => __('YES to disable the image icon from image rollovers. Note: This option will override the post settings.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Disable Image Icon From Image Rollover','redux-framework-demo'),
                'content' => __('Disable Image Icon From Image Rollover','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'title_image_rollover',
            'type' => 'switch',
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => false,
            'title' => __('Disable Title From Image Rollover','redux-framework-demo'),
            'subtitle'  => __('Disable Title From Image Rollover.', 'redux-framework-demo'),
            'desc' => __('YES to disable the title from image rollovers.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Disable Title From Image Rollover','redux-framework-demo'),
                'content' => __('Disable Title From Image Rollover','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'cats_image_rollover',
            'type' => 'switch',
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => false,
            'title' => __('Disable Categories From Image Rollover','redux-framework-demo'),
            'subtitle'  => __('Disable Categories From Image Rollover.', 'redux-framework-demo'),
            'desc' => __('YES to disable the categories from image rollovers.','redux-framework-demo'),
            'hint' => array(
            'title'   => __('Disable Categories From Image Rollover','redux-framework-demo'),
            'content' => __('Disable Categories From Image Rollover','redux-framework-demo'),
        )
        ),
        array (
            'id' => 'image_rollover_opacity',
            'type' => 'text',
            'title' => __('Image Rollover Opacity','redux-framework-demo'),
            'subtitle'  => __('Image Rollover Opacity.', 'redux-framework-demo'),
            'desc' => __('Select the opacity of the rollover. <br />0.1 (lowest) to 1 (highest).','redux-framework-demo'),
            'default' => '1',
            'hint' => array(
                'title'   => __('Image Rollover Opacity','redux-framework-demo'),
                'content' => __('Image Rollover Opacity','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'bbpress_only',
            'icon' => true,
            'type' => 'info',
            'raw' => '<h3 style=\'margin: 0;\'>BBPress Options</h3>',
        ),
        array (
            'id' => 'bbpress_global_sidebar',
            'type' => 'switch',
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => false,
            'title' => __('BBPress Use Global Sidebar','redux-framework-demo'),
            'subtitle'  => __('BBPress Use Global Sidebar.', 'redux-framework-demo'),
            'desc' => __('YES if you want to use one global sidebar on all forum pages.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('BBPress Use Global Sidebar','redux-framework-demo'),
                'content' => __('BBPress Use Global Sidebar','redux-framework-demo'),
            )
        ),
        array (
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
            'title' => __('BBPress Global Sidebar','redux-framework-demo'),
            'subtitle'  => __('BBPress Global Sidebar.', 'redux-framework-demo'),
            'desc' => __('Select the sidebar that will display on forum pages globally.','redux-framework-demo'),
            'default' => 'None',
            'hint' => array(
                'title'   => __('BBPress Global Sidebar','redux-framework-demo'),
                'content' => __('BBPress Global Sidebar','redux-framework-demo'),
            )
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
            'id' => 'disable_megamenu',
            'type' => 'switch',
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => true,
            'title' => __('Disable Mega Menu','redux-framework-demo'),
            'subtitle'  => __('Disable Mega Menu.', 'redux-framework-demo'),
            'desc' => __('YES to disable the theme\'s mega menu.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Disable Mega Menu','redux-framework-demo'),
                'content' => __('Disable Mega Menu','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'enable_smoothscroll',
            'type' => 'switch',
            'title' => __('Enable Smooth Scrolling', 'redux-framework-demo'),
            'subtitle'  => __('Smooth scrolling of web page', 'redux-framework-demo'),
            'desc' => __('Default value is <strong>YES</strong>.', 'redux-framework-demo'),
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default'   => false,
            'hint' => array(
                'title'   => __('Enable Smooth Scrolling','redux-framework-demo'),
                'content' => __('You can enable/disable smooth scrolling while scrolling the page with mouse wheel or kayboard arrow keys.Choose <strong>YES</strong> to enable smooth scrolling, Choose <strong>NO</strong> to disable it. Default value is <strong>YES</strong>','redux-framework-demo'),
            )

        ),
        array (
            'id' => 'aione_rev_styles',
            'type' => 'switch',
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => false,
            'title' => __('Disable aione Styles For Revolution Slider','redux-framework-demo'),
            'subtitle'  => __('Disable aione Styles For Revolution Slider.', 'redux-framework-demo'),
            'desc' => __('YES to disable the aione styles and use the default Revolution Slider styles.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Disable aione Styles For Revolution Slider','redux-framework-demo'),
                'content' => __('Disable aione Styles For Revolution Slider','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'ubermenu',
            'type' => 'switch',
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => false,
            'title' => __('UberMenu Plugin Support','redux-framework-demo'),
            'subtitle'  => __('UberMenu Plugin Support.', 'redux-framework-demo'),
            'desc' => __('YES if you are are using UberMenu, this option adds UberMenu support without editing any code.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('UberMenu Plugin Support','redux-framework-demo'),
                'content' => __('UberMenu Plugin Support','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'use_animate_css',
            'type' => 'switch',
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => false,
            'title' => __('Disable CSS Animations','redux-framework-demo'),
            'subtitle'  => __('Disable CSS Animations.', 'redux-framework-demo'),
            'desc' => __('YES to disable CSS animations on shortcode items.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Disable CSS Animations','redux-framework-demo'),
                'content' => __('Disable CSS Animations','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'disable_mobile_animate_css',
            'type' => 'switch',
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => true,
            'title' => __('Disable CSS Animations on Mobiles Only','redux-framework-demo'),
            'subtitle'  => __('Disable CSS Animations on Mobiles Only.', 'redux-framework-demo'),
            'desc' => __('YES to disable CSS animations on mobiles only.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Disable CSS Animations on Mobiles Only','redux-framework-demo'),
                'content' => __('Disable CSS Animations on Mobiles Only','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'status_lightbox',
            'type' => 'switch',
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => false,
            'title' => __('Disable Lightbox','redux-framework-demo'),
            'subtitle'  => __('Disable Lightbox.', 'redux-framework-demo'),
            'desc' => __('YES to disable Lightbox.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Disable Lightbox','redux-framework-demo'),
                'content' => __('Disable Lightbox','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'status_lightbox_single',
            'type' => 'switch',
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => false,
            'title' => __('Disable Lightbox On Single Posts Pages Only','redux-framework-demo'),
            'subtitle'  => __('Disable Lightbox On Single Posts Pages Only.', 'redux-framework-demo'),
            'desc' => __('YES to disable Lightbox only on single posts and portfolio pages..','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Disable Lightbox On Single Posts Pages Only','redux-framework-demo'),
                'content' => __('Disable Lightbox On Single Posts Pages Only','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'status_yt',
            'type' => 'switch',
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => false,
            'title' => __('Disable Youtube API Scripts','redux-framework-demo'),
            'subtitle'  => __('Disable Youtube API Scripts.', 'redux-framework-demo'),
            'desc' => __('YES to disable Youtube API scripts.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Disable Youtube API Scripts','redux-framework-demo'),
                'content' => __('Disable Youtube API Scripts','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'status_vimeo',
            'type' => 'switch',
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => false,
            'title' => __('Disable Vimeo API Scripts','redux-framework-demo'),
            'subtitle'  => __('Disable Vimeo API Scripts.', 'redux-framework-demo'),
            'desc' => __('YES to disable Vimeo API scripts.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Disable Vimeo API Scripts','redux-framework-demo'),
                'content' => __('Disable Vimeo API Scripts','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'status_gmap',
            'type' => 'switch',
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => false,
            'title' => __('Disable Google Map Scripts','redux-framework-demo'),
            'subtitle'  => __('Disable Google Map Scripts.', 'redux-framework-demo'),
            'desc' => __('YES to disable google map.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Disable Google Map Scripts','redux-framework-demo'),
                'content' => __('Disable Google Map Scripts','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'status_totop',
            'type' => 'switch',
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => false,
            'title' => __('Disable ToTop Script','redux-framework-demo'),
            'subtitle'  => __('Disable ToTop Script.', 'redux-framework-demo'),
            'desc' => __('YES to disable the ToTop script which adds the scrolling to top functionality.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Disable ToTop Script','redux-framework-demo'),
                'content' => __('Disable ToTop Script','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'status_totop_mobile',
            'type' => 'switch',
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => false,
            'title' => __('Enable ToTop Script on mobile','redux-framework-demo'),
            'subtitle'  => __('Enable ToTop Script on mobile.', 'redux-framework-demo'),
            'desc' => __('YES to enable the ToTop script on mobile devices.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Enable ToTop Script on mobile','redux-framework-demo'),
                'content' => __('Enable ToTop Script on mobile','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'status_aione_slider',
            'type' => 'switch',
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => false,
            'title' => __('Disable Aione Slider','redux-framework-demo'),
            'subtitle'  => __('Disable Aione Slider.', 'redux-framework-demo'),
            'desc' => __('YES to disable aione slider.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Disable Aione Slider','redux-framework-demo'),
                'content' => __('Disable Aione Slider','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'status_eslider',
            'type' => 'switch',
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => false,
            'title' => __('Disable Elastic Slider','redux-framework-demo'),
            'subtitle'  => __('Disable Elastic Slider.', 'redux-framework-demo'),
            'desc' => __('YES to disable elastic slider.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Disable Elastic Slider','redux-framework-demo'),
                'content' => __('Disable Elastic Slider','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'status_fontawesome',
            'type' => 'switch',
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => false,
            'title' => __('Disable FontAwesome','redux-framework-demo'),
            'subtitle'  => __('Disable FontAwesome.', 'redux-framework-demo'),
            'desc' => __('YES to disable font awesome.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Disable FontAwesome','redux-framework-demo'),
                'content' => __('Disable FontAwesome','redux-framework-demo'),
            )
        ),


    )

);

?>