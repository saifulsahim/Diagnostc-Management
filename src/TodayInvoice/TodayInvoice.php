<?php
/**
 * Created by PhpStorm.
 * User: SAHIM
 * Date: 09-Apr-18
 * Time: 1:21 PM
 */

namespace App\TodayInvoice;
use App\Utility\Utility;
use PDO;
use App\Message\Message;
use App\Model\Database;

class TodayInvoice extends Database
{
    public $id;
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

    public function index(){

        $date = date("Y-m-d");

        $sqlQuery = "  SELECT patient_info.id, patient_info.patient_name, patient_info.invoice_no, patient_info.invoice_type, patient_info.delivery_date, sub_test_category.test_name,payment_info.total, doctors.doctor_name, add_admin.admin_name FROM patient_info 
                      INNER JOIN payment_info ON payment_info.patient_id = patient_info.id 
                      INNER JOIN doctors ON patient_info.doctor_id = doctors.id 
                      
                      INNER JOIN sub_test_category ON payment_info.sub_test_id = sub_test_category.id 
                      INNER JOIN add_admin ON payment_info.admin_id = add_admin.id 
                      WHERE delivery_date ='{$date}'";

        //var_dump($sqlQuery);

        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $allData = $STH->fetchAll();

        return $allData;



    }

}