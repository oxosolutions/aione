<?php
/*********************************************************************************************
 *
 *  Layout settings
 *
 *********************************************************************************************/

$this->sections[] = array(
    'title' => 'Layout Options',
    'icon'      => 'el-icon-tint',
    'fields' => array (
        array (
            'desc' => 'Select boxed or wide layout.',
            'id' => 'layout',
            'type' => 'select',
            'options' => array (
                'Boxed' => 'Boxed',
                'Wide' => 'Wide',
            ),
            'title' => 'Layout',
            'default' => 'Wide',
        ),
        array (
            'desc' => '(in pixels ex: 20px)',
            'id' => 'main_top_padding',
            'type' => 'text',
            'title' => 'Page Content Top Padding',
            'default' => '55px',
        ),
        array (
            'desc' => '(in pixels ex: 20px)',
            'id' => 'main_bottom_padding',
            'type' => 'text',
            'title' => 'Page Content Bottom Padding',
            'default' => '40px',
        ),
        array (
            'desc' => 'Select the left and right padding for the 100% width template main content area. Enter value in px. ex: 20px',
            'id' => 'hundredp_padding',
            'type' => 'text',
            'title' => '100% Width Template Left/Right Padding',
            'default' => '20px',
        ),
        array (
            'desc' => 'Check to disable the text shadow in the Sliding Bar.',
            'id' => 'slidingbar_text_shadow',
            'type' => 'checkbox',
            'title' => 'Disable Sliding Bar Text Shadow',
        ),
        array (
            'desc' => 'Check to disable the text shadow in the footer.',
            'id' => 'footer_text_shadow',
            'type' => 'checkbox',
            'title' => 'Disable Footer Text Shadow',
        ),
    )
);

$this->sections[] = array(
    'icon'      => 'el-icon-lines',
    'title'     => __('Sidebar', 'redux-framework-demo'),
    'subsection' => true,
    'desc'      => __('<p class="description">This is the Description. Again HTML is allowed</p>', 'redux-framework-demo'),
    'fields'    => array(

        array (
            'desc' => 'Enter a value (based on percentage) without % sign, ex: 71.',
            'id' => 'content_width',
            'type' => 'text',
            'title' => 'Content Area Width',
            'default' => '71.1702128',
        ),
        array (
            'desc' => 'Enter a value (based on percentage) without % sign, ex: 23.',
            'id' => 'sidebar_width',
            'type' => 'text',
            'title' => 'Sidebar Width',
            'default' => '23.4042553',
        ),
        array (
            'desc' => 'Enter a value (based on percentage) without % sign, ex: 0.',
            'id' => 'sidebar_padding',
            'type' => 'text',
            'title' => 'Sidebar Padding',
        ),
        array (
            'id' => 'sidebar_info',
            'icon' => true,
            'type' => 'info',
            'raw' => '<h3 style=\'margin-top:0;\'>Important Instructions For These Options:</h3><b>1.  100% </b>- Your values added up cannot go over 100% or your sidebar will not show.<br /></br />
    <b>2. PADDING </b>-  Is always multiplied by 2 because it adds left and right padding. So a padding value of 5, actually equals 10.  And you should only use padding if you are using a background color that is different than your main background color.<br /></br />

    <b>3.  UNSEEN SPACE</b> - You need to factor in the space between the Content Width & Sidebar Width. This space does not have a field.<br /></br />

    <b>EXAMPLE 1:</b> Content Width = 65 + Sidebar Width = 30  + Padding = 0
    * this example adds up to 95% which leaves you 5% in between the content and sidebar sections. This is good to use if your sidebar background is the same color as your main background<br /></br />

    <b>EXAMPLE 2:</b> Content Width = 60 + Sidebar Width = 30  + Padding = 2.5
    * this example adds up to 95% which leaves you 5% in between the content and sidebar sections. This is good to use if your sidebar background is a different color than your main background',
        ),

    )

);

?>