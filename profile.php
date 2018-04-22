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
	<?php require("navbar.php");?>


<body class="bg-dark">
  <div class="container">
  <?php
  if (isset($_SESSION['username'])) {
	  try{
		if (isset($_GET['username'])) {
			$username = $_GET['username'];
		} else {
			$username = $_SESSION['username'];
		}
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
				{ echo $result['avatar_base64'];}?>" height=240 width=240></img><br>

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
		<?php if (isset($_SESSION['username']) && $_SESSION['username']== $result['username']) {?>
		<input class="btn btn-primary btn-block" type="submit" value = "Edit Profile"><?php }?>
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
	<br><br><br><p style="margin: auto;width: 50%;padding: 10px;"><font color="FFFFFF">You must <a href="login.php">Login</a> first!</font></p><br><br><br><br><br><br>
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
<?php require ("footer.php");?>

