<?php

require_once ("../../vendor/autoload.php");

$objDoctorsInvoiceReport= new App\DoctorsInvoiceReport\DoctorsInvoiceReport();

$objDoctorsInvoiceReport->setData($_POST);

$objDoctorsInvoiceReport->store();