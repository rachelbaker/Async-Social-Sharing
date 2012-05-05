 /* ============================================================
 * async-share.js v1.01
 * @author: Rachel Baker
 *
 * Credits:
 * Inspired by Stoyan Stefanov and Aaron Peters
 * ============================================================
 * Copyright 2012 Rachel Baker
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

jQuery(document).ready(function(w, d, s) {
  function go(){
    var js, fjs = d.getElementsByTagName(s)[0], load = function(url, id) {
          if (d.getElementById(id)) {return;}
          js = d.createElement(s); js.src = url; js.id = id;
          fjs.parentNode.insertBefore(js, fjs);
        };
    load('//connect.facebook.net/en_US/all.js#xfbml=1', 'fbjssdk');
    load('//platform.twitter.com/widgets.js', 'tweetjs');
    load('https://apis.google.com/js/plusone.js', 'gplus1js');
    load('//platform.linkedin.com/in.js', 'injs');
    load('//hnbutton.appspot.com/static/hn.js', 'hnjs');

  }
  if (w.addEventListener) { w.addEventListener("load", go, false); }
  else if (w.attachEvent) { w.attachEvent("onload",go); }

    }(window, document, 'script'));