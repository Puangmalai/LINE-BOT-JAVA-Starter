<?php
$access_token = 'uP/ytxncJ2p9kHyt0H/YEeObv9D1XG6LRuLOPg1SZGeh2YAZOTacI7unOKlc2ZBjoXtPIa+KgzSI0IshE4Q5TGKTScl7uv6KU1eT+VxvCTyoqknPbFCcYLyKfjF7Gwe9TnIq4wTsYGsENXptyN7xnAdB04t89/1O/w1cDnyilFU=';
$proxy = 'velodrome.usefixie.com:80';
$proxyauth = 'fixie:dvzvd8W3hbmr5LW';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_PROXY, $proxy);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
