<?php

include 'database.php';

  	$name=$_POST['name'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$city=$_POST['city'];


  	$sql = "INSERT INTO `crud`( `name`, `email`, `phone`, `city`) 
	VALUES ('$name','$email','$phone','$city')";


  $result = $mysqli->query($sql);


  $sql = "SELECT * FROM items Order by id desc LIMIT 1"; 


  $result = $mysqli->query($sql);


  $data = $result->fetch_assoc();


echo json_encode($data);


?>
