<?php 

	require "database/connect.php";
		session_start();
		$v = $_SESSION['salesPerson_id'];
		
	
				
		$sql = "UPDATE sales_person SET active=0 WHERE salesPerson_id=$v";

			if (mysqli_query($connection, $sql)) {
				echo "Record deleted successfully";
				header("Location: salesSearch.php");
			} else {
				echo "Error deleting record: ";
			}

			mysqli_close($connection);
			
			
?>