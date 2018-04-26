<?php
<<<<<<< HEAD
require_once("database2.php");
session_start();
$d=strtotime("+8 Hours");
$date=date('Y-m-d H:i:s', $d);

if (isset($_SESSION['username'])){

if(isset($_GET['reid'], $_GET['board_id'])){
    $user = (string)$_SESSION['username'];
    $reportid = (int)$_GET['reid'];
    $reportpost_id = (int)$_GET['board_id'];

        $exists = $conn->query("SELECT board_id FROM board WHERE board_id = {$reportpost_id}")->num_rows ? true : false;
        $existsusername = $conn->query("SELECT report_user FROM reportpost WHERE report_user = '{$user}' AND reportpost_id = {$reportpost_id}")->num_rows ? true : false;

        if($existsusername){
            if($exists){
            $conn->query("UPDATE reportpost SET reason = {$reportid} ,report_date = '{$date}' WHERE report_user = '{$user}' AND reportpost_id = {$reportpost_id}");
            header('Location: discussboard.php');
            }
        }else{
            if($exists){
                $conn->query("INSERT INTO reportpost (report_user,report_date,reportpost_id,reason) VALUES ('{$user}','{$date}',{$reportpost_id},'{$reportid}')");
                header('Location: discussboard.php');
        }
    }
}
}
else{
    die("you need to <a href =\"login.php\">login</a> first!<br><br>Return to the <a href =\"index.php\">Homepage.</a>");
}

?>