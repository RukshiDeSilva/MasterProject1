<?php
 error_reporting(0);
require '../../database/connect.php';


    if (isset($_GET['data1'])) {

        $id = $_GET['data1'];
        $sql = "SELECT * FROM dealer WHERE salesPerson_id = $id and active=1";

        $res = mysqli_query($connection,$sql);

         echo '<select name="dealer_id" class="select-field">';
                       
                             while($r=mysqli_fetch_assoc($res)){ 
                                    
                                   echo "<option value =".$r['dealer_id'].">". $r['dealer_name']. "</option>";
                             }
                        echo '</select>'; 
                
        
    }


?>