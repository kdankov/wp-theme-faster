<?php

/**
 * Remove jQuery from the Front End
 */
function faster_jquery_remove() {

	wp_deregister_script( 'jquery' );

}
add_action( 'wp_enqueue_scripts', 'faster_jquery_remove' );
