<?php
require_once("database.php");
session_start();
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      
<html class="no-js lt-ie9 lt-ie8 lt-ie7">
   <![endif]-->
   <!--[if IE 7]>         
   <html class="no-js lt-ie9 lt-ie8">
      <![endif]-->
      <!--[if IE 8]>         
      <html class="no-js lt-ie9">
         <![endif]-->
         <!--[if gt IE 8]><!--> 
         <html class="no-js">
            <!--<![endif]-->
            <head>
               <meta charset="utf-8">
               <meta http-equiv="X-UA-Compatible" content="IE=edge">
               <title>Cellfish &mdash; Discuss Board</title>
               <meta name="viewport" content="width=device-width, initial-scale=1">
               <meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
               <meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
               <meta name="author" content="FREEHTML5.CO" />
               <!-- Facebook and Twitter integration -->
               <meta property="og:title" content=""/>
               <meta property="og:image" content=""/>
               <meta property="og:url" content=""/>
               <meta property="og:site_name" content=""/>
               <meta property="og:description" content=""/>
               <meta name="twitter:title" content="" />
               <meta name="twitter:image" content="" />
               <meta name="twitter:url" content="" />
               <meta name="twitter:card" content="" />
               <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
               <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
               <link rel="stylesheet" href="css/styleForm.css">
               <link rel="shortcut icon" href="favicon.ico">
               <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,700,400italic,700italic|Merriweather:300,400italic,300italic,400,700italic' rel='stylesheet' type='text/css'>
               <!-- Animate.css -->
               <link rel="stylesheet" href="css/animate.css">
               <!-- Icomoon Icon Fonts-->
               <link rel="stylesheet" href="css/icomoon.css">
               <!-- Simple Line Icons -->
               <link rel="stylesheet" href="css/simple-line-icons.css">
               <!-- Datetimepicker -->
               <link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css">
               <!-- Flexslider -->
               <link rel="stylesheet" href="css/flexslider.css">
               <!-- Bootstrap  -->
               <link rel="stylesheet" href="css/bootstrap.css">
               <link rel="stylesheet" href="css/style.css">
               <link rel="stylesheet" href="css/index.css">
               <script src="js/index.js"></script>
               <!-- Modernizr JS -->
               <script src="js/modernizr-2.6.2.min.js"></script>
               <!-- FOR IE9 below -->
               <!--[if lt IE 9]>
               <script src="js/respond.min.js"></script>
               <![endif]-->
			   <style>
			   h2 {
				color: white;
				}
			   </style>
            </head>
            <body>
               <?php require ("navbar.php");?>
               <div style="background: #130d08 url(images/wood_1.png) repeat;height:500px">
			   <br><br>
<div style="margin: auto;width: 50%;padding: 10px;"><font color="FFFFFF"><?php

  if (isset($_SESSION['username']) && isset($_FILES['image'])) {
	  try{
		if (isset($_FILES['image'])) {
			$errors=array();
			$allowed_ext= array('jpg','jpeg','png','gif');
			$file_name =$_FILES['image']['name'];
			$file_ext = strtolower( end(explode('.',$file_name)));
			$file_size=$_FILES['image']['size'];
			$file_tmp= $_FILES['image']['tmp_name'];
			$type = pathinfo($file_tmp, PATHINFO_EXTENSION);
			$data = file_get_contents($file_tmp);
			$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
			} else {
				$base64 = "";
			}
		$username = $_SESSION['username'];
		$content = nl2br($_POST['content']);
		$d=strtotime("+8 Hours");
		$date=date('Y-m-d H:i:s', $d);
		
		$sql = "insert into board (post_user, post_date, content, board_avatar_base64) values ('" .$username. "', '" .$date. "', '" .$content. "', '" .$base64. "')";
		$conn->exec($sql);
		} catch(PDOException $e)
		{
			echo $sql . "<br>" . $e->getMessage();
		}
	header("Location: discussboard.php");
  }  else {
	echo ("You must login first!  <br><br>Return to <a href=\"login.php\">Login</a>.");
  }
?>
</font></div></div>
<?php require ("footer.php");?>