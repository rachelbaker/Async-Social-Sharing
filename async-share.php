<?php
/*
Plugin Name: Async Social Sharing
Plugin URI: http://www.rachelbaker.me
Description: Simple asynchronous post sharing widget.  Loads the following sharing widgets: Twitter, Facebook, Linkedin, Google+ and Hacker News via asynchronous javascript for simple and fast loading social sharing.
Version: .10
Author: Rachel Baker
Author URI: http://www.rachelbaker.me
Author Email: rachel@rachelbaker.me
License:

  Copyright 2012 Rachel Baker (rachel@rachelbaker.me)

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License, version 2, as
  published by the Free Software Foundation.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

*/
  ################################################################################
// Enqueue Scripts
################################################################################
  function asyncshare_js_loader() {
       wp_enqueue_script('async', plugins_url( 'async-share.js', __FILE__ ), array('jquery'),'', true );

      }
   add_action('wp_enqueue_scripts', 'asyncshare_js_loader');

 ################################################################################
// Enqueue CSS Styles
################################################################################
  function asyncshare_css_loader() {
    wp_enqueue_style('async', plugins_url( 'async-share.css', __FILE__ ), false ,'1.0', 'all' );
      }
  add_action('wp_enqueue_scripts', 'asyncshare_css_loader');


add_filter('the_content', 'asyncshare_display', 30, 2);
add_filter('the_excerpt', 'asyncshare_display', 99 );
function asyncshare_display($content)
{
    // this is where we will display the bio

      $async_share_box = '<div id="fb-root"></div><div class="async-wrapper"><ul class="async-list"><li class="twitter-share"><a href="https://twitter.com/share" class="twitter-share-button" data-url="'. get_permalink() .'">Tweet</a></li><li class="linkedin-share"><script type="IN/Share" data-url="'. get_permalink() .'"></script>
</li><li class="fb-share"><div class="fb-like" data-href="'. get_permalink() .'" data-send="false" data-layout="button_count" data-width="100" data-show-faces="false" data-font="verdana"></div></li><li class="gplus-share"><g:plusone href="'. get_permalink() .'" size="medium" annotation="inline" width="120"></li><li class="hn-share"><a href="http://news.ycombinator.com/submit" class="hn-share-button" data-title="'. the_title() .'" data-url="'. get_permalink() .'">Vote on HN</a></li></div>';


    if (is_paged() || is_single())
    {
        return $content . $async_share_box;
        } else {
        return $content;
    }
}