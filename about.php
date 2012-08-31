<?php
header('Content-type: text/html; charset=utf-8');


include_once("header.php");
include_once("footer.php");

echo get_header();

echo "
<div class='content_area'>
<p>We just wanted to be able to find and buy products after they'd been funded.  So we built a way to do that.</p>
</div>";

echo get_footer();
?>