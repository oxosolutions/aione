<?php global $theme_options, $woocommerce, $main_menu; ?>
<?php if(!$theme_options['ubermenu']): ?>
<ul class="navigation menu aione-navbar-nav">
<?php endif; ?>
	<?php
	if(!$theme_options['ubermenu']) {
		echo $main_menu;
	} else {
		if( function_exists( 'uberMenu_direct' ) ) {
			uberMenu_direct( 'main_navigation' );
		}
	}
	?>
	<?php if(class_exists('Woocommerce') && !$theme_options['ubermenu']): ?>
	<?php if($theme_options['woocommerce_acc_link_main_nav']): ?>
	<li class="my-account">
		<a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>" class="my-account-link"><?php _e('My Account', 'Aione'); ?></a>
		<?php if(!is_user_logged_in()): ?>
		<div class="login-box">
			<?php if( isset($_GET['login']) && $_GET['login']=='failed'): ?>
				<p class="woo-login-error"><?php echo _e( 'Login failed, please try again','Aione' ); ?></p>
			<?php endif; ?>
			<form action="<?php echo wp_login_url(); ?>" name="loginform" method="post">
				<p>
					<input type="text" class="input-text" name="log" id="username" value="" placeholder="<?php echo __('Username', 'Aione'); ?>" />
				</p>
				<p>
					<input type="password" class="input-text" name="pwd" id="password" value="" placeholder="<?php echo __('Password', 'Aione'); ?>" />
				</p>
				<p class="forgetmenot">
					<label for="rememberme"><input name="rememberme" type="checkbox" id="rememberme" value="forever"> <?php _e('Remember Me', 'Aione'); ?></label>
				</p>
					<p class="submit">
					<input type="submit" name="wp-submit" id="wp-submit" class="button small default comment-submit" value="<?php _e('Log In', 'Aione'); ?>">
					<input type="hidden" name="redirect_to" value="<?php if(isset($_SERVER['HTTP_REFERER'])): echo $_SERVER['HTTP_REFERER']; endif; ?>">
					<input type="hidden" name="testcookie" value="1">
				</p>
				<div class="clear"></div>
			</form>
		</div>
		<?php else: ?>
		<ul class="sub-menu">
			<li><a href="<?php echo wp_logout_url( get_permalink( woocommerce_get_page_id( 'myaccount' ) ) ); ?>"><?php _e('Logout', 'Aione'); ?></a></li>
		</ul>
		<?php endif; ?>
	</li>
	<?php endif; ?>
	<?php if($theme_options['woocommerce_cart_link_main_nav']): ?>
	<li class="cart">
		<?php if(!$woocommerce->cart->cart_contents_count): ?>
		<a class="my-cart-link" href="<?php echo get_permalink(get_option('woocommerce_cart_page_id')); ?>"></a>
		<?php else: ?>
		<a class="my-cart-link my-cart-link-active" href="<?php echo get_permalink(get_option('woocommerce_cart_page_id')); ?>"></a>
		<div class="cart-contents">
			<?php foreach($woocommerce->cart->cart_contents as $cart_item): //var_dump($cart_item); ?>
			<div class="cart-content">
				<a href="<?php echo get_permalink($cart_item['product_id']); ?>">
				<?php $thumbnail_id = ($cart_item['variation_id']) ? $cart_item['variation_id'] : $cart_item['product_id']; ?>
				<?php echo get_the_post_thumbnail($thumbnail_id, 'recent-works-thumbnail'); ?>
				<div class="cart-desc">
					<span class="cart-title"><?php echo $cart_item['data']->post->post_title; ?></span>
					<span class="product-quantity"><?php echo $cart_item['quantity']; ?> x <?php echo $woocommerce->cart->get_product_subtotal($cart_item['data'], 1); ?></span>
				</div>
				</a>
			</div>
			<?php endforeach; ?>
			<div class="cart-checkout">
				<div class="cart-link"><a href="<?php echo get_permalink(get_option('woocommerce_cart_page_id')); ?>"><?php _e('View Cart', 'Aione'); ?></a></div>
				<div class="checkout-link"><a href="<?php echo get_permalink(get_option('woocommerce_checkout_page_id')); ?>"><?php _e('Checkout', 'Aione'); ?></a></div>
			</div>
		</div>
		<?php endif; ?>
	</li>
	<?php endif; ?>
	<?php endif; ?>
	<?php if($theme_options['main_nav_search_icon'] && !$theme_options['ubermenu']): ?>
	<li class="main-nav-search">
		<a id="main-nav-search-link" class="search-link"></a>
		<div id="main-nav-search-form" class="main-nav-search-form">
			<form role="search" id="searchform" method="get" action="<?php echo home_url( '/' ); ?>">
				<div class="search-table">
					<div class="search-field">
						<input type="text" value="" name="s" id="s" />
					</div>
					<div class="search-button">
						<input type="submit" id="searchsubmit" value="&#xf002;" />
					</div>
				</div>
			</form>
		</div>
	</li>
	<?php endif; ?>
<?php if(!$theme_options['ubermenu']): ?>
</ul>
<?php endif; ?>