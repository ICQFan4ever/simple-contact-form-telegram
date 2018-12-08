<?php

# Enter your token here:
define('BOT_TOKEN', '12345678:nZAr0OJNcM66WR_miAaQvag9CAGh11wd6qg');
define('API_URL', 'https://api.telegram.org/bot'.BOT_TOKEN.'/'); // Don't touch this!!!

# Enter your Telegram ID here (view README):
define('TLG_ID', '41851891');

# Enter your mode - GET or POST
define('TLG_MODE', 'GET');

function sendMessage($id_chat, $text, $mark = '', $id_message = '')
	{
		$toSend = array('method' => 'sendMessage', 'chat_id' => $id_chat, 'text' => $text);
		!empty($mark) ? $toSend['parse_mode'] = $mark : '';
		$ch = curl_init(API_URL);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($toSend));
		curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
		$a = curl_exec($ch);
		return json_decode($a, true);
	}

$message = TLG_MODE == 'POST' ? (!empty($_POST['message']) ? trim(urldecode($_POST['message'])) : 'Empty message') : (!empty($_GET['message']) ? trim(urldecode($_GET['message'])) : 'Empty message');

$result = sendMessage(TLG_ID, $message);

/* if everything is okay, $result['ok'] will be TRUE. For example, you can redirect user to a different page:

if($result['ok'] == TRUE)
	{
		header('Location: /index.php?success=1');
	}

*/