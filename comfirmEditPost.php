<?php
require_once("database.php");
session_start();
?>
<?php
  if (isset($_SESSION['username'])) {
	  try{
		$bid = (int)$_GET['board_id'];
		$username = $_SESSION['username'];
		$content = nl2br($_POST['content']);
		$d=strtotime("+8 Hours");
		$date=date('Y-m-d H:i:s', $d);
		
		$sql1 = "select board_avatar_base64 from board where board_id = ".$bid;
		$result = $conn->query($sql1);
		$row = $result->fetch();
		
		if (isset($_FILES['image']) && $_FILES['image']!="") {
			$errors=array();
			$allowed_ext= array('jpg','jpeg','png','gif');
			$file_name =$_FILES['image']['name'];
			$file_ext = strtolower( end(explode('.',$file_name)));
			$file_size=$_FILES['image']['size'];
			$file_tmp= $_FILES['image']['tmp_name'];
			$type = pathinfo($file_tmp, PATHINFO_EXTENSION);
			$data = file_get_contents($file_tmp);
			$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
			} 
		
		if (!($base64=="data:image/;base64,")) {
			$sql = "update board set content = '".$content."', last_modifies = '".$date."', board_avatar_base64 = '".$base64."' where board_id = ".$bid;
		} else {
			$sql = "update board set content = '".$content."', last_modifies = '".$date."' where board_id = ".$bid;
		}
		
		
		$conn->exec($sql);
		} catch(PDOException $e)
		{
			echo $sql . "<br>" . $e->getMessage();
		}
	header("Location: discussboard.php");
  }  else {
	  ?>
	  <?php
	echo ("You must login first!  <br><br>Return to <a href=\"login.php\">Login</a>.");
  }
?>
