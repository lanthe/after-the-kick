<?php
$dbh = new PDO("sqlite:data/helloworld3.sqlite", null, null);

$stmt = $dbh->prepare("select word from phrase;");
if ($stmt->execute(array())) {
  while ($row = $stmt->fetch()) {
    print_r($row);
  }
}
?>
