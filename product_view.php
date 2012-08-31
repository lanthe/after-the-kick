<?php
include_once("product.php");

function product_view($p) {
  return "<div class='content_area product_area'>
			<div class='product_title'>".$p->name."</div>
			<div class='product_img' style='background-image:url(\"".$p->img."\");'></div>
			<div class='product_description'>".$p->description.".</div>
			<br>
			<div class='product_price'>".$p->price."</div>
			<div class='buy_button'>BUY</div>
          </div>";
}

?>