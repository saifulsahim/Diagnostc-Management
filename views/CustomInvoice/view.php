<?php
require_once("../../vendor/autoload.php");

if (!isset($_SESSION)) session_start();


$objCustomInvoice = new App\CustomInvoice\CustomInvoice();

$objCustomInvoice->setData($_GET);

$singleData = $objCustomInvoice->view();

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
                         <th>Patient Name</th>                 <td>$singleData->patient_name</td>
                
                </tr>
                
                
                  <tr>
                            <th>Test Name</th>               <td>$singleData->test_name</td>
                
                </tr>
                
                   <tr>
                            <th>Ref By</th>                      <td>$singleData->doctor_name</td>
                
                </tr>

               
                  <tr>
                            <th>Invoice No</th>                      <td>$singleData->invoice_no</td>
                
                </tr>


                  <tr>
                        <th>Invoice Type</th>                       <td>$singleData->invoice_type</td>
                
                </tr>


                
                  <tr>
                      <th>Delivery Date</th>                             <td>$singleData->delivery_date</td>
                
                </tr>


                 
                  <tr>
                      <th>Total</th>                             <td>$singleData->total</td>
                
                </tr>
               
                
               
                
                 <tr>
                    <th>Enrty By</th>                           <td>$singleData->admin_name</td>
                
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