<?php

include_once "Connect.php";
class ArchivoM extends Connector
{
    static public function InsertF()
    {
    }

    static public function GetCharged($table, $id)
    {
        $pdo = Connector::Connect()->prepare(" SELECT FileID,Nombre,Version,DescCambio,FechaR FROM $table WHERE UsuarioId = :userid ");
        $pdo->bindParam(":userid", $id, PDO::PARAM_INT);
        $pdo->execute();
        return $pdo->fetchAll();
        $pdo = null;
    }

    static public function GetDoctos($table)
    {
        $pdo = Connector::Connect()->prepare("SELECT FileID,Nombre,Version,DescCambio,FechaR FROM $table GROUP BY UsuarioId ORDER BY Version DESC");
        $pdo->execute();
        return $pdo->fetchAll();
        $pdo = null;
    }
}
