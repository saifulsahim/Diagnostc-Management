<?php

require_once("../../vendor/autoload.php");
if (!isset($_SESSION)) session_start();

use App\Message\Message;

$msg = Message::message();

echo "<div>  <div id='message'>  $msg </div>   </div>";

$obj = new App\Expenses\Expenses();
$expenses_categories = $obj->index();
//var_dump($expenses_categories);
//$adminId= new App\ExpenseInvoice\ExpenseInvoice();
//$adminId->admin_id = $_SESSION['admin_id'];
//var_dump($adminId);

?>


<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Set Expense Information</title>

    <link rel="stylesheet" href="../../resource/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../../resource/datepicker/css/bootstrap-datepicker3.css">
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
        <div class="col-md-6">
            <h3 style="color: #442a8d;width:100%; font-size:"> Test & Patient Information Entry</h3>

            <form action="store.php" method="post">

                <strong> Invoice No:</strong>
                <input class="form-control" type="text" name="invoiceNo" placeholder="Set Invoice No">
                <br>


                <strong>Expense Category </strong>
                <select class="form-control" name="expenseId" id="Select Expense Category">

                    <option>Select Expense Category</option>

                    <?php foreach ($expenses_categories as $value): ?>
                        <option value="<?php echo $value->id; ?>"><?php echo $value->name; ?></option>
                    <?php endforeach; ?>

                </select>
                <br>



                <strong> Amount:</strong>
                <input class="form-control" type="text" name="amount" placeholder="Set Expense Amount">
                <br>

                <strong> Date:</strong>
                <input class="datepicker"   type="text" name="date">
                <br>


                <strong> Description: </strong>
                <textarea rows="2" class="form-control" name="description" placeholder="Enter Description "></textarea>
                <br>



                <button class="btn btn-success" type="submit">Confirm</button>

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