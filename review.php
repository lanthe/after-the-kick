<?php
class Review
{

  public $author;
  public $text;
  

  public function __construct($author,$text)
  {
    $this->author = $author;
    $this->text = $text;
  }
}
?>