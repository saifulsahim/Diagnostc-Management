<?php
require_once ("../../vendor/autoload.php");

$objDailyInvoiceReport= new App\DailyInvoiceReport\DailyInvoiceReport();

$objDailyInvoiceReport->setData($_POST);

$objDailyInvoiceReport->store();


