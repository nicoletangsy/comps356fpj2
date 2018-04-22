<?php
	require_once('../database.php');
	$aaa = "Delete from Comment where Id = ".$_GET["Id"];
	echo $aaa;
	$sth = $conn->prepare($aaa);
    print_r($sth->execute());
    header('Location: editpost.php?Id='.$_GET["Id2"]);
    
    
?>