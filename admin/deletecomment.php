<?php
	require_once('../database.php');
	$aaa = "Delete from replyboard where reply_id = ".$_GET["Id"];
	echo $aaa;
	$sth = $conn->prepare($aaa);
    print_r($sth->execute());
	$postid = $_GET['postid'];
    header("Location: viewpost.php?Id=$postid");

?>