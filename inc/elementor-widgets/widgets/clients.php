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
 * Mosh elementor clients widget.
 *
 * @since 1.0
 */
class Mosh_Clients extends Widget_Base {

	public function get_name() {
		return 'mosh-clients';
	}

	public function get_title() {
		return __( 'Clients', 'mosh-companion' );
	}

	public function get_icon() {
		return 'eicon-form-vertical';
	}

	public function get_categories() {
		return [ 'mosh-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

		// ----------------------------------------  Clients content ------------------------------
		$this->start_controls_section(
			'cta_content',
			[
				'label' => __( 'Clients content', 'mosh-companion' ),
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

        $this->add_control(
            'clients', [
                'label' => __( 'Clients Logo', 'mosh-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name' => 'label',
                        'label' => __( 'Client Info', 'mosh-companion' ),
                        'type' => Controls_Manager::HEADING,
                        'label_block' => true,
                        'default' => 'Client Info'
                    ],
                    [
                        'name' => 'linkurl',
                        'label' => __( 'Url', 'mosh-companion' ),
                        'type' => Controls_Manager::URL,
                        'default' => ''
                    ],
                    [
                        'name' => 'img',
                        'label' => esc_html__( 'Client Image', 'mosh-companion' ),
                        'type' => Controls_Manager::MEDIA,
                    ]

                ],
            ]
        );

		$this->end_controls_section(); // End service content

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
					'{{WRAPPER}} .mosh-clients-area .section-heading > p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'typography_subtitle',
				'selector' => '{{WRAPPER}} .mosh-clients-area .section-heading > p',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(), [
				'name' => 'text_shadow_subtitle',
				'selector' => '{{WRAPPER}} .mosh-clients-area .section-heading > p',
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
                'default' => '#404551',
                'selectors' => [
                    '{{WRAPPER}} .mosh-clients-area .section-heading > h2' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_title',
                'selector' => '{{WRAPPER}} .mosh-clients-area .section-heading > h2',
            ]
        );
        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(), [
                'name' => 'text_shadow_title',
                'selector' => '{{WRAPPER}} .mosh-clients-area .section-heading > h2',
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
                    '{{WRAPPER}} .mosh-clients-area' => 'background-color: {{VALUE}};',
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
                'default' => 'https://www.youtube.com/watch?v=5_-NKRVn7IQ&t=21s',
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
                'default' => '',
            ]
        );
        $this->add_control(
            'cta_ov_bg_color', [
                'label'     => esc_html__('Overlay Color', 'mosh-companion'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mosh-clients-area.bg-overlay:after' => 'background-color: {{VALUE}};',
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
    $overlay = '';
    if( !empty( $settings['cta_bgoverlay'] ) ){
        $overlay = 'bg-overlay';
    }
    //
    $bgUrl = '';
    if( !empty( $settings['cta_bg_image']['url'] ) ){
        $bgUrl = $settings['cta_bg_image']['url']; 
    }

    ?>
    <section class="mosh-clients-area <?php echo esc_attr( $overlay ); ?> section_padding_100 clearfix" <?php echo mosh_inline_bg_img( esc_url( $bgUrl ) ); ?>>
        <div class="container">
            <div class="row">
                <?php 
                if( !empty( $settings['subtitle'] ) || !empty( $settings['title'] ) ):
                ?>
                <div class="col-12">
                    <div class="section-heading text-center">
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
                        ?>
                    </div>
                </div>
                <?php 
                endif;
                ?>
                <div class="col-12">
                    <div class="clients-logo-area d-sm-flex align-items-center justify-content-between">
                        <?php 
                        if( is_array( $settings['clients'] ) && count( $settings['clients'] ) > 0 ){
                            foreach( $settings['clients'] as $client ){
                                echo mosh_anchor_tag(
                                    array(
                                        'url'   => esc_url( $client['linkurl']['url'] ),
                                        'text'  => mosh_img_tag(
                                            array(
                                                'url'   => esc_url( $client['img']['url'] )
                                            )
                                        )
                                    )
                                );
                            }
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
