<?php 


include_once('Connect.php');
class AreaM extends Connector{


    static public function InsertA($table,$desc){

        $pdo= Connector::Connect()->prepare("INSERT INTO $table (Descripcion) VALUES(:Descripcion) ");
        $pdo->bindParam(":Descripcion", $desc,PDO::PARAM_STR);
        
        if ($pdo->execute()) {
            return true;
        } else {
            return false;
        }
        $pdo = null;

    }

    static public function GetAreas($table)
    {
        
        $pdo = Connector::Connect()->prepare("SELECT AreaId,Descripcion FROM $table ORDER BY AreaId ASC");
        $pdo->execute();
        return $pdo->fetchAll();
        $pdo=null;
    }

    static public function GetAreasP($table,$id)
    {
        
        $pdo = Connector::Connect()->prepare("SELECT a.AreaId,a.Descripcion FROM $table a INNER JOIN permisos p ON a.AreaId = p.AreaId WHERE p.UsuarioId = :Id ORDER BY AreaId ASC");
        $pdo->bindParam(":Id", $id,PDO::PARAM_STR);
        
        $pdo->execute();
        return $pdo->fetchAll();
        $pdo=null;
    }


    static public function GetAll($table)
    {
        $pdo= Connector::Connect()->prepare("SELECT AreaId,Descripcion FROM $table ORDER BY AreaId ASC");
        $pdo->execute();
        return $pdo->fetchAll();
        $pdo=null;
    }

    static public function EditA($table,$id)
    {
        $pdo= Connector::Connect()->prepare("SELECT AreaId,Descripcion FROM $table WHERE AreaId = :Id ");
        $pdo->bindParam(":Id", $id,PDO::PARAM_INT);
        $pdo->execute();
        return $pdo->fetch();
        $pdo=null;
    }

    static public function UpdateA($table,$area){

        $pdo= Connector::Connect()->prepare("UPDATE  $table SET Descripcion = :Descripcion WHERE AreaId = :Id ");
        $pdo->bindParam(":Descripcion", $area["Desc"],PDO::PARAM_STR);
        $pdo->bindParam(":Id", $area["Id"],PDO::PARAM_STR);
        
        if ($pdo->execute()) {
            return true;
        } else {
            return false;
        }
        $pdo = null;

    }



}
