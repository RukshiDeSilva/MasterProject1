<?php include '../../core/init.php';
protect_page();



$role= $user_data['role'];
	
 	 if ($role == "DEO") {
		echo "<script>window.location.href = '../restrict.php';</script>";
}
?>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/IM.css" type="text/css"/>
	<script   src="https://code.jquery.com/jquery-3.1.0.js"   integrity="sha256-slogkvB1K3VOkzAI8QITxV3VzpOnkeNVsKvtkYLMjfk="   crossorigin="anonymous"></script>
</head>
<script>
	function validate(){
		//Dealer name
		var a= document.myForm.dealer_name.value;
		//  var a = document.form.name.value;
		if(a=="")
		{
			alert("Please Enter Your Name");
			document.form.name.focus();
			return false;
		}
		if(!isNaN(a))
		{
			alert("Please Enter Only Characters for the Dealer Name");
			document.form.name.select();
			return false;
		}
		//Mobile no
		if( document.myForm.mobileNo.value == "" ||
			isNaN( document.myForm.mobileNo.value ) ||
			document.myForm.mobileNo.value.length != 10 )
		{
			alert( "Please provide a Mobile No No as the format 0#########." );
			document.myForm.telephoneNo.focus() ;
			return false;
		}
		//TP nomber
		if( document.myForm.telephoneNo.value == "" ||
			isNaN( document.myForm.telephoneNo.value ) ||
			document.myForm.telephoneNo.value.length != 10 )
		{
			alert( "Please provide a Telephone No as the format 0#########." );
			document.myForm.telephoneNo.focus() ;
			return false;
		}
		//Nic No
		var idToTest = document.myForm.NIC.value,
			myRegExp = new RegExp(/^[0-9]{9}[vVxX]$/);
		if(myRegExp.test(idToTest)) {
		}
		else {
			alert( "Please provide a NIC No as #########V" );
		}
		//Fax NO
		if( document.myForm.fax.value == "" ||
			isNaN( document.myForm.fax.value ) ||
			document.myForm.fax.value.length != 10 )
		{
			alert( "Please provide a Fax No as the format 0#########." );
			document.myForm.fax.focus() ;
			return false;
		}
		//Email Validation
		var emailID = document.myForm.email.value;
		atpos = emailID.indexOf("@");
		dotpos = emailID.lastIndexOf(".");
		if (atpos < 1 || ( dotpos - atpos < 2 ))
		{
			alert("Please enter correct email ID")
			document.myForm.email.focus() ;
			return false;
		}
		return( true );
	}
	$( document ).ready(function() {
		$("select#cap").click( function(){
			//var id = this.id;
			var id = $(this).children(":selected").attr("id");
			console.log(id);
			$.ajax({
				url:'getdrop.php?data='+id,
				type:"get",
				success:function(data){
					$("tr#trow>td#second").html("");
					$("tr#trow>td#second").html(data);
				}
			});
		});
	});
