<?php

require_once("../../vendor/autoload.php");
if (!isset($_SESSION)) session_start();

use App\Message\Message;

$msg = Message::message();

echo "<div>  <div id='message'>  $msg </div>   </div>";

$objPatientInfo = new App\PatientInfo\PatientInfo();

$objPatientInfo->setData($_GET);

$singleData = $objPatientInfo->view();

?>


<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Set Sub Test & Patient Information</title>

    <link rel="stylesheet" href="../../resource/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../../resource/datepicker/css/bootstrap-datepicker3.css">
    <link rel="stylesheet" href="../../resource/bootstrap/css/formstyle.css">
    <link rel="stylesheet" href="../../resource/timepicker/jquery.timepicker.min.css">
    <style>
        body {
            background: white;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 style="color: #442a8d;width:100%; font-size:">Active List Test & Patient Information Entry</h3>

            <table class="table table-bordered table-striped">

                <?php

                echo "
                         
                
                <tr>
                    <th>ID</th>                        <td>$singleData->id</td>                
                </tr>


                <tr>
                    <th>Patient Name</th>                <td>$singleData->patient_name</td>
                
                </tr>
                
                <tr>
                    <th>Mobile No</th>                     <td>$singleData->mobile_no</td>
                                 
                </tr>
                
                 <tr>
                    <th>Age</th>                           <td>$singleData->age</td>
                
                </tr>
                    <th>Sex</th>                              <td>$singleData->sex</td>
                
                 <tr>
                       <th>Referred By</th>                       <td>$singleData->doctor_id</td>
                
                </tr>
                          <th>Delivery Date</th>                     <td>$singleData->delivery_date</td>
                 <tr>
                
                
                </tr>
                      <th>Description</th>                        <td>$singleData->description</td>                            
                 
                 <tr>
                
                
                </tr>
                           <th>Invoice No</th>                        <td>$singleData->invoice_no</td>
                 <tr>
                
                
                </tr>
                         <th>Invoice Type</th>                           <td>$singleData->invoice_type</td>
                 <tr>
                
                
                </tr>
                                     
                   <th>Time</th>                                  <td>$singleData->time</td>
                    
                                                           
                      ";// end of echo

                ?>


            </table>


        </div>
    </div>
</div>

<script src="../../resource/bootstrap/js/jquery.js"></script>
<script src="../../resource/datepicker/js/bootstrap-datepicker.js"></script>
<script src="../../resource/timepicker/jquery.timepicker.min.js"></script>
<script>
    $(function () {
        $('.datepicker').datepicker()

    });
</script>

<script>
    $(document).ready(function () {
        $('input.timepicker').timepicker({});
    });

</script>


<script>


    jQuery(
        function ($) {
            $('#message').fadeOut(550);
            $('#message').fadeIn(550);
            $('#message').fadeOut(550);
            $('#message').fadeIn(550);
            $('#message').fadeOut(550);
            $('#message').fadeIn(550);
            $('#message').fadeOut(550);
        }
    )
</script>


</body>
</html>