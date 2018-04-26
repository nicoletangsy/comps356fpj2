qq<?php
	require_once('../database.php');
	$aaa = "Delete from reportcomment where report_id = ".$_GET["Id"];
	echo $aaa;
	$sth = $conn->prepare($aaa);
    print_r($sth->execute());
    header('Location: listcommentreports.php');
    
    
?>