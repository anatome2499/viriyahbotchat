<?php
$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('d9RBQdOTTADhGfT7TBl000WUsIjVfOkF9nlWPoI0FRDUtr5Xkk7z98cJkrXNMM5mVx0t4b9anVLsQqhQ58uZ4YNg2qvwgmNG1XFxUzi+0o4sqiUYD+9wtujtE4wa2Z4QzAuVltWNRvxkux+fqvCRKgdB04t89/1O/w1cDnyilFU=');
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '9e8ce9a241ec4a2f43b185e421d6c637']);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello');
$response = $bot->replyMessage('<reply token>', $textMessageBuilder);
if ($response->isSucceeded()) {
    echo 'Succeeded!';
    return ;
}

// Failed
echo $response->getHTTPStatus . ' ' . $response->getRawBody();
?>
