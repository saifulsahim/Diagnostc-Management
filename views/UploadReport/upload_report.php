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
    <title>Set Report Information</title>

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
            <h2 style="color: #442a8d;width:100%; font-size:"> Report Information Entry</h2>

            <form  action="store.php" method="post" enctype="multipart/form-data">





                <strong>Select Invoice</strong>
                <select class="form-control" name="invoiceName" id="Select Invoice">
                    <option>Select Invoice</option>
                    <option value="10001 - Dana Glenn (+581-41-4462858)">10001 - Dana Glenn (+581-41-4462858)</option>
                    <option value="10002 - Xander Mcfarland (+12575698632)">10002 - Xander Mcfarland (+12575698632)</option>
                    <option value="10003 - Margaret Fitzgerald (+12575698632)">10003 - Margaret Fitzgerald (+12575698632)</option>
                    <option value="10004 - Raja Gross (+12575698632)">10004 - Raja Gross (+12575698632)</option>
                    <option value="10005 - Plato Glover (+12575698632)">10005 - Plato Glover (+12575698632)</option>
                </select>
                <br>

                <strong>Select Sub Category</strong>
                <select class="form-control" name="categoryName" id="Select Invoice">
                    <option>Select Sub Category</option>
                    <option value="Chest">Chest</option>
                    <option value="Lower Abdomen">Lower Abdomen</option>
                    <option value="Whole Abdomen">Whole Abdomen</option>
                    <option value="Sella Turcica">Sella Turcica</option>
                </select>
                <br>


                <strong> File </strong>
                <input type="file" accept=".pdf,.docx,.doc" name="file">
                <br>

                <button class="btn btn-success" type="submit">Save</button>

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