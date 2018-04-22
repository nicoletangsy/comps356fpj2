<?php
	require_once('../database.php');
	$aaa = "Insert into Post (Type,Title,Content,Introduction,likeNo,DateTime,Image) Values(" ;

	foreach($_POST as $key => $value){
	    $aaa .= "'".$value."',";
	}	
	$date = date("Y-m-d h:i:s");
	$aaa .= "0, '".$date."'";
	if($_FILES['Image']['tmp_name']){
	$aaa .= ", '".addslashes(file_get_contents($_FILES['Image']['tmp_name']))."'";
	}else{
		$aaa .=", ''";
	}
	$aaa .= ");";
	$sth = $conn->prepare($aaa);
	echo "$aaa";
    print_r($sth->execute());
	header('Location: addpost.php');
    
?>
    
