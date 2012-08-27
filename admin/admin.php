<?php
// Set-up Action and Filter Hooks
register_uninstall_hook(__FILE__, 'async_share_delete_plugin_options');
add_action('admin_init', 'async_share_init' );
add_action('admin_menu', 'async_share_add_options_page');
add_filter( 'plugin_action_links', 'async_share_plugin_action_links', 10, 2 );


// Delete options table entries ONLY when plugin deactivated AND deleted
function async_share_delete_plugin_options() {
	delete_option('async_share_options');
}

// Init plugin options to white list our options
function async_share_init(){
	register_setting( 'async_share_plugin_options', 'async_share_options', 'async_share_validate_options' );
}

// Add menu page
function async_share_add_options_page() {
	$page = add_options_page('Async Social Sharing Options', 'Async Sharing Options', 'manage_options', __FILE__, 'async_share_render_form');
	// loading admin style only in plugin option page
	add_action( 'admin_print_styles-' . $page, 'async_share_admin_style' );
}

// Defining admin style
  function async_share_admin_style() {
  wp_enqueue_style('async_admin', plugins_url( 'assets/css/async-admin.css' , dirname(__FILE__) ), false ,'1.0', 'all' );
  }

function async_share_post_types_options() {
$args=array(
  '_builtin' => false
    );
    $cpt_types=get_post_types($args,'names');
    array_push($cpt_types, 'page');
    return $cpt_types;
}

// Render the Plugin options form
function async_share_render_form() {
	include "admin-view.php"; // Plugin admin options page
}

	function async_share_validate_options($input) {
	 // strip html from textboxes
	return $input;
}
