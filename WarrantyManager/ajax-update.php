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

	// Perform MySQL UPDATE
	$result = mysqli_query($conn,"UPDATE released_batteries SET ".$col."='".$val."'
		WHERE ".$w_col1."='".$w_val1."' AND ".$w_col2."='".$w_val2."' ")
		or die ('Unable to update row.');
}

?>