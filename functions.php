<?php

function load_stylesheets()
{
  wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/vendor/bootstrap/css/bootstrap.min.css');
  wp_enqueue_style('samlovescoding', get_template_directory_uri() . '/assets/stylesheets/main.css');
}

function load_scripts()
{
  wp_enqueue_script('jquery', get_template_directory_uri() . '/assets/vendor/jquery/jquery.min.js');
  wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/vendor/bootstrap/js/bootstrap.min.js');
  wp_enqueue_script('samlovescoding', get_template_directory_uri() . '/assets/javascript/main.js');
}

add_action('wp_enqueue_scripts', 'load_stylesheets');
add_action('wp_enqueue_scripts', 'load_scripts');

function get_component(string $slug, string $name = null, array $args = array())
{
  return get_template_part("components/" . $slug, $name, $args);
}

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
    ]
  ]);
  register_taxonomy('skill', ['portfolio'], [
    'labels' => [
      'name' => 'Skills',
      'singular_name' => 'Skill'
    ],
    'public' => true,
    'heirarchical' => false
  ]);
}

add_action('init', 'portfolio_post_type');

function setup_theme()
{
  add_theme_support('custom-background', [
    'default-color' => '#000',
    'default-image' => get_template_directory_uri() . '/images/background.jpg',
  ]);
  add_theme_support('wp-block-styles');
  add_theme_support('post-thumbnails');
  add_theme_support('align-wide');
}
add_action('after_setup_theme', 'setup_theme');
