<?php
require_once ("../../vendor/autoload.php");

$objTestCategory = new \App\TestCategory\TestCategory();

$objTestCategory->setData($_POST);

$objTestCategory-> store();

\App\Utility\Utility::redirect("index.php");