<?php

require_once("../../vendor/autoload.php");
if (!isset($_SESSION)) session_start();

use App\Message\Message;

$msg = Message::message();

echo "<div>  <div id='message'>  $msg </div>   </div>";

$obj= new \App\Doctors\Doctors();
$obj->setData($_GET);
$singleData= $obj->view();

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

    <form  action="update.php" method="post" enctype="multipart/form-data">

        <strong> Profile Picture</strong>
        <input type="file" accept=".png, .jpg, .jpeg" name="profilePicture" value="<?php echo $singleData->profile_picture ?>">
        <br>

        <strong> Doctor Name:</strong>
        <input type="text" name="doctorName" value="<?php echo $singleData->doctor_name ?>">
        <br>

        <strong> Father's Name: </strong>
        <input type="text" name="fatherName" value="<?php echo $singleData->father_name ?>">
        <br>

        <strong> Mother's Name: </strong>
        <input type="text" name="motherName" value="<?php echo $singleData->mother_name ?>">
        <br>

        <strong> E-mail: </strong>
        <input type="email" name="email" value="<?php echo $singleData->email ?>">
        <br>

        <strong> Mobile No: </strong>
        <input type="text" name="mobileNo" value="<?php echo $singleData->mobile_no ?>">
        <br>

        <strong> Contact Address: </strong>
        <textarea rows="2" class="form-control" name="contactAddress"><?php echo $singleData->contact_address ?></textarea>
        <br>

        <strong> Designation: </strong>
        <textarea rows="2" class="form-control" name="designation"><?php echo $singleData->designation ?></textarea>
        <br>


        <strong> Date of Birth</strong>
        <input class="datepicker" type="text" name="birthDate" value="<?php echo $singleData->birth_date ?>">
        <br>

        <strong> Join Date </strong>
        <input class="datepicker" type="text" name="joinDate" value="<?php echo $singleData->join_date ?>">
        <br>


        <input type="hidden" name="id" value="<?php echo $singleData->id?>">


        <button class=" btn btn-success" type="submit" name="submit" value="Update">Update</button>

    </form>


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