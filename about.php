<?php
header('Content-type: text/html; charset=utf-8');


include_once("header.php");
include_once("footer.php");

echo get_header();

echo "<div class='content_area'>
<p>We compile projects built with crowdfunding that can now be bought by the public.  If you're aware of a product that we've missed, please let us know by sending an <a href='mailto:kickfollower@gmail.com'>email</a>.</p>

<p>Want to know when new products become available?  Sign up for our <a href='/mailinglist.php'>mailing list</a> or follow us on twitter: @kickfollower</p>

<p>Happy shopping!</p>

</div>";

echo get_footer();
?>