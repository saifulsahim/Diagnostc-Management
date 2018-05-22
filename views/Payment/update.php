<?php
require_once ("../../vendor/autoload.php");

$objPayment = new App\Payment\Payment();

$objPayment->setData($_POST);

$objPayment->update();


\App\Utility\Utility::redirect("index.php");