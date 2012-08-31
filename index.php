<?php 
header('Content-type: text/html; charset=utf-8');
session_start();
include_once("settings.php");
include_once("header.php");
include_once("footer.php");
include_once("product_view.php");

echo get_header();  
$p = new Product("Sun","brad will love this one","$100");
echo product_view($p);
$p = new Product("Moon","i don't think brad will like this one at all","$9000.99");
echo product_view($p);
$p = new Product();
echo product_view($p);
echo product_view($p);
echo product_view($p);
echo product_view($p);
echo product_view($p);


?>

<div class='overlay_background'></div>
<script type='text/javascript'>



$(document).ready(function() {

});
</script>

<?php echo get_footer();  ?>
