<?php
/**
 * Created by PhpStorm.
 * User: SAHIM
 * Date: 27-Mar-18
 * Time: 5:30 PM
 */

namespace App\Payment;
use App\Utility;
use PDO;
use App\Message\Message;
use App\Model\Database;


class Payment extends Database
{
    public $id;
    public $patient_id;
    public $sub_test_id;
    public $date;
    public $quantity;
    public $total;
    public $invoice_no;
    public $admin_id;

    public function setData($postArray){

        if(array_key_exists("id",$postArray))
            $this->id = $postArray['id'];

        if(array_key_exists("patient_id",$postArray))
            $this->patient_id = $postArray['patient_id'];

        if(array_key_exists("sub_test_id",$postArray))
            $this->sub_test_id = $postArray['sub_test_id'];

        if(array_key_exists("date",$postArray))
            $this->date = $postArray['date'];

        if(array_key_exists("quantity",$postArray))
            $this->quantity = $postArray['quantity'];

        if(array_key_exists("total",$postArray))
            $this->total = $postArray['total'];

        if(array_key_exists("invoice_no",$postArray))
            $this->invoice_no = $postArray['invoice_no'];

        if(array_key_exists("admin_id",$postArray))
            $this->admin_id = $postArray['admin_id'];



    }



    public function store()
    {

        $this->date = date('Y-m-d', strtotime($this->date));

        $sqlQuery="INSERT INTO `payment_info` ( `patient_id`, `sub_test_id`, `date`, `quantity`, `total`, `invoice_no`, `admin_id`) VALUES(?,?,?,?,?,?,?);";



        $dataArray = array($this->patient_id,$this->sub_test_id,$this->date,$this->quantity,$this->total,$this->invoice_no,$this->admin_id);

        $STH = $this->DBH->prepare($sqlQuery);

        $STH->execute($dataArray);



    }

    public function index(){

        $sqlQuery = "SELECT * from payment_info where is_trashed='No'";

        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $allData=$STH->fetchAll();

        return $allData;


    }


    public function indexbyid($id){

        $sqlQuery = "SELECT * from  payment_info where is_trashed='No' AND patient_id=$id";

            

        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $singleData=$STH->fetch();

        return $singleData;


    }


    public function view(){

        $sqlQuery = "SELECT * from payment_info where id=".$this->id;



        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $singleData = $STH->fetch();

        return $singleData;


    }


    public function update()
    {

        $this->date = date('Y-m-d', strtotime($this->date));

        $sqlQuery="UPDATE `payment_info` SET `patient_id` =?, `sub_test_id` = ?, `date` =?, `quantity` = ?, `total` =?, `invoice_no` = ?, `admin_id` =? WHERE id = $this->id;";



        $dataArray = array($this->patient_id,$this->sub_test_id,$this->date,$this->quantity,$this->total,$this->invoice_no,$this->admin_id);

        $STH = $this->DBH->prepare($sqlQuery);

        $STH->execute($dataArray);

    }


    public function trash()
    {

        $this->date = date('Y-m-d', strtotime($this->date));

        $sqlQuery="UPDATE `payment_info` SET is_trashed=NOW() WHERE id = $this->id;";

        $result= $this->DBH->exec($sqlQuery);



        if($result){
            Message::message("Success! Data has been trashed Successfully!");
        }
        else{
            Message::message("Error! Data has not been  trashed.");

        }

    }

    public function trashed(){

        $sqlQuery = "SELECT * from payment_info where is_trashed<>'No'";

        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $allData=$STH->fetchAll();

        return $allData;


    }

    public function recover()
    {

        $this->date = date('Y-m-d', strtotime($this->date));

        $sqlQuery="UPDATE `payment_info` SET is_trashed='No' WHERE id = $this->id;";


        $result= $this->DBH->exec($sqlQuery);


        if($result){
            Message::message("Success! Data has been recovered Successfully!");
        }
        else{
            Message::message("Error! Data has not been  recovered.");

        }

    }

    public function delete()
    {

        $this->date = date('Y-m-d', strtotime($this->date));

        $sqlQuery="DELETE from `payment_info`  WHERE id = $this->id;";


        $result= $this->DBH->exec($sqlQuery);


        if($result){
            Message::message("Success! Data has been deleted Successfully!");
        }
        else{
            Message::message("Error! Data has not been  deleted.");

        }

    }


}