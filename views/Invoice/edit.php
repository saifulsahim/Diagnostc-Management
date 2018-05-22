<?php

require_once("../../vendor/autoload.php");


if (!isset($_SESSION)) session_start();

$objInvoice = new App\Invoice\Invoice();

$objInvoice->setData($_GET);

$singleData = $objInvoice->view();



$invoice_no = $_GET['invoice_no'];



if (isset($_GET['invoice_no'])) {

    $objInvoice = new App\Invoice\Invoice();
    $allData = $objInvoice->get_patient_info($invoice_no);
    //var_dump($allData);

    $objInvoice = new App\Invoice\Invoice();
    $allData1 = $objInvoice->get_payment_details($invoice_no);
    //var_dump($allData1);

    $objInvoice = new App\Invoice\Invoice();
    $allData2 = $objInvoice->get_clear_payment($invoice_no);
    //var_dump($allData2);
//$objClearPayment = new App\ClearPayment\ClearPayment();
//$objClearPayment->setData($_GET);
//$singleData1 = $objClearPayment->viewById($_GET['id']);
}

$objDoctor = new \App\Doctors\Doctors();
$doctors = $objDoctor->index();


//echo objpaymentinfo"<br>";
$singleData1=$_GET['id'];
$objPayment = new \App\Payment\Payment();
$total = $objPayment->indexbyid($singleData1);


//echo "<br>";
$objsubtestcategories = new \App\SubTestCategory\SubTestCategory();

$price = $objsubtestcategories->indexbyprice($total->sub_test_id);
//var_dump($price);

//$objPayment = new App\Payment\Payment();

//$singleData= $objPayment->view();


//echo "<br>";


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
                            <label for="title"> Patient Name:</label>
                            <input class="form-control" type="text" name="patientName" placeholder="Set Patient Name"
                                   value="<?php echo $allData->patient_name ?>">
                        </div>


                        <div>
                            <label for="title"> Age:</label>
                            <input class="form-control" type="text" name="age" placeholder="Set Patient Mobile NO"
                                   value="<?php echo $allData->age ?>">

                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div>

                            <label for="title"> Mobile No:</label>
                            <input class="form-control" type="text" name="mobileNo" placeholder="Set Age"
                                   value="<?php echo $allData->mobile_no ?>">
                        </div>

                        <div>
                            <label for="title"> Sex:</label>
                            <select name="sex" class="form-control">
                                <option>--Select Gender--</option>
                                <?php
                                if ($allData == 'Male') {
                                    ?>
                                    <option value="Male" selected>Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Others">Others</option>
                                <?php } elseif ($allData == 'Female') { ?>
                                    <option value="Male">Male</option>
                                    <option value="Female" selected>Female</option>
                                    <option value="Others">Others</option>
                                <?php } else { ?>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Others" selected>Others</option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div>
                            <label for="title"> Description: </label>
                            <textarea rows="2" class="form-control" name="description"
                                      placeholder="Enter Description "><?php echo $allData->description ?></textarea>
                        </div>

                        <div>

                            <label for="title"> Invoice No: </label>
                            <input class="form-control" type="text" name="invoiceNo" placeholder="Set Total"
                                   value="<?php echo $allData->invoice_no ?>">

                        </div>


                    </div>

                    <div class="row">

                        <div class="col-lg-4">


                            <label for="title"> Invoice Type: </label>
                            <select name="invoiceType" class="form-control">
                                <option>--Select--</option>
                                <option value="income">Income</option>
<!--                                --><?php
//                                if ($allData == 'income') {
//                                    ?>
<!--                                    <option value="income" selected>Income</option>-->
<!--                                --><?php //} ?>
                            </select>

                        </div>
                        <div>


                            <label for="title">Referred By </label>
                            <select class="form-control" name="doctorID" id="Select Doctor Name"
                                    value="<?php echo $allData->doctor_name ?>">
                                <option>Select Doctor</option>
                                <?php
                                foreach ($doctors as $doctor):
                                    ?>
                                    <option value="<?php echo $doctor->id; ?>"><?php echo $doctor->doctor_name; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-lg-4">

                            <label for="title"> Delivery Date:</label>
                            <input class="datepicker" type="text" name="deliveryDate" placeholder="Set Delivery date"
                                   value="<?php echo $allData->delivery_date ?>">
                        </div>


                        <div class="col-lg-4">
                            <label for="title"> Time:</label>
                            <input class="timepicker" type="text" name="time" placeholder="Set Time"
                                   value="<?php echo $allData->time ?>">
                        </div>


                    </div>

                    <hr>

                    <table class="table table-bordered">
                        <tr>
                            <td>Test Name</td>
                            <td>Test Quantity</td>
                            <td>Price</td>
                            <td>Total</td>


                        </tr>
                        <tr>
                            <td><?php echo $price->test_name ?></td>
                            <td> <?php echo $total->quantity ?></td>
                            <td><?php echo $price->test_price ?></td>
                            <td> <?php echo $total->total ?></td>

                        </tr>

                        <tr>
                            <td colspan="3">Paid</td>
                            <td><input type="text" name="paid" class="pay" value="<?php echo $allData2->paid ?>"></td>
                        </tr>
                        <tr>
                            <td colspan="3">Due</td>
                            <td><input readonly class="due_price"  value="<?php echo $allData2->due ?>" type="text"
                                       name="due"></td>

                            <td></td>

                        </tr>

                        <tr>
                            <td colspan="3">Total</td>
                            <td><input class="total" value="<?php echo $total->total ?>  "></td>

                            <td></td>

                        </tr>



                        <input type="hidden" name="id" value="<?php echo $singleData->id ?>">

<!--                        -->
<!--                        -->
<!--                        <input type="hidden" name="invoiceNo" value="--><?php //echo $singleData->invoice_no ?><!--">-->
<!---->
<!--<!--                        <input type="hidden" name="id" value="--><?php ////echo $singleData1->id ?><!--<!--">-->
<!---->


                </div>
                <tr>
                    <td> <input type="submit" class="btn btn-primary" name="submit" value="Update"></td>
                </tr>

            </form>
            <br>


        </div>

    </div>
</div>
</body>
</html>


<script src="../../resource/bootstrap/js/jquery.js"></script>

<script src="../../resource/datepicker/js/bootstrap-datepicker.js"></script>

<script src="../../resource/timepicker/jquery.timepicker.min.js"></script>


<script>
    $(function () {
        $('.datepicker').datepicker();

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


<script>

    function dueCalculation() {
        var pay = document.getElementsByClassName('pay')[0].value;

        var total = document.getElementsByClassName('total')[0].value;
        var due = (total - pay);
        document.getElementsByClassName('due_price')[0].value = due;
    }

    var pay = document.getElementsByClassName('pay')[0];
    pay.addEventListener("change", dueCalculation, false);

</script>