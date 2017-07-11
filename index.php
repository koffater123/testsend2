
//$access_token = 'bnIAGqcA6ofn7+FQheIsUheTKpCBW+ykQgLIg+jjSMts39TV+io9w4Pc3IHfEmK7RA2jkLXfYgrhxgPMX8DaHJszuHnaSJ9oHJhoUdadNXPCOXAqoBYR+FtV5rlBOFSzOx2LXsTmgYBdis/FGNiWyQdB04t89/1O/w1cDnyilFU=';
<?php
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
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];
$servername = "110.78.129.10";
$username = "root";
$password = "1234";
$dbname = "db";

$conn = new mysqli($servername, $username, $password, $dbname);
			
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	$messages = "Die";
} 

$sql = "SELECT id, name FROM id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$nam = $row["name"];
        //echo "id: " . $row["id"]. " - Name: " . $row["name"]. "<br>";
		
		
    }
} else {
    //echo "0 results";
}
$conn->close();

//echo $nam;
			// Build message to reply back
			/*
				  $messages = array(
				  'type'=> 'template',
				  'altText'=> 'this is a confirm template',
				'template'=>array (
			      'type'=> 'confirm',
			      'text'=> 'Are you sure?',
			      'actions'=>array (
				  array(
				    'type'=> 'message',
				    'label'=> 'Yes',
				    'text'=> 'yes'
				  ),
				  array(
				    'type'=> 'message',
				    'label'=> 'No',
				    'text'=> 'no'
				  )
					)
					)
								);*/
			//$messages =$nam;
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
