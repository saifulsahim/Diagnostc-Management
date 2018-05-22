<?php

$path = $_SERVER['HTTP_REFERER'];


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

    $objInvoice->delete($_GET['invoice_no']);


}


\App\Utility\Utility::redirect($path);

?>


