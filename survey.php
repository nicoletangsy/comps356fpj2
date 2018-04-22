<?php
require_once 'database.php';
session_start();
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Cellfish</title>
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
	<?php require("navbar.php");?>
<?php
$question_empty="";

if($_SERVER["REQUEST_METHOD"] == "POST"){
  if (!isset($_POST['question1']))
    $question_empty="You have at least one question that hasn't been finished. Please try again";
  else if(!isset($_POST['question2']))
    $question_empty="You have at least one question that hasn't been finished. Please try again";
  else if(!isset($_POST['question3']))
    $question_empty="You have at least one question that hasn't been finished. Please try again";
  else if(!isset($_POST['question4']))
    $question_empty="You have at least one question that hasn't been finished. Please try again";
  else if(!isset($_POST['question5']))
    $question_empty="You have at least one question that hasn't been finished. Please try again";
  else if(!isset($_POST['question6']))
    $question_empty="You have at least one question that hasn't been finished. Please try again";
  else if(!isset($_POST['question7']))
    $question_empty="You have at least one question that hasn't been finished. Please try again";
  else if(!isset($_POST['question8']))
    $question_empty="You have at least one question that hasn't been finished. Please try again";
  else if(!isset($_POST['question9']))
    $question_empty="You have at least one question that hasn't been finished. Please try again";
  else if(!isset($_POST['question10']))
    $question_empty="You have at least one question that hasn't been finished. Please try again";
  else if ($_POST['question1']+$_POST['question2']+$_POST['question3']+$_POST['question4']+$_POST['question5']+$_POST['question6']+$_POST['question7']+$_POST['question8']+$_POST['question9']+$_POST['question10']>80)
    header("location: gradeA.php");
  else if ($_POST['question1']+$_POST['question2']+$_POST['question3']+$_POST['question4']+$_POST['question5']+$_POST['question6']+$_POST['question7']+$_POST['question8']+$_POST['question9']+$_POST['question10']>60)
    header("location: gradeB.php");
  else if ($_POST['question1']+$_POST['question2']+$_POST['question3']+$_POST['question4']+$_POST['question5']+$_POST['question6']+$_POST['question7']+$_POST['question8']+$_POST['question9']+$_POST['question10']>40)
    header("location: gradeC.php");
  else header("location: gradeF.php");
}
?>
<!DOCTYPE html>
<head>
  <title>Survey</title>
