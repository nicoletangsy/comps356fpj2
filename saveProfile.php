<?php
  require_once("database.php");
  session_start();
  
  if (isset($_SESSION['username'])) {
	  try{
		if (isset($_FILES['image'])) {
			$errors=array();
			$allowed_ext= array('jpg','jpeg','png','gif');
			$file_name =$_FILES['image']['name'];
			$file_ext = strtolower( end(explode('.',$file_name)));
			$file_size=$_FILES['image']['size'];
			$file_tmp= $_FILES['image']['tmp_name'];
			$type = pathinfo($file_tmp, PATHINFO_EXTENSION);
			$data = file_get_contents($file_tmp);
			$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
			if (!($base64=="data:image/;base64,")) {
				$sql = "update members set avatar_base64 = '".$base64."' where username = '".$_SESSION['username']."'";
				$conn->exec($sql);
			}
		}
		if (isset($_POST['firstname'])) { 
		$fname = $_POST['firstname'];
		$sql1 = "update members set firstName = '".$fname."' where username = '".$_SESSION['username']."'";
		$conn->exec($sql1);
		}
		if (isset($_POST['lastname'])) {
			$lname = $_POST['lastname'];
			$sql2 = "update members set lastName = '".$lname."' where username = '".$_SESSION['username']."'";
			$conn->exec($sql2);
		}
		if (isset($_POST['gender'])) { 
		$gender = $_POST['gender'];
		$sql3 = "update members set gender = '".$gender."' where username = '".$_SESSION['username']."'";
		$conn->exec($sql3);
		}
		if (isset($_POST['bday'])) { 
		$bday = $_POST['bday'];
		$sql4 = "update members set birthday = '".$bday."' where username = '".$_SESSION['username']."'";
		$conn->exec($sql4);
		}
		if (isset($_POST['email'])) { 
		$email = $_POST['email'];
		$sql5 = "update members set email = '".$email."' where username = '".$_SESSION['username']."'";
		$conn->exec($sql5);
		}
		if (isset($_POST['intro'])) { 
		$intro = $_POST['intro'];
		$sql6 = "update members set description = '".$intro."' where username = '".$_SESSION['username']."'";
		$conn->exec($sql6);
		}

	  } catch(PDOException $e)
		{
			echo $sql . "<br>" . $e->getMessage();
		}
	header("Location: profile.php");
  }  else {
	die ("You must login first!  <br><br>Return to <a href=\"login.html\">Login</a>.");
  }
?>