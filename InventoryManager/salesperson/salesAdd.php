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


    /*ajax part for dropdown*/
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
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                
                /*fetching areas for area dropdown*/
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
            
            if ($error==FALSE){
               
                /*add salesperson*/
                $sql="INSERT INTO `sales_person` (`F_name`, `area_no`, `NIC`, `address`, `L_name`, `mobileNo`, `telephoneNo`, `email`,`active`) VALUES ('".$_POST['F_name']."','".$a_no."','".$_POST['NIC']."','".$_POST['address']."','".$_POST['L_name']."','".$_POST['mobileNo']."','".$_POST['telephoneNo']."','".$_POST['email']."',1)";
                if(mysqli_query($connection,$sql)){
                     echo "<script>alert('Successfully inserted');
                     window.location.href='http://localhost/MasterProject1/InventoryManager/salesperson/salesAdd.php';</script>";
                    //die();
                } else{echo "error";}
            }
        }
        ?>

        <!--form to add salesperson-->
        <form class="AddPro" action="" method="POST">
                <h1 class="add">Add Salesperson</h1>
                <table id="ad">
                        <tr>
                            <td><b>First Name: </b></td>
                            <td><b>Last Name: </b></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="F_name" style="width: 200px" ></td>
                            <td><input type="text" name="L_name" style="width: 200px" ></td>
                        </tr>
                        <tr>
                            <td><b>NIC: </b></td>
                            <td><b>Address: </b></td>
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

                        <!--id for ajax part for area dropdown--> 
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

                            <!--id for ajax part for dealer dropdown-->
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
