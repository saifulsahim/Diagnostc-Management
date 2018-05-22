<!--

<?php
require_once("../../vendor/autoload.php");
if (!isset($_SESSION)) session_start();

use App\Message\Message;

$msg = Message::message();

echo "<div>  <div id='message'>  $msg </div>   </div>";

//$obj = new \App\Invoice\Invoice();
//$sahim = $obj->get_all_invoice_info();


$objDoctor = new \App\Doctors\Doctors();
$doctors = $objDoctor->index();
//App\Utility\Utility::dd($doctors);

$obj = new App\SubTestCategory\SubTestCategory();
$sub_test_categories = $obj->sub_test_category_with_price();
//\App\Utility\Utility::dd($sub_test_categories);

//print_r($_SESSION['test_cart']);

if (isset($_POST['add_to_cart'])) {
    if (isset($_SESSION['test_cart'])) {
        $is_available = 0;
        foreach ($_SESSION['test_cart'] as $keys => $value) {
            if ($_SESSION['test_cart'][$keys]['test_id'] == $_POST['test_id']) {
                $is_available++;
                $_SESSION['test_cart'][$keys]['quantity'] = $_SESSION['test_cart'][$keys]['quantity'] + $_POST['quantity'];
            }
        }
        if ($is_available < 1) {
            $item_array = array(
                'test_id' => $_POST['test_id'],
                'test_name' => $_POST['test_name'],
                'test_price' => $_POST['test_price'],
                'quantity' => $_POST['quantity']
            );
            $_SESSION['test_cart'][] = $item_array;
        }
    } else {
        $item_array = array(
            'test_id' => $_POST['test_id'],
            'test_name' => $_POST['test_name'],
            'test_price' => $_POST['test_price'],
            'quantity' => $_POST['quantity']
        );
        $_SESSION['test_cart'][] = $item_array;
    }
}

if (isset($_GET["action"])) {
    if ($_GET["action"] == "delete") {
        foreach ($_SESSION["test_cart"] as $keys => $value) {
            if ($value["test_id"] == $_GET["id"]) {
                unset($_SESSION["test_cart"][$keys]);

            }
        }
    }
}

//Add Patient Info
$insert_id = '';
$message = '';

