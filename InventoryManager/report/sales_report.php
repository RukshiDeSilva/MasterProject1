<?php
include_once "../../database/connect.php";
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
<a href="salesDrop.php" class="button">Back</a>
<body id="content">
    
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                      <!-- header-->
                        <h1 class="page-head-line">Sales Report</h1>

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
               <strong>   Sales Report</strong>
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
echo'<table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>DealerName</th>
                                    <th>Exide</th>
                                    <th>Lucas</th>
                                    <th>Deganite</th>
                                    
                                </tr>
                            </thead>';   

if ($_SERVER["REQUEST_METHOD"] == "POST"){
              if(empty($_POST['area'])){ 
                        $area_noerr = "";
                        $error = TRUE;
                    }else{
                        $area_no = $_POST['area'];
                        echo "<b>".$area_no."</b>";
                        echo "</br>";
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


              
              echo "<b>"."$_POST[year] "."</b>";
              $monthNum  = $_POST['month'];
              $dateObj   = DateTime::createFromFormat('!m', $monthNum);
              $monthName = $dateObj->format('F');
              echo "<b>".$monthName."</b>";
              $sql2="SELECT dealer_id FROM dealer WHERE area_no=$a_no and active=1";
              $query2=(mysqli_query($connection,$sql2));
              while ($res2 = mysqli_fetch_assoc($query2)) {
                $sql="SELECT dealer_id,SUM(IF(battery_type = 'exide', Amount, 0)) AS 'Exide',SUM(IF(battery_type = 'lucas', Amount, 0)) AS 'Lucas',SUM(IF(battery_type = 'deganite', Amount, 0)) AS 'Dagenite',SUM(Amount) AS Total FROM sold WHERE YEAR(sold_date) ='$_POST[year]' AND MONTH(sold_date) = '$_POST[month]' AND dealer_id = '$res2[dealer_id]' GROUP BY dealer_id";
              $query=(mysqli_query($connection,$sql));
              while($res = mysqli_fetch_assoc($query)){ 
                        $sql3 = "SELECT dealer_name FROM dealer WHERE dealer_id = '$res[dealer_id]' ";
                        $query3=(mysqli_query($connection,$sql3));
                        while($res3 = mysqli_fetch_assoc($query3)){ 
                          echo "<tr>";
                          echo "<th>".$res3['dealer_name']."</th>";
                      }
                          echo "<th>".$res['Exide']."</th>";
                          echo "<th>".$res['Lucas']."</th>";
                          echo "<th>".$res['Dagenite']."</th>";
                          

              }

            }
            echo "</table>";
          }

        $connection->close();


?>

                                
             </div>
             <hr />


             
             
             
              <div  style="float:left">
                <!--give current date-->
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
