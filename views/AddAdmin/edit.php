<?php

require_once("../../vendor/autoload.php");
if (!isset($_SESSION)) session_start();

use App\Message\Message;

$msg = Message::message();

echo "<div>  <div id='message'>  $msg </div>   </div>";


$obj = new App\AddAdmin\AddAdmin();

$obj->setData($_GET);

$singleData = $obj->view();


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Admin Information</title>

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

    <h2 style="color: #442a8d;">Admin Information Entry</h2>

    <form action="update.php" method="post">


        <strong> Name:</strong>
        <input type="text" name="adminName" value="<?php echo $singleData->admin_name ?>">
        <br>


        <strong> E-mail: </strong>
        <input type="email" name="email" value="<?php echo $singleData->email ?>">
        <br>

        <strong> Password: </strong>
        <input type="text" name="password" value="<?php echo $singleData->password ?>">
        <br>


        <strong> Confirm Password: </strong>
        <input type="text" name="confirmPassword" value="<?php echo $singleData->confirm_password ?>">
        <br>


        <strong>Admin Role</strong>
        <select class="form-control" name="adminRole" id="Admin Role" value="<?php echo $singleData->admin_role ?>">
            <option>Select Role</option>
            <?php
            if ($singleData->admin_role == 'Admin1') {
                ?>
                <option value="Admin" selected>Admin</option>
                <option value="Operator">Operator</option>
            <?php } else { ?>
                <option value="Admin">Admin</option>
                <option value="Operator" selected>Operator</option>
            <?php } ?>
        </select>
        <br>


        <input type="hidden" name="id" value="<?php echo $singleData->id ?>">


        <button class=" btn btn-success" type="submit" name="submit">Save Changes</button>

    </form>


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