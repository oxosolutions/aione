<?php global $theme_options;?>
<?php if($theme_options['header_show_logo']): ?>
    <div class="logo" data-margin-right="<?php echo $theme_options['margin_logo_right']; ?>" data-margin-left="<?php echo $theme_options['margin_logo_left']; ?>" data-margin-top="<?php echo $theme_options['margin_logo_top']; ?>" data-margin-bottom="<?php echo $theme_options['margin_logo_bottom']; ?>" style="margin-right:<?php echo $theme_options['margin_logo_right']; ?>;margin-top:<?php echo $theme_options['margin_logo_top']; ?>;margin-left:<?php echo $theme_options['margin_logo_left']; ?>;margin-bottom:<?php echo $theme_options['margin_logo_bottom']; ?>;">
        <a href="<?php bloginfo('url'); ?>">
            <img src="<?php echo $theme_options['logo']['url']; ?>" alt="<?php bloginfo('name'); ?>" class="normal_logo" />
            <?php if($theme_options['logo_retina'] && $theme_options['retina_logo_width'] && $theme_options['retina_logo_height']): ?>
                <?php
                $pixels ="";
                if(is_numeric($theme_options['retina_logo_width']) && is_numeric($theme_options['retina_logo_height'])):
                    $pixels ="px";
                endif; ?>
                <img src="<?php echo $theme_options["logo_retina"]['url']; ?>" alt="<?php bloginfo('name'); ?>" style="width:<?php echo $theme_options["retina_logo_width"].$pixels; ?>;max-height:<?php echo $theme_options["retina_logo_height"].$pixels; ?>; height: auto !important" class="retina_logo" />
            <?php endif; ?>
        </a>
    </div>
<?php endif; ?>
<?php if($theme_options['header_show_site_title'] || $theme_options['header_show_tagline'] ): ?>
    <div id="logo_text">
        <?php if($theme_options['header_show_site_title']){
            $site_title = get_bloginfo( 'name' );
            if(!empty($site_title)):?>
                <div id="site_title"><a id="site_name" href="<?php echo home_url( '/' ); ?>"><?php bloginfo('name'); ?></a></div>
            <?php endif; }?>
        <?php if($theme_options['header_show_tagline']){
            $site_desc = get_bloginfo( 'description' );
            if(!empty($site_desc)):?>
                <div id="site_description"><?php bloginfo( 'description' ); ?></div>
            <?php endif; }?>
    </div>
<?php endif; ?>