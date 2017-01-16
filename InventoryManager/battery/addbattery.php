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
<!--javascript form validation -->
<script type="text/javascript">
    function validate(){
        if (document.Form.battery_type.value == ""){
            alert("Please fill out this field");
            document.Form.battery_type.focus() ;
            return false;
        } if (document.Form.battery_name.value == ""){
            alert("Please fill out this field!");
            document.Form.battery_name.focus() ;
            return false;
        } if (document.Form.warranty_period.value == ""){
            alert("Please fill out this field!");
            document.Form.warranty_period.focus() ;
            return false;
        }
        if (document.Form.amperehour_Value.value == ""){
            alert("Please fill out this field!");
            document.Form.amperehour_Value.focus() ;
            return false;
        }
        if (document.Form.voltage_Value.value == "") {
            alert("Please fill out this field!")
            document.Form.voltage_Value.focus();
            return false;
        }
        if (document.Form.item_Type.value == "") {
            alert("Please fill out this field!")
            document.Form.item_Type.focus();
            return false;
        }
    }
</script>
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
        require "../../core/database/connect.php";
        if (isset($_POST["submit"])) {
            $battery_type = $_POST['battery_type'];
            $battery_name =$_POST['battery_name'];
            $warranty_period=$_POST['warranty_period'];
            $amperehour_Value=$_POST['amperehour_Value'];
            $VoltageValue=$_POST['voltage_Value'];
            $item_Type=$_POST['item_Type'];
            //Process the image that is uploaded by the user
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["imageUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            if (move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["imageUpload"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
            $image=basename( $_FILES["imageUpload"]["name"],".png"); // used to store the filename in a variable
            $sql = "INSERT INTO battery_description (battery_type,battery_name,warranty_period,amperehour_Value,voltage_Value,item_Type,imageUpload) VALUES ('$battery_type','$battery_name','$warranty_period','$amperehour_Value','$VoltageValue',' $item_Type','$image')";
            if (mysqli_query($conn, $sql)) {
                echo "";
            }
            else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
            /*header("Location:inventory.php");*/
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
                        <td id="data"><input type="text" name="battery_name" style="width: 200px" required></td>
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
                        <td id="data"><input type="text" name="amperehour_Value" style="width: 200px" required></td>
                    </tr>

                    <tr>
                        <td id="data">Voltage Value:</td>
                        <td id="data"><input type="text" name="voltage_Value" style="width: 200px" required></td>
                    </tr>
                    <tr>
                        <td id="data">Item Type:</td>
                        <td id="data"><input type="text" name="item_Type" style="width: 200px" required></td>
                    </tr>
                    <tr>
                        <td id="data">Insert a image here: </td>
                        <td id="data"><input type="file" name="imageUpload" id="imageUpload">
                    </tr>
        </form>
        </table>
        <div class="btn-align">
            <button class="save" name="submit" value="send">Save</button>
            <button  class="reset" type="reset">Reset</button>
        </div>
    </div>
</div>
    <?php
    include '../include/footer.php';
    ?>
</div>
</body>
</html>
