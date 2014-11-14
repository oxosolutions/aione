<?php global $theme_options;?>
<?php if($theme_options['header_show_top_bar']): ?>
	<div id="topbar" class="header-social">
		<div class="aione-row">
			<div class="alignleft">
				<?php
                //if(is_array($theme_options['topbar_left_content']) || $theme_options['topbar_left_content'] instanceof Traversable):
                    foreach($theme_options['topbar_left_content'] as $key=>$value){
                        if($value){
                            get_template_part("framework/header/topbar-$key");
                        }
                    }
                //endif;
                ?>
			</div>
			<div class="alignright">
				<?php
                if(is_array($theme_options['topbar_right_content']) || $theme_options['topbar_right_content'] instanceof Traversable):
                    foreach($theme_options['topbar_right_content'] as $key=>$value){
                        if($value){
                            get_template_part("framework/header/topbar-$key");
                        }
                    }
                endif;
                ?>
			</div>
		</div>
	</div>
<?php endif; ?>