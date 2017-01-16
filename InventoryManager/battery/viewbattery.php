
<?php include '../../core/init.php';
protect_page();
?>
<?php
$role= $user_data['role'];
?>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/IM.css" type="text/css"/>

</head>
<body>
    <?php
    include '../include/header.php'
    ?>
    <div class="row">
        <div class="two">
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
            <a href="../battery/viewbattery.php"><img src="../img/View.png"></a>
            <a href="../salesperson/addsalep.php"><img src="../img/Add.png"></a>
            <a href="../salesperson/searchsalep.php"><img src="../img/Search.png"></a>
        </div>
        <div class="form">
            <div class="seperate">
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "warranty_management";

                // Create connection
                $conn = mysqli_connect($servername, $username, $password, $dbname);
                // Check connection
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                $sql = "SELECT battery_type, battery_name, warranty_period,amperehour_Value,voltage_Value,item_Type,imageUpload FROM battery_description";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo "<style>
                            table {
                                border-collapse: collapse;
                                width: 100%;
                            }
                            
                            th, td {
                                text-align: left;
                                padding: 8px;
                            }
                            
                            tr:nth-child(even){background-color: #f2f2f2}
                            
                            th {
                                background-color:#990000;
                                color: white;
                            }
                            tbody {
                                height: 100px;      
                                overflow-y: auto;   
                                overflow-x: hidden;  
                            }
                            </style>
                            </head>
                            <body>
                            <table>
                            <tr>
                            <th>Battery type</th>
                            <th>Battery name</th>
                            <th>Warranty period</th>
                            <th>Ampere-hour Value</th>
                            <th>Voltage Value</th>
                            <th>Item Type</th>
                            <th>Image</th>
                            </tr>";
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>".$row["battery_type"]."</td>
                                <td>".$row["battery_name"]." </td>
                                <td>".$row["warranty_period"]."</td>
                                <td>".$row["amperehour_Value"]."</td>
                                <td>".$row["voltage_Value"]."</td>
                                <td>".$row["item_Type"]."</td>
                                <td><img src='uploads/$row[imageUpload].png' height='75px' width='100px'></td>
                                </tr>";
                    }
                    echo "</table></body></html>";
                } else {
                    echo "0 results";
                }
                $conn->close();
                ?>
            </div>
        </div>
    </div>
</body>
</html>
    <?php
    include '../include/footer.php';
    ?>
</div>