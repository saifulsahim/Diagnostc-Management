<?php
require_once ("../../vendor/autoload.php");

$objCustomDoctorInvoice= new App\CustomDoctorInvoice\CustomDoctorInvoice();

$objCustomDoctorInvoice->setData($_POST);

$objCustomDoctorInvoice->store();
