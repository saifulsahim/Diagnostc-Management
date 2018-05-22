<?php

require_once("../../vendor/autoload.php");
if (!isset($_SESSION)) session_start();

use App\Message\Message;

$msg = Message::message();

echo "<div>  <div id='message'>  $msg </div>   </div>";

$obj = new \App\TestCategory\TestCategory();
$tests = $obj->index();

?>


<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Set Sub Test Category Information</title>

    <link rel="stylesheet" href="../../resource/bootstrap/css/bootstrap.css">
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
        <div class="col-md-4">
            <h2 style="color: #442a8d;width:100%; font-size:"> Sub Category Information Entry</h2>

            <form action="store.php" method="post">


                <strong>Select Test Category Name</strong>
                <select class="form-control" name="categoryID" id="Select Test CategoryID">
                    <option>Select Test Category Name</option>
                    <?php
                    foreach ($tests as $test):
                        ?>
                        <option value="<?php echo $test->id; ?>"><?php echo $test->name; ?></option>
                    <?php endforeach; ?>
                </select>

                <br>

                <strong> Sub Test Name:</strong>
                <input class="form-control" type="text" name="testName" placeholder="Set Sub Test Name">
                <br>

                <strong> Lab ID:</strong>
                <input class="form-control" type="text" name="labID" placeholder="Set Lab ID">
                <br>

                <strong> Sub test Price:</strong>
                <input class="form-control" type="text" name="testPrice" placeholder="Set Sub Test Price">
                <br>

                <button class="btn btn-success" type="submit">Submit</button>

            </form>
        </div>
    </div>
</div>

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