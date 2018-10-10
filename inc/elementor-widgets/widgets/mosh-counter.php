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
 * Mosh elementor counter section widget.
 *
 * @since 1.0
 */
class Mosh_Counter extends Widget_Base {

	public function get_name() {
		return 'mosh-counter';
	}

	public function get_title() {
		return __( 'Counter', 'mosh-companion' );
	}

	public function get_icon() {
		return 'eicon-counter';
	}

	public function get_categories() {
		return [ 'mosh-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

		// ----------------------------------------  Counter content ------------------------------
		$this->start_controls_section(
			'counter_content',
			[
				'label' => __( 'Counter content', 'mosh-companion' ),
			]
		);
		$this->add_control(
            'counter', [
                'label' => __( 'Create Counter', 'mosh-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name' => 'label',
                        'label' => __( 'Title', 'mosh-companion' ),
                        'type' => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => 'Years of Experience'
                    ],
                    [
                        'name' => 'number',
                        'label' => __( 'Number', 'mosh-companion' ),
                        'type' => Controls_Manager::TEXT,
                        'default' => '15'
                    ],
                    [
                        'name' => 'symbol',
                        'label' => __( 'Symbol', 'mosh-companion' ),
                        'type' => Controls_Manager::TEXT,
                        'default' => 'K'
                    ]
                ],
            ]
		);
		$this->end_controls_section(); // End counter content

    /**
     * Style Tab
     * ------------------------------ Style Number ------------------------------
     *
     */
        $this->start_controls_section(
			'style_number', [
				'label' => __( 'Style Number', 'mosh-companion' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'color_number', [
				'label' => __( 'Number Color', 'mosh-companion' ),
				'type' => Controls_Manager::COLOR,
                'default' => '#404551',    
				'selectors' => [
                    '{{WRAPPER}} .counter-area h3'      => 'color: {{VALUE}};',
					'{{WRAPPER}} .counter-area h3 span' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'typography_number',
				'selector' => '{{WRAPPER}} .counter-area h3',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(), [
				'name' => 'text_shadow_number',
				'selector' => '{{WRAPPER}} .counter-area h3',
			]
		);
		$this->end_controls_section();


        //------------------------------ Style title ------------------------------
        $this->start_controls_section(
            'style_title', [
                'label' => __( 'Style Title', 'mosh-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_title', [
                'label'  => __( 'Title Color', 'mosh-companion' ),
                'type'   => Controls_Manager::COLOR,
                'default' => '#404551',
                'selectors' => [
                    '{{WRAPPER}} .cool-facts-content p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_title',
                'selector'  => '{{WRAPPER}} .cool-facts-content p',
            ]
        );
        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(), [
                'name'      => 'text_shadow_title',
                'selector'  => '{{WRAPPER}} .cool-facts-content p',
            ]
        );
        $this->end_controls_section();

	}

	protected function render() {

    $settings = $this->get_settings();

    ?>

    <section class="mosh-cool-facts-area service-page bg-img section_padding_100">
        <div class="container">
            <div class="row">
                <?php 
                // Single Cool Fact
                if( is_array( $settings['counter'] ) && count( $settings['counter'] ) > 0 ):
                    foreach( $settings['counter'] as $counter ):
                        $symbol = ( !empty( $counter['symbol'] ) ) ? $counter['symbol'] : '';
                        $number = ( !empty( $counter['number'] ) ) ? $counter['number'] : '';
                ?>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="single-cool-fact">
                        <div class="counter-area">
                            <h3><span class="counter"><?php echo esc_html( $number ); ?></span><?php echo esc_html( $symbol ); ?></h3>
                        </div>
                        <div class="cool-facts-content">
                            <?php 
                            if( !empty( $counter['label'] ) ){
                                echo mosh_paragraph_tag(
                                    array(
                                        'text' => esc_html( $counter['label'] ) 
                                    )
                                );
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <?php 
                    endforeach;
                endif;
                ?>

            </div>
        </div>
    </section>

    <?php

        }
	
}
