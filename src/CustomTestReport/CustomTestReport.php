<?php
/**
 * Created by PhpStorm.
 * User: SAHIM
 * Date: 16-Mar-18
 * Time: 4:48 PM
 */

namespace App\CustomTestReport;
use PDO;
use App\Model\Database;

class CustomTestReport extends Database
{
    public $id;
    public $fromDate;
    public $toDate;
    public $testName;

    public function setData($postArray){

        if(array_key_exists("id",$postArray))
            $this->id=$postArray['id'];
        if(array_key_exists("fromDate",$postArray))
            $this->fromDate=$postArray['fromDate'];

        if(array_key_exists("toDate",$postArray))
            $this->toDate=$postArray['toDate'];

        if(array_key_exists("testName",$postArray))
            $this->testName=$postArray['testName'];
    }


    public function store(){

        $fromDate=$_POST['fromDate'];
        $toDate=$_POST['toDate'];
        $testName=$_POST['testName'];

        $fromDate = date('Y-m-d', strtotime($fromDate));
        $toDate = date('Y-m-d', strtotime($toDate));
        $sqlQuery="INSERT INTO `custom_test_report` (`from_date`, `to_date`, `test_name`) VALUES(?,?,?);";
        $dataArray=array($fromDate,$toDate,$testName);
        $STH=$this->DBH->prepare($sqlQuery);
        $STH->execute($dataArray);
    }


}