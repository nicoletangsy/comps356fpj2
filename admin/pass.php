<?php
    	require_once('../database.php');
	$aaa = "Update Staff set ";

	foreach($_POST as $key => $value){
	    $aaa .= $key."='".$value."',";
	}
	$aaa = substr($aaa, 0, -1);
	$aaa .= "where Id = 'admin'";
	$sth = $conn->prepare($aaa);
    $sth->execute();
	header('Location: Account.php');
?>
