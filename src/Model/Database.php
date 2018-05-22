<?php
/**
 * Created by PhpStorm.
 * User: SAHIM
 * Date: 14-Mar-18
 * Time: 1:21 PM
 */

namespace App\Model;

use PDO,PDOException;


class Database
{

    public $DBH;
    public $connection;

    public function __construct()
    {
        try {

            $this->DBH = $DBH = new  PDO("mysql:host=localhost;dbname=diagonstic", "root", "");

           // echo "Database Connection Successful<br>";
        }
        catch (PDOException $error){

            echo  $error->getMessage();
        }


    }
    public  function insert_id()
    {
         $STH= $this->DBH->lastInsertId();
         return $STH;
    }
    //public function lastInsertId(){

       // return $this->getPDO()->lastInsertId();
    //}





}