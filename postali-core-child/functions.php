<?php

add_theme_support( 'post-thumbnails' );

add_post_type_support( 'page', 'excerpt' );

add_action('wp_enqueue_scripts', 'postali_child_scripts');
function postali_child_scripts() {

    wp_enqueue_style( 'child-stylesheet', get_stylesheet_directory_uri() . '/style.css' ); // Enqueue Child theme style sheet (theme info)
    wp_enqueue_style( 'child-styles', get_stylesheet_directory_uri() . '/assets/css/styles.css'); // Enqueue Child theme styles.css
    
    // Compiled .js using Grunt.js
    wp_register_script('child-custom-scripts', get_stylesheet_directory_uri() . '/assets/js/scripts.min.js',array('jquery'), null, true); 
    wp_enqueue_script('child-custom-scripts');
    
    //slick
    wp_enqueue_style( 'slick-styles', get_stylesheet_directory_uri() . '/assets/css/slick.css'); // Enqueue child theme styles.css
    wp_register_script('slick-scripts', get_stylesheet_directory_uri() . '/assets/js/slick.min.js',array('jquery'), null, true); 
    wp_enqueue_script('slick-scripts');
    wp_register_script('child-slick-custom', get_stylesheet_directory_uri() . '/assets/js/slick-custom.min.js',array('jquery'), null, true); 
    wp_enqueue_script('child-slick-custom');

    //Icomoon
    wp_register_style( 'icomoon', 'https://cdn.icomoon.io/152819/Kaplan/style.css?xipuso', array() );
    wp_enqueue_style('icomoon');

    //scrollCue
    wp_register_style( 'scrollCue-styles', get_stylesheet_directory_uri() . '/assests/css/scrollCue.css' );
    wp_enqueue_style( 'scrollCue-styles' );
    wp_register_script('scrollCue-scripts', get_stylesheet_directory_uri() . '/assets/js/scrollCue.min.js', null, true); 
    wp_enqueue_script('scrollCue-scripts');
}

function share_categories_with_pages() {
    register_taxonomy_for_object_type('category', 'page');
}
add_action('init', 'share_categories_with_pages');
