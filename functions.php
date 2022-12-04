<?php 

require_once( get_theme_file_path( '/inc/tgm.php' ) );
require_once( get_theme_file_path( '/inc/attachments.php' ) );

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

if ( ! function_exists( "philosophy_pagination" ) ) {
    function philosophy_pagination() {
        global $wp_query;
        $links = paginate_links( array(
            'current'  => max( 1, get_query_var( 'paged' ) ),
            'total'    => $wp_query->max_num_pages,
            'type'     => 'list',
            'mid_size' => apply_filters( "philosophy_pagination_mid_size", 4 )
        ) );
        $links = str_replace( "page-numbers", "pgn__num", $links );
        $links = str_replace( "<ul class='pgn__num'>", "<ul>", $links );
        $links = str_replace( "next pgn__num", "pgn__next", $links );
        $links = str_replace( "prev pgn__num", "pgn__prev", $links );
        echo wp_kses_post( $links );
    }
}

//remove extra p tag from category description whick cause small font

remove_action( 'term_description', 'wpautop' );

//registering widget for about us page such as who we are

/* Better way to add multiple widgets areas */
// function widget_registration($name, $id, $description,$beforeWidget, $afterWidget, $beforeTitle, $afterTitle){
//     register_sidebar( array(
//         'name' => $name,
//         'id' => $id,
//         'description' => $description,
//         'before_widget' => $beforeWidget,
//         'after_widget' => $afterWidget,
//         'before_title' => $beforeTitle,
//         'after_title' => $afterTitle,
//     ));
// }

// function wisdom_widget_init(){
//     widget_registration( __( 'About Us Page', 'wisdom' ), 'about-us', __( 'widget in this area will be shown in description page' ), '<div id="%1$s" class="col-block %2$s">', '</div>', '<h3 class="quarter-top-margin text-center">', '</h3>');
// }

function wisdom_widget_init() {
    register_sidebar( array(
        'name'          => __( 'About Us Page', 'wisdom' ),
        'id'            => 'about-us',
        'description'   => __( 'Widgets in this area will be shown on about us page.', 'wisdom' ),
        'before_widget' => '<div id="%1$s" class="col-block %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="quarter-top-margin text-center">',
        'after_title'   => '</h3>',
    ) );

     register_sidebar( array(
        'name'          => __( 'Contact Us Page', 'wisdom' ),
        'id'            => 'contact-info',
        'description'   => __( 'Widgets in this area will be shown on contact us page.', 'wisdom' ),
        'before_widget' => '<div id="%1$s" class="col-block text-center %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="quarter-top-margin">',
        'after_title'   => '</h3>',
    ) );
     register_sidebar( array(
        'name'          => __( 'Google Maps', 'wisdom' ),
        'id'            => 'contact-maps',
        'description'   => __( 'Widgets in this area will be shown on Google Maps page.', 'wisdom' ),
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '',
        'after_title'   => '',
    ) );
}

add_action('widgets_init', 'wisdom_widget_init');

//enable classic editor and disable gutenberg block editor for all post
//add_filter('use_block_editor_for_post_type', '__return_false', 100);

//enable classic editor and disable gutenberg block editor for widget
add_filter( 'use_widgets_block_editor', '__return_false' );