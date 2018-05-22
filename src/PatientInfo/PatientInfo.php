<?php
/**
 * Created by PhpStorm.
 * User: SAHIM
 * Date: 29-Mar-18
 * Time: 12:20 PM
 */

namespace App\PatientInfo;
use PDO;
use App\Utility\Utility;
use App\Message\Message;
use App\Model\Database;



class PatientInfo extends Database
{
    public $id;
    public $patientName;
    public $age;
    public $sex;
    public $mobileNo;
    public $deliveryDate;
    public $time;
    public $doctorID;
    public $description;
    public $invoiceNo;
    public $invoiceType;

    public function setData($postArray){

        if(array_key_exists("id",$postArray))
            $this->id=$postArray['id'];

        if(array_key_exists("patientName",$postArray))
            $this->patientName=$postArray['patientName'];

        if(array_key_exists("age",$postArray))
            $this->age=$postArray['age'];

        if(array_key_exists("sex",$postArray))
            $this->sex=$postArray['sex'];

        if(array_key_exists("mobileNo",$postArray))
            $this->mobileNo=$postArray['mobileNo'];

        if(array_key_exists("deliveryDate",$postArray))
            $this->deliveryDate=$postArray['deliveryDate'];

        if(array_key_exists("time",$postArray))
            $this->time=$postArray['time'];

        if(array_key_exists("doctorID",$postArray))
            $this->doctorID=$postArray['doctorID'];

        if(array_key_exists("description",$postArray))
            $this->description=$postArray['description'];

        if(array_key_exists("invoiceNo",$postArray))
            $this->invoiceNo=$postArray['invoiceNo'];

        if(array_key_exists("invoiceType",$postArray))
            $this->invoiceType=$postArray['invoiceType'];
    }


    public function store()
    {

        $this->deliveryDate = date('Y-m-d', strtotime($this->deliveryDate));

        $sqlQuery="INSERT INTO `patient_info` (`patient_name`, `age`, `sex`, `mobile_no`, `delivery_date`, `time`, `doctor_id`, `description`, `invoice_no`, `invoice_type`) VALUES (?,?,?,?,?,?,?,?,?,?);";

        $dataArray = array($this->patientName,$this->age,$this->sex,$this->mobileNo,$this->deliveryDate,$this->time,$this->doctorID,$this->description,$this->invoiceNo,$this->invoiceType);

        $STH =$this->DBH->prepare($sqlQuery);

        $STH->execute($dataArray);

        return $this->DBH->lastInsertId();

    }

    public function index(){

        $sqlQuery = "SELECT * from patient_info where is_trashed='No'";

        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $allData = $STH->fetchAll();

        return $allData;


    }


    public function view(){

        $sqlQuery = "SELECT * from patient_info where id=".$this->id;


        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $singleData = $STH->fetch();

        return $singleData;

    }

    public function update()
    {

        $this->deliveryDate = date('Y-m-d', strtotime($this->deliveryDate));

        $sqlQuery="UPDATE `patient_info` SET `patient_name` =?, `age` =?, `sex` =?, `mobile_no` = ?, `delivery_date` =?, `time` =?, `doctor_id` = ?, `description` = ?, `invoice_no` =?, `invoice_type` =? WHERE id = $this->id;";



        $dataArray = array($this->patientName,$this->age,$this->sex,$this->mobileNo,$this->deliveryDate,$this->time,$this->doctorID,$this->description,$this->invoiceNo,$this->invoiceType);

        $STH =$this->DBH->prepare($sqlQuery);

        $STH->execute($dataArray);




        //return $this->DBH->lastInsertId();

    }

    public function trash()
    {

        $this->deliveryDate = date('Y-m-d', strtotime($this->deliveryDate));

        $sqlQuery="UPDATE `patient_info` SET is_trashed=NOW() WHERE id = $this->id;";

        $result= $this->DBH->exec($sqlQuery);

        if($result){
            Message::message("Success! Data has been trashed Successfully!");
        }
        else{
            Message::message("Error! Data has not been  trashed.");

        }


        //return $this->DBH->lastInsertId();

    }


    public function trashed(){

        $sqlQuery = "SELECT * from patient_info where is_trashed<>'No'";

        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $allData = $STH->fetchAll();

        return $allData;


    }

    public function recover()
    {

        $this->deliveryDate = date('Y-m-d', strtotime($this->deliveryDate));

        $sqlQuery="UPDATE `patient_info` SET is_trashed='NO' WHERE id = $this->id;";



        $result= $this->DBH->exec($sqlQuery);

        if($result){
            Message::message("Success! Data has been recovered Successfully!");
        }
        else{
            Message::message("Error! Data has not been  recovered.");

        }


        //return $this->DBH->lastInsertId();

    }

    public function delete(){


        $this->deliveryDate = date('Y-m-d', strtotime($this->deliveryDate));

        $sqlQuery="DELETE from `patient_info`  WHERE id = $this->id;";



        $result= $this->DBH->exec($sqlQuery);

        if($result){
            Message::message("Success! Data has been deleted Successfully!");
        }
        else{
            Message::message("Error! Data has not been   deleted.");

        }


    }








}