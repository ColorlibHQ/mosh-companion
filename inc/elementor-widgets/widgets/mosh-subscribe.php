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
class Mosh_Subscribe extends Widget_Base {

	public function get_name() {
		return 'mosh-subscribe';
	}

	public function get_title() {
		return __( 'Subscribe Section', 'mosh-companion' );
	}

	public function get_icon() {
		return 'eicon-mailchimp';
	}

	public function get_categories() {
		return [ 'mosh-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

		// ----------------------------------------  Subscribe content ------------------------------
		$this->start_controls_section(
			'subscribe_content',
			[
				'label' => __( 'Subscribe Content', 'mosh-companion' ),
			]
		);
        $this->add_control(
            'subtitle',
            [
                'label' => esc_html__( 'Sub Title', 'mosh-companion' ),
                'type'  => Controls_Manager::TEXT,
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
                'default' => esc_html__( 'Subscribe to our newsletter', 'mosh-companion' )
            ]
        );
		$this->end_controls_section(); // End service content

    // ----------------------------------------  Subscribe Form ------------------------------
        $acurl = 'https://goo.gl/JedUPV';
        $this->start_controls_section(
            'ctc_btn',
            [
                'label' => __( 'Subscribe Form Settings', 'mosh-companion' ),
            ]
        );
        $this->add_control(
            'acurl', [
                'label' => __( 'Action Url', 'mosh-companion' ),
                'type'  => Controls_Manager::URL,
                'show_external' => false
            ]
        );
        $this->add_control(
            'placetext', [
                'label'   => __( 'Placeholder Text', 'mosh-companion' ),
                'type'    => Controls_Manager::TEXT,
                'default' => __( 'Your e-mail here', 'mosh-companion' )
            ]
        );
        $this->add_control(
            'btntext', [
                'label'   => __( 'Submit Button Text', 'mosh-companion' ),
                'type'    => Controls_Manager::TEXT,
                'default' => __( 'Subscribe', 'mosh-companion' ),
                'description' => sprintf( __( 'Enter here your MailChimp action URL. <a href="%s" target="_blank"> How to </a>', 'mosh-companion' ), $acurl ),
            ]
        );
        $this->add_control(
            'form_animation',
            [
                'label'   => __( 'Form Animation', 'mosh-companion' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => 'fadeIn',
                'options' => [
                    'none'              => __( 'None',   'mosh-companion' ),
                    'fadeIn'            => __( 'Fade In',  'mosh-companion' ),
                    'fadeInRightBig'    => __( 'Fade In Right Big', 'mosh-companion' ),                    
                ],
            ]
        );

        $this->end_controls_section(); // End form content
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
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .subscribe-newsletter-content p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'typography_subtitle',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .subscribe-newsletter-content p',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(), [
				'name' => 'text_shadow_subtitle',
				'selector' => '{{WRAPPER}} .subscribe-newsletter-content p',
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
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .subscribe-newsletter-content h2' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_title',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .subscribe-newsletter-content h2',
            ]
        );
        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(), [
                'name' => 'text_shadow_title',
                'selector' => '{{WRAPPER}} .subscribe-newsletter-content h2',
            ]
        );
        $this->end_controls_section();

        //------------------------------ Style Background ------------------------------
		
        $this->start_controls_section(
            'style_subsc_bg', [
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
            'subsc_bg_type', [
                'label' => esc_html__( 'Background type', 'mosh-companion' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'image',
                'options' => [
                    'image' => 'Image',
                    'color' => 'Color',                ],
            ]
        );
        $this->add_control(
            'subsc_bg_color', [
                'label'     => esc_html__('Background Color', 'mosh-companion'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mosh-subscribe-newsletter-area' => 'background-color: {{VALUE}};',
                ],
                'condition' => [ 
                    'subsc_bg_type' => 'color',
                ]
            ]
        );
        $this->add_control(
            'subsc_bg_image', [
                'label' => esc_html__( 'Background image', 'mosh-companion' ),
                'type' => Controls_Manager::MEDIA,
                'condition' => [
                    'subsc_bg_type' => 'image',
                ]
            ]
        );
        $this->add_control(
            'subsc_bgoverlay',
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
            'subsc_ov_bg_color', [
                'label'     => esc_html__('Overlay Color', 'mosh-companion'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mosh-subscribe-newsletter-area.bg-overlay:after' => 'background-color: {{VALUE}};',
                ],
                'condition' => [ 
                    'subsc_bgoverlay' => 'yes',
                ]
            ]
        );

        $this->end_controls_section();

	}

	protected function render() {

    // mc validation
    wp_enqueue_script( 'mc-validate');
            

    $settings = $this->get_settings();
    $overlay = '';
    if( !empty( $settings['subsc_bgoverlay'] ) ){
        $overlay = 'bg-overlay';
    }

    $animation = ( !empty( $settings['form_animation'] ) && $settings['form_animation'] != 'none'  ) ? $settings['form_animation'] : '';
    //
    $bgUrl = '';
    if( !empty( $settings['subsc_bg_image']['url'] ) ){
        $bgUrl = $settings['subsc_bg_image']['url'];
    }

    // Background style
    $bgstyle = '';
    if( !empty( $settings['style_bg'] ) && 'style_01' != $settings['style_bg'] ){
        $bgstyle = ' bg-fixed';
    }
    ?>

    <section class="mosh-subscribe-newsletter-area bg-img <?php echo esc_attr( $overlay.$bgstyle ); ?> section_padding_100" <?php echo mosh_inline_bg_img( esc_url( $bgUrl ) ); ?>>
        <div class="container">
            <div class="row">
                <div class="col-12"> 
                    <div class="subscribe-newsletter-content text-center wow <?php echo esc_attr( $animation ); ?>" data-wow-delay=".5s">
                        <?php 
                        // Sub title
                        if( !empty( $settings['subtitle'] ) ){
                            echo mosh_paragraph_tag(
                                array(
                                    'text' => esc_html( $settings['subtitle'] )
                                )
                            );
                        }
                        // Title 
                        if( !empty( $settings['title'] ) ){
                            echo mosh_heading_tag(
                                array(
                                    'tag' => 'h2',
                                    'text' => esc_html( $settings['title'] ) 
                                )
                            );
                        }
 
                        // Action url 
                        $url         = ( !empty( $settings['acurl']['url'] ) ) ? $settings['acurl']['url'] : '';
                        $placeholder = ( !empty( $settings['placetext'] ) ) ? $settings['placetext'] : '';
                        $btntext     = ( !empty( $settings['btntext'] ) ) ? $settings['btntext'] : '';
                        ?>
                        <form action="<?php echo esc_url( $url ); ?>" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                            <input type="email" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="<?php echo esc_attr( $placeholder ); ?>">

                            <div id="mce-responses" class="clear">
                                <div class="response" id="mce-error-response" style="display:none"></div>
                                <div class="response" id="mce-success-response" style="display:none"></div>
                            </div>    
                            <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                            <button type="submit" name="subscribe" id="mc-embedded-subscribe"><?php echo esc_html( $btntext ); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <?php

        }
	
}
