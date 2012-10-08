<?php 
header('Content-type: text/html; charset=utf-8');
session_start();
include_once("settings.php");
include_once("views/header.php");
include_once("views/footer.php");
include_once("views/product_view.php");
include_once("views/type_selector_view.php");
include_once("models/product.php");
echo get_header();  

echo type_selector_view();

$dbh = new PDO("sqlite:data/helloworld3.sqlite", null, null);
$whereclause = 'where coolness <> "" and img_url <> "" and visible=1';
if (isset($_REQUEST['t'])) {
	$whereclause .= ' and type="'.mysql_escape_string($_REQUEST['t']).'"';
}

$stmt = $dbh->prepare("select * from products ".$whereclause." order by coolness desc;");
if ($stmt->execute(array())) {
  while ($row = $stmt->fetch()) {
  if($row['ASIN'] != "")
    $p = new Product($row['id'],$row['name'], $row['description'], sprintf('$%.2f',$row['price']), sprintf('$%.2f',$row['ks_price']), $row['url'], $row['img_url'], $row['details_url'], true);
  else
    $p = new Product($row['id'],$row['name'], $row['description'], sprintf('$%.2f',$row['price']), sprintf('$%.2f',$row['ks_price']), $row['url'], $row['img_url'], $row['details_url'], false);
      
  echo product_view($p);
  }
}
echo '<div class="thats_all_folks">
       <p class="kf_normal">That\'s all we\'ve got!  Want to see more?  <a href="/mailinglist/">keep in touch</a></p>
      </div>';
?>

<div class='overlay_background'></div>
<script type='text/javascript'>

function recordOutboundProductLink(action,product_id,href) {
  _gaq.push(['_trackEvent', 'product_click', action, href, product_id]);
  window.setTimeout(window.open(href), 600);
}


$(document).ready(function() {

});
</script>

<?php echo get_footer();  ?>
