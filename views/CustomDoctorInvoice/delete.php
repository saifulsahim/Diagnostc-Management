<?php
require_once ("../../vendor/autoload.php");

$fromDate = $_POST['fromDate'];
//var_dump($_POST);
//\App\Utility\Utility::dd($fromDate);
$toDate = $_POST['toDate'];
$doc_Id= $_POST['doctorName'];


$path=$_SERVER['HTTP_REFERER'];

if(!isset($_SESSION)) session_start();
use App\Message\Message;

$msg = Message::message();

echo "<div>  <div id='message'>  $msg </div>   </div>";

$objCustomDoctorInvoice = new App\CustomDoctorInvoice\CustomDoctorInvoice();

$objCustomDoctorInvoice->setData($_GET);

$objCustomDoctorInvoice->delete();

App\Utility\Utility::redirect($path);
