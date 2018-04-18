<?php
	require_once('database.php');
	session_start();

	$url = $_POST['url'];
	$gender = $_POST['gender'];
	$bday = $_POST['bday'];
	$religious = $_POST['religious'];
	$selfintro = $_POST['selfintro'];
	try{
	$sql = "insert into profile values ('".$url."','".$gender."','".$bday."','".$religious."','".$selfintro."')";
	$conn->exec($sql);
    echo "New record created successfully";
    header("Refresh:1,url=profile.html");
    }
	catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
?>