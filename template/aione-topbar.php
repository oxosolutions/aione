<?php if ( is_active_sidebar( 'aione-topbar-left' ) || is_active_sidebar( 'aione-topbar-rights' ) ) : ?>
<div id="aione_topbar" class="aione-topbar">
	<div class="row-wrapper">
		<div class="ar">
			<div class="ac l50 m50 s100 left-content">
				<div id="" class="aione-topbar-item">
					<?php if ( is_active_sidebar( 'aione-topbar-left' ) ) : ?>
						<ul id="topbar-left">
							<?php dynamic_sidebar( 'aione-topbar-left' ); ?>
						</ul>
					<?php endif; ?>
				</div>
			</div>
			<div class="ac l50 m50 s100 right-content">
				<div id="" class="aione-topbar-item" >
					<?php if ( is_active_sidebar( 'aione-topbar-right' ) ) : ?>
						<ul id="topbar-right">
							<?php dynamic_sidebar( 'aione-topbar-right' ); ?>
						</ul>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>