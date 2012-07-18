<?php
/*
Plugin Name: Async Social Sharing
Plugin URI: http://www.rachelbaker.me
Description: Simple social sharing plugin that loads the third-party scripts asynchronously to improve site performance. Plugin provides options to load the following sharing widgets: Twitter, Facebook, Google+, Linkedin and Hacker News.
Version: 1.2.0
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

/**
 * Defining plugin location
 */

define( 'PLUGIN_DIR', plugin_dir_path( __FILE__ ).'/' );

/**
 * Loading supporting files
 */
include "admin/admin.php"; // Plugin admin options setup

/**
 * Plugin Actions
 */
add_action( 'wp_enqueue_scripts', 'async_share_script_loader' );
add_filter( 'the_content', 'async_share_display' );

/*
| -------------------------------------------------------------------
| Enqueue Styles & Scripts
| -------------------------------------------------------------------
|
| */
function async_share_script_loader() {
  wp_enqueue_script( 'async_js', plugins_url( 'assets/js/async-share.js', __FILE__ ), array( 'jquery' ), '', true );
  wp_enqueue_style( 'async_css', plugins_url( 'assets/css/async-share.css', __FILE__ ), false , '1.0', 'all' );
}
/*
| -------------------------------------------------------------------
| Plugin Link to Settings Page
| -------------------------------------------------------------------
|
| */
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

/*
| -------------------------------------------------------------------
| Async Share Content
| * added to bottom of posts
| -------------------------------------------------------------------
|
| */
function async_share_display( $content ) {
  global $post;
  $options = get_option( 'async_share_options' );
  if ( isset( $options ) ) {
    if ( $options['twitter'] == TRUE ) {
      $twitter = '<li class="twitter-share"><a href="https://twitter.com/share" class="twitter-share-button" data-url="'. get_permalink() .'">Tweet</a></li>';
    } else { $twitter = ''; }
    if ( $options['facebook'] == TRUE ) {
      $facebook = '<li class="fb-share"><div class="fb-like" data-href="'. get_permalink() .'" data-send="false" data-layout="button_count" data-width="100" data-show-faces="false" data-font="verdana"></div></li>';
    } else {$facebookinit = ''; $facebook = '';}
    if ( $options['gplus'] == TRUE ) {
      $gplus = '<li class="gplus-share"><div class="g-plus" data-action="share" data-annotation="bubble" data-height="21" data-href="'. get_permalink() .'"></div></li>';
    } else {  $gplus = ''; }
    if ( $options['linkedin'] == TRUE ) {
      $linkedin = '<li class="linkedin-share"><script type="IN/Share" data-url="'. get_permalink() .'"></script></li>';
    } else { $linkedin = ''; }
    if ( $options['hackernews'] == TRUE ) {
      $hackernews = '<li class="hn-share"><a href="http://news.ycombinator.com/submit" class="hn-share-button" data-url="'. get_permalink() .'">Vote on HN</a></li>';
    } else { $hackernews = ''; }
    /**
     * Displaying the sharing widgets
     */
    $async_display_share_box = '<div id="fb-root"></div><div class="async-wrapper"><ul class="async-list">'. $twitter . $facebook . $gplus . $linkedin . $hackernews .'</ul></div>';
    if ( $options['paged'] == TRUE ) {
      if ( is_home() || is_paged() || is_single() ) {
        return $content . $async_display_share_box;
      } else {
        return $content;
      }
    }
    elseif ( $options['paged'] == FALSE )
      if ( is_single() ) {
        return $content . $async_display_share_box;
      } else {
      return $content;
    }
  } else return $content;
}