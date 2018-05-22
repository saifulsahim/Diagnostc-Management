<?php
require_once ("../../vendor/autoload.php");

if(!isset($_SESSION)) session_start();




$objPayment = new App\Payment\Payment();

$objPayment->setData($_POST);

$objPayment->store();