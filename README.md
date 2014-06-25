#Async Social Sharing WordPress Plugin

Simple social plugin that loads popular social sharing widgets asynchronously
after the page loads for optimal site performance.

The plugin provides settings to load any of the following sharing widgets:

* Twitter
* Facebook
* Google+
* Linkedin
* Hacker News

Available display options include ability to display the sharing widgets on
above or below content on pages, specific custom post types or blog and archive
pages.

##Release Notes

__Version 1.8.1__

* Fixed bug where plugin would cause a fatal error for PHP 5.2 and under by
changing class initialization process.

* Added minor style fix for Facebook sharing widget alignment.


__Version 1.8.0__

* Added `async_social_display()` function to be used as a template tag to output
the social sharing widgets anywhere theme developers desire within the loop.

* Added option to allow site administrators to enter their Facebook Application
ID.

* Added option to allow site administrators to choose if the social sharing
widgets should be output before or after the content.  props @dustyf

* Changed settings screen to use WordPress default admin styles to fix checkbox
display in WordPress 3.8+.

* Removed bloated admin stylesheet.

* Minor refactoring of plugin instance loading.

* Minor code formatting changes.


__Version 1.7.1__

* Fixed bug where "headers already sent" message was displayed upon plugin
activation due to blank line at top of main plugin file.

* Enabled automatic plugin updates for WordPress 3.7 users.


__Version 1.7.0__

* Added option to display or hide sharing widgets from posts.

* Added cache busting to plugin css and js files for future automatic update
compatibility.

* Restructured file organization.

* Tested compatibility with 3.7


__Version 1.6.2__

* Fixed bug where previous plugin users could not disable the css without
removing and then re-adding the plugin.

* Updated compatibility to support 3.5


__Version 1.6.1__

* Fixed bug where widgets were not displaying on pages if option was specified.

* Fixed bug where CSS styles for previous installations was still loading, even
though the option to disable was selected.

* Expanded post-type multi-selection box area on plugin options page.

* Added instructions for selecting multiple post types from plugin options page.

* Tested with WordPress 3.5 RC2


__Version 1.6.0__

* Added option to prevent default CSS stylesheet from loading.

* Fixed bug where PHP Exception was thrown if post types array was empty.

* Tested with WordPress 3.5 Beta 3


__Version 1.5.1__

* Fixed bug that would cause content in RSS feeds to not display.

* Fixed bug where PHP Exception was thrown on pages if the display options were
not set.


__Version 1.5.0__

* Added ability to display social widgets on pages.

* Added ability to select which custom post types will display the social
widgets.

* Reworked `async-share.js` file.  Now only the external social scripts that are
selected to be displayed will be loaded.

* Improved display styles for social widgets.


__Version 1.2.0__

* Combined function for plugin's script and style loading.

* Fixed bug that was generating a PHP error when no options were set.

* Tested with WordPress 3.4.1


__Version 1.1.0__

* Added Display Options to plugin to allow sharing widgets to be displayed on
blog and archive pages.

* Fixed bug with Facebook `fb-root` div not being detected before script loaded.

* Updated license to GPLv3


__Version 1.0.1__

* Added lazy loading to async-share.js

* Fixed issue with plugin settings link

__Version 1.0.0__

* Initial release

__Upcoming Versions Wishlist__

*   Allow re-arranging of social widgets
*   Add internationalization to plugin.


##Screenshots

Social Sharing widgets are loaded under posts
![image](https://img.skitch.com/20120425-x5bnprr39qq39jf8mq9ems9ckf.png)

Plugin Options page allows you to select which social sharing widgets to load:
![image](http://f.cl.ly/items/2a2D1r270I241Y3i0U2H/screenshot-2.png)

Scripts now load in asynchronous fashion after the page load completes:
![image](https://img.skitch.com/20120501-ka4dr14y773262a6nfywxwwty6.png)

##Dependencies

*	WordPress
*	Content worth sharing

##Author

- [Rachel Baker](http://rachelbaker.me)

##Credits
 * Inspired by Stoyan Stefanov's blog post ["Social Button BFFs"](http://www.phpied.com/social-button-bffs/)
 * HackerNews button code by [Ilya Grigorik](https://github.com/igrigorik/hackernews-button)

##License
Copyright 2014 Rachel Baker (rachel@rachelbaker.me)

This program is free software: you can redistribute it and/or modify it under
the terms of the GNU General Public License as published by the Free Software
Foundation, either version 3 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY
WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
PARTICULAR PURPOSE.  See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with
this program.  If not, see <http://www.gnu.org/licenses/>.
