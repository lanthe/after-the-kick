<?php

require_once("private/aws.config");
require_once("aws_signed_request.php");
 

$pxml = aws_signed_request("com", array("Operation"=>"ItemLookup","ItemId"=>$_REQUEST['asin'],"ResponseGroup"=>"Medium"), $public_key, $private_key);
if ($pxml === False)
{
    echo "Did not work.\n";
}
else
{ 
	var_dump($pxml->Items->Item);	
	var_dump($pxml->Items->Item->ItemAttributes);

	echo $pxml->Items->Item->ItemAttributes->ListPrice->Amount / 100.00, "\n";
    echo $pxml->Items->Item->ItemAttributes->Title, "\n";
    echo $pxml->Items->Item->ItemAttributes->ListPrice->FormattedPrice, "\n";
    echo $pxml->Items->Item->DetailPageURL,"\n";
    echo $pxml->Items->Item->LargeImage->URL;

}
?>
