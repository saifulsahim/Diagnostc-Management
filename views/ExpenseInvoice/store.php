<?php

require_once ("../../vendor/autoload.php");

$objExpenseInvoice = new App\ExpenseInvoice\ExpenseInvoice();

$objExpenseInvoice->setData($_POST);

$objExpenseInvoice->store();


App\Utility\Utility::redirect("add_expense_invoice.php");
//var_dump($_POST);

