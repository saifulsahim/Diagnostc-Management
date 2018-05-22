<?php
/**
 * Created by PhpStorm.
 * User: SAHIM
 * Date: 15-Mar-18
 * Time: 3:24 PM
 */

namespace App\Invoice;

use App\Utility\Utility;
use PDO;
use App\Message\Message;
use App\Model\Database;

class Invoice extends Database
{
    public $id;
    public $patientName;
    public $age;
    public $sex;
    public $mobileNo;
    public $deliveryDate;
    public $time;
    public $description;
    public $invoiceNo;
    public $invoiceType;
    public $doctorID;
    public $due;
    public $paid;
    public $testName;
    public $date;
    public $sub_test_id;
    public $admin_id;

    public function setData($postArray)
    {
        if (array_key_exists("id", $postArray))
            $this->id = $postArray['id'];

        if (array_key_exists("patientName", $postArray))
            $this->patientName = $postArray['patientName'];


        if (array_key_exists("testName", $postArray))
            $this->testName = $postArray['testName'];


        if (array_key_exists("sub_test_id", $postArray))
            $this->sub_test_id = $postArray['sub_test_id'];

        if (array_key_exists("mobileNo", $postArray))
            $this->mobileNo = $postArray['mobileNo'];

        if (array_key_exists("doctorID", $postArray))
            $this->doctorID = $postArray['doctorID'];

        if (array_key_exists("invoiceNo", $postArray))
            $this->invoiceNo = $postArray['invoiceNo'];

        if (array_key_exists("invoiceType", $postArray))
            $this->invoiceType = $postArray['invoiceType'];


        if (array_key_exists("age", $postArray))
            $this->age = $postArray['age'];

        if (array_key_exists("deliveryDate", $postArray))
            $this->deliveryDate = $postArray['deliveryDate'];

        if (array_key_exists("description", $postArray))
            $this->description = $postArray['description'];

        if (array_key_exists("sex", $postArray))
            $this->sex = $postArray['sex'];

        if (array_key_exists("time", $postArray))
            $this->time = $postArray['time'];

        if (array_key_exists("due", $postArray))
            $this->due = $postArray['due'];


        if (array_key_exists("paid", $postArray))
            $this->paid = $postArray['paid'];

        if (array_key_exists("admin_id", $postArray))
            $this->admin_id = $postArray['admin_id'];


    }// end of setData


    public function get_all_invoice_info()
    {

        $date = date("Y-m-d");


        $sqlQuery = "SELECT payment_info.invoice_no, delivery_date, invoice_type, patient_name, test_name, total, doctor_name, admin_name FROM payment_info
                  INNER JOIN patient_info ON payment_info.patient_id = patient_info.id
                  INNER JOIN sub_test_category ON payment_info.sub_test_id = sub_test_category.id
                  INNER JOIN doctors ON patient_info.doctor_id = doctors.id
                  INNER JOIN add_admin ON payment_info.admin_id = add_admin.id WHERE delivery_date = '2018-03-14'";

        $STH = $this->DBH->query($sqlQuery);


        $STH->setFetchMode(PDO::FETCH_OBJ);

        $allData = $STH->fetch();

        return $allData;


    }

    public function index()
    {
        $this->deliveryDate = date('Y-m-d', strtotime($this->deliveryDate));

        $sqlQuery = "SELECT patient_info.id, patient_info.patient_name, patient_info.invoice_no, invoice_type, patient_info.delivery_date, sub_test_category.test_name, clear_payment.due, clear_payment.paid FROM patient_info 
                      INNER JOIN payment_info ON payment_info.patient_id = patient_info.id 
                      INNER JOIN sub_test_category ON payment_info.sub_test_id = sub_test_category.id 
                      INNER JOIN clear_payment ON clear_payment.patient_id = patient_info.id 
                      where patient_info.is_trashed= 'No'";


        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $allData = $STH->fetchAll();

        return $allData;


    }


