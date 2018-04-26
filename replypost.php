<?php
    require_once("database2.php");
    session_start();
    
    

    if(isset($_POST['addreply'])){
        $comment = $_POST['reply'];
				$id = $_POST['id'];
				$commentid = $_GET['Id'];
        

    if (isset($_SESSION['username'])){
            $user = (string)$_SESSION['username'];
            $conn->query("INSERT INTO SubComment (ip, Content,comment_Id,DateTime) VALUES ('{$user}', '{$comment}',{$commentid},now())");
            header("Location: detail.php?id=$id");
            }
        else{
                $conn->query("INSERT INTO SubComment (ip, Content,Post_id,DateTime) VALUES ('guest', '{$comment}',{$commentid},now())");
                header("Location: detail.php?id=$id");
        }
    }
    header("Location: detail.php?id=$id");

?>