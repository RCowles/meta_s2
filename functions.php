<?php
/**
 * meta_s2 functions and definitions
 *
 * @package meta_s2
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

if ( ! function_exists( 'meta_s2_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function meta_s2_setup() {

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on meta_s2, use a find and replace
	 * to change 'meta_s2' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'meta_s2', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'meta_s2' ),
		'secondary' => __( 'Secondary Menu', 'meta_s2' ),
	) );

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	/**
	 * Setup the WordPress core custom background feature.
	 */
	add_theme_support( 'custom-background', apply_filters( 'meta_s2_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
	
	/**
	 * Featured Content and related Image Size
	 */
	add_image_size( 'meta_s2_featured', 300, 300, true );
	
	add_theme_support( 'featured-content', array(
	    'featured_content_filter' => 'meta_s2_featured_posts',
	    'max_posts'   => 4,
	) );
	 
	function meta_s2_get_featured_posts() {
	    return apply_filters( 'meta_s2_featured_posts', array() );
	}
	 
	function meta_s2_has_featured_posts( $minimum = 0 ) {
	    if ( is_paged() )
	        return false;
	 
	    $minimum = absint( $minimum );
	    $featured_posts = apply_filters( 'mytheme_get_featured_posts', array() );
	 
	    if ( ! is_array( $featured_posts ) )
	        return false;
	 
	    if ( $minimum > count( $featured_posts ) )
	        return false;
	 
	    return true;
	}	
}
endif; // meta_s2_setup
add_action( 'after_setup_theme', 'meta_s2_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function meta_s2_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'meta_s2' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Widgets', 'meta_s2' ),
		'id'            => 'footer-widgets',
		'before_widget' => '<aside id="%1$s" class="widget %2$s footer-widget">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'meta_s2_widgets_init' );


/**
 * Enqueue scripts and styles
 */
function meta_s2_scripts() {
	wp_enqueue_style( 'meta_s2-style', get_stylesheet_uri() );

	wp_enqueue_script( 'meta_s2-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'meta_s2-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'meta_s2-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}
add_action( 'wp_enqueue_scripts', 'meta_s2_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
