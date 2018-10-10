<?php
if ( ! defined( 'WPINC' ) ) {
	die;
}
/**
 * @Packge     : Mosh Companion
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author     URI : http://colorlib.com/wp/
 *
 */

// Section Heading
function mosh_section_heading( $title = '', $subtitle = '' ) {
	?>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="section-heading text-center">
					<?php
					// Sub title
					if ( $subtitle ) {
						echo '<p>' . esc_html( $subtitle ) . '</p>';
					}
					// Title
					if ( $title ) {
						echo '<h2>' . esc_html( $title ) . '</h2>';
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
function mosh_companion_frontend_scripts() {

	wp_enqueue_script( 'mosh-companion-script', plugins_url( '../js/loadmore-ajax.js', __FILE__ ), array( 'jquery' ), '1.0', true );

}