<?php
/**
 * Created by PhpStorm.
 * User: SAHIM
 * Date: 14-Mar-18
 * Time: 12:26 PM
 */

namespace App\Doctors;

use App\Utility\Utility;
use PDO;
use App\Message\Message;
use App\Model\Database;

class Doctors extends Database
{
    public $id;
    public $profilePicture;
    public $doctorName;
    public $fatherName;
    public $motherName;
    public $email;
    public $mobileNo;
    public $designation;
    public $contactAddress;
    public $birthDate;
    public $joinDate;

    public function setData($postArray)
    {

        if (array_key_exists("id", $postArray)) {
            $this->id = $postArray['id'];
        }

        if (array_key_exists("profilePicture", $postArray)) {
            $this->profilePicture = $postArray['profilePicture'];
        }


        if (array_key_exists("doctorName", $postArray)) {
            $this->doctorName = $postArray['doctorName'];
        }

        if (array_key_exists("fatherName", $postArray)) {
            $this->fatherName = $postArray['fatherName'];
        }

        if (array_key_exists("motherName", $postArray)) {
            $this->motherName = $postArray['motherName'];
        }

        if (array_key_exists("email", $postArray)) {
            $this->email = $postArray['email'];
        }
        if (array_key_exists("mobileNo", $postArray)) {
            $this->mobileNo = $postArray['mobileNo'];
        }
        if (array_key_exists("designation", $postArray)) {
            $this->designation = $postArray['designation'];
        }
        if (array_key_exists("contactAddress", $postArray)) {
            $this->contactAddress = $postArray['contactAddress'];
        }
        if (array_key_exists("birthDate", $postArray)) {
            $this->birthDate = $postArray['birthDate'];
        }
        if (array_key_exists("joinDate", $postArray)) {
            $this->joinDate = $postArray['joinDate'];
        }
    }// end of setData()

    public function store()
    {


        $this->birthDate = date('Y-m-d', strtotime($this->birthDate));
        $this->joinDate = date('Y-m-d', strtotime($this->joinDate));

        $sqlQuery = "INSERT INTO `doctors` (`profile_picture`,`doctor_name`, `father_name`, `mother_name`, `email`, `mobile_no`, `contact_address`, `designation`, `birth_date`, `join_date`) VALUES (?, ?,?,?,?,?,?,?,?,?);";

        $dataArray = array($this->profilePicture, $this->doctorName, $this->fatherName, $this->motherName, $this->email, $this->mobileNo, $this->contactAddress, $this->designation, $this->birthDate, $this->joinDate);

        $STH = $this->DBH->prepare($sqlQuery);

        $STH->execute($dataArray);

    }

    public function index()
    {

        $sqlQuery = "Select * from doctors where is_trashed='No'";



        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $allData = $STH->fetchAll();


        return $allData;


    }// end of index()

    public function view()
    {


        $sqlQuery = "Select * from doctors where id=" . $this->id;


        $STH = $this->DBH->query($sqlQuery);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $singleData = $STH->fetch();


        return $singleData;


    }// end of view()


    public function update()
    {


        $this->birthDate = date('Y-m-d', strtotime($this->birthDate));
        $this->joinDate = date('Y-m-d', strtotime($this->joinDate));

        $sqlQuery = "UPDATE `doctors` SET `profile_picture` = ?,`doctor_name` = ?, `father_name` = ?, `mother_name` = ?, `email` = ?, `mobile_no` = ?, `contact_address` = ?, `designation` = ?, `birth_date` = ?, `join_date` = ? WHERE id = $this->id;";



        $dataArray = array($this->profilePicture, $this->doctorName, $this->fatherName, $this->motherName, $this->email, $this->mobileNo, $this->contactAddress, $this->designation, $this->birthDate, $this->joinDate);

        $STH = $this->DBH->prepare($sqlQuery);

        $STH->execute($dataArray);


    }
    public function trash()
    {


        $this->birthDate = date('Y-m-d', strtotime($this->birthDate));
        $this->joinDate = date('Y-m-d', strtotime($this->joinDate));

        $sqlQuery = "UPDATE `doctors` SET is_trashed=NOW() where id= $this->id ;";


        $result= $this->DBH->exec($sqlQuery);

        if($result){
            Message::message("Success! Data has been trashed Successfully!");
        }
        else{
            Message::message("Error! Data has not been  trashed.");

        }

    }

    public function trashed()
    {

        $sqlQuery = "Select * from doctors where is_trashed<> 'No'";


        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $allData = $STH->fetchAll();


        return $allData;


    }// end of trashed()

    public function recover()
    {


        $this->birthDate = date('Y-m-d', strtotime($this->birthDate));
        $this->joinDate = date('Y-m-d', strtotime($this->joinDate));

        $sqlQuery = "UPDATE `doctors` SET is_trashed='No' where id= $this->id ;";


        $result= $this->DBH->exec($sqlQuery);

        if($result){
            Message::message("Success! Data has been recovered Successfully!");
        }
        else{
            Message::message("Error! Data has not been  recovered.");

        }

    }
    public function  delete(){


        $this->birthDate = date('Y-m-d', strtotime($this->birthDate));
        $this->joinDate = date('Y-m-d', strtotime($this->joinDate));

        $sqlQuery = "DELETE from `doctors`  where id= $this->id ;";


        $result= $this->DBH->exec($sqlQuery);

        if($result){
            Message::message("Success! Data has been deleted Successfully!");
        }
        else{
            Message::message("Error! Data has not been  deleted.");

        }


    }


    public function search($requestArray){
        $sql = "";
        if( isset($requestArray['byName']) && isset($requestArray['byDesignation']) )  $sql = "SELECT * FROM `doctors` WHERE `is_trashed` ='No' AND (`doctor_name` LIKE '%".$requestArray['search']."%' OR `designation` LIKE '%".$requestArray['search']."%')";
        if(isset($requestArray['byName']) && !isset($requestArray['byDesignation']) ) $sql = "SELECT * FROM `doctors` WHERE `is_trashed` ='No' AND `doctor_name` LIKE '%".$requestArray['search']."%'";
        if(!isset($requestArray['byName']) && isset($requestArray['byDesignation']) )  $sql = "SELECT * FROM `doctors` WHERE `is_trashed` ='No' AND `designation` LIKE '%".$requestArray['search']."%'";

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
            $_allKeywords[] = trim($oneData->doctor_name);
        }


        foreach ($allData as $oneData) {

            $eachString= strip_tags($oneData->doctor_name);
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
            $_allKeywords[] = trim($oneData->designation);
        }
        $allData = $this->index();

        foreach ($allData as $oneData) {

            $eachString= strip_tags($oneData->designation);
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


        $sql = "SELECT * from doctors  WHERE is_trashed = 'No' LIMIT $start,$itemsPerPage";


        $STH = $this->DBH->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $arrSomeData  = $STH->fetchAll();
        return $arrSomeData;


    }




    public function count_rows(){

        $sqlQuery = "SELECT * from doctors where is_trashed='No' ";



        $STH=$this->DBH->query($sqlQuery);

        $row_count = $STH->rowCount();


        return $row_count;


//        $STH->setFetchMode(PDO::FETCH_OBJ);
//
//        $countRows=$STH->fetchAll();




    }




}// end of Doctors Class

