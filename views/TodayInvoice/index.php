<?php
require_once("../../vendor/autoload.php");

if (!isset($_SESSION)) session_start();

$objTodayInvoice = new App\TodayInvoice\TodayInvoice();

$allData= $objTodayInvoice->index();

?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Set Today Invoice</title>


    <script src="../../resource/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../resource/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../resource/bootstrap/css/main.css">

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
            <h3 style="color: #442a8d;width:100%; font-size:">Active List Today Invoice</h3>





            <table class="table table-bordered table-striped">

                <tr>


                    <th>Serial</th>
                    <th>ID</th>
                    <th>Patient Name</th>
                    <th>Test Name</th>
                    <th>Ref By</th>
                    <th>Invoice No</th>
                    <th>Invoice Type</th>
                    <th>Delivery Date</th>
                    <th>Total Amount</th>
                    <th>Entry By</th>
                    <th>Action Buttons</th>

                </tr>


                <?php

                $serial = 1;

                foreach ($allData as $record) {

                    echo "
                         
                         
                <tr>
                
               
                    <td>$serial</td>
                    <td>$record->id</td>
                    <td>$record->patient_name</td>
                    <td>$record->test_name</td>
                    <td>$record->doctor_name</td>
                    <td>$record->invoice_no</td>
                    <td>$record->invoice_type</td>
                    <td>$record->delivery_date</td>                 
                    <td>$record->total</td>                  
                    <td>$record->admin_name</td>
               
                    <td>
                    
                     
                     <a href='view.php?id=$record->id' class='btn btn-primary btn-sm'>View</a>
                     <a href='edit.php?id=$record->id' class='btn btn-success btn-sm'>Edit</></a>
                
                       
                        
                    
                    </td>
                    

                </tr>
                                                 
                                                                        
                      ";// end of echo

                    $serial++;

                }// end of foreach loop


                ?>


            </table>



        </div>
    </div>
</div>



