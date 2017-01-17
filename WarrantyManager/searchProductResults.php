<!DOCTYPE html>
 <?php include '../core/init.php';
      protect_page(); 
	
      ?>

<html lang="en">
    <head>
        <meta charset="utf-8">
		<link rel="stylesheet" href="css/form.css" media="screen" type="text/css" />
        <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
       
        <script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script type="text/javascript">
			$(function(){
				$(".updateData").change(function(){
					var batch  = $("#batch_num").val();
					var number = $("#battery_num").val();
					var input = $(this);
					var field = input.attr('name');
					var value = input.val();
					if ( field == "" || value == "" )
						return;
									
					$.ajax({
					url: "updateBatteryInfo.php",
					type: "POST", 
					data: {
						batch_num : batch,
						battery_num : number,
						val: value,
						col: field
					},
					cache: false,
					timeout: 10000,
					success: function(data) {
						// Alert if update failed
						if (data) {
							alert(data);
						}
						// Load output into a P
						else {
							$('#notice').text('Field updated');
							$('#notice').fadeOut().fadeIn();
						}
					}
				});
					
				});
			});
		</script>
	  
	</head>

<body>
<?php
include '../InventoryManager/include/header.php';
?>
<div id="body">
    <div id="navigation"></div>
    <nav>
        <ul id="mainsidebar">
            <li class="var_nav">
                <div class="link_bg"></div>
                <div class="link_title" id="dt">

                    <a href="enterDefect.php" id="dt" style="top: 1px;
                                display:block;
                                position:absolute;
                                float:left;
                                font-family:arial;
                                color:#1C1C1C;
                                text-decoration:none;
                                width:100%;
                                height:70px;
                                margin-top: 20px;
                                text-align:center;"><img class= "pic" src="img/b.png" align="middle" width="80px"><span>Enter Defects</span></a>
                </div>
            </li>
            <li class="var_nav">
                <div class="link_bg"></div>
                <div class="link_title" >

                    <a href= "checkReplace.php" id="cr" style="top: 10px;
                                display:block;
                                position:absolute;
                                float:left;
                                font-family:arial;
                                color:#1C1C1C;
                                text-decoration:none;
                                width:100%;
                                height:70px;
                                margin-top: 10px;
                                text-align:center;"><img class= "pic" src="img/c.png" align="middle" width="80px"><span>Check Replacements</span></a>
                </div>
            </li>
            <li class="var_nav">
                <div class="link_bg"></div>
                <div class="link_title" id="md" >

                    <a href="misDealer.php" id="mis" style="top: 10px;
                                display:block;
                                position:absolute;
                                float:left;
                                font-family:arial;
                                color:#1C1C1C;
                                text-decoration:none;
                                width:100%;
                                height:70px;
                                margin-top: 10px;
                                text-align:center;"><img class= "pic" src="img/d.png" align="middle" width="80px"><span>Misused </br> Dealers</span></a>
                </div>
            </li>
            <li class="var_nav">
                <div class="link_bg"></div>
                <div class="link_title" >

                    <a href= "viewAllReplace.php" id="cr" style="top: 10px;
                                display:block;
                                position:absolute;
                                float:left;
                                font-family:arial;
                                color:#1C1C1C;
                                text-decoration:none;
                                width:100%;
                                height:70px;
                                margin-top: 10px;
                                text-align:center;"><img class= "pic" src="img/f.png" align="middle" width="80px"><span>View All Replacements</span></a>
                </div>
            </li>
             <li class="var_nav">
                <div class="link_bg"></div>
                <div class="link_title" >

                      <a href= "searchProduct.php" id="cr" style="top: 10px;
                                display:block;
                                position:absolute;
                                float:left;
                                font-family:arial;
                                color:#1C1C1C;
                                text-decoration:none;
                                width:100%;
                                height:70px;
                                margin-top: 10px;
                                text-align:center;"><img class= "pic" src="img/g.png" align="middle" width="80px"><span>Search Product</span></a>
                </div>
            </li>

            

    </nav>


    </nav>
</div>

    <div class="content">

            <div id="content">
            <form  class='autosubmit' method='POST' action='ajax-update2.php' method="POST" enctype="multipart/form-data" id='ajax-form'>


                    <div class="ad">
<div id = "form-align">
	<div class="form-style-2">
		<div class="form-style-2-heading">Results</div>
				<br/>					

<?php

if (isset($_POST['submit']))
{
	$batch_num = $_POST['batch_num'];
	$battery_num = $_POST['battery_num'];
	
	$sql = "SELECT * 
	FROM released_batteries
	WHERE batch_num = '$batch_num' AND battery_num= '$battery_num' " ;
	
	$result = $conn->query($sql);
	
//fetch results to an array	
	if($row = $result->fetch_assoc() ){
		echo "
			<form method ='POST' action ='searchProductResults.php'>
			<label><span>Batch No :</span>
			<input id='batch_num' type='text' class='input-field' name='batch_num' style='width: 150px' value= ".$row['batch_num']." disabled/>

			<label for='field2'><span>Battery Number:</span>
			<input id='battery_num' type='text' class='input-field' name='battery_num' style='width: 150px ;' value= ".$row['battery_num']." disabled>
			</label>
			<label for='battery-defect'><span>Defect Type : </span>
			<select id = 'battery-defect' class='select-field updateData' name='defect_type' >";
			
			//getting defects to the dropdown
				$query= "SELECT defect FROM defect_types ";
				$db = mysqli_query($conn, $query);
				while ( $d=mysqli_fetch_assoc($db)) {
					
					//check the selected defect type is equal to fetched defect type for dropdown
					echo "<option value='".$d['defect']."' ".( $d['defect'] == $row["defect_type"]  ? "selected='selected'" : "" )." >".$d['defect']."</option>";
				}
				
				echo "
				</select>
				<label for ='battery-status'><span>Battery Status : </span>
				<select id ='battery-status' class='select-field updateData' name='battery_status' >";
				
				//getting battery status into the dropdown
				$sql5 = "SELECT status_name, indicator FROM battery_status";
				$query5=(mysqli_query($conn,$sql5));
				while($res5 = mysqli_fetch_assoc($query5)){
					echo "<option value='".$res5['indicator']."' ".( $res5['indicator'] == $row["battery_status"]  ? "selected='selected'" : "" )." >".$res5['status_name']."</option>";
				}
				echo "</select></label>				
					<label for='field7'><span>Replaced Date:</span>
					<input id = 'replaced_date' type='date' class='input-field updateData' name='replaced_date' style='width: 150px ;' value= ".$row['replaced_date'].">
					</label>
					<label for='field8'><span>Warranty Expiry Date:</span>
					<input id = 'warranty_period' type='date' class='input-field updateData' name='warranty_period' style='width: 150px ;' value= ".$row['warranty_period'].">
					</label>
					<label for='field9'><span>Customer Sold Date:</span>
					<input id = 'cus_sold_date' type='date' class='input-field updateData' name='cus_sold_date' style='width: 150px ;' value= ".$row['cus_sold_date'].">
					</label>
					
					<!--where to update -->
					<input id='where1' type='hidden' name='batch_num' value=".$row['batch_num']."  />
					<input id='where2' type='hidden' name='battery_num' value=".$row['battery_num']."  />
					";
	}
}
?>				
</div>
</div>
                        </div>
                </form>
                </div>
        </div>
</body>
   
</html>
