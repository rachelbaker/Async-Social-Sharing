<?php
/*
Plugin Name: Async Social Sharing
Plugin URI: http://www.rachelbaker.me
Description: Simple social sharing plugin that loads the third-party scripts asynchronously to improve site performance. Plugin provides options to load the following sharing widgets: Twitter, Facebook, Google+, Linkedin and Hacker News.
Version: 1.6.2
Author: Rachel Baker
Author URI: http://www.rachelbaker.me
Author Email: rachel@rachelbaker.me
License:

  Copyright 2012 Rachel Baker (rachel@rachelbaker.me)

  This program is free software: you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation, either version 3 of the License, or
  (at your option) any later version.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program.  If not, see <http://www.gnu.org/licenses/>.

*/

require 'admin/admin.php'; // Plugin admin options setup
global $async_share_options;

add_action( 'init', 'async_register_css_styles' );
add_action( 'wp_enqueue_scripts', 'async_share_script_loader' );
add_filter( 'the_content', 'async_share_display' );

/**
 * Get plugin options from database and store in array
 *
 * @return array
 */
function async_share_get_options() {
  global $async_share_options;
  $async_share_options = get_option( 'async_share_options' );

  return $async_share_options;
}

/**
 * Registers included CSS for front-end display of social widgets
 *
 * Initialized by init hook
 */
function async_register_css_styles() {
  wp_register_style( 'async_css', plugins_url( 'assets/css/async-share.css', __FILE__ ), false , '20121130', 'all' );
}

/**
 * Loads JavaScript and optionally CSS for front-end display of social widgets
 *
 * Initialized by wp_enqueue_scripts hook
 */
function async_share_script_loader() {
  wp_enqueue_script( 'async_js', plugins_url( 'assets/js/async-share.js', __FILE__ ), array( 'jquery' ), '', true );
  $options = async_share_get_options();
  if ( isset( $options['disable_css'] ) ) {
    return;
  } else
    wp_enqueue_style( 'async_css' );
}

/**
 * Sets up link to plugin's options page
 */
function async_share_plugin_action_links( $links, $file ) {
  static $this_plugin;
  if ( !$this_plugin ) $this_plugin = plugin_basename( __FILE__ );
  if ( $file == $this_plugin ) {
    $async_share_settings_link = '<a href="'.get_admin_url().'options-general.php?page=async-social-sharing/admin/admin.php">'.__( 'Settings' ).'</a>';
    // make the 'Settings' link appear first
    array_unshift( $links, $async_share_settings_link );
  }

  return $links;
}

/**
 * Verifies an option was selected or at least set
 *
 * @param string  $param option name
 * @return bool
 *
 */
function async_share_option_check( $param ) {
  $async_share_options = async_share_get_options();
  if ( !isset( $async_share_options[$param] ) ) {
    return FALSE;
  }
  if ( $async_share_options[ $param ] == TRUE ) {
    return TRUE;
  } else

    return FALSE;
}

/**
 * Twitter widget display
 */
function async_share_display_twitter() {
  $async_share_options = async_share_get_options();
  if ( async_share_option_check( 'twitter' ) == TRUE ) {
    $twitter = '<li class="twitter-share">
          <a href="https://twitter.com/share" class="twitter-share-button" data-url="'. get_permalink() .'">Tweet</a>
        </li>';

    return $twitter;
  } else

    return;
}

/**
 * Facebook widget display
 */
function async_share_display_facebook() {
  $async_share_options = async_share_get_options();
  if ( async_share_option_check( 'facebook' ) == TRUE ) {
    $facebook = '<li class="fb-share">
          <div class="fb-like" data-href="'. get_permalink() .'" data-send="false" data-layout="button_count" data-width="100" data-show-faces="false" data-font="verdana"></div>
        </li>';

    return $facebook;
  } else
    return;
}

function async_share_display_fbinit() {
  $async_share_options = async_share_get_options();
  if ( async_share_option_check( 'facebook' ) == TRUE ) {
    $fbinit = '<div id="fb-root"></div>';

    return $fbinit;
  } else
    return;
}

/**
 * Google+ widget display
 */
function async_share_display_gplus() {
  $async_share_options = async_share_get_options();
  if ( async_share_option_check( 'gplus' ) == TRUE ) {
    $gplus = '<li class="gplus-share">
          <div class="g-plus" data-action="share" data-annotation="bubble" data-height="21" data-href="'. get_permalink() .'"></div>
        </li>';

    return $gplus;
  } else
    return;
}

/**
 * Linkedin widget display
 */
function async_share_display_linkedin() {
  $async_share_options = async_share_get_options();
  if ( async_share_option_check( 'linkedin' ) == TRUE ) {
    $linkedin = '<li class="linkedin-share">
          <script type="IN/Share" data-url="'. get_permalink() .'"></script>
        </li>';

    return $linkedin;
  } else
    return;
}

/**
 * HackerNews widget display
 *
 * @return  $hackernews string
 */
function async_share_display_hackernews() {
  $async_share_options = async_share_get_options();
  if ( async_share_option_check( 'hackernews' ) == TRUE ) {
    $hackernews = '<li class="hn-share">
        <a href="http://news.ycombinator.com/submit" class="hn-share-button" data-url="'. get_permalink() .'">Vote on HN</a>
      </li>';

    return $hackernews;
  } else
    return;
}

/**
 * Sets up display of social widgets
 *
 * @return string;
 */
function async_share_social_box() {
  global $post;
  $async_share_options = async_share_get_options();
  if ( isset( $post ) and isset( $async_share_options ) ) {
    $twitter = async_share_display_twitter();
    $facebook = async_share_display_facebook();
    $fbinit = async_share_display_fbinit();
    $gplus = async_share_display_gplus();
    $linkedin = async_share_display_linkedin();
    $hackernews = async_share_display_hackernews();
    /**
     * Displaying the sharing widgets
     */
    $async_display_share_box = $fbinit.'
      <div class="async-wrapper">
        <ul class="async-list">
          '. $twitter . $facebook . $gplus . $linkedin . $hackernews .'
        </ul>
      </div>';
  } else {
    $async_display_share_box = '';
  }

  return $async_display_share_box;
}

/**
 * Controls which template files the social widgets are displayed upon
 */
function async_share_display( $content ) {
//  $async_display_share_box_top = "";
//  $async_display_share_box_bottom = "";
  $async_share_options = async_share_get_options();
  if ( $async_share_options['position_top'] == TRUE ) {
  	$async_display_share_box_top = async_share_social_box();
  } else {
  	$async_display_share_box_bottom = async_share_social_box();
  }
  if ( is_feed() ) {
    return $content;
  } elseif ( is_page() ) {
    if ( is_array( $async_share_options['types'] ) && in_array( 'page', $async_share_options['types'] ) ) {
      return $async_display_share_box_top . $content . $async_display_share_box_bottom;
    }
    return $content;
  } elseif ( is_home() || is_paged() ) {
    if ( $async_share_options['paged'] == TRUE ) {
      return $async_display_share_box_top . $content . $async_display_share_box_bottom;
    }
    return $content;
  } elseif ( is_single() ) {
    $cpt = get_post_type();
    if ( 'post' == $cpt ) {
      return $async_display_share_box_top . $content . $async_display_share_box_bottom;
    } elseif ( is_array( $async_share_options['types'] ) && in_array( $cpt, $async_share_options['types'] ) ) {
      return $async_display_share_box_top . $content . $async_display_share_box_bottom;
    }
  }
  return $content;
}
