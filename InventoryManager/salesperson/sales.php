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
	<script   src="https://code.jquery.com/jquery-3.1.0.js"   integrity="sha256-slogkvB1K3VOkzAI8QITxarea_noVzpOnkeNVsKvtkYLMjfk="   crossorigin="anonymous"></script>


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

		/*getting particular salesperson name from view.php to view deatails*/
		$sales_name = $_SESSION['sales_name'];

		/*spliting salesperson name to get f_name and l_name separately*/
		$pieces = explode(" ", $sales_name);
		

		$error=FALSE;
		
		/*fetch data from salesperson table*/
		$sql = "SELECT * FROM `sales_person` WHERE F_name = '$pieces[0]' AND L_name = '$pieces[1]'";

		$result= mysqli_query($connection, $sql);

		if(mysqli_num_rows($result) > 0){
			while($row = mysqli_fetch_assoc($result)){
				
				$salesperson_id=$row["salesPerson_id"];
				$_SESSION['salesPerson_id']=$salesperson_id;
				$f_name=$row["F_name"];
				$l_name=$row["L_name"];
				$area_no=$row["area_no"];
				$nic=$row["NIC"];
				$address=$row["address"];

				$mobile_no=$row["mobileNo"];
				$telephone_no=$row["telephoneNo"];
				$email=$row["email"];
			}
		}else{
			echo '<script>';
			echo 'alert("Zero Result")';
			echo '</script>';
		}

		/*selecting area for particular area no*/
		$sql1 = "SELECT * FROM area WHERE area_no = $area_no";

		$result1= mysqli_query($connection, $sql1);

		if(mysqli_num_rows($result1) > 0){

			while($row = mysqli_fetch_assoc($result1)){
				
				$area=$row["area"];

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
						<td><?php echo $salesperson_id;?><br/></td>
					</tr>
					<tr>
						<td>
							<b>First Name :</b>
						</td>
						<td> <?php echo $f_name;?><br/></td>
					</tr>
					<tr>
						<td>
							<b>Last Name: </b>
						</td>
						<td> <?php echo $l_name;?><br/></td>
					</tr>
					<tr>
						<td>
							<b>Area: </b>
						</td>
						<td> <?php echo $area;?><br/></td>
					</tr>
					<tr>
						<td>
							<b>NIC : </b>
						</td>
						<td> <?php echo $nic;?><br/></td>
					</tr>
					<tr>
						<td>
							<b>Address : </b>
						</td>
						<td> <?php echo $address;?><br/></td>
					</tr>

					<tr>
						<td>
							<b>Mobile No : </b>
						</td>
						<td> <?php echo $mobile_no;?><br/></td>
					</tr>
					<tr>
						<td>
							<b>Telephone No : </b>
						</td>
						<td> <?php echo $telephone_no;?><br/></td>
					</tr>
					<tr>
						<td>
							<b>Email : </b>
						</td>
						<td> <?php echo $email;?><br/></td>
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
