<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
    <link rel="stylesheet" href="style1.css" media="screen" type="text/css" />
    <script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <?php include '../../core/init.php';
    protect_page();
    include '../include/header.php';
    ?>
    <style>
        #form-align{
            padding-left: 20%;
            margin-left: 0;
            width:70%;
            height:600px;
            margin-right: 10%;
        }
        .form-style-2{
            max-width: 500px;
            padding-top: 10%;
            font: 13px Arial, Helvetica, sans-serif;
        }
        .form-style-2-heading{
            font-weight: bold;
            border-bottom: 2px solid #ddd;
            margin-bottom: 20px;
            font-size: 15px;
            padding-bottom: 3px;
            color: #B40404;
            font-size: 24px;
            font-family: 'Signika', sans-serif;
            text-align: center;
        }
        .form-style-2 label{
            display: block;
            margin: 0px 0px 15px 0px;
        }
        .form-style-2 label > span{
            font-weight: bold;
            float: left;
            padding-top: 8px;
            padding-right: 5px;
            color:black;
        }
        .form-style-2 span.required{
            color:red;
        }
        .form-style-2 .batch-number-field{
            width: 60px;
            text-align: center;
        }
        .form-style-2 input.input-field{
            width: 48%;
        }
        .form-style-2 input.input-field,
        .form-style-2 .batch-number-field,
        .form-style-2 .select-field{
            box-sizing: border-box;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            border: 1px solid #C2C2C2;
            box-shadow: 1px 1px 4px #EBEBEB;
            -moz-box-shadow: 1px 1px 4px #EBEBEB;
            -webkit-box-shadow: 1px 1px 4px #EBEBEB;
            border-radius: 3px;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            padding: 7px;
            outline: none;
        }
        .form-style-2 .input-field:focus,
        .form-style-2 .batch-number-field:focus,
        .form-style-2 .select-field:focus{
            border: 1px solid #0C0;
        }
        .container { /* To clear contained floats */
            width: 100%;
            overflow: hidden;
        }
        .container label {
            width: 250px;
            float: left;
        }
        .table{
            padding-left: 5%;
        }
    </style>
    <script type="text/javascript">
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
                        //load third
                        $("select#carmodel").click( function(){
                            //var id = this.id;
                            //alert("fdsf");
                            var id1 = $(this).children(":selected").attr("value");
                            // alert(id1);
                            console.log(id1);
                            $.ajax({
                                url:'getdrop2.php?data1='+id1,
                                type:"get",
                                success:function(data1){
                                    //alert(data1);

                                    $("tr#trow>td#second1").html("");
                                    $("tr#trow>td#second1").html(data1);
                                },
                                error:function (jqXHR, textstatus, errorThrown)
                                {
                                    alert(errorThrown);
                                }
                            });
                        });
                        //end of third load
                    }
                });
            });
        });
    </script>
</head>
<div id="body">
    <div id="nav">
        <ul id="mainsidebar" style="padding-top: 60%">
            <li class="sidenav">
                <div id="side">
                    <a href="../inventory.php"><img src="../img/Back.png" class="pic"></a>
                    <span>Back</span>
                </div>
            </li>
            <li class="sidenav">
                <div id="side">
                    <a href="../stock/entermanufac.php"><img src="../img/manufac.png" class="pic"></a>
                    <span>Manufactured Products</span>
                </div>
            </li>
            <li class="sidenav">
                <div id="side">
                    <a href="../stock/entersold.php"><img src="../img/Sold.png" class="pic"></a>
                    <span>Sold Products</span>
                </div>
            </li>
        </ul>
    </div>
</div>

