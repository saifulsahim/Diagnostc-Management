<?php

$path = $_SERVER['HTTP_REFERER'];


require_once("../../vendor/autoload.php");

if (!isset($_SESSION)) session_start();

use App\Message\Message;

$msg = Message::message();

echo "<div>  <div id='message'>  $msg </div>   </div>";



$objClearPayment = new App\ClearPayment\ClearPayment();

$objClearPayment->setData($_GET);

 $objClearPayment->delete();


 App\Utility\Utility::redirect($path);



?>


