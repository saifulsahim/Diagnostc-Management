<?php

$path= $_SERVER['HTTP_REFERER'];

require_once ("../../vendor/autoload.php");

use App\Message\Message;

$msg = Message::message();

echo "<div>  <div id='message'>  $msg </div>   </div>";


$obj = new \App\Expenses\Expenses();



$IDs= $_POST['multiple'];

foreach($IDs as $id) {

    $_GET['id']= $id;

    $obj->setData($_GET);

    $obj->delete();
}



\App\Utility\Utility::redirect($path);
?>

