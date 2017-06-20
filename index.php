<!DOCTYPE html>

<html lang='en'>
	<head>
		<title>Audis</title>

		<meta charset='UTF-8'>
		<meta name='viewport' content='width=device-width, initial-scale=1'>

		<meta name='author' content='Andrew Guterman'>
		<meta name='keywords' content=''>
		<meta name='description' content=''>

		<link rel='Shortcut Icon' href='images/favicon.png'>

		<link rel='stylesheet' href='build/main.css'>
		<link rel='stylesheet' href='http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css'>
		<link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:500,900,400italic,100,200,300,300italic,400'>

		<script src='https://code.jquery.com/jquery-3.2.1.min.js' integrity='sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=' crossorigin='annonymous'></script>
		<script src='build/main.js'></script>
	</head>

	<body ontouchstart=''>
		<div id='wrapper'>
			<?php

				function isMobile()
				{
				    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
				}

				define("INCLUDE_FILE", true);

				if(isMobile())
					echo "<h1>This website isn't supported on mobile.</h1>";
				else
					require("elements/player.php");

			?>
		</div>
	</body>
</html>