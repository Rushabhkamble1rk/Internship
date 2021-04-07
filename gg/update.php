 <?php
 		 include 'database.php';
		$id=$_POST['id'];
		/*$firstName=$_POST['firstName'];
		$secondName=$_POST['secondName'];*/
		$phone=$_POST['phone'];
		$email=$_POST['email'];
		
		/*$address=$_POST['address'];*/
		
		$sql = "UPDATE `datainsert` SET `phone`='$phone',`email`='$email' WHERE id=$id";
		if (mysqli_query($conn, $sql)) {
			echo json_encode(array("statusCode"=>200));
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);


		

	?>