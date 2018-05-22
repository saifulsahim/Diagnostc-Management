<?php
require_once ("../../vendor/autoload.php");

$objAddAdmin= new App\AddAdmin\AddAdmin();

$objAddAdmin->setData($_POST);

$objAddAdmin->update();

\App\Utility\Utility::redirect("index.php");
