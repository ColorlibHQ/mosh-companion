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
 * Mosh elementor call to action widget.
 *
 * @since 1.0
 */
class Mosh_Cat extends Widget_Base {

	public function get_name() {
		return 'mosh-cta';
	}

	public function get_title() {
		return __( 'Call to action', 'mosh-companion' );
	}

	public function get_icon() {
		return 'eicon-call-to-action';
	}

	public function get_categories() {
		return [ 'mosh-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

		// ----------------------------------------  Service content ------------------------------
		$this->start_controls_section(
			'cta_content',
			[
				'label' => __( 'Call to action content', 'mosh-companion' ),
			]
		);
        $this->add_control(
            'subtitle',
            [
                'label' => esc_html__( 'Sub Title', 'mosh-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'GIVE US A SHOUT', 'mosh-companion' )
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => esc_html__( 'Title', 'mosh-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'Are you Ready to have a Talk?', 'mosh-companion' )
            ]
        );
		$this->end_controls_section(); // End service content

    // ----------------------------------------  Button ------------------------------
        $this->start_controls_section(
            'ctc_btn',
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
     * ------------------------------ Style Sub Title ------------------------------
     *
     */
        $this->start_controls_section(
			'style_subtitle', [
				'label' => __( 'Style Sub Title', 'mosh-companion' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'color_subtitle', [
				'label' => __( 'Title Color', 'mosh-companion' ),
				'type' => Controls_Manager::COLOR,
                'default' => '#bec0cc',
				'selectors' => [
					'{{WRAPPER}} .cta-content .section-heading > p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'typography_subtitle',
				'selector' => '{{WRAPPER}} .cta-content .section-heading > p',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(), [
				'name' => 'text_shadow_subtitle',
				'selector' => '{{WRAPPER}} .cta-content .section-heading > p',
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
                'label' => __( 'Title Color', 'mosh-companion' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .cta-content .section-heading h2' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_title',
                'selector' => '{{WRAPPER}} .cta-content .section-heading h2',
            ]
        );
        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(), [
                'name' => 'text_shadow_title',
                'selector' => '{{WRAPPER}} .cta-content .section-heading h2',
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
                    '{{WRAPPER}} .cta-content a.mosh-btn' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_btnhovtext', [
                'label' => __( 'Button Hover Text Color', 'mosh-companion' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .cta-content a.mosh-btn:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_btnbg', [
                'label' => __( 'Button background Color', 'mosh-companion' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#4a7aec',
                'selectors' => [
                    '{{WRAPPER}} .cta-content a.mosh-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );
		$this->add_control(
			'color_btnhovbg', [
				'label' => __( 'Button Hover background Color', 'mosh-companion' ),
				'type' => Controls_Manager::COLOR,
                'default' => '#1a3c8d',
				'selectors' => [
					'{{WRAPPER}} .cta-content a.mosh-btn:hover' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'typography_btn',
				'selector' => '{{WRAPPER}} .cta-content a.mosh-btn',
			]
		);

        $this->end_controls_section();
        //------------------------------ Style Background ------------------------------
		

        $this->start_controls_section(
            'style_cta_bg', [
                'label' => __( 'Style Section Background', 'mosh-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'style_bg', [
                'label' => esc_html__( 'Background Style', 'mosh-companion' ),
                'type' => Controls_Manager::SELECT,
                'label_block' => true,
                'options' => [
                    'style_01' => esc_html__('Style one (Static background)', 'mosh-companion'),
                    'style_02' => esc_html__('Style two (Parallax animation)', 'mosh-companion'),
                ],
                'default' => 'style_01'
            ]
        );

        $this->add_control(
            'cta_bg_type', [
                'label' => esc_html__( 'Background type', 'mosh-companion' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'image',
                'options' => [
                    'image' => 'Image',
                    'color' => 'Color',
                    'video' => 'Video',
                ],
            ]
        );
        $this->add_control(
            'cta_bg_color', [
                'label'     => esc_html__('Background Color', 'mosh-companion'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mosh-call-to-action-area' => 'background-color: {{VALUE}};',
                ],
                'condition' => [ 
                    'cta_bg_type' => 'color',
                ]
            ]
        );
        $this->add_control(
            'cta_bg_image', [
                'label' => esc_html__( 'Background image', 'mosh-companion' ),
                'type' => Controls_Manager::MEDIA,
                'condition' => [
                    'cta_bg_type' => 'image',
                ]
            ]
        );
        $this->add_control(
            'cta_bg_video', [
                'label' => esc_html__( 'Background video url', 'mosh-companion' ),
                'description' => esc_html__( '.mp4, .webm, youtube video supported.', 'mosh-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'LSmgKRx5pBo',
                'condition' => [
                    'cta_bg_type' => 'video',
                ]
            ]
        );
        $this->add_control(
            'cta_bgoverlay',
            [
                'label' => __( 'Background Overlay', 'mosh-companion' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'mosh-companion' ),
                'label_off' => __( 'Hide', 'mosh-companion' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'cta_ov_bg_color', [
                'label'     => esc_html__('Overlay Color', 'mosh-companion'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mosh-call-to-action-area.bg-overlay:after' => 'background-color: {{VALUE}};',
                ],
                'condition' => [ 
                    'cta_bgoverlay' => 'yes',
                ]
            ]
        );

        $this->end_controls_section();

	}

	protected function render() {

    $settings = $this->get_settings();

    // Overlay
    $overlay = '';
    if( !empty( $settings['cta_bgoverlay'] ) ){
        $overlay = 'bg-overlay';
    }
    // Background Image
    $bgUrl = '';
    if( !empty( $settings['cta_bg_image']['url'] ) ){
        $bgUrl = $settings['cta_bg_image']['url']; 
    }

    // Background style
    $bgstyle = '';
    if( !empty( $settings['style_bg'] ) && 'style_01' != $settings['style_bg'] ){
        $bgstyle = ' bg-fixed';
    }

    ?>

    <section class="mosh-call-to-action-area <?php echo esc_attr( $overlay.$bgstyle ); ?> bg-img section_padding_100" <?php echo mosh_inline_bg_img( esc_url( $bgUrl ) ); ?>>
        <?php 
        // Video Background
        if( !empty( $settings['cta_bg_type'] ) && 'video' == $settings['cta_bg_type'] ){
            if( !empty( $settings['cta_bg_video'] ) ){
                echo '<div class="videobg" data-videoid="'.esc_attr( $settings['cta_bg_video'] ).'"></div>';
            }
        }
        ?>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cta-content text-center wow fadeIn" data-wow-delay="0.5s">
                        <div class="section-heading">
                            <?php 
                            // Sub title
                            if( !empty( $settings['subtitle'] )){
                                echo mosh_paragraph_tag(
                                    array(
                                        'text'  => esc_html( $settings['subtitle'] )
                                    )
                                );
                            }
                            // Title
                            if( !empty( $settings['title'] )){
                                echo mosh_heading_tag(
                                    array(
                                        'tag'   => 'h2',
                                        'text'  => esc_html( $settings['title'] )
                                    )
                                );
                            } 
                            // Button
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
                                    )
                                );
                            }

                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php

        }
	
}
