<?php

/**
 * RED Starter Theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package RED_Starter_Theme
 */

if (!function_exists('red_starter_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 */
	function red_starter_setup()
	{
		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		// Let WordPress manage the document title.
		add_theme_support('title-tag');

		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support('post-thumbnails');

		// This theme uses wp_nav_menu() in one location.
		// register_nav_menus( array(
		// 	'primary' => esc_html( 'Primary Menu' ),
		// ) );

		// Switch search form, comment form, and comments to output valid HTML5.
		add_theme_support('html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		));
		add_theme_support('menus');
	}
endif; // red_starter_setup
add_action('after_setup_theme', 'red_starter_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * @global int $content_width
 */
function red_starter_content_width()
{
	$GLOBALS['content_width'] = apply_filters('red_starter_content_width', 640);
}
add_action('after_setup_theme', 'red_starter_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function red_starter_widgets_init()
{
	register_sidebar(array(
		'name'          => esc_html('Sidebar'),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));
}
add_action('widgets_init', 'red_starter_widgets_init');

/**
 * Filter the stylesheet_uri to output the minified CSS file.
 */
// function red_starter_minified_css($stylesheet_uri, $stylesheet_dir_uri)
// {
// 	if (file_exists(get_template_directory() . 'style.css')) {
// 		$stylesheet_uri = $stylesheet_dir_uri . 'style.css';
// 	}

// 	return $stylesheet_uri;
// }
// add_filter('stylesheet_uri', 'red_starter_minified_css', 10, 2);

/**
 * Enqueue scripts and styles.
 */
function red_starter_scripts()
{
	wp_enqueue_style('style', get_template_directory_uri() . '/build/css/style.min.css');
	wp_enqueue_style('fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css');
	// wp_enqueue_script('red-starter-navigation', get_template_directory_uri() . '/build/js/navigation.min.js', array(), '20151215', true);
	// wp_enqueue_script('red-starter-skip-link-focus-fix', get_template_directory_uri() . '/build/js/skip-link-focus-fix.min.js', array(), '20151215', true);
	wp_enqueue_script('main', get_template_directory_uri() . '/build/js/main.min.js');
	// echo get_template_directory_uri() . '/js/main.js';
	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'red_starter_scripts');

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';


/****my own code ****/
register_nav_menus(
	array(
		'top-menu' => 'Top Menu Location',
		'mobile-menu' => 'Mobile Menu Location',
	)
);
if (is_page('home')) {
	echo '$';
}
function add_last_nav_item($items)
{
	$tempDir = get_template_directory_uri() . '/res/logos/tent-dark.svg';
	if (is_single()) {
		$tempDir = get_template_directory_uri() . '/res/logos/tent-white.svg';
	} elseif (is_front_page() || is_home() || is_page('about')) {
		$tempDir = get_template_directory_uri() . '/res/logos/tent-white.svg';
	}
	// $items .= '<li>' . get_search_form() . '</li>';
	$items .= '<li><img src="' . $tempDir  . '" class="logo-head"></li>';
	$items .= '<li><i class="fa fa-search" ></i></li>';
	return $items;
}
add_filter('wp_nav_menu_items', 'add_last_nav_item');
