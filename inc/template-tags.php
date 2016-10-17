<?php


if ( ! function_exists( 'taidanto_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 * @since Twenty Sixteen 1.2
 */
function taidanto_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}

// Cutsom logo with class
//function theme_prefix_the_custom_logo() {
	
//	if ( function_exists( 'the_custom_logo' ) ) {
//		the_custom_logo();
//	}
//}

//

endif;