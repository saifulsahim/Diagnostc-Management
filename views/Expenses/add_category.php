<?php

require_once("../../vendor/autoload.php");
if (!isset($_SESSION)) session_start();

use App\Message\Message;

$msg = Message::message();

echo "<div>  <div id='message'>  $msg </div>   </div>";

?>


<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Set Expense Category Information</title>

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
            <h2 style="color: #442a8d;width:100%; font-size:"> Expense Category Information Entry</h2>

            <form action="store.php" method="post">



                <strong> Name </strong>
                <input class="form-control" type="text" name="name" placeholder="Set Expense Category Name">
                <br>

                <strong> Description: </strong>
                <textarea rows="2" class="form-control" name="description" placeholder="Enter Description "></textarea>
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