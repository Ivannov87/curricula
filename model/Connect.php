<?php

class Connector
{
    public function Connect()
    {

        $db = new PDO("mysql:host=localhost;dbname=documentacionic","root","");
        return $db;
        
    }
}