</script>
<body>
<div class="row">
	<?php
	include '../include/header.php'
	?>
	<div id="nav">
		<ul id="mainsidebar">
			<li class="sidenav">
				<div id="side">
					<a href="../battery/product.php"><img src="../img/a.png" class="pic"></a>
					<span>Product Details</span>
				</div>
			</li>
			<li class="sidenav">
				<div id="side">
					<a href="../stock/stock.php"><img src="../img/b.png" class="pic"></a>
					<span>Stock</span>
				</div>
			</li>
			<li class="sidenav">
				<div id="side">
					<a href="../dealer/dealer.php"><img src="../img/c.png" class="pic"></a>
					<span>Dealer</span>
				</div>
			</li>
			<li class="sidenav">
				<div id="side">
					<a href="../salesperson/salep.php"><img src="../img/d.png" class="pic"></a>
					<span>Salesperson</span>
				</div>
			</li>
			<li class="sidenav">
				<div id="side">
					<a href="../report/report.php"><img src="../img/e.png" class="pic"></a>
					<span>Reports</span>
				</div>
			</li>
		</ul>
	</div>
	<div id="content">
		<div class="topnav">
			<a href="../dealer/dealer.php"><img src="../img/View.png"></a>
			<a href="../dealer/adddealer.php"><img src="../img/Add.png"></a>
			<a href="../dealer/view.php"><img src="../img/Search.png"></a>
		</div>
		<?php
		require "../../database/connect.php";
		/*session_start();*/
		$v1 = $_SESSION['dealer_name'];
		$error=FALSE;

		$dealer_iderr = "";
		$v0=$v2=$v3=$v4=$v5=$v6=$v7=$v8=$v9=$zero="";
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$dealer_name = $_POST['dealer_name'];
		}
		/*if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if(empty($_POST['dealer_id'])){
                $dealer_iderr = "";
                $error = TRUE;
			}else{
				$dealer_id = $_POST['dealer_id'];
				}
			if ($error==FALSE){*/
		$sql = "SELECT * FROM dealer WHERE dealer_name = '$v1'";

		$result= mysqli_query($connection, $sql);
		if(mysqli_num_rows($result) > 0){
			while($row = mysqli_fetch_assoc($result)){
				/*	echo "id: ".$row["dealer_id"]. "Name: ".$row["dealer_name"]. "NIC: ".$row["NIC"]."<br/>";*/
				$v0=$row["dealer_id"];
				$v1=$row["dealer_name"];
				$_SESSION['dealer_name']=$v1;
				$v2=$row["NIC"];
				$v3=$row["area_no"];
				$v4=$row["address"];
				$v5=$row["salesPerson_id"];
				$v6=$row["mobileNo"];
				$v7=$row["telephoneNo"];
				$v8=$row["email"];
				$v9=$row["fax"];
			}
		}else{
			echo "<script>alert('No result found'); window.location.href='view.php'; </script>";
		}

		$sql1 = "SELECT * FROM area WHERE area_no = $v3";

		$result1= mysqli_query($connection, $sql1);

		if(mysqli_num_rows($result1) > 0){

			while($row = mysqli_fetch_assoc($result1)){
				/*	echo "id: ".$row["dealer_id"]. "Name: ".$row["dealer_name"]. "NIC: ".$row["NIC"]."<br/>";*/
				$v10=$row["area"];

			}
		}else{
			echo '<script>';
			echo 'alert("area_result")';
			echo '</script>';
		}

		$sql2 = "SELECT * FROM sales_person WHERE salesPerson_id = $v5";

		$result2= mysqli_query($connection, $sql2);

		if(mysqli_num_rows($result2) > 0){

			while($row = mysqli_fetch_assoc($result2)){
				/*	echo "id: ".$row["dealer_id"]. "Name: ".$row["dealer_name"]. "NIC: ".$row["NIC"]."<br/>";*/
				$v11=$row["F_name"];
				$v12=$row["L_name"];

			}
		}else{
			echo '<script>';
			echo 'alert("Sales Person result")';
			echo '</script>';
		}
		?>
		<div class="AddPro">
				<form action="" method="POST">
					<h1 class="add">Dealer Results</h1>
					<table id="ad">
					<tr>
						<td><b>Dealer ID : </b></td>
						<td> <?php echo $v0;?><br/></td>
					</tr>

					<tr>
						<td><b>Name : </b></td>
						<td> <?php echo $v1;?><br/></td>
					</tr>

					<tr>
						<td><b>NIC: </b></td>
						<td> <?php echo $v2;?><br/></td>
					</tr>

					<tr>
						<td><b>Area: </b></td>
						<td> <?php echo $v10;?><br/></td>
					</tr>

					<tr>
						<td><b>Address : </b></td>
						<td><?php echo $v4;?><br/></td>
					</tr>

					<tr>
						<td><b>Relevant Salesperson Name: </b></td>
						<td><?php echo $v11 ." ". $v12;?><br/></td>
					</tr>

					<tr>
						<td><b>Mobile No : </b></td>
						<td> <?php echo $v6;?><br/></td>
					</tr>

					<tr>
						<td><b>Telephone No : </b></td>
						<td> <?php echo $v7;?><br/></td>
					</tr>

					<tr>
						<td><b>Email : </b></td>
						<td><?php echo $v8;?><br/></td>
					</tr>

					<tr>
						<td><b>Fax : </b></td>
						<td><?php echo $v9;?><br/></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td>
							<a class="delete" href="dealerDelete.php?" onclick="return confirm('Are you sure you wish to delete this Record?');">Delete</a>
						</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td>  <a class="update" href="dealerUpdate.php?">Update</a>
						</td>
					</tr>
			</table>
			</form>
		</div>
		</div>
	<?php
	include '../include/footer.php';
	?>
</body>
</html>
