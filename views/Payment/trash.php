<?php
require_once("../../vendor/autoload.php");

if (!isset($_SESSION)) session_start();

use App\Message\Message;

$msg = Message::message();

echo "<div>  <div id='message'>  $msg </div>   </div>";


$objPayment = new App\Payment\Payment();

$objPayment->setData($_GET);

$objPayment->trash();

\App\Utility\Utility::redirect("trashed.php");



?>


