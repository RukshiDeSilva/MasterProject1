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
      
        

        <?php
        require "../../core/database/connect.php";

        if (isset($_POST["submit"])) {

            $fname = $_POST['fname'];
            $lname =$_POST['lname'];
            $address=$_POST['address'];
            $tpNo=$_POST['tpno'];
            $nic=$_POST['nic'];
            $fax=$_POST['email'];
            $uname=$_POST['uname'];
            $password=$_POST['password'];


            $sql = "INSERT INTO users (f_name,l_name,address,telephoneNo,nic,email,username,password) VALUES ('$fname','$lname','$address','$tpNo','$nic',' $email','$uname','$password')";
            if (mysqli_query($conn, $sql)) {
                echo "";
            }
            else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
            header("Location:inventory.php");
        }
        ?>
        <form class="AddPro" action="" method="POST" enctype="multipart/form-data" name="Form" onsubmit="return(validate());">
               <a href="add.php">Add</a>
               <a href="view.php">Search</a>
                <a href="backup.php">Backups</a>
                <a href="../inventory.php">Back</a>

      
                        </br> </br>
            <table id="ad">
                <h1 class="add">Add admin</h1>
                    
                    <tr>
                        <td id="data">First Name:</td>
                        <td id="data"><input type="text" name="fname" style="width: 200px" required></td>
                    </tr>
                    <tr>
                        <td id="data">Last Name:</td>
                        <td id="data"><input type="text" name="lname" style="width: 200px" required></td>
                    </tr>
                    <tr>
                        <td id="data">Address:</td>
                        <td id="data"><input type="text" name="address" style="width: 200px" required></td>
                    </tr>
                    <tr>
                        <td id="data">Mobile:</td>
                        <td id="data"><input type="text" name="tpno" style="width: 200px" required></td>
                    </tr><tr>
                        <td id="data">NIC:</td>
                        <td id="data"><input type="text" name="nic" style="width: 200px" required></td>
                    </tr><tr>
                        <td id="data">email:</td>
                        <td id="data"><input type="text" name="fax" style="width: 200px" required></td>
                    </tr><tr>
                        <td id="data">User Name:</td>
                        <td id="data"><input type="text" name="uname" style="width: 200px" required></td>
                    </tr><tr>
                        <td id="data">Password:</td>
                        <td id="data"><input type="password" name="password" style="width: 200px" required></td>
                    </tr>
                   
                    <tr>
                        <td></td><td></td><td></td><td></td><td></td><td></td>
                        <td id="data"><button class="submit" name="submit" value="send">Submit</button></td>
                        <td id="data"><button class="reset" type="reset">Reset</button></td>
                    </tr>
        </form>
        </table>
    </div>
</div>
    <?php
    include '../include/footer.php';
    ?>
</div>
</body>
</html>
