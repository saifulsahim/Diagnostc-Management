<?php
/**
 * Created by PhpStorm.
 * User: SAHIM
 * Date: 11-Apr-18
 * Time: 11:44 AM
 */

namespace App\TotalReport;
use PDO;
use App\Model\Database;

class TotalReport extends Database
{


    public $id;
    public $invoiceNo;
    public $expenseId;
    public $amount;
    public $date;
    public $description;
    public $adminId;

    public function setData($postArray){
        if(array_key_exists("id",$postArray))
            $this->id=$postArray['id'];

        if(array_key_exists("invoiceNo",$postArray))
            $this->invoiceNo=$postArray['invoiceNo'];

        if(array_key_exists("expenseId",$postArray))
            $this->expenseId=$postArray['expenseId'];



        if(array_key_exists("amount",$postArray))
            $this->amount=$postArray['amount'];

        if(array_key_exists("date",$postArray))
            $this->date=$postArray['date'];

        if(array_key_exists("description",$postArray))
            $this->description=$postArray['description'];

        if(array_key_exists("adminId",$postArray))
            $this->adminId=$postArray['adminId'];
    }


    public function get_expense_details($fromDate, $toDate){


        $frDate = date('Y-m-d', strtotime($fromDate));
        $tDate = date('Y-m-d', strtotime($toDate));



        $sqlQuery= "SELECT * from expense_invoice WHERE date BETWEEN '$frDate' AND '$tDate'";
        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $allData = $STH->fetchAll();


        return $allData;


    }

    public function get_income_info($fromDate, $toDate){


        $frDate = date('Y-m-d', strtotime($fromDate));
        $tDate = date('Y-m-d', strtotime($toDate));



        $sqlQuery= "SELECT * from payment_info WHERE date BETWEEN '$frDate' AND '$tDate'";

        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $allData1 = $STH->fetchAll();


        return $allData1;



    }

}