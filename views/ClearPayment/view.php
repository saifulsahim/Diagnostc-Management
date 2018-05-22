<?php
require_once("../../vendor/autoload.php");

if (!isset($_SESSION)) session_start();


$objClearPayment = new App\ClearPayment\ClearPayment();

$objClearPayment->setData($_GET);

$singleData = $objClearPayment->view();

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
            <h3 style="color: #442a8d;width:100%; font-size:">Active List- Payment Information Entry</h3>

            <table class="table table-bordered table-striped">

                <?php

                echo "
                
                

                <tr>
                          <th>ID</th>                     <td>$singleData->id</td>
                
                </tr>
                
                
                <tr>
                         <th>Patient ID</th>                 <td>$singleData->patient_id</td>
                
                </tr>
                
                
                  <tr>
                            <th>Due</th>               <td>$singleData->due</td>
                
                </tr>
                             

                  <tr>
                            <th>Paid</th>                      <td>$singleData->paid</td>
                
                </tr>


                  <tr>
                        <th>Invoice No</th>                       <td>$singleData->invoice_no</td>
                
                </tr>


                
                 
                
          
                
                ";// end of echo


                ?>


            </table>


        </div>
    </div>
</div>


<script src="../../resource/bootstrap/js/jquery.js"></script>


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