<?php
/**
 * Plugin Name: Async Social Sharing
 * Plugin URI: http://www.rachelbaker.me
 * Description: Simple social sharing plugin that loads the third-party scripts asynchronously to improve site performance. Plugin provides options to load the following sharing widgets: Twitter, Facebook, Google+, Linkedin and Hacker News.
 * Version: 1.8.0
 * Author: Rachel Baker
 * Author URI: http://www.rachelbaker.me
 * Author Email: rachel@rachelbaker.me
 * License:
 *
 *  Copyright 2014 Rachel Baker (rachel@rachelbaker.me)
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

/**
 * Constants
 */
define( 'ASYNC_SOCIAL_SHARING_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'ASYNC_SOCIAL_SHARING_PLUGIN_URL', plugins_url( '', __FILE__ ) );

/**
* Allow auto-updates of plugin for WordPress 3.7+.
*/
if ( defined( 'WP_AUTO_UPDATE_CORE' ) ) {
	add_filter( 'auto_update_plugin', '__return_true' );
}

class Async_Social_Sharing {

	/**
	 * Initializes Async_Social_Sharing Class
	 *
	 * @return Object new Async_Social_Sharing Class();
	 */
	public static function get_instance() {
		static $instance = null;

		if ( null === $instance ) {
			$instance = new static();
			$instance->setup_actions();
			$instance->setup_filters();
		}

		return $instance;
	}

	/**
	 * Dummy constructor, nothing to see here.
	 */
	protected function __construct() {}

	/**
	 * Register the action hooks for Async Social Sharing.
	 */
	private function setup_actions() {
		add_action( 'init',               array( $this, 'register_styles' ) );
		add_action( 'admin_init',         array( $this, 'register_options' ) );
		add_action( 'admin_menu',         array( $this, 'add_options_page' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'load_scripts' ) );
	}

	/**
	 * Register the filter hooks for Async Social Sharing.
	 */
	private function setup_filters() {
		add_filter( 'plugin_action_links', array( $this, 'add_settings_link' ), 10, 2 );
		add_filter( 'the_content',         array( $this, 'display_check' ) );
	}

	/**
	 * Register the settings for Async Social Sharing.
	 * Options are sanitized with the validate_options callback method.
	 *
	 * @return unknown
	 */
	public function register_options() {
		return register_setting(
			'async_share_plugin_options',
			'async_share_options',
			array( $this, 'validate_options' )
		);
	}

	/**
	 * Returns the options for Async Social Sharing.
	 *
	 * @return mixed|void
	 */
	public function get_options() {
		return get_option( 'async_share_options' );
	}

	/**
	 * Callback sanitization for the Async Social Sharing option values.
	 *
	 * @param $input
	 *
	 * @return mixed
	 */
	public static function validate_options( $input ) {
		sanitize_text_field( $input );

		return $input;
	}

	/**
	 * Adds Async Social Sharing sub-menu page to the options main menu.
	 *
	 * @return bool|string
	 */
	public function add_options_page() {
		return add_options_page(
			'Async Social Sharing Options',
			'Async Sharing Options',
			'manage_options',
			__FILE__,
			array( $this, 'display_admin_view' )
		);
	}

	/**
	 * Renders the plugin settings screen.
	 *
	 * @return string
	 */
	public function display_admin_view() {
		ob_start();
		include ASYNC_SOCIAL_SHARING_PLUGIN_PATH . 'views/admin-view.php';

		return ob_get_flush();
	}

	/**
	 * Adds settings link to plugin screen for Async Social Sharing.
	 *
	 * @param $links
	 * @param $file
	 *
	 * @return array
	 */
	public function add_settings_link( $links, $file ) {
		$plugin_file_name = plugin_basename( __FILE__ );

		if ( $file == $plugin_file_name ) {
			$links[] = '<a href="' . get_admin_url() . 'options-general.php?page=' . $plugin_file_name . '">' . __( 'Settings' ) . '</a>';
		}

		return $links;
	}

	/**
	 * Registers included CSS for front-end display of social widgets
	 *
	 * Initialized by init hook
	 */
	public function register_styles() {
		$cache_buster = filemtime( ASYNC_SOCIAL_SHARING_PLUGIN_PATH . 'assets/css/async-share.css' );

		wp_register_style( 'async_css', ASYNC_SOCIAL_SHARING_PLUGIN_URL . '/assets/css/async-share.css', false, $cache_buster, 'all' );
	}

	/**
	 * Loads JavaScript and optionally CSS for front-end display of social widgets
	 *
	 * Initialized by wp_enqueue_scripts hook
	 */
	public function load_scripts() {
		$options      = $this->get_options();
		$cache_buster = filemtime( ASYNC_SOCIAL_SHARING_PLUGIN_PATH . 'assets/js/async-share.js' );

		wp_enqueue_script( 'async_js', ASYNC_SOCIAL_SHARING_PLUGIN_URL . '/assets/js/async-share.js', array( 'jquery' ), $cache_buster, true );

		if ( ! isset( $options['disable_css'] ) ) {
			wp_enqueue_style( 'async_css' );
		}
	}

	/**
	 * Renders the social sharing widgets.
	 *
	 * @return string
	 */
	public function display_output_view() {
		$options = $this->get_options();
		if ( ! empty( $options ) ) {
			ob_start();
			include( ASYNC_SOCIAL_SHARING_PLUGIN_PATH . 'views/output-view.php' );

			return ob_get_clean();
		}

		return;
	}

	/**
	 * Determines where the social sharing widgets should be displayed.
	 */
	public function display_check( $content ) {
		$async_share_output = $this->display_output_view();
		$options            = $this->get_options();
		$above_content      = $async_share_output . $content;
		$below_content      = $content . $async_share_output;

		// return early instead of hooking into feed content.
		if ( is_feed() ) {

			return $content;
		}

		if ( is_page() ) {
			if ( is_array( $options['types'] ) && in_array( 'page', $options['types'] ) ) {
				if ( isset( $options['position'] ) && 'above' == $options['position'] ) {
					return $above_content;
				} else {
					return $below_content;
				}
			}

			return $content;
		}

		if ( is_home() || is_paged() ) {
			if ( is_array( $options ) && isset( $options['paged'] ) ) {
				if ( isset( $options['position'] ) && 'above' == $options['position'] ) {
					return $above_content;
				} else {
					return $below_content;
				}
			}

			return $content;
		}

		if ( is_single() ) {

			$cpt = get_post_type();

			if ( is_array( $options['types'] ) && in_array( $cpt, $options['types'] ) ) {
				if ( isset( $options['position'] ) && 'above' == $options['position'] ) {
					return $above_content;
				} else {
					return $below_content;
				}
			}

			return $content;
		}

		return $content;
	}

} // end of Async_Social_Sharing class

/**
 * Initializes the Async_Social_Sharing class.
 *
 * @return Object
 */
function async_social() {
	return Async_Social_Sharing::get_instance();
}
async_social();

/**
 * Outputs async social sharing for manual display.
 * Can be used as a template tag within theme files.
 */
function async_social_display() {
	$instance = async_social();
	echo $instance->display_output_view();
}
