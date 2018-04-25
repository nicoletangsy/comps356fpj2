<?php
    $conn = new mysqli('localhost','root','','cellfish');
    session_start();
    
    

    if(isset($_POST['addComment'])){
        $comment = $_POST['comment'];
        $id = $_POST['id'];
        

    if (isset($_SESSION['username'])){
            $user = (string)$_SESSION['username'];
            $conn->query("INSERT INTO Comment (ip, Content,Post_id,DateTime) VALUES ('{$user}', '{$comment}',{$id},now())");
            header("Location: detail.php?id=$id");
            }
        else{
                $conn->query("INSERT INTO Comment (ip, Content,Post_id,DateTime) VALUES ('guest', '{$comment}',{$id},now())");
                header("Location: detail.php?id=$id");
        }
    }
    header("Location: detail.php?id=$id");

?>