<?php

require_once("../../vendor/autoload.php");
if (!isset($_SESSION)) session_start();

use App\Message\Message;

$msg = Message::message();

echo "<div>  <div id='message'>  $msg </div>   </div>";

$objInvoice = new App\Invoice\Invoice();

$objInvoice->setData($_GET);

//var_dump($objInvoice);

$objInvoice->recover($_GET['invoice_no']);


\App\Utility\Utility::redirect("index.php");

?>


