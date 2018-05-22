<?php
require_once ("../../vendor/autoload.php");

$objPatientInfo = new \App\PatientInfo\PatientInfo();

$objPatientInfo->setData($_POST);

$objPatientInfo->update();

\App\Utility\Utility::redirect("index.php");