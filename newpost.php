<?php
  require_once("database.php");
  session_start();
  
  if (isset($_SESSION['username']) && isset($_FILES['image'])) {
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
			} else {
				$base64 = "";
			}
		$username = $_SESSION['username'];
		$content = $_POST['content'];
		$d=strtotime("+8 Hours");
		$date=date('Y-m-d H:i:s', $d);
		
		$sql = "insert into board (post_user, post_date, content, board_avatar_base64) values ('" .$username. "', '" .$date. "', '" .$content. "', '" .$base64. "')";
		$conn->exec($sql);
		} catch(PDOException $e)
		{
			echo $sql . "<br>" . $e->getMessage();
		}
	header("Location: discussboard.php");
  }  else {
	die ("You must login first!  <br><br>Return to <a href=\"login.php\">Login</a>.");
  }
?>