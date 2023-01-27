<?php

class DB
{

    static public function connect()
    {


        try {

            $dbname = "Fruit-Management";
            $username = 'root';
            $password = '';

            $db       = new PDO('mysql:host=localhost;dbname=' . $dbname, $username, $password);

            return $db;
        } catch (Exception $e) {

            print $e->getMessage();

            die();
        }
    }
}
