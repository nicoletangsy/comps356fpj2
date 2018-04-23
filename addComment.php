<?php
    require_once('database.php');
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
		$myip = $_SERVER['HTTP_CLIENT_IP'];
	}else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
		$myip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	}else{
		$myip = $_SERVER['REMOTE_ADDR'];
	}
    $comment = $_POST["comment"];
    $id = $_POST["id"];
    $stmt = $conn->prepare("INSERT INTO Comment (ip, Content,Post_id,DateTime) VALUES (:ip, :content,:post_id,now())");
    $stmt->bindParam(':ip', $myip);
    $stmt->bindParam(':content', $comment);
    $stmt->bindParam(':post_id', $id);
    $stmt->execute();
    header("Location: detail.php?id=$id");
?>