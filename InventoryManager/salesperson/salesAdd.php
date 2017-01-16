<?php include '../../core/init.php';
protect_page();
$role= $user_data['role'];
if ($role == "DEO") {
    echo "<script>window.location.href = '../restrict.php';</script>";
}
?>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/IM.css" type="text/css"/>
    <script   src="https://code.jquery.com/jquery-3.1.0.js"   integrity="sha256-slogkvB1K3VOkzAI8QITxV3VzpOnkeNVsKvtkYLMjfk="   crossorigin="anonymous"></script>
    <script>
$( document ).ready(function() {
     $("select#cap").click( function(){
            //var id = this.id;
            var id = $(this).children(":selected").attr("id");
            console.log(id);
            $.ajax({
                url:'getdrop2.php?data='+id,
                type:"get",
                success:function(data){

                   $("tr#trow>td#second").html("");
                $("tr#trow>td#second").html(data);
                }
            });
    });
});
</script>
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
        <div class="topnav">
            <a href="../salesperson/salep.php"><img src="../img/View.png"></a>
            <a href="../salesperson/salesAdd.php."><img src="../img/Add.png"></a>
            <a href="../salesperson/salesSearch.php."><img src="../img/Search.png"></a>
        </div>
        <?php
        require "../../database/connect.php";
        //session_start();
        $error=FALSE;
        $F_nameerr = $L_nameerr =  $NICerr = $addresserr = $area_noerr = $mobileNoerr = $telephoneNoerr = $emailerr = $DOBerr = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if(empty($_POST['area'])){
                $area_noerr = "";
                $error = TRUE;
            }else{
                $area_no = $_POST['area'];
                $dealer_id = $_POST['dealer_id'];
                $_SESSION['dealer_id'] = $dealer_id;
                $sql2 = "Select DISTINCT area_no,area from area = $area_no";
                $result2= mysqli_query($connection, $sql2);
                if (mysqli_query($connection, $sql2)){
                    while($row = mysqli_fetch_assoc($result2)){
                        if($area_no==$row['area']){
                            $a_no=$row['area_no'];
                        }
                    }
                }
            }
            if ($error==FALSE){
                /*$sql="INSERT INTO `sales_person` (`F_name`, `area_no`, `NIC`, `address`, `L_name`, `mobileNo`, `telephoneNo`, `email`,) VALUES ('$_POST[F_name]',$a_no,'$_POST[NIC]','$_POST[address]','$_POST[L_name]','$_POST[mobileNo]','$_POST[telephoneNo]','$_POST[email]')";

                /*$sql2="UPDATE `dealer` SET `salesPerson_id`= 'me add wena salespersonge id eka.mm danne na eka puluwan weida kyla' WHERE `dealer_id` =drop down eken select karapu dealerge id eka";*/
                $sql="INSERT INTO `sales_person` (`F_name`, `area_no`, `NIC`, `address`, `L_name`, `mobileNo`, `telephoneNo`, `email`) VALUES ('".$_POST['F_name']."','".$a_no."','".$_POST['NIC']."','".$_POST['address']."','".$_POST['L_name']."','".$_POST['mobileNo']."','".$_POST['telephoneNo']."','".$_POST['email']."')";
                if(mysqli_query($connection,$sql)){
                    header("Location: salesAdd.php");
                    //die();
                } else{echo "error";}
            }
        }
        ?>
        <form class="AddPro" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
                <h1 class="add">Add Salesperson</h1>
                <table id="ad">
                        <tr>
                            <td><b>First Name: <span class="error">* <?php echo $F_nameerr;?></span></b></td>
                            <td><b>Last Name: <span class="error">* <?php echo $L_nameerr;?></span></b></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="F_name" style="width: 200px" ></td>
                            <td><input type="text" name="L_name" style="width: 200px" ></td>
                        </tr>
                        <tr>
                            <td><b>NIC: <span class="error">* <?php echo $NICerr;?></span></b></td>
                            <td><b>Address: <span class="error">* <?php echo $addresserr;?></span></b></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="NIC" style="width: 200px" ></td>
                            <td><input type="text" name="address" style="width: 300px" ></td>
                        </tr>
                        <tr>
                            <td><b>Mobile No: </b></span></td>
                            <td><b>Telephone No: </span></b></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="mobileNo" style="width: 200px" ></td>
                            <td><input type="text" name="telephoneNo" style="width: 200px" ></td>
                        </tr>
                        <tr>
                            <td><b>Email: </b></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="email" style="width: 200px" ></td>
                        </tr>
                        <tr>
                            <td><b>Area: </b></td>
                            <td><b>Dealer Name:<b></td>
                        </tr>
                        <tr id= "trow">
                            <td>
                                <?php

                                echo '<select name="area" id="cap">';
                                echo '<option>     -------ALL--------   </option>';

                                $sql1 = "Select DISTINCT area_no,area from area";
                                $result1= mysqli_query($connection, $sql1);
                                while($r=mysqli_fetch_row($result1))
                                {
                                    echo '<option id=' .$r[0].'> ' . $r[1] . '</option>';
                                }
                                echo "</select>";
                                ?>
                            </td>
                            <td id="second">
                                <select name="dealer_id">
                                    <option> -------ALL--------</option>
                                </select>
                            </td>
                        </tr>
                    </form>
                </table>
        <div class="btn-align" style="padding-left: 15%">
            <button class="save" type="submit">Save</button>
            <button  class="reset" type="reset">Reset</button>
        </div>
</div>
</div>
<?php
include '../include/footer.php';
?>
</body>
</html>
