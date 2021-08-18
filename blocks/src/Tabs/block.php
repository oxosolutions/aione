<?php

/**
 * Enqueue frontend script for content toggle block
 *
 * @return void
 */

function ub_render_tab_block($attributes, $contents){
    extract($attributes);
    return '<div role="tabpanel" class="wp-block-aione-tabs-content-tab-content-wrap '.
        ($isActive ? 'active' : '') . (isset($className) ? ' ' . esc_attr($className) : '') . '"
        id="aione-tabs-content-' . $parentID . '-panel-' . $index . '" aria-labelledby="aione-tabs-content-' . $parentID . '-tab-' . $index . '">'
        . $contents . '</div>';
}

if ( !class_exists( 'simple_html_dom_node' ) ) {
    require dirname( dirname( __DIR__ ) ) . '/src/Tabs/simple_html_dom.php';
}

function ub_register_tab_block(){
    if(function_exists('register_block_type')){
        require dirname(dirname(__DIR__)) . '/src/Tabs/defaults.php';
        register_block_type('aione-blocks/aione-tab-block', array(
            'attributes' => $defaultValues['aione-blocks/aione-tab-block']['attributes'],
            'render_callback' =>  'ub_render_tab_block'));
    }
}

function ub_render_tabbed_content_block($attributes, $contents){
    extract($attributes);
    $blockName = 'wp-block-aione-tabs-content';

    $tabs = '';

    $contents = str_get_html('<div id="tabarray">' . $contents . '</div>', $lowercase=true, $forceTagsClosed=true, $target_charset = DEFAULT_TARGET_CHARSET, $stripRN=false)
                    ->find('#tabarray > .wp-block-aione-tabs-content-tab-content-wrap');

    $tabContents = [];

    foreach ($contents as $key => $content) {
        if($useAnchors){
            if($tabsAnchor[$key] !== ''){
                $content->{'data-tab-anchor'} = $tabsAnchor[$key];
            }
        }
        $tabContent = $content->outertext;
        array_push($tabContents, $content->outertext);
        
    }
   

    foreach($tabsTitle as $key=>$title){
        $tabs .= '<div role="tab" id="aione-tabs-content-' . $blockID . '-tab-' . $key . '" data-target="#aione-tabs-content-' . $blockID . '-panel-' . $key . '"  aria-controls="aione-tabs-content-' . $blockID . '-panel-' . $key . '" aria-selected="' . json_encode($activeTab === $key) . '" class = "'.$blockName.'-tab-title-wrap '.($activeTab === $key ? ' active' : '').'" tabindex="0">
            <div class="' . $blockName . '-tab-title ">' . $title . '</div></div>';
    }

    return '<div class='.$blockName.'  data-tab-active='.$activeTab.' >
                <div class="'.$blockName.'-holder aione-tabs '.$direction.' '.$alignment.' '.$layout.' '.$theme.' '.($margin ? ' margin' : '').'  '.($hover ? ' hover' : '').'">
                    <div class="'.$blockName.'-tabs-title nav">' .$tabs . '</div>
                    <div class="'.$blockName.'-tabs-content content">' .implode($tabContents) . '</div>
            </div>
            </div>';    
}

function ub_register_tabbed_content_block(){
    if(function_exists('register_block_type')){
        require dirname(dirname(__DIR__)) . '/src/Tabs/defaults.php';
        register_block_type('aione-blocks/aione-tabs-block', array(
            'attributes' => $defaultValues['aione-blocks/aione-tabs-block']['attributes'],
            'render_callback' =>  'ub_render_tabbed_content_block'));
    }
}

add_action('init', 'ub_register_tabbed_content_block');
add_action('init', 'ub_register_tab_block');