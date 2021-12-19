<?php
include_once('Connect.php');
class PermisoM extends Connector
{

    static public function InsertP($table, $permiso)
    {

        $pdo = Connector::Connect()->prepare("INSERT INTO $table (UsuarioId,AreaId) VALUES(:UserId,:AreaId) ");
        $pdo->bindParam(":UserId", $permiso["UsuarioId"], PDO::PARAM_INT);
        $pdo->bindParam(":AreaId", $permiso["AreaId"], PDO::PARAM_INT);

        if ($pdo->execute()) {
            return true;
        } else {
            return false;
        }
        $pdo = null;
    }

    static public function GetAll($table)
    {
        $pdo = Connector::Connect()->prepare("SELECT  p.PermisoId, u.Usuario, a.Descripcion as Area FROM Permisos p INNER JOIN usuario u ON p.UsuarioId = u.UsuarioId INNER JOIN area a ON p.AreaId = a.AreaId ORDER BY a.AreaId ASC");
        $pdo->execute();
        return $pdo->fetchAll();
        $pdo = null;
    }

    static public function DeletePermiso($table,$id){

        $pdo=Connector::Connect()->prepare("DELETE FROM $table WHERE PermisoId = :Id ");
        $pdo->bindParam(":Id", $id,PDO::PARAM_INT);
        
        if ($pdo->execute()) {
            return true;
        } else {
            return false;
        }
        $pdo = null;

    }

}
