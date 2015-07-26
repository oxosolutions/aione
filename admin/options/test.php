<?php
/*********************************************************************************************
 *
 *  Header settings
 *
 *********************************************************************************************/

$this->sections[] = array(
    'icon'      => 'el-icon-cogs',
    'title'     => __('Header Settings', 'redux-framework-demo'),
    'fields'    => array(
        array (
            'id' => 'header_show_sliding_bar',
            'type' => 'text',
            'title' =>  __('Show Sliding Bar', 'redux-framework-demo'),
        ),
        array (
            'id' => 'header_tagline',
            'type' => 'text',
            'title' => __('Header Tagline','redux-framework-demo'),
        ),
        array (
            'id' => 'margin_header_top',
            'type' => 'text',
            'title' => __('Header Top Padding','redux-framework-demo'),
        ),
        array (
            'id' => 'margin_header_bottom',
            'type' => 'text',
            'title' => __('Header Bottom Padding','redux-framework-demo'),
        )
    )
);
/*********************************************************************************************/
$this->sections[] = array(
    'icon'      => 'el-icon-credit-card',
    'title'     => __('Topbar', 'redux-framework-demo'),
    'subsection' => true,
    'fields'    => array(
        array (
            'id' => 'topbar_number',
            'type' => 'text',
            'title' => __('Topbar Phone Number','redux-framework-demo'),
        ),
        array (
            'id' => 'topbar_email',
            'type' => 'text',
            'title' => __('Topbar Email Address','redux-framework-demo'),
        ),
        array (
            'id' => 'topbar_custom_left',
            'type' => 'text',
            'title' => __('Topbar Custom Text Left','redux-framework-demo'),
        ),
        array (
            'id' => 'topbar_custom_right',
            'type' => 'text',
            'title' => __('Topbar Custom Text Right','redux-framework-demo'),
        ),

    )
);

/*********************************************************************************************/
$this->sections[] = array(
    'icon'      => 'el-icon-star',
    'title'     => __('Logo', 'redux-framework-demo'),
    'subsection' => true,
    'fields'    => array(
        array (
            'id' => 'margin_logo_left',
            'type' => 'text',
            'title' => __('Logo Left Margin','redux-framework-demo'),
        ),
        array (
            'id' => 'margin_logo_right',
            'type' => 'text',
            'title' => __('Logo Right Margin','redux-framework-demo'),
        ),
        array (
            'id' => 'margin_logo_top',
            'type' => 'text',
            'title' => __('Logo Top Margin','redux-framework-demo'),
        ),
        array (
            'id' => 'margin_logo_bottom',
            'type' => 'text',
            'title' => __('Logo Bottom Margin','redux-framework-demo'),

        ),
    )
);
/*********************************************************************************************/
$this->sections[] = array(
    'icon'      => 'el-icon-hand-up',
    'title'     => __('Main Menu', 'redux-framework-demo'),
    'desc' => __('Default value is <strong>YES</strong>.', 'redux-framework-demo'),
    'subsection' => true,
    'fields'    => array(
        array (
            'id' => 'topmenu_dropwdown_width',
            'type' => 'text',
            'title' => __('Top Menu Dropdown Width','redux-framework-demo' ),
        ),
        array (
            'id' => 'megamenu_title_size',
            'type' => 'text',
            'title' => __('Mega Menu Column Title Size','redux-framework-demo'),
        )

    )
);
?>