<?php
require_once ("../../vendor/autoload.php");

use App\Message\Message;

$msg = Message::message();


echo "<div>  <div id='message'>  $msg </div>   </div>";

$obj = new App\TestCategory\TestCategory();

$obj->setData($_GET);

$singleData= $obj->view();
?>

<!
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="../../resource/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../resource/bootstrap/js/bootstrap.min.js">
</head>
<body>

<h1>Single Record Information- Test Category</h1>
<table class="table table-bordered table-striped">

 <?php

    echo "
    
    <tr>

        <th>ID</th>     <td>$singleData->id </td>

    </tr>

    <tr>

        <th>Name</th>     <td>$singleData->name </td>

    </tr>

    ";
?>


</table>

<script src="../../resource/bootstrap/js/jquery.js"></script>

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