<?php
$access_token = 'd9RBQdOTTADhGfT7TBl000WUsIjVfOkF9nlWPoI0FRDUtr5Xkk7z98cJkrXNMM5mVx0t4b9anVLsQqhQ58uZ4YNg2qvwgmNG1XFxUzi+0o4sqiUYD+9wtujtE4wa2Z4QzAuVltWNRvxkux+fqvCRKgdB04t89/1O/w1cDnyilFU=';
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