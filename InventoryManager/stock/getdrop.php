<?php
 error_reporting(0);
require '../../database/connect.php';


	if (isset($_GET['data'])) {

		$id = $_GET['data'];
		$sql = "SELECT * FROM sales_person WHERE area_no = $id AND active=1";

		$res = mysqli_query($connection,$sql);

		 echo '<select name="salesPerson_id" id="carmodel" class="select-field">';
                       
                             while($r=mysqli_fetch_assoc($res)){ 
                             		
                                   echo "<option value=".$r['salesPerson_id'].">". $r['F_name']. " ". $r['L_name'] ."</option>";
                             }
                        echo '</select>'; 
                
		
	}


?>