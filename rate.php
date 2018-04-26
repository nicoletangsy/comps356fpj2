<?php
require_once("database2.php");
session_start();

if (isset($_SESSION['username'])){

if(isset($_GET['post_id'], $_GET['rating'])){
    $user = (string)$_SESSION['username'];
    $post_id = (int)$_GET['post_id'];
    $rating = (int)$_GET['rating'];

    if(in_array($rating,[1, 2, 3, 4, 5])){

        $exists = $conn->query("SELECT Id FROM Post WHERE Id = {$post_id}")->num_rows ? true : false;
        $existsusername = $conn->query("SELECT username,post_id FROM rating WHERE username = '{$user}' AND post_id = {$post_id}")->num_rows ? true : false;

        if($existsusername){
            if($exists){
            $conn->query("UPDATE rating SET rating = {$rating} WHERE username = '{$user}' AND post_id = {$post_id}");
			$conn->query("update post set avg_rate = (select AVG(rating) from rating where post_id={$post_id}) where Id={$post_id}");
            header('Location: detail.php?id=' .$post_id);
            }
        }else{
            if($exists){
                $conn->query("INSERT INTO rating (post_id,rating,username) VALUES ({$post_id},{$rating},'{$user}')");
                header('Location: detail.php?id=' .$post_id);
        }
    }
}
}
}else{
    die("you need to <a href =\"login.php\">login</a> first!<br><br>Return to the <a href =\"index.php\">Homepage.</a>");
}

?>