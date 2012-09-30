<?php 
header('Content-type: text/html; charset=utf-8');
session_start();
include_once("settings.php");
include_once("header.php");
include_once("footer.php");
include_once("product.php");
include_once("review.php");

echo get_header();  

//  DB Access

$uri = $_SERVER['REQUEST_URI'];
$uri = split("/",$uri);
$details_url = $uri[2];
$dbh = new PDO("sqlite:data/helloworld3.sqlite", null, null);

$whereclause = 'where details_url=\''.$details_url.'\'';
$stmt = $dbh->prepare("select * from products ".$whereclause);
if ($stmt->execute(array())) {
  $row = $stmt->fetch();
  $p = new Product($row['id'],$row['name'], $row['description'], sprintf('$%.2f',$row['price']), sprintf('$%.2f',$row['ks_price']), $row['url'], $row['img_url'], true);
}

$stmt = $dbh->prepare("select * from reviews where product_id=".$p->id);
$reviews = array();

if($stmt->execute(array())) {
  while ($row = $stmt->fetch()) {
		$r = new Review($row['author'],$row['text']);
		array_push($reviews,$r);
  }
}

// UI

echo "<div class='content_area product_area'>
			<div class='product_title kf_header'>".$p->name."</div>
			<div class='product_img'><a href='javascript:void(0)' onclick='recordOutboundProductLink(\"product_img\",$p->id,\"$p->url\")'><img class='product_img' src=$p->img></img></a></div>
			<div class='product_description'>".$p->description."</div>
			<br>
			<div class='deal_text'><div class='ks_price'>$p->ks_price</div> on Kickstarter</div>
			<div class='product_price'>".$p->price."</div><div class='website'> via ".$p->website."</div>
			<a class='buy_button' href='javascript:void(0)' onclick='recordOutboundProductLink(\"buy_button\",$p->id,\"$p->url\")'>GO</a>
          </div>";

echo "<div class='content_area reviews_area'>";
echo "<div class='kf_header'>Kickstarter User Comments</div>";
foreach ($reviews as $r) {
    echo "<div class='review'>";
	echo "<span class='author kf_normal'>".$r->author.": </span>";
	echo "<span class='kf_normal'>".$r->text."</span>";
	echo "</div>";
}
echo "</div>";
// end

echo get_footer();  ?>