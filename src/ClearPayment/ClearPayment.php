<?php
/**
 * Created by PhpStorm.
 * User: SAHIM
 * Date: 29-Mar-18
 * Time: 11:22 AM
 */

namespace App\ClearPayment;
use App\Utility\Utility;
use PDO;

use App\Message\Message;
use App\Model\Database;

class ClearPayment extends Database
{
    public $id;
    public $patient_id;
    public $due;
    public $paid;
    public $invoice_no;


    public function setData($postArray){

        if(array_key_exists("id",$postArray))
            $this->id=$postArray['id'];

        if(array_key_exists("patient_id",$postArray))
            $this->patient_id=$postArray['patient_id'];

        if(array_key_exists("due",$postArray))
            $this->due=$postArray['due'];

        if(array_key_exists("paid",$postArray))
            $this->paid=$postArray['paid'];

        if(array_key_exists("invoice_no",$postArray))
            $this->invoice_no=$postArray['invoice_no'];

    }


    public function store()
    {

        $sqlQuery = "INSERT INTO `clear_payment` ( `patient_id`, `due`, `paid`, `invoice_no`) VALUES (?,?,?,?); ";


        $dataArray = array($this->patient_id, $this->due, $this->paid, $this->invoice_no);

        $STH = $this->DBH->prepare($sqlQuery);

        $STH->execute($dataArray);
    }


    public function index(){

        $sqlQuery = "SELECT * from clear_payment where is_trashed='No'";

        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $allData=$STH->fetchAll();

        return $allData;


    }

    public function view(){

        $sqlQuery = "SELECT * from clear_payment where id=".$this->id;



        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $singleData=$STH->fetch();

        return $singleData;


    }

    public function viewById($id){

        $sqlQuery = "SELECT * from clear_payment where patient_id=".$id;



        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $singleData=$STH->fetch();

        return $singleData;


    }

    public function update()
    {

        $sqlQuery = "UPDATE `clear_payment` SET `patient_id` =?, `due` = ?, `paid` = ?, `invoice_no` =? WHERE id = $this->id; ";


        $dataArray = array($this->patient_id, $this->due, $this->paid, $this->invoice_no);

        $STH = $this->DBH->prepare($sqlQuery);

        $STH->execute($dataArray);
    }


    public function trash()
    {

        $sqlQuery = "UPDATE `clear_payment` SET is_trashed= NOW() WHERE id = $this->id; ";


        $result = $this->DBH->exec($sqlQuery);


        if($result){
            Message::message("Success! Data has been trashed Successfully!");
        }
        else{
            Message::message("Error! Data has not been  trashed.");

        }


    }

    public function trashed(){

        $sqlQuery = "SELECT * from clear_payment where is_trashed<>'No'";

        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $allData=$STH->fetchAll();

        return $allData;


    }

    public function recover()
    {

        $sqlQuery = "UPDATE `clear_payment` SET is_trashed='No' WHERE id = $this->id; ";


        $result = $this->DBH->exec($sqlQuery);


        if($result){
            Message::message("Success! Data has been recovered Successfully!");
        }
        else{
            Message::message("Error! Data has not been  recovered.");

        }


    }

    public function delete()
    {

        $sqlQuery = "DELETE from `clear_payment`  WHERE id = $this->id; ";


        $result = $this->DBH->exec($sqlQuery);


        if($result){
            Message::message("Success! Data has been deleted Successfully!");
        }
        else{
            Message::message("Error! Data has not been  deleted.");

        }


    }





}