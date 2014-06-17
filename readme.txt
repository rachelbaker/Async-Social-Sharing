=== Plugin Name ===
Contributors: rachelbaker
Tags: social, sharing, twitter, facebook, hackernews, linkedin, google+, widgets, social networks, performance
Requires at least: 3.5
Tested up to: 3.7
Stable tag: 1.7.1
License: GPLv3 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html

Simple social plugin that loads popular social sharing widgets asynchronously after the page loads for optimal site performance.

== Description ==

Simple social sharing plugin that loads the third-party scripts asynchronously and after the page loads to improve site performance.

The plugin provides settings to load any of the following sharing widgets:

*	Twitter
*	Facebook
*	Google+
*	Linkedin
*	Hacker News

Available display options include ability to display the sharing widgets on pages, specific custom post types or blog and archive pages.

Why is Asynchronous script loading better?
Asynchronous loading allows multiple files to load parallel to each other. Instead of having to wait for Twitter to respond with their script, the browser moves on and starts fetching the next request.

Dependencies

*	WordPress 3.5+
*	Content worth sharing

Contributors Welcome

*   Submit a [pull request on Github](https://github.com/rachelbaker/Async-Social-Sharing)

Upcoming Versions Wishlist

*	Allow re-arranging of social widgets


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
2.	Plugin Options page allows you to specify the social sharing widgets to load and where to display them.
3.	Scripts now load in asynchronous fashion after the page load completes


== Changelog ==

= 1.7.1 =
* Fixed bug where "headers already sent" message was displayed upon plugin activation due to blank line at top of main plugin file.
* Enabled automatic plugin updates for WordPress 3.7 users.

= 1.7.0 =
* Added option to display or hide sharing widgets from posts.
* Restructured file organization.
* Tested compatibility with 3.7

= 1.6.2 =
* Fixed bug where previous plugin users could not disable the css without removing and then re-adding the plugin.
* Updated compatibility to support 3.5

= 1.6.1 =
* Fixed bug where widgets were not displaying on pages if option was specified.
* Fixed bug where CSS styles for previous installations was still loading, even though the option to disable was selected.
* Expanded post-type multi-selection box area on plugin options page.
* Added instructions for selecting multiple post types from plugin options page.
* Tested with WordPress 3.5 RC2

= 1.6 =
* Added option to prevent default CSS stylesheet from loading.
* Fixed bug where PHP Exception was thrown if post types array was empty.
* Tested with WordPress 3.5 Beta 3


= 1.5.1 =
Fixed bug that would cause content in RSS feeds to not display.
Fixed bug where PHP Exception was thrown on pages if the display options were not set.


= 1.5.0 =
* Added ability to display social widgets on pages.
* Added ability to select which custom post types will display the social widgets.
* Reworked `async-share.js` file.  Now only the external social scripts that are selected to be displayed will be loaded.
* Improved display styles for social widgets.


= 1.2.0 =
* Combined function for plugin's script and style loading.
* Fixed bug that was generating a PHP error when no options were set.
* Tested with WordPress 3.4.1


= 1.1.0 =
* Added Display Options to plugin to allow sharing widgets to be displayed on blog and archive pages.
* Fixed bug with Facebook `fb-root` div not being detected before script loaded.
* Updated license to GPLv3

= 1.0.1 =
* Added lazy loading to async-share.js
* Fixed issue with plugin settings link

= 1.0 =
* Initial release