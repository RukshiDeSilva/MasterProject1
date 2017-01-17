<html>
<?php include '../../core/init.php';
protect_page();
?>
<?php
$role= $user_data['role'];
?>
<head>

    <link rel="stylesheet" href="../css/IM.css" type="text/css"/>

    <script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

</head>
<body>
<?php
include '../include/header.php'; /*page header*/
?>
<div id="nav"> <!--black bar starts-->
    <ul id="mainsidebar"> <!--black bar behind red squares starts-->
        <li class="sidenav"> <!--red square stars-->
            <div id="side"> <!--image and span are within this div. div starts-->
                <a href="../battery/product.php">
                    <img src="../img/a.png" class="pro">
                </a>
                <span>Product Details</span>
            </div> <!--image and span are within this div. div ends->
        </li>  <!--red square ends-->
        <li class="sidenav">
            <div id="side">
                <a href=../../InventoryManager/stock/stock.php">
                    <img src="../img/b.png" class="pic">
                </a>
                <span>Stock</span>
            </div>
        </li>
        <li class="sidenav">
            <div id="side">
                <a href="../dealer/dealer.php">
                    <img src="../img/c.png" class="pic"  onclick="myAjax()">
                </a>
                <span>Dealer</span>
            </div>
        </li>
        <li class="sidenav">
            <div id="side">
                <a href="../salesperson/salep.php">
                    <img src="../img/d.png" class="pic">
                </a>
                <span>Salesperson</span>
            </div>
        </li>
        <li class="sidenav">
            <div id="side">
                <a href="../report/report.php">
                    <img src="../img/e.png" class="pic">
                </a>
                <span>Reports</span>
            </div>
        </li>
    </ul> <!--black bar behind red squares ends-->
</div> <!--black bar ends-->
<div id="content"> <!--content div starts-->
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
        <div id="admn">
        <form class="AddPro" action="" method="POST" enctype="multipart/form-data" name="Form" onsubmit="return(validate());">
            <div id="add-admin"> 
                <a class="enter" href="add.php">Add</a> <!--add, search , backup, back buttons align div start-->
                <a class="search" href="view.php">Search</a>
                <a class="update" href="backup.php">Backups</a>
                <a class="reset" href="../inventory.php">Back</a>
            </div> <!--add, search , backup, back buttons align div end-->
            <table id="add-adm"> <!--table content align-->
                <h1 class="add">Add admin</h1> <!--h1 style-->
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
            </table>
        </form>
            <div class="admin"> <!--submit and reset buttons align div start-->
            <button class="submit" name="submit" value="send">Submit</button>
            <button class="reset" type="reset">Reset</button>
        </div> <!--submit and reset buttons align div end-->
</div>
</div>
    <?php
    include '../include/footer.php'; /*footer included*/
    ?>
</div>
</body>
</html>
