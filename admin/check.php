<?php
	require_once('../database.php');
	$id = $_GET['ID'];
	$newstype = $_POST['Type'];
	$title = $_POST['Title'];
	$content = $_POST['Content'];
	$intro = $_POST['Introduction'];
	$d=strtotime("+8 Hours");
	$date=date('Y-m-d H:i:s', $d);
	if(isset($_FILES['image'])){
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
	if ($base64=="data:image/;base64,") {
		$sql = "UPDATE Post SET type = '".$newstype."', Title = '".$title."', Content = '".$content."', Introduction = '".$intro."', last_modified = '".$date."' where Id = ".$id;
	} else {
		$sql = "UPDATE Post SET Type = '".$newstype."', Title = '".$title."', Content = '".$content."', Introduction = '".$intro."', last_modified = '".$date."', Image = '".$base64."' where Id = ".$id;
	}
	
	$stat = $conn->prepare($sql);
	//echo $sql."<br>";
	//echo $type;
    print_r($stat->execute()); 
	header("Location: editpost.php?Id=".$id);
    
?>
    
