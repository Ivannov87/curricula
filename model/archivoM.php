<?php

include_once "Connect.php";
class ArchivoM extends Connector
{
    static public function InsertF($fileinfo, $table)
    {
       
            $pdo = Connector::Connect()->prepare("INSERT INTO $table (Nombre,Data,Version,FechaR,UsuarioId,DescCambio)
                                           VALUES (:Nombre,:Data,:Version,:FechaR,:UsuarioId,:DescCambio) ");
            $pdo->bindParam(":Nombre", $fileinfo["Nombre"], PDO::PARAM_STR);
            $pdo->bindParam(":Data", $fileinfo["Data"], PDO::PARAM_LOB);
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
        $pdo = Connector::Connect()->prepare(" SELECT FileId,Nombre,Version,DescCambio,FechaR FROM $table WHERE UsuarioId = :userid ");
        $pdo->bindParam(":userid", $id, PDO::PARAM_INT);
        $pdo->execute();
        return $pdo->fetchAll();
        $pdo = null;
    }

    static public function GetDoctos($table)
    {
        $pdo = Connector::Connect()->prepare("SELECT FileId,Nombre,Version,DescCambio,FechaR FROM $table GROUP BY UsuarioId ORDER BY Version DESC");
        $pdo->execute();
        return $pdo->fetchAll();
        $pdo = null;
    }

    static public function Version($params, $table)
    {

        $pdo = Connector::Connect()->prepare("SELECT COUNT(Nombre) FROM $table WHERE Nombre = :nombre AND UsuarioId = :Id ");
        $pdo->bindParam(":nombre", $params["nombre"], PDO::PARAM_STR);
        $pdo->bindParam(":Id", $params["uId"], PDO::PARAM_INT);
        $pdo->execute();
        return $pdo->fetch();
        $pdo = null;
    }
}
