<?php
$access_token = 'uP/ytxncJ2p9kHyt0H/YEeObv9D1XG6LRuLOPg1SZGeh2YAZOTacI7unOKlc2ZBjoXtPIa+KgzSI0IshE4Q5TGKTScl7uv6KU1eT+VxvCTyoqknPbFCcYLyKfjF7Gwe9TnIq4wTsYGsENXptyN7xnAdB04t89/1O/w1cDnyilFU=';
$proxy = 'velodrome.usefixie.com:80';
$proxyauth = 'fixie:dvzvd8W3hbmr5LW';

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
			// Get text sent
			$text = $event['message']['text'];
			
			if($text == "สวัสดี") {
			  $textRe = "สวัสดีเช่นกันจ้าา";
			} else if($text == "ทำอะไรอยู่") {
			  $textRe = "คุยกะเธอไง";
			} else if($text == "บอกมา") {
			  $textRe = "ความลับนะ";
			} else if($text == "อยู่ไหน") {
			  $textRe = "อยู่นี่";
			} else if($text == "555") {
			  $textRe = "ถถถ";
			} else if($text == "อิอิ") {
			  $textRe = "vbvb";
			} else if($text == "ง่วง") {
			  $textRe = "ไปนอนจิ";
			} else if($text == "เนอะ") {
			  $textRe = "เนอะ เนอะ";
			} else if($text == "ฝนตก") {
			  $textRe = "ไฟดับมั้ย";
			}else if($text == "หิว") {
			  $textRe = "ติมมั้ย อิอิ";
			} else if($text == "คิดถึง") {
			  $textRe = "ทำไงดี อิอิ";
			} else if($text == "นอนยัง") {
			  $textRe = "กำลังจานอน ฝันดีนะ ^^";
			} else if($text == "ครับ") {
			  $textRe = "ค่ะ";
			} else if($text == "ค่ะ") {
			  $textRe = "ครับ";
			} else {
			  $textRe = $text;
			}

			// Get replyToken
			$replyToken = $event['replyToken'];

			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => $textRe
			];

			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

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

