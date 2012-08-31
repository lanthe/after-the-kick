<?php
class Product
{

  public $name;
  public $description;
  public $price;
  public $url;
  public $img;
  

  public function __construct($name = "Gizmo", $description = "Funded elsewhere, now available here", 
                              $price = "$9.99", $url = "google.com", 
                              $img = "http://curious.astro.cornell.edu/images/xraysun.gif")
  {
    $this->name = $name;
    $this->description = $description;
    $this->price = $price;
    $this->url = $url;
    $this->img = $img;
  }
}
?>