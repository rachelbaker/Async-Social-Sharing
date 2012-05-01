 /* ============================================================
 * async-share.js v1.01
 * @author: Rachel Baker
 *
 * Credits:
 * Inspired by Stoyan Stefanov and Aaron Peters
 * ============================================================
 * Copyright 2012 Rachel Baker
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
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