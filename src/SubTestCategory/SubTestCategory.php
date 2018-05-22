<?php
/**
 * Created by PhpStorm.
 * User: SAHIM
 * Date: 15-Mar-18
 * Time: 1:07 PM
 */

namespace App\SubTestCategory;

use App\Utility\Utility;
use PDO;
use App\Message\Message;
use App\Model\Database;
class SubTestCategory extends Database
{
    public $id;
    public $categoryID;
    public $testName;
    public $labID;
    public $testPrice;



     public function setData($postArray){

         if(array_key_exists("id",$postArray))
             $this->id= $postArray['id'];

         if(array_key_exists("categoryID",$postArray))
             $this->categoryID= $postArray['categoryID'];

         if(array_key_exists("testName",$postArray))
             $this->testName= $postArray['testName'];

         if (array_key_exists("labID",$postArray))
             $this->labID = $postArray['labID'];

         if(array_key_exists("testPrice",$postArray))
             $this->testPrice = $postArray['testPrice'];


     }
     public function sub_test_category_with_price(){


         $sqlQuery= "SELECT id,test_name,test_price from sub_test_category ";

         $STH=$this->DBH->query($sqlQuery);

         $STH->setFetchMode(PDO::FETCH_OBJ);

         $result_array = $STH->fetchAll();

         return $result_array;


     }


     public function store(){


         $sqlQuery="INSERT INTO `sub_test_category` ( `category_id`, `test_name`, `lab_id`, `test_price`) VALUES (?,?,?,?);";
         $dataArray= array($this->categoryID,$this->testName,$this->labID,$this->testPrice);
         $STH=$this->DBH->prepare($sqlQuery);
         $STH->execute($dataArray);

     }

     public function index(){


         $sqlQuery= "Select * from sub_test_category where is_trashed='No'";

         $STH=$this->DBH->query($sqlQuery);

         $STH->setFetchMode(PDO::FETCH_OBJ);

         $allData= $STH->fetchAll();

         return $allData;

     }

    public function indexbyid($category_id){


        $sqlQuery= "Select * from sub_test_category where is_trashed='No' AND category_id={$category_id}";

        $STH=$this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $allData= $STH->fetchAll();

        return $allData;

    }

    public function indexbyprice($id){


        $sqlQuery= "Select * from sub_test_category where is_trashed='No' AND id=$id";



        $STH=$this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $singleData= $STH->fetch();



        return $singleData;

    }

    public function indexbyname($id){


        $sqlQuery= "Select * from sub_test_category where is_trashed='No' AND id=$id";



        $STH=$this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $singleData= $STH->fetch();

        return $singleData;

    }




    public function view(){


        $sqlQuery= "Select * from sub_test_category where id=".$this->id;

        $STH=$this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $singleData= $STH->fetch();

        return $singleData;

    }

    public function update(){



        $sqlQuery="UPDATE `sub_test_category` SET `category_id` = ?, `test_name` =?, `lab_id` = ?, `test_price` =? WHERE id = $this->id;";
        $dataArray= array($this->categoryID,$this->testName,$this->labID,$this->testPrice);
        $STH=$this->DBH->prepare($sqlQuery);
        $STH->execute($dataArray);
    }

    public function updatebyid($category_id){


        $sqlQuery= "UPDATE `sub_test_category` SET `category_id` = ?, `test_name` =?, `lab_id` = ?, `test_price` =? WHERE id = $this->id AND category_id={$category_id}";

        $dataArray= array($this->categoryID,$this->testName,$this->labID,$this->testPrice);
        $STH=$this->DBH->prepare($sqlQuery);
        $STH->execute($dataArray);
    }






    public function trash(){



        $sqlQuery="UPDATE `sub_test_category` SET is_trashed=NOW() WHERE id = $this->id;";

        $result= $this->DBH->exec($sqlQuery);


        if($result){
            Message::message("Success! Data has been trashed Successfully!");
        }
        else{
            Message::message("Error! Data has not been  trashed.");

        }
    }


    public function trashed(){


        $sqlQuery= "Select * from sub_test_category where is_trashed<>'No'";

        $STH=$this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $allData= $STH->fetchAll();

        return $allData;

    }

    public function recover(){



        $sqlQuery="UPDATE `sub_test_category` SET is_trashed='No' WHERE id = $this->id;";

        $result= $this->DBH->exec($sqlQuery);


        if($result){
            Message::message("Success! Data has been recovered Successfully!");
        }
        else{
            Message::message("Error! Data has not been  recovered.");

        }
    }

    public function delete(){



        $sqlQuery="DELETE from `sub_test_category`  WHERE id = $this->id;";

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
        if( isset($requestArray['byCategory']) && isset($requestArray['byTestName']) )  $sql = "SELECT * FROM `sub_test_category` WHERE `is_trashed` ='No' AND (`category_id` LIKE '%".$requestArray['search']."%' OR `test_name` LIKE '%".$requestArray['search']."%')";
        if(isset($requestArray['byCategory']) && !isset($requestArray['byTestName']) ) $sql = "SELECT * FROM `sub_test_category` WHERE `is_trashed` ='No' AND `category_id` LIKE '%".$requestArray['search']."%'";
        if(!isset($requestArray['byCategory']) && isset($requestArray['byTestName']) )  $sql = "SELECT * FROM `sub_test_category` WHERE `is_trashed` ='No' AND `test_name` LIKE '%".$requestArray['search']."%'";

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
            $_allKeywords[] = trim($oneData->category_id);
        }


        foreach ($allData as $oneData) {

            $eachString= strip_tags($oneData->category_id);
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
            $_allKeywords[] = trim($oneData->test_name);
        }
        $allData = $this->index();

        foreach ($allData as $oneData) {

            $eachString= strip_tags($oneData->test_name);
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


        $sql = "SELECT * from sub_test_category  WHERE is_trashed = 'No' LIMIT $start,$itemsPerPage";


        $STH = $this->DBH->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $arrSomeData  = $STH->fetchAll();
        return $arrSomeData;


    }




    public function count_rows(){

        $sqlQuery = "SELECT * from sub_test_category where is_trashed='No' ";



        $STH=$this->DBH->query($sqlQuery);

        $row_count = $STH->rowCount();


        return $row_count;


//        $STH->setFetchMode(PDO::FETCH_OBJ);
//
//        $countRows=$STH->fetchAll();




    }




}