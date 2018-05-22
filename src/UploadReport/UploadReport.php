<?php
/**
 * Created by PhpStorm.
 * User: SAHIM
 * Date: 16-Mar-18
 * Time: 6:50 PM
 */

namespace App\UploadReport;


    class UploadReport
    {

        public $id;
        public $invoiceName;
        public $categoryName;


        public function setData($postArray)
        {
            if(array_key_exists("id",$postArray))
                $this->id=$postArray['id'];
            if(array_key_exists("invoiceName",$postArray))
                $this->invoiceName=$postArray['invoiceName'];

            if(array_key_exists("categoryName",$postArray))
                $this->categoryName=$postArray('categoryName');


        }



    }