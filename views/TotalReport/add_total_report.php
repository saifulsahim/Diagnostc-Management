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
    <title>Total Report</title>

    <link rel="stylesheet" href="../../resource/bootstrap/css/bootstrap.min.css">
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
        <div class="col-md-4">
            <h3 style="color: #442a8d;width:100%; font-size:"> Total Report</h3>

            <form action="index.php" method="post">


                <strong> From Date:</strong>
                <input  type="text" id="datepicker"  name="fromDate">
                <br>


                <strong> To Date:</strong>
                <input type="text" id="datepicker2"   name="toDate">
                <br>


                <button class="btn btn-success" type="submit">View Report</button>

            </form>
        </div>
    </div>
</div>



<script src="../../resource/bootstrap/js/jquery.js"></script>
<script src="../../resource/datepicker/js/bootstrap-datepicker.js"></script>




<script>

    $(function () {
        $("#datepicker").datepicker({ dateFormat: 'yy-mm-dd' });
    });



    $(function () {
        $("#datepicker2").datepicker({ dateFormat: 'yy-mm-dd' });
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