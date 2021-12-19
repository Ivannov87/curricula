<?php
include_once('Connect.php');
class EstadisticaM extends Connector
{

    static public function Totales($table)
    {
        $pdo = Connector::Connect()->prepare("SELECT COUNT(AreaId) as Total FROM $table group by AreaId ORDER BY AreaId ASC ");
        $pdo->execute();
        return $pdo->fetchAll();
        $pdo = null;
    }
}
