<?php
/**
 * WP_MinsToRead
 *
 * @package   WP_MinsToRead
 * @author    Edward McIntyre <edward@edwardmcintyre.com>
 * @license   GPL-2.0+
 * @link      https://github.com/twittem/
 * @copyright 2013 Edward McIntyre
 */

/**
 * WP_MinsToRead class.
 *
 * @package WP_MinsToRead
 * @author    Edward McIntyre <edward@edwardmcintyre.com>
 */
class WP_MinsToRead {

	const VERSION = '1.0.0';
	protected $plugin_slug = ' wp-minstoread';
	protected static $instance = null;
	protected $plugin_screen_hook_suffix = null;


	private function __construct() {

		add_action( 'init', array( $this, 'load_plugin_textdomain' ) );
		//add_action( 'save_post', array( $this, 'calc_on_save' ) );
		add_action( 'manage_posts_custom_column' , array( $this, 'display_mtr_column' ), 10, 2 );
		add_filter( 'manage_posts_columns' , array( $this, 'add_mtr_column' ) );
	}

	public static function get_instance() {

		// If the single instance hasn't been set, set it now.
		if ( null == self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}

	public static function activate( $network_wide ) {
		// TODO: Define activation functionality here
	}

	public static function deactivate( $network_wide ) {
		// TODO: Define deactivation functionality here
	}

	public function load_plugin_textdomain() {
		$domain = $this->plugin_slug;
		$locale = apply_filters( 'plugin_locale', get_locale(), $domain );

		load_textdomain( $domain, WP_LANG_DIR . '/' . $domain . '/' . $domain . '-' . $locale . '.mo' );
		load_plugin_textdomain( $domain, FALSE, basename( dirname( __FILE__ ) ) . '/lang/' );
	}
	
	public function calc_mtr($read_ID) {

		//Get post content
		$content = get_post_field( 'post_content', $read_ID, 'display' );

		//Calculate post wordcount
		$word_count = str_word_count( strip_tags( $content ) );

		//Calculate minutes to read
		$mtr_raw = ($word_count / 180);

		//round minutes to read
		$mtr_round = round($mtr_raw);

		//if less them 1 min, make 1 min
		$mtr = $mtr_round == 0 ? '1 min read' : $mtr_round . ' min read';

		//Set minutes to read transient
		//set_transient( $read_ID . '-minread', $mtr, 0 );

		return $mtr;
	}
	
	public function get_mtr($read_ID) {

		echo WP_MinsToRead::calc_mtr($read_ID);

		/*
		$minread_transient = get_transient($read_ID . '-minread');
		
		if($minread_transient){
			echo $minread_transient;
		} else {
			echo WP_MinsToRead::calc_mtr($read_ID);
		}
		*/
	} 
	

	public function calc_on_save( $post_id ) {
		WP_MinsToRead::calc_minread($post_id);
	}

	/* Display custom column */
	function display_mtr_column( $column, $post_id ) {
		if($column == 'mtr'){
			echo WP_MinsToRead::calc_mtr($post_id);
		}
	}

	/* Add custom column to post list */
	function add_mtr_column( $columns ) {
	    return array_merge( $columns, 
	        array( 'mtr' => __( 'Mins To Read', 'WP_MinsToRead' ) ) );
	}	
}