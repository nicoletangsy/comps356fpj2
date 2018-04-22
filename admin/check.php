<?php
	require_once('../database.php');
	$sth = $conn->prepare("SELECT * FROM Staff where Id ='".$_GET["id"]."' and Password ='".$_GET["password"]."'");
    $sth->execute();
    $result = $sth->fetchAll();
   if(!empty($result)){
   	   session_start();
	   $_SESSION['admin'] = true;
       header('Location: addpost.php');
   }else{
       echo "<script type='text/javascript'>alert('Sorry!	Please input correct Id and Password!');window.history.back();</script>";
       
   }
    
?>
    
