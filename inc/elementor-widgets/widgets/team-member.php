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
 * Mosh elementor Team Member section widget.
 *
 * @since 1.0
 */
class Mosh_Team_Member extends Widget_Base {

	public function get_name() {
		return 'mosh-team-member';
	}

	public function get_title() {
		return __( 'Team Member', 'mosh-companion' );
	}

	public function get_icon() {
		return 'eicon-person';
	}

	public function get_categories() {
		return [ 'mosh-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  Team Section Top content ------------------------------
        $this->start_controls_section(
            'team_sectcontent',
            [
                'label' => __( 'Team Section Top', 'mosh-companion' ),
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
        $this->add_control(
            'sect_shortdesc', [
                'label' => __( 'Short Descriptions', 'mosh-companion' ),
                'type' => Controls_Manager::TEXTAREA,

            ]
        );
        $this->end_controls_section(); // End section top content
		// ----------------------------------------  Team Member content ------------------------------
		$this->start_controls_section(
			'team_memcontent',
			[
				'label' => __( 'Team Member', 'mosh-companion' ),
			]
		);
		$this->add_control(
            'teamslider', [
                'label' => __( 'Create Team Member', 'mosh-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name' => 'label',
                        'label' => __( 'Name', 'mosh-companion' ),
                        'type' => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => 'Name'
                    ],
                    [
                        'name' => 'desig',
                        'label' => __( 'Designation', 'mosh-companion' ),
                        'type' => Controls_Manager::TEXT,
                    ],
                    [
                        'name' => 'desc',
                        'label' => __( 'Descriptions', 'mosh-companion' ),
                        'type' => Controls_Manager::TEXTAREA,
                    ],
                    [
                        'name' => 'img',
                        'label' => __( 'Photo', 'mosh-companion' ),
                        'type' => Controls_Manager::MEDIA,
                    ],
                    [
                        'name' => 'fburl',
                        'label' => __( 'Facebook Url', 'mosh-companion' ),
                        'type' => Controls_Manager::URL,
                        'show_external' => false,
                    ],
                    [
                        'name' => 'twiturl',
                        'label' => __( 'Twitter Url', 'mosh-companion' ),
                        'type' => Controls_Manager::URL,
                        'show_external' => false,
                    ],
                    [
                        'name' => 'pinturl',
                        'label' => __( 'Pinterest Url', 'mosh-companion' ),
                        'type' => Controls_Manager::URL,
                        'show_external' => false,
                    ],
                    [
                        'name' => 'driburl',
                        'label' => __( 'Dribbble Url', 'mosh-companion' ),
                        'type' => Controls_Manager::URL,
                        'show_external' => false,
                    ],
                ],
            ]
		);

		$this->end_controls_section(); // End Team Member content

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
					'{{WRAPPER}} .mosh-team-area .section-heading h2' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'typography_title',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .mosh-team-area .section-heading h2',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(), [
				'name' => 'text_shadow_title',
				'selector' => '{{WRAPPER}} .mosh-team-area .section-heading h2',
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
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .mosh-team-area .section-heading p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_subtitle',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .mosh-team-area .section-heading p',
            ]
        );
        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(), [
                'name' => 'text_shadow_subtitle',
                'selector' => '{{WRAPPER}} .mosh-team-area .section-heading p',
            ]
        );
        $this->end_controls_section();

