<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

    require('vendor/autoload.php');

    $client = new GuzzleHttp\Client();
    $res = $client->request('POST', 'http://localhost:8000/api/oauth/token', [
        'json' => ["client_id" => "SWIAWM9RNHE1QNVMMHE5AEE4SG",
                   "client_secret" => "T21NQlpGM2dCcGk2cGFNVlFEdGgwcld4TEd4WmM4d1A4SEZpQTk",
                    "grant_type" => "client_credentials"]
    ]);

    $body = json_decode($res->getBody());

    $guzzle = new GuzzleHttp\Client(['base_uri' => 'http://localhost:8000/']);
    $headers = [
        'Authorization' => 'Bearer ' . $body->access_token,        
        'Accept'        => 'application/json',
    ];
   
    $response = $client->request('GET', 'http://localhost:8000/api/v1/order/197dd5c23e584badb19ebf15082a6286/line-items',  [
        'headers' => $headers
    ]);

   echo $response->getBody();
?>
