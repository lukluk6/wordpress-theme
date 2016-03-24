<?php
/**
 * wordpress-theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wordpress-theme
 */


if ( ! function_exists( 'wordpress_theme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function wordpress_theme_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on wordpress-theme, use a find and replace
	 * to change 'wordpress-theme' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'wordpress-theme', get_template_directory() . '/languages' );

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

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'wordpress-theme' ),
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

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'wordpress_theme_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'wordpress_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wordpress_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wordpress_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'wordpress_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wordpress_theme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'wordpress-theme' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'wordpress_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function wordpress_theme_scripts() {
	wp_enqueue_style( 'wordpress-theme-style', get_stylesheet_uri() );

	wp_enqueue_script( 'wordpress-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'wordpress-theme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wordpress_theme_scripts' );

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

/**
 * Call Options page file.
 */
 require get_stylesheet_directory() .'/inc/options.php';

 //post thumbnail
 add_theme_support( 'post-thumbnails' );
 set_post_thumbnail_size( 500, 500);//sizes of the image.

 //add signature
add_filter('the_content','add_signature');
function add_signature($text) {
global $post;
if($post->post_type == 'post') $text .= '<div class="signature"> Yoyos Yoga and Fitness</div>';
return $text;
}


// the 'more' text for excerpts
add_filter( 'the_content_more_link', 'modify_read_more_link' );

function modify_read_more_link() {
	return '<a class="more-link" href="' . get_permalink() . '"> Click me for more &raquo; &raquo; &raquo; &raquo;</a>';
}





//slider area picture size
add_image_size ('home-slider', 960,280, true);

//calling tthe yoyoplugin widgets
//require get_stylesheet_directory() . '/inc/yoyoplugin.php';

<<<<<<< HEAD
?>
=======
// Call the file that makes our new widget
require get_stylesheet_directory() . '/inc/thewidget.php';


>>>>>>> origin/master




