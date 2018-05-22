<?php
require_once ("../../vendor/autoload.php");

$fromDate = $_POST['fromDate'];
//var_dump($_POST);
//\App\Utility\Utility::dd($fromDate);
$toDate = $_POST['toDate'];



$path=$_SERVER['HTTP_REFERER'];

if(!isset($_SESSION)) session_start();
use App\Message\Message;

$msg = Message::message();

echo "<div>  <div id='message'>  $msg </div>   </div>";



$objCustomInvoice = new \App\CustomInvoice\CustomInvoice();

$objCustomInvoice->setData($_GET);

$objCustomInvoice->delete();

App\Utility\Utility::redirect($path);