<?php 
if( !defined( 'WPINC' ) ){
    die;
}
/**
 * @Packge     : Mosh Companion
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */


function mosh_shortcode( $atts ) {
    $atts = shortcode_atts( array(
        'limit'     => '3',
        'title'     => '',
        'subtitle'  => '',
        'showloadmore'  => '',
        'loadmore'  => 'Load More',
        'permalink'  => false,
        'wrpclass'  => 'section_padding_100_0',
    ), $atts );

    ob_start();
    ?>  
    <section class="mosh-portfolio-area clearfix <?php echo esc_attr( $atts['wrpclass'] ); ?>">
            <?php 

            // Section title
            if( !empty( $atts['title'] ) || !empty( $atts['subtitle'] ) ){
                $title = $subtitle = '';
                // Title

                if( !empty( $atts['title'] ) ){
                    $title = $atts['title'];
                }
                // Sub title
                if( !empty( $atts['subtitle'] ) ){
                    $subtitle = $atts['subtitle'];
                }

                mosh_section_heading( $title, $subtitle );
            }
            // Filter Tab
            $terms = get_terms( 'mosh-portfolio-categories', array( 'hide_empty' => true ) );

            if( is_array( $terms ) && count( $terms ) > 0 ):
            ?>
            <div class="mosh-projects-menu">
                <div class="text-center portfolio-menu">
                    <p class="active" data-filter="*">All</p>
                    <?php 
                    $tabs = '';
                    foreach( $terms as $term ) {

                        $tabs .= '<p data-filter=".'.esc_attr( $term->slug ).'">'.esc_html( $term->name ).'</p>';
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
                $args = array(
                    'post_type'      => 'mosh-portfolio',
                    'posts_per_page' => esc_html( $atts['limit'] ),
                );
                
                $query = new WP_Query( $args );


                    // Localize
                    wp_localize_script(
                        'mosh-companion-script',
                        'portfolioloadajax',
                        array(
                            'action_url' => admin_url( 'admin-ajax.php' ),
                            'current_page' => ( get_query_var('paged') ) ? get_query_var('paged') : 1,
                            'posts' => json_encode( $query->query_vars ),
                            'max_pages' => $query->max_num_pages,
                            'postNumber' => esc_html( $atts['limit'] ),
                            'btnLabel' => esc_html__( 'Load More', 'mosh-companion' ),
                            'btnLodingLabel' => esc_html__( 'Loading....', 'mosh-companion' ),
                        )
                    );


                if( $query->have_posts() ):
                    while( $query->have_posts() ):
                        $query->the_post();

                    $terms = get_the_terms( get_the_ID(), 'mosh-portfolio-categories' );

                    $tabClass = '';
                    if( $terms ){
                        foreach( $terms as $term ){
                            $tabClass  .= ' '.$term->slug;
                        }
                    }
                ?>
                <div class="single_gallery_item <?php echo esc_attr( $tabClass ); ?>">
                    <?php 
                    the_post_thumbnail();
                    ?>
                    <div class="gallery-hover-overlay d-flex align-items-center justify-content-center">
                        <div class="port-hover-text text-center">
                            <h4><?php echo esc_html( get_the_excerpt() ); ?></h4>
                            <?php 
                            if( $atts['permalink'] ){
                                echo '<a href="'.esc_url( get_the_permalink() ).'">'.esc_html( get_the_title() ).'</a>';
                            }else{
                                echo '<p>'.esc_html( get_the_title() ).'</p>';
                            }
                            ?>
                            
                        </div>
                    </div>
                </div>
                <?php
                    endwhile; 
                    wp_reset_postdata();
                    echo '<span class="dataload"></span>';
                endif;
                ?>
            </div>
            <?php 
            // Portfolio Footer Start
            if( $query->max_num_pages > 0 && !empty( $atts['showloadmore'] ) ):
            ?>
            <div class="col-12 text-center mt-100">
                <a href="#" class="btn loadAjax mosh-btn"><?php echo esc_html( $atts['loadmore'] ) ?></a>
            </div>
            <?php 
            endif;
            ?>
        </section>

    <?php
    $html = ob_get_clean();
    
    return $html;
}
add_shortcode( 'moshfolio', 'mosh_shortcode' );

?>