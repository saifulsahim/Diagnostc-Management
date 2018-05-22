<?php
/**
 * Created by PhpStorm.
 * User: SAHIM
 * Date: 17-Mar-18
 * Time: 9:49 AM
 */

namespace App\Settings;

use App\Utility\Utility;
use PDO;
use App\Message\Message;
use App\Model\Database;

class Settings extends Database
{
    public $id;
    public $name;
    public $address;
    public $email;
    public $mobileNO;
    public $logoImage;
    public $currency;
    public $chooseCurrency;
    public $initialBalance;

    public function setData($postArray){

        if(array_key_exists("id",$postArray))
            $this->id=$postArray['id'];


        if(array_key_exists("name",$postArray))
            $this->name=$postArray['name'];

        if(array_key_exists("address",$postArray))
            $this->address=$postArray['address'];

        if(array_key_exists("email",$postArray))
            $this->email=$postArray['email'];

        if(array_key_exists("mobileNO",$postArray))
            $this->mobileNO=$postArray['mobileNO'];

        if(array_key_exists("logoImage",$postArray))
            $this->logoImage=$postArray['logoImage'];



        if(array_key_exists("currency",$postArray))
            $this->currency=$postArray['currency'];

        if(array_key_exists("chooseCurrency",$postArray))
            $this->chooseCurrency=$postArray['chooseCurrency'];

        if(array_key_exists("initialBalance",$postArray))
            $this->initialBalance=$postArray['initialBalance'];

    }
    public function store(){

        $sqlQuery="INSERT INTO `company` (`name`, `address`, `email`, `mobile_no`, `logo_image`, `currency`, `choose_currency`, `initial_balance`) VALUES (?,?,?,?,?,?,?,?);";


        $dataArray = array($this->name, $this->address, $this->email, $this->mobileNO, $this->logoImage, $this->currency, $this->chooseCurrency, $this->initialBalance);

        $STH = $this->DBH->prepare($sqlQuery);

        //var_dump($dataArray);


        $STH->execute($dataArray);





    }

}