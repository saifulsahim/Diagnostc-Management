<?php
require_once ("../../vendor/autoload.php");

$objExpenses= new App\Expenses\Expenses();

$objExpenses->setData($_POST);

$objExpenses->update();

\App\Utility\Utility::redirect("index.php");