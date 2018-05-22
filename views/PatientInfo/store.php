<?php
require_once ("../../vendor/autoload.php");

$objPatientInfo = new \App\PatientInfo\PatientInfo();

$objPatientInfo->setData($_POST);

$objPatientInfo->store();

