<?php
add_action('widgets_init', 'contact_info_load_widgets');

function contact_info_load_widgets()
{
	register_widget('Contact_Info_Widget');
}

class Contact_Info_Widget extends WP_Widget {

	function Contact_Info_Widget()
	{
		$widget_ops = array('classname' => 'contact_info', 'description' => '');

		$control_ops = array('id_base' => 'contact_info-widget');

		$this->WP_Widget('contact_info-widget', 'Aione: Contact Info', $widget_ops, $control_ops);
	}

	function widget($args, $instance)
	{
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);

		echo $before_widget;

		if($title) {
			echo $before_title.$title.$after_title;
		}
		?>
		<div class="contact-info-container">
		<?php if(isset($instance['address']) && $instance['address']): ?>
		<p class="address"><?php echo $instance['address']; ?></p>
		<?php endif; ?>

		<?php if(isset($instance['phone']) && $instance['phone']): ?>
		<p class="phone"><?php _e('Phone:', 'Aione'); ?> <?php echo $instance['phone']; ?></p>
		<?php endif; ?>

		<?php if(isset($instance['mobile']) && $instance['mobile']): ?>
		<p class="mobile"><?php _e('Mobile:', 'Aione'); ?> <?php echo $instance['mobile']; ?></p>
		<?php endif; ?>

		<?php if(isset($instance['fax']) && $instance['fax']): ?>
		<p class="fax"><?php _e('Fax:', 'Aione'); ?> <?php echo $instance['fax']; ?></p>
		<?php endif; ?>

		<?php if(isset($instance['email']) && $instance['email']): ?>
		<p class="email"><?php _e('Email:', 'Aione'); ?> <a href="mailto:<?php echo $instance['email']; ?>"><?php if($instance['emailtxt']) { echo $instance['emailtxt']; } else { echo $instance['email']; } ?></a></p>
		<?php endif; ?>

		<?php if(isset($instance['web']) && $instance['web']): ?>
		<p class="web"><?php _e('Web:', 'Aione'); ?> <a href="<?php echo $instance['web']; ?>"><?php if(isset($instance['webtxt']) && $instance['webtxt']) { echo $instance['webtxt']; } else { echo $instance['web']; } ?></a></p>
		<?php endif; ?>
		</div>
		<?php
		echo $after_widget;
	}

	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = $new_instance['title'];
		$instance['address'] = $new_instance['address'];
		$instance['phone'] = $new_instance['phone'];
		$instance['mobile'] = $new_instance['mobile'];
		$instance['fax'] = $new_instance['fax'];
		$instance['email'] = $new_instance['email'];
		$instance['emailtxt'] = $new_instance['emailtxt'];
		$instance['web'] = $new_instance['web'];
		$instance['webtxt'] = $new_instance['webtxt'];

		return $instance;
	}

	function form($instance)
	{
		$defaults = array('title' => 'Contact Info', 'address' => '', 'phone' => '', 'mobile' => '', 'fax' => '', 'email' => '', 'emailtxt' => '', 'web' => '', 'webtxt' => '');
		$instance = wp_parse_args((array) $instance, $defaults); ?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('address'); ?>">Address:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('address'); ?>" name="<?php echo $this->get_field_name('address'); ?>" value="<?php echo $instance['address']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('phone'); ?>">Phone:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('phone'); ?>" name="<?php echo $this->get_field_name('phone'); ?>" value="<?php echo $instance['phone']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('mobile'); ?>">Mobile:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('mobile'); ?>" name="<?php echo $this->get_field_name('mobile'); ?>" value="<?php echo $instance['mobile']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('fax'); ?>">Fax:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('fax'); ?>" name="<?php echo $this->get_field_name('fax'); ?>" value="<?php echo $instance['fax']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('email'); ?>">Email:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name('email'); ?>" value="<?php echo $instance['email']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('emailtxt'); ?>">Email Link Text:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('emailtxt'); ?>" name="<?php echo $this->get_field_name('emailtxt'); ?>" value="<?php echo $instance['emailtxt']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('web'); ?>">Website URL (with HTTP):</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('web'); ?>" name="<?php echo $this->get_field_name('web'); ?>" value="<?php echo $instance['web']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('webtxt'); ?>">Website URL Text:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('webtxt'); ?>" name="<?php echo $this->get_field_name('webtxt'); ?>" value="<?php echo $instance['webtxt']; ?>" />
		</p>
	<?php
	}
}
?>