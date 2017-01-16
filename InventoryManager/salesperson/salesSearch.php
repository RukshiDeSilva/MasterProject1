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
			require "../../database/connect.php";
			//session_start();
			
			$error=FALSE;
			
			$nameerr = $v1 = "";

			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				if(empty($_POST['sales_name'])){ 
	                $nameerr = "required";
	                $error = TRUE;
				}else{
					$sales_name = $_POST['sales_name'];
					$v1 = $_POST['sales_name'];
					$_SESSION['sales_name'] = $v1;
					header("Location: sales.php");
					}
				}
		?>

				<form class="AddPro" action="" method="POST">
					<h1 class="add">Search Salesperson</h1>
					<table id="ad">
					<tr>
						<td><b>Salesperson Name:<span class="error">* <?php echo $nameerr;?></span></b></td>
					</tr>
					<tr>
						<td colspan="2" style="width: 500px">
							<input type=text name=sales_name size="30" maxlength="25" style="width: 300px;margin-right: 3%" required>
							<input type="submit" class="search" value="Search">
						</td>
					</tr>
				</form>
			</table>
	</div>
	<?php
	include '../include/footer.php';
	?>
</div>
</body>
</html>
