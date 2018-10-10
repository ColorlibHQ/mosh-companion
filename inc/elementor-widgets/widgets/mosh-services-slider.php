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
 * Mosh elementor services slider section widget.
 *
 * @since 1.0
 */
class Mosh_Services_Slider extends Widget_Base {

	public function get_name() {
		return 'mosh-services-slider';
	}

	public function get_title() {
		return __( 'Services Slider', 'mosh-companion' );
	}

	public function get_icon() {
		return 'eicon-slider-push';
	}

	public function get_categories() {
		return [ 'mosh-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

		// ----------------------------------------  Service content ------------------------------
		$this->start_controls_section(
			'services_content',
			[
				'label' => __( 'Services Slider content', 'mosh-companion' ),
			]
		);
		$this->add_control(
            'moshservicesslider', [
                'label' => __( 'Create Service', 'mosh-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name' => 'label',
                        'label' => __( 'Title #1', 'mosh-companion' ),
                        'type' => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => '01.'
                    ],
                    [
                        'name' => 'stitletwo',
                        'label' => __( 'Title #2', 'mosh-companion' ),
                        'type' => Controls_Manager::TEXT,
                        'default' => 'Service Title'
                    ],
                    [
                        'name' => 'desc',
                        'label' => __( 'Descriptions', 'mosh-companion' ),
                        'type' => Controls_Manager::TEXTAREA,
                    ]
                ],
            ]
		);
		$this->end_controls_section(); // End service content

    // ----------------------------------------  Button ------------------------------
        $this->start_controls_section(
            'services_btn',
            [
                'label' => __( 'Button', 'mosh-companion' ),
            ]
        );
        $this->add_control(
            'btnlabel', [
                'label' => __( 'Button Label', 'mosh-companion' ),
                'type' => Controls_Manager::TEXT,
            ]
        );
        $this->add_control(
            'btnurl', [
                'label' => __( 'Button Url', 'mosh-companion' ),
                'type' => Controls_Manager::URL,
            ]
        );
        $this->end_controls_section(); // End button content
    /**
     * Style Tab
     * ------------------------------ Style Title #1 ------------------------------
     *
     */
        $this->start_controls_section(
			'style_title', [
				'label' => __( 'Style Title  #1', 'mosh-companion' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_control(
            'color_title', [
                'label' => __( 'Title Color', 'mosh-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-service-area h2' => 'color: {{VALUE}};',
                ],
            ]
        );
		$this->add_control(
			'color_titlehover', [
				'label' => __( 'Title hover and active Color', 'mosh-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}} .mosh-service-slides .center .single-service-area h2' => 'color: {{VALUE}};',
					'{{WRAPPER}} .single-service-area:hover h2' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'typography_title',
				'selector' => '{{WRAPPER}} .single-service-area h2',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(), [
				'name' => 'text_shadow_title',
				'selector' => '{{WRAPPER}} .single-service-area h2',
			]
		);
		$this->end_controls_section();


        //------------------------------ Style title #2 ------------------------------
        $this->start_controls_section(
            'style_titletwo', [
                'label' => __( 'Style Title #2', 'mosh-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_titletwo', [
                'label' => __( 'Title Color', 'mosh-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-service-area h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_titletwo',
                'selector' => '{{WRAPPER}} .single-service-area h4',
            ]
        );
        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(), [
                'name' => 'text_shadow_titletwo',
                'selector' => '{{WRAPPER}} .single-service-area h4',
            ]
        );
        $this->end_controls_section();

		//------------------------------ Style Description ------------------------------
		$this->start_controls_section(
			'style_desc', [
				'label' => __( 'Style Description', 'mosh-companion' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'color_text', [
				'label' => __( 'Text Color', 'mosh-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-service-area p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'typography_desc',
				'selector' => '{{WRAPPER}} .single-service-area p',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(), [
				'name' => 'text_shadow_desc',
				'selector' => '{{WRAPPER}} .single-service-area p',
			]
		);
		$this->end_controls_section();

        //------------------------------ Style Button ------------------------------
        $this->start_controls_section(
            'style_btn', [
                'label' => __( 'Style Button', 'mosh-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_btntext', [
                'label' => __( 'Button Text Color', 'mosh-companion' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .mosh-service-area a.mosh-btn' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_btnhovtext', [
                'label' => __( 'Button Hover Text Color', 'mosh-companion' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .mosh-service-area a.mosh-btn:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_btnbg', [
                'label' => __( 'Button background Color', 'mosh-companion' ),
                'type'  => Controls_Manager::COLOR,
                'default' => '#4a7aec',
                'selectors' => [
                    '{{WRAPPER}} .mosh-service-area a.mosh-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_btnhovbg', [
                'label' => __( 'Button Hover background Color', 'mosh-companion' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#1a3c8d',
                'selectors' => [
                    '{{WRAPPER}} .mosh-service-area a.mosh-btn:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_btn',
                'selector' => '{{WRAPPER}} .mosh-service-area a.mosh-btn',
            ]
        );

        $this->end_controls_section();


	}

	protected function render() {

    $settings = $this->get_settings();

    ?>
    <section class="mosh-service-area clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="mosh-service-slides owl-carousel">
                        <?php 
                        // Single Service Area
                        if( is_array( $settings['moshservicesslider'] ) && count( $settings['moshservicesslider'] ) ):
                            foreach( $settings['moshservicesslider'] as $service ):
                            
                        ?>
                        <div class="single-service-area text-center">
                            <?php 
                            // Title #1
                            if( !empty( $service['label'] )){
                                echo mosh_heading_tag(
                                    array(
                                        'tag'   => 'h2',
                                        'text'  => esc_html( $service['label'] )
                                    )
                                );
                            } 
                            // Title #2
                            if( !empty( $service['stitletwo'] )){
                                echo mosh_heading_tag(
                                    array(
                                        'tag'   => 'h4',
                                        'text'  => esc_html( $service['stitletwo'] )
                                    )
                                );
                            } 
                            // Descriptions
                            if( !empty( $service['desc'] )){
                                echo mosh_paragraph_tag(
                                    array(
                                        'text'  => esc_html( $service['desc'] )
                                    )
                                );
                            } 
                            //
                            ?>
                        </div>
                        <?php 
                            endforeach;
                        endif;
                        ?>
                    </div>
                </div>
                <?php 

                // Discover More btn
                if( !empty( $settings['btnlabel'] ) && !empty( $settings['btnurl']['url'] ) ){
                    $target = '';
                    if( !empty( $settings['btnurl']['is_external'] ) ){
                        $target = '_blank';
                    }

                    echo mosh_anchor_tag(
                        array(
                            'url'           => esc_url( $settings['btnurl']['url'] ),
                            'text'          => esc_html( $settings['btnlabel'] ),
                            'class'         => 'btn mosh-btn',
                            'target'        => esc_attr( $target ),
                            'wrap_before'   => '<div class="col-12 text-center mt-100">',
                            'wrap_after'    => '</div>',
                        )
                    );
                }
                ?>                
            </div>
        </div>
    </section>

    <?php

        }
	
}
