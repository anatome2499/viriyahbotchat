<?php
$access_token = 'zwU1HU8d9UeU1ADrGBIn3miov2UMLAvwvSf2KKdODHsJQSmq+J46aFS7icqfwjKJtykwCzPt6GKm60SuxS/zHz8PAasauZHd/C5B0ZY+9Mef8UR3tOaSJlHMbV8l1D1jsgRLC0bolKI7h8eUhsYN0QdB04t89/1O/w1cDnyilFU=';
$userId="U123a75ddc358905d48b16cf4b20c3acf";
$messages=[
				'type'=>"template",
				'altText'=>"this is a carousel template",
				'template'=>array(
								'type' =>"carousel" ,
								'columns'=>array(
												array(
													'thumbnailImageUrl' =>"https://daily.rabbitstatic.com/wp-content/uploads/2013/11/viriyah.jpg" ,
												 	'title'=>"this is menu",
												 	'text'=>"description",
												 	'actions'=>array(
												 					array(
												 						'type' => "message",
												 						'label'=>"Yes",
												 						'text'=>"yes" 
												 						),
												 					array(
												 						'type' =>"uri" ,
												 						'label'=>"detail",
												 						'uri'=>"https://www.google.co.th" 
												 						)
												 					)
												 	)  ,
												array(
												 	'thumbnailImageUrl' =>"https://daily.rabbitstatic.com/wp-content/uploads/2013/11/viriyah.jpg" ,
												 	'title'=>"this is menu",
												 	'text'=>"description",
												 	'actions'=>array(
												 					array(
												 						'type' => "message",
												 						'label'=>"Yes",
												 						'text'=>"yes" 
												 						),
												 					array(
												 						'type' =>"uri" ,
												 						'label'=>"detail",
												 						'uri'=>"http://www.viriyah.co.th/th/product.php" 
												 						)
												 					) 
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
			echo "11.41";
?>
