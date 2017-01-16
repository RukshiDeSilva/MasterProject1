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
if (count($_POST))
{
	// Prepare form variables for database
	foreach($_POST as $column => $value)
		${$column} = clean($value);
	
	$batch 	= $_POST["batch_num"];
	$number = $_POST["battery_num"];
	$col 	= $_POST["col"];
	$val 	= $_POST["val"];
	
	if ( $batch == "" || $number == "" || $col == "" || $val == "" )
		return;
	
	$sql = "UPDATE released_batteries SET ".$col." ='".$val."' WHERE batch_num ='".$batch."' AND battery_num ='".$number."'";
	
	$result = mysqli_query($conn, $sql) or die ('Unable to update row.');
		
	echo $col." for ".$batch_num.$battery_num." was updated to ".$val;

}

?>