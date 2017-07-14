
<?php

$file = fopen("http://110.78.128.10/c.csv","r");
$i=1;
while(! feof($file))
  {
	$line[$i] = fgetcsv($file);
	$i++;
  }
fclose($file);
//print_r($line[1]);

$access_token = 'bnIAGqcA6ofn7+FQheIsUheTKpCBW+ykQgLIg+jjSMts39TV+io9w4Pc3IHfEmK7RA2jkLXfYgrhxgPMX8DaHJszuHnaSJ9oHJhoUdadNXPCOXAqoBYR+FtV5rlBOFSzOx2LXsTmgYBdis/FGNiWyQdB04t89/1O/w1cDnyilFU=';

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
			
			// Get replyToken
			$replyToken = $event['replyToken'];
			// Get text sent
			//$text = $event['replyToken'];
			$text = $event['source']['userId'];
			// Build message to reply back
			$messages = array(
      				'type'=> 'template',
      				'altText'=> 'this is a buttons template',
    				'template'=>array (
         				'type'=> 'buttons',
         				//'thumbnailImageUrl'=> 'https://example.com/bot/images/image.jpg',
      					'title'=> 'คำถาม',
      					'text'=> '$line[1][1]',
        			 	'actions'=>array (array('type'=> 'message','label'=> $line[1][2],'text'=> $line[1][2]),
							  array('type'=> 'message','label'=> $line[1][3],'text'=> $line[1][3]),
							  array('type'=> 'message','label'=> $line[1][4],'text'=> $line[1][4]),
							  array('type'=> 'message','label'=> $line[1][5],'text'=> $line[1][5]))
							)
						);
		
			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = array(
				'replyToken' => $replyToken,
				'messages' => [$messages],
			);
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
			
			$response = $bot->replyMessage($event->getReplyToken(), $outputText);
		}
	}
}
echo "OK";

