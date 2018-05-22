<?php
/**
 * Created by PhpStorm.
 * User: SAHIM
 * Date: 10-Apr-18
 * Time: 10:38 PM
 */

namespace App\ExpenseReport;

use App\Utility\Utility;
use PDO;
use App\Message\Message;
use App\Model\Database;

class ExpenseReport extends Database
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


    public function index($fromDate,$toDate){


        $frDate = date('Y-m-d', strtotime($fromDate));
        $tDate = date('Y-m-d', strtotime($toDate));



        $sqlQuery= "SELECT * from expense_invoice WHERE date between '{$frDate}' AND '{$tDate}'";

        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $allData = $STH->fetchAll();


        return $allData;



    }


}