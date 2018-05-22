<?php
require_once ("../../vendor/autoload.php");

$fileName = $_FILES['logoImage'];

$objSettings= new App\Settings\Settings();


$fileName= time(). $_FILES['logoImage']['name'];

$source=   $_FILES['logoImage']['tmp_name'];

$destination="Images/".$fileName;

move_uploaded_file($source,$destination);

$_POST['logoImage']= $fileName;


$objSettings->setData($_POST);

$objSettings->store();
