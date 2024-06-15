<?php
$merchantId = 'M240605IXSG1247VY';
$secretKey = '87fb90f57aca352ef3d1c857f1e37729ad6c37aa831013bf6e3fb7a70e4f1a35';
$signature = md5($merchantId . ':' . $secretKey);

$url = "https://v1.apigames.id/v2/transaksi/status?merchant_id=$merchantId&signature=$signature";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

$response = json_decode($response, true);
$products = $response['products'];

return $products;
