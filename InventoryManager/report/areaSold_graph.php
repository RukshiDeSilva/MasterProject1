<?php

include_once "connection.php";
?>
<html>
<head>
<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
<link href="rpt/css/graph.css" rel="stylesheet" />
 <style> 
select {
    width: 25%;
    padding: 16px 20px;
    border: none;
    border-radius: 4px;
    background-color: #f1f1f1;
}
input[type=submit] {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 16px 32px;
    text-decoration: none;
    margin: 4px 2px;
    cursor: pointer;
    font-size: 16px;
}
.button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 12px;
}
</style>
</head>
<body>
  <a href="reportnxt.php" class="button">Back</a>
  
  <div class="graphContainer">
  <form action="areaSold_graph.php" method="post">
    <b>Year:</b>
    <select id="selectElementId" name='year'></select>
   
      <script>
          var min = (new Date().getFullYear())-2,
          max = min + 9,
          select = document.getElementById('selectElementId');

          for (var i = min; i<=max; i++){
             var opt = document.createElement('option');
             opt.value = i;
             opt.innerHTML = i;
             select.appendChild(opt);
          }
      </script>
    <b>Month:</b>
    <select name="month">
      <option value='January'>January</option>
      <option value='February'>February</option>
      <option value='March'>March</option>
      <option value='April'>April</option>
      <option value='May'>May</option>
      <option value='June'>June</option>
      <option value='July'>July</option>
      <option value='August'>August</option>
      <option value='September'>September</option>
      <option value='October'>October</option>
      <option value='November'>November</option>
      <option value='December'>December</option>
    </select> 


  <input type="submit" value="Submit" name="submit">
    
 </form>
</div>
   
    
           
<?php
$str1=$str2="";
 if (isset($_POST["submit"]))

{
  $sum1=$sum2=$sum3=$sum4=$sum5=$sum6=$sum7=$sum8=$sum9=$sum10=0;
  $str1 = $_POST['year'];
  $str2 = $_POST['month'];

$sql="SELECT * FROM sold S join dealer D on (S.dealer_id = D.dealer_id) join area A on (A.area_no = D.area_no)";
$result = $conn->query($sql);
 

if ($result->num_rows >0) {
  while($row1 = $result->fetch_assoc() ){
        $date = $row1['sold_Date'];
        $area = $row1['area'];
        $time=strtotime($date);
        $month=date("F",$time);
        $year=date("Y",$time);

        if($str1==$year && $str2==$month && $area=='Kadawatha'){
          $sum1=$sum1+$row1['amount'];
    
        }
        if($str1==$year && $str2==$month && $area=='Kelaniya'){
          $sum2=$sum2+$row1['amount'];
    
        }
        if($str1==$year && $str2==$month && $area=='Paliyagoda'){
          $sum3=$sum3+$row1['amount'];
    
        }if($str1==$year && $str2==$month && $area=='Dematagoda'){
          $sum4=$sum4+$row1['amount'];
    
        }if($str1==$year && $str2==$month && $area=='Kiribathgoda'){
          $sum5=$sum5+$row1['amount'];
    
        }if($str1==$year && $str2==$month && $area=='Maradana'){
          $sum6=$sum6+$row1['amount'];
    
        }if($str1==$year && $str2==$month && $area=='Nugegoda'){
          $sum7=$sum7+$row1['amount'];
    
        }if($str1==$year && $str2==$month && $area=='Rathmalana'){
          $sum8=$sum8+$row1['amount'];
    
        }if($str1==$year && $str2==$month && $area=='Maharagama'){
          $sum9=$sum9+$row1['amount'];
    
        }if($str1==$year && $str2==$month && $area=='Dehiwala'){
          $sum10=$sum10+$row1['amount'];
    
        }
        }
       
    }?>
<dl>
  <dt>
    Sold Battery Quantity of Area
  </dt>
  <?php
  $sum=$sum1+$sum2;
  $psum1=(@($sum1/$sum))*100;
  //make integer
  $psum11 = round($psum1);
  //meke string
  $psum11 = (string)$psum11;
  $psum2=(@($sum2/$sum))*100;
  $psum12 = round($psum2);
  $psum12 = (string)$psum12;

  $psum3=(@($sum3/$sum))*100;
  $psum13 = round($psum3);
  $psum13 = (string)$psum13;

  $psum4=(@($sum4/$sum))*100;
  $psum14 = round($psum4);
  $psum14 = (string)$psum14;

  $psum5=(@($sum5/$sum))*100;
  $psum15 = round($psum5);
  $psum15 = (string)$psum15;

  $psum6=(@($sum6/$sum))*100;
  $psum16 = round($psum6);
  $psum16 = (string)$psum16;

  $psum7=(@($sum7/$sum))*100;
  $psum17 = round($psum7);
  $psum17 = (string)$psum17;

  $psum8=(@($sum8/$sum))*100;
  $psum18 = round($psum8);
  $psum18 = (string)$psum18;

  $psum9=(@($sum9/$sum))*100;
  $psum19 = round($psum9);
  $psum19 = (string)$psum19;

  $psum10=(@($sum2/$sum))*100;
  $psum110 = round($psum10);
  $psum110 = (string)$psum110;
  
 ?>
  <dd class="<?php echo 'percentage percentage-'.$psum11; echo'"'; ?>" ><span class="text">Kadawatha <?php echo $sum1 ?></span></dd>
  <dd class="<?php echo 'percentage percentage-'.$psum12; echo'"'; ?>" ><span class="text">Kelaniya <?php echo $sum2 ?></span></dd>
  <dd class="<?php echo 'percentage percentage-'.$psum13; echo'"'; ?>" ><span class="text">Paliyagoda <?php echo $sum2 ?></span></dd>
  <dd class="<?php echo 'percentage percentage-'.$psum14; echo'"'; ?>" ><span class="text">Dematagoda <?php echo $sum2 ?></span></dd>
  <dd class="<?php echo 'percentage percentage-'.$psum15; echo'"'; ?>" ><span class="text">Kiribathgoda <?php echo $sum2 ?></span></dd>
  <dd class="<?php echo 'percentage percentage-'.$psum16; echo'"'; ?>" ><span class="text">Maradana <?php echo $sum2 ?></span></dd>
  <dd class="<?php echo 'percentage percentage-'.$psum17; echo'"'; ?>" ><span class="text">Nugegoda <?php echo $sum2 ?></span></dd>
  <dd class="<?php echo 'percentage percentage-'.$psum18; echo'"'; ?>" ><span class="text">Rathmalana <?php echo $sum2 ?></span></dd>
  <dd class="<?php echo 'percentage percentage-'.$psum19; echo'"'; ?>" ><span class="text">Maharagama <?php echo $sum2 ?></span></dd>
  <dd class="<?php echo 'percentage percentage-'.$psum110; echo'"'; ?>" ><span class="text">Dehiwala <?php echo $sum2 ?></span></dd>


  
</dl>
<?php
} else {
    echo "";
}
$conn->close();


?>


</body>
</html>


