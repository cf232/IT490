<?php
//file holds your crendential details
//in this case it holds my $api_key
require('config.php');
$search = "api";
$url = "https://api.nytimes.com/svc/search/v2/articlesearch.json?q=$search&page=1&sort=oldest&api-key=$api_key";
$data = file_get_contents($url);
$json = json_decode($data,true);
//uncomment the below to see the structure of the response
//echo "<pre>" . var_export($json, true) . "</pre>";
foreach($json["response"]["docs"] as $item){
	//uncomment the below to see the structure of each item
	//echo "<br><pre>" . print_r($item, true) . "</pre><br>";
	echo "<br>Headline: " . $item["headline"]["print_headline"] . "<br>";
}

?>
