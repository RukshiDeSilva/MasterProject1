<?php
?>
<html>
<?php include '../../core/init.php';
protect_page();
?>
<?php
$role= $user_data['role'];
?>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/IM.css" type="text/css"/>
	<script   src="https://code.jquery.com/jquery-3.1.0.js"   integrity="sha256-slogkvB1K3VOkzAI8QITxV3VzpOnkeNVsKvtkYLMjfk="   crossorigin="anonymous"></script>
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
            <a href="product.php"><img src="../img/View.png"></a>
            <a href="addbattery.php"><img src="../img/Add.png"></a>
            <a href="searchbattery.php"><img src="../img/Search.png"></a>
        </div>
		<?php
		require "../../database/connect.php";
		/*session_start();*/
		$v1 = $_SESSION['battery_name'];
		$error=FALSE;

		//$dealer_iderr = "";
		$v0=$v2=$v3=$v4=$v5=$v6=$v7=$v8=$v9=$zero="";
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$battery_name = $_POST['battery_name'];
		}
		/*if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if(empty($_POST['dealer_id'])){
                $dealer_iderr = "";
                $error = TRUE;
			}else{
				$dealer_id = $_POST['dealer_id'];
				}
			if ($error==FALSE){*/
		$sql = "SELECT * FROM battery_description WHERE battery_name = '$v1'";

		$result= mysqli_query($connection, $sql);
		if(mysqli_num_rows($result) > 0){
			while($row = mysqli_fetch_assoc($result)){
				/*	echo "id: ".$row["dealer_id"]. "Name: ".$row["battery_name"]. "NIC: ".$row["NIC"]."<br/>";*/
				$v0=$row["battery_type"];
				$v1=$row["battery_name"];
				$_SESSION['battery_name']=$v1;
				$v2=$row["warranty_period"];
				$v4=$row["voltage_Value"];
				$v6=$row["amperehour_Value"];
				$v7=$row["item_Type"];
				
			}
		}else{
			echo "<script>alert('No result found'); window.location.href='searchbattery.php'; </script>";
		}


		
		?>
		<div class="AddPro">
				<form action="" method="POST">
					<h1 class="add">Product Results</h1>
					<table id="ad">
					<tr>
						<td><b>Battery Type : </b></td>
						<td> <?php echo $v0;?><br/></td>
					</tr>

					<tr>
						<td><b>Battery Name : </b></td>
						<td> <?php echo $v1;?><br/></td>
					</tr>

					<tr>
						<td><b>Warranty Period: </b></td>
						<td> <?php echo $v2;?><br/></td>
					</tr>

					<tr>
						<td><b>Ampherehour Value: </b></td>
						<td> <?php echo $v6;?><br/></td>
					</tr>

					<tr>
						<td><b>Voltage Value : </b></td>
						<td><?php echo $v4;?><br/></td>
					</tr>

					

					<tr>
						<td><b>Item Type : </b></td>
						<td> <?php echo $v7;?><br/></td>
					</tr>

					
						<td></td>
						<td></td>
						<td></td>
						<td>
							
						</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td>  <a class="update" href="upbattery.php?">Update</a>
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
