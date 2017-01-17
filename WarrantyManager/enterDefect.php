<!DOCTYPE html>


 <?php include '../core/init.php';
      protect_page(); 
	
?>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
		<link rel="stylesheet" href="http://apps.bdimg.com/libs/fontawesome/4.4.0/css/font-awesome.min.css">
   
       
        <script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="js/jquery-editable-select.js"></script>



<script>

	$(function(){
		$(".AutoSubmitCombo").change(function(){
			var input = $(this);
			
			if ( input.selectedIndex <= 0 )
				return;
			
			var value = input.val();
			var id = input.attr('id');
			
			if ( value == "" )
				return;
		
			var form = input.parents('form');
			
			//split the id of the select and take 2nd element as the id now ex:dt_batch_num|battery_num
			id = id.split('_')[1];
			
			if ( id == "" )
				return;
			
			//now split the id from '|'
			var vals = id.split("|");
			var batch = vals[0];
			var num = vals[1];
			
			$.ajax({
				url: "ajax-update1.php",
				type: "POST", 
				data: {
					batch_num: batch,
					battery_num: num,
					val: value
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
	//multiple dropdown selection	
	$( document ).ready(function() {
		 $("select#cap").click( function(){
				//var id = this.id;
				var id = $(this).children(":selected").attr("id");
				console.log(id);

				$.ajax({

					url:'getdrop2.php?data='+id,
					type:"get",
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

						<a href="#" class="side_a"><img class= "pic" src="img/b.png" align="middle" width="80px"><span>Enter Defects</span></a>
					</div>
				</li>
				<li class="var_nav">
					<div class="link_bg"></div>
					<div class="link_title" >

						<a href= "checkReplace.php" class="side_a"><img class= "pic" src="img/c.png" align="middle" width="80px"><span>Check Replacements</span></a>
					</div>
				</li>
				<li class="var_nav">
					<div class="link_bg"></div>
					<div class="link_title" id="md" >

						<a href="misDealer.php" class="side_a"><img class= "pic" src="img/d.png" align="middle" width="80px"><span>Misused Dealers</span></a>
					</div>
				</li>
				<li class="var_nav">
					<div class="link_bg"></div>
					<div class="link_title" >

						<a href= "viewAllReplace.php" class="side_a"><img class= "pic" src="img/f.png" align="middle" width="80px"><span>View All Replacements</span></a>
					</div>
				</li>
				 <li class="var_nav">
					<div class="link_bg"></div>
					<div class="link_title" >

						<a href= "searchProduct.php" class="side_a"><img class= "pic" src="img/g.png" align="middle" width="80px"><span>Search Product</span></a>
					</div>
				</li>
		</nav>
	</div>

		<div class="content">

			<div class="table">
				<div id="content">
				<form action="#" method="POST" enctype="multipart/form-data" name="Form">
						<div class="ad">

						 <h1><b>Enter Defect Types</b></h1>

						<table width="70%">
						  <tr>
		
		
							<th>From : </th>
							<th>To : </th>
							<th></th>
							<th></th>
							</tr>
							<tr></tr>
						  <tr>
							  <form>
								<div class="form-group input-group">
									<th><input name="date_1" type="date"  size="9" value=""/></th>
									<th> <input name="date_2" type="date"  size="9" value=""/></th>
								</div>
									<th><button style="margin-top:-2% " type="submit" name="submit" value="submit">Search</button> </th>
									<th><a href = "enterDefectType.php"><img src="img/defect.png" width="200px" height= "50px"></a></th>
							   </form>
						  </tr>





					</table>
<?php

require "../core/database/connect.php";


if (isset($_POST['submit'])) {
     
	$from_date = strtotime($_POST['date_1']);
	$to_date = strtotime($_POST['date_2']);
	$First_Date = date('Y-m-d',$from_date);
	$Next_Date =  date('Y-m-d',$to_date);
	
	//select the details of batteries within the two dates and where status 3
	$sql="SELECT battery_status,replaced_date,batch_num,battery_num,defect_type FROM released_batteries WHERE battery_status = '3' AND replaced_date BETWEEN '" . $First_Date . "' AND  '" . $Next_Date . "' ";


	
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		
		echo "
		<div  class='tbl-header'>
		<table cellpadding='0' cellspacing='0' border='0'>
		  <thead>
			<tr>
			  <th>Replaced Battery Number</th>
			 
			  <th>Enter/Update Defect Type</th>
			</tr>
		  </thead>
		</table>
		</div>
		<div  class='tbl-content'>
		<table cellpadding='0' cellspacing='0' border='0'>
		  <tbody>
			<tr></tr>";
			
		while($row1 = $result->fetch_assoc() ){
			$id = $row1["batch_num"]."|".$row1["battery_num"];
			echo"
				<tr>
				<td>".$row1["batch_num"].$row1["battery_num"]."</td>  
				";

			?>
			<td>
			<!--assign form an id using batch num and battery num -->
			<form id='form_<?php echo $id; ?>' class='autosubmit' method='POST' action='ajax-update1.php'>
			
			<!-- assign select an id and a class -->
				<select id ="dt_<?php echo $id; ?>" name='defect_type' class="AutoSubmitCombo">
				<option value = ''>--SELECT--</option>
				
				<?php
				//getting data to a drop down
				$query= "SELECT defect FROM defect_types ";
				$db = mysqli_query($conn, $query);
				while ( $d=mysqli_fetch_assoc($db)) {
					
					//if defect type we selected equal to the defect type fetched to the dropdown it will be selected else empty string will replace
					echo "<option value='".$d['defect']."' ". ( $d['defect'] == $row1["defect_type"]  ? "selected='selected'" : "" )." >".$d['defect']."</option>";
				}   
				?>
				</select>
			<?php
		}
		echo "</table>";
	} else {
		echo "No results to display";
	}
	echo"</form>";
}




mysqli_close($conn);

?>

  </tbody>
</table>
</div>

</div>
</form>
</div>
</div>
</div>
</div>

		<div>
	</body>
</html>



