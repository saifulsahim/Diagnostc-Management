<?php
/**
 * Created by PhpStorm.
 * User: SAHIM
 * Date: 15-Mar-18
 * Time: 11:14 AM
 */

namespace App\TestCategory;
use App\Utility\Utility;
use PDO;
use App\Message\Message;
use App\Model\Database;

class TestCategory extends Database
{
    public $id;
    public $name;

    public function setData($postArray){


        if(array_key_exists("id",$postArray)){

            $this->id = $postArray['id'];
        }

        if(array_key_exists("name",$postArray)){

            $this->name = $postArray['name'];
        }

    }// end of setData


    public function store(){


        $sqlQuery= "INSERT INTO `test_category` (`name`) VALUES  (?);";

        $dataArray= array($this->name);

        $STH= $this->DBH->prepare($sqlQuery);

        $STH->execute($dataArray);

    }

    public function index(){

        $sqlQuery= "Select * from test_category where is_trashed='No'";

        $STH=$this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $allData=$STH->fetchAll();

        return $allData;

    }

    public function view(){



        $sqlQuery= "Select * from test_category where id=".$this->id ;



        $STH= $this->DBH->query($sqlQuery);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $singleData= $STH->fetch();


        return $singleData;


    }

    public function update(){

        $sqlQuery= "UPDATE `test_category` SET `name` = ? WHERE id = $this->id;";

        $dataArray= array($this->name);

        $STH=$this->DBH->prepare($sqlQuery);
        $result =$STH->execute($dataArray);

        if($result){
            Message::message("Success! Data has been updated Successfully!");
        }
        else{
            Message::message("Error! Data has not been  updated.");

        }


    }

    public function trash(){

        $sqlQuery= "UPDATE `test_category` SET  is_trashed=NOW() WHERE id = $this->id;";

        $result= $this->DBH->exec($sqlQuery);

        if($result){
            Message::message("Success! Data has been trashed Successfully!");
        }
        else{
            Message::message("Error! Data has not been  trashed.");

        }


    }

    public function trashed(){

        $sqlQuery= "Select * from test_category where is_trashed<>'No'";

        $STH=$this->DBH->query($sqlQuery);


        $STH->setFetchMode(PDO::FETCH_OBJ);

        $allData=$STH->fetchAll();

        return $allData;

        }

    public function recover()
    {

        $sqlQuery = "UPDATE `test_category` SET is_trashed= 'No' WHERE id = $this->id;";



        $result = $this->DBH->exec($sqlQuery);

        if ($result) {
            Message::message("Success! Data has been recovered Successfully!");
        } else {
            Message::message("Error! Data has not been  recovered.");

        }

    }

    public function delete()
    {

        $sqlQuery = "DELETE from`test_category`  WHERE id = $this->id;";



        $result = $this->DBH->exec($sqlQuery);

        if ($result) {
            Message::message("Success! Data has been deleted Successfully!");
        } else {
            Message::message("Error! Data has not been  deleted.");

        }

    }



    public function search($requestArray){
        $sql = "";
        if( isset($requestArray['byID']) && isset($requestArray['byName']) )  $sql = "SELECT * FROM `test_category` WHERE `is_trashed` ='No' AND (`id` LIKE '%".$requestArray['search']."%' OR `name` LIKE '%".$requestArray['search']."%')";
        if(isset($requestArray['byID']) && !isset($requestArray['byName']) ) $sql = "SELECT * FROM `test_category` WHERE `is_trashed` ='No' AND `id` LIKE '%".$requestArray['search']."%'";
        if(!isset($requestArray['byID']) && isset($requestArray['byName']) )  $sql = "SELECT * FROM `test_category` WHERE `is_trashed` ='No' AND `name` LIKE '%".$requestArray['search']."%'";

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
            $_allKeywords[] = trim($oneData->id);
        }


        foreach ($allData as $oneData) {

            $eachString= strip_tags($oneData->id);
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
            $_allKeywords[] = trim($oneData->name);
        }
        $allData = $this->index();

        foreach ($allData as $oneData) {

            $eachString= strip_tags($oneData->name);
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


        $sql = "SELECT * from test_category  WHERE is_trashed = 'No' LIMIT $start,$itemsPerPage";


        $STH = $this->DBH->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $arrSomeData  = $STH->fetchAll();
        return $arrSomeData;


    }

    public function count_rows(){

        $sqlQuery = "SELECT * from test_category where is_trashed='No' ";



        $STH=$this->DBH->query($sqlQuery);

        $row_count = $STH->rowCount();


        return $row_count;


//        $STH->setFetchMode(PDO::FETCH_OBJ);
//
//        $countRows=$STH->fetchAll();




    }





}// end of TestCategory class