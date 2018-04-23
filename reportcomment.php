<?php
$conn = new mysqli('localhost','root','','cellfish');
session_start();
$d=strtotime("+8 Hours");
$date=date('Y-m-d H:i:s', $d);

if (isset($_SESSION['username'])){

if(isset($_GET['reid'], $_GET['reply_id'])){
    $user = (string)$_SESSION['username'];
    $reportid = (int)$_GET['reid'];
    $reportcomment_id = (int)$_GET['reply_id'];

        $exists = $conn->query("SELECT reply_id FROM replyboard WHERE reply_id = {$reportcomment_id}")->num_rows ? true : false;
        $existsusername = $conn->query("SELECT report_user FROM reportcomment WHERE report_user = '{$user}' AND reportcomment_id = {$reportcomment_id}")->num_rows ? true : false;

        if($existsusername){
            if($exists){
            $conn->query("UPDATE reportcomment SET reason = {$reportid} ,report_date = '{$date}' WHERE report_user = '{$user}' AND reportcomment_id = {$reportcomment_id}");
            header('Location: discussboard.php');
            }
        }else{
            if($exists){
                $conn->query("INSERT INTO reportcomment (report_user,report_date,reportcomment_id,reason) VALUES ('{$user}','{$date}',{$reportcomment_id},'{$reportid}')");
                header('Location: discussboard.php');
        }
    }
}
}
else{
    die("you need to <a href =\"login.php\">login</a> first!<br><br>Return to the <a href =\"index.php\">Homepage.</a>");
}

?>