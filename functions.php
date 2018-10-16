<?php
/**
 * CLM functions and definitions
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
 * @package CLM
 */

if (!function_exists('CLM_setup')) :
function CLM_setup() {
  // Make theme available for translation
  load_theme_textdomain('CLM');

  // Add default posts and comments RSS feed links to head
  add_theme_support('automatic-feed-links');

  // Let wordpress manage document title.
  add_theme_support('title-tag');

  // Add post thumbnails on poss and pages
  add_theme_support('post-thumbnails');
  set_post_thumbnail_size(1200, 9999);

  // register the nav menus
  register_nav_menus(array(
    'primary' => __('Primary Menu', 'CLM'),
    'footer' => __('footer', 'CLM'),
  ));

  add_theme_support('html5', array(
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
  ));

  add_theme_support('post-formats', array(
    'aside',
    'image',
    'video',
    'quote',
    'link',
    'gallery',
    'status',
    'audio',
    'chat',
  ));

  // add theme support for Custom Logo.
  add_theme_support('custom-logo', array(
    'width'       => 250,
    'height'      => 250,
    'flex-width'  => true,
  ));
}
endif;
add_action('after_setup_theme', 'CLM_setup');

/* Enqueue stylesheets */
function CLM_enqueue_styles() {
  wp_enqueue_style('CLM-stylesheet', get_stylesheet_uri());
  wp_enqueue_style('hamburgers', get_stylesheet_directory_uri() . '/css/hamburgers.min.css');
}
add_action('wp_enqueue_scripts', 'CLM_enqueue_styles');

/* Enqueue scripts */
function CLM_enqueue_scripts() {
  wp_enqueue_script( 'moment-js', get_stylesheet_directory_uri() . '/assets/js/moment.min.js', '', true );
  wp_enqueue_script( 'app', get_stylesheet_directory_uri() . '/assets/js/app.js', '', true);
}
add_action('wp_enqueue_scripts', 'CLM_enqueue_scripts');

if(!function_exists('CLM_archives_page_widgets_init')) :
function CLM_archives_page_widgets_init() {
  register_sidebar(array(
    'name' => __('Archives page widget', 'CLM'),
    'description' => __('This widget will be shown on the right side of your archive page.', 'CLM'),
    'id' => 'archive',
    'before_widget' => '<div class="archives-widget">',
    'after_widget' => '</div>',
    'before_title' => '<h1 class="widget-title">',
    'after_title' => '</h1>',
  ));
}
endif;
add_action('widgets_init', 'CLM_archives_page_widgets_init');

/* remove the admin bar on the front end */
function CLM_hide_admin_bar_from_front_end() {
  if ( is_blog_admin() ) {
    return true;
  }
  remove_action('wp_head', '_admin_bar_bump_cb');
  return false;
}
add_filter('show_admin_bar', 'CLM_hide_admin_bar_from_front_end');

/* Add admin menu link for admins */
function CLM_admin_nav_link($items) {
  if (current_user_can('administrator')) {
    $adminLink = '<li><a href="/wp-admin">Admin</a></li>';
    $items = $items . $adminLink;
  }
  return $items;
}
add_filter('wp_nav_menu_items', 'CLM_admin_nav_link');

/* Add login/logout links to the menu */
function CLM_login_nav_link($items) {
  $statusLink = '<li>' . wp_loginout(get_permalink(), false) . '</li>';
  return $items . $statusLink;
}
add_filter('wp_nav_menu_items', 'CLM_login_nav_link');

/* Change login screen logo */
function CLM_login_logo() { ?>
  <style type="text/css">
    #login h1 a, .login h1 a {
      background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo.svg);
      height:275px;
      width:320px;
      background-size: 320px 275px;
      background-repeat: no-repeat;
      padding-bottom: 30px;
    }
  </style>
<?php }
add_action( 'login_enqueue_scripts', 'CLM_login_logo' );

/* Change login screen logo url */
function CLM_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'CLM_login_logo_url' );

/* Load Library files */
if (!function_exists('CLM_flatten_array')):
/**
 * Returns a flattened array
 *
 * @param array $array The multi dimensional array to flatten
 */
function CLM_flatten_array($array) {
  return is_array($array) ? array_reduce($array, function($c, $a) { return array_merge($c, CLM_flatten_array($a)); }, array()) : array($array);
}
endif;

if (!function_exists('CLM_get_all_files')) :
/**
 * Returns all of the files, folders and sub files/folders in a given folder
 *
 * @param string $dir The folder to search
 */
function CLM_get_all_files($dir) {
  $files = scandir($dir);
  $results = array();

  foreach( $files as $file )
    if ($file !== '.' && $file !== '..' ) {
      $path = $dir . DIRECTORY_SEPARATOR . $file;
      if (is_dir($path)) 
        $result[] = CLM_get_all_files($path);
      else
        $result[] = $path;
    }
  
  return $result;
}
endif;

$files = CLM_get_all_files(get_template_directory() . '/inc/');
foreach( CLM_flatten_array($files) as $file)
  require_once $file;