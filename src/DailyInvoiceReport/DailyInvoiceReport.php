<?php
/**
 * Created by PhpStorm.
 * User: SAHIM
 * Date: 16-Mar-18
 * Time: 11:47 AM
 */

namespace App\DailyInvoiceReport;
use PDO;
use App\Model\Database;

class DailyInvoiceReport extends Database
{
    public $id;
    public $date;

    public function setData($postArray){
        if (array_key_exists("id",$postArray))
            $this->id=$postArray['id'];
        if(array_key_exists("date",$postArray))
            $this->date=$postArray['date'];
    }

    public function store(){

        $date= $_POST['date'];
        $date = date('Y-m-d', strtotime($date));
        $sqlQuery="INSERT INTO `daily_invoice_report` (`date`) VALUES (?);";
        $dataArray=array($date);
        $STH=$this->DBH->prepare($sqlQuery);
        $STH->execute($dataArray);
    }

}