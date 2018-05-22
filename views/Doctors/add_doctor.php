<?php

require_once("../../vendor/autoload.php");
//$objSession = new App\Session\Session();
//
//if (!$objSession->is_signed_in()) {
//   \App\Utility\Utility::redirect("../../index.php");
//}

//var_dump($objSession);

use App\Message\Message;

$msg = Message::message();

echo "<div>  <div id='message'>  $msg </div>   </div>";

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Doctor Information</title>

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

    <h2 style="color: #442a8d;">Doctor Information Entry</h2>

    <div class="col-md-6">
    <form  action="store.php" method="post" enctype="multipart/form-data">

        <strong> Profile Picture</strong>
        <input type="file" accept=".png, .jpg, .jpeg" name="profilePicture">
        <br>

        <strong> Doctor Name:</strong>
        <input type="text" name="doctorName">
        <br>

        <strong> Father's Name: </strong>
        <input type="text" name="fatherName">
        <br>

        <strong> Mother's Name: </strong>
        <input type="text" name="motherName">
        <br>

        <strong> E-mail: </strong>
        <input type="email" name="email">
        <br>

        <strong> Mobile No: </strong>
        <input type="text" name="mobileNo">
        <br>

        <strong> Contact Address: </strong>
        <textarea rows="2" class="form-control" name="contactAddress"></textarea>
        <br>

        <strong> Designation: </strong>
        <textarea rows="2" class="form-control" name="designation"></textarea>
        <br>


        <strong> Date of Birth</strong>
        <input class="datepicker" type="text" name="birthDate">
        <br>

        <strong> Join Date </strong>
        <input class="datepicker" type="text" name="joinDate">
        <br>


        <button class=" btn btn-success" type="submit" name="submit">Submit</button>

    </form>
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