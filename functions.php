<?php 
// =====================================
// ============= SETUP =================
// =====================================
if (!function_exists('theme_setup')) {
  function theme_setup() {
    add_editor_style();
    add_theme_support( 'post-thumbnails' );
    add_theme_support('html5');
    add_theme_support('menus');
  }
}

add_action('after_setup_theme', 'theme_setup');

// =====================================
// ================ MENU ===============
// =====================================
if (!function_exists('register_menu')) {
  function register_menu() {
    register_nav_menus(
      array(
        'primary' => __('Primary Menu', 'textdomain' ),
        'secondary' => __( 'Secondary Menu', 'textdomain' )
      )
    );
  }
}
add_action( 'init', 'register_menu' );

// ======================================
// ============= CSS SETUP ==============
// ======================================
if (!function_exists('add_css')) {
  function add_css(){
    wp_register_style ('main', get_template_directory_uri().'/bundler/css/main.css');
    wp_enqueue_style('main');
  }
}
add_action('wp_enqueue_scripts', 'add_css');

// ======================================
// ============== JS SETUP ==============
// ======================================
if (!function_exists('add_js')) {
  function add_js(){
    wp_register_script('scripts', get_bloginfo('template_directory'). '/bundler/js/bundle.js' );
    wp_enqueue_script('scripts');
  }
}
add_action("wp_enqueue_scripts", "add_js");

// =====================================
// ========== CUSTOMIZER API ===========
// =====================================
require get_template_directory() . '/includes/customizer.php';

?>