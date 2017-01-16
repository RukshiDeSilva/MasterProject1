<?php
  require "../database/connect.php";
  
?>
<!DOCTYPE html>


<html lang="en">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
        

       
        <script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style>
		
	.inactive_btn {
	border-radius:6px;
	border:1px solid #d02718;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:bold;
	padding:14px 35px;
	text-decoration:none;
	text-shadow:0px 1px 0px #810e05;
}
.inactive_btn:hover {
	background:linear-gradient(to bottom, #c62d1f 5%, #f24537 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#c62d1f', endColorstr='#f24537',GradientType=0);
	background-color:#c62d1f;
}
.inactive_btn:active {
	position:relative;
	top:1px;
}

       
         </style>

  
</head>
    <?php
    include '../InventoryManager/include/header.php';
    ?>
<body>
<?php   
    if(isset($_POST['Enter']))
{ 
require "../core/database/connect.php";

 mysqli_query($conn,"UPDATE dealer SET active = 0 WHERE dealer_id = '$_POST[Enter]'");
}
?>
<div id="body">
    <div id="navigation"></div>
    <nav>
        <ul id="mainsidebar">
            <li class="var_nav">
                <div class="link_bg"></div>
                <div class="link_title" id="dt">

                    <a href="enterDefect.php" id="dt" style="top: 1px;
                                display:block;
                                position:absolute;
                                float:left;
                                font-family:arial;
                                color:#1C1C1C;
                                text-decoration:none;
                                width:100%;
                                height:70px;
                                margin-top: 20px;
                                text-align:center;"><img class= "pic" src="img/b.png" align="middle" width="80px"><span>Enter Defects</span></a>
                </div>
            </li>
            <li class="var_nav">
                <div class="link_bg"></div>
                <div class="link_title" >

                    <a href= "checkReplace.php" id="cr" style="top: 10px;
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

                    <a href="misDealer.php" id="mis" style="top: 10px;
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

            <li class="var_nav">
                <div class="link_bg"></div>
                <div class="link_title" >

                    <a href= "viewAllReplace.php" id="cr" style="top: 10px;
                                display:block;
                                position:absolute;
                                float:left;
                                font-family:arial;
                                color:#1C1C1C;
                                text-decoration:none;
                                width:100%;
                                height:70px;
                                margin-top: 10px;
                                text-align:center;"><img class= "pic" src="img/f.png" align="middle" width="80px"><span>View All Replacements</span></a>
                </div>
            </li>
             <li class="var_nav">
                <div class="link_bg"></div>
                <div class="link_title" >

                      <a href= "searchProduct.php" id="cr" style="top: 10px;
                                display:block;
                                position:absolute;
                                float:left;
                                font-family:arial;
                                color:#1C1C1C;
                                text-decoration:none;
                                width:100%;
                                height:70px;
                                margin-top: 10px;
                                text-align:center;"><img class= "pic" src="img/g.png" align="middle" width="80px"><span>Search Product</span></a>
                </div>
            </li>

            

    </nav>


    </nav>
</div>

    <div class="content">

        <div class="tbl">
            <div id="content">
            <form action="#" method="POST" enctype="multipart/form-data" name="Form" onsubmit="return(validate());">


                    <div class="ad">

       
                     <h1><b> Misused Dealers</b></h1>

                    <table width="70%">
  <tr>
    <!--<th>Area</th>-->
    <th></th>
    <th></th>
    
    
    
  
  </tr>
  <tr></tr>
  <tr>
   
    </tr>
  

 

</table>
<div  class="tbl-header">
<table cellpadding="0" cellspacing="0" border="0">
  <thead>
    <tr>
      <th>Dealer Name</th>
      <th>No of Invalid Replacements</th>
	  <th>Set Dealer Inactive</th>

      
      
    </tr>
  </thead>
</table>
</div>
<div  class="tbl-content">
<table cellpadding="0" cellspacing="0" border="0">
  <tbody>
    <?php 

    


    
      $sql2="SELECT dealer_id FROM dealer WHERE active=1";
      $query2=(mysqli_query($connection,$sql2));
      while ($res2 = mysqli_fetch_assoc($query2)){
      $sql="SELECT battery_num,dealer_id,coalesce(count(case when battery_status =3  then 1 end), 0) as count FROM released_batteries WHERE dealer_id IS NOT NULL AND dealer_id = ANY (SELECT dealer_id FROM released_batteries WHERE battery_status=3)  AND dealer_id = '$res2[dealer_id]' GROUP BY dealer_id";
      $query=(mysqli_query($connection,$sql));
      while($res = mysqli_fetch_assoc($query)){ 
            $sql5 = "SELECT dealer_name FROM dealer WHERE dealer_id = '$res[dealer_id]'";
            $query5=(mysqli_query($connection,$sql5));
            while($res5 = mysqli_fetch_assoc($query5)){ 
            echo "<tr>";
            echo "<th>".$res5['dealer_name']."</th>";
                    }
            echo "<th>".$res['count']."</th>";

            echo"
     <form  method='POST' >";
    ?>
    <td><button class="inactive_btn" type="submit" name="Enter" value="<?php echo "$res[dealer_id]"?>" onclick="return confirm('Are you sure you wish to inactive this dealer?');">Inactive</button></td>
    
    <?php   
  
    echo'</form>'; 
            

         }
     
}
?>

    
   
    
 </tbody>
</table>
</div>

</div>



                   
</form>


 

</div>
</div>
        </div>

</body>
    </html>

 
       

                        
                        
                            

</div>
</div>


</body>
</html>





