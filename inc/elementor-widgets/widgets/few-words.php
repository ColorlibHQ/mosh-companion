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
 * Mosh elementor few words section widget.
 *
 * @since 1.0
 */
class Mosh_Few_Words extends Widget_Base {

	public function get_name() {
		return 'mosh-few-words';
	}

	public function get_title() {
		return __( 'Few Words', 'mosh-companion' );
	}

	public function get_icon() {
		return 'eicon-post-excerpt';
	}

	public function get_categories() {
		return [ 'mosh-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  Few Words content ------------------------------
        $this->start_controls_section(
            'fewwords_content',
            [
                'label' => __( 'Few Words', 'mosh-companion' ),
            ]
        );
        $this->add_control(
            'fewwords_subtitle',
            [
                'label' => esc_html__( 'Sub Title', 'mosh-companion' ),
                'type' => Controls_Manager::TEXT,
            ]
        );
        $this->add_control(
            'fewwords_title',
            [
                'label' => esc_html__( 'Title', 'mosh-companion' ),
                'type'  => Controls_Manager::TEXT,
            ]
        );
        $this->add_control(
            'fewwords_desc',
            [
                'label' => esc_html__( 'Descriptions', 'mosh-companion' ),
                'type'  => Controls_Manager::WYSIWYG,
            ]
        );
        $this->end_controls_section(); // End few words content

        // ----------------------------------------  Few Words Speaker Info ------------------------------
        $this->start_controls_section(
            'fewwords_speakerinfo',
            [
                'label' => __( 'Speaker Info', 'mosh-companion' ),
            ]
        );
        $this->add_control(
            'fewwords_speakername',
            [
                'label' => esc_html__( 'Name', 'mosh-companion' ),
                'type' => Controls_Manager::TEXT,
            ]
        );
        $this->add_control(
            'fewwords_speakerdesig',
            [
                'label' => esc_html__( 'Designation', 'mosh-companion' ),
                'type'  => Controls_Manager::TEXT,
            ]
        );
        $this->add_control(
            'fewwords_speakerphoto',
            [
                'label' => esc_html__( 'Photo', 'mosh-companion' ),
                'type'  => Controls_Manager::MEDIA,
            ]
        );
        $this->end_controls_section(); // End speaker info 


        // ----------------------------------------  Featured image ------------------------------
        $this->start_controls_section(
            'fewwords_featureding',
            [
                'label' => __( 'Featured Image', 'mosh-companion' ),
            ]
        );
        $this->add_control(
            'fewwords_fimg',
            [
                'label' => esc_html__( 'Featured Image', 'mosh-companion' ),
                'type' => Controls_Manager::MEDIA,
            ]
        );

        $this->end_controls_section(); // End featured image

		// ----------------------------------------  Content Settings ------------------------------
		$this->start_controls_section(
			'fewwords_settings',
			[
				'label' => __( 'Content Settings', 'mosh-companion' ),
			]
		);
        $this->add_control(
            'fewwords_contentpos',
            [
                'label'         => __( 'Content Position', 'mosh-companion' ),
                'type'          => \Elementor\Controls_Manager::SWITCHER,
                'label_on'      => __( 'Left', 'mosh-companion' ),
                'label_off'     => __( 'Right', 'mosh-companion' ),
                'return_value'  => 'yes',
                'default'       => 'yes',
            ]
        );

		$this->end_controls_section(); // End content settings


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
                    '{{WRAPPER}} .few-words-text .section-heading h2' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .few-words-text .ceo-name h6' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_title',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .few-words-text .section-heading h2',
            ]
        );
        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(), [
                'name' => 'text_shadow_title',
                'selector' => '{{WRAPPER}} .few-words-text .section-heading h2',
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
                    '{{WRAPPER}} .few-words-text .section-heading p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_subtitle',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .few-words-text .section-heading p',
            ]
        );
        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(), [
                'name' => 'text_shadow_subtitle',
                'selector' => '{{WRAPPER}} .few-words-text .section-heading p',
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
                    '{{WRAPPER}} .few-words-text p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_desc',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .few-words-text p',
            ]
        );
        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(), [
                'name' => 'text_shadow_desc',
                'selector' => '{{WRAPPER}} .few-words-text p',
            ]
        );
        $this->end_controls_section();

		//------------------------------ Style Background ------------------------------
		$this->start_controls_section(
			'style_bg', [
				'label' => __( 'Style Background', 'mosh-companion' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        $this->add_control(
            'color_bg', [
                'label' => __( 'Background Color', 'mosh-companion' ),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .few-words-from-ceo .few-words-contents' => 'background-color: {{VALUE}};',
                ],
            ]
        );
		$this->add_control(
			'image_bg', [
				'label' => __( 'Background Image', 'mosh-companion' ),
				'type' => Controls_Manager::MEDIA,
            ]
		);

		$this->end_controls_section();

	}

	protected function render() {

    $settings = $this->get_settings();
    // Content Position
    $pos = 'order-1';
    if( !empty( $settings['fewwords_contentpos'] ) ){
        $pos = '';
    } 
    // Background Image
    $bg = '';
    if( !empty( $settings['image_bg']['url'] )){
        $bg = $settings['image_bg']['url'];
    } 

    ?>
    <section class="few-words-from-ceo d-md-flex">
        <div class="few-words-contents d-flex align-items-center justify-content-center wow fadeInLeftBig <?php echo esc_attr( $pos ); ?>" data-wow-delay="0.1s" <?php echo mosh_inline_bg_img( esc_url( $bg ) ); ?>>
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-11 col-lg-9 col-xl-7">
                        <div class="few-words-text">
                            <?php 
                            if( !empty( $settings['fewwords_subtitle'] ) || !empty( $settings['fewwords_title'] ) ):
                            ?>
                               <div class="section-heading">
                                    <?php 
                                    // Sub title
                                    if( !empty( $settings['fewwords_subtitle'] ) ){
                                        echo mosh_paragraph_tag(
                                            array(
                                                'text' => esc_html( $settings['fewwords_subtitle'] )
                                            )
                                        );
                                    } 
                                    // Title
                                    if( !empty( $settings['fewwords_title'] ) ){
                                        echo mosh_heading_tag(
                                            array(
                                                'tag'  => 'h2',
                                                'text' => esc_html( $settings['fewwords_title'] )
                                            )
                                        );
                                    }
                                    ?>
                                </div>
                            <?php 
                            endif;
                            //
                            if( !empty( $settings['fewwords_desc'] ) ){
                                echo mosh_get_textareahtml_output( $settings['fewwords_desc'] );
                            }
                            // Speaker Info
                            if( !empty( $settings['fewwords_speakername'] ) || !empty( $settings['fewwords_speakerdesig'] ) ):
                                  
                            ?>
                            <div class="ceo-meta-data d-flex align-items-center mt-50">
                                <?php 
                                // Image
                                if( !empty( $settings['fewwords_speakerphoto']['url'] ) ){
                                    
                                    echo '<div class="ceo-thumb bg-img" '.mosh_inline_bg_img( esc_url( $settings['fewwords_speakerphoto']['url'] ) ).'></div>';
                                }
                                ?>
                                
                                <div class="ceo-name">
                                    <?php 
                                    // Speaker Name
                                    if( !empty( $settings['fewwords_speakername'] ) ){
                                        echo mosh_heading_tag(
                                            array(
                                                'tag'  => 'h6',
                                                'text' => esc_html( $settings['fewwords_speakername'] )
                                            )
                                        );
                                    }
                                    // Speaker designation 
                                    if( !empty( $settings['fewwords_speakerdesig'] ) ){
                                        echo mosh_paragraph_tag(
                                            array(
                                                'text' => esc_html( $settings['fewwords_speakerdesig'] )
                                            )
                                        );
                                    }
                                    ?>
                                </div>
                            </div>
                            <?php 
                            endif;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php 
        // Feature Image
        if( !empty( $settings['fewwords_fimg']['url'] ) ){
            echo '<div class="few-words-thumb bg-img wow fadeInRightBig" data-wow-delay="1.1s" style="background-image: url('.esc_url( $settings['fewwords_fimg']['url'] ).');"></div>';
        }
        ?>
    </section>

    <?php

        }
	
}
