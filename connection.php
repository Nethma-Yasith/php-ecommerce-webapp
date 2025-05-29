<?php

class Database {

    public static $connection;

    public static function setUpConnection() {

        if (!isset(Database::$connection)) {
            Database::$connection = new mysqli("127.0.0.1", "root", "nethma2001", "lubove");
        }
    }

    // insert update delete function

    public static function iud($q) {

        Database::setUpConnection();
        Database::$connection->query($q);

    }

    //search function
    public static function search($q) {

        Database::setUpConnection();
        $resultset = Database::$connection->query($q);
        return $resultset;

    } 
}

?>