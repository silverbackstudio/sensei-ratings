<?php
/**
 * Main plugin file
 *
 * @package sensei-ratings
 * @author Brando Meniconi <b.meniconi@silverbackstudio.it>
 */

/*
Plugin Name: Sensei - Lesson Ratings
Description: Allow users to rate Sensei lessons
Author: Silverback Studio
Version: 1.0.0
Author URI: http://www.silverbackstudio.it/
Text Domain: sensei-ratings
*/

namespace Svbk\WP\Plugins\Sensei\Ratings;

if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	require_once __DIR__ . '/vendor/autoload.php';
}

add_action( 'plugins_loaded', __NAMESPACE__ . '\\init' );

/**
 * Loads textdomain and main initializes main class
 *
 * @return void
 */
function init() {
	load_plugin_textdomain( 'sensei-ratings', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );

	if ( ! class_exists( __NAMESPACE__ . '\\Lesson' ) ) {
		include 'includes/class-lesson.php';
		include 'includes/class-course.php';
	}

	new Lesson();
}

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\scripts' );

/**
 * Register admin scripts and styles.
 */
function scripts() {
	wp_enqueue_style( 'sensei-ratings', plugins_url( '/assets/css/frontend.css', __FILE__ ), false, '1.0.0' );
}


add_action( 'admin_enqueue_scripts', __NAMESPACE__ . '\\admin_scripts' );

/**
 * Register admin scripts and styles.
 */
function admin_scripts() {
	wp_enqueue_style( 'sensei-ratings-admin', plugins_url( '/assets/css/admin.css', __FILE__ ), false, '1.0.0' );
}
