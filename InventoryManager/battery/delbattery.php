<?php
	require "../../database/connect.php";
	session_start();
	$v = $_SESSION['battery_name'];
	$sql = "DELETE FROM battery_description WHERE battery_name='$v'";
	if (mysqli_query($connection, $sql)){
		echo "Record deleted successfully";
		header("Location: searchbattery.php");
	}else{
		echo "Error deleting record: ";
		}
	mysqli_close($connection);
?>