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
    
    
        <!--<?php
        require "../../database/connect.php";
        session_start();
        $v = $_SESSION['dealer_name'];
        //echo $v;


        $sql = "SELECT * FROM users WHERE f_name = '$v'";

        $result= mysqli_query($connection, $sql);
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                /*  echo "id: ".$row["dealer_id"]. "Name: ".$row["dealer_name"]. "NIC: ".$row["NIC"]."<br/>";*/
                $h0=$row["user_id"];
                $h1=$row["f_name"];
                $h2=$row["l_name"];
                $h3=$row["email"];
                $h4=$row["address"];
                
                
                $h7=$row["telephoneNo"];
                $h8=$row["nic"];
                $h9=$row["username"];
                 $h10=$row["username"];

            }
        }else{
            echo "Zero results";
        }


       
    

        $error=FALSE;
        $dealer_nameerr = $area_noerr =  $NICerr = $addresserr = $salesPerson_iderr = $mobileNoerr = $telephoneNoerr = $emailerr = $faxerr = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {


            if(empty($_POST['f_name'])){
                $dealer_nameerr = "";
                $error = TRUE;
            }else{
                $dealer_name = $_POST['f_name'];
            }





            if(empty($_POST['nic'])){
                $NICerr = "";
                $error = TRUE;
            }else{
                $NIC = $_POST['nic'];

            }



            if(empty($_POST['address'])){
                $addresserr = "";
                $error = TRUE;
            }else{
                $address = $_POST['address'];
            }

             if(empty($_POST['username'])){
                $addresserr = "";
                $error = TRUE;
            }else{
                $address = $_POST['username'];
            }

             if(empty($_POST['password'])){
                $addresserr = "";
                $error = TRUE;
            }else{
                $address = $_POST['password'];
            }






            if(empty($_POST['telephoneNo'])){
                $mobileNoerr = "";
                $error = TRUE;
            }else{
                $mobileNo = $_POST['telephoneNo'];
            }

           

            if(empty($_POST['email'])){
                $emailerr = "";
                $error = TRUE;
            }else{
                $email = $_POST['email'];
                if (strpos($email, '@') == FALSE) {
                    $emailerr =  "Invalid email address";
                    $error = TRUE;
                }
            }

            if(empty($_POST['l_name'])){
                $faxerr = "";
                $error = TRUE;
            }else{
                $fax = $_POST['l_name'];
            }

            if ($error==FALSE){

                //$sql="UPDATE 'dealer' SET dealer_name='$_POST[dealer_name]', NIC='$_POST[NIC]', address='$_POST[address]', salesPerson_id='$_POST[salesPerson_id]', mobileNo='$_POST[mobileNo]', telephoneNo='$_POST[telephoneNo]', email='$_POST[email]', fax='$_POST[fax]' WHERE dealer_id='$v'";
                $sql = "UPDATE `users` SET `f_name`='$_POST[f_name]',`l_name`='$_POST[l_name]',`address`='$_POST[address]',`telephoneNo`='$_POST[telephoneNo]',`username`='$_POST[username]',`email`='$_POST[email]',`password`='$_POST[password]' WHERE `f_name`='$v'";
                if(mysqli_query($connection,$sql)){
                    //die();
                    header("Location: dealerSearch.php");
                } else{echo "error";}
            }
        }

        ?>-->
        <div class="ad">
            <form class="AddPro" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" id="hello" name= "myForm" onsubmit="return(validate());">
                <h1 class="add">Update Admin</h1>
                <table id="ad">
                    
                       

                    <tr>
                        <td>
                            <b>First Name:</b>
                        </td>
                        <td>
                            <b>Last Name:</b>
                        </td>
                    </tr>

                    <tr>
                        <td width="400px">
                            <input type="text" name="dealer_name" style="width: 300px" value="<?php echo $h1; ?>">
                        </td>
                        <td>
                            <input type="text" name="l_name" style="width: 200px" value="<?php echo $h2; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <b> Address:</b>
                        </td>
                        <td>
                            <b>Mobile No:</b>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <input type="text" name="address" style="width: 300px" value="<?php echo $h4; ?>">
                        </td>
                        <td>
                            <input type="text" name="telephoneNo" style="width: 200px" value="<?php echo $h7; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td><b>Nic:</b></td>
                        <td><b>Email:</b></td>
                    </tr>

                    <tr>
                        <td>
                            <input type="text" name="NIC" style="width: 200px" value="<?php echo $h8; ?>">
                        </td>
                        <td>
                            <input type="text" name="fax" style="width: 200px" value="<?php echo $h3; ?>">
                        </td>
                    </tr>

                   </br>
                   <tr></tr><tr></tr><tr></tr> <tr></tr><tr></tr><tr></tr></br>
                    <tr>
                        <td></td>
                        <td>
                            <button class="save" type="submit">Save</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <?php
        include '../include/footer.php';
        ?>
    </div>
</body>
</html>
