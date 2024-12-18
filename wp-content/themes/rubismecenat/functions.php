<?php
/**
 * rubismecenat functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package rubismecenat
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function rubismecenat_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on rubismecenat, use a find and replace
		* to change 'rubismecenat' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'rubismecenat', get_template_directory() . '/languages' );

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
	add_post_type_support( 'page', 'excerpt' );
	
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-primary-1' => esc_html__( 'Menu Header gauche', 'rubismecenat' ),
			'menu-primary-2' => esc_html__( 'Menu Header droit', 'rubismecenat' ),
			'menu-footer-1' => esc_html__( 'Menu Footer gauche', 'rubismecenat' ),
			'menu-footer-2' => esc_html__( 'Menu Footer droit', 'rubismecenat' ),
			'menu-footer-last' => esc_html__( 'Menu Footer Mentions', 'rubismecenat' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);


	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'rubismecenat_setup' );



/**
 * Enqueue scripts and styles.
 */
function rubismecenat_scripts() {

	// ENQUEUE STYLES
	wp_enqueue_style( 'main', get_template_directory_uri() . '/assets/style.css', array(), _S_VERSION );

	
	// ENQUEUE SCRIPTS
	wp_enqueue_script( 'utils', get_template_directory_uri() . '/assets/js/utils.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/main.min.js', array('utils'), _S_VERSION, true );
	wp_enqueue_script( 'navigation', get_template_directory_uri() . '/assets/js/navigation.js', array('utils', 'main'), _S_VERSION, true );


	// ENQUEUE SWIPER
	wp_enqueue_style('swiper-styles', get_template_directory_uri() . '/assets/swiper/swiper-bundle.min.css', null);
	wp_enqueue_script('swiper', get_template_directory_uri() . '/assets/swiper/swiper-bundle.min.js', null, true);
	wp_enqueue_script('slider', get_template_directory_uri() . '/assets/js/slider.js', null, true);

	
	// ENQUEUE PARTICULAR SCRIPTS
	wp_add_inline_script( 'main', 'const ajax_datas = ' . json_encode( array(
        'ajaxUrl' => admin_url( 'admin-ajax.php' ),
        'nonce' => wp_create_nonce( 'handle_contents_loading' )
    ) ), 'before' );

	wp_enqueue_script( 'loaders', get_template_directory_uri() . '/assets/js/loaders.js', array("main"), _S_VERSION, true );

	// DEQUEUE
	wp_dequeue_style('sbi_styles');
	wp_register_style('sbi_styles_custom', get_template_directory_uri() . '/assets/sbi_custom.css', array(), _S_VERSION );


}
add_action( 'wp_enqueue_scripts', 'rubismecenat_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';


/**
 * Functions which load content (ajax).
 */
require get_template_directory() . '/inc/loaders.php';


/**
 * Images sizes.
 */

add_action( 'after_setup_theme', 'wpdocs_theme_setup' );
function wpdocs_theme_setup() {
    add_image_size( 'theme_tiny', 200 );
	add_image_size( 'theme_small', 500 );
	add_image_size( 'theme_medium', 700 );
	add_image_size( 'theme_large', 1300 );
	add_image_size( 'theme_wide', 1800 );
}


function wpsnippets_add_favicon() {
    echo '<link rel="icon" href="' . esc_url( get_stylesheet_directory_uri() ) . '/assets/favicon.ico" type="image/x-icon">';
}
add_action( 'wp_head', 'wpsnippets_add_favicon' );



/*
 * Make theme available for translation.
 * Translations can be filed in the /languages/ directory.
 * If you're building a theme based on mep_2021, use a find and replace
 * to change 'mep_2021' to the name of your theme in all the template files.
*/

load_theme_textdomain( 'rubismecenat', get_template_directory() . '/languages' );
pll_register_string('rubismecenat', 'Tous les détails', 'true');
pll_register_string('rubismecenat', 'Tous les contenus', 'true');
pll_register_string('rubismecenat', 'Tous les ouvrages', 'true');
pll_register_string('rubismecenat', 'Récupérér le fichier', 'true');
pll_register_string('rubismecenat', 'Voir le site de l\'éditeur', 'true');
pll_register_string('rubismecenat', "Nous n'avons pas pu confirmer votre inscription.", 'true');
pll_register_string('rubismecenat', "Votre inscription est confirmée.", 'true');
pll_register_string('rubismecenat', "Recevez l’actualité de nos actions artistiques et culturelles", 'true');
pll_register_string('rubismecenat', "Nous n'avons pas trouvé de contenu.", 'true');
pll_register_string('rubismecenat', "Désolé, aucun contenu ne correspond à votre recherche. Veuillez essayer différents termes.", 'true');
pll_register_string('rubismecenat', "Oops. Nous ne trouvons pas la page...", 'true');
pll_register_string('rubismecenat', "Nous contacter", 'true');



