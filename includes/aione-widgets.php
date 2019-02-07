<?php

/**
* Register Aione Widgets
*/

add_action('widgets_init', function () {

	register_widget('Aione_DesignBy_Widget');
	register_widget('Aione_Copyright_Widget');
	register_widget('Aione_Fontsize_Widget');

});


class Aione_DesignBy_Widget extends WP_Widget
{
	public function __construct()
	{
		$widget_options = array(
			'classname' => 'aione_designedby_widget',
			'description' => '',
		);
		parent::__construct('aione_designedby_widget', 'Aione Designed by', $widget_options);
	}

	public function widget( $args, $instance )
	{
		echo $args['before_widget'];

		$aione_company_name = $instance['company_name'];
		$aione_company_website = $instance['company_website'];
		$aione_tooltip = $instance['tooltip'];
		$aione_tooltip_class = !empty( $instance['tooltip'] ) ? 'aione-tooltip' : '';

		$html = '<p>Designed by <a class="' . $aione_tooltip_class . '" title="' . $aione_tooltip . '" href="' . $aione_company_website . '" target="_blank" rel="noopener">' . $aione_company_name . '</a></p>';

		echo $html;
		echo $args['after_widget'];
	}

	public function form( $instance )
	{
		$company_name = !empty( $instance['company_name'] ) ? $instance['company_name'] : '';
		$company_website = !empty( $instance['company_website'] ) ? $instance['company_website'] : '';
		$tooltip = !empty( $instance['tooltip'] ) ? $instance['tooltip'] : '';
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('company_name') ); ?>">
				<?php esc_attr_e( 'Company Name', 'aione' ); ?>
			</label>

			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('company_name') ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'company_name' ) ); ?>"
			type="text" value="<?php echo esc_attr( $company_name ); ?>">

		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'company_website' ) ); ?>">
				<?php esc_attr_e( 'Company Website', 'aione' );?>
			</label>

			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'company_website' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'company_website' ) ); ?>"
			type="text" value="<?php echo esc_attr( $company_website ); ?>">

		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('tooltip') ); ?>">
				<?php esc_attr_e( 'Tooltip', 'aione' );?>
			</label>

			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('tooltip') ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'tooltip' ) ); ?>"
			type="text" value="<?php echo esc_attr( $tooltip ); ?>">

		</p>
		<?php

	}

	public function update( $new_instance, $old_instance )
	{
		$instance = $old_instance;
		$instance['company_name'] = $new_instance['company_name'];
		$instance['company_website'] = $new_instance['company_website'];
		$instance['tooltip'] = $new_instance['tooltip'];
		return $instance;
	}
}




class Aione_Copyright_Widget extends WP_Widget
{
	public function __construct()
	{
		$widget_options = array(
			'classname' => 'aione_copyright_widget',
			'description' => '',
		);
		parent::__construct( 'aione_copyright_widget', 'Aione Copyright', $widget_options );
	}

	public function widget( $args, $instance )
	{
		echo $args['before_widget'];

		do_shortcode( '[aione-copyright]' );

		echo $args['after_widget'];
	}

	public function form( $instance )
	{

	}

	public function update( $new_instance, $old_instance )
	{

	}
}

add_shortcode( 'aione-copyright', 'aione_copyright_callback' );
function aione_copyright_callback()
{
	$html = '<p>©' . do_shortcode('[date format="Y"]') . ' <a href="' . do_shortcode('[url]') . '">' . do_shortcode('[info]') . '</a>. All rights reserved.</p>';
	echo $html;
}







/**
 * Aione Fontsize Widget
 *
 */
class Aione_Fontsize_Widget extends WP_Widget
{
	public function __construct()
	{
		$widget_options = array(
			'classname' => 'aione_fontsize_widget',
			'description' => 'Display screen font size controller',
		);
		parent::__construct( 'aione_fontsize_widget', 'Aione Font size', $widget_options );
	}

	public function widget( $args, $instance )
	{
		echo $args['before_widget'];

		do_shortcode('[aione-fontsize]');

		echo $args['after_widget'];
	}

	public function form( $instance )
	{

	}

	public function update( $new_instance, $old_instance )
	{

	}
}

add_shortcode('aione-fontsize', 'aione_fontsize_callback');
function aione_fontsize_callback()
{
	$html = "";
	$html .= '<ul class="aione-fontsize">';
	$html .= '<li class="aione-fontsize-decrease"><a href="#">A</a></li>';
	$html .= '<li class="aione-fontsize-reset"><a href="#">A</a></li>';
	$html .= '<li class="aione-fontsize-increase"><a href="#">A</a></li>';
	$html .= '</ul>';

	echo $html;
}
