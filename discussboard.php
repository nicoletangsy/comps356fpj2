<?php 
$conn = new mysqli("localhost","root","","cellfish");
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
					div.post {
						background: #000000;
						color: #DDDDDD;
					}
					table.tpost {
						width: 75%;
						align: center;
						border-style: solid;
						border-color: #DDDDDD;
					}
					img.ipost{
						max-height:200px;
						max-width:200px;
						height:auto;
						width:auto;
					}
					/* Popup container - can be anything you want */
.popup {
    position: relative;
    display: inline-block;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

/* The actual popup */
.popup .popuptext {
    visibility: hidden;
    width: 350px;
    background-color: #555;
    color: #fff;
    text-align: center;
    border-radius: 10px;
    padding: 8px 0;
    position: absolute;
    z-index: 1;
    bottom: 125%;
    left: 50%;
    margin-left: -80px;
}

/* Popup arrow */
.popup .popuptext::after {
    content: "";
    position: absolute;
    top: 100%;
    left: 50%;
    margin-left: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: #555 transparent transparent transparent;
}

/* Toggle this class - hide and show the popup */
.popup .show {
    visibility: visible;
    -webkit-animation: fadeIn 1s;
    animation: fadeIn 1s;
}

/* Add animation (fade in the popup) */
@-webkit-keyframes fadeIn {
    from {opacity: 0;} 
    to {opacity: 1;}
}

@keyframes fadeIn {
    from {opacity: 0;}
    to {opacity:1 ;}
}

.button {
    background-color: #999999;
    color: white;
    padding: 8px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}
			   </style>
			   <script>
// When the user clicks on div, open the popup
function myFunction() {
    var popup = document.getElementById("myPopup");
    popup.classList.toggle("show");
}
</script>
            </head>
            <body>
			<?php require ("navbar.php")?>
			<div class="post">
			<br>
			<?php 
				$sql = "select * from board, members where post_user=username and board.id=1";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					While ($row = $result->fetch_assoc()) {
					$i = 0;
						?>
						<table class="tpost"><tr><td colspan="2"><?php echo "Post: ". $row['id'];?></td></tr>
				<tr>
				<td>
					<img src="<?php if (($row['avatar_base64']=='') || ($row['avatar_base64']=='data:image/;base64,')) { echo "user.png";} else
				{ echo $row['avatar_base64'];}?>" height=120 width=120></img><br>
					User: <a href="profile.php?username=<?php echo $row['post_user'];?>"><?php echo $row['post_user'];?></a>
				</td>
					<td>
					<?php 
					if (!(($row['board_avatar_base64']=='') || ($row['board_avatar_base64']=='data:image/;base64,'))) {
						?>
						<img class="ipost" src="<?php echo $row['board_avatar_base64']?>"/><br>
					<?php }
					echo $row['content'];?><br>
					Post At: <?php echo $row['post_date'];?>
					</td>
				</tr>
						</table>
						<br>
			<?php
				}
				}
			?>
				
			<?php 
				$sql2 = "select * from board, members where post_user=username and board.id>1 order by post_date desc";
				$result2 = $conn->query($sql2);
				if ($result2->num_rows > 0) {
					$i = $result2->num_rows+1;
					While ($row2 = $result2->fetch_assoc()) {
						?>
						<table class="tpost"><tr><td colspan="2"><?php echo "Post: ". $i;?></td></tr>
				<tr>
				<td>
					<img src="<?php if (($row2['avatar_base64']=='') || ($row2['avatar_base64']=='data:image/;base64,')) { echo "user.png";} else
				{ echo $row2['avatar_base64'];}?>" height=120 width=120></img><br>
					User: <a href="profile.php?username=<?php echo $row2['post_user'];?>"><?php echo $row2['post_user'];?></a>
				</td>
					<td>
					<?php 
					if (!(($row2['board_avatar_base64']=='') || ($row2['board_avatar_base64']=='data:image/;base64,'))) {
						?>
						<img class="ipost" src="<?php echo $row2['board_avatar_base64']?>"/><br>
					<?php }
					echo $row2['content'];?><br>
					Post At: <?php echo $row2['post_date'];?>
					</td>
					<td>
					<div class="popup">
					<input class="button" type="submit" value="Report" onclick="myFunction()">
					<span class="popuptext" id="myPopup">
					<a href="report.php?id=1">This content contains violent message.</a><br>
					<a href="report.php?id=2">This content contains pornography.</a>
					<a href="report.php?id=3">Other inappropriate content.</a>
					</span>
					</div>
					</td>
				</tr>
				<?php
				$sql3 = "select reply_to, reply_user, reply_date, reply_content from board, replyboard where board.id=reply_to and board.id = " .$i. " order by reply_date";
				//echo "<tr><td>The current i = $i </td></tr>";
				$result3 = $conn->query($sql3);
				if ($result3->num_rows>0) {
					while ($row3 = $result3->fetch_assoc()) {
						?>
						<tr>
						<td></td>
						<td><a href="profile.php?username=<?php echo $row3['reply_user'];?>"><?php echo $row3['reply_user'];?></a>'s reply: <?php echo $row3['reply_content'];?><br>
						Replied At: <?php echo $row3['reply_date']?>
						</td>
						<td>
					<div class="popup">
					<input type="submit" value="Report" onclick="myFunction()">
					<span class="popuptext" id="myPopup"><a href="index.php">A Simple Popup!</a></span>
					</div>
					</tr>
						</tr>
				<?php
					}
				}
				?>
				<tr>
				<td colspan=2>
				<form action="replypost.php?postid=<?php echo $i?>" method="POST" enctype="multipart/form-data">
				<input name="reply" placeholder="Leave your reply here..."/>
				<input type="submit" value = "Reply">
				</form>
				</td>
				</tr>
						</table>
						<br>
			<?php
				$i = $i-1;
				}
				}
			?>
			<br>
			</div>
			<?php if(isset($_SESSION['username'])) {
			?>
			<div class="post">
			<table class="tpost">
			<form action="newpost.php" method="POST" enctype="multipart/form-data">
			<tr><th><label>Leave you experience here!</label></th></tr>
			<tr>
			<td>
			<textarea name="content" placeholder="Enter text here..."></textarea><br>
			<label for="image">Upload Picture: </label>
			<input name="image" type="file">
			<input type="submit" value = "Post">
			</td>
			</tr>
			</form>
			</table>
			</div>
			<?php }
  ?>
			<?php require ("footer.php")?>