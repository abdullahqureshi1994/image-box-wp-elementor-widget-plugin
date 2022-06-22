<?php
/**
 * Plugin Name: Elementor imageCaptionBox Widget
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Register oEmbed Widget.
 *
 * Include widget file and register widget class.
 *
 * @since 1.0.0
 * @param \Elementor\Widgets_Manager $widgets_manager Elementor widgets manager.
 * @return void
 */
function register_imageCaptionBox_widget( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/imageCaptionBox-widget.php' );

	$widgets_manager->register( new \Elementor_imageCaptionBox_Widget() );

}
add_action( 'elementor/widgets/register', 'register_imageCaptionBox_widget' );