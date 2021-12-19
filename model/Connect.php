<?php

class Connector
{
    public function Connect()
    {

        //test
        $db = new PDO("mysql:host=localhost;dbname=documentacionic","root","");
        //produccion
        //$db = new PDO("mysql:host=localhost;dbname=khosting_doctosic","khosting_icroot","AvM5kVcD0v2.");
        return $db;
        
    }
}
