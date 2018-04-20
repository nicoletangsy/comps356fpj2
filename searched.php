<?php
 $connection = mysqli_connect("localhost","root","root","cellfish");
 ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Cellfish &mdash; Login</title>
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
</style>
	</head>
	<body class="bg-dark"><body>
	<?php require("navbar.php");?>
	<body class="bg-white">
  <div class="container">
  <div id= "result">
  <br><br>
	<?php
		if(isset($_POST['submit-search'])){
			$search = mysqli_real_escape_string($connection, $_POST['title']);
			$sql = "SELECT * FROM Post WHERE Title LIKE '%$search%' OR Introduction LIKE '%$search%' OR Content LIKE '%$search%'";
			$result = mysqli_query($connection, $sql);
			$queryResult = mysqli_num_rows($result);

			echo "<h2>There are ".$queryResult." results!</h2>";
			if($queryResult > 0){
				while($row = mysqli_fetch_assoc($result)){
					echo "<div id='result'>
					<a href ='../comps356fpj2/detail.php?id=".$row['Id']."'> <h3>".$row['Title']."</h3></a>
					<p>".$row['Introduction']."</p>
					</div>";
				}
			} else {
				echo "<br> There are no results matching your search!";
			}

		}?>
		</div>
  </div>
  <br><br>
<?php require("footer.php");?>
</html>