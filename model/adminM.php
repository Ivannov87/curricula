<?php

require_once "Connect.php";

class AdminM extends Connector
{
    static public function Login($user, $table)
    {
        $pdo = Connector::Connect()->prepare("SELECT UsuarioId,Usuario,Nombre,Pass,PerfilId FROM $table WHERE Usuario = :usuario ");

        $pdo->bindParam(":usuario", $user["usuario"], PDO::PARAM_STR);

        $pdo->execute();

        return $pdo->fetch();
        $pdo = null;
    }

    static public function Cargados($userid, $table)
    {
        $pdo = Connector::Connect()->prepare("SELECT COUNT(*) FROM $table WHERE UsuarioId =:usuarioid ");
        $pdo->bindParam(":usuarioid", $userid, PDO::PARAM_INT);
        $pdo->execute();
        return $pdo->fetch();
        $pdo = null;
    }

    static public function Totales($table)
    {
        $pdo = Connector::Connect()->prepare("SELECT COUNT(*) FROM $table");
        $pdo->execute();
        return $pdo->fetch();
        $pdo = null;
    }

    
}
