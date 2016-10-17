<?php
/**
 * Taidanto functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage Taidanto
 * @since Taidanto 1.0
 */

// Register Custom Navigation Walker
require_once('inc/wp_bootstrap_navwalker.php');

if ( ! function_exists( 'taidanto_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * Create your own twentysixteen_setup() function to override in a child theme.
 *
 * @since Twenty Sixteen 1.0
 */
function taidanto_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/twentysixteen
	 * If you're building a theme based on Twenty Sixteen, use a find and replace
	 * to change 'twentysixteen' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'taidanto' );
	
	
    register_nav_menus(array(
        'primary' => __('Primary Menu')
        ));	

	// Add default posts and comments RSS feed links to head.
//	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for custom logo.
	 *
	 *  @since Twenty Sixteen 1.2
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );
	
	
// Custom logo with Bootsrap class too (theme_prefix_setup()) Check inc/template-tags.php <-- Tämän vois varmaan siirrellä tuohon taidanto_setup() funktioon 
function theme_prefix_setup() {
	
add_theme_support( 'custom-logo', array(
	'height'      => 100,
	'width'       => 400,
	'flex-height' => true,
	'flex-width'  => true,
	'header-text' => array( 'site-title', 'site-description' ),
) );

}
add_action( 'after_setup_theme', 'theme_prefix_setup' );


// Muutetaan lennosta logon css-luokaa  --> (change_logo_class($html)
add_filter('get_custom_logo','change_logo_class');

function change_logo_class($html)
{
	$html = str_replace('class="custom-logo"', 'navbar-brand', $html);
	$html = str_replace('class="custom-logo-link"', 'navbar-brand', $html);
	return $html;
}

}//end

endif; // taidanto_setup
add_action( 'after_setup_theme', 'taidanto_setup' );


/**
 * Enqueues scripts and styles.
 *
 * @since Taidanto 1.0
 */
function taidanto_scripts() {
	// Add custom fonts, used in the main stylesheet.
	//wp_enqueue_style( 'taidanto-fonts', taidanto_fonts_url(), array(), null );

	// Add Genericons, used in the main stylesheet.
	//wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.4.1' );

	// Teeman Tyylitiedoto.
	wp_enqueue_style( 'style', get_stylesheet_uri() );

	// Load the html5 shiv.
	wp_enqueue_script( 'taidanto-html5', get_template_directory_uri() . '/js/html5.js', array(), '3.7.3' );
	wp_script_add_data( 'taidanto-html5', 'conditional', 'lt IE 9' );


}
add_action( 'wp_enqueue_scripts', 'taidanto_scripts' );


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

