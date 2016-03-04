<?php
/**
 * artist_website functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package artist_website
 */

if ( ! function_exists( 'deslauriers_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function deslauriers_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on artist_website, use a find and replace
	 * to change 'deslauriers' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'deslauriers', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary', 'deslauriers' ),
	) );
	register_nav_menus( array(
		'secondary' => esc_html__( 'Secondary', 'deslauriers' ),
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
	add_theme_support( 'custom-background', apply_filters( 'deslauriers_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'deslauriers_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function deslauriers_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'deslauriers_content_width', 640 );
}
add_action( 'after_setup_theme', 'deslauriers_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function deslauriers_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'deslauriers' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'deslauriers_widgets_init' );

function is_subcategory( $cat_id = NULL ) {

        if ( !$cat_id )
            $cat_id = get_query_var( 'cat' );

        if ( $cat_id ) {

            $cat = get_category( $cat_id );
            if ( $cat->category_parent > 0 )
                return true;
        }

        return false;
    }
    
function get_the_subcategory() {
	$categories = get_the_category();
    // get the sub category if we have them
    foreach ($categories as $cat) {
        $parent = $cat->category_parent;
        if ($parent != 0 ) {
            $sub_cat_ID = $cat->cat_ID;
        }
    }
    if (!$sub_cat_ID) {
        return false;
    } else {
        return $sub_cat_ID;
    }
} 

function get_next_subcategory_post_link() {
    $cat_ID = get_the_subcategory();
    if($cat_ID != false) {
        $args = array(
        "category"        => $cat_ID,
        "orderby"         => "post_date",
        "order"           => "ASC" );
        $list = get_posts($args);
        $current = false;
        foreach($list as $post) {
            if($current == true) {
                return get_permalink($post->ID);
            }
            if($post->ID == get_the_ID()) {
                $current = true;
            }
        }
    }
}

function get_previous_subcategory_post_link() {
    $cat_ID = get_the_subcategory();
    $args = array(
        "numberposts"     => 1000,
        "category"        => $cat_ID,
        "orderby"         => "post_date",
        "order"           => "DESC" );
        $list = get_posts($args);
        $current = false;
    foreach($list as $post) {
        if($current == true) {
            return get_permalink($post->ID);
        }
        if($post->ID == get_the_ID()) {
            $current = true;
        }
    } 
}
function deslauriers_scripts() {
		wp_enqueue_style( 'bootstrapCSS', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css', array(), '1.0', 'all' );
		wp_enqueue_script( 'angular-core', 'https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js', array( 'jquery' ), '1.0', false );
		wp_enqueue_script('angular-resource', 'https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular-resource.js', array('angular-core'), '1.0', false);
		wp_enqueue_script( 'ui-router', 'https://cdnjs.cloudflare.com/ajax/libs/angular-ui-router/0.2.15/angular-ui-router.min.js', array( 'angular-core' ), '1.0', false );
		wp_enqueue_script( 'ngScripts', get_template_directory_uri() . '/js/app.js', array( 'ui-router' ), '1.0', false );
		wp_localize_script( 'ngScripts', 'appInfo',
			array(
				
				'api_url'			 => rest_get_url_prefix() . '/wp/v2/',
				'template_directory' => get_template_directory_uri() . '/',
				'nonce'				 => wp_create_nonce( 'wp_rest' ),
				'is_admin'			 => current_user_can('administrator')
				
			)
		);
	wp_enqueue_style( 'deslauriers-style', get_stylesheet_uri() );

	wp_enqueue_script( 'deslauriers-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'deslauriers-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

// $ngTheme = new wp_ng_theme();
add_action( 'wp_enqueue_scripts', 'deslauriers_scripts' );

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
