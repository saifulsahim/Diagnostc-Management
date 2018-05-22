<?php
/**
 * Created by PhpStorm.
 * User: SAHIM
 * Date: 16-Mar-18
 * Time: 2:12 PM
 */

namespace App\DoctorsInvoiceReport;
use PDO;
use App\Model\Database;


class DoctorsInvoiceReport extends Database
{

    public $id;
    public $fromDate;
    public $toDate;
    public $doctorName;

    public function setData($postArray){

        if(array_key_exists("id",$postArray))
            $this->id=$postArray['id'];
        if(array_key_exists("fromDate",$postArray))
            $this->fromDate=$postArray['fromDate'];

        if(array_key_exists("toDate",$postArray))
            $this->toDate=$postArray['toDate'];

        if(array_key_exists("doctorName",$postArray))
            $this->doctorName=$postArray['doctorName'];
    }


    public function store(){

        $fromDate=$_POST['fromDate'];
        $toDate=$_POST['toDate'];
        $doctorName=$_POST['doctorName'];

        $fromDate = date('Y-m-d', strtotime($fromDate));
        $toDate = date('Y-m-d', strtotime($toDate));
        $sqlQuery="INSERT INTO `doctors_invoice_report` (`from_date`, `to_date`, `doctor_name`) VALUES(?,?,?);";
        $dataArray=array($fromDate,$toDate,$doctorName);
        $STH=$this->DBH->prepare($sqlQuery);
        $STH->execute($dataArray);
    }

}