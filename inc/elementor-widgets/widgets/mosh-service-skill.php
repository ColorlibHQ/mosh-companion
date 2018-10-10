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
 * Mosh elementor services skill section widget.
 *
 * @since 1.0
 */
class Mosh_Service_Skill extends Widget_Base {

	public function get_name() {
		return 'mosh-service-skill';
	}

	public function get_title() {
		return __( 'Service Skill', 'mosh-companion' );
	}

	public function get_icon() {
		return 'eicon-skill-bar';
	}

	public function get_categories() {
		return [ 'mosh-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  Service content ------------------------------
        $this->start_controls_section(
            'service_content',
            [
                'label' => __( 'Service Content', 'mosh-companion' ),
            ]
        );
        $this->add_control(
            'services_subtitle',
            [
                'label' => esc_html__( 'Sub Title', 'mosh-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'services_title',
            [
                'label' => esc_html__( 'Title', 'mosh-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'services_desc',
            [
                'label' => esc_html__( 'Descriptions', 'mosh-companion' ),
                'type' => Controls_Manager::WYSIWYG,
                'label_block' => true,
            ]
        );

        $this->end_controls_section(); // End Service content

        // ----------------------------------------  Service section skill ------------------------------
        $this->start_controls_section(
            'service_skill',
            [
                'label' => __( 'Skill', 'mosh-companion' ),
            ]
        );
        $this->add_control(
            'serviceskill', [
                'label'         => __( 'Create Service Skill', 'mosh-companion' ),
                'type'          => Controls_Manager::REPEATER,
                'title_field'   => '{{{ label }}}',
                'fields' => [
                    [
                        'name'        => 'label',
                        'label'       => __( 'Title #1', 'mosh-companion' ),
                        'type'        => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default'     => esc_html__( 'Creative', 'mosh-companion' )
                    ],
                    [
                        'name'        => 'titletwo',
                        'label'       => __( 'Title #2', 'mosh-companion' ),
                        'type'        => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default'     => esc_html__( 'Etiam nec odio', 'mosh-companion' )
                    ],
                    [
                        'name'      => 'progress',
                        'label'     => __( 'Progress', 'mosh-companion' ),
                        'type'      => Controls_Manager::NUMBER,
                        'default'   => esc_html__( '70', 'mosh-companion' )
                    ]
                ],
            ]
        );
        $this->end_controls_section(); // End service content


    /**
     * Style Tab
     * ------------------------------ Style ------------------------------
     *
     */
        $this->start_controls_section(
			'style_coloropt', [
				'label' => __( 'Color Options', 'mosh-companion' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_control(
            'color_title', [
                'label'     => __( 'Title Color', 'mosh-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#404551',
                'selectors' => [
                    '{{WRAPPER}} .service-skills-content .section-heading > h2' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .single-pie-bar h6' => 'color: {{VALUE}};',
                ],
            ]
        );

		$this->add_control(
			'color_content', [
				'label' => __( 'Content Color', 'mosh-companion' ),
				'type'  => Controls_Manager::COLOR,
                'default' => '#abadbe',
				'selectors' => [
                    '{{WRAPPER}} .service-skills-content .section-heading p' => 'color: {{VALUE}};',
					'{{WRAPPER}} .service-skills-content .skills-text p' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .single-pie-bar p' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

	}

	protected function render() {

    $settings = $this->get_settings();
    //
    wp_enqueue_script( 'progress-loader-canvas' )
    ?>

    <section class="service-skills-area section_padding_100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="row">
                        <?php 
                        if( is_array( $settings['serviceskill'] ) && count( $settings['serviceskill'] ) > 0 ):
                            foreach( $settings['serviceskill'] as $skill ):

                        $percent = ( $skill['progress'] ) ? $skill['progress'] : '';
                        ?>
                        <div class="col-6">
                            <div class="single-pie-bar text-center mb-100" data-percent="<?php echo esc_attr( $percent ); ?>">
                                <canvas class="bar-circle" width="70" height="70"></canvas>
                                <?php 
                                // Title
                                if( !empty( $skill['label'] ) ){
                                    echo mosh_heading_tag(
                                        array(
                                            'tag'  => 'h6',
                                            'text' => esc_html( $skill['label'] )
                                        )
                                    );
                                }
                                // Title Two
                                if( !empty( $skill['titletwo'] ) ){
                                    echo mosh_paragraph_tag(
                                        array(
                                            'text' => esc_html( $skill['titletwo'] )
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
  
                <div class="col-12 col-md-6">
                    <div class="service-skills-content">
                        <?php 
                        if( !empty( $settings['services_subtitle'] ) || !empty( $settings['services_title'] ) ):
                        ?>
                        <div class="section-heading">
                            <?php 
                            //
                            if( !empty( $settings['services_subtitle'] ) ){
                                echo mosh_paragraph_tag(
                                    array(
                                        'text' => esc_html( $settings['services_subtitle'] )
                                    )
                                );
                            }
                            //
                            if( !empty( $settings['services_title'] )  ){
                                echo mosh_heading_tag(
                                    array(
                                        'tag'  => 'h2',
                                        'text' => esc_html( $settings['services_title'] ) 
                                    )
                                );
                            }
                            ?>
                        </div>
                        <?php 
                        endif;
                        //
                        if( !empty( $settings['services_desc'] ) ):
                        ?>
                        <div class="skills-text d-flex">
                            <?php 
                            echo mosh_get_textareahtml_output( $settings['services_desc'] );
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
