<?php
/**
 * Created by PhpStorm.
 * User: SAHIM
 * Date: 16-Mar-18
 * Time: 11:14 AM
 */

namespace App\ExpenseInvoice;
use PDO;
use App\Model\Database;
session_start();

class ExpenseInvoice extends Database
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

    public function store()
    {
        if(isset($_SESSION['admin_id'])){
           $this->adminId = $_SESSION['admin_id'];
           ;
        }
        //$adminId= new App\ExpenseInvoice\ExpenseInvoice();
        $this->date = date('Y-m-d', strtotime($this->date));

        $sqlQuery="INSERT INTO `expense_invoice` (`invoice_no`,  `amount`, `expense_id`, `date`, `description`, `admin_id`) VALUES (?,?,?,?,?,?);";

        $dataArray= array($this->invoiceNo,$this->amount,$this->expenseId,$this->date,$this->description,$this->adminId);

        $STH=$this->DBH->prepare($sqlQuery);

        $STH->execute($dataArray);

        //var_dump($dataArray);
    }

}