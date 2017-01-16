<?php
 error_reporting(0);
require '../../database/connect.php';


	if (isset($_GET['data'])) {

		$id = $_GET['data'];
		$sql = "SELECT * FROM dealer WHERE area_no = $id";

		$res = mysqli_query($connection,$sql);

		 echo '<select name="dealer_id" id="carmodel">';
                       
                             while($r=mysqli_fetch_assoc($res)){ 
                             		
                                   echo "<option value=".$r['dealer_id'].">". $r['dealer_name']. " </option>";
                             }
                        echo '</select>'; 
                
		
	}


?>