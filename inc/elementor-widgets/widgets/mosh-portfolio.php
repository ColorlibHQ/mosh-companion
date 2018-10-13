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
 * elementor portfolio section widget.
 *
 * @since 1.0
 */
class Mosh_Portfolio extends Widget_Base {

	public function get_name() {
		return 'mosh-portfolio';
	}

	public function get_title() {
		return __( 'Portfolio', 'mosh-companion' );
	}

	public function get_icon() {
		return 'eicon-gallery-grid';
	}

	public function get_categories() {
		return [ 'mosh-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  portfolio settings ------------------------------
        $this->start_controls_section(
            'portfolio_content',
            [
                'label' => __( 'Portfolio Settings', 'mosh-companion' ),
            ]
        );

        $this->add_control(
            'subtitle',
            [
                'label' => esc_html__( 'Sub Title', 'mosh-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'OUR WORK', 'mosh-companion' )
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__( 'Title', 'mosh-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'See our Online Portfolio', 'mosh-companion' )
            ]
        );

        $this->add_control(
            'padding_top',
            [
                'label' => __( 'Padding Top', 'mosh-companion' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'mosh-pt-100',
                'options' => [
                    ''                  => __( 'Default', 'mosh-companion' ),
                    'mosh-pt-100'  => __( 'Padding Top 100px', 'mosh-companion' ),
                    'mosh-pt-80'   => __( 'Padding Top 80px', 'mosh-companion' ),
                    'mosh-pt-70 '  => __( 'Padding Top 70px', 'mosh-companion' ),
                    'mosh-pt-60'   => __( 'Padding Top 60px', 'mosh-companion' ),
                    'mosh-pt-50'   => __( 'Padding Top 50px', 'mosh-companion' ),
                    'mosh-pt-30'   => __( 'Padding Top 30px', 'mosh-companion' ),
                ],
            ]
        );

        $this->add_control(
            'padding_bottom',
            [
                'label' => __( 'Border Style', 'mosh-companion' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '',
                'options' => [
                    ''                  => __( 'Default', 'mosh-companion' ),
                    'mosh-pb-100'  => __( 'Padding Bottom 100px', 'mosh-companion' ),
                    'mosh-pb-80'   => __( 'Padding Bottom 80px', 'mosh-companion' ),
                    'mosh-pb-70'   => __( 'Padding Bottom 70px', 'mosh-companion' ),
                    'mosh-pb-60'   => __( 'Padding Bottom 60px', 'mosh-companion' ),
                    'mosh-pb-50'   => __( 'Padding Bottom 50px', 'mosh-companion' ),
                    'mosh-pb-30'   => __( 'Padding Bottom 30px', 'mosh-companion' ),
                ],
            ]
        );

        $this->add_control(
            'itemsnumber',
            [
                'label' => esc_html__( 'Items per section', 'mosh-companion' ),
                'type' => Controls_Manager::NUMBER,
                'label_block' => true
            ]
        );

        $this->add_control(
            'loadbtnswitch',
            [
                'label' => esc_html__( 'Load More Button', 'mosh-companion' ),
                'type' => Controls_Manager::SWITCHER,
            ]
        );

        $this->end_controls_section(); // End portfolio settings


		// ----------------------------------------  Portfolio Content ------------------------------

		$this->start_controls_section(
			'portfolios',
			[
				'label' => __( 'Portfolio', 'mosh-companion' ),
			]
		);

        $this->add_control(
            'portfolios_rept', [
                'label'         => __( 'Create Portfolios', 'mosh-companion' ),
                'type'          => Controls_Manager::REPEATER,
                'title_field'   => '{{{ label }}}',
                'fields' => [
                    [
                        'name'        => 'label',
                        'label'       => __( 'Tag', 'mosh-companion' ),
                        'type'        => Controls_Manager::TEXT,
                        'default'     => esc_html__( 'Web Template', 'mosh-companion' )
                    ],
                    [
                        'name'        => 'title',
                        'label'       => __( 'Title', 'mosh-companion' ),
                        'type'        => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default'     => esc_html__( 'DFR Corp. Branding', 'mosh-companion' )
                    ],
                    [
                        'name'        => 'sub-title',
                        'label'       => __( 'Sub Title', 'mosh-companion' ),
                        'type'        => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default'     => esc_html__( 'Brand Identity', 'mosh-companion' )
                    ],
                    [
                        'name'        => 'sub-title-url',
                        'label'       => __( 'Sub Title Url', 'mosh-companion' ),
                        'type'        => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default'     => esc_html__( '#', 'mosh-companion' )
                    ],
                    [
                        'name'        => 'img',
                        'label'       => __( 'Image', 'mosh-companion' ),
                        'type'        => Controls_Manager::MEDIA
                    ]
                ],
            ]
        );

		$this->end_controls_section(); // End portfolio content


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
                'selectors' => [
                    '{{WRAPPER}} .section-heading > h2' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_title',
                'selector' => '{{WRAPPER}} .section-heading > h2',
            ]
        );
        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(), [
                'name' => 'text_shadow_title',
                'selector' => '{{WRAPPER}} .section-heading > h2',
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
				'label' => __( 'Text Color', 'mosh-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .section-heading > p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'typography_subtitle',
				'selector' => '{{WRAPPER}} .section-heading > p',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(), [
				'name' => 'text_shadow_subtitle',
				'selector' => '{{WRAPPER}} .section-heading > p',
			]
		);
		$this->end_controls_section();

        //------------------------------ Style Image Hover ------------------------------
        $this->start_controls_section(
            'style_imghover', [
                'label' => __( 'Style Image Hover', 'mosh-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'hover_overlaybgcolor', [
                'label' => __( 'Image Hover Overlay Background Color', 'mosh-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gallery-hover-overlay' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'hover_overlaytextcolor', [
                'label' => __( 'Image Hover Overlay Text Color', 'mosh-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gallery-hover-overlay .port-hover-text h4'  => 'color: {{VALUE}};',
                    '{{WRAPPER}} .gallery-hover-overlay .port-hover-text > a' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .gallery-hover-overlay .port-hover-text > p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();


	}

	protected function render() {

        $settings = $this->get_settings();


        $title = $subtitle = '';
        // Title

        if( !empty( $settings['title'] ) ){
            $title = $settings['title'];
        }
        // Sub title
        if( !empty( $settings['subtitle'] ) ){
            $subtitle = $settings['subtitle'];
        }
        // Wrapper Class
        $wrpclass = '';

        if( $settings['padding_bottom'] ){
            $wrpclass .= ' '.$settings['padding_bottom'];
        }
        if( $settings['padding_top'] ){
            $wrpclass .= ' '.$settings['padding_top'];
        }

        // Assign portfolios items in variable 

        $portfoliosItems = $settings['portfolios_rept']; 

        // Total items count
        $totalItems = count( $portfoliosItems );

        // localize
        wp_localize_script(
            'mosh-companion-script',
            'portfolioloadajax',
            array(
                'action_url' => admin_url( 'admin-ajax.php' ),
                'postNumber' => esc_html( $settings['itemsnumber'] ),
                'elsettings' => $portfoliosItems,
                'totalitems' => $totalItems
            )
        );


        ?>

        <section class="mosh-portfolio-area clearfix <?php echo esc_attr( $wrpclass ); ?>">
            <?php 
            // Section heading
            mosh_section_heading( $title, $subtitle );

            // Filter
            if( is_array( $portfoliosItems ) && $totalItems > 0 ):
            ?>
            <div class="mosh-projects-menu">
                <div class="text-center portfolio-menu">
                    <p class="active" data-filter="*"><?php esc_html_e( 'All', 'mosh-companion' ) ?></p>
                    <?php 
                    $tags = array_column( $portfoliosItems, 'label' );

                    $getTags = array_unique( $tags );

                    $tabs = '';
                    foreach( $getTags as $tag ) {

                        $tagforfilter = sanitize_title_with_dashes( $tag );

                        $tabs .= '<p data-filter=".'.esc_attr( $tagforfilter ).'">'.esc_html( $tag ).'</p>';
                    }

                    echo $tabs;
                    ?>
                </div>
            </div>
            <?php
            endif;
            ?>

            <div class="mosh-portfolio">

                <?php 
                if( !empty( $portfoliosItems ) ):
                    $i = 0;
                    foreach( $portfoliosItems as $val ):

                    $tagclass = sanitize_title_with_dashes( $val['label'] );
                    $i++;
                ?>
                <div class="single_gallery_item <?php echo esc_attr( $tagclass ); ?>">
                    <?php 
                    if( !empty( $val['img']['url'] ) ){
                        echo '<img src="'.esc_url( $val['img']['url'] ).'" />';
                    }
                    ?>
                    <div class="gallery-hover-overlay d-flex align-items-center justify-content-center">
                        <div class="port-hover-text text-center">
                            <?php 
                            if( !empty( $val['title'] ) ){
                                echo mosh_heading_tag(
                                    array(
                                        'tag'  => 'h4',
                                        'text' => esc_html( $val['title'] )
                                    )
                                );
                            }
                            ?>
                            
                            <?php 
                            if( !empty( $val['sub-title-url'] ) &&  !empty( $val['sub-title'] ) ){
                                echo '<a href="'.esc_url( $val['sub-title-url'] ).'">'.esc_html( $val['sub-title'] ).'</a>';
                            }else{
                                echo '<p>'.esc_html( $val['sub-title'] ).'</p>';
                            }
                            ?>
                            
                        </div>
                    </div>
                </div>
                <?php 

                if( !empty( $settings['itemsnumber'] ) ){

                    if( $i == $settings['itemsnumber'] ){
                        break;
                    }
                }
                    endforeach;
                endif;
                ?>

                <div class="mosh-portfolio-load"></div>

            </div>
            <?php 
            if( !empty( $settings['loadbtnswitch'] ) && $totalItems > $settings['itemsnumber']  ):
            ?>
            <div class="col-12 text-center mt-100">
                <a href="#" class="btn loadAjax mosh-btn"><?php esc_html_e( 'Load More', 'mosh-companion' ); ?></a>
            </div>
            <?php 
            endif;
            ?>
        </section>

        <?php

    }
	
}
