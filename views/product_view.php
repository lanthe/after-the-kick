<?php
function product_view($p) {
  return "<div class='content_area product_area'>
			<div class='product_title kf_header'>".$p->name."</div>
			<a href='/details/$p->details_url/'><div class='product_img'><img class='product_img' src=$p->img></img></div></a>
			<div class='product_description'>".$p->description."</div>
			<br>
			<div class='deal_text'><div class='ks_price'>$p->ks_price</div> on Kickstarter</div>
			<div class='product_price'>".$p->price."</div><div class='website'> via ".$p->website."</div>
			<a class='buy_button' href='/details/$p->details_url/')'>GO</a>
          </div>";
}

?>