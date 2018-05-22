<?php
require_once("../../vendor/autoload.php");

if (!isset($_SESSION)) session_start();

if(!isset($_POST['fromDate'])) {
    \App\Utility\Utility::redirect("add_custom_invoice.php");
}

    $fromDate = $_POST['fromDate'];
    $toDate = $_POST['toDate'];

//var_dump($_POST);
//\App\Utility\Utility::dd($fromDate);

//\App\Utility\Utility::dd($toDate);
//var_dump($toDate);
//var_dump($_POST);


$objCustomInvoice = new App\CustomInvoice\CustomInvoice();

$allData = $objCustomInvoice->index($fromDate, $toDate);

//var_dump($allData);



?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Set Sub Test & Patient Information</title>


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
            <h3 style="color: #442a8d;width:100%; font-size:">Active List Test & Patient Information Entry</h3>






                <table class="table table-bordered table-striped">

                    <tr>


                        <th>Serial</th>
                        <th>ID</th>
                        <th>Patient Name</th>
                        <th>Test Name</th>
                        <th>Ref By</th>
                        <th>Invoice No</th>
                        <th>Invoice Type</th>
                        <th>Date</th>
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
                     <a href='print_invoice_details.php?invoice_no=$record->invoice_no' class='btn btn-success btn-sm'  title='Print'  target=\"_blank\">Print</></a>
                     <a href='delete.php?id=$record->id' class='btn btn-danger btn-sm' onclick='return confirm_delete()'>Delete</a>
                       
                        
                    
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

<script>

    function confirm_delete(){
        return confirm("Are you sure?");
    }

</script>


<script>

    function printContent(el) {
        var restorePage = document.body.innerHTML;
        var printContent = document.getElementById(el).innerHTML;
        document.body.innerHTML = printContent;
        window.print();
        document.body.innerHTML = restorePage;
    }





</script>
