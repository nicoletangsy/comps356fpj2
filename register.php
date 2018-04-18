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
		die("Your username should be between 4 and 16 characters! <br><br>Return to <a href=\"register.html\">Register</a>.");
	}
	if(strlen($password) < 8 || strlen($password) > 16) {
		die("Your password should be between 8 and 16 characters! <br><br>Return to <a href=\"register.html\">Register</a>.");
	}
	if ($password != $cpassword) {
		die("The Passwords do not match, Please retry!   <br><br>Return to <a href=\"register.html\">Register</a>.");
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
				die("This username \"".$username."\" had been Registed. Please try another username. <br><br>Return to <a href=\"register.html\">Register</a>.");
			}
		} 

		//insert new member into members
		$sql = "insert into members (username, password, firstname, lastname, email, question, answer) values ('".$username."', '".$password."', '".$fname."', '".$lname."', '".$email."', '".$question."', '".$answer."')";
		$conn->exec($sql);
		echo "New record created successfully";
	}
	catch(PDOException $e)
    {
      echo $sql . "<br>" . $e->getMessage();
    }
	

	$conn = null;
  } else {
	die ("You must enter all fields!  <br><br>Return to <a href=\"register.html\">Register</a>.");
  }



?>