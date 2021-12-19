<?php
include_once('Connect.php');
class UsuarioM extends Connector
{

    static public function GetUsuarioC($table)
    {
        $pdo = Connector::Connect()->prepare("SELECT UsuarioId, Usuario FROM $table WHERE PerfilId = 1 ORDER BY Usuario ASC");
        $pdo->execute();
        return $pdo->fetchAll();
        $pdo = null;
    }
   
    static public function InsertU($userinfo, $table)
    {
        $pdo = Connector::Connect()->prepare("INSERT INTO $table (Usuario,Pass,Nombre,FechaR,PerfilId) VALUES(:Usuario,:Pass,:Nombre,:FechaR,:PerfilId) ");
        $pdo->bindParam(":Usuario", $userinfo["Usuario"], PDO::PARAM_STR);
        $pdo->bindParam(":Pass", $userinfo["Pass"], PDO::PARAM_STR);
        $pdo->bindParam(":Nombre", $userinfo["Nombre"], PDO::PARAM_STR);
        $pdo->bindParam(":FechaR", $userinfo["FechaR"], PDO::PARAM_STR);
        $pdo->bindParam(":PerfilId", $userinfo["PerfilId"], PDO::PARAM_STR);

        if ($pdo->execute()) {
            return true;
        } else {
            return false;
        }
        $pdo = null;
    }

    static public function GetAll($table)
    {
        $pdo = Connector::Connect()->prepare("SELECT u.UsuarioId,u.Usuario,u.Nombre,u.FechaR,p.Descripcion AS Perfil FROM $table u INNER JOIN perfil p ON u.PerfilId=p.PerfilId ORDER BY u.UsuarioId ASC");
        $pdo->execute();
        return $pdo->fetchAll();
        $pdo = null;
    }

    static public function DeleteU($table,$id){

        $pdo=Connector::Connect()->prepare("DELETE FROM $table WHERE UsuarioId = :Id ");
        $pdo->bindParam(":Id", $id,PDO::PARAM_INT);
        
        if ($pdo->execute()) {
            return true;
        } else {
            return false;
        }
        $pdo = null;

    }

    static public function GetUsuarioD($table)
    {
        $pdo = Connector::Connect()->prepare("SELECT UsuarioId, Usuario FROM $table WHERE PerfilId = 2 ORDER BY Usuario ASC");
        $pdo->execute();
        return $pdo->fetchAll();
        $pdo = null;
    }

    static public function GetUsuarioAll($table)
    {
        $pdo = Connector::Connect()->prepare("SELECT UsuarioId, Usuario FROM $table WHERE PerfilId <> 5 ORDER BY Usuario ASC");
        $pdo->execute();
        return $pdo->fetchAll();
        $pdo = null;
    }

}
