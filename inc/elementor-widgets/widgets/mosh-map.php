<?php
namespace Moshelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Mosh elementor map widget.
 *
 * @since 1.0
 */
class Mosh_Map extends Widget_Base {

	public function get_name() {
		return 'mosh-map';
	}

	public function get_title() {
		return __( 'Map', 'mosh-companion' );
	}

	public function get_icon() {
		return 'eicon-google-maps';
	}

	public function get_categories() {
		return [ 'mosh-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

		// ----------------------------------------  Map content ------------------------------
        $url = admin_url();
		$this->start_controls_section(
			'map_set',
			[
				'label' => __( 'Map Settings', 'mosh-companion' ),
			]
		);
        $this->add_control(
            'address',
            [
                'label'         => esc_html__( 'Address', 'mosh-companion' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__( 'Rabindra Sorobor Dhanmondi Lake Rd', 'mosh-companion' ),
                'description'   => esc_html__( 'Before use map widget make sure you are set google map api key from customizer -> theme options -> general -> google map api key', 'mosh-companion' )
            ]
        );

        $this->add_control(
            'latitude',
            [
                'label'         => esc_html__( 'Latitude', 'mosh-companion' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__( '23.745227', 'mosh-companion' )
            ]
        );
        $this->add_control(
            'longitude',
            [
                'label'         => esc_html__( 'Longitude', 'mosh-companion' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__( '90.377155', 'mosh-companion' )
            ]
        );

		$this->end_controls_section(); // End map content

	}

	protected function render() {

    $settings = $this->get_settings();
    // Enqueue scripts
    wp_enqueue_script('maps-googleapis');
    wp_enqueue_script('mosh-map-active');
    //
    $address = ( !empty( $settings['address'] ) ) ? $settings['address'] : '';
    $lat     = ( !empty( $settings['latitude'] ) ) ? $settings['latitude'] : '';
    $lng     = ( !empty( $settings['longitude'] ) ) ? $settings['longitude'] : '';
    ?>
    <div class="map-area" data-address="<?php echo esc_attr( $address ); ?>" data-lat="<?php echo esc_attr( $lat ); ?>" data-lng="<?php echo esc_attr( $lng ); ?>">
        <div id="googleMap"></div>
    </div>

    <?php

        }
	
}
