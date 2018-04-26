<?php
	require_once('../database.php');
	$stat = "Delete from reportcomment where report_id = ".$_GET["Id"];
	$aaa = "Delete from replyboard where reply_id = (select reportcomment_id from reportcomment where report_id = ".$_GET["Id"].")";
	echo "aaa = ".$aaa;
	echo "<br>stat = ".$stat;
	$sth = $conn->prepare($aaa);
    print_r($sth->execute());
	$sth2 = $conn->prepare($stat);
    print_r($sth2->execute());
    header("Location: listcommentreports.php");

?>