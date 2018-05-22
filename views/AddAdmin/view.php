<?php
require_once ("../../vendor/autoload.php");

use App\Message\Message;

$msg = Message::message();

echo "<div>  <div id='message'>  $msg </div>   </div>";


$obj= new App\AddAdmin\AddAdmin();

$obj->setData($_GET);

$singleData=$obj->view();

?>

<!
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../resource/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../resource/bootstrap/js/bootstrap.min.js">

    <title>Document</title>
</head>
<body>
<h1>Single Record Information - All Admin Information</h1>
<table class="table table-bordered table-striped">



    <?php


        echo "
   
          <tr>

        <th>ID</th>                  <td>$singleData->id</td>
        
    </tr>
    
    <tr>

        <th>Name</th>                         <td>$singleData->admin_name</td>
        
    </tr>    
    
    <tr>
        
        <th>E-mail</th>                         <td>$singleData->email</td>
    </tr>    
       
        <tr>

            <th>Role</th>                          <td>$singleData->admin_role</td>
            
        </tr>
        
        
    
    
    
    ";



    ?>



</table>

</body>
</html>

