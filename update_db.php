<?php

require_once("private/aws.config");
require_once("aws_signed_request.php");

$dbh = new PDO("sqlite:data/helloworld3.sqlite", null, null);
try {
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$dbh->beginTransaction();
	$stmt =$dbh->prepare('select * from products where asin <> ""');

	if ($stmt->execute(array())) {
		while ($row = $stmt->fetch()) {
			$pxml = aws_signed_request("com", array("Operation"=>"ItemLookup","ItemId"=>$row['ASIN'],"ResponseGroup"=>"Medium"), $public_key, $private_key);
			if ($pxml == null) {   //we're not sure why these sometimes fail
			  echo $row['id']." failed \n";
			}
			else {
				$price = $pxml->Items->Item->ItemAttributes->ListPrice->Amount / 100.00;
				if($price == 0) {
				  	$price = $pxml->Items->Item->OfferSummary->LowestNewPrice->Amount / 100.00;
				}
			
				$updatestmt =$dbh->prepare('update products set'.
			                     ' price='.$price.
			                     ',img_url="'.$pxml->Items->Item->LargeImage->URL.
			                     '",url="'.$pxml->Items->Item->DetailPageURL.
			                     '" where id='.$row["id"]);
				var_dump($updatestmt);
				$updatestmt->execute(array());
			}
			usleep(2000000);
		
		}
		
	}
} catch (Exception $e) {
  $dbh->rollBack();
  echo "Failed: " . $e->getMessage();
}

$dbh->commit();

?>
