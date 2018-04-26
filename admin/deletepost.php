<?php
	require_once('../database.php');
	$aaa = "Delete from board where board_id = ".$_GET["Id"];
	echo $aaa;
	$sth = $conn->prepare($aaa);
    print_r($sth->execute());
    header('Location: listallpost.php');
    
    
?>