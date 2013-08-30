<?php
/**
 * WP Mins To Read
 *
 * A simple plugin to generate the minutes to read for WordPress posts. Increase blog readership by qualifying the time commitment needed to read your post.
 *
 * @package   WP_MinsToRead
 * @author    Edward McIntyre <edward@edwardmcintyre.com>
 * @license   GPL-2.0+
 * @link      https://github.com/twittem/
 * @copyright 2013 Edward McIntyre
 *
 * @wordpress-plugin
 * Plugin Name: WP Mins To Read
 * Plugin URI:  https://github.com/twittem/wp-minRead
 * Description: A simple plugin to generate the minutes to read for WordPress posts. Increase blog readership by qualifying the time commitment needed to read your post.
 * Version:     1.0.0
 * Author:      Edward McIntyre @twittem
 * Author URI:  https://github.com/twittem/
 * Text Domain: WP_MinsToRead
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path: /lang
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

require_once( plugin_dir_path( __FILE__ ) . 'class-wp-mins-to-read.php' );

//register_activation_hook( __FILE__, array( 'WP_MinsToRead', 'activate' ) );
//register_deactivation_hook( __FILE__, array( 'WP_MinsToRead', 'deactivate' ) );

WP_MinsToRead::get_instance();