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
        <ul class="re-menu">
            <li>
                <a href="salesreport2.php">
                    <span class="re-icon"><img src="../img/sm.png"> </span>
                    <div class="re-content">
                        <h3 class="re-sub">Sales Report</h3>
                    </div>
                </a>
            </li>
            <li>
                <a href="manufacturenxt.php">
                    <span class="re-icon"><img src="../img/manu.png"> </span>
                    <div class="re-content">
                        <h3 class="re-sub">Manufacture Report</h3>
                    </div>
                </a>
            </li>
            <li>
                <a href="replacenxt.php">
                    <span class="re-icon"><img src="../img/dd.png"> </span>
                    <div class="re-content">
                        <h3 class="re-sub">Replacement Report</h3>
                    </div>
                </a>
            </li>
            <li>
                <a href="defectnxt.php">
                    <span class="re-icon"><img src="../img/w.png"></span>
                    <div class="re-content">
                        <h3 class="re-sub">Defect Report</h3>
                    </div>
                </a>
            </li>
            <li>
                <a href="reportnxt.php">
                    <span class="re-icon"><img src="../img/st.png"></span>
                    <div class="re-content">
                        <h3 class="re-sub">Graphs</h3>
                    </div>
                </a>
            </li>
        </ul>
    </div>
    <?php
    include '../include/footer.php';
    ?>
</div>
</body>
</html>
