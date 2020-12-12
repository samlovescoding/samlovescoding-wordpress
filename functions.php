<?php

// Load Stylesheets and Scripts
function load_stylesheets()
{
  wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/vendor/bootstrap/css/bootstrap.min.css');
  wp_enqueue_style('aos', get_template_directory_uri() . '/assets/vendor/aos/aos.css');
  wp_enqueue_style('samlovescoding', get_template_directory_uri() . '/assets/stylesheets/main.css');
}

function load_scripts()
{
  wp_enqueue_script('jquery', get_template_directory_uri() . '/assets/vendor/jquery/jquery.min.js');
  wp_enqueue_script('aos', get_template_directory_uri() . '/assets/vendor/aos/aos.js');
  wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/vendor/bootstrap/js/bootstrap.min.js', ['jquery']);
  wp_enqueue_script('samlovescoding', get_template_directory_uri() . '/assets/javascript/main.js', ['jquery', 'aos']);
}

add_action('wp_enqueue_scripts', 'load_stylesheets');
add_action('wp_enqueue_scripts', 'load_scripts');

// Define Component Hook
function get_component(string $slug, string $name = null, array $args = array())
{
  return get_template_part("components/" . $slug, $name, $args);
}

// Register Portfolio Post Type
function portfolio_post_type()
{
  register_post_type('portfolio', [
    'labels' => [
      'name' => 'Portfolio',
      'singular_name' => 'Portfolio Item'
    ],
    'menu_icon' => 'dashicons-book',
    'show_in_rest' => true,
    'public' => true,
    'has_archive' => true,
    'hierarchical' => false,
    'supports' => ['title', 'editor', 'thumbnail'],
    'rewrite' => [
      'slug' => 'portfolio'
    ],
    'taxonomies' => ['post_tag']
  ]);
}

add_action('init', 'portfolio_post_type');

// Register Theme Support
function setup_theme()
{
  add_theme_support('custom-background', [
    'default-color' => '#000',
    'default-image' => get_template_directory_uri() . '/assets/images/background.jpg',
  ]);
  add_theme_support('wp-block-styles');
  add_theme_support('post-thumbnails');
  add_theme_support('align-wide');
  add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script'));
  add_theme_support('automatic-feed-links');
  add_theme_support('customize-selective-refresh-widgets');
}

add_action('after_setup_theme', 'setup_theme');

// Register Navigation Menus
function register_menus()
{
  register_nav_menus([
    'header-menu' => 'Header Links',
    'footer-menu' => 'Footer Links',
  ]);
}

add_action("init", "register_menus");

// Register Thumbnail Sizes
add_image_size('portfolio-thumbnail', 1024, 1024, true);  // Portfolio Item

// Register Custom Options
function customize_theme_options($wp_customize)
{
  $wp_customize->add_section('social_links', [
    'title' => 'Social Links',
    'priority'    => 100,
    'capability'  => 'edit_theme_options',
    'description' => 'Change social links here.',
  ]);

  // Youtube Link
  $wp_customize->add_setting('setting_social_youtube', ['default' => "#"]);
  $wp_customize->add_control('setting_social_youtube', array(
    'label'   => 'Youtube Link',
    'section' => 'social_links',
    'type'    => 'text',
  ));

  // Twitter Link
  $wp_customize->add_setting('setting_social_twitter', ['default' => "#"]);
  $wp_customize->add_control('setting_social_twitter', array(
    'label'   => 'Twitter Link',
    'section' => 'social_links',
    'type'    => 'text',
  ));

  // Github Link
  $wp_customize->add_setting('setting_social_github', ['default' => "#"]);
  $wp_customize->add_control('setting_social_github', array(
    'label'   => 'Github Link',
    'section' => 'social_links',
    'type'    => 'text',
  ));

  // Discord Link
  $wp_customize->add_setting('setting_social_discord', ['default' => "#"]);
  $wp_customize->add_control('setting_social_discord', array(
    'label'   => 'Discord Link',
    'section' => 'social_links',
    'type'    => 'text',
  ));

  // Behance Link
  $wp_customize->add_setting('setting_social_behance', ['default' => "#"]);
  $wp_customize->add_control('setting_social_behance', array(
    'label'   => 'Behance Link',
    'section' => 'social_links',
    'type'    => 'text',
  ));

  // Facebook Link
  $wp_customize->add_setting('setting_social_facebook', ['default' => "#"]);
  $wp_customize->add_control('setting_social_facebook', array(
    'label'   => 'Facebook Link',
    'section' => 'social_links',
    'type'    => 'text',
  ));
}

add_action('customize_register', 'customize_theme_options');
