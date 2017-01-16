<html>
<?php include '../../core/init.php';
protect_page();
?>
<?php
$role= $user_data['role'];
?>
<?php
include_once "connection.php";
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
    <style> 
select {
    width: 20%;
    padding: 16px 20px;
    border: none;
    border-radius: 4px;
    background-color: #C0C0C0;
}
input[type=submit] {
    background-color: #5E5E5E;
    border: none;
    color: white;
    padding: 16px 32px;
    text-decoration: none;
    margin: 4px 2px;
    cursor: pointer;
}
</style>
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
    <div class="report">
    <div id="content">
   <form action="sales_report.php" method="post">
     <b>Area:<b>
        <?php 
                                                      
        echo '<select name="area" id="cap" style="font-color:black;">';
        echo '<option>     -------ALL--------   </option>';
                                                      
        $sql1 = "Select DISTINCT area_no,area from area";
        $query1= mysqli_query($conn, $sql1);
        while($r=mysqli_fetch_row($query1)){ 
        echo '<option id=' .$r[0].'> ' . $r[1] . '</option>';

}
                                                 
        echo "</select>";
        echo" ";
        echo"Year:";
        echo '<select name="year">';
                                                        
        $year = date("Y") - 3; 
        for ($i = 0; $i <= 3; $i++) {
        echo "<option>$year</option>"; 
        $year++;
    }
                                                        
        echo '</select>';
        echo" ";
        echo"Month:";
        echo '<select name="month">';

        echo '<option value="1">January</option>';
        echo '<option value="2">February</option>';
        echo '<option value="3">March</option>';
        echo '<option value="4">April</option>';
        echo '<option value="5">May</option>';
        echo '<option value="6">June</option>';
        echo '<option value="7">July</option>';
        echo '<option value="8">August</option>';
        echo '<option value="9">September</option>';
        echo '<option value="10">October</option>';
        echo '<option value="11">November</option>';
        echo '<option value="12">December</option>';

        echo '</select>';

            ?>
                                                        
                                                     

                                        
                                            
<input type="submit" value="Submit" name="submit">
                                        
    </form>
  

    </div>
    </div>
</div>
<?php
include '../include/footer.php';
?>
</body>
</html>
