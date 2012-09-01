<?php
$BASE_PATH = '/var/www/after-the-kick'
?>
<?php
$dbh = new PDO("sqlite:$BASE_PATH/data/helloworld3.sqlite", null, null);
?>

<?php
$stmt = $dbh->prepare("select word from phrase;");
if ($stmt->execute(array())) {
  while ($row = $stmt->fetch()) {
    print_r($row);
  }
}
?>
