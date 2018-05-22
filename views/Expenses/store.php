<?php
require_once ("../../vendor/autoload.php");

$objExpenses= new App\Expenses\Expenses();

$objExpenses->setData($_POST);

$objExpenses->store();

\App\Utility\Utility::redirect("index.php");