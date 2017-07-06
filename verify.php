<?php
$access_token = 'bnIAGqcA6ofn7+FQheIsUheTKpCBW+ykQgLIg+jjSMts39TV+io9w4Pc3IHfEmK7RA2jkLXfYgrhxgPMX8DaHJszuHnaSJ9oHJhoUdadNXPCOXAqoBYR+FtV5rlBOFSzOx2LXsTmgYBdis/FGNiWyQdB04t89/1O/w1cDnyilFU=';
$url = 'https://api.line.me/v1/oauth/verify';
$headers = array('Authorization: Bearer ' . $access_token);
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);
echo $result;
