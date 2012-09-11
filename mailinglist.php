<?php
header('Content-type: text/html; charset=utf-8');


include_once("header.php");
include_once("footer.php");

echo get_header();
echo '
<link href="http://cdn-images.mailchimp.com/embedcode/slim-081711.css" rel="stylesheet" type="text/css">
<div class="content_area">
<form action="http://kickfollower.us5.list-manage.com/subscribe/post?u=b5040446fd9b3900ce62715e7&amp;id=9e8979c523" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
	<p class="kf_normal">Sign up for our New Stuff list, and we\'ll let you know as Kickstarter, Indiegogo, and other crowd funded projects finish and become available for general purchase.</p>
	<input type="email" value="" name="EMAIL" class="email kf_normal" id="mce-EMAIL" placeholder="email address" required>
	<div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button kf_normal"></div><br>
	
	<p class="kf_normal">Or, follow us on twitter: &nbsp<a href="https://twitter.com/kickfollower" class="twitter-follow-button" data-show-count="false">Follow @kickfollower</a>
	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></p>

</form>

   <p class="kf_normal">Also, check out our <a href="/blog/">blog</a>!</p>
</div>';


echo get_footer();
?>