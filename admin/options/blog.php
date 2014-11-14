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
            'desc' => 'This text will display in the page title bar of the assigned blog page.',
            'id' => 'blog_title',
            'type' => 'text',
            'title' => 'Blog Page Title',
            'default' => 'Blog',
        ),
        array (
            'desc' => 'This text will display as subheading in the page title bar of the assigned blog page.',
            'id' => 'blog_subtitle',
            'type' => 'text',
            'title' => 'Blog Page Subtitle',
        ),
        array (
            'desc' => 'Select the layout for the assigned blog page in settings > reading.',
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
            'title' => 'Blog Layout',
            'default' => 'Large',
        ),
        array (
            'desc' => 'Select the sidebar position for the blog pages.',
            'id' => 'blog_sidebar_position',
            'type' => 'select',
            'options' => array (
                'Right' => 'Right',
                'Left' => 'Left',
            ),
            'title' => 'Blog Sidebar Position',
            'default' => 'Right',
        ),
        array (
            'desc' => 'Select the layout for the blog archive/category pages.',
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
            'title' => 'Blog Archive/Category Layout',
            'default' => 'Large',
        ),
        array (
            'desc' => 'Select the sidebar that will display on the archive/category pages.',
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
            'title' => 'Blog Archive/Author/Category Sidebar',
            'default' => 'None',
        ),
        array (
            'desc' => 'Select the pagination type for the assigned blog page in settings > reading.',
            'id' => 'blog_pagination_type',
            'type' => 'select',
            'options' => array (
                'Pagination' => 'Pagination',
                'Infinite Scroll' => 'Infinite Scroll',
            ),
            'title' => 'Pagination Type',
            'default' => 'pagination',
        ),
        array (
            'desc' => 'Select whether to display the grid layout in 2, 3 or 4 columns.',
            'id' => 'blog_grid_columns',
            'type' => 'select',
            'options' => array (
                2 => '2',
                3 => '3',
                4 => '4',
            ),
            'title' => 'Grid Layout # of Columns',
            'default' => '3',
        ),
        array (
            'desc' => 'Choose to display an excerpt or full content on blog pages.',
            'id' => 'content_length',
            'type' => 'select',
            'options' => array (
                'Excerpt' => 'Excerpt',
                'Full Content' => 'Full Content',
            ),
            'title' => 'Excerpt or Full Blog Content',
            'default' => 'Excerpt',
        ),
        array (
            'desc' => 'Insert the number of words you want to show in the post excerpts.',
            'id' => 'excerpt_length_blog',
            'type' => 'text',
            'title' => 'Excerpt Length',
            'default' => '55',
        ),
        array (
            'desc' => 'Check the box if you want to strip HTML from the excerpt content only.',
            'id' => 'strip_html_excerpt',
            'type' => 'checkbox',
            'title' => 'Strip HTML from Excerpt',
            'default' => 1,
        ),
        array (
            'desc' => 'Check the box to turn the blog into full width with no sidebar.',
            'id' => 'blog_full_width',
            'type' => 'checkbox',
            'title' => 'Full Width',
        ),
        array (
            'desc' => 'Check the box to turn all single post items to full width with no sidebar.',
            'id' => 'single_post_full_width',
            'type' => 'checkbox',
            'title' => 'Set All Post Items Full Width',
        ),
        array (
            'desc' => 'Check the box to display featured images on blog archive page.',
            'id' => 'featured_images',
            'type' => 'checkbox',
            'title' => 'Featured Image On Blog Archive Page',
            'default' => 1,
        ),
        array (
            'desc' => '<a href=\'http://codex.wordpress.org/Formatting_Date_and_Time\'>Formatting Date and Time</a>',
            'id' => 'alternate_date_format_month_year',
            'type' => 'text',
            'title' => 'Blog Alternate Date Format - Month and Year',
            'default' => 'm, Y',
        ),
        array (
            'desc' => '<a href=\'http://codex.wordpress.org/Formatting_Date_and_Time\'>Formatting Date and Time</a>',
            'id' => 'alternate_date_format_day',
            'type' => 'text',
            'title' => 'Blog Alternate Date Format - Day',
            'default' => 'j',
        ),
        array (
            'desc' => '<a href=\'http://codex.wordpress.org/Formatting_Date_and_Time\'>Formatting Date</a>',
            'id' => 'timeline_date_format',
            'type' => 'text',
            'title' => 'Blog Timeline Date Format - Timeline Labels',
            'default' => 'F Y',
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
            'desc' => 'Check the box to display featured images and videos on single post pages.',
            'id' => 'featured_images_single',
            'type' => 'checkbox',
            'title' => 'Featured Image / Video on Single Post Page',
            'default' => 1,
        ),
        array (
            'desc' => 'Check the box to disable previous/next pagination.',
            'id' => 'blog_pn_nav',
            'type' => 'checkbox',
            'title' => 'Disable Previous/Next Pagination',
        ),
        array (
            'desc' => 'Check the box to display the post title that goes below the featured images.',
            'id' => 'blog_post_title',
            'type' => 'checkbox',
            'title' => 'Post Title',
            'default' => 1,
        ),
        array (
            'desc' => 'Check the box to display the author info box below posts.',
            'id' => 'author_info',
            'type' => 'checkbox',
            'title' => 'Author Info Box',
            'default' => 1,
        ),
        array (
            'desc' => 'Check the box to display the social sharing box.',
            'id' => 'social_sharing_box',
            'type' => 'checkbox',
            'title' => 'Social Sharing Box',
            'default' => 1,
        ),
        array (
            'desc' => 'Check the box to display related posts.',
            'id' => 'related_posts',
            'type' => 'checkbox',
            'title' => 'Related Posts',
            'default' => 1,
        ),
        array (
            'desc' => 'Check the box to display comments.',
            'id' => 'blog_comments',
            'type' => 'checkbox',
            'title' => 'Comments',
            'default' => 1,
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
            'desc' => 'Check the box to display post meta on blog posts.',
            'id' => 'post_meta',
            'type' => 'checkbox',
            'title' => 'Post Meta',
            'default' => 1,
        ),
        array (
            'desc' => 'Check the box to hide the author name from post meta.',
            'id' => 'post_meta_author',
            'type' => 'checkbox',
            'title' => 'Disable Post Meta Author',
        ),
        array (
            'desc' => 'Check the box to hide the date from post meta.',
            'id' => 'post_meta_date',
            'type' => 'checkbox',
            'title' => 'Disable Post Meta Date',
        ),
        array (
            'desc' => 'Check the box to hide the categories from post meta.',
            'id' => 'post_meta_cats',
            'type' => 'checkbox',
            'title' => 'Disable Post Meta Categories',
        ),
        array (
            'desc' => 'Check the box to hide the comments from post meta.',
            'id' => 'post_meta_comments',
            'type' => 'checkbox',
            'title' => 'Disable Post Meta Comments',
        ),
        array (
            'desc' => 'Check the box to hide the read more link from post meta.',
            'id' => 'post_meta_read',
            'type' => 'checkbox',
            'title' => 'Disable Post Meta Read More Link',
        ),
        array (
            'desc' => 'Check the box to hide the tags from post meta.',
            'id' => 'post_meta_tags',
            'type' => 'checkbox',
            'title' => 'Disable Post Meta Tags',
            'default' => 1,
        ),
        array (
            'desc' => '<a href=\'http://codex.wordpress.org/Formatting_Date_and_Time\'>Formatting Date and Time</a>',
            'id' => 'date_format',
            'type' => 'text',
            'title' => 'Date Format',
            'default' => 'F jS, Y',
        )                )
);

?>