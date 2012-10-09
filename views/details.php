<?php 
header('Content-type: text/html; charset=utf-8');
session_start();
include_once("../settings.php");
include_once("header.php");
include_once("footer.php");
include_once("../models/product.php");
include_once("../models/review.php");



//  DB Access

$uri = $_SERVER['REQUEST_URI'];
$uri = split("/",$uri);
$details_url = $uri[2];
$dbh = new PDO("sqlite:../data/helloworld3.sqlite", null, null);

$whereclause = 'where details_url=\''.$details_url.'\'';
$stmt = $dbh->prepare("select * from products ".$whereclause);
if ($stmt->execute(array())) {
  $row = $stmt->fetch();
  $p = new Product($row['id'],$row['name'], $row['description'], sprintf('$%.2f',$row['price']), sprintf('$%.2f',$row['ks_price']), $row['url'], $row['img_url'], $row['details_url'],true);
}

$stmt = $dbh->prepare("select * from reviews where product_id=".$p->id);
$reviews = array();

if($stmt->execute(array())) {
  while ($row = $stmt->fetch()) {
		$r = new Review($row['author'],$row['text']);
		array_push($reviews,$r);
  }
}

echo get_header_start();
echo '
<meta property="og:title" content="'.$p->name.'" />
<meta property="og:type" content="product" />
<meta property="og:url" content="http://kickfollower.com/details/'.$p->details_url.'/" />
<meta property="og:image" content="'.$p->img.'" />
<meta property="og:site_name" content="Kickfollower" />
<meta property="fb:admins" content="703897" />';
echo get_header_end();

// UI

echo "<div class='content_area'>
        <div class='details_product_img'><img class='details_product_img' src=$p->img></img></div>
        <div class='details_product_info'>
          <div class='details_product_name kf_header'>".$p->name."</div>
          <div class='details_pricing'>
            <div class='details_price_text_wrapper'>
		     <div class='deal_text'><div class='ks_price'>$p->ks_price</div> on Kickstarter</div>
		     <div class='product_price'>".$p->price."</div><div class='website'> via ".$p->website."</div>
            </div>
		    <a class='details_buy_button' href='javascript:void(0)' onclick='recordOutboundProductLink(\"buy_button\",$p->id,\"$p->url\")'>Check it out</a>
          </div>
          <div class='fb-like' data-href='http://kickfollower.com/details/$p->details_url/' data-send='false' data-width='450' data-show-faces='true' data-font='lucida grande'></div>
        </div>
        <div class='details_reviews_area'>
			<div class='kf_header'>Kickstarter User Comments</div>";
			if ($reviews) {
				foreach ($reviews as $r) {
				    echo "<div class='review'>";
					echo "<span class='author kf_normal'>".$r->author.": </span>";
					echo "<span class='kf_normal'>".$r->text."</span>";
					echo "</div>";
				}
			}
			else {
				echo "None yet.";
			}
	  echo "</div>";
echo "</div>";
// end
echo "<script type='text/javascript'>

function recordOutboundProductLink(action,product_id,href) {
  _gaq.push(['_trackEvent', 'product_click', action, href, product_id]);
  window.setTimeout(window.open(href), 600);
}


$(document).ready(function() {

});
</script>";
echo get_footer();  ?>