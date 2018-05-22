<?php
require_once ("../../vendor/autoload.php");

$objTestCategory = new \App\TestCategory\TestCategory();

$objTestCategory->setData($_POST);

$objTestCategory-> update();

\App\Utility\Utility::redirect("index.php");