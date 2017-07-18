<?php
$access_token = 'd9RBQdOTTADhGfT7TBl000WUsIjVfOkF9nlWPoI0FRDUtr5Xkk7z98cJkrXNMM5mVx0t4b9anVLsQqhQ58uZ4YNg2qvwgmNG1XFxUzi+0o4sqiUYD+9wtujtE4wa2Z4QzAuVltWNRvxkux+fqvCRKgdB04t89/1O/w1cDnyilFU=';
$userId="U123a75ddc358905d48b16cf4b20c3acf";

// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/profile/U123a75ddc358905d48b16cf4b20c3acf';

			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			$result = curl_exec($ch);
			curl_close($ch);
			$result=json_decode($result)
			//echo "displayname: ".$result['displayName']."<br/>"; 
			//echo "userId:".$result['userId']."<br/>";
			//echo "pictureUrl :".$result['pictureUrl']."<br/>";
			//echo "statusMessage :".$result['statusMessage']."<br/>";
			echo "14.45";
?>