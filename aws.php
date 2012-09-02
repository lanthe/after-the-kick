<?php

require_once("aws.config");

function aws_signed_request($region, $params, $public_key, $private_key)
{
    /*
    Copyright (c) 2009 Ulrich Mierendorff
 
    Permission is hereby granted, free of charge, to any person obtaining a
    copy of this software and associated documentation files (the "Software"),
    to deal in the Software without restriction, including without limitation
    the rights to use, copy, modify, merge, publish, distribute, sublicense,
    and/or sell copies of the Software, and to permit persons to whom the
    Software is furnished to do so, subject to the following conditions:
 
    The above copyright notice and this permission notice shall be included in
    all copies or substantial portions of the Software.
 
    THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
    IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
    FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL
    THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
    LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
    FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER
    DEALINGS IN THE SOFTWARE.
    */
 
    /*
    Parameters:
        $region - the Amazon(r) region (ca,com,co.uk,de,fr,jp)
        $params - an array of parameters, eg. array("Operation"=>"ItemLookup",
                        "ItemId"=>"B000X9FLKM", "ResponseGroup"=>"Small")
        $public_key - your "Access Key ID"
        $private_key - your "Secret Access Key"
    */
 
    // some paramters
    $method = "GET";
    $host = "ecs.amazonaws.".$region;
    $uri = "/onca/xml";
 
    // additional parameters
    $params["Service"] = "AWSECommerceService";
    $params["AWSAccessKeyId"] = $public_key;
    // GMT timestamp
    $params["Timestamp"] = gmdate("Y-m-d\TH:i:s\Z");
    // API version
    $params["Version"] = "2009-03-31";
    $params["AssociateTag"]="kickfo-20";
   // $params["IdType"]="ISBN";
   // $params["SearchIndex"]="Books";

    // sort the parameters
    ksort($params);
 
    // create the canonicalized query
    $canonicalized_query = array();
    foreach ($params as $param=>$value)
    {
        $param = str_replace("%7E", "~", rawurlencode($param));
        $value = str_replace("%7E", "~", rawurlencode($value));
        $canonicalized_query[] = $param."=".$value;
    }
    $canonicalized_query = implode("&", $canonicalized_query);
 
    // create the string to sign
    $string_to_sign = $method."\n".$host."\n".$uri."\n".$canonicalized_query;
 
    // calculate HMAC with SHA256 and base64-encoding
    $signature = base64_encode(hash_hmac("sha256", $string_to_sign, $private_key, True));
 
    // encode the signature for the request
    $signature = str_replace("%7E", "~", rawurlencode($signature));
 
    // create request
    $request = "http://".$host.$uri."?".$canonicalized_query."&Signature=".$signature;
 
    // do request
    $response = @file_get_contents($request);
 
    if ($response === False)
    {
        return False;
    }
    else
    {
        // parse XML
        $pxml = simplexml_load_string($response);
        if ($pxml === False)
        {
            return False; // no xml
        }
        else
        {
            return $pxml;
        }
    }
}
 

$pxml = aws_signed_request("com", array("Operation"=>"ItemLookup","ItemId"=>"0811873315","ResponseGroup"=>"Medium"), $public_key, $private_key);
if ($pxml === False)
{
    echo "Did not work.\n";
}
else
{ 
	var_dump($pxml->Items->Item);	
	var_dump($pxml->Items->Item->ItemAttributes);

    echo $pxml->Items->Item->ItemAttributes->Title, "\n";
    echo $pxml->Items->Item->ItemAttributes->ListPrice->FormattedPrice, "\n";
    echo $pxml->Items->Item->DetailPageURL,"\n";
    echo $pxml->Items->Item->LargeImage->URL;

}

$dbh = new PDO("sqlite:data/helloworld3.sqlite", null, null);

$stmt =$dbh->prepare('select * from products where asin <> ""');

if ($stmt->execute(array())) {
	while ($row = $stmt->fetch()) {
		
		var_dump($row);
		$pxml = aws_signed_request("com", array("Operation"=>"ItemLookup","ItemId"=>$row['ASIN'],"ResponseGroup"=>"Medium"), $public_key, $private_key);
		$updatestmt =$dbh->prepare('update products set'.
		                     ' price='.$pxml->Items->Item->ItemAttributes->ListPrice->FormattedPrice.
		                     ' and img_url='.$pxml->Items->Item->LargeImage->URL.
		                     ' and url='.$pxml->Items->Item->DetailPageURL.
		                     ' where id='.$row["id"]);
		$updatestmt->execute(array());
		
	}
}


?>
