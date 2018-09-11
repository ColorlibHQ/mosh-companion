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

 
 
/**************************************
*Creating Blog Widget
***************************************/
 
class mosh_blog_widget extends WP_Widget {


function __construct() {

parent::__construct(
// Base ID of your widget
'mosh_blog_widget', 


// Widget name will appear in UI
esc_html__( '[ Mosh ] Latest Post Thumbnail', 'mosh-companion' ), 

// Widget description
array( 'description' => esc_html__( 'Show most latest blog post.', 'mosh-companion' ), ) 
);

}

// This is where the action happens
public function widget( $args, $instance ) {
$title 			= apply_filters( 'mosh_blog_sectiontitle', $instance['sectiontitle'] );
$postnumber 	= apply_filters( 'mosh_blog_postnumber', $instance['postnumber'] );
$style 			= apply_filters( 'mosh_blog_style', $instance['style'] );

// before and after widget arguments are defined by themes
echo wp_kses_post( $args['before_widget'] );
if ( ! empty( $title ) )
echo wp_kses_post( $args['before_title'] . $title . $args['after_title'] );

    
?>

    <div class="latest-blog-posts">
		<?php 	
		$blogargs = array(
			'post_type' 	 => 'post',
			'posts_per_page' => esc_html( $postnumber ),
		);
		
		$query = new WP_Query( $blogargs );
		
		if( $query->have_posts() ):
		while( $query->have_posts() ):
			$query->the_post();
		?>
		<?php 

		if( $style != '2' ):
		?>
        <div class="single-latest-blog-post d-flex">
        	<?php 
        	if( get_the_post_thumbnail()):
        	?>
            <div class="latest-blog-post-thumb">
             <?php the_post_thumbnail('mosh_widget_post_thumb'); ?>
            </div>
            <?php 
        	endif;
            ?>
            <div class="latest-blog-post-content">
                <h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
                <div class="post-meta">
                    <h6><?php esc_html_e( 'By', 'mosh-companion' ); ?> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta('ID') ) ); ?>"><?php the_author(); ?></a>/<a href="<?php echo esc_url( mosh_blog_date_permalink() ); ?>"><?php echo esc_html( get_the_date() ); ?></a></h6>
                </div>
            </div>
        </div>
		<?php 
		else:
		?>
        <div class="footer-single--blog-post">
            <a href="<?php echo esc_url( mosh_blog_date_permalink() ); ?>" class="blog-post-date">
                <p><?php echo esc_html( get_the_date() ); ?></p>
            </a>
            <a href="<?php the_permalink(); ?>" class="blog-post-title">
                <h6><?php the_title(); ?></h6>
            </a>
        </div>
		<?php 
		endif;
		//
    	endwhile;
    	endif;
        ?>
    </div>

<?php
echo wp_kses_post( $args['after_widget'] );
}
		
// Widget Backend 
public function form( $instance ) {

// Section Title
if ( isset( $instance[ 'sectiontitle' ] ) ) {
	$sectiontitle = $instance[ 'sectiontitle' ];
}else {
	$sectiontitle = '';
}
//	Post Number
if ( isset( $instance[ 'postnumber' ] ) ) {
	$postnumber = $instance[ 'postnumber' ];
}else {
	$postnumber = '3';
}
//	Style
if ( isset( $instance[ 'style' ] ) ) {
	$style = $instance[ 'style' ];
}else {
	$style = '1';
}




// Widget admin form
?>
<p>
<label for="<?php echo esc_attr( $this->get_field_id( 'sectiontitle' ) ); ?>"><?php esc_html_e( 'Section Title:' ,'mosh-companion'); ?></label> 
<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'sectiontitle' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'sectiontitle' ) ); ?>" type="text" value="<?php echo esc_attr( $sectiontitle ); ?>" />
</p>
<p>
<label for="<?php echo esc_attr( $this->get_field_id( 'postnumber' ) ); ?>"><?php esc_html_e( 'Post Number:' ,'mosh-companion'); ?></label> 
<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'postnumber' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'postnumber' ) ); ?>" type="text" value="<?php echo esc_attr( $postnumber ); ?>" />
</p>
<p>
<label for="<?php echo esc_attr( $this->get_field_id( 'style' ) ); ?>"><?php esc_html_e( 'Set Style:' ,'mosh-companion'); ?></label> 

<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'style' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'style' ) ); ?>">
	<option value="1" <?php echo esc_attr( ( $style == '1' ) ? 'selected' : '' ); ?>><?php esc_html_e( 'Style 1', 'mosh-companion'); ?></option>
	<option value="2" <?php echo esc_attr( ( $style == '2' ) ? 'selected' : '' ); ?>><?php esc_html_e( 'Style 2', 'mosh-companion'); ?></option>
</select>
</p>

<?php 
}

	
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {

	
$instance = array();
$instance['sectiontitle'] 	 = ( ! empty( $new_instance['sectiontitle'] ) ) ? strip_tags( $new_instance['sectiontitle'] ) : '';
$instance['postnumber'] 	 = ( ! empty( $new_instance['postnumber'] ) ) ? strip_tags( $new_instance['postnumber'] ) : '';
$instance['style'] 	 	 	 = ( ! empty( $new_instance['style'] ) ) ? strip_tags( $new_instance['style'] ) : '';


return $instance;
}
} // Class mosh_bannervideo_widget ends here


// Register and load the widget
function mosh_blog_load_widget() {
	register_widget( 'mosh_blog_widget' );
}
add_action( 'widgets_init', 'mosh_blog_load_widget' );