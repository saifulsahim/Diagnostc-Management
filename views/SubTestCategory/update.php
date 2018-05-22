<?php
require_once ("../../vendor/autoload.php");

$objSubTestCategory= new App\SubTestCategory\SubTestCategory();

$objSubTestCategory->setData($_POST);

$objSubTestCategory->update();

\App\Utility\Utility::redirect("index.php");