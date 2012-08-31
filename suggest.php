<?php
header('Content-type: text/html; charset=utf-8');


include_once("header.php");
include_once("footer.php");

echo get_header();

echo "
<div class='content_area'>We've compiled these by hand, and we've probably missed some -- please point them out!  You can email us at <a href='mailto:evil-bitch@mit.com'>email</a>.</div>";


echo get_footer();
?>