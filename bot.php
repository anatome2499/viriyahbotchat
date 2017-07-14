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

			

			if($text=="ผลิตภัณฑ์ประกันภัย"){
				// Build message to reply back
			$messages = [
				'type' => 'image',
				'originalContentUrl' => "https://viriyahbotchat.herokuapp.com/2017-07-14_9-08-48.png",
				'previewImageUrl'=>"https://viriyahbotchat.herokuapp.com/2017-07-14_9-08-48.png"
			];
			}
			else if($text=="imagemap"){
				$messages=[
				'type'=>'imagemap',
				'baseUrl'=>"https://viriyahbotchat.herokuapp.com",
				'altText'=>"this is an imagemap",
				'baseSize'=>array('height' =>1040 ,'width'=>1040 ),
				'actions'=>array(array('type' =>'uri' ,'linkUri'=>"https://example.com/",'area'=>array('x' =>0 ,'y'=>0,'width'=>520,height=>1040 ) ),array('type' =>'message' ,'text'=>"hello",'area'=>array('x' =>520 ,'y'=>0,'width'=>520,height=>1040 ) ) )
				];
			}
			else if($text=="template"){
				// Build message to reply back
				//$actions['type']=["message","message"];
				//$actions['label']=["Yes","No"];
				//$actions['text']=["yes","no"];
				//$template['type']="confirm";
				//$template['text']="Are you sure?";
				//$template['actions']=$actions;

			//$messages = [
				//'type' => 'template',
				//'altText' => "this is a confirm",
				//'template'=>$template
			//];
			}
			else{
				// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => $text
			];
			}

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
		else if($event['type']=='message'&&$event['message']['type']=='sticker'){
			//get sticker sent
			$packageId=$event['message']['packageId'];
			$stickerId=$event['message']['stickerId'];
			// Get replyToken
			$replyToken = $event['replyToken'];

			

			// Build message to reply back
			$messages = [
				'type' => 'sticker',
				'packageId' => $packageId,
				'stickerId'=>$stickerId
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

		else if($event['type']=='message'&&$event['message']['type']=='location'){
			//get location sent
			$title=$event['message']['title'];
			$address=$event['message']['address'];
			$latitude=$event['message']['latitude'];
			$longitude=$event['message']['longitude'];
			// Get replyToken
			$replyToken = $event['replyToken'];

			

			// Build message to reply back
			$messages = [
				'type' => 'location',
				'title' => $title,
				'address'=> $address,
				'latitude'=>$latitude,
				'longitude'=>$longitude
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
echo "10.05";


?>


