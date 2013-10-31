<?php
/*
	Plugin Name: Read / Read
	Plugin URI: https://github.com/twittem/read-read
	Description: A simple plugin to generate the minutes to read for WordPress posts. Increase blog readership by qualifying the time commitment needed to read your post.
	Author: Edward McIntyre @twittem
	Version: 1.0.1
	Author URI: https://github.com/twittem/
	Text Domain: read-read
	Domain Path: /lang
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

require_once( plugin_dir_path( __FILE__ ) . 'class-read-read.php' );

Read_Read::get_instance();