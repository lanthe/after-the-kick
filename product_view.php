<?php
include_once("product.php");

function product_view($p) {
  return "<div class='content_area product_area'>
			<div class='product_title'>".$p->name."</div>
			<div class='product_img'><a href='javascript:void(0)' onclick='recordOutboundProductLink(\"product_img\",$p->id,\"$p->url\")'><img class='product_img' src=$p->img></img></a></div>
			<div class='product_description'>".$p->description."</div>
			<br>
			<div class='product_price'>".$p->price."</div>
			<a class='buy_button' href='javascript:void(0)' onclick='recordOutboundProductLink(\"buy_button\",$p->id,\"$p->url\")'>BUY</a>
          </div>";
}

?>