<?php
	require_once('../database.php');
	$aaa = "Insert into Post (Type,Title,Content,Introduction, DateTime,Image) Values(" ;

	foreach($_POST as $key => $value){
	    $aaa .= "'".$value."',";
	}	
	$date = date("Y-m-d h:i:s");
	$aaa .= "'".$date."'";
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
			$aaa.= ", '".$base64."'";
	} else {
		$aaa.= ", ''";
	}
	$aaa .= ");";
	$sth = $conn->prepare($aaa);
	//echo "$aaa";
    print_r($sth->execute()); 
	header("Location: addnews.php");
    
?>
    