    public function view()
    {
        $this->deliveryDate = date('Y-m-d', strtotime($this->deliveryDate));

        $sqlQuery = "SELECT patient_info.id, patient_info.patient_name, patient_info.invoice_no, invoice_type,patient_info.delivery_date, sub_test_category.test_name, clear_payment.due, clear_payment.paid FROM patient_info 
                      INNER JOIN payment_info ON payment_info.patient_id = patient_info.id 
                      INNER JOIN sub_test_category ON payment_info.sub_test_id = sub_test_category.id 
                      INNER JOIN clear_payment ON clear_payment.patient_id = patient_info.id where patient_info.id=" . $this->id;


        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $singleData = $STH->fetch();

        return $singleData;

    }

    public function get_patient_info($invoice_no)
    {

        $this->deliveryDate = date('Y-m-d', strtotime($this->deliveryDate));


        $sqlQuery = "SELECT * from patient_info WHERE invoice_no= '$invoice_no'";

        //var_dump($sqlQuery);

        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $allData = $STH->fetch();

        return $allData;


    }

    public function get_payment_details($invoice_no)
    {


        $sqlQuery = "SELECT * from payment_info WHERE invoice_no= '$invoice_no'";


        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $allData1 = $STH->fetch();

        return $allData1;

    }

    public function get_clear_payment($invoice_no)
    {


        $sqlQuery = "SELECT * from clear_payment WHERE invoice_no='$invoice_no'";


        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $allData2 = $STH->fetch();

        return $allData2;

    }


    public function update()
    {

//        echo  $this->invoiceNo;
//        exit();


        $this->deliveryDate = date('Y-m-d', strtotime($this->deliveryDate));

        $sqlQuery1 = "UPDATE patient_info SET `patient_name` = ?,`invoice_no` = ?, `invoice_type` = ?, `delivery_date`=?, age=?, `mobile_no`=?,`sex`=?,`doctor_id`=?,`time`=?, `description`=?  WHERE invoice_no  = '$this->invoiceNo' ";

        //var_dump($sqlQuery1);

        $dataArray1 = array($this->patientName, $this->invoiceNo, $this->invoiceType, $this->deliveryDate, $this->age, $this->mobileNo, $this->sex, $this->doctorID, $this->time, $this->description);

        $STH = $this->DBH->prepare($sqlQuery1);

        $STH->execute($dataArray1);
        //print_r($dataArray1);
        //var_dump($dataArray1);
        //echo "<br>";


//        echo  $this->invoiceNo;
//        exit();
        $sqlQuery2 = "UPDATE  clear_payment SET `due` = ?,`paid` = ? WHERE invoice_no = '$this->invoiceNo'";

        //var_dump($sqlQuery2);
        $dataArray2 = array($this->due, $this->paid);

        $STH = $this->DBH->prepare($sqlQuery2);

        $STH->execute($dataArray2);

        //print_r($dataArray2);
        //echo "<br>";

    }


    public function trash($invoice_no)
    {

//
        $sqlQuery1 = "UPDATE patient_info SET  is_trashed=NOW() WHERE invoice_no  = '$invoice_no' ;";
        //Utility::dd($sqlQuery1);
        //var_dump($sqlQuery1);
        $result1 = $this->DBH->exec($sqlQuery1);
        //var_dump($result1);


//        echo  $this->invoiceNo;
//        exit();
        $sqlQuery2 = "UPDATE  clear_payment SET  is_trashed=NOW() WHERE invoice_no  = '$invoice_no' ";
        //Utility::dd($sqlQuery3);
        //var_dump($sqlQuery2);
        $result2 = $this->DBH->exec($sqlQuery2);
        //var_dump($result2);


        if ($result1) {
            Message::message("Success! Patient Data has been trashed Successfully!");
        } else {
            Message::message("Error! Patient Data has not been  trashed.");

        }

        if ($result2) {
            Message::message("Success! Clear Payment Data has been trashed Successfully!");
        } else {
            Message::message("Error! Clear Payment Data has not been  trashed.");

        }


    }

    public function delete($invoice_no)
    {


//        echo  $this->invoiceNo;
//       exit();

        $sqlQuery1 = "DELETE from patient_info  WHERE invoice_no  = '$invoice_no' ;";

        $result1 = $this->DBH->exec($sqlQuery1);


        $sqlQuery2 = "DELETE from clear_payment  WHERE invoice_no  = '$invoice_no' ;";

        $result2 = $this->DBH->exec($sqlQuery2);


    }


