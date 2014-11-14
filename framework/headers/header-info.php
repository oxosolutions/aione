<?php global $theme_options; ?>
<?php if($theme_options['header_number'] || $theme_options['header_email']): ?>
<div class="header-info"><?php echo $theme_options['header_number']; ?><?php if($theme_options['header_number'] && $theme_options['header_email']): ?><span class="sep">|</span><?php endif; ?><a href="mailto:<?php echo $theme_options['header_email']; ?>"><?php echo $theme_options['header_email']; ?></a></div>
<?php endif; ?>
