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
*Creating instagram Widget
***************************************/
 
class mosh_instagram_widget extends WP_Widget {


function __construct() {

parent::__construct(
// Base ID of your widget
'mosh_instagram_widget', 


// Widget name will appear in UI
esc_html__( '[ Mosh ] Instagram Widget', 'mosh-companion' ), 

// Widget description
array( 'description' => esc_html__( 'Widget to set instagram in widget.', 'mosh-companion' ), ) 
);

}

// This is where the action happens
public function widget( $args, $instance ) {
$title 			= apply_filters( 'mosh_instagram_sectiontitle', $instance['sectiontitle'] );
$imagelimit 	= apply_filters( 'mosh_instagram_imagelimit', $instance['imagelimit'] );
$imagewidth 	= apply_filters( 'mosh_instagram_imagewidth', $instance['imagewidth'] );

// before and after widget arguments are defined by themes
echo wp_kses_post( $args['before_widget'] );
if ( ! empty( $title ) )
echo wp_kses_post( $args['before_title'] . $title . $args['after_title'] );

// Default image limit
if( $imagelimit ){
	$imagelimit = $imagelimit;
}else{
	$imagelimit = 5;
}
// Default image width set
if( $imagewidth ){
	$imagewidth = $imagewidth;
}else{
	$imagewidth = 420;
}

    
$api = Wpzoom_Instagram_Widget_API::getInstance();

$getitems = $api->get_items( $imagelimit, $imagewidth );
$items = $getitems['items'];
$username = $getitems['username'];

?>
    <div class="instagram-feeds">
        <ul>
        	<?php 
			if( is_array( $items ) && count( $items ) > 0 ):
			foreach( $items as $item ):
			
			$link       = $item['link'];
			$src        = $item['image-url'];
			
			?>
            <li>
                <a href="<?php echo esc_url( $link ); ?>">
                <?php 
                echo mosh_img_tag(
                    array(
                        'url' => esc_url($src) 
                    )
                );
                ?>  
                </a>
            </li>
            <?php
            endforeach; 
        	endif;
            ?>
        </ul>
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
//	Top padding
if ( isset( $instance[ 'imagelimit' ] ) ) {
	$imagelimit = $instance[ 'imagelimit' ];
}else {
	$imagelimit = 5;
}
//	Image Width
if ( isset( $instance[ 'imagewidth' ] ) ) {
	$imagewidth = $instance[ 'imagewidth' ];
}else {
	$imagewidth = 420;
}




// Widget admin form
?>
<p> <?php esc_html_e( 'To set instagram access token got Appearance -> Customize -> Theme Options -> General -> Instagram Access Token', 'mosh-companion' ) ?> </p>
<p>
<label for="<?php echo esc_attr( $this->get_field_id( 'sectiontitle' ) ); ?>"><?php esc_html_e( 'Section Title:' ,'mosh-companion'); ?></label> 
<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'sectiontitle' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'sectiontitle' ) ); ?>" type="text" value="<?php echo esc_attr( $sectiontitle ); ?>" />
</p>
<p>
<label for="<?php echo esc_attr( $this->get_field_id( 'imagelimit' ) ); ?>"><?php esc_html_e( 'Image Limit:' ,'mosh-companion'); ?></label> 
<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'imagelimit' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'imagelimit' ) ); ?>" type="text" value="<?php echo esc_attr( $imagelimit ); ?>" />
<span><?php esc_html_e( 'Default value 5' ,'mosh-companion'); ?></span>
</p>
<p>
<label for="<?php echo esc_attr( $this->get_field_id( 'imagewidth' ) ); ?>"><?php esc_html_e( 'Image Width:' ,'mosh-companion'); ?></label> 
<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'imagewidth' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'imagewidth' ) ); ?>" type="text" value="<?php echo esc_attr( $imagewidth ); ?>" />
<span><?php esc_html_e( 'Default value 420' ,'mosh-companion'); ?></span>
</p>

<?php 
}

	
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {

	
$instance = array();
$instance['sectiontitle'] 	 = ( ! empty( $new_instance['sectiontitle'] ) ) ? strip_tags( $new_instance['sectiontitle'] ) : '';
$instance['imagelimit'] 	 = ( ! empty( $new_instance['imagelimit'] ) ) ? strip_tags( $new_instance['imagelimit'] ) : '';
$instance['imagewidth'] 	 = ( ! empty( $new_instance['imagewidth'] ) ) ? strip_tags( $new_instance['imagewidth'] ) : '';


return $instance;
}
} // Class mosh_bannervideo_widget ends here


// Register and load the widget
function mosh_instagram_load_widget() {
	register_widget( 'mosh_instagram_widget' );
}
add_action( 'widgets_init', 'mosh_instagram_load_widget' );