<?php

$apiKey = "12285027-f39db80b59eed8aa03d51f202";

//step1
$cSession = curl_init();

//step2
$parameters = $_GET["q"];

//echo " parameters are: " . $parameters;
//$query = http_build_query($parameters);
curl_setopt($cSession,CURLOPT_URL,"https://pixabay.com/api/?key=$apiKey&q=$parameters");
curl_setopt($cSession,CURLOPT_RETURNTRANSFER, true);
curl_setopt($cSession,CURLOPT_HEADER, false);
curl_setopt($cSession,CURLOPT_HTTPHEADER, array(
    "Accept: application/json",
    "Content-Type: application/json",
    "Access-Control-Allow-Origin: *",
  //  "Authorization: Bearer $apiKey"
));

//step3
$results = curl_exec($cSession);
$err = curl_error($cSession);

//step4
curl_close($cSession);

//step5

// Let's just get one of the items and echo the JSON for that only.

//json_encode($results);
echo $results;
//echo $err;

?>