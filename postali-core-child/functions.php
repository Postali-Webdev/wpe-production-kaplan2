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

/**
 * Disable Theme/Plugin File Editors in WP Admin
 * - Hides the submenu items
 * - Blocks direct access to editor screens
 */
function postali_disable_file_editors_menu() {
    // Remove Theme File Editor from Appearance menu
    remove_submenu_page( 'themes.php', 'theme-editor.php' );
    // Optional: also remove Plugin File Editor from Plugins menu
    remove_submenu_page( 'plugins.php', 'plugin-editor.php' );
}
add_action( 'admin_menu', 'postali_disable_file_editors_menu', 999 );

// Block direct access to the editors even if someone knows the URL
function postali_block_file_editors_direct_access() {
    wp_die( __( 'File editing through the WordPress admin is disabled.' ), 403 );
}
add_action( 'load-theme-editor.php', 'postali_block_file_editors_direct_access' );
add_action( 'load-plugin-editor.php', 'postali_block_file_editors_direct_access' );

/**
 * Disable the Additional CSS panel in the Customizer.
 * Primary method: remove the custom_css component early in load.
 */
function postali_disable_customizer_additional_css_component( $components ) {
    $key = array_search( 'custom_css', $components, true );
    if ( false !== $key ) {
        unset( $components[ $key ] );
    }
    return $components;
}
add_filter( 'customize_loaded_components', 'postali_disable_customizer_additional_css_component' );

/**
 * Fallback: remove the Additional CSS section if it's present.
 */
function postali_remove_customizer_additional_css_section( $wp_customize ) {
    if ( method_exists( $wp_customize, 'remove_section' ) ) {
        $wp_customize->remove_section( 'custom_css' );
    }
}
add_action( 'customize_register', 'postali_remove_customizer_additional_css_section', 20 );

