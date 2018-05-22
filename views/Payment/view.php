<?php
require_once("../../vendor/autoload.php");

if (!isset($_SESSION)) session_start();


$objPayment = new App\Payment\Payment();

$objPayment->setData($_GET);

$singleData = $objPayment->view();

?>


<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Set Sub Test & Patient Information</title>

    <link rel="stylesheet" href="../../resource/bootstrap/css/bootstrap.css">

    <link rel="stylesheet" href="../../resource/bootstrap/css/formstyle.css">

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
                            <th>Sub Test ID</th>               <td>$singleData->sub_test_id</td>
                
                </tr>
                             

                  <tr>
                            <th>Date</th>                      <td>$singleData->date</td>
                
                </tr>


                  <tr>
                        <th>Quantity</th>                       <td>$singleData->quantity</td>
                
                </tr>


                
                  <tr>
                      <th>Total</th>                             <td>$singleData->total</td>
                
                </tr>


                  
                <tr>
                    <th>Invoice No</th>                           <td>$singleData->invoice_no</td>
                
                </tr>
                
                
                   <tr>
                          <th>Admin ID</th>                        <td>$singleData->admin_id</td>
                
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