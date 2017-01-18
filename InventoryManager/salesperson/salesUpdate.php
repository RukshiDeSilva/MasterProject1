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
    <script>
     function validate(){
        
        var a= document.myForm.f_name.value;
        //  var a = document.form.name.value;
        if(a=="")
        {
            alert("Please Enter Your Name");
            document.form.name.focus();
            return false;
        }
        if(!isNaN(a)) // check is it varchar
        {
            alert("Please Enter Only Characters for the  Name");
            document.form.name.select();
            return false;
        }
        var b= document.myForm.l_name.value;
        //  var a = document.form.name.value;
        if(b=="")
        {
            alert("Please Enter Your Name");
            document.form.name.focus();
            return false;
        }
        if(!isNaN(b))
        {
            alert("Please Enter Only Characters for the  Name");
            document.form.name.select();
            return false;
        }
        //Mobile no
        if( document.myForm.mobileNo.value == "" ||
            isNaN( document.myForm.mobileNo.value ) ||
            document.myForm.mobileNo.value.length != 10 )
        {
            alert( "Please provide a Mobile No No as the format 0#########." );
            document.myForm.telephoneNo.focus() ;
            return false;
        }
        //TP nomber
        
        //Nic No
        var idToTest = document.myForm.NIC.value,
            myRegExp = new RegExp(/^[0-9]{9}[vVxX]$/);
        if(myRegExp.test(idToTest)) {
        }
        else {
            alert( "Please provide a NIC No as #########V" );
        }
        //Fax NO
        
        //Email Validation
        var emailID = document.myForm.email.value;
        atpos = emailID.indexOf("@");
        dotpos = emailID.lastIndexOf(".");
        if (atpos < 1 || ( dotpos - atpos < 2 ))
        {
            alert("Please enter correct email ID")
            document.myForm.email.focus() ;
            return false;
        }
        return( true );
    }
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
        
        /*get the name search in salesSearch.php*/
        $salesperson_id = $_SESSION['salesPerson_id'];
        
        
        /*select data for particular salesperson searched*/
        $sql = "SELECT * FROM sales_person WHERE salesPerson_id = '$salesperson_id'";
                    
                    $result= mysqli_query($connection, $sql);
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){
                        
                        $salesperson_id=$row["salesPerson_id"];
                        $f_name=$row["F_name"];
                        $l_name=$row["L_name"];
                        $area_no=$row["area_no"];
                        $nic=$row["NIC"];
                        $address=$row["address"];
                        
                        $mobile_no=$row["mobileNo"];
                        $telephone_no=$row["telephoneNo"];
                        $email=$row["email"];
                        }
                    }else{
                        echo "Zero results";
                    }
                    
                    /*relevant area for area no*/
                    $sql1 = "SELECT * FROM area WHERE area_no = $area_no";
                    
                    $result1= mysqli_query($connection, $sql1);
                    
                    if(mysqli_num_rows($result1) > 0){
                        
                        while($row = mysqli_fetch_assoc($result1)){
                        
                            $area=$row["area"];
                            
                        }
                    }else{
                         echo '<script>';
                         echo 'alert("area_result")';
                         echo '</script>';
                        }
                    
                     $error=FALSE;
        
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            /*update salesperson*/
            $sql = "UPDATE `sales_person` SET `F_name`='$_POST[F_name]',`L_name`='$_POST[L_name]',`NIC`='$_POST[NIC]',`address`='$_POST[address]',`mobileNo`='$_POST[mobileNo]',`telephoneNo`='$_POST[telephoneNo]',`email`='$_POST[email]' WHERE `salesPerson_id`='$salesperson_id'";
            if(mysqli_query($connection,$sql)){
                //die();
                echo "<script>alert('Successfully Updated');
                         window.location.href='http://localhost/MasterProject1/InventoryManager/salesperson/salesSearch.php';</script>";
                
            } else{
                echo "error";
            }
            
            
             
        }
        

    ?>
                <form class="AddPro" action="" method="post">
                    <h1 class="add">Update Salesperson</h1>
                    <table>
                    <tr>
                        <td><b>Salesperson ID: <?php echo $_SESSION['salesPerson_id'] ?></b></td>
                    </tr>
                    </tr>
                    <tr>
                        <td><b>First Name:<b></td>
                        <td><b>Area:</b></td>
                    </tr>
                    <tr>
                        <td width="400px"><input type="text" name="F_name" style="width: 300px" value="<?php echo $f_name; ?> " ></td>
                        <td><?php echo $area;?></td>
                    </tr>
                    <tr>
                        <td><b>Last Name:</b></td>
                        <td><b>Mobile No:</b></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="L_name" style="width: 300px" value="<?php echo $l_name; ?>" ></td>
                        <td><input type="text" name="mobileNo" style="width: 300px" value="<?php echo $mobile_no; ?>" ></td>
                    </tr>
                    <tr>
                        <td><b>Address:</b></td>
                        <td><b>Telephone No:</b></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="address" style="width: 200px" value="<?php echo $address; ?>" ></td>
                        <td><input type="text" name="telephoneNo" style="width: 200px" value="<?php echo $telephone_no; ?>" ></td>
                    </tr>
                    <tr>
                        <td><b>NIC:</b></td>
                        <td><b>Email:</b></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="NIC" style="width: 200px" value="<?php echo $nic; ?>" ></td>
                        <td><input type="text" name="email" style="width: 200px" value="<?php echo $email; ?>" ></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <button class="save" type="submit">Save</button>
                        </td>
                    </tr>
                        </table>
                </form>
        
</div>
</body>
<?php
include '../include/footer.php';
?>
</html>
