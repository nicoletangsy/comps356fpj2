<?php
	require_once('../database.php');
	$aaa = "Insert into Post (Id,Title,Content,Introduction,likeNo,DateTime,type,Image) Values(" ;

	foreach($_POST as $key => $value){
	    $aaa .= "'".$value."',";
	}	

	if($_FILES['Image']['tmp_name']){
	$aaa .= "Image = '" .addslashes(file_get_contents($_FILES['Image']['tmp_name']))."'";
	}else{
		$aaa .="Image = ''";
	}
	$sth = $conn->prepare($aaa);
    print_r($sth->execute());
	header('Location: addpost.php');
    
?>
    
