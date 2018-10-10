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
class Mosh_Services extends Widget_Base {

	public function get_name() {
		return 'mosh-services';
	}

	public function get_title() {
		return __( 'Services', 'mosh-companion' );
	}

	public function get_icon() {
		return 'eicon-slideshow';
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
				'label' => __( 'Services content', 'mosh-companion' ),
			]
		);
		$this->add_control(
            'moshservices', [
                'label' => __( 'Create Service', 'mosh-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name' => 'label',
                        'label' => __( 'Title', 'mosh-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => ''
                    ],
                    [
                        'name' => 'icontype',
                        'label' => __( 'Icon Type', 'mosh-companion' ),
                        'type' => Controls_Manager::SELECT,
                        'default' => 'img',
                        'options' => [
                            'img'  => __( 'Image Icon', 'mosh-companion' ),
                            'icon' => __( 'Font Icon', 'mosh-companion' ),
                        ],
                    ],
                    [
                        'name' => 'fonticon',
                        'label' => __( 'Font Icon', 'mosh-companion' ),
                        'type' => Controls_Manager::ICON,
                        'condition' => [
                            'icontype' => 'icon'
                        ]
                    ],
                    [
                        'name' => 'iconimg',
                        'label' => __( 'Image Icon', 'mosh-companion' ),
                        'type' => Controls_Manager::MEDIA,
                        'condition' => [
                            'icontype' => 'img'
                        ]
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

    /**
     * Style Tab
     * ------------------------------ Style Font Icon ------------------------------
     *
     */
        $this->start_controls_section(
			'style_icon', [
				'label' => __( 'Style Font Icon', 'mosh-companion' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'color_title', [
				'label'     => __( 'Icon Color', 'mosh-companion' ),
				'type'      => Controls_Manager::COLOR,
                'default'   => '#4a7aec',
				'selectors' => [
					'{{WRAPPER}} .more-service-content .fa' => 'color: {{VALUE}};',
				],
			]
		);
        $this->add_control(
            'iconfontsize',
            [
                'label' => __( 'Icon Font Size', 'mosh-companion' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 15,
                ],
                'selectors' => [
                    '{{WRAPPER}} .more-service-content .fa' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(), [
				'name' => 'text_shadow_title',
				'selector' => '{{WRAPPER}} .more-service-content .fa',
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
            'color_titletwo', [
                'label' => __( 'Title Color', 'mosh-companion' ),
                'type' => Controls_Manager::COLOR,
                'default'   => '#404551',
                'selectors' => [
                    '{{WRAPPER}} .more-service-content > h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_titletwo',
                'selector' => '{{WRAPPER}} .more-service-content > h4',
            ]
        );
        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(), [
                'name' => 'text_shadow_titletwo',
                'selector' => '{{WRAPPER}} .more-service-content > h4',
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
                'default'   => '#abadbe',
				'selectors' => [
					'{{WRAPPER}} .more-service-content p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'typography_desc',
				'selector' => '{{WRAPPER}} .more-service-content p',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(), [
				'name' => 'text_shadow_desc',
				'selector' => '{{WRAPPER}} .more-service-content p',
			]
		);
		$this->end_controls_section();

	}

	protected function render() {

    $settings = $this->get_settings();

    ?>
    <section class="mosh-more-services-area d-sm-flex clearfix">
        <?php 
        if( is_array( $settings['moshservices'] ) && count( $settings['moshservices'] ) > 0 ):
            foreach( $settings['moshservices'] as $feature ):
        ?>
        <div class="single-more-service-area">
            <div class="more-service-content text-center wow fadeInUp" data-wow-delay=".1s">
                <?php
                if( !empty( $feature['icontype'] ) ){
                    if( $feature['icontype'] != 'img' && !empty( $feature['fonticon'] ) ){
                        echo '<i class="'.esc_attr( $feature['fonticon'] ).'"></i>';
                    }else{
                        if( !empty( $feature['iconimg']['url'] ) ){
                            echo mosh_img_tag(
                                array(
                                    'url' =>  esc_url( $feature['iconimg']['url'] )
                                )
                            );
                        }
                    } 
                }
                //
                if( !empty( $feature['label'] ) ){
                    echo mosh_heading_tag(
                        array(
                            'tag'  => 'h4',
                            'text' => esc_html( $feature['label'] )
                        )
                    );
                }
                //
                if( !empty( $feature['desc'] ) ){
                    echo mosh_paragraph_tag(
                        array(
                            'text' => esc_html( $feature['desc'] )
                        )
                    );
                } 
                ?>
            </div>
        </div>
        <?php 
            endforeach;
        endif;
        ?>
    </section>
    <?php

        }
	
}
