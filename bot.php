<?php
$access_token = 'ChcuM/V/vEUT7zqMpZk9Z1U5nsHcUNaL2ClUUaCW2X4bQu7NjNWXwGO2gUw0pH7Lg7XO5yvDYmOXw64ux4fanfOuX6YkcTtfV8c1BPxbKrmo9BMLA5R5aerW7tHX3PvxMmlW9FvMVrNLag1h4uxCAAdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			
            if ($event['message']['text'] == 'เปลี่ยนรหัส')
			// Get replyToken
			$replyToken = $event['replyToken'];

            $text = 'กรุณาระบบ username : password เดิม เพื่อเปลี่ยนรหัส';

			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => $text
			];

			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
            $proxy = 'velodrome.usefixie.com:80';
            $proxyauth = 'fixie:PWFuWJ1klFnk1BE';  
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_PROXY, $proxy);
            curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
		}
	}
}
echo "OK";