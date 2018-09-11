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

add_action( 'init', 'mosh_componion_posttype_init' );
/**
 * Register a portfolio post type.
 *
 */
function mosh_componion_posttype_init() {
    $labels = array(
        'name'               => __( 'Portfolios', 'mosh-companion' ),
        'singular_name'      => __( 'Portfolio', 'mosh-companion' ),
        'menu_name'          => __( 'Portfolios', 'mosh-companion' ),
        'name_admin_bar'     => __( 'Portfolio', 'mosh-companion' ),
        'add_new'            => __( 'Add New', 'mosh-companion' ),
        'add_new_item'       => __( 'Add New Portfolio', 'mosh-companion' ),
        'new_item'           => __( 'New Portfolio', 'mosh-companion' ),
        'edit_item'          => __( 'Edit Portfolio', 'mosh-companion' ),
        'view_item'          => __( 'View Portfolio', 'mosh-companion' ),
        'all_items'          => __( 'All Portfolios', 'mosh-companion' ),
        'search_items'       => __( 'Search Portfolios', 'mosh-companion' ),
        'parent_item_colon'  => __( 'Parent Portfolios:', 'mosh-companion' ),
        'not_found'          => __( 'No books found.', 'mosh-companion' ),
        'not_found_in_trash' => __( 'No books found in Trash.', 'mosh-companion' )
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Description.', 'mosh-companion' ),
        'public'             => true,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'portfolio' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'thumbnail', 'excerpt'  )
    );

    register_post_type( 'mosh-portfolio', $args );


    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name'              => _x( 'Portfolio Categories', 'taxonomy general name', 'mosh-companion' ),
        'singular_name'     => _x( 'Portfolio Category', 'taxonomy singular name', 'mosh-companion' ),
        'search_items'      => __( 'Search Genres', 'mosh-companion' ),
        'all_items'         => __( 'All Portfolio Categories', 'mosh-companion' ),
        'parent_item'       => __( 'Parent Category', 'mosh-companion' ),
        'parent_item_colon' => __( 'Parent Category:', 'mosh-companion' ),
        'edit_item'         => __( 'Edit Category', 'mosh-companion' ),
        'update_item'       => __( 'Update Category', 'mosh-companion' ),
        'add_new_item'      => __( 'Add New Category', 'mosh-companion' ),
        'new_item_name'     => __( 'New Category Name', 'mosh-companion' ),
        'menu_name'         => __( 'Portfolio Categories', 'mosh-companion' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'portfolio-categories' ),
    );

    register_taxonomy( 'mosh-portfolio-categories', array( 'mosh-portfolio' ), $args );


}

// Portfolio Section Heading
function mosh_section_heading( $title = '', $subtitle = '' ){
    ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading text-center">
                    <?php 
                    // Sub title
                    if( $subtitle ){
                        echo '<p>'.esc_html( $subtitle ).'</p>';
                    }
                    // Title
                    if( $title ){
                        echo '<h2>'.esc_html( $title ).'</h2>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php
}
// Enqueue scripts
add_action( 'wp_enqueue_scripts', 'mosh_companion_frontend_scripts' );
function mosh_companion_frontend_scripts(){

    wp_enqueue_script( 'mosh-companion-script', plugins_url( '../js/loadmore-ajax.js', __FILE__ ), array('jquery'), '1.0', true );

}
// Portfolio section loadmore button
add_action( 'wp_ajax_mosh_load_ajax', 'mosh_load_ajax' );

add_action( 'wp_ajax_nopriv_mosh_load_ajax', 'mosh_load_ajax' );

function mosh_load_ajax(){
               
             
    $args = array(
        'post_type'      => 'mosh-portfolio',
        'posts_per_page' => esc_html( $_POST['postNumber'] ),
        'paged' => $_POST['page'] + 1
    );
    
    $query = new WP_Query( $args );
    
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
                $singleLink = false;
                if( $singleLink ){
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
    endif;
            
                
die();
    
            
}

?>