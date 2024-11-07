<?php 

require get_theme_file_path('/inc/shortcodes/banner-sc.php');
require get_theme_file_path('/inc/shortcodes/bookmakers-sidebar-sc.php');
require get_theme_file_path('/inc/shortcodes/category-post-sc.php');
require get_theme_file_path('/inc/shortcodes/hero-section-sc.php');
require get_theme_file_path('/inc/shortcodes/operator-list-sc.php');
require get_theme_file_path('/inc/shortcodes/registration-steps-sc.php');
require get_theme_file_path('/inc/shortcodes/search-bar-sc.php');
require get_theme_file_path('/inc/shortcodes/subcat-sidebar-sc.php');
require get_theme_file_path('/inc/routes/search-route.php');

function academy_files() {
  wp_enqueue_style('bootstrap-styles', '//cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css');
  wp_enqueue_style('academy_main_styles', get_stylesheet_uri());
  wp_enqueue_style('university_extra_styles', get_theme_file_uri('/dist/css/main.css'));
  wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;700');
  wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css');
  wp_enqueue_script('main-academy-js', get_theme_file_uri('/src/search.js'), [], '1.0', true);
  wp_enqueue_script('bootstrap-js', '//cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js', [], '1.0', true);

  wp_localize_script('main-academy-js', 'academyData', [
    'root_url' => get_site_url()
  ]);
}

add_action('wp_enqueue_scripts', 'academy_files');


function academy_features() {
  register_nav_menu('headerMenuLocation', 'Header Menu Location');
  add_theme_support('title-tag');
  add_theme_support('custom-logo');
  add_theme_support('post-thumbnails');
  add_theme_support( 'page-templates', array(
    'templates/sidebar-left.php'  => ( 'Left Sidebar' ),
    'templates/sidebar-right.php' => ( 'Right Sidebar' ),
    'templates/full-width.php'    => ( 'Full Width' ),
  ) );
}

add_action('after_setup_theme', 'academy_features');

add_filter( 'theme_page_templates', function ( $templates ) {
  $templates['templates/sidebar-left.php']  = 'Left Sidebar';
  $templates['templates/sidebar-right.php'] = 'Right Sidebar';
  $templates['templates/full-width.php']    = 'Full Width';
  return $templates;
} );

  // Operators Post Type
  function academy_post_types() {
    register_post_type('operators', [
    'map_meta_cap'    => true,
    'supports'        => ['title', 'editor', 'excerpt', 'custom-fields'],
    'rewrite'         => ['slug' => 'operators'],
    'has_archive'     => true,
    'public'          => true,
    'show_in_rest'    => true,
    'labels'          => [
      'name'            => 'Operators',
      'add_new_item'    => 'Add New Operator',
      'edit_item'       => 'Edit Operator',
      'all_items'       => 'All Operators',
      'singular_name  ' => 'Operator'
    ],
    'menu_icon'       => 'dashicons-buddicons-buddypress-logo'
  ]);
}

  add_action('init', 'academy_post_types');


function add_additional_class_on_li( $classes, $item, $args, $depth ) {
  if( $args->theme_location == 'headerMenuLocation' ) {
      $depth > 0 ? $classes[] = '' : $classes[] = 'nav-item';
  }
  return $classes;
}
add_filter( 'nav_menu_css_class', 'add_additional_class_on_li', 1, 4 );

function add_specific_menu_location_atts( $atts, $item, $args, $depth ) {
  if( $args->theme_location == 'headerMenuLocation' ) {
     if (in_array('menu-item-has-children', $item->classes)) {
        $atts['class'] = 'nav-link custom-dropdown-toggle fw-bold me-3';
        $atts['data-bs-toggle'] = 'dropdown';
     } else {
        $atts['class'] = 'nav-link fw-bold me-3';
     }
  }
  return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_specific_menu_location_atts', 10, 4 );

function main_menu_submenu_css_class( $classes, $args ) {
  if ( $args->theme_location === 'headerMenuLocation' ) {
     $classes[] = 'dropdown-menu';
  }
  return $classes;
}
add_filter( 'nav_menu_submenu_css_class', 'main_menu_submenu_css_class', 10,2 );

function footer_widget_init() {
  register_sidebar( array(
      'name'          => __( 'Footer Widget', 'your-text-domain' ),
      'id'            => 'widget-id',
      'description'   => __( 'Widget for footer.', 'your-text-domain' ),
      'before_widget' => '<div class="widget">',
      'after_widget'  => '</div>',
      'before_title'  => '<h2 class="widget-title">',
      'after_title'   => '</h2>',
  ) );

  register_sidebar( array(
    'name'          => __( 'Sidebar Widget', 'your-text-domain' ),
    'id'            => 'sidebar-widget',
    'description'   => __( 'Widget for sidebar.', 'your-text-domain' ),
    'before_widget' => '<div class="widget">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
) );
}
add_action( 'widgets_init', 'footer_widget_init' );


function custom_posts_per_page( $query ) {
  if ( is_archive() && ! is_admin() && $query->is_main_query() ) {
    $query->set( 'posts_per_page', 11 );
  }
}
add_filter( 'pre_get_posts', 'custom_posts_per_page' );



if( function_exists('acf_add_options_page') ) {
    
  acf_add_options_page();
  acf_add_options_sub_page('Header');
  acf_add_options_sub_page('Footer');

  acf_add_options_page(array(
    'page_title'    => 'Theme Options',
    'menu_title'    => 'Theme Options',
    'menu_slug'     => 'theme-options',
    'capability'    => 'edit_posts',
    'parent_slug'    => '',
    'position'    => false,
    'icon_url'    => false,
    'redirect'      => false
  ));

  acf_add_options_sub_page(array(
    'page_title'    => 'Header',
    'menu_title'    => 'Header',
    'menu_slug'    => 'theme-options-header',
    'capability'    => 'edit_posts',
    'parent_slug'   => 'theme-options',
    'position'    => false,
    'icon_url'    => false
  ));

  acf_add_options_sub_page(array(
    'page_title'    => 'Footer',
    'menu_title'    => 'Footer',
    'menu_slug'    => 'theme-options-footer',
    'capability'    => 'edit_posts',
    'parent_slug'   => 'theme-options',
    'position'    => false,
    'icon_url'    => false
  ));
  
}



?>

