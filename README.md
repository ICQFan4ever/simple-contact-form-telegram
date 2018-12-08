This is a simple Contact Form on PHP. All messages will be sent you to Telegram through your bot.

Requirements: Site with valid SSL-sertificate, php-curl.

Installation:
1) Copy message.php to any directory
2) Write to a bot @botfather in Telegram and create new bot, get your API key and change value of API_KEY constant
3) Write /start to your created bot
4) Change value of TLG_ID constant. Enter your ID in Telegram. To get it find user @ADARefactorBot and write /whoami 

To send message to your Telegram-account you should make a simple POST-request to this script. <input> should have name "message", for example:

<form action="message.php" method="post>
	<input type="text" name="message" placeholder="Write a message" />
	<input type="submit" value="Send" />
</form>

There is only one custom function - sendMessage(), it has 2 required args and one additional:
1 - ID of the chat where message will be delivered (it can also be a group chat)
2 - Text to send
3 - Markdown format. It can be empty, Markdown or HTML


This simple script is also useful as a notifier. For example, some torrent-clients allow you to run a program when downloading is completed. Replace POST-variable on GET (line #!!!), and you'll be able to do a simple GET-request using wget, cUrl etc. for example:
wget https://example.com/message.php?message="Downloading completed!"



In output you'll get an array of result from Telegram-server. If everything is okay, ['ok'] will be TRUE (view last comment in script)
