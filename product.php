<?php
class Product
{

  public $name;
  public $description;
  public $price;
  public $url;
  public $img;
  public $id;
  public $ks_price;
  public $website;
  

  public function __construct($id=0,$name = "Gizmo", $description = "Funded elsewhere, now available here", 
                              $price = "$9.99", $ks_price = '$9.99', $url = "google.com", 
                              $img = "http://curious.astro.cornell.edu/images/xraysun.gif", $is_amazon)
  {
    $this->name = $name;
    $this->description = $description;
    $this->price = $price;
    $this->url = $url;
    $this->img = $img;
    $this->id = $id;
    $this->ks_price = $ks_price;
    if($is_amazon) {
      $this->website = "Amazon";
	}
    else {
      $this->website = "their site";
	}
  }
}
?>