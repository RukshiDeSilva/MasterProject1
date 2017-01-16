<html>
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
</head>
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
    }
    $( document ).ready(function() {
        $("select#cap").click( function(){
            //var id = this.id;
            var id = $(this).children(":selected").attr("id");
            console.log(id);
            $.ajax({
                url:'getdrop.php?data='+id,
                type:"get",
                success:function(data){
                    $("tr#trow>td#second").html("");
                    $("tr#trow>td#second").html(data);
                }
            });
        });
    });
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
        $error=FALSE;
        $dealer_nameerr = $area_noerr =  $NICerr = $addresserr = $salesPerson_iderr = $mobileNoerr = $telephoneNoerr = $emailerr = $faxerr = $dog =  "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if(empty($_POST['area'])){
                $area_noerr = "";
                $error = TRUE;
            }else{
                $area_no = $_POST['area'];
                //echo $area_no;
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
            if(empty($_POST['NIC'])){
                $NICerr = "";
                $error = TRUE;
            }else{
                $NIC = $_POST['NIC'];
                
            }
            if(empty($_POST['address'])){
                $addresserr = "";
                $error = TRUE;
            }else{
                $address = $_POST['address'];
                
            }
            if(empty($_POST['salesPerson_id'])){
                $salesPerson_iderr = "";
                $error = TRUE;
            }else{
                $salesPerson_id = $_POST['salesPerson_id'];
                
            }
            /*
             if(empty($_POST['mobileNo'])){
                 $mobileNoerr = "";
                 $error = TRUE;
             }else{
                 $mobileNo = $_POST['mobileNo'];
                 echo $mobileNo;
             }

             if(empty($_POST['telephoneNo'])){
                 $telephoneNoerr = "rq";
                 $error = TRUE;
             }else{
                 $telephoneNo = $_POST['telephoneNo'];
                 echo $telephoneNo;
             }
             */
            if(empty($_POST['email'])){
                $emailerr = "rq";
                $error = TRUE;
            }else{
                $email = $_POST['email'];
                
                if (strpos($email, '@') == FALSE) {
                    $emailerr =  "Invalid email address";
                    $error = TRUE;
                }
            }
            if(empty($_POST['fax'])){
                $faxerr = "rq";
                $error = TRUE;
            }else{
                $fax = $_POST['fax'];
                
            }
            if ($error==FALSE){
                $sql="INSERT INTO `warranty_management`.`dealer` (`dealer_name`, `area_no`, `salesPerson_id`, `NIC`, `address`, `mobileNo`, `telephoneNo`, `email`, `fax`,`active`) VALUES ('$_POST[dealer_name]', $a_no , '$_POST[salesPerson_id]', '$_POST[NIC]', '$_POST[address]', '$_POST[mobileNo]', '$_POST[telephoneNo]', '$_POST[email]', '$_POST[fax]',1)";
                if(mysqli_query($connection,$sql)){
                    echo "<script>alert('Successfully Inserted');</script>";
                    //die();
                    /*header("Location: adddealer.php");*/
                } else{echo "error";}
            }
        }
        ?>
            <form class="AddPro" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" id="hello" name= "myForm" onsubmit="return(validate());">
                    <h1  class="add">Add Dealer</h1>
                    <table id="tbl_add">
                        <tr>
                            <td colspan="2">
                                <b>Dealer Name:</b>
                            </td>
                            <td>
                                <b>Mobile No:<span class="error">* <?php echo $mobileNoerr;?></span></b>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" width="400px">
                                <input type="text" name="dealer_name" style="width: 300px" required>
                            </td>
                            <td>
                                <input type="text" name="mobileNo" style="width: 200px"  required >
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>Dealer Address: <span class="error">* <?php echo $addresserr;?></span></b></td>
                            <td><b>Telephone No: <span class="error">* <?php echo $telephoneNoerr;?></span></b></td>

                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="text" name="address" style="width: 300px" required>
                            </td>
                            <td>
                                <input type="text" name="telephoneNo" style="width: 200px" required>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <b>NIC:<span class="error">* <?php echo $NICerr;?></span></b>
                            </td>
                            <td>
                                <b>Fax No: <span class="error">* <?php echo $faxerr;?></span></b>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="text" name="NIC" style="width: 200px" required>
                            </td>
                            <td>
                                <input type="text" name="fax" style="width: 200px" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Area: <span class="error">* <?php echo $area_noerr;?></span></b>
                            </td>
                            <td>
                                <b>Salesperson Name: <span class="error">* <?php echo $area_noerr;?></span></b>
                            </td>
                            <td>
                                <b>E mail: <span class="error">* <?php echo $emailerr;?></span></b>
                            </td>
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
                                echo '</datalist>';
                                echo "</select>";
                                ?>
                            </td>
                            <td id="second">
                                <select name="salesPerson_id">
                                    <option> -------ALL--------</option>
                                </select>
                            </td>
                            <td>
                                <input type="text" name="email" style="width: 200px" required >
                            </td>
                        </tr>
                        <tr>
                            <td>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                        </tr>
                    </table>
                <div class="btn-align">
                    <button class="save" type="submit">Save</button>
                    <button  class="reset" type="reset">Reset</button>
                </div>
            </form>
        <?php
        include '../include/footer.php';
        ?>
    </div>
</body>
</html>
