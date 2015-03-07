<?php
/*********************************************************************************************
 *
 *  Blog settings
 *
 *********************************************************************************************/

$this->sections[] = array(
    'icon'      => 'el-icon-bold',
    'title'     => __('Blog', 'redux-framework-demo'),
    'fields'    => array(
        array (
            'id' => 'blog_title',
            'type' => 'text',
            'title' => __('Blog Page Title','redux-framework-demo'),
            'subtitle'  => __('Blog Page Title.', 'redux-framework-demo'),
            'desc' => __('This text will display in the page title bar of the assigned blog page.','redux-framework-demo'),
            'default' => 'Blog',
            'hint' => array(
                'title'   => __('Blog Page Title','redux-framework-demo'),
                'content' => __('Blog Page Title','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'blog_subtitle',
            'type' => 'text',
            'title' => __('Blog Page Subtitle','redux-framework-demo'),
            'subtitle'  => __('Blog Page Subtitle.', 'redux-framework-demo'),
            'desc' => __('This text will display as subheading in the page title bar of the assigned blog page.','redux-framework-demo'),
            'hint' => array(
                'title'   => __('Blog Page Subtitle','redux-framework-demo'),
                'content' => __('Blog Page Subtitle','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'blog_layout',
            'type' => 'select',
            'options' => array (
                'Large' => 'Large',
                'Medium' => 'Medium',
                'Large Alternate' => 'Large Alternate',
                'Medium Alternate' => 'Medium Alternate',
                'Grid' => 'Grid',
                'Timeline' => 'Timeline',
            ),
            'title' => __('Blog Layout','redux-framework-demo'),
            'subtitle'  => __('Blog Layout.', 'redux-framework-demo'),
            'desc' => __('Select the layout for the assigned blog page in settings > reading.','redux-framework-demo'),
            'default' => 'Large',
            'hint' => array(
                'title'   => __('Blog Layout','redux-framework-demo'),
                'content' => __('Blog Layout','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'blog_sidebar_position',
            'type' => 'select',
            'options' => array (
                'Right' => 'Right',
                'Left' => 'Left',
            ),
            'title' => __('Blog Sidebar Position','redux-framework-demo'),
            'subtitle'  => __('Blog Sidebar Position.', 'redux-framework-demo'),
            'desc' => __('Select the sidebar position for the blog pages.','redux-framework-demo'),
            'default' => 'Right',
            'hint' => array(
                'title'   => __('Blog Sidebar Position','redux-framework-demo'),
                'content' => __('Blog Sidebar Position','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'blog_archive_layout',
            'type' => 'select',
            'options' => array (
                'Large' => 'Large',
                'Medium' => 'Medium',
                'Large Alternate' => 'Large Alternate',
                'Medium Alternate' => 'Medium Alternate',
                'Grid' => 'Grid',
                'Timeline' => 'Timeline',
            ),
            'title' => __('Blog Archive/Category Layout','redux-framework-demo'),
            'subtitle'  => __('Blog Archive/Category Layout.', 'redux-framework-demo'),
            'desc' => __('Select the layout for the blog archive/category pages.','redux-framework-demo'),
            'default' => 'Large',
            'hint' => array(
                'title'   => __('Blog Archive/Category Layout','redux-framework-demo'),
                'content' => __('Blog Archive/Category Layout','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'blog_archive_sidebar',
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
            'title' => __('Blog Archive/Author/Category Sidebar','redux-framework-demo'),
            'subtitle'  => __('Blog Archive/Author/Category Sidebar.', 'redux-framework-demo'),
            'desc' => __('Select the sidebar that will display on the archive/category pages.','redux-framework-demo'),
            'default' => 'None',
            'hint' => array(
                'title'   => __('Blog Archive/Author/Category Sidebar','redux-framework-demo'),
                'content' => __('Blog Archive/Author/Category Sidebar','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'blog_pagination_type',
            'type' => 'select',
            'options' => array (
                'Pagination' => 'Pagination',
                'Infinite Scroll' => 'Infinite Scroll',
            ),
            'title' => __('Pagination Type','redux-framework-demo'),
            'subtitle'  => __('Pagination Type.', 'redux-framework-demo'),
            'desc' => __('Select the pagination type for the assigned blog page in settings > reading.','redux-framework-demo'),
            'default' => 'pagination',
            'hint' => array(
                'title'   => __('Pagination Type','redux-framework-demo'),
                'content' => __('Pagination Type','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'blog_grid_columns',
            'type' => 'select',
            'options' => array (
                2 => '2',
                3 => '3',
                4 => '4',
            ),
            'title' => __('Grid Layout # of Columns','redux-framework-demo'),
            'subtitle'  => __('Grid Layout # of Columns.', 'redux-framework-demo'),
            'desc' => __('Select whether to display the grid layout in 2, 3 or 4 columns.','redux-framework-demo'),
            'default' => '3',
            'hint' => array(
                'title'   => __('Grid Layout # of Columns','redux-framework-demo'),
                'content' => __('Grid Layout # of Columns','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'content_length',
            'type' => 'select',
            'options' => array (
                'Excerpt' => 'Excerpt',
                'Full Content' => 'Full Content',
            ),
            'title' => __('Excerpt or Full Blog Content','redux-framework-demo'),
            'subtitle'  => __('Excerpt or Full Blog Content.', 'redux-framework-demo'),
            'desc' => __('Choose to display an excerpt or full content on blog pages.','redux-framework-demo'),
            'default' => 'Excerpt',
            'hint' => array(
                'title'   => __('Excerpt or Full Blog Content','redux-framework-demo'),
                'content' => __('Excerpt or Full Blog Content','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'excerpt_length_blog',
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
            'id' => 'strip_html_excerpt',
            'type' => 'switch',
            'title' => __('Strip HTML from Excerpt','redux-framework-demo'),
            'subtitle'  => __('Strip HTML from Excerpt.', 'redux-framework-demo'),
            'desc' => __('YES if you want to strip HTML from the excerpt content only.','redux-framework-demo'),
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => true,
            'hint' => array(
                'title'   => __('Strip HTML from Excerpt','redux-framework-demo'),
                'content' => __('Strip HTML from Excerpt','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'blog_full_width',
            'type' => 'switch',
            'title' => __('Full Width','redux-framework-demo'),
            'subtitle'  => __('Full Width.', 'redux-framework-demo'),
            'desc' => __('Turn the blog into full width with no sidebar.','redux-framework-demo'),
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => false,
            'hint' => array(
                'title'   => __('Full Width','redux-framework-demo'),
                'content' => __('Full Width','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'single_post_full_width',
            'type' => 'switch',
            'title' => __('Set All Post Items Full Width','redux-framework-demo'),
            'subtitle'  => __('Set All Post Items Full Width.', 'redux-framework-demo'),
            'desc' => __('Turn all single post items to full width with no sidebar.','redux-framework-demo'),
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => false,
            'hint' => array(
                'title'   => __('Set All Post Items Full Width','redux-framework-demo'),
                'content' => __('Set All Post Items Full Width','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'featured_images',
            'type' => 'switch',
            'title' => __('Featured Image On Blog Archive Page','redux-framework-demo'),
            'subtitle'  => __('Featured Image On Blog Archive Page.', 'redux-framework-demo'),
            'desc' => __('Display featured images on blog archive page.','redux-framework-demo'),
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => true,
            'hint' => array(
                'title'   => __('Featured Image On Blog Archive Page','redux-framework-demo'),
                'content' => __('Featured Image On Blog Archive Page','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'alternate_date_format_month_year',
            'type' => 'text',
            'title' => __('Blog Alternate Date Format - Month and Year','redux-framework-demo'),
            'subtitle'  => __('Blog Alternate Date Format - Month and Year.', 'redux-framework-demo'),
            'desc' => __('<a href=\'http://codex.wordpress.org/Formatting_Date_and_Time\'>Formatting Date and Time</a>','redux-framework-demo'),
            'default' => 'm, Y',
            'hint' => array(
                'title'   => __('Blog Alternate Date Format - Month and Year','redux-framework-demo'),
                'content' => __('Blog Alternate Date Format - Month and Year','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'alternate_date_format_day',
            'type' => 'text',
            'title' => __('Blog Alternate Date Format - Day','redux-framework-demo'),
            'subtitle'  => __('Blog Alternate Date Format - Day.', 'redux-framework-demo'),
            'desc' => __('<a href=\'http://codex.wordpress.org/Formatting_Date_and_Time\'>Formatting Date and Time</a>','redux-framework-demo'),
            'default' => 'j',
            'hint' => array(
                'title'   => __('Blog Alternate Date Format - Day','redux-framework-demo'),
                'content' => __('Blog Alternate Date Format - Day','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'timeline_date_format',
            'type' => 'text',
            'title' => __('Blog Timeline Date Format - Timeline Labels','redux-framework-demo'),
            'subtitle'  => __('Blog Timeline Date Format - Timeline Labels.', 'redux-framework-demo'),
            'desc' => __('<a href=\'http://codex.wordpress.org/Formatting_Date_and_Time\'>Formatting Date</a>','redux-framework-demo'),
            'default' => 'F Y',
            'hint' => array(
                'title'   => __('Blog Timeline Date Format - Timeline Labels','redux-framework-demo'),
                'content' => __('Blog Timeline Date Format - Timeline Labels','redux-framework-demo'),
            )
        )


    )
);


////////////////////////////////////////////////////////////////////////////////////////////
$this->sections[] = array(
    'icon'      => 'el-icon-file',
    'title'     => __('Blog Single Page Post Options', 'redux-framework-demo'),
    'subsection' => true,
    'fields'    => array(
        array (
            'id' => 'featured_images_single',
            'type' => 'switch',
            'title' => __('Featured Image / Video on Single Post Page','redux-framework-demo'),
            'subtitle'  => __('Featured Image / Video on Single Post Page.', 'redux-framework-demo'),
            'desc' => __('Display featured images and videos on single post pages.','redux-framework-demo'),
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => true,
            'hint' => array(
                'title'   => __('Featured Image / Video on Single Post Page','redux-framework-demo'),
                'content' => __('Featured Image / Video on Single Post Page','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'blog_pn_nav',
            'type' => 'switch',
            'title' => __('Disable Previous/Next Pagination','redux-framework-demo'),
            'subtitle'  => __('Disable Previous/Next Pagination.', 'redux-framework-demo'),
            'desc' => __('Disable previous/next pagination.','redux-framework-demo'),
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => false,
            'hint' => array(
                'title'   => __('Disable Previous/Next Pagination','redux-framework-demo'),
                'content' => __('Disable Previous/Next Pagination','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'blog_post_title',
            'type' => 'switch',
            'title' => __('Post Title','redux-framework-demo'),
            'subtitle'  => __('Post Title.', 'redux-framework-demo'),
            'desc' => __('Display the post title that goes below the featured images.','redux-framework-demo'),
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => true,
            'hint' => array(
                'title'   => __('Post Title','redux-framework-demo'),
                'content' => __('Post Title','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'author_info',
            'type' => 'switch',
            'title' => __('Author Info Box','redux-framework-demo'),
            'subtitle'  => __('Author Info Box.', 'redux-framework-demo'),
            'desc' => __('Display the author info box below posts.','redux-framework-demo'),
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => true,
            'hint' => array(
                'title'   => __('Author Info Box','redux-framework-demo'),
                'content' => __('Author Info Box','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'social_sharing_box',
            'type' => 'switch',
            'title' => __('Social Sharing Box','redux-framework-demo'),
            'subtitle'  => __('Social Sharing Box.', 'redux-framework-demo'),
            'desc' => __('Display the social sharing box.','redux-framework-demo'),
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => true,
            'hint' => array(
                'title'   => __('Social Sharing Box','redux-framework-demo'),
                'content' => __('Social Sharing Box','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'related_posts',
            'type' => 'switch',
            'title' => __('Related Posts','redux-framework-demo'),
            'subtitle'  => __('Related Posts.', 'redux-framework-demo'),
            'desc' => __('Display related posts.','redux-framework-demo'),
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => true,
            'hint' => array(
                'title'   => __('Related Posts','redux-framework-demo'),
                'content' => __('Related Posts','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'blog_comments',
            'type' => 'switch',
            'title' => __('Comments','redux-framework-demo'),
            'subtitle'  => __('Comments.', 'redux-framework-demo'),
            'desc' => __('Display comments.','redux-framework-demo'),
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => true,
            'hint' => array(
                'title'   => __('Comments','redux-framework-demo'),
                'content' => __('Comments','redux-framework-demo'),
            )
        )
    )
);
////////////////////////////////////////////////////////////////////////////////////////////
$this->sections[] = array(
    'icon'      => 'el-icon-inbox-box',
    'title'     => __('Blog Meta Options', 'redux-framework-demo'),
    'subsection' => true,
    'fields'    => array(
        array (
            'id' => 'post_meta',
            'type' => 'switch',
            'title' => __('Post Meta','redux-framework-demo'),
            'subtitle'  => __('Post Meta.', 'redux-framework-demo'),
            'desc' => __('Display post meta on blog posts.','redux-framework-demo'),
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => true,
            'hint' => array(
                'title'   => __('Post Meta','redux-framework-demo'),
                'content' => __('Post Meta','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'post_meta_author',
            'type' => 'switch',
            'title' => __('Disable Post Meta Author','redux-framework-demo'),
            'subtitle'  => __('Disable Post Meta Author.', 'redux-framework-demo'),
            'desc' => __('Hide the author name from post meta.','redux-framework-demo'),
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => false,
            'hint' => array(
                'title'   => __('Disable Post Meta Author','redux-framework-demo'),
                'content' => __('Disable Post Meta Author','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'post_meta_date',
            'type' => 'switch',
            'title' => __('Disable Post Meta Date','redux-framework-demo'),
            'subtitle'  => __('Disable Post Meta Date.', 'redux-framework-demo'),
            'desc' => __('Hide the date from post meta.','redux-framework-demo'),
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => false,
            'hint' => array(
                'title'   => __('Disable Post Meta Date','redux-framework-demo'),
                'content' => __('Disable Post Meta Date','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'post_meta_cats',
            'type' => 'switch',
            'title' => __('Disable Post Meta Categories','redux-framework-demo'),
            'subtitle'  => __('Disable Post Meta Categories.', 'redux-framework-demo'),
            'desc' => __('Hide the categories from post meta.','redux-framework-demo'),
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => false,
            'hint' => array(
                'title'   => __('Disable Post Meta Categories','redux-framework-demo'),
                'content' => __('Disable Post Meta Categories','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'post_meta_comments',
            'type' => 'switch',
            'title' => __('Disable Post Meta Comments','redux-framework-demo'),
            'subtitle'  => __('Disable Post Meta Comments.', 'redux-framework-demo'),
            'desc' => __('Hide the comments from post meta.','redux-framework-demo'),
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => false,
            'hint' => array(
                'title'   => __('Disable Post Meta Comments','redux-framework-demo'),
                'content' => __('Disable Post Meta Comments','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'post_meta_read',
            'type' => 'switch',
            'title' => __('Disable Post Meta Read More Link','redux-framework-demo'),
            'subtitle'  => __('Disable Post Meta Read More Link.', 'redux-framework-demo'),
            'desc' => __('Hide the read more link from post meta.','redux-framework-demo'),
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => false,
            'hint' => array(
                'title'   => __('Disable Post Meta Read More Link','redux-framework-demo'),
                'content' => __('Disable Post Meta Read More Link','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'post_meta_tags',
            'type' => 'switch',
            'title' => __('Disable Post Meta Tags','redux-framework-demo'),
            'subtitle'  => __('Disable Post Meta Tags.', 'redux-framework-demo'),
            'desc' => __('Hide the tags from post meta.','redux-framework-demo'),
            'on' => __('YES', 'redux-framework-demo'),
            'off' => __('NO ', 'redux-framework-demo'),
            'default' => false,
            'hint' => array(
                'title'   => __('Disable Post Meta Tags','redux-framework-demo'),
                'content' => __('Disable Post Meta Tags','redux-framework-demo'),
            )
        ),
        array (
            'id' => 'date_format',
            'type' => 'text',
            'title' => __('Date Format','redux-framework-demo'),
            'subtitle'  => __('Date Format.', 'redux-framework-demo'),
            'desc' => __('<a href=\'http://codex.wordpress.org/Formatting_Date_and_Time\'>Formatting Date and Time</a>','redux-framework-demo'),
            'default' => 'F jS, Y',
            'hint' => array(
                'title'   => __('Date Format','redux-framework-demo'),
                'content' => __('Date Format','redux-framework-demo'),
            )
        )                )
);

?>