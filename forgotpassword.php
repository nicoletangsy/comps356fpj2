<?php
  require_once ("database.php");
  //$conn = connectDB();
  
  if (isset($_POST['username'])&&isset($_POST['password'])&&isset($_POST['cpassword'])&&isset($_POST['question'])&&isset($_POST['answer'])) 
  { 
	$username = $_POST['username'];
	$password = $_POST['password'];
	$cpassword = $_POST['cpassword'];
	$question = $_POST['question'];
	$answer = $_POST['answer'];

	try {
		$sql = "select username, question, answer from members where username = '".$username."'";
		//echo $sql;
		$stat = $conn->prepare($sql);
		$stat->execute();
		if ($stat->setFetchMode(PDO::FETCH_ASSOC) === TRUE){; 
		$result = $stat->fetch();
		//echo $result['username'];
		if ($result['username'] == $username) {
			
				if ($result['question'] == $question || $result['answer'] == $answer) {
					if ($password == $cpassword) {
						if (strlen($password) >= 8 && strlen($password) <= 16) {
							$sql = "update members set password = '".$password."' where username = '".$username."'";
							$conn->exec($sql);
							echo "Password changed successfully!";
						} else {
							die("Your password should be between 8 and 16 characters! Please re-enter. <br><br>Return to <a href=\"forgotpassword.html\">Forgot Password?</a>.");
						}
					} else {
						die("Passwords do not match. Please re-enter. <br><br>Return to <a href=\"forgotpassword.html\">Forgot Password?</a>.");
					}
				} else{
					die("The question or answer for recovery is not correct. Please re-enter. <br><br>Return to <a href=\"forgotpassword.html\">Forgot Password?</a>.");
				}
			} else {
				die("The username is not correct. Please re-enter. <br><br>Return to <a href=\"forgotpassword.html\">Forgot Password?</a>.");
			}
		}
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

