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
 * Mosh elementor about us section widget.
 *
 * @since 1.0
 */
class Mosh_Features_Vtwo extends Widget_Base {

	public function get_name() {
		return 'mosh-features-vtwo';
	}

	public function get_title() {
		return __( 'Features Version Two', 'mosh-companion' );
	}

	public function get_icon() {
		return 'eicon-slideshow';
	}

	public function get_categories() {
		return [ 'mosh-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  Features content ------------------------------
        $this->start_controls_section(
            'featuresvtwo_content',
            [
                'label' => __( 'Features Version Two', 'mosh-companion' ),
            ]
        );
        $this->add_control(
            'featuresvtwo_subtitle',
            [
                'label' => esc_html__( 'Sub Title', 'mosh-companion' ),
                'type' => Controls_Manager::TEXT,
            ]
        );
        $this->add_control(
            'featuresvtwo_title',
            [
                'label' => esc_html__( 'Title', 'mosh-companion' ),
                'type'  => Controls_Manager::TEXT,
            ]
        );
        $this->add_control(
            'features', [
                'label' => __( 'Create Features', 'mosh-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name' => 'label',
                        'label' => __( 'Title', 'mosh-companion' ),
                        'type' => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => '01.'
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

        $this->end_controls_section(); // End content

        // ----------------------------------------  Features version two button ------------------------------
        $this->start_controls_section(
            'featuresvtwo_btn',
            [
                'label' => __( 'Button', 'mosh-companion' ),
            ]
        );
        $this->add_control(
            'featuresvtwo_btntitle',
            [
                'label' => esc_html__( 'Button Title', 'mosh-companion' ),
                'type' => Controls_Manager::TEXT,
            ]
        );
        $this->add_control(
            'featuresvtwo_btnurl',
            [
                'label' => esc_html__( 'Button Url', 'mosh-companion' ),
                'type'  => Controls_Manager::URL,
            ]
        );

        $this->end_controls_section(); // End  button

        // ----------------------------------------  Featured image ------------------------------
        $this->start_controls_section(
            'featuresvtwo_featureding',
            [
                'label' => __( 'Featured Image', 'mosh-companion' ),
            ]
        );
        $this->add_control(
            'featuresvtwo_fimg',
            [
                'label' => esc_html__( 'Featured Image', 'mosh-companion' ),
                'type' => Controls_Manager::MEDIA,
            ]
        );
        $this->add_control(
            'featuresvtwo_imgpos',
            [
                'label'         => __( 'Image Position', 'mosh-companion' ),
                'type'          => \Elementor\Controls_Manager::SWITCHER,
                'label_on'      => __( 'Left', 'mosh-companion' ),
                'label_off'     => __( 'Right', 'mosh-companion' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
            ]
        );
        $this->end_controls_section(); // End featured image


        //------------------------------ Style title ------------------------------
        $this->start_controls_section(
            'style_title', [
                'label' => __( 'Style Title', 'mosh-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_title', [
                'label' => __( 'Title Color', 'mosh-companion' ),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .mosh-about-us-content .section-heading > h2' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_title',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .mosh-about-us-content .section-heading > h2',
            ]
        );
        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(), [
                'name' => 'text_shadow_title',
                'selector' => '{{WRAPPER}} .mosh-about-us-content .section-heading > h2',
            ]
        );
        $this->end_controls_section();

        //------------------------------ Style sub title ------------------------------
        $this->start_controls_section(
            'style_subtitle', [
                'label' => __( 'Style Sub Title', 'mosh-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_subtitle', [
                'label' => __( 'Sub Title Color', 'mosh-companion' ),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .mosh-about-us-content .section-heading > p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_subtitle',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .mosh-about-us-content .section-heading > p',
            ]
        );
        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(), [
                'name' => 'text_shadow_subtitle',
                'selector' => '{{WRAPPER}} .mosh-about-us-content .section-heading > p',
            ]
        );
        $this->end_controls_section();

		//------------------------------ Style Features ------------------------------
		$this->start_controls_section(
			'style_features', [
				'label' => __( 'Style Features', 'mosh-companion' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        $this->add_control(
            'features_title_heading',
            [
                'label' => __( 'Style Feature Title ', 'mosh-companion' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'color_featuretitle', [
                'label' => __( 'Title Color', 'mosh-companion' ),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .single-feature-area .feature-content h5' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_featuretitle',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .single-feature-area .feature-content h5',
            ]
        );
        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(), [
                'name' => 'text_shadow_featuretitle',
                'selector' => '{{WRAPPER}} .single-feature-area .feature-content h5',
            ]
        );
        //
        $this->add_control(
            'features_fonticon_heading',
            [
                'label' => __( 'Style Font Icon', 'mosh-companion' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'color_fonticon', [
                'label' => __( 'Font Icon Color', 'mosh-companion' ),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .single-feature-area .feature-icon .fa' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'fontsize',
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
                    '{{WRAPPER}} .single-feature-area .feature-icon .fa' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(), [
                'name' => 'text_shadow_fonticon',
                'selector' => '{{WRAPPER}} .single-feature-area .feature-icon .fa',
            ]
        );

        //
        $this->add_control(
            'features_desc_heading',
            [
                'label' => __( 'Style Descriptions', 'mosh-companion' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
		$this->add_control(
			'color_desc', [
				'label' => __( 'Descriptions Color', 'mosh-companion' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .single-feature-area .feature-content p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'typography_desc',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .single-feature-area .feature-content p',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(), [
				'name' => 'text_shadow_desc',
				'selector' => '{{WRAPPER}} .single-feature-area .feature-content p',
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
                    '{{WRAPPER}} .mosh-about-us-content a.mosh-btn' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .mosh-about-us-content a.mosh-btn:hover' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .mosh-about-us-content a.mosh-btn' => 'background-color: {{VALUE}};',
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
                    '{{WRAPPER}} .mosh-about-us-content a.mosh-btn:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_btn',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .mosh-about-us-content a.mosh-btn',
            ]
        );

        $this->end_controls_section();

	}

	protected function render() {

    $settings = $this->get_settings();

    $pos = '';
    if( !empty( $settings['featuresvtwo_imgpos'] ) ){
        $pos = 'order-last';
    } 



    ?>
    <section class="mosh-about-features-area section_padding_100">
        <div class="container">
            <div class="row align-items-center">
                <?php 
                if( !empty( $settings['featuresvtwo_fimg']['url'] ) ):
                ?>
                <div class="col-12 <?php echo esc_attr( $pos ); ?> col-md-4">
                    <div class="mosh-features-thumb wow fadeIn" data-wow-delay="0.5s">
                        <?php 
                        echo mosh_img_tag(
                            array(
                                'url' => esc_url( $settings['featuresvtwo_fimg']['url'] ) 
                            )
                        );
                        ?>
                    </div>
                </div>
                <?php 
                endif;
                ?>
                <div class="col-12 col-md-8">
                    <div class="mosh-about-us-content">
                        <?php 
                        if( !empty( $settings['featuresvtwo_subtitle'] ) || !empty( $settings['featuresvtwo_title'] ) ):
                        ?>
                        <div class="section-heading">
                            <?php
                            // Sub title
                            if( !empty( $settings['featuresvtwo_subtitle'] ) ){
                                echo mosh_paragraph_tag(
                                    array(
                                        'text' => esc_html( $settings['featuresvtwo_subtitle'] )
                                    )
                                );
                            } 
                            // Title
                            if( !empty( $settings['featuresvtwo_title'] ) ){
                                echo mosh_heading_tag(
                                    array(
                                        'tag'  => 'h2',
                                        'text' => esc_html( $settings['featuresvtwo_title'] )
                                    )
                                );
                            }
                            ?>
                        </div>
                        <?php 
                        endif;
                        ?>
                        <div class="row">
                            <?php 
                            if( is_array( $settings['features'] ) && count( $settings['features'] ) > 0 ):
                                foreach( $settings['features'] as $feature ):
                            ?>
                            <!-- Single Feature Area -->
                            <div class="col-12 col-sm-6">
                                <div class="single-feature-area d-flex">
                                    <?php 
                                    if( !empty( $feature['icontype'] ) ){
                                        echo '<div class="feature-icon mr-30">';
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
                                        echo '</div>';
                                    }
                                    ?>
                                    <div class="feature-content">
                                        <?php 
                                        // Title
                                        if( !empty( $feature['label'] ) ){
                                            echo mosh_heading_tag(
                                                array(
                                                    'tag' => 'h5',
                                                    'text' => esc_html( $feature['label'] ) 
                                                )
                                            );
                                        }
                                        // Description
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
                        // Button
                        if( !empty( $settings['featuresvtwo_btntitle'] ) &&  !empty( $settings['featuresvtwo_btnurl']['url'] ) ){
                            echo mosh_anchor_tag(
                                array(
                                    'url'   => esc_url( $settings['featuresvtwo_btnurl']['url'] ),
                                    'text'  => esc_html( $settings['featuresvtwo_btntitle'] ),
                                    'class' => esc_attr( 'btn mosh-btn mt-50' )
                                )
                            );
                        } 
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php

        }
	
}
