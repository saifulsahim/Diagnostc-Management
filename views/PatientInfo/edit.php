<?php
require_once ("../../vendor/autoload.php");

if (!isset($_SESSION)) session_start();


$objDoctor = new \App\Doctors\Doctors();
$doctors = $objDoctor->index();

$objPatientInfo = new App\PatientInfo\PatientInfo();

$objPatientInfo->setData($_GET);

$singleData = $objPatientInfo->view();



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
            <h3 style="color: #442a8d;width:100%; font-size:"> Test & Patient Information Entry</h3>
            <link rel="stylesheet" href="../../resource/bootstrap/css/bootstrap.css">
            <link rel="stylesheet" href="../../resource/bootstrap/css/formstyle.css">

            <form action="update.php" method="post" class="form-horizontal">

                <div class="row">
                    <div class="col-lg-4">
                        <div>
                            <label for="title"> Patient Name:</label>
                            <input class="form-control" type="text" name="patientName" placeholder="Set Patient Name" value="<?php echo $singleData->patient_name ?>">
                        </div>


                        <div>
                            <label for="title"> Mobile No:</label>
                            <input class="form-control" type="text" name="mobileNo" placeholder="Set Patient Mobile NO" value="<?php echo $singleData->mobile_no ?>">

                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div>

                            <label for="title">Referred By </label>
                            <select class="form-control" name="doctorID" id="Select Doctor Name" value="<?php echo $singleData->doctor_id ?>" >
                                <option>Select Doctor </option>
                                <?php
                                foreach ($doctors as $doctor):
                                    ?>
                                    <option value="<?php echo $doctor->id; ?>"><?php echo $doctor->doctor_name; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div>
                            <label for="title"> Invoice No:</label>
                            <input class="form-control" type="text" name="invoiceNo" placeholder="Set Invoice No" value="<?php echo $singleData->invoice_no ?>">
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div>

                            <label for="title"> Age:</label>
                            <input class="form-control" type="text" name="age" placeholder="Set Age" value="<?php echo $singleData->age ?>">
                        </div>

                        <div>

                            <label for="title"> Delivery Date:</label>
                            <input type="text" name="deliveryDate" placeholder="Set Delivery date" value="<?php echo $singleData->delivery_date ?>">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <label for="title"> Description: </label>
                        <textarea rows="2" class="form-control" name="description"
                                  placeholder="Enter Description "><?php echo $singleData->description?></textarea>
                    </div>

                    <div class="col-lg-4">
                        <label for="title"> Sex </label>
                        <select class="form-control" name="sex" id=" Select Sex" value="<?php echo $singleData->sex ?>" >
                            <option>Select Sex</option>
                            <?php
                            if ($singleData->sex == 'Male') {
                                ?>
                                <option value="Male" selected>Male</option>
                                <option value="Female">Female</option>
                                <option value="Others">Others</option>
                            <?php } elseif ($singleData->sex == 'Female') { ?>
                                <option value="Male">Male</option>
                                <option value="Female" selected>Female</option>
                                <option value="Others">Others</option>
                            <?php } else { ?>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="others" selected>Others</option>
                            <?php } ?>


                        </select>
                    </div>

                    <div class="col-lg-4">
                        <label for="title"> Time:</label>
                        <input class="timepicker" type="text" name="time" placeholder="Set Time" value="<?php echo $singleData->time ?>">
                    </div>


                    <div class="row">
                        <div class="col-lg-4">

                            <label for="title"> Invoice Type:</label>
                            <select name="invoiceType" class="form-control" value="<?php echo $singleData->invoice_type ?>">

                                <option>--Select--</option>
                                <option value="income">Income</option>

                            </select>
                        </div>
                    </div>


                    <input type="hidden" name="id" value="<?php echo $singleData->id?>">


                    <div class="">
                        <input type="submit" class="btn btn-primary" name="submit" value="Update">
                    </div>
                </div>
                <br>

