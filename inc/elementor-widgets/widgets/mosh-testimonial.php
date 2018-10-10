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
 * Mosh elementor testimonial section widget.
 *
 * @since 1.0
 */
class Mosh_Testimonial extends Widget_Base {

	public function get_name() {
		return 'mosh-testimonial';
	}

	public function get_title() {
		return __( 'Testimonial', 'mosh-companion' );
	}

	public function get_icon() {
		return 'eicon-testimonial-carousel';
	}

	public function get_categories() {
		return [ 'mosh-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  Testimonial Section Heading content ------------------------------
        $this->start_controls_section(
            'testimonial_sectionheading',
            [
                'label' => __( 'Testimonial Section Heading', 'mosh-companion' ),
            ]
        );
        $this->add_control(
            'sect_title', [
                'label' => __( 'Title', 'mosh-companion' ),
                'type' => Controls_Manager::TEXT,

            ]
        );
        $this->add_control(
            'sect_subtitle', [
                'label' => __( 'Sub Title', 'mosh-companion' ),
                'type' => Controls_Manager::TEXT,

            ]
        );

        $this->end_controls_section(); // End testimonial section heading content
		// ----------------------------------------  Testimonial content ------------------------------
		$this->start_controls_section(
			'testimonial_content',
			[
				'label' => __( 'Testimonial content', 'mosh-companion' ),
			]
		);
		$this->add_control(
            'moshtestimonial', [
                'label'         => __( 'Create Quote', 'mosh-companion' ),
                'type'          => Controls_Manager::REPEATER,
                'title_field'   => '{{{ label }}}',
                'fields'  => [
                    [
                        'name'        => 'label',
                        'label'       => __( 'Quote Author Name', 'mosh-companion' ),
                        'label_block' => true,
                        'type'        => Controls_Manager::TEXT,
                        'default'     => esc_html__( 'Jim Morison', 'mosh-companion' )
                    ],
                    [
                        'name'    => 'designation',
                        'label'   => __( 'Author Designation', 'mosh-companion' ),
                        'type'    => Controls_Manager::TEXT,
                        'default' => esc_html__( 'Company CEO', 'mosh-companion' )
                    ],
                    [
                        'name'      => 'quotetext',
                        'label'     => __( 'Quote Text', 'mosh-companion' ),
                        'type'      => Controls_Manager::TEXTAREA,
                        'default'   => esc_html__( 'Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit am et tellus blandit. Etiam nec odio vestibul. Etiam nec odio vestibulum est mat tis effic iturut magna. Pellentesque sit amet tellus blandit.', 'mosh-companion' )
                    ],
                    [
                        'name'  => 'img',
                        'label' => __( 'Quote Author image', 'mosh-companion' ),
                        'type'  => Controls_Manager::MEDIA,
                    ]

                ],
            ]
		);
		$this->end_controls_section(); // End testimonial content


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
                'selectors' => [
                    '{{WRAPPER}} .mosh-clients-testimonials-area .section-heading h2' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_title',
                'selector' => '{{WRAPPER}} .mosh-clients-testimonials-area .section-heading h2',
            ]
        );
        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(), [
                'name' => 'text_shadow_title',
                'selector' => '{{WRAPPER}} .mosh-clients-testimonials-area .section-heading h2',
            ]
        );
        $this->end_controls_section();


        //------------------------------ Style Sub Title ------------------------------
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
                    '{{WRAPPER}} .mosh-clients-testimonials-area .section-heading p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_subtitle',
                'selector' => '{{WRAPPER}} .mosh-clients-testimonials-area .section-heading p',
            ]
        );
        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(), [
                'name' => 'text_shadow_subtitle',
                'selector' => '{{WRAPPER}} .mosh-clients-testimonials-area .section-heading p',
            ]
        );
        $this->end_controls_section();



        //------------------------------ Style Content ------------------------------
        $this->start_controls_section(
            'style_content', [
                'label' => __( 'Content Color', 'mosh-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_contentcolorone', [
                'label' => __( 'Color for author name, nav and quote.', 'mosh-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-content span'   => 'color: {{VALUE}};',
                    '{{WRAPPER}} .testimonials-slides:before' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .testimonials-slides:after'  => 'color: {{VALUE}};',
                    '{{WRAPPER}} .single-testimonial-area:hover .testimonials-meta > h6'  => 'color: {{VALUE}};',
                    '{{WRAPPER}} .testimonials-slides .center .single-testimonial-area .testimonials-meta > h6'  => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'color_contentcolortwo', [
                'label' => __( 'Color for designation and quote text.', 'mosh-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-content p' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .testimonials-meta > p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'color_contentcolorthree', [
                'label' => __( 'Color for inactive author name.', 'mosh-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-testimonial-area .testimonials-meta > h6' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_section();


	}

	protected function render() {

    $settings = $this->get_settings();

    ?>
    <section class="mosh-clients-testimonials-area section_padding_100">
        <div class="container">
            <?php 
            if( !empty( $settings['sect_title'] ) || !empty( $settings['sect_subtitle'] ) ):
            ?>
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center">
                        <?php 
                        // Sub title
                        if( !empty( $settings['sect_subtitle'] ) ){
                            echo mosh_paragraph_tag(
                                array(
                                    'text' => esc_html( $settings['sect_subtitle'] )
                                )
                            );
                        }
                        // Title
                        if( !empty( $settings['sect_title'] ) ){
                            echo mosh_heading_tag(
                                array(
                                    'tag' => 'h2',
                                    'text' => esc_html( $settings['sect_title'] ),
                                )
                            );
                        }
                        ?>
                    </div>
                </div>
            </div>
            <?php 
            endif;
            ?>

            <div class="row">
                <div class="col-12">
                    <div class="testimonials-slides owl-carousel">
                        <?php
                        //  Single Testimonial Area
                        if( is_array( $settings['moshtestimonial'] ) && count( $settings['moshtestimonial'] ) > 0 ):
                            foreach( $settings['moshtestimonial'] as $quote ):
                        ?>
                        <div class="single-testimonial-area text-center">
                            <div class="testimonial-content">
                                <span><?php esc_html_e( '"', 'mosh-companion' ) ?></span>
                                <?php 
                                if( !empty( $quote['quotetext'] ) ){
                                    echo mosh_paragraph_tag(
                                        array(
                                            'text' => esc_html( $quote['quotetext'] )
                                        )
                                    );
                                }
                                ?>
                            </div>
                            <div class="testimonials-meta">
                                <?php 
                                // Image
                                if( !empty( $quote['img']['url'] ) ){
                                    echo '<div class="testimonial-thumb bg-img" '.mosh_inline_bg_img( esc_url( $quote['img']['url'] ) ).'></div>';
                                }
                                // 
                                if( !empty( $quote['label'] ) ){
                                    echo mosh_heading_tag(
                                        array(
                                            'tag'  => 'h6',
                                            'text' => esc_html( $quote['label'] )
                                        )
                                    );
                                }
                                //
                                if( !empty( $quote['designation'] ) ){
                                    echo mosh_paragraph_tag(
                                        array(
                                            'text' => esc_html( $quote['designation'] )
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
                </div>
            </div>

        </div>
    </section>
    <?php

        }
	
}