        //------------------------------ Style Short Description ------------------------------
        $this->start_controls_section(
            'style_shortdesc', [
                'label' => __( 'Style Description', 'mosh-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_shortdesc', [
                'label' => __( 'Text Color', 'mosh-companion' ),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .mosh-team-area .section-heading h5' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_shortdesc',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .mosh-team-area .section-heading h5',
            ]
        );
        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(), [
                'name' => 'text_shadow_shortdesc',
                'selector' => '{{WRAPPER}} .mosh-team-area .section-heading h5',
            ]
        );
        $this->end_controls_section();

		//------------------------------ Style Team Member Content ------------------------------
		$this->start_controls_section(
			'style_teaminfo', [
				'label' => __( 'Style Team Member Info', 'mosh-companion' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        $this->add_control(
            'team_imghov',
            [
                'label' => __( 'Member Image Hover Color', 'mosh-companion' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'color_imghov', [
                'label' => __( 'Image Hover Color', 'mosh-companion' ),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .team-thumbnail:after' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        //
        $this->add_control(
            'team_nameopt',
            [
                'label' => __( 'Name Style', 'mosh-companion' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'color_name', [
                'label' => __( 'Name Color', 'mosh-companion' ),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .team-meta-info h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_name',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .team-meta-info h4',
            ]
        );
        //
        $this->add_control(
            'team_desigopt',
            [
                'label' => __( 'Designation Style', 'mosh-companion' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'color_desigopt', [
                'label' => __( 'Designation Color', 'mosh-companion' ),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .team-meta-info span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_desighovopt', [
                'label' => __( 'Designation Hover Color', 'mosh-companion' ),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .single-team-slide:hover .team-meta-info span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_desigopt',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .team-meta-info span',
            ]
        );

        //
        $this->add_control(
            'team_discopt',
            [
                'label' => __( 'Description Style', 'mosh-companion' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'color_discopt', [
                'label' => __( 'Description Color', 'mosh-companion' ),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .team-meta-info p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_discopt',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .team-meta-info p',
            ]
        );

        //
        $this->add_control(
            'team_iconopt',
            [
                'label' => __( 'Icon Style', 'mosh-companion' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'color_iconopt', [
                'label' => __( 'Icon Color', 'mosh-companion' ),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .team-social-info > a' => 'color: {{VALUE}};',
                ],
            ]
        );
		$this->add_control(
			'color_iconhovopt', [
				'label' => __( 'Icon Hover Color', 'mosh-companion' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .team-social-info > a:hover' => 'color: {{VALUE}};',
				],
			]
		);
        $this->add_control(
            'typography_iconopt',
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
                    '{{WRAPPER}} .team-social-info > a' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

		$this->end_controls_section();

	}

	protected function render() {

    $settings = $this->get_settings();

    ?>

    <section class="mosh-team-area section_padding_100">
        <div class="container">
            <?php
            if( !empty( $settings['sect_title'] ) || !empty( $settings['sect_subtitle'] ) || $settings['sect_shortdesc'] ):
            ?>
            <div class="row justify-content-center">
                <div class="col-12 col-md-10">
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
                                    'tag'  => 'h2',
                                    'text' => esc_html( $settings['sect_title'] )
                                )
                            );
                        }
                        // Short Description
                        if( !empty( $settings['sect_shortdesc'] ) ){
                            echo mosh_heading_tag(
                                array(
                                    'tag'  => 'h5',
                                    'text' => esc_html( $settings['sect_shortdesc'] ),
                                    'class' => 'mt-30'
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
                    <div class="mosh-team-slides owl-carousel">
                        <?php 
                        if( is_array( $settings['teamslider'] ) && count( $settings['teamslider'] ) > 0 ):
                            foreach( $settings['teamslider'] as $team ):

                        ?>
                            <div class="single-team-slide text-center">
                                <?php 
                                // Thumbnail
                                if( !empty( $team['img']['url'] ) ){
                                    echo '<div class="team-thumbnail">';
                                        echo mosh_img_tag(
                                            array(
                                                'url' => esc_url( $team['img']['url'] )
                                            )
                                        );
                                    echo '</div>';
                                }
                                ?>
                                <!-- Meta Info -->
                                <div class="team-meta-info">
                                    <?php 
                                    if( !empty( $team['label'] ) ){
                                        echo mosh_heading_tag(
                                            array(
                                                'tag'  => 'h4',
                                                'text' => esc_html( $team['label'] )
                                            )
                                        );
                                    }
                                    // 
                                    if( !empty( $team['desig'] ) ){
                                        echo mosh_other_tag(
                                            array(
                                                'tag'  => 'span',
                                                'text' => esc_html( $team['desig'] )
                                            )
                                        );
                                    }
                                    // 
                                    if( !empty( $team['desc'] ) ){
                                        echo mosh_paragraph_tag(
                                            array(
                                                'text' => esc_html( $team['desc'] )
                                            )
                                        );
                                    }
                                    ?>
                                </div>
                                <?php 
                                if( !empty( $team['pinturl']['url'] ) || $team['fburl']['url'] || $team['twiturl']['url'] || $team['driburl']['url']  ):
                                ?>
                                <div class="team-social-info">
                                    <?php 
                                    // Pinterest Social Icon
                                    if( !empty( $team['pinturl']['url'] ) ){

                                        echo '<a href="'.esc_url( $team['pinturl']['url'] ).'"><i class="fa fa-pinterest" aria-hidden="true"></i></a>';
                                    }
                                    // Facebook Social Icon
                                    if( !empty( $team['fburl']['url'] ) ){
                                        echo '<a href="'.esc_url( $team['fburl']['url'] ).'"><i class="fa fa-facebook" aria-hidden="true"></i></a>';
                                    }
                                    // Twitter Social Icon
                                    if( !empty( $team['twiturl']['url'] ) ){
                                        echo '<a href="'.esc_url( $team['twiturl']['url'] ).'"><i class="fa fa-twitter" aria-hidden="true"></i></a>';
                                    }
                                    // Dribbble Social Icon
                                    if( !empty( $team['driburl']['url'] ) ){
                                        echo '<a href="'.esc_url( $team['driburl']['url'] ).'"><i class="fa fa-dribbble" aria-hidden="true"></i></a>';
                                    }
                                    ?>
                                    
                                </div>
                                <?php 
                                endif;
                                ?>
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
