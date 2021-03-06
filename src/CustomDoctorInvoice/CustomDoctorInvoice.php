<?php
/**
 * Created by PhpStorm.
 * User: SAHIM
 * Date: 16-Mar-18
 * Time: 5:16 PM
 */

namespace App\CustomDoctorInvoice;
use PDO;
use App\Message\Message;
use App\Model\Database;

class CustomDoctorInvoice extends Database
{
    public $id;
    public $fromDate;
    public $toDate;
    public $patientName;
    public $testName;
    public $doctorName;
    public $invoiceNo;
    public $invoiceType;
    public $deliveryDate;
    public $total;
    public $adminName;


    public function setData($postArray){

        if(array_key_exists("id",$postArray))
            $this->id=$postArray['id'];
        if(array_key_exists("fromDate",$postArray))
            $this->fromDate=$postArray['fromDate'];

        if(array_key_exists("toDate",$postArray))
            $this->toDate=$postArray['toDate'];

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

        if (array_key_exists("deliveryDate", $postArray))
            $this->deliveryDate = $postArray['deliveryDate'];

        if (array_key_exists("total", $postArray))
            $this->total = $postArray['total'];

        if (array_key_exists("adminName", $postArray))
            $this->adminName = $postArray['adminName'];


    }


    public function index($fromDate,$toDate,$doc_Id){

        $frDate = date('Y-m-d', strtotime($fromDate));
        $tDate = date('Y-m-d', strtotime($toDate));

        $sqlQuery = "  SELECT patient_info.id, patient_info.patient_name, patient_info.invoice_no, patient_info.invoice_type, patient_info.delivery_date, sub_test_category.test_name,payment_info.total, doctors.doctor_name, add_admin.admin_name FROM patient_info 
                      INNER JOIN payment_info ON payment_info.patient_id = patient_info.id 
                      INNER JOIN doctors ON patient_info.doctor_id = doctors.id 
                      
                      INNER JOIN sub_test_category ON payment_info.sub_test_id = sub_test_category.id 
                      INNER JOIN add_admin ON payment_info.admin_id = add_admin.id 
                      WHERE delivery_date BETWEEN '$frDate' AND '$tDate' AND doctors.id={$doc_Id}";

        //var_dump($sqlQuery);

        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $allData = $STH->fetchAll();

        return $allData;


    }

    public function view(){

        $sqlQuery = "  SELECT patient_info.id, patient_info.patient_name, patient_info.invoice_no, patient_info.invoice_type, patient_info.delivery_date, sub_test_category.test_name,payment_info.total, doctors.doctor_name, add_admin.admin_name FROM patient_info 
                      INNER JOIN payment_info ON payment_info.patient_id = patient_info.id 
                      INNER JOIN doctors ON patient_info.doctor_id = doctors.id 
                      
                      INNER JOIN sub_test_category ON payment_info.sub_test_id = sub_test_category.id 
                      INNER JOIN add_admin ON payment_info.admin_id = add_admin.id 
                       WHERE patient_info.id= $this->id";

        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $singleData=$STH->fetch();

        return $singleData;

    }

    public function delete(){


        $sqlQuery1= "DELETE from patient_info WHERE patient_info.id = $this->id ";
        //var_dump($sqlQuery1);

        $result1 = $this->DBH->exec($sqlQuery1);

        $sqlQuery2= "DELETE from payment_info WHERE payment_info.patient_id = $this->id ";
        $result2 =$this->DBH->exec($sqlQuery2);

        //var_dump($sqlQuery2);




        if($result1){
            Message::message("Success! Patient Data has been deleted Successfully!");
        }
        else {
            Message::message("Error! Patient Data has not been  deleted.");

        }

        if ($result2){
            Message::message("Success! Sub Test Categories Data has been deleted Successfully!");
        }
        else{
            Message::message("Error! Sub Test Categories Data has not been  deleted.");

        }



    }


}