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
class Mosh_Servicesvtwo extends Widget_Base {

	public function get_name() {
		return 'mosh-servicesvtwo';
	}

	public function get_title() {
		return __( 'Services Version Two', 'mosh-companion' );
	}

	public function get_icon() {
		return 'eicon-posts-grid';
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

    //------------------------------ Style Section ------------------------------
    $this->start_controls_section(
        'style_section', [
            'label' => __( 'Style Section Content', 'mosh-companion' ),
            'tab' => Controls_Manager::TAB_STYLE,
        ]
    );
        $this->add_control(
            'service_style',
            [
                'label' => __( 'Style', 'mosh-companion' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '1',
                'options' => [
                    '1'  => __( 'Style 1', 'mosh-companion' ),
                    '2'  => __( 'Style 2', 'mosh-companion' ),
                ],
            ]
        );
        $this->add_control(
            'column_style',
            [
                'label' => __( 'Column', 'mosh-companion' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '4',
                'options' => [
                    '6'  => __( 'Column 2', 'mosh-companion' ),
                    '4'  => __( 'Column 3', 'mosh-companion' ),
                    '3'  => __( 'Column 4', 'mosh-companion' ),
                    '2'  => __( 'Column 6', 'mosh-companion' ),
                ],
            ]
        );
    $this->end_controls_section();
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
				'label' => __( 'Icon Color', 'mosh-companion' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .feature-icon .fa' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .feature-icon .fa' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(), [
				'name' => 'text_shadow_title',
				'selector' => '{{WRAPPER}} .feature-icon .fa',
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
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .feature-content > h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_titletwo',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .feature-content > h4',
            ]
        );
        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(), [
                'name' => 'text_shadow_titletwo',
                'selector' => '{{WRAPPER}} .feature-content > h4',
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
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .feature-content p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'typography_desc',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .feature-content p',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(), [
				'name' => 'text_shadow_desc',
				'selector' => '{{WRAPPER}} .feature-content p',
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
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .mosh--services-area a.mosh-btn' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_btnhovtext', [
                'label' => __( 'Button Hover Text Color', 'mosh-companion' ),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .mosh--services-area a.mosh-btn:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_btnbg', [
                'label' => __( 'Button background Color', 'mosh-companion' ),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .mosh--services-area a.mosh-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_btnhovbg', [
                'label' => __( 'Button Hover background Color', 'mosh-companion' ),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .mosh--services-area a.mosh-btn:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_btn',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .mosh--services-area a.mosh-btn',
            ]
        );

        $this->end_controls_section();


	}

	protected function render() {

    $settings = $this->get_settings();

    $textAlign = '';
    $flex      = 'd-flex';
    $margin    = 'mr-30';
    if( !empty( $settings['service_style'] ) &&  $settings['service_style'] != '1' ){
        $textAlign = 'text-center';
        $flex      = '';
        $margin    = 'mb-30';
    }

    ?>
    <section class="mosh--services-area section_padding_100">
        <div class="container">
            <div class="row">
                
                <?php
                //  Single Feature Area 
                if( is_array( $settings['moshservices'] ) && count( $settings['moshservices'] ) > 0 ):
                    foreach( $settings['moshservices'] as $feature ):
                ?>
                <div class="col-12 col-sm-6 col-md-<?php echo esc_attr( $settings['column_style'] ); ?>">
                    <div class="single-feature-area mb-100 <?php echo esc_attr( $textAlign.$flex ); ?>">
                        <?php 
                        // Icon
                        if( !empty( $feature['icontype'] ) ){
                            if( $feature['icontype'] != 'img' && !empty( $feature['fonticon'] ) ){
                                echo '<div class="feature-icon '.esc_attr( $margin ).'">';
                                    echo '<i class="'.esc_attr( $feature['fonticon'] ).'"></i>';
                                echo '</div>';
                            }else{
                                if( !empty( $feature['iconimg']['url'] ) ){
                                    echo '<div class="feature-icon '.esc_attr( $margin ).'">';
                                        echo mosh_img_tag(
                                            array(
                                                'url' =>  esc_url( $feature['iconimg']['url'] )
                                            )
                                        );
                                    echo '</div>';
                                }
                            } 
                        }
                        ?>
                        <div class="feature-content">
                            <?php 
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
                </div>
                <?php 
                    endforeach;
                endif;
                ?>
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
                        'wrap_before'   => '<div class="row"><div class="col-12 text-center">',
                        'wrap_after'    => '</div></div>',
                    )
                );
            }
            ?>
        </div>
    </section>
    <?php

        }
	
}
