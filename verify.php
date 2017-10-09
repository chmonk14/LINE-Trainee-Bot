<?php
$access_token = 'ts/ODdUyyx8b4V22zeXlZJFcwI5ujx+QH4lL+WOUH1zE/FFQWjsX/hz9ct7Z421y5qRuUYCUxM17fgFHO0coy/EKPuUPLJyqTaVtE0Xd/uR6YRlLFbvGBhNS9NE3Q2LkcKZTPstqbwkuL7hTjF5GGAdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

//PROXY
//$proxy = 'velodrome.usefixie.com:80';
//$proxyauth = 'fixie:1sESv3OLyAM3Han';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
//curl_setopt($ch, CURLOPT_PROXY, $proxy);
//curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
$result = curl_exec($ch);
curl_close($ch);

echo $result;