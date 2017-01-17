<!DOCTYPE html>
<?php
     require "../database/connect.php"; 
?>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
       
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
    <script type="text/javascript">
	
		$(function(){
			$(".autosubmit").change(function(){
				var input = $(this);
				var value = input.val();
				var column = input.attr('name');
				var id = input.attr('id');
				
				if ( value == "" )
					return;
			
				var form = input.parents('form');

				id = id.split('_')[1];
				
				var batch = ('#batch_').concat(id);
				var battery = ('#battery_').concat(id);
				
				var where_val1 = form.find(batch).val();
				var where_col1 = form.find(batch).attr('name');
				var where_val2 = form.find(battery).val();
				var where_col2 = form.find(battery).attr('name');
				
				$.ajax({
					url: "ajax-update.php",
					type: "POST", 
					data: {
						val: value,
						col: column,
						w_col1: where_col1,
						w_val1: where_val1,
						w_col2: where_col2,
						w_val2: where_val2
						
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
		$(function(){
			$("#btnConfirm").click(function(){
				var input = $(this);
				var dealer  = input.attr('value');
							
				if ( dealer == "" )
					return;
					
				$.ajax({
					url	: "confirmData.php",
					type: "POST",
					data: {action: 'confirm', dealer_id : dealer},
					success: function(result)
					{
						$("#validCount").html(result);
					}

				});
			});
			
			$("#btnSubmit").click(function(){
				var input = $(this);
				var dealer  = input.attr('value');
							
				if ( dealer == "" )
					return;
				
				$.ajax({
					url	: "confirmData.php",
					type: "POST",
					data: {action: 'submit', dealer_id : dealer},
					success: function(result)
					{
						alert(result);
						window.location.href = window.location.href
					}

				});
			});
		});
	//multiple dropdown selection	
		$( document ).ready(function() {
			$("select#cap").click( function(){
					//var id = this.id;
					var id = $(this).children(":selected").attr("id");
					console.log(id);

					$.ajax({

						url:'getdrop2.php?data='+id,
						type:"GET",
						success:function(data){

						   $("tr#trow>th#second").html("");
						$("tr#trow>th#second").html(data);
						}


					});
			});
			
		});
	</script>
</head>
	<?php
	include '../InventoryManager/include/header.php';
	?>
	<body>
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
	</div>
	<div class="content">
		<div class="table">
			<div id="content">
				<form action="#" method="POST" enctype="multipart/form-data" name="Form">
					<div class="ad">
						<br/>
						<h1><b>Replacement Inspection</b></h1>
						<br/>
					<!--form action= "" method="post" id= "formID"-->
						<table width="70%">
							<tr>
								<th>Area :</th>
								<th>Dealer :</th>
								<th></th>
							</tr>
							<tr id= "trow">
								<th>
									<select name="area" id="cap">
										<option>     -------ALL--------   </option>
										<?php 
										$sql1 = "Select DISTINCT area_no,area from area";
										$result1= mysqli_query($connection, $sql1);
										while($r=mysqli_fetch_row($result1))
										{ 
										   echo '<option id=' .$r[0].'> ' . $r[1] . '</option>';

										}
										?>
										</select>
								</th>
								<th id="second">
									<select name= "dealer_id" id = "hat">
										<option> -------ALL--------</option>
									</select>
								</th>
									</div>
							<th>
								<button type="submit" name="submit" value="submit">search</button>
							</th>
							</tr>

					</table>
					
				<!--/form-->
				</form>
   
<?php
	require "../core/database/connect.php";
	$dealer_name ="";

	if (isset($_POST['dealer_id'])){
	$dealer_name = $_POST['dealer_id'];
	$sql = "SELECT * FROM released_batteries WHERE battery_status = '3' AND dealer_id = '$_POST[dealer_id]'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {

	echo "
		<div  class='tbl-header'>
		<table cellpadding='0' cellspacing='0' border='0'>
		  <thead>
			<tr>
				<th>Replacement</th>
				<th>Replacement Date</th>
				<th>Warranty Expiry - Date</th>
				<th>Within Warranty Period</th>
				<th>Defect Type Ok/Not</th>
				<th>Valid replacement</th>
			  
			</tr>
		  </thead>
		</table>
		</div>
		<div  class='tbl-content'>
		<table cellpadding='0' cellspacing='0'border='0'> 
			<tbody>";
	// output data of each row
	while($row = $result->fetch_assoc()) {
		$batch_num = $row["batch_num"] ;
		$battery_num = $row["battery_num"] ;
		$valid = warranty_calculation( $conn, $batch_num , $battery_num );
		//print_r($valid);
		$final_valid =  warranty_validation( $conn, $valid) ;
		//print_r($final_valid);
		$row["validity"] = $final_valid ;
		$defected = check_defect ($conn, $valid);
		$row["defected"] = $defected;
		
		//check valid
		if (isset($final_valid)) {
			$check_replace = check_replacement ($conn,$valid,$final_valid, $defected) ;
			$row["replacement"] = $check_replace;
				
		$id = "".$row["batch_num"]."|".$row["battery_num"];
		$idIn = "".$row["batch_num"].$row["battery_num"];
		 echo "
			<tr>
				<td>".$idIn."</td>
				<td>
					<input id='date_".$idIn."' type='date' id='date_".$idIn."' name='replaced_date' size='20' value= '".$row['replaced_date']."' class='autosubmit'>
					<input id='batch_".$idIn."' type='hidden' name='batch_num' value=".$row['batch_num']."  />
					<input id='battery_".$idIn."' type='hidden' name='battery_num' value=".$row['battery_num']."  />
				</td>
				<td>".$row['warranty_period']."</td>
				<td>".$row["validity"]."</td>
				<td>".$row["defected"]."</td>
				<td>".$row["replacement"]."</td>
			</tr>"
		;
	}
	}
	}
	echo "
		
		</tbody></table>
		</body>
	</html>";
} else {
	echo "<div>No results to dispaly</div>";
}

$conn->close();
?>
</div>
<br>
<div class="bottom" align="center">
	<div style='text-align:left;color:black;padding:5px;' id='validCount'></div>

	<button id="btnConfirm" type=button class='confirm' name='confirm' value='<?php echo isset($_POST['dealer_id']) ? $_POST['dealer_id'] : "" ?>'>Confirm</button>
	<button id="btnSubmit" type=button class='submit' name='send' value='<?php echo isset($_POST['dealer_id']) ? $_POST['dealer_id'] : "" ?>' >Submit</button>

</div>
</div>
</div>

<?php
// this fetch data from released batteries and store in an array
function warranty_calculation ($conn, $batchNum , $batteryNum) {
 
	$data= array();
	$conn= mysqli_connect('localhost','root','','warranty_management');
	$query=mysqli_query($conn,"SELECT * FROM released_batteries 
	WHERE battery_status = '3' AND batch_num= '$batchNum' AND battery_num = '$batteryNum' ");
	$data=mysqli_fetch_assoc($query);
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
			if ($defect != "NONE"){
		   return "Defected";
		   
		} else {
		  return "Not Defected";
		}
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
?>
	</body>
</html>
