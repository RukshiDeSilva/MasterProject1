<html xmlns="http://www.w3.org/1999/html">
<?php include '../core/init.php';
protect_page();
?>
<?Php
$uid= $user_data['user_id'];
$role= $user_data['role'];
/*echo '$role';*/
?>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/IM.css" type="text/css"/>
</head>
<body>
<?php
include 'include/header.php';
?>
<div id="nav">
    <ul id="mainsidebar">
        <li class="sidenav">
            <div id="side">
                <a href="battery/product.php"><img src="../img/a.png" class="pro"></a>
                <span>Product Details</span>
            </div>
        </li>
        <li class="sidenav">
            <div id="side">
                <a href="stock/stock.php"><img src="../img/b.png" class="pic"></a>
                <span>Stock</span>
            </div>
        </li>
        <li class="sidenav">
            <div id="side">
                <a href="dealer/dealer.php"><img src="../img/c.png" class="pic"  onclick="myAjax()"></a>
                <span>Dealer</span>
            </div>
        </li>
        <li class="sidenav">
            <div id="side">
                <a href="salesperson/salep.php"><img src="../img/d.png" class="pic"></a>
                <span>Salesperson</span>
            </div>
        </li>
        <li class="sidenav">
            <div id="side">
                <a href="report/report.php"><img src="../img/e.png" class="pic"></a>
                <span>Reports</span>
            </div>
        </li>
    </ul>
</div>
<div id="content">
    <h1 class="login">You are logged in as : <?php echo $user_data['f_name'] .'  ' .$user_data['l_name'];?></h1>
    <?php
    include '../database/connect.php';
    $query = $connection->query("select * from users where user_id ='$uid'");
    /*$row = mysqli_fetch_assoc(mysqli_query($connection,$query));*/
    while($row = mysqli_fetch_assoc($query)){
    $v11=$row["f_name"];
    $v12=$row["l_name"];
    $v13=$row["email"];
    $v14=$row["role"];
    ?>
    <div>
        <!img class="photo" src="<--?php echo $row['image']; -- ?>
        <img class="photo" src="<?php echo $row['image'] ; ?>" >
        <?php } ?>
            <table class="user">
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
        <div class="admin">
            <a href="Do/view.php">
            <button class="deo">Data Entry Operator</button>
            </a>
            <a href="Admin/view.php">
            <button class="adm">Admin</button>
            </a>
        </div>
    </div>
</div>
<?php
include 'include/footer.php';
?>
</body>
</html>
