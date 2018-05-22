<?php
require_once ("../../vendor/autoload.php");


$objInvoice = new \App\Invoice\Invoice();


$objInvoice->setData($_POST);
//echo "<pre>";
//var_dump($_POST);
//echo "</pre>";
//\App\Utility\Utility::dd($_POST);
//App\Utility\Utility:dd([$_POST]);
//echo "<br>";
//if(isset($_GET['invoice_no'])) {
//  $invoice_no = $_GET['invoice_no'];
    $objInvoice->update();

//}
App\Utility\Utility::redirect("index.php");