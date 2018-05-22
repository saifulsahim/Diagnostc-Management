<?php
require_once ("../../vendor/autoload.php");

$objCustomInvoice= new \App\CustomInvoice\CustomInvoice();

$objCustomInvoice->setData($_POST);

$objCustomInvoice->store();
