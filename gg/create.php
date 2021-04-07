
<?php
	include 'database.php';
	$firstName=$_POST['firstName'];
		$secondName=$_POST['secondName'];
		$phone=$_POST['phone'];
		$email=$_POST['email'];
	$address=$_POST['address'];
	$sql = "INSERT INTO `datainsert`(`firstName`, `secondName`, `phone`,`email`, `address`) 
	VALUES ('$firstName','$secondName','$phone','$email','$address')";
	if (mysqli_query($conn, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);
?>