<?php
$access_token = 'd9RBQdOTTADhGfT7TBl000WUsIjVfOkF9nlWPoI0FRDUtr5Xkk7z98cJkrXNMM5mVx0t4b9anVLsQqhQ58uZ4YNg2qvwgmNG1XFxUzi+0o4sqiUYD+9wtujtE4wa2Z4QzAuVltWNRvxkux+fqvCRKgdB04t89/1O/w1cDnyilFU=';

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
			// Get replyToken
			$replyToken = $event['replyToken'];

			//build action1
			$action1=[
						"type"=> "message",
            			"label"=> "Yes",
            			"text"=> "yes"];

            //build action2
			$action2=[
						"type"=> "message",
            			"label"=> "No",
            			"text"=> "no"];

            //build action
            $action=[[$action1],[$action2],];

            //template
            $template=[
            			"type"=> "confirm",
      					"text"=> "Are you sure?",
      					"actions"=>[$action],
      					];

			// Build message to reply back
			$messages = [
							"type"=> "template",
  							"altText"=> "this is a confirm template",
  							"template"=> [$template],
  							];
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
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
		}
	}
}
echo "OK";



?>


