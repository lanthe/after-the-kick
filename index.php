<?php 
header('Content-type: text/html; charset=utf-8');
session_start();
include_once("settings.php");
include_once("header.php");
include_once("footer.php");
include_once("product_view.php");
include_once("type_selector_view.php");

echo get_header();  

echo type_selector_view();

$dbh = new PDO("sqlite:data/helloworld3.sqlite", null, null);

$whereclause = '';
if (isset($_REQUEST['t'])) {
	$whereclause = 'WHERE type="'.mysql_escape_string($_REQUEST['t']).'"';
}

$stmt = $dbh->prepare("select * from products ".$whereclause.";");
if ($stmt->execute(array())) {
  while ($row = $stmt->fetch()) {
  $p = new Product($row['name'], $row['description'], sprintf('$%.2f',$row['price']), $row['url'], $row['img_url']);  
  echo product_view($p);
  }
}

?>

<div class='overlay_background'></div>
<script type='text/javascript'>



$(document).ready(function() {

});
</script>

<?php echo get_footer();  ?>
