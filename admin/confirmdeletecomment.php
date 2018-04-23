<?php
	require_once('../database.php');
	$aaa = "Delete from replyboard where reply_id = ".$_GET["Id"];
	$stat = "Delete from reportcomment where report_id = ".$_GET["rid"];
	echo $aaa;
	$sth = $conn->prepare($aaa);
    print_r($sth->execute());
	$postid = $_GET['postid'];
    header("Location: viewpost.php?Id=$postid");

?>