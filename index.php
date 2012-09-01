<?php 
header('Content-type: text/html; charset=utf-8');
session_start();
include_once("settings.php");
include_once("header.php");
include_once("footer.php");
include_once("product_view.php");
include_once("type_selector_view.php");

echo get_header();  

echo type_selector_view();

$dbh = new PDO("sqlite:data/helloworld3.sqlite", null, null);

$whereclause = '';
if (isset($_REQUEST['t'])) {
	$whereclause = 'WHERE type="'.mysql_escape_string($_REQUEST['t']).'"';
}

$stmt = $dbh->prepare("select * from products ".$whereclause.";");
if ($stmt->execute(array())) {
  while ($row = $stmt->fetch()) {
  $p = new Product($row['name'], $row['description'], sprintf('$%.2f',$row['price']), $row['url'], $row['img_url']);  
  echo product_view($p);

//print_r($row);
  }
}

$p = new Product("INNA Jam","Delicious jams in lots of interesting flavors","$12",
                 "http://innajam.com/products/singles",
                 "http://cdn.shopify.com/s/files/1/0044/7532/files/INNA-jam-12-up3.jpg?10");
echo product_view($p);
$p = new Product("My Alibi Bloomers","Wear these comfortable biking underwear beneath your normal clothing and ride to work happy :)","$70",
				"http://www.amazon.com/My-Alibi-Clothing-Bloomers-8-Pomegranate/dp/B007BO8AQO/ref=sr_1_1?s=apparel&ie=UTF8&qid=1346374873&sr=1-1",
				 "http://www.myalibiclothing.com/wp-content/uploads/2010/03/bloomer_choc-front-crop.png");
echo product_view($p);
$p = new Product("TikTok","It's a watch mount for your iPod Nano","$29.77",
				"http://www.amazon.com/TikTok-Multi-Touch-Watch-Band-Black/dp/B004YTQ4WQ/ref=sr_1_1?s=electronics&ie=UTF8&qid=1346433243&sr=1-1&keywords=tiktok",
				 "http://images.gizmag.com/hero/tiktok.jpg");
echo product_view($p);
$p = new Product("Eminent Domain","An incredibly well-reviewed board game","$29.12",
"http://www.amazon.com/dp/0984155856?tag=boardgamegeek-20&camp=14573&creative=327641&linkCode=as1&creativeASIN=0984155856&adid=19RQVRR79NA3V4F6CEWV&&ref-refURL=http%3A%2F%2Fboardgamegeek.com%2Fboardgame%2F68425%2Feminent-domain",
"http://ecx.images-amazon.com/images/I/51C2udFy2wL._SL500_AA300_.jpg");
echo product_view($p);
$p = new Product();
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
