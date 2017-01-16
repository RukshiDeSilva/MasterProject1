<?php 

	require "../../database/connect.php";
	session_start();
	$v = $_SESSION['dealer_name'];
		
	$sql = "UPDATE users SET active=0 WHERE username='$v'";

	if (mysqli_query($connection, $sql)){ 
		echo "<script>alert('Successfully Deleted');</script>";
		header("Location: view.php");
	}else{
		echo "Error deleting record: ";
		}

	mysqli_close($connection);
			
			
?>