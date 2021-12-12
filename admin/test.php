<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.mista.io/sms",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => array('action' => 'send-sms','to' => '+250786232347','from' => 'SBCA','sms' => 'hi','schedule' => '2021-12-06 21:39:00'),
  CURLOPT_HTTPHEADER => array(
    "x-api-key:35a13e16-dd2c-9c91-819b-34ed0beb5dc7-08b4b43d"
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;