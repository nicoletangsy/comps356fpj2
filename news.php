<?php
	require_once('database.php');
	session_start();
	$sth = $conn->prepare("SELECT Id,Title,Introduction,Image,type, avg_rate from post where Image <> 'data:image/;base64,' ORDER BY avg_rate desc");
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
	<title>Cellfish &mdash; 100% Free Fully Responsive HTML5 Template by FREEHTML5.co</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

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
	<link rel="shortcut icon" href="favicon.ico">

	<link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,700,400italic,700italic|Merriweather:300,400italic,300italic,400,700italic' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="asset/css/amazeui.min.css">
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

	</head>
	<body>
	
<?php require("navbar.php");?>

        <div id="fh5co-featured" data-section="features">
			<div class="container">
				<div class="row text-center fh5co-heading row-padded">
					<div class="col-md-8 col-md-offset-2">
						<p><a href="allnews.php">All News</a></p>
						<h2 class="heading to-animate">Hot News of Cellfish</h2>
						
					</div>
				</div>
				<div class="row">
					<div class="fh5co-grid">
						<div class="fh5co-v-half to-animate-2">
							<div class="fh5co-v-col-2 fh5co-bg-img" style="background-image: url(<?=$result[0]['Image']?>)"></div>
							<div class="fh5co-v-col-2 fh5co-text fh5co-special-1 arrow-left">
								<h2><?=$result[0]['Title'] ?></h2>
								<p><?=$result[0]['Introduction'] ?></p>
								<a href="detail.php?id=<?=$result[0]['Id']?>"><input type="submit" class="am-btn am-btn-secondary" value="More Details"></a>
							</div>
						</div>
						<div class="fh5co-v-half">
							<div class="fh5co-h-row-2 to-animate-2">
								<div class="fh5co-v-col-2 fh5co-bg-img" style="background-image: url(<?=$result[1]['Image']?>)"></div>
								<div class="fh5co-v-col-2 fh5co-text arrow-left">
									<h2><?=$result[1]['Title'] ?></h2>
									<p><?=$result[1]['Introduction'] ?></p>
									<a href="detail.php?id=<?=$result[1]['Id']?>"><input type="submit" class="am-btn am-btn-secondary" value="More Details"></a>
								</div>
							</div>
							<div class="fh5co-h-row-2 fh5co-reversed to-animate-2">
								<div class="fh5co-v-col-2 fh5co-bg-img" style="background-image: url(<?=$result[2]['Image']?>)"></div>
								<div class="fh5co-v-col-2 fh5co-text arrow-right">
									<h2><?=$result[2]['Title'] ?></h2>
									<p><?=$result[2]['Introduction'] ?></p>
									<a href="detail.php?id=<?=$result[2]['Id']?>"><input type="submit" class="am-btn am-btn-secondary" value="More Details"></a>
								</div>
							</div>
						</div>

						<div class="fh5co-v-half">

							<div class="fh5co-h-row-2 to-animate-2">
								<div class="fh5co-v-col-2 fh5co-bg-img" style="background-image: url(<?=$result[4]['Image']?>)"></div>
								<div class="fh5co-v-col-2 fh5co-text arrow-left">
									<h2>Salad with Crispy Chicken</h2>
									<h2><?=$result[4]['Title'] ?></h2>
									<p><?=$result[4]['Introduction'] ?></p>
									<a href="detail.php?id=<?=$result[4]['Id']?>"><input type="submit" class="am-btn am-btn-secondary" value="More Details"></a>
								</div>
							</div>
						</div>
						<div class="fh5co-v-half to-animate-2">
							<div class="fh5co-v-col-2 fh5co-bg-img" style="background-image: url(<?=$result[5]['Image']?>)"></div>
							<div class="fh5co-v-col-2 fh5co-text fh5co-special-1 arrow-left">
								<h2><?=$result[5]['Title'] ?></h2>
								<p><?=$result[5]['Introduction'] ?></p>
								<a href="detail.php?id=<?=$result[5]['Id']?>"><input type="submit" class="am-btn am-btn-secondary" value="More Details"></a>
							</div>
						</div>

					</div>
				</div>

			</div>
		</div>

<?php require("footer.php");?>