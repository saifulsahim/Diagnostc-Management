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
    <title>Set Test & Patient Information</title>

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
        <div class="col-md-8">
            <h3 style="color: #442a8d;width:100%; font-size:"> Payment Information Entry</h3>
            <link rel="stylesheet" href="../../resource/bootstrap/css/bootstrap.css">
            <link rel="stylesheet" href="../../resource/bootstrap/css/formstyle.css">

            <form action="update.php" method="post" class="form-horizontal">

                <div class="row">
                    <div class="col-lg-4">
                        <div>
                            <label for="title"> Patient ID:</label>
                            <input class="form-control" type="text" name="patient_id" placeholder="Set Patient Name"
                                   value="<?php echo $singleData->patient_id ?>">
                        </div>


                        <div>
                            <label for="title"> Due:</label>
                            <input class="form-control" type="text" name="due" placeholder="Set Patient Mobile NO"
                                   value="<?php echo $singleData->due ?>">

                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div>

                            <label for="title"> Paid:</label>
                            <input class="form-control" type="text" name="paid" placeholder="Set Age"
                                   value="<?php echo $singleData->paid ?>">
                        </div>

                        <div>
                            <label for="title"> Invoice No:</label>
                            <input class="form-control" type="text" name="invoice_no" placeholder="Set Invoice No"
                                   value="<?php echo $singleData->invoice_no ?>">
                        </div>
                    </div>


                </div>

                <div class="row">



                    <input type="hidden" name="id" value="<?php echo $singleData->id ?>">


                    <div class="">
                        <input type="submit" class="btn btn-primary" name="submit" value="Update">
                    </div>
                </div>
                <br>

