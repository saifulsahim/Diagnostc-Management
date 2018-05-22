<?php

use App\Utility\Utility;

require_once ("../../vendor/autoload.php");

$objDoctors= new App\Doctors\Doctors();

$objDoctors->setData($_POST);

$objDoctors->update();

Utility::redirect("index.php");


