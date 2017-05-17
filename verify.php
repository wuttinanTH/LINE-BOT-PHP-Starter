<?php
$access_token = 'ChcuM/V/vEUT7zqMpZk9Z1U5nsHcUNaL2ClUUaCW2X4bQu7NjNWXwGO2gUw0pH7Lg7XO5yvDYmOXw64ux4fanfOuX6YkcTtfV8c1BPxbKrmo9BMLA5R5aerW7tHX3PvxMmlW9FvMVrNLag1h4uxCAAdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;