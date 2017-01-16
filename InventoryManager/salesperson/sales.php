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


	<script>

		$( document ).ready(function() {
			$("select#cap").click( function(){
				//var id = this.id;
				var id = $(this).children(":selected").attr("id");
				console.log(id);

				$.ajax({

					url:'getdrop2.php?data='+id,
					type:"get",
					success:function(data){

						$("tr#trow>td#second").html("");
						$("tr#trow>td#second").html(data);
					}


				});
			});

		});

	</script>

</head>
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
			<a href="../salesperson/salep.php"><img src="../img/View.png"></a>
			<a href="../salesperson/salesAdd.php."><img src="../img/Add.png"></a>
			<a href="../salesperson/salesSearch.php."><img src="../img/Search.png"></a>
		</div>
		<?php
		require "database/connect.php";
		//session_start();
		$x1 = $_SESSION['sales_name'];

		$pieces = explode(" ", $x1);
		//echo $pieces[0]; // piece1
		//echo $pieces[1]; // piece2

		$error=FALSE;
		$salesPerson_iderr = "";
		$x0=$v0=$v1=$v2=$v3=$v4=$v5=$v6=$v7=$v8=$v9=$v10="";
		$sql = "SELECT * FROM `sales_person` WHERE F_name = '$pieces[0]' AND L_name = '$pieces[1]'";

		$result= mysqli_query($connection, $sql);

		if(mysqli_num_rows($result) > 0){
			while($row = mysqli_fetch_assoc($result)){
				/*	echo "id: ".$row["dealer_id"]. "Name: ".$row["dealer_name"]. "NIC: ".$row["NIC"]."<br/>";*/
				$x0=$row["salesPerson_id"];
				$_SESSION['salesPerson_id']=$x0;
				$v1=$row["F_name"];
				$v2=$row["L_name"];
				$v3=$row["area_no"];
				$v4=$row["NIC"];
				$v5=$row["address"];

				$v7=$row["mobileNo"];
				$v8=$row["telephoneNo"];
				$v9=$row["email"];
			}
		}else{
			echo '<script>';
			echo 'alert("Zero Result")';
			echo '</script>';
		}

		$sql1 = "SELECT * FROM area WHERE area_no = $v3";

		$result1= mysqli_query($connection, $sql1);

		if(mysqli_num_rows($result1) > 0){

			while($row = mysqli_fetch_assoc($result1)){
				/*  echo "id: ".$row["dealer_id"]. "Name: ".$row["dealer_name"]. "NIC: ".$row["NIC"]."<br/>";*/
				$v10=$row["area"];

			}
		}else{
			echo '<script>';
			echo 'alert("area_result")';
			echo '</script>';
		}
		?>
				<form class="AddPro" action="" method="POST">
					<h1 class="add">Salesperson Details</h1>
					<table id="ad">
					<tr>
						<td><b>Salesperson Id : </b></td>
						<td><?php echo $x0;?><br/></td>
					</tr>
					<tr>
						<td>
							<b>First Name :</b>
						</td>
						<td> <?php echo $v1;?><br/></td>
					</tr>
					<tr>
						<td>
							<b>Last Name: </b>
						</td>
						<td> <?php echo $v2;?><br/></td>
					</tr>
					<tr>
						<td>
							<b>Area: </b>
						</td>
						<td> <?php echo $v10;?><br/></td>
					</tr>
					<tr>
						<td>
							<b>NIC : </b>
						</td>
						<td> <?php echo $v4;?><br/></td>
					</tr>
					<tr>
						<td>
							<b>Address : </b>
						</td>
						<td> <?php echo $v5;?><br/></td>
					</tr>

					<tr>
						<td>
							<b>Mobile No : </b>
						</td>
						<td> <?php echo $v7;?><br/></td>
					</tr>
					<tr>
						<td>
							<b>Telephone No : </b>
						</td>
						<td> <?php echo $v8;?><br/></td>
					</tr>
					<tr>
						<td>
							<b>Email : </b>
						</td>
						<td> <?php echo $v9;?><br/></td>
					</tr>
			</table>
			</form>
		<div class="tbl">
			<a class="link" href="salesUpdate.php?">
			<button class="update" type="submit">Update</button>
			</a>
			<a class="link" href="salesDelete.php?" onclick="return confirm('Are you sure you wish to delete this Record?');">
			<button  class="reset" type="reset">Delete</button>
			</a>
		</div>
	</div>
<?php
include '../include/footer.php';
?>
</body>
</html>
