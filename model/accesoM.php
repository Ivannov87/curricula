<?php
include_once('Connect.php');
class AccesoM extends Connector{

    static public function InsertAccess($table,$access){

        $pdo= Connector::Connect()->prepare("INSERT INTO $table (UsuarioId,AreaId) VALUES(:UserId,:AreaId) ");
        $pdo->bindParam(":UserId", $access["UsuarioId"],PDO::PARAM_INT);
        $pdo->bindParam(":AreaId", $access["AreaId"],PDO::PARAM_INT);
        
        if ($pdo->execute()) {
            return true;
        } else {
            return false;
        }
        $pdo = null;

    }
    static public function GetAll($table)
    {
        $pdo= Connector::Connect()->prepare("SELECT  ac.AccesoId, u.Usuario, a.Descripcion as Area FROM accesos ac INNER JOIN usuario u ON ac.UsuarioId = u.UsuarioId INNER JOIN area a ON ac.AreaId = a.AreaId ORDER BY a.AreaId ASC");
        $pdo->execute();
        return $pdo->fetchAll();
        $pdo=null;
    }

    static public function DeleteAccess($table,$id){

        $pdo=Connector::Connect()->prepare("DELETE FROM $table WHERE AccesoId = :Id ");
        $pdo->bindParam(":Id", $id,PDO::PARAM_INT);
        
        if ($pdo->execute()) {
            return true;
        } else {
            return false;
        }
        $pdo = null;

    }
}
