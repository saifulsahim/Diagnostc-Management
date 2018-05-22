<?php

require_once("../../vendor/autoload.php");
if (!isset($_SESSION)) session_start();

use App\Message\Message;

$msg = Message::message();

echo "<div>  <div id='message'>  $msg </div>   </div>";
$test_obj = new \App\TestCategory\TestCategory();
$tests = $test_obj->index();

$obj = new \App\SubTestCategory\SubTestCategory();

$obj->setData($_GET);

$singleData=$obj->view();


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
        <div class="col-md-12">
            <h2 style="color: #442a8d;width:100%; font-size:"> Sub Category Information Entry</h2>

            <form action="update.php" method="post">


                <strong>Select Test Category Name</strong>
                <select class="form-control" name="categoryID" id="Select Test Category Name" value="<?php echo $singleData->category_id ?>"">
                    <option>Select Test Category Name</option>
                    <?php
                    foreach ($tests as $test):
                        ?>
                        <option value="<?php echo $test->id; ?>"><?php echo $test->name; ?></option>
                    <?php endforeach; ?>
                </select>

                <br>

                <strong> Sub Test Name:</strong>
                <input class="form-control" type="text" name="testName" placeholder="Set Sub Test Name" value="<?php echo $singleData->test_name ?>">
                <br>

                <strong> Lab ID:</strong>
                <input class="form-control" type="text" name="labID" placeholder="Set Lab ID" value="<?php echo $singleData->lab_id ?>">
                <br>

                <strong> Sub test Price:</strong>
                <input class="form-control" type="text" name="testPrice" placeholder="Set Sub Test Price" value="<?php echo $singleData->test_price ?>">
                <br>

                <input type="hidden" name="id" value="<?php echo $singleData->id?>">

                <button class="btn btn-success" type="submit">Update</button>

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