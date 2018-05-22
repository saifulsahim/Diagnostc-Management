<?php
require_once ("../../vendor/autoload.php");

$objUploadReport= new App\UploadReport\UploadReport();

$objUploadReport->setData($_POST);

$objUploadReport->store();