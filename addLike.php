<?php
    require_once('database.php');
    $id = $_POST["id"];
    $type = $_POST["type"];
    $comment = $_POST["comment"];
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
		$myip = $_SERVER['HTTP_CLIENT_IP'];
	}else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
		$myip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	}else{
		$myip = $_SERVER['REMOTE_ADDR'];
	}
	$stmt = $conn->prepare("SELECT * FROM Liked WHERE LikeIP = '$myip' and LikeId = '$id' and Type = '$type'");
	$stmt->execute();
	if ($stmt->rowCount() > 0) {
	    $stmt = $conn->prepare("UPDATE $type SET likeNo=likeNo-1 where Id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        
	    $stmt = $conn->prepare("DELETE FROM Liked WHERE LikeIP = '$myip' and LikeId = '$id' and Type = '$type';");
        $stmt->execute();
        
	    $sth = $conn->prepare("SELECT likeNo FROM $type where Id=$id");
        $sth->execute();
        
        $likes = $sth->fetchAll();
	    exit(json_encode(array('likeNo' => $likes[0]["likeNo"],'id' => $id,'type' => $type)));
    }
    $stmt = $conn->prepare("INSERT INTO Liked (LikeIP, LikeId,Type) VALUES (:ip,:id,:type)");
    $stmt->bindParam(':ip', $myip);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':type', $type);
    $stmt->execute();
    $stmt = $conn->prepare("UPDATE $type SET likeNo=likeNo+1 where Id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $sth = $conn->prepare("SELECT likeNo FROM $type where Id=$id");
    $sth->execute();
    $likes = $sth->fetchAll();
    
    echo json_encode(array('likeNo' => $likes[0]["likeNo"],'id' => $id,'type' => $type));
?>