=== Plugin Name ===
Contributors: rachelbaker
Tags: social, sharing, twitter, facebook, hackernews, linkedin, google+, widgets, social networks
Requires at least: 3.0
Tested up to: 3.4.1
Stable tag: 1.2.0
License: GPLv3 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html

Simple social plugin that loads the third-party sharing scripts asynchronously after the page loads for optimal site performance.

== Description ==


Simple social sharing plugin that loads the third-party scripts asynchronously and after the page loads to improve site performance.

The plugin provides settings to load any of the following sharing widgets:

*	Twitter
*	Facebook
*	Google+
*	Linkedin
*	Hacker News

Select option (if desired) to display the sharing widgets on blog and archive pages.

Why is Asynchronous script loading better?
Asynchronous loading allows multiple files to load parallel to each other. Instead of having to wait for Twitter to respond with their script, the browser moves on and starts fetching the next request.

Dependencies

*	jQuery 1.7
*	WordPress 3.0+
*	Content worth sharing

Upcoming Versions Wishlist

*	Allow re-arranging of social widgets
*   Conditionally load js


Credits

 * Inspired by Stoyan Stefanov's blog post ["Social Button BFFs"](http://www.phpied.com/social-button-bffs/)
 * HackerNews button code by [Ilya Grigorik](https://github.com/igrigorik/hackernews-button)

Author

*	[Rachel Baker](http://rachelbaker.me)


== Installation ==


1. Upload Async Social Sharing to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Follow the 'Settings' link to select which social sharing widgets to display on your site.
4. Write good content.

== Screenshots ==

1.	Social Sharing widgets are loaded under posts
2.	Plugin Options page allows you to select which social sharing widgets to load
3.	Scripts now load in asynchronous fashion after the page load completes


== Changelog ==

== 1.2.0 ==
Combined function for plugin's script and style loading.
Fixed bug that was generating a PHP error when no options were set.
Tested with WordPress 3.4.1


== 1.1.0 ==
Added Display Options to plugin to allow sharing widgets to be displayed on blog and archive pages.
Fixed bug with Facebook `fb-root` div not being detected before script loaded.
Updated license to GPLv3

== 1.0.1 ==
Added lazy loading to async-share.js
Fixed issue with plugin settings link

== 1.0 ==

Initial release


