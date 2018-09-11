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
 * Mosh elementor services slider section widget.
 *
 * @since 1.0
 */
class Mosh_Features extends Widget_Base {

	public function get_name() {
		return 'mosh-features';
	}

	public function get_title() {
		return __( 'Features', 'mosh-companion' );
	}

	public function get_icon() {
		return 'eicon-gallery-grid';
	}

	public function get_categories() {
		return [ 'mosh-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  Features content ------------------------------
        $this->start_controls_section(
            'features_content',
            [
                'label' => __( 'Features Content', 'mosh-companion' ),
            ]
        );
        $this->add_control(
            'features_subtitle',
            [
                'label' => esc_html__( 'Sub Title', 'mosh-companion' ),
                'type' => Controls_Manager::TEXT,
            ]
        );
        $this->add_control(
            'features_title',
            [
                'label' => esc_html__( 'Title', 'mosh-companion' ),
                'type' => Controls_Manager::TEXT,
            ]
        );
        $this->add_control(
            'features_desc',
            [
                'label' => esc_html__( 'Descriptions', 'mosh-companion' ),
                'type' => Controls_Manager::WYSIWYG,
            ]
        );

        $this->end_controls_section(); // End Features content

        // ----------------------------------------  Features section skill ------------------------------
        $this->start_controls_section(
            'features_skill',
            [
                'label' => __( 'Skill', 'mosh-companion' ),
            ]
        );
        $this->add_control(
            'featureskill', [
                'label' => __( 'Create Skill', 'mosh-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name' => 'label',
                        'label' => __( 'Skill Name', 'mosh-companion' ),
                        'type' => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => ''
                    ],
                    [
                        'name' => 'skillprogress',
                        'label' => __( 'Skill Progress', 'mosh-companion' ),
                        'type' => Controls_Manager::NUMBER,
                        'default' => ''
                    ]
                ],
            ]
        );
        $this->end_controls_section(); // End service content

		// ----------------------------------------  Features Image ------------------------------
		$this->start_controls_section(
			'features_image',
			[
				'label' => __( 'Featured Image', 'mosh-companion' ),
			]
		);
        $this->add_control(
            'features_img',
            [
                'label' => esc_html__( 'Image', 'mosh-companion' ),
                'type' => Controls_Manager::MEDIA,
            ]
        );
		$this->end_controls_section(); // End service content


    /**
     * Style Tab
     * ------------------------------ Style Sub title ------------------------------
     *
     */
        $this->start_controls_section(
			'style_subtitle', [
				'label' => __( 'Style Sub Title', 'mosh-companion' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'color_title', [
				'label' => __( 'Sub Title Color', 'mosh-companion' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .mosh-features-area .section-heading > p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'typography_subtitle',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .mosh-features-area .section-heading > p',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(), [
				'name' => 'text_shadow_subtitle',
				'selector' => '{{WRAPPER}} .mosh-features-area .section-heading > p',
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
            'color_titletwo', [
                'label' => __( 'Title Color', 'mosh-companion' ),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .mosh-features-area .section-heading h2' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_titletwo',
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .mosh-features-area .section-heading h2',
            ]
        );
        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(), [
                'name' => 'text_shadow_titletwo',
                'selector' => '{{WRAPPER}} .mosh-features-area .section-heading h2',
            ]
        );
        $this->end_controls_section();

		//------------------------------ Style Feature Content ------------------------------
		$this->start_controls_section(
			'style_fcontent', [
				'label' => __( 'Style Feature Content', 'mosh-companion' ),
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
					'{{WRAPPER}} .mosh-features-area p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'typography_fcontent',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .mosh-features-area p',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(), [
				'name' => 'text_shadow_fcontent',
				'selector' => '{{WRAPPER}} .mosh-features-area p',
			]
		);
		$this->end_controls_section();

	}

	protected function render() {

    $settings = $this->get_settings();

    // 
    $progressbarColor = '#4a7aec';

    if( mosh_opt( 'mosh_themecolor' ) ){

        $progressbarColor = mosh_opt( 'mosh_themecolor' );
    }

    ?>
    <section class="mosh-features-area section_padding_100 clearfix">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-12 col-md-6">
                    <div class="section-heading">
                        <?php 
                            // Sub Title
                            if( !empty( $settings['features_subtitle'] )){
                                echo mosh_paragraph_tag(
                                    array(
                                        'text'  => esc_html( $settings['features_subtitle'] )
                                    )
                                );
                            } 
                            // Title
                            if( !empty( $settings['features_title'] )){
                                echo mosh_heading_tag(
                                    array(
                                        'tag'   => 'h2',
                                        'text'  => esc_html( $settings['features_title'] )
                                    )
                                );
                            } 
                        ?>
                    </div>
                    <div class="features-content">
                        <?php 
                        if( !empty( $settings['features_desc'] ) ){
                            echo mosh_get_textareahtml_output( $settings['features_desc'] );
                        }
                        ?>
                        <div class="features-progress-bar mt-50">
                            <?php 
                            if( is_array( $settings['featureskill'] ) && count( $settings['featureskill'] ) > 0 ):
                                $i = 0;
                                foreach( $settings['featureskill'] as $skill ):
                                    $i = $i+2;
                                                                
                            ?>
                            <div class="single_progress_bar mb-15 wow fadeInUp" data-wow-delay="0.<?php echo esc_attr( $i ); ?>s">
                                <?php 
                                if( !empty( $skill['label'] )){
                                    echo mosh_paragraph_tag(
                                        array(
                                            'text' => esc_html( $skill['label'] )
                                        )
                                    );
                                }
                                ?>
                                <div class="barfiller bar" data-color="<?php echo esc_attr( $progressbarColor ) ?>">
                                    <div class="tipWrap">
                                        <span class="tip"></span>
                                    </div>
                                    <?php 

                                    if( !empty( $skill['skillprogress'] ) ):
                                    ?>
                                    <span class="fill" data-percentage="<?php echo esc_attr( $skill['skillprogress'] );  ?>"></span>
                                    <?php 
                                    endif;
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
        <?php 
        // Feature Thumb
        if( !empty( $settings['features_img']['url'] ) ){
            echo '<div class="features-img">';
                echo mosh_img_tag(
                    array(
                        'url' => esc_url( $settings['features_img']['url'] ),
                    )
                );
            echo '</div>';
        }
        ?>
    </section>

    <?php

        }
	
}
