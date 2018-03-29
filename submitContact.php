<?php
    require_once('database.php');
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];
    $sth = $conn->prepare("insert into Contact(Name,Email,Subject,Message) VALUES('$name','$email','$subject','$message')");
    $sth->execute();
    header('Location: submited.html');
?>