<?php
require_once ("vendor/autoload.php");
session_start();

//echo "Welcome"   . $_SESSION['email'];

//if(isset($_POST['logout'])){
//
////    session_start();
////    session_destroy();
////
////   \App\Utility\Utility::redirect("index.php");
//
//    $objAdmin = new App\AddAdmin\AddAdmin();
//    $objAdmin->logout();
//}

?>
<html>
    <head>

        <title>Logged In</title>
    </head>

    <body>

        <form action="index.php" method="post" name="logout">

            <input type="submit" name="logout" value="log me out">
        </form>



    </body>


</html>