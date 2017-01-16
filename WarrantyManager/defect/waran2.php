<!DOCTYPE html>


<html lang="en">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
        

       
        <script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
       <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js" type="text/javascript"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"
        type="text/javascript"></script>
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css"
        rel="Stylesheet" type="text/css" />
    <script type="text/javascript">
        $(function () {
            $('#txtDate').datepicker({
                dateFormat: "yy-mm-dd",
                changeMonth: true,
                changeYear: true
            });
        });
    </script>
    <style type="text/css">
        body
        {
            font-family: Arial;
            font-size: 10pt;
        }
        #txtDate
        {
            background-image: url(http://i988.photobucket.com/albums/af3/mudassarkhan/calender.png);
            background-repeat: no-repeat;
            padding-left: 25px;
        }
        table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: gray;
    color: white;
}
tbody {
    height: 60px;       /* Just for the demo          */
    overflow-y: auto;    /* Trigger vertical scroll    */
    overflow-x: hidden;  /* Hide the horizontal scroll */
}

    </style>
</head>
  



<div id="body">
    <div id="navigation"></div>
    <nav>
        <ul id="mainsidebar">
            <li class="var_nav">
                <div class="link_bg"></div>
                <div class="link_title" id="dt">

                    <a href="defect-type.php" id="dt" style="top: 1px;
                                display:block;
                                position:absolute;
                                float:left;
                                font-family:arial;
                                color:#1C1C1C;
                                text-decoration:none;
                                width:100%;
                                height:70px;
                                margin-top: 20px;
                                text-align:center;"><img class= "pic" src="img/b.png" align="middle" width="80px"><span>Defect Type</span></a>
                </div>
            </li>
            <li class="var_nav">
                <div class="link_bg"></div>
                <div class="link_title" >

                    <a href= "check-replace.php" id="cr" style="top: 10px;
                                display:block;
                                position:absolute;
                                float:left;
                                font-family:arial;
                                color:#1C1C1C;
                                text-decoration:none;
                                width:100%;
                                height:70px;
                                margin-top: 10px;
                                text-align:center;"><img class= "pic" src="img/c.png" align="middle" width="80px"><span>Check Replacements</span></a>
                </div>
            </li>
            <li class="var_nav">
                <div class="link_bg"></div>
                <div class="link_title" id="md" >

                    <a href="mis-dealer.php" id="mis" style="top: 10px;
                                display:block;
                                position:absolute;
                                float:left;
                                font-family:arial;
                                color:#1C1C1C;
                                text-decoration:none;
                                width:100%;
                                height:70px;
                                margin-top: 10px;
                                text-align:center;"><img class= "pic" src="img/d.png" align="middle" width="80px"><span>Misused </br> Dealers</span></a>
                </div>
            </li>
            

    </nav>


    
</div>

    <div class="content">
        <div class="ad">
            <div style="height:50px;">
            </div>
        <div >
            <h1 style="margin-left:30%">ENTER DEFECT TYPES</h1>
            <div>
                <a href=""><p style="margin-left:90%;">View Defects</p></a>
            </div>
        </div>

        

                    
                        <form style="margin-left:10%;" id="form1" runat="server" name="one" action="" method="post">
                            <table style="width:60%;margin-left:10%;">
                                <tr>
    <div>
        <th style="width:20%;">Select Date:</th>
        <th><input id="txtDate" type="text" name="date" /></th>
        <th><input type="submit" value="SUBMIT" name="submit"/></th>

    </tr>
    </table>
        

    </div>
</form>
</div>
</div>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "warranty_management";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql="SELECT battery_status,replaced_date,batch_num,battery_num FROM released_batteries";
$date="";
$defect="";
$batch_num="";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    



if (isset($_POST['date'])) {
        $date = $_POST['date'];
    }

if(isset($_POST['Enter']))
{   
    $batch_num=$_POST['batch_num'];
    $battery_num=$_POST['battery_num'];
    $date=$_POST['replaced_date'];
    $defect_type=$_POST['defect_type'];

 

    $query3=mysqli_query($conn,"UPDATE released_batteries SET defect_type='$defect_type' WHERE batch_num='$batch_num' AND battery_num='$battery_num' ");
}
         echo "<table style='background-color:lightgrey;width:90%;margin-left:10%;position:absolute;margin-top:-470px;'><tr><th>Batch number</th><th>Battery number</th><th>Defect Type</th><th>  </th></tr>";

while($row1 = $result->fetch_assoc() ){
    
if($row1['replaced_date']==$date ){
        if($row1['battery_status']==3){
       echo'<form  method="POST" >';
       echo'<tr><input type="text" hidden="true" name="batch_num"  value='.$row1["batch_num"].'>'  ;
       echo'<input type="number" hidden="true" name="battery_num"  value='.$row1["battery_num"].'>'  ;
       echo'<input hidden="true" type="text" name="replaced_date"  value='.$row1["replaced_date"].'>'  ; 
       echo'<td>'.$row1["batch_num"].'</td><td>'.$row1["battery_num"].'</td>';   
//getting data to a drop down
    

    echo"<td><select name='defect_type'>
    <option value = ''>---Select---</option>";
    
    $query= "SELECT defect FROM defect_types ";
    $db = mysqli_query($conn, $query);
    while ( $d=mysqli_fetch_assoc($db)) {
  echo "<option value='{".$d['defect']."}'>".$d['defect']."</option>";
}
    
    ?>
    </select></td>
    <?php
    echo"<td><input type='submit' name='Enter' value='UPDATE'/>";}
    echo'</form>';



if(isset($_POST['defect_type'])){
    $defect=$_POST['defect_type'];}




    "</td>";

        


    





 
}

}
  echo "</table>";
} else {
    echo "0 results";
}echo"</form>";








mysqli_close($conn);

?>
                   
</div>



                   
</form>


 </div>

</div>
</div>

 
       

                        
                        
                            

</div>
</div>







