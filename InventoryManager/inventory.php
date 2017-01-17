<html>
<?php include '../core/init.php';
protect_page();
?>
<?Php
$uid= $user_data['user_id'];
$role= $user_data['role'];
/*echo '$role';*/
?>
<head>
    <link rel="stylesheet" href="css/IM.css" type="text/css"/> <!--style sheet linked-->
</head>
<body>
<?php
include 'include/header.php'; /*page header*/
?>
<div id="nav"> <!--black bar starts-->
    <ul id="mainsidebar"> <!--black bar behind red squares starts-->
        <li class="sidenav"> <!--red square stars-->
            <div id="side"> <!--image and span are within this div. div starts-->
                <a href="battery/product.php">
                    <img src="../img/a.png" class="pro">
                </a>
                <span>Product Details</span>
            </div> <!--image and span are within this div. div ends->
        </li> <!--red square ends-->
        <li class="sidenav">
            <div id="side">
                <a href="stock/stock.php">
                    <img src="../img/b.png" class="pic">
                </a>
                <span>Stock</span>
            </div>
        </li>
        <li class="sidenav">
            <div id="side">
                <a href="dealer/dealer.php">
                    <img src="../img/c.png" class="pic"  onclick="myAjax()">
                </a>
                <span>Dealer</span>
            </div>
        </li>
        <li class="sidenav">
            <div id="side">
                <a href="salesperson/salep.php">
                    <img src="../img/d.png" class="pic">
                </a>
                <span>Salesperson</span>
            </div>
        </li>
        <li class="sidenav">
            <div id="side">
                <a href="report/report.php">
                    <img src="../img/e.png" class="pic">
                </a>
                <span>Reports</span>
            </div>
        </li>
    </ul> <!--black bar behind red squares ends-->
</div> <!--black bar ends-->
<div id="content"> <!--content div starts-->
    <h1 class="login">You are logged in as : <?php echo $user_data['f_name'] .'  ' .$user_data['l_name'];?></h1>
    <?php
    include '../database/connect.php'; /*database connection*/
    $query = $connection->query("select * from users where user_id ='$uid'"); /**/
    while($row = mysqli_fetch_assoc($query)){
    $v11=$row["f_name"];    /*assigned variables to database rows*/
    $v12=$row["l_name"];
    $v13=$row["email"];
    $v14=$row["role"];
    ?>
    <div>
        <img class="photo" src="<?php echo $row['image'] ; ?>" > <!--get user image-->
        <?php } ?>
            <table class="user"> <!--user information display-->
                <tbody>
                <tr>
                    <td class="up">First Name</td>
                    <td class="up1"><?php echo $v11?></td>
                </tr>
                <tr>
                    <td class="up">Last Name</td>
                    <td class="up1"><?php echo $v12?></td>
                </tr>
                <tr>
                    <td class="up">Email</td>
                    <td class="up1"><?php echo $v13?></td>
                </tr>

                <tr>
                <tr>
                    <td class="up">Role</td>
                    <td class="up1"><?php echo $v14?></td>
                </tr>
                </tbody>
            </table>
     <?php 
	$role= $user_data['role'];
	
 	 if ($role == "admin") {
		echo "

        <div class='admin'>
            <a href='Do/view.php'>
            <button class='deo'>Data Entry Operator</button>
            </a>
            <a href='Admin/view.php'>
            <button class='adm'>Admin</button>
            </a>
        </div>";
}
?>		
    </div>
</div>  <!--content div ends-->
<?php
include 'include/footer.php'; /*footer included*/
?>
</body>
</html>
