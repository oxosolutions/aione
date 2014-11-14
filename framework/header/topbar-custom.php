<?php
global $theme_options;
if($theme_options['topbar_custom']):
    echo '<div id="topbar-custom" class="topbar-item">'.do_shortcode($theme_options['topbar_custom']).'</div>';
endif; ?>
