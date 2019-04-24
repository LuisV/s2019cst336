<?php

$apiKey = "BQCSAhZWqs3svM90ZPmm8qdzYMxQlRWYzU-BisdpCuFB--xCvCjiZWLIiUTsKTsxgSJudGRsZ_O2RjfDvvNmaKV5BQOeQoiK6czfZpRiCoSokViPISS_BztPL952lR6s1jn21xHAS8wZHg";

//step1
$cSession = curl_init();

//step2
curl_setopt($cSession,CURLOPT_URL,"https://api.spotify.com/v1/browse/featured-playlists");
curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
curl_setopt($cSession,CURLOPT_HEADER, false);
curl_setopt($cSession,CURLOPT_HTTPHEADER, array(
    "Accept: application/json",
    "Content-Type: application/json",
    "Authorization: Bearer $apiKey"
));

//step3
$results = curl_exec($cSession);
$err = curl_error($cSession);

//step4
curl_close($cSession);

//step5
$musicData = json_decode($results);

// Let's just get one of the items and echo the JSON for that only.
echo json_encode($musicData->playlists->items[0]);

?>
/*
curl -X "GET" "https://api.spotify.com/v1/playlists/" 
-H "Accept: application/json" 
-H "Content-Type: application/json" 
-H "Authorization: Bearer BQCSAhZWqs3svM90ZPmm8qdzYMxQlRWYzU-BisdpCuFB--xCvCjiZWLIiUTsKTsxgSJudGRsZ_O2RjfDvvNmaKV5BQOeQoiK6czfZpRiCoSokViPISS_BztPL952lR6s1jn21xHAS8wZHg"
*/