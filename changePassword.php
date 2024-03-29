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
  <title>Cellfish &mdash; Change Password</title>
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
<?php require ("navbar.php");?>



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
      <div class="card-header">Change Password</div>
      <div class="card-body">
        <form action="#" method="POST" enctype="multipart/form-data">
		<div class="form-group">
            <label for="exampleCurrentPassword">Current Password</label>
            <input class="form-control" id="exampleCurrentPassword" name="currentPassword" type="password">
        </div>
		<div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputPassword1">New Password</label>
                <input class="form-control" id="exampleInputPassword1" name="password" type="password" placeholder="8-16 characters contains only a-z, A-Z, 0-9">
              </div>
              <div class="col-md-6">
                <label for="exampleConfirmPassword">Confirm password</label>
                <input class="form-control" id="exampleConfirmPassword" name="cpassword" type="password" placeholder="Confirm password">
              </div>
            </div>
          </div>
          <input class="btn btn-primary btn-block" type="submit" value = "Comfirm Change Password">
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
  if (isset($_POST['currentPassword'])&&isset($_POST['password'])&&isset($_POST['cpassword'])) {
	  try {
		$current = $_POST['currentPassword'];
		$password = $_POST['password'];
		$cpassword = $_POST['cpassword'];
		if(strlen($password) < 8 || strlen($password) > 16) {
			echo "Your password should be between 8 and 16 characters!";
		}
		if ($current==$result['password']) {
			if ($password == $cpassword) {
				$sql = "update members set password = '".$password."' where username ='".$username."'";
				$conn->exec($sql);
				echo "Password changed successfully!";
			} else{
				echo("The new Passwords do not match, Please retry!   <br><br>Return to the <a href=\"changePassword.php\">Previous</a> Page.");
			}
		} else {
			echo("Your current password is not correct, Please retry!   <br><br>Return to the <a href=\"changePassword.php\">Previous</a> Page.");
		}
	  } catch(PDOException $e)
    {
      echo $sql . "<br>" . $e->getMessage();
    }
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