</head>
<body>
  <h1>Here is a set of questions to test how cellfish you are.</h1>
  <font color="red"><?php echo $question_empty;?></font>
  <form action="survey.php" method="post">
    <h3>Question 1: How many social media are you using? (Like Facebook, Twitter, WeChat, Whatsapp)</h3>
    <input id="Q1C1" type="radio" name="question1" value="10"><label for="Q1C1">6 or more than 6</label><br>
    <input id="Q1C2" type="radio" name="question1" value="7.5"><label for="Q1C2">4</label><br>
    <input id="Q1C3" type="radio" name="question1" value="5"><label for="Q1C3">2</label><br>
    <input id="Q1C4" type="radio" name="question1" value="2.5"><label for="Q1C4">Less than 2</label>

    <h3>Question 2: How many hours were you on the social media in the last week?</h3>
    <input id="Q2C1" type="radio" name="question2" value="10"><label for="Q2C1">About 2 or more than 2 hours</label><br>
    <input id="Q2C2" type="radio" name="question2" value="7.5"><label for="Q2C2">About an hour</label><br>
    <input id="Q2C3" type="radio" name="question2" value="5"><label for="Q2C3">About half an hour</label><br>
    <input id="Q2C4" type="radio" name="question2" value="2.5"><label for="Q2C4">Less than half an hour</label>

    <h3>Question 3: Generally, how frequent do you check or use your phone?</h3>
    <input id="Q3C1" type="radio" name="question3" value="10"><label for="Q3C1">Less than 10 minites</label><br>
    <input id="Q3C2" type="radio" name="question3" value="7.5"><label for="Q3C2">Less than an hour</label><br>
    <input id="Q3C3" type="radio" name="question3" value="5"><label for="Q3C3">Less than two hours</label><br>
    <input id="Q3C4" type="radio" name="question3" value="2.5"><label for="Q3C4">Use it when neccesary (Like answering a call)</label>

    <h3>Question 4: Do you check your phone while you are walking?</h3>
    <input id="Q4C1" type="radio" name="question4" value="10"><label for="Q4C1">Yes, I do it most of the time</label><br>
    <input id="Q4C2" type="radio" name="question4" value="7.5"><label for="Q4C2">Yes, sometime I wanna make use of the walking time</label><br>
    <input id="Q4C3" type="radio" name="question4" value="5"><label for="Q4C3">Yes, but I try not to do that</label><br>
    <input id="Q4C4" type="radio" name="question4" value="2.5"><label for="Q4C4">No, I always focus on walking</label>

    <h3>Question 5: What is your instant reaction to a Whatsapp or WeChat (if applicable) message?</h3>
    <input id="Q5C1" type="radio" name="question5" value="10"><label for="Q5C1">Check the phone immediately anyway</label><br>
    <input id="Q5C2" type="radio" name="question5" value="7.5"><label for="Q5C2">Be aware of it but reply later</label><br>
    <input id="Q5C3" type="radio" name="question5" value="5"><label for="Q5C3">Do not answer and keep doing my work till it is done</label><br>
    <input id="Q5C4" type="radio" name="question5" value="2.5"><label for="Q5C4">Do not want to answer completely</label>

    <h3>Question 6: Do you feel uncomfortable or nervous when the phone is away from you?</h3>
    <input id="Q6C1" type="radio" name="question6" value="10"><label for="Q6C1">Yes, I can't live without it even just a while</label><br>
    <input id="Q6C2" type="radio" name="question6" value="7.5"><label for="Q6C2">Yes, I need to check my social media frequently</label><br>
    <input id="Q6C3" type="radio" name="question6" value="5"><label for="Q6C3">It's fine, but I just afraid somebody will call me</label><br>
    <input id="Q6C4" type="radio" name="question6" value="2.5"><label for="Q6C4">No feelings</label>

    <h3>Question 7: Do you play games on your phone? If so, how long do you play them in a day</h3>
    <input id="Q7C1" type="radio" name="question7" value="10"><label for="Q7C1">Yes, about 3 hours</label><br>
    <input id="Q7C2" type="radio" name="question7" value="7.5"><label for="Q7C2">Yes, about 2 hours</label><br>
    <input id="Q7C3" type="radio" name="question7" value="5"><label for="Q7C3">Yes, less than one hour</label><br>
    <input id="Q7C4" type="radio" name="question7" value="2.5"><label for="Q7C4">I don't play games</label>

    <h3>Question 8: Do you check your phone before go to sleep? If so, how long is it?</h3>
    <input id="Q8C1" type="radio" name="question8" value="10"><label for="Q8C1">Yes, I love spending much time chatting at night</label><br>
    <input id="Q8C2" type="radio" name="question8" value="7.5"><label for="Q8C2">Yes, I check it for less than half an hour</label><br>
    <input id="Q8C3" type="radio" name="question8" value="5"><label for="Q8C3">Yes, I check whether there are some messages I miss</label><br>
    <input id="Q8C4" type="radio" name="question8" value="2.5"><label for="Q8C4">I don't check my phone before go to sleep</label>

    <h3>Question 9: Do you check your phone when you are studying or working?</h3>
    <input id="Q9C1" type="radio" name="question9" value="10"><label for="Q9C1">I do it all the time which annoys me</label><br>
    <input id="Q9C2" type="radio" name="question9" value="7.5"><label for="Q9C2">Yes, but I try my best not to do so</label><br>
    <input id="Q9C3" type="radio" name="question9" value="5"><label for="Q9C3">I will check it during breaks</label><br>
    <input id="Q9C4" type="radio" name="question9" value="2.5"><label for="Q9C4">I don't do that</label>

    <h3>Question 10: Do you check your phone when you are hanging out with friends?</h3>
    <input id="Q10C1" type="radio" name="question10" value="10"><label for="Q10C1">Yes, I don't talk much with my friend</label><br>
    <input id="Q10C2" type="radio" name="question10" value="7.5"><label for="Q10C2">Yes, I hang out with them and play my phone</label><br>
    <input id="Q10C3" type="radio" name="question10" value="5"><label for="Q10C3">Yes, if I have to do so (Like answering a call)</label><br>
    <input id="Q10C4" type="radio" name="question10" value="2.5"><label for="Q10C4">No, I think that is inappropriate</label><br>

    <input type="submit" value="Submit">
    <input type="reset"  value="Reset">
  </form>
<?php require ("footer.php");?>
