<?php
require_once("../../vendor/autoload.php");

if (!isset($_SESSION)) session_start();

use App\Message\Message;

$msg = Message::message();

echo "<div>  <div id='message'>  $msg </div>   </div>";


$objPayment = new App\Payment\Payment();



$IDs= $_POST['multiple'];

foreach ($IDs as $id) {

    $_GET['id'] =  $id;

    $objPayment->setData($_GET);

    $objPayment->recover();


}
\App\Utility\Utility::redirect("index.php");



?>


