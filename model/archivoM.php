<?php

include_once "Connect.php";
class ArchivoM extends Connector
{
    static public function InsertF($fileinfo, $table)
    {

        $pdo = Connector::Connect()->prepare("INSERT INTO $table (AreaId,Directory,Nombre,Type,Size,Version,FechaR,UsuarioId,DescCambio)
         VALUES (:AreaId,:Directory,:Nombre,:Type,:Size,:Version,:FechaR,:UsuarioId,:DescCambio) ");
        $pdo->bindParam(":AreaId", $fileinfo["AreaId"], PDO::PARAM_INT);
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
        $pdo = Connector::Connect()->prepare(" SELECT f.FileId, a.Descripcion as Area, f.Directory,f.Nombre,f.Version,f.DescCambio,f.FechaR FROM $table f INNER JOIN area a ON f.AreaId= a.AreaId WHERE f.UsuarioId = :userid ORDER BY f.FechaR DESC");
        $pdo->bindParam(":userid", $id, PDO::PARAM_INT);
        $pdo->execute();
        return $pdo->fetchAll();
        $pdo = null;
    }

    static public function GetDoctos($table, $id)
    {
        //falta revisar los permisos de las áreas a las que tienen acceso y despues hacer la consulta 

        $tablea="accesos";
        $pdoa = Connector::Connect()->prepare("SELECT AreaId FROM $tablea WHERE UsuarioId = :Id");
        $pdoa->bindParam(":Id", $id, PDO::PARAM_INT);
        $pdoa->execute();
        $accesos = $pdoa->fetchAll();
        $pdoa = null;

        if (!is_null($accesos)) {

            $areas="";
            foreach($accesos as $key => $value)
            {
                $areas .= $value["AreaId"].',';
            }

            $straccesos = chop($areas,',');
            //echo $straccesos;

            if (strlen($straccesos) != 0) {
                $pdo = Connector::Connect()->prepare("SELECT f.FileId,a.Descripcion as Area,f.Directory,f.Nombre,f.Version,f.DescCambio,f.FechaR,u.Usuario FROM $table f INNER JOIN USUARIO u ON f.UsuarioId = u.UsuarioId INNER JOIN area a On f.AreaId = a.AreaId WHERE f.AreaId IN ($straccesos) ORDER BY f.Version DESC");
                $pdo->execute();
                return $pdo->fetchAll();
                $pdo = null;
            }
        }
    }

    static public function Version($params, $table)
    {
        $nombre = "%" . $params["nombre"];
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
