<?php 


include_once('Connect.php');
class AreaM extends Connector{

    static public function GetAreas($table)
    {
        $pdo = Connector::Connect()->prepare("SELECT AreaId,Descripcion FROM $table ORDER BY AreaId ASC");
        $pdo->execute();
        return $pdo->fetchAll();
        $pdo=null;
    }
}
