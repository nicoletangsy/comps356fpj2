<?php
	require_once('database.php');
	session_start();
	$sth = $conn->prepare("SELECT Id, type, Title FROM Post order by DateTime desc");
	$sth->execute();
    $result = $sth->fetchAll();
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Cellfish &mdash; All News</title>
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
	<link href="admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="admin/css/sb-admin.css" rel="stylesheet">
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
	#result p {
    color: white;
    font-size: 20px;
	}
	#result h3 {
		color:orange;
		font-size: 30px;
	}
	#result h2 {
		color:White;
		font-size: 30px;
	}
	#useruser{
		color:White;
		font-size: 20px;
	}
	#datedate{
		color:White;
		font-size: 20px;
	}
	#type{
		color:White;
		font-size: 20px;
	}

</style>
	</head>
	<?php require("navbar.php");?>
<div id="fh5co-featured" data-section="features">
			<div class="container">
				<div class="row text-center fh5co-heading row-padded">
					<div class="col-md-8 col-md-offset-2">
						<p><a href="news.php">Hot News</a></p>
						<h2 class="heading to-animate">All News of Cellfish</h2>
						</div>
						</div>
  <div id= "result">
	<?php 
  							foreach ($result as $aa){
  								echo "<div id='result'><font color='white'>".$aa['type'].":</font> <a href='detail.php?id=".$aa["Id"]."'>".$aa["Title"]."</a></div>";
							  }
						    ?>
		</div>
  </div>
  </div>
  <div id="fh5co-menus" >
			<div class="container">
				<div class="row text-center fh5co-heading row-padded">
					<div class="col-md-8 col-md-offset-2">
						<h2 class="heading to-animate">News</h2>
					</div>
				</div>
				<div class="row row-padded">
					<div class="col-md-6">
						<div class="fh5co-food-menu to-animate-2">
							<h2 class="fh5co-drinks">Accident</h2>
							<ul>
								<?php
									$postC = $conn->prepare("SELECT Id,Title,Introduction,Image,type, avg_rate from post where type='Accident' ORDER BY avg_rate desc");
	    							$postC->execute();
	    							$posts = $postC->fetchAll();
									for($i=0;$i<count($posts);$i++){
										
									
								?>
								<li>
									<div class="fh5co-food-desc">
										<figure>
										</figure>
										<div>
											<h3><a href="detail.php?id=<?=$posts[$i]["Id"]?>"><?=$posts[$i]["Title"]?></a></h3>
										</div>
									</div>
								</li>
								<?php
									}
								?>
							</ul>
						</div>
					</div>
					<div class="col-md-6">
						<div class="fh5co-food-menu to-animate-2">
							<h2 class="fh5co-dishes">Health</h2>
							<ul>
								<?php
									$postC = $conn->prepare("SELECT Id,Title,Introduction,Image,type, avg_rate from post where type='Health' ORDER BY avg_rate desc");
	    							$postC->execute();
	    							$posts = $postC->fetchAll();
									for($i=0;$i<count($posts);$i++){
										
									
								?>
								<li>
									<div class="fh5co-food-desc">
										<figure>
										</figure>
										<div>
											<h3><a href="detail.php?id=<?=$posts[$i]["Id"]?>"><?=$posts[$i]["Title"]?></a></h3>
										</div>
									</div>
								</li>
								<?php
									}
								?>
							</ul>
						</div>
					</div>
					<div class="col-md-6">
						<div class="fh5co-food-menu to-animate-2">
							<h2 class="fh5co-drinks">Mobile Addiction</h2>
							<ul>
								<?php
									$postC = $conn->prepare("SELECT Id,Title,Introduction,Image,type, avg_rate from post where type='Mobile Addiction' ORDER BY avg_rate desc");
	    							$postC->execute();
	    							$posts = $postC->fetchAll();
									for($i=0;$i<count($posts);$i++){
										
									
								?>
								<li>
									<div class="fh5co-food-desc">
										<figure>
										</figure>
										<div>
											<h3><a href="detail.php?id=<?=$posts[$i]["Id"]?>"><?=$posts[$i]["Title"]?></a></h3>
										</div>
									</div>
								</li>
								<?php
									}
								?>
							</ul>
						</div>
					</div>
					<div class="col-md-6">
						<div class="fh5co-food-menu to-animate-2">
							<h2 class="fh5co-dishes">Patients</h2>
							<ul>
								<?php
									$postC = $conn->prepare("SELECT Id,Title,Introduction,Image,type, avg_rate from post where type='Patients' ORDER BY avg_rate desc");
	    							$postC->execute();
	    							$posts = $postC->fetchAll();
									for($i=0;$i<count($posts);$i++){
										
									
								?>
								<li>
									<div class="fh5co-food-desc">
										<figure>
										</figure>
										<div>
											<h3><a href="detail.php?id=<?=$posts[$i]["Id"]?>"><?=$posts[$i]["Title"]?></a></h3>
										</div>
									</div>
								</li>
								<?php
									}
								?>
							</ul>
						</div>
					</div>
				</div>
			</div>

		
	</div>
<?php require("footer.php");?>
</html>