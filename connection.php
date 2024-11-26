<?php

class Database{

    public static $connection;

    public static function setUpConnection(){
        if(!isset(Database::$connection)){
            Database::$connection = 
            new mysqli("localhost","YOUR_DB_USERNAME","YOUR_DB_PASSWORD","sms","YOUR_DB_PORT");
        }
    }

    public static function iud($q){
        Database::setUpConnection();
        Database::$connection->query($q);
    }

    public static function search($q){
        Database::setUpConnection();
        $resultset = Database::$connection->query($q);
        return $resultset;
    }

}

$conn = mysqli_connect("localhost","YOUR_DB_USERNAME","YOUR_DB_PASSWORD","sms","YOUR_DB_PORT");

?>
