<?php

function type_selector_view() {
  return "<div class=type_selector_view>
			<a href='/' class=type_selector>All</a>
			<a href='/?t=games' class=type_selector>Games</a>
			<a href='/?t=food' class=type_selector>Food</a>
			<a href='/?t=igear' class=type_selector>iGear</a>
			<a href='/?t=electronics' class=type_selector>Electronics</a>
			<a href='/?t=clothing' class=type_selector>Clothing</a>
			<a href='/?t=art' class=type_selector>Art</a>
          </div>";
}

?>