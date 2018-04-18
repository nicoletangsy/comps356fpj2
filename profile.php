<?php
require_once("database.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Cellfish &mdash; Profile</title>
  <!-- Bootstrap core CSS-->
  <link href="admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="admin/css/sb-admin.css" rel="stylesheet">
  
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
	<div id="fh5co-container">
		<div class="js-sticky">
			<div class="fh5co-main-nav">
				<div class="container-fluid">
					<div class="fh5co-menu-1">
						<a href="index.php" data-nav-section="home">Home</a>
						<a href="about.php" data-nav-section="about">About</a>
						<a href="news.php" data-nav-section="menu">News</a>
					</div>
					<div class="fh5co-logo">
						<a href="index.php">Cellfish</a>
					</div>
					<div class="fh5co-menu-2">
						<a href="discussboard.php" data-nav-section="menu">Discuss Board</a>
						<a href="games.php" data-nav-section="menu">Game</a>
						<a href="<?php if (isset($_SESSION['username'])) {
							echo "logout.php";
						} else {
							echo "login.html";
						}?>" data-nav-section="menu"><?php if (isset($_SESSION['username'])) {
							echo "Logout";
						} else {
							echo "Login";
						}?></a>
						
						<a href="<?php if (isset($_SESSION['username'])) {
							echo "profile.php";
						} else {
							echo "register.html";
						}?>" data-nav-section="menu"><?php if (isset($_SESSION['username'])) {
							echo $_SESSION['username'];
						} else {
							echo "Register";
						}?></a>
					</div>
				</div>
				
			</div>
		</div>



<body class="bg-dark">
  <div class="container">
  <?php
  if (isset($_SESSION['username'])) {
	  try{
		$username = $_SESSION['username'];
		$sql = "select * from members where username = '".$username."'";
		$stat = $conn->prepare($sql);
		$stat->execute();
		if ($stat->setFetchMode(PDO::FETCH_ASSOC) === TRUE){
			$result = $stat->fetch();
			echo "<br><br><br><br>";
			?>
			<div class="card card-register mx-auto mt-5">
      <div class="card-header"><?php echo "User: ".$result['username']; ?></div>
      <div class="card-body">
        <form action="editProfile.php">
		<div class="text-center">
            <img src="<?php if (($result['avatar_base64']=='') || ($result['avatar_base64']=='data:image/;base64,')) { echo "user.png";} else
				{ echo $result['avatar_base64'];}?>" height=240 weight=24></img><br>

        </div>
		<div class="form-group">
            <label>First name: </label>
			<label><?php echo $result['firstName']; ?></label>
        </div>
		<div class="form-group">
            <label>Last name: </label>
			<label><?php echo $result['lastName']; ?></label>
        </div>
		<div class="form-group">
            <label>Gender: </label>
			<label><?php if ($result['gender']=='M') {echo "Male";} else
					if ($result['gender']=='F') {echo "Female";} else 
					if ($result['gender']=='O') {echo "Other";}else 
						{echo "Not Set";}
			?></label>
        </div>
		<div class="form-group">
            <label>Birthday: </label>
			<label><?php if (!($result['birthday']=='')) {echo $result['birthday'];} else
				{echo "Not Set";}
			?></label>
        </div>
		<div class="form-group">
            <label>Email Address: </label>
			<label><?php if (!($result['email']=='')) {echo $result['email'];} else
				{echo "Not Set";}
			?></label>
        </div>
		<div class="form-group">
            <label>Self-Introduction: </label>
			<label><?php if (!($result['description']=='')) {echo $result['description'];} else
				{echo "This user does not have any introduction.";}
			?></label>
        </div>
          <input class="btn btn-primary btn-block" type="submit" value = "Edit Profile">
        </form>
      </div>
		<?php }
	  } catch(PDOException $e)
		{
			?><p style="margin: auto;width: 50%;padding: 10px;"><font color="FFFFFF">
			<?php echo $sql . "<br>" . $e->getMessage();?></font></p><?php
		}
	
  ?>
    <?php }  else {?>
	<br><br><br><p style="margin: auto;width: 50%;padding: 10px;"><font color="FFFFFF">You must <a href="login.html">Login</a> first!</font></p><br><br><br><br><br><br>
	<?php
  }

?>
    
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="admin/vendor/jquery/jquery.min.js"></script>
  <script src="admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="admin/vendor/jquery-easing/jquery.easing.min.js"></script>
  <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/zh_HK/sdk.js#xfbml=1&version=v2.11&appId=116344648445954';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
		

	<div id="fh5co-footer">
		<div class="container">
			<div class="row row-padded">
				<div class="col-md-12 text-center">
					<p class="to-animate">&copy; 2017 Software engineering . <br> Designed by OU student
					</p>
					<p class="text-center to-animate"><a href="#" class="js-gotop">Go To Top</a></p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 text-center">
					<ul class="fh5co-social">
						<li class="to-animate-2" data-href="https://se1-edmondwoo.c9users.io/aaaaa/home.html"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fse1-edmondwoo.c9users.io%2Faaaaa%2Fhome.html&amp;src=sdkpreparse"><i class="icon-facebook"></i></a></li>
						<li class="to-animate-2"><a href="#"><i class="icon-twitter"></i></a></li>
						<li class="to-animate-2"><a href="#"><i class="icon-instagram"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>


	
	
	
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Bootstrap DateTimePicker -->
	<script src="js/moment.js"></script>
	<script src="js/bootstrap-datetimepicker.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Stellar Parallax -->
	<script src="js/jquery.stellar.min.js"></script>

	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>
	<script>
		$(function () {
	       $('#date').datetimepicker();
	   });
	</script>
	<!-- Main JS -->
	<script src="js/main.js"></script>
</body>

</html>
