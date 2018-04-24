<?php
	require_once('../database.php');
	$aaa = "Delete from board where board_id = ".$_GET["Id"];
	$stat = "Delete from reportpost where report_id = ".$_GET["rid"];
	echo $aaa;
	$sth = $conn->prepare($aaa);
    print_r($sth->execute());
	$postid = $_GET['postid'];
    header("Location: listpostreports.php");

?>