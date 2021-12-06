<?php
    include_once('Connect.php');
    class UsuarioM extends Connector{
        static public function GetUsuarioC($table)
        {
            $pdo= Connector::Connect()->prepare("SELECT UsuarioId, Usuario FROM $table WHERE PerfilId = 1 ORDER BY Usuario ASC");
            $pdo->execute();
            return $pdo->fetchAll();
            $pdo=null;
        }
    }
