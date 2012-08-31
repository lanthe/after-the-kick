<?php 
header('Content-type: text/html; charset=utf-8');
session_start();
include_once("settings.php");
include_once("header.php");
include_once("footer.php");
include_once("product_view.php");

echo get_header();  
echo product_view();
echo product_view();
echo product_view();
echo product_view();
echo product_view();
echo product_view();
echo product_view();
echo product_view();

?>

<div class='overlay_background'></div>
<script type='text/javascript'>



$(document).ready(function() {

});
</script>

<?php echo get_footer();  ?>
