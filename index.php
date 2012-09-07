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

$whereclause = 'where coolness <> "" and img_url <> "" ';
if (isset($_REQUEST['t'])) {
	$whereclause .= 'and type="'.mysql_escape_string($_REQUEST['t']).'"';
}

$stmt = $dbh->prepare("select * from products ".$whereclause." order by coolness desc;");
if ($stmt->execute(array())) {
  while ($row = $stmt->fetch()) {
  $p = new Product($row['id'],$row['name'], $row['description'], sprintf('$%.2f',$row['price']), sprintf('$%.2f',$row['ks_price']), $row['url'], $row['img_url']);  
  echo product_view($p);
  }
}
echo '<div class="thats_all_folks">
       <p class="kf_normal">That\'s all we\'ve got!  Want to see more?  <a href="/mailinglist.php">keep in touch</a></p>
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
