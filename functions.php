<?php
/**
 * Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ben_theme
*/

if ( ! function_exists( 'theme_setup' ) ) :
  /**
    * Sets up theme defaults and registers support for various WordPress features.
    *
    * Note that this function is hooked into the after_setup_theme hook, which
    * runs before the init hook. The init hook is too late for some features, such
    * as indicating support for post thumbnails.
    */
  function theme_setup() {

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    /*
    * Let WordPress manage the document title.
    * By adding theme support, we declare that this theme does not use a
    * hard-coded <title> tag in the document head, and expect WordPress to
    * provide it for us.
    */
    add_theme_support( 'title-tag' );

    /*
    * Enable support for Post Thumbnails on posts and pages.
    *
    * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
    */
    add_theme_support( 'post-thumbnails' );


    register_nav_menus( array(
      'header-main-menu' => esc_html__( 'Main Menu' ),
      'footer-menu' => esc_html__( 'Footer Menu' )
    ) );

    /*
    * Switch default core markup for search form, comment form, and comments
    * to output valid HTML5.
    */
    add_theme_support( 'html5', array(
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
    ) );

    remove_image_size('1536x1536');
    remove_image_size('2048x2048');
    update_option( 'medium_size_w', 768 );
    update_option( 'medium_size_h', 2500 );
    update_option( 'large_size_w', 1280 );
    update_option( 'large_size_h', 5000 );
    add_image_size('extra-large', 1536);
    add_image_size('mega-large', 1920);

  }
endif;
add_action( 'after_setup_theme', 'theme_setup' );

// Adds CSS
// ============
function theme_styles() {
//  wp_dequeue_style( 'wp-block-library' );
  wp_enqueue_style( 'mainCSS', get_template_directory_uri() . '/css/style.min.css','',null );
}
add_action( 'wp_enqueue_scripts', 'theme_styles');

// Adds JS
// ==========
function theme_js() {
  wp_enqueue_script( 'picturefill', get_template_directory_uri() . '/js/picturefill.min.js#asyncload', '', '', false);
  wp_enqueue_script( 'libs', get_template_directory_uri() . '/js/libs.min.js', array('jquery'), '', true);
  wp_enqueue_script( 'mainJS', get_template_directory_uri() . '/js/main.min.js', array('jquery'), '', true);
}
add_action( 'wp_enqueue_scripts', 'theme_js');


// Custom login
// =============
function my_login_stylesheet() {
  wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/css/custom-login.css' );
}
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );

// changing the logo link from wordpress.org to your site
function login_url() {  return home_url(); }
add_filter( 'login_headerurl', 'login_url' );

// changing the alt text on the logo to show your site name
function login_title() { return get_option( 'blogname' ); }
add_filter( 'login_headertitle', 'login_title' );

// Remove all emoji scripts and styles from the frontend and admin
function removeEmojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
}
add_action('init', 'removeEmojis');

// Remove embed script
function my_deregister_scripts(){
  wp_deregister_script( 'wp-embed' );
}
add_action( 'wp_footer', 'my_deregister_scripts' );

remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
remove_action( 'wp_head', 'rest_output_link_wp_head' );

// Clean up wp_head
function cleanHeader() {
	remove_action( 'wp_head', 'wp_shortlink_wp_head' );
	remove_action( 'wp_head', 'feed_links_extra', 3 ); // Display the links to the extra feeds such as category feeds
	remove_action( 'wp_head', 'feed_links', 2 ); // Display the links to the general feeds: Post and Comment Feed
	remove_action( 'wp_head', 'rsd_link' ); // Display the link to the Really Simple Discovery service endpoint, EditURI link
	remove_action( 'wp_head', 'wlwmanifest_link' ); // Display the link to the Windows Live Writer manifest file.
	remove_action( 'wp_head', 'index_rel_link' ); // index link
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); // prev link
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); // start link
	remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 ); // Display relational links for the posts adjacent to the current post
	remove_action( 'wp_head', 'wp_generator' ); // Display the XHTML generator that is generated on the wp_head hook, WP version
}
add_action('init', 'cleanHeader');


// hide posts
// function post_remove ()  {
//    remove_menu_page('edit.php');
// }
// add_action('admin_menu', 'post_remove');


// Implement Additional files
//=========================//

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
* Load Custom Posts file
*/
require get_template_directory() . '/inc/custom-posts.php';

/**
* Load Custom Taxonomies file
*/
require get_template_directory() . '/inc/custom-taxonomies.php';


