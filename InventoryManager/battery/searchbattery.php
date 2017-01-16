<?php
?>
<html xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<?php include '../../core/init.php';
protect_page();
?>
<?php
$role= $user_data['role'];
?>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/IM.css" type="text/css"/>
    <!-- bxSlider Javascript file -->
    <script src="../js/jquery.bxslider.js"></script>
    <!-- bxSlider CSS file -->
    <link href="css/jquery.bxslider.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

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
                    <a href="../battery/product.php"><img src="../img/a.png" class="pro"></a>
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
        $error=FALSE;
        //$dealer_iderr = $v1 = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
                $battery_name = $_POST['battery_name'];
                $v1 = $_POST['battery_name'];
                $_SESSION['battery_name'] = $v1;
                header("Location: viewsearchbt.php");
            }
        
        ?>
        <div class="AddPro">
        <div class="ad">
            <h1 class="add">Search Product</h1>
            <table id="ad">
                <form action="" method="POST">
                    <tr>
                        <td>
                            <b>Product Name:</b>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="width: 600px">
                            <input type=text name=battery_name size="30" maxlength="25" style="width: 300px;margin-right: 3%"" required>
                            <button class="search" type="submit" name="submit" value="Search">Search</button>
                    </tr>
                </form>
        </div>
        </div>
</div>
    <?php
    include '../include/footer.php';
    ?>
</div>
</body>
</html>
