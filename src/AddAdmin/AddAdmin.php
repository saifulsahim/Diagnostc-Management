<?php



/**
 * Created by PhpStorm.
 * User: SAHIM
 * Date: 17-Mar-18
 * Time: 10:08 AM
 */

namespace App\AddAdmin;
use App\Utility\Utility;
use PDO;
use App\Message\Message;
use App\Model\Database;

class AddAdmin extends Database
{
    public $id;
    public $adminName;
    public $email;
    public $password;
    public $confirmPassword;
    public $adminRole;

    public function setData($postArray){

        if(array_key_exists("id",$postArray))
            $this->id=$postArray['id'];


        if(array_key_exists("adminName",$postArray))
            $this->adminName=$postArray['adminName'];


        if(array_key_exists("email",$postArray))
            $this->email=$postArray['email'];


        if(array_key_exists("password",$postArray))
            $this->password=$postArray['password'];


        if(array_key_exists("confirmPassword",$postArray))
            $this->confirmPassword=$postArray['confirmPassword'];

        if(array_key_exists("adminRole",$postArray))
            $this->adminRole=$postArray['adminRole'];

    }
    public  function store(){


        $sqlQuery="INSERT INTO `add_admin` (`admin_name`, `email`, `password`, `confirm_password`, `admin_role`) VALUES (?,?,?,?,?);";



        $dataArray=array($this->adminName,$this->email,$this->password,$this->confirmPassword,$this->adminRole);


        $STH= $this->DBH->prepare($sqlQuery);

        $STH->execute($dataArray);

    }
    public function index(){

        $sqlQuery= "Select * from add_admin where is_trashed='No'";


        $STH= $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $allData= $STH->fetchAll();

        return $allData;
    }

    public function view(){

        $sqlQuery= "Select * from add_admin where id=".$this->id;



        $STH= $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $singleData= $STH->fetch();

        return $singleData;
    }

    public  function update(){


        $sqlQuery="UPDATE `add_admin` SET `admin_name` = ?, `email` = ?, `password` =?, `confirm_password` =?, `admin_role` =? WHERE id = $this->id;";


        $dataArray=array($this->adminName,$this->email,$this->password,$this->confirmPassword,$this->adminRole);

        $STH= $this->DBH->prepare($sqlQuery);

        $STH->execute($dataArray);

    }
    public  function trash(){


        $sqlQuery="UPDATE `add_admin` SET is_trashed=NOW() WHERE id = $this->id;";



        $result= $this->DBH->exec($sqlQuery);

        if($result){
            Message::message("Success! Data has been trashed Successfully!");
        }
        else{
            Message::message("Error! Data has not been  trashed.");

        }

    }
    public function trashed(){

        $sqlQuery= "Select * from add_admin where is_trashed<>'No'";


        $STH= $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $allData= $STH->fetchAll();

        return $allData;
    }

    public  function recover()
    {


        $sqlQuery = "UPDATE `add_admin` SET is_trashed='No' WHERE id = $this->id;";


        $result = $this->DBH->exec($sqlQuery);

        if ($result) {
            Message::message("Success! Data has been recovered Successfully!");
        } else {
            Message::message("Error! Data has not been  recovered.");

        }

    }

    public  function delete()
    {


        $sqlQuery = "DELETE from  `add_admin`  WHERE id = $this->id;";


        $result = $this->DBH->exec($sqlQuery);

        if ($result) {
            Message::message("Success! Data has been deleted Successfully!");
        } else {
            Message::message("Error! Data has not been  deleted.");

        }

    }

