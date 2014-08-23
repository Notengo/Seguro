<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
            <title>leanModal - a JQuery modal plugin that works with your CSS</title>
            <meta name="description" content="leanModal - a JQuery modal plugin that works with your CSS">
                <link rel="stylesheet" type="text/css" href="css/style.css">
                    <script type="text/javascript" async="" src="http://www.google-analytics.com/ga.js"></script><script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
                    <script type="text/javascript" src="js/jquery.leanModal.min.js"></script>
                    <script type="text/javascript">
                        $(function() {
                            $('a[rel*=leanModal]').leanModal({top: 200, closeButton: ".modal_close"});
                        });
                    </script>
                    <script type="text/javascript">

                        var _gaq = _gaq || [];
                        _gaq.push(['_setAccount', 'UA-3318823-14']);
                        _gaq.push(['_trackPageview']);

                        (function() {
                            var ga = document.createElement('script');
                            ga.type = 'text/javascript';
                            ga.async = true;
                            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                            var s = document.getElementsByTagName('script')[0];
                            s.parentNode.insertBefore(ga, s);
                        })();

                    </script>	
                    <style type="text/css"></style>
    </head>
    <body>
        <div id="banner">
            <p>leanModal is a <a href="http://twitter.com/finelysliced">@finelysliced</a> project. If you find it useful, and wish to support the development of more great plugins, maybe consider buying my <a href="http://utilicons.com/">pixel icons</a> for just $6!!</p>
        </div>
        <h1>leanModal.js</h1>
        <p id="intro">Bare bones modal dialog windows.</p>

        <div class="section-split">
            <div id="strengths" class="section-lt box">
                <h2>Strengths</h2>
                <ul>
                    <li>perfect for hidden page content</li>
                    <li>uber light at just over 1kb (minified)</li>
                    <li>flexible width &amp; height</li>
                    <li>image free</li>
                    <li>multiple instances on one page</li>
                    <li>great for login, sign up &amp; alert panels, etc.</li>
                </ul>
            </div>
            <div id="weaknesses" class="section-rt box">
                <h2>Weaknesses</h2>
                <ul>
                    <li>no gallery, iframe or ajax support</li>
                    <li>untested in IE6.</li>
                </ul>
            </div>
        </div>
        <p id="examples" class="section box">
            <strong>Examples:</strong>
            <a id="go" rel="leanModal" name="test" href="#test">Basic</a> | <a id="go" rel="leanModal" name="signup" href="#signup">With Close Button</a>
        </p>
        <a id="dload" href="leanModal.v1.1.zip">Download</a>
        <div class="section box">
            <h2>How To Use</h2>

            <p><strong>Step 1</strong>: together with JQuery, include jquery.leanModal.min.js in your page, thusly:</p>
            <pre>&lt;script type="text/javascript" src="path_to/jquery.leanModal.min.js"&gt;&lt;/script&gt;</pre>

            <p><strong>Step 2</strong>: rather than call another stylesheet, simply include the following overlay style block in your existing stylesheet. Additionally, be sure to hide your modal element with 'display: none;' (although that probably goes without saying).</p>
            <pre>#lean_overlay {
            position: fixed;
            z-index:100;
            top: 0px;
            left: 0px;
            height:100%;
            width:100%;
            background: #000;
            display: none;
            }</pre>

            <p><strong>Step 3</strong>: call the function on your modal trigger, as follows. Be sure to set the href attribute of your trigger anchor to match the id of your target element.</p>
            <pre>$("#trigger_id").leanModal();</pre>
            <p>...or, if you want more than one modal window on the same page, simply add the 'rel' attribute to your triggers, and call the function by attribute, like so:</p>
            <pre>$("a[rel*=leanModal]").leanModal();</pre>
            <h2>Options</h2>
            <p>In the spirit of keeping things simple, there are only <strike>two</strike> three options involved: vertical position of the modal element in relation to the document body (default is 100px from the top), the overlay opacity (default is 0.5), and a close button option (default null). You can override these defaults by passing your desired values to the function, like so:</p>
            <pre>$("#trigger_id").leanModal({ top : 200, overlay : 0.4, closeButton: ".modal_close" });</pre>
            <p>Simple, and sweet.</p>
        </div>

        <div class="section box">
            <h2>Licensing</h2>	
            <p>Available under the MIT and GPL licenses.</p>

        </div>
        <div class="section box">
            <h2>Change Log</h2>	
            <p><strong>Feb 2012</strong>: v1.1 - added a closeButton option. Fixed multiple spawn of #lean_overlay.</p>

        </div>
        <div class="section box">
            <h2>Support &amp; Feedback</h2>	
            <p>For issues or suggestions please see <a href="https://github.com/FinelySliced/leanModal.js">leanModal on Github</a>, or tweet <a href="http://twitter.com/finelysliced">@finelysliced</a>.</p> 
            <p>Thanks for your support!</p>

        </div>
        <div id="footer">
            <p>A <a href="http://finelysliced.com.au">Finely Sliced</a> project.</p>
        </div>
        <div id="signup" style="display: none; position: fixed; opacity: 1; z-index: 11000; left: 50%; margin-left: -202px; top: 200px;">
            <div id="signup-ct">
                <div id="signup-header">
                    <h2>Create a new account</h2>
                    <p>It's simple, and free.</p>
                    <a class="modal_close" href="#"></a>
                </div>

                <form action="">

                    <div class="txt-fld">
                        <label for="">Username</label>
                        <input id="" class="good_input" name="" type="text">

                    </div>
                    <div class="txt-fld">
                        <label for="">Email address</label>
                        <input id="" name="" type="text">
                    </div>
                    <div class="txt-fld">
                        <label for="">Password</label>
                        <input id="" name="" type="text">

                    </div>
                    <div class="btn-fld">
                        <button type="submit">Sign Up »</button>
                    </div>
                </form>
            </div>
        </div>
        <div id="test" style="display: none; position: fixed; opacity: 1; z-index: 11000; left: 50%; margin-left: -330px; top: 200px;">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum libero purus, convallis nec vestibulum eget, luctus vitae purus. Vestibulum non mauris et sem vulputate pellentesque ac a turpis. Ut vel lacus vitae justo vestibulum lobortis. Nunc ipsum ipsum, laoreet id dictum nec, fermentum vel purus. Maecenas nisl felis, faucibus non rutrum eu, sollicitudin sed ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent dignissim lacinia tempus. Nulla facilisi. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla facilisi. Nulla accumsan pellentesque velit, a malesuada diam tristique a. Fusce eleifend magna erat, et imperdiet orci. Quisque sapien mauris, malesuada eu tristique pulvinar, placerat id ligula. Vivamus vitae viverra nulla. Donec eget turpis vel erat malesuada sodales.</p>
        </div>

        <div id="lean_overlay" style="display: none; opacity: 0.5;"></div><div class="extLives"></div>
    </body>
</html>