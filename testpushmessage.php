<?php
$access_token = 'zwU1HU8d9UeU1ADrGBIn3miov2UMLAvwvSf2KKdODHsJQSmq+J46aFS7icqfwjKJtykwCzPt6GKm60SuxS/zHz8PAasauZHd/C5B0ZY+9Mef8UR3tOaSJlHMbV8l1D1jsgRLC0bolKI7h8eUhsYN0QdB04t89/1O/w1cDnyilFU=';
$userId='Ufe962ccd4b299d9aa895957e923f8fb6';
$messages=[
				'type'=>'template',
				'altText'=>"this is a confirm template",
				'template'=>array(
					'type' =>"confirm" ,
					'text'=>"Are you sure?",
					'actions'=>array(
									array(
										'type' =>'message' ,
										'label'=>"Yes",
										'text'=>'yes'),
									array(
										'type' =>'message' ,
										'label'=>"No",
										'text'=>'no'
										) 
									) 
					)
				];
// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/push';
			$data = [
				'to' => $userId,
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
			echo "test ja";
?>
