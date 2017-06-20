<?php

	if(!$_POST['video'])
		exit;

	$fileName = uniqid("dl_");

	/*echo */exec("cd C:\\xampp\\htdocs\\Audis\\_downloads\\youtube_dl && __main__.py https://www.youtube.com/watch?v=" . $_POST['video'] . " --extract-audio -o \"..\\" . $fileName . ".%(ext)s\" --audio-format mp3");

	$result = array("fileName" => $fileName);
	echo json_encode($result);

?>