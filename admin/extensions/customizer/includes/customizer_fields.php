<?php
/*
* Custom Code for switch customizer
*/

    function aione_customize_register($wp_customize){

        /*
        * Class for switch customizer
        */
        class Redux_customizer_switch extends WP_Customize_Control {

            public $type = 'switch';

            public $statuses;

            public function __construct( $manager, $id, $args = array() ) {

                $this->statuses = array( '' => __( 'Default' ) );
                parent::__construct( $manager, $id, $args );
            }

            public function render_content() {
                ?>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?>
                    <input type="checkbox"  style="float: right;margin-top:6px;" <?php $this->link(); ?> class="checkbox checkbox-input"  <?php if( $this->value()){ echo 'checked="checked"';}?> value="<?php if( $this->value()){ echo "1";} else {echo "0";}?>">
                </span>
            <?php
            }
        } // class
    }
    add_action('customize_register', 'aione_customize_register');
