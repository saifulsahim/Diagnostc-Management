<?php

require_once("../../vendor/autoload.php");
if (!isset($_SESSION)) session_start();

use App\Message\Message;

$msg = Message::message();

echo "<div>  <div id='message'>  $msg </div>   </div>";


$obj = new App\TestCategory\TestCategory();

$obj->setData($_GET);

$singleData= $obj->view();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Set Test Category Information</title>

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

    <h2 style="color: #442a8d;">Category Information Entry</h2>

    <form action="update.php" method="post">



        <strong> Name:</strong>
        <input class="form-control" type="text" name="name" value="<?php echo $singleData->name?>" placeholder="Set Test Category Name">
        <br>

        <input type="hidden" name="id" value="<?php echo $singleData->id?>">

        <button class="btn btn-success" type="submit">Update</button>



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