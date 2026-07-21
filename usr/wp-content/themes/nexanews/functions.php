<?php
/**
 * NexaNews functions and definitions
 */

if ( ! defined( 'NEXANEWS_VERSION' ) ) {
	define( 'NEXANEWS_VERSION', '1.0.0' );
}

if ( ! function_exists( 'nexanews_setup' ) ) :
	function nexanews_setup() {
		load_theme_textdomain( 'nexanews', get_template_directory() . '/languages' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		
        // Register Menus
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary Menu', 'nexanews' ),
				'menu-2' => esc_html__( 'Footer Menu', 'nexanews' ),
			)
		);

		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		) );

		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'nexanews_setup' );

/**
 * Enqueue scripts and styles.
 */
function nexanews_scripts() {
    // Fonts
    wp_enqueue_style( 'nexanews-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Playfair+Display:wght@700;800&display=swap', array(), null );
    
	wp_enqueue_style( 'nexanews-style', get_stylesheet_uri(), array(), NEXANEWS_VERSION );
	
    // JS
	wp_enqueue_script( 'nexanews-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), NEXANEWS_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'nexanews_scripts' );

/**
 * Register widget area.
 */
function nexanews_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'nexanews' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'nexanews' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s sidebar-widget">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
    
    register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 1', 'nexanews' ),
			'id'            => 'footer-1',
			'before_widget' => '<section class="widget footer-widget">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'nexanews_widgets_init' );
