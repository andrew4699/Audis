<?php

	if(!isset($_FILES['song']))
		exit;

	if($_FILES['song']['size'] > (1000 * 1000 * 9)) // 5MB
		exit;

	$file = finfo_open(FILEINFO_MIME);
	$fileInfo = finfo_file($file, $_FILES['song']['tmp_name']);
	finfo_close($file);

	$split = explode(";", $fileInfo);
	$fileType = $split[0];

	if($fileType != "audio/mpeg")
		exit;

	$dest = "_downloads/" . uniqid("up_") . ".mp3";
	move_uploaded_file($_FILES['song']['tmp_name'], "../" . $dest);

	$result = array("title" => basename($_FILES['song']['name'], ".mp3"), "path" => $dest);
	echo json_encode($result);

?>