<div class="content">
    <div class="table">
        <?php
        require "../../database/connect.php";
        //$salesname = $x = $y = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $str =$_POST['batch_num1'].$_POST['batch_num2'].$_POST['batch_num3'].$_POST['batch_num4'];
            //$salesname  = $_POST['salespersonname'];
            //$sales = explode(" ", $salesname);
            //$x = $sales[0];
            //$y = $sales[1];
            //    $sql = "INSERT INTO `sold` (`battery_type`, `battery_name`, `amount`, `salesPerson_id`, `dealer_id`, `sold_Date`) VALUES ('$_POST[batterytype]','$_POST[batteryname]',$_POST[amount],'$_POST[salespersonname]','$_POST[dealername]')";
            $sql1="SELECT current_stock FROM stock_in_hand WHERE battery_type='$_POST[battery_type]' AND battery_name= '$_POST[battery_name]'";
            $result1=mysqli_query($connection,$sql1);
            $row1=mysqli_fetch_row($result1);
            //echo $row1[0];
            if($row1[0]< 0){
                echo "<script>alert('Not enough stock');
                     window.location.href='http://localhost/MasterProject/InventoryManager/stock/entersold.php';</script>";
            }

            else{
                $sql = "INSERT INTO `sold` (`battery_type`, `battery_name`, `amount`, `salesPerson_id`, `dealer_id`, `sold_Date`) VALUES ('$_POST[battery_type]', '$_POST[battery_name]', '$_POST[amount]', '$_POST[salesPerson_id]','$_POST[dealer_id]', now())";
                if(mysqli_query($connection,$sql)){
                   echo "<script>alert('Successfully Sent Stock!');
                     window.location.href='http://localhost/MasterProject/InventoryManager/stock/entersold.php';</script>";
                }
                else{
                    echo "error";
                }
                $query="UPDATE stock_in_hand SET current_stock=current_stock -'$_POST[amount]' WHERE battery_type='$_POST[battery_type]' AND battery_name= '$_POST[battery_name]'";
                if (mysqli_query($connection, $query)) {
                    echo "";
                }
                else {
                    echo "Error: " . $query . "<br>" . mysqli_error($connection);
                }
                $query1= "call updateRelease('$str','$_POST[amount]','$_POST[salesPerson_id]','$_POST[dealer_id]')";
                if (mysqli_query($connection, $query1)) {
                    echo "";
                }
                else {
                    echo "Error: " . $query1 . "<br>" . mysqli_error($connection);
                }
            }
        }
        ?>
        <div id="content">
            <div id="form-align">
                <div class="form-style-2">
                    <div class="form-style-2-heading">Sold Batteries</div>
                    <form action="entersold.php" method="POST" enctype="multipart/form-data" name="Form" onsubmit="return(validate());">
                        <div class="ad">
                            <table>
                                <tr><td><b>Batch No :</b></td><td><input type="text" class="batch-number-field" name="batch_num1" value="D" maxlength="1" />-
                                        <input type="number" class="batch-number-field" name="batch_num2" value="2" maxlength="1" />-
                                        <input type="text" class="batch-number-field" name="batch_num3" value="D" maxlength="1"  />-
                                        <input type="number" class="batch-number-field" name="batch_num4" value="6" maxlength="1"  /></td></tr>
                                <tr>
                                    <td><b>Battery Type:</b></td>
                                    <td> <select id="battery" name="battery_type" class="select-field" onchange="ChangebatteryList()" style="font-color:black;">
                                            <option value="">------SELECT------</option>
                                            <option value="Exide">Exide</option>
                                            <option value="Lucas">Lucas</option>
                                            <option value="Deganite">Dagenite</option>
                                        </select></td>
                                </tr>
                                <tr>
                                    <td><b>Battery Name:</b></td>
                                    <td> <select id="batterysubtype" class="select-field" name="battery_name">
                                            <option value="">------SELECT------</option>
                                            <option value="MF105D31R/L">MF105D31R/L</option>
                                            <option value="65D31R/L">65D31R/L</option>
                                            <option value="MFS65R/L">MFS65R/L</option>
                                        </select></td>
                                </tr>
                                <tr>
                                    <td><b>Amount:</b></td>
                                    <td><input type="number" class="input-field"  name="amount" style="width: 70px" required></td>
                                </tr>
                                <!--<tr><td>Area:</td></tr>-->
                                <tr id= "trow">
                                    <td><b>Area:</b></td>
                                    <td>
                                        <?php
                                        echo '<select name="area" id="cap" class="select-field">';
                                        echo '<option>    ------SELECT------   </option>';

                                        $sql1 = "Select DISTINCT area_no,area from area";
                                        $result1= mysqli_query($connection, $sql1);
                                        while($r=mysqli_fetch_row($result1))
                                        {
                                            echo '<option id=' .$r[0].'> ' . $r[1] . '</option>';
                                        }
                                        echo "</select>";
                                        ?>
                                    </td>
                                </tr>
                                <tr id="trow">
                                    <td><b>Salesperson Name:</b></td>
                                    <td id="second">
                                        <select name="salesPerson_id" class="select-field">
                                            <option> ------SELECT------</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr id="trow">
                                    <td><b> Dealer Name:</b></td>
                                    <td id="second1">
                                        <select name="dealer_id" class="select-field">
                                            <option> ------SELECT------</option>
                                        </select>
                                    </td>
                                </tr>
                            </table>
                    </form>
                    <div class="btn-align" style="margin-left: 5%">
                        <button class="save" name="submit" value="send">Submit</button>
                        <button  class="reset" name="reset" value="reset">Reset</button>
                    </div>
                </div>
    </div>
            </div>
<?php
include '../include/footer.php';
?>
</body>
<html>