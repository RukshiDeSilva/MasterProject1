<?php 

	require "database/connect.php";
		session_start();

		/*get the name searched in dealerSearch.php*/
		$v = $_SESSION['salesPerson_id'];
		
	
		/*inactive dealer*/			
		$sql = "UPDATE sales_person SET active=0 WHERE salesPerson_id=$v";

			if (mysqli_query($connection, $sql)) {
				echo "<script>alert('Successfully Deleted');
              window.location.href='http://localhost/MasterProject1/InventoryManager/salesperson/salesSearch.php';</script>";
			} else {
				echo "Error deleting record: ";
			}

			mysqli_close($connection);
			
			
?>