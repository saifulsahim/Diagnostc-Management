<?php
/**
 * Created by PhpStorm.
 * User: SAHIM
 * Date: 09-Apr-18
 * Time: 3:02 PM
 */

namespace App\IncomeReport;
use App\Utility\Utility;
use PDO;
use App\Message\Message;
use App\Model\Database;

class IncomeReport extends Database
{
    public $id;
    public $fromDate;
    public $toDate;
    public $patientName;
    public $testName;
    public $doctorName;
    public $invoiceNo;
    public $invoiceType;
    public $date;
    public $total;
    public $adminName;



    public function setData($postArray)
    {

        if (array_key_exists("id", $postArray))
            $this->id = $postArray['id'];

        if (array_key_exists("fromDate", $postArray))
            $this->fromDate = $postArray['fromDate'];

        if (array_key_exists("toDate", $postArray))
            $this->toDate = $postArray['toDate'];


        if (array_key_exists("patientName", $postArray))
            $this->patientName = $postArray['patientName'];

        if (array_key_exists("testName", $postArray))
            $this->testName = $postArray['testName'];

        if (array_key_exists("doctorName", $postArray))
            $this->doctorName = $postArray['doctorName'];



        if (array_key_exists("invoiceNo", $postArray))
            $this->invoiceNo = $postArray['invoiceNo'];

        if (array_key_exists("invoiceType", $postArray))
            $this->invoiceType = $postArray['invoiceType'];

        if (array_key_exists("date", $postArray))
            $this->date = $postArray['date'];

        if (array_key_exists("total", $postArray))
            $this->total = $postArray['total'];

        if (array_key_exists("adminName", $postArray))
            $this->adminName = $postArray['adminName'];


    }

    public function index($fromDate,$toDate){


        $frDate = date('Y-m-d', strtotime($fromDate));
        $tDate = date('Y-m-d', strtotime($toDate));



        $sqlQuery= "SELECT * from payment_info WHERE date between '{$frDate}' AND '{$tDate}'";

        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $allData = $STH->fetchAll();


        return $allData;

    }


}