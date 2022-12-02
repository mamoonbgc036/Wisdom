<?php 

require_once( get_theme_file_path( '/inc/tgm.php' ) );

if( site_url() == 'http://127.0.0.1/WordPress' ) {
    define( 'VERSION', time() );
} else{
    define( 'VERSION', wp_get_theme()->get( 'Version' ) );
}

function wisdom_theme_setup(){
    load_theme_textdomain( 'wisdom' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'html5', array( 'search-form', 'comment-list' ) );
    add_theme_support( 'post-formats', array( 'image', 'gallery', 'quote', 'audio', 'video', 'link' ) );
    add_editor_style( "/assets/css/editor-style.css" );

    register_nav_menu( 'topmenu', __( 'Top Menu', 'Wisdom' ) );

    add_image_size( 'wisdom_post_square', 400, 400, true );
}

add_action( "after_setup_theme", "wisdom_theme_setup" );

function wisdom_enqueue_style_and_scripts(){
    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css' );
    wp_enqueue_style( 'font-css', get_theme_file_uri( 'assets/css/fonts.css' ), null, '1.0' );
    wp_enqueue_style( 'base-css', get_theme_file_uri( 'assets/css/base.css' ), null, '1.0' );
    wp_enqueue_style( 'vendor-css', get_theme_file_uri( 'assets/css/vendor.css' ), null, '1.0' );
    wp_enqueue_style( 'main-css', get_theme_file_uri( 'assets/css/main.css' ), null, '1.0' );
    wp_enqueue_style( 'custom', get_stylesheet_uri(), null, VERSION );


    wp_enqueue_script( 'modernizer-js', get_theme_file_uri( '/assets/js/modernizr.js' ), null, '1.0', false );
    wp_enqueue_script( 'pace-js', get_theme_file_uri( '/assets/js/pace.min.js' ), null, '1.0', false );
    wp_enqueue_script( 'plugin-js', get_theme_file_uri( 'assets/js/plugins.js' ), array( 'jquery' ), '1.0', true );
    wp_enqueue_script( 'main-js', get_theme_file_uri( 'assets/js/main.js' ), array( 'jquery' ), VERSION, true );

}

add_action( 'wp_enqueue_scripts', 'wisdom_enqueue_style_and_scripts' );