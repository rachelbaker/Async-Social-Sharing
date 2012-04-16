jQuery(document).ready(function(){
 // Loading each social sharing script //
 /**
  * Twitter Asychronous Script
  */
(function() {
        var twitterScriptTag = document.createElement('script');
        twitterScriptTag.type = 'text/javascript';
        twitterScriptTag.async = true;
        twitterScriptTag.src = 'http://platform.twitter.com/widgets.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(twitterScriptTag, s);
})();
 /**
  * Facebook Asychronous Script
  */
 (function() {
    var e = document.createElement('script'); e.async = true;
    e.src = document.location.protocol +
      '//connect.facebook.net/en_US/all.js#xfbml=1';
    document.getElementById('fb-root').appendChild(e);
  }());
 /**
  * Google +1 Asychronous Script
  */
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
  /**
   * Linkedin Asychronous Script
   */
  (function() {
  var e = document.createElement('script');
  e.type="text/javascript"; e.async = true;
  e.src = 'http://platform.linkedin.com/in.js';
  document.getElementsByTagName('head')[0].appendChild(e);
 })();
  /**
   * Hacker News Asychronous Script
   * https://github.com/igrigorik/hackernews-button
   */
    (function() {
       var hn = document.createElement('script'); hn.type = 'text/javascript';
       hn.async = true; hn.src = 'http://hnbutton.appspot.com/static/hn.js';
       var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(hn, s);
    })();
  });