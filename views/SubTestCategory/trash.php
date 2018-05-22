<?php
require_once ("../../vendor/autoload.php");

use App\Message\Message;

$msg = Message::message();

echo "<div>  <div id='message'>  $msg </div>   </div>";


$obj = new \App\SubTestCategory\SubTestCategory();

$obj->setData($_GET);

$obj->trash();


\App\Utility\Utility::redirect("trashed.php");
?>

