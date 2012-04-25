/**
 * Inspired by Stoyan Stefanov
 * http://www.phpied.com/social-button-bffs/
 */
jQuery(document).ready(function(doc, script) {
        var js, fjs = doc.getElementsByTagName(script)[0],
            add = function(url, id) {
                if (doc.getElementById(id)) {
                    return;
                }
                js = doc.createElement(script);
                js.src = url;
                id && (js.id = id);
                fjs.parentNode.insertBefore(js, fjs);
            };

        // Google+ button
        add('https://apis.google.com/js/plusone.js');
        // Facebook
        add('//connect.facebook.net/en_US/all.js#xfbml=1');
        // Twitter
        add('//platform.twitter.com/widgets.js');
        // Linkedin
        add('//platform.linkedin.com/in.js');
        // HN
        add('//hnbutton.appspot.com/static/hn.js');
    }(document, 'script'));