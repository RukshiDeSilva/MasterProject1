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
        //session_start();
        $v = $_SESSION['battery_name'];
        //echo $v;


        $sql = "SELECT * FROM battery_description WHERE battery_name = '$v'";

        $result= mysqli_query($connection, $sql);
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                /*  echo "id: ".$row["dealer_id"]. "Name: ".$row["battery_name"]. "battery_type: ".$row["battery_type"]."<br/>";*/
                
                $h1=$row["battery_name"];
                $h2=$row["battery_type"];
                $h6=$row["warranty_period"];
                $h7=$row["voltage_Value"];
                $h8=$row["amperehour_Value"];
                $h9=$row["item_Type"];
            }
        }else{
            echo "Zero results";
        }

        

        

        $error=FALSE;
        

        if ($_SERVER["REQUEST_METHOD"] == "POST") {


            $battery_name = $_POST['battery_name'];
            
            $battery_type = $_POST['battery_type'];

            $warranty_period = $_POST['warranty_period'];
            
            $voltage_Value = $_POST['voltage_Value'];

            $amperehour_Value = $_POST['amperehour_Value'];
                
            $item_Type = $_POST['item_Type'];
            

            if ($error==FALSE){

                //$sql="UPDATE 'dealer' SET battery_name='$_POST[battery_name]', battery_type='$_POST[battery_type]', address='$_POST[address]', salesPerson_id='$_POST[salesPerson_id]', warranty_period='$_POST[warranty_period]', voltage_Value='$_POST[voltage_Value]', amperehour_Value='$_POST[amperehour_Value]', item_Type='$_POST[item_Type]' WHERE dealer_id='$v'";
                $sql = "UPDATE `battery_description` SET `battery_name`='$_POST[battery_name]',`amperehour_Value`='$_POST[amperehour_Value]',`voltage_Value`='$_POST[voltage_Value]',`item_Type`='$_POST[item_Type]'WHERE `battery_name`='$v'";
                if(mysqli_query($connection,$sql)){
                    //die();
                    header("Location: searchbattery.php");
                } else{echo "error";}
            }
        }

        ?>
        <form class="AddPro" action="" method="POST" enctype="multipart/form-data" name="Form" onsubmit="return(validate());">
            <table id="ad">
                <h1 class="add">Add Product</h1>
                    <tr>
                        <td id="data">Product type:</td>
                        <td id="data"> <select name="battery_type">
                                <option value="Exide">Exide</option>
                                <option value="Lucas">Lucas</option>
                                <option value="Dagenite">Dagenite</option>
                        </td>
                    </tr>
                    <tr>
                        <td id="data">Product Name:</td>
                        <td id="data"><input type="text" name="battery_name" style="width: 200px" value="<?php echo $h1; ?>" ></td>
                    </tr>
                    <tr>
                        <td id="data">Warranty period:</td>
                        <td id="data"><select name="warranty_period">
                                <option value="1year">1 year</option>
                                <option value="2year">2 year</option>
                        </td>
                    </tr>
                    <tr>
                        <td id="data">Ampere-hour Value:</td>
                        <td id="data"><input type="text" name="amperehour_Value" style="width: 200px" value="<?php echo $h8; ?>" ></td>
                    </tr>

                    <tr>
                        <td id="data">Voltage Value:</td>
                        <td id="data"><input type="text" name="voltage_Value" style="width: 200px" value="<?php echo $h7; ?>" ></td>
                    </tr>
                    <tr>
                        <td id="data">Item Type:</td>
                        <td id="data"><input type="text" name="item_Type" style="width: 200px" value="<?php echo $h9; ?>" ></td>
                    </tr>
                    <tr>
                        <td id="data">Insert a image here: </td>
                        <td id="data"><input type="file" name="imageUpload" id="imageUpload">
                    </tr>
                    <tr>
                        <td id="data"></td>
                        <td id="data"><button class="submit" name="submit" value="send">Submit</button></td>
                        <td id="data"><button class="reset" type="reset">Reset</button></td>
                    </tr>
        
        </table>
        </form>
    <?php
include '../include/footer.php';
?>
</div>
</body>
</html>
