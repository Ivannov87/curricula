<?php 
include_once('Connect.php');
class PerfilM extends Connector{


    
    static public function InsertP($table,$desc){

        $pdo= Connector::Connect()->prepare("INSERT INTO $table (Descripcion) VALUES(:Descripcion) ");
        $pdo->bindParam(":Descripcion", $desc,PDO::PARAM_STR);
        
        if ($pdo->execute()) {
            return true;
        } else {
            return false;
        }
        $pdo = null;

    }


    static public function GetPerfiles($table)
    {
        $pdo = Connector::Connect()->prepare("SELECT PerfilId,Descripcion FROM $table ORDER BY PerfilId ASC");
        $pdo->execute();
        return $pdo->fetchAll();
        $pdo=null;
    }

    static public function GetAll($table)
    {
        $pdo= Connector::Connect()->prepare("SELECT PerfilId,Descripcion FROM $table ORDER BY PerfilId ASC");
        $pdo->execute();
        return $pdo->fetchAll();
        $pdo=null;
    }

    static public function EditP($table,$id)
    {
        $pdo= Connector::Connect()->prepare("SELECT PerfilId,Descripcion FROM $table WHERE PerfilId = :Id ");
        $pdo->bindParam(":Id", $id,PDO::PARAM_INT);
        $pdo->execute();
        return $pdo->fetch();
        $pdo=null;
    }

    static public function UpdateP($table,$perfil){

        $pdo= Connector::Connect()->prepare("UPDATE  $table SET Descripcion = :Descripcion WHERE PerfilId = :Id ");
        $pdo->bindParam(":Descripcion", $perfil["Desc"],PDO::PARAM_STR);
        $pdo->bindParam(":Id", $perfil["Id"],PDO::PARAM_STR);
        
        if ($pdo->execute()) {
            return true;
        } else {
            return false;
        }
        $pdo = null;

    }


}

?>