    public function trashed()
    {


        $date = date("Y-m-d");

        $sqlQuery = "SELECT patient_info.id, patient_info.patient_name, patient_info.invoice_no, invoice_type, patient_info.delivery_date, sub_test_category.test_name, clear_payment.due, clear_payment.paid FROM patient_info 
                      INNER JOIN payment_info ON payment_info.patient_id = patient_info.id 
                      INNER JOIN sub_test_category ON payment_info.sub_test_id = sub_test_category.id 
                      INNER JOIN clear_payment ON clear_payment.patient_id = patient_info.id
                      where patient_info.is_trashed<> 'No' ";


        //var_dump($sqlQuery);
        $STH = $this->DBH->query($sqlQuery);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $allData = $STH->fetchAll();

        return $allData;


    }


    public function recover($invoice_no)
    {

//
        $sqlQuery1 = "UPDATE patient_info SET  is_trashed='No' WHERE invoice_no  = '$invoice_no' ;";
        //Utility::dd($sqlQuery1);
        //var_dump($sqlQuery1);
        $result1 = $this->DBH->exec($sqlQuery1);
        //var_dump($result1);


//        echo  $this->invoiceNo;
//        exit();
        $sqlQuery2 = "UPDATE  clear_payment SET  is_trashed='No' WHERE invoice_no  = '$invoice_no' ";
        //Utility::dd($sqlQuery3);
        //var_dump($sqlQuery2);
        $result2 = $this->DBH->exec($sqlQuery2);
        //var_dump($result2);


        if ($result1) {
            Message::message("Success! Patient Data has been recovered Successfully!");
        } else {
            Message::message("Error! Patient Data has not been  recovered.");

        }

        if ($result2) {
            Message::message("Success! Clear Payment Data has been recovered Successfully!");
        } else {
            Message::message("Error! Clear Payment Data has not been  recovered.");

        }


    }


