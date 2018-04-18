<?php
  require_once("database.php");
  if (isset($_POST['username'])&&isset($_POST['password'])) {
	  try{
		$username = $_POST['username'];
		$password = $_POST['password'];
	
		$sql = "select * from members where username = '".$username."'";
		//echo $sql;
		$stat = $conn->prepare($sql);
		$stat->execute();
		if ($stat->setFetchMode(PDO::FETCH_ASSOC) === TRUE){
			$result = $stat->fetch();
			if($result['username'] == null){
				echo "<br>This Username \"".$username."\" does not exist! 	<br>Please <a href=register.html>Register</a>.";
			} else if ($password == $result['password']){
				session_start();
				$_SESSION['username'] = $result['username'];
				header("Location: index.php");
			} else {
				echo "Incorrect Password! <br>Go to the  <a href=login.html>Previous</a> Page.";
			}
		}
	  } catch(PDOException $e)
		{
			echo $sql . "<br>" . $e->getMessage();
		}
	
  }  else {
	die ("You must enter all fields!  <br><br>Return to <a href=\"login.html\">Login</a>.");
  }

?>