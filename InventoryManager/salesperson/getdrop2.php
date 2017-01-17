<?php
 error_reporting(0);
require '../../database/connect.php';


	if (isset($_GET['data'])) {

		/*data is area no which was selected in the area dropdown*/
		$id = $_GET['data'];

		/*show dealers only for the area selected*/
		$sql = "SELECT * FROM dealer WHERE area_no = $id";

		$res = mysqli_query($connection,$sql);

		 echo '<select name="dealer_id" id="carmodel">';
                       
                             while($r=mysqli_fetch_assoc($res)){ 
                             		
                                   echo "<option value=".$r['dealer_id'].">". $r['dealer_name']. " </option>";
                             }
                        echo '</select>'; 
                
		
	}


?>