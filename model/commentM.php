<?php
include_once('Connect.php');
class CommentM extends Connector
{
    static public function InsertComment($table, $info)
    {

        $pdo = Connector::Connect()->prepare("INSERT INTO $table (Remitente,Destinatario,Comment,Status,FechaR)
         VALUES (:R,:D,:C,:S,:FR) ");
        $pdo->bindParam(":R", $info["R"], PDO::PARAM_INT);
        $pdo->bindParam(":D", $info["D"], PDO::PARAM_INT);
        $pdo->bindParam(":C", $info["C"], PDO::PARAM_STR);
        $pdo->bindParam(":S", $info["S"], PDO::PARAM_STR);
        $pdo->bindParam(":FR", $info["FR"], PDO::PARAM_STR);


        if ($pdo->execute()) {
            return true;
        } else {
            return false;
        }
        $pdo = null;
    }

    static public function Recibidos($table, $id)
    {

        $pdo = Connector::Connect()->prepare("SELECT c.CommentId,u.Usuario AS Remitente,u2.Usuario AS Destinatario,c.Comment AS Mensaje,c.FechaR,c.Status FROM $table c INNER JOIN usuario u ON u.UsuarioId=c.Remitente INNER JOIN usuario u2 ON u2.UsuarioId= c.Destinatario WHERE c.Destinatario = :Id AND c.Status = 0 ORDER BY c.FechaR ASC");
        $pdo->bindParam(":Id", $id, PDO::PARAM_INT);
        $pdo->execute();
        return $pdo->fetchAll();
        $pdo = null;
    }

    static public function UpdateC($table, $info)
    {
        $pdo = Connector::Connect()->prepare("UPDATE  $table SET Status = :E WHERE CommentId = :Id ");
        $pdo->bindParam(":E", $info["status"], PDO::PARAM_INT);
        $pdo->bindParam(":Id", $info["id"], PDO::PARAM_INT);

        if ($pdo->execute()) {
            return true;
        } else {
            return false;
        }
        $pdo = null;
    }

    static public function Enviados($table, $id)
    {

        $pdo = Connector::Connect()->prepare("SELECT c.CommentId,u.Usuario AS Remitente,u2.Usuario AS Destinatario,c.Comment AS Mensaje,c.FechaR,c.Status FROM $table c INNER JOIN usuario u ON u.UsuarioId=c.Remitente INNER JOIN usuario u2 ON u2.UsuarioId= c.Destinatario WHERE c.Remitente = :Id AND c.Status <> 2 ORDER BY c.FechaR ASC");
        $pdo->bindParam(":Id", $id, PDO::PARAM_INT);
        $pdo->execute();
        return $pdo->fetchAll();
        $pdo = null;
    }
}
