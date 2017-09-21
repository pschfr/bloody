<?php
// Removes unneccessary scripts and enqueues proper ones
function theme_enqueue_scripts() {
	wp_deregister_script('wp-embed'); // Whatever that script is we don't need it
	wp_deregister_script('jquery');   // We do this to include a more recent version
	wp_register_script('jquery',   ('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'), false, '', true);
	wp_enqueue_script('main', get_template_directory_uri() . '/includes/main.js', array('jquery'), '', true );
}
add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');

// Enqueues necessary CSS
function theme_enqueue_styles() {
	wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');
	wp_enqueue_style('main', get_template_directory_uri().'/includes/css/style.css');
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles', 11);

// Prevents Contact Form 7 from loading CSS and JS, it's enabled only on templates/about.php
// https://contactform7.com/loading-javascript-and-stylesheet-only-when-it-is-necessary/
add_filter('wpcf7_load_css', '__return_false');
add_filter('wpcf7_load_js',  '__return_false');

// Initializes widget area
function theme_widgets_init() {
	register_sidebar(array(
		'name' => 'Widget Area 1',
		'id'   => 'widget_area_1',
		'before_widget' => '<div class="small-12 columns">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>'
	));
}
// add_action('widgets_init', 'theme_widgets_init');

// Initializes menu area
function theme_menus_init() {
	register_nav_menu('main_menu', __('Main Menu'));
	register_nav_menu('social_links', __('Social Links'));
}
add_action('init', 'theme_menus_init');

function add_menu_class($ulclass) {
   return preg_replace('/<a /', '<a class="link dib mb4"', $ulclass);
}
add_filter('wp_nav_menu','add_menu_class');

// Disables all the wpemoji shit
function disable_emojis_tinymce($plugins) {
	if(is_array($plugins))
		return array_diff($plugins, array('wpemoji'));
	else
		return array();
}
function disable_emojis() {
	remove_action('wp_head',             'print_emoji_detection_script', 7);
	remove_action('admin_print_scripts', 'print_emoji_detection_script');
	remove_action('wp_print_styles',     'print_emoji_styles');
	remove_action('admin_print_styles',  'print_emoji_styles');
	remove_filter('the_content_feed',    'wp_staticize_emoji');
	remove_filter('comment_text_rss',    'wp_staticize_emoji');
	remove_filter('wp_mail',             'wp_staticize_emoji_for_email');
	add_filter('tiny_mce_plugins',       'disable_emojis_tinymce');
}
add_action('init', 'disable_emojis');

// Disables WP-JSON, Windows Live Writer, other shit
remove_action('wp_head', 'rest_output_link_wp_head', 10);
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('template_redirect', 'rest_output_link_header', 11, 0);

// It's pretty dumb that I have to do this manually
add_filter('widget_text', 'do_shortcode');
add_theme_support('post-thumbnails');

// Custom post types!
require_once('includes/cpt.php');
// And CMB2 metaboxes!
require_once('includes/cmb2.php');
