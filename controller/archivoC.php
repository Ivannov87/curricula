<?php

class ArchivoC
{
    public function InsertF()
    {
    }

    public function GetCharged($id)
    {
        $table = "files";
        $resp = ArchivoM::GetCharged($table, $id);


        foreach ($resp as $key => $value) {
            echo '<tr>
            <td>' . $value["FileId"] . '</td>
            <td>' . $value["Nombre"] . '</td>
            <td>' . $value["Version"] . '</td>
            <td>' . $value["DescCambio"] . '</td>
            <td>' . $value["FechaR"] . '</td>
            <td><button>Descargar<button></td>
        </tr>';
        }
    }
    public function GetDoctos()
    {
        $table = "files";
        $resp = ArchivoM::GetDoctos($table);

        foreach ($resp as $key => $value) {
            echo '<tr>
            <td>' . $value["FileId"] . '</td>
            <td>' . $value["Nombre"] . '</td>
            <td>' . $value["Version"] . '</td>
            <td>' . $value["DescCambio"] . '</td>
            <td>' . $value["FechaR"] . '</td>
            <td><button>Descargar<button></td>
        </tr>';
        }
    }
}

?>