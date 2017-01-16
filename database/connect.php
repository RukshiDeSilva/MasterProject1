<?php
	$connection = mysqli_connect("localhost","root","","warranty_management");
	if(!$connection){
		echo "connection failed".mysqli_connect_error();
	}
	
	//mysqli_select_db($connection,"abc");

?>