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
 * Mosh elementor Contact section widget.
 *
 * @since 1.0
 */
class Mosh_Contact extends Widget_Base {

	public function get_name() {
		return 'mosh-contact';
	}

	public function get_title() {
		return __( 'Contact Section', 'mosh-companion' );
	}

	public function get_icon() {
		return 'eicon-tel-field';
	}

	public function get_categories() {
		return [ 'mosh-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  Contact form settings ------------------------------
        $this->start_controls_section(
            'form_settings',
            [
                'label' => __( 'Contact form settings', 'mosh-companion' ),
            ]
        );
        $this->add_control(
            'form_title', [
                'label' => __( 'Form Title', 'mosh-companion' ),
                'type' => Controls_Manager::TEXT,

            ]
        );
        $this->add_control(
            'form_shortcode', [
                'label' => __( 'Contact Form 7 Shortcode ', 'mosh-companion' ),
                'type' => Controls_Manager::TEXT,

            ]
        );

        $this->end_controls_section(); // End contact form settings

        // ----------------------------------------  Contact Info ------------------------------
        $this->start_controls_section(
            'contact_info',
            [
                'label' => __( 'Contact Information', 'mosh-companion' ),
            ]
        );
        $this->add_control(
            'cinfo_title', [
                'label' => __( 'Title', 'mosh-companion' ),
                'type' => Controls_Manager::TEXT,
            ]
        );
        $this->add_control(
            'contactinfo', [
                'label'         => __( 'Contact Info', 'mosh-companion' ),
                'type'          => Controls_Manager::REPEATER,
                'title_field'   => '{{{ label }}}',
                'fields'  => [
                    [
                        'name'        => 'label',
                        'label'       => __( 'Address', 'mosh-companion' ),
                        'label_block' => true,
                        'type'        => Controls_Manager::WYSIWYG,
                        'default'     => esc_html__( 'You contact information', 'mosh-companion' )
                    ],
                    [
                        'name'  => 'img',
                        'label' => __( 'Image Icon', 'mosh-companion' ),
                        'type'  => Controls_Manager::MEDIA,
                    ]

                ],
            ]
        );
        $this->end_controls_section(); // End contact info

		// ----------------------------------------  Contact Social Media ------------------------------
		$this->start_controls_section(
			'social_media',
			[
				'label' => __( 'Social Media', 'mosh-companion' ),
			]
		);
		$this->add_control(
            'socialmedia', [
                'label'         => __( 'Social Media', 'mosh-companion' ),
                'type'          => Controls_Manager::REPEATER,
                'title_field'   => '{{{ label }}}',
                'fields'  => [
                    [
                        'name'        => 'label',
                        'label'       => __( 'Title', 'mosh-companion' ),
                        'label_block' => true,
                        'type'        => Controls_Manager::TEXT,
                        'default'     => esc_html__( 'Social title', 'mosh-companion' )
                    ],
                    [
                        'name'    => 'icon',
                        'label'   => __( 'Social Icon', 'mosh-companion' ),
                        'type'    => Controls_Manager::ICON,
                    ],
                    [
                        'name'  => 'url',
                        'label' => __( 'Social Url', 'mosh-companion' ),
                        'type'  => Controls_Manager::URL,
                    ]

                ],
            ]
		);
		$this->end_controls_section(); // End contact info


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
            'color_title', [
                'label' => __( 'Title Color', 'mosh-companion' ),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .contact-area h2' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_title',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .contact-area h2',
            ]
        );
        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(), [
                'name' => 'text_shadow_title',
                'selector' => '{{WRAPPER}} .contact-area h2',
            ]
        );
        $this->end_controls_section();


        //------------------------------ Style content color ------------------------------
        $this->start_controls_section(
            'style_content', [
                'label' => __( 'Style Content', 'mosh-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_content', [
                'label' => __( 'Content Color', 'mosh-companion' ),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .single-contact-info p' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .contact-form-area .form-control' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_content',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .single-contact-info p',
            ]
        );
        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(), [
                'name' => 'text_shadow_content',
                'selector' => '{{WRAPPER}} .single-contact-info p',
            ]
        );
        $this->end_controls_section();


        //------------------------------ Style Social Icon ------------------------------
        $this->start_controls_section(
            'style_socialicon', [
                'label' => __( 'Style Social Icon', 'mosh-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_icon', [
                'label' => __( 'Icon Color', 'mosh-companion' ),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .contact-social-info > a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_hovericon', [
                'label' => __( 'Icon Hover Color', 'mosh-companion' ),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .contact-social-info > a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(), [
                'name' => 'text_shadow_icon',
                'selector' => '{{WRAPPER}} .contact-social-info > a .fa',
            ]
        );
        $this->end_controls_section();


	}

	protected function render() {

    $settings = $this->get_settings();

    ?>
    <section class="contact-area section_padding_100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8">
                    <div class="contact-form-area">
                        <?php 
                        //
                        if( !empty( $settings['form_title'] ) ){
                            echo mosh_heading_tag(
                                array(
                                    'tag' => 'h2',
                                    'text' => esc_html( $settings['form_title'] )
                                )
                            );
                        }
                        //
                        if( !empty( $settings['form_shortcode'] ) ){
                            echo do_shortcode( $settings['form_shortcode'] );
                        }
                      
                        ?>
                    </div>
                </div>
                <!-- Contact Information -->
                <div class="col-12 col-md-4">
                    <div class="contact-information">
                        <?php 
                        if( !empty( $settings['cinfo_title'] ) ){
                            echo mosh_heading_tag(
                                array(
                                    'tag'  => 'h2',
                                    'text' => esc_html( $settings['cinfo_title'] ),
                                )
                            );
                        }
                        //
                        if( is_array( $settings['contactinfo'] ) && count( $settings['contactinfo'] ) > 0  ):
                            foreach( $settings['contactinfo'] as $contactinfo ):

                        ?>
                        <div class="single-contact-info d-flex">
                            <?php 
                            // Icon
                            if( !empty( $contactinfo['img']['url'] ) ){
                                echo '<div class="contact-icon mr-15">';
                                    echo mosh_img_tag(
                                        array(
                                            'url' => esc_url( $contactinfo['img']['url'] )
                                        )
                                    );
                                echo '</div>';
                            }
                            //
                            if( !empty( $contactinfo['label'] ) ){
                                echo mosh_get_textareahtml_output( $contactinfo['label'] );
                            }
                            ?>
                        </div>
                        
                        <?php 
                            endforeach;
                        endif;
                        // Social Icon
                        if( is_array( $settings['socialmedia'] ) && count( $settings['socialmedia'] ) > 0   ):
                        ?>
                        <div class="contact-social-info mt-50">
                            <?php 
                            foreach( $settings['socialmedia'] as $social ){
                                $target = '';
                                if( !empty( $social['url']['is_external'] ) ){
                                    $target = '_blank';
                                }


                                echo mosh_anchor_tag(
                                    array(
                                        'url'    => esc_url( $social['url']['url'] ),
                                        'text'   => '<i class="'.esc_attr( $social['icon'] ).'"></i>',
                                        'target' => esc_attr( $target )
                                    )
                                );
                            }
                            ?>
                        </div>
                        <?php 
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php

        }
	
}