    public function search($requestArray){
        $sql = "";
        if( isset($requestArray['byName']) && isset($requestArray['byAdminRole']) )  $sql = "SELECT * FROM `add_admin` WHERE `is_trashed` ='No' AND (`admin_name` LIKE '%".$requestArray['search']."%' OR `admin_role` LIKE '%".$requestArray['search']."%')";
        if(isset($requestArray['byName']) && !isset($requestArray['byAdminRole']) ) $sql = "SELECT * FROM `add_admin` WHERE `is_trashed` ='No' AND `admin_name` LIKE '%".$requestArray['search']."%'";
        if(!isset($requestArray['byName']) && isset($requestArray['byAdminRole']) )  $sql = "SELECT * FROM `add_admin` WHERE `is_trashed` ='No' AND `admin_role` LIKE '%".$requestArray['search']."%'";

        $STH  = $this->DBH->query($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $someData = $STH->fetchAll();



        return $someData;
    }// end of search()




    public function getAllKeywords()
    {
        $_allKeywords = array();
        $WordsArr = array();

        $allData = $this->index();

        foreach ($allData as $oneData) {
            $_allKeywords[] = trim($oneData->admin_name);
        }


        foreach ($allData as $oneData) {

            $eachString= strip_tags($oneData->admin_name);
            $eachString=trim( $eachString);
            $eachString= preg_replace( "/\r|\n/", " ", $eachString);
            $eachString= str_replace("&nbsp;","",  $eachString);

            $WordsArr = explode(" ", $eachString);

            foreach ($WordsArr as $eachWord){
                $_allKeywords[] = trim($eachWord);
            }
        }
        // for each search field block end




        // for each search field block start
        $allData = $this->index();

        foreach ($allData as $oneData) {
            $_allKeywords[] = trim($oneData->admin_role);
        }
        $allData = $this->index();

        foreach ($allData as $oneData) {

            $eachString= strip_tags($oneData->admin_role);
            $eachString=trim( $eachString);
            $eachString= preg_replace( "/\r|\n/", " ", $eachString);
            $eachString= str_replace("&nbsp;","",  $eachString);
            $WordsArr = explode(" ", $eachString);

            foreach ($WordsArr as $eachWord){
                $_allKeywords[] = trim($eachWord);
            }
        }
        // for each search field block end


        return array_unique($_allKeywords);


    }// get all keywords




    public function indexPaginator($page=1,$itemsPerPage=3){


        $start = (($page-1) * $itemsPerPage);

        if($start<0) $start = 0;


        $sql = "SELECT * from add_admin  WHERE is_trashed = 'No' LIMIT $start,$itemsPerPage";


        $STH = $this->DBH->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $arrSomeData  = $STH->fetchAll();
        return $arrSomeData;


    }

//
    public function admin_login_check()
    {

        $email = $_POST['email'];
        $password = md5($_POST['password']);
//        echo $password;
//        exit();

        $sqlQuery = "SELECT * from add_admin WHERE email= '$email' AND password = '$password' LIMIT 1 ";

        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $admin_info = $STH->fetch();


//        echo "poiuy" .$admin_info['id'];
//        if (!empty($admin_info)) {
//            $_SESSION['email'] = $email;
//            $_SESSION['admin_id'] = $admin_info['id'];
//
//            \App\Utility\Utility::redirect("resource/Dashboard.php");
//
//        }
            //
        if ($admin_info) {
            $_SESSION['admin_id']=$admin_info->id;
            Utility::redirect("resource/Dashboard.php");


        } else {

            $message = "Your Email or Password is invalid";
            return $message;
        }
//
//        }      //print_r($_POST);
//    }

//        public function logout(){
//
//
//            Utility::redirect("index.php");
//        }


        }

    }
















//
//    public function escape_string($string)
//    {
//        $escaped_string =  mysqli_real_escape_string($this->connection, $string);
//        return $escaped_string;
//    }


//    public function verify_admin($username,$password){
//
//
//
//        global $database;
//
//        $username = $database->escape_string($username);
//        $password = $database->escape_string($password);
//
//
//        $adminId = $_SESSION['admin_id'];
//        //$password = $_POST['password'];
//
//        $query = $db->DBH->prepare("SELECT * FROM add_admin WHERE admin_id=$adminId ");
//        //var_dump($query);
//        //echo "SELECT COUNT (`id`) FROM add_admin WHERE `email` = `$email`AND `password` = $password ";
//        $query->execute();
//
//        $count = $query->fetch();
//
//        return $count;
//
//
//
//
//
//
//
//    }





