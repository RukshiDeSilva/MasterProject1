<?php 

	require "../../database/connect.php";

	/*get the name searched in view.php*/
	session_start();
	$dealer_name = $_SESSION['dealer_name'];
	
	/*inactive dealer*/	
	$sql = "UPDATE dealer SET active=0 WHERE dealer_name='$dealer_name'";

	if (mysqli_query($connection, $sql)){
		echo "<script>alert('Successfully Deleted');
              window.location.href='http://localhost/MasterProject1/InventoryManager/dealer/view.php';</script>";
	}else{
		echo "Error deleting record: ";
		}

	mysqli_close($connection);
			
			
?>