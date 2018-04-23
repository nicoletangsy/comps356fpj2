<?php
  require_once("database.php");
  session_start();
  
  if (isset($_SESSION['username'])) {
	  try{
		$username = $_SESSION['username'];
		$postid = $_GET['postid'];
		$reply = $_POST['reply'];
		$d=strtotime("+8 Hours");
		$date=date('Y-m-d H:i:s', $d);
		echo "postid = $postid<br>";
		$sql = "insert into replyboard (reply_user, reply_date, reply_to, reply_content) values ('" .$username. "', '" .$date. "', " .$postid. ", '" .$reply. "')";
		$conn->exec($sql);
		echo $sql;
		} catch(PDOException $e)
		{
			echo $sql . "<br>" . $e->getMessage();
		}
	header("Location: discussboard.php");
  }  else {
	die ("You must login first!  <br><br>Return to <a href=\"login.php\">Login</a>.");
  }
?>