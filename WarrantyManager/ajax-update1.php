<?php

/*
 * DATABASE CONNECTION
 */
require "../core/database/connect.php";


// DATABASE: Clean data before use
function clean($value)
{
	$conn= mysqli_connect('localhost','root','','warranty_management');
	return mysqli_real_escape_string($conn,$value);
}

/*
 * FORM PARSING
 */

// FORM: Variables were posted
if (isset($_POST))
{
	$batch_num 		= $_POST["batch_num"];
	$battery_num 	= $_POST["battery_num"];
	$val			= $_POST["val"];
		
	$query= "SELECT defect_type FROM released_batteries WHERE batch_num ='".$batch_num."' AND battery_num ='".$battery_num."' ";
    $result = mysqli_query($conn, $query);
	
	if ( mysqli_num_rows ( $result ) > 0 ) // already exists, then update
	{
		$sql = "UPDATE released_batteries SET defect_type ='".$val."' WHERE batch_num ='".$batch_num."' AND battery_num ='".$battery_num."'";
		$result = mysqli_query($conn, $sql) or die ('Unable to update row.');
		
		echo "Defect type for ".$batch_num.$battery_num." was updated to ".$val;
		
	}else{
		echo "No rows were updated";
	}
}

?>