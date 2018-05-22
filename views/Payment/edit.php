<?php
require_once("../../vendor/autoload.php");

if (!isset($_SESSION)) session_start();



$objPayment = new App\Payment\Payment();

$objPayment->setData($_GET);

$singleData1 = $objPayment->view();


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
                                   value="<?php echo $singleData1->patient_id ?>">
                        </div>


                        <div>
                            <label for="title"> Sub Test ID:</label>
                            <input class="form-control" type="text" name="sub_test_id" placeholder="Set Patient Mobile NO"
                                   value="<?php echo $singleData1->sub_test_id ?>">

                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div>

                            <label for="title"> Date:</label>
                            <input class="form-control" type="text" name="date" placeholder="Set Age"
                                   value="<?php echo $singleData1->date ?>">
                        </div>

                        <div>
                            <label for="title"> Quantity:</label>
                            <input class="form-control" type="text" name="quantity" placeholder="Set Invoice No"
                                   value="<?php echo $singleData1->quantity ?>">
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div>
                            <label for="title"> Total: </label>
                            <input class="form-control" type="text" name="total" placeholder="Set Total"
                                   value="<?php echo $singleData1->total ?>">
                        </div>


                        <div>
                            <label for="title"> Invoice No:</label>
                            <input class="form-control" type="text" name="invoice_no" placeholder="Set Invoice No"
                                   value="<?php echo $singleData1->invoice_no ?>">
                        </div>
                    </div>
                </div>

                <div class="row">


                    <div class="col-lg-4">
                        <label for="title"> Admin ID:</label>
                        <input class="timepicker" type="text" name="admin_id" placeholder="Set Time"
                               value="<?php echo $singleData1->admin_id ?>">
                    </div>


                    <input type="hidden" name="id" value="<?php echo $singleData1->id ?>">


                    <div class="">
                        <input type="submit" class="btn btn-primary" name="submit" value="Update">
                    </div>
                </div>
                <br>

