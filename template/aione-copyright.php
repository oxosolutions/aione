<div id="aione_copyright" class="aione-copyright">
	<div class="ar">
		<?php if ( is_active_sidebar( 'aione-copyright-left' ) ) : ?>
			<div class="ac l50">
				<?php dynamic_sidebar( 'aione-copyright-left' ); ?>
			</div>			
		<?php endif; ?>
		<?php if ( is_active_sidebar( 'aione-copyright-right' ) ) : ?>
			<div class="ac l50">
				<?php dynamic_sidebar( 'aione-copyright-right' ); ?>
			</div>			
		<?php endif; ?>
	</div><!-- .aione-row -->
</div>