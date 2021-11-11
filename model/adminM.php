<?php

require_once "Connect.php";

class AdminM extends Connector
{
    static public function Login($user,$table)
    {
        $pdo = Connector::Connect()->prepare("SELECT Usuario,Nombre,Pass,PerfilId FROM $table WHERE Usuario = :usuario");
        
        $pdo -> bindParam(":usuario",$user["usuario"],PDO::PARAM_STR);
        
        $pdo -> execute();
        
        return $pdo->fetch();
        $pdo= null;
    
    }
}
