<?php
/**
 * Created by PhpStorm.
 * User: SAHIM
 * Date: 09-Apr-18
 * Time: 10:30 PM
 */

namespace App\PrintInvoiceDetails;

use App\Utility\Utility;
use PDO;
use App\Model\Database;


class PrintInvoiceDetails extends Database
{

    public $id;
    public $patientName;
    public $age;
    public $sex;
    public $mobileNo;
    public $deliveryDate;
    public $time;
    public $doctorName;
    public $invoiceNo;

    public $logoImage;
    public $name;
    public $mobileNO;
    public $address;

    public $due;
    public $paid;
    public $patient_id;

    public function setData($postArray)
    {

        if (array_key_exists("id", $postArray))
            $this->id = $postArray['id'];

        if (array_key_exists("patientName", $postArray))
            $this->patientName = $postArray['patientName'];

        if (array_key_exists("age", $postArray))
            $this->age = $postArray['age'];

        if (array_key_exists("sex", $postArray))
            $this->sex = $postArray['sex'];

        if (array_key_exists("mobileNo", $postArray))
            $this->mobileNo = $postArray['mobileNo'];

        if (array_key_exists("deliveryDate", $postArray))
            $this->deliveryDate = $postArray['deliveryDate'];

        if (array_key_exists("time", $postArray))
            $this->time = $postArray['time'];

        if (array_key_exists("doctorName", $postArray))
            $this->doctorName = $postArray['doctorName'];


        if (array_key_exists("invoiceNo", $postArray))
            $this->invoiceNo = $postArray['invoiceNo'];


        if (array_key_exists("logoImage", $postArray))
            $this->logoImage = $postArray['logoImage'];


        if (array_key_exists("name", $postArray))
            $this->name = $postArray['name'];


        if (array_key_exists("mobileNO", $postArray))
            $this->mobileNO = $postArray['mobileNO'];


        if (array_key_exists("address", $postArray))
            $this->address = $postArray['address'];


        if (array_key_exists("due", $postArray))
            $this->due = $postArray['due'];


        if (array_key_exists("paid", $postArray))
            $this->paid = $postArray['paid'];

        if (array_key_exists("patient_id", $postArray))
            $this->patient_id = $postArray['patient_id'];

    }


    public function get_information_by_invoice_no($invoice_no)
    {

        $sqlQuery = "SELECT patient_info.id, patient_info.patient_name,patient_info.age,patient_info.sex,patient_info.invoice_no, patient_info.mobile_no, patient_info.delivery_date, patient_info.time,  doctors.doctor_name FROM patient_info
                    
                   INNER JOIN doctors ON patient_info.doctor_id = doctors.id 
                    
                   WHERE invoice_no = $invoice_no";


        //var_dump($sqlQuery);

        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $allData = $STH->fetch();

        return $allData;

    }

    public function clear_payment_info($invoice_no)
    {

        $sqlQuery= "SELECT * from  clear_payment WHERE invoice_no= $invoice_no";

       // var_dump($sqlQuery);

        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $allData1=$STH->fetch();

        return $allData1;

    }

    public function company_info(){


        $sqlQuery = "SELECT * from company ";


        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $allData2 = $STH->fetchAll();


        return $allData2;


    }

    public function get_payment_info($invoice_no){


        $sqlQuery="SELECT payment_info.invoice_no,sub_test_category.test_name,sub_test_category.lab_id,sub_test_category.test_price,payment_info.quantity,payment_info.total,payment_info.sub_test_id from payment_info
              
                  INNER JOIN sub_test_category ON payment_info.sub_test_id = sub_test_category.id
                  
                  INNER JOIN patient_info ON payment_info.patient_id = patient_info.id 
                   
                   WHERE payment_info.invoice_no = $invoice_no; ";



        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $allData3=$STH->fetchAll();

        return $allData3;

    }


}