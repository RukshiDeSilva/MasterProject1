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
            //Dealer name
            var a= document.myForm.dealer_name.value;
            //  var a = document.form.name.value;
            if(a=="")
            {
                alert("Please Enter Your Name");
                document.form.name.focus();
                return false;
            }
            if(!isNaN(a))
            {
                alert("Please Enter Only Characters for the Dealer Name");
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
            if( document.myForm.telephoneNo.value == "" ||
                isNaN( document.myForm.telephoneNo.value ) ||
                document.myForm.telephoneNo.value.length != 10 )
            {
                alert( "Please provide a Telephone No as the format 0#########." );
                document.myForm.telephoneNo.focus() ;
                return false;
            }
            //Nic No

            var idToTest = document.myForm.NIC.value,
                myRegExp = new RegExp(/^[0-9]{9}[vVxX]$/);

            if(myRegExp.test(idToTest)) {

            }
            else {
                alert( "Please provide a NIC No as #########V" );
            }
            //Fax NO
            if( document.myForm.fax.value == "" ||
                isNaN( document.myForm.fax.value ) ||
                document.myForm.fax.value.length != 10 )
            {
                alert( "Please provide a Fax No as the format 0#########." );
                document.myForm.fax.focus() ;
                return false;
            }
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
            <a href="../dealer/dealer.php"><img src="../img/View.png"></a>
            <a href="../dealer/adddealer.php"><img src="../img/Add.png"></a>
            <a href="../dealer/view.php"><img src="../img/Search.png"></a>
        </div>
        <?php
        require "../../database/connect.php";
        //session_start();

        /*get the name search in view.php*/
        $dealer_name = $_SESSION['dealer_name'];
        

        /*select data for particular dealer searched*/
        $sql = "SELECT * FROM dealer WHERE dealer_name = '$dealer_name'";

        $result= mysqli_query($connection, $sql);
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                
                $dealer_id=$row["dealer_id"];
                $dealer_name=$row["dealer_name"];
                $nic=$row["NIC"];
                $area_no=$row["area_no"];
                $address=$row["address"];
                $salesperson_id=$row["salesPerson_id"];
                $mobile_no=$row["mobileNo"];
                $telephone_no=$row["telephoneNo"];
                $email=$row["email"];
                $fax=$row["fax"];
            }
        }else{
            echo "Zero results";
        }

        /*relevant area for area no*/
        $sql1 = "SELECT * FROM area WHERE area_no = $area_no";

        $result1= mysqli_query($connection, $sql1);

        if(mysqli_num_rows($result1) > 0){

            while($row = mysqli_fetch_assoc($result1)){
                
                $dealer_name0=$row["area"];

            }
        }else{
            echo '<script>';
            echo 'alert("area_result")';
            echo '</script>';
        }

        /*relevant salesperson name for salesperson id*/
        $sql2 = "SELECT * FROM sales_person WHERE salesPerson_id = $salesperson_id";

        $result2= mysqli_query($connection, $sql2);

        if(mysqli_num_rows($result2) > 0){

            while($row = mysqli_fetch_assoc($result2)){
                
                $f_name=$row["F_name"];
                $l_name=$row["L_name"];

            }
        }else{
            echo '<script>';
            echo 'alert("Sales Person result")';
            echo '</script>';
        }

        $error=FALSE;
        

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

                if ($error==FALSE){

                /*update dealer*/
                $sql = "UPDATE `dealer` SET `dealer_name`='$_POST[dealer_name]',`area_no`=$area_no,`salesPerson_id`=$salesperson_id,`NIC`='$_POST[NIC]',`address`='$_POST[address]',`mobileNo`='$_POST[mobileNo]',`telephoneNo`='$_POST[telephoneNo]',`email`='$_POST[email]',`fax`='$_POST[fax]' WHERE `dealer_name`='$dealer_name'";
                    if(mysqli_query($connection,$sql)){
                        echo "<script>alert('Successfully Updated');
                         window.location.href='http://localhost/MasterProject1/InventoryManager/dealer/view.php';</script>";
                        
                        
                    } 
                    else{
                        echo "error";
                    }
            }
        }

        ?>
        <div class="ad">
            <form class="AddPro" action="" method="post" id="hello" name= "myForm" onsubmit="return(validate());">
                <h1 class="add">Update Dealer</h1>
                <table id="ad">
                    <tr>
                        <td>
                            <b>Dealer ID: <?php echo $dealer_id; ?></b>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <b>Dealer Name:</b>
                        </td>
                        <td>
                            <b>Mobile No:</b>
                        </td>
                    </tr>

                    <tr>
                        <td width="400px">
                            <input type="text" name="dealer_name" style="width: 300px" value="<?php echo $dealer_name; ?>">
                        </td>
                        <td>
                            <input type="text" name="mobileNo" style="width: 200px" value="<?php echo $mobile_no; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <b>Dealer Address:</b>
                        </td>
                        <td>
                            <b>Telephone No:</b>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <input type="text" name="address" style="width: 300px" value="<?php echo $address; ?>">
                        </td>
                        <td>
                            <input type="text" name="telephoneNo" style="width: 200px" value="<?php echo $telephone_no; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td><b>NIC:</b></td>
                        <td><b>Fax No:</b></td>
                    </tr>

                    <tr>
                        <td>
                            <input type="text" name="NIC" style="width: 200px" value="<?php echo $nic; ?>">
                        </td>
                        <td>
                            <input type="text" name="fax" style="width: 200px" value="<?php echo $fax; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <b>Area:</b>
                        </td>
                        <td>
                            <b>E mail:</b>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <?php echo $dealer_name0;?>
                        </td>
                        <td>
                            <input type="text" name="email" style="width: 200px" value="<?php echo $email; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <b>Relevant Salesperson Name:</b>
                        </td>
                    </tr>
                    <tr>
                        <td ><?php echo $f_name ." ". $l_name; ?></td>
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
        <?php
        include '../include/footer.php';
        ?>
    </div>
</body>
</html>
