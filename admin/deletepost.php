<?php
	require_once('../database.php');
	$aaa = "Delete from board where id = ".$_GET["Id"];
	echo $aaa;
	$sth = $conn->prepare($aaa);
    print_r($sth->execute());
    header('Location: listallnews.php');
    
    
?>