if (isset($_POST['submit'])) {
    $patient = new App\PatientInfo\PatientInfo();
    $patient->patientName = $_POST['patientName'];
    $patient->age = $_POST['age'];
    $patient->sex = $_POST['sex'];
    $patient->mobileNo = $_POST['mobileNo'];
    $patient->deliveryDate = $_POST['deliveryDate'];
    $patient->time = $_POST['time'];
    $patient->description = $_POST['description'];
    $patient->invoiceType = $_POST['invoiceType'];
    $patient->invoiceNo = $_POST['invoiceNo'];
    $patient->doctorID = $_POST['doctorID'];




    //echo "ok";
    $insert_id = $patient->store();

    //$patient->doctorID = $insert_id;


    if (isset($_SESSION['test_cart'])) {
        if (!empty($_SESSION['test_cart'])) {
            foreach ($_SESSION['test_cart'] as $keys => $value) {
                $payment = new App\Payment\Payment();
                $payment->patient_id = $insert_id;
                $payment->sub_test_id = $value['test_id'];
                $payment->date = $_POST['deliveryDate'];
                $payment->quantity = $value['quantity'];
                $payment->total = $value['quantity'] * $value['test_price'];
                $payment->invoice_no = $_POST['invoiceNo'];
                $payment->admin_id = $_SESSION['admin_id'];

                //\App\Utility\Utility::dd($payment);


                $payment->store();
            }
        }

    }
    unset($_SESSION['test_cart']);
    $clear_payment = new  App\ClearPayment\ClearPayment();

    $clear_payment->patient_id = $insert_id;
    $clear_payment->invoice_no = $_POST['invoiceNo'];
    $clear_payment->paid = $_POST['paid'];
    $clear_payment->due = $_POST['due'];
    //\App\Utility\Utility::dd($clear_payment);

    if ($clear_payment->store()) {
        $message = "<div class='alert alert-success'>Record Insert Successfully</div>";
        header("Location: manage_invoice.php?action=print_invoice_details&invoice_no=" . $_POST['invoice_no']);
    }
}


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

            <form action="" method="post" class="form-horizontal">

                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="title"> Patient Name:</label>
                            <input class="form-control" type="text" name="patientName" placeholder="Set Patient Name">
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group">

                            <label for="title">Referred By </label>
                            <select class="form-control" name="doctorID" id="Select Doctor Name">
                                <option>Select Doctor </option>
                                <?php
                                foreach ($doctors as $doctor):
                                    ?>
                                    <option value="<?php echo $doctor->id; ?>"><?php echo $doctor->doctor_name; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group">

                            <label for="title"> Age:</label>
                            <input class="form-control" type="text" name="age" placeholder="Set Age">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="title"> Description: </label>
                            <textarea rows="2" class="form-control" name="description"
                                      placeholder="Enter Description "></textarea>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="title"> Sex </label>
                            <select class="form-control" name="sex" id=" Select Sex">
                                <option>Select Sex</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Others ">Others</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="title"> Time:</label>
                            <input class="timepicker" type="text" name="time" placeholder="Set Time">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="title"> Invoice Type:</label>
                            <select name="invoiceType" class="form-control">

                                <option>--Select--</option>
                                <option value="income">Income</option>

                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <div>
                                <label for="title"> Mobile No:</label>
                                <input class="form-control" type="text" name="mobileNo" placeholder="Set Patient Mobile NO">

                            </div>
                        </div>
                    </div>


                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="title"> Delivery Date:</label>
                            <input class="datepicker form-control"  type="text" name="deliveryDate" placeholder="Set Delivery date">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="title"> Invoice No:</label>
                            <input class="form-control" type="text" name="invoiceNo" placeholder="Set Invoice No">
                        </div>
                    </div>
                </div>


                <div class="">
                    <input type="submit" class="btn btn-primary" name="submit" value="Confirm">
                </div>

        </div>

        <div class="col-lg-4">
            <div class="row">
                <h3 align="right">Test Cart</h3><br>


                <div style="clear:both"></div>
                <br/>
                <h3>Order Details</h3>
                <div class="table-responsive">


                    <?php

                    $obj = new \App\TestCategory\TestCategory();
                    $aa = $obj->index();


                    ?>

                    <div class="form-group">
                        <?php foreach ($aa as $row) {


                            ?>
                            <label for="title"><h4><span
                                            class="bg-info"></span> <?php echo $row->name; ?>
                                </h4>
                            </label>
                            <?php echo '<br>';
                            $obj1 = new App\SubTestCategory\SubTestCategory();
                            $sub_category_list = $obj1->indexbyid($row->id);
                            foreach ($sub_category_list as $list):

                                ?>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="test_id" value="<?php echo $list->id; ?>">
                                    <input type="hidden" name="quantity" id="quantity<?php echo $list->id; ?>" value="1">
                                    <input type="hidden" name="test_name" id="name<?php echo $list->id; ?>"
                                           value="<?php echo $list->test_name; ?>">
                                    <input type="hidden" name="test_price" id="price<?php echo $list->id; ?>"
                                           value="<?php echo $list->test_price; ?>">
                                    <input style="height: 40px;width: 40px; margin-right: 20px ;outline: none;" type="submit" class="btn btn-success"
                                           name="add_to_cart"
                                           id="<?php echo $list->id; ?>"
                                           value="&#43"><?php echo $list->test_name . ' ' . $list->test_price . '<br>'; ?>
                                </form>
                            <?php endforeach;
                        } ?>
                    </div>
                </div>
            </div>
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
        $('.datepicker').datepicker()

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

-->