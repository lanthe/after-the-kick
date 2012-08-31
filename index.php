<?php 
header('Content-type: text/html; charset=utf-8');
session_start();
include_once("settings.php");
include_once("header.php");
include_once("footer.php");
include_once("product_view.php");

echo get_header();  
echo "<div class=tagline>Shop for crowdfunded creations</div>";
$p = new Product("INNA Jam","Delicious jams in lots of interesting flavors","$12",
                 "http://innajam.com/products/singles",
                 "http://cdn.shopify.com/s/files/1/0044/7532/files/INNA-jam-12-up3.jpg?10");
echo product_view($p);
$p = new Product("My Alibi Bloomers","Wear these comfortable biking underwear beneath your normal clothing and ride to work happy :)","$70",
				"http://www.amazon.com/My-Alibi-Clothing-Bloomers-8-Pomegranate/dp/B007BO8AQO/ref=sr_1_1?s=apparel&ie=UTF8&qid=1346374873&sr=1-1",
				 "http://www.myalibiclothing.com/wp-content/uploads/2010/03/bloomer_choc-front-crop.png");
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
