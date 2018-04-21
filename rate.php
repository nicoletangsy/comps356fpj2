<?php
$conn = new mysqli('localhost','root','root','cellfish');

if(isset($_GET['post_id'], $_GET['rating'])){

    $post_id = (int)$_GET['post_id'];
    $rating = (int)$_GET['rating'];

    if(in_array($rating,[1, 2, 3, 4, 5])){

        $exists = $conn->query("SELECT Id FROM Post WHERE Id = {$post_id}")->num_rows ? true : false;

        if($exists){
            $conn->query("INSERT INTO rating (post_id,rating) VALUES ({$post_id},{$rating})");
        }
    }

    header('Location: detailtest.php?id=' .$post_id);
}
?>