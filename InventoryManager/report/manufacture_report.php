<?php
include_once "connection.php";
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
 

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title></title>

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
<a href="manufacturenxt.php" class="button">Back</a>
<!-- give function name -->
<body id="content">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                      <!-- header-->
                        <h1 class="page-head-line">Manufacture Report</h1>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                       <div >
      <div class="row pad-top-botm ">
         <div class="col-lg-6 col-md-6 col-sm-6 ">
            <img src="rpt/img/logo.png" width="25%" height="15%" style="padding-bottom:20px;" /> 
         </div>
          <div class="col-lg-6 col-md-6 col-sm-6">
            <!-- Address-->
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
     <div  class="row text-center contact-info" style="text-align:center;">
         <div class="col-lg-12 col-md-12 col-sm-12">
             <hr />
             <span>
                 <strong>Email : </strong>  info@abmlanka.com
             </span>
             <p>
             <span>
                 <strong>Call : </strong>  0094 11 2713111/3
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
$year="";$str1="";$str2="";$line="";
if (isset($_POST["submit"]))
{   
  $str1 = $_POST['year'];
  //give last number of year
  $year = substr($str1, 3,4);
  $month2 = $_POST['month'];
  $line = $_POST['line'];

}
//get all details of anufacture battery table
$sql="SELECT * FROM manufac_batteries";
$result = $conn->query($sql);
$sum1=$sum2=$sum3=0;
//create table header
echo'<table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Battery Type</th>
                                    <th>Amount</th>
                                    
                                </tr>
                            </thead>';
if ($result->num_rows > 0) {
while($row1 = $result->fetch_assoc() ){
  //check and increment ecah sum of battry types
  if($row1['manufacture_year']==$year && $row1['manufacture_month']==$month2 && $row1['production_line']==$line){
      if($row1["battery_type"]=='Exide'){
        $sum1=$sum1+$row1["amount"];
        }
      elseif($row1["battery_type"]=='Lucas'){
        $sum2=$sum2+$row1["amount"];
        }
      else{
        $sum3=$sum3+$row1["amount"];
      }

   }

 }
echo "<tbody><tr><td>Exide</td><td>".$sum1." </td>";
echo "<tr><td>Lucas</td><td>".$sum2." </td>";
echo "<tr><td>Deganite</td><td>".$sum3." </td></tbody></table>";

} else {
    echo "0 results";
}
$conn->close();
?>
             </div>
             <br>
             <hr >
             
             <div  style="float:left">
            <!--give total amount of batteries-->
               <h5>  Year :<?php 
               echo $str1;?> Month :<?php echo $str2;?> Production Line :<?php echo $line;
                ?></h5>
             </div>
             <br>
             <hr >

             <div  style="float:left">
            <!--give total amount of batteries-->
               <h5>  Total Amount :<?php 
               echo $sum1+$sum2+$sum3;
                ?></h5>
             </div>
             <br>
             <hr >
              <div  style="float:left">
                <!--give current date-->
                  <h5>  Date : <?php echo date("Y/m/d"); ?></h5>
             </div>
             <br>
             <hr >
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
