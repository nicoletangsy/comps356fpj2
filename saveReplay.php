<?php
    require_once('database.php');
    $id = $_POST["id"];
    $reply = $_POST["reply"];
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
		$myip = $_SERVER['HTTP_CLIENT_IP'];
	}else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
		$myip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	}else{
		$myip = $_SERVER['REMOTE_ADDR'];
	}
	$stmt = $conn->prepare("insert into SubComment(IP,Content,DateTime,comment_Id) values('$myip','$reply',now(),$id)");
	$stmt->execute();
?>