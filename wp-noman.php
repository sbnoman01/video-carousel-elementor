<?php
/**
 * Plugin Name: WP Noman
 * Description: Video slider widget for elementor by WPNoman.
 * Version:     1.0.0
 * Author:      WPNoman
 * Author URI:  https://developers.elementor.com/
 * Text Domain: wpnoman
 */

function register_wpnoman_widget( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/video-carousel.php' );

	$widgets_manager->register( new \video_Carousel() );

}
add_action( 'elementor/widgets/register', 'register_wpnoman_widget' );

/**
 * Enqueue scipts
 */
function wpnoman_scripts() {
    wp_enqueue_style( 'plyr', plugin_dir_url( __FILE__ ) . 'assets/mediabox.min.css',  [],  time(), 'all');
    wp_enqueue_style( 'owl-carousel', plugin_dir_url( __FILE__ ) . 'assets/owl-carousel.min.css', [],  time(), 'all');
    wp_enqueue_style( 'wpnoman-styels', plugin_dir_url( __FILE__ ) . 'assets/style.css',  [],  time(), 'all');

    wp_enqueue_script( 'player', plugin_dir_url( __FILE__ ) . 'assets/mediabox.min.js', ['jquery'], time(), true );
    wp_enqueue_script( 'owl.carousel', plugin_dir_url( __FILE__ ) . 'assets/owl.carousel.js', ['jquery'], time(), true );

    wp_enqueue_script( 'wpnoman-main', plugin_dir_url( __FILE__ ) . 'assets/main.js', ['jquery'], time(), true );
}
add_action( 'wp_enqueue_scripts', 'wpnoman_scripts' );