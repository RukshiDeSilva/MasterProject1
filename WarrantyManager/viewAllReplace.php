<!DOCTYPE html>
 <?php include '../core/init.php';
      protect_page(); 
	
      ?>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
       
        <script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style>
     
        #report { border-collapse:collapse; width:70%;margin-left:13%; overflow: auto;}
        #report h4 { margin:0px; padding:0px;}
        #report img { float:right;}
        #report ul { margin:10px 0 10px 40px; padding:0px;}
        #report th { background:#808080; url(img/header_bkg.png) repeat-x scroll center left; color:black; padding:7px 15px; }
        #report td { background:#C0C0C0; none repeat-x scroll center left; color:#000; padding:7px 15px; overflow-x:auto; }
        #report tr.odd td { background:	#D8D8D8; url(img/row_bkg.png) repeat-x scroll center left; cursor:pointer; }
        #report div.arrow { background:transparent url(img/arrows.png) no-repeat scroll 0px -16px; width:16px; height:16px; display:block;}
        #report div.up { background-position:0px 0px;}
       
         </style>

 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">  
        $(document).ready(function(){
            $("#report tr:odd").addClass("odd");
            $("#report tr:not(.odd)").hide();
            $("#report tr:first-child").show();
            
            $("#report tr.odd").click(function(){
                $(this).next("tr").toggle();
                $(this).find(".arrow").toggleClass("up");
            });
            //$("#report").jExpand();
        });
    </script>              
</head>
<body>
<?php
include '../InventoryManager/include/header.php';
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
</div>
    <div class="content">

        <div class="table">
            <div id="content">
            <form action="#" method="POST" enctype="multipart/form-data" name="Form" onsubmit="return(validate());">


                    <div class="ad">

                     <h1><b> View All Replacements</b></h1>

                    <table width="70%">
                      <tr>
    
    
                        <th>From : </th>
                      	<th>To : </th>
                        <th></th>
                        <th></th>
                        </tr>
                        <tr></tr>
                      <tr>
                          <form>
                            <div class="form-group input-group">
                                      <th><input name="date_1" type="date"  size="9" value=""/></th>
                        			  <th> <input name="date_2" type="date"  size="9" value=""/></th>
                        						
				

                        
                            </div>
					            
					                  <th><button style="margin-top: -2%" type="submit" name="submit" value="submit">Search</button> </th>
					       </form>
                      </tr>
  
  

 

				</table>
<?php

require "../core/database/connect.php";


if (isset($_POST['submit'])) {
     
		$from_date = strtotime($_POST['date_1']);
		$to_date = strtotime($_POST['date_2']);

		

    $First_Date = date('Y-m-d',$from_date);
    $Next_Date =  date('Y-m-d',$to_date);

$sql="SELECT *
FROM released_batteries
WHERE battery_status = '3' OR  battery_status = '4' OR  battery_status = '5' OR  battery_status = '6'  AND replaced_date BETWEEN '" . $Next_Date . "' AND  '" . $First_Date . "'
ORDER BY battery_status ";


   
    $result = $conn->query($sql);
if ($result->num_rows > 0) {
	?>
	<table id="report">
	
        <tr>
			<th>Battery Number</th>
			<th>Validity Status</th>
			<th>Defect Type</th>
			<th></th>
        </tr>
	
	<?php
	while($row = $result->fetch_assoc()) {
			//print_r ($row);
		$batch_num = $row["batch_num"] ;
		$battery_num = $row["battery_num"] ;
		$battery_status = $row["battery_status"] ;
		$defect_type = $row["defect_type"] ;
		$warranty_period = $row["warranty_period"] ;
		$replaced_date = $row["replaced_date"];
		$cus_sold_date = $row["cus_sold_date"];
		
		//check the battery status and decide on validity of the replacement
			if ($battery_status ==  '5' ){		
			$battery_status = "VALID";
			$warranty_status = "Expired";
		}
		elseif ($battery_status == '6' ){
			$battery_status = "INVALID";
			$warranty_status = "Expired";
		}
		
		//if warranty is not expired calculate remaining warranty period
			elseif ($battery_status == '3' ){
			$battery_status = "PENDING";
	
			$diff = abs(strtotime($warranty_period) - strtotime($replaced_date));

			$years = floor($diff / (365*60*60*24));
			$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
			$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

			$warranty_status =  "Years:".$years." "."Months:".$months." "."Days:".$days;
			
		}
			elseif ($battery_status == '4' ){
			$battery_status = "PENDING";
			
			$diff = abs(strtotime($warranty_period) - strtotime($cus_sold_date));

			$years = floor($diff / (365*60*60*24));
			$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
			$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

			$warranty_status =  "Years:".$years." "."Months:".$months." "."Days:".$days;
		}
		
		$sql5 = "SELECT dealer_name FROM dealer WHERE dealer_id = '$row[dealer_id]'";
            $query5=(mysqli_query($conn,$sql5));
            while($res5 = mysqli_fetch_assoc($query5)){


		
		
			 ?>


        <tr>
            <td><?php echo $row["batch_num"].$row["battery_num"]?></td>
            <td><?php echo $battery_status ?></td>
            <td><?php echo $defect_type?></td>
            <td><div class="arrow"></div></td>
        </tr>
        <tr>
            <td colspan="4">
			<?php 
				$arr1 = substr($batch_num, 0,4);
					$arr3 = str_split($arr1);
 	if ($arr3[0]=='D'){
 echo "<img src='img/IMG-3128.jpg' width= '30%' height='50%' alt='Image of Battery' />";
	}
	elseif ($arr3[0]=='E') {
	
		  echo "<img src='img/IMG-3043.jpg' width= '30%' height='50%' alt='Image of Battery' />";
	}
	elseif ($arr3[0]=='L') {
	
		echo "<img src='img/IMG-2926.jpg' width= '30%' height='50%' alt='Image of Battery' />";

	}
	
?>
		
              
                <h4>Additional information</h4>
                    <p>Dealer Name : <?php echo $res5['dealer_name']; ?><br/><br/>
                    Remaining Warranty Period : <?php echo $warranty_status ?></p> 
            </td>
        </tr>
	 

<?php
			}
			}
	}
}
?>

</div>




	 


   
    
 </tbody>
</table>
</div>

</div>



                   
</form>


 

</div>
</div>

 
       

                        
                        
                            

</div>
</div>

</body>
   
</html>





