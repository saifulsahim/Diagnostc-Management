<?php
require_once ("../../vendor/autoload.php");

$objInvoice= new App\Invoice\Invoice();

$objInvoice->setData($_POST);

$objInvoice->store();
