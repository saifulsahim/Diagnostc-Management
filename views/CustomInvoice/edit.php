<?php
require_once ("../../vendor/autoload.php");

if (!isset($_SESSION)) session_start();

$objDoctor = new \App\Doctors\Doctors();
$doctors = $objDoctor->index();





$objCustomInvoice =  new App\CustomInvoice\CustomInvoice();

$objCustomInvoice->setData($_GET);

$singleData = $objCustomInvoice->view();

?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Set Custom Invoice Information</title>

    <link rel="stylesheet" href="../../resource/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../../resource/datepicker/css/bootstrap-datepicker3.css">
    <link rel="stylesheet" href="../../resource/bootstrap/css/formstyle.css">
    <style>
        body {
            background: antiquewhite;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 style="color: #442a8d;width:100%; font-size:"> Custom Invoice Information Entry</h2>

            <form action="update.php" method="post">



                <strong> Patient Name </strong>
                <input class="form-control" type="text" name="name" placeholder="Set Expense Category Name" value="<?php echo $singleData->patient_name ?>">
                <br>

                <strong> Test Name </strong>
                <input class="form-control" type="text" name="name" placeholder="Set Expense Category Name" value="<?php echo $singleData->test_name ?>">
                <br>


                <strong> Ref By </strong>
                <select class="form-control" name="doctorID" id="Select Doctor Name"
                        value="<?php echo $singleData->doctor_name ?>">
                    <option>Select Doctor</option>
                    <?php
                    foreach ($doctors as $doctor):
                        ?>
                        <option value="<?php echo $doctor->id; ?>"><?php echo $doctor->doctor_name; ?></option>
                    <?php endforeach; ?>
                </select>



                <strong> Invoice No </strong>
                <input class="form-control" type="text" name="name" placeholder="Set Expense Category Name" value="<?php echo $singleData->invoice_no ?>">
                <br>

                <strong> Invoice Type </strong>
                <input class="form-control" type="text" name="name" placeholder="Set Expense Category Name" value="<?php echo $singleData->invoice_type ?>">
                <br>

                <strong> Delivery Date </strong>
                <input class="form-control" type="text" name="name" placeholder="Set Expense Category Name" value="<?php echo $singleData->delivery_date ?>">
                <br>


                <strong> Total </strong>
                <input class="form-control" type="text" name="name" placeholder="Set Expense Category Name" value="<?php echo $singleData->total ?>">
                <br>

                <strong> Entry By </strong>
                <input class="form-control" type="text" name="name" placeholder="Set Expense Category Name" value="<?php echo $singleData->admin_name ?>">
                <br>







                <input type="hidden" name="id" value="<?php echo $singleData->id?>">


                <button class="btn btn-success" type="submit">Submit</button>

            </form>
        </div>
    </div>
</div>

<script src="../../resource/bootstrap/js/jquery.js"></script>

<script src="../../resource/datepicker/js/bootstrap-datepicker.js"></script>




<script>
    $(function () {
        $('.datepicker').datepicker()

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
