<?php

/*
 * DATABASE CONNECTION
 */
require "../database/connect.php";


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

if (isset($_POST['action']) and isset ($_POST['dealer_id']))
{
	$sql = "SELECT * FROM released_batteries WHERE battery_status = '3' AND dealer_id = '".$_POST['dealer_id']."'";
	$result = mysqli_query($connection, $sql);

	$valids = 0 ;
	$invalids = 0;
	$changed = 0;
	
	while($row = mysqli_fetch_assoc($result) ) {
		$batch_num = $row["batch_num"] ;
		$battery_num = $row["battery_num"] ;
		$valid = warranty_calculation( $connection, $batch_num , $battery_num );
		//print_r($valid);
		$final_valid =  warranty_validation( $connection, $valid) ;
		//print_r($final_valid);
		$row["validity"] = $final_valid ;
		$defected = check_defect ($connection, $valid);
		$row["defected"] = $defected;
		
		if (isset($final_valid)) {
			$check_replace = check_replacement ($connection,$valid,$final_valid, $defected) ;
			
			if ( $_POST['action'] == "submit" ){
				$changed = $changed + set_status($connection, $batch_num, $battery_num, $check_replace );
			}
			
			if ($check_replace == "VALID" )
				$valids++;
			else if ($check_replace == "INVALID"){
				$invalids++;
			}
		}
	}
	
	if ( $_POST['action'] == "confirm" )
	{
		echo " 	<span style='color:black';margin-right:5%;>Valid replacements: $valids</span>
				<span style='color:black'>Invalid Replacements : $invalids</span>";
	}else if ( $_POST['action'] == "submit" )
	{
		echo "Updated : $changed ";
	}

}
function warranty_calculation ($conn, $batchNum , $batteryNum) {

	$query	= mysqli_query($conn,"SELECT * FROM released_batteries WHERE battery_status = '3' AND batch_num= '$batchNum' AND battery_num = '$batteryNum' ");
	$data	= mysqli_fetch_assoc($query);
	return $data ; 

	die();
}

// check whether the battery is within the warranty period
 function warranty_validation ($conn, $data)   {

	$get_date1= $data["replaced_date"];
	$start = strtotime("$get_date1");

	$get_date2 = $data["warranty_period"];
	$end = strtotime("$get_date2");

	if ($end > $start) {
		return "YES";
	}else{
		return "NO" ;
	}

	die();

}

// this check the defect type
function check_defect ($conn, $data) {
	$defect =  $data["defect_type"];
	if (isset($defect)) {
	   return "Defected";
	} else {
	  return "Not Defected";
	}
}

// check the validity of the replacement using returned value from above two functions
function check_replacement ($conn,$data, $final_valid, $defected) {

	if ($final_valid == "YES" AND $defected == "Defected") {
		return "VALID";
	}
	else {
	  return "INVALID" ; 
	}
}

function set_status($conn, $batchNum,$batteryNum, $check_replace){

	if ($check_replace == "VALID") {
		$sql = "SELECT * FROM released_batteries WHERE battery_status = '0' order by batch_num, battery_num limit 1";
		$result = mysqli_query($conn, $sql);
		
		if($row = mysqli_fetch_assoc($result)){
			// update an existing one
			mysqli_query($conn,"UPDATE released_batteries SET battery_status = '4', dealer_id = '$_POST[dealer_id]' WHERE batch_num = '".$row['batch_num']." AND battery_num = '".$row['battery_num']."' ");
			mysqli_query($conn,"UPDATE released_batteries SET battery_status = '5' WHERE battery_status = '3' AND batch_num = '$batchNum' AND battery_num = '$batteryNum' ");
			
			return 1;
		}
		
		return 0;
		
	} else {
		mysqli_query($conn,"UPDATE released_batteries SET battery_status = '6' WHERE battery_status = '3' AND batch_num = '$batchNum' AND battery_num = '$batteryNum' ");
		return 0;
	}
}

?>