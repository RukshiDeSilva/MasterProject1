<!DOCTYPE html>

 <?php include '../../core/init.php';
      protect_page(); 
	  include 'header.php';
      ?>

<html lang="en">
    <head>
		<meta charset="utf-8">
	   
		<link rel="stylesheet" href="css/style1.css" media="screen" type="text/css" />
		 <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
		<script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  
	</head>


	<div id="body">
		<div id="navigation"></div>
		<nav>
			<ul id="mainsidebar">
				<li class="var_nav">
					<div class="link_bg"></div>
					<div class="link_title" id="pd">

						<a href="../inventory.php" id="pd" style="top: 1px;
									display:block;
									position:absolute;
									float:left;
									font-family:arial;
									color:#1C1C1C;
									text-decoration:none;
									width:100%;
									height:70px;
									text-align:center;"><img class= "pic" src="../img/Back.png" align="middle"><span>Back</span></a>
					</div>
				</li>
				<li class="var_nav">
					<div class="link_bg"></div>
					<div class="link_title" >

						<a href= "css/entermanufac.php" id="stock" style="top: 10px;
									display:block;
									position:absolute;
									float:left;
									font-family:arial;
									color:#1C1C1C;
									text-decoration:none;
									width:100%;
									height:70px;
									text-align:center;"><img class= "pic" src="../img/manufac.png" align="middle"><span>Manufature Products</span></a>
					</div>
				</li>
				<li class="var_nav">
					<div class="link_bg"></div>
					<div class="link_title" id="dealer_title" >

						<a href="entersold.php" id="dealer" style="top: 10px;
									display:block;
									position:absolute;
									float:left;
									font-family:arial;
									color:#1C1C1C;
									text-decoration:none;
									width:100%;
									height:70px;
									text-align:center;"><img class= "pic" src="../img/Sold.png" align="middle"><span>Sold Products</span></a>
					</div>
				</li>
				<li class="var_nav">
					<div class="link_bg"></div>
					<div class="link_title" >

						<a href="#" id="salep" style="top: 10px;
									display:block;
									position:absolute;
									float:left;
									font-family:arial;
									color:#1C1C1C;
									text-decoration:none;
									width:100%;
									height:70px;
									text-align:center;"><img class= "pic" src="../img/stockH.png" align="middle"><span>Stock In Hand</span></a>
					</div>
				</li>

		</nav>


		</nav>
	</div>
		<div class="content">

			<div class="form">
				<div class="this">

				<section style="width:60% ;margin-left:10% "> <!--for demo wrap-->
					<h1 style="font-size: 30px;
							color: #000;
							text-transform: uppercase;
							font-weight: 300;
							text-align: center;margin-left:10%">Stock in Hand</h1>
					


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
$sql = "SELECT battery_type,battery_name,current_stock FROM stock_in_hand GROUP BY battery_type";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "
            <style>
        table{
            width:80%;
            table-layout:fixed;
            margin-left :20%;
            
        
             
        }
        .tbl-header{
            background-color: rgba(255,255,255,0.3);
            border: 1px solid #c2c2a3;
             margin-left :20%;
            
        }
        th{
            font-size: 50px;
            font-weight: bold;
            padding: 20px 15px;
            text-align: center;
            font-weight: 500;
            font-size: 15px;
            color: #fff;
            text-transform: uppercase;
            background-color: #990000;
        }
        td{
            padding: 15px;
            text-align:left;
            vertical-align:middle;
            font-weight: 300;
            font-size: 13px;
            color: #000;
            border-bottom: 1px solid #c2c2a3;
        }


        /* demo styles */

        @import url(http://fonts.googleapis.com/css?family=Roboto:400,500,300,700);
        body{
            font-family: 'Roboto', sans-serif;
        }

    </style>

				<div  class='tbl-header'>
						<table cellpadding='0' cellspacing='0' border='0'>  
							<table>

                        <thead>
                        <tr>
                            <th>Battery Type</th>
                            <th>Battery Name</th>
                            <th>Available Stock</th>

                        </tr>
                        </tr>
                        </thead>
                </div>";
                 // output data of each row
    while($row = $result->fetch_assoc()) {
             echo "    <tbody>
                <tr><td>".$row["battery_type"]."</td><td>".$row["battery_name"]."</td><td>".$row["current_stock"]."</td></tr>"; }
    echo "
                </tbody></table>
        </div>
</section>


</div>
</div>


</div>     
</body>
</html>";
} else {
    echo "0 results";
}
$conn->close();


?>
               
<?php
include '../../include/footer.php';
?>
		<div>
	</body>
<html>
              
     



