 <?php

include_once "connection.php";
?>
<html>
<head>
    <title></title>
<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
<head>
<body>
  
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Report</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="rpt/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="rpt/css/font-awesome.css" rel="stylesheet" />
     <!--PAGE LEVELC STYLES-->
    <link href="rpt/css/invoice.css" rel="stylesheet" />
    <!--CUSTOM BASIC STYLES-->
    <link href="rpt/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="rpt/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

<!--pdf-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/ui/1.12.0-beta.1/jquery-ui.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.1.135/jspdf.min.js"></script>
<script type="text/javascript" src="http://cdn.uriit.ru/jsPDF/libs/adler32cs.js/adler32cs.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2014-11-29/FileSaver.min.js
"></script>
<script type="text/javascript" src="libs/Blob.js/BlobBuilder.js"></script>
<script type="text/javascript" src="http://cdn.immex1.com/js/jspdf/plugins/jspdf.plugin.addimage.js"></script>
<script type="text/javascript" src="http://cdn.immex1.com/js/jspdf/plugins/jspdf.plugin.standard_fonts_metrics.js"></script>
<script type="text/javascript" src="http://cdn.immex1.com/js/jspdf/plugins/jspdf.plugin.split_text_to_size.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/2.2.3/jspdf.plugin.autotable.js"></script>

<script type="text/javascript" src="http://cdn.immex1.com/js/jspdf/plugins/jspdf.plugin.from_html.js"></script>
<script type="text/javascript" src="http://dataurl.net/#dataurlmaker"></script>
<script type="text/javascript" src="js/basic.js"></script>

<script lang="javascript" type="text/javascript">


function run()
 {
    
    var pdf = new jsPDF('p', 'pt', 'letter'),
    source = $('#content')[0],
    specialElementHandlers = {
        'bypassme':function(element,renderer){
            return true;
        }
    };
    
    margins = {
        top: 40,
        //yata idan tynna ona ida tika
        bottom: 20,
        left: 40,
        right: 40,
        width: 522
    };
    
    


pdf.fromHTML(
        source,
        margins.left,
        margins.top,
        {
        'width': margins.width 
        },
        function (dispose) {
            pdf.save('Test.pdf');
        },
        margins
   );
   
};


</script>
<style>
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
<a href="salesnxt.php" class="button">Back</a>

<body id="content">
      
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Sales Report</h1>

                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="row">
                    <div class="col-md-12">
                       <div >
     
      <div class="row pad-top-botm ">
         <div class="col-lg-6 col-md-6 col-sm-6 ">
            <img src="rpt/img/logo.png" width="25%" height="25%" style="padding-bottom:20px;" /> 
         </div>
          <div class="col-lg-6 col-md-6 col-sm-6">
            
               <strong>   Associated Battery Manufactures</strong>
              <br />
                  <i>Address :</i> No. 31, 
                      Katukurunduwatte Road,

              <br />
                  off Attidiya Road, 
              <br />
                  Ratmalana.
              
         </div>
     </div>
     <div  class="row text-center contact-info">
         <div class="col-lg-12 col-md-12 col-sm-12">
             <hr />
             <span>
                 <strong>Email : </strong>  info@abmlanka.com
             </span>
             <p>
             <span>
                 <strong>Call : </strong>  0094 11 2713111
             </span>
           </p>
              <span>
                 <strong>Fax : </strong>  0094 11 2734139
             </span>
             <hr />
         </div>
     </div>
    


     <div class="row">
         <div class="col-lg-12 col-md-12 col-sm-12">
           <div class="table-responsive">
<?php
$str1=$str2="";
 if (isset($_POST["submit"]))

{
 $sum1=$sum2=$sum3=$sum4=$sum5=$sum6=$sum7=$sum8=$sum9=$sum10=0;
echo '<table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Area</th>
                                    <th>Amount</th>
                                    
                                </tr>
                            </thead>';  
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
       
    }
  
echo "<tbody><tr><td>Kadawatha</td><td>".$sum1." </td></tr>";
echo "<tr><td>Kelaniya</td><td>".$sum2." </td></tr>";
echo "<tr><td>Paliyagoda</td><td>".$sum3." </td></tr>";
echo "<tr><td>Dematagoda</td><td>".$sum4." </td></tr>";
echo "<tr><td>Kiribathgoda</td><td>".$sum5." </td></tr>";
echo "<tr><td>Maradana</td><td>".$sum6." </td></tr>";
echo "<tr><td>Nugegoda</td><td>".$sum7." </td></tr>";
echo "<tr><td>Rathmalana</td><td>".$sum8." </td></tr>";
echo "<tr><td>Maharagama</td><td>".$sum9." </td></tr>";
echo "<tr><td>Dehiwala</td><td>".$sum10." </td></tr></tbody></table>";

} else {
    echo "";
}
$conn->close();


?>
</div>
             <br>
             <hr>
             <div class="ttl-amts">
                  <h5>  Year : <?php echo $str1;?> Month : <?php echo $str2;?> </h5>
             </div>
             <br>
             <hr>
              <div class="ttl-amts">
                  <h5>  Date : <?php echo date("Y/m/d"); ?></h5>
             </div>
             <br>
             <hr>
              <div class="ttl-amts">
                  <h4> <strong>Signature</strong> </h4>
             </div>
         </div>
     </div>
      
      <div class="row pad-top-botm">
         <div class="col-lg-12 col-md-12 col-sm-12">
             <hr />
             
              <button onclick="run()" class="btn btn-success btn-lg">Download In Pdf</button>
             </div>
         </div>
 </div>
                    </div>
                </div>

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <div id="footer-sec">
        &copy; 2016 ABM 
    </div>
    <!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="rpt/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="rpt/js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="rpt/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="rpt/js/custom.js"></script>


</body>
</html>


