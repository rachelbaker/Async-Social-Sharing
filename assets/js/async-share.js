/* ============================================================
 * async-share.js v1.8.0
 * @author: Rachel Baker
 *
 * Credits:
 * Inspired by Stoyan Stefanov and Aaron Peters
 * ============================================================
 * Copyright 2013 Rachel Baker
 *
 *  This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program.  If not, see <http://www.gnu.org/licenses/>.
 * ============================================================ */
jQuery(document).ready(function (d, s, id) {
	// fb + common
	var js, fjs = d.getElementsByTagName(s)[0];
	var appID = Async_Social_Sharing.appid;

	// facebook
	if (d.getElementById(id)) {
		return;
	}
	if (jQuery('li.fb-share').length > 0) {
		js = d.createElement(s);
		js.id = id;
		if ( appID.length > 0 ) {
			js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=" + appID + "&version=v2.0";
		} else {
			js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
		}
		fjs.parentNode.insertBefore(js, fjs);
	}
	// tweet
	if (jQuery('li.twitter-share').length > 0) {
		js = d.createElement(s);
		js.src = '//platform.twitter.com/widgets.js';
		fjs.parentNode.insertBefore(js, fjs);
	}
	// +1
	if (jQuery('li.gplus-share').length > 0) {
		js = d.createElement(s);
		js.src = 'https://apis.google.com/js/plusone.js';
		fjs.parentNode.insertBefore(js, fjs);
	}
	// linkedin
	if (jQuery('li.linkedin-share').length > 0) {
		js = d.createElement(s);
		js.src = '//platform.linkedin.com/in.js';
		fjs.parentNode.insertBefore(js, fjs);
	}
	// hackernews
	if (jQuery('li.hn-share').length > 0) {
		js = d.createElement(s);
		js.src = '//hnbutton.appspot.com/static/hn.js';
		fjs.parentNode.insertBefore(js, fjs);
	}

}(document, 'script'));

