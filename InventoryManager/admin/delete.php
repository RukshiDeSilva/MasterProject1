<?php 

	require "../../database/connect.php";
	session_start();
	$v = $_SESSION['user_id'];
		
	$sql = "UPDATE users SET active=0 WHERE user_id='$v'";

	if (mysqli_query($connection, $sql)){
		echo "Record deleted successfully";
		header("Location: searchAdmin.php");
	}else{
		echo "Error deleting record: ";
		}

	mysqli_close($connection);
			
			
?>