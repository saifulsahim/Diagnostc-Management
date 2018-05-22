<?php
require_once("vendor/autoload.php");
session_start();
use App\Model\Database;


//session_start();

$admin_id =isset( $_SESSION['admin_id']);
//var_dump($admin_id);
if($admin_id){
    \App\Utility\Utility::redirect("resource/Dashboard.php");

}

//$objAdmin = new App\AddAdmin\AddAdmin();
//$admin_id = $_SESSION['admin_id'];
//if($admin_id == NULL)
//{
//    //\App\Utility\Utility::redirect("index.php");
//}

//
//$objAdmin = new App\AddAdmin\AddAdmin();
//$admin_id = isset($_SESSION['id']);
//if($admin_id)
//{
//    \App\Utility\Utility::redirect("../../resource/Dashboard.php");
//}
//


if (isset($_POST['login'])) {

//if (isset($_POST['login'])) {value="Login"
    $objAdmin = new App\AddAdmin\AddAdmin();
    $message = $objAdmin->admin_login_check();


//
//    $db = new Database();
//
//    $email = $_POST['email'];
//    $password = $_POST['password'];
//
//
//    $query = $db->DBH->prepare("SELECT * FROM add_admin WHERE  email = '$email' AND password = '$password' ");
//    //echo "SELECT COUNT (`id`) FROM add_admin WHERE `email` = `$email`AND `password` = $password ";
//
//    $query->execute();
//
//    $count = $query->fetch();
//
//
//
//    if (!empty($count)) {
//        $_SESSION['email'] = $email;
//        $_SESSION['admin_id'] = $count['id'];
//
//        \App\Utility\Utility::redirect("resource/Dashboard.php");
//}
////
//

}

?>
<!DOCTYPE html>
<html>
<head>
    <title> Diagonstic Center</title>

    <link rel="stylesheet" href="resource/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="resource/bootstrap/css/formstyle.css">
</head>
<body>
<br/>
<div class="container" style="width:500px;">
<div class="col-md-10">

    <form action="" method="post">
        <h2>Login into your account</h2>
        <h2><?php if(isset($message)) {echo $message;} ?></h2>
        <label>E-mail</label>
        <input type="email" name="email" class="form-control"/>
        <br/>
        <label>Password</label>
        <input type="password" name="password" class="form-control"/>
        <br/>
        <input type="submit" name="login" class="btn btn-info" />


    </form>
</div>
</div>
<br/>
</body>
</html>