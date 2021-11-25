<?php

include_once "Connect.php";
class ArchivoM extends Connector
{
    static public function InsertF($fileinfo, $table)
    {

        $pdo = Connector::Connect()->prepare("INSERT INTO $table (Directory,Nombre,Type,Size,Version,FechaR,UsuarioId,DescCambio)
         VALUES (:Directory,:Nombre,:Type,:Size,:Version,:FechaR,:UsuarioId,:DescCambio) ");
        $pdo->bindParam(":Directory", $fileinfo["Directory"], PDO::PARAM_STR);
        $pdo->bindParam(":Nombre", $fileinfo["Nombre"], PDO::PARAM_STR);
        $pdo->bindParam(":Type", $fileinfo["Type"], PDO::PARAM_STR);
        $pdo->bindParam(":Size", $fileinfo["Size"], PDO::PARAM_INT);
        $pdo->bindParam(":Version", $fileinfo["Version"], PDO::PARAM_STR);
        $pdo->bindParam(":FechaR", $fileinfo["FechaR"], PDO::PARAM_STR);
        $pdo->bindParam(":UsuarioId", $fileinfo["UsuarioId"], PDO::PARAM_STR);
        $pdo->bindParam(":DescCambio", $fileinfo["DescCambio"], PDO::PARAM_STR);

        if ($pdo->execute()) {
            return true;
        } else {
            return false;
        }
        $pdo = null;
    }

    static public function GetCharged($table, $id)
    {
        $pdo = Connector::Connect()->prepare(" SELECT FileId,Directory,Nombre,Version,DescCambio,FechaR FROM $table WHERE UsuarioId = :userid ORDER BY FechaR DESC");
        $pdo->bindParam(":userid", $id, PDO::PARAM_INT);
        $pdo->execute();
        return $pdo->fetchAll();
        $pdo = null;
    }

    static public function GetDoctos($table)
    {
        $pdo = Connector::Connect()->prepare("SELECT f.FileId,f.Directory,f.Nombre,f.Version,f.DescCambio,f.FechaR,u.Usuario FROM $table f INNER JOIN USUARIO u ON f.UsuarioId = u.UsuarioId ORDER BY Version DESC");
        $pdo->execute();
        return $pdo->fetchAll();
        $pdo = null;
    }

    static public function Version($params, $table)
    {
        $nombre = "%".$params["nombre"];
        $pdo = Connector::Connect()->prepare("SELECT COUNT(Nombre) FROM $table WHERE Nombre Like :nombre AND UsuarioId = :Id ");
        $pdo->bindParam(":nombre", $nombre, PDO::PARAM_STR);
        $pdo->bindParam(":Id", $params["uId"], PDO::PARAM_INT);
        $pdo->execute();
        return $pdo->fetch();
        $pdo = null;
    }

    static public function GetFile($table, $id)
    {
        $pdo = Connector::Connect()->prepare("SELECT Directory,Nombre,Type,Size FROM $table WHERE FileId = :Id ");
        $pdo->bindParam(":Id", $id, PDO::PARAM_INT);
        $pdo->execute();
        return $pdo->fetch();
        $pdo = null;
    }
}
