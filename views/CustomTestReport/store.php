<?php

require_once ("../../vendor/autoload.php");

$objCustomTestReport= new App\CustomTestReport\CustomTestReport();

$objCustomTestReport->setData($_POST);

$objCustomTestReport->store();