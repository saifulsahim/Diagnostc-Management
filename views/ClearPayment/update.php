<?php
require_once("../../vendor/autoload.php");

$objClearPayment = new App\ClearPayment\ClearPayment();

$objClearPayment->setData($_POST);

$objClearPayment->update();

\App\Utility\Utility::redirect("index.php");