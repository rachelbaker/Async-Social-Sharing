<?php
// Set-up Action and Filter Hooks

add_action( 'admin_init', 'async_share_init' );
add_action( 'admin_menu', 'async_share_add_options_page' );
// add_filter( 'plugin_action_links', 'async_share_plugin_action_links', 10, 2 );


// Init plugin options to white list our options
function async_share_init() {
	$cache_buster = filemtime( ASYNC_SOCIAL_SHARING_PLUGIN_PATH . 'assets/css/async-admin.css' );
	wp_register_style( 'async-admin', ASYNC_SOCIAL_SHARING_PLUGIN_URL . '/assets/css/async-admin.css', false, $cache_buster, 'all' );

	register_setting( 'async_share_plugin_options', 'async_share_options', 'async_share_validate_options' );
}

// Add menu page
function async_share_add_options_page() {
	$page = add_options_page( 'Async Social Sharing Options', 'Async Sharing Options', 'manage_options', __FILE__, 'async_share_render_form' );

	// loading admin style only in plugin option page
	add_action( 'admin_print_styles-' . $page, 'async_share_admin_style' );
}

// Enqueue admin style
function async_share_admin_style() {
	wp_enqueue_style( 'async-admin' );
}

function async_share_post_types_options() {
	$args = array(
		'_builtin' => false
	);

	$types   = get_post_types( $args, 'names' );
	$types[] = 'post';
	$types[] = 'page';

	return $types;
}

// Render the Plugin options form
function async_share_render_form() {
	include_once ASYNC_SOCIAL_SHARING_PLUGIN_PATH . 'includes/views/admin-view.php'; // Plugin admin options page
}

function async_share_validate_options( $input ) {

	return esc_attr( $input );
}