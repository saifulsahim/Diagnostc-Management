<?php

require_once("../../vendor/autoload.php");
if (!isset($_SESSION)) session_start();


use App\Message\Message;

$msg = Message::message();

echo "<div>  <div id='message'>  $msg </div>   </div>";



$objInvoice = new App\Invoice\Invoice();




$INVOICE= $_POST['multiple'];


foreach ($INVOICE as $invoice_no) {

    $_GET['invoice_no'] =  $invoice_no;

    $objInvoice->setData($_GET);

    $objInvoice->recover($_GET['invoice_no']);


}


\App\Utility\Utility::redirect("index.php");

?>


