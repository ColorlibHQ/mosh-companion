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
 * Mosh elementor hero section widget.
 *
 * @since 1.0
 */
class Mosh_Hero extends Widget_Base {

	public function get_name() {
		return 'mosh-hero';
	}

	public function get_title() {
		return __( 'Hero Section', 'mosh-companion' );
	}

	public function get_icon() {
		return 'eicon-slider-full-screen';
	}

	public function get_categories() {
		return [ 'mosh-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

		// ----------------------------------------  Hero content ------------------------------
		$this->start_controls_section(
			'hero_content',
			[
				'label' => __( 'Hero Slider content', 'mosh-companion' ),
			]
		);
		$this->add_control(
            'moshslider', [
                'label' => __( 'Create slider', 'mosh-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name' => 'label',
                        'label' => __( 'Title', 'mosh-companion' ),
                        'type' => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => 'Slider title.'
                    ],
                    [
                        'name' => 'subtitle',
                        'label' => __( 'Sub title', 'mosh-companion' ),
                        'type' => Controls_Manager::TEXT,
                        'default' => 'Slider sub title.'
                    ],
                    [
                        'name' => 'image',
                        'label' => __( 'Featured Image', 'mosh-companion' ),
                        'type' => Controls_Manager::MEDIA,
                    ]
                ],
            ]
		);
		$this->end_controls_section(); // End Hero content


    /**
     * Style Tab
     * ------------------------------ Style Title ------------------------------
     *
     */
        $this->start_controls_section(
			'style_title', [
				'label' => __( 'Style Title', 'mosh-companion' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'color_prefix', [
				'label' => __( 'Text Color', 'mosh-companion' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .hero-slide-content h2' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'typography_prefix',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .hero-slide-content h2',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(), [
				'name' => 'text_shadow_prefix',
				'selector' => '{{WRAPPER}} .hero-slide-content h2',
			]
		);
		$this->end_controls_section();


		//------------------------------ Style Subtitle ------------------------------
		$this->start_controls_section(
			'style_subtitle', [
				'label' => __( 'Style subtitle', 'mosh-companion' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'color_suffix', [
				'label' => __( 'Text Color', 'mosh-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hero-slide-content h4' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'typography_suffix',
				'selector' => '{{WRAPPER}} .hero-slide-content h4',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(), [
				'name' => 'text_shadow_suffix',
				'selector' => '{{WRAPPER}} .hero-slide-content h4',
			]
		);
		$this->end_controls_section();

		//------------------------------ Style Background ------------------------------
		$this->start_controls_section(
			'style_section', [
				'label' => __( 'Style Background', 'mosh-companion' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        $this->add_control(
            'style', [
                'label' => esc_html__( 'Background Style', 'mosh-companion' ),
                'type' => Controls_Manager::SELECT,
                'label_block' => true,
                'options' => [
                    'style_01' => esc_html__('Style one (Static background)', 'mosh-companion'),
                    'style_02' => esc_html__('Style two (Parallax animation)', 'mosh-companion'),
                    'style_03' => esc_html__('Style three (Background circle shapes)', 'mosh-companion'),
                    'style_04' => esc_html__('Style four (All centered)', 'mosh-companion'),
                    'style_05' => esc_html__('Style five (Two featured image)', 'mosh-companion'),
                ],
                'default' => 'style_01'
            ]
        );



		$this->add_control(
			'sec_bg_type', [
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
            'slider_bg_color', [
                'label'     => esc_html__('Background Color', 'mosh-companion'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .welcome_area' => 'background-color: {{VALUE}};',
                ],
                'condition' => [ 
                    'sec_bg_type' => 'color',
                ]
            ]
        );
		$this->add_control(
			'sec_bg_image', [
				'label' => esc_html__( 'Background image', 'mosh-companion' ),
				'type' => Controls_Manager::MEDIA,
                'condition' => [
                    'sec_bg_type' => 'image',
                ]
			]
		);
		$this->add_control(
			'sec_bg_video', [
				'label' => esc_html__( 'Background video url', 'mosh-companion' ),
				'description' => esc_html__( 'Set youtube video id', 'mosh-companion' ),
				'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'LSmgKRx5pBo',
                'condition' => [
                    'sec_bg_type' => 'video',
                ]
			]
		);


		$this->end_controls_section();
	}

	protected function render() {

    $settings = $this->get_settings();

    $bgUrl = '';
    if( !empty( $settings['sec_bg_image']['url'] ) ){
        $bgUrl = $settings['sec_bg_image']['url']; 
    }

    // Background type video check
    $height = '';
    $video  = false;

    if( !empty( $settings['sec_bg_type'] ) && 'video' == $settings['sec_bg_type'] ){
        $height = 'height-vh';
        $video  = true;
    } 

    ?>
    <section class="welcome_area clearfix<?php echo esc_attr( $height ); ?>" id="home" <?php echo mosh_inline_bg_img( esc_url( $bgUrl ) ); ?>>
        <?php 
        if( $video ){
            if( !empty( $settings['sec_bg_video'] ) ){
                echo '<div class="videobg" data-videoid="'.esc_attr( $settings['sec_bg_video'] ).'"></div>';
            }
        }
        ?>
        
        <div class="hero-slides owl-carousel">
            <?php 
            // Single Hero Slides

            if( is_array( $settings['moshslider'] ) && count( $settings['moshslider'] ) ):
                foreach( $settings['moshslider'] as $slider ):
                  
            ?>
            <div class="single-hero-slide d-flex align-items-end justify-content-center">
                <div class="hero-slide-content text-center">
                    <?php 
                    // Title
                    if( !empty( $slider['label'] )){
                        echo mosh_heading_tag(
                            array(
                                'tag'   => 'h2',
                                'text'  => esc_html( $slider['label'] )
                            )
                        );
                    } 
                    // Sub Title
                    if( !empty( $slider['subtitle'] )){
                        echo mosh_heading_tag(
                            array(
                                'tag'   => 'h4',
                                'text'  => esc_html( $slider['subtitle'] )
                            )
                        );
                    }
                    // Feature image
                    if( !empty( $slider['image']['url'] ) ){
                        echo mosh_img_tag(
                            array(
                                'url'   => esc_url( $slider['image']['url'] ), 
                                'class' => 'slide-img'
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
        </div>
    </section>
    <?php

        }
	
}