    public function search($requestArray)
    {
        $sql = "";
        if (isset($requestArray['byTestName']) && isset($requestArray['byInvoiceNo'])) $sql = "SELECT patient_info.id, patient_info.patient_name, patient_info.invoice_no, invoice_type, patient_info.delivery_date, sub_test_category.test_name, clear_payment.due, clear_payment.paid FROM patient_info 
                      INNER JOIN payment_info ON payment_info.patient_id = patient_info.id 
                      INNER JOIN sub_test_category ON payment_info.sub_test_id = sub_test_category.id 
                      INNER JOIN clear_payment ON clear_payment.patient_id = patient_info.id   WHERE patient_info.is_trashed ='No' AND (sub_test_category.test_name LIKE '%" . $requestArray['search'] . "%' OR patient_info.invoice_no LIKE '%" . $requestArray['search'] . "%')";
        if (isset($requestArray['byTestName']) && !isset($requestArray['byInvoiceNo'])) $sql = "SELECT patient_info.id, patient_info.patient_name, patient_info.invoice_no, invoice_type, patient_info.delivery_date, sub_test_category.test_name, clear_payment.due, clear_payment.paid FROM patient_info 
                      INNER JOIN payment_info ON payment_info.patient_id = patient_info.id 
                      INNER JOIN sub_test_category ON payment_info.sub_test_id = sub_test_category.id 
                      INNER JOIN clear_payment ON clear_payment.patient_id = patient_info.id  WHERE patient_info.is_trashed ='No' AND sub_test_category.test_name LIKE '%" . $requestArray['search'] . "%'";
        if (!isset($requestArray['byTestName']) && isset($requestArray['byInvoiceNo'])) $sql = "SELECT patient_info.id, patient_info.patient_name, patient_info.invoice_no, invoice_type, patient_info.delivery_date, sub_test_category.test_name, clear_payment.due, clear_payment.paid FROM patient_info 
                      INNER JOIN payment_info ON payment_info.patient_id = patient_info.id 
                      INNER JOIN sub_test_category ON payment_info.sub_test_id = sub_test_category.id 
                      INNER JOIN clear_payment ON clear_payment.patient_id = patient_info.id  WHERE patient_info.is_trashed ='No' AND patient_info.invoice_no LIKE '%" . $requestArray['search'] . "%'";


        $STH = $this->DBH->query($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $someData = $STH->fetchAll();

        //Utility::dd($someData);
        return $someData;
    }// end of search()


    public function getAllKeywords()
    {
        $_allKeywords = array();
        $WordsArr = array();

        $allData = $this->index();

        foreach ($allData as $oneData) {
            $_allKeywords[] = trim($oneData->test_name);
        }


        foreach ($allData as $oneData) {

            $eachString = strip_tags($oneData->test_name);
            $eachString = trim($eachString);
            $eachString = preg_replace("/\r|\n/", " ", $eachString);
            $eachString = str_replace("&nbsp;", "", $eachString);

            $WordsArr = explode(" ", $eachString);

            foreach ($WordsArr as $eachWord) {
                $_allKeywords[] = trim($eachWord);
            }
        }
        // for each search field block end


        // for each search field block start
        $allData = $this->index();

        foreach ($allData as $oneData) {
            $_allKeywords[] = trim($oneData->invoice_no);
        }
        $allData = $this->index();

        foreach ($allData as $oneData) {

            $eachString = strip_tags($oneData->invoice_no);
            $eachString = trim($eachString);
            $eachString = preg_replace("/\r|\n/", " ", $eachString);
            $eachString = str_replace("&nbsp;", "", $eachString);
            $WordsArr = explode(" ", $eachString);

            foreach ($WordsArr as $eachWord) {
                $_allKeywords[] = trim($eachWord);
            }
        }
        // for each search field block end


        return array_unique($_allKeywords);


    }// get all keywords


    public function indexPaginator($page = 1, $itemsPerPage = 3)
    {


        $start = (($page - 1) * $itemsPerPage);

        if ($start < 0) $start = 0;


        $sql = "SELECT patient_info.id, patient_info.patient_name, patient_info.invoice_no, invoice_type, patient_info.delivery_date, sub_test_category.test_name, clear_payment.due, clear_payment.paid FROM patient_info 
                      INNER JOIN payment_info ON payment_info.patient_id = patient_info.id 
                      INNER JOIN sub_test_category ON payment_info.sub_test_id = sub_test_category.id 
                      INNER JOIN clear_payment ON clear_payment.patient_id = patient_info.id 
                      where patient_info.is_trashed= 'No' LIMIT $start,$itemsPerPage";


        $STH = $this->DBH->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $arrSomeData = $STH->fetchAll();
        return $arrSomeData;


    }


}































//
//        $this->deliveryDate = date('Y-m-d', strtotime($this->deliveryDate));
//
//        $sqlQuery1 = "UPDATE patient_info SET `patient_name` = ?,`invoice_no` = ?, `invoice_type` = ?, `delivery_date`=?, age=?, `mobile_no`=?,`sex`=?,`doctor_id`=?,`time`=?, `description`=?  WHERE id  = $this->id ";
//
//        //var_dump($sqlQuery1);
//
//        $dataArray1 = array($this->patientName, $this->invoiceNo, $this->invoiceType,$this->deliveryDate,$this->age,$this->mobileNo,$this->sex,$this->doctorID,$this->time,$this->description);
//
//        $STH = $this->DBH->prepare($sqlQuery1);
//
//        $STH->execute($dataArray1);
//        //print_r($dataArray1);
//        //var_dump($dataArray1);
//        //echo "<br>";
//
//
//        $sqlQuery2="UPDATE  clear_payment SET `due` = ?,`paid` = ? WHERE clear_payment.patient_id = $this->id";
//
//        //var_dump($sqlQuery2);
//        $dataArray2 = array($this->due,$this->paid);
//
//        $STH = $this->DBH->prepare($sqlQuery2);
//
//        $STH->execute($dataArray2);
//
//        //print_r($dataArray2);
//        //echo "<br>";


//
//        $sqlQuery2="UPDATE  sub_test_categories SET `test_name` = ? WHERE id = $this->id";
//        //id= $this->sub_test.id
//
//
//        $dataArray2= array($this->testName);
//
//
//
//        $STH = $this->DBH->prepare($sqlQuery2);
//
//        $STH->execute($dataArray2);
//

//var_dump($dataArray2);
//echo "<br>";


//        $sqlQuery4= "UPDATE payment_info SET date=? WHERE id= $this->id ";
//
//
//
//        $dataArray4=array($this->date);
//        $STH = $this->DBH->prepare($sqlQuery4);
//
//        $STH->execute($dataArray4);


//var_dump($dataArray4);
//echo "<br>";