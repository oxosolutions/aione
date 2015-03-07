<?php
global $theme_options;
if($theme_options['topbar_custom_right']):
    echo '<div id="topbar-custom-right" class="topbar-item">'.do_shortcode($theme_options['topbar_custom_right']).'</div>';
endif; ?>
