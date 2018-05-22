<?php

require_once ("../../vendor/autoload.php");

$fileName = $_FILES['profilePicture'];


$objDoctors= new App\Doctors\Doctors();

$fileName= time(). $_FILES['profilePicture']['name'];

$source=   $_FILES['profilePicture']['tmp_name'];

$destination="Images/".$fileName;

move_uploaded_file($source,$destination);

$_POST['profilePicture']= $fileName;


$objDoctors->setData($_POST);

$objDoctors->store();

\App\Utility\Utility::redirect("index.php");


