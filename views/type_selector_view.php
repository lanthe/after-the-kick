<?php

function type_selector_view() {
  return "<div class=type_selector_view>
			<a href='/' class=type_selector>All</a>
			<a href='/filter/games/' class=type_selector>Games</a>
			<a href='/filter/food/' class=type_selector>Food</a>
			<a href='/filter/igear/' class=type_selector>iGear</a>
			<a href='/filter/electronics/' class=type_selector>Electronics</a>
			<a href='/filter/clothing/' class=type_selector>Clothing</a>
			<a href='/filter/art/' class=type_selector>Art</a>
          </div>";
}

?>