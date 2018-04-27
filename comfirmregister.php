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
               <title>Cellfish &mdash; Contact Us</title>
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
            </head>
            <body>
               <?php require ("navbar.php");?>
               <div style="background: #130d08 url(images/wood_1.png) repeat;height:500px">
			   <br><br>

<?php
  require_once ("database.php");
  //$conn = connectDB();
  
  if (isset($_POST['username'])&&isset($_POST['password'])&&isset($_POST['cpassword'])&&isset($_POST['fname'])&&isset($_POST['lname'])&&isset($_POST['email'])&&isset($_POST['question'])&&isset($_POST['answer'])) 
  { 
	$username = $_POST['username'];
	$password = $_POST['password'];
	$cpassword = $_POST['cpassword'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$question = $_POST['question'];
	$answer = $_POST['answer'];

	//validation
	if(strlen($username) < 4 || strlen($username) > 16) {
		die("Your username should be between 4 and 16 characters! <br><br>Return to <a href=\"register.php\">Register</a>.");
	}
	if(strlen($password) < 8 || strlen($password) > 16) {
		die("Your password should be between 8 and 16 characters! <br><br>Return to <a href=\"register.php\">Register</a>.");
	}
	if ($password != $cpassword) {
		die("The Passwords do not match, Please retry!   <br><br>Return to <a href=\"register.php\">Register</a>.");
	}
	try {
		$sql = "select username from members where username = '".$username."'";
		//echo $sql;
		$stat = $conn->prepare($sql);
		$stat->execute();
		if ($stat->setFetchMode(PDO::FETCH_ASSOC) === TRUE) {
			$result = $stat->fetch();
			//echo $result['username'];
			if($result['username'] == $username){
				die("This username \"".$username."\" had been Registed. Please try another username. <br><br>Return to <a href=\"register.php\">Register</a>.");
			}
		} 

		//insert new member into members
		$sql = "insert into members (username, password, firstname, lastname, email, question, answer) values ('".$username."', '".$password."', '".$fname."', '".$lname."', '".$email."', '".$question."', '".$answer."')";
		$conn->exec($sql);
		echo "Your registration is successful! <br><br>Please <a href='login.php'>Login</a>.";
	}
	catch(PDOException $e)
    {
      echo $sql . "<br>" . $e->getMessage();
    }
	

	$conn = null;
  } else {
	  ?>
	  <p style="margin: auto;width: 50%;padding: 10px;"><font color="FFFFFF">
	  <?php
	echo ("You must enter all fields!  <br><br>Return to <a href=\"register.php\">Register</a>.");
  }
?>
</p></div>
<?php require ("footer.php");?>
