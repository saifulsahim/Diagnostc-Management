<?php

require_once("../../vendor/autoload.php");
if (!isset($_SESSION)) session_start();


use App\Message\Message;

$msg = Message::message();

echo "<div>  <div id='message'>  $msg </div>   </div>";



$objPatientInfo = new App\PatientInfo\PatientInfo();




$IDs= $_POST['multiple'];

foreach ($IDs as $id) {

    $_GET['id'] =  $id;

    $objPatientInfo->setData($_GET);

    $objPatientInfo->trash();


}


\App\Utility\Utility::redirect("trashed.php");

?>


