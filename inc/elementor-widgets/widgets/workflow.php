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
 * Mosh elementor workflow section widget.
 *
 * @since 1.0
 */
class Mosh_Workflow extends Widget_Base {

	public function get_name() {
		return 'mosh-workflow';
	}

	public function get_title() {
		return __( 'Workflow', 'mosh-companion' );
	}

	public function get_icon() {
		return 'eicon-elementor';
	}

	public function get_categories() {
		return [ 'mosh-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();
        // ----------------------------------------  Workflow Section Heading ---------------------
        $this->start_controls_section(
            'workflow_heading',
            [
                'label' => __( 'Workflow Heading', 'mosh-companion' ),
            ]
        );
        $this->add_control(
            'wfh_subtitle', [
                'label' => __( 'Sub Title', 'mosh-companion' ),
                'type' => Controls_Manager::TEXT,
            ]
        );
        $this->add_control(
            'wfh_title', [
                'label' => __( 'Title', 'mosh-companion' ),
                'type' => Controls_Manager::TEXT,
            ]
        );
        $this->end_controls_section(); // End section heading content

        // ----------------------------------------  Workflow content ------------------------------
        $this->start_controls_section(
            'workflow_content',
            [
                'label' => __( 'Workflow Content', 'mosh-companion' ),
            ]
        );
        $this->add_control(
            'workflowcontent', [
                'label' => __( 'Create Workflow', 'mosh-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name' => 'label',
                        'label' => __( 'Number', 'mosh-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => ''
                    ],
                    [
                        'name' => 'title',
                        'label' => __( 'Title', 'mosh-companion' ),
                        'type' => Controls_Manager::TEXT,
                    ],
                    [
                        'name' => 'desc',
                        'label' => __( 'Descriptions', 'mosh-companion' ),
                        'type' => Controls_Manager::TEXTAREA,
                    ]
                ],
            ]
        );
        $this->end_controls_section(); // End workflow content

		// ----------------------------------------  Workflow Featured Image ------------------------------
		$this->start_controls_section(
			'workflow_img',
			[
				'label' => __( 'Workflow Image', 'mosh-companion' ),
			]
		);
        $this->add_control(
            'wfh_img', [
                'label' => __( 'Image', 'mosh-companion' ),
                'type' => Controls_Manager::MEDIA,
            ]
        );
		$this->end_controls_section(); // End workflow content


        //------------------------------ Style section heading Title ------------------------------
        $this->start_controls_section(
            'style_shtitle', [
                'label' => __( 'Style Section Heading Title', 'mosh-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_shtitle', [
                'label' => __( 'Title Color', 'mosh-companion' ),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .mosh-workflow-area .section-heading > h2' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_shtitle',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .mosh-workflow-area .section-heading > h2',
            ]
        );
        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(), [
                'name' => 'text_shadow_shtitle',
                'selector' => '{{WRAPPER}} .mosh-workflow-area .section-heading > h2',
            ]
        );
        $this->end_controls_section();


        //------------------------------ Style section heading sub title ------------------------------
        $this->start_controls_section(
            'style_shsubtitle', [
                'label' => __( 'Style Section Heading Sub Title', 'mosh-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_shsubtitle', [
                'label' => __( 'Sub Title Color', 'mosh-companion' ),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .mosh-workflow-area .section-heading > p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_shsubtitle',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .mosh-workflow-area .section-heading > p',
            ]
        );
        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(), [
                'name' => 'text_shadow_shsubtitle',
                'selector' => '{{WRAPPER}} .mosh-workflow-area .section-heading > p',
            ]
        );
        $this->end_controls_section();

        //------------------------------ Style Workflow Number ------------------------------
        $this->start_controls_section(
            'style_wftnumber', [
                'label' => __( 'Style Workflow Number', 'mosh-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_wftnumber', [
                'label' => __( 'Number Color', 'mosh-companion' ),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .single-workflow-area > h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'color_wfthovnumber', [
                'label' => __( 'Hover Number Color', 'mosh-companion' ),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .single-workflow-area:hover h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'color_wftbgnumber', [
                'label' => __( 'Number Background Color', 'mosh-companion' ),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .single-workflow-area h2' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'color_wfthovbgnumber', [
                'label' => __( 'Hover Number Background Color', 'mosh-companion' ),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .single-workflow-area:hover h2' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_wftnumber',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .single-workflow-area > h2',
            ]
        );
        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(), [
                'name' => 'text_shadow_wftnumber',
                'selector' => '{{WRAPPER}} .single-workflow-area > h2',
            ]
        );
        $this->end_controls_section();

        //------------------------------ Style Workflow Title ------------------------------
        $this->start_controls_section(
            'style_wftitle', [
                'label' => __( 'Style Workflow Title', 'mosh-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_wftitle', [
                'label'   => __( 'Title Color', 'mosh-companion' ),
                'type'    => Controls_Manager::COLOR,
                'scheme'  => [
                    'type'     => Scheme_Color::get_type(),
                    'value'    => Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .workflow-content h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_wftitle',
                'scheme'    => Scheme_Typography::TYPOGRAPHY_1,
                'selector'  => '{{WRAPPER}} .workflow-content h4',
            ]
        );
        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(), [
                'name'     => 'text_shadow_wftitle',
                'selector' => '{{WRAPPER}} .workflow-content h4',
            ]
        );
        $this->end_controls_section();

		//------------------------------ Style Workflow Description ------------------------------
		$this->start_controls_section(
			'style_wfdesc', [
				'label' => __( 'Style Workflow Description', 'mosh-companion' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'color_wfdesc', [
				'label'   => __( 'Description Color', 'mosh-companion' ),
				'type'    => Controls_Manager::COLOR,
				'scheme'  => [
					'type'     => Scheme_Color::get_type(),
					'value'    => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .workflow-content p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name'      => 'typography_wfdesc',
				'scheme'    => Scheme_Typography::TYPOGRAPHY_1,
				'selector'  => '{{WRAPPER}} .workflow-content p',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(), [
				'name'     => 'text_shadow_wfdesc',
				'selector' => '{{WRAPPER}} .workflow-content p',
			]
		);
		$this->end_controls_section();

	}

	protected function render() {

    $settings = $this->get_settings();

    ?>
    <section class="mosh-workflow-area section_padding_100_0 clearfix">
        <?php 
        if( !empty( $settings['wfh_subtitle'] ) || !empty( $settings['wfh_title'] ) ):
        ?>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center mb-0">
                        <?php 
                        //
                        if( !empty( $settings['wfh_subtitle'] ) ){
                            echo mosh_paragraph_tag(
                                array(
                                    'text' => esc_html( $settings['wfh_subtitle'] )
                                )
                            );
                        }
                        //
                        if( !empty( $settings['wfh_title'] ) ){
                            echo mosh_heading_tag(
                                array(
                                    'tag' => 'h2',
                                    'text' => esc_html( $settings['wfh_title'] )
                                )
                            );
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
        endif; 
        // 
        if( !empty( $settings['wfh_img']['url'] ) ){
            echo '<div class="workflow-img">';
                echo mosh_img_tag(
                    array(
                        'url' => esc_url( $settings['wfh_img']['url'] )
                    )
                );
            echo '</div>';
        }
        ?>
        <div class="workflow-slides-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="mosh-workflow-slides owl-carousel">
                            <?php 
                            if( is_array( $settings['workflowcontent'] ) && count( $settings['workflowcontent'] ) > 0 ):
                                foreach( $settings['workflowcontent'] as $workflow ):
                            ?>
                            <div class="single-workflow-area d-flex">
                                <?php 
                                //
                                if( !empty( $workflow['label'] ) ){
                                    echo mosh_heading_tag(
                                        array(
                                            'tag'  => 'h2',
                                            'text' => esc_html( $workflow['label'] )
                                        )
                                    );
                                }
                                ?>

                                <div class="workflow-content ml-15">
                                    <?php 
                                    //
                                    if( !empty( $workflow['title'] ) ){
                                        echo mosh_heading_tag(
                                            array(
                                                'tag'  => 'h4',
                                                'text' => esc_html( $workflow['title'] )
                                            )
                                        );
                                    }
                                    //
                                    if( !empty( $workflow['desc'] ) ){
                                        echo mosh_paragraph_tag(
                                            array(
                                                'text' => esc_html( $workflow['desc'] )
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
        </div>
    </section>

    <?php

        }
	
}
