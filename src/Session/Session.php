<?php
/**
 * Created by PhpStorm.
 * User: SAHIM
 * Date: 15-Mar-18
 * Time: 1:07 PM
 */

namespace App\Session;

use App\Utility\Utility;
use PDO;
use App\Message\Message;
use App\Model\Database;


class Session extends Database
{

    private $signed_in = false;

    public $id;

    public $email;

    public $passowrd;

    public $admin_id;


    public function setData($postArray)
    {

        if (array_key_exists("id", $postArray))
            $this->id = $postArray['id'];


        if (array_key_exists("email", $postArray))
            $this->email = $postArray['email'];


        if (array_key_exists("passowrd", $postArray))
            $this->passowrd = $postArray['passowrd'];


        if (array_key_exists("admin_id", $postArray))
            $this->admin_id = $postArray['admin_id'];

    }


//    public function is_signed_in()
//    {
//        return $this->signed_in;
//    }
//
//
//    public function login($admin)
//    {
//        if ($admin) {
//            //var_dump($user);
//            $this->admin_id = $_SESSION['admin_id'] = $admin->id;
//            $this->signed_in = true;
//            //header("Location:index.php");
//        }
//    }


//    public function login($admin)
//    {
//        if ($admin) {
//            //var_dump($user);
//            $this->admin_id = $_SESSION['admin_id'] = $admin->id;
//            $this->signed_in = true;
//            //header("Location:index.php");
//        }
//    }
//
//    public function logout()
//    {
//        unset($_SESSION['admin_id']);
//        unset($this->admin_id);
//        $this->signed_in = false;
//        if (isset($_SESSION['test_cart'])) {
//            unset($_SESSION['test_cart']);
//        }
//    }
//
//    private function check_the_login()
//    {
//        if (isset($_SESSION['admin_id'])) {
//            $this->admin_id = $_SESSION['admin_id'];
//            $this->signed_in = true;
//        } else {
//            unset($this->admin_id);
//            $this->signed_in = false;
//        }
//
//
//    }
}