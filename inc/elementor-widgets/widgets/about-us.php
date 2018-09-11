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
class Mosh_About_Us extends Widget_Base {

	public function get_name() {
		return 'mosh-aboutus';
	}

	public function get_title() {
		return __( 'About Us', 'mosh-companion' );
	}

	public function get_icon() {
		return 'eicon-column';
	}

	public function get_categories() {
		return [ 'mosh-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  About us content ------------------------------
        $this->start_controls_section(
            'aboutus_content',
            [
                'label' => __( 'About Us', 'mosh-companion' ),
            ]
        );
        $this->add_control(
            'aboutus_subtitle',
            [
                'label' => esc_html__( 'Sub Title', 'mosh-companion' ),
                'type' => Controls_Manager::TEXT,
            ]
        );
        $this->add_control(
            'aboutus_title',
            [
                'label' => esc_html__( 'Title', 'mosh-companion' ),
                'type'  => Controls_Manager::TEXT,
            ]
        );
        $this->add_control(
            'aboutus_desc',
            [
                'label' => esc_html__( 'Descriptions', 'mosh-companion' ),
                'type'  => Controls_Manager::WYSIWYG,
            ]
        );
        $this->end_controls_section(); // End about us content

        // ----------------------------------------  About us Button ------------------------------
        $this->start_controls_section(
            'aboutus_btn',
            [
                'label' => __( 'Button', 'mosh-companion' ),
            ]
        );
        $this->add_control(
            'aboutus_btntitle',
            [
                'label' => esc_html__( 'Button Title', 'mosh-companion' ),
                'type' => Controls_Manager::TEXT,
            ]
        );
        $this->add_control(
            'aboutus_btnurl',
            [
                'label' => esc_html__( 'Button Url', 'mosh-companion' ),
                'type'  => Controls_Manager::URL,
            ]
        );

        $this->end_controls_section(); // End about us button

        // ----------------------------------------  Featured image ------------------------------
        $this->start_controls_section(
            'aboutus_featureding',
            [
                'label' => __( 'Featured Image', 'mosh-companion' ),
            ]
        );
        $this->add_control(
            'aboutus_fimg',
            [
                'label' => esc_html__( 'Featured Image', 'mosh-companion' ),
                'type' => Controls_Manager::MEDIA,
            ]
        );

        $this->end_controls_section(); // End about us button

		// ----------------------------------------  Content Settings ------------------------------
		$this->start_controls_section(
			'aboutus_settings',
			[
				'label' => __( 'Content Settings', 'mosh-companion' ),
			]
		);
        $this->add_control(
            'aboutus_text_align',
            [
                'label' => __( 'Text Alignment', 'mosh-companion' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'mosh-companion' ),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'mosh-companion' ),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'mosh-companion' ),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'default' => 'left',
                'toggle' => true,
            ]
        );
        $this->add_control(
            'about_contentpos',
            [
                'label'         => __( 'Content Position', 'mosh-companion' ),
                'type'          => \Elementor\Controls_Manager::SWITCHER,
                'label_on'      => __( 'Left', 'mosh-companion' ),
                'label_off'     => __( 'Right', 'mosh-companion' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
            ]
        );

		$this->end_controls_section(); // End about us button


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
					'{{WRAPPER}} .mosh-about-us-content p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'typography_desc',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .mosh-about-us-content p',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(), [
				'name' => 'text_shadow_desc',
				'selector' => '{{WRAPPER}} .mosh-about-us-content p ',
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

    $pos = 'order-last';
    if( !empty( $settings['about_contentpos'] ) ){
        $pos = '';
    } 



    ?>
    <section class="mosh-aboutUs-area section_padding_100_0">
        <div class="container">
            <div class="row align-items-center text-<?php echo esc_attr( $settings['aboutus_text_align'] ); ?>">
                <div class="col-12 <?php echo esc_attr( $pos ); ?> col-md-6">
                    <div class="mosh-about-us-content">
                        <div class="section-heading">
                            <?php 
                            // Sub title
                            if( !empty( $settings['aboutus_subtitle'] ) ){
                                echo mosh_paragraph_tag(
                                    array(
                                        'text' => esc_html( $settings['aboutus_subtitle'] )
                                    )
                                );
                            } 
                            // Title
                            if( !empty( $settings['aboutus_title'] ) ){
                                echo mosh_heading_tag(
                                    array(
                                        'tag'  => 'h2',
                                        'text' => esc_html( $settings['aboutus_title'] )
                                    )
                                );
                            }
                            ?>
                        </div>
                        <?php 

                        // Descriptions
                        if( !empty( $settings['aboutus_desc'] ) ){
                            echo mosh_get_textareahtml_output( $settings['aboutus_desc'] );
                        }
                        // Button
                        if( !empty( $settings['aboutus_btntitle'] ) &&  !empty( $settings['aboutus_btnurl']['url'] ) ){
                            echo mosh_anchor_tag(
                                array(
                                    'url'   => esc_url( $settings['aboutus_btnurl']['url'] ),
                                    'text'  => esc_html( $settings['aboutus_btntitle'] ),
                                    'class' => esc_attr( 'btn mosh-btn mt-50' )
                                )
                            );
                        } 
                        ?>
                    </div>
                </div>
                <?php 
                if( !empty( $settings['aboutus_fimg']['url'] ) ):
                ?>
                <div class="col-12 col-md-6">
                    <div class="mosh-about-us-thumb wow fadeInUp" data-wow-delay="0.5s">
                        <?php 
                        echo mosh_img_tag(
                            array(
                                'url' => esc_url( $settings['aboutus_fimg']['url'] ) 
                            )
                        );
                        ?>
                    </div>
                </div>
                <?php 
                endif;
                ?>
            </div>
        </div>
    </section>
    <?php

        }
	
}
