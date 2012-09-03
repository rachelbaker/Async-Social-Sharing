#Async Social Sharing WordPress Plugin

Simple social plugin that loads popular social sharing widgets asynchronously after the page loads for optimal site performance.

The plugin provides settings to load any of the following sharing widgets:

* Twitter
* Facebook
* Google+
* Linkedin
* Hacker News

Available display options include ability to display the sharing widgets on pages, specific custom post types or blog and archive pages.

##Release Notes

__Version 1.5.1__
Fixed bug that would cause content in RSS feeds to not display.
Fixed bug where PHP Exception was thrown on pages if the display options were not set.

__Version 1.5.0__
Added ability to display social widgets on pages.
Added ability to select which custom post types will display the social widgets.
Reworked `async-share.js` file.  Now only the external social scripts that are selected to be displayed will be loaded.
Improved display styles for social widgets.

__Version 1.2.0__
Combined function for plugin's script and style loading.
Fixed bug that was generating a PHP error when no options were set.
Tested with WordPress 3.4.1

__Version 1.1.0__
Added Display Options to plugin to allow sharing widgets to be displayed on blog and archive pages.
Fixed bug with Facebook `fb-root` div not being detected before script loaded.
Updated license to GPLv3

__Version 1.0.1__
Added lazy loading to async-share.js
Fixed issue with plugin settings link

__Version 1.0__

Initial release

__Upcoming Versions Wishlist__

*   Allow re-arranging of social widgets
*   Conditionally load js


##Screenshots

Social Sharing widgets are loaded under posts
![image](https://img.skitch.com/20120425-x5bnprr39qq39jf8mq9ems9ckf.png)

Plugin Options page allows you to select which social sharing widgets to load:
![image](https://img.skitch.com/20120502-apim6gwetaurc2c37a7aqdr2u.png)

Scripts now load in asynchronous fashion after the page load completes:
![image](https://img.skitch.com/20120501-ka4dr14y773262a6nfywxwwty6.png)

##Dependencies

*	jQuery 1.7
*	WordPress
*	Content worth sharing

##Author

- [Rachel Baker](http://rachelbaker.me)

##Credits
 * Inspired by Stoyan Stefanov's blog post ["Social Button BFFs"](http://www.phpied.com/social-button-bffs/)
 * HackerNews button code by [Ilya Grigorik](https://github.com/igrigorik/hackernews-button)

##License
Copyright 2012 Rachel Baker (rachel@rachelbaker.me)

This program is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program.  If not, see <http://www.gnu.org/licenses/>.

