<?php if ( is_active_sidebar( 'aione-topbar-left' ) || is_active_sidebar( 'aione-topbar-rights' ) ) : ?>
<div id="aione_topbar" class="aione-topbar">
	<div class="row-wrapper">
		<div class="ar">
			<div class="ac l50 m50 s100 left-content">
				<?php if ( is_active_sidebar( 'aione-topbar-left' ) ) : ?>	
					<?php dynamic_sidebar( 'aione-topbar-left' ); ?>	
				<?php endif; ?>
			</div>
			<div class="ac l50 m50 s100 right-content">
				<?php if ( is_active_sidebar( 'aione-topbar-right' ) ) : ?>
					<?php dynamic_sidebar( 'aione-topbar-right' ); ?>	
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>