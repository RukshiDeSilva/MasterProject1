

<html>
<?php include '../../core/init.php';
protect_page();
?>
<?php
$role= $user_data['role'];
?>
<head>

    <link rel="stylesheet" href="../css/IM.css" type="text/css"/> <!--linked stylesheet-->

    <script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    </head>
<body>
<?php
include '../include/header.php'; /*page header*/
?>
<div id="nav"> <!--black bar starts-->
    <ul id="mainsidebar"> <!--black bar behind red squares starts-->
        <li class="sidenav"> <!--red square stars-->
            <div id="side"> <!--image and span are within this div. div starts-->
                <a href="../battery/product.php">
                    <img src="../img/a.png" class="pro">
                </a>
                <span>Product Details</span>
            </div> <!--image and span are within this div. div ends->
        </li> <!--red square ends-->
        <li class="sidenav">
            <div id="side">
                <a href="../stock/stock.php">
                    <img src="../img/b.png" class="pic">
                </a>
                <span>Stock</span>
            </div>
        </li>
        <li class="sidenav">
            <div id="side">
                <a href="../dealer/dealer.php">
                    <img src="../img/c.png" class="pic"  onclick="myAjax()">
                </a>
                <span>Dealer</span>
            </div>
        </li>
        <li class="sidenav">
            <div id="side">
                <a href="../salesperson/salep.php">
                    <img src="../img/d.png" class="pic">
                </a>
                <span>Salesperson</span>
            </div>
        </li>
        <li class="sidenav">
            <div id="side">
                <a href="../report/report.php">
                    <img src="../img/e.png" class="pic">
                </a>
                <span>Reports</span>
            </div>
        </li>
    </ul> <!--black bar behind red squares ends-->
</div> <!--black bar ends-->
<div id="content"> <!--content div starts-->
		<?php
		require "../../database/connect.php";
		//session_start();
		$error=FALSE;
		$dealer_iderr = $v1 = "";
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if(empty($_POST['dealer_name'])){
				$dealer_iderr = "";
				$error = TRUE;
			}else{
				
				$dealer_name = $_POST['dealer_name'];
				$v1 = $_POST['dealer_name'];
				$_SESSION['dealer_name'] = $v1;
				header("Location: serchAdmin.php");
			}
		}
		?>
		<div class="AddPro"> <!--form alignment start-->
            <div id="admin"> <!--add,search,backups and back buttons alignment div start-->
               <a class="enter" href="add.php">Add</a>
                <a class="search" href="view.php">Search</a>
                <a class="update" href="backup.php">Backups</a>
                <a class="reset" href="../inventory.php">Back</a>
            </div> <!--add,search,backups and back buttons alignment div end-->
			<h1 class="add">Search Admin</h1>
				<form action="" method="POST">
                    <table id="ad"> <!--table content alignment-->
					<tr>
						<td>
							<b>Admin Name:<span class="error">* <?php echo $dealer_iderr;?></span></b>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<input type="text" name="dealer_name" size="30" maxlength="25" style="width: 300px" required>
							<input class="search" type="submit" name="submit" value="Search">
					</tr>
                    </table>
				</form>
         </div> <!--form alignment div end-->
</div> <!--content div end-->
    <?php
    include '../include/footer.php'; /*footer included*/
    ?>
</body>
</